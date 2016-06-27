<?php

$error = "";

if (isset($_POST['submit'])) {
    if (isset($_GET['userid']) and isset($_GET['token']) and $_POST['password'] == $_POST['password2']){
        $response = file_get_contents("https://meet-up-1097.appspot.com/?command=newPassword&args=".$_GET['userid'].";".$_GET['token'].";".$_POST['password']."&token=none");
    }
    else if ($_POST['password'] != $_POST['password2']){
        $error = "Passwords don't match!";
    }
    
}
else{
    
    if (empty($_GET)) {
        $error = "Please check you email and open the password reset link to continue.";
    }
	else if (isset($_GET['u'])){
		$userid = $_GET['u'];
		if (isset($_GET['t'])){
			$token = $_GET['t'];
		}
		else{
			$error = "Incorrect token!";
		}
	}
	else{
		$error = "Incorrect userid!";
	}
}

?>

    <!DOCTYPE html>
    <html>

    <head>

        <!-- Basic Page Needs
================================================== -->
        <meta charset="utf-8">
        <title>Loccasion | Reset Password</title>
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
    </head>

    <body id="registration">
        <header class="light-green darken-2 white-text row">

            <h1 class="col s12 m4 l2"><a href="/" class="white-text">Loccasion</a></h1>
            <ul class="col s12 m8 l10">
                <div class="flex-container">
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

                    <!-- col s12 m6 offset-m2 l5 offset-l2 white z-depth-1 hoverable-->
                    <div class="col s12 m6 offset-m2 l5 offset-l2 white z-depth-1 hoverable">


                        <?php 

                    if ($error == "" and !isset($_POST['submit'])){
                        echo('
                        <form action="" method="post">
                        <h3 class="blue-grey-text text-darken-2">Reset Password</h3>

                        <!-- fake fields bypass browser autocomplete -->
                        <input style="visibility:hidden; height: 0px" type="password" />


                        <div class="input-field">
                            <i class="material-icons prefix blue-grey-text">fiber_new</i>
                            <input id="icon_password" name="password" type="password" required>
                            <label for="icon_password">New Password</label>
                        </div>

                        <div class="input-field">
                            <i class="material-icons prefix blue-grey-text">fiber_new</i>
                            <input id="icon_passwordnew2" name="password2" type="password" required>
                            <label for="icon_passwordnew2">Re-type New Password</label>
                        </div>

                        <!-- fake fields bypass browser autocomplete -->
                        <input style="visibility:hidden; height: 0px" type="password" />

                        <button class="waves-effect waves-light light-green darken-2 btn-large" type="submit" name="submit"><i class="material-icons right">send</i>Submit</button>
                        </form>
                        
                        ');

                    }
                    else{
                        if (isset($_POST['submit'])){
                            header('Location: ' . './log_in.php?newpass');
                            exit();
                        }
                        else  if (empty($_GET)) { 
                            echo('<strong><p class="center blue-grey-text">' .$error . '</p></strong>');
                        }
                        else{
                            echo("<h5 class='center red-text'>ERROR: ".$error) ."</h5>";
                        }
                    }
                    ?>

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