<?php
require_once '../vendor/autoload.php';


if (!session_id()) {
    session_start();
}
$fb = new Facebook\Facebook([
'app_id' => '163412274075007', // Replace {app-id} with your app id
'app_secret' => 'b99799273e17d782d015c23e96d82637',
'default_graph_version' => 'v2.2',
]);

$helper = $fb->getRedirectLoginHelper();

try {
  $accessToken = $helper->getAccessToken();
} catch(Facebook\Exceptions\FacebookResponseException $e) {
  // When Graph returns an error
  echo 'Graph returned an error: ' . $e->getMessage();
  exit;
} catch(Facebook\Exceptions\FacebookSDKException $e) {
  // When validation fails or other local issues
  echo 'Facebook SDK returned an error: ' . $e->getMessage();
  exit;
}

if (! isset($accessToken)) {
		if ($helper->getError()) {
		header('HTTP/1.0 401 Unauthorized');
		echo "Error: " . $helper->getError() . "\n";
		echo "Error Code: " . $helper->getErrorCode() . "\n";
		echo "Error Reason: " . $helper->getErrorReason() . "\n";
		echo "Error Description: " . $helper->getErrorDescription() . "\n";
	} else {
		header('HTTP/1.0 400 Bad Request');
		echo 'Bad request';
	}
	exit;
}

// Logged in
//echo '<h3>Access Token</h3>';
//var_dump($accessToken->getValue());

// The OAuth 2.0 client handler helps us manage access tokens
$oAuth2Client = $fb->getOAuth2Client();

// Get the access token metadata from /debug_token
$tokenMetadata = $oAuth2Client->debugToken($accessToken);
//echo '<h3>Metadata</h3>';
//var_dump($tokenMetadata);

// Validation (these will throw FacebookSDKException's when they fail)
$tokenMetadata->validateAppId('163412274075007'); // Replace {app-id} with your app id
// If you know the user ID this access token belongs to, you can validate it here
$tokenMetadata->validateExpiration();

if (! $accessToken->isLongLived()) {
  // Exchanges a short-lived access token for a long-lived one
  try {
	$accessToken = $oAuth2Client->getLongLivedAccessToken($accessToken);
  } catch (Facebook\Exceptions\FacebookSDKException $e) {
	echo "<p>Error getting long-lived access token: " . $helper->getMessage() . "</p>\n\n";
	exit;
  }

  echo '<h3>Long-lived</h3>';
  var_dump($accessToken->getValue());
}
$_SESSION['fb_access_token'] = (string) $accessToken;
//echo('<p>Access Token: '.((string) $accessToken));

try {
  // Returns a `Facebook\FacebookResponse` object
  $response = $fb->get('/me?fields=id,name,picture', (string) $accessToken);
} catch(Facebook\Exceptions\FacebookResponseException $e) {
  echo 'Graph returned an error: ' . $e->getMessage();
  exit;
} catch(Facebook\Exceptions\FacebookSDKException $e) {
  echo 'Facebook SDK returned an error: ' . $e->getMessage();
  exit;
}
$user = $response->getGraphUser();

//echo '<p>Id: '.$user['id'];
//echo '<p>Name: '.$user['name'];
//echo '<p>Picture: '.$user['picture']['url'];

$output = json_decode(file_get_contents('https://meet-up-1097.appspot.com/?command=facebookConnect&args='.$user['id'].';'.$accessToken.';'.urlencode($user['name']).';'.urlencode($user['picture']['url']).'&token=none'),true);
session_start();
$_SESSION['token'] = $output['token'];
header('Location: http://www.adamknuckey.com');
//$facebookUserID = $user['id'];
//$name = $user['name'];
/*$picture = $user['picture'];*/

?>