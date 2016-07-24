<?php
session_start(); // Starting Session
$error=' '; // Variable To Store Error Message
if (isset($_POST['submit'])) {
    if (empty($_POST['email'])) {
        $error = "please enter the friend's email";
    }
    else
    {
        $url = 'https://meet-up-1097.appspot.com/?command=getID&args='.$_POST['email'].'&token='.$_SESSION['token'];
        if (strpos(get_headers($url)[0],'200') != false){
            $jsonResponse = json_decode(file_get_contents($url),true);
        }
        else{
            print_r(get_headers($url));
        }
        $friendID = $jsonResponse['userid'];
        $url = 'https://meet-up-1097.appspot.com/?command=addFriend&args='.$friendID.'&token='.$_SESSION['token'];
        if (strpos(get_headers($url)[0],'200') != false){
            $jsonResponse = json_decode(file_get_contents($url),true);
            $error = "friend added!";
        }
        else{
            print_r(get_headers($url));
        }
    }
}

?>

<!DOCTYPE html>
<html>

<head>

    <!-- Basic Page Needs
	================================================== -->
    <meta charset="utf-8">
    <title>Loccasion | Friends Dashboard</title>
    <meta name="description" content="Loccasion: Web App">
    <meta name="author" content="Deep Sheth">

    <!-- CSS
	================================================== -->
    <link href='https://fonts.googleapis.com/css?family=Dosis:700' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.5/css/materialize.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="/style.css">

    <!-- Favicons
	================================================== -->
    <link rel="icon" href="" />

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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.5/js/materialize.min.js"></script>
    <script src="/js/script.js"></script>

</head>

<body id="friend-dashboard">
    <header class="light-green darken-2 row">

        <h1 class="col s12 m4 l2"><a href="/" class="white-text">Loccasion</a></h1>
        <ul class="col s12 m8 l10">
            <div class="flex-container">

            <button data-target="modal-small" class="btn modal-trigger">Add Friend</button>

            <?php
            define('__ROOT__', dirname(dirname(__FILE__)));
            include_once(__ROOT__.'/templates/header-menu.php'); 
            ?>
            
            </div>
        </ul>
        <form action="" method="post">
            <div id="modal-small" class="modal blue-grey-text text-darken-2">
                <div class="modal-padding">
                    <form>
                        <div class="row">
                            <h3>Add Friend</h3>
                            <br>
                            <div class="input-field">
                                <i class="material-icons prefix ">account_circle</i>
                                <input id="icon_username" name="email" type="text">
                                <label for="icon_username">Email</label>
                            </div>

                            <?php 
                        echo('<p class="red-text">');
                        echo($error);
                        echo ('</p>');
                        ?>
                        </div>
                    </form>
                </div>
                <div class="modal-footer blue-grey lighten-5">
                    <strong><input name="submit" type="submit" value="add" class="modal-action modal-close waves-effect waves-blue light-blue-text text-darken-3 btn-flat"></strong>
                </div>
            </div>
        </form>
    </header>
    <div class="container">



        <div class="row">
            <div class="col s8 friend-list-cards">
                <div class="row">
                    <h3 class="grey-text text-darken-2"><span class="title blue-text">12</span> Friends</h3>
                </div>

                <div class="row">
                    <a data-target="list_modal" class="waves-effect waves-light blue btn modal-trigger tooltipped" data-position="bottom" data-delay="0" data-tooltip="Group friends into a  List"><i class="material-icons left">playlist_add</i>Add to List</a>
                    <a data-target="delete_modal" class="waves-effect waves-light blue btn modal-trigger" data-position="bottom" data-delay="0" data-tooltip="Remove friends"><i class="material-icons">delete_sweep</i></a>
                    <a href="/edit_friends.php" class="waves-effect waves-light blue btn tooltipped" data-position="bottom" data-delay="0" data-tooltip="Search friends to add/remove"><i class="material-icons">search</i></a>
                    <p class="chip right title">
                        <span class="num-selected">0</span> Friends Selected
                    </p>
                </div>


                <div id="list_modal" class="modal blue-grey-text text-darken-2">
                    <div class="modal-padding">
                        <form>
                            <div class="row">
                                <h3>Create Friends List</h3>
                                <p class="center"><span class="title num-selected">8</span> friends will be grouped into this list.</p>
                                <div class="container">
                                   <br>
                                    <div class="input-field">
                                        <i class="material-icons prefix ">group</i>
                                        <input id="icon_username" name="email" type="text">
                                        <label for="icon_username">Name this List</label>
                                    </div>
                                </div>
                            </div>
                        </form>


                    </div>
                    <div class="modal-footer blue-grey lighten-5">
                        <a href="/webpages/faq.php#faq_friend_list" class="left modal-action modal-close waves-effect waves-blue btn-flat"><i class="material-icons left">info</i>Help</a>
                         <a href="#" class="right modal-action modal-close waves-effect waves-blue btn-flat"><i class="blue-text material-icons left">add</i><strong class="blue-text">Add</strong></a>
                    </div>
                </div>
                
                <div id="delete_modal" class="modal blue-grey-text text-darken-2">
                    <div class="modal-padding">
                        <form>
                            <div class="row">
                                <h3>Remove <span class="title num-selected">8</span>  Friends?</h3>
                                <p class="center">Are you really sure?</p>
                            </div>
                        </form>


                    </div>
                    <div class="modal-footer blue-grey lighten-5">
                         <a href="#" class="right modal-action modal-close waves-effect waves-blue btn-flat"><strong class="blue-text">Yes</strong></a>
                        <a class="left modal-action modal-close waves-effect waves-blue btn-flat">Cancel</a>
                    </div>
                </div>

                <div class="row">
                    <div class="col s4">
                        <div class="card-panel  z-depth-1">
                            <div class="valign-wrapper">
                                <div class="col s5">
                                    <img src="https://github.com/identicons/john.png" alt="" class="circle responsive-img">
                                    <!-- notice the "circle" class -->
                                </div>
                                <div class="col s7">
                                    <span class="title">Deep Sheth</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col s4">
                        <div class="card-panel  z-depth-1">
                            <div class="valign-wrapper">
                                <div class="col s5">
                                    <img src="https://github.com/identicons/cena.png" alt="" class="user-thumb-med circle responsive-img">
                                    <!-- notice the "circle" class -->
                                </div>
                                <div class="col s7">
                                    <span class="title">Adam Knuckey</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col s4">
                        <div class="card-panel  z-depth-1">
                            <div class="valign-wrapper">
                                <div class="col s5">
                                    <img src="https://github.com/identicons/sam.png" alt="" class="circle responsive-img">
                                    <!-- notice the "circle" class -->
                                </div>
                                <div class="col s7">
                                    <span class="title">Corey Caplan</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col s4">
                        <div class="card-panel  z-depth-1">
                            <div class="valign-wrapper">
                                <div class="col s5">
                                    <img src="https://github.com/identicons/luke.png" alt="" class="circle responsive-img">
                                    <!-- notice the "circle" class -->
                                </div>
                                <div class="col s7">
                                    <span class="title">Luke Dropped</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col s4">
                        <div class="card-panel  z-depth-1">
                            <div class="valign-wrapper">
                                <div class="col s5">
                                    <img src="https://github.com/identicons/leet.png" alt="" class="circle responsive-img">
                                    <!-- notice the "circle" class -->
                                </div>
                                <div class="col s7">
                                    <span class="title">L33T HACKER</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col s4">
                        <div class="card-panel  z-depth-1">
                            <div class="valign-wrapper">
                                <div class="col s5">
                                    <img src="https://github.com/identicons/hack.png" alt="" class="circle responsive-img">
                                    <!-- notice the "circle" class -->
                                </div>
                                <div class="col s7">
                                    <span class="title">First Last</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col s4">
                        <div class="card-panel  z-depth-1">
                            <div class="valign-wrapper">
                                <div class="col s5">
                                    <img src="https://github.com/identicons/deep.png" alt="" class="circle responsive-img">
                                    <!-- notice the "circle" class -->
                                </div>
                                <div class="col s7">
                                    <span class="title">Knuckball</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col s4">
                        <div class="card-panel  z-depth-1">
                            <div class="valign-wrapper">
                                <div class="col s5">
                                    <img src="https://github.com/identicons/will.png" alt="" class="circle responsive-img">
                                    <!-- notice the "circle" class -->
                                </div>
                                <div class="col s7">
                                    <span class="title">Will Smith</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col s4">
                        <div class="card-panel  z-depth-1">
                            <div class="valign-wrapper">
                                <div class="col s5">
                                    <img src="https://github.com/identicons/barak.png" alt="" class="circle responsive-img">
                                    <!-- notice the "circle" class -->
                                </div>
                                <div class="col s7">
                                    <span class="title">Barak Obama</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col s4">
                        <div class="card-panel  z-depth-1">
                            <div class="valign-wrapper">
                                <div class="col s5">
                                    <img src="https://github.com/identicons/first.png" alt="" class="circle responsive-img">
                                    <!-- notice the "circle" class -->
                                </div>
                                <div class="col s7">
                                    <span class="title">First Last</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col s4">
                        <div class="card-panel  z-depth-1">
                            <div class="valign-wrapper">
                                <div class="col s5">
                                    <img src="https://github.com/identicons/lorum.png" alt="" class="circle responsive-img">
                                    <!-- notice the "circle" class -->
                                </div>
                                <div class="col s7">
                                    <span class="title">Lorum Ipsum</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col s4">
                        <div class="card-panel  z-depth-1">
                            <div class="valign-wrapper">
                                <div class="col s5">
                                    <img src="https://github.com/identicons/cena.png" alt="" class="circle responsive-img">
                                    <!-- notice the "circle" class -->
                                </div>
                                <div class="col s7">
                                    <span class="title">John Cena</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <div class="col s3 offset-s1">
                <div class="row">
                    <h3 class="grey-text text-darken-2"><span class="title blue-text">4</span> Subscriptions</h3>
                    <a href="/edit_friends.php" class="waves-effect waves-light blue btn">Edit Subscription List</a>

                </div>
                <div class="row">
                    <ul class="collection">
                        <li class="collection-item avatar">
                            <img src="https://github.com/identicons/hacker.png" alt="" class="circle">
                            <span class="title">LU Clubs</span>
                            <p>5,348 Followers</p>
                            <a href="#!" class="secondary-content"><i class="material-icons red-text text-darken-2">remove_circle</i></a>
                        </li>
                        <li class="collection-item avatar">
                            <img src="https://github.com/identicons/leet.png" alt="" class="circle">
                            <span class="title">Lehigh After Dark</span>
                            <p>3 Followers</p>
                            <a href="#!" class="secondary-content"><i class="material-icons red-text text-darken-2">remove_circle</i></a>
                        </li>
                        <li class="collection-item avatar">
                            <img src="https://github.com/identicons/boss.png" alt="" class="circle">
                            <span class="title">CSE 303 Study Group</span>
                            <p>23 Followers</p>
                            <a href="#!" class="secondary-content"><i class="material-icons red-text text-darken-2">remove_circle</i></a>
                        </li>
                        <li class="collection-item avatar">
                            <img src="https://github.com/identicons/top.png" alt="" class="circle">
                            <span class="title">Steel Stacks</span>
                            <p>23,580 Followers</p>
                            <a href="#!" class="secondary-content"><i class="material-icons red-text text-darken-2">remove_circle</i></a>
                        </li>

                    </ul>
                </div>
            </div>
        </div>



    </div>
    <footer class="grey lighten-3 grey-text">
        <div class="footer-copyright">
            <div class="container">

                <a class="blue-grey-text" href="#!">© 2015-2016 LeavittInnovations.</a>
                <a class="right blue-grey-text" href="./tos.php">Terms of Service</a>
                <a class="right blue-grey-text" href="./privacy.php">Privacy Policy</a>
                <a class="right blue-grey-text" href="./faq.php">FAQ</a>
            </div>
        </div>
    </footer>



</body>

</html>
