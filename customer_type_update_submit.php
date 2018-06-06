<?php

include "connection.php";
$status = $_REQUEST['status'];
$customer_id = $_REQUEST['customer_id'];
$customer_name = $_REQUEST['customer_name'];
$address = $_REQUEST['address'];
$passport_number = $_REQUEST['passport_number'];
$customer_email = $_REQUEST['customer_email'];
$customer_password = $_REQUEST['customer_password'];
$confirm_password = $_REQUEST['confirm_password'];
$mobile = $_REQUEST['mobile'];
$country_id = $_REQUEST['country_id'];
$visa_type_id = $_REQUEST['visa_type_id'];
if ($status == 1) {
    $photo = $_FILES['photo']['name'];
    $temp = $_FILES['photo']['tmp_name'];
    $size = $_FILES['photo']['size'];
    $type = $_FILES['photo']['type'];
    $path = "photos/" . $photo;
    $extension = strtolower(pathinfo($photo, PATHINFO_EXTENSION));
    if ($extension == 'png' || $extension == 'jpg' || $extension == 'jpeg') {
        move_uploaded_file($temp, $path);
        $query_customer = "update visa_customers set customer_name='" . $customer_name . "', address='" . $address . "',passport_number='" . $passport_number . "',customer_email='" . $customer_email . "',customer_password='" . $customer_password . "',country_id='" . $country_id . "',visa_type_id='" . $visa_type_id . "',photo='" . $path . "',mobile='" . $mobile . "' where customer_id=" . $customer_id;
        mysqli_query($conn, $query_customer);
        $body = 'Use these Credentials to access your account at this link LINK 
               Username:' . $customer_email .
            'Password:' . $confirm_password;
        mail($customer_email, 'Visa Account Registration', $body);

        echo "Entry Updated";
    } else {
        echo "please upload PNG or JPG or JPEG Images";

    }
} else {
    $query_update = "update visa_customers set customer_name='" . $customer_name . "', address='" . $address . "',passport_number='" . $passport_number . "',customer_email='" . $customer_email . "',customer_password='" . $customer_password . "',country_id='" . $country_id . "',visa_type_id='" . $visa_type_id . "',mobile='" . $mobile . "' where customer_id=" . $customer_id;
    mysqli_query($conn, $query_update);
    $body = 'Use these Credentials to access your account at this link LINK  Username::' . $customer_email .
        'Password::' . $confirm_password;

    mail($customer_email, 'Visa Account Registration', $body);

    echo "Entry Updated";
}
