
<?php

include 'connection.php';
include 'session_check.php';
include "upper_header.php";

$query="select * from visa_news where id=".$_REQUEST['id'];

$result=mysqli_query($conn,$query);
$row=mysqli_fetch_array($result);
$query_msg="select * from visa_contacts where status_read='1' ";
$c=0;
$result_msg=mysqli_query($conn,$query_msg);
while($row_msg=mysqli_fetch_array($result_msg))
{
    $c=$c+1;
}

?>
<body>
   <!--sidebar end-->
    <!--main content start-->
    <section id="main-content" >
        <section class="wrapper">
            <div class="table-agile-info">
                <div class="panel panel-default">

                    <center><h2>Update News</h2></center>
                    <form  id="update_form">
                        <div class="form-group">
                            ID
                            <input type="text" value="<?php echo($row["id"]); ?>" readonly id="id" class="form-control">
                        </div>
                        <div class="form-group">
                            Caption
                            <input data-rule-required="true" type="text"  name="caption"  value="<?php echo( $row["caption"] );?>" id="caption" class=" form-control">
                        </div>

                        <div class="form-group">
                            Description
                            <textarea   data-rule-required="true"  name="description" id="description" class=" form-control"><?php echo( $row["description"] );?></textarea>

                        </div>
                        <div class="form-group">
                            <input type="button" value="Update"  onclick="update_news()" id="btn_submit" class="btn btn-primary btn-success">
                        </div>
                    <form>
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
