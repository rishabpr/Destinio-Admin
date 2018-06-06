
<?php

include 'connection.php';
include 'session_check.php';

include "upper_header.php";
$query="select * from visa_admin where email='".$_REQUEST['email']."'";
$result=mysqli_query($conn,$query);
$row=mysqli_fetch_array($result);

?>
<body>
    <!--sidebar end-->
    <!--main content start-->
 <span  id="sp2"></span>
    <section id="main-content" >
        <section class="wrapper">
            <div class="table-agile-info">
                <div class="panel panel-default">

                    <center><h2>Update Admin</h2></center>
                    <form  id="update_form">
                        <div class="form-group">
                            Email-ID
                                <?php
                                ?>
                                <input type="text" value="<?php echo($row['email']); ?>" readonly id="email" class="form-control">
                        </div>
                        <div class="form-group">
                            Mobile Number
                            <input type="text"   minlength="10" maxlength="10" data-rule-required="true" data-rule-number="true" value="<?php echo( $row["mobile_num"] );?>" id="number" name="number" class="form-control">
                        </div>
                        <div class="form-group">
                            Type
                            <select id="type"  name="type" class="form-control" data-rule-required="true">
                                <option value="">Select type</option>
                                <option <?php if($row["type"]=='Admin') {    ?>selected<?php  } ?>>Admin</option>
                                <option <?php if($row["type"]=='Limited user') {    ?>selected<?php  } ?>>Limited user</option>
                                <option <?php if($row ["type"]=='Users') {    ?>selected<?php  } ?>>Users</option>
                            </select>

                        </div>
                        <div class="form-group">
                            <input type="button" value="Update"  onclick="update_admin()" id="btn_submit" class="btn btn-primary btn-success">
                        </div>
                    </form>
                    <span id="sp1">  </span>
                </div>
            </div>
            </div>

        </section>

    </section>

</section>

</body>
</html>
<script src="js/bootstrap.js"></script>
<script src="js/jquery.dcjqaccordion.2.7.js"></script>
<script src="js/scripts.js"></script>
<script src="js/jquery.slimscroll.js"></script>
<script src="js/jquery.nicescroll.js"></script>
<!--[if lte IE 8]><script language="javascript" type="text/javascript" src="js/flot-chart/excanvas.min.js"></script><![endif]-->
<script src="js/jquery.scrollTo.js"></script>