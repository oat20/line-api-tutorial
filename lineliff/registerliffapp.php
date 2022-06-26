<?php
$url = 'https://api.line.me/liff/v1/apps';
$token = "/ul3MjhJLlt2SQIQPD238ybdMqlByXYnEY8axazdfgaxrZFNfVowiqgaRkzHb9wKC5DzdcuRTWDi7mJh+xB+pGBn+ihVAKAhPW5485q2ct1y0wPLsoSiLRjr7agUQIULTbudfSD0aTX+SWu129echQdB04t89/1O/w1cDnyilFU=";

$h = array(
    "Authorization: Bearer ".$token,
    "Content-Type: application/json"
);

$d = array(
    "view" => array(
            "type" => "full",
            "url" => "https://doc.ph.mahidol.ac.th/ict/upgradessd/",
        "moduleMode" => "true"
    ),
    "description" => "List Upgrade SSD",
    "features" => array(
        "ble" => "true"
    ),
    "permanentLinkPattern" => "concat"
);

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