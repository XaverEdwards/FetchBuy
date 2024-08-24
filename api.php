<?php
session_start();
// include '/var/www/html/api.php';


$CLIENT_ID = "this is id";
$CLIENT_SECRET = "this is secret code";
$AUTH_SERVICE_DOMAIN = "https://auth.mercari.com";
$OPEN_API_DOMAIN = "https://api.jp-mercari.com";

$ENCODED_ID_SECRET = base64_encode("$CLIENT_ID:$CLIENT_SECRET");


$apiData = array(
    'grant_type' => 'client_credentials',
    'scope' => 'openapi:buy',
);

$options = array(
    'http' => array(
        'header' => "Authorization: Basic $ENCODED_ID_SECRET\r\n" .
                    "Content-Type: application/x-www-form-urlencoded\r\n",
        'method' => 'POST',
        'content' => http_build_query($apiData),
    ),
);

$context = stream_context_create($options);
$response = file_get_contents("$AUTH_SERVICE_DOMAIN/jp/v1/token", false, $context);
$response_data = json_decode($response, true);



if (isset($response_data['access_token'])) {
    $access_token = $response_data['access_token'];
    
    // echo $access_token;

    // global $access_token;



} else {
    echo "Failed to obtain access token.";
    // Handle error here
    exit;
}








?>




