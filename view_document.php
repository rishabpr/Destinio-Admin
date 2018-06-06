<?php

include 'connection.php';
include 'session_check.php';

$query_country = "select * from visa_countries";
$result_country = mysqli_query($conn, $query_country);
$query_visa = "select * from visa_styles ";
$result_visa = mysqli_query($conn, $query_visa);


include "upper_header.php";
?>
<body onload="view_documents('','')">
<!--sidebar end-->
<!--main content start-->
<section id="main-content">
    <section class="wrapper">
        <div class="table-agile-info">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Documents List
                </div>
                <div class="col-lg-4 col-sm-4 col-xs-4">

                    <?php
                    echo " <label>Country Name</label>";
                    $select = "<select   onchange='val_reset();visa_document(this.value);' id='country_filter' data-rule-required='true'  name='country_filter' class=' form-control'>";
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
            <div class="table-responsive">
                <span id="sp2"></span>
            </div>
                <button data-toggle="modal" class="btn btn-danger" data-target="#myModal">Add More</button>
                <a onclick="return confirm('Are You Sure Want to delete?')" href="delete_all.php?table=visa_documents&page=view_document.php"><button  class="btn btn-danger" >Delete All</button></a>
                <!--<button data-toggle="modal" data-target="#myModal" class="btn btn-danger">Add More</button>-->

            </div>
        </div>


        <span id="sp2"></span>
        <h3 id="error_message"></h3>
        <div class="container">
            <form id="add_document_form" method="get" enctype="multipart/form-data">
                <!-- Modal -->
                <div id="myModal" class="modal fade" role="dialog">
                    <div class="modal-dialog">

                        <!-- Modal content-->
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title">Document Checklist</h4>
                            </div>
                            <div class="modal-body">

                                <div class="form-group">
                                    <label>Country Name</label>
                                    <?php
                                    $query_country = "select * from visa_countries";
                                    $result_country = mysqli_query($conn, $query_country);

                                    $select = "<select id='country_name'  onchange='val_set();visa_document(this.value)'  data-rule-required='true' name='country_name' class=' form-control'>";
                                    $select .= "<option value=''>Select Country</option>";
                                    while ($row_country = mysqli_fetch_array($result_country)) {
                                        $select .= '<option value="' . $row_country['id'] . '">' . $row_country['country_name'] . '</option>';
                                    }
                                    $select .= "</select>";
                                    echo $select;
                                    ?>

                                </div>
                                <div class="form-group">

                                    <span id="select1"></span>


                                </div>
                                <div class="form-group">
                                    <label>Document Name</label>
                                    <input type="text" data-rule-required="true" name="document_name" id="document_name"
                                           class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Document Upload</label>
                                    <input type="file" data-rule-required="true" name="document_file" id="document_file"
                                           class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Description</label>
                                    <input type="text" data-rule-required="true" name="description" id="description"
                                           class="form-control">
                                </div>
                                <div class="form-group">
                                    <input type="button" value="Submit" onclick="add_document()" id="btn_submit"
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
