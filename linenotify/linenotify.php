<?php
define('LINE_API',"https://notify-api.line.me/api/notify");
 
//$token = "97PZQvmxrLBM7jvPlCwMZ5yq6msIpMQCMtTpljfoqIP"; //ใส่Token ที่copy เอาไว้
//$token = '5adSCzVqEf4HdChR3spUli8r75rnnJCl6pYr00Qbe';
//$str = "ขอทดสอบ Line Notify"; //ข้อความที่ต้องการส่ง สูงสุด 1000 ตัวอักษร
//วันที่: ผู้แจ้ง: ปัญหา: รายละเอียดเพิ่มเติม:
 
$res = notify_message2("สวัสดีชาวโลก... ".date("d/m/Y@H:i"), "BT3b9bLnTnRLQ51PrWezMYcwFl4BXL6D34m6AsaIULS");
print_r($res);
//stdClass Object ( [status] => 200 [message] => ok )

function notify_message($message,$token='97PZQvmxrLBM7jvPlCwMZ5yq6msIpMQCMtTpljfoqIP'){
 $queryData = array(
	'message' => $message,
	//'stickerId' => '255'
);
 $queryData = http_build_query($queryData,'','&');
 $headerOptions = array( 
         'http'=>array(
            'method' => 'POST',
            'header' => "Content-Type: application/x-www-form-urlencoded\r\n"
                      ."Authorization: Bearer ".$token."\r\n"
                      ."Content-Length: ".strlen($queryData)."\r\n",
            'content' => $queryData
         ),
 );
	$context = stream_context_create($headerOptions);
	$result = file_get_contents(LINE_API,FALSE,$context);
	$res = json_decode($result);
	return $res;
}

function notify_message2($message, $token){
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, LINE_API);

        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                "Content-Type: application/x-www-form-urlencoded",
                "Authorization: Bearer " . $token
        ));

        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");

        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query(array(
                "message" => $message,
                "stickerPackageId" => "446",
                "stickerId" => "1992"
        )));

        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        $content = curl_exec($ch);
        curl_close($ch);

        return json_decode($content, true);
}
?>