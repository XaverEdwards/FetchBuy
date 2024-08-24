<?php
$CLIENT_ID = "this is my id";
$CLIENT_SECRET = "this is secretKey";
$AUTH_SERVICE_DOMAIN = "https://auth.mercari.com";
$REFRESH_TOKEN="this is refresh token";



$BASIC_SECRET = base64_encode("$CLIENT_ID:$CLIENT_SECRET");

$apiData = array(
    'grant_type' => 'refresh_token',
    'scope' => 'openapi:buy offline_access',
    'refresh_token' => $REFRESH_TOKEN,
);

$options = array(
    'http' => array(
        'header' => "Authorization: Basic $BASIC_SECRET\r\n" .
                    "Content-Type: application/x-www-form-urlencoded\r\n",
        'method' => 'POST',
        'content' => http_build_query($apiData),
        'ignore_errors'=>true,
        
    ),
);

$context = stream_context_create($options);
$response = file_get_contents("$AUTH_SERVICE_DOMAIN/jp/v1/token", false, $context);
if ($response === false) {
    // 处理错误
    $error = error_get_last();
    echo "HTTP请求失败：" . $error['message'];
    exit;
}


$response_data = json_decode($response, true);



if (isset($response_data['access_token'])) {
    $access_token = $response_data['access_token'];
    echo "成功获取access token: $access_token";
} else {
    echo "获取access token失败：" . $response_data['error_description'];
    // 或者使用 var_dump($response_data); 打印完整的响应数据以进行调试
    exit;
}
?>
