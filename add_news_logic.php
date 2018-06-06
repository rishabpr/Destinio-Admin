<?php
include 'session_check.php';
include "connection.php";
$query_news="select * from visa_news order by date desc";
$result_news=mysqli_query($conn,$query_news);
$ans="[";
while ($row_news=mysqli_fetch_array($result_news))
{
    $ans=$ans."{";
    $ans=$ans.'"id":'.$row_news[0].",";
    $ans=$ans.'"caption":'.'"'.$row_news[1].'",';
    $ans=$ans.'"desc":'.'"'.$row_news[2].'",';
    $ans=$ans.'"date":'.'"'.$row_news[3].'"';
    $ans=$ans."},";
}
$ans=trim($ans,",");
$ans=$ans."]";
echo $ans;