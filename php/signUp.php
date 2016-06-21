<?php
session_start(); // Starting Session
$error=' '; // Variable To Store Error Message
if (isset($_POST['signup'])) {
    if (empty($_POST['username']) || empty($_POST['email']) || empty($_POST['password'])) {
        $error = "Your name, email, and password are required.";
        echo ("{$error}");
    }
    else
    {
        $url = 'https://meet-up-1097.appspot.com/?command=makeUser&args='.$_POST['username'].';'.$_POST['email'].';'.$_POST['password'];
        print_r(get_headers($url));
        print("'" . $url . "'");
//
//        if (strpos(get_headers($url)[0],'200') != false){
//            $jsonResponse = json_decode(file_get_contents($url),true);
//            echo ("{$jsonResponse}");
//            $_SESSION['userID'] = $jsonResponse['userID'];
//            
//        }
    }
    

    
}
?>