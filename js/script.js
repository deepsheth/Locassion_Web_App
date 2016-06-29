// Note: This example requires that you consent to location sharing when
// prompted by your browser. If you see the error "The Geolocation service
// failed.", it means you probably did not give permission for the browser to
// locate you.


var filters = {
    pos: {
        lat: -75.375634,
        lng: 40.606709
    },
    radius: 2,
    date_start: {
        year: "2014",
        month: "11",
        day: "13"
    },
    date_end: {
        year: "2020",
        month: "11",
        day: "13"
    },
    time_start: {
        hour: "16",
        minute: "00",
        seconds: "00"
    },
    time_end: {
        hour: "16",
        minute: "00",
        seconds: "00"
    }
};

$(document).ready(function () {

    $('.collapsible').collapsible({
        accordion: false // A setting that changes the collapsible behavior to expandable instead of the default accordion style
    });

    // the "href" attribute of .modal-trigger must specify the modal ID that wants to be triggered
    $('.modal-trigger').leanModal();

    var count1 = 0;
    $('#friend-dashboard .friend-list-cards .card-panel').click(function () {
        count1 = selectCard(this, count1);
    });

    var count2 = 0;
    $('#invite_modal .card-panel').click(function () {
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
var markers = [];
var numEvents = 0;
var markerCluster;

function initMap() {


    // Gets all events
    getEvents();


    $('.determinate').width('10%');

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

    $('.determinate').width('40%');

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

    $('.determinate').width('70%');


    $('.determinate').width('85%');

    //    google.maps.event.addListener(map, 'idle', reRender);

}

function reRender() {
    filters.pos.lat = (map.getBounds().getNorthEast().lat() + map.getBounds().getSouthWest().lat()) / 2;
    filters.pos.lng = (map.getBounds().getNorthEast().lng() + map.getBounds().getSouthWest().lng()) / 2;

    markerCluster.clearMarkers();
    getEvents();
}

function geoLocator() {
    // Try HTML5 geolocation.
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(function (position) {

            filters.pos.lat = position.coords.latitude;
            filters.pos.lng = position.coords.longitude;
            
//            console.log("lat: " + filters.pos.lat);

            map.setZoom(15);
            map.setCenter(filters.pos);

            var marker = new google.maps.Marker({
                position: new google.maps.LatLng(filters.pos.lat, filters.pos.lng),
                map: map,
                icon: '/img/markers/pin_current_location.png'

            });

            var contentString = '<div class="row"><div class="col 12"><div class="card grey lighten-4"><div class="card-content grey-text text-darken-2"><p><strong class="center">Current Location </p></strong><a class="blue-text title btn-flat white waves-effect waves-white" onclick="geoLocator()">Relocate</a></div></div></div></div>';

            var infowindow = new google.maps.InfoWindow({
                maxWidth: 250,
                content: contentString
            });

            marker.addListener('click', function () {
                infowindow.open(map, marker);
            });


        });
    } else {
        console.log("Location not found!");
        Materialize.toast('Sorry, we could not find your location. Try using another browser.', 3000, 'rounded')
    }
}

function getEvents() {

console.log(filters.pos.lat + ";" + filters.pos.lng + ";" + filters.radius + ";" + filters.date_start.year + "-" + filters.date_start.month + "-" + filters.date_start.day + ":" + filters.time_start.hour + ":" + filters.time_start.minute + ":" + filters.time_start.seconds + ";" + filters.date_end.year + ";" + filters.date_end.month + ";" + filters.date_end.day + ";" + filters.time_end.hour + ";" + filters.time_end.minute + ";" + filters.time_end.seconds);

    var events = {
        publicEvents: function () {
            return $.getJSON('/php/getPublicEvents.php', {
                lat: filters.pos.lat,
                lng: filters.pos.lng,
                radius: filters.radius,
                start_year: filters.date_start.year,
                start_month: filters.date_start.month,
                start_day: filters.date_start.day,
                start_hour: filters.time_start.hour,
                start_min: filters.time_start.minute,
                start_sec: filters.time_start.seconds,
                end_year: filters.date_end.year,
                end_month: filters.date_end.month,
                end_day: filters.date_end.day,
                end_hour: filters.time_end.hour,
                end_min: filters.time_end.minute,
                end_sec: filters.time_end.seconds,
            }).then(function (data) {
                return data;
            });
        },
        privateEvents: function () {
            return $.getJSON('/php/getPrivateEvents.php', {
                lat: filters.pos.lat,
                lng: filters.pos.lng,
                radius: filters.radius,
                start_year: filters.date_start.year,
                start_month: filters.date_start.month,
                start_day: filters.date_start.day,
                start_hour: filters.time_start.hour,
                start_min: filters.time_start.minute,
                start_sec: filters.time_start.seconds,
                end_year: filters.date_end.year,
                end_month: filters.date_end.month,
                end_day: filters.date_end.day,
                end_hour: filters.time_end.hour,
                end_min: filters.time_end.minute,
                end_sec: filters.time_end.seconds
            }).then(function (data) {
                return data;
            });
        }
    };

    
    clearEvents();
    $('#preloader-indef').fadeIn(350);
    
    // Promises
    events.publicEvents().done(function (eventInfo) {
        genEvents(eventInfo, "public");
    });
    events.privateEvents().done(function (eventInfo) {
        genEvents(eventInfo, "private");
    });

    if (logged_in) {
        // Once first two async functions are called, markers will be generated
        $.when(events.publicEvents(), events.privateEvents()).done(function () {
            genClusters();
            genHandlers();
        });
    }
    else {
        $.when(events.publicEvents()).done(function () {
            genClusters();
            genHandlers();
        });
    }

}

function genClusters() {
    // Markers are no longer put on map, until MarkerClusterer is called since map: map property of markers is removed

    $('.determinate').width('100%');

    var options = {
        imagePath: '/img/markers/m'
    };
    markerCluster = new MarkerClusterer(map, markers, options);


    setTimeout(function () {
        $('.determinate').fadeOut(350);
    }, 350);

}

function genHandlers() {
    
    $('#preloader-indef').fadeOut(350);
    
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
}

// Runs for each type of event (public/private events)
function genEvents(eventInfo, type) {
    genCards(eventInfo, type);
    genMarkers(eventInfo, type);
}

function genCards(eventInfo, type) {
    if (!logged_in) {
        $('#event-panel').append(
            '<div class="row"><div class="col 12"><div class="card red darken-2"><div class="card-content white-text"><span class="card-title">Meet up with friends.</span><p class="insert">Create an account to tell your friends which events you will attend. Also check out which events they\'re hosting for you.</p></div><div class="card-action red darken-4 center"><a href="/webpages/sign_up.php" class="amber-text title btn-flat waves-effect waves-white">Sign Up</a></div></div></div></div>'
        );
    } else if (eventInfo.length == 0) {
        $('#event-panel').append(
            '<div class="row"><div class="col 12"><div class="card white"><div class="card-content"><span class="card-title">😞 No ' + type.toUpperCase + ' Events!</span><p class="insert grey-text text-darken-2">Discover events that interest you. We\'ll keep track of the events you\'re going to.</p></div></div></div></div>'
        );
    }

    for (var i = 0; i < eventInfo.length; i++) {
        eventInfo[i].time = moment(eventInfo[i].time, "YYYY-MM-DD HH:mm:ss");
        $('#event-panel').append(
            '<div class="row"><div class="col s12"><div class="card white hoverable" onmouseenter="highlight_marker(' + numEvents + ')" onmouseleave="restore_marker(' + numEvents + ', ' + '\'public\'' + ' )"><div class="card-content blue-grey-text text-lighten-1"><div class="card-title col s12"><a href="/webpages/event_details.php?eventid=' + eventInfo[i].eventid + '">' + eventInfo[i].name + '</a><i title="Close" class="material-icons right close">close</i></div><div><i class="material-icons icons-inline left">public</i>'+ type.toUpperCase() +' Event</div><div><i  title="Time" class="material-icons icons-inline left">access_time</i>' + eventInfo[i].time.format("dddd, MMMM Do YYYY, h:mm a") + '</div><div><i  title="Time" class="material-icons icons-inline left">access_time</i>' + eventInfo[i].time.fromNow() + '</div><span class="add-cursor" onclick="centerMap(' + eventInfo[i].latitude + ',' + eventInfo[i].longitude + ')"><i  title="Location" class="material-icons icons-inline left">place</i>' + eventInfo[i].locationDescription + '</span><p>' + eventInfo[i].description + '</p></div><div class="card-action grey lighten-3"><ul class="collapsible z-depth-1" data-collapsible="accordion"><li><div class="collapsible-header grey lighten-3"><i class="material-icons left grey-text text-darken-2" title="Event Details">info</i><i class="material-icons left grey-text text-darken-2  hide-on-small-only" title="Map Event\'s Location" onclick="centerMap(' + eventInfo[i].latitude + ',' + eventInfo[i].longitude + ')">place</i><a href="#" class="blue-text right" onclick="toastDismiss(' + i + ')">Dismiss</a><a href="#" class="blue-text right" onclick="toastGoing(' + i + ')">Going</a></div><div class="collapsible-body"><div class="friends-attending grey-text text-darken-2">FRIENDS ATTENDING:<div class="attendees-preview"><img class="user-thumb circle" src="https://avatars2.githubusercontent.com/u/66782?v=3&s=400" alt=""><img class="user-thumb circle" src="https://avatars2.githubusercontent.com/u/63884?v=3&s=400" alt=""><img class="user-thumb circle" src="https://avatars2.githubusercontent.com/u/66750?v=3&s=400" alt=""><img class="user-thumb circle" src="https://avatars2.githubusercontent.com/u/63882?v=3&s=400" alt=""><span class="user-thumb circle grey darken-2 num-count grey-text text-lighten-4">+3</span></div></div><div class="chip chip-margin-right">' + eventInfo[i].tag1 + '</div><div class="chip">' + eventInfo[i].tag2 + '</div></div></li></ul></div></div></div></div>'
        );
        numEvents++;
    }
}

function genMarkers(eventInfo, type) {
    for (var i = 0; i < eventInfo.length; i++) {

        var marker = new google.maps.Marker({
            position: new google.maps.LatLng(eventInfo[i].latitude, eventInfo[i].longitude),
            icon: markerIcons(type)

        });

        markers.push(marker);

        var infowindow = new google.maps.InfoWindow({
            maxWidth: 250
        });

        google.maps.event.addListener(marker, 'click', (function (marker, i) {
            return function () {
                var contentString = '<div class="row customInfoWin"><div class="col 12"><div class="card grey lighten-4"><div class="card-content grey-text text-darken-2"><span class="card-title"><a href="#">' + eventInfo[i].name + '</a></span><p class="insert"><strong>Time:</strong> ' + eventInfo[i].time + "</br><strong>Location: </strong>" + eventInfo[i].locationDescription + "</br></br>" + eventInfo[i].description + '</p></div><div class="card-action white center"><a class="blue-text title btn-flat white waves-effect waves-white" href="/webpages/event_details.php?eventid=' + eventInfo[i].eventid + '">Event Page</a></div></div></div></div>';
                infowindow.setContent(contentString);
                infowindow.open(map, marker);
            }
        })(marker, i));
    }

}

function generateUpcomingEvents() {
    clearEvents();

    $('#event-panel').append(
        '<div class="row"><div class="col 12"><div class="card  grey lighten-3"><div class="card-content"><span class="card-title">😞 No Upcoming Events!</span><p class="insert grey-text text-darken-2">This is hard coded! Discover events that interest you. We\'ll keep track of the events you\'re going to.</p></div></div></div></div>'
    );

}

function generateEventDetails(event) {

    var date = moment(event.time);

    var picker = $('.dyn_event-time').pickadate().pickadate('picker');
    picker.set('highlight', date.toDate());


    moment.locale('en', {
        calendar: {
            lastDay: '[Yesterday at] LT',
            sameDay: '[Today at] LT',
            nextDay: '[Tomorrow at] LT',
            lastWeek: '[last] dddd [at] LT',
            nextWeek: 'dddd [at] LT',
            sameElse: 'MMMM Do YYYY'
        }
    });

    $('.dyn_event-name').text(event.name);
    $('.dyn_host-name').text(event.hostname);
    $('.dyn_event-location').text(event.locationDescription);
    $('.dyn_event-time').text(moment(event.time, "YYYY-MM-DD HH:mm:ss a").calendar());
    $('.dyn_event-desc').text(event.description);
    $('.dyn_tag1').text(event.tag1);
    $('.dyn_tag2').text(event.tag2);

    $('.dyn_gcal-export').attr("href", "https://calendar.google.com/calendar/render?action=TEMPLATE&text=" + event.name + "&dates=20160127T224000Z/20160320T221500Z&details=Location Details: " + event.locationDescription + " //  Event Details: " + event.description + "&location=" + event.latitude + ", " + event.longitude + "&sf=true&output=xml#eventpage_6");
}


function clearEvents() {
    $('#event-panel').children().remove();

}

function deleteCard(currentElement) {
    console.log(this);
    $(currentElement).parentsUntil($("#event-panel")).slideUp("fast", function () {
        $(currentElement).remove();
    });
}

function toastGoing(cardIndex) {
    Materialize.toast('Going to event ' + cardIndex, 4000);
}

function toastDismiss(cardIndex) {
    Materialize.toast('NOT going to event ' + cardIndex, 4000);
}

function centerMap(latitude, longitude) {
    var pos = {
        lat: latitude,
        lng: longitude
    };
    map.panTo(pos);
    map.setZoom(18);
}

function highlight_marker(index) {
    markers[index].setIcon(markerIcons('highlight'));
}

function restore_marker(index, type) {
    markers[index].setIcon(markerIcons(type));
}

function markerIcons(type) {

    var iconBase = "/img/markers/";

    switch (type) {
    case 'public':
        return {
            url: iconBase + 'public_event_marker.png'
        };
    case 'private':
        return {
            url: iconBase + 'private_event_marker.png'
        };
    case 'highlight':
        return {
            url: iconBase + 'gold_event_marker.png'
        };
    default:
        return {
            url: iconBase + 'gold_event_marker.png'
        };
    }
}

function logOut() {
    $.post('/php/login.php', {
        logout: "logout"
    }, function (data) {
        window.location.href = '/';
    });

}