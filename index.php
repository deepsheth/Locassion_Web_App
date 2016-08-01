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
        <!--       Todo: combine Dosis and all fonts into one link (for all webpages!!!) -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.7/css/materialize.min.css">
        <link href='https://fonts.googleapis.com/css?family=Dosis:700|Raleway:400,600,700|Rubik:400|Material+Icons' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="/style.css">

        <!-- Favicons
	================================================== -->
        <link rel="icon" type="image/png" href="/favicon.png" />

        <!-- Mobile Specific Metas
	================================================== -->
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

        <!-- MSC
    ================================================== -->
        <meta property="og:image" content="http://adamknuckey.com/img/website_preview.jpg" />


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
        <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.13.0/moment.min.js"></script>
        <script src="/js/markerclusterer.js"></script>
        <script src="/js/script.js"></script>
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCH1nGIwaTrYIGLgKZpv_sQ4aV7xUUygDM&&callback=initMap" async defer></script>


        <script type="text/javascript">
            window.heap = window.heap || [], heap.load = function (e, t) {
                window.heap.appid = e, window.heap.config = t = t || {};
                var r = t.forceSSL || "https:" === document.location.protocol,
                    a = document.createElement("script");
                a.type = "text/javascript", a.async = !0, a.src = (r ? "https:" : "http:") + "//cdn.heapanalytics.com/js/heap-" + e + ".js";
                var n = document.getElementsByTagName("script")[0];
                n.parentNode.insertBefore(a, n);
                for (var o = function (e) {
                        return function () {
                            heap.push([e].concat(Array.prototype.slice.call(arguments, 0)))
                        }
                    }, p = ["addEventProperties", "addUserProperties", "clearEventProperties", "identify", "removeEventProperty", "setEventProperties", "track", "unsetEventProperty"], c = 0; c < p.length; c++) heap[p[c]] = o(p[c])
            };
            heap.load("1918988559");
        </script>

    </head>

    <body id="home" class="blue-grey darken-4">
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

            <h1 class="col s12 m4 l2"><a href="/" class="white-text">Loccasion</a></h1>

            <a href="#" data-activates="mobile-menu" class="hide-on-med-and-up hamburger-menu waves-effect btn col s12"><i class="material-icons left">menu</i>Menu</a>

            <!-- Menu Buttons
        ================================================== -->
            <ul class="col s12 m8 l10">
                <div class="flex-container hide-on-small-only">
                    <?php
                    if(isset($_SESSION['token'])){
                    echo('<a href="./webpages/create_event.php" class="waves-effect btn btn-wide">Create Event</a>');
}
                    else{
                        echo('<a href="/webpages/sign_up.php" class="waves-effect waves-yellow btn disabled tooltipped" data-delay="0" data-position="left" data-tooltip="Please log in.">Create Event</a>');
                    }

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
                                <li><a class="grey-text" onclick="logOut()">Logout</a></li>
                            </ul>

                        ');
                    }
                    else{
                        echo('<a data-target="modal-login" class="waves-effect waves-blue btn btn-flat modal-trigger">Login</a>');
                        echo('<a href="/webpages/sign_up.php"><button class="waves-effect waves-blue btn">Sign Up</button></a>');
                    }
            ?>
                </div>
            </ul>
        </header>

        <!-- Login Popup -->
        <form action="" method="post">
            <div id="modal-login" class="modal modal-small blue-grey-text text-darken-2">
                <div class="modal-padding">
                    <h3>Login</h3>
                    <br>
                    <div class="row">
                        <div class="input-field col s12">
                            <i class="material-icons prefix ">account_circle</i>
                            <input id="input_username" name="email" type="text" required>
                            <label for="input_username">Email</label>
                        </div>
                    </div>
                    <div class="input-field col s12">
                        <i class="material-icons prefix">https</i>
                        <input id="input_password" name="password" type="password" required>
                        <label for="input_password">Password</label>
                        <div class="row center"><small><a href="/webpages/reset_pass_email.php" class="blue-grey-text text-darken-4">Forgot Password?</a></small></div>
                    </div>

                    <div class="center-align">
                        <div class="row">
                            <a href="/php/facebookLogin.php" class="btn-flat waves-effect blue-text text-darken-1">Login with Facebook</a>
                        </div>
                        <div class="row">
                            <a href="#" class="btn btn-flat waves-effect deep-orange white-text disabled tooltipped" data-tooltip="Get pumped... this is coming soon!">Login with Google</a>
                        </div>
                    </div>
                </div>
                <div class="modal-footer blue-grey-text text-darken-2">
                    <a href="/webpages/sign_up.php" class="left modal-action modal-close waves-effect waves-blue btn-flat ">Sign Up</a>
                    <a href="#">
                        <input name="submit" type="submit" value="login" id="btn-login" class="modal-action btn-flat blue-text">
                    </a>
                </div>
            </div>
        </form>

        <!--   Custom Modal    -->
        <!--   Used for URL Share     -->

        <div id="dyn_modal" class="modal">
            <div class="modal-padding center center-align">
                <div class="row">
                    <h4>Copy Event Link</h4>
                    <br>

                    <input type="text" name="url" value="http://www.adamknucky.com/webpages/eventinfo.php?id=3" readonly>
                    <br>
                </div>

                <div class="modal-footer primary-green blue-grey-text text-darken-2">
                    <a class="right modal-action modal-close waves-effect waves-blue btn-flat ">Close</a>
                </div>
            </div>
        </div>


        <div id="main-container">
            <div class="row">
                <div id="map-panel" class="col m6 l8 hide-on-small-only">

                    <div class="container">
                        <div id="filters" class="flex-container">
                            <h6>Events this</h6>
                            <div>
                                <a href="" class="chip">Week</a>
                                <a href="" class="chip">Weekend</a>
                                <a href="" class="chip">Month</a>
                            </div>
                            <input id="edit_location" type="text" placeholder="18015" title="Zip Code" class="modal-trigger add-cursor" data-target="filter-events" readonly>
                            <!--                   <input type="date" class="datepicker"><i class="material-icons">date_range</i>-->
                            <p class="range-field">
                                <input type="range" id="test5" min="1" max="15" class="tooltipped" data-delay="0" data-position="bottom" data-tooltip="Radius" />
                            </p>

                            <a href="/" class="waves-effect waves-blue btn btn-flat refresh"><i class="material-icons">refresh</i></a>
                        </div>


                    </div>

                    <div class="map-container">
                        <!--
                    <div class="progress primary-green">
                        <div class="determinate green darken-3"></div>
                    </div>
-->
                        <div id="map"></div>
                        <footer>
                            <!--                           IMPORTANT -- TODO Prevent scrolling when calendar is open-->
                            <input type="hidden" class="datepicker" id="hidden">
                            <div class="footer-copyright">
                                <small> <b>
                                <a class="left white-text btn-flat tooltipped" data-delay="0" data-position="top" data-tooltip="Deep Sheth, Adam Knuckey, Corey Caplan, and Luke Dittman." href="/meta/index.html">© 2015-2016 LeavittInnovations.</a>

                                <a class="right white-text btn-flat" href="/webpages/tos.php" target="_blank">Terms of Service</a>
                                <a class="right white-text btn-flat" href="/webpages/privacy.php" target="_blank">Privacy Policy</a>
                                <a class="right white-text btn-flat" href="/webpages/faq.php" target="_blank">FAQ</a>
                                </b>
                            </small>
                            </div>
                        </footer>
                    </div>
                </div>
                <div id="side-bar" class="blue-grey darken-3 col s12 m6 l4">

                    <div class="row row-tight white-text">
                        <i class="material-icons left add-cursor" onclick="geoLocator()" title="Share Location">my_location</i><i class="material-icons left add-cursor side-bar-right" title="Filter Events" data-activates="filter-side-bar">tune</i>
                        <h5 class="center-align white-text">Event Stream</h5>
                    </div>

                    <div id="filter-side-bar" class="side-nav">

                        <h4 class="center">Filters</h4>

                        <div class="section">

                            <div class="row hide-on-med-and-up">
                                <p>
                                    <label>Events this...</label>
                                </p>
                                <div class="center">
                                    <span href="" class="chip add-cursor">Week</span>
                                    <span href="" class="chip add-cursor">Weekend</span>
                                    <span href="" class="chip month add-cursor">Month</span>
                                </div>
                            </div>

                            <div class="row">
                                <div class="input-field col s12">
                                    <input id="edit_location" class="border-thick" type="text" value="Lehigh University" title="Address">
                                    <label for="edit_location">Address</label>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col s12">
                                    <label for="r-pick">Radius (miles)</label>
                                    <p class="range-field">
                                        <input type="range" id="r-pick" min="1" max="100" />
                                    </p>
                                </div>
                            </div>

                            <div class="row">
                                <div class=" row col s12">
                                    <label>Privacy Type</label>
                                </div>
                                <div class="section">
                                    <div class="col s12 m6">
                                        <input type="checkbox" class="filled-in" id="public_box" />
                                        <label for="public_box">Hide Public</label>
                                    </div>
                                    <div class="col s12 m6">
                                        <input type="checkbox" class="filled-in" id="private_box" />
                                        <label for="private_box">Hide Private</label>
                                    </div>
                                </div>
                            </div>

                            <div class="section">
                                <label>Tags</label>
                                <div class="chips category-chip border-thick"></div>
                            </div>

                            <div class="section center">
                                <button class="waves-effect waves-light btn blue icon-hoverable" type="submit"><i class="material-icons left">check</i>Apply Filters</button>
                            </div>

                        </div>

                    </div>

                    <div class="row">
                        <div class="col s12">
                            <div id="preloader-indef" class="progress green lighten-3">
                                <div class="indeterminate primary-green"></div>
                            </div>
                            <ul class="tabs">

                                <?php
                            if(!isset($_SESSION['token'])){
                                echo('<li class="tab col s3 "><a class="blue-text active" href="#" onclick="getEvents()">Discover</a></li>');
                                echo('<li class="tab col s3 disabled"><a href="#" class="waves-effect waves-yellow grey-text grey lighten-3 tooltipped" data-delay="0" data-position="left" data-tooltip="Please log in.">Attending</a></li>');
                            }
                            else{
                                echo('<li class="tab col s3 "><a href="#" class="active blue-text" onclick="getEvents()">Discover</a></li>');
                                echo('<li class="tab col s3 "><a href="#" class="blue-text" onclick="getAttendingEvents()">Attending</a></li>');
                            }
                            ?>

                            </ul>
                        </div>
                    </div>

                    <div id="event-panel">
                        <!--
                        <div class="row">
                            <div class="col s12">
                                <div class="card">
                                    <div class="img-wrapper">
                                        <img class="responsive-img" src="http://www.skiheavenly.com/~/media/heavenly/images/732x260%20header%20images/events-heavenly-header.ashx" alt="">
                                    </div>
                                    <div class="card-content">

                                        <div class="row">
                                            <div class="col s3 center-align mini-cal add-cursor" onclick="viewCal(event,'2015-02-12')">
                                                <div class="day">Sat</div>
                                                <div class="day-num">7</div>
                                                <div class="month">Jul</div>
                                                <div class="context">a month ago</div>
                                            </div>
                                            <div class="col m9 l8 offset-l1">
                                                <div class="card-title"><a href="">This is a New Card</a></div>
                                                <div class="icon-hoverable add-cursor"><i title="Location" class="material-icons icons-inline left">place</i>Psi Upsilon</div>
                                                <div class="small-details">27 Memorial Dr.</div>
                                                <div class="icon-hoverable"><i title="Time" class="material-icons icons-inline left">access_time</i>Time</div>
                                            </div>
                                        </div>

                                        <div class="row row-tight">
                                            <div class="row span-padded center">
                                                <i title="Time" class="material-icons tiny">public</i>
                                                <span>
                                                    Public
                                                </span>
                                                <span>
                                                    8 Friends Going
                                                </span>
                                                <span>
                                                    13 Total
                                                </span>
                                            </div>
                                            
                                            <div class="fold-body hidden">
                                               
                                                <div>
                                                    <div class="center-align">
                                                        <a href="#">Deep Sheth</a> created this meet up.
                                                    </div>
                                                </div>
                                                <div class="row row-tight">
                                                    <p class="col s12">
                                                        Lorem ipsum dolor sit amet, ne enim omnium accusamus eos, aeque dicunt verterem eam eu, pri oportere disputando in. Ei nonumy consul eum, nec ex tempor dolores, graece nostrum platonem id mei. Id vel omnis inermis omittantur. Mazim dolor eloquentiam ex ius, vel ad nulla noster putant. Ei cetero definiebas mei, est eu cibo munere putant, cum dico salutatus te. Cu alia tantas tempor per. Quo te errem argumentum, cu per natum accusamus expetendis. Quas sadipscing mei in, dicat vitae maluisset qui at, graeci iracundia philosophia at sed. Cu sea simul delicata.
                                                    </p>
                                                </div>
                                                
                                                <div class="divider"></div>
                                                <div class="row flex-container">
                                                    <a href="#" class="chip">Tag1</a>
                                                    <a href="#" class="chip">Tag2</a>
                                                    <a href="#" class="chip">Tag3</a>
                                                    <a href="#" class="chip">Tag4</a>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="card-action center-align expand-fold">
                                        <div class="col s6 pre-btn left-align"><a href="#" class="fold-label">More</a><i class="material-icons left grey-text text-darken-2" title="Event Details">info</i></div>
                                        <div class="col s6 right right-align"><a href="#" class="btn-go waves-effect waves-light">GO</a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
-->
                    </div>
                </div>
            </div>
        </div>
    </body>

    </html>