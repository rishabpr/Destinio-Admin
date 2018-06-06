<?php
include "connection.php";
include 'session_check.php';
$ar=json_decode($_REQUEST["string"],true);

$query_visa="update visa_admin set mobile_num='".$ar["number"]."',type='".$ar["type"]."' where email='".$ar["email"]."'";

if( mysqli_query($conn,$query_visa)) {

    echo "Entry Updated";
}
else
 {
    echo "Update Failed";
}