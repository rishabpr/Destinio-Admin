<?php
include "connection.php";
include 'session_check.php';
$ar=json_decode($_REQUEST["string"],true);

$query="update visa_countries set country_code='".$ar["country_code"]."',country_name='".$ar["country_name"]."' where id='".$ar["id"]."'";

if( mysqli_query($conn,$query)) {

    echo "Entry Updated";
}
else
{
    echo "Update Failed";
}