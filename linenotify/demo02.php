<?php
$headers = array( 
'Content-type: application/x-www-form-urlencoded', 
'Authorization: Bearer Kxxxxxxxxxxxxxxxxxxxxh'
);

$message = $_REQUEST['message'];

$content = array(
    'message' => $message,
    'imageThumbnail' => 'http://10.10.10.10/small.jpg',
    'imageFullsize' => 'http://10.10.10.10/large.jpg'
);

$chOne = curl_init();
curl_setopt( $chOne, CURLOPT_URL, "https://notify-api.line.me/api/notify");
// SSL USE
curl_setopt( $chOne, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt( $chOne, CURLOPT_SSL_VERIFYPEER, 0);
//POST
curl_setopt( $chOne, CURLOPT_POST, 1);
// Message
curl_setopt( $chOne, CURLOPT_POSTFIELDS, http_build_query($content));
//curl_setopt($chOne, CURLOPT_POSTFIELDS, json_encode($message, JSON_UNESCAPED_UNICODE));
//ถ้าต้องการใส่รุป ให้ใส่ 2 parameter imageThumbnail และimageFullsize
curl_setopt( $chOne, CURLOPT_POSTFIELDS, $content);
// follow redirects
curl_setopt( $chOne, CURLOPT_FOLLOWLOCATION, 1);
//ADD header array
  // หลังคำว่า Bearer ใส่ line authen code ไป
curl_setopt($chOne, CURLOPT_HTTPHEADER, $headers);
//RETURN
curl_setopt( $chOne, CURLOPT_RETURNTRANSFER, 1);
$result = curl_exec( $chOne );
//Check error
if(curl_error($chOne)) { echo 'error:' . curl_error($chOne); }
else { $result_ = json_decode($result, true);
echo "status : ".$result_['status']; echo "message : ". $result_['message']; }
//Close connect
curl_close( $chOne );
?>