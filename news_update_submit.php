<?php
include "connection.php";
include 'session_check.php';
$array=json_decode($_REQUEST["string"],true);
$query="update visa_news set caption='".$array['caption']."', description='".$array['description']."' where id=".$array['id'];
if( mysqli_query($conn,$query)) {

    echo "Entry Updated";
}
else
{
    echo "Update Failed";
}