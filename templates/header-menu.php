<!-- DOES NOT UPDATE HOMEPAGE -->
<!-- DOES NOT UPDATE HOMEPAGE -->


<?php

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}


    if(isset($_SESSION['token'])){
        echo('
            <a class="dropdown-button btn btn-flat grey-text" href="#" data-activates="acct-settings" data-alignment="right" data-hover="true" data-constrainwidth="false">
            <i class="material-icons">account_circle</i>
            </a>
            <img class="user-thumb circle" src="https://pbs.twimg.com/profile_images/447774892520251392/B_5g0wKw_400x400.png" alt="" class="circle">



            <!-- Dropdown Structure -->
            <ul id="acct-settings" class="dropdown-content">
            <li><a href="/webpages/events_dashboard.php">Event Dashboard</a></li>
            <li><a href="/webpages/friends_dashboard.php">Friends</a></li>
            <li><a href="/webpages/events_hist.php">Event History</a></li>
            <li><a href="#!">Account Settings</a></li>
            <li class="divider"></li>
            <li><a onclick="logOut()">Logout</a></li>
            </ul>

        ');
    }
    else{
        echo('</ul></header><div id="main-container" class="center"> 
            <div class="container section">
                <h3 class="red-text">This feature is only available for logged in users.</h3><h4>Sorry!</h4>
            </div>
            <div class="row center">
                <div class="row">
                    <a href="/webpages/sign_up.php" class="white-text"><button class="waves-effect blue btn btn-large">Sign Up</button></a>
                </div>
                <div class="row">
                    <a href="/webpages/log_in.php" class="white-text"><button class="waves-effect blue btn btn-large">Login</button></a>
                </div>
            </div>
        </div>');
        exit();
    }

if (isset($_POST['logout'])){
    $_SESSION = array();
    session_destroy();
}
?>