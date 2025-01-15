<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();
require_once('../vendor/autoload.php');

$fb = new Facebook\Facebook([
    'app_id' => '935376812025681',
    'app_secret' => '309a3520805ff36958c4960e23446aa3',
    'default_graph_version' => 'v21.0',
]);

$helper = $fb->getRedirectLoginHelper();

try {
    $accessToken = $helper->getAccessToken();
    if (isset($accessToken)) {
        $_SESSION['facebook_access_token'] = (string) $accessToken;

        // Get page access token if needed
        $response = $fb->get('/me/accounts', $accessToken);
        $pages = $response->getDecodedBody();
        
        // Check if the data array is not empty

        if (!empty($pages['data'])) {

            // Get the access token from the response

            $accessToken = $pages['data'][0]['access_token'];

            

            // Set the access token in the session

            $_SESSION['access_token'] = $accessToken;


            // Optionally, you can also set the page ID and name in the session

            $_SESSION['page_id'] = $pages['data'][0]['id'];

            $_SESSION['page_name'] = $pages['data'][0]['name'];

        }
        
    

        // echo '<pre>'; print_r($pages); echo '</pre>';
    }
} catch (Facebook\Exceptions\FacebookResponseException $e) {
    echo 'Graph returned an error: ' . $e->getMessage();
    exit;
} catch (Facebook\Exceptions\FacebookSDKException $e) {
    echo 'Facebook SDK returned an error: ' . $e->getMessage();
    exit;
}

echo 'Access Token: ' . $_SESSION['facebook_access_token'];
// You can now access these session variables in other parts of your application
echo 'ID: ' . $_SESSION['page_id'] . '<br>';
echo 'Access Token: ' . $_SESSION['access_token'];
header("Location: ../web/post_photo_form.html");
die;
?>
