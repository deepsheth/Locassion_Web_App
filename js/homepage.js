var filters = {
    pos: {
        lat: 40.606709,
        lng: -75.375634
    },
    radius: 2,
    load: {
        public: true,
        private: true
    },
    date_start: moment().subtract(1, 'year'),
    date_end: moment().add(3, 'months')
};

$(document).ready(function () {

    $(".hamburger-menu").sideNav();
    $(".side-bar-right").sideNav({
        menuWidth: '25em',
        edge: 'right'
    });
    $('select').material_select();
    $('.collapsible').collapsible({
        accordion: false // A setting that changes the collapsible behavior to expandable instead of the default accordion style
    });

    $('.category-chip').material_chip({
        placeholder: '+Tags',
    });

    

    validateChips();

    $('.datepicker').pickadate({
        selectMonths: true, // Creates a dropdown to control month
        selectYears: 10, // Creates a dropdown of 15 years to control year
        clear: ''
    });

    $('#filters .chip').click(function (e) {
//        e.preventDefault();
        var chips = $('#filters .chip');
        chips.removeClass('active invert');

        if ($(this).text() == 'Weekend') {
            filters.date_start = moment().day(5);
            filters.date_end = moment().day(7);

        } else {
            filters.date_end = moment().add(1, $(this).text());
        }
        $(this).addClass('active invert');

        getEvents();

    });

    $('#filter-events').click(function (e) {
        e.preventDefault();

    });

    $('#filters *').click(function () {
        $('.refresh').addClass('active invert');
    });

    $('.refresh').click(function (e) {
        e.preventDefault();
        $('.refresh').removeClass('active invert');
    });

});


var map;
var markers = [];
var numEvents = 0;
var markerCluster;

function initMap() {

    $('#preloader-indef').fadeIn(350);

    firebase.auth().onAuthStateChanged(function (user) {
        clearMenu();
        if (user) {
            // signed in.
            addMenuButton("create_event");
            addMenuButton("dropdown");

        } else {
            // No user is signed in.
            addMenuButton("create_event_disabled");
            addMenuButton("login");
            addMenuButton("sign_up");

            // Card that asks user to sign up
            $('#event-panel').append('<div class="row"><div class="col 12"><div class="card red darken-2"><div class="card-content white-text"><span class="card-title">Meet up with friends.</span><p class="insert">Create an account to tell your friends which events you will attend. Also check out which events they\'re hosting for you.</p></div><div class="card-action red darken-4 center"><a href="/webpages/sign_up.php" class="amber-text title btn-flat waves-effect waves-white">Sign Up</a></div></div></div></div>');
        }
        
        // Gets all events
        getEvents();

    });

    map = new google.maps.Map(document.getElementById('map'), {
        center: {
            lat: 40.6054,
            lng: -75.3778
        },
        zoom: 16,
    });

    geoLocator();

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

    // REMEMBER LONGITUDE AND LATITUDE ARE REVERSED
    clearEvents();
    var numEvents = 0;
    
    getSpecificEvents("/events/public", "public");
    
    if (firebase.auth().currentUser != null) {
        getSpecificEvents("/events/private", "private");
    }
    genDynHandlers();
}

function getSpecificEvents(ref, icon) {
    var events = firebase.database().ref(ref);

    events.on('child_added', function(snapshot) {
        var eventInfo = snapshot.val();
        var cardGenerated = genEventCard(eventInfo, snapshot.key, icon, numEvents);
        numEvents++;
        foldableInit(cardGenerated);
        btnRequestInit();
        cleanTags();
        genMarker(eventInfo, icon);
    }, function(error) {
        switch(error.code) {
            case "PERMISSION_DENIED": 
                if (firebase.auth().currentUser != null) {
                    genCustCard("Permission Denied.", "Error: We had trouble getting the list of private events. Our servers might be undergoing updates and improvements, so sit tight and try again shortly!", "orange accent-3");
                    console.log(error);
                }
                break;
            default: genCustCard(error.code, error.message, "amber");
        }
    });
}

// Icon is optional
function genCustCard(title, body, bgcolor) {
    $('#event-panel').append(
        '<div class="row"><div class="col 12"><div class="card ' + bgcolor + '"><div class="card-content white-text"><span class="card-title">' + title + '</span><p class="insert">' + body + '</p></div></div></div></div>'
    );
}

function genClusters() {
    // Markers are no longer put on map, until MarkerClusterer is called since map: map property of markers is removed

    var options = {
        imagePath: '/img/markers/m',
        maxZoom: 16,
        zoomOnClick: false
    };
    markerCluster = new MarkerClusterer(map, markers, options);


    var infoWindow = new google.maps.InfoWindow({
        maxWidth: 300,
    });

    google.maps.event.addListener(infoWindow, 'domready', function () {
        styleInfoWin(infoWindow);
    });

    google.maps.event.addListener(markerCluster, 'clusterclick', function (cluster) {

        var m = cluster.getMarkers();
        var eventTitle = [];

        for (i = 0; i < m.length; i++) {

            eventTitle.push("<span class='add-cursor' onclick='centerMap(" + m[i].position.lat() + ", " + m[i].position.lng() + ")'><strong>" + m[i].getTitle() + "</strong></span>" + '<br>');
        }
        if (map.getZoom() <= markerCluster.getMaxZoom()) {
            //            infoWindow.setContent('<div class="row customInfoWin"><div class="col 12"><div class="card"><div class="card-content blue-grey-text text-darken-2"><span class="card-title">'+ m.length +'</span><p class="insert">'+ eventTitle.join("") +'</p></div></div></div></div>');
            infoWindow.setContent('<div class="row customInfoWin"><div class="col 12"><div class="card"><div class="card-content blue-grey-text text-darken-2"><span class="card-title">' + m.length + ' Events</span><p>' + eventTitle.join("") + '</p></div></div></div></div>');
            //            infoWindow.setContent("<strong>" + m.length + " Events</strong><br>" + eventTitle.join(""));
            infoWindow.setPosition(cluster.getCenter());
            infoWindow.open(map);
        }
    });
}

function genDynHandlers() {

    $('#preloader-indef').fadeOut(350);


    // Allow cards to open
    $('.collapsible').collapsible({
        accordion: false // A setting that changes the collapsible behavior to expandable instead of the default accordion style
    });

    // Delete Card
    console.log($("#event-panel .collapsible a:nth-of-type(1)"));
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
    
//    foldableInit();
//    btnRequestInit();
//    cleanTags();
}

function genEventCard(eventInfo, event_id, type, eventNum) {
    
    var ref = firebase.database().ref("attending/"+ event_id);
    ref.once("value").then(function(snapshot) {
        console.log(snapshot);
        var a = snapshot.numChildren();
    });
    
    eventInfo.time = moment(eventInfo["start time"], "YYYY-MM-DD HH:mm:ss");
    var past = eventInfo.time.diff(moment()) < 0 ? true : false;

    var cardContent = '<div class="col s12">' +
        '<div class="card dyn" onmouseenter="highlight_marker(' + eventNum + ')" onmouseleave="restore_marker(' + eventNum + ', \'' + type + '\' )">' +
        '<div class="img-wrapper">' +
        '<img class="responsive-img" src="http://www.skiheavenly.com/~/media/heavenly/images/732x260%20header%20images/events-heavenly-header.ashx" alt="">' +
        '</div>' +
        '<div class="card-content">' +
        '<div class="row">' +
        '<div class="col s3 center-align mini-cal add-cursor" onclick="viewCal(event,\'' + eventInfo.time.valueOf() + '\')" title="' + eventInfo.time.toString() + '">' +
        '<div class="day">' + eventInfo.time.format("ddd") + '</div>' +
        '<div class="day-num">' + eventInfo.time.format("D") + '</div>' +
        '<div class="month">' + eventInfo.time.format("MMM") + '</div>' +
        '<div class="context">' + eventInfo.time.fromNow() + '</div>' +
        '</div>' +
        '<div class="col m9 l8 offset-l1 side-info">' +
        '<div class="card-title"><a href="/webpages/event_details.php?eventid=' + eventInfo.eventid + '">' + eventInfo.name + '</a></div>' +
        '<div class="icon-hoverable add-cursor" onclick="centerMap(' + eventInfo.latitude + ',' + eventInfo.longitude + ')"><i title="Location" class="material-icons icons-inline left">place</i>' + eventInfo.address + '</div>' +
        '<div class="small-details">' + eventInfo["location description"] + '</div>' +
        '<div class="icon-hoverable"><i title="Time" class="material-icons icons-inline left">access_time</i>' + eventInfo.time.format("h:mm A") + '</div>' +
        '</div>' +
        '</div>' +
        '<div class="row">' +
        '<div class="center-align">' +
        '<a href="#" class="grey-text text-darken-1">' + eventInfo.hostName + '</a> created this meet up.' +
        '</div>' +
        '</div>' +

        '<div class="fold-body hidden">' +
        '<div class="row row-tight">' +
        '<div class="span-padded center">' + (eventInfo.private ?  '<i title="private" class="material-icons tiny">group</i><span>Private</span>' : '<i title="public" class="material-icons tiny">public</i><span>Public</span>') + 
        '<span>' + '8 Friends — 13 Total Going' + '</span>' +
        '</div>' +
        '<div class="row row-tight">' +
        '<p class="col s12">' +
        eventInfo.description +
        '</p>' +
        '</div>' +
        '<div class="divider"></div>' +
        '<div class="flex-container tags">' +
        '<a href="#" class="chip">#' + eventInfo.tags.tag1 + '</a>' +
        '<a href="#" class="chip">#' + eventInfo.tags.tag2 + '</a>' +
        '<a href="#" class="chip">#' + eventInfo.tags.tag3 + '</a>' +
        '<a href="#" class="chip">#' + eventInfo.tags.tag4 + '</a>' +
        '</div>' +
        '</div>' +

        '</div>' +
        '</div>' +
        '<div class="card-action center-align expand-fold">' +
        '<div class="col s6 pre-btn left-align">' +
        '<a href="#" class="fold-label">More</a><i class="material-icons left" title="Event Details">info</i>'+
        '</div>' +
        '<div class="col s6 right right-align"><a href="#" class="btn-go waves-effect waves-light ' + (past ? "disabled dirty\">Passed</a>" : "\">GO</a>") + '</div>' +
        '</div>' +
        '</div>' +
        '</div>' +
        '</div>';

    $('#event-panel').append( cardContent );
    return $('.card.dyn').eq(numEvents);
}

//function genCards(eventInfo) {
//
//console.log(eventInfo);
//
//    if (eventInfo.length == 0) {
//        $('#event-panel').append(
//            '<div class="row"><div class="col 12"><div class="card white"><div class="card-content"><span class="card-title">😞 No Events Found!</span><p class="insert grey-text text-darken-2">Discover events that interest you. We\'ll keep track of the events you\'re going to.</p></div></div></div></div>'
//        );
//    }
//}

function genMarker(eventInfo, type) {

    var marker = new google.maps.Marker({
        position: new google.maps.LatLng(eventInfo.latitude, eventInfo.longitude),
        icon: type,
        title: eventInfo.name
    });

    // Adds to the markers array, which is necessary for clustering
    markers.push(marker);

    var infowindow = new google.maps.InfoWindow({
        maxWidth: 250
    });

    google.maps.event.addListener(infowindow, 'domready', function () {
        styleInfoWin(infowindow);
    });

    google.maps.event.addListener(marker, 'click', (function (marker) {
        return function () {
            var contentString = '<div class="row customInfoWin"><div class="col 12"><div class="card grey lighten-4"><div class="card-content grey-text text-darken-2"><span class="card-title"><a href="#">' + eventInfo.name + '</a></span><p class="insert"><strong>Time:</strong> ' + eventInfo.time + "</br><strong>Location: </strong>" + eventInfo["location description"] + "</br></br>" + eventInfo.description + '</p></div><div class="card-action white center"><a class="blue-text title btn-flat white waves-effect waves-white" href="/webpages/event_details.php?eventid=' + eventInfo.eventid + '">Event Page</a></div></div></div></div>';
            infowindow.setContent(contentString);
            infowindow.open(map, marker);
        }
    })(marker));

}

function styleInfoWin(infowindow) {

    google.maps.event.addListener(map, 'click', function () {
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
    iwBackground.children(':nth-child(2)').css({
        'display': 'none'
    });

    // Removes white background DIV
    iwBackground.children(':nth-child(4)').css({
        'display': 'none'
    });

    // Moves the infowindow 115px to the right.
    iwOuter.parent().parent().css({
        left: '10px'
    });
    // Moves the infowindow 115px to the right.
    iwOuter.parent().parent().css({
        top: '60px'
    });

    // Moves the shadow of the arrow 76px to the left margin.
    iwBackground.children(':nth-child(1)').css({
        'display': 'none'
    });
    iwBackground.children(':nth-child(3)').css({
        'display': 'none'
    });
    //
    ////             Moves the arrow 76px to the left margin.
    //            iwBackground.children(':nth-child(3)').attr('style', function(i,s){ return s + 'left: 110px !important;'});
    //            iwBackground.children(':nth-child(3)').attr('style', function(i,s){ return s + 'top: 308px !important;'});

    // Changes the desired tail shadow color.
    //            iwBackground.children(':nth-child(3)').find('div').children().css({'box-shadow': 'rgba(72, 181, 233, 0.6) 0px 1px 6px', 'z-index' : '1'});

    // Reference to the div that groups the close button elements.
    var iwCloseBtn = iwOuter.next();

    // Apply the desired effect to the close button
    iwCloseBtn.css({
        opacity: '1',
        right: '55px',
        top: '23px',
        border: '0px solid #48b5e9',
        'border-radius': '13px'
    });

    // If the content of infowindow not exceed the set maximum height, then the gradient is removed.
    if ($('.iw-content').height() < 140) {
        $('.iw-bottom-gradient').css({
            display: 'none'
        });
    }

    // The API automatically applies 0.7 opacity to the button after the mouseout event. This function reverses this event to the desired value.
    iwCloseBtn.mouseout(function () {
        $(this).css({
            opacity: '1'
        });
    });
}

function getAttendingEvents() {
    clearEvents();

    $('#event-panel').append(
        '<div class="row"><div class="col 12"><div class="card  grey lighten-3"><div class="card-content"><span class="card-title">😞 No Upcoming Events!</span><p class="insert grey-text text-darken-2">This is hard coded! Discover events that interest you. We\'ll keep track of the events you\'re going to.</p></div></div></div></div>'
    );

}

function cleanTags() {
    $('.tags .chip').each(function (i) {
        if ($(this).text() == "#") $(this).remove()
    });
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
    $('.dyn_host-name').text(event.hostName);
    $('.dyn_event-location').text(event.locationDescription);
    $('.dyn_event-time').text(moment(event.time, "YYYY-MM-DD HH:mm:ss a").calendar());
    $('.dyn_event-desc').text(event.description);
    $('.dyn_tag1').text(event.tag1);
    $('.dyn_tag2').text(event.tag2);

    if (event.private) $('.dyn_privacy').text("group");

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


// Date is UNIX Timestamp in Milliseconds
function viewCal(event, date) {
    event.stopPropagation();
    var $input = $('.datepicker').pickadate();
    var picker = $input.pickadate('picker');
    picker.set('select', parseInt(date));
    picker.open();
}

function foldableInit(card) {

    // Initializes cards to be collapsed
    card.find('.fold-label').closest('.card').find('.fold-body').stop(true, false).slideUp({
        duration: 350,
        easing: "easeOutQuart",
        queue: false,
        complete: function () {
            $(this).css('height', '')
        }
    });
    
    card.find('.expand-fold').on('click', function () {
        var $this = $(this).find('.fold-label');
       
        // If closed, expand fold
        var folded = $this.closest('.card').find('.fold-body');

        //        folded.stop(true,false).slideDown({ duration: 350, easing: "easeOutQuart", queue: false, complete: function() {folded.css('display', 'block');}
        if ($this.text() == "More") {
            $this.addClass('opened');
            folded.stop(true, false).slideDown({
                duration: 350,
                easing: "easeOutQuart",
                queue: false,
                complete: function () {
                    $(this).css('height', '')
                }
            });
            $this.fadeOut(125, function () {
                $this.text("Less").fadeIn(125);
            });
        } else {
            $this.removeClass('opened');
            folded.stop(true, false).slideUp({
                duration: 350,
                easing: "easeOutQuart",
                queue: false,
                complete: function () {
                    $(this).css('height', '')
                }
            });
            $this.fadeOut(125, function () {
                $this.text("More").fadeIn(125);
            });
        }
    });
}

function btnRequestInit() {
    $('.btn-go').on('click', function (event) {
        event.stopPropagation();
        var $this = $(this);

        if ($this.hasClass("disabled")) return;
        if ($this.hasClass("dirty")) return;

        $this.text("");
        $this.addClass("dirty");
        $this.css('width', '3.5em');


        setTimeout(function () {
            $this.before('<div class="preloader-wrapper active"><div class="spinner-layer spinner-blue-only"><div class="circle-clipper left"><div class="circle"></div></div><div class="gap-patch"><div class="circle"></div></div><div class="circle-clipper right"><div class="circle"></div></div></div></div>');
            $this.fadeTo(100, .1);

            // Call server here
            // Call server here

            setTimeout(function () {
                $this.closest('.preloader-wrapper').remove();
                $this.fadeTo(100, 1);

                btnSuccessful($this);
                //                btnFailure($this);
                $this.css('width', 'auto');

            }, 500);
        }, 400);

    });
}

function validateChips() {
    $('.chips').on('chip.add', function(e, chip){
        var chips = $('.chips .chip');
        chipCheck.limitFour( chips );
        chipCheck.noSpaces( chips , chips.length-1);
    });

    $('.chips').on('chip.delete', function(e, chip){
        chipCheck.checkFirst4($('.chips .chip'), chip.tag);
        
    });
    
    var chipCheck = {
        // Takes array of chips
        limitFour: function(chips) {
            if (chips.length > 4) {
                var currentChip = $('.chips .chip').eq(chips.length-1);
                currentChip.css('background-color', '#ff5252' );
                Materialize.toast("Limit to 4 Tags.", 6000);
            }    
        },
        noSpaces: function(chips, currentIndex) {

            var chip = chips.eq( currentIndex );
            
            if (/\s/.test(chip.text())) {
                chip.css('background-color', '#ff5252' );
                Materialize.toast("Tags cannot have spaces.", 6000);
                return true;
            }
            else {
                return false;
            }
        },
        
        checkFirst4: function(chips, currentChipText) {
            if (chips.length >= 4) {
                var first4Chips = $('.chips .chip').slice(0,4);
                first4Chips.each(function(index) {
                    var containsSpace = chipCheck.noSpaces($('.chips .chip'), index);
                    if (!containsSpace ) {
                        var chip = chips.eq( index );
                        chip.css('background-color', '#F4F4F4');
                    }
                    else {
                        // error message
                    }
                });
            }
        }
    }
}

function btnSuccessful(button) {
    button.text("I'm Going");
    button.addClass("success");
}

function btnFailure(button) {
    button.text("Try Again");
    button.addClass("failure");
}

