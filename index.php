<?php
include('php/login.php');

?>
    <!DOCTYPE html>
    <html>

    <head>

        <!-- Basic Page Needs
	================================================== -->
        <meta charset="utf-8">
        <title>Loccasion</title>
        <meta name="description" content="Loccasion: Web App">
        <meta name="author" content="Deep Sheth">

        <!-- CSS
	================================================== -->
        <link href='https://fonts.googleapis.com/css?family=Dosis:700' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.5/css/materialize.min.css">
        <link href='https://fonts.googleapis.com/css?family=Raleway:600|Rubik:400|Material+Icons' rel='stylesheet' type='text/css'>
        <!--    <link rel="stylesheet" href="cobblestone.css">-->
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

            //NOTE: You will need to change it so that longitude and latitude are taken from the browser instead of hard coded
            //Private Events
            var privateEventInfo = <?php
            if(isset($_SESSION['token'])){
                $url = 'https://meet-up-1097.appspot.com/?command=privateEvents&args=-75.375634;40.606709;2;2014-11-13%2016:00:00;2016-11-13%2016:00:00;:::&token='.$_SESSION['token'];

                if (strpos(get_headers($url)[0],'200') != false){
                    $jsonResponse = json_decode(file_get_contents($url),true);
                    $formattedIDs = implode(':',$jsonResponse['events']);
                    $url = 'https://meet-up-1097.appspot.com/?command=getPrivateEventInfo&args='.$formattedIDs.'&token='.$_SESSION['token'];
                    echo(file_get_contents($url).';//');
                    //echo('//'.$url);
                }
                else{
                    file_get_contents('https://meet-up-1097.appspot.com/?command=log&args=HEADERS ERROR - '.get_headers($url).'&token=none');
                }
            }
            ?>
            '';
            //Public Events
            // -75.375634
            // 40.606709
           
            
            
        </script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.5/js/materialize.min.js"></script>
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCH1nGIwaTrYIGLgKZpv_sQ4aV7xUUygDM&signed_in=true&callback=initMap" async defer></script>
        <script src="/js/script.js"></script>


    </head>

    <body id="home" class="grey darken-3">
        <header class="light-green darken-2 white-text">

            <h1><a href="/" class="white-text">Loccasion</a></h1>
            <ul class="inline">

                <?php
            if(isset($_SESSION['token'])){
                echo('<a href="./webpages/create_event.php" class="waves-effect white blue-text btn">Create Event</a>');
}
            else{
                echo('<a href="#" class="waves-effect waves-yellow white blue-text btn disabled tooltipped" data-delay="0" data-position="left" data-tooltip="Please log in.">Create Event</a>');
                }
            ?>

                    <?php
            if(isset($_SESSION['token'])){
                echo('<button data-target="modal2" class="waves-effect white grey-text btn modal-trigger">Profile</button><img class="user-thumb circle" src="https://avatars2.githubusercontent.com/u/66782?v=3&s=400" alt="" class="circle"><a class="dropdown-button btn z-depth-0 light-green darken-2 col s3" href="#" data-activates="acct-settings" data-alignment="right" data-hover="true" data-constrainwidth="false"><i class="material-icons">settings</i></a>');
            }
            else{
                echo('<button data-target="modal1" class="waves-effect white blue-text btn modal-trigger">Login</button>
                
                ');
            }
            ?>

                        <!-- Dropdown Structure -->
                        <ul id='acct-settings' class='dropdown-content'>
                            <li><a href="/webpages/events_dashboard.php">Event Dashboard</a></li>
                            <li><a href="/webpages/friends_dashboard.php">Friends</a></li>
                            <li><a href="/webpages/events_hist.php">Event History</a></li>
                            <li><a href="#!">Account Settings</a></li>
                            <li class="divider"></li>
                            <form action="" method="post">
                                <input name="logout" type="submit" value="logout" class=" modal-action modal-close waves-effect waves-blue btn-flat">
                            </form>
                        </ul>

                        <!-- Modal Structure -->
                        <form action="" method="post">
                            <div id="modal1" class="modal blue-grey-text text-darken-2">
                                <div class="modal-padding">


                                    <form>
                                        <div class="row">
                                            <h3>Login</h3>
                                            <br>
                                            <div class="input-field">
                                                <i class="material-icons prefix ">account_circle</i>
                                                <input id="icon_username" name="email" type="text">
                                                <label for="icon_username">Email</label>
                                            </div>
                                            <div class="input-field">
                                                <i class="material-icons prefix">https</i>
                                                <input id="icon_password" name="password" type="password">
                                            </div>
                                            
                                        </div>
                                    </form>


                                </div>
                                <div class="modal-footer blue-grey lighten-5">
                                    <a href="/webpages/sign_up.php" class="left modal-action modal-close waves-effect waves-blue btn-flat">Sign Up</a>
                                    <strong><input name="submit" type="submit" value="login" class="modal-action waves-effect waves-blue light-blue-text text-darken-3 btn-flat"></strong>
                                </div>
                            </div>
                        </form>
                        <form action="" method="post">
                            <div id="modal2" class="modal blue-grey-text darken-4-text">
                                <div class="modal-padding">


                                    <form>
                                        <div class="row">
                                            <h4>Logged In!</h4>
                                            <h6>Account Settings</h6>
                                            <ul class="left">
                                                <li><a href="/webpages/events_dashboard.php">Events Dashboard</a></li>
                                                <li><a href="/webpages/friends_dashboard.php">Manage Friends</a></li>
                                                <li><a href="/webpages/change_pass.php">Update Password</a></li>
                                                <li><?php echo("Current Token: ".$_SESSION['token']);?></li>
                                            </ul>
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
        <div id="main-container">

            <div id="map"></div>
            <div id="side-bar" class="grey darken-3">

                <h5 class="center-align white-text"><i class="material-icons left add-cursor" onclick="geoLocator()" title="Share Location">my_location</i>Event Stream</h5>
                <div class="row">
                    <div class="col s12">
                        <ul class="tabs">
                            <?php
                            if(!isset($_SESSION['token'])){
                                echo('<li class="tab col s3 "><a class="blue-text active" href="#" onclick="generateAllEvents()">Discover</a></li>');
                                echo('<li class="tab col s3 disabled"><a class="waves-effect waves-yellow disabled grey-text grey lighten-3 tooltipped" data-delay="0" data-position="left" data-tooltip="Please log in.">Upcoming</a></li>');
                            }
                            else{
                                echo('<li class="tab col s3 "><a href="#" class="active blue-text" onclick="generateAllEvents()">Discover</a></li>');
                                echo('<li class="tab col s3 "><a href="#" class="blue-text" onclick="generateUpcomingEvents()"> Upcoming</a></li>');
                            }
                            ?>
                        </ul>
                    </div>
                </div>
                <div id="event-panel"></div>
            </div>
            <!-- 

            <div class="row">
                <div class="col s12">
                    <div class="card light-blue darken-3">
                        <div class="card-content white-text">
                            <span class="card-title">Card Title</span>
                            <p>I am a very simple card. I am good at containing small bits of information. I am convenient because I require little markup to use effectively.</p>
                        </div>

                        <div class="card-action light-blue darken-2">
                            <ul class="collapsible" data-collapsible="accordion">
                                <li>
                                    <div class="collapsible-header light-blue darken-2">
                                        <a href="#" class="orange-text" onclick="Materialize.toast('I am a toast', 4000)">Going</a>
                                        <a href="#" class="orange-text">Not Going</a>
                                        <i class="material-icons right">keyboard_arrow_down</i>
                                    </div>
                                    <div class="collapsible-body white-text">
                                        <p>Lorem ipsum dolor sit amet.</p>
                                        <div class="chip">
                                            Tag
                                            <i class="material-icons">close</i>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

        </div>


           
          -->

            <footer>
                <div class="footer-copyright">
                    <small> <b>
                                 <a class="left white-text btn-flat tooltipped" data-delay="0" data-position="top" data-tooltip="Deep Sheth, Adam Knuckey, Corey Caplan, and Luke Dittman." href="#!">© 2015 LeavittInnovations.</a>
                                
                                <a class="right white-text btn-flat" href="/webpages/tos.html" target="_blank">Terms of Service</a>
                                <a class="right white-text btn-flat" href="/webpages/privacy.html" target="_blank">Privacy Policy</a>
                                <a class="right white-text btn-flat" href="/webpages/faq.html" target="_blank">FAQ</a>
                                </b>
                    </small>
                </div>
            </footer>

        </div>


    </body>

    </html>