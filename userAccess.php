<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once('vendor/autoload.php');
require_once('refresh_token.php');


// Initialize Facebook SDK
$fb = new Facebook\Facebook([
    'app_id' => '935376812025681',
    'app_secret' => '309a3520805ff36958c4960e23446aa3',
    'default_graph_version' => 'v21.0',
]);

$appId = '935376812025681';
$appSecret ='309a3520805ff36958c4960e23446aa3';
$userToken = '';
$pageId = '525922777271536';


// Execute the token refresh
$token = refreshPageAccessToken($appId, $appSecret, $userToken, $pageId);// Use your user access token


$userAccessToken = 'EAANSuGKcp1EBO1RZADXHFEVyviF6zjzJvI6nVQAjufX6j6a4fw2zrsTi938fd68UIkMMkUaoonGkTGXnYiPHi65ehfZCPCPrJ1pW0sfuOX4boTBMT22iyTFET5RBcmUT0EGw10ZAOvV6Gn2h5TD6py6B9rHjtTlHhbUHFiIGaZAbJBwu3ny93kMV4j4WBKthWf6F7Y6g';



try {
    // Define the data to send in the POST request
    $data = [
        'message' => 'Token API Testing !',
    ];

    // Make the POST request to the profile feed
    $response = $fb->post('/me/feed', $data, $userAccessToken);
} catch (Facebook\Exceptions\FacebookResponseException $e) {
    echo 'Graph returned an error: ' . $e->getMessage();
    exit;
} catch (Facebook\Exceptions\FacebookSDKException $e) {
    echo 'Facebook SDK returned an error: ' . $e->getMessage();
    exit;
}

// Get the response
$graphNode = $response->getGraphNode();
echo 'Post ID: ' . $graphNode['id'];
?>
