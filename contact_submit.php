
<?php
include "connection.php";
date_default_timezone_set ("Asia/Calcutta");
$d= date(" H:i:s", time());

$get="select * from visa_contacts where sr_no=25";

$r=mysqli_query($conn,$get);
$c=0;
while($row=mysqli_fetch_array($r))
{
    $c=$row[6];
}
$ar_recorded= explode(':',$c);

$ar_current=explode(':',$d);

$min=($ar_current[1]+60-$ar_recorded[1]);
$hour=$min/60;
$sec=$ar_current[2]-$ar_recorded[2];
echo "<br>";
echo $min;
if($min>60)
{
    echo $hour.'hours ago';
}
elseif ($min<60 &&$min>0)
{
    echo $min.'minutes ago';
}
else
{
    echo $sec.'seconds ago';
}


?>