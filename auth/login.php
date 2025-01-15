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
$permissions = ['email', 'pages_show_list', 'pages_manage_posts']; // Add required permissions
$loginUrl = $helper->getLoginUrl('http://localhost/social-tool/auth/callback.php', $permissions);

echo '<a href="' . htmlspecialchars($loginUrl) . '">Log in with Facebook!</a>';
?>
