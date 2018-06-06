
<?php

include 'connection.php';
include 'session_check.php';
$query_country = "select * from visa_countries";
$result_country = mysqli_query($conn, $query_country);

$query_visa = "select * from visa_styles";
$result_visa = mysqli_query($conn, $query_visa);

include "upper_header.php";
?>
<script>


</script>
<body onload="customer_text()">
<form method="get">

    <input type="hidden" id="search_type1">
</form>
<br>

<section id="main-content">
    <section class="wrapper">
        <div class="table-agile-info">
            <div class="panel panel-default table-responsive">

                <div class="panel-heading">
                    Send Message
                </div>

                <div class="col-lg-4 col-sm-4 col-xs-4">

                    <span id='select'></span>

                </div>
                <br>



                <span id="sp2"></span>

                <br>
                <br>

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
