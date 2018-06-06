
<?php

include 'session_check.php';
include 'connection.php';

include "upper_header.php";

$query="select * from visa_countries where id=".$_REQUEST['id'];
$result=mysqli_query($conn,$query);
$row=mysqli_fetch_array($result);
?>
<body>
    <!--sidebar end-->
    <!--main content start-->
    <span  id="sp2"></span>
    <section id="main-content" >
        <section class="wrapper">
            <div class="table-agile-info">

                <div class="panel panel-default">
                    <center><h2>Update Country</h2></center>

                    <form  id="update_form">
                        <div class="form-group">
                            ID
                            <input type="text"  value="<?php echo($row["id"]); ?>" readonly id="id" class="form-control">
                        </div>
                        <div class="form-group">
                            Country Name
                            <input type="text" name="country_name"    value="<?php echo( $row["country_name"] );?>" id="country_name" class="form-control" data-rule-required="true">
                        </div>
                        <div class="form-group">
                            Country_code
                            <input type="text"   id="country_code"  value="<?php echo( $row["country_code"] );?>" id="country_code" class="form-control" data-rule-required="true">
                        </div>

                        <div class="form-group">
                            <input type="button" value="Update"  onclick="update_country()" id="btn_news" class="btn btn-primary btn-success">
                        </div>
                    </form>
                    <span id="sp1">  </span>
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
