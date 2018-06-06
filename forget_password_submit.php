
<?php
include "connection.php";

$array = json_decode($_REQUEST['q'], true);


    $s = "select * from visa_admin WHERE email='" . $array['email'] . "'";
    $result = mysqli_query($conn, $s);
    if (mysqli_num_rows($result) <= 0) {
        echo 1;
    } else {
        $row = mysqli_fetch_array($result);
        $mobile = $row['mobile_num'];
        $pass = '';
        for ($i = 0; $i < 6; $i++) {
            $randno = rand(1, 10);
            if ($randno < 5) {
                $pass .= rand(0, 9);
            } else {
                $pass .= chr(rand(65, 90));
            }
        }

        $ch = curl_init();
        $message = urlencode('Your OTP is ' . $pass . '. This is a one Time OTP.Please Do not share with Others');
        curl_setopt($ch, CURLOPT_URL, "http://server1.vmm.education/VMMCloudMessaging/AWS_SMS_Sender?");
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS,
            "username=PHP_JAN_2018&password=KPZ1V4K4&message=" . $message . "&phone_numbers=" . $mobile);

        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $server_output = curl_exec($ch);
        curl_close($ch);

        $sql = "update visa_admin set otp='$pass' WHERE email='" . $array['email'] . "'";
        //echo $sql;
        mysqli_query($conn, $sql);
        echo 2;
    }