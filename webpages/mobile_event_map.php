<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xmlns:fb="http://ogp.me/ns/fb#">

    <head>

        <!-- Basic Page Needs
================================================== -->
        <meta charset="utf-8">
        <title>locassion</title>
        <meta name="description" content="locassion: Web App">
        <meta name="author" content="Deep Sheth">

        <!-- CSS
================================================== -->
        <!--       Todo: combine Dosis and all fonts into one link (for all webpages!!!) -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.7/css/materialize.min.css">
        <link href='https://fonts.googleapis.com/css?family=Dosis:700|Raleway:400,600,700|Rubik:400|Material+Icons' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="/style.css">

        <!-- Favicons
================================================== -->
        <link rel="icon" type="image/png" href="/favicon.png" />

        <!-- Mobile Specific Metas
================================================== -->
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

        <!-- MSC
================================================== -->
        <meta property="og:image" content="http://adamknuckey.com/img/website_preview.jpg" />


        <!-- Analytics
================================================== -->


        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.7/js/materialize.min.js"></script>
        <script src="/js/markerclusterer.js"></script>
        <script src="/js/script.js"></script>
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAVEtHLKbq5hTQy4VK2jzk8GXBZRR1b4VM&&callback=initMap" async defer></script>


        <script type="text/javascript">
            window.heap = window.heap || [], heap.load = function (e, t) {
                window.heap.appid = e, window.heap.config = t = t || {};
                var r = t.forceSSL || "https:" === document.location.protocol,
                    a = document.createElement("script");
                a.type = "text/javascript", a.async = !0, a.src = (r ? "https:" : "http:") + "//cdn.heapanalytics.com/js/heap-" + e + ".js";
                var n = document.getElementsByTagName("script")[0];
                n.parentNode.insertBefore(a, n);
                for (var o = function (e) {
                    return function () {
                        heap.push([e].concat(Array.prototype.slice.call(arguments, 0)))
                    }
                }, p = ["addEventProperties", "addUserProperties", "clearEventProperties", "identify", "removeEventProperty", "setEventProperties", "track", "unsetEventProperty"], c = 0; c < p.length; c++) heap[p[c]] = o(p[c])
                    };
            heap.load("1918988559");
        </script>
    </head>
    
    <body>
        
        <div id="map"></div>
        
    </body>
</html>