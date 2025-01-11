<?php 
error_reporting(E_ALL);
ini_set('display_errors', 1);
function Token() {
    require_once('vendor/autoload.php');

    $fb = new Facebook\Facebook([
        'app_id' => '935376812025681',
        'app_secret' => '309a3520805ff36958c4960e23446aa3',
        'default_graph_version' => 'v21.0',
    ]);

    $shortLivedToken = 'EAANSuGKcp1EBO7ebtl56VmamUTSmuYsQDlUHqZCVhwoJbep9DRLVCb4RZCXfFkIZAoY9fEyqTc2lT3zzKmxdbz5KWBDNMp74duOiJOKSMRQ51CWMOPeaTbwHV6SWfYnrKACluyZA8ry55ZCAT6uKCldG9qM9oE7NjdxIWoajhcLtHAmZBZCgBelBxOlYsYFOp3fc8Y7gEjDWEp2QZBYTLFyxw2Dwofay2g9e';

    try {
        $longLivedToken = $fb->getOAuth2Client()->getLongLivedAccessToken($shortLivedToken);

        return (string)$longLivedToken;
    } catch (Facebook\Exceptions\FacebookResponseException $e) {
        return 'Graph returned an error: ' . $e->getMessage();
    } catch (Facebook\Exceptions\FacebookSDKException $e) {
        return 'Facebook SDK returned an error: ' . $e->getMessage();
    }
}


?>