<?php
include('../php/login.php');
?>
<!DOCTYPE html>
<html>

    <head>

        <!-- Basic Page Needs
================================================== -->
        <meta charset="utf-8">
        <title>Loccasion | Log In</title>
        <meta name="description" content="Loccasion: Web App">
        <meta name="author" content="Deep Sheth">

        <!-- CSS
================================================== -->
        <link href='https://fonts.googleapis.com/css?family=Dosis:700' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.5/css/materialize.min.css">
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
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.5/js/materialize.min.js"></script>
        <script src='https://www.google.com/recaptcha/api.js'></script>


    </head>

    <body id="sign-up">
        <header class="light-green darken-2 white-text row">

            <h1 class="col s12 m4 l2"><a href="/" class="white-text">Loccasion</a></h1>
            <ul >

                <a href="/webpages/change_pass.php" class="btn waves-effect light-green lighten-3 light-green-text text-darken-4">Change Password</a>
                <a class='dropdown-button btn z-depth-0 light-green darken-2' href='#' data-activates='acct-settings'><i class="material-icons">settings</i></a>

                <!-- Dropdown Structure -->
                <ul id='acct-settings' class='dropdown-content'>
                    <li><a href="#!">Account Settings</a></li>
                    <li><a href="#!">Upcoming Events</a></li>
                    <li class="divider"></li>
                    <li><a href="#!">Log Out</a></li>
                </ul>
            </ul>
        </header>

        <div class="container">
            <div class="row">
                <div class="col s7">
                    <img src="/img/logo_large_white2.png" alt="">
                </div>
                <div class="col s5 white z-depth-2">
                    <form action="/" method="post">
                        
                        
                        <?php
                            if (isset($_SESSION['userID'])) {
                                echo ("
                                    <h3 class='light-green-text text-darken-2'>Account Created!</h3>
                                    <p class='grey-text center'>Last step, please log in.</p>
                                ");
                            }
                            else {
                                echo ("<h3>Please Login</h3>");
                            }
                            
                            if (isset($_GET['error'])) echo ("<p class='red-text center'>Invalid username or password.</p>");
                            
                        ?>
                       
                        
                        
                        <br>
                        <div class="input-field">
                            <i class="material-icons prefix ">account_circle</i>
                            <input id="icon_username" name="email" type="text">
                            <label for="icon_username">Email</label>
                        </div>
                        <div class="input-field">
                            <i class="material-icons prefix">https</i>
                            <input id="icon_password" name="password" type="password">
                            <label for="icon_password">Password</label>
                            <a href="/webpages/change_pass.php" class="right">Forgot Password?</a>
                        </div>
                        


                        <button class="waves-effect waves-light light-green darken-2 btn-large" type="submit" name="submit"><i class="material-icons right">send</i>Submit</button>
                    </form>
                </div>
            </div>
        </div>

        <footer class="grey lighten-3 grey-text">
            <div class="footer-copyright">
                <div class="container">

                    <a class="blue-grey-text" href="#!">© 2015-2016 LeavittInnovations.</a>
                    <a class="right blue-grey-text" href="./tos.html">Terms of Service</a>
                    <a class="right blue-grey-text" href="./privacy.html">Privacy Policy</a>
                    <a class="right blue-grey-text" href="./faq.html">FAQ</a>
                </div>
            </div>
        </footer>
    </body>

</html>