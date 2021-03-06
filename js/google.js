
// APIs that we are going to use
var googleAPIKey = "own-API-key"; // Change to your own
// var url1 = "REST/carpark.php?action=getNearByCarParks&postCode=";
// var url2 = "REST/carpark.php?action=getCarParkInfo&cpID=";
var url3 = "https://maps.googleapis.com/maps/api/distancematrix/json?units=imperial&key=" + googleAPIKey;

// Global variables
// var postCode = "";
// var cpList = {}; // JS obj that stores a list of carpark info: pairs of cpID : cpAddress
var postCodeElem = document.getElementById("postCode");
// var contentElem = document.getElementById("content");
// var locBtnElem = document.getElementById("locBtn");
// var selectElem = document.getElementById("carparks");
// var dirBtnElem = document.getElementById("dirBtn");
// var tableElem = document.getElementById('cpAvailability');
// var panelElem = document.getElementById('right-panel'); // panel that shows direction

// Note: This example requires that you consent to location sharing when
// prompted by your browser. If you see the error "The Geolocation service
// failed.", it means you probably did not give permission for the browser to
// locate you.

var map, infoWindow;
function initMap() {

    // This is <div> in Line 56
    map = new google.maps.Map(document.getElementById('map'), {
        center: {lat: 1.3795, lng: 103.8882},
        zoom: 12
    });
    // info window is the one showing "Location found" message
    infoWindow = new google.maps.InfoWindow;

    // this attempts to get user permission to access location
    // Try HTML5 geolocation.

    // Step 3
    // var postCode = "";
    // document.getElementById("locationInfo").innerHTML = "Lat: " + pos.lat + " Lng: " + pos.lng;

    // Uses geolocation library to retrieve user's location
    if (navigator.geolocation) {
        
        navigator.geolocation.getCurrentPosition(function(position) {
            var pos = {
                lat: position.coords.latitude,
                lng: position.coords.longitude
            }; // -> this pos value is used to extract user's postal code 


            //console.log(pos);

            // Step 4 (if user chooses Allow)
            // get postal code (& address) given lat, lng
            getLocation(pos);
        

            // Step 5 (position user's location on the map)
            // display Lat Lng info in the div
            // document.getElementById("locationInfo").innerHTML = "Lat: " + pos.lat + " Lng: " + pos.lng;
            // set user position to infoWindow
            infoWindow.setPosition(pos);
            infoWindow.setContent('I know where you live!');
            infoWindow.open(map);
            map.setCenter(pos);
        }, function() {
            handleLocationError(true, infoWindow, map.getCenter());
            // handleLocationError();
        });
    } else { // error handling
        // Browser doesn't support Geolocation
        handleLocationError(false, infoWindow, map.getCenter());
        // handleLocationError();
    }
}

function handleLocationError(browserHasGeolocation, infoWindow, pos) {
    infoWindow.setPosition(pos);
    infoWindow.setContent(browserHasGeolocation ?
                        'Error: The Geolocation service failed.' :
                        'Error: Your browser doesn\'t support geolocation.');
    infoWindow.open(map);
} 

// Step 4 (if user chooses Block)
function handleLocationError() {
    console.log("Error: Geolocation service failed!");
    document.getElementById("locationInfo").style.display = "block"; 
    document.getElementById("locationInfo").innerHTML = "Sorry, we couldn't get Postal Code. Please enter manually!";
}


/*
Ajax call to get the geolocation information, including postal code given Lat & Lng
*/
function getLocation(pos) {

var addr =  pos.lat + ", " + pos.lng;
console.log(addr);
var url = "https://maps.googleapis.com/maps/api/geocode/json?address=" + addr + "&key=" + googleAPIKey;
var xhttp = new XMLHttpRequest();
xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
        // following code may throw error if user input is invalid address
        // so we use try-catch block to handle errors
        try { 
            // expected response is JSON data
            var data = JSON.parse(this.responseText);
            console.log(data);
            postCode = getPostCode(data); // Retrieve postal code
            console.log("Postal Code: " + postCode);
            
            if(postCode=="") {
                console.log("can't get location")
                // handleLocationError();
            } else {
                document.getElementById("locationInfo").style.display = "block";
                document.getElementById("locationInfo").innerHTML = "Hello, we got your current location!";
                document.getElementById("postal").value = postCode;
            }
            
        } catch(err) { // show error message
            // not a good idea to directly show err.message 
            // as it may contain sensitive info
            // document.getElementById("display").innerHTML = err.message;
            console.log("can't get location")
            // handleLocationError();
        }
    }
};

xhttp.open("GET", url, true);
xhttp.send();
}

function getPostCode(data) {
//console.log('in getPostCode')
//console.log(data)
var addrcomponents = data["results"][0]["address_components"];
var postcode = addrcomponents.filter(postcodeHelper);
// country is an array but there should be only one element
console.log(postcode)
return postcode[0]["long_name"];
}

function postcodeHelper(addr) {  
return addr["types"][0] == "postal_code" ;
}

function getFullAddress (data) {
var addr = data["results"][0]["formatted_address"];
var loc = getLatLng(data);
return addr + "<br> lat: " + loc["lat"] + ", lng: " + loc["lng"];
}

function getLatLng(data) {
var location= data["results"][0]["geometry"]["location"];
return location; 
}
