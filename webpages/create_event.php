<!DOCTYPE html>
<html>

<head>

    <!-- Basic Page Needs
================================================== -->
    <meta charset="utf-8">
    <title>Locassion | Create Event</title>
    <meta name="description" content="Locassion: Web App">
    <meta name="author" content="Deep Sheth">

    <!-- CSS
================================================== -->
    <link href='https://fonts.googleapis.com/css?family=Dosis:700' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.7/css/materialize.min.css">
    <link href='https://fonts.googleapis.com/css?family=Raleway:400,600,700|Rubik:400|Material+Icons' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="/css/jquery.timepicker.css">
    <link rel="stylesheet" href="/style.css">

    <!-- Favicons
================================================== -->
    <link rel="icon" type="image/png" href="/favicon.png" />

    <!-- Mobile Specific Metas
================================================== -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <!-- Analytics
================================================== -->


    <!-- Page Specific Styles and Scripts
================================================== -->
    <script src="https://www.gstatic.com/firebasejs/3.2.0/firebase.js"></script>
    <script src="https://www.gstatic.com/firebasejs/3.1.0/firebase-app.js"></script>
    <script src="https://www.gstatic.com/firebasejs/3.1.0/firebase-auth.js"></script>
    <script src="https://www.gstatic.com/firebasejs/3.1.0/firebase-database.js"></script>
    <script src="https://www.gstatic.com/firebasejs/3.1.0/firebase-storage.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.7/js/materialize.min.js"></script>
    <script src="/js/jquery.timepicker.min.js"></script>
    <script src="/js/create-event.js"></script>
    <script src="/js/script.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAVEtHLKbq5hTQy4VK2jzk8GXBZRR1b4VM&libraries=places&callback=initMap" async defer></script>


</head>

<body id="create-event">

    <header class="primary-green row">

        <h1 class="col s12 m4 l2"><a href="/" class="white-text">Locassion</a></h1>

        <ul class="col s12 m8 l10">
            <div class="flex-container menu-buttons">

                <script>
                    addMenuButton("events_dashboard");
                    addMenuButton("dropdown");
                    requireLogin();
                </script>

                <div id="confirm_prompt" class="modal modal-fixed-footer">
                    <div class="modal-content black-text">
                        <div class="modal-padding center">
                            <h3>Are you sure?</h3>
                            <p>Everything you have filled in on this page will be discarded.</p>
                        </div>
                    </div>
                    <div class="modal-footer blue-grey lighten-5">
                        <a href="/webpages/events_dashboard.php" class="left modal-action modal-close waves-effect waves-blue btn-flat right deep-orange-text text-lighten-1">Yes</a><a href="#" class="left modal-action modal-close waves-effect waves-blue btn-flat left">Cancel</a>
                    </div>
                </div>

            </div>
        </ul>
    </header>

    <div class="container">
        <div class="row grey-text text-darken-2">
            <h2 class="center-align grey-text">Create An Event</h2>
            <div id="event-container" class="container z-depth-1">

                <form name="create_event">
                    <div id="event-title" class="row">
                        <div class="input-field col s12">
                            <i class="material-icons prefix blue-text text-lighten-5">event</i>
                            <!--                            Todo: fix id event-title in CSS -->
                            <input id="event_title" name="event_title" type="text" class="white-text" required>
                            <label for="event_title" class="white-text">Event Title</label>
                        </div>
                    </div>




                    <div class="row">
                        <div class="col s8">
                            <div class="row row-tight">
                                <div class="input-field col s12 m6">
                                    <i class="material-icons left prefix">date_range</i>
                                    <input type="date" class="datepicker" id="start_date" placeholder="Start Date" name="start_date">
                                </div>
                                <div class="input-field col s12 m5">
                                    <i class="material-icons left prefix white-text">schedule</i>
                                    <input value="5:00pm" id="end_time" class="ui-timepicker-input" type="text" placeholder="End Time" name="end_time" required>
                                </div>
                                <div class="center"><a class="btn btn-flat" id="btn-end"><i class="material-icons left prefix">add</i> End Date</a></div>
                            </div>


                            <div class="row row-tight end-row">
                                <div class="input-field col s12 m6">
                                    <i class="material-icons left prefix white-text">date_range</i>
                                    <input type="date" class="datepicker" id="end_date" placeholder="End Date" name="end_date">
                                </div>
                                <div class="input-field col s12 m5">
                                    <i class="material-icons left prefix white-text">schedule</i>
                                    <input value="5:00pm" id="start_time" class="ui-timepicker-input" type="text" placeholder="Start Time" name="start_time" required>
                                </div>
                            </div>
                        </div>

                        <div class="col s4">
                            <p class="checkbox-align">

                                <input name="eventType" type="radio" id="private_true" checked/>
                                <label for="private_true"><i class="material-icons right prefix">group</i>Private</label>
                            </p>
                            <p class="checkbox-align">

                                <input name="eventType" type="radio" id="private_false" />
                                <label for="private_false"><i class="material-icons right prefix">public</i>Public</label>
                            </p>
                        </div>
                    </div>

                    <div class="row" id="tag-row">
                        <div class="input-field col s3">
                            <i class="material-icons prefix">local_offer</i>
                            <input id="tag1_label" type="text">
                            <label for="tag1_label">Tag 1</label>
                        </div>

                        <div class="input-field col s3">
                            <input id="tag2_label" type="text">
                            <label for="tag2_label">Tag 2</label>
                        </div>

                        <div class="input-field col s3">
                            <input id="tag3_label" type="text">
                            <label for="tag3_label">Tag 3</label>
                        </div>
                        <div class="input-field col s3">
                            <input id="tag4_label" type="text">
                            <label for="tag4_label">Tag 4</label>
                        </div>


                    </div>


                    <input id="pac-input" class="controls  col s8 white" type="text" placeholder="Click Map or Type Location">
                    <div id="map"></div>

                    <div class="row">
                        <div class="input-field col s12">
                            <i class="material-icons prefix">place</i>
                            <input id="location_details" name="location_details" type="text">
                            <label for="location_details">Location Details</label>
                        </div>
                    </div>

                    <div class="row">
                        <div class="input-field col s12">
                            <i class="material-icons prefix">event_note</i>
                            <textarea id="event_details" name="event_details" class="materialize-textarea"></textarea>
                            <label for="event_details">Event Details</label>
                        </div>
                    </div>
                    <div class="section center">


                        <div class="row">
                            <!-- Modal Trigger -->
                            <a data-target="invite_modal" class="waves-effect waves-light blue btn modal-trigger ">Send Out Invites</a>
                        </div>

                        <!-- Modal Structure -->
                        <div id="invite_modal" class="modal modal-large modal-fixed-footer">
                            <div class="modal-content">
                                <div class="modal-padding">
                                    <h4 class="center">Share your event.</h4>

                                    <div class="row">
                                        <div class="col m3">
                                            <h5 class="center">Friend Groups</h5>

                                            <div class="row">

                                                <div class="card-panel  z-depth-1">
                                                    <div class="valign-wrapper">
                                                        <div class="col s5">
                                                            <img src="https://github.com/identicons/john.png" alt="" class="circle responsive-img">
                                                            <!-- notice the "circle" class -->
                                                        </div>
                                                        <div class="col s7">
                                                            <span class="title">Deep Sheth</span>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="card-panel  z-depth-1">
                                                    <div class="valign-wrapper">
                                                        <div class="col s5">
                                                            <img src="https://github.com/identicons/cena.png" alt="" class="circle responsive-img">
                                                            <!-- notice the "circle" class -->
                                                        </div>
                                                        <div class="col s7">
                                                            <span class="title">Adam Knuckey</span>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="card-panel  z-depth-1">
                                                    <div class="valign-wrapper">
                                                        <div class="col s5">
                                                            <img src="https://github.com/identicons/sam.png" alt="" class="circle responsive-img">
                                                            <!-- notice the "circle" class -->
                                                        </div>
                                                        <div class="col s7">
                                                            <span class="title">Corey Caplan</span>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                        <div class="col m8 offset-m1">
                                            <h5 class="center">Individual</h5>
                                            <div class="row">
                                                <div class="col s4">
                                                    <div class="card-panel  z-depth-1">
                                                        <div class="valign-wrapper">
                                                            <div class="col s5">
                                                                <img src="https://github.com/identicons/john.png" alt="" class="circle responsive-img">
                                                                <!-- notice the "circle" class -->
                                                            </div>
                                                            <div class="col s7">
                                                                <span class="title">Deep Sheth</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col s4">
                                                    <div class="card-panel  z-depth-1">
                                                        <div class="valign-wrapper">
                                                            <div class="col s5">
                                                                <img src="https://github.com/identicons/cena.png" alt="" class="circle responsive-img">
                                                                <!-- notice the "circle" class -->
                                                            </div>
                                                            <div class="col s7">
                                                                <span class="title">Adam Knuckey</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col s4">
                                                    <div class="card-panel  z-depth-1">
                                                        <div class="valign-wrapper">
                                                            <div class="col s5">
                                                                <img src="https://github.com/identicons/sam.png" alt="" class="circle responsive-img">
                                                                <!-- notice the "circle" class -->
                                                            </div>
                                                            <div class="col s7">
                                                                <span class="title">Corey Caplan</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col s4">
                                                    <div class="card-panel  z-depth-1">
                                                        <div class="valign-wrapper">
                                                            <div class="col s5">
                                                                <img src="https://github.com/identicons/john.png" alt="" class="circle responsive-img">
                                                                <!-- notice the "circle" class -->
                                                            </div>
                                                            <div class="col s7">
                                                                <span class="title">Deep Sheth</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col s4">
                                                    <div class="card-panel  z-depth-1">
                                                        <div class="valign-wrapper">
                                                            <div class="col s5">
                                                                <img src="https://github.com/identicons/cena.png" alt="" class="circle responsive-img">
                                                                <!-- notice the "circle" class -->
                                                            </div>
                                                            <div class="col s7">
                                                                <span class="title">Adam Knuckey</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col s4">
                                                    <div class="card-panel  z-depth-1">
                                                        <div class="valign-wrapper">
                                                            <div class="col s5">
                                                                <img src="https://github.com/identicons/sam.png" alt="" class="circle responsive-img">
                                                                <!-- notice the "circle" class -->
                                                            </div>
                                                            <div class="col s7">
                                                                <span class="title">Corey Caplan</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col s4">
                                                    <div class="card-panel  z-depth-1">
                                                        <div class="valign-wrapper">
                                                            <div class="col s5">
                                                                <img src="https://github.com/identicons/john.png" alt="" class="circle responsive-img">
                                                                <!-- notice the "circle" class -->
                                                            </div>
                                                            <div class="col s7">
                                                                <span class="title">Deep Sheth</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col s4">
                                                    <div class="card-panel  z-depth-1">
                                                        <div class="valign-wrapper">
                                                            <div class="col s5">
                                                                <img src="https://github.com/identicons/cena.png" alt="" class="circle responsive-img">
                                                                <!-- notice the "circle" class -->
                                                            </div>
                                                            <div class="col s7">
                                                                <span class="title">Adam Knuckey</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col s4">
                                                    <div class="card-panel  z-depth-1">
                                                        <div class="valign-wrapper">
                                                            <div class="col s5">
                                                                <img src="https://github.com/identicons/sam.png" alt="" class="circle responsive-img">
                                                                <!-- notice the "circle" class -->
                                                            </div>
                                                            <div class="col s7">
                                                                <span class="title">Corey Caplan</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col s4">
                                                    <div class="card-panel  z-depth-1">
                                                        <div class="valign-wrapper">
                                                            <div class="col s5">
                                                                <img src="https://github.com/identicons/john.png" alt="" class="circle responsive-img">
                                                                <!-- notice the "circle" class -->
                                                            </div>
                                                            <div class="col s7">
                                                                <span class="title">Deep Sheth</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col s4">
                                                    <div class="card-panel  z-depth-1">
                                                        <div class="valign-wrapper">
                                                            <div class="col s5">
                                                                <img src="https://github.com/identicons/cena.png" alt="" class="circle responsive-img">
                                                                <!-- notice the "circle" class -->
                                                            </div>
                                                            <div class="col s7">
                                                                <span class="title">Adam Knuckey</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col s4">
                                                    <div class="card-panel  z-depth-1">
                                                        <div class="valign-wrapper">
                                                            <div class="col s5">
                                                                <img src="https://github.com/identicons/sam.png" alt="" class="circle responsive-img">
                                                                <!-- notice the "circle" class -->
                                                            </div>
                                                            <div class="col s7">
                                                                <span class="title">Corey Caplan</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col s4">
                                                    <div class="card-panel  z-depth-1">
                                                        <div class="valign-wrapper">
                                                            <div class="col s5">
                                                                <img src="https://github.com/identicons/john.png" alt="" class="circle responsive-img">
                                                                <!-- notice the "circle" class -->
                                                            </div>
                                                            <div class="col s7">
                                                                <span class="title">Deep Sheth</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col s4">
                                                    <div class="card-panel  z-depth-1">
                                                        <div class="valign-wrapper">
                                                            <div class="col s5">
                                                                <img src="https://github.com/identicons/cena.png" alt="" class="circle responsive-img">
                                                                <!-- notice the "circle" class -->
                                                            </div>
                                                            <div class="col s7">
                                                                <span class="title">Adam Knuckey</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col s4">
                                                    <div class="card-panel  z-depth-1">
                                                        <div class="valign-wrapper">
                                                            <div class="col s5">
                                                                <img src="https://github.com/identicons/sam.png" alt="" class="circle responsive-img">
                                                                <!-- notice the "circle" class -->
                                                            </div>
                                                            <div class="col s7">
                                                                <span class="title">Corey Caplan</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col s4">
                                                    <div class="card-panel  z-depth-1">
                                                        <div class="valign-wrapper">
                                                            <div class="col s5">
                                                                <img src="https://github.com/identicons/john.png" alt="" class="circle responsive-img">
                                                                <!-- notice the "circle" class -->
                                                            </div>
                                                            <div class="col s7">
                                                                <span class="title">Deep Sheth</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col s4">
                                                    <div class="card-panel  z-depth-1">
                                                        <div class="valign-wrapper">
                                                            <div class="col s5">
                                                                <img src="https://github.com/identicons/cena.png" alt="" class="circle responsive-img">
                                                                <!-- notice the "circle" class -->
                                                            </div>
                                                            <div class="col s7">
                                                                <span class="title">Adam Knuckey</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col s4">
                                                    <div class="card-panel  z-depth-1">
                                                        <div class="valign-wrapper">
                                                            <div class="col s5">
                                                                <img src="https://github.com/identicons/sam.png" alt="" class="circle responsive-img">
                                                                <!-- notice the "circle" class -->
                                                            </div>
                                                            <div class="col s7">
                                                                <span class="title">Corey Caplan</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="modal-footer">
                                <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat ">
                                    <In></In>Invite!</a>
                                <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat left">Cancel</a>
                            </div>
                        </div>

                    </div>


                    <div class="blue inverted-footer center">
                        <button class="waves-effect waves-green btn btn-flat white" type="submit" name="action" onclick="makeEvent()">Create Event
                            <i class="material-icons right">event_available</i>
                        </button>

                        <div id="submission">

                        </div>
                    </div>
                </form>

                <div id="error-checking">
                    <div class="card red darken-2">
                        <div class="card-content white-text">
                            <span class="card-title"><b>Error Log</b></span>
                            <p class="insert">
                            </p>
                        </div>
                        <div class="card-action red darken-4">
                            <a data-target="modal-bug-report" class="modal-trigger add-cursor amber-text">REPORT BUG</a>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <?php
        include_once(dirname(dirname(__FILE__)).'/templates/simple-footer.php'); 
        ?>

</body>

</html>