<?php
session_start();
if(isset($_SESSION['admin']))
{


    header('location:view_admin.php');
}

?>
<!DOCTYPE html>
<head>
    <title>Forgot</title>
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
        <h2 style="color: white">Forget Password</h2>
        <form id="forget_password_form" class="form-group" method="post">
            <div >


                <label  for="email">Email</label>
                <br>

                <input data-rule-required="true" data-msg-required="Please Enter Email" class="form-control" type="email"
                       name="email" id="email">
                <br>
            </div>
            <div >
                <input type="hidden" value="<?php echo $_REQUEST['type']?>" id="type">
                <input type="button" id="btn_forget" onclick="forget_password()" class="btn   btn-primary col-lg-offset-1 "
                       value="Next">
                <a href="admin_login.php">
                    <h1 class="btn btn-danger  col-lg-offset-1">Cancel</h1>
                </a>
                <br>
                <br>
                <b><h4  id="sp1"></h4></b>
            </div>
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
