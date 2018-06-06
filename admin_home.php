<!DOCTYPE html>
<html>
<head>
    <?php
    include "headerfiles.php";
    ?>
</head>
<body>
<?php
include "adminheader.php";
include "connection.php";
?>
<div class="container">
  <h3 class="text-center">Welcome <?php  echo $_SESSION['admin']; ?></h3>
</div>
</body>
</html>