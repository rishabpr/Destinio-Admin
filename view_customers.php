<?php

include 'connection.php';
include 'session_check.php';
$query_country = "select * from visa_countries";
$result_country = mysqli_query($conn, $query_country);

$query_visa = "select * from visa_styles";
$result_visa = mysqli_query($conn, $query_visa);

include "upper_header.php";
?>
<body onload="view_customers('','')">


<!--sidebar end-->
<!--main content start-->
<section id="main-content">
    <section class="wrapper">
        <div class="table-agile-info ">
            <div class="panel panel-default">

                <div class="panel-heading">
                    Customers List
                </div>
                <div class="col-lg-4 col-sm-4 col-xs-4">

                    <?php
                    echo " <label>Country Name</label>";
                    $select = "<select   onchange='val_reset();visa_country(this.value);' id='country_filter' data-rule-required='true'  name='country_filter' class=' form-control'>";
                    $select .= "<option value=''>Select Country</option>";
                    while ($row_country1 = mysqli_fetch_array($result_country)) {
                        $select .= '<option    value="' . $row_country1['id'] . '">(+' . $row_country1['country_code'] . ') ' . $row_country1['country_name'] . '</option>';
                    }
                    $select .= "</select>";
                    echo $select;
                    ?>
                </div>

                <div class="col-lg-4 col-sm-4 col-xs-4">

                   <span id='select'></span>

                </div>
                <br>
                <br>
                <br>
                <br>

<div class="table-responsive">
                    <span id="sp2"></span>
</div>
                <br>
                <br>
                    <button data-toggle="modal" class="  btn btn-danger" data-target="#myModal">Add More</button>
                <a onclick="return confirm('Are You Sure Want to delete?')" href="delete_all.php?table=visa_customers&page=view_customers.php"><button  class="btn btn-danger" >Delete All</button></a>

            </div>
        </div>


        <div class="container">
            <form id="add_customer_form" method="get" enctype="multipart/form-data">
                <!-- Modal -->
                <div id="myModal" class="modal fade" role="dialog">
                    <div class="modal-dialog">

                        <!-- Modal content-->
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title">Add Customer</h4>
                            </div>
                            <div class="modal-body">
                                <div class="form-group">
                                    <label> Customer Name</label>
                                    <input type="text" data-rule-required="true" name="customer_name" id="customer_name"
                                           class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Address</label>
                                    <textarea name="address" class="form-control" data-rule-required="true"
                                              id="address"></textarea>
                                </div>
                                <div class="form-group">
                                    <label> Passport Number</label>
                                    <input type="text" data-rule-required="true" minlength="8" maxlength="8"
                                           name="passport_number" id="passport_number" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label> Email ID</label>
                                    <input type="email" data-rule-required="true" name="customer_email"
                                           id="customer_email" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label> Password</label>
                                    <input type="password" data-rule-required="true" minlength="8"
                                           name="customer_password" id="customer_password" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label> Confirm Password</label>
                                    <input type="password" data-rule-required="true"
                                           data-rule-equalto="#customer_password"
                                           data-msg-equalto="password and confirm-password does'not match"
                                           name="confirm_password" id="confirm_password" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Mobile</label>
                                    <input type="password" data-rule-required="true"
                                          name="mobile" id="mobile" minlength="10" maxlength="10" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Country Name</label>
                                    <?php
                                    $query_country = "select * from visa_countries";
                                    $result_country = mysqli_query($conn, $query_country);

                                    $select = "<select id='country_id' data-rule-required='true'  name='country_id' class=' form-control'>";
                                    $select .= "<option value='Select Country'>Select Country</option>";
                                    while ($row_country = mysqli_fetch_array($result_country)) {
                                        $select .= '<option value="' . $row_country['id'] . '">(+' . $row_country['country_code'] . ') ' . $row_country['country_name'] . '</option>';
                                    }
                                    $select .= "</select>";
                                    echo $select;
                                    ?>

                                </div>
                                <div class="form-group">
                                    <label>VISA_TYPE ID</label>
                                    <?php
                                    $select = "<select id='visa_type_id' data-rule-required='true' name='visa_type_id' class=' form-control'>";
                                    $select .= "<option value='Select Visa'>Select Visa</option>";
                                    while ($row_visa = mysqli_fetch_array($result_visa)) {

                                        $select .= '<option value="' . $row_visa['id'] . '">' . $row_visa['visa_type'] . '</option>';
                                    }
                                    $select .= "</select>";
                                    echo $select;
                                    ?>

                                </div>

                                <div class="form-group">
                                    <label>Photo</label>
                                    <input type="file" data-rule-required="true" name="photo" id="photo"
                                           class="form-control">
                                </div>
                                <div class="form-group">
                                    <input type="button" value="Submit" onclick="add_customer()" id="btn_submit"
                                           class="btn btn-primary btn-success">
                                </div>
                                <label class="alert-info" id="sp1"></label>
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
<!--[if lte IE 8]>
<script language="javascript" type="text/javascript" src="js/flot-chart/excanvas.min.js"></script><![endif]-->
<script src="js/jquery.scrollTo.js"></script>
</body>
</html>
