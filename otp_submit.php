<?php
include "connection.php";
$array = json_decode($_REQUEST['q'], true);

    $otp = $array['otp'];
    $s = "select * from visa_admin WHERE email='" . $array['email'] . "' and otp='" . $otp . "'";
    $result = mysqli_query($conn, $s);
    $row = mysqli_fetch_array($result);

    if ($row['otp'] == $otp) {
        echo 2;
    } else {
        echo 1;
    }
