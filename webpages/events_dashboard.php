<!DOCTYPE html>
<html>

<head>

    <!-- Basic Page Needs
	================================================== -->
    <meta charset="utf-8">
    <title>Loccasion | Events Dashboard</title>
    <meta name="description" content="Loccasion: Web App">
    <meta name="author" content="Deep Sheth">

    <!-- CSS
	================================================== -->
    <link href='https://fonts.googleapis.com/css?family=Dosis:700' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.5/css/materialize.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
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

<body id="event-dashboard">
    <header class="light-green darken-2 white-text">

        <h1><a href="../index.php" class="white-text">Loccasion</a></h1>
        <ul class="inline">

            <a href="./webpages/create_event.php" class="btn waves-effect light-green lighten-3 light-green-text text-darken-4">Create Event</a>

            <a class='dropdown-button btn z-depth-0 light-green darken-2' href='#' data-activates='acct-settings'><i class="material-icons">settings</i></a>

            <!-- Dropdown Structure -->
                    <ul id='acct-settings' class='dropdown-content'>
                        <li><a href="/webpages/events_dashboard.php">Events Dashboard</a></li>
                        <li><a href="/webpages/friends_dashboard.php">Friends</a></li>
                        <li><a href="#!">Upcoming Events</a></li>
                        <li><a href="#!">Events History</a></li>
                        <li class="divider"></li>
                        <li><a href="#!">Log Out</a></li>
                    </ul>

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
        </ul>
    </header>
    <div class="container">

        <div class="row">

            <div class="col s5">
                <h3 class="grey-text text-darken-2"><span class="title blue-text">7</span> Events Hosted </h3>
                <ul class="collection z-depth-1 grey-text text-darken-2">
                    <li class="collection-item avatar">
                        <i class="material-icons circle light-green darken-1">group</i>
                        <span class="title grey-text text-darken-3">FundRager</span>
                        <p>
                             <i class="material-icons tiny grey-text text-lighten-1">event</i> Jan. 1, 2016
                            <br> <i class="material-icons tiny grey-text text-lighten-1">access_time</i> 7:00PM - 8:00PM
                            <br>  <i class="material-icons tiny grey-text text-lighten-1">place</i> Psi Upsilon
                        </p>
                        <a class="secondary-content chip" title="Attendees"><i class="material-icons">group</i>2</a>
                    </li>
                    <li class="collection-item avatar">
                        <i class="material-icons circle blue">group</i>
                        <span class="title grey-text text-darken-3">Cars and Coffee</span>
                        <p><i class="material-icons tiny grey-text text-lighten-1">event</i> Feb. 5, 2016
                            <br><i class="material-icons tiny grey-text text-lighten-1">access_time</i> 7:00AM - 12:00PM
                            <br> <i class="material-icons tiny grey-text text-lighten-1">place</i> Steel Stacks
                        </p>
                        <a href="#" class="secondary-content chip" title="Attendees"><i class="material-icons">group</i>15</a>
                    </li>
                    <li class="collection-item avatar">
                        <i class="material-icons circle light-green darken-2">group</i>
                        <span class="title grey-text text-darken-3">DaceFest</span>
                        <p><i class="material-icons tiny grey-text text-lighten-1">event</i> Feb. 23, 2016
                            <br> <i class="material-icons tiny grey-text text-lighten-1">access_time</i>6:00PM - 8:00PM
                            <br> <i class="material-icons tiny grey-text text-lighten-1">place</i> Zollner Arts Center
                        </p>
                        <a href="#" class="secondary-content chip" title="Attendees"><i class="material-icons">public</i>69</a>
                    </li>
                    <li class="collection-item avatar">
                        <i class="material-icons circle red darken-2">play_arrow</i>
                        <span class="title grey-text text-darken-3">Party!!!!!</span>
                        <p><i class="material-icons tiny grey-text text-lighten-1">event</i> Feb. 18, 2016
                            <br><i class="material-icons tiny grey-text text-lighten-1">access_time</i> 10:00PM - 1:00AM
                            <br> <i class="material-icons tiny grey-text text-lighten-1">place</i> 413 E Fifth
                        </p>
                        <a href="#!" class="secondary-content chip" title="Attendees"><i class="material-icons">public</i>185</a>
                    </li>
                    <li class="collection-item avatar">
                        <i class="material-icons circle red darken-2">play_arrow</i>
                        <span class="title grey-text text-darken-3">Party!!!!!</span>
                        <p><i class="material-icons tiny grey-text text-lighten-1">event</i> Feb. 18, 2016
                            <br><i class="material-icons tiny grey-text text-lighten-1">access_time</i> 10:00PM - 1:00AM
                            <br> <i class="material-icons tiny grey-text text-lighten-1">place</i> 413 E Fifth
                        </p>
                        <a href="#!" class="secondary-content chip" title="Attendees"><i class="material-icons">public</i>185</a>
                    </li>
                    <a href="#!" class="collection-item">See More</a>
                </ul>
            </div>

            <div class="col s5 offset-s2">
                <h3 class="grey-text text-darken-2"><span class="title blue-text">45</span> Events Attended</h3>
                <ul class="collection z-depth-1 grey-text text-darken-2">
                    <li class="collection-item avatar">
                        <i class="material-icons circle light-green darken-1">group</i>
                        <span class="title grey-text text-darken-3">FundRager</span>
                        <p>
                             <i class="material-icons tiny grey-text text-lighten-1">event</i> Jan. 1, 2016
                            <br> <i class="material-icons tiny grey-text text-lighten-1">access_time</i> 7:00PM - 8:00PM
                            <br>  <i class="material-icons tiny grey-text text-lighten-1">place</i> Psi Upsilon
                        </p>
                        <a class="secondary-content chip" title="Attendees"><i class="material-icons">group</i>2</a>
                    </li>
                    <li class="collection-item avatar">
                        <i class="material-icons circle blue">group</i>
                        <span class="title grey-text text-darken-3">Cars and Coffee</span>
                        <p><i class="material-icons tiny grey-text text-lighten-1">event</i> Feb. 5, 2016
                            <br><i class="material-icons tiny grey-text text-lighten-1">access_time</i> 7:00AM - 12:00PM
                            <br> <i class="material-icons tiny grey-text text-lighten-1">place</i> Steel Stacks
                        </p>
                        <a href="#" class="secondary-content chip" title="Attendees"><i class="material-icons">group</i>15</a>
                    </li>
                    <li class="collection-item avatar">
                        <i class="material-icons circle light-green darken-2">group</i>
                        <span class="title grey-text text-darken-3">DaceFest</span>
                        <p><i class="material-icons tiny grey-text text-lighten-1">event</i> Feb. 23, 2016
                            <br> <i class="material-icons tiny grey-text text-lighten-1">access_time</i>6:00PM - 8:00PM
                            <br> <i class="material-icons tiny grey-text text-lighten-1">place</i> Zollner Arts Center
                        </p>
                        <a href="#" class="secondary-content chip" title="Attendees"><i class="material-icons">public</i>69</a>
                    </li>
                    <li class="collection-item avatar">
                        <i class="material-icons circle red darken-2">play_arrow</i>
                        <span class="title grey-text text-darken-3">Party!!!!!</span>
                        <p><i class="material-icons tiny grey-text text-lighten-1">event</i> Feb. 18, 2016
                            <br><i class="material-icons tiny grey-text text-lighten-1">access_time</i> 10:00PM - 1:00AM
                            <br> <i class="material-icons tiny grey-text text-lighten-1">place</i> 413 E Fifth
                        </p>
                        <a href="#!" class="secondary-content chip" title="Attendees"><i class="material-icons">public</i>185</a>
                    </li>
                    <li class="collection-item avatar">
                        <i class="material-icons circle red darken-2">play_arrow</i>
                        <span class="title grey-text text-darken-3">Party!!!!!</span>
                        <p><i class="material-icons tiny grey-text text-lighten-1">event</i> Feb. 18, 2016
                            <br><i class="material-icons tiny grey-text text-lighten-1">access_time</i> 10:00PM - 1:00AM
                            <br> <i class="material-icons tiny grey-text text-lighten-1">place</i> 413 E Fifth
                        </p>
                        <a href="#!" class="secondary-content chip" title="Attendees"><i class="material-icons">public</i>185</a>
                    </li>
                    <a href="#!" class="collection-item">See More</a>
                </ul>
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