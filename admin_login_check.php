<?php
include "connection.php";

$array=json_decode($_REQUEST['data'],true);


    $query_admin = "select * from visa_admin where email='" . $array['email'] . "' and password='" . $array['pass'] . "'";
    $result_admin=mysqli_query($conn,$query_admin);
    $c=0;

    while($row_admin=mysqli_fetch_array($result_admin))
    {
        $c=$c+1;


    }
    session_start();
    $_SESSION['admin']=$array['email'];

    if($c>0)
    {
       echo "view_admin.php";
    }
    else
    {

        echo "admin_login.php";
    }



?>