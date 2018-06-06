<?php

$array=json_decode($_REQUEST['data'],true);
$email= $array['email'];
$message=$array['message'];
$subject=$array['subject'];
$mobile=$array['mobile'];

$ch = curl_init();
$message = urlencode(strtoupper($subject).':: ' . $message  );
curl_setopt($ch, CURLOPT_URL, "http://server1.vmm.education/VMMCloudMessaging/AWS_SMS_Sender?");
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS,
    "username=PHP_JAN_2018&password=KPZ1V4K4&message=" . $message . "&phone_numbers=" . $mobile);

curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$server_output = curl_exec($ch);
curl_close($ch);
mail($email,$subject,$message);

echo '1';

?>