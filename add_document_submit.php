<?php

include "connection.php";

$country_name=$_REQUEST['country_name'];
$visa_type=$_REQUEST['visa_type_id'];
$document_name=$_REQUEST['document_name'];
$document_file=$_FILES['document_file']['name'];
$temp=$_FILES['document_file']['tmp_name'];
$size=$_FILES['document_file']['size'];
$type=$_FILES['document_file']['type'];
$path="documents/".$document_file;
$description=$_REQUEST['description'];
$path="documents/".$document_file;
$path1="C:/xampp/htdocs/visa_processing_user/documents/".$document_file;
$extension=strtolower(pathinfo($document_file,PATHINFO_EXTENSION));

copy($path, $path1);
if($extension=='txt'||$extension=='pdf'||$extension=='doc'||$extension=='docx')
{
    move_uploaded_file($temp,$path);
    $insert="insert into visa_documents VALUES (NULL,'" . $country_name . "','".$visa_type."','".$document_name."','".$path."','".$description."')";
    mysqli_query($conn,$insert);
    echo "Documents Added Successfully";
}
else{
    echo "please upload PDF or TEXT Files";

}
