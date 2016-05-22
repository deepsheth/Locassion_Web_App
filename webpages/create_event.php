<?php


?>
    <!DOCTYPE html>
    <html>

    <head>

        <!-- Basic Page Needs
	================================================== -->
        <meta charset="utf-8">
        <title>Loccasion | Create Event</title>
        <meta name="description" content="Loccasion: Web App">
        <meta name="author" content="Deep Sheth">

        <!-- CSS
	================================================== -->
        <link href='https://fonts.googleapis.com/css?family=Dosis:700' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.5/css/materialize.min.css">
<<<<<<< HEAD
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
=======
        <link href='https://fonts.googleapis.com/css?family=Raleway:600|Rubik:400|Material+Icons' rel='stylesheet' type='text/css'>
>>>>>>> e72ed424937a216092b98142c502acf4016b321a
        <link rel="stylesheet" href="../css/jquery.timepicker.css">
        <link rel="stylesheet" href="../style.css">

        <!-- Favicons
	================================================== -->
        <link rel="icon" href="" />

        <!-- Mobile Specific Metas
	================================================== -->
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

        <!-- Analytics
	================================================== -->


        <!-- Page Specific Styles and Scripts
	================================================== -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.5/js/materialize.min.js"></script>
        <script src="../js/jquery.timepicker.min.js"></script>
        <script src="../js/create-event.js"></script>
<<<<<<< HEAD
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCH1nGIwaTrYIGLgKZpv_sQ4aV7xUUygDM&signed_in=true&libraries=places&callback=initMap" async defer></script>
=======
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCH1nGIwaTrYIGLgKZpv_sQ4aV7xUUygDM&libraries=places&callback=initMap" async defer></script>
>>>>>>> e72ed424937a216092b98142c502acf4016b321a


    </head>

    <body id="create-event">
        <header class="light-green darken-2 white-text">

            <h1><a href="../index.php" class="white-text">Loccasion</a></h1>
            <ul class="inline">

<<<<<<< HEAD
                <a class='dropdown-button btn z-depth-0 light-green darken-2' href='#' data-activates='acct-settings'><i class="material-icons">settings</i></a>

                <!-- Dropdown Structure -->
                <ul id='acct-settings' class='dropdown-content'>
                    <li><a href="#!">Account Settings</a></li>
                    <li><a href="#!">Upcoming Events</a></li>
                    <li class="divider"></li>
                    <li><a href="#!">Log Out</a></li>
=======
                <a data-target="confirm_prompt" class="waves-effect waves-light white blue-text btn modal-trigger col offset-s4">Events Dashboard</a>

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

                <img class="user-thumb circle" src="https://avatars2.githubusercontent.com/u/66782?v=3&s=400" alt="" class="circle">
                <a class='dropdown-button btn z-depth-0 light-green darken-2' href='#' data-activates='acct-settings'><i class="material-icons">settings</i></a>


                <!-- Dropdown Structure -->
                <ul id='acct-settings' class='dropdown-content'>
                    <li><a href="/webpages/events_dashboard.php">Event Dashboard</a></li>
                    <li><a href="/webpages/friends_dashboard.php">Friends</a></li>
                    <li><a href="#!">Events History</a></li>
                    <li><a href="#!">Account Settings</a></li>
                    <li class="divider"></li>
                    <li><a href="#!" type="submit" value="logout">Log Out</a></li>
>>>>>>> e72ed424937a216092b98142c502acf4016b321a
                </ul>
            </ul>
        </header>

        <div class="container">
            <div class="row grey-text text-darken-2">
                <h2 class="center-align grey-text">Create An Event</h2>
                <div id="event-container" class="container z-depth-1">

                    <form name="create_event">
                        <!--<form action="../php/eventCreation.php" method="post" name="create_event">-->
                        <div id="event-title" class="row">
                            <div class="input-field col s12">
                                <i class="material-icons prefix blue-text text-lighten-5">event</i>
                                <!--                            Todo: fix id event-title in CSS -->
                                <input id="event_title" name="event_title" type="text" class="white-text" required>
                                <label for="event_title" class="white-text">Event Title</label>
                            </div>
                        </div>




                        <div class="row">
                            <div class="col s5">
                                <div class="input-field">
                                    <i class="material-icons left prefix">date_range</i>
                                    <input type="date" class="datepicker" id="start_date" placeholder="Start Date" name="start_date">
                                </div>

                                <div class="input-field">
                                    <i class="material-icons left prefix white-text">date_range</i>
                                    <input type="date" class="datepicker" id="end_date" placeholder="End Date" name="end_date">
                                </div>
                            </div>

                            <div class="col s3">
                                <div class="row">
                                    <div class="input-field">
                                        <i class="material-icons left prefix">schedule</i>
<<<<<<< HEAD
                                        <input value="5:00pm" id="start_time" class="ui-timepicker-input" type="text" placeholder="Start Time" name="start_time" required>
=======
                                        <input value="5:00pm" id="start_time2" class="ui-timepicker-input" type="text" placeholder="Start Time" name="start_time" required>
>>>>>>> e72ed424937a216092b98142c502acf4016b321a
                                    </div>
                                    <div class="input-field">
                                        <i class="material-icons left prefix white-text">keyboard_arrow_right</i>
                                        <input value="5:00pm" id="end_time" class="ui-timepicker-input" type="text" placeholder="End Time" name="end_time" required>
                                    </div>
                                </div>
                            </div>

                            <div class="col s4">
<<<<<<< HEAD
=======
                                <!--
>>>>>>> e72ed424937a216092b98142c502acf4016b321a
                                <p>
                                    <input type="checkbox" class="filled-in" id="chk_all_day" checked="checked" name="all_day" />
                                    <label for="chk_all_day">All Day Event</label>
                                </p>
<<<<<<< HEAD
=======
-->
>>>>>>> e72ed424937a216092b98142c502acf4016b321a
                                <p class="checkbox-align">
                                    <i class="material-icons left prefix">group</i>
                                    <input name="eventType" type="radio" id="private_true" />
                                    <label for="private_true">Private</label>
                                </p>
                                <p class="checkbox-align">
                                    <i class="material-icons left prefix">public</i>
                                    <input name="eventType" type="radio" id="private_false" />
                                    <label for="private_false">Public</label>
                                </p>
                            </div>
                        </div>
                        <div class="row">

                            <!--
                            <div class="switch col s6">
                                <label>
                                    Private
                                    <input type="checkbox" id="privacy_type">
                                    <span class="lever"></span> Public
                                </label>
                            </div>
-->
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
<<<<<<< HEAD


                        <br>
                        <h5>Send Out Invites</h5>
                        <div class="row">
                            <div id="select-groups" class="input-field col s6">
                                <select multiple>
                                    <option value="" disabled selected>Select Friend Groups</option>
                                    <option value="1">Best Friends</option>
                                    <option value="2">Family</option>
                                    <option value="3">Hometown Fam</option>
                                </select>
                                <label>Group Invite</label>
                            </div>

                            <div id="select-individuals" class="input-field col s12 m6">
                                <select class="icons" multiple>
                                    <option value="" disabled selected>Tell some more people</option>
                                    <option value="" data-icon="http://api.randomuser.me/portraits/thumb/women/38.jpg" class="circle">Adam Knuckey</option>
                                    <option value="" data-icon="http://api.randomuser.me/portraits/thumb/women/39.jpg" class="circle">Deep Sheth</option>
                                    <option value="" data-icon="http://api.randomuser.me/portraits/thumb/women/40.jpg" class="circle">Luke Dittman</option>
                                    <option value="" data-icon="http://api.randomuser.me/portraits/thumb/women/3.jpg" class="circle">Corey Caplan</option>
                                    <option value="" data-icon="http://api.randomuser.me/portraits/thumb/women/4.jpg" class="circle">Johnny</option>
                                    <option value="" data-icon="http://api.randomuser.me/portraits/thumb/women/5.jpg" class="circle">JOHN CENA</option>
                                    <option value="" data-icon="http://api.randomuser.me/portraits/thumb/women/8.jpg" class="circle">Another homie</option>
                                    <option value="" data-icon="http://api.randomuser.me/portraits/thumb/women/7.jpg" class="circle">Another One</option>
                                    <option value="" data-icon="http://api.randomuser.me/portraits/thumb/women/6.jpg" class="circle">ANOTHER ONE</option>
                                </select>
                                <label>Individual Invite</label>
=======
                        <div class="section">


                            <div class="row">
                                <!-- Modal Trigger -->
                                <a data-target="invite_modal" class="waves-effect waves-light blue btn modal-trigger col offset-s4">Send Out Invites</a>
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
>>>>>>> e72ed424937a216092b98142c502acf4016b321a
                            </div>

                        </div>


<<<<<<< HEAD
                        <button class="btn waves-effect waves-light blue" type="submit" name="action" onclick="custom()">Submit
                            <i class="material-icons right">send</i>
                        </button>

                        <div id="submission">

=======
                        <div class="blue inverted-footer">
                            <button class="btn waves-effect waves-light btn btn-flat white" type="submit" name="action" onclick="custom()">Submit
                                <i class="material-icons right">send</i>
                            </button>

                            <div id="submission">

                            </div>
>>>>>>> e72ed424937a216092b98142c502acf4016b321a
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
                                <a href="#" class="amber-text">Report Bug</a>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <footer class="grey lighten-3 grey-text">
            <div class="footer-copyright">
                <div class="container">

                    <a class="blue-grey-text" href="#!">© 2015 LeavittInnovations.</a>
                    <a class="right blue-grey-text" href="./tos.html">Terms of Service</a>
                    <a class="right blue-grey-text" href="./privacy.html">Privacy Policy</a>
                    <a class="right blue-grey-text" href="./faq.html">FAQ</a>
                </div>
            </div>
        </footer>
    </body>

    </html>