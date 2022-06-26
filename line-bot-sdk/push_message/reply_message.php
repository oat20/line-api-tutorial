<?php
http_response_code(200);

//เก็บ log
file_put_contents('log.txt', file_get_contents('php://input') . PHP_EOL, FILE_APPEND);

$content = file_get_contents('php://input');
$arrayJson = json_decode($content, true);

$url = "https://api.line.me/v2/bot/message/reply";

$h = [
    'Content-Type: application/json',
    'Authorization: Bearer vcKak9Lfs5UVZG6g3T+rJZPXE31RU9aUmL7gJ9AtUzmV3dKydx4BBdCOngT1Rf0J0TWF7cew6O3fwyeZt3zSI38fwN1c6OyH3h36hvSSfQJZ99tVZSsqgL7wgzPNd/oq79QSL5mvsJNWbkxKZQdNdwdB04t89/1O/w1cDnyilFU='
];

$message = $arrayJson['events'][0]['message']['text'];

if($message == "hi" or $message == "Hi" or $message == "t" or $message == "T"){
    $d = [
        "replyToken" => $arrayJson['events'][0]['replyToken'],
        "messages" => [
            [
                "type" => "text",
                "text" => "Hello, user"
            ],
            [
                "type" => "text",
                "text" => "May I help you?"
            ],
            [
                "type" => "sticker",
                "packageId" => "446",
                "stickerId" => "1988"
            ]
        ]
    ];
}else if($message == "sticker" or $message == "Sticker" or $message == "s" or $message == "S"){
    $d = [
        "replyToken" => $arrayJson['events'][0]['replyToken'],
        "messages" => [
            [
                "type" => "text",
                "text" => "ต๊ะเอ๋"
            ],
            [
                "type" => "sticker",
                "packageId" => "6359",
                "stickerId" => "11069867"
            ]
        ]
    ];
}else if($message == "link" or $message == "Link" or $message == "l" or $message == "L"){
    $d = [
        "replyToken" => $arrayJson['events'][0]['replyToken'],
        "messages" => [
            [
                "type" => "text",
                "text" => "Click me https://liff.line.me/1656063405-pbyK47kg"
            ]
        ]
    ];
} else if ($message == "q" or $message == "Q") {
    $d = [
        "replyToken" => $arrayJson['events'][0]['replyToken'],
        "messages" => [
            [
                "type" => "text",
                "text" => "สวัสดีชาวโลก ".date("d/m/Y@H:i"),
                "quickReply" => [
                    "items" => [
                        array(
                            "type" => "action",
                            "action" => [
                                "type" => "location",
                                "label" => "Send location"
                            ]
                        ),
                        array(
                            "type" => "action",
                            "action" => [
                                "type" => "message",
                                "label" => "Sushi",
                                "text" => "Sushi"
                            ]
                        ),
                        array(
                            "type" => "action",
                            "action" => [
                                "type" => "uri",
                                "label" => "Website",
                                "uri" => "https://www.ph.mahidol.ac.th",
                                "altUri" => [
                                    "desktop" => "https://www.ph.mahidol.ac.th"
                                ]
                            ]
                        )
                    ]
                ]
            ]
        ]
    ];
}

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_HEADER, false);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, $h);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($d));
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
$result = curl_exec($ch);
curl_close($ch);

print $result;
?>