<!DOCTYPE html>
<html>

<head>

    <!-- Basic Page Needs
	================================================== -->
    <meta charset="utf-8">
    <title>Locassion | Events Dashboard</title>
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
    <script src="/js/script.js"></script>
    <script src="/js/mini-map.js"></script>

    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAVEtHLKbq5hTQy4VK2jzk8GXBZRR1b4VM&callback=initMap" async defer></script>


</head>

<body id="event-dashboard">
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
                    addMenuButton("dropdown");
                    requireLogin();
                </script>

                <form action="" method="post">
                    <div id="modal2" class="modal blue-grey-text darken-4-text">
                        <div class="login-modal">


                            <form>
                                <div class="row">
                                    <h4>Logged In!</h4>
                                    <h6>Account Settings</h6>
                                    <ul class="left">
                                        <li><a href="/webpages/events_hosting.html">Events You Created</a></li>
                                        <li><a href="#">Friends</a></li>
                                        <li><a href="#">Event History</a></li>
                                        <li><a href="/webpages/change_pass.html">Update Password</a></li>
                                    </ul>

                                    <?php echo("Current Token: ".$_SESSION['token']);?>
                                </div>
                            </form>


                        </div>
                        <div class="modal-footer">
                            <input name="logout" type="submit" value="logout" class=" modal-action modal-close waves-effect waves-blue btn-flat">
                        </div>
                    </div>
                </form>
            </div>
        </ul>
    </header>
    <div class="container">

        <div class="row">
            <h3 class="grey-text text-darken-2"><span class="title blue-text">7</span> Events Hosted</h3>
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
                            <h5 class="icon-hoverable"><a href=""><i class="material-icons left">edit</i></a><a href="">Psi Soupsilon</a></h5>
                            <p><i class="material-icons left">access_time</i>Jan 1, 2016 • 7:00PM - 8:00PM
                                <br>
                            </p>
                            <p><i class="material-icons left">place</i>Psi Upsilon</p>
                        </div>
                    </li>

                    <li class="row collection-item">
                        <div class="col s2 dyn_attendees">35</div>
                        <div class="col s10 info grey-text text-darken-1">
                            <h5 class="icon-hoverable"><a href=""><i class="material-icons left">edit</i></a><a href="">Psi Soupsilon</a></h5>
                            <p><i class="material-icons left">access_time</i>Jan 1, 2016 • 7:00PM - 8:00PM
                                <br>
                            </p>
                            <p><i class="material-icons left">place</i>Psi Upsilon</p>
                        </div>
                    </li>

                    <li class="row collection-item">
                        <div class="col s2 dyn_attendees">35</div>
                        <div class="col s10 info grey-text text-darken-1">
                            <h5 class="icon-hoverable"><a href=""><i class="material-icons left">edit</i></a><a href="">Psi Soupsilon</a></h5>
                            <p><i class="material-icons left">access_time</i>Jan 1, 2016 • 7:00PM - 8:00PM
                                <br>
                            </p>
                            <p><i class="material-icons left">place</i>Psi Upsilon</p>
                        </div>
                    </li>

                    <li class="row collection-item">
                        <div class="col s2 dyn_attendees">35</div>
                        <div class="col s10 info grey-text text-darken-1">
                            <h5 class="icon-hoverable"><a href=""><i class="material-icons left">edit</i></a><a href="">Psi Soupsilon</a></h5>
                            <p><i class="material-icons left">access_time</i>Jan 1, 2016 • 7:00PM - 8:00PM
                                <br>
                            </p>
                            <p><i class="material-icons left">place</i>Psi Upsilon</p>
                        </div>
                    </li>

                    <li class="row collection-item">
                        <div class="col s2 dyn_attendees">35</div>
                        <div class="col s10 info grey-text text-darken-1">
                            <h5 class="icon-hoverable"><a href=""><i class="material-icons left">edit</i></a><a href="">Psi Soupsilon</a></h5>
                            <p><i class="material-icons left">access_time</i>Jan 1, 2016 • 7:00PM - 8:00PM
                                <br>
                            </p>
                            <p><i class="material-icons left">place</i>Psi Upsilon</p>
                        </div>
                    </li>

                    <li class="row collection-item">
                        <div class="col s2 dyn_attendees">35</div>
                        <div class="col s10 info grey-text text-darken-1">
                            <h5 class="icon-hoverable"><a href=""><i class="material-icons left">edit</i></a><a href="">Psi Soupsilon</a></h5>
                            <p><i class="material-icons left">access_time</i>Jan 1, 2016 • 7:00PM - 8:00PM
                                <br>
                            </p>
                            <p><i class="material-icons left">place</i>Psi Upsilon</p>
                        </div>
                    </li>

                </ul>
            </div>
        </div>
    </div>


    <?php
        include_once(dirname(dirname(__FILE__)).'/templates/simple-footer.php'); 
        ?>

</body>

</html>