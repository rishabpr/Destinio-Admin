<?php
include 'session_check.php';
include 'connection.php';
$query_msg="select * from visa_contacts ";
$c=0;
$result_msg=mysqli_query($conn,$query_msg);
while($row_msg=mysqli_fetch_array($result_msg))
{
    $c=$c+1;
}
$query_country="select * from visa_countries";
$result_country=mysqli_query($conn,$query_country);
include "upper_header.php";
?>
<body onload="view_visa_type('')">
    <!--sidebar end-->
    <!--main content start-->
    <section id="main-content" >
        <section class="wrapper">
            <div class="table-agile-info">
                <div class="panel panel-default">
                    <div class="panel-heading">
                      Visa Type List
                    </div>

                    <?php
                    echo " <label>Country Name</label>";
                    $select = "<select   onchange='view_visa_type(this.value);' id='country_filter' data-rule-required='true'  name='country_filter' class=' form-control'>";
                    $select .= "<option value=''>Select Country</option>";
                    while ($row_country1 = mysqli_fetch_array($result_country)) {
                        $select .= '<option    value="' . $row_country1['id'] . '">(+' . $row_country1['country_code'] . ') ' . $row_country1['country_name'] . '</option>';
                    }
                    $select .= "</select>";
                    echo $select;
                    ?>
                    <br>
                    <br>

                    <span id="sp2"></span>
                </div>

                    <button data-toggle="modal" class="btn btn-danger" data-target="#myModal">Add More</button>
                <a onclick="return confirm('Are You Sure Want to delete?')" href="delete_all.php?table=visa_styles&page=view_visa_type.php"><button  class="btn btn-danger" >Delete All</button></a>

                </div>

            </div>


            <div class="container">
                <form id="add_visa_form" method="get">
                    <!-- Modal -->
                    <div id="myModal" class="modal fade" role="dialog">
                        <div class="modal-dialog">

                            <!-- Modal content-->
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h4 class="modal-title">ADD VISA</h4>
                                </div>
                                <div class="modal-body">

                                    <div class="form-group">
                                        <label>Country</label>
                                        <?php
                                        $query_country="select * from visa_countries";
                                        $result_country=mysqli_query($conn,$query_country);
                                        $select = "<select id='country' class=' form-control' data-rule-required='true'>";
                                        $select .= "<option value=''>Select Country</option>";
                                        while ($row_country = mysqli_fetch_array($result_country)) {
                                            $select .= '<option value="' . $row_country['id'] . '">' . $row_country['country_name'] . '</option>';
                                        }
                                        $select .= "</select>";
                                        echo $select;
                                        ?>

                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Visa Type</label>
                                        <input type="text" name="visa_type" class="form-control"
                                               data-rule-required="true" id="visa_type"></input>
                                    </div>

                                    <div class="form-group">
                                        <label>Description</label>
                                        <textarea name="description" class="form-control" data-rule-required="true"
                                                  id="description"></textarea>
                                    </div>

                                    <div class="form-group">
                                        <input type="button" value="Add Visa" onclick="add_visa()" id="btn_submit"
                                               class="btn btn-primary btn-success">
                                    </div>
                                    <label class="alert-info" id="sp1"></label>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close
                                    </button>
                                </div>

                            </div>
                        </div>
                    </div>
                </form>
                <h3 id="span_error_visa" ><?php if($_REQUEST['message']=='')
                    {}else{ echo $_REQUEST['message'];
                        echo "<script>spcl_event()</script>";}?></h3>

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
