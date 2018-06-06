<?php
session_start();
if (isset($_SESSION['admin'])) {


    header('location:view_admin.php');
}

?>
<!DOCTYPE html>
<head>

    <title>Login Page</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="keywords" content="Visitors Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template,
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design"/>
    <script type="application/x-javascript"> addEventListener("load", function () {
            setTimeout(hideURLbar, 0);
        }, false);

        function hideURLbar() {
            window.scrollTo(0, 1);
        } </script>
    <!-- bootstrap-css -->
    <link rel="stylesheet" href="css/bootstrap.min.css">

    <script src="js/admin.js"></script>
    <link href="css/style.css" rel='stylesheet' type='text/css'/>
    <link href="css/style-responsive.css" rel="stylesheet"/>
    <!-- font CSS -->
    <link href='//fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900,900italic'
          rel='stylesheet' type='text/css'>
    <!-- font-awesome icons -->
    <link rel="stylesheet" href="css/font.css" type="text/css"/>
    <link href="css/font-awesome.css" rel="stylesheet">
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="dist/jquery.validate.js"></script>
</head>
<body>
<div class="log-w3">
    <div class="w3layouts-main">
        <h2 style="color: white">Sign In Now</h2>
        <form id="admin_login_form" class="form-group" method="post">
            <div class=" ">

                <label for="email">Email</label>
                <input data-rule-required="true" data-msg-required="Please Enter Email" class="form-control"
                       type="email"
                       name="email" id="email">
                <br>
            </div>
            <div class="">
                <label for="pass">Password</label>
                <input class="form-control" type="password" minlength="6" name="pass" id="pass"
                       data-rule-required="true">
            </div>
            <br>


            <div class="">
                <br>
                <input type="button" id="btn_login" onclick="admin_login()" class="btn btn-primary  "
                       value="Login">
                <a href="">
                    <button class="btn btn-danger ">Cancel</button>
                </a>
                <br>
                <br>
                <div class="col-lg-0">
                    <a href="forget_password.php"> <h4 id="forget_password">Forgot Password?</h4></a>
                </div>

                <br>
                <br>
                <b><h5 id="sp1"></h5></b>
            </div>
        </form>
    </div>
</div>
<script src="js/bootstrap.js"></script>
<script src="js/jquery.dcjqaccordion.2.7.js"></script>
<script src="js/scripts.js"></script>
<script src="js/jquery.slimscroll.js"></script>
<script src="js/jquery.nicescroll.js"></script>
<!--[if lte IE 8]>
<script language="javascript" type="text/javascript" src="js/flot-chart/excanvas.min.js"></script><![endif]-->
<script src="js/jquery.scrollTo.js"></script>
</body>
</html>
