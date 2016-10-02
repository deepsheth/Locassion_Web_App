<!DOCTYPE html>
<html>

<head>

    <!-- Basic Page Needs
	================================================== -->
    <meta charset="utf-8">
    <title>locassion | Event Details</title>
    <meta name="description" content="locassion: Web App">
    <meta name="author" content="Deep Sheth">

    <!-- CSS
	================================================== -->
    <link href='https://fonts.googleapis.com/css?family=Dosis:700' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.7/css/materialize.min.css">
    <link href='https://fonts.googleapis.com/css?family=Raleway:400,600,700|Rubik:400|Material+Icons' rel='stylesheet' type='text/css'>
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

    <script>
        var logged_in = <?php
                if (isset($_SESSION['token'])) {
                    echo('true;');
                } else {
                    echo('false;');
                }
            ?>
        var token = <?php
                if (isset($_SESSION['token'])) {
                    echo('"'.$_SESSION['token'].'";');
                } else {
                    echo('"";');
                }
            ?>
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.7/js/materialize.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.13.0/moment.min.js">();</script>
    <script src="/js/script.js"></script>


</head>

<body id="event-details">

    <script>
        var eventDetails = <?php
            if($_GET['eventid']){
                $url = 'https://meet-up-1097.appspot.com/?command=getPublicEventInfo&args='.$_GET['eventid'].'&token=';//.$_SESSION['token'];
                echo(file_get_contents($url).';//');
            }
            ?>
        '';
    </script>
    <header class="light-green darken-2 white-text row">

        <h1 class="col s12 m4 l2"><a href="/" class="white-text">locassion</a></h1>
        <ul class="col s12 m8 l10">
            <div class="flex-container">

                <a class="waves-effect waves-light btn modal-trigger " href="/webpages/events_dashboard.php">Events Dashboard</a>



                <a class="dropdown-button btn btn-flat white grey-text" href="#" data-activates="acct-settings" data-alignment="right" data-hover="true" data-constrainwidth="false">
                    <i class="material-icons">account_circle</i>
                </a>
                <img class="user-thumb circle" src="https://pbs.twimg.com/profile_images/447774892520251392/B_5g0wKw_400x400.png" alt="" class="circle">



                <!-- Dropdown Structure -->
                <ul id="acct-settings" class="dropdown-content">
                    <li><a href="/webpages/events_dashboard.php">Event Dashboard</a></li>
                    <li><a href="/webpages/friends_dashboard.php">Friends</a></li>
                    <li><a href="/webpages/events_hist.php">Event History</a></li>
                    <li><a href="#!">Account Settings</a></li>
                    <li class="divider"></li>
                    <form action="" method="post">
                        <input name="logout" type="submit" value="logout" class=" modal-action modal-close waves-effect waves-blue btn-flat">
                    </form>
                </ul>

            </div>
        </ul>
    </header>

    <div class="grey lighten-3">
        <div class="container">
            <div class="row no-mar white-text style-tab">
                <div class="col m5" title="Event Title">
                    <h3 class="dyn_event-name">Event Name</h3>
                </div>
            </div>
            
            <div class="no-mar row">
                <div class="hero">
                    <img src="https://scontent-lga3-1.xx.fbcdn.net/t31.0-8/12967903_572392099590789_4390675073749666913_o.jpg" alt="">
                </div>
            </div>
            <div class="row center white-text style-tab">
                <div class="col m5" title="Event Title">
                    <h5 class="dyn_event-time add-cursor">Date</h5>
                </div>
                <div class="col s1">
                    <i class="material-icons blue white-text circle dyn_privacy" title="Public Event">public</i>
                </div>
                <div class="col s5" title="Host Name">
                    <h5>Hosted by <a href="#" class="dyn_host-name">Host Name</a></h5>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row lighten-4 info-bar">
            <div class="col m3 info-panel-left center">
                <p class="title">You plan on</p>


                <!-- Hardcoded  -->
                <a class='dropdown-button btn btn-large btn-flat white blue-text' href='#' data-activates='dropdown1'>Going!</a>

                <!-- Dropdown Structure -->
                <ul id='dropdown1' class='dropdown-content'>
                    <li><a href="#!">Not Going</a></li>
                </ul>
            </div>

            <div class="col m4 info-panel-center">
                <p class="title">Attendees <a href="#view-friends" data-target="view_friends" class="modal-trigger">[View All]</a></p>

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

            <div class="col m5 info-panel-right">
                <p class="title">Attending</p>
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


        <div class="row">
            <div class="info-card">
                <div id="map"></div>
                <script>
                    function initMap() {
                        var map = new google.maps.Map(document.getElementById('map'), {
                            center: {
                                lat: 40.605,
                                lng: -75.375
                            },
                            zoom: 13
                        });

                        new google.maps.Marker({
                            position: new google.maps.LatLng(eventDetails[0].latitude, eventDetails[0].longitude),
                            map: map,
                            icon: '/img/public_event_marker.png'

                        });
                    }
                </script>
                <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAVEtHLKbq5hTQy4VK2jzk8GXBZRR1b4VM&callback=initMap" async defer></script>
            </div>
            <div class="info-card">
                <div class="card-panel z-depth-1 col s6 right light-green-text text-lighten-5 light-green darken-2">

                    <h5 class="center white-text dyn_event-location">Location</h5>
                    <h6 class="center white-text dyn_event-time">Time</h6>
                    <br>

                    <div class="divider green lighten-1"></div>
                    <p><strong>Details:</strong></p>
                    <p class="dyn_event-desc">Event Description</p>

                    <div class="divider green lighten-1"></div>
                    <p>
                        <span class="chip green lighten-1 green-text text-lighten-4 dyn_tag1">Tag1</span>
                        <span class="chip green lighten-1 green-text text-lighten-4 dyn_tag2">Tag2</span>

                        <a href="https://calendar.google.com/calendar/render?action=TEMPLATE&text=Lehigh Holi 2016&dates=20160127T224000Z/20160320T221500Z&details=For+details,+link+here:+http://www.example.com&location=Lehigh University, Bethlehem, PA&sf=true&output=xml#eventpage_6" target="_blank" class="btn btn-flat right green lighten-1 green-text text-lighten-4 dyn_gcal-export">Export</a>
                    </p>
                </div>
            </div>
        </div>
    </div>


    <footer class="grey lighten-3 grey-text">
        <div class="container">

            <div class="footer-head row center-align">
                <div class="col s4">
                    <h6> Download Android App</h6>
                </div>
                <div class="col s4">
                    <h6> Download iOS App</h6>
                </div>
                <div class="col s4">
                    <h6> Keep in Touch</h6>
                </div>
            </div>
            <div class="footer-copyright">

                <a class="blue-grey-text" href="#!">© 2015-2016 LeavittInnovations.</a>
                <a class="right blue-grey-text" href="./tos.php">Terms of Service</a>
                <a class="right blue-grey-text" href="./privacy.php">Privacy Policy</a>
                <a class="right blue-grey-text" href="./faq.php">FAQ</a>
            </div>
        </div>
    </footer>

    <script>
        generateEventDetails(eventDetails[0]);
    </script>
</body>

</html>