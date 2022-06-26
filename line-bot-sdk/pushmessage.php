<?php
$strUrl = "https://api.line.me/v2/bot/message/push";

$token = '/ul3MjhJLlt2SQIQPD238ybdMqlByXYnEY8axazdfgaxrZFNfVowiqgaRkzHb9wKC5DzdcuRTWDi7mJh+xB+pGBn+ihVAKAhPW5485q2ct1y0wPLsoSiLRjr7agUQIULTbudfSD0aTX+SWu129echQdB04t89/1O/w1cDnyilFU=';

// Get request content
//$request = file_get_contents('php://input');

// Decode JSON to Array
//$request_array = json_decode($request, true);

//Insert json format to text file
//file_put_contents('log.txt', file_get_contents('php://input') . PHP_EOL, FILE_APPEND);

/*$arrayHeader = array(
    "Content-Type: application/json",
    "Authorization: Bearer /ul3MjhJLlt2SQIQPD238ybdMqlByXYnEY8axazdfgaxrZFNfVowiqgaRkzHb9wKC5DzdcuRTWDi7mJh+xB+pGBn+ihVAKAhPW5485q2ct1y0wPLsoSiLRjr7agUQIULTbudfSD0aTX+SWu129echQdB04t89/1O/w1cDnyilFU="
);*/

/*$arrayPostData = array(
    "to" => "U8e04b347cca1501d0b13b33fcfeb0610",
    "messages" => array(
        array(
            "type" => "text",
            "text" => "Hello, world1"
        ),
        array(
           "type" => "sticker",
            "packageId" => "8522",
            "stickerId" => "16581271"
        )
    )
);*/
$arrayHeader = array();
$arrayHeader[] = "Content-Type: application/json";
$arrayHeader[] = "Authorization: Bearer {$token}";

$arrayPostData = array();
$arrayPostData['to'] = "U8e04b347cca1501d0b13b33fcfeb0610";
$arrayPostData['messages'][0]['type'] = "text";
$arrayPostData['messages'][0]['text'] = "Hello World"; 
$arrayPostData['messages'][1]['type'] = "sticker";
$arrayPostData['messages'][1]['packageId'] = "8522";
$arrayPostData['messages'][1]['stickerId'] = "16581271"; 

/*$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $strUrl);
curl_setopt($ch, CURLOPT_HEADER, false);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, $arrayHeader);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($arrayPostData, JSON_UNESCAPED_UNICODE));
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
$result = curl_exec($ch);
curl_close($ch);

print_r ($result);*/

print json_encode($arrayPostData, JSON_UNESCAPED_UNICODE);
?>