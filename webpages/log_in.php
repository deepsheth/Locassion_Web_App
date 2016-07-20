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

    <body id="registration">
        <header class="primary-green row">

            <h1 class="col s12 m4 l2"><a href="/" class="white-text">Loccasion</a></h1>
            <ul class="col s12 m8 l10">
                <div class="flex-container">
                    <a href="/webpages/reset_pass_email.php" class="btn waves-effect">Reset Password</a>
                    <a href="/webpages/sign_up.php" class="btn waves-effect">Sign Up</a>
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


                            <?php
                            if (isset($_SESSION['userID'])) {
                                echo ("
                                    <h3 class='light-green-text text-darken-2'>Account Created!</h3>
                                    <p class='center'>Last step, please log in.</p>
                                ");
                            }
                            else {
                                echo ("<h3>Please Login</h3>");
                            }
                            
                            if (isset($_GET['error'])) echo ("<p class='red-text center'>Invalid username or password.</p>");
                            else if (isset($_GET['newpass'])) echo ("<strong><p class='green-text center'>Yay, last step! Please login with your new password.</p></strong>");
                            
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
                                    <a href="/webpages/reset_pass_email.php" class="right">Forgot Password?</a>
                                </div>



                                <button class="waves-effect waves-light primary-green btn-large" type="submit" name="submit"><i class="material-icons right">send</i>Submit</button>
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