<?php
include('../php/login.php');
?>
    <!DOCTYPE html>
    <html>

    <head>

        <!-- Basic Page Needs
================================================== -->
        <meta charset="utf-8">
        <title>Locassion | Log In</title>
        <meta name="description" content="Locassion: Web App">
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


        <!-- Page Specific Styles and Scripts
================================================== -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.7/js/materialize.min.js"></script>
        <script src="https://www.gstatic.com/firebasejs/3.2.0/firebase.js"></script>
        <script src="https://www.gstatic.com/firebasejs/3.1.0/firebase-app.js"></script>
        <script src="https://www.gstatic.com/firebasejs/3.1.0/firebase-auth.js"></script>
        <script src="https://www.gstatic.com/firebasejs/3.1.0/firebase-database.js"></script>
        <script src="https://www.gstatic.com/firebasejs/3.1.0/firebase-storage.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.7/js/materialize.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.15.0/moment.min.js"></script>
        <script src="/js/script.js"></script>


    </head>

    <body id="registration">
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
                        addMenuButton("forgot_password");
                        addMenuButton("sign_up");
                        
                        firebase.auth().onAuthStateChanged(function(user) {
                            if (user) {
                                var redirect = window.location.search.substring(1);
                                var newURL = redirect.split("=");
                                if (newURL[0] == "redirect") {
                                    window.location.pathname = newURL[1];
                                }
                            }
                        });
                    </script>

                </div>
            </ul>
        </header>

        <div class="bold-blue bg">
            <div class="container">
                <div class="row">
                    <div class="col hide-on-small-only m4 l5 center">
                        <img src="/img/logo_large_white2.png" alt="">
                    </div>
                    <div class="col s12 m6 offset-m2 l5 offset-l2 white z-depth-1 hoverable">
                        <form method="post">
                            <h3>Please Login</h3>
                                <br>
                                <div class="input-field col s12">
                                    <i class="material-icons prefix ">account_circle</i>
                                    <input id="input_username" name="email" type="text">
                                    <label for="input_username">Email</label>
                                </div>
                                <div class="input-field col s12">
                                    <i class="material-icons prefix">https</i>
                                    <input id="input_password" name="password" type="password">
                                    <label for="input_password">Password</label>
                                    <small><a href="/webpages/reset_pass_email.php" class="right">Forgot Password?</a></small>
                                </div>



                                <button class="waves-effect waves-light primary-green btn-large" id="btn-login" type="submit" name="submit"><i class="material-icons right">send</i>Log In</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

     
        <?php
        define('__ROOT__', dirname(dirname(__FILE__)));
        include_once(__ROOT__.'/templates/simple-footer.php'); 
        ?>

   
    </body>

    </html>