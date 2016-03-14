<?php
// Establishing Connection with Server by passing server_name, user_id and password as a parameter
$connection = mysql_connect(':/cloudsql/meet-up-1097:leavitt-innovations','root','');
mysql_select_db('LeavittInnovationsDB');
session_start();// Starting Session
// Storing Session
$user_check=$_SESSION['userID'];
// SQL Query To Fetch Complete Information Of User
$ses_sql=mysql_query("select name from brothers where userid='$user_check'", $connection);
$row = mysql_fetch_assoc($ses_sql);
$login_session =$row['userID'];
//if(!isset($login_session)){
//	mysql_close($connection); // Closing Connection
//	header('Location: index.php'); // Redirecting To Home Page
}
?>