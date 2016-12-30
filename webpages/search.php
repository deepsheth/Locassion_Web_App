<!DOCTYPE html>
<html>

<head>

    <!-- Basic Page Needs
	================================================== -->
    <meta charset="utf-8">
    <title>Locassion | Search</title>
    <meta name="description" content="Locassion: Web App">
    <meta name="author" content="Deep Sheth">

    <!-- CSS
	================================================== -->
    <link href='https://fonts.googleapis.com/css?family=Dosis:700' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.7/css/materialize.min.css">
    <link href='https://fonts.googleapis.com/css?family=Raleway:400,600,700|Rubik:400|Material+Icons' rel='stylesheet' type='text/css'>
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

<body id="search">
    <header class="primary-green row">

        <h1 class="col s12 m4 l2"><a href="/" class="white-text">Locassion</a></h1>

        <ul class="col s12 m8 l10">
            <div class="flex-container menu-buttons">
                <script>
                    addMenuButton("dropdown");

                    $(document).ready(function () {
                        getSearchQuery();
                    });
                </script>
            </div>
        </ul>
    </header>
    <div class="container">

        <div class="row">
            <div class="section">
                <h3>Search by:</h3>
            </div>

            <div class="row">
                <div class="col s12 m6 offset-m3">
                    <ul class="tabs tabs-fixed-width">
                        <li class="tab col s4"><a class="blue-text" href="#t_username">Username</a></li>
                        <li class="tab col s4"><a class="blue-text" href="#t_tag">Tag</a></li>
                        <li class="tab col s4 "><a class="blue-text" href="#t_event">Event</a></li>
                    </ul>
                </div>
            </div>
            <div id="t_username" class="col s12">
                <div class="row section">
                    <div class="col s12 m6 offset-m3">
                        <div class="row">
                            <i class="col s2 material-icons medium left">account_circle</i>
                            <div class="input-field col s8">
                                <input id="f_username" type="text">
                                <label for="f_username">Search accounts + organizations</label>
                            </div>
                            <div class="col s1">
                                <a href="#search-result" class="btn-search"><i class="material-icons">search</i></a>
                            </div>
                        </div>


                        <div class="section">
                            <p><i class="material-icons left">star</i><span class="title">Featured</span></p>
                            <p><a href=""><span class="chip chip-margin-right"><img src="https://avatars3.githubusercontent.com/u/8071305?v=3&s=460" alt="Contact Person">LU ISA</span></a><a href=""><span class="chip chip-margin-right"><img src="https://avatars3.githubusercontent.com/u/8071305?v=3&s=460" alt="Contact Person">LU CSBA</span></a><a href=""><span class="chip chip-margin-right"><img src="https://avatars3.githubusercontent.com/u/8071305?v=3&s=460" alt="Contact Person">LU UP!</span></a></p>
                        </div>

                    </div>
                </div>
            </div>
            <div id="t_tag" class="col s12">
                <div class="row section">
                    <div class="col s12 m6 offset-m3">
                        <div class="row">
                            <i class="col s2 material-icons medium left">local_offer</i>
                            <div class="input-field col s8">
                                <input id="f_tag" type="text">
                                <label for="f_tag">Search event tags</label>
                            </div>
                            <div class="col s1">
                                <a href="#search-result" class="btn-search"><i class="material-icons">search</i></a>
                            </div>
                        </div>
                        <div class="section">
                            <p><i class="material-icons left">trending_up</i><span class="title">Trending</span></p>
                            <p><a href=""><span class="chip chip-margin-right">#LU ISA</span></a><a href=""><span class="chip chip-margin-right">#LU CSBA</span></a><a href=""><span class="chip chip-margin-right">#LU UP!</span></a><a href=""><span class="chip chip-margin-right">#LU CSBA</span></a><a href=""><span class="chip chip-margin-right">#LeLaf</span></a></p>
                        </div>
                    </div>
                </div>
            </div>
            <div id="t_event" class="col s12">
                <div class="row section">
                    <div class="col s12 m6 offset-m3">
                        <div class="row">
                            <i class="col s2 material-icons medium left">event_note</i>
                            <div class="input-field col s8">
                                <input id="f_event" type="text">
                                <label for="f_event">Search event details</label>
                            </div>
                            <div class="col s1">
                                <a href="#search-result" class="btn-search"><i class="material-icons">search</i></a>
                            </div>
                        </div>
                        <div class="section">
                            <p><i class="material-icons left">favorite</i><span class="title">Popular</span></p>
                            <p><a href=""><span class="chip chip-margin-right">LU ISA</span></a><a href=""><span class="chip chip-margin-right">LU CSBA</span></a><a href=""><span class="chip chip-margin-right">LU UP!</span></a><a href=""><span class="chip chip-margin-right">LU CSBA</span></a><a href=""><span class="chip chip-margin-right">LeLaf</span></a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div id="search-result" class="section">
                <h3>Search Results</h3>
                <div class="row">
                    <div class="col s12 m6 offset-m3">
                        <div class="card dyn">
                            <div class="img-wrapper"><img class="responsive-img" src="http://www.skiheavenly.com/~/media/heavenly/images/732x260%20header%20images/events-heavenly-header.ashx" alt=""></div>
                            <div class="card-content">
                                <div class="row no-mar">
                                    <div class="col s3">
                                        <div class="row no-mar">
                                            <div class="col s12 center-align mini-cal" title="Sat, Dec 24, 2016 9:56 AM">
                                                <div class="day">Sat</div>
                                                <div class="day-num">24</div>
                                                <div class="month">Dec</div>
                                                <div class="context">6 days ago</div>
                                            </div>
                                            <div class="col s12">
                                                <div class="dyn_avatar" title="Host"><i class="material-icons tiny-icon circle tiny white icon green-text" title="Public Event">public</i></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col m9 l8 offset-l1 side-info">
                                        <div class="card-title"><a href="/webpages/event_details.php?eventid=-KZjP6C7sPmMA9CnEwQW">nulla cupidatat deserunt esse nulla</a></div>
                                        <div class="icon-hoverable add-cursor"><i title="Location" class="material-icons icons-inline left">place</i>457 Driggs Avenue, Fowlerville, Marshall Islands, 4427</div>
                                        <div class="small-details">Aliquip reprehenderit dolor cupidatat enim amet est pariatur nostrud aute cupidatat.</div>
                                        <div class="icon-hoverable"><i title="Time" class="material-icons icons-inline left">access_time</i>9:56 AM</div>
                                    </div>
                                </div>
                                <div class="row no-mar">
                                    <div class="span-padded center"><span data-target="dyn_modal" onclick="shareLink('-KZjP6C7sPmMA9CnEwQW')" class="add-cursor"><i class="material-icons">link</i></span><span>8 Friends — 0 Total Going</span></div>
                                    <div class="row row-tight">
                                        <p class="col s12">Id ullamco proident adipisicing esse eiusmod amet veniam.</p>
                                    </div>
                                    <div class="divider"></div>
                                    <div class="flex-container tags"><a href="#" class="chip">#ipsum</a><a href="#" class="chip">#proident</a><a href="#" class="chip">#ullamco</a><a href="#" class="chip">#cupidatat</a></div>
                                    <div class="divider"></div>
                                    <div class="section">
                                        <div class="col s12 center"><a href="#" class="btn-go waves-effect waves-light disabled dirty">Passed</a></div>
                                    </div>
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