<?php
include 'session_check.php';
include "connection.php";
$query_admin="select * from visa_admin";
$result_admin=mysqli_query($conn,$query_admin);
$ans="[";
while ($row_admin=mysqli_fetch_array($result_admin))
{
    $ans=$ans."{";
    $ans=$ans.'"email":'.'"'.$row_admin[0].'",';
    $ans=$ans.'"mobile_num":'.$row_admin[4].",";
    $ans=$ans.'"type":'.'"'.$row_admin[3].'"';
    $ans=$ans."},";
}
$ans=trim($ans,",");
$ans=$ans."]";
echo $ans;