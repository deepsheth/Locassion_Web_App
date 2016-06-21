<?php
session_start(); // Starting Session
$message=' '; // Variable To Store Error Message


// Prevents users who are already logged in from creating an other account.
if (isset($_SESSION['token'])) {
    header('Location: ' . '/');
    exit();
}

if (isset($_POST['signup'])) {
    
    if (empty($_POST['username']) || empty($_POST['email']) || empty($_POST['password'])) {
        $message = "Your name, email, and password are required.";
        echo ("{$message}");
    }
    else
    {
        $url = 'https://meet-up-1097.appspot.com/?command=makeUser&args='.$_POST['username'].';'.$_POST['email'].';'.$_POST['password'];
        print_r(get_headers($url));
        print("'" . $url . "'");

        if (strpos(get_headers($url)[0],'200') != false){
            $jsonResponse = json_decode(file_get_contents($url),true);
            $_SESSION['userID'] = $jsonResponse;  
            $_SESSION['message'] = "Great, account created! Onto the last step!";
            header('Location: ' . '/webpages/log_in.php');
            exit();
//            echo '<pre>';
//            var_dump($_SESSION);
//            echo '</pre>';
            
        }
    }
    

    
}
?>