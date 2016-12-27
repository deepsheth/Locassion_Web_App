var map;
function initMap() {
    map = new google.maps.Map(document.getElementById('map'), {
        center: {
            lat: 40.605,
            lng: -75.375
        },
        zoom: 13
    });
}