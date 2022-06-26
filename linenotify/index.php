<?php
define('LINE_API',"https://notify-api.line.me/api/notify");
 
//$token = "97PZQvmxrLBM7jvPlCwMZ5yq6msIpMQCMtTpljfoqIP"; //ใส่Token ที่copy เอาไว้
$token = "BT3b9bLnTnRLQ51PrWezMYcwFl4BXL6D34m6AsaIULS";
$str = date('d/m/Y H:i').' แบบประเมิน https://doc.ph.mahidol.ac.th/room_assessment/feedback.php?id=1'; //ข้อความที่ต้องการส่ง สูงสุด 1000 ตัวอักษร
//วันที่: ผู้แจ้ง: ปัญหา: รายละเอียดเพิ่มเติม:
 
//$res = notify_message($str,$token);
//print_r($res);
//stdClass Object ( [status] => 200 [message] => ok )

function notify_message($message,$token){
 $queryData = array(
         'message' => $message,
                "stickerPackageId" => "446",
                "stickerId" => "1992"
);
 $queryData = http_build_query($queryData,'','&');

 $headerOptions = array( 
         'http' => array(
            'method' =>'POST',
            'header' => "Content-Type: application/x-www-form-urlencoded\r\n"
                      ."Authorization: Bearer ".$token."\r\n"
                      ."Content-Length: ".strlen($queryData)."\r\n",
            'content' => $queryData
         ),
 );

 $context = stream_context_create($headerOptions);
 $result = file_get_contents(LINE_API, FALSE, $context);
 $res = json_decode($result, true);
 return $res;
}

$ch = curl_init();

curl_setopt($ch, CURLOPT_URL,LINE_API);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
         "Content-Type: application/x-www-form-urlencoded",
                      "Authorization: Bearer ".$token
));
curl_setopt($ch, CURLOPT_POST, 1);

// In real life you should use something like:
curl_setopt($ch, CURLOPT_POSTFIELDS, 
          http_build_query(array(
                  'message' => $str
        )));

// Receive server response ...
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

$server_output = curl_exec($ch);

curl_close ($ch);

print_r($server_output);
//https://havespirit.blogspot.com/2017/02/line-notify-php.html
//https://medium.com/@nattaponsirikamonnet/%E0%B8%A1%E0%B8%B2%E0%B8%A5%E0%B8%AD%E0%B8%87-line-notify-%E0%B8%81%E0%B8%B1%E0%B8%99%E0%B9%80%E0%B8%96%E0%B8%AD%E0%B8%B0-%E0%B8%9E%E0%B8%B7%E0%B9%89%E0%B8%99%E0%B8%90%E0%B8%B2%E0%B8%99-65a7fc83d97f
?>