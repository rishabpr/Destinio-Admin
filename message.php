<?php
include "connection.php";
include 'session_check.php';
$update = "update visa_contacts set status_read='0' where  sr_no=" . $_REQUEST["id"];
$result_update = mysqli_query($conn, $update);


$get = "select * from visa_contacts where  sr_no=" . $_REQUEST["id"];
$result = mysqli_query($conn, $get);
$row = mysqli_fetch_array($result);
include "upper_header.php";
?>
<script src="js/admin.js"></script>
<body></body>
<!--sidebar end-->
<!--main content start-->
<section id="main-content">
    <section class="wrapper">

        <div class="table-agile-info">


            <div class="panel panel-default">
                <div class="panel-heading">
                    Message
                </div>
                <div>
                    <br>
                </div>
                <div class="container">


                    <form action="#" method="post" class="form-group">
                        <div class="col-md-4 col-xs-4 wthree_contact_left_grid form-group col-md-offset-1 col-xs-offset-1">
                            <label>Name</label>
                            <input type="text" name="name" id="name" placeholder="Name" class="form-control"
                                   value="<?php echo $row[1]; ?>" readonly>
                        </div>
                        <div class="col-md-4 col-xs-4 wthree_contact_left_grid form-group ">
                            <label>Email</label>
                            <input type="email" name="email" placeholder="Email" id="email" class="form-control"
                                   value="<?php echo $row[2]; ?>" readonly>
                        </div>
                        <div class="col-md-4 col-xs-4 wthree_contact_left_grid form-group col-md-offset-1 col-xs-offset-1">
                            <label>Mobile</label>
                            <input type="text" name="mobile_num" placeholder="Mobile Number" id="mobile_num"
                                   class="form-control" readonly value="<?php echo $row[3]; ?>">
                        </div>
                        <div class="col-md-4 col-xs-4 wthree_contact_left_grid form-group">
                            <label>Subject</label>
                            <input type="text" class="form-control" name="subject" placeholder="Subject" id="subject"
                                   required="" readonly value="<?php echo $row[4]; ?>">
                        </div>
                        <div class=" clearfix form-group col-md-6 col-xs-6 col-md-offset-1 col-xs-offset-1">
                            <label>Message</label>
                            <textarea name="message" placeholder="Message..." class="form-control" required=""
                                      id="message" readonly><?php echo $row[5]; ?></textarea>
                        </div>
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
<!--[if lte IE 8]>
<script language="javascript" type="text/javascript" src="js/flot-chart/excanvas.min.js"></script><![endif]-->
<script src="js/jquery.scrollTo.js"></script>
</body>
</html>


<div class="contact" id="contact">
    <div class="container">


    </div>
</div>

