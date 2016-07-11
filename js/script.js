// Note: This example requires that you consent to location sharing when
// prompted by your browser. If you see the error "The Geolocation service
// failed.", it means you probably did not give permission for the browser to
// locate you.


var filters = {
    pos: {
        lat: 40.606709,
        lng: -75.375634
    },
    radius: 2,
    date_start: moment("2015-01-01"), //UPDATE UPDATE UPDATE UPDATE -- REMOVE PARAMETERS
    date_end: moment().add(3, 'months')
};

$(document).ready(function () {

    $(".hamburger-menu").sideNav();
    
    $('.collapsible').collapsible({
        accordion: false // A setting that changes the collapsible behavior to expandable instead of the default accordion style
    });

//    $('.datepicker').pickadate({
//        selectMonths: true, // Creates a dropdown to control month
//        selectYears: 10 // Creates a dropdown of 15 years to control year
//    });

    $('#filters .chip').click(function(e) {
        e.preventDefault();
        var chips = $('#filters .chip');
        chips.removeClass('active invert');
        
        if ($(this).text() == 'Weekend') {
            filters.date_start = moment().day(5);
            filters.date_end = moment().day(7);
            
        }
        else {
            filters.date_end = moment().add(1, $(this).text());
        }
        $(this).addClass('active invert');
        
        getEvents();
        
    });
    
    $('#filter-events').click(function(e) {
        e.preventDefault();
        
    });
    
    $('#filters *').click(function() {
       $('.refresh').addClass('active invert');
    });
    
    $('.refresh').click(function(e) {
        e.preventDefault();
        $('.refresh').removeClass('active invert');
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
            
            console.log("lat: " + filters.pos.lat);

            map.setZoom(15);
            map.setCenter(filters.pos);

            var marker = new google.maps.Marker({
                position: new google.maps.LatLng(filters.pos.lat, filters.pos.lng),
                map: map,
                icon: '/img/markers/pin_current_location_glow.png'

            });

            var contentString = '<div class="row"><div class="col 12"><div class="card grey lighten-4"><div class="card-content grey-text text-darken-2"><p><strong class="center">Current Location </p></strong><a class="blue-text title btn-flat white waves-effect waves-white" onclick="geoLocator()">Relocate</a></div></div></div></div>';

            var infowindow = new google.maps.InfoWindow({
                maxWidth: 150,
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

    var events = {
        publicEvents: function () {
            return $.getJSON('/php/getPublicEvents.php', {
                lat: filters.pos.lat,
                lng: filters.pos.lng,
                radius: filters.radius,
                start_date: filters.date_start.format("YYYY-MM-DD") ,
                start_time: filters.date_start.format("HH:mm:ss"),
                end_date: filters.date_end.format("YYYY-MM-DD"),
                end_time: filters.date_end.format("HH:mm:ss")
            }).then(function (data) {
                return data;
            });
        },
        privateEvents: function () {
            return $.getJSON('/php/getPrivateEvents.php', {
                lat: filters.pos.lat,
                lng: filters.pos.lng,
                radius: filters.radius,
                start_date: filters.date_start.format("YYYY-MM-DD") ,
                start_time: filters.date_start.format("HH:mm:ss"),
                end_date: filters.date_end.format("YYYY-MM-DD"),
                end_time: filters.date_end.format("HH:mm:ss")
            }).then(function (data) {
                return data;
            });
        }
    };

    
    clearEvents();
    $('#preloader-indef').fadeIn(350);
    
    // Promises
    
    var promisePub = events.publicEvents().done(function (eventInfo) {
        genEvents(eventInfo, "Public");
    });
    promisePub.fail(function(error) {
        genCustCard("Sorry!", "We were unable to get the public events. Try refreshing the page or contact us. ", "red darken-2");
        genCustCard("For Our Hard-working Devs:", error.responseText, "blue-grey darken-2");
        $('#preloader-indef').fadeOut(350);
    });
    
    if (logged_in) {
        var promisePriv = events.privateEvents().done(function (eventInfo) {
            genEvents(eventInfo, "Private");
        });
        
        promisePriv.fail(function(error) {
            genCustCard("Sorry!", "We were unable to get the private events. Try refreshing the page or contact us. ", "red darken-2");
            genCustCard("For Our Hard-working Devs:", error.responseText, "blue-grey darken-2");
            $('#preloader-indef').fadeOut(350);
        });
        
        Promise.all([promisePub, promisePriv]).then(eventInfo => {
            genClusters();
            genHandlers();
        }, function(reason) {
            console.log(reason);
        });
    }
    else {
        promisePub.done(function () {
            genClusters();
            genHandlers();
        });
    }

}

function genCustCard(title, body, bgcolor) {
    $('#event-panel').append(
        '<div class="row"><div class="col 12"><div class="card ' + bgcolor + '"><div class="card-content white-text"><span class="card-title">'+ title +'</span><p class="insert">'+ body  +'</p></div></div></div></div>'
    );
}

function genClusters() {
    // Markers are no longer put on map, until MarkerClusterer is called since map: map property of markers is removed

    $('.determinate').width('100%');

    var options = {
        imagePath: '/img/markers/m',
        maxZoom: 16,
        zoomOnClick: false
    };
    markerCluster = new MarkerClusterer(map, markers, options);

    
    var infoWindow = new google.maps.InfoWindow({
        maxWidth: 300,
    });
    
    google.maps.event.addListener(infoWindow, 'domready', function() {
        styleInfoWin(infoWindow);
    });
    
    google.maps.event.addListener(markerCluster, 'clusterclick', function(cluster) {
        console.log(cluster);
        var m = cluster.getMarkers(); 
        var eventTitle = [];

        for (i = 0; i < m.length; i++) {
            
            eventTitle.push("<span class='add-cursor' onclick='centerMap(" + m[i].position.lat() + ", "+ m[i].position.lng() + ")'><strong>" + m[i].getTitle() + "</strong></span>" + '<br>');
        }
        if (map.getZoom() <= markerCluster.getMaxZoom()) {
//            infoWindow.setContent('<div class="row customInfoWin"><div class="col 12"><div class="card"><div class="card-content blue-grey-text text-darken-2"><span class="card-title">'+ m.length +'</span><p class="insert">'+ eventTitle.join("") +'</p></div></div></div></div>');
            infoWindow.setContent('<div class="row customInfoWin"><div class="col 12"><div class="card"><div class="card-content blue-grey-text text-darken-2"><span class="card-title">'+ m.length +' Events</span><p>'+ eventTitle.join("") +'</p></div></div></div></div>');
//            infoWindow.setContent("<strong>" + m.length + " Events</strong><br>" + eventTitle.join(""));
            infoWindow.setPosition(cluster.getCenter());
            infoWindow.open(map);
        } 
    });

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
    eventInfo.reverse();
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
            '<div class="row"><div class="col 12"><div class="card white"><div class="card-content"><span class="card-title">😞 No ' + type + ' Events!</span><p class="insert grey-text text-darken-2">Discover events that interest you. We\'ll keep track of the events you\'re going to.</p></div></div></div></div>'
        );
    }

    for (var i = 0; i < eventInfo.length; i++) {
        eventInfo[i].time = moment(eventInfo[i].time, "YYYY-MM-DD HH:mm:ss");
        $('#event-panel').append(
            '<div class="row"><div class="col s12"><div class="card white hoverable" onmouseenter="highlight_marker(' + numEvents + ')" onmouseleave="restore_marker(' + numEvents + ', ' + '\'public\'' + ' )"><div class="card-content blue-grey-text text-lighten-1"><div class="card-title col s12"><a href="/webpages/event_details.php?eventid=' + eventInfo[i].eventid + '">' + eventInfo[i].name + '</a><i title="Close" class="material-icons right close">close</i></div><div><i class="material-icons icons-inline left">public</i>'+ type +' Event</div><div><i  title="Time" class="material-icons icons-inline left">access_time</i>' + eventInfo[i].time.format("dddd, MMMM Do YYYY, h:mm a") + '</div><div><i  title="Time" class="material-icons icons-inline left">access_time</i>' + eventInfo[i].time.fromNow() + '</div><span class="add-cursor" onclick="centerMap(' + eventInfo[i].latitude + ',' + eventInfo[i].longitude + ')"><i  title="Location" class="material-icons icons-inline left">place</i>' + eventInfo[i].locationDescription + '</span><p>' + eventInfo[i].description + '</p></div><div class="card-action grey lighten-3"><ul class="collapsible z-depth-1" data-collapsible="accordion"><li><div class="collapsible-header grey lighten-3"><i class="material-icons left grey-text text-darken-2" title="Event Details">info</i><i class="material-icons left grey-text text-darken-2  hide-on-small-only" title="Map Event\'s Location" onclick="centerMap(' + eventInfo[i].latitude + ',' + eventInfo[i].longitude + ')">place</i><a href="#" class="blue-text right" onclick="toastDismiss(' + i + ')">Dismiss</a><a href="#" class="blue-text right" onclick="toastGoing(' + i + ')">Going</a></div><div class="collapsible-body"><div class="friends-attending grey-text text-darken-2">FRIENDS ATTENDING:<div class="attendees-preview"><img class="user-thumb circle" src="https://avatars2.githubusercontent.com/u/66782?v=3&s=400" alt=""><img class="user-thumb circle" src="https://avatars2.githubusercontent.com/u/63884?v=3&s=400" alt=""><img class="user-thumb circle" src="https://avatars2.githubusercontent.com/u/66750?v=3&s=400" alt=""><img class="user-thumb circle" src="https://avatars2.githubusercontent.com/u/63882?v=3&s=400" alt=""><span class="user-thumb circle grey darken-2 num-count grey-text text-lighten-4">+3</span></div></div><div class="chip chip-margin-right">' + eventInfo[i].tag1 + '</div><div class="chip">' + eventInfo[i].tag2 + '</div></div></li></ul></div></div></div></div>'
        );
        numEvents++;
    }
}

function genMarkers(eventInfo, type) {
    for (var i = 0; i < eventInfo.length; i++) {

        var marker = new google.maps.Marker({
            position: new google.maps.LatLng(eventInfo[i].latitude, eventInfo[i].longitude),
            icon: markerIcons(type),
            title: eventInfo[i].name
        });
        
//        google.maps.event.addListener(marker, 'click', (function (marker, i) {
//            return function () {
//                infowindow.open(map, marker);
//            }
//        })(marker, i));

        markers.push(marker);

        var infowindow = new google.maps.InfoWindow({
            maxWidth: 250
        });

        google.maps.event.addListener(infowindow, 'domready', function() {
            styleInfoWin(infowindow);
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

function styleInfoWin(infowindow) {
    
    google.maps.event.addListener(map, 'click', function() {
        infowindow.close();
    });

    // Reference to the DIV that wraps the bottom of infowindow
    var iwOuter = $('.gm-style-iw');

    /* Since this div is in a position prior to .gm-div style-iw.
     * We use jQuery and create a iwBackground variable,
     * and took advantage of the existing reference .gm-style-iw for the previous div with .prev().
    */
    var iwBackground = iwOuter.prev();

    // Removes background shadow DIV
    iwBackground.children(':nth-child(2)').css({'display' : 'none'});

    // Removes white background DIV
    iwBackground.children(':nth-child(4)').css({'display' : 'none'});

    // Moves the infowindow 115px to the right.
    iwOuter.parent().parent().css({left: '10px'});
    // Moves the infowindow 115px to the right.
    iwOuter.parent().parent().css({top: '60px'});

    // Moves the shadow of the arrow 76px to the left margin.
    iwBackground.children(':nth-child(1)').css({'display' : 'none'});
    iwBackground.children(':nth-child(3)').css({'display' : 'none'});
    //
    ////             Moves the arrow 76px to the left margin.
    //            iwBackground.children(':nth-child(3)').attr('style', function(i,s){ return s + 'left: 110px !important;'});
    //            iwBackground.children(':nth-child(3)').attr('style', function(i,s){ return s + 'top: 308px !important;'});

    // Changes the desired tail shadow color.
    //            iwBackground.children(':nth-child(3)').find('div').children().css({'box-shadow': 'rgba(72, 181, 233, 0.6) 0px 1px 6px', 'z-index' : '1'});

    // Reference to the div that groups the close button elements.
    var iwCloseBtn = iwOuter.next();

    // Apply the desired effect to the close button
    iwCloseBtn.css({opacity: '1', right: '55px', top: '23px', border: '0px solid #48b5e9', 'border-radius': '13px'});

    // If the content of infowindow not exceed the set maximum height, then the gradient is removed.
    if($('.iw-content').height() < 140){
        $('.iw-bottom-gradient').css({display: 'none'});
    }

    // The API automatically applies 0.7 opacity to the button after the mouseout event. This function reverses this event to the desired value.
    iwCloseBtn.mouseout(function(){
        $(this).css({opacity: '1'});
    });
}

function getAttendingEvents() {
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
    if (typeof markerCluster !== 'undefined') {
            markerCluster.clearMarkers();
            markers = [];
            numEvents = 0;
    }
    
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

    switch (type.toLowerCase()) {
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