<?php
require("vendor/autoload.php");

$access_token = "vcKak9Lfs5UVZG6g3T+rJZPXE31RU9aUmL7gJ9AtUzmV3dKydx4BBdCOngT1Rf0J0TWF7cew6O3fwyeZt3zSI38fwN1c6OyH3h36hvSSfQJZ99tVZSsqgL7wgzPNd/oq79QSL5mvsJNWbkxKZQdNdwdB04t89/1O/w1cDnyilFU=";
$channel_secret = "2fa9c621f71fb48eb682770a27794954";

$httpClient = new \LINE\LINEBot\HTTPClient\CurlHTTPClient($access_token);
$bot = new \LINE\LINEBot($httpClient, ['channelSecret' => $channel_secret]);

file_put_contents("log.txt", file_get_contents('php://input'));

$content = file_get_contents('php://input');
$events = json_decode($content, true);

$replyToken = $events['events'][0]['replyToken'];
//print $replyToken."<br>";
print_r($events);

$textMessageBuilder = new \LINE\LINEBot\MessageBuilder\TextMessageBuilder('hello');
$response = $bot->replyMessage($replyToken, $textMessageBuilder);
if ($response->isSucceeded()) {
    echo 'Succeeded!';
    return;
}

// Failed
echo $response->getHTTPStatus() . ' ' . $response->getRawBody();
?>