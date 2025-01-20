<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once('vendor/autoload.php');
require_once('tokenMethod.php');


$fb = new Facebook\Facebook([
    'app_id' => '935376812025681',
    'app_secret' => '309a3520805ff36958c4960e23446aa3',
    'default_graph_version' => 'v21.0',
]);


// $token = Token();
// echo $token;die;
$token = 'EAANSuGKcp1EBO3uxV0ldZAwoqz6EPPyqeYeYXu6XmXZC6jlCyXaQjHYfZB35ZCVWVpVbckkLTruYtBgE95OhWMBZBU8NcoT7oyLaqcylEHgSXheSpje9S6gZALnWybYuqeAhZBFgWCVE1uxnmbq9ff1nAPu8pBLlLCEtvAWaxZC1NZBfJJtVLHvDc85ZBIbXuZC4s1ZBLrawuCKo';

try {
   
    $response = $fb->get('/me/accounts', $token);
    $pages = $response->getDecodedBody();
    
    foreach ($pages['data'] as $page) {
        echo 'Page Name: ' . $page['name'] . '<br>';
        echo 'Page ID: ' . $page['id'] . '<br>';
        echo 'Access Token: ' . $page['access_token'] . '<br><br>';
    }
    

} catch (Facebook\Exceptions\FacebookResponseException $e) {
    echo 'Graph returned an error: ' . $e->getMessage();
    exit;
} catch (Facebook\Exceptions\FacebookSDKException $e) {
    echo 'Facebook SDK returned an error: ' . $e->getMessage();
    exit;
}


?>
