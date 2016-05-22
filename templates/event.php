<?php
include("./header.html"); 

if (!empty($_GET['action'])) { 
    $action = $_GET['action']; 
    $action = basename($action); 
    if (file_exists("./$action.html") 
        $action = "index"; 
if ($action == 'header' || $action == 'footer')
        $action = "index";
include("./$action.html"); 
} else { 
    include("/"); 
}

        include("./footer.html"); 
?>