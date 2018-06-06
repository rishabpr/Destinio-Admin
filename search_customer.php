<?php
include "connection.php";
if($_REQUEST['search_by']=='name')
 {
    $query = "select customer_id,customer_name from visa_customers ";

 }
if($_REQUEST['search_by']=='email')
 {
    $query = "select customer_id,customer_email from visa_customers ";

 }
if($_REQUEST['search_by']=='passport')
 {
    $query = "select customer_id,passport_number from visa_customers ";

 }
if($_REQUEST['search_by']=='country')
{
    $query = "select id,country_name from visa_countries ";

}
 $result=mysqli_query($conn,$query);
$array='';
while ($row=mysqli_fetch_array($result))
{
    echo"<div>".$row[1]."</div>";
    $array.='"'.$row[1].'",';
}
echo '['.$array.']';

    ?>