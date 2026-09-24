<?php

header('Content-Type: application/json; charset=utf-8');

require_once "db.php";


/*
|--------------------------------------------------------------------------
| Get coordinates
|--------------------------------------------------------------------------
*/

$lat = isset($_GET['lat'])
    ? (float) $_GET['lat']
    : null;

$lng = isset($_GET['lng'])
    ? (float) $_GET['lng']
    : null;


if ($lat === null || $lng === null) {

    echo json_encode([
        "success" => false,
        "available" => false,
        "message" => "Latitude and longitude are required."
    ]);

    exit;
}


/*
|--------------------------------------------------------------------------
| Get active delivery areas
|--------------------------------------------------------------------------
*/

$stmt = $pdo->prepare("
    SELECT
        id,
        area_name,
        pincode,
        latitude,
        longitude,
        radius_km
    FROM delivery_areas
    WHERE status = 1
");

$stmt->execute();

$areas = $stmt->fetchAll();


/*
|--------------------------------------------------------------------------
| Distance calculation
|--------------------------------------------------------------------------
*/

function distanceInKm(
    $lat1,
    $lon1,
    $lat2,
    $lon2
) {

    $earthRadius = 6371;

    $lat1 = deg2rad($lat1);
    $lat2 = deg2rad($lat2);

    $deltaLat = $lat2 - $lat1;

    $deltaLon = deg2rad(
        $lon2 - $lon1
    );

    $a =
        sin($deltaLat / 2)
        *
        sin($deltaLat / 2)
        +
        cos($lat1)
        *
        cos($lat2)
        *
        sin($deltaLon / 2)
        *
        sin($deltaLon / 2);

    $c =
        2 *
        atan2(
            sqrt($a),
            sqrt(1 - $a)
        );

    return $earthRadius * $c;
}


/*
|--------------------------------------------------------------------------
| Check areas
|--------------------------------------------------------------------------
*/

$matchedArea = null;

$nearestDistance = null;


foreach ($areas as $area) {

    $distance = distanceInKm(

        $lat,

        $lng,

        (float) $area['latitude'],

        (float) $area['longitude']

    );


    if (
        $nearestDistance === null ||
        $distance < $nearestDistance
    ) {

        $nearestDistance = $distance;
    }


    if (
        $distance <=
        (float) $area['radius_km']
    ) {

        $matchedArea = $area;

        $matchedArea['distance_km'] =
            round($distance, 2);

        break;
    }
}


/*
|--------------------------------------------------------------------------
| Available
|--------------------------------------------------------------------------
*/

if ($matchedArea !== null) {

    echo json_encode([

        "success" => true,

        "available" => true,

        "message" =>
            "We deliver to this location.",

        "area" => [

            "id" =>
                $matchedArea['id'],

            "name" =>
                $matchedArea['area_name'],

            "pincode" =>
                $matchedArea['pincode'],

            "distance_km" =>
                $matchedArea['distance_km']

        ]

    ]);

    exit;
}


/*
|--------------------------------------------------------------------------
| Not available
|--------------------------------------------------------------------------
*/

echo json_encode([

    "success" => true,

    "available" => false,

    "message" =>
        "We're not here yet.",

    "nearest_distance_km" =>
        $nearestDistance !== null
            ? round($nearestDistance, 2)
            : null

]);