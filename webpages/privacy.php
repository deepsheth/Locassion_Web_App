<!DOCTYPE html>
<html>

<head>

    <!-- Basic Page Needs
	================================================== -->
    <meta charset="utf-8">
    <title>Locassion</title>
    <meta name="description" content="Locassion: Web App">
    <meta name="author" content="Deep Sheth">

    <!-- CSS
	================================================== -->
    <link href='https://fonts.googleapis.com/css?family=Dosis:700' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.7/css/materialize.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
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
    <script>
        $(document).ready(function() {
            $('.modal-trigger').leanModal();
            console.log("???");
        });
    </script>

</head>

<body id="privacy">
    <header class="grey lighten-4 grey-text">

        <h1><a href="/" class="grey-text">Locassion</a></h1>
        <ul >
            <i class="material-icons col s2 grey-text large-icon">lock</i>
        </ul>

    </header>

    <div class="container">
        <div class="row blue-text text-darken-2">
            <h2 class="center-align"> Privacy Policy</h2>
        </div>

        <p class="grey-text">
            Last updated: 11/13/2015
        </p>
        <p class="reading">

            While using Locassion, we may ask you to provide us with certain personally identifiable information that can be used to contact or identify you. Personally identifiable information may include, but is not limited to your name ("Personal Information"). This document informs you of our policies regarding the collection, use and disclosure of Personal Information we receive from users. By using this application, you agree to the collection and use of information in accordance with this policy. If you choose to create an account with the Service, you may provide us information about yourself, such as your name, e-mail address, profile image, and other identifiable information. Not all of this information is required to register for an account, and only the information you submit will be utilized by the Service. This information is only collected to ensure a personalized experience and accessible community for each user. User accounts also require a unique username and password to be stored alongside this information. Account termination or select deletion of personal information is not currently available, and the applicable data will remain with the Service until further notice. All user account information is stored in a secure database and is not accessed by any third parties. Other users will be able to view public profile information that you enable. You may choose to utilize the Service by logging into a Google Account in place of a creating new user account. In this case, we do not store your account information. Your information may be, however, accessed for display purposes within the Service only. In this case, you inherently allow Google access to the information you provide. Some information may be collected automatically, without a prompt or explicit request, namely with regards to your location. If you enable location services on your device, the third party system Google Maps will acquire and utilize your longitude and latitude via geolocation data from your mobile device. We will only access this information for use within the Service; this includes but may not be limited to creating events, finding events in your area, and providing directions. Your location will be accessed for immediate use; locations will only be stored in our servers when they are used as waypoints for events. Once in our system, this information will not be accessed by any third parties, except for those you allow to view the event.

        </p>

        <p class="center-align blue-text text-darken-2 pad-up">Have a question regarding our Privacy Policy? Please contact the team at <b>Locassion@lehigh.edu</b></p>
    </div>

   
    <?php include_once(dirname(dirname(__FILE__)) . '/templates/simple-footer.php'); ?>
    
</body>

</html>