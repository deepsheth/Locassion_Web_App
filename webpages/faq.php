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

<body id="faq">
    <header class="grey lighten-4 grey-text">

        <h1><a href="/" class="grey-text">Locassion</a></h1>
        <ul >
            <i class="material-icons col s2 grey-text large-icon">help</i>
        </ul>

    </header>

    
    <div class="container">
        <div class="row blue-text text-darken-2">
            <h2 class="center-align"> Frequently Asked Questions</h2>
        </div>


        <ul class="collapsible" data-collapsible="expandable">
            <li>
                <div class="collapsible-header">Why the name Locassion?
                </div>
                <div class="collapsible-body">
                    <p> Locassion helps you manage locations - for your occasions! With this app, you can set up events at any waypoint, by simply dropping a pin on the map or entering an address. When you create an account, you’ll be able to add friends and share events with whomever you select. You can give information about each event for anyone invited to view. Once you select a location, your friends can RSVP and obtain directions. You can even let your friends add more guests to the event! Events can be private or public; see below to learn more about these, and the types of events you might create.
                    </p>
                </div>
            </li>
            <li>
                <div class="collapsible-header">What is Locassion? </div>
                <div class="collapsible-body">
                    <p>Private events are the typical event created by a user. These events can only be viewed by the friends you invite. The possibilities for this type of event are endless! Class field trips, study sessions, business meetings, a date at a restaurant, or a bangin’ party - the list goes on! Going out with some friends and want to meet back at the car? Simply set up a location in the parking lot! You even have a saved history of events, which can come in handy. Want to park at the same meter as before? Put the meter price in the event description and save it for future events!
                    </p>
                </div>
            </li>
            <li>
                <div class="collapsible-header">What is a private event?</div>
                <div class="collapsible-body">
                    <p>Private events are the typical event created by a user. These events can only be viewed by the friends you invite. The possibilities for this type of event are endless! Class field trips, study sessions, business meetings, a date at a restaurant, or a bangin’ party - the list goes on! Going out with some friends and want to meet back at the car? Simply set up a location in the parking lot! You even have a saved history of events, which can come in handy. Want to park at the same meter as before? Put the meter price in the event description and save it for future events!
                    </p>
                </div>
            </li>

            <li>
                <div class="collapsible-header">What is a public event?</div>
                <div class="collapsible-body">
                    <p>
                        Public events can be viewed on the map by anyone. They are mainly intended for organizations. To become an official organization, you must register and pay a small fee for each event created, which increases based on the population density around your organization’s event location. Users can subscribe to organizations (for free!) to be notified when a new event has been created. Fantastic for college campus activities, charity events, festivals, and much more!

                    </p>
                </div>
            </li>

            <li>
                <div class="collapsible-header">What are subevents?</div>
                <div class="collapsible-body">
                    <p>
                        Subevents can occur in both private and public events. They are events contained within an overarching main event. These are great for multilevel scheduling, especially for day trips. Perhaps you are going to an amusement park with some friends, and you are driving. You might want set the main event at your house where everyone will meet for the carpool. You could create additional subevents for your planned destinations and attractions during the day, especially useful if your group would like to split up and reconvene. You might setup subevents for a particular ride, the food court at lunch, or the car in the parking lot when you are ready to leave. This feature can really help organize your day, without the hassle of creating entirely new events for every time you want to meet up.

                    </p>
                </div>
            </li>

            <li>
                <div class="collapsible-header">What are tags? </div>
                <div class="collapsible-body">
                    <p>
                        Tags allow you to filter through events. Use tags like #food, #entertainment, or #business to help your attendees organize their schedules.

                    </p>
                </div>
            </li>

            <li>
                <div class="collapsible-header">How was the map feature developed? </div>
                <div class="collapsible-body">
                    <p>
                        The map is an expansion of Google’s “Google Maps”, a well-known and dependable web mapping service.

                    </p>
                </div>
            </li>

            <li>
                <div class="collapsible-header">Why are events not appearing on my map? </div>
                <div class="collapsible-body">
                    <p>
                        Make sure you have location services enabled on your device. Check your internet connection if the problem persists.

                    </p>
                </div>
            </li>

            <li>
                <div class="collapsible-header">What data do you collect from me? </div>
                <div class="collapsible-body">
                    <p>
                        Besides the information you provide upon setting up an account, we will only use your location data. All data is stored securely in our database (using Google servers). See the Privacy Policy for more details.

                    </p>
                </div>
            </li>

            <li>
                <div class="collapsible-header">My account got banned, why?</div>
                <div class="collapsible-body">
                    <p>
                        In the case of a banned account, you were most likely found by an administrator to be botting or spamming, two actions that game the system and create an undesirable experience for our other users. Please refer to the Terms of Service for more details. If you feel you have been unjustly banned, send a support ticket to the team at Locassion@lehigh.edu

                    </p>
                </div>
            </li>

            <li>
                <div class="collapsible-header">Why can’t I see pins updating when I zoom out on the map?</div>
                <div class="collapsible-body">
                    <p>
                        Try changing the radius filter in your settings. The map will only display pins in this radius, even if you expand the map view to a larger area or other location.

                    </p>
                </div>
            </li>
            <li>
                <div class="collapsible-header" id="faq_friend_list">What are Friend Lists?</div>
                <div class="collapsible-body">
                    <p>
                        Creating a Friend List makes sharing events easier with all of the different groups of friends you have. For example, try creating a Friends List for your sorority/fraternity brothers and another list for your close friends back home to help distinguish friends when sharing events.
                    </p>
                </div>
            </li>
            <li>
                <div class="collapsible-body">
                    <p>
                        Try changing the radius filter in your settings. The map will only display pins in this radius, even if you expand the map view to a larger area or other location.

                    </p>
                </div>
            </li>

            <li>
                <div class="collapsible-header">Why are all of my events not appearing on my events list?</div>
                <div class="collapsible-body">
                    <p>
                        If you aren’t seeing enough events, filter to a larger time frame. If your events list is too cluttered, try lowering the time frame.

                    </p>
                </div>
            </li>

            <li>
                <div class="collapsible-header">Who created Locassion?</div>
                <div class="collapsible-body">
                    <p>
                        This app was created by Leavitt Innovations, 4 students in Lehigh University’s class of 2018 - Corey Caplan, Lucas Dittman, Adam Knuckey, and Deep Sheth. We will continue to develop this project and expand it to the constantly growing needs of today’s user base!

                    </p>
                </div>
            </li>
        </ul>

        <p class="center-align blue-text text-darken-2 pad-up">Have a question or encounter a bug? Please contact the team at <b>Locassion@lehigh.edu</b></p>

    </div>

   
    
    <?php include_once(dirname(dirname(__FILE__)) . '/templates/simple-footer.php'); ?>
    
</body>

</html>