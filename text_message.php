<?php

include 'connection.php';
include 'session_check.php';
$query_country = "select * from visa_countries";
$result_country = mysqli_query($conn, $query_country);

$query_visa = "select * from visa_styles";
$result_visa = mysqli_query($conn, $query_visa);

include "upper_header.php";
?>
<body>


<!--sidebar end-->
<!--main content start-->
<section id="main-content">
    <section class="wrapper">
        <div class="table-agile-info ">
            <div class="panel panel-default">

                <div class="panel-heading">
                    Message Console
                </div>

            </div>

            <form id="message_form">
                <div class="row col-lg-4 col-md-4 col-sm-4 col-xs-4">
                    <div class="form-group">

                        <label>Email-Id</label>
                        <input data-rule-required="true" class="form-control " name="email" id="email" type="email"
                               value="<?php echo $_REQUEST['id'] ?>" readonly>

                    </div>
                    <div class="form-group">

                        <label>Mobile</label>
                        <input data-rule-required="true" class="form-control " name="mobile" id="mobile" type="number"
                               minlength="10" maxlength="10" value="<?php echo $_REQUEST['mobile'] ?>" readonly>

                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4"
                <div class="form-group">

                    <label>Subject </label>
                    <input class="form-control" data-rule-required="true" name='subject' id='subject' type="text"
                           placeholder="Subject ">

                </div>
                <br>
                <br>
                <br>
                <br>
                <div class="form-group col-lg-7 col-md-7 col-sm-7 col-xs-7">


                    <textarea cols="100" class="form-control  " data-rule-required="true" name="message" id="message"
                              placeholder="Message"></textarea>

                </div>
                <br>
                <br>
                <br>
                <br>
                <input type="button" value="Send" class="btn btn-danger" onclick="send_message()">
                <a href="text.php"><input type="button" value="Cancel" class="btn btn-danger"></a>

            </form>

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
