<script> var publicEventInfo = </script><?php
//if(isset($_SESSION['token'])){
$url = 'https://meet-up-1097.appspot.com/?command=publicEvents&args=-75.375634;40.606709;2;2014-11-13%2016:00:00;2016-11-13%2016:00:00;:::&token=';//.$_SESSION['token'];
//                print_r(get_headers($url));

if (strpos(get_headers($url)[0],'200') != false){
    $jsonResponse = json_decode(file_get_contents($url),true);
    $formattedIDs = implode(':',$jsonResponse['events']);
    $url = 'https://meet-up-1097.appspot.com/?command=getPublicEventInfo&args='.$formattedIDs.'&token=';
    //.$_SESSION['token'];
    echo(file_get_contents($url).';//');
    //echo('//'.$url);
}
//}
?>
<script>'';</script>