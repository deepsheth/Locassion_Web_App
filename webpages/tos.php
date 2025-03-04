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

<body id="tos">
    <header class="grey lighten-4 grey-text">

        <div class="container">
           
            <h1><a href="/" class="grey-text">Locassion</a></h1>
            <ul class="right">
                <i class="material-icons col s2 grey-text large-icon">gavel</i>
            </ul>
        </div>

    </header>

    <div class="container">
        <div class="row blue-text text-darken-2">
            <h2 class="center-align">Terms of Service</h2>
        </div>

        <p class="grey-text">
            Last updated: 11/13/2015
        </p>
        <p class="reading">

            Please read these Terms of Service (“Terms”, “Terms of Service”) carefully before using Locassion (the “Service”) operated by Leavitt Innovations (“us”, “we”, or “our”). Any instance of “you” or “your” refers to the user currently reading these terms. If you are using the Service on behalf of an organization or entity (“Organization”), then you are agreeing to these Terms on behalf of that Organization and you represent and warrant that you have the authority to bind the Organization to these Terms. In that case, “you” and “your” refers to you and that Organization. Your access to and use of the Service is conditioned on your acceptance of and compliance with these Terms. These Terms apply to all visitors, users, and others who access or use the Service. By accessing or using the Service you agree to be bound by these Terms. If you disagree with any part of the terms then you may not access the Service. We may terminate or suspend access to our Service immediately, without prior notice or liability, for any reason whatsoever, including without limitation if you breach the Terms. All provisions of the Terms which by their nature should survive termination shall survive termination, including, without limitation, ownership provisions, warranty disclaimers, indemnity, and limitations of liability. These Terms shall be governed and construed in accordance with the laws of the United States, without regard to its conflict of law provisions. Our failure to enforce any right or provision of these Terms will not be considered a waiver of those rights. If any provision of these Terms is held to be invalid or unenforceable by a court, the remaining provisions of these Terms will remain in effect. These Terms constitute the entire agreement between us regarding our Service, and supersede and replace any prior agreements we might have between us regarding the Service. We reserve the right, at our sole discretion, to modify or replace these Terms at any time. If a revision is material we will attempt to provide notice prior to any new terms taking effect within reasonable promptness. What constitutes a material change will be determined at our sole discretion. This application, including its content and logos, is property of the developers and protected under copyright laws (excluding any open-source images utilized in the user interface). Reverse engineering or tampering of this software is strictly prohibited. If you choose to abuse the application’s intended purpose (the System), your access to certain features or your entire user account may be disabled indefinitely. By Leavitt Innovations moderator discretion evaluated on a case-by-case basis, system abuses include but are not limited to overloading or frivolous submissions (spamming), explicit association with illegal activity, fraudulent identity, and automated account activity (botting). Any user-uploaded profile picture is publicly visible, and we do not condone the use of images that are restricted to you by copyright. In accordance, we are not responsible for any copyright infringements resulting from user input. Because you are using this Service at your own risk, we are not responsible for any user-generated content that you may find offensive. You must be at least 13 years of age to use the Service.
        </p>

        <p class="center-align blue-text text-darken-2 pad-up">Have a question regarding our Terms of Service? Please contact the team at <b>Locassion@lehigh.edu</b>
        </p>


    </div>

    <?php include_once(dirname(dirname(__FILE__)) . '/templates/simple-footer.php'); ?>

</body>

</html>