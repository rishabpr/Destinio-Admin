<?php
include "connection.php";
$user_query="update visa_new_user set status='0' where 1";
$user_result=mysqli_query($conn,$user_query);
if($_REQUEST['data']=='')
{
    $query_customer = "select * from visa_customers order by customer_id desc";
}

else if($_REQUEST['data1']=='') {
    $query_customer = "select * from visa_customers where country_id=" . $_REQUEST['data']." order by customer_id desc";
 }
else if($_REQUEST['data1']!='')
 {

    $query_customer = "select * from visa_customers where country_id='" . $_REQUEST['data']."'and visa_type_id='".$_REQUEST['data1']."'  order by customer_id desc";
 }

$result_customer=mysqli_query($conn,$query_customer);
$ans="[";
$c=0;
while ($row=mysqli_fetch_array($result_customer))
{

    $query_country="select country_name from visa_countries where id=".$row[6];
    $result_country=mysqli_query($conn,$query_country);
    $row_country=mysqli_fetch_array($result_country);


    $query_visa="select visa_type from visa_styles  where id=".$row[7];
    $result_visa=mysqli_query($conn,$query_visa);
    $row_visa=mysqli_fetch_array($result_visa);


    $ans=$ans."{";
    $ans=$ans.'"customer_id":'.$row[0].",";
    $ans=$ans.'"customer_name":'.'"'.$row[1].'",';
    $ans=$ans.'"address":'.'"'.$row[2].'",';
    $ans=$ans.'"passport_number":'.'"'.$row[3].'",';
    $ans=$ans.'"customer_email":'.'"'.$row[4].'",';
    $ans=$ans.'"customer_password":'.'"'.$row[5].'",';
    $ans=$ans.'"country_name":'.'"'.$row_country[0].'",';
    $ans=$ans.'"visa_type":'.'"'.$row_visa[0].'",';
    $ans=$ans.'"mobile":'.'"'.$row[9].'",';
   $ans=$ans.'"photo":'.'"'.$row[8].'"';
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
