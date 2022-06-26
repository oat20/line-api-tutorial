<?php
date_default_timezone_set("Asia/Bangkok");

$apiUrl = "https://notify-api.line.me/api/notify";

$apiHeader = [
	"Content-Type: application/x-www-form-urlencoded",
	"Authorization: Bearer BT3b9bLnTnRLQ51PrWezMYcwFl4BXL6D34m6AsaIULS"
];

$apiPostData = [
	"message" => "สวัสดีชาวโลก... ".date("Y-m-d H:i:s"). " Click Me https://liff.line.me/1656063405-WGe3LaA9",
	"stickerPackageId" => "6136",
	"stickerId" => "10551381"
];

$ch = curl_init();
curl_setopt( $ch, CURLOPT_URL, $apiUrl);
curl_setopt($ch, CURLOPT_HTTPHEADER, $apiHeader);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
curl_setopt( $ch, CURLOPT_POSTFIELDS, http_build_query($apiPostData));
curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt( $ch, CURLOPT_SSL_VERIFYPEER, false );
$content = curl_exec( $ch );
curl_close($ch);

print_r ($content);
?>