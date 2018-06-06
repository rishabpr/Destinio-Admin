<?php
include "connection.php";
include 'session_check.php';
$get="select * from visa_customers where visa_type_id=".$_REQUEST['id'];
$result=mysqli_query($conn,$get);
$c=0;
while($row=mysqli_fetch_array($result))

{
    $c=$c+1;

}
if($c>0)
{

    echo "<script>window.location.href='view_visa_type.php?message=References violated!!!Entry Can\'t be Removed '</script>";
}
else {

    $del = "delete from visa_styles where id=" . $_REQUEST["id"];

    if (mysqli_query($conn, $del)) {
        header("location:view_visa_type.php?message=Entry Removed");
    }
}
?>

