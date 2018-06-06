<?php

include 'connection.php';

$query_msg = "select * from visa_contacts order by sr_no desc  ";
$c = 0;
$result_msg = mysqli_query($conn, $query_msg);
while ($row_msg = mysqli_fetch_array($result_msg)) {
    $c = $c + 1;

}
$query_msg1 = "select * from visa_contacts   where status_read='1'";
$d = 0;
$result_msg1 = mysqli_query($conn, $query_msg1);
while ($row_msg1 = mysqli_fetch_array($result_msg1)) {
    $d = $d + 1;

}


date_default_timezone_set("Asia/Calcutta");
$t_time = date(" H:i:s", time());


$user_query = "select * from visa_new_user where status='1'";
$user_result = mysqli_query($conn, $user_query);
$user = 0;
while ($row = mysqli_fetch_array($user_result)) {
    $user = $user + 1;
}

?>
<!DOCTYPE html>
<head>
    <script src="js/admin.js"></script>

    <title>Admin Home Page</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="keywords" content="Visitors Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template,
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design"/>
    <script type="application/x-javascript"> addEventListener("load", function () {
            setTimeout(hideURLbar, 0);
        }, false);

        function hideURLbar() {
            window.scrollTo(0, 1);
        } </script>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link href="css/style.css" rel='stylesheet' type='text/css'/>
    <link href="css/mystyle.css" rel='stylesheet' type='text/css'/>
    <link href="css/style-responsive.css" rel="stylesheet"/>
    <link href='//fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900,900italic'
          rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="css/font.css" type="text/css"/>
    <link href="css/font-awesome.css" rel="stylesheet">
    <link href="css/jquery-ui.css" rel="stylesheet">
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/jquery-ui.js"></script>

    <script src="dist/jquery.validate.js"></script>

</head>

<section id="container">
    <!--header start-->
    <header class="header fixed-top clearfix">
        <!--logo start-->
        <div class="brand">

            <a href="view_admin.php" class="logo">
              DESTINIO
            </a>
            <div class="sidebar-toggle-box">
                <div class="fa fa-bars"></div>
            </div>
        </div>
        <!--logo end-->


        <div class="nav notify-row" id="top_menu">
            <!--  notification start -->
            <ul class="nav top-menu">

                <li id="header_inbox_bar" class="dropdown">
                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                        <i class="fa fa-envelope-o"></i>
                        <span class="badge bg-important"><?php if ($d > 0) {
                                echo $d;
                            } else {
                                echo "";
                            } ?></span>
                    </a>
                    <ul class="dropdown-menu extended inbox">

                        <li>
                            <p class="red">You have <?php echo $d; ?> New Mails</p>
                        </li>

                        <?php
                        $result_msg = mysqli_query($conn, $query_msg);
                        $i = 0;
                        while ($row_msg = mysqli_fetch_array($result_msg)) {
                            $i = $i + 1;
                            if ($i < 6) {
                                echo "<li>";
                                if ($row_msg['status_read'] == '1') {
                                    echo '<a  href="message.php?id=' . $row_msg["0"] . '">';
                                } else {
                                    echo '<a style="background-color:white;" href="message.php?id=' . $row_msg[0] . '">';
                                }
                                echo '<span class="photo"><img alt="avatar" src="images/3.png"></span>';
                                echo '<span class="subject">';
                                echo '<span class="from">' . $row_msg['name'] . '</span>';
                                //time print
                                $get_date = "select * from visa_contacts where sr_no=" . $row_msg[0];
                                $result_date = mysqli_query($conn, $get_date);
                                $c_time = 0;
                                while ($row_date = mysqli_fetch_array($result_date)) {
                                    $c_time = $row_date[6];
                                    $ar_recorded = explode(':', $c_time);
                                    $ar_current = explode(':', $t_time);

                                    $hour = $ar_current[0] - $ar_recorded[0];
                                    $min = $ar_current[1] - $ar_recorded[1];
                                    $sec = $ar_current[2] - $ar_recorded[2];

                                    $date = $row_date[7];
                                    $date_recored = explode('-', $date);
                                    $date_current = explode('-', date('y-m-d'));

                                    $year = $date_current[0] - $date_recored[0];
                                    $month = $date_current[1] - $date_recored[1];
                                    $day = $date_current[2] - $date_recored[2];


                                    if ($year > 0) {
                                        if ($year > 1) {
                                            echo '<span class="time">' . $year . ' years ago</span>';

                                        } else {
                                            echo '<span class="time">' . $year . ' year ago</span>';

                                        }
                                    } elseif ($month > 0) {
                                        if ($month > 1) {
                                            echo '<span class="time">' . $month . ' months ago</span>';
                                        } else {
                                            echo '<span class="time">' . $month . ' month ago</span>';

                                        }
                                    } elseif ($day > 0) {
                                        if ($day > 1) {
                                            echo '<span class="time">' . $day . ' days ago</span>';
                                        } else {
                                            echo '<span class="time">' . $day . ' day ago</span>';

                                        }
                                    } else {

                                        if ($hour == 0 && $min == 0) {

                                            echo '<span class="time">' . $sec . ' seconds ago</span>';
                                        } elseif ($hour == 0) {
                                            $min = $ar_current[1] - $ar_recorded[1];
                                            if ($min == 1) {
                                                echo '<span class="time">' . $min . ' minute ago</span>';

                                            } else {

                                                echo '<span class="time">' . $min . ' minutes ago</span>';

                                            }
                                        } elseif ($hour - 1 == 0) {
                                            $min = ($ar_current[1] + 60 - $ar_recorded[1]);
                                            if ($min > 60) {
                                                $hour = floor($min / 60);
                                                if ($hour == 1) {
                                                    echo '<span class="time">' . $hour . ' hour ago</span>';

                                                } else {
                                                    echo '<span class="time">' . $hour . ' hours ago</span>';

                                                }

                                            } else {
                                                echo '<span class="time">' . $min . ' minutes ago</span>';
                                            }

                                        } else {

                                            if ($hour == 1) {
                                                echo '<span class="time">' . $hour . ' hour ago</span>';

                                            } else {
                                                echo '<span class="time">' . $hour . ' hours ago</span>';

                                            }

                                        }
                                    }

                                }


                                echo '</span>';
                                echo '<span class="message">';
                                echo $row_msg['subject'];
                                echo '</span>';
                                echo '</a>';
                                echo '</li>';
                            } else {
                                break;
                            }
                        }

                        ?>

                        <li>
                            <a href="requests.php">See all messages</a>
                        </li>
                    </ul>
                </li>


        </div>

        <div class="top-nav clearfix">
            <!--search & user info start-->
            <ul class="nav pull-right top-menu">
                <li class="dropdown">
                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                        <img alt="" class="glyphicon glyphicon-user">
                        <span class="username"><?php echo $_SESSION['admin']; ?></span>
                        <b class="caret"></b>
                    </a>
                    <ul class="dropdown-menu extended logout">
                        <li><a href="#"><i class=" fa fa-suitcase"></i>Admin</a></li>
                        <li><a href="change_password.php"><i class="fa fa-cog"></i> Settings</a></li>
                        <li><a href="logout.php"><i class="fa fa-key"></i> Log Out</a></li>
                    </ul>
                </li>
                <!-- user login dropdown end -->

            </ul>
            <!--search & user info end-->
        </div>
    </header>
    <!--header end-->
    <!--sidebar start-->
    <aside>
        <div id="sidebar" class="nav-collapse">
            <!-- sidebar menu start-->
            <div class="leftside-navigation">
                <ul class="sidebar-menu" id="nav-accordion">
                    <li>
                        <a href="view_admin.php">
                            <i class="fa fa-dashboard"></i>
                            <span>Manage Admin</span>
                        </a>

                    </li>

                    <li class="sub-menu">
                        <a href="view_news.php">
                            <i class="fa fa-book"></i>
                            <span>News Feed</span>
                        </a>

                    </li>

                    <li>
                        <a href="view_country.php?message=">
                            <i class="fa fa-bullhorn"></i>
                            <span> Countries </span>
                        </a>
                    </li>
                    <li class="sub-menu">
                        <a href="view_customers.php">
                            <i class="fa fa-user"></i>
                            <span>Customers <?php if($user>0) echo "<span class='badge badge-danger'>". $user."</span>";?></span>
                        </a>

                    </li>
                    <li class="sub-menu">
                        <a href="view_document.php">
                            <i class="fa fa-database"></i>
                            <span>Documents </span>
                        </a>

                    </li>

                    <li class="sub-menu">
                        <a href="user_documents.php">
                            <i class="fa fa-th"></i>
                            <span>User Documents</span>
                        </a>

                    </li>
                    <li class="sub-menu">
                        <a href="text.php">
                            <i class="fa fa-text-width"></i>
                            <span>Send Message</span>
                        </a>

                    </li>
                    <li class="sub-menu">
                        <a href="view_visa_type.php?message=">
                            <i class="fa fa-viacoin"></i>
                            <span>Visa Type</span>
                        </a>
                    </li>
                    <li class="sub-menu">
                        <a href="requests.php">
                            <i class="fa fa-envelope"></i>
                            <span>Mail </span>
                        </a>
                        <ul class="sub">
                            <li><a href="requests.php">Inbox</a></li>
                        </ul>
                    </li>


                </ul>
            </div>
            <!-- sidebar menu end-->
        </div>
    </aside>