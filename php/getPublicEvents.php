<?php


//$url = 'https://meet-up-1097.appspot.com/?command=publicEvents&args=-75.375634;40.606709;2;2014-11-13%2016:00:00;2016-11-13%2016:00:00;:::&token=';//.$_SESSION['token'];
//$url = 'https://meet-up-1097.appspot.com/?command=publicEvents&args='. $_GET['lat'] .';'. $_GET['lng'] .';'. $_GET['radius'] .';'. $_GET['start_year'] .'-'. $_GET['start_month'] .'-'. $_GET['start_day'] .'%20'. $_GET['start_hour'] .':'. $_GET['start_min'] .':'. $_GET['start_sec'] .';'. $_GET['end_year'] .'-'. $_GET['end_month'] .'-'. $_GET['end_day'] .'%'. $_GET['end_hour'] .':'. $_GET['end_min'] .':'. $_GET['end_sec'] .';:::&token=';//.$_SESSION['token'];
$url = 'https://meet-up-1097.appspot.com/?command=publicEvents&args='. $_GET['lng'] .';'. $_GET['lat'] .';'. $_GET['radius'] .';'. $_GET['start_date'] .'%20'. $_GET['start_time'] .';'. $_GET['end_date'] .'%'. $_GET['end_time'] .';:::&token=';//.$_SESSION['token'];

if (strpos(get_headers($url)[0],'200') != false){
    $jsonResponse = json_decode(file_get_contents($url),true);
    $formattedIDs = implode(':',$jsonResponse['events']);
    $url = 'https://meet-up-1097.appspot.com/?command=getPublicEventInfo&args='.$formattedIDs.'&token=';
    //.$_SESSION['token'];
    echo(file_get_contents( $url) );
    //echo('//'.$url);
}

?>