
        // Initialize Firebase
        var config = {
            apiKey: "AIzaSyAVEtHLKbq5hTQy4VK2jzk8GXBZRR1b4VM",
            authDomain: "meet-up-8d278.firebaseapp.com",
            databaseURL: "https://meet-up-8d278.firebaseio.com",
            storageBucket: "meet-up-8d278.appspot.com",
        };
        firebase.initializeApp(config);

$(document).ready(function () {

    $('form button').click(function (e) {
        e.preventDefault();
    });

    $('#btn-login').on('click', function() {
        mainLogin(document.getElementById('input_username').value,document.getElementById('input_password').value);
    });

    $('.enterable').keypress(function (e) {
        if (e.which == 13) { //Enter key pressed
            $('.submit').click(); //Trigger search button click event
        }
    });

    $('#btn-create-acct').on('click', function () {
        signUp(document.getElementById('input_username').value, document.getElementById('input_password').value);
    });

    var count1 = 0;
    $('#friend-dashboard .friend-list-cards .card-panel').click(function () {
        count1 = selectCard(this, count1);
    });

    var count2 = 0;
    $('#invite_modal .card-panel').click(function () {
        count2 = selectCard(this, count2);
    });

});

function selectCard(card, numberSelected) {
    $(card).toggleClass('card-selected');

    if ($(card).is('.card-selected')) {
        numberSelected++;
        $('.num-selected').text(numberSelected);
    } else {
        numberSelected--;
        $('.num-selected').text(numberSelected);
    }
    return numberSelected;
}

function requireLogin() {
    firebase.auth().onAuthStateChanged(function(user) {
        if (!user) {
            clearMenu();
            addMenuButton("login");
            addMenuButton("full_login_modal");
            addMenuButton("sign_up");
            $(document).ready(function() {
                clearBelowHeader();
                var content = '<div class="container section center-align grey-text"><h3>Please login.</h3><p>Sorry, this feature requires an account.</p></div>';
                content += '<div class="row center"><div class="row"> <a href="/webpages/sign_up.php?redirect=' + window.location.pathname + '" class="white-text"><button class="waves-effect blue btn btn-large">Sign Up</button></a> <a href="/webpages/log_in.php?redirect=' + window.location.pathname + '" class="white-text"><button class="waves-effect blue btn btn-large">Login</button></a></div></div>';
                $('header').after(content);
            });
            // window.stop();
        }
    });
}

function requireLogout() {

}

function userInfo() {

    var user = firebase.auth().currentUser;
    if (user == null) {
        return null;
    }

    var userInfo = {
        name: user.displayName,
        email: user.email,
        user_id: user.uid,
    }

    return userInfo;
}

function clearMenu() {
    $('.menu-buttons').html("");
}

function clearBelowHeader() {
    $('header ~').html("");
}

function addMenuButton(btn) {

    switch (btn) {
    case "create_event":
        $('.menu-buttons').append('<a href="./webpages/create_event.php" class="waves-effect waves-bblue btn btn-flat">Create Event</a>');
        return;
    case "create_event_disabled":
        $('.menu-buttons').append('<a href="/webpages/sign_up.php" class="waves-effect waves-light btn disabled tooltipped" data-delay="100" data-position="left" data-tooltip="Please log in.">Create Event</a>');
        return;
    case "events_dashboard":
        $('.menu-buttons').append('<a data-target="confirm_prompt" class="waves-effect waves-blue btn btn-flat modal-trigger">Events Dashboard</a>');
        $('.modal-trigger').leanModal();
        return;
    case "login": //login button with trigger
        $('.menu-buttons').append('<a data-target="modal-login" class="waves-effect waves-blue btn btn-flat modal-trigger">Login</a>');
        $('.modal-trigger').leanModal();
        return;
    case "full_login_modal": // full modal contents for signing in
        $('header').before('<form> <div id="modal-login" class="modal modal-small blue-grey-text text-darken-2"> <div class="modal-padding"> <div class="row"><h3>Login</h3></div> <div class="row"> <div class="input-field col s12"> <i class="material-icons prefix ">account_circle</i> <input id="input_username" name="email" type="text" placeholder="" required> <label for="input_username">Email</label> </div> <div class="input-field col s12"> <i class="material-icons prefix">https</i> <input id="input_password" name="password" type="password" placeholder="" class="enterable" required> <label for="input_password">Password</label> <div class="row center"><small><a href="/webpages/reset_pass_email.php" class="blue-grey-text text-darken-4">Forgot Password?</a></small></div> </div> </div> <div class="center-align"> <div class="row"> <a href="/php/facebookLogin.php" class="btn-flat waves-effect blue-text text-darken-1">Login with Facebook</a> </div> <div class="row"> <a href="#" class="btn btn-flat waves-effect deep-orange white-text disabled tooltipped" data-tooltip="Get pumped... this is coming soon!">Login with Google</a> </div> </div> </div> <div class="modal-footer blue-grey-text text-darken-2"> <a href="/webpages/sign_up.php" class="left modal-action modal-close waves-effect waves-blue btn-flat ">Sign Up</a> <button id="btn-login" class="right waves-effect waves-blue btn-flat blue-text submit">Login</button> </div> </div> </form>');
        return;
    case "login":
        $('.menu-buttons').append('<a href="/webpages/login.php"><button class="waves-effect waves-blue btn">Sign Up</button></a>');
        return;
    case "sign_up":
        $('.menu-buttons').append('<a href="/webpages/sign_up.php"><button class="waves-effect waves-blue btn">Sign Up</button></a>');
        return;
    case "forgot_password":
        $('.menu-buttons').append('<a href="/webpages/reset_pass_email.php" class="btn waves-effect  waves-blue btn">Forgot Password</a>');
    case "dropdown":
        firebase.auth().onAuthStateChanged(function(user) {
            if (user) {
                $('.menu-buttons').append('.<a class="dropdown-button btn btn-flat grey-text" href="#" data-activates="acct-settings" data-alignment="right" data-hover="true" data-constrainwidth="false"><i class="material-icons left">account_circle</i>'+user.displayName+'</a>');
                $('.menu-buttons').append('<ul id="acct-settings" class="dropdown-content"><li><a href="/webpages/events_dashboard.php">Event Dashboard</a></li><li><a href="/webpages/friends_dashboard.php">Friends</a></li><li><a href="/webpages/events_hist.php">Event History</a></li><li><a href="#!">Account Settings</a></li><li class="divider"></li><li><a class="grey-text" id="btn-logout">Logout</a></li></ul>');
                $('#btn-logout').on('click', function () {
                    mainLogout()
                });
                $('.dropdown-button').dropdown();
            }
        });
        return;
    }
}

function mainLogin(email, password) {

    firebase.auth().signInWithEmailAndPassword(email, password).then(function () {
        if (window.location.pathname != '/') {
            location.reload();
        }
        $('#modal-login').closeModal();
    }, function (error) {
        switch (error.code) {
        case "auth/user-not-found":
            error.message = "Invalid Username.";
        case "auth/invalid-email":
            document.getElementById("input_username").style.borderBottom = "2px solid #F44336";
            break;
        }
        $('#input_password').after("<p class='red-text center'>" + error.message + "</p>")
        document.getElementById("input_password").style.borderBottom = "2px solid #F44336";
    });
}

function mainLogout() {
    firebase.auth().signOut().then(function () {
        if (window.location.pathname != '/') {
            window.location.href = '/';
        }
        Materialize.toast("Successfully logged out. Please visit us again! :)", 4500);
    }, function (error) {
        alert(error.message);
    });
}

function signUp(email, password) {
    
    firebase.auth().createUserWithEmailAndPassword(email, password).then(function () {
        var user = firebase.auth().currentUser;

        // Saves the user's name
        user.updateProfile({
            displayName: $('#input_name').val()
        }).then(function(){
            // Redirects to the homepage
            window.location.href = '/';
        }, function (error) {
            $('#input_password').after("<p class='red-text'>" + error.message + "</p>");
            console.log(error);    
        });
    }, function (error) {
        $('#input_password').after("<p class='red-text'>" + error.message + "</p>");
        console.log(error);
    });
}

function reauth() {
    var user = firebase.auth().currentUser;
    var credential;

    // Prompt the user to re-provide their sign-in credentials

    user.reauthenticate(credential).then(function () {
        // User re-authenticated.
    }, function (error) {
        // An error happened.
    });
}