<?php
session_start(); // Starting Session

$event_details = $location_details = $tag3 = $tag4 = $end_date = $end_time = " ";

if (isset($_POST['event_details'])) $event_details = $_POST['event_details'];
if (isset($_POST['location_details'])) $location_details = $_POST['location_details'];
if (isset($_POST['tag3'])) $tag3 = $_POST['tag3'];
if (isset($_POST['tag4'])) $tag4 = $_POST['tag4'];
if (isset($_POST['end_date'])) $end_date = $_POST['end_date'];
if (isset($_POST['end_time'])) $end_time = $_POST['end_time'];

// name, desec, tag 1, tag2, privacy, start date time, end date time, location desc
        
//$url = 'https://meet-up-1097.appspot.com/?command=makeEvent&args='.$_POST['latitude'].';'.$_POST['longitude'].';'.$_POST['event_name'].';'.$_POST['event_details'].';'. $_POST['tag1'] . ';'. $_POST['tag2'] . ';'.$tag3 .';'.$tag4 . ';'.$_POST['is_private'].';';
$url = 'https://meet-up-1097.appspot.com/?command=makeEvent&args='. urlencode($_POST['latitude'].';'.$_POST['longitude'].';'.$_POST['event_name'].';'.$event_details.';'. $_POST['tag1'] . ';'. $_POST['tag2'] . ';'. $tag3.';'. $tag4 . ';'.$_POST['is_private'].';'.date('Y-m-d', strtotime($_POST['start_date']) ).' '. $_POST['start_time'] .';' . $location_details . ';'. $end_date .' '. $end_time . ';'. $_POST['address']) . '&token=' . $_SESSION['token'];

$result = file_get_contents($url);
echo $result;
?>