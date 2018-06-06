<?php
include "connection.php";
$array = json_decode($_REQUEST['q'], true);

    $update = "update visa_admin set password='" . $array['new_pass'] . "',otp='' WHERE email='" . $array['email'] . "'";
    if (mysqli_query($conn, $update)) {
        echo 1;
    } else {
        echo "Password can't updated";
    }
