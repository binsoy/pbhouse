<?php
      session_start();

              if (empty($_SESSION['logged_in']))
        {
            header('Location: /index.php');
        }

      $name = $_SESSION['uname'];

      $acctype = $_SESSION['memtype'];
      if($acctype == 'admin'){
        $display="";
      }else if($acctype == 'member'){
        $display="none";
      }

?>

<!-- Navigation -->
<link rel="stylesheet" type="text/css" href="../_includes/style-navbar.css">
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="../room_management/roommngmt.php">Pastillo's Boarding House</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right" id="navtext">
                    <li style="display:<?php echo $display?>" class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Room Management<b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li>
                                <a href="../room_management/roommngmt.php">Rooms</a>
                            </li>
                            <li>
                                <a href="../room_management/addroom.php">Add Room</a>
                            </li>
                        </ul>
                    </li>
                    
                    <li style="display:<?php echo $display?>">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Boarder<b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li>
                                <a href="../boarder_management/boarder.php">Boarder list</a>
                            </li>
                            <li>
                                <a href="../boarder_management/writeboarder.php">Add Boarder</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Billing<b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li style="display:<?php echo $display?>">
                                <a href="../billing_management/roomlist.php">Room Bills</a>
                            </li>
                             <li style="display:<?php if($acctype == 'admin'){echo 'none';}?>">
                                <a href="../billing_management/bill_list.php">View Bills</a>
                            </li>
                            <li style="display:<?php if($acctype == 'admin'){echo 'none';}?>">
                                <a href="../billing_management/invoice_list.php">View Transaction logs</a>
                            </li>
                        </ul>
                    </li>
                    <li style="display:<?php echo $display?>">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Building Management<b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li>
                                <a href="../report_management/view_breport.php">Building status & issues</a>
                            </li>
                            <li>
                                <a href="../report_management/roomlist.php">Room status & issues</a>
                            </li>
                        </ul>
                    </li>
                    <li style="display:<?php echo $display?>">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Analytics<b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li>
                                <a href="../analytics_management/analytics.php">View Analytics</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="#" style="display:<?php if($acctype == 'admin'){echo 'none';}?>" class="dropdown-toggle" data-toggle="dropdown">Reports<b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li>
                                <a href="../report_management/building_report.php">Write Building Issue</a>
                            </li>
                            <li>
                                <a href="../report_management/room_report.php">Write room issue</a>
                            </li>
                        </ul>
                    </li>
                    <li style="display:<?php if($acctype == 'admin'){echo 'none';}?>">
                        <a href="../boarder_management/userprof.php?id=<?php echo $_SESSION['clog']; ?>" class="dropdown-toggle" data-toggle="dropdown">HI! <?php echo $name?><b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li>
                                <a href="../boarder_management/userprof.php?id=<?php echo $_SESSION['clog']; ?>">My profile</a>
                            </li>
                            <li>
                                <a href="../admin/logout.php">Logout</a>
                            </li>
                        </ul>
                    </li>
                    <li style="display:<?php echo $display?>">
                        <a href="../admin/logout.php">Logout</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>
