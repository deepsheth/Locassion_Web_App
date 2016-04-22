<?php

session_start(); // Starting Session
$url = 'https://meet-up-1097.appspot.com/?command=makeUser&args='.$_POST['name'].';'.$_POST['email'].';'.$_POST['password'].'&token='.$_SESSION['token'];
$url = str_replace(' ', "%20", $url);
$result = file_get_contents($url);

?>