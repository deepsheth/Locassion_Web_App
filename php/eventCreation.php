<?php
session_start(); // Starting Session
	
//TO BE SET: location (cant get longitude latitude), privacy, time (hour minutes seconds), location description
if ($_POST['private'] == 'true'){
	$_POST['private'] = 1;
}
else{
	$_POST['private'] = 0;
}//'.$_POST['private'].'
//$result = file_get_contents('https://meet-up-1097.appspot.com/?command=log&args=doesthiswork?&token=');
//$url = 'https://meet-up-1097.appspot.com/?command=log&args=whywontyouwork&token=';
//$result = file_get_contents('https://meet-up-1097.appspot.com/?command=log&args=doesthiswork?'.$_POST['location_details'].'&token=');
//$result = file_get_contents('https://meet-up-1097.appspot.com/?command=log&args='.$_POST['startTime'].'&token=');
/*$result = file_get_contents('https://meet-up-1097.appspot.com/?command=log&args='.$_POST['latitude'].'&token=');
$result = file_get_contents('https://meet-up-1097.appspot.com/?command=log&args='.$_POST['longitude'].'&token=');
$result = file_get_contents('https://meet-up-1097.appspot.com/?command=log&args='.$_POST['event_title'].'&token=');
$result = file_get_contents('https://meet-up-1097.appspot.com/?command=log&args='.$_POST['event_details'].'&token=');
$result = file_get_contents('https://meet-up-1097.appspot.com/?command=log&args='.$_POST['tag1'].'&token=');
$result = file_get_contents('https://meet-up-1097.appspot.com/?command=log&args='.$_POST['tag2'].'&token=');
$result = file_get_contents('https://meet-up-1097.appspot.com/?command=log&args='.$_POST['start_date'].'&token=');
$result = file_get_contents('https://meet-up-1097.appspot.com/?command=log&args='.$_POST['location_details'].'&token=');
$result = file_get_contents('https://meet-up-1097.appspot.com/?command=log&args='.$_POST['end_date'].'&token=');
$result = file_get_contents('https://meet-up-1097.appspot.com/?command=log&args='.$_SESSION['token'].'&token=');*/


$url = 'https://meet-up-1097.appspot.com/?command=makeEvent&args='.$_POST['latitude'].';'.$_POST['longitude'].';'.$_POST['event_title'].';'.$_POST['event_details'].';'.$_POST['tag1'].';'.$_POST['tag2'].';'.$_POST['private'].';'.date('Y-m-d', strtotime($_POST['start_date'])).' '.$_POST['startTime'].';'.$_POST['location_details'].';'.date('Y-m-d', strtotime($_POST['end_date'])).' '.$_POST['endTime'].'&token='.$_SESSION['token'];
$url = str_replace(' ', "%20", $url);//strtr($url, ' ', "%"."20");
$result = file_get_contents($url);

/*if (ctype_digit($result)){
	header("location: ../index.php");
}
else{
	header("location: ../webpages/create_event.php");
}*/
	
	
	
	
//}
?>