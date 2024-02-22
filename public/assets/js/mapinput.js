document.addEventListener("DOMContentLoaded", function () {
    initialize();
});

function initialize() {
    const addressInput = document.getElementById("property_address");
    const latitudeInput = document.getElementById("address-latitude");
    const longitudeInput = document.getElementById("address-longitude");

    if (!addressInput || !latitudeInput || !longitudeInput) {
        console.error("Inputs not found");
        return;
    }

    const mapContainer = document.getElementById("address-map");
    if (!mapContainer) {
        console.error("Map container not found");
        return;
    }

    const defaultLocation = { lat: 37.756944, lng: -122.449 }; // Default location if user address is not available
    const map = new google.maps.Map(mapContainer, {
        zoom: 15,
        center: defaultLocation,
    });

    const marker = new google.maps.Marker({
        map: map,
        visible: true,
    });

    const autocomplete = new google.maps.places.Autocomplete(addressInput);
    autocomplete.setFields(["geometry", "name"]);

    autocomplete.addListener("place_changed", function () {
        const place = autocomplete.getPlace();
        if (!place.geometry) {
            console.error("Autocomplete's returned place contains no geometry");
            return;
        }

        map.setCenter(place.geometry.location);
        marker.setPosition(place.geometry.location);
        marker.setVisible(true);

        updateLocationInputs(
            place.geometry.location.lat(),
            place.geometry.location.lng()
        );
    });

    // Use the Auth address if available
    if (addressInput.value.trim() !== "") {
        const geocoder = new google.maps.Geocoder();
        geocoder.geocode(
            { address: addressInput.value },
            function (results, status) {
                if (status === "OK") {
                    const userLocation = results[0].geometry.location;
                    map.setCenter(userLocation);
                    marker.setPosition(userLocation);
                    marker.setVisible(true);
                }
            }
        );
    }
}

function updateLocationInputs(lat, lng) {
    const latitudeInput = document.getElementById("address-latitude");
    const longitudeInput = document.getElementById("address-longitude");

    if (latitudeInput && longitudeInput) {
        latitudeInput.value = lat;
        longitudeInput.value = lng;
    } else {
        console.error("Latitude and/or Longitude inputs not found");
    }
}
