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
          $ctr3 =0;
          $arrayName = array();
          $arrayID = array();
          $i = 0;

          while($row2 = mysql_fetch_array($resultA)) {
                array_push($arrayID, $row2['roomID']);
              if ($row2['paymentStat'] == 0 && $row2['state'] < 5) {
                  $arrayName[$i] = $row2['paymentStat'];
                  $ctr++;
              }else if($row2['paymentStat'] == 1 && $row2['state'] < 5){
                   $arrayName[$i] = $row2['paymentStat'];
                  $ctr2++;
              }else{
                    $arrayName[$i] = 3;
                    $ctr3++;
              }
              $i++;
          }         

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
                            <li><a href="../home.php">Home</a>
                            </li>
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
                         <?php
                                if (in_array(1, $arrayID)) {
                                    if ($arrayName[0] == 0) {
                                       $stat1 = "Unpaid";
                                       $color1 = "#E7564C";
                                    }else{
                                        $stat1 = "Paid";
                                        $color1 = "#6ACA6B";
                                    }
                                    $link = '<a href="billing.php?room=1">';
                                }else{
                                    $stat1 = "Unregistered";
                                    $color1 = "#545556";
                                    $link = "<a href='#' onclick='meFunction()'>";
                                }
                                    
                            ?>
                        <?php echo $link; ?><div class="container-fluid" id="t1a">
                            <div class="container-fluid" >
                                <span>Room No.1</span>
                            </div>
                            <div class="container-fluid">
                                <span>1st floor</span>
                            </div>
                            <div class="container-fluid" id="txt" style="color:<?php echo $color1?>">
                                <span>status: <?php echo $stat1?></span>
                            </div>
                        </div></a>
                        <?php
                                if (in_array(5, $arrayID)) {
                                    if ($arrayName[4] == 0) {
                                       $stat1 = "Unpaid";
                                       $color1 = "#E7564C";
                                    }else{
                                        $stat1 = "Paid";
                                        $color1 = "#6ACA6B";
                                    }
                                    $link = '<a href="billing.php?room=5">';
                                }else{
                                    $stat1 = "Unregistered";
                                    $color1 = "#545556";
                                    $link = "<a href='#' onclick='meFunction()'>";
                                }
                                    
                            ?>
                        <?php echo $link; ?><div class="container-fluid" id="t1b">
                            <div class="container-fluid">
                                <span>Room No.5</span>
                            </div>
                            <div class="container-fluid">
                                <span>2nd floor</span>
                            </div>
                            <div class="container-fluid" id="txt" style="color:<?php echo $color1?>">
                                <span>status: <?php echo $stat1?></span>
                            </div>
                        </div></a>
                        <?php
                                if (in_array(9, $arrayID)) {
                                    if ($arrayName[8] == 0) {
                                       $stat1 = "Unpaid";
                                       $color1 = "#E7564C";
                                    }else{
                                        $stat1 = "Paid";
                                        $color1 = "#6ACA6B";
                                    }
                                    $link = '<a href="billing.php?room=9">';
                                }else{
                                    $stat1 = "Unregistered";
                                    $color1 = "#545556";
                                    $link = "<a href='#' onclick='meFunction()'>";
                                }
                                    
                            ?>
                        <?php echo $link; ?><div class="container-fluid" id="t1c">
                            <div class="container-fluid">
                                <span>Room No.9</span>
                            </div>
                            <div class="container-fluid">
                                <span>3rd floor</span>
                            </div>
                            <div class="container-fluid"  id="txt" style="color:<?php echo $color1?>">
                                <span>status: <?php echo $stat1?></span>
                            </div>
                        </div></a>
                    </div>
                    <div class="container-fluid col-lg-3" id="t2">
                    <?php
                                if (in_array(2, $arrayID)) {
                                    if ($arrayName[1] == 0) {
                                       $stat1 = "Unpaid";
                                       $color1 = "#E7564C";
                                    }else{
                                        $stat1 = "Paid";
                                        $color1 = "#6ACA6B";
                                    }
                                    $link = '<a href="billing.php?room=2">';
                                }else{
                                    $stat1 = "Unregistered";
                                    $color1 = "#545556";
                                    $link = "<a href='#' onclick='meFunction()'>";
                                }
                                    
                            ?>
                        <?php echo $link; ?><div class="container-fluid" id="t2a">
                            <div class="container-fluid">
                                <span>Room No.2</span>
                            </div>
                            <div class="container-fluid">
                                <span>1st floor</span>
                            </div>
                            <div class="container-fluid"  id="txt" style="color:<?php echo $color1?>">
                                <span>status: <?php echo $stat1?></span>
                            </div>
                        </div></a>
                        <?php
                                if (in_array(6, $arrayID)) {
                                    if ($arrayName[5] == 0) {
                                       $stat1 = "Unpaid";
                                       $color1 = "#E7564C";
                                    }else{
                                        $stat1 = "Paid";
                                        $color1 = "#6ACA6B";
                                    }
                                    $link = '<a href="billing.php?room=6">';
                                }else{
                                    $stat1 = "Unregistered";
                                    $color1 = "#545556";
                                    $link = "<a href='#' onclick='meFunction()'>";
                                }
                                    
                            ?>
                        <?php echo $link; ?><div class="container-fluid" id="t2b">
                            <div class="container-fluid">
                                <span>Room No.6</span>
                            </div>
                            <div class="container-fluid">
                                <span>2nd floor</span>
                            </div>
                            <div class="container-fluid" id="txt" style="color:<?php echo $color1?>">
                                <span>status: <?php echo $stat1?></span>
                            </div>
                        </div></a>
                        <?php
                                if (in_array(10, $arrayID)) {
                                    if ($arrayName[9] == 0) {
                                       $stat1 = "Unpaid";
                                       $color1 = "#E7564C";
                                    }else{
                                        $stat1 = "Paid";
                                        $color1 = "#6ACA6B";
                                    }
                                    $link = '<a href="billing.php?room=10">';
                                }else{
                                    $stat1 = "Unregistered";
                                    $color1 = "#545556";
                                    $link = "<a href='#' onclick='meFunction()'>";
                                }
                                    
                            ?>
                        <?php echo $link; ?><div class="container-fluid" id="t2c">
                            <div class="container-fluid">
                                <span>Room No.10</span>
                            </div>
                            <div class="container-fluid">
                                <span>3rd floor</span>
                            </div>
                            <div class="container-fluid" id="txt" style="color:<?php echo $color1?>">
                                <span>status: <?php echo $stat1?></span>
                            </div>
                        </div></a>
                    </div>
                    <div class="container-fluid col-lg-3" id="t3">
                    <?php
                                if (in_array(3, $arrayID)) {
                                    if ($arrayName[2] == 0) {
                                       $stat1 = "Unpaid";
                                       $color1 = "#E7564C";
                                    }else{
                                        $stat1 = "Paid";
                                        $color1 = "#6ACA6B";
                                    }
                                    $link = '<a href="billing.php?room=3">';
                                }else{
                                    $stat1 = "Unregistered";
                                    $color1 = "#545556";
                                    $link = "<a href='#' onclick='meFunction()'>";
                                }
                                    
                            ?>
                        <?php echo $link; ?><div class="container-fluid" id="t3a">
                            <div class="container-fluid">
                                <span>Room No.3</span>
                            </div>
                            <div class="container-fluid">
                                <span>1st floor</span>
                            </div>
                            <div class="container-fluid" id="txt" style="color:<?php echo $color1?>">
                                <span>status: <?php echo $stat1?></span>
                            </div>
                        </div></a>
                        <?php
                                if (in_array(7, $arrayID)) {
                                    if ($arrayName[6] == 0) {
                                       $stat1 = "Unpaid";
                                       $color1 = "#E7564C";
                                    }else{
                                        $stat1 = "Paid";
                                        $color1 = "#6ACA6B";
                                    }
                                    $link = '<a href="billing.php?room=7">';
                                }else{
                                    $stat1 = "Unregistered";
                                    $color1 = "#545556";
                                    $link = "<a href='#' onclick='meFunction()'>";
                                }
                                    
                            ?>
                        <?php echo $link; ?><div class="container-fluid" id="t3b">
                            <div class="container-fluid">
                                <span>Room No.7</span>
                            </div>
                            <div class="container-fluid">
                                <span>2nd floor</span>
                            </div>
                            <div class="container-fluid" id="txt" style="color:<?php echo $color1?>">
                                <span>status: <?php echo $stat1?></span>
                            </div>
                        </div></a>
                        <?php
                                if (in_array(11, $arrayID)) {
                                    if ($arrayName[10] == 0) {
                                       $stat1 = "Unpaid";
                                       $color1 = "#E7564C";
                                    }else{
                                        $stat1 = "Paid";
                                        $color1 = "#6ACA6B";
                                    }
                                    $link = '<a href="billing.php?room=11">';
                                }else{
                                    $stat1 = "Unregistered";
                                    $color1 = "#545556";
                                    $link = "<a href='#' onclick='meFunction()'>";
                                }
                                    
                            ?>
                        <?php echo $link; ?><div class="container-fluid" id="t3c">
                            <div class="container-fluid">
                                <span>Room No.11</span>
                            </div>
                            <div class="container-fluid">
                                <span>3rd floor</span>
                            </div>
                            <div class="container-fluid" id="txt" style="color:<?php echo $color1?>">
                                <span>status: <?php echo $stat1?></span>
                            </div>
                        </div>
                    </div></a>
                    <div class="container-fluid col-lg-3" id="t4">
                    <?php
                                if (in_array(4, $arrayID)) {
                                    if ($arrayName[3] == 0) {
                                       $stat1 = "Unpaid";
                                       $color1 = "#E7564C";
                                    }else{
                                        $stat1 = "Paid";
                                        $color1 = "#6ACA6B";
                                    }
                                    $link = '<a href="billing.php?room=4">';
                                }else{
                                    $stat1 = "Unregistered";
                                    $color1 = "#545556";
                                    $link = "<a href='#' onclick='meFunction()'>";
                                }
                                    
                            ?>
                        <?php echo $link; ?><div class="container-fluid" id="t4a">
                            <div class="container-fluid">
                                <span>Room No.4</span>
                            </div>
                            <div class="container-fluid">
                                <span>1st floor</span>
                            </div>
                            <div class="container-fluid" id="txt" style="color:<?php echo $color1?>">
                                <span>status: <?php echo $stat1?></span>
                            </div>
                        </div></a>
                        <?php
                                if (in_array(8, $arrayID)) {
                                    if ($arrayName[7] == 0) {
                                       $stat1 = "Unpaid";
                                       $color1 = "#E7564C";
                                    }else{
                                        $stat1 = "Paid";
                                        $color1 = "#6ACA6B";
                                    }
                                    $link = '<a href="billing.php?room=8">';
                                }else{
                                    $stat1 = "Unregistered";
                                    $color1 = "#545556";
                                    $link = "<a href='#' onclick='meFunction()'>";
                                }
                                    
                            ?>
                        <?php echo $link; ?><div class="container-fluid" id="t4b">
                            <div class="container-fluid">
                                <span>Room No.8</span>
                            </div>
                            <div class="container-fluid">
                                <span>2nd floor</span>
                            </div>
                            <div class="container-fluid" id="txt" style="color:<?php echo $color1?>">
                                <span>status: <?php echo $stat1?></span>
                            </div>
                        </div></a>
                        <?php
                                if (in_array(12, $arrayID)) {
                                    if ($arrayName[11] == 0) {
                                       $stat1 = "Unpaid";
                                       $color1 = "#E7564C";
                                    }else{
                                        $stat1 = "Paid";
                                        $color1 = "#6ACA6B";
                                    }
                                    $link = '<a href="billing.php?room=12">';
                                }else{
                                    $stat1 = "Unregistered";
                                    $color1 = "#545556";
                                    $link = "<a href='#' onclick='meFunction()'>";
                                }
                                    
                            ?>
                        <?php echo $link; ?><div class="container-fluid" id="t4c">
                            <div class="container-fluid">
                                <span>Room No.12</span>
                            </div>
                            <div class="container-fluid">
                                <span>3rd floor</span>
                            </div>
                            <div class="container-fluid" id="txt" style="color:<?php echo $color1?>">
                                <span>status: <?php echo $stat1?></span>
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

        function meFunction(){
            alert("Room needs to be registered first. Please refer to Room Management.");
        }
    </script>

    <!-- jQuery -->
    <script src="../_js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../_js/bootstrap.min.js"></script>

</body>

</html>


