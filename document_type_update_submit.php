<?php

include "connection.php";
$status= $_REQUEST['status'];
$id=$_REQUEST['id'];
$country_name=$_REQUEST['country_name'];
$visa_type=$_REQUEST['visa_type'];
$document_name=$_REQUEST['document_name'];
$description=$_REQUEST['description'];

if($status==1) {
    $document_file=$_FILES['document_file']['name'];
    $temp=$_FILES['document_file']['tmp_name'];
    $size=$_FILES['document_file']['size'];
    $type=$_FILES['document_file']['type'];
    $path="documents/".$document_file;
    $path1="C:/xampp/htdocs/visa_processing_user/documents/".$document_file;
    $path = "documents/" . $document_file;
    $extension = strtolower(pathinfo($document_file, PATHINFO_EXTENSION));
    if ($extension == 'txt' || $extension == 'pdf'|| $extension == 'doc'|| $extension == 'docx') {
        move_uploaded_file($temp, $path);
        copy($path, $path1);
        $query_document = "update visa_documents set country_id='" . $country_name . "', visa_type='" . $visa_type . "',document_name='" . $document_name . "',document_file='" . $path . "',description='" . $description . "' where id=" . $id;
        mysqli_query($conn, $query_document);
        echo "Entry Updated";
    } else {
        echo "Please upload PDF or TEXT Files";

    }
}
else{

    $query_update = "update visa_documents set country_id='" . $country_name . "', visa_type='" . $visa_type . "',document_name='" . $document_name . "',description='" . $description . "' where id=" . $id;
        mysqli_query($conn, $query_update);
        echo "Entry Updated";


}
