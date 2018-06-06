<?php
include "connection.php";
include 'session_check.php';
$query_visa="select * from visa_styles where country_id=".$_REQUEST['id'];
$result_visa=mysqli_query($conn,$query_visa);
$c=0;
while($row_visa=mysqli_fetch_array($result_visa))

{
    $c=$c+1;

}
if($c>0)
{

    echo "<script>window.location.href='view_country.php?message=References violated!!!Entry Can\'t be Removed '</script>";
}
else {

    $delete_country = "delete from visa_countries where id=" . $_REQUEST["id"];

    if (mysqli_query($conn, $delete_country)) {
        header("location:view_country.php?message=Entry Removed");
    }
}
?>

