<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xmlns:fb="http://ogp.me/ns/fb#">

<head>

    <!-- Basic Page Needs
	================================================== -->
    <meta charset="utf-8">
    <title>Locassion</title>
    <meta name="description" content="Locassion: Web App">
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
    <script src="https://www.gstatic.com/firebasejs/3.2.0/firebase.js"></script>
    <script src="https://www.gstatic.com/firebasejs/3.1.0/firebase-app.js"></script>
    <script src="https://www.gstatic.com/firebasejs/3.1.0/firebase-auth.js"></script>
    <script src="https://www.gstatic.com/firebasejs/3.1.0/firebase-database.js"></script>
    <script src="https://www.gstatic.com/firebasejs/3.1.0/firebase-storage.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.7/js/materialize.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.15.0/moment.min.js"></script>
    <script src="/js/markerclusterer.js"></script>
    <script src="/js/homepage.js"></script>
    <script src="/js/script.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAVEtHLKbq5hTQy4VK2jzk8GXBZRR1b4VM&callback=initMap" async defer></script>


    <!-- 
        <script type="text/javascript">
            window.heap = window.heap || [], heap.load = function (e, t) {
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
        </script> -->

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

        <h1 class="col s12 m4 l2"><a href="/" class="white-text">Locassion</a></h1>

        <a href="#" data-activates="mobile-menu" class="hide-on-med-and-up hamburger-menu waves-effect btn col s12"><i class="material-icons left">menu</i>Menu</a>

        <!-- Menu Buttons
        ================================================== -->
        <ul class="col s12 m8 l10">
            <div class="flex-container hide-on-small-only menu-buttons">
                <!-- Menu buttons are inserted here -->
            </div>
        </ul>
    </header>

    <!-- Login Popup -->
    <form>
        <div id="modal-login" class="modal modal-small blue-grey-text text-darken-2">
            <div class="modal-padding">
                <div class="row"><h3>Login</h3></div>
                <div class="row">
                    <div class="input-field col s12">
                        <i class="material-icons prefix ">account_circle</i>
                        <input id="input_username" name="email" type="text" placeholder="" required>
                        <label for="input_username">Email</label>
                    </div>

                    <div class="input-field col s12">
                        <i class="material-icons prefix">https</i>
                        <input id="input_password" name="password" type="password" placeholder="" class="enterable" required>
                        <label for="input_password">Password</label>
                        <div class="row center"><small><a href="/webpages/reset_pass_email.php" class="blue-grey-text text-darken-4">Forgot Password?</a></small></div>
                    </div>
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
                <button id="btn-login" class="right waves-effect waves-blue btn-flat blue-text submit">Login</button>
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

                <div class="container center">
                    <div id="filters">
                        <h6>Events this</h6>
                        <div>
                            <a href="" class="chip">Week</a>
                            <a href="" class="chip">Weekend</a>
                            <a href="" class="chip">Month</a>
                        </div>
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
                                <a class="right white-text btn-flat" href="https://meet-up-8d278.firebaseapp.com/" target="_blank">Developer</a>
                                </b>
                            </small>
                        </div>
                    </footer>
                </div>
            </div>
            <div id="side-bar" class="blue-grey darken-3 col s12 m6 l4">

                <div class="row row-tight white-text header">

                    <!--  text centers better with s11 to offset icons -->
                    <div class="col s11 m8">
                        <h5 class="center-align white-text"><i class="material-icons left add-cursor" onclick="geoLocator()" title="Share Location">my_location</i><i class="material-icons left add-cursor side-bar-right" title="Filter Events" data-activates="filter-side-bar">tune</i>Event Stream</h5>
                    </div>

                    <div class="input-field col m4 hide-on-small-only" title="View Events This...">
                        <select class="dark">
                            <option value="Month" selected>Month</option>
                            <option value="Week">Week</option>
                            <option value="Weekend">Weekend</option>
                            <option value="Today">Today</option>
                        </select>
                    </div>


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
                            <label>Tags (Enter to separate)</label>
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
                                <!-- Tabs inserted here -->
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