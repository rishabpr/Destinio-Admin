<?php

include 'connection.php';
include 'session_check.php';

$query_msg="select * from visa_contacts where status_read='1'";
$c=0;
$result_msg=mysqli_query($conn,$query_msg);
while($row_msg=mysqli_fetch_array($result_msg))
{
    $c=$c+1;
}
include "upper_header.php";
?>
<body onload="view_admin()">
    <!--sidebar end-->
    <!--main content start-->
    <section id="main-content" >
        <section class="wrapper">
            <div class="table-agile-info">
                <div class="panel panel-default table-responsive">
                    <div class="panel-heading table-responsive">
                         Admin List
                    </div>
                    <div>

                                    <span  id="sp2"></span>
                    <button  data-toggle="modal" class="btn btn-danger" data-target="#myModal">Add More</button>
                        <a onclick="return confirm('Are You Sure Want to delete?')" href="delete_all.php?table=visa_admin&page=view_admin.php"><button  class="btn btn-danger" >Delete All</button></a>
                    </div>

                </div>
            </div>


            <div class="container">

                <form id="add_admin_form" method="get">
                    <!-- Modal -->
                    <div id="myModal" class="modal fade" role="dialog">
                        <div class="modal-dialog">

                            <!-- Modal content-->
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h4 class="modal-title">ADD ADMIN</h4>
                                </div>
                                <div class="modal-body">

                                    <div class="form-group">
                                        <label>Enter Email</label>
                                        <input type="email" data-rule-required="true"  required name="email" id="email" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label>Enter Password</label>
                                        <input type="password" data-rule-required="true" minlength="8" name="password" id="password"
                                               class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label>Confirm-Password</label>
                                        <input type="password" data-rule-required="true" data-rule-equalto="#password"
                                               data-msg-equalto="password and confirm-password does'not match"
                                               name="confirmpassword" id="confirmpassword" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label>Mobile Number</label>
                                        <input type="text" data-rule-required="true" data-rule-number="true" minlength="10"
                                               maxlength="10" name="number" id="number" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label>Enter Type</label>
                                        <select name="type" data-rule-required="true" id="type" class="form-control">
                                            <option value="">Select Type</option>
                                            <option>Admin</option>
                                            <option>Limited user</option>
                                            <option>Users</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <input type="button" value="SUBMIT"  onclick="add_admin()" id="btn_submit" class="btn btn-primary btn-success">
                                    </div>
                                    <label class="alert-info" id="sp1" ></label>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>

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
