<?php

include 'connection.php';
include 'session_check.php';

include "upper_header.php";
?>
<body onload="view_news()">
    <!--sidebar end-->
    <!--main content start-->
    <section id="main-content" >
        <section class="wrapper">
            <div class="table-agile-info">
                <div class="panel panel-default table-bordered table-responsive">
                    <div class="panel-heading">
                        News Feed
                    </div>
                    <span id="sp2"></span>
                    <button data-toggle="modal" class="btn btn-danger" data-target="#myModal">Add More</button>
                    <a onclick="return confirm('Are You Sure Want to delete?')" href="delete_all.php?table=visa_news&page=view_news.php"><button  class="btn btn-danger" >Delete All</button></a>

                </div>
            </div>


            <div class="container">
                <form id="add_news_form" method="get">
                    <!-- Modal -->
                    <div id="myModal" class="modal fade" role="dialog">
                        <div class="modal-dialog">

                            <!-- Modal content-->
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h4 class="modal-title">ADD NEWS</h4>
                                </div>
                                <div class="modal-body">

                                    <div class="form-group">
                                        <label>Caption</label>
                                        <input type="text" data-rule-required="true" name="caption" id="caption" class="form-control">
                                    </div> <div class="form-group">

                                        <label>Introduction</label>
                                        <input type="text" data-rule-required="true" name="intro" id="intro" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label>Key Point</label>
                                        <input type="text" data-rule-required="true" name="key_point" id="key_point" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label>Description</label>
                                        <textarea name="desc" class="form-control" data-rule-required="true" id="desc"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <input type="button" value="Add News"  onclick="add_news()" id="btn_submit" class="btn btn-primary btn-success">
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
