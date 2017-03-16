<!DOCTYPE html>
<html>

<head>

    <!-- Basic Page Needs
================================================== -->
    <meta charset="utf-8">
    <title>Locassion | Reset Password</title>
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
</head>

<body id="registration">
    <header class="primary-green row">

        <div class="logo-container col s12 m3 l4">
            <a href="/" class="white-text hide-on-med-only">
                <div class="logo-img"></div>
            </a>
            <h1><a href="/" class="white-text">Locassion</a></h1>
        </div>

    </header>

    <div class="bold-blue bg">
        <div class="container">
            <div class="row">

                <div class="col hide-on-small-only m4 l5 center">
                    <img src="/img/logo_large_white2.png" alt="">
                </div>

                <!-- col s12 m6 offset-m2 l5 offset-l2 white z-depth-1 hoverable-->
                <div class="col s12 m6 offset-m2 l5 offset-l2 white z-depth-1 hoverable">
                    <form action="" method="post">
                        <h3>Reset Password</h3>
                        <!-- fake fields bypass browser autocomplete -->
                        <input style="visibility:hidden; height: 0px" type="password" />
                        <div class="input-field col s12">
                            <i class="material-icons prefix">fiber_new</i>
                            <input id="icon_password" name="password" type="password" required>
                            <label for="icon_password">New Password</label>
                        </div>
                        <div class="input-field col s12">
                            <i class="material-icons prefix">fiber_new</i>
                            <input id="icon_passwordnew2" name="password2" type="password" required>
                            <label for="icon_passwordnew2">Re-type New Password</label>
                        </div>
                        <!-- fake fields bypass browser autocomplete -->
                        <input style="visibility:hidden; height: 0px" type="password" />
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