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
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.5/css/materialize.min.css">
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
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.5/js/materialize.min.js"></script>
        <script src="../js/jquery.timepicker.min.js"></script>
        <script src="../js/create-event.js"></script>
        <script src='https://www.google.com/recaptcha/api.js'></script>
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCH1nGIwaTrYIGLgKZpv_sQ4aV7xUUygDM&signed_in=true&libraries=places&callback=initMap" async defer></script>


    </head>

    <body id="sign-up">
        <header class="light-green darken-2 white-text row">

            <h1 class="col s12 m4 l2"><a href="/" class="white-text">Loccasion</a></h1>
            <ul class="col s12 m8 l10">
                <div class="flex-container">

                <a class='dropdown-button btn z-depth-0 light-green darken-2' href='#' data-activates='acct-settings'><i class="material-icons">settings</i></a>

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

        <div class="container">
            <div class="row">
                <div class="col hide-on-small-only m4 l5 center">

                    <img src="/img/logo_large_white2.png" alt="">
                </div>
                <div class="col s12 m6 offset-m2 l5 offset-l2 white z-depth-1 hoverable">
                   <form>
                   <h3 class="blue-grey-text text-darken-2">Change Password</h3>
                    <div class="input-field">
                        <i class="material-icons prefix blue-grey-text">email</i>
                        <input id="icon_email" name="email" type="email"  class="validate" required>
                        <label for="icon_email">Email</label>
                    </div>
                    <div class="input-field">
                        <i class="material-icons prefix blue-grey-text">https</i>
                        <input id="icon_password" name="password" type="password" required>
                        <label for="icon_password">Current Password</label>
                    </div>
                    <div class="input-field">
                        <i class="material-icons prefix blue-grey-text">fiber_new</i>
                        <input id="icon_passwordnew" name="password" type="password" required>
                        <label for="icon_passwordnew">New Password</label>
                    </div>
                    <div class="input-field">
                        <i class="material-icons prefix blue-grey-text">fiber_new</i>
                        <input id="icon_passwordnew2" name="password" type="password" required>
                        <label for="icon_passwordnew2">New Password</label>
                    </div>
                    <div class="g-recaptcha" data-sitekey="6LdgoxoTAAAAACxM_ZGsn3e7SJicMsHR5jC4xML5"></div>
                    <button class="waves-effect waves-light light-green darken-2 btn-large" type="submit" name="action"><i class="material-icons right">send</i>Submit</button>
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