<?php
include 'session_check.php';
include "connection.php";
$array=json_decode($_REQUEST["ins_query"],true);

$insert="insert into visa_news VALUES (NULL,'" . $array["caption"] . "','".$array["desc"]."','".date('Y-m-d')."','".$array["intro"]."','0','".$array["spcl"]."')";
if(mysqli_query($conn,$insert))
{
    echo "News Added Successfully";
}