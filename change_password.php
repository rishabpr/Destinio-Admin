<?php

include 'connection.php';
include 'session_check.php';

include "upper_header.php";
?>

<body>
    <!--sidebar end-->
    <!--main content start-->
    <section id="main-content" >
        <section class="wrapper">

            <div class="table-agile-info">
                <div class="panel-heading">
                    Change Password
                </div>
                <div class="panel panel-default">

                    <form id="change_password_form">
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" data-rule-required="true" value="<?php   echo  $_SESSION['admin'];?>" name="email" id="email" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Old Password</label>
                            <input type="password" data-rule-required="true" minlength="8" name="password" id="password" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>New Password</label>
                            <input type="password" data-rule-required="true" minlength="8" name="newpassword" id="newpassword" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Confirm Password</label>
                            <input type="password" data-rule-required="true" minlength="8" data-rule-equalto="#newpassword" data-msg-equalto="password and confirm-password does'not match" name="confirmpassword" id="confirmpassword" class="form-control">
                        </div>
                        <div class="form-group">
                            <input type="button" id="btpass" onclick="change_password()" class="btn btn-primary btn-success" value="Change Password">
                        </div>
                        <span id="sp1"></span>
                    </form>

                </div>
            </div>
            </div>




        </section>

    </section>

</section>
<script src="js/bootstrap.js"></script>
<script src="js/jquery.dcjqaccordion.2.7.js"></script>
<script src="js/scripts.js"></script>
<script src="js/jquery.slimscroll.js"></script>
<script src="js/jquery.nicescroll.js"></script>
<!--[if lte IE 8]><script language="javascript" type="text/javascript" src="js/flot-chart/excanvas.min.js"></script><![endif]-->
<script src="js/jquery.scrollTo.js"></script>
</body>
</html>
