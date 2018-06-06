<?php
include "connection.php";
include 'session_check.php';
$del="delete from visa_news where id=".$_REQUEST["id"];

if(mysqli_query($conn,$del)) {
    header("location:view_news.php");
}
