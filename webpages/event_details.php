<!DOCTYPE html>
<html>

<head>

    <!-- Basic Page Needs
	================================================== -->
    <meta charset="utf-8">
    <title>Loccasion | Event Details</title>
    <meta name="description" content="Loccasion: Web App">
    <meta name="author" content="Deep Sheth">

    <!-- CSS
	================================================== -->
    <link href='https://fonts.googleapis.com/css?family=Dosis:700' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.5/css/materialize.min.css">
    <link href='https://fonts.googleapis.com/css?family=Raleway:600|Rubik:400|Material+Icons' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="/style.css">

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

    <script>
        var logged_in = <?php
                if (isset($_SESSION['token'])) {
                    echo('true;');
                } else {
                    echo('false;');
                }
            ?>
    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.5/js/materialize.min.js"></script>
    <script src="/js/script.js"></script>


</head>

<body id="event-details">
    <header class="light-green darken-2 white-text">

        <h1><a href="../index.php" class="white-text">Loccasion</a></h1>
        <ul class="inline">

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
            </ul>
        </ul>
    </header>

    <div class="container">
        <div class="row">
            <div class="hero">
                <img src="https://scontent-lga3-1.xx.fbcdn.net/t31.0-8/12967903_572392099590789_4390675073749666913_o.jpg" alt="">
            </div>
        </div>
        <div class="row center grey lighten-3 grey-text text-darken-2 style-tab">
            <div class="col m5" title="Event Title">
                <h5>Holi 2016</h5>
            </div>
            <div class="col s1">
                <i class="material-icons blue white-text circle" title="Public Event">public</i>
            </div>
            <div class="col s5" title="Host Name">
                <h5>Hosted by <a href="#">ISA</a></h5>
            </div>
        </div>
        <div class="row lighten-4 info-bar">
            <div class="col m3 info-panel-left center">
                <p class="title">You plan on</p>
                <!-- Dropdown Trigger -->
                <a class='dropdown-button btn btn-large btn-flat white blue-text' href='#' data-activates='dropdown1'>Going</a>

                <!-- Dropdown Structure -->
                <ul id='dropdown1' class='dropdown-content'>
                    <li><a href="#!">Not Going</a></li>
                </ul>
            </div>

            <div class="col m4 info-panel-center">
                <p class="title">Attendees <a href="#">[View All]</a></p>
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
            <div id="map"></div>
            <script>
                var map;

                function initMap() {
                    map = new google.maps.Map(document.getElementById('map'), {
                        center: {
                            lat: 40.605,
                            lng: -75.375
                        },
                        zoom: 13
                    });
                }
            </script>
            <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCH1nGIwaTrYIGLgKZpv_sQ4aV7xUUygDM&callback=initMap" async defer></script>

            <div class="card-panel z-depth-1 col s6 right grey-text text-darken-2">
                <p>
                    <span class="title">Friday, July 7</span> at 6:00PM
                <br>Lehigh University</p>
                <div class="divider"></div>
                <p class="title">Details:</p>
                <p>Come out to celebrate Lehigh's most colorful event! Fun Facts: Holi is a Hindu spring festival. It is also known as the festival of colors and the festival of love. It's primarily celebrated in South Asian countries such as India and Nepal. The festival signifies the triumph of good over evil as well as the coming of spring and the end of winter.</p>

                <div class="divider"></div>
                <p>
                    <span class="chip">Free Food</span>
                    <span class="chip">#socollege</span>
                    
                    <a href="https://calendar.google.com/calendar/render?action=TEMPLATE&text=Lehigh Holi 2016&dates=20160127T224000Z/20160320T221500Z&details=For+details,+link+here:+http://www.example.com&location=Lehigh University, Bethlehem, PA&sf=true&output=xml#eventpage_6" target="_blank" class="btn btn-flat right white">Export</a>
                </p>
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

                <a class="blue-grey-text" href="#!">© 2015 LeavittInnovations.</a>
                <a class="right blue-grey-text" href="./tos.html">Terms of Service</a>
                <a class="right blue-grey-text" href="./privacy.html">Privacy Policy</a>
                <a class="right blue-grey-text" href="./faq.html">FAQ</a>
            </div>
        </div>
    </footer>
    
</body>

</html>