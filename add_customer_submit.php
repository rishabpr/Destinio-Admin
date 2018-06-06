<?php

include "connection.php";
include "session_check.php";
$customer_name = $_REQUEST['customer_name'];
$address = $_REQUEST['address'];
$passport_number = $_REQUEST['passport_number'];
$customer_email = $_REQUEST['customer_email'];
$customer_password = $_REQUEST['customer_password'];
$confirm_password = $_REQUEST['confirm_password'];
$mobile = $_REQUEST['mobile'];
$country_id = $_REQUEST['country_id'];
$visa_type_id = $_REQUEST['visa_type_id'];
$photo = $_FILES['photo']['name'];
$temp = $_FILES['photo']['tmp_name'];
$size = $_FILES['photo']['size'];
$type = $_FILES['photo']['type'];
$path = "photos/" . $photo;
$extension = strtolower(pathinfo($photo, PATHINFO_EXTENSION));$query_check = "select * from visa_customers where customer_email='" . $customer_email."'";
$c=0;
$result_check = mysqli_query($conn, $query_check);
while ($row = mysqli_fetch_array($result_check)) {
    $c=$c+1;
}
if($c>0)
{
    echo "Email Already Exists";
}
else {
    if ($extension == 'png' || $extension == 'jpg' || $extension == 'jpeg') {
        move_uploaded_file($temp, $path);
        $insert = "insert into visa_customers VALUES (NULL,'" . $customer_name . "','" . $address . "','" . $passport_number . "','" . $customer_email . "','" . $customer_password . "','" . $country_id . "','" . $visa_type_id . "','" . $path . "','" . $mobile . "')";
        mysqli_query($conn, $insert);

        $insert1 = "insert into visa_new_user VALUES ('',$customer_name,'1')";
        mysqli_query($conn, $insert1);

        $body = 'Use these Credentials to access your account at this link LINK 
           Username:' . $customer_email .
            'Password:' . $confirm_password;
        echo "Customer Added Successfully";
    } else {
        echo "please upload PNG or JPG or JPEG Photos";

    }
}
