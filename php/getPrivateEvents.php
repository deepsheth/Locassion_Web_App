<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if(isset($_SESSION['token'])){
    $url = 'https://meet-up-1097.appspot.com/?command=privateEvents&args=-75.375634;40.606709;2;2014-11-13%2016:00:00;2020-11-13%2016:00:00;:::&token='.$_SESSION['token'];

    if (strpos(get_headers($url)[0],'200') != false){
        $jsonResponse = json_decode(file_get_contents($url),true);
        $formattedIDs = implode(':',$jsonResponse['events']);
        $url = 'https://meet-up-1097.appspot.com/?command=getPrivateEventInfo&args='.$formattedIDs.'&token='.$_SESSION['token'];
        echo(file_get_contents( $url) );
        //echo('//'.$url);
    }
    else{
        file_get_contents('https://meet-up-1097.appspot.com/?command=log&args=HEADERS ERROR - '.get_headers($url).'&token=none');
    }
}
?>