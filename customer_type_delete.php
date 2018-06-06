<?php
include "connection.php";
$del="delete from visa_customers where customer_id=".$_REQUEST["id"];

if(mysqli_query($conn,$del)) {
    header("location:view_customers.php");
}
