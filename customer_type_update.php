<?php

include 'connection.php';
include 'session_check.php';

$query_customer = "select * from visa_customers where customer_id=" . $_REQUEST['id'];

$result_customer = mysqli_query($conn, $query_customer);
$row_customer = mysqli_fetch_array($result_customer);

$query_msg = "select * from visa_contacts ";
$c = 0;
$result_msg = mysqli_query($conn, $query_msg);
while ($row_msg = mysqli_fetch_array($result_msg)) {
    $c = $c + 1;
}

$query_country = "select * from visa_countries";
$result_country = mysqli_query($conn, $query_country);

$query_visa = "select * from visa_styles ";
$result_visa = mysqli_query($conn, $query_visa);

include "upper_header.php";
?>

<body>

<!--sidebar end-->
<!--main content start-->
<section id="main-content">
    <section class="wrapper">
        <div class="table-agile-info">
            <div class="panel panel-default">

                <center><h2>Customer Update</h2></center>

                <form id="update_customer_form">
                    <div class="form-group">
                        Customer-ID
                        <input type="text" value="<?php echo($row_customer["customer_id"]); ?>" readonly
                               id="customer_id" name="customer_id" class="form-control">
                    </div>
                    <div class="form-group">
                        Customer Name
                        <input type="text" data-rule-required="true"
                               value="<?php echo($row_customer["customer_name"]); ?>" id="customer_name"
                               name="customer_name" class="form-control">
                    </div>
                    <div class="form-group">
                        Address
                        <input type="text" data-rule-required="true" value="<?php echo($row_customer["address"]); ?>"
                               id="address" name="address" class="form-control">
                    </div>

                    <div class="form-group">
                        Passport Number
                        <input type="text" data-rule-required="true" minlength="8" maxlength="8"
                               value="<?php echo($row_customer["passport_number"]); ?>" id="passport_number"
                               name="passport_number" class="form-control">
                    </div>
                    <div class="form-group">
                        Email
                        <input type="text" data-rule-required="true"
                               value="<?php echo($row_customer["customer_email"]); ?>" id="customer_email"
                               name="customer_email" class="form-control">
                    </div>

                    <div class="form-group">
                        Password
                        <input type="password" data-rule-required="true"
                               value="<?php echo($row_customer["customer_password"]); ?>" id="customer_password"
                               name="customer_password" class="form-control">
                    </div>
                    <div class="form-group">
                        Confirm Password
                        <input type="password" data-rule-required="true" data-rule-equalto="#customer_password"
                               data-msg-equalto="password and confirm-password does'not match"
                               value="<?php echo($row_customer["customer_password"]); ?>" id="confirm_password"
                               name="confirm_password" class="form-control">
                    </div>

                    <div class="form-group">
                        Mobile
                        <input type="text" data-rule-required="true" data-rule-number="true"
                               value="<?php echo($row_customer["mobile"]); ?>" id="mobile"
                               name="mobile" class="form-control" minlength="10" maxlength="10">
                    </div>

                    <div class="form-group">
                        Country
                        <?php
                        $select = "<select id='country_id' data-rule-required='true' name='country_id' class=' form-control'>";
                        $select .= "<option value=''>Select Country</option>";
                        while ($row_country = mysqli_fetch_array($result_country)) {

                            if ($row_country['id'] == $row_customer['country_id']) {
                                $select .= '<option  value="' . $row_country['id'] . '"selected >' . $row_country['country_name'] . '</option>';
                            } else {
                                $select .= '<option  value="' . $row_country['id'] . '">' . $row_country['country_name'] . '</option>';
                            }
                        }
                        $select .= "</select>";
                        echo $select;
                        ?>

                    </div>
                    <div class="form-group">
                        Visa
                        <?php
                        $select = "<select id='visa_type_id' data-rule-required='true' name='visa_type_id' class=' form-control'>";
                        $select .= "<option value=''>Select Visa</option>";
                        while ($row_visa = mysqli_fetch_array($result_visa)) {
                            if ($row_visa['id'] == $row_customer['visa_type_id']) {
                                $select .= '<option value="' . $row_visa['id'] . '" selected>' . $row_visa['visa_type'] . '</option>';
                            } else {
                                $select .= '<option value="' . $row_visa['id'] . '">' . $row_visa['visa_type'] . '</option>';
                            }
                        }
                        $select .= "</select>";
                        echo $select;
                        ?>

                    </div>
                    <div class="form-group">
                     <a href="<?php echo($row_customer['photo']); ?>" target="_blank">  <img  style="height: 80px;width: 80px;" src="<?php echo($row_customer['photo']); ?>"></a>
                         <input type="file" value="<?php echo($row_customer['photo']); ?>" id="photo" name="photo">
                    </div>

                    <div class="form-group">
                        <input type="button" value="Update" onclick="update_customer()" id="btn_news"
                               class="btn btn-primary btn-success">
                    </div>
                </form>
                <span id="sp1">
    </span>
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
