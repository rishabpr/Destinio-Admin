<?php
include 'session_check.php';
include "connection.php";
$array=json_decode($_REQUEST["ins_query"],true);

$insert="insert into visa_countries VALUES (NULL,'" . $array["country_code"] . "','".$array["country_name"]."')";
if(mysqli_query($conn,$insert))
{
    echo "Country Added Successfully";
}