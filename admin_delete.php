<?php
include 'session_check.php';
include "connection.php";
$delete="delete from visa_admin where email='".$_REQUEST["email"]."'";

if(mysqli_query($conn,$delete)) {
    header("location:view_admin.php");
}
