
<?php

include 'connection.php';
include 'session_check.php';

$query_country="select * from visa_countries ";
$result_country=mysqli_query($conn,$query_country);


$query_document="select * from visa_documents where id=".$_REQUEST['id'];
$result_document=mysqli_query($conn,$query_document);
$row_document=mysqli_fetch_array($result_document);


$query_visa="select * from visa_styles";
$result_visa=mysqli_query($conn,$query_visa);

include  "upper_header.php";


?>
<body>
    <!--sidebar end-->
    <!--main content start-->
    <section id="main-content" >
        <section class="wrapper">
            <div class="table-agile-info">
                <div class="panel panel-default">

                    <center><h2>Update Document Entry</h2></center>
                    <form  id="update_document_form">
                        <div class="form-group">
                            ID
                            <input type="text" value="<?php echo($row_document["id"]); ?>" readonly id="id" name="id" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Country Name</label>
                            <?php

                            $select="<select id='country_name'  data-rule-required='true' name='country_name' class=' form-control'>";
                            $select.="<option value=''>Select country</option>";
                            while($row_country=mysqli_fetch_array($result_country)){

                                if($row_country['id']==$row_document['country_id'])
                                {

                                    $select .= '<option value="' . $row_country['id'] . '" selected>' . $row_country['country_name'] . '</option>';
                                }
                                else {
                                    $select .= '<option value="' . $row_country['id'] . '">' . $row_country['country_name'] . '</option>';
                                }
                            }
                            $select.="</select>";
                            echo $select;
                            ?>

                        </div>
                        <div class="form-group">
                            Visa Type
                            <?php
                            $select="<select id='visa_type'  data-rule-required='true' name='visa_type' class=' form-control'>";
                            $select.="<option value=''>Select Visa</option>";
                            while($row_visa=mysqli_fetch_array($result_visa)){

                               if($row_visa['id']==$row_document['visa_type'])
                                {

                                    $select .= '<option value="' . $row_visa['id'] . '" selected>' . $row_visa['visa_type'] . '</option>';
                                }
                               else {
                                    $select .= '<option value="' . $row_visa['id'] . '">' . $row_visa['visa_type'] . '</option>';
                                }
                            }
                            $select.="</select>";
                            echo $select;
                            ?>
                           </div>

                        <div class="form-group">
                            Document Name
                            <input type="text"   data-rule-required="true"  value="<?php echo( $row_document["document_name"] );?>" id="document_name" name="document_name" class="form-control">
                        </div>
                        <div class="form-group">
                            Document File
                            <input type="file"     value="<?php echo( $row_document["document_file"] );?>" id="document_file" name="document_file" class="form-control">
                        </div>
                        <div class="form-group">
                            Description
                            <input type="text"   data-rule-required="true"  value="<?php echo( $row_document["description"] );?>" id="description" name="description" class="form-control">
                        </div>
                        <div class="form-group">
                            <input type="button" value="Update"  onclick="update_document()" id="btn_news" class="btn btn-primary btn-success">
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
<!--[if lte IE 8]><script language="javascript" type="text/javascript" src="js/flot-chart/excanvas.min.js"></script><![endif]-->
<script src="js/jquery.scrollTo.js"></script>
</body>
</html>
