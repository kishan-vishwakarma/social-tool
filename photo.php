<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once('vendor/autoload.php');

$fb = new Facebook\Facebook([
    'app_id' => '935376812025681',
    'app_secret' => '309a3520805ff36958c4960e23446aa3',
    'default_graph_version' => 'v21.0',
]);

$pageAccessToken = 'EAANSuGKcp1EBOzdruAq8HsoFas2ZC3mGf2UPMjnjW8dkorzQRJXM8BWZBBAzWGpGp1KP9ivWgbXZAoUvS0qbXC1QrYGuGV5z9iabMGErOWqdM52aMoWhy9VPSIGQUCw0fkCpsEkPTTMbphl6rOGygqCaBhtfZAr1WZAGiVvZACZAEVvL2kT4WihnZAewEBx7TEUzUsiQwZCUlgfKccuQOAZBZCI2IEWp9Pwbkq5';

try {
    $data = [
        'message' => 'This is a combined post with text, emojis, and a photo! 😊📸',
        'caption' => 'This photo captures a beautiful scene.',
        'description' => 'This photo captures a beautiful scene.',
        'url' => 'https://images.unsplash.com/photo-1542291026-7eec264c27ff',  // Replace with your photo URL
    ];

    // Post the photo along with a message to the feed
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

$graphNode = $response->getGraphNode();
echo 'ID: ' . $graphNode['id'];

?>