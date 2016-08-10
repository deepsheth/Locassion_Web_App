<?php
// include('../php/signUp.php');
?>
    <!DOCTYPE html>
    <html>

    <head>

        <!-- Basic Page Needs
	================================================== -->
        <meta charset="utf-8">
        <title>Loccasion | Sign Up</title>
        <meta name="description" content="Loccasion: Web App">
        <meta name="author" content="Deep Sheth">

        <!-- CSS
	================================================== -->
        <link href='https://fonts.googleapis.com/css?family=Dosis:700' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.7/css/materialize.min.css">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link rel="stylesheet" href="../css/jquery.timepicker.css">
        <link rel="stylesheet" href="/style.css">

        <!-- Favicons
	================================================== -->
        <link rel="icon" type="image/png" href="/favicon.png" />

        <!-- Mobile Specific Metas
	================================================== -->
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

        <!-- Analytics
	================================================== -->
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
            heap.load("414125220");
        </script>

        <!-- Page Specific Styles and Scripts
	================================================== -->
        <script src="https://www.gstatic.com/firebasejs/3.2.0/firebase.js"></script>
        <script src="https://www.gstatic.com/firebasejs/3.1.0/firebase-app.js"></script>
        <script src="https://www.gstatic.com/firebasejs/3.1.0/firebase-auth.js"></script>
        <script src="https://www.gstatic.com/firebasejs/3.1.0/firebase-database.js"></script>
        <script src="https://www.gstatic.com/firebasejs/3.1.0/firebase-storage.js"></script>
        <script>
            // Initialize Firebase
            var config = {
                apiKey: "AIzaSyAVEtHLKbq5hTQy4VK2jzk8GXBZRR1b4VM",
                authDomain: "meet-up-8d278.firebaseapp.com",
                databaseURL: "https://meet-up-8d278.firebaseio.com",
                storageBucket: "meet-up-8d278.appspot.com",
            };
            firebase.initializeApp(config);

            // Check if user is logged in
            var user = firebase.auth().currentUser;

            if (user) {
                var logged_in = true;
            } else {
                var logged_in = false;
            }
        </script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.5/js/materialize.min.js"></script>
        <script src="/js/script.js"></script>

    </head>

    <body id="registration">
        <header class="primary-green row">

            <h1 class="col s12 m4 l2"><a href="/" class="white-text">Loccasion</a></h1>
            <ul class="col s12 m8 l10">
                <div class="flex-container">

                <script>
                    firebase.auth().onAuthStateChanged(function (user) {
                        clearMenu();
                        if (user) {
                            // signed in.
                            console.log("Please Sign Out");
                            window.location.pathname = '/';
                        } else {
                            // NOT signed in.
                            console.log("Create account");
                            addMenuButton("forgot_password");
                            addMenuButton("login");
                            addMenuButton("sign_up");
                        }
                    });
                </script>
                    
                </div>
            </ul>
        </header>

        <div class="bold-blue bg">
            <div class="container">
                <form class="row">


                    <div class="col hide-on-small-only m4 l5 center">

                        <img src="/img/logo_large_white2.png" alt="">
                    </div>


                    <div class="col s12 m6 offset-m2 l5 offset-l2 white z-depth-1">
                        <div class="modal-padding">
                            <h3 class="blue-grey-text text-darken-2">Sign Up</h3>

                            <!-- fake fields bypass browser autocomplete -->
                            <input style="visibility:hidden; height: 0px" type="password" />


                            <div class="input-field col s12">
                                <i class="material-icons prefix">account_circle</i>
                                <input id="input_name" name="username" type="text" required>
                                <label for="input_name">Name</label>
                            </div>
                            <div class="input-field col s12">
                                <i class="material-icons prefix">email</i>
                                <input id="input_username" name="email" type="email" class="validate" required>
                                <label for="input_username">Email</label>
                            </div>

                            <div class="input-field col s12">
                                <i class="material-icons prefix">map</i>
                                <input id="input_zipcode" name="location" type="number" min="10000" max="99999" class="validate">
                                <label for="input_zipcode">Default Zipcode (optional)</label>
                            </div>

                            <div class="input-field col s12">
                                <i class="material-icons prefix">https</i>
                                <input id="input_password" name="password" type="password" required>
                                <label for="input_password">Password</label>
                            </div>

                            <!-- fake fields bypass browser autocomplete -->
                            <input style="visibility:hidden; height: 0px" type="password" />

                            <div class="row center-align">
                                <button class="waves-effect waves-light primary-green btn-large" id="btn-create-acct"><i class="material-icons right">send</i>Create Account</button>
                            </div>

                            <div class="section center-align">

                                <div class="row">
                                    <hr>

                                </div>

                                <div class="row">
                                    <small>You may also sign up with:</small>
                                </div>
                                <div class="row">
                                    <a href="/php/facebookLogin.php" class="btn btn-flat waves-effect blue-text">Facebook</a>
                                    <a href="#" class="btn btn-flat waves-effect deep-orange-text disabled tooltipped" data-tooltip="Get pumped... this is coming soon!">Google</a>
                                </div>
                                <div class="row"><small>Don't worry, we won't post anything without asking!</small></div>

                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>


        <?php
        define('__ROOT__', dirname(dirname(__FILE__)));
        include_once(__ROOT__.'/templates/simple-footer.php'); 
        ?>


    </body>

    </html>