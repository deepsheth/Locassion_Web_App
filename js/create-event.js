var address_coordinates = {
    longitude: undefined,
    latitude: undefined
};

var eventTitle,
    isAllDay = false,
    isPrivate = true,
    startDate, endDate,
    startTime, endTime,
    tags = [],
    locationDetails, eventDetails,
    groupInvites, individualInvites;

$(document).ready(function () {

    $('.datepicker').pickadate({
        selectMonths: true, // Creates a dropdown to control month
        selectYears: 5, // Creates a dropdown of 5 years to control year
        formatSubmit: 'yyyy-mm-dd',
<<<<<<< HEAD
        hiddenName: true //submits formatSubmit in POST
    });

=======
        hiddenName: true, //submits formatSubmit in POST
        closeOnSelect: true
    });

    // Disables dates passed
>>>>>>> e72ed424937a216092b98142c502acf4016b321a
    var startDatePicker = $('#start_date').pickadate().pickadate('picker');
    startDatePicker.set({
        'min': true
    });

<<<<<<< HEAD
    startDate = startDatePicker.get('select', 'yyyy-mm-dd');
    
=======
    $('#end_date').pickadate().pickadate('picker').set({
        'min': true,
    });

    startDate = startDatePicker.get('select', 'yyyy-mm-dd');

>>>>>>> e72ed424937a216092b98142c502acf4016b321a
    // Time picker has 15 minute intervals
    $('#start_time').timepicker({
        'step': 30
    });

    $('#end_time').timepicker({
        'step': 30
    });

    /* $('#pick-start-time').focusout(function() {
         var startTime = $('#pick-start-time').val();
         console.log(startTime);
         $('#pick-end-time').val(startTime);
         
         
     });*/

    // Prevents submission of form on map autocomplete
    $("#map").bind("keypress", function (e) {
        if (e.keyCode == 13) {
            $("#btnSearch").attr('value');
            //add more buttons here
            return false;
        }

    });

    // Prevents submission of form
    $("form").submit(function (e) {
        e.preventDefault();
    });


    // Initializes friend select 
    $('select').material_select();


    // Validates form to begin with
    validate();
<<<<<<< HEAD
    
=======

>>>>>>> e72ed424937a216092b98142c502acf4016b321a
    $("input").change(function () {
        $('#error-checking .insert').text(" ");
        validate();
    });
<<<<<<< HEAD


=======
    
    $('.modal-trigger').leanModal();


    var count2 = 0;
    $('#invite_modal .card-panel').click(function () {
        count2 = selectCard(this, count2);
    });
    
    
>>>>>>> e72ed424937a216092b98142c502acf4016b321a
});

function validate() {
    var TITLE_LENGTH = 50,
        TAG_LENGTH = 15,
        DETAIL_LENGTH = 250;

    //$('#event_title').change(function () {
    if ($('#event_title').val().length > TITLE_LENGTH) {
        $('#error-checking').slideDown("medium", function () {
            $('#error-checking').show();
        });
        $('#error-checking .insert').append("<p>Please shorten event title. <b>" + $('#event_title').val().length + "/" + TITLE_LENGTH + " </b>characters used. </p> <br>");
    }
<<<<<<< HEAD
    //});

    /* if ($('#chk_all_day').is(':checked')) {
         $('#start_time').prop('disabled', true);
         $('#end_time').prop('disabled', true);
     }*/
=======

>>>>>>> e72ed424937a216092b98142c502acf4016b321a
    var endDatePicker = $('#end_date').pickadate().pickadate('picker');
    endDate = endDatePicker.get('select', 'yyyy-mm-dd');
    startDate = $('#start_date').pickadate().pickadate('picker').get('select', 'yyyy-mm-dd');

<<<<<<< HEAD
    if ($('#start_date').pickadate().pickadate('picker').get('select') != null)
        endDatePicker.set({
            'min': $('#start_date').pickadate().pickadate('picker').get('select', 'yyyy-mm-dd')
        });


    //$('#chk_all_day').change(function () {
    if ($('#chk_all_day').is(':checked')) {
        $('#start_time').prop('disabled', true);
        $('#end_time').prop('disabled', true);
        $('#start_time').timepicker('setTime', new Date("01 January 1970 00:00:00"));
        $('#end_time').timepicker('setTime', new Date("01 January 1970 23:59:00"))
        isAllDay = true;
    } else {
        $('#start_time').prop('disabled', false);
        $('#end_time').prop('disabled', false);
        isAllDay = false;
    }
=======
    if ($('#start_date').pickadate().pickadate('picker').get('select') != null) {
        var begDate = $('#start_date').pickadate().pickadate('picker').get('select', 'yyyy-mm-dd');

        endDatePicker.set({
            'min': new Date(begDate.substr(0, 4) + "," + begDate.substr(5, 2) + "," + begDate.substr(8, 2))
        });
    }


    //$('#chk_all_day').change(function () {
    //    if ($('#chk_all_day').is(':checked')) {
    //        $('#start_time').prop('disabled', true);
    //        $('#end_time').prop('disabled', true);
    //        $('#start_time').timepicker('setTime', new Date("01 January 1970 00:00:00"));
    //        $('#end_time').timepicker('setTime', new Date("01 January 1970 23:59:00"))
    //        isAllDay = true;
    //    } else {
    //        $('#start_time').prop('disabled', false);
    //        $('#end_time').prop('disabled', false);
    //        isAllDay = false;
    //    }
>>>>>>> e72ed424937a216092b98142c502acf4016b321a

    if ($('#private_true').is(':checked')) {
        isPrivate = true;
    } else {
        isPrivate = false;
    }
    //});

    //    $('#tag-row input').change(function () {
    /*if ( $('#tag-row input').val().length > TAG_LENGTH ){
        console.error("there's an error!");
    }*/

    startTime = $('#start_time').timepicker('getTime').toString().slice(16, 24);
    endTime = $('#end_time').timepicker('getTime').toString().slice(16, 24);


    $.each($('#tag-row input'), function (index) {
        if ($('#tag-row input').eq(index).val().length > TAG_LENGTH) {
            $('#error-checking').slideDown("medium", function () {
                $('#error-checking').show();
            });
            $('#error-checking .insert').append("<p>Please shorten tag " + (index + 1) + ". <b>" + $('#tag-row input').eq(index).val().length + "/" + TAG_LENGTH + " </b>characters used. </p> <br>");
        }

        tags[index] = $('#tag-row input').eq(index).val();
    });


    //    });

}

function initMap() {
    var map = new google.maps.Map(document.getElementById('map'), {
        center: {
            lat: 40.6072,
            lng: -75.3790
        },
        zoom: 13
    });
    var input = /** @type {!HTMLInputElement} */ (
        document.getElementById('pac-input'));

    var types = document.getElementById('type-selector');
    map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);
    map.controls[google.maps.ControlPosition.TOP_LEFT].push(types);

    var autocomplete = new google.maps.places.Autocomplete(input);
    autocomplete.bindTo('bounds', map);

    var infowindow = new google.maps.InfoWindow();
    var infowindowCustom = new google.maps.InfoWindow();
    var marker = new google.maps.Marker({
        map: map,
        anchorPoint: new google.maps.Point(0, -29)
    });

    autocomplete.addListener('place_changed', function () {
        infowindow.close();
        marker.setVisible(false);
        var place = autocomplete.getPlace();
        if (!place.geometry) {
            Materialize.toast('Sorry, we cannot find this location.', 7000);
            $('#map input[type="text"]').css("border", "2px solid #FFC02A");
            $('#map input[type="text"]').css("color", "#E0A800");
            return;
        }

        // If the place has a geometry, then present it on a map.
        if (place.geometry.viewport) {
            map.fitBounds(place.geometry.viewport);
        } else {
            map.setCenter(place.geometry.location);
            map.setZoom(17); // Why 17? Because it looks good.
        }
        //        marker.setIcon( /** @type {google.maps.Icon} */ ({
        //            url: place.icon,
        //            size: new google.maps.Size(71, 71),
        //            origin: new google.maps.Point(0, 0),
        //            anchor: new google.maps.Point(17, 34),
        //            scaledSize: new google.maps.Size(35, 35)
        //        }));
        marker.setPosition(place.geometry.location);
        marker.setVisible(true);

        var address = '';
        if (place.address_components) {
            address = [
                (place.address_components[0] && place.address_components[0].short_name || ''),
                (place.address_components[1] && place.address_components[1].short_name || ''),
                (place.address_components[2] && place.address_components[2].short_name || '')
      ].join(' ');
        }

        infowindow.setContent('<div><strong>' + place.name + '</strong><br>' + address);
        infowindow.open(map, marker);

        // If location is found USING AUTOCOMPLETE, address coordinates returned
        address_coordinates = autocomplete.getPlace();
        address_coordinates.latitude = address_coordinates.geometry.location.lat();
        address_coordinates.longitude = address_coordinates.geometry.location.lng();
        Materialize.toast('Got it! Event location set.', 3000);
        $('#map input[type="text"]').css("border", "2px solid #2196F3");
        $('#map input[type="text"]').css("color", "#2196F3");
        /*console.log(address_coordinates.longitude);
        console.log(address_coordinates.latitude);*/

    });


    // Allows user to select location by marker
    var marker;
    google.maps.event.addListener(map, "click", function (event) {
        address_coordinates.latitude = event.latLng.lat();
        address_coordinates.longitude = event.latLng.lng();
        // populate yor box/field with lat, lng
        Materialize.toast('Got it! Event location set.', 3000);
        $('#map input[type="text"]').css("border", "2px solid #2196F3");
        $('#map input[type="text"]').css("color", "#2196F3");

        marker.setMap(null); //clears previous marker -- allows only 1 marker on map
        marker = new google.maps.Marker({
            position: event.latLng,
            map: map,
            title: 'Event Coordinates'
        });

        infowindow.setContent('<div><strong>Location Set! </strong><br> Latitude: ' + Number((address_coordinates.latitude).toFixed(3)) + '<br>Longitude: ' + Number((address_coordinates.longitude).toFixed(3)));
        $('#pac-input').val('Latitude: ' + Number((address_coordinates.latitude).toFixed(3)) + ', Longitude: ' + Number((address_coordinates.longitude).toFixed(3)));
        infowindow.open(map, marker);

    });

    /*   $("#map").hover(
           function () {
               console.log($(this).height(500));
           },
           function () {
               console.log($(this).height(225));
           }
       );*/

}

<<<<<<< HEAD
=======
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


>>>>>>> e72ed424937a216092b98142c502acf4016b321a
function custom() {
    eventTitle = $('#event_title').val();
    locationDetails = $('#location_details').val();
    eventDetails = $('#event_details').val();
    groupInvites = $('input.select-dropdown').eq(0).val();
    individualInvites = $('input.select-dropdown').eq(1).val();

    if (address_coordinates.longitude == undefined) {
        $('#error-checking').slideDown("medium", function () {
            $('#error-checking').show();
        });
        $('#error-checking .insert').html("<p> We coudln't determine the event location. Try clicking the map. </p> <br>");
    } else {
        $('#error-checking .insert').html("");
    }


    console.log("Event Title: " + eventTitle);
    console.log("Private? " + isPrivate);
    console.log("All Day? " + isAllDay);
    console.log("Date Range: " + startDate + " --> " + endDate);
    console.log("Time Range: " + startTime + " --> " + endTime);
    console.log("Tags: " + tags[0] + ",  " + tags[1] + ",  " + tags[2] + ",  " + tags[3] + "  ");
    console.log("Location: Long: " + address_coordinates.longitude + "   Lat: " + address_coordinates.latitude);
    console.log("Location Details: " + locationDetails);
    console.log("Event Details: " + eventDetails);
    console.log("Groups Invited: " + groupInvites);
    console.log("Individual Invites: " + individualInvites);

    var http = new XMLHttpRequest();
    var url = "../php/eventCreation.php";
    var params = "event_title=" + eventTitle + "&private=" + isPrivate + "&allDay=" + isAllDay + "&start_date=" + startDate + "&end_date=" + endDate + "&startTime=" + startTime + "&endTime=" + endTime + "&longitude=" + address_coordinates.longitude + "&latitude=" + address_coordinates.latitude + "&event_details=" + eventDetails + "&tag1=" + tags[0] + "&tag2=" + tags[1] + "&location_details=" + locationDetails; //leaving out invites for now
    params = params.replace(" ", "%20");
    console.log(params);
    http.open("POST", url, true);
    http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    //http.setRequestHeader("Content-length",params.length);
    //http.setRequestHeader("Connection","close");
    http.onreadystatechange = function () {
        if (http.readyState == 4 && http.status == 200) {
            alert(http.responseText);
        }
    }
    http.send(params);

    post();
}

function post() {
    $.post('validate_event.php', {
        event_title: eventTitle,
        is_private: isPrivate,
        is_all_day: isAllDay,
        start_date: startDate,
        end_date: endDate,
        start_time: startTime,
        end_time: endTime,
        tag1: tags[0],
        tag2: tags[1],
        tag3: tags[2],
        tags4: tags[3],
        longitude: address_coordinates.longitude,
        latitude: address_coordinates.latitude,
        location_details: locationDetails,
        event_details: eventDetails,
        group_invites: groupInvites,
        single_invites: individualInvites

    }, function (data) {
        $('#submission').html(data);
    });
}