<!DOCTYPE html>
    <?php 
        include '../_includes/connection.php';
        include '../_includes/navbar.php';

          /*$query = "SELECT * FROM room WHERE roomID='$room'";
          $result = mysql_query($query) or die(mysql_error());
          $row = mysql_fetch_array($result);*/

          $query =  mysql_query("SELECT * FROM room ORDER BY roomID");
          $result = array();
          while($line = mysql_fetch_array($query, MYSQL_ASSOC)){
            $result[] = $line;
          }

          $queryA = "SELECT * FROM room";
          $resultA = mysql_query($queryA) or die(mysql_error());
          $num = mysql_num_rows($resultA);

          /*$floor = $row['floor'];
          $state = $row['state'];
          $capacity = $row['capacity'];
          $floorplan = $row['floorplan'];
          $rent = $row['rent'];
          $water = $row['water'];
          $roomID = $row['roomID'];
          $path = $row['floorplan'];*/
    ?>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Pastillo's Boarding House</title>

    <!-- Bootstrap Core CSS -->
    <link href="../_css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../_css/modern-business.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../_font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="../_includes/style-roommanagement.css">
    <link rel="stylesheet" type="text/css" href="../_includes/style-roommanagement-media.css">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body onload="myFunction()" style="margin:0;">

    <div id="loader"></div>
    <div style="display:none;" id="myDiv" class="animate-bottom container-fluid">

       <?php include("../_includes/navbar.php"); ?>
        <!-- Page Content -->
        <div class="container-fluid" id="body">
            <div class="container-fluid" id="my">
                <!-- Page Heading/Breadcrumbs -->
                <div class="row">
                    <div class="col-lg-10">
                        <h1 class="page-header">Rooms></h1>
                        
                        <ol id="pointer" class="breadcrumb">
                            <li><a href="Roommngmt.php">Home</a>
                            </li>
                            <li class="active">Room Management</li>
                            <li class="active">Rooms</li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->
                <div class="container-fluid" id="statcontain">
                    <div id ="stattxt">
                        <span>Available Rooms: <?php $available?></span>
                    </div>
                    <div id="stattxt">
                        <span>Occupied Rooms: <?php $occupied?></span>
                    </div>
                    <div id="stattxt">
                        <span>All Rooms: 12</span>
                    </div>
                    <div id="stattxt">
                        <span>Fully Occupied Rooms: <?php $full?></span>
                    </div>
                    <div id="stattxt">
                        <span>Under Maintenance Rooms: <?php $underm?></span>
                    </div>
                </div>

                
                <div class="container" id="tablecont">
                    <div class="container-fluid col-lg-3" id="t1">
                        <a href="roomdetails.php?room=1"><div class="container-fluid" id="t1a">
                            <div class="container-fluid" onclick="roomdetails.php">
                                <span>Room No. <?php echo $result[0]['roomID']?></span>
                            </div>
                            <div class="container-fluid">
                                <span><?php echo $result[0]['floor']?>st floor</span>
                            </div>
                             <?php if($result[0]['state'] == 1){
                                        $stat1 = 'available';
                                        $color1 = '#6aca6b';
                                    }else if($result[0]['state'] == 2){
                                        $stat1 = 'Occupied';
                                        $color1 = '#4fa8f0';
                                    }else if($result[0]['state'] == 3){
                                        $stat1 = 'Full';
                                        $color1 = '#f93e3e';
                                    }else{
                                        $stat1 = 'Under Maintenance';
                                        $color1 = '#fd9985';
                                    }
                            ?>
                            <div class="container-fluid" style="color:<?php echo $color1?>">
                                <span>status: <?php echo $stat1?></span>
                            </div>
                        </div></a>
                        <a href="roomdetails.php?room=5"><div class="container-fluid" id="t1b">
                            <div class="container-fluid">
                                <span>Room No.<?php echo $result[4]['roomID']?></span>
                            </div>
                            <div class="container-fluid">
                                <span><?php echo $result[4]['floor']?>nd floor</span>
                            </div>
                            <?php if($result[4]['state'] == 1){
                                        $stat2 = 'available';
                                        $color2 = '#6aca6b';
                                    }else if($result[4]['state'] == 2){
                                        $stat2 = 'Occupied';
                                        $color2 = '#4fa8f0';
                                    }else if($result[4]['state'] == 3){
                                        $stat2 = 'Full';
                                        $color2 = '#f93e3e';
                                    }else{
                                        $stat2 = 'Under Maintenance';
                                        $color2 = '#fd9985';
                                    }
                            ?>
                            <div class="container-fluid" style="color:<?php echo $color2?>">
                                <span>status: <?php echo $stat2?></span>
                            </div>
                        </div></a>
                        <a href="roomdetails.php?room=9"><div class="container-fluid" id="t1c">
                            <div class="container-fluid">
                                <span>Room No.<?php echo $result[8]['roomID']?></span>
                            </div>
                            <div class="container-fluid">
                                <span><?php echo $result[8]['floor']?>rd floor</span>
                            </div>
                            <?php if($result[8]['state'] == 1){
                                        $stat3 = 'available';
                                        $color3 = '#6aca6b';
                                    }else if($result[8]['state'] == 2){
                                        $stat3 = 'Occupied';
                                        $color3 = '#4fa8f0';
                                    }else if($result[8]['state'] == 3){
                                        $stat3 = 'Full';
                                        $color3 = '#f93e3e';
                                    }else{
                                        $stat3 = 'Under Maintenance';
                                        $color3 = '#fd9985';
                                    }
                            ?>
                            <div class="container-fluid" style="color:<?php echo $color3?>">
                                <span>status: <?php echo $stat3?></span>
                            </div>
                        </div></a>
                    </div>
                    <div class="container-fluid col-lg-3" id="t2">
                        <a href="roomdetails.php?room=2"><div class="container-fluid" id="t2a">
                            <div class="container-fluid">
                                <span>Room No.<?php echo $result[1]['roomID']?></span>
                            </div>
                            <div class="container-fluid">
                                <span><?php echo $result[1]['floor']?>st floor</span>
                            </div>
                            <?php if($result[1]['state'] == 1){
                                        $stat4 = 'available';
                                        $color4 = '#6aca6b';
                                    }else if($result[1]['state'] == 2){
                                        $stat4 = 'Occupied';
                                        $color4 = '#4fa8f0';
                                    }else if($result[1]['state'] == 3){
                                        $stat4 = 'Full';
                                        $color4 = '#f93e3e';
                                    }else{
                                        $stat4 = 'Under Maintenance';
                                        $color4 = '#fd9985';
                                    }
                            ?>
                            <div class="container-fluid" style="color:<?php echo $color4?>">
                                <span>status: <?php echo $stat4?></span>
                            </div>
                        </div></a>
                         <a href="roomdetails.php?room=6"><div class="container-fluid" id="t2b">
                            <div class="container-fluid">
                                <span>Room No.<?php echo $result[5]['roomID']?></span>
                            </div>
                            <div class="container-fluid">
                                <span><?php echo $result[5]['floor']?>nd floor</span>
                            </div>
                            <?php if($result[5]['state'] == 1){
                                        $stat5 = 'available';
                                        $color5 = '#6aca6b';
                                    }else if($result[5]['state'] == 2){
                                        $stat5 = 'Occupied';
                                        $color5 = '#4fa8f0';
                                    }else if($result[5]['state'] == 3){
                                        $stat5 = 'Full';
                                        $color5 = '#f93e3e';
                                    }else{
                                        $stat5 = 'Under Maintenance';
                                        $color5 = '#fd9985';
                                    }
                            ?>
                            <div class="container-fluid" style="color:<?php echo $color5?>">
                                <span>status: <?php echo $stat5?></span>
                            </div>
                        </div></a>
                        <a href="roomdetails.php?room=10"><div class="container-fluid" id="t2c">
                            <div class="container-fluid">
                                <span>Room No.<?php echo $result[9]['roomID']?></span>
                            </div>
                            <div class="container-fluid">
                                <span><?php echo $result[9]['floor']?>rd floor</span>
                            </div>
                            <?php if($result[9]['state'] == 1){
                                        $stat6 = 'available';
                                        $color6 = '#6aca6b';
                                    }else if($result[9]['state'] == 2){
                                        $stat6 = 'Occupied';
                                        $color6 = '#4fa8f0';
                                    }else if($result[9]['state'] == 3){
                                        $stat6 = 'Full';
                                        $color6 = '#f93e3e';
                                    }else{
                                        $stat6 = 'Under Maintenance';
                                        $color6 = '#fd9985';
                                    }
                            ?>
                            <div class="container-fluid" style="color:<?php echo $color6?>">
                                <span>status: <?php echo $stat6?></span>
                            </div>
                        </div></a>
                    </div>
                    <div class="container-fluid col-lg-3" id="t3">
                        <a href="roomdetails.php?room=3"><div class="container-fluid" id="t3a">
                            <div class="container-fluid">
                                <span>Room No.<?php echo $result[2]['roomID']?></span>
                            </div>
                            <div class="container-fluid">
                                <span><?php echo $result[2]['floor']?>st floor</span>
                            </div>
                            <?php if($result[2]['state'] == 1){
                                        $stat7 = 'available';
                                        $color7 = '#6aca6b';
                                    }else if($result[2]['state'] == 2){
                                        $stat7 = 'Occupied';
                                        $color7 = '#4fa8f0';
                                    }else if($result[2]['state'] == 3){
                                        $stat7 = 'Full';
                                        $color7 = '#f93e3e';
                                    }else{
                                        $stat7 = 'Under Maintenance';
                                        $color7 = '#fd9985';
                                    }
                            ?>
                            <div class="container-fluid" style="color:<?php echo $color7?>">
                                <span>status: <?php echo $stat7?></span>
                            </div>
                        </div></a>
                        <a href="roomdetails.php?room=7"><div class="container-fluid" id="t3b">
                            <div class="container-fluid">
                                <span>Room No.<?php echo $result[6]['roomID']?></span>
                            </div>
                            <div class="container-fluid">
                                <span><?php echo $result[6]['floor']?>nd floor</span>
                            </div>
                            <?php if($result[6]['state'] == 1){
                                        $stat8 = 'available';
                                        $color8 = '#6aca6b';
                                    }else if($result[6]['state'] == 2){
                                        $stat8 = 'Occupied';
                                        $color8 = '#4fa8f0';
                                    }else if($result[6]['state'] == 3){
                                        $stat8 = 'Full';
                                        $color8 = '#f93e3e';
                                    }else{
                                        $stat8 = 'Under Maintenance';
                                        $color8 = '#fd9985';
                                    }
                            ?>
                            <div class="container-fluid" style="color:<?php echo $color8?>">
                                <span>status: <?php echo $stat8?></span>
                            </div>
                        </div></a>
                        <a href="roomdetails.php?room=11"><div class="container-fluid" id="t3c">
                            <div class="container-fluid">
                                <span>Room No.<?php echo $result[10]['roomID']?></span>
                            </div>
                            <div class="container-fluid">
                                <span><?php echo $result[10]['floor']?>rd floor</span>
                            </div>
                            <?php if($result[10]['state'] == 1){
                                        $stat9 = 'available';
                                        $color9 = '#6aca6b';
                                    }else if($result[10]['state'] == 2){
                                        $stat9 = 'Occupied';
                                        $color9 = '#4fa8f0';
                                    }else if($result[10]['state'] == 3){
                                        $stat9 = 'Full';
                                        $color9 = '#f93e3e';
                                    }else{
                                        $stat9 = 'Under Maintenance';
                                        $color9 = '#fd9985';
                                    }
                            ?>
                            <div class="container-fluid" style="color:<?php echo $color9?>">
                                <span>status: <?php echo $stat9?></span>
                            </div>
                        </div>
                    </div></a>
                    <div class="container-fluid col-lg-3" id="t4">
                        <a href="roomdetails.php?room=4"><div class="container-fluid" id="t4a">
                            <div class="container-fluid">
                                <span>Room No.<?php echo $result[3]['roomID']?></span>
                            </div>
                            <div class="container-fluid">
                                <span><?php echo $result[3]['floor']?>st floor</span>
                            </div>
                            <?php if($result[3]['state'] == 1){
                                        $stata = 'available';
                                        $colora = '#6aca6b';
                                    }else if($result[3]['state'] == 2){
                                        $stata = 'Occupied';
                                        $colora = '#4fa8f0';
                                    }else if($result[3]['state'] == 3){
                                        $stata = 'Full';
                                        $colora = '#f93e3e';
                                    }else{
                                        $stata = 'Under Maintenance';
                                        $colora = '#fd9985';
                                    }
                            ?>
                            <div class="container-fluid" style="color:<?php echo $colora?>">
                                <span>status: <?php echo $stata?></span>
                            </div>
                        </div></a>
                        <a href="roomdetails.php?room=8"><div class="container-fluid" id="t4b">
                            <div class="container-fluid">
                                <span>Room No.<?php echo $result[7]['roomID']?></span>
                            </div>
                            <div class="container-fluid">
                                <span><?php echo $result[7]['floor']?>nd floor</span>
                            </div>
                            <?php if($result[7]['state'] == 1){
                                        $statb = 'available';
                                        $colorb = '#6aca6b';
                                    }else if($result[7]['state'] == 2){
                                        $statb = 'Occupied';
                                        $colorb = '#4fa8f0';
                                    }else if($result[7]['state'] == 3){
                                        $statb = 'Full';
                                        $colorb = '#f93e3e';
                                    }else{
                                        $statb = 'Under Maintenance';
                                        $colorb = '#fd9985';
                                    }
                            ?>
                            <div class="container-fluid" style="color:<?php echo $colorb?>">
                                <span>status: <?php echo $statb?></span>
                            </div>
                        </div></a>
                        <a href="roomdetails.php?room=12"><div class="container-fluid" id="t4c">
                            <div class="container-fluid">
                                <span>Room No.<?php echo $result[11]['roomID']?></span>
                            </div>
                            <div class="container-fluid">
                                <span><?php echo $result[11]['floor']?>rd floor</span>
                            </div>
                            <?php if($result[11]['state'] == 1){
                                        $statc = 'available';
                                        $colorc = '#6aca6b';
                                    }else if($result[11]['state'] == 2){
                                        $statc = 'Occupied';
                                        $colorc = '#4fa8f0';
                                    }else if($result[11]['state'] == 3){
                                        $statc = 'Full';
                                        $colorc = '#f93e3e';
                                    }else{
                                        $statc = 'Under Maintenance';
                                        $colorc = '#fd9985';
                                    }
                            ?>
                            <div class="container-fluid" style="color:<?php echo $colorc?>">
                                <span>status: <?php echo $statc?></span>
                            </div>  
                        </div></a>
                    </div>
                </div>
            </div>

                
                <footer id="foot">
                    <div class="container-fluid" id="low">
                       <span>Copyright &copy; Esperanza Inc. 2016</span>
                    </div>
            </footer>
        
        </div>
    </div>
    <!-- /.container -->

    
    
    <script>

        function myFunction() {
            myVar = setTimeout(showPage, 1360);
        }

        function showPage() {
          document.getElementById("loader").style.display = "none";
          document.getElementById("myDiv").style.display = "block";
        }
    </script>

    <!-- jQuery -->
    <script src="../_js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../_js/bootstrap.min.js"></script>

</body>

</html>


