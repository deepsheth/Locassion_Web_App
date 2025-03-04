<!DOCTYPE html>
<html>

<head>

    <!-- Basic Page Needs
	================================================== -->
    <meta charset="utf-8">
    <title>Locassion | Event Details</title>
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.15.0/moment.min.js"></script>
    <script src="/js/jquery.timepicker.min.js"></script>
    <script src="/js/script.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAVEtHLKbq5hTQy4VK2jzk8GXBZRR1b4VM&callback=initSimpleMap" async defer></script>
    <script>
        var eventInfo = getFullEventDetails();
    </script>

</head>

<body id="event-details">

    <header class="primary-green row">

       <div class="logo-container col s12 m3 l4">
                <a href="/" class="white-text hide-on-med-only">
                    <div class="logo-img"></div>
                </a>
                <h1><a href="/" class="white-text">Locassion</a></h1>
            </div>

       
        <ul class="col s12 m8 l8">
            <div class="flex-container menu-buttons">

                <script>
                    addMenuButton("edit_event");
                    addMenuButton("events_dashboard");
                    addMenuButton("dropdown");
                    requireLogin();
                </script>
            </div>
        </ul>
    </header>

    <div class="grey lighten-3">
        <div id="preloader-indef" class="progress green lighten-3">
            <div class="indeterminate primary-green"></div>
        </div>

        <div id="edit_event_prompt" class="modal modal-fixed-footer">
            <div class="modal-content">
                <div class="modal-padding">
                   <div class="row">
                        <h3>Edit Event Details</h3>
                   </div>
                    <div class="row">
                        <div class="input-field col s4">
                            <i class="material-icons left prefix">date_range</i>
                            <input type="text" id="start_date" placeholder="MM/DD/YYYY" name="start_date">
                            <label for="start_date">Start Date</label>
                        </div>
                        <div class="input-field col s4">
                            <i class="material-icons left prefix">schedule</i>
                            <input id="start_time" type="text" placeholder="HH:MM am" name="start_time">
                            <label for="start_time">Start Time</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s4">
                            <i class="material-icons left prefix">date_range</i>
                            <input type="text" id="end_date" placeholder="MM/DD/YYYY" name="end_date">
                            <label for="end_date">Start Date</label>
                        </div>
                        <div class="input-field col s4">
                            <i class="material-icons left prefix">schedule</i>
                            <input id="end_time" type="text" placeholder="HH:MM am" name="end_time">
                            <label for="end_time">End Time</label>
                        </div>
                    </div>
                    <div class="row" id="tag-row">
                        <div class="input-field col s6 m3">
                            <i class="material-icons prefix">local_offer</i>
                            <input id="tag1_label" type="text">
                            <label for="tag1_label" class="dyn_tag1">Tag 1</label>
                        </div>

                        <div class="input-field col s6 m3">
                            <input id="tag2_label" type="text">
                            <label for="tag2_label" class="dyn_tag2">Tag 2</label>
                        </div>

                        <div class="input-field col s6 m3">
                            <input id="tag3_label" type="text">
                            <label for="tag3_label" class="dyn_tag3">Tag 3</label>
                        </div>
                        <div class="input-field col s6 m3">
                            <input id="tag4_label" type="text">
                            <label for="tag4_label" class="dyn_tag4">Tag 4</label>
                        </div>
                    </div>
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


                </div>
            </div>
            <div class="modal-footer blue-grey lighten-5">
                <a onclick="deleteEvent()" class="left waves-effect waves-red btn-flat left red-text">Delete</a>
                <a onclick="updateEvent()" class="left modal-action modal-close waves-effect waves-blue btn-flat right">Update</a>
            </div>
        </div>

        <div class="container info-bar">
            <div class="row">
                <div class="card">

                    <div class="hero card-image">
                        <img src="https://scontent-lga3-1.xx.fbcdn.net/t31.0-8/12967903_572392099590789_4390675073749666913_o.jpg" alt="">
                    </div>
                    <div class="card-action right">
                        <a href="#">Share</a>
                        <a target="_blank" href="#" class="dyn_gcal-export">Export</a>

                    </div>
                </div>
            </div>

            <div class="row">


                <div class="card col s12 m5">
                    <div class="card-content">
                        <div class="card-title">
                            <a href="" class="dyn_event-name"></a>
                        </div>

                        <div class="row">
                            <div class="col s12">
                                <div class="col s4 m3 center-align mini-cal add-cursor" onclick="viewCal(event,'1475874000000')" title="Fri Oct 07 2016 17:00:00 GMT-0400">
                                    <div class="day"></div>
                                    <div class="day-num"></div>
                                    <div class="month"></div>
                                </div>
                                <div class="col s8 m9">
                                    <p class="context"></p>
                                </div>
                            </div>
                        </div>

                        <p class="dyn_details"></p>
                    </div>
                    <div class="card-action">
                        <a href="#" class="dyn_tag1"></a>
                        <a href="#" class="dyn_tag2"></a>
                        <a href="#" class="dyn_tag3"></a>
                        <a href="#" class="dyn_tag4"></a>


                    </div>
                </div>

                <div class="card col s12 m5 offset-m2">
                    <div class="card-content">
                        <div class="card-title">
                            Will you attend?
                        </div>

                        <div class="row">
                            <div class="col s12">
                                <div class="dyn_inviter section soft-border">
                                    <span class=""><strong>Adam Knuckey</strong> invited you.</span>
                                </div>
                            </div>


                        </div>

                        <div class="row no-mar section">
                            <div class="col s12 dyn_btn">
                                <a href="#" class="btn-go wide waves-effect waves-light disabled dirty">Passed</a>
                            </div>
                        </div>

                    </div>
                    <div class="card-action">
                        <a href="#">See What Adam is Hosting</a>

                    </div>
                </div>

            </div>

        </div>
    </div>

    <div class="container info-bar">
        <div class="row">
            <div class="col s12 m5 no-pad">
                <p class="title">Location</p>
                <p class="dyn_location grey-text text-darken-1"></p>
                <div id="map"></div>

            </div>

            <div class="col s12 m5 offset-m2">
                <div class="row">
                    <p class="title">Attendees <a href="#view-friends" data-target="view_friends" class="modal-trigger">| View All</a></p>

                    <!-- Modal Structure -->
                    <div id="view-friends" class="modal">
                        <div class="modal-content">
                            <div class="modal-padding">

                                <h4 class="center">Friends who will attend.</h4>

                                <div class="row">
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


                    <div class="attendees-preview">
                        <img class="user-thumb-large circle" src="https://avatars2.githubusercontent.com/u/66782?v=3&s=400" alt="">
                        <img class="user-thumb-large circle" src="https://avatars2.githubusercontent.com/u/66781?v=3&s=400" alt="">
                        <img class="user-thumb-large circle" src="https://avatars2.githubusercontent.com/u/66750?v=3&s=400" alt="">
                        <img class="user-thumb-large circle" src="https://avatars2.githubusercontent.com/u/64253?v=3&s=400" alt="">
                        <img class="user-thumb-large circle" src="https://avatars2.githubusercontent.com/u/66781?v=3&s=400" alt="">
                        <img class="user-thumb-large circle" src="https://avatars2.githubusercontent.com/u/66788?v=3&s=400" alt="">
                        <img class="user-thumb-large circle" src="https://avatars2.githubusercontent.com/u/66722?v=3&s=400" alt="">
                        <img class="user-thumb-large circle" src="https://avatars2.githubusercontent.com/u/66708?v=3&s=400" alt="">

                    </div>
                </div>

                <div class="row">
                    <p class="title">Who's Going?</p>
                    <div class="row">
                        <div class="col m3">
                            <h2 class="blue-text right blue-glow">15</h2>
                            <span class="right">Friends</span>
                        </div>
                        <div class="col m1">
                            <h2>/ </h2></div>
                        <div class="col m3">
                            <h2>420</h2>
                            <span>Total</span>
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