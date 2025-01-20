<?php
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
    if (!isset($accessToken)) {
        echo "Error: " . $helper->getError();
        exit;
    }

    // Save access token in session or database for this user
    $_SESSION['facebook_access_token'] = (string) $accessToken;

    // Redirect to dashboard or process further
    header('Location: dashboard.php');
    exit;
} catch (Facebook\Exceptions\FacebookResponseException $e) {
    echo 'Graph returned an error: ' . $e->getMessage();
    exit;
} catch (Facebook\Exceptions\FacebookSDKException $e) {
    echo 'Facebook SDK returned an error: ' . $e->getMessage();
    exit;
}
?>
