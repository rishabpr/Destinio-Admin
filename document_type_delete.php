<?php
include "connection.php";
$del="delete from visa_documents where id=".$_REQUEST["id"];

if(mysqli_query($conn,$del)) {
    header("location:view_document.php");
}
