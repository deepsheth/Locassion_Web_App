var address_coordinates = {
    longitude: "",
    latitude: ""
};

var eventTitle,
    isAllDay = false,
    isPrivate = 0,
    startDate = "", endDate = "",
    startTime = "", endTime = "",
    tags = ["","","",""],
    address = "", locationDetails, eventDetails,
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

    $('.end-row').hide();
    $('#btn-end').on('click', function() {
        $(this).fadeOut(function() {
            $('.end-row').fadeIn();
        });
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
        
        tags[index] = $('#tag-row input').eq(index).val();
        
    });


    //    });

    if (error_exists) {
        $('#error-checking').fadeIn();
        $('#error-checking .insert').html(error_content);
        return false;
    } else {
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

    if (!$('#start_time').val().match("^([0-9]|0[0-9]|1[0-9]|2[0-3]):[0-5][0-9](am|pm)$")) {
        error_exists = true;
        error_content += "<p>Start Time is in invalid format</p>"
    }

    $.each($('#tag-row input'), function (index) {

        // Index off by 1, only 2 tags required
        if (index > 1) return;

        if ($('#tag-row input').eq(index).val().length == "") {
            error_exists = true;
            error_content += error_content = "<p>Tag " + (index + 1) + " is required</p>";
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
    } else {
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
        zoom: 13,
        clickableIcons: false
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

        marker.setPosition(place.geometry.location);
        marker.setVisible(true);

        // Parses address of location
        if (place.address_components) {
            address = [
                (place.address_components[0] && place.address_components[0].short_name || ''),
                (place.address_components[1] && place.address_components[1].short_name || '')
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


    // BY CLICKING THE MAP
    // Allows user to select location by marker
    var marker;
    var geocoder = new google.maps.Geocoder;
    google.maps.event.addListener(map, "click", function (event) {

        // Address is string when valid, boolean when error
        var result_addr = geocodeLatLng(geocoder, map, event.latLng, infowindow, function (result_addr) {
            
            address_coordinates.latitude = event.latLng.lat();
            address_coordinates.longitude = event.latLng.lng();

            // populate yor box/field with lat, lng
            $('#map input[type="text"]').css("border", "2px solid #2196F3");
            $('#map input[type="text"]').css("color", "#2196F3");

            marker.setMap(null); //clears previous marker -- allows only 1 marker on map
            marker = new google.maps.Marker({
                position: event.latLng,
                map: map,
                title: 'Meet Up Coordinates'
            });

            infowindow.setContent('<div><strong>' + result_addr + '</strong></div>');
            $('#pac-input').val(result_addr);
            infowindow.open(map, marker);
        });




    });

}

function geocodeLatLng(geocoder, map, latlng, infowindow, callback) {
    //    var input = document.getElementById('latlng').value;
    //    var latlngStr = input.split(',', 2);
    //    var latlng = {lat: parseFloat(latlngStr[0]), lng: parseFloat(latlngStr[1])};
    geocoder.geocode({
        'location': latlng
    }, function (results, status) {
        if (status === google.maps.GeocoderStatus.OK) {
            
            if (results[1].address_components) {
                address = [
                    (results[0].address_components[0] && results[0].address_components[0].short_name || ''),
                    (results[0].address_components[1] && results[0].address_components[1].short_name || ''),
                    (results[0].address_components[2] && results[0].address_components[2].short_name || '')
                ].join(' ');
            }

            Materialize.toast('Got it! Event location set.', 3000);
            callback(address); // what gets passed in the callback (the address)
        } else {
            Materialize.toast('Address not found due to: ' + status, 15000);
        }
    });
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

function makeEvent() {
    // getHostID

    if (endDate == "") endDate = startDate;

    var eventInfo = {
        'host id': userInfo().user_id,
        'name': $('#event_title').val(),
        'description': $('#event_details').val(),
        'start time': startDate + " " + startTime,
        'end time': endDate + " " + endTime,
        'private': isPrivate,
        'tags': {
            'tag1': tags[0],
            'tag2': tags[1],
            'tag3': tags[2],
            'tag4': tags[3],
        },
        'latitude': address_coordinates.latitude,
        'longitude': address_coordinates.longitude,
        'address': address,
        'location description': $('#location_details').val()
    };

    console.log(eventInfo);
    console.table(eventInfo);

    var newEventKey;
    var reference;
    if (isPrivate){
        reference = "/events/private"; 
        console.log("private");
    }
    else {
        reference = "/events/public";
        console.log("public");
    }

    newEventKey = firebase.database().ref(reference).push();
    var eventKey = newEventKey.key;

    firebase.database().ref(reference + "/" + eventKey).set(eventInfo);
}

function makeEvent_JSON(eventInfo) {
    
    var reference = "/events/public";
    // if (isPrivate){
    //     reference = "/events/private"; 
    //     console.log("private");
    // }
    // else {
    //     reference = "/events/public";
    //     console.log("public");
    // }

    eventInfo.forEach(function(element) {
        console.log("Pushing JSON to firebase...");
        var newEventKey = firebase.database().ref(reference).push();
        var eventKey = newEventKey.key;
        firebase.database().ref(reference + "/" + eventKey).set(element);
    });

}

function removeEvent(eventKey) {
    var reference = "/events/public";
    firebase.database().ref(reference + "/" + eventKey).remove();
}

function removeAllEvents() {
    firebase.database().ref("/events/public/").remove();   
}

/*

RANDOMLY GENERATE EVENTS
[
  {
    'repeat(100, 100)': {
      "address": '{{integer(100, 999)}} {{street()}}, {{city()}}, {{state()}}, {{integer(100, 10000)}}',
      "description": '{{lorem(1, "sentences")}}',
      "end time": '{{moment().format("YYYY-MM-DD HH:mm:ss")}}',
      "host id": "f0yoxQWiNCQyjkMsg5lES4Z4Ki92",
      "latitude": function() {
        return Math.random() * (40.65 - 40.55) + 40.55;
      },
      "location description": '{{lorem(1, "sentences")}}',
      "longitude":  function() {
        return Math.random() * (-75.35 - -75.400001) + -75.400001;
      },
      "name": '{{lorem(5, "words")}}',
      "private":0,
      "start time": '{{moment().add(4, "hours").format("YYYY-MM-DD HH:mm:ss")}}',
      "tags": {
        "tag1": '{{lorem(1, "words")}}',
        "tag2": '{{lorem(1, "words")}}',
        "tag3": '{{lorem(1, "words")}}',
        "tag4": '{{lorem(1, "words")}}'
      }
    }
  }
]
*/

