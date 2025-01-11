<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once('vendor/autoload.php');

// Initialize Facebook SDK
$fb = new Facebook\Facebook([
    'app_id' => '935376812025681',
    'app_secret' => '309a3520805ff36958c4960e23446aa3',
    'default_graph_version' => 'v21.0',
]);

// Use your user access token
$userAccessToken = 'EAANSuGKcp1EBOxNHMG98lKqvIVl4uzhwZCXLVqpfMeCYILjp4GOdVrTpIPp7849rxmdHDGsZAMRBumy5c6zNZCq3LpwsmZBZCRJxqfddMhPpSZCHBX1cVdnQny6MUGwMbMYcshr92fiHOzTaVaISWs824d3dVPETw9X4GZCZC2DEorjDJJNZC5x5jczPv0ZCEjPTNAkiiTBSkShi4Mew01ZBmZA56zLT2X5hbpNI';

try {
    $data = [
        'title' => 'Amazing Product Launch 🚀',
        'description' => 'Check out our latest product launch video with incredible features!',
        'file_url' => 'https://sajdhajcreations.com/a.mp4',  // Ensure the file is directly accessible as a video file
    ];

    // Post the video along with a description to the feed
    $response = $fb->post('/me/videos', $data, $userAccessToken);

    $graphNode = $response->getGraphNode();
    echo 'Post with Video ID: ' . $graphNode['id'];
} catch (Facebook\Exceptions\FacebookResponseException $e) {
    // Display detailed error response
    echo 'Graph returned an error: ' . $e->getMessage() . "\n";
    echo 'Error Code: ' . $e->getCode() . "\n";
    
    $errorDetails = $e->getResponseData();
    if (isset($errorDetails['error']['error_user_title'])) {
        echo 'Error Title: ' . $errorDetails['error']['error_user_title'] . "\n";
    }
    if (isset($errorDetails['error']['error_user_msg'])) {
        echo 'Error Message: ' . $errorDetails['error']['error_user_msg'] . "\n";
    }

    exit;
} catch (Facebook\Exceptions\FacebookSDKException $e) {
    // Handle SDK exceptions
    echo 'Facebook SDK returned an error: ' . $e->getMessage();
    exit;
}
?>
