<?php
// Set up parameters for cURL request
error_reporting(E_ALL);
ini_set('display_errors', 1);

$appId = '935376812025681';
$appSecret = '309a3520805ff36958c4960e23446aa3';
$userAccessToken = 'EAANSuGKcp1EBOyZCZBdpBi5kcZA0ZCc8rsoMQc2wzZBAE7p0vslZCva14TzZBRUiirwstIfXgbiz1h9unnvALlvmrLQ2d0fWsL4ZCA7yZAW7yUqwvnSQKoXmdViWZANwGgqC6JZADwtcUz2k4F6uwhbTZAD8ZC4YwadYDEXLSdSx2CbVkGR9YlKybEE1ZCY3OF92B7CfdPOEiUIBY9AxMQ0CC0wJYZBTxGpbAZDZD';

$url = "https://graph.facebook.com/v21.0/oauth/access_token?" . http_build_query([
    'grant_type' => 'fb_exchange_token',
    'client_id' => $appId,
    'client_secret' => $appSecret,
    'fb_exchange_token' => $userAccessToken,
]);

// Initialize cURL session
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

// Execute and handle the response
$response = curl_exec($ch);
curl_close($ch);

$data = json_decode($response, true);

if (isset($data['access_token'])) {
    echo "New Access Token: " . $data['access_token'];
} else {
    echo "Error refreshing token: " . $response;
}

?>