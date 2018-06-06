<?php

include 'connection.php';
$query_delte="delete  from ".$_REQUEST['table']." where 1";
echo $query_delte;
$result=mysqli_query($conn,$query_delte);
$page=$_REQUEST['table'].'.php';
header('location:'.$_REQUEST['page']);
?>