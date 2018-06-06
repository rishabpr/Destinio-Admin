<?php

include 'connection.php';
include 'session_check.php';


include "upper_header.php";
?>
<body onload="view_country()">    <!--sidebar end-->
    <!--main content start-->
    <section id="main-content" >
        <section class="wrapper">
            <div class="table-agile-info">
                <div class="panel panel-default">
                    <div class="panel-heading">
                       Countries List
                    </div>
                    <span id="sp2"></span>
                    <button data-toggle="modal" class="btn btn-danger" data-target="#myModal">Add More</button>
                    <a onclick="return confirm('Are You Sure Want to delete?')" href="delete_all.php?table=visa_countries&page=view_country.php"><button  class="btn btn-danger" >Delete All</button></a>
                    <!--<button data-toggle="modal" data-target="#myModal" class="btn btn-danger">Add More</button>-->
                    </thead>
                    <tbody>
                    </tbody>
                    </table>
                </div>
            </div>
            </div>

            <span  id="sp2"></span>
            <h3 id="error_message"></h3>
            <div class="container">
                <form id="add_country_form" method="get">
                    <!-- Modal -->
                    <div id="myModal" class="modal fade" role="dialog">
                        <div class="modal-dialog">

                            <!-- Modal content-->
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h4 class="modal-title">ADD COUNTRIES</h4>
                                </div>
                                <div class="modal-body">

                                    <div class="form-group">
                                        <label>Country Code</label>
                                        <input type="text" data-rule-required="true" name="country_code" id="country_code" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label>Country Name</label>
                                        <input type="text" class="form-control" data-rule-required="true" name="country_name" id="country_name">
                                    </div>
                                    <div class="form-group">
                                        <input type="button" value="Add Country"  onclick="add_country()" id="btn_submit" class="btn btn-primary btn-success">
                                    </div>
                                    <label class="alert-info" id="sp1" ></label>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
                <h3 id="span_error" ><?php if($_REQUEST['message']=='')
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
