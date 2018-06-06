
<?php

include 'connection.php';
include 'session_check.php';
include "upper_header.php";
$query="select * from visa_styles where id=".$_REQUEST['id'];
$result=mysqli_query($conn,$query);
$row=mysqli_fetch_array($result);


?>
<body >

    <!--sidebar end-->
    <!--main content start-->
    <section id="main-content" >
        <section class="wrapper">
            <div class="table-agile-info">
                <div class="panel panel-default">

                    <center><h2>Update Visa Type</h2></center>
                    <form  id="update_form">
                        <div class="form-group">
                            ID
                            <input type="text" value="<?php echo($row["id"]); ?>" readonly id="id" class="form-control">
                        </div>
                        <div class="form-group">
                            Type
                            <input type="text" name="type"   data-rule-required="true"  value="<?php echo( $row["visa_type"] );?>" id="type" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Country</label>
                            <?php
                            $select = "<select id='country' data-rule-required='true' name='country' class=' form-control'>";
                            $select .= "<option value=''>Select Country</option>";
                            $q="select * from visa_countries";
                            $result=mysqli_query($conn,$q);
                            while ($rs = mysqli_fetch_array($result)) {

                                if($row['country_id']==$rs['id'])
                                {
                                    $select .= "<option  selected value='" . $rs['id'] ."'>" . $rs['country_name'] . "</option>";
                                }
                                else {
                                    $select .= "<option value='" . $rs['id'] . "'>" . $rs['country_name'] . "</option>";
                                }
                            }
                            $select .= "</select>";
                            echo $select;
                            ?>

                            </select>
                        </div>

                        <div class="form-group">
                            Description
                            <input type="text"   data-rule-required="true" name="description"  value="<?php echo( $row["description"] );?>" id="description" class="form-control">
                        </div>
                        <div class="form-group">
                            <input type="button" value="Update"  onclick="update_visa_type()" id="btn_news" class="btn btn-primary btn-success">
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
<script language="javascript" type="text/javascript" src="js/flot-chart/excanvas.min.js"></script>
<script src="js/jquery.scrollTo.js"></script>
</body>
</html>
