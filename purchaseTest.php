<?php

require 'vendor/autoload.php';
include '/var/www/html/api.php';

$headers = array(
    'Content-Type' => 'application/json',
    'Accept' => 'application/json',
    'Authorization' => $access_token,
);

$client = new \GuzzleHttp\Client();


$request_body = array(
    'item_id'=> 'm92622282522',
    'zip_code1'=> '106',
    'zip_code2'=> '6118',
    'family_name'=> '山田',
    'first_name'=> '花子',
    'family_name_kana'=> 'ヤマダ',
    'first_name_kana'=> 'ハナコ',
    'telephone'=> '0123456789',
    'prefecture'=> '東京都',
    'city'=> '港区',
    'address1'=> '六本木６－１０－１',
    'address2'=> '六本木ヒルズ森タワー',
    'checksum'=> '37a797c824008c37ee76a7ee4370a382'
);

try {
    $response = $client->request('POST','https://api.mercari-sandbox.com/v1/items/purchase', array(
        'headers' => $headers,
        'json' => $request_body,
       )
    );
    print_r($response->getBody()->getContents());
 }
 catch (\GuzzleHttp\Exception\BadResponseException $e) {
 
    print_r($e->getMessage());
 }


