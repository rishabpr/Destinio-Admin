<?php
include 'session_check.php';
include "connection.php";
$query_country="select * from visa_countries";
$result_country=mysqli_query($conn,$query_country);
$ans="[";
$c=0;
while ($row_country=mysqli_fetch_array($result_country))
{
    $ans=$ans."{";
    $ans=$ans.'"id":'.$row_country[0].",";
    $ans=$ans.'"country_code": '.'"'.$row_country[1].'",';
    $ans=$ans.'"country_name": '.'"'.$row_country[2].'"';
    $ans=$ans."},";
    $c=$c+1;
}
$ans=trim($ans,",");
$ans=$ans."]";
if($c>0)
{
echo $ans;
}
else{
    echo "No Entries Yet!!";
}