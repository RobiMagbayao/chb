function initialize() {
    const addressInput = document.getElementById("property_address");
    if (!addressInput) {
        console.error("Address input not found");
        return;
    }

    const mapContainer = document.getElementById("address-map");
    if (!mapContainer) {
        console.error("Map container not found");
        return;
    }

    // Initialize the map
    const map = new google.maps.Map(mapContainer, {
        zoom: 15,
        center: { lat: -34.397, lng: 150.644 },
    });

    // Initialize the marker but do not place it yet
    const marker = new google.maps.Marker({
        map: map,
        visible: false,
    });

    const autocomplete = new google.maps.places.Autocomplete(addressInput);
    autocomplete.setFields(["geometry", "name"]);

    autocomplete.addListener("place_changed", function () {
        const place = autocomplete.getPlace();
        if (!place.geometry) {
            console.error("Autocomplete's returned place contains no geometry");
            return;
        }

        // Update the map's center and the marker's position and visibility
        map.setCenter(place.geometry.location);
        marker.setPosition(place.geometry.location);
        marker.setVisible(true);

        // Update the latitude and longitude inputs with the selected place's info
        updateLocationInputs(
            place.geometry.location.lat(),
            place.geometry.location.lng()
        );
    });
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
