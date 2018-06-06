<?php


include "connection.php";
include 'session_check.php';


include "upper_header.php";
?>

<!--sidebar end-->
<!--main content start-->
<section id="main-content">
    <section class="wrapper">
        <div class="table-agile-info ">
            <div class="panel panel-default table-responsive">
                <div class="panel-heading">
                    Messages
                </div>
                <?php

                include "connection.php";


                $query = "select * from visa_contacts";
                $result = mysqli_query($conn, $query);
                $d = 0;
                while ($row = mysqli_fetch_array($result)) {
                    $d = $d + 1;
                }
                if ($d == 0) {
                    echo "  <i> You have " . $d . " messages </i>";
                } else {
                    echo '<br>';

                    $spcl_counter = 0;

                    $c = 0;
                    $query = "select * from visa_contacts";
                    $result = mysqli_query($conn, $query);
                    while ($row = mysqli_fetch_array($result)) {
                        if ($spcl_counter == 0) {
                            echo "<table  class=' table table-bordered table-responsive'>";
                            echo "<tr>";
                            echo "<th>Sr.No</th>";
                            echo "<th>Name</th>";
                            echo "<th>Email</th>";
                            echo "<th>Mobile</th>";
                            echo "<th>Subject</th>";
                            echo "<th>Action</th>";
                            echo "</tr>";
                            $spcl_counter = 1;
                        }

                        echo "<tr>";
                        $c = $c + 1;
                        echo "<td>" . $c . "</td>";
                        echo "<td style='word-break:break-all'>" . $row[1] . "</td>";
                        echo "<td style='word-break:break-all'>" . $row[2] . "</td>";
                        echo "<td style='word-break: break-all'>" . $row[3] . "</td>";
                        echo "<td style='word-break: break-all'>" . $row[4] . "</td>";
                        if ($row[8] == 1) {
                            echo "<td style='word-break: break-all'><a style='color:blue' href='message.php?id=" . $row[0] . "'>Open</a></td>";
                        } else {
                            echo "<td style='word-break: break-all'><a style='color:grey' href='message.php?id=" . $row[0] . "'>Open</a></td>";
                        }
                        echo "<td style='word-break: break-all'><a onclick = \"return confirm('Are You Sure Want to delete?')\" href='message_del.php?id=" . $row[0] . "'>Remove</a></td>";
                        echo "</tr>";

                    }

                    echo "</table>";

                    echo "<br>";
                    echo "<br>";
                    echo ' <a href = "mark_all_read.php" ><button class="btn " > Mark All As Read </button ></a >            ';
                    echo '    <a onclick = "return confirm(\'Are You Sure Want to delete?\')" href = "delete_all.php?table=visa_contacts&page=requests.php" ><button  class="btn " > Delete All </button ></a >';
                } ?>
                </thead>
                <tbody>
                </tbody>
                </table>

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
<!--[if lte IE 8]>
<script language="javascript" type="text/javascript" src="js/flot-chart/excanvas.min.js"></script><![endif]-->
<script src="js/jquery.scrollTo.js"></script>
</body>
</html>


