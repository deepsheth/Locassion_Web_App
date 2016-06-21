<?php
session_start(); // Starting Session
$error=' '; // Variable To Store Error Message
if (isset($_POST['submit'])) {
	if (empty($_POST['email']) || empty($_POST['password'])) {
		$error = "email or Password is blank";
	}
	else
	{
		$url = 'https://meet-up-1097.appspot.com/?command=connect&args='.$_POST['email'].';'.$_POST['password'].'&token=';
		if (strpos(get_headers($url)[0],'200') != false){
			$jsonResponse = json_decode(file_get_contents($url),true);
			$_SESSION['token'] = $jsonResponse['token'];
		}
		else{
            echo ('<p class="orange-text"> Something went horribly wrong! :( Try again.</p>');
            echo ('<p class="orange-text text-lighten-2"> <strong> For our fellow hard-working devs: </br> </strong>');
            print_r(get_headers($url));
            echo ("</p>");
		}
		


//		// Define $email and $password
//		$email=$_POST['email'];
//		$password=$_POST['password'];
//		// Establishing Connection with Server by passing server_name, user_id and password as a parameter
//		$connection = mysql_connect(':/cloudsql/meet-up-1097:leavitt-innovations','root','');
//		mysql_select_db('LeavittInnovationsDB');
//		// To protect MySQL injection for Security purpose
//		$email = stripslashes($email);
//		$password = stripslashes($password);
//		$email = mysql_real_escape_string($email);
//		$password = mysql_real_escape_string($password);
//		// Selecting Database
//		// SQL query to fetch information of registerd users and finds user match.
//		$query = mysql_query("select userid,name,password from user where email='$email'", $connection);
//		$rows = mysql_num_rows($query);
//		if ($rows == 1 and password_verify($password , $row['password']) == 1) {
//			$_SESSION['email']=$email; // Initializing Session
//			$_SESSION['userID']= mysql_fetch_assoc($query)['userid'];
//			header("location: index.php"); // Redirecting To Other Page
//			mysql_close();
//		} else {
//			$error = "Email or Password is invalid";
//			mysql_close();
//		}
		//mysql_close($connection); // Closing Connection
	}
}
if (isset($_POST['logout'])){
	$_SESSION = array();
	session_destroy();
}
?>
