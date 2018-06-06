<?php
include "connection.php";
$query="update visa_contacts set status_read='0' where 1";
mysqli_query($conn,$query);
header('location:requests.php');
?>