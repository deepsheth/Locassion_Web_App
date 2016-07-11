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
        hiddenName: true, //submits formatSubmit in POST
        closeOnSelect: true
    });
    
    // Disables dates prior to today
    var startDatePicker = $('#start_date').pickadate().pickadate('picker');
    startDatePicker.set({
        'min': true
    });

    $('#end_date').pickadate().pickadate('picker').set({
        'min': true,
    });

    startDate = startDatePicker.get('select', 'yyyy-mm-dd');
    

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
    $("#event-container form").submit(function (e) {
        e.preventDefault();
    });


    // Initializes friend select 
    $('select').material_select();

    $("input").change(function () {
        validateMaxLen();
        
        // End date is set to start date after start date is picked
        var endDatePicker = $('#end_date').pickadate().pickadate('picker');
        endDate = endDatePicker.get('select', 'yyyy-mm-dd');
        startDate = $('#start_date').pickadate().pickadate('picker').get('select', 'yyyy-mm-dd');

        if ($('#start_date').pickadate().pickadate('picker').get('select') != null) {
            var begDate = $('#start_date').pickadate().pickadate('picker').get('select', 'yyyy-mm-dd');
            endDatePicker.set({
                'min': new Date(begDate.substr(0, 4) + "," + begDate.substr(5, 2) + "," + begDate.substr(8, 2))
            });
        }
        
    });

    $('.modal-trigger').leanModal();


    var count2 = 0;
    $('#invite_modal .card-panel').click(function () {
        count2 = selectCard(this, count2);
    });


});

function validateMaxLen() {
    var TITLE_LENGTH = 50,
        TAG_LENGTH = 15,
        DETAIL_LENGTH = 250;

    var error_exists = false;
    var error_content = "";
    
    //$('#event_title').change(function () {
    if ($('#event_title').val().length > TITLE_LENGTH) {
        error_exists = true;
        error_content += "<p>Please shorten event title. <b>" + $('#event_title').val().length + "/" + TITLE_LENGTH + " </b>characters used. </p> <br>";
    }

   

    if ($('#private_true').is(':checked')) {
        isPrivate = 1;
    } else {
        isPrivate = 0;
    }
 

    startTime = $('#start_time').timepicker('getTime').toString().slice(16, 24);
    endTime = $('#end_time').timepicker('getTime').toString().slice(16, 24);


    $.each($('#tag-row input'), function (index) {
        if ($('#tag-row input').eq(index).val().length > TAG_LENGTH) {
            error_exists = true;
            error_content += "<p>Please shorten tag " + (index + 1) + ". <b>" + $('#tag-row input').eq(index).val().length + "/" + TAG_LENGTH + " </b>characters used. </p> <br>"
        }
    });


    //    });

    if (error_exists) {
        $('#error-checking').fadeIn();
        $('#error-checking .insert').html(error_content);
        return false;
    }
    else {
        $('#error-checking').fadeOut();
        return true;
    }
}

function validateRequired() {
    var error_exists = false;
    var error_content = "";
    
    
    if ($('#event_title').val().length == 0) {
        error_exists = true;
        error_content += "<p>Event Title is required.</p>";
    }
    
    if ($('#start_date').val() == "") {
        error_exists = true;
        error_content += "<p>Start Date is required</p>"
    }
    
    if (! $('#start_time').val().match("^([0-9]|0[0-9]|1[0-9]|2[0-3]):[0-5][0-9](am|pm)$")){
        error_exists = true;
        error_content += "<p>Start Time is in invalid format</p>"
    }

    $.each($('#tag-row input'), function (index) {
        
        // Index off by 1, only 2 tags required
        if (index > 1) return;
        
        if ($('#tag-row input').eq(index).val().length == "") {
            error_exists = true;
            error_content += error_content = "<p>Tag "+ (index + 1) + " is required</p>";
        }
        
        tags[index] = $('#tag-row input').eq(index).val();
    });

    if (address_coordinates.longitude == undefined) {
        error_exists = true;
        error_content += "<p> We couldn't determine the event location. Try clicking the map. </p>";
    }

    
    if (error_exists) {
        $('#error-checking').fadeIn();
        $('#error-checking .insert').html(error_content);
        return false;
    }
    else {
        $('#error-checking').fadeOut();
        return true;
    }


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

function eventCreation() {
    eventTitle = $('#event_title').val();
    locationDetails = $('#location_details').val();
    eventDetails = $('#event_details').val();
    groupInvites = $('input.select-dropdown').eq(0).val();
    individualInvites = $('input.select-dropdown').eq(1).val();

    
    if (validateMaxLen() && validateRequired()) {
        var promiseEvent = window.eventReq().done(function (result) {
        });
    }
}


var eventReq = function () {
    return $.ajax({
        type: 'POST',
        dataType: "json",
        url: '/php/eventCreation.php',
        data: {
            longitude: address_coordinates.longitude,
            latitude: address_coordinates.latitude,
            event_name: eventTitle,
            event_details: eventDetails,
            tag1: tags[0],
            tag2: tags[1],
            tag3: tags[2],
            tag4: tags[3],
            is_private: isPrivate,
            start_date: startDate,
            start_time: startTime,
            location_details: locationDetails,
            end_date: endDate,
            end_time: endTime,
            address: "Hardcoded address"
        },
    }) .fail(function(xhr){
        console.log("ERROR");
        $('#error-checking').fadeIn();
        $('#error-checking .insert').html("Event could not be created. Here's the error " + xhr.responseText);
        console.log(xhr.responseText);
    }) .done(function (eventID) {
        window.location.replace("/webpages/event_details.php?eventid=" + eventID.eventID);
    });
}