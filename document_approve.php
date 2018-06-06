<?php
include "connection.php";
if($_REQUEST['status']=='0')
{
    $s=0;
    $query_apprv = "update user_documents set status='".$s."' , reason='".$_REQUEST['message']."' where id='" . $_REQUEST['id'] . "'";
}
else {
    $query_apprv = "update user_documents set status='" . $_REQUEST['status'] . "'where id='" . $_REQUEST['id'] . "'";
}
$result_apprv=mysqli_query($conn,$query_apprv);

if($result_apprv)
{
    header('location:view_document.php');
    }

?>
