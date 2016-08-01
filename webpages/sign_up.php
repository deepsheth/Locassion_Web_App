<?php
include('../php/signUp.php');
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
            window.heap=window.heap||[],heap.load=function(e,t){window.heap.appid=e,window.heap.config=t=t||{};var r=t.forceSSL||"https:"===document.location.protocol,a=document.createElement("script");a.type="text/javascript",a.async=!0,a.src=(r?"https:":"http:")+"//cdn.heapanalytics.com/js/heap-"+e+".js";var n=document.getElementsByTagName("script")[0];n.parentNode.insertBefore(a,n);for(var o=function(e){return function(){heap.push([e].concat(Array.prototype.slice.call(arguments,0)))}},p=["addEventProperties","addUserProperties","clearEventProperties","identify","removeEventProperty","setEventProperties","track","unsetEventProperty"],c=0;c<p.length;c++)heap[p[c]]=o(p[c])};
            heap.load("414125220");
        </script>

        <!-- Page Specific Styles and Scripts
	================================================== -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.5/js/materialize.min.js"></script>
        <script>

            $(document).ready(function() {
                $('.modal-trigger').leanModal();
                console.log("???");
            });

        </script>


    </head>

    <body id="registration">
        <header class="primary-green row">

            <h1 class="col s12 m4 l2"><a href="/" class="white-text">Loccasion</a></h1>
            <ul class="col s12 m8 l10">
                <div class="flex-container">

                    <a href="/webpages/reset_pass_email.php" class="btn waves-effect lighten-3 blue-text white">Forgot Password</a>
                    <a href="/webpages/log_in.php" class="btn waves-effect lighten-3 blue-text white">Login</a>

                    <!-- Dropdown Structure -->
                    <ul id='acct-settings' class='dropdown-content'>
                        <li><a href="#!">Account Settings</a></li>
                        <li><a href="#!">Upcoming Events</a></li>
                        <li class="divider"></li>
                        <li><a href="#!">Log Out</a></li>
                    </ul>
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
                        <form action="" method="post">
                            <h3 class="blue-grey-text text-darken-2">Sign Up</h3>

                            <!-- fake fields bypass browser autocomplete -->
                            <input style="visibility:hidden; height: 0px" type="password" />


                            <div class="input-field">
                                <i class="material-icons prefix blue-grey-text">account_circle</i>
                                <input id="icon_username" name="username" type="text" required>
                                <label for="icon_username">Name</label>
                            </div>
                            <div class="input-field">
                                <i class="material-icons prefix blue-grey-text">email</i>
                                <input id="icon_email" name="email" type="email" class="validate" required>
                                <label for="icon_email">Email</label>
                            </div>

                            <div class="input-field">
                                <i class="material-icons prefix blue-grey-text">map</i>
                                <input id="icon_location" name="location" type="number" min="10000" max="99999" class="validate">
                                <label for="icon_location">Default Zipcode (optional)</label>
                            </div>

                            <div class="input-field">
                                <i class="material-icons prefix blue-grey-text">https</i>
                                <input id="icon_password" name="password" type="password" required>
                                <label for="icon_password">Password</label>
                            </div>

                            <!-- fake fields bypass browser autocomplete -->
                            <input style="visibility:hidden; height: 0px" type="password" />
                            
                            <div class="center-align">
                                <div class="row">
                                    <a href="/php/facebookLogin.php" class="btn btn-flat waves-effect blue darken-1 white-text">Login with Facebook</a>
                                </div>
                                <div class="row">
                                    <a href="#" class="btn btn-flat waves-effect deep-orange white-text disabled tooltipped" data-tooltip="Get pumped... this is coming soon!">Login with Google</a>
                                </div>
                                <div class="row center"><small>We won't post anything without asking!</small></div>
                            </div>
                            

                            <button class="waves-effect waves-light primary-green btn-large" type="submit" name="signup"><i class="material-icons right">send</i>Submit</button>
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