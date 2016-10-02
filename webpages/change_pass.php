<!DOCTYPE html>
<html>

<head>

    <!-- Basic Page Needs
	================================================== -->
    <meta charset="utf-8">
    <title>Loccasion | Change Password</title>
    <meta name="description" content="Loccasion: Web App">
    <meta name="author" content="Deep Sheth">

    <!-- CSS
	================================================== -->
    <link href='https://fonts.googleapis.com/css?family=Dosis:700' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.7/css/materialize.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="../css/jquery.timepicker.css">
    <link rel="stylesheet" href="../style.css">

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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.7/js/materialize.min.js"></script>
    <script src="../js/jquery.timepicker.min.js"></script>
    <script src="../js/create-event.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAVEtHLKbq5hTQy4VK2jzk8GXBZRR1b4VM&signed_in=true&libraries=places&callback=initMap" async defer></script>


</head>

<body id="registration">
    <header class="primary-green row">


        <h1 class="col s12 m4 l2"><a href="/" class="white-text">Loccasion</a></h1>
        
    </header>

    <div class="bold-blue bg">
        <div class="container">
            <div class="row">
                <div class="col hide-on-small-only m4 l5 center">

                    <img src="/img/logo_large_white2.png" alt="">
                </div>
                <div class="col s12 m6 offset-m2 l5 offset-l2 white z-depth-1 hoverable">
                    <form>
                        <h3>Change Password</h3>
                        <div class="input-field">
                            <i class="material-icons prefix">email</i>
                            <input id="icon_email" name="email" type="email" class="validate" required>
                            <label for="icon_email">Email</label>
                        </div>
                        <div class="input-field">
                            <i class="material-icons prefix">https</i>
                            <input id="icon_password" name="password" type="password" required>
                            <label for="icon_password">Current Password</label>
                        </div>
                        <div class="input-field">
                            <i class="material-icons prefix">fiber_new</i>
                            <input id="icon_passwordnew" name="password" type="password" required>
                            <label for="icon_passwordnew">New Password</label>
                        </div>
                        <div class="input-field">
                            <i class="material-icons prefix">fiber_new</i>
                            <input id="icon_passwordnew2" name="password" type="password" required>
                            <label for="icon_passwordnew2">New Password</label>
                        </div>
                        <div class="g-recaptcha" data-sitekey="6LdgoxoTAAAAACxM_ZGsn3e7SJicMsHR5jC4xML5"></div>
                        <button class="waves-effect waves-light primary-green btn-large" type="submit" name="action"><i class="material-icons right">send</i>Submit</button>
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