<?php

include 'connection.php';
include 'session_check.php';

$query_country="select * from visa_countries";
$result_country=mysqli_query($conn,$query_country);
include "upper_header.php";
?>
<body onload="view_user_documents1('','')">    <!--sidebar end-->
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
                    $select = "<select   onchange='val_reset();visa_user_document(this.value);' id='country_filter' data-rule-required='true'  name='country_filter' class=' form-control'>";
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

                </thead>
                <tbody>
                <div class="table-responsive">
                <span id="sp2"></span>
                </div>
                </tbody>
                </table>
            </div>

        </div>
        </div>



    </section>

</section>

</section>

<div id="myModal" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Reject Docments</h4>
            </div>
            <div class="modal-body">
               <form  id="reason_form">
                <input  class="form-control"  type="text" name="reason" id="reason" placeholder='Reason of Rejection' required><br>

                <input type="button" onclick="send_reason()" class="btn btn-default" value="Submit" >
               </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>


            </div>
        </div>

    </div>
</div>
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
