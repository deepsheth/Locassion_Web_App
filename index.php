<?php

include('php/login.php');


if (!isset($_SESSION['token'])) {
    $useragent=$_SERVER['HTTP_USER_AGENT'];

    if(preg_match('/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows (ce|phone)|xda|xiino/i',$useragent)||preg_match('/1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i',substr($useragent,0,4)))
    header('Location: http://www.adamknuckey.com/meta/index.html');
}
?>

    <!DOCTYPE html>
    <html xmlns="http://www.w3.org/1999/xhtml" xmlns:fb="http://ogp.me/ns/fb#">

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

        <!-- MSC
    ================================================== -->
        <meta property="og:image" content="/img/website_preview.jpg" />


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
            //            var privateEventInfo = <?php
            //            if(isset($_SESSION['token'])){
            //                $url = 'https://meet-up-1097.appspot.com/?command=privateEvents&args=-75.375634;40.606709;2;2014-11-13%2016:00:00;2020-11-13%2016:00:00;:::&token='.$_SESSION['token'];
            //
            //                if (strpos(get_headers($url)[0],'200') != false){
            //                    $jsonResponse = json_decode(file_get_contents($url),true);
            //                    $formattedIDs = implode(':',$jsonResponse['events']);
            //                    $url = 'https://meet-up-1097.appspot.com/?command=getPrivateEventInfo&args='.$formattedIDs.'&token='.$_SESSION['token'];
            //                    echo(file_get_contents($url).';//');
            //                    //echo('//'.$url);
            //                }
            //                else{
            //                    file_get_contents('https://meet-up-1097.appspot.com/?command=log&args=HEADERS ERROR - '.get_headers($url).'&token=none');
            //                }
            //            }
            //            ?>
            //            '';
            //            //Public Events
            //            // -75.375634
            //            // 40.606709
            //
            //            var publicEventInfo = <?php
            //            //if(isset($_SESSION['token'])){
            //            $url = 'https://meet-up-1097.appspot.com/?command=publicEvents&args=-75.375634;40.606709;2;2014-11-13%2016:00:00;2016-11-13%2016:00:00;:::&token=';//.$_SESSION['token'];
            //            //                print_r(get_headers($url));
            //
            //            if (strpos(get_headers($url)[0],'200') != false){
            //                $jsonResponse = json_decode(file_get_contents($url),true);
            //                $formattedIDs = implode(':',$jsonResponse['events']);
            //                $url = 'https://meet-up-1097.appspot.com/?command=getPublicEventInfo&args='.$formattedIDs.'&token=';
            //                //.$_SESSION['token'];
            //                echo(file_get_contents($url).';//');
            //                //echo('//'.$url);
            //            }
            //            //}
            //            ?>
            //            '';
        </script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.5/js/materialize.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.13.0/moment.min.js"></script>
        <script src="/js/markerclusterer.js"></script>
        <script src="/js/script.js"></script>
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCH1nGIwaTrYIGLgKZpv_sQ4aV7xUUygDM&&callback=initMap" async defer></script>


    </head>

    <body id="home" class="blue-grey darken-4">
        <header class="primary-green row">

            <ul class="side-nav" id="mobile-menu">
                <li><a href="sass.html">View Map</a></li>
                <li><a href="badges.html">Create Event</a></li>
                <li><a href="mobile.html">Login</a></li>
                <li class="divider"></li>                               
                <li><a href="mobile.html">Download App</a></li>
            </ul>

            
            <h1 class="col s12 m4 l2"><a href="/" class="white-text">Loccasion</a></h1>

            <a href="#" data-activates="mobile-menu" class="hide-on-med-and-up hamburger-menu waves-effect btn col s12"><i class="material-icons left">menu</i>Menu</a>
            
            <ul class="col s12 m8 l10">
                <div class="flex-container hide-on-small-only">
                    <?php
            if(isset($_SESSION['token'])){
                echo('<a href="./webpages/create_event.php" class="waves-effect btn btn-wide">Create Event</a>');
}
            else{
                echo('<a href="#" class="waves-effect waves-yellow btn disabled tooltipped" data-delay="0" data-position="left" data-tooltip="Please log in.">Create Event</a>');
                }
            ?>

                        <?php
                if(isset($_SESSION['token'])){
                    echo('
                        <a class="dropdown-button btn btn-flat grey-text" href="#" data-activates="acct-settings" data-alignment="right" data-hover="true" data-constrainwidth="false">
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
                            <li><a onclick="logOut()">Logout</a></li>
                        </ul>
                        
                        ');
                }
                else{
                    echo('<button data-target="modal-small" class="waves-effect btn modal-trigger">Login</button>

                    ');
                }
            ?>


                            <!-- Login Popup -->
                            <form action="" method="post">
                                <div id="modal-small" class="modal blue-grey-text text-darken-2">
                                    <div class="modal-padding">
                                        <div class="row">
                                            <h3>Login</h3>
                                            <br>
                                            <div class="input-field">
                                                <i class="material-icons prefix ">account_circle</i>
                                                <input id="icon_username" name="email" type="text" required>
                                                <label for="icon_username">Email</label>
                                            </div>
                                            <div class="input-field center">
                                                <i class="material-icons prefix">https</i>
                                                <input id="icon_password" name="password" type="password" required>
                                                <small><a href="/webpages/reset_pass_email.php" class="blue-grey-text text-darken-4">Forgot Password?</a></small>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer blue-grey lighten-4 blue-grey-text text-darken-2">
                                        <a href="/webpages/sign_up.php" class="left modal-action modal-close waves-effect waves-blue btn-flat ">Sign Up</a>
                                        <strong><input name="submit" type="submit" value="login" class="modal-action waves-effect waves-blue btn-flat blue-text"></strong>
                                    </div>
                                </div>
                            </form>
                </div>
            </ul>
        </header>
        <div id="main-container">
            <div class="row">
                <div class="col m6 l8 hide-on-small-only">
               <div id="filters">
                    <h5 class="col s2">Events this: </h5>
                   <div class="col s12 l2">
                       <a href="" class="chip">Week</a>
                       <a href="" class="chip">Weekend</a>
                       <a href="" class="chip">Month</a>
                   </div>
                   <i class="material-icons">date_range</i>
                   <label>Radius</label>
                   <input type="range" id="test5" min="0" max="100" />
               </div>
           
            
                <div class="map-container">
<!--
                    <div class="progress primary-green">
                        <div class="determinate green darken-3"></div>
                    </div>
-->
                    <div id="map"></div>
                    <footer>
                        <div class="footer-copyright">
                            <small> <b>
                                <a class="left white-text btn-flat tooltipped" data-delay="0" data-position="top" data-tooltip="Deep Sheth, Adam Knuckey, Corey Caplan, and Luke Dittman." href="/meta/index.html">© 2015-2016 LeavittInnovations.</a>

                                <a class="right white-text btn-flat" href="/webpages/tos.html" target="_blank">Terms of Service</a>
                                <a class="right white-text btn-flat" href="/webpages/privacy.html" target="_blank">Privacy Policy</a>
                                <a class="right white-text btn-flat" href="/webpages/faq.html" target="_blank">FAQ</a>
                                </b>
                            </small>
                        </div>
                    </footer>
                </div>
            </div>
                <div id="side-bar" class="blue-grey darken-3 col s12 m6 l4">

                    <h5 class="center-align white-text"><i class="material-icons left add-cursor" onclick="geoLocator()" title="Share Location">my_location</i>Event Stream</h5>
                    <div class="row">
                        <div class="col s12">
                                    <div id="preloader-indef" class="progress blue-grey darken-3">
                                        <div class="indeterminate blue-grey"></div>
                                    </div>
                            <ul class="tabs">

                                <?php
                            if(!isset($_SESSION['token'])){
                                echo('<li class="tab col s3 "><a class="blue-text active" href="#" onclick="getEvents()">Discover</a></li>');
                                echo('<li class="tab col s3 disabled"><a class="waves-effect waves-yellow disabled grey-text grey lighten-3 tooltipped" data-delay="0" data-position="left" data-tooltip="Please log in.">Attending</a></li>');
                            }
                            else{
                                echo('<li class="tab col s3 "><a href="#" class="active blue-text" onclick="getEvents()">Discover</a></li>');
                                echo('<li class="tab col s3 "><a href="#" class="blue-text" onclick="getAttendingEvents()">Attending</a></li>');
                            }
                            ?>

                            </ul>
                        </div>
                    </div>
                    <div id="event-panel"></div>
                </div>
            </div>
        </div>
    </body>

    </html>