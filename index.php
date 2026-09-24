<!DOCTYPE html>

<html lang="en">

<head>

<meta charset="UTF-8">

<meta
    name="viewport"
    content="width=device-width, initial-scale=1.0"
>

<title>Set Delivery Location</title>


<style>

* {
    box-sizing: border-box;
}


html,
body {

    margin: 0;

    width: 100%;

    height: 100%;

    font-family:
        Arial,
        Helvetica,
        sans-serif;

}


body {

    overflow: hidden;

}


/* =====================================================
   MAIN
===================================================== */

.location-page {

    width: 100%;

    height: 100vh;

    display: flex;

    flex-direction: column;

}


/* =====================================================
   HEADER
===================================================== */

.header {

    height: 55px;

    display: flex;

    align-items: center;

    padding: 0 22px;

    background: #fff;

    border-bottom: 1px solid #eee;

    z-index: 100;

}


.back-button {

    border: none;

    background: transparent;

    font-size: 30px;

    cursor: pointer;

    margin-right: 8px;

}


.header-title {

    font-size: 21px;

    font-weight: 600;

}


/* =====================================================
   CONTENT
===================================================== */

.content {

    flex: 1;

    display: flex;

    min-height: 0;

}


/* =====================================================
   MAP
===================================================== */

.map-section {

    position: relative;

    width: 66%;

    height: 100%;

}


#map {

    width: 100%;

    height: 100%;

}


/* =====================================================
   SEARCH
===================================================== */

.search-wrapper {

    position: absolute;

    top: 38px;

    left: 20px;

    right: 20px;

    z-index: 10;

    max-width: 970px;

    margin: auto;

}


.search-box {

    height: 56px;

    background: white;

    border-radius: 14px;

    box-shadow:
        0 2px 10px rgba(0,0,0,.20);

    display: flex;

    align-items: center;

    padding: 0 16px;

}


.search-icon {

    font-size: 22px;

    margin-right: 10px;

}


#searchInput {

    width: 100%;

    border: none;

    outline: none;

    font-size: 16px;

}


gmp-place-autocomplete {

    width: 100%;

}


/* =====================================================
   CENTER PIN
===================================================== */

.center-pin {

    position: absolute;

    left: 50%;

    top: 50%;

    z-index: 8;

    transform:
        translate(-50%, -100%);

    pointer-events: none;

}


.pin {

    width: 45px;

    height: 45px;

    border-radius:
        50% 50% 50% 0;

    background: #222;

    transform: rotate(-45deg);

    box-shadow:
        0 3px 10px rgba(0,0,0,.35);

    display: flex;

    justify-content: center;

    align-items: center;

}


.pin::after {

    content: "";

    width: 15px;

    height: 15px;

    border-radius: 50%;

    background: #fff;

}


/* =====================================================
   CURRENT LOCATION
===================================================== */

.current-location {

    position: absolute;

    bottom: 25px;

    left: 50%;

    transform: translateX(-50%);

    z-index: 10;

    background: white;

    border: none;

    border-radius: 28px;

    padding: 14px 22px;

    color: #1465ef;

    font-size: 16px;

    font-weight: 600;

    cursor: pointer;

    box-shadow:
        0 3px 12px rgba(0,0,0,.20);

    white-space: nowrap;

}


.current-location:hover {

    background: #f5f8ff;

}


/* =====================================================
   SIDE PANEL
===================================================== */

.side-panel {

    width: 34%;

    min-width: 360px;

    background: #fff;

    border-left: 1px solid #eee;

    display: flex;

    justify-content: center;

    align-items: center;

    padding: 40px;

    text-align: center;

}


/* =====================================================
   NOT AVAILABLE
===================================================== */

.not-available {

    width: 100%;

    max-width: 420px;

}


.truck-icon {

    font-size: 60px;

    margin-bottom: 20px;

}


.panel-title {

    font-size: 22px;

    font-weight: 700;

    margin-bottom: 15px;

}


.panel-text {

    font-size: 16px;

    line-height: 1.5;

    color: #333;

    margin-bottom: 28px;

}


.button-group {

    display: flex;

    flex-direction: column;

    gap: 12px;

}


.btn {

    width: 100%;

    height: 60px;

    border-radius: 14px;

    font-size: 17px;

    font-weight: 600;

    cursor: pointer;

}


.btn-primary {

    background: #2167ed;

    color: white;

    border: none;

}


.btn-primary:hover {

    background: #1558d4;

}


.btn-secondary {

    background: white;

    color: #2167ed;

    border: 1px solid #2167ed;

}


/* =====================================================
   AVAILABLE
===================================================== */

.available {

    display: none;

    width: 100%;

    max-width: 420px;

}


.success-icon {

    font-size: 60px;

    margin-bottom: 18px;

}


.available-title {

    font-size: 23px;

    font-weight: 700;

    margin-bottom: 15px;

}


.address {

    color: #555;

    line-height: 1.5;

    margin-bottom: 22px;

}


.distance {

    color: #666;

    font-size: 14px;

    margin-bottom: 22px;

}


.deliver-button {

    width: 100%;

    height: 60px;

    border: none;

    border-radius: 14px;

    background: #2167ed;

    color: white;

    font-size: 17px;

    font-weight: 600;

    cursor: pointer;

}


/* =====================================================
   LOADING
===================================================== */

.loading {

    position: absolute;

    inset: 0;

    z-index: 100;

    display: none;

    align-items: center;

    justify-content: center;

    background: rgba(255,255,255,.35);

}


.spinner {

    width: 42px;

    height: 42px;

    border: 4px solid #ddd;

    border-top-color: #2167ed;

    border-radius: 50%;

    animation: spin .8s linear infinite;

}


@keyframes spin {

    to {
        transform: rotate(360deg);
    }

}


/* =====================================================
   MOBILE
===================================================== */

@media(max-width: 800px) {

    body {

        overflow: auto;

    }


    .location-page {

        height: auto;

        min-height: 100vh;

    }


    .content {

        flex-direction: column;

    }


    .map-section {

        width: 100%;

        height: 58vh;

        min-height: 450px;

    }


    .side-panel {

        width: 100%;

        min-width: 0;

        min-height: 360px;

        padding: 30px 20px;

    }


    .search-wrapper {

        top: 15px;

        left: 12px;

        right: 12px;

    }


    .search-box {

        height: 52px;

    }

}

</style>

</head>


<body>


<div class="location-page">


    <!-- HEADER -->

    <div class="header">

        <button
            class="back-button"
            onclick="history.back()"
        >
            ←
        </button>

        <div class="header-title">
            Set Delivery location
        </div>

    </div>


    <!-- CONTENT -->

    <div class="content">


        <!-- MAP -->

        <div class="map-section">


            <div id="map"></div>


            <!-- SEARCH -->

            <div class="search-wrapper">

                <div class="search-box">

                    <span class="search-icon">
                        🔍
                    </span>

                    <input
                        id="searchInput"
                        type="text"
                        placeholder="Search by area, name, street."
                    >

                </div>

            </div>


            <!-- FIXED PIN -->

            <div class="center-pin">

                <div class="pin"></div>

            </div>


            <!-- CURRENT LOCATION -->

            <button
                id="currentLocation"
                class="current-location"
            >
                ◎ &nbsp; Use my current location
            </button>


            <!-- LOADING -->

            <div
                id="loading"
                class="loading"
            >

                <div class="spinner"></div>

            </div>


        </div>


        <!-- SIDE PANEL -->

        <div class="side-panel">


            <!-- NOT AVAILABLE -->

            <div
                id="notAvailable"
                class="not-available"
            >

                <div class="truck-icon">
                    🚚
                </div>


                <div
                    id="panelTitle"
                    class="panel-title"
                >
                    We're not here yet
                </div>


                <div
                    id="panelText"
                    class="panel-text"
                >

                    We currently do not deliver
                    at this location.

                    <br>

                    We'll be there soon

                </div>


                <div class="button-group">


                    <button
                        id="useCurrentSide"
                        class="btn btn-primary"
                    >
                        Use current location
                    </button>


                    <button
                        id="searchAnother"
                        class="btn btn-secondary"
                    >
                        Search another location
                    </button>


                </div>

            </div>


            <!-- AVAILABLE -->

            <div
                id="available"
                class="available"
            >

                <div class="success-icon">
                    📦
                </div>


                <div class="available-title">

                    We deliver here!

                </div>


                <div
                    id="address"
                    class="address"
                >
                    Loading address...
                </div>


                <div
                    id="distance"
                    class="distance"
                ></div>


                <button
                    id="deliverHere"
                    class="deliver-button"
                >
                    Deliver here
                </button>

            </div>


        </div>

    </div>

</div>


<script>

/*
|--------------------------------------------------------------------------
| IMPORTANT
|--------------------------------------------------------------------------
|
| Put your Google Maps API key here.
|
*/

const GOOGLE_MAPS_API_KEY =
    "AIzaSyCbSY1rm-9KVXJi3rEdddNyfMAt5vaStU0";


let map;

let geocoder;

let selectedLat = null;

let selectedLng = null;

let selectedAddress = "";

let selectedPincode = "";

let selectedAreaId = null;


/*
|--------------------------------------------------------------------------
| Initial map position
|--------------------------------------------------------------------------
*/

const INITIAL_LOCATION = {

    lat: 9.931233,

    lng: 76.267303

};


/*
|--------------------------------------------------------------------------
| Load Google Maps dynamically
|--------------------------------------------------------------------------
*/

function loadGoogleMaps() {

    return new Promise(
        function(resolve, reject) {

            if (
                window.google &&
                window.google.maps
            ) {

                resolve();

                return;
            }


            const script =
                document.createElement("script");


            script.src =
                "https://maps.googleapis.com/maps/api/js"
                + "?key="
                + encodeURIComponent(
                    GOOGLE_MAPS_API_KEY
                )
                + "&libraries=places"
                + "&v=weekly";


            script.async = true;

            script.defer = true;


            script.onload =
                function() {

                    resolve();

                };


            script.onerror =
                function() {

                    reject(
                        new Error(
                            "Google Maps failed to load."
                        )
                    );

                };


            document.head.appendChild(
                script
            );

        }
    );
}


/*
|--------------------------------------------------------------------------
| Initialize
|--------------------------------------------------------------------------
*/

async function initializeApplication() {

    try {

        await loadGoogleMaps();

        initializeMap();

        initializeSearch();

        initializeButtons();

        updateSelectedLocation();

    } catch (error) {

        console.error(error);

        alert(
            "Google Maps could not be loaded. Check your API key and enabled APIs."
        );

    }

}


/*
|--------------------------------------------------------------------------
| Initialize map
|--------------------------------------------------------------------------
*/

function initializeMap() {

    map = new google.maps.Map(

        document.getElementById("map"),

        {

            center: INITIAL_LOCATION,

            zoom: 15,

            mapTypeControl: false,

            streetViewControl: false,

            fullscreenControl: true,

            gestureHandling: "greedy"

        }

    );


    geocoder =
        new google.maps.Geocoder();


    /*
     * Whenever map movement stops,
     * get the new center location.
     */

    map.addListener(
        "idle",
        function() {

            updateSelectedLocation();

        }
    );

}


/*
|--------------------------------------------------------------------------
| Initialize Google search
|--------------------------------------------------------------------------
*/

function initializeSearch() {

    const input =
        document.getElementById(
            "searchInput"
        );


    /*
     * Google Places Autocomplete
     *
     * This gives:
     *
     * Kakkanad
     * Kochi
     * Tripunithura
     * Lulu Mall
     * street names
     * etc.
     */

    const autocomplete =
        new google.maps.places.Autocomplete(

            input,

            {

                fields: [

                    "geometry",

                    "formatted_address",

                    "name",

                    "address_components"

                ],

                componentRestrictions: {

                    country: "in"

                }

            }

        );


    autocomplete.addListener(
        "place_changed",
        function() {

            const place =
                autocomplete.getPlace();


            if (
                !place.geometry ||
                !place.geometry.location
            ) {

                alert(
                    "Unable to find this location."
                );

                return;
            }


            const location =
                place.geometry.location;


            map.setCenter(location);

            map.setZoom(17);


            /*
             * Don't directly save
             * the searched address.
             *
             * After map movement,
             * the fixed pin represents
             * the actual selected point.
             */

        }
    );

}


/*
|--------------------------------------------------------------------------
| Get center location
|--------------------------------------------------------------------------
*/

function updateSelectedLocation() {

    if (!map) {
        return;
    }


    const center =
        map.getCenter();


    if (!center) {
        return;
    }


    const lat =
        center.lat();


    const lng =
        center.lng();


    selectedLat = lat;

    selectedLng = lng;


    checkDelivery(
        lat,
        lng
    );

}


/*
|--------------------------------------------------------------------------
| Reverse geocode
|--------------------------------------------------------------------------
*/

async function reverseGeocode(
    lat,
    lng
) {

    return new Promise(
        function(resolve) {

            geocoder.geocode(

                {

                    location: {

                        lat: lat,

                        lng: lng

                    }

                },

                function(
                    results,
                    status
                ) {

                    if (
                        status ===
                        "OK" &&
                        results &&
                        results.length
                    ) {

                        const result =
                            results[0];


                        selectedAddress =
                            result.formatted_address;


                        /*
                         * Find pincode.
                         */

                        selectedPincode =
                            "";


                        if (
                            result.address_components
                        ) {

                            result
                                .address_components
                                .forEach(
                                    function(
                                        component
                                    ) {

                                        if (
                                            component.types
                                                .includes(
                                                    "postal_code"
                                                )
                                        ) {

                                            selectedPincode =
                                                component
                                                    .long_name;

                                        }

                                    }
                                );

                        }


                        resolve(
                            selectedAddress
                        );

                        return;
                    }


                    resolve("");

                }

            );

        }
    );

}


/*
|--------------------------------------------------------------------------
| Check delivery
|--------------------------------------------------------------------------
*/

async function checkDelivery(
    lat,
    lng
) {

    showLoading(true);


    try {

        const response =
            await fetch(

                "check_delivery.php"
                + "?lat="
                + encodeURIComponent(lat)
                + "&lng="
                + encodeURIComponent(lng)

            );


        const data =
            await response.json();


        if (
            !data.success
        ) {

            return;
        }


        if (
            data.available
        ) {

            /*
             * Reverse geocode selected
             * center.
             */

            const address =
                await reverseGeocode(
                    lat,
                    lng
                );


            selectedAddress =
                address;


            selectedAreaId =
                data.area.id;


            showAvailable(

                data.area,

                address

            );

        } else {

            selectedAreaId =
                null;


            showNotAvailable();

        }


    } catch (error) {

        console.error(
            "Delivery check failed:",
            error
        );

    } finally {

        showLoading(false);

    }

}


/*
|--------------------------------------------------------------------------
| Show available
|--------------------------------------------------------------------------
*/

function showAvailable(
    area,
    address
) {

    document
        .getElementById(
            "notAvailable"
        )
        .style.display =
            "none";


    document
        .getElementById(
            "available"
        )
        .style.display =
            "block";


    document
        .getElementById(
            "address"
        )
        .textContent =
            address ||
            area.name;


    document
        .getElementById(
            "distance"
        )
        .textContent =

            "Delivery area: "
            + area.name
            + " • "
            + area.distance_km
            + " km away";

}


/*
|--------------------------------------------------------------------------
| Show unavailable
|--------------------------------------------------------------------------
*/

function showNotAvailable() {

    document
        .getElementById(
            "available"
        )
        .style.display =
            "none";


    document
        .getElementById(
            "notAvailable"
        )
        .style.display =
            "block";

}


/*
|--------------------------------------------------------------------------
| Current location
|--------------------------------------------------------------------------
*/

function useCurrentLocation() {

    if (
        !navigator.geolocation
    ) {

        alert(
            "Geolocation is not supported by your browser."
        );

        return;
    }


    showLoading(true);


    navigator.geolocation.getCurrentPosition(

        function(position) {

            const lat =
                position.coords.latitude;


            const lng =
                position.coords.longitude;


            map.setCenter({

                lat: lat,

                lng: lng

            });


            map.setZoom(18);


            showLoading(false);

        },


        function(error) {

            showLoading(false);


            if (
                error.code ===
                error.PERMISSION_DENIED
            ) {

                alert(
                    "Please allow location access in your browser."
                );

            } else {

                alert(
                    "Unable to get your current location."
                );

            }

        },


        {

            enableHighAccuracy: true,

            timeout: 10000,

            maximumAge: 0

        }

    );

}


/*
|--------------------------------------------------------------------------
| Buttons
|--------------------------------------------------------------------------
*/

function initializeButtons() {


    document
        .getElementById(
            "currentLocation"
        )
        .addEventListener(
            "click",
            useCurrentLocation
        );


    document
        .getElementById(
            "useCurrentSide"
        )
        .addEventListener(
            "click",
            useCurrentLocation
        );


    document
        .getElementById(
            "searchAnother"
        )
        .addEventListener(
            "click",
            function() {

                document
                    .getElementById(
                        "searchInput"
                    )
                    .focus();

            }
        );


    /*
     * Deliver here
     */

    document
        .getElementById(
            "deliverHere"
        )
        .addEventListener(
            "click",
            saveLocation
        );

}


/*
|--------------------------------------------------------------------------
| Save selected location
|--------------------------------------------------------------------------
*/

async function saveLocation() {

    if (
        selectedLat === null ||
        selectedLng === null
    ) {

        alert(
            "Please select a location."
        );

        return;
    }


    if (
        !selectedAreaId
    ) {

        alert(
            "This location is outside our delivery area."
        );

        return;
    }


    showLoading(true);


    try {

        const response =
            await fetch(

                "save_location.php",

                {

                    method: "POST",

                    headers: {

                        "Content-Type":
                            "application/json"

                    },

                    body:
                        JSON.stringify({

                            /*
                             * Replace this with
                             * your actual logged-in
                             * user ID.
                             */

                            user_id: null,


                            latitude:
                                selectedLat,


                            longitude:
                                selectedLng,


                            address:
                                selectedAddress,


                            pincode:
                                selectedPincode,


                            delivery_area_id:
                                selectedAreaId

                        })

                }

            );


        const data =
            await response.json();


        if (
            data.success
        ) {

            /*
             * SUCCESS
             *
             * You can redirect
             * to checkout here.
             */

            console.log(
                "Saved location:",
                data.location_id
            );


            alert(
                "Delivery location selected successfully."
            );


            /*
             * Example:
             *
             * window.location.href =
             * "checkout.php";
             */

        } else {

            alert(
                data.message ||
                "Unable to save location."
            );

        }


    } catch (error) {

        console.error(error);

        alert(
            "Unable to save delivery location."
        );

    } finally {

        showLoading(false);

    }

}


/*
|--------------------------------------------------------------------------
| Loading
|--------------------------------------------------------------------------
*/

function showLoading(show) {

    document
        .getElementById(
            "loading"
        )
        .style.display =
            show
                ? "flex"
                : "none";

}


/*
|--------------------------------------------------------------------------
| START
|--------------------------------------------------------------------------
*/

initializeApplication();

</script>


</body>

</html>