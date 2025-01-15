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

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    $message = $_POST['message'];
    $video = $_FILES['video'];


    // Check if the file was uploaded without errors
    if (isset($video) && $video['error'] == 0) {

        
        // Read the file content
        $filePath = $video['tmp_name'];
        $data = [
            'message' => $message,
            'file_url' => $fb->fileToUpload($filePath),
        ];

        try {
            $response = $fb->post('/me/videos', $data, $pageAccessToken);
            $graphNode = $response->getGraphNode();
            echo 'Post with Video ID: ' . $graphNode['id'];
            header("Location: dashboard.php");
        } catch (Facebook\Exceptions\FacebookResponseException $e) {
            echo 'Graph returned an error: ' . $e->getMessage();
            exit;
        } catch (Facebook\Exceptions\FacebookSDKException $e) {
            echo 'Facebook SDK returned an error: ' . $e->getMessage();
            exit;
        }
    } else {
        echo 'Error uploading file.';
    }
} else {
    echo 'Invalid request method.';
}
?>