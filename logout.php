
<?php
session_start();
if($_SESSION['type']=='admin') {
    session_unset($_SESSION['admin']);
}
else {
    session_unset($_SESSION['type']);
}
session_destroy();
header('location:admin_login.php');
?>