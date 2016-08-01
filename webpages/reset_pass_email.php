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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.5/js/materialize.min.js"></script>


</head>

<body id="registration">
    <header class="light-green darken-2 white-text row">

        <h1 class="col s12 m4 l2"><a href="/" class="white-text">Loccasion</a></h1>
        <ul class="col s12 m8 l10">
            <div class="flex-container">

                <a href="/webpages/log_in.php" class="btn waves-effect">Login</a>

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
                    <form action="./reset_pass.php" method="post">
                        <h3 class="">Reset Password</h3>
                        <p class="center">What's the email you registered with?</p>
                        <div class="input-field">
                            <i class="material-icons prefix">fiber_new</i>
                            <input id="email" name="email" type="text" required>
                            <label for="email">Email</label>
                        </div>

                        <button class="waves-effect waves-light primary-green btn btn-large" type="submit" name="signup"><i class="material-icons right">send</i>Submit</button>
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