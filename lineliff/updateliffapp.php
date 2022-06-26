<?php
$url = 'https://api.line.me/liff/v1/apps/1504045919-BvdVmZdx';
$token = "/ul3MjhJLlt2SQIQPD238ybdMqlByXYnEY8axazdfgaxrZFNfVowiqgaRkzHb9wKC5DzdcuRTWDi7mJh+xB+pGBn+ihVAKAhPW5485q2ct1y0wPLsoSiLRjr7agUQIULTbudfSD0aTX+SWu129echQdB04t89/1O/w1cDnyilFU=";

$h = array(
    "Authorization: Bearer " . $token,
    "Content-Type: application/json"
);

$d = array(
    "view" => array(
        //"url" => "https://doc.ph.mahidol.ac.th/ict/upgradessd/",
        "moduleMode" => "true"
    ),
    //"description" => "List Upgrade SSD"
);

$ch = curl_init();
curl_setopt($ch, CURLOPT_VERBOSE, 1);
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_HTTPHEADER, $h);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($d));
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
$returned = curl_exec($ch);
curl_close($ch);

print $returned;
?>