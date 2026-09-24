<?php

header('Content-Type: application/json; charset=utf-8');

require_once "db.php";


$input = json_decode(
    file_get_contents("php://input"),
    true
);


if (!$input) {

    echo json_encode([
        "success" => false,
        "message" => "Invalid request."
    ]);

    exit;
}


$latitude =
    isset($input['latitude'])
        ? (float) $input['latitude']
        : null;


$longitude =
    isset($input['longitude'])
        ? (float) $input['longitude']
        : null;


$address =
    trim($input['address'] ?? "");


$pincode =
    trim($input['pincode'] ?? "");


$userId =
    isset($input['user_id']) &&
    $input['user_id'] !== ""
        ? $input['user_id']
        : null;


$deliveryAreaId =
    isset($input['delivery_area_id'])
        ? (int) $input['delivery_area_id']
        : null;


if (
    $latitude === null ||
    $longitude === null
) {

    echo json_encode([
        "success" => false,
        "message" => "Location is required."
    ]);

    exit;
}


try {

    $stmt = $pdo->prepare("

        INSERT INTO customer_locations
        (
            user_id,
            latitude,
            longitude,
            address,
            pincode,
            delivery_area_id
        )

        VALUES
        (
            :user_id,
            :latitude,
            :longitude,
            :address,
            :pincode,
            :delivery_area_id
        )

    ");


    $stmt->execute([

        ":user_id" =>
            $userId,

        ":latitude" =>
            $latitude,

        ":longitude" =>
            $longitude,

        ":address" =>
            $address,

        ":pincode" =>
            $pincode,

        ":delivery_area_id" =>
            $deliveryAreaId

    ]);


    echo json_encode([

        "success" => true,

        "message" =>
            "Location saved successfully.",

        "location_id" =>
            $pdo->lastInsertId()

    ]);

} catch (PDOException $e) {

    http_response_code(500);

    echo json_encode([

        "success" => false,

        "message" =>
            "Unable to save location."

    ]);
}