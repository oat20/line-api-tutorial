<?php
error_reporting(E_ALL & ~E_NOTICE);

http_response_code(200);

// URL API LINE
$api_url = 'https://api.line.me/v2/bot/message/reply';

// ใส่ Channel access token (long-lived)
$access_token = '/ul3MjhJLlt2SQIQPD238ybdMqlByXYnEY8axazdfgaxrZFNfVowiqgaRkzHb9wKC5DzdcuRTWDi7mJh+xB+pGBn+ihVAKAhPW5485q2ct1y0wPLsoSiLRjr7agUQIULTbudfSD0aTX+SWu129echQdB04t89/1O/w1cDnyilFU=';

// ใส่ Channel Secret
$channel_serect = '79cfe1103a236451b65d2b95299ed607';

// Set HEADER
$post_header = array(
    'Content-Type: application/json',
    'Authorization: Bearer ' . $access_token
);

// Get request content
$request = file_get_contents('php://input');

// Decode JSON to Array
$request_array = json_decode($request, true);

//Insert json format to text file
file_put_contents('log.txt', file_get_contents('php://input') . PHP_EOL, FILE_APPEND);

/*if (sizeof($request_array['events']) > 0) {
    foreach ($request_array['events'] as $event) {

        $reply_message = '';
        $reply_token = $event['replyToken'];
        $data = [
            'replyToken' => $reply_token,
            'messages' => [
                [
                    'type' => 'text',
                    'text' => json_encode($request_array)
                ]
            ]
        ];
        $post_body = json_encode($data, JSON_UNESCAPED_UNICODE);
        $send_result = send_reply_message($API_URL . '/reply', $POST_HEADER, $post_body);
        echo "Result: " . $send_result . "\r\n";
    }
}*/
//echo "OK";

$message = $request_array['events'][0]['message']['text'];

$reply_message = 'สวัสดีชาวโลก';
$reply_token = $request_array['events'][0]['replyToken'];
$data = [
    'replyToken' => $reply_token,
    'messages' => [
        [
            'type' => 'text',
            //'text' => json_encode($request_array)
            'text' => $reply_message,
        ],
		[
			'type' => 'sticker',
			'packageId' => '8515',
			'stickerId' => '16581242'
		]
    ]
];

$post_body = json_encode($data, JSON_UNESCAPED_UNICODE);
//$send_result = send_reply_message($api_url, $post_header, $post_body);
//echo "Result: " . $send_result . "\r\n";

//function send_reply_message($url, $post_header, $post_body)
//{
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $post_header);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $post_body);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    $result = curl_exec($ch);
    curl_close($ch);

print_r($result);
//}
