<?php

include "connection.php";
if($_REQUEST['data']=='')
{
    $query_visa = "select * from visa_styles";
}

else{
    $query_visa = "select * from visa_styles where country_id='" . $_REQUEST['data']."'";
}

$result_visa=mysqli_query($conn,$query_visa);
$ans="[";
$c=0;
while ($row_visa=mysqli_fetch_array($result_visa))
{
    $query_country="select country_name from visa_countries where id=".$row_visa[2];
    $result_country=mysqli_query($conn,$query_country);
    $row_country=mysqli_fetch_array($result_country);
    $ans=$ans."{";
    $ans=$ans.'"id":'.$row_visa[0].",";
    $ans=$ans.'"country": '.'"'.$row_country[0].'",';
    $ans=$ans.'"visa_type": '.'"'.$row_visa[1].'"';
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