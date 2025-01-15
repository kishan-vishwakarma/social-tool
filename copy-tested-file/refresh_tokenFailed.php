<?php

function refreshPageAccessToken($appId, $appSecret, $userToken, $pageId) {
    // Step 1: Exchange short-lived user token for a long-lived token
    $url = "https://graph.facebook.com/v12.0/oauth/access_token?" .
           "grant_type=fb_exchange_token&" .
           "client_id=$appId&" .
           "client_secret=$appSecret&" .
           "fb_exchange_token=$userToken";

    $response = file_get_contents($url);
    $responseData = json_decode($response, true);

    if (isset($responseData['access_token'])) {
        $longLivedToken = $responseData['access_token'];

        // Step 2: Get the Page Access Token
        $pageUrl = "https://graph.facebook.com/v12.0/$pageId?fields=access_token&access_token=$longLivedToken";
        $pageResponse = file_get_contents($pageUrl);
        $pageData = json_decode($pageResponse, true);

        if (isset($pageData['access_token'])) {
            return $pageData['access_token'];  // Return refreshed Page Access Token
        }
    }

    return false;
}

?>
