<?php
include "connection.php";
$array=json_decode($_REQUEST["string"],true);
$query="update visa_styles set visa_type='".$array['type']."',country_id='".$array['country']."', description='".$array['description']."' where id=".$array['id'];
if( mysqli_query($conn,$query)) {

    echo "Entry Updated";
}
else
{
    echo "Update Failed";
}