/*----------------------------
Assign latitude and longitude value for map
------------------------------ */
var myCenter = new google.maps.LatLng(51.508742, -0.120850);

/*----------------------------
START - initialize function for MAP
------------------------------ */
function initialize() {
    var mapProp = {
        center: myCenter,
        scrollwheel: false,
        zoom: 6,
        zoomControl: false,
        mapTypeControl: false,
        streetViewControl: false,
        mapTypeId: google.maps.MapTypeId.ROADMAP,
        styles: [{ "featureType": "landscape", "stylers": [{ "color": "#f2f2f2" }, { "visibility": "on" }] }, { "featureType": "poi", "stylers": [{ "saturation": -100 }, { "lightness": 51 }, { "visibility": "simplified" }] }, { "featureType": "road.highway", "stylers": [{ "color": "#f2f2f2" }, { "visibility": "on" }] }, { "featureType": "road.arterial", "stylers": [{ "color": "#f2f2f2" }, { "visibility": "on" }] }, { "featureType": "road.local", "stylers": [{ "color": "#14adf4" }, { "visibility": "off" }] }, { "featureType": "transit", "stylers": [{ "saturation": -100 }, { "visibility": "simplified" }] }, { "featureType": "administrative.province", "stylers": [{ "visibility": "off" }] }, { "featureType": "water", "elementType": "labels", "stylers": [{ "visibility": "on" }, { "color": "#ed734e" }] }, { "featureType": "water", "elementType": "geometry", "stylers": [{ "color": "#ed734e" }, { "visibility": "on" }] }]
    };

    var map = new google.maps.Map(document.getElementById("googleMap"), mapProp);

    var marker = new google.maps.Marker({
        position: myCenter,
    });

    marker.setMap(map);

    var infowindow = new google.maps.InfoWindow({
        content: "WE ARE HERE"
    });

    infowindow.open(map, marker);

}

/*----------------------------
START - call function for MAP
------------------------------ */
google.maps.event.addDomListener(window, 'load', initialize);
