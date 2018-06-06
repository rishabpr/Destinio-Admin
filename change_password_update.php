<?php
include 'session_check.php';
$array=json_decode($_REQUEST['ins_query'],true);
include "connection.php";
$query_admin="select * from visa_admin where email='".$array['email']."' and password='".$array['password']."'";
$result_admin=mysqli_query($conn,$query_admin);

if(mysqli_fetch_array($result_admin)) {
    $query_update = "update visa_admin set password='" . $array['newpassword'] . "' where email='" . $array['email'] . "'";
    mysqli_query($conn, $query_update);
    echo "Password Changed";

}

else
{
    echo " Wrong Password";
}