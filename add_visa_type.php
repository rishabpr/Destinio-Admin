<?php
include 'session_check.php';
$array=json_decode($_REQUEST['query'],true);
include "connection.php";

$insert="insert into visa_styles VALUES (0,'".$array['visa_type']."','".$array['country']."','".$array['description']."')";
if(mysqli_query($conn,$insert)) {
   echo " Query Submitted.";
}
else{
    echo "Network Error...";
}