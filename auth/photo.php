<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();
require_once '../vendor/autoload.php';

$fb = new Facebook\Facebook([
    'app_id' => '935376812025681',
    'app_secret' => '309a3520805ff36958c4960e23446aa3',
    'default_graph_version' => 'v21.0',
]);

$pageAccessToken = $_SESSION['access_token'];
$facebookAccessToken = $_SESSION['facebook_access_token'];

try {
    $data = [
        'message' => 'Posted via Graph API after login!',
        'url' => 'https://images.unsplash.com/photo-1542291026-7eec264c27ff',
    ];

    $response = $fb->post('/me/photos', $data, $pageAccessToken);

    $graphNode = $response->getGraphNode();
    echo 'Post with Photo ID: ' . $graphNode['id'];
} catch (Facebook\Exceptions\FacebookResponseException $e) {
    echo 'Graph returned an error: ' . $e->getMessage();
    exit;
} catch (Facebook\Exceptions\FacebookSDKException $e) {
    echo 'Facebook SDK returned an error: ' . $e->getMessage();
    exit;
}
?>
