<?php
include 'session_check.php';
include "connection.php";
$ar=json_decode($_REQUEST["ins_query"],true);

$insert="insert into visa_admin VALUES ('" . $ar["email"] . "','" . $ar["password"] . "'," . $ar["otp"] . ",'".$ar["type"]."',".$ar["number"].")";
if(mysqli_query($conn,$insert))
{
    echo "Entry Added Successfully";
}