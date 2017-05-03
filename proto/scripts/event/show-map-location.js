//map.js

//Set up some of our variables.
var map; //Will contain map object.
var geocoder;

//Function called to initialize / create the map.
//This is called when the page has loaded.
function initMap() {

    geocoder = new google.maps.Geocoder();

    //The center location of our map.
    var centerOfMap = new google.maps.LatLng($("#lat").val(), $("#lon").val());

    //Map options.
    var options = {
        center: centerOfMap, //Set center.
        zoom: 15 //The zoom value.
    };

    //Create the map object.
    map = new google.maps.Map(document.getElementById('map'), options);

    var marker = new google.maps.Marker({
        position: centerOfMap,
        map: map,
        draggable: false //make it draggable
    });
}

//Load the map when the page has finished loading.
google.maps.event.addDomListener(window, 'load', initMap);