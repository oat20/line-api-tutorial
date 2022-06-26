<?php
$url = "https://api.line.me/v2/bot/richmenu";

$h = [
    "Authorization: Bearer vcKak9Lfs5UVZG6g3T+rJZPXE31RU9aUmL7gJ9AtUzmV3dKydx4BBdCOngT1Rf0J0TWF7cew6O3fwyeZt3zSI38fwN1c6OyH3h36hvSSfQJZ99tVZSsqgL7wgzPNd/oq79QSL5mvsJNWbkxKZQdNdwdB04t89/1O/w1cDnyilFU=",
    "Content-Type: application/json"
];

$d = [
    "size" => [
      "width" => 2500,
      "height" => 1686
    ],
    "selected" => false,
    "name" => "Nice richmenu",
    "chatBarText" => "Tap here",
    "areas" => [
        [
            "bounds" => [
            "x" => 0,
            "y" => 0,
            "width" => 2500,
            "height" => 1686
            ],
            "action" => [         
                "type" => "postback",
            "data" => "action=buy&itemid=123"
            ]
        ]
    ]
];

//print json_encode($d);
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_HEADER, false);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, $h);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($d));
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
$server_output = curl_exec($ch);
curl_close($ch);

print_r ($server_output);
?>