<?php 

$appID = '2643902052577784';
$appSecret = 'ccad07cd9b1dbb5df73a0bbc2686380a';
$pageToken = 'EAAlknWqqMfgBALwdtgO0x6FPNG5AzzIdZBab12hnfxvMt2ZCQtoLTIijSOBrtX0RRXARIzyG0BpPvZBPhDoj535W1ZBak7YXm0liPiZCbIVcOIfPx5ZByZAgtr9bSd7W8lzVb4cSw3fjxWjm4WMRZBZAbxATD9Fr69sfN89rz0Rv98ZCLhRbHHnSBwRzZAAKTyRkwHGnZCtQc7boegZDZD';
  
  require_once __DIR__ . '/../Facebook/autoload.php'; // change path as needed

$fb = new \Facebook\Facebook([
  'app_id' => $appID,
  'app_secret' => $appSecret,
  'default_graph_version' => 'v11.0',
  'default_access_token' => $pageToken, // optional
]);

$oAuth2Client = $fb->getOAuth2Client();

// Exchanges a short-lived access token for a long-lived one
$pageToken = $longLivedAccessToken = $oAuth2Client->getLongLivedAccessToken('EAAlknWqqMfgBALwdtgO0x6FPNG5AzzIdZBab12hnfxvMt2ZCQtoLTIijSOBrtX0RRXARIzyG0BpPvZBPhDoj535W1ZBak7YXm0liPiZCbIVcOIfPx5ZByZAgtr9bSd7W8lzVb4cSw3fjxWjm4WMRZBZAbxATD9Fr69sfN89rz0Rv98ZCLhRbHHnSBwRzZAAKTyRkwHGnZCtQc7boegZDZD');

// Use one of the helper classes to get a Facebook\Authentication\AccessToken entity.
//   $helper = $fb->getRedirectLoginHelper();
//   $helper = $fb->getJavaScriptHelper();
//   $helper = $fb->getCanvasHelper();
//   $helper = $fb->getPageTabHelper();

try {
  // Get the \Facebook\GraphNodes\GraphUser object for the current user.
  // If you provided a 'default_access_token', the '{access-token}' is optional.
  $response = $fb->get('/me', $pageToken);
} catch(\Facebook\Exceptions\FacebookResponseException $e) {
  // When Graph returns an error
  echo 'Graph returned an error: ' . $e->getMessage();
  exit;
} catch(\Facebook\Exceptions\FacebookSDKException $e) {
  // When validation fails or other local issues
  echo 'Facebook SDK returned an error: ' . $e->getMessage();
  exit;
}

$me = $response->getGraphUser();
// echo 'Logged in as ' . $me->getName() . ". ";





/* PHP SDK v5.0.0 */
/* make the API call */
try {
  // Returns a `Facebook\FacebookResponse` object
  $response = $fb->get(
    '/654136314974827/?fields=overall_star_rating,rating_count',
    $AccessToken
  );
} catch(Facebook\Exceptions\FacebookResponseException $e) {
  echo 'Graph returned an error: ' . $e->getMessage();
  exit;
} catch(Facebook\Exceptions\FacebookSDKException $e) {
  echo 'Facebook SDK returned an error: ' . $e->getMessage();
  exit;
}
$rating = $response -> getGraphNode();
/* handle the result */

// Eksempel på at få det ud på siden.
// echo '<meta charset="utf-8">Torsted Dækmontage har <b style="font-size: 2rem;"><i>' . $rating['overall_star_rating'] . '</i></b> ud af 5.0 fra <b style="font-size: 2rem;"><i>' . $rating['rating_count'] . '</i></b> anmeledelser!';

?>