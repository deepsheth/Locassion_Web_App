// Note: This example requires that you consent to location sharing when
// prompted by your browser. If you see the error "The Geolocation service
// failed.", it means you probably did not give permission for the browser to
// locate you.

$(document).ready(function () {
    $('.collapsible').collapsible({
        accordion: false // A setting that changes the collapsible behavior to expandable instead of the default accordion style
    });

    var numberSelected = 0;
    $('#friend-dashboard .friend-list-cards .card-panel').click(function () {
        $(this).toggleClass('card-selected');
        if ($(this).is('.card-selected')) {
            numberSelected++;
            $('.num-selected').text(numberSelected);
        }
        else {
            numberSelected--;
            $('.num-selected').text(numberSelected);
        }
    });

});

var map;
var publicEventInfo;
var privateEventInfo;
var isPrivateTabActive = 0;

function initMap() {

    // Blue Gray Theme
    var style = [
        {
            "featureType": "water",
            "stylers": [
                {
                    "visibility": "on"
            },
                {
                    "color": "#b5cbe4"
            }
        ]
    },
        {
            "featureType": "landscape",
            "stylers": [
                {
                    "color": "#efefef"
            }
        ]
    },
        {
            "featureType": "road.highway",
            "elementType": "geometry",
            "stylers": [
                {
                    "color": "#83a5b0"
            }
        ]
    },
        {
            "featureType": "road.arterial",
            "elementType": "geometry",
            "stylers": [
                {
                    "color": "#bdcdd3"
            }
        ]
    },
        {
            "featureType": "road.local",
            "elementType": "geometry",
            "stylers": [
                {
                    "color": "#ffffff"
            }
        ]
    },
        {
            "featureType": "poi.park",
            "elementType": "geometry",
            "stylers": [
                {
                    "color": "#e3eed3"
            }
        ]
    },
        {
            "featureType": "administrative",
            "stylers": [
                {
                    "visibility": "on"
            },
                {
                    "lightness": 33
            }
        ]
    },
        {
            "featureType": "road"
    },
        {
            "featureType": "poi.park",
            "elementType": "labels",
            "stylers": [
                {
                    "visibility": "on"
            },
                {
                    "lightness": 20
            }
        ]
    },
        {},
        {
            "featureType": "road",
            "stylers": [
                {
                    "lightness": 20
            }
        ]
    }
]

    var map_options = {
        styles: style
    }

    map = new google.maps.Map(document.getElementById('map'), {
        center: {
            lat: 40.6054,
            lng: -75.3778
        },
        zoom: 16,
        styles: style
    });

    geoLocator();

    var iconBase = './img/';

    var infowindow = new google.maps.InfoWindow({
        maxWidth: 250
    });

    for (var i = 0; i < privateEventInfo.length; i++) {
        var marker = new google.maps.Marker({
            position: new google.maps.LatLng(privateEventInfo[i].longitude, privateEventInfo[i].latitude),
            map: map,
            icon: iconBase + 'private_event_marker.png'

        });

        if (logged_in)
            generatePrivateEvents();

        google.maps.event.addListener(marker, 'click', (function (marker, i) {
            return function () {
                var contentString = '<h6><big><strong>' + privateEventInfo[i].name + '</strong></big></h6><strong>Time: </strong>' + privateEventInfo[i].time + "</br>" + privateEventInfo[i].description + "</br></br><strong>Location: </strong>" + privateEventInfo[i].locationDescription + '';
                infowindow.setContent(contentString);
                infowindow.open(map, marker);
            }
        })(marker, i));
    }

    for (var i = 0; i < publicEventInfo.length; i++) {
        var marker = new google.maps.Marker({
            position: new google.maps.LatLng(publicEventInfo[i].longitude, publicEventInfo[i].latitude),
            map: map,
            icon: iconBase + 'public_event_marker.png'

        });

        if (!logged_in) {
            generatePublicEvents();
        }

        google.maps.event.addListener(marker, 'click', (function (marker, i) {
            return function () {
                infowindow.setContent(publicEventInfo[i].name);
                infowindow.open(map, marker);
            }
        })(marker, i));
    }
}

function geoLocator() {
    // Try HTML5 geolocation.
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(function (position) {
            var pos = {
                lat: position.coords.latitude,
                lng: position.coords.longitude
            };

            //            infoWindow.setPosition(pos);
            //            infoWindow.setContent('Location found.');
            console.log("Location found!");

            map.setZoom(15);
            map.setCenter(pos);

        });
    } else {
        Materialize.toast('Sorry, we could not find your location. Try using another browser.', 3000, 'rounded')
    }
}

function generatePrivateEvents() {
    clearEvents();

    for (var i = 0; i < privateEventInfo.length; i++) {
        // Dynamically generates PRIVATE card content

        $('#event-panel').append(

            '<div class="row"><div class="col s12"><div class="card grey lighten-4"><div class="card-content grey-text text-darken-2"><span class="card-title">' +
            privateEventInfo[i].name + '<i title="Close" class="material-icons right close">close</i></span><p>' +
            privateEventInfo[i].description + '</p></div><div class="card-action grey lighten-3"><ul class="collapsible z-depth-1" data-collapsible="accordion"><li><div class="collapsible-header grey lighten-3"><i class="material-icons left grey-text text-darken-2" title="Event Details">info</i><i class="material-icons left grey-text text-darken-2" title="Map Event\'s Location" onclick="centerMap(' + privateEventInfo[i].longitude + ',' + privateEventInfo[i].latitude + ')">place</i><i  title="Share Event" class="material-icons left grey-text text-darken-2">share</i><a href="#" class="blue-text right" onclick="toastDismiss(' + i + ')">Dismiss</a><a href="#" class="blue-text right" onclick="toastGoing(' + i + ')">Going</a></div><div class="collapsible-body"><p class="grey-text text-darken-1"><strong>Location: </strong>' +
            privateEventInfo[i].locationDescription + '</p><div class="chip chip-margin-right">' +
            privateEventInfo[i].tag1 + '</div><div class="chip">' + privateEventInfo[i].tag2 +
            '</div></div></li></ul></div></div></div></div>'
        );

    }

    $('.collapsible').collapsible({
        accordion: false // A setting that changes the collapsible behavior to expandable instead of the default accordion style
    });

    $("#event-panel .collapsible a").click(function () {
        deleteCard(this);
    });

    $("#event-panel .close").click(function () {
        deleteCard(this);
    });

    function deleteCard(currentElement) {
        console.log("yas");
        console.log(this);
        $(currentElement).parentsUntil($("#event-panel")).slideUp("fast", function () {
            $(currentElement).remove();
        });
    }
}

function generatePublicEvents() {
    clearEvents();

    // Dynamically generates PUBLIC card content

    if (!logged_in) {
        $('#event-panel').append(
            '<div class="row"><div class="col 12"><div class="card red darken-2"><div class="card-content white-text"><span class="card-title">Check out Private Events.</span><p class="insert">Create an account to see which events your friends are attending and hosting for you.</p></div><div class="card-action red darken-4 center"><a href="/webpages/sign_up.html" class="amber-text title btn-flat waves-effect waves-white">Sign Up</a></div></div></div></div>'
        );
    }

    for (var i = 0; i < publicEventInfo.length; i++) {
        $('#event-panel').append(

            '<div class="row"><div class="col s12"><div class="card grey lighten-4"><div class="card-content grey-text text-darken-2"><span class="card-title">' +
            publicEventInfo[i].name + '<i class="material-icons right close">close</i></span><p>' +
            publicEventInfo[i].description + '</p></div><div class="card-action grey lighten-3"><ul class="collapsible z-depth-1" data-collapsible="accordion"><li><div class="collapsible-header grey lighten-3"><i class="material-icons left blue-text ">info</i><i class="material-icons left blue-text" onclick="centerMap(' + publicEventInfo[i].longitude + ',' + publicEventInfo[i].latitude + ')">place</i><i class="material-icons left blue-text ">share</i><a href="#" class="blue-text right" onclick="toastDismiss(' + i + ')">Dismiss</a><a href="#" class="blue-text right" onclick="toastGoing(' + i + ')">Going</a></div><div class="collapsible-body"><p class="grey-text text-darken-1"><strong>Location: </strong>' +
            publicEventInfo[i].locationDescription + '</p><div class="chip chip-margin-right">' +
            publicEventInfo[i].tag1 + '</div><div class="chip">' + publicEventInfo[i].tag2 +
            '</div></div></li></ul></div></div></div></div>'

        );

    }

    $('.collapsible').collapsible({
        accordion: false // A setting that changes the collapsible behavior to expandable instead of the default accordion style
    });

}

function clearEvents() {
    isPrivateTabActive++;
    $('#event-panel').children().remove();

}

function toastGoing(cardIndex) {
    Materialize.toast('Going to event ' + cardIndex, 4000)
}

function toastDismiss(cardIndex) {
    Materialize.toast('NOT going to event ' + cardIndex, 4000);

    // Checks if private or public is open
    //if (isPrivateTabActive) {
    //    $("#event-panel").children()[cardIndex].remove();
    //}
}

function centerMap(latitude, longitude) {
    var pos = {
        lat: latitude,
        lng: longitude
    };
    map.panTo(pos);
    map.setZoom(18);

}

$(document).ready(function () {
    // the "href" attribute of .modal-trigger must specify the modal ID that wants to be triggered
    $('.modal-trigger').leanModal();
});