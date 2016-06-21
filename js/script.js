// Note: This example requires that you consent to location sharing when
// prompted by your browser. If you see the error "The Geolocation service
// failed.", it means you probably did not give permission for the browser to
// locate you.

$(document).ready(function () {
    $('.collapsible').collapsible({
        accordion: false // A setting that changes the collapsible behavior to expandable instead of the default accordion style
    });

    var count1 = 0;
    $('#friend-dashboard .friend-list-cards .card-panel').click(function () {
        count1 = selectCard(this, count1);
    });

    var count2 = 0;
    $('#invite_modal .card-panel').click(function () {
        console.log("??");
        count2 = selectCard(this, count2);
    });

});

function selectCard(card, numberSelected) {
    $(card).toggleClass('card-selected');

    if ($(card).is('.card-selected')) {
        numberSelected++;
        $('.num-selected').text(numberSelected);
    } else {
        numberSelected--;
        $('.num-selected').text(numberSelected);
    }
    return numberSelected;
}

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
];

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


    for (var i = 0; i < publicEventInfo.length; i++) {

        var marker = new google.maps.Marker({
            position: new google.maps.LatLng(publicEventInfo[i].latitude, publicEventInfo[i].longitude),
            map: map,
            icon: iconBase + 'public_event_marker.png'

        });

        google.maps.event.addListener(marker, 'click', (function (marker, i) {
            console.log(publicEventInfo[i].eventid);
            return function () {
                var contentString = '<div class="row"><div class="col 12"><div class="card grey lighten-4"><div class="card-content grey-text text-darken-2"><span class="card-title"><a href="#">' + publicEventInfo[i].name + '</a></span><p class="insert"><strong>Time:</strong> ' + publicEventInfo[i].time + "</br><strong>Location: </strong>" + publicEventInfo[i].locationDescription + "</br></br>" + publicEventInfo[i].description + '</p></div><div class="card-action white center"><a class="blue-text title btn-flat white waves-effect waves-white" href="/webpages/event_details.php?eventid=' + publicEventInfo[i].eventid + '">Event Page</a></div></div></div></div>';
                infowindow.setContent(contentString);
                infowindow.open(map, marker);
            }
        })(marker, i));
    }


    for (var i = 0; i < privateEventInfo.length; i++) {
        var marker = new google.maps.Marker({
            position: new google.maps.LatLng(privateEventInfo[i].latitude, privateEventInfo[i].longitude),
            map: map,
            icon: iconBase + 'private_event_marker.png'

        });

        google.maps.event.addListener(marker, 'click', (function (marker, i) {
            return function () {
                var contentString = '<div class="row"><div class="col 12"><div class="card grey lighten-4"><div class="card-content grey-text text-darken-2"><span class="card-title"><a href="#">' + privateEventInfo[i].name + '</a></span><p class="insert"><strong>Time:</strong> ' + privateEventInfo[i].time + "</br><strong>Location: </strong>" + privateEventInfo[i].locationDescription + "</br></br>" + privateEventInfo[i].description + '</p></div><div class="card-action white center"><a href="/webpages/event_details.php?eventid="' + privateEventInfo[i].eventid + ' class="blue-text title btn-flat white waves-effect waves-white">Event Page</a></div></div></div></div>';
                infowindow.setContent(contentString);
                infowindow.open(map, marker);
            }
        })(marker, i));
    }


    // Initially displays all events
    generatePublicEvents();
    generatePrivateEvents();

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
            
            var marker = new google.maps.Marker({
                position: new google.maps.LatLng(pos.lat, pos.lng),
                map: map,
                icon: '/img/pin_current_location.png'

            });
            
            var contentString = '<div class="row"><div class="col 12"><div class="card grey lighten-4"><div class="card-content grey-text text-darken-2"><p><strong class="center">Current Location </p></strong><a class="blue-text title btn-flat white waves-effect waves-white" onclick="geoLocator()">Relocate</a></div></div></div></div>';
            
            var infowindow = new google.maps.InfoWindow({
                maxWidth: 250,
                content: contentString
            });
            
            marker.addListener('click', function() {
                infowindow.open(map, marker);
            });


        });
    } else {
        console.log("Location not found!");
        Materialize.toast('Sorry, we could not find your location. Try using another browser.', 3000, 'rounded')
    }
}

function generatePrivateEvents() {

    for (var i = 0; i < privateEventInfo.length; i++) {
        // Dynamically generates PRIVATE card content

        $('#event-panel').append(

            '<div class="row"><div class="col s12"><div class="card grey lighten-4"><div class="card-content grey-text text-darken-2"><div class="card-title col m11"><a href="/webpages/event_details.php?eventid=' + privateEventInfo[i].eventid + '">' +
            privateEventInfo[i].name + '</a><i title="Close" class="material-icons right close">close</i></div><div><i  title="Time" class="material-icons icons-inline left">access_time</i>' + privateEventInfo[i].time + '</div><span class="add-cursor" onclick="centerMap(' + privateEventInfo[i].latitude + ',' + privateEventInfo[i].longitude + ')"><i  title="Location" class="material-icons icons-inline left">place</i>' + privateEventInfo[i].locationDescription + '</span><p>' + privateEventInfo[i].description + '</p></div><div class="card-action grey lighten-3"><ul class="collapsible z-depth-1" data-collapsible="accordion"><li><div class="collapsible-header grey lighten-3"><i class="material-icons left grey-text text-darken-2" title="Event Details">info</i><i class="material-icons left grey-text text-darken-2" title="Map Event\'s Location" onclick="centerMap(' + privateEventInfo[i].latitude + ',' + privateEventInfo[i].longitude + ')">place</i><a href="#" class="blue-text right" onclick="toastDismiss(' + i + ')">Dismiss</a><a href="#" class="blue-text right" onclick="toastGoing(' + i + ')">Going</a></div><div class="collapsible-body"><div class="friends-attending grey-text text-darken-2">FRIENDS ATTENDING:<div class="attendees-preview"><img class="user-thumb circle" src="https://avatars2.githubusercontent.com/u/66782?v=3&s=400" alt=""><img class="user-thumb circle" src="https://avatars2.githubusercontent.com/u/66780?v=3&s=400" alt=""><img class="user-thumb circle" src="https://avatars2.githubusercontent.com/u/66750?v=3&s=400" alt=""><img class="user-thumb circle" src="https://avatars2.githubusercontent.com/u/66740?v=3&s=400" alt=""><span class="user-thumb circle grey darken-2 num-count grey-text text-lighten-4">+3</span></div></div><div class="chip chip-margin-right">' +
            privateEventInfo[i].tag1 + '</div><div class="chip">' + privateEventInfo[i].tag2 +
            '</div></div></li></ul></div></div></div></div>'

        );

    }

    $('.collapsible').collapsible({
        accordion: false // A setting that changes the collapsible behavior to expandable instead of the default accordion style
    });

    // Delete Card
    $("#event-panel .collapsible a:nth-of-type(1)").click(function () {
        deleteCard(this);
    });

    // Going Card
    $("#event-panel .collapsible a:nth-of-type(2)").click(function () {
        //Replaces Dismiss Button
        //        var currentElement = $(this).parentsUntil($(".card-action"));
        //        $(currentElement).find("a:nth-of-type(1)").replaceWith("<a href=\"\" class=\"right blue-text waves-effect waves-white\"><i class=\"material-icons\">save</i></a>");

        var currentElement = $(this).parentsUntil($(".card-action"));
        $(currentElement).find("a:nth-of-type(1)").replaceWith("");
        $(this).replaceWith("<span class=\"green-text right\">GOING! <i class=\"material-icons right\">check_circle</i></span>");
    });


    $("#event-panel .close").click(function () {
        deleteCard(this);
    });

    function deleteCard(currentElement) {
        console.log(this);
        $(currentElement).parentsUntil($("#event-panel")).slideUp("fast", function () {
            $(currentElement).remove();
        });
    }
}

function generatePublicEvents() {

    // Dynamically generates PUBLIC card content

    if (!logged_in) {
        $('#event-panel').append(
            '<div class="row"><div class="col 12"><div class="card red darken-2"><div class="card-content white-text"><span class="card-title">Meet up with friends.</span><p class="insert">Create an account to tell your friends which events you will attend. Also check out which events they\'re hosting for you.</p></div><div class="card-action red darken-4 center"><a href="/webpages/sign_up.php" class="amber-text title btn-flat waves-effect waves-white">Sign Up</a></div></div></div></div>'
        );
    } else if (publicEventInfo.length == 0) {
        $('#event-panel').append(
            '<div class="row"><div class="col 12"><div class="card  grey lighten-3"><div class="card-content"><span class="card-title">😞 No Public Events!</span><p class="insert grey-text text-darken-2">Discover events that interest you. We\'ll keep track of the events you\'re going to.</p></div></div></div></div>'
        );
    }


    for (var i = 0; i < publicEventInfo.length; i++) {
        $('#event-panel').append(

            '<div class="row"><div class="col s12"><div class="card grey lighten-4"><div class="card-content grey-text text-darken-2"><div class="card-title col m11"><a href="/webpages/event_details.php?eventid=' + publicEventInfo[i].eventid + '">' +
            publicEventInfo[i].name + '</a><i title="Close" class="material-icons right close">close</i></div><div><i class="material-icons icons-inline left">public</i>Public Event</div><div><i  title="Time" class="material-icons icons-inline left">access_time</i>' + publicEventInfo[i].time + '</div><span class="add-cursor" onclick="centerMap(' + publicEventInfo[i].latitude + ',' + publicEventInfo[i].longitude + ')"><i  title="Location" class="material-icons icons-inline left">place</i>' + publicEventInfo[i].locationDescription + '</span><p>' + publicEventInfo[i].description + '</p></div><div class="card-action grey lighten-3"><ul class="collapsible z-depth-1" data-collapsible="accordion"><li><div class="collapsible-header grey lighten-3"><i class="material-icons left grey-text text-darken-2" title="Event Details">info</i><i class="material-icons left grey-text text-darken-2" title="Map Event\'s Location" onclick="centerMap(' + publicEventInfo[i].latitude + ',' + publicEventInfo[i].longitude + ')">place</i><a href="#" class="blue-text right" onclick="toastDismiss(' + i + ')">Dismiss</a><a href="#" class="blue-text right" onclick="toastGoing(' + i + ')">Going</a></div><div class="collapsible-body"><div class="friends-attending grey-text text-darken-2">FRIENDS ATTENDING:<div class="attendees-preview"><img class="user-thumb circle" src="https://avatars2.githubusercontent.com/u/66782?v=3&s=400" alt=""><img class="user-thumb circle" src="https://avatars2.githubusercontent.com/u/66780?v=3&s=400" alt=""><img class="user-thumb circle" src="https://avatars2.githubusercontent.com/u/66750?v=3&s=400" alt=""><img class="user-thumb circle" src="https://avatars2.githubusercontent.com/u/66740?v=3&s=400" alt=""><span class="user-thumb circle grey darken-2 num-count grey-text text-lighten-4">+3</span></div></div><div class="chip chip-margin-right">' +
            publicEventInfo[i].tag1 + '</div><div class="chip">' + publicEventInfo[i].tag2 +
            '</div></div></li></ul></div></div></div></div>'

        );

    }

    $('.collapsible').collapsible({
        accordion: false // A setting that changes the collapsible behavior to expandable instead of the default accordion style
    });

}

function generateAllEvents() {
    clearEvents();
    generatePublicEvents();
    generatePrivateEvents();
}

function generateUpcomingEvents() {
    clearEvents();
    
    $('#event-panel').append(
        '<div class="row"><div class="col 12"><div class="card  grey lighten-3"><div class="card-content"><span class="card-title">😞 No Upcoming Events!</span><p class="insert grey-text text-darken-2">This is hard coded! Discover events that interest you. We\'ll keep track of the events you\'re going to.</p></div></div></div></div>'
    );
    
}

function generateEventDetails(event) {
    $('.dyn_event-name').text(event.name);
    $('.dyn_host-name').text(event.hostname);
    $('.dyn_event-location').text(event.locationDescription);
    $('.dyn_event-time').text(event.time + " -- " + event.endDate);
    $('.dyn_event-desc').text(event.description);
    $('.dyn_tag1').text(event.tag1);
    $('.dyn_tag2').text(event.tag2);
    
    $('.dyn_gcal-export').attr("href", "https://calendar.google.com/calendar/render?action=TEMPLATE&text=" + event.name + "&dates=20160127T224000Z/20160320T221500Z&details=Location Details: " + event.locationDescription + " //  Event Details: " + event.description + "&location=" + event.latitude + ", " + event.longitude + "&sf=true&output=xml#eventpage_6");
}


function clearEvents() {
    isPrivateTabActive++;
    $('#event-panel').children().remove();

}

function toastGoing(cardIndex) {
    Materialize.toast('Going to event ' + cardIndex, 4000);
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