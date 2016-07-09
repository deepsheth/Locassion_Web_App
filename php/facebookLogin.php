<?php
require_once '../vendor/autoload.php';
$redirectLink = 'http://www.adamknuckey.com/php/facebookLoginReturn.php'; //TODO - pass facebookLoginReturn.php a link to the page that the user came from originally, so it can redirect there after finishing. Smoother user experience

if (!session_id()) {
    session_start();
}

$fb = new Facebook\Facebook([
'app_id' => '163412274075007',
'app_secret' => 'b99799273e17d782d015c23e96d82637',
'default_graph_version' => 'v2.2',
]);

$helper = $fb->getRedirectLoginHelper();

$permissions = ['public_profile','email','user_friends']; // Optional permissions
$loginUrl = $helper->getLoginUrl($redirectLink, $permissions);
//echo($loginUrl)
header('Location: '.$loginUrl);
?>