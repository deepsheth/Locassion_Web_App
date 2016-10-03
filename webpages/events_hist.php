<!DOCTYPE html>
<html>

<head>

    <!-- Basic Page Needs
	================================================== -->
    <meta charset="utf-8">
    <title>Locassion | Events History</title>
    <meta name="description" content="Locassion: Web App">
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
    <script src="https://www.gstatic.com/firebasejs/3.2.0/firebase.js"></script>
    <script src="https://www.gstatic.com/firebasejs/3.1.0/firebase-app.js"></script>
    <script src="https://www.gstatic.com/firebasejs/3.1.0/firebase-auth.js"></script>
    <script src="https://www.gstatic.com/firebasejs/3.1.0/firebase-database.js"></script>
    <script src="https://www.gstatic.com/firebasejs/3.1.0/firebase-storage.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.7/js/materialize.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.13.0/moment.min.js"></script>
    <script src="/js/markerclusterer.js"></script>
    <script src="/js/script.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAVEtHLKbq5hTQy4VK2jzk8GXBZRR1b4VM&callback=initMap" async defer></script>


</head>

<body id="event-dashboard">
    <header class="primary-green row">

        <!-- Navigation Drawer
================================================== -->
        <ul class="side-nav" id="mobile-menu">
            <li><a href="sass.html">View Event Map</a></li>
            <li><a href="badges.html">Create Event</a></li>
            <li><a href="mobile.html">Login</a></li>
            <li class="divider"></li>
            <li><a href="mobile.html">Download App</a></li>
            <div class="flex-container">
                <img src="/img/splash/app-store-badge.svg" alt="We're on the App Store">
                <img src="/img/splash/google-play-badge.png" alt="We're on the Play Store">
            </div>
        </ul>

        <h1 class="col s12 m4 l2"><a href="/" class="white-text">Locassion</a></h1>

        <a href="#" data-activates="mobile-menu" class="hide-on-med-and-up hamburger-menu waves-effect btn col s12"><i class="material-icons left">menu</i>Menu</a>

        <!-- Menu Buttons
================================================== -->
        <ul class="col s12 m8 l10">
            <div class="flex-container hide-on-small-only menu-buttons">
                
                <script>
                    addMenuButton("events_dashboard");
                    addMenuButton("dropdown");
                    requireLogin();
                </script>
                
            </div>
        </ul>
    </header>
    <div class="container">

        <div class="row">

            <h3 class="grey-text text-darken-2"><span class="title blue-text">45</span> Events Attended</h3>
        </div>
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

        <ul class="collection z-depth-1 grey-text text-darken-2">
            <li class="collection-item avatar row">
                <i class="material-icons circle light-green darken-1">group</i>
                <div class="col s9">
                    <span class="title grey-text text-darken-3">FundRager</span>
                    <p>
                        <i class="material-icons tiny grey-text text-lighten-1">event</i> Jan. 1, 2016
                        <br> <i class="material-icons tiny grey-text text-lighten-1">access_time</i> 7:00PM - 8:00PM
                        <br> <i class="material-icons tiny grey-text text-lighten-1">place</i> Psi Upsilon
                    </p>
                </div>
                <a class="secondary-content chip red lighten-2 white-text" title="Attendees"><i class="material-icons">group</i>2</a>
            </li>
            <li class="collection-item avatar row">
                <i class="material-icons circle blue">group</i>
                <div class="col s9">
                    <span class="title grey-text text-darken-3">Cars and Coffee</span>
                    <p><i class="material-icons tiny grey-text text-lighten-1">event</i> Feb. 5, 2016
                        <br><i class="material-icons tiny grey-text text-lighten-1">access_time</i> 7:00AM - 12:00PM
                        <br> <i class="material-icons tiny grey-text text-lighten-1">place</i> Steel Stacks
                    </p>
                </div>
                <a href="#" class="secondary-content chip red lighten-2 white-text" title="Attendees"><i class="material-icons">group</i>15</a>
            </li>
            <li class="collection-item avatar row">
                <i class="material-icons circle primary-green">group</i>
                <div class="col s9">
                    <span class="title grey-text text-darken-3">DaceFest</span>
                    <p><i class="material-icons tiny grey-text text-lighten-1">event</i> Feb. 23, 2016
                        <br> <i class="material-icons tiny grey-text text-lighten-1">access_time</i>6:00PM - 8:00PM
                        <br> <i class="material-icons tiny grey-text text-lighten-1">place</i> Zollner Arts Center
                    </p>
                </div>
                <a href="#" class="secondary-content chip red lighten-2 white-text" title="Attendees"><i class="material-icons">public</i>69</a>
            </li>
            <li class="collection-item avatar row">
                <i class="material-icons circle red darken-2">play_arrow</i>
                <div class="col s9">
                    <span class="title grey-text text-darken-3">Party!!!!!</span>
                    <p><i class="material-icons tiny grey-text text-lighten-1">event</i> Feb. 18, 2016
                        <br><i class="material-icons tiny grey-text text-lighten-1">access_time</i> 10:00PM - 1:00AM
                        <br> <i class="material-icons tiny grey-text text-lighten-1">place</i> 413 E Fifth
                    </p>
                </div>
                <a href="#!" class="secondary-content chip red lighten-2 white-text" title="Attendees"><i class="material-icons">public</i>185</a>
            </li>
            <li class="collection-item avatar row">
                <i class="material-icons circle red darken-2">play_arrow</i>
                <div class="col s9">
                    <span class="title grey-text text-darken-3">Party!!!!!</span>
                    <p><i class="material-icons tiny grey-text text-lighten-1">event</i> Feb. 18, 2016
                        <br><i class="material-icons tiny grey-text text-lighten-1">access_time</i> 10:00PM - 1:00AM
                        <br> <i class="material-icons tiny grey-text text-lighten-1">place</i> 413 E Fifth
                    </p>
                </div>
                <a href="#!" class="secondary-content chip red lighten-2 white-text" title="Attendees"><i class="material-icons">public</i>185</a>
            </li>
            <a href="#!" class="collection-item">See More</a>
        </ul>
    </div>
    <footer class="grey lighten-3 grey-text">
        <div class="footer-copyright">
            <div class="container">

                <a class="blue-grey-text" href="#!">© 2015-2016 LeavittInnovations.</a>
                <a class="right blue-grey-text" href="./tos.php">Terms of Service</a>
                <a class="right blue-grey-text" href="./privacy.php">Privacy Policy</a>
                <a class="right blue-grey-text" href="./faq.php">FAQ</a>
            </div>
        </div>
    </footer>



</body>

</html>