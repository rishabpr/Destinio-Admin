<?php
include "connection.php";
include 'session_check.php';
$del="delete from visa_contacts where sr_no=".$_REQUEST["id"];

if(mysqli_query($conn,$del)) {
    header("location:requests.php");
}

