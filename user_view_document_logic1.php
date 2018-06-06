<?php
include "connection.php";
if($_REQUEST['data']=='' )
{
$s="select * from user_documents order by id desc ";
}

else if($_REQUEST['data']!='' &&$_REQUEST['data1']=='') {
    $s="select * from user_documents where country_id='" . $_REQUEST['data']."'";

}
else if($_REQUEST['data1']!='')
{
    $s="select * from user_documents where country_id='" . $_REQUEST['data']."'and visa_type_id='".$_REQUEST['data1']."' ";
}





$result=mysqli_query($conn,$s);
$ans="[";
$c=0;
while ($row=mysqli_fetch_array($result))
{
    $ans=$ans."{";
    $ans=$ans.'"id":'.$row[0].",";
    $ans=$ans.'"email":'.'"'.$row[1].'",';
    $ans=$ans.'"document_name":'.'"'.$row[2].'",';
    $ans=$ans.'"document_file":'.'"'.$row[3].'",';
    $ans=$ans.'"document_status":'.'"'.$row[4].'"';

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
