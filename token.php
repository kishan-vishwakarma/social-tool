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

$shortLivedToken = 'EAANSuGKcp1EBO7ebtl56VmamUTSmuYsQDlUHqZCVhwoJbep9DRLVCb4RZCXfFkIZAoY9fEyqTc2lT3zzKmxdbz5KWBDNMp74duOiJOKSMRQ51CWMOPeaTbwHV6SWfYnrKACluyZA8ry55ZCAT6uKCldG9qM9oE7NjdxIWoajhcLtHAmZBZCgBelBxOlYsYFOp3fc8Y7gEjDWEp2QZBYTLFyxw2Dwofay2g9e';

try {
    $longLivedToken = $fb->getOAuth2Client()->getLongLivedAccessToken($shortLivedToken);
    echo 'Long-Lived Access Token: ' . (string)$longLivedToken;
    

} catch (Facebook\Exceptions\FacebookResponseException $e) {
    echo 'Graph returned an error: ' . $e->getMessage();
    exit;
} catch (Facebook\Exceptions\FacebookSDKException $e) {
    echo 'Facebook SDK returned an error: ' . $e->getMessage();
    exit;
}

?>