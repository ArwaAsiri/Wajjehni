var map; // Variable to store the map
var marker; // Variable to store the marker (location) on the map
var previousLocation; // Variable to store the previous location

// Function to initialize the map
function initMap() {
    // Default settings for the map (San Francisco)
    var initialLocation = { lat: 37.7749, lng: -122.4194 };

    // Create a new map
    map = new google.maps.Map(document.getElementById('map'), {
        zoom: 14,
        center: initialLocation
    });

    // Determine the volunteer type
    var volunteerType = "guidance";
    var markerColor;

    // Set marker color based on volunteer type
    if (volunteerType === "academic") {
        markerColor = "green";
    } else if (volunteerType === "guidance") {
        markerColor = "brown";
    } else {
        markerColor = "blue";
    }

    // Create a marker for the current location
    marker = new google.maps.Marker({
        map: map,
        title: 'Current Location',
        icon: {
            path: google.maps.SymbolPath.CIRCLE,
            scale: 10,
            fillColor: markerColor,
            fillOpacity: 1,
            strokeWeight: 0
        }
    });

    // Get the user's location and update the map
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(updatePosition, handleError);
    }

    // Search Box
    const input = document.createElement('input');
    input.setAttribute('id', 'pac-input');
    input.setAttribute('class', 'controls');
    input.setAttribute('type', 'text');
    input.setAttribute('placeholder', 'Search Box');
    map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);

    const searchBox = new google.maps.places.SearchBox(input);

    // Listen for places changed event
    searchBox.addListener('places_changed', () => {
        const places = searchBox.getPlaces();
        if (places.length == 0) {
            return;
        }
        markers.forEach(marker => marker.setMap(null));
        markers = [];

        const bounds = new google.maps.LatLngBounds();
        places.forEach(place => {
            if (!place.geometry || !place.geometry.location) {
                console.log("Returned place contains no geometry");
                return;
            }
            const marker = new google.maps.Marker({
                map: map,
                title: place.name,
                position: place.geometry.location
            });
            markers.push(marker);

            marker.addListener('click', () => {
                infoWindow.setContent(place.name);
                infoWindow.open(map, marker);
            });

            if (place.geometry.viewport) {
                bounds.union(place.geometry.viewport);
            } else {
                bounds.extend(place.geometry.location);
            }
        });
        map.fitBounds(bounds);
    });
}

// Function to update the marker position and center the map
function updatePosition(position) {
    const lat = position.coords.latitude;
    const lng = position.coords.longitude;
    const currentLocation = { lat, lng };

    // Add a marker for the current location
    addMarker(currentLocation, 'Current Location', 'green');

    // Add a marker for the previous location if available
    if (previousLocation) {
        addMarker(previousLocation, 'Previous Location', 'blue');
    }

    previousLocation = currentLocation;

    // Provided location
    const providedCoordinates = { lat: 21.43996424018569, lng: 39.80914295054868 };
    const providedInfoContent = "<div>Name: Renad Ibrahim Alsaedi<br>Email: 443009572@st.uqu.edu.sa<br>Department: Information System<br>Academic Level: 8<br>Subject: OOP<br>Rating: &#9733;&#9733;&#9733;&#9733;&#9733;</div>";
    addMarker(providedCoordinates, 'Provided Coordinates', 'blue', providedInfoContent);
}

// Function to add a marker to the map
function addMarker(location, title, color, infoContent) {
    var marker = new google.maps.Marker({
        position: location,
        map: map,
        title: title,
        icon: {
            path: google.maps.SymbolPath.CIRCLE,
            scale: 10,
            fillColor: color,
            fillOpacity: 1,
            strokeWeight: 0
        }
    });

    // Add an info window to the marker if content is available
    if (infoContent) {
        var infoWindow = new google.maps.InfoWindow({
            content: infoContent
        });

        marker.addListener('click', function () {
            infoWindow.open(map, marker);
        });
    }
}

// Function to handle errors
function handleError(error) {
    console.error('Error getting location:', error);
}

// Initialize the map when the page loads
window.onload = initMap;
