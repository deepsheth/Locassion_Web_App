<?php

session_start();

$_SESSION['token'] = $_POST['token'];
header('Location: /index.php');

?>