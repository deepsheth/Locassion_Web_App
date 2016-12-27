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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.15.0/moment.min.js"></script>
    <script src="/js/markerclusterer.js"></script>
    <script src="/js/script.js"></script>
    <script src="/js/mini-map.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAVEtHLKbq5hTQy4VK2jzk8GXBZRR1b4VM&callback=initMap" async defer></script>


</head>

<body id="event-hist">
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
            <h3 class="grey-text text-darken-2"><span class="title blue-text">7</span> Events Attended</h3>
        </div>
        <div class="row">
            <div class="col s12 m6">
                <div id="map"></div>
            </div>
            <div class="col s12 m6 cust-collection z-depth-1">
                <ul class=" no-mar">
                    <li class="row collection-item">
                        <div class="col s2 dyn_attendees">35</div>
                        <div class="col s10 info grey-text text-darken-1">
                            <h5><a href=>Psi Soupsilon</a></h5>
                            <p><i class="material-icons left">access_time</i>Jan 1, 2016 • 7:00PM - 8:00PM <br></p>
                            <p><i class="material-icons left">place</i>Psi Upsilon</p>
                        </div>
                    </li>
                    
                    <li class="row collection-item">
                        <div class="col s2 dyn_attendees">35</div>
                        <div class="col s10 info grey-text text-darken-1">
                            <h5><a href="">Psi Soupsilon</a></h5>
                            <p><i class="material-icons left">access_time</i>Jan 1, 2016 • 7:00PM - 8:00PM <br></p>
                            <p><i class="material-icons left">place</i>Psi Upsilon</p>
                        </div>
                    </li>
                    
                    <li class="row collection-item">
                        <div class="col s2 dyn_attendees">35</div>
                        <div class="col s10 info grey-text text-darken-1">
                            <h5><a href="">Psi Soupsilon</a></h5>
                            <p><i class="material-icons left">access_time</i>Jan 1, 2016 • 7:00PM - 8:00PM <br></p>
                            <p><i class="material-icons left">place</i>Psi Upsilon</p>
                        </div>
                    </li>
                    
                    <li class="row collection-item">
                        <div class="col s2 dyn_attendees">35</div>
                        <div class="col s10 info grey-text text-darken-1">
                            <h5><a href="">Psi Soupsilon</a></h5>
                            <p><i class="material-icons left">access_time</i>Jan 1, 2016 • 7:00PM - 8:00PM <br></p>
                            <p><i class="material-icons left">place</i>Psi Upsilon</p>
                        </div>
                    </li>
                    
                    <li class="row collection-item">
                       <div class="col s2 dyn_attendees">35</div>
                        <div class="col s10 info grey-text text-darken-1">
                            <h5><a href="">Psi Soupsilon</a></h5>
                            <p><i class="material-icons left">access_time</i>Jan 1, 2016 • 7:00PM - 8:00PM <br></p>
                            <p><i class="material-icons left">place</i>Psi Upsilon</p>
                        </div>
                    </li>
                    
                    <li class="row collection-item">
                       <div class="col s2 dyn_attendees">35</div>
                        <div class="col s10 info grey-text text-darken-1">
                            <h5><a href="">Psi Soupsilon</a></h5>
                            <p><i class="material-icons left">access_time</i>Jan 1, 2016 • 7:00PM - 8:00PM <br></p>
                            <p><i class="material-icons left">place</i>Psi Upsilon</p>
                        </div>
                    </li>
                    
                </ul>
            </div>
        </div>
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