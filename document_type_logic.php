<?php
include "connection.php";


if($_REQUEST['data']=='' )
{
    $query_document="select * from visa_documents";

}

else if($_REQUEST['data']!='' &&$_REQUEST['data1']=='') {
    $query_document="select * from visa_documents where country_id='" . $_REQUEST['data']."'";

}
else if($_REQUEST['data1']!='')
{
    $query_document="select * from visa_documents where country_id='" . $_REQUEST['data']."'and visa_type='".$_REQUEST['data1']."' ";
}

$result_document=mysqli_query($conn,$query_document);
$ans="[";
$c=0;
while ($row=mysqli_fetch_array($result_document))
{
    $query_country="select country_name from visa_countries where id=".$row[1];
    $result_country=mysqli_query($conn,$query_country);
    $row_country=mysqli_fetch_array($result_country);


    $query_visa="select visa_type from visa_styles  where id=".$row[2];
    $result_visa=mysqli_query($conn,$query_visa);
    $row_visa=mysqli_fetch_array($result_visa);

    $ans=$ans."{";
    $ans=$ans.'"id":'.$row[0].",";
    $ans=$ans.'"country_name":'.'"'.$row_country[0].'",';
    $ans=$ans.'"visa_type":'.'"'.$row_visa[0].'",';
    $ans=$ans.'"document_name":'.'"'.$row[3].'",';
    $ans=$ans.'"document_file":'.'"'.$row[4].'"';
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
