<!DOCTYPE html>
    <?php 
        error_reporting(0);
        include '../_includes/connection.php';
        include '../_includes/navbar.php';

         
          $query =  mysql_query("SELECT * FROM room ORDER BY roomID") or die(mysql_error());;
          $result = array();
          while($line = mysql_fetch_array($query, MYSQL_ASSOC)){
            $result[] = $line;
          }

          $queryA = "SELECT * FROM room";
          $resultA = mysql_query($queryA) or die(mysql_error());
          $num = mysql_num_rows($resultA)+1;


          $ctr = 0;
          $ctr2 = 0;
          $arrayName = array();

          $i = 0;

          while($row2 = mysql_fetch_array($resultA)) {
              $arrayName[$i] = $row2['paymentStat'];
              if ($row2['paymentStat'] == 0) {
                  $ctr++;
              }else{
                  $ctr2++;
              }
              $i++;
          }         

          $resultc=mysql_query("SELECT count(*) as total from room WHERE state = 1");
          $available=mysql_fetch_assoc($resultc);

          $resultd=mysql_query("SELECT count(*) as total from room WHERE state = 2");
          $occupied=mysql_fetch_assoc($resultd);

          $resulte=mysql_query("SELECT count(*) as total from room WHERE state = 3");
          $full=mysql_fetch_assoc($resulte);

          $resultf=mysql_query("SELECT count(*) as total from room WHERE state = 4");
          $underm=mysql_fetch_assoc($resultf);
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
    <link rel="stylesheet" type="text/css" href="../_includes/style-roommanagement-media.css">
    <link rel="stylesheet" type="text/css" href="../_includes/style-billingmanagement.css">
    

</head>

<body onload="myFunction()" style="margin:0;">

    <div id="loader"></div>
    <div style="display:none;" id="myDiv" class="animate-bottom container-fluid">

       <?php include("../_includes/navbar.php"); ?>
        <!-- Page Content -->
        <div class="container-fluid" id="body" >
            <div class="container-fluid" id="my">
                <!-- Page Heading/Breadcrumbs -->
                <div class="row">
                    <div class="col-lg-10">
                        <h1 class="page-header">Rooms</h1>
                        
                        <ol id="pointer" class="breadcrumb">
                            <li><a href="Roommngmt.php">Home</a>
                            </li>
                            <li class="active">Room Management</li>
                            <li class="active">Rooms</li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->
                <!-- <div class="container-fluid" id="statcontain">
                    <div id ="stattxt">
                        <span>Paid Rooms: <?php echo $ctr2;?></span>
                    </div>
                    <div id="stattxt">
                        <span>Unpaid Rooms: <?php echo $ctr;?></span>
                    </div>
                </div> -->

                
                <div class="container" id="tablecont">
                    <div class="container-fluid col-lg-3" id="t1">
                        <a href="billing.php?room=1"><div class="container-fluid" id="t1a">
                            <div class="container-fluid" onclick="roomdetails.php">
                                <span>Room No.1</span>
                            </div>
                            <div class="container-fluid">
                                <span>1st floor</span>
                            </div>
                             <?php 
                                if ($arrayName[0] == 0) {
                                   $stat1 = "Unpaid";
                                   $color1 = "#E7564C";
                                }else if($arrayName[0] == 1){
                                    $stat1 = "Paid";
                                    $color1 = "#6ACA6B";
                                }else{
                                    $stat1 = "Unregistered";
                                    $color1 = "#545556";
                                }
                            ?>
                            <div class="container-fluid" id="txt" style="color:<?php echo $color1?>">
                                <span>status: <?php echo $stat1?></span>
                            </div>
                        </div></a>
                        <a href="billing.php?room=5"><div class="container-fluid" id="t1b">
                            <div class="container-fluid">
                                <span>Room No.5</span>
                            </div>
                            <div class="container-fluid">
                                <span>2nd floor</span>
                            </div>
                            <?php if ($arrayName[4] == 0) {
                                   $stat2 = "Unpaid";
                                   $color2 = "#E7564C";
                                }else if($arrayName[4] == 1){
                                    $stat2 = "Paid";
                                    $color2 = "#6ACA6B";
                                }else{
                                     $stat2 = "Unregistered";
                                    $color2 = "#545556";
                                }
                            ?>
                            <div class="container-fluid" id="txt" style="color:<?php echo $color2?>">
                                <span>status: <?php echo $stat2?></span>
                            </div>
                        </div></a>
                        <a href="billing.php?room=9"><div class="container-fluid" id="t1c">
                            <div class="container-fluid">
                                <span>Room No.9</span>
                            </div>
                            <div class="container-fluid">
                                <span>3rd floor</span>
                            </div>
                            <?php 
                                if ($arrayName[8] == 0) {
                                   $stat3 = "Unpaid";
                                   $color3 = "#E7564C";
                                }else if($arrayName[8] == 1){
                                    $stat3 = "Paid";
                                    $color3 = "#6ACA6B";
                                }else{
                                     $stat3 = "Unregistered";
                                    $color3 = "#545556";
                                }
                            ?>
                            <div class="container-fluid"  id="txt" style="color:<?php echo $color3?>">
                                <span>status: <?php echo $stat3?></span>
                            </div>
                        </div></a>
                    </div>
                    <div class="container-fluid col-lg-3" id="t2">
                        <a href="billing.php?room=2"><div class="container-fluid" id="t2a">
                            <div class="container-fluid">
                                <span>Room No.2</span>
                            </div>
                            <div class="container-fluid">
                                <span>1st floor</span>
                            </div>
                            <?php 
                                if ($arrayName[1] == 0) {
                                   $stat4 = "Unpaid";
                                   $color4 = "#E7564C";
                                }else{
                                    $stat4 = "Paid";
                                    $color4 = "#6ACA6B";
                                }
                            ?>
                            <div class="container-fluid"  id="txt" style="color:<?php echo $color4?>">
                                <span>status: <?php echo $stat4?></span>
                            </div>
                        </div></a>
                         <a href="billing.php?room=6"><div class="container-fluid" id="t2b">
                            <div class="container-fluid">
                                <span>Room No.6</span>
                            </div>
                            <div class="container-fluid">
                                <span>2nd floor</span>
                            </div>
                            <?php if ($arrayName[5] == 0) {
                                   $stat5 = "Unpaid";
                                   $color5 = "#E7564C";
                                }else{
                                    $stat5 = "Paid";
                                    $color5 = "#6ACA6B";
                                }
                            ?>
                            <div class="container-fluid" id="txt" style="color:<?php echo $color5?>">
                                <span>status: <?php echo $stat5?></span>
                            </div>
                        </div></a>
                        <a href="billing.php?room=10"><div class="container-fluid" id="t2c">
                            <div class="container-fluid">
                                <span>Room No.10</span>
                            </div>
                            <div class="container-fluid">
                                <span>3rd floor</span>
                            </div>
                            <?php 
                                if ($arrayName[9] == 0) {
                                   $stat6 = "Unpaid";
                                   $color6 = "#E7564C";
                                }else{
                                    $stat6 = "Paid";
                                    $color6 = "#6ACA6B";
                                }
                            ?>
                            <div class="container-fluid" id="txt" style="color:<?php echo $color6?>">
                                <span>status: <?php echo $stat6?></span>
                            </div>
                        </div></a>
                    </div>
                    <div class="container-fluid col-lg-3" id="t3">
                        <a href="billing.php?room=3"><div class="container-fluid" id="t3a">
                            <div class="container-fluid">
                                <span>Room No.3</span>
                            </div>
                            <div class="container-fluid">
                                <span>1st floor</span>
                            </div>
                            <?php 
                                if ($arrayName[2] == 0) {
                                   $stat7 = "Unpaid";
                                   $color7 = "#E7564C";
                                }else{
                                    $stat7 = "Paid";
                                    $color7 = "#6ACA6B";
                                }
                            ?>
                            <div class="container-fluid" id="txt" style="color:<?php echo $color7?>">
                                <span>status: <?php echo $stat7?></span>
                            </div>
                        </div></a>
                        <a href="billing.php?room=7"><div class="container-fluid" id="t3b">
                            <div class="container-fluid">
                                <span>Room No.7</span>
                            </div>
                            <div class="container-fluid">
                                <span>2nd floor</span>
                            </div>
                            <?php 
                                if ($arrayName[6] == 0) {
                                   $stat8 = "Unpaid";
                                   $color8 = "#E7564C";
                                }else{
                                    $stat8 = "Paid";
                                    $color8 = "#6ACA6B";
                                }
                            ?>
                            <div class="container-fluid" id="txt" style="color:<?php echo $color8?>">
                                <span>status: <?php echo $stat8?></span>
                            </div>
                        </div></a>
                        <a href="billing.php?room=11"><div class="container-fluid" id="t3c">
                            <div class="container-fluid">
                                <span>Room No.11</span>
                            </div>
                            <div class="container-fluid">
                                <span>3rd floor</span>
                            </div>
                            <?php 
                                if ($arrayName[10] == 0) {
                                   $stat9 = "Unpaid";
                                   $color9 = "#E7564C";
                                }else{
                                    $stat9 = "Paid";
                                    $color9 = "#6ACA6B";
                                }
                            ?>
                            <div class="container-fluid" id="txt" style="color:<?php echo $color9?>">
                                <span>status: <?php echo $stat9?></span>
                            </div>
                        </div>
                    </div></a>
                    <div class="container-fluid col-lg-3" id="t4">
                        <a href="billing.php?room=4"><div class="container-fluid" id="t4a">
                            <div class="container-fluid">
                                <span>Room No.4</span>
                            </div>
                            <div class="container-fluid">
                                <span>1st floor</span>
                            </div>
                            <?php 
                                if ($arrayName[3] == 0) {
                                   $stata = "Unpaid";
                                   $colora = "#E7564C";
                                }else{
                                    $stata = "Paid";
                                    $colora = "#6ACA6B";
                                }
                            ?>
                            <div class="container-fluid" id="txt" style="color:<?php echo $colora?>">
                                <span>status: <?php echo $stata?></span>
                            </div>
                        </div></a>
                        <a href="billing.php?room=8"><div class="container-fluid" id="t4b">
                            <div class="container-fluid">
                                <span>Room No.8</span>
                            </div>
                            <div class="container-fluid">
                                <span>2nd floor</span>
                            </div>
                            <?php if ($arrayName[7] == 0) {
                                   $statb = "Unpaid";
                                   $colorb = "#E7564C";
                                }else{
                                    $statb = "Paid";
                                    $colorb = "#6ACA6B";
                                }
                            ?>
                            <div class="container-fluid" id="txt" style="color:<?php echo $colorb?>">
                                <span>status: <?php echo $statb?></span>
                            </div>
                        </div></a>
                        <a href="billing.php?room=12"><div class="container-fluid" id="t4c">
                            <div class="container-fluid">
                                <span>Room No.12</span>
                            </div>
                            <div class="container-fluid">
                                <span>3rd floor</span>
                            </div>
                            <?php if ($arrayName[11] == 0) {
                                   $statc = "Unpaid";
                                   $colorc = "#E7564C";
                                }else{
                                    $statc = "Paid";
                                    $colorc = "#6ACA6B";
                                }
                            ?>
                            <div class="container-fluid" id="txt" style="color:<?php echo $colorc?>">
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


