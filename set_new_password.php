<?php
session_start();
if(isset($_SESSION['admin']))
{


    header('location:view_admin.php');
}

?>
<!DOCTYPE html>
<head>
    <title>Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="keywords" content="Visitors Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template,
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
    <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
    <!-- bootstrap-css -->
    <link rel="stylesheet" href="css/bootstrap.min.css" >
    <!-- //bootstrap-css -->
    <!-- Custom CSS -->
    <script src="js/admin.js"></script>
    <link href="css/style.css" rel='stylesheet' type='text/css' />
    <link href="css/style-responsive.css" rel="stylesheet"/>
    <!-- font CSS -->
    <link href='//fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
    <!-- font-awesome icons -->
    <link rel="stylesheet" href="css/font.css" type="text/css"/>
    <link href="css/font-awesome.css" rel="stylesheet">
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="dist/jquery.validate.js"></script>
</head>
<body>
<div class="log-w3">
    <div class="w3layouts-main">
        <h2 style="color: white">Set New Password</h2>
        <form id="set_password_form">
            <input type="hidden" name="email" id="email" value="<?php echo $_REQUEST['q'] ?>">
            <div class="form-group">
                <label>New Password</label>
                <input type="password" data-rule-required="true" minlength="8" name="new_pass" id="new_pass" class="form-control">
            </div>
            <div class="form-group">
                <label>Confirm Password</label>
                <input type="password" data-rule-required="true" data-rule-equalto="#new_pass" data-msg-equalto="password and confirm-password does'not match" name="confirmpassword" id="confirmpassword" class="form-control">
            </div>
            <div class="form-group">
                <input type="button" id="btsetpass" onclick="set_new_password()" class="btn btn-primary btn-success" value="Set Password">
            </div>
            <h3 id="sp1"></h3>
        </form>
    </div>
</div>
<script src="js/bootstrap.js"></script>
<script src="js/jquery.dcjqaccordion.2.7.js"></script>
<script src="js/scripts.js"></script>
<script src="js/jquery.slimscroll.js"></script>
<script src="js/jquery.nicescroll.js"></script>
<!--[if lte IE 8]><script language="javascript" type="text/javascript" src="js/flot-chart/excanvas.min.js"></script><![endif]-->
<script src="js/jquery.scrollTo.js"></script>
</body>
</html>
