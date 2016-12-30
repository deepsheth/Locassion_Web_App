<!DOCTYPE html>
<html>

<head>

    <!-- Basic Page Needs
	================================================== -->
    <meta charset="utf-8">
    <title>Locassion | Friends Dashboard</title>
    <meta name="description" content="Locassion: Web App">
    <meta name="author" content="Deep Sheth">

      <!-- CSS
================================================== -->
    <link href='https://fonts.googleapis.com/css?family=Dosis:700' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.7/css/materialize.min.css">
    <link href='https://fonts.googleapis.com/css?family=Raleway:400,600,700|Rubik:400|Material+Icons' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="/css/jquery.timepicker.css">
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
    <script src="https://www.gstatic.com/firebasejs/3.2.0/firebase.js"></script>
    <script src="https://www.gstatic.com/firebasejs/3.1.0/firebase-app.js"></script>
    <script src="https://www.gstatic.com/firebasejs/3.1.0/firebase-auth.js"></script>
    <script src="https://www.gstatic.com/firebasejs/3.1.0/firebase-database.js"></script>
    <script src="https://www.gstatic.com/firebasejs/3.1.0/firebase-storage.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.7/js/materialize.min.js"></script>
    <script src="/js/script.js"></script>

</head>

<body id="friend-dashboard">
    <header class="primary-green row">

        <h1 class="col s12 m4 l2"><a href="/" class="white-text">Locassion</a></h1>

        <ul class="col s12 m8 l10">
            <div class="flex-container menu-buttons">

                <script>
                    addMenuButton("events_dashboard");
                    addMenuButton("dropdown");
                    requireLogin();
                </script>
            </div>
        </ul>
    </header>


    <div class="container">
        <div class="row">
            <div class="col l3 m6 s12">
                <div class="row">
                    <h3 class="grey-text text-darken-2"><span class="title blue-text">4</span> Groups</h3>
                </div>
                <div class="row center">
                    <button class="waves-effect waves-light btn-flat btn center" onClick="displayGroupEdit()"><i class="material-icons left">mode_edit</i>Edit List</button>
                </div>
                <div class="row">
                    <ul class="collection">
                        <li class="collection-item avatar">
                            <i class="material-icons red-text sm-circle add-cursor icon-hidden">remove_circle</i>
                            <img src="https://github.com/identicons/hacker.png" alt="" class="circle">
                            <a href="#"><span class="title">LU Clubs</span></a>
                            <p class="grey-text text-darken-1">5,348 Followers</p>
                        </li>
                        <li class="collection-item avatar">
                            <i class="material-icons red-text sm-circle add-cursor icon-hidden">remove_circle</i>
                            <img src="https://github.com/identicons/leet.png" alt="" class="circle">
                            <a href="#"><span class="title">Lehigh After Dark</span></a>
                            <p class="grey-text text-darken-1">3 Followers</p>
                        </li>
                        <li class="collection-item avatar">
                            <i class="material-icons red-text sm-circle add-cursor icon-hidden">remove_circle</i>
                            <img src="https://github.com/identicons/boss.png" alt="" class="circle">
                            <a href=""><span class="title">CSE 303 Study Group</span></a>
                            <p class="grey-text text-darken-1">23 Followers</p>
                        </li>
                        <li class="collection-item avatar">
                            <i class="material-icons red-text sm-circle add-cursor icon-hidden">remove_circle</i>
                            <img src="https://github.com/identicons/top.png" alt="" class="circle">
                            <a href=""><span class="title">Steel Stacks</span></a>
                            <p class="grey-text text-darken-1">23,580 Followers</p>
                        </li>

                    </ul>
                </div>
            </div>
            <div class="col l8 m6 s12 offset-l1 friend-list-cards">
                <div class="row">
                    <h3 class="grey-text text-darken-2"><span class="title blue-text">12</span> Friends</h3>
                </div>

                
                <div class="row btn-toolbar">
                    <div class="col s12">
                    <a data-target="create_group_modal" class="btn-group waves-effect waves-light blue btn modal-trigger tooltipped disabled" data-position="bottom" data-delay="0" data-tooltip="Group friends into a  List"><i class="material-icons left">playlist_add</i>Group</a>
                    <a data-target="delete_modal" class="btn-delete waves-effect waves-light btn btn-flat modal-trigger tooltipped" data-position="bottom" data-delay="0" data-tooltip="Remove friends"><i class="material-icons">delete_sweep</i></a>
                    <a href="/webpages/search.php" class="waves-effect waves-light btn btn-flat tooltipped" data-position="bottom" data-delay="0" data-tooltip="Search friends to add/remove"><i class="material-icons">search</i></a>
                    <p class="chip right title">
                        <span class="num-selected">0</span> Friends Selected
                    </p>
                    </div>
                </div>

                <p class='helper'>Select friends to batch edit them.</p>

                <div id="create_group_modal" class="modal blue-grey-text text-darken-2">
                    <div class="modal-padding">
                        <form>
                            <div class="row section">
                                <div class="container">
                                <h3>Group Friends</h3>
                                <div class="row">
                                    <p class="center"><span class="title num-selected">8</span> friends will be added to this group.</br><small><span class="dyn_selected grey-text"></span></small></p>
                                </div>
                                <div class="section">
                                    <div class="row">
                                        
                                        <div class="col s12 m8 offset-m2">
                                                <div class="input-field col s12">
                                                <i class="material-icons prefix ">group</i>
                                                <input id="input_username" name="email" type="text" placeholder="" required>
                                                <label for="input_username">New Group Name</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col s8 offset-s2">
                                        <p class="center"><strong>Or add your friends to existing group</strong></p>
                                        <div class="flex-container">
                                            <div class="dyn_avatar add-cursor" title=""></div>
                                            <div class="dyn_avatar add-cursor" title=""></div>
                                            <div class="dyn_avatar add-cursor" title=""></div>
                                        </div>
                                    </div>
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
                            <div class="container">
                                <h3>Remove <span class="title num-selected red-text">8</span>  Friends?</h3>
                                <p><span class="dyn_selected"></span></p>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer orange lighten-4">
                        <a class="right modal-action modal-close waves-effect red-blue btn-flat red-text">Yes, remove friends.</a>
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
        </div>
    </div>
    
    <?php
        include_once(dirname(dirname(__FILE__)).'/templates/simple-footer.php'); 
    ?>
</body>

</html>
