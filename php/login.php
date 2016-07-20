<?php
session_start(); // Starting Session
    
$error=' '; // Variable To Store Error Message
if (isset($_POST['submit'])) {
	if (empty($_POST['email']) || empty($_POST['password'])) {
		$error = "Email or Password is blank";
	}
	else
	{
		$url = 'https://meet-up-1097.appspot.com/?command=connect&args='.$_POST['email'].';'.$_POST['password'].'&token=';
     
       
        
		if (strpos(get_headers($url)[0],'200') != false){
			$jsonResponse = json_decode(file_get_contents($url),true);
			$_SESSION['token'] = $jsonResponse['token'];
            
            if (isset($_GET['redirect'])) {
                header("location:" . $_GET['redirect']);
                exit();
            }
            else {
                header("location:/");
                exit();
            }
		}
        // Failed to login
		else{
            if (isset($_GET['error'])) {
                header("location:" . $_SERVER['PHP_SELF'] . "?" .  http_build_query($_GET));
            }
            else {
                header("location:" . $_SERVER['PHP_SELF'] . "?error&" . http_build_query($_GET));
            }
            exit();
		}
	}
}

if (isset($_POST['logout'])){
	$_SESSION = array();
    session_unset();
	session_destroy();
}
    
?>

