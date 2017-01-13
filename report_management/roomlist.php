<!DOCTYPE html>
    <?php 
        error_reporting(0);
        include '../_includes/connection.php';
        include '../_includes/navbar.php';

          $query =  "SELECT * from report where category = 0";
          $result = mysql_query($query) or die(mysql_error());
          
          $tenID = [];  
          $ctr = 0;
          $non =0;
          $on = 0;
          while ($res = mysql_fetch_assoc($result)) {
              $tenID[$ctr] = $res['tenantID'];
              $ctr++;
              if ($res['state'] == 1) {
                  $on++;
              }else{
                  $non++;
              }
          }


          $roomIDs = [];
          $j = 0;
          for ($i=0; $i < count($tenID); $i++) { 
              $queryA = "SELECT * from tenant where tenantID = '$tenID[$i]'";
              $resultA = mysql_query($queryA) or die(mysql_error());

              while ( $res2 = mysql_fetch_assoc($resultA)) {
                  $roomIDs[$j] = $res2['roomID'];
                  $j++;
              }
          }

          for ($i=0; $i < count($roomIDs) ; $i++) { 
              if ($roomIDs[$i] == 1) {
                  $roomNum[$roomIDs[$i]]++;
              }elseif ($roomIDs[$i] == 2) {
                  $roomNum[$roomIDs[$i]]++;
              }elseif ($roomIDs[$i] == 3) {
                  $roomNum[$roomIDs[$i]]++;
              }elseif ($roomIDs[$i] == 4) {
                  $roomNum[$roomIDs[$i]]++;
              }elseif ($roomIDs[$i] == 5) {
                  $roomNum[$roomIDs[$i]]++;
              }elseif ($roomIDs[$i] == 6) {
                  $roomNum[$roomIDs[$i]]++;
              }elseif ($roomIDs[$i] == 7) {
                  $roomNum[$roomIDs[$i]]++;
              }elseif ($roomIDs[$i] == 8) {
                  $roomNum[$roomIDs[$i]]++;
              }elseif ($roomIDs[$i] == 9) {
                  $roomNum[$roomIDs[$i]]++;
              }elseif ($roomIDs[$i] == 10) {
                  $roomNum[$roomIDs[$i]]++;
              }elseif ($roomIDs[$i] == 11) {
                  $roomNum[$roomIDs[$i]]++;
              }else{
                  $roomNum[$roomIDs[$i]]++;
              }
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
    <link rel="stylesheet" type="text/css" href="../_includes/style-report.css">
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
                        <h1 class="page-header">Rooms</h1>
                        
                        <ol id="pointer" class="breadcrumb">
                            <li><a href="Roommngmt.php">Home</a>
                            </li>
                            <li class="active">Building Management</li>
                            <li class="active">Room Status and Issues</li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->
                <div class="container-fluid" id="statcontain">
                    <div id ="stattxt">
                        <span>Not yet started: <?php echo $non;?></span>
                    </div>
                    <div id="stattxt">
                        <span>On-going repairs: <?php echo $on;?></span>
                    </div>
                </div>

                
                <div class="container" id="tablecont">
                    <div class="container-fluid col-lg-3" id="t1">
                        <a href="view_report.php?room=1">
                            <?php 
                                if ($roomNum[1] > 0) {
                                    $color = '#F44336';
                                    $color2 = 'black';
                                    $msg = "Number of issue(s): ".$roomNum[1];
                                }else{
                                    $color = NULL;
                                    $color2 = NULL;
                                    $msg = "No issues";
                                }
                             ?>
                            <div class="container-fluid" id="t1a" style="background: <?php echo $color; ?>; color: <?php echo $color2; ?>;">
                                <div class="container-fluid" onclick="roomdetails.php">
                                    <span>Room No.1</span>
                                </div>
                                <div class="container-fluid">
                                    <span>1st floor</span>
                                </div>
                                <div class="container-fluid" id="txt">
                                    <span><?php echo $msg; ?></span>
                                </div>
                            </div></a>
                        <a href="view_report.php?room=5"> <?php 
                                if ($roomNum[5] > 0) {
                                    $color = '#F44336';
                                    $color2 = 'black';
                                    $msg = "Number of issue(s): ".$roomNum[5];
                                }else{
                                    $color = NULL;
                                    $color2 = NULL;
                                    $msg = "No issues";
                                }
                             ?>
                            <div class="container-fluid" id="t1a" style="background: <?php echo $color; ?>; color: <?php echo $color2; ?>">
                                <div class="container-fluid" onclick="roomdetails.php">
                                    <span>Room No.5</span>
                                </div>
                                <div class="container-fluid">
                                    <span>2nd floor</span>
                                </div>
                                <div class="container-fluid" id="txt" >
                                    <span><?php echo $msg; ?></span>
                                </div>
                            </div></a>
                        <a href="view_report.php?room=9"> 
                            <?php 
                                if ($roomNum[9] > 0) {
                                    $color = '#F44336';
                                    $color2 = 'black';
                                    $msg = "Number of issue(s): ".$roomNum[9];
                                }else{
                                    $color = NULL;
                                    $color2 = NULL;
                                    $msg = "No issues";
                                }
                             ?>
                            <div class="container-fluid" id="t1a" style="background: <?php echo $color; ?>; color: <?php echo $color2; ?>">
                                <div class="container-fluid" onclick="roomdetails.php">
                                    <span>Room No.9</span>
                                </div>
                                <div class="container-fluid">
                                    <span>3rd floor</span>
                                </div>
                                <div class="container-fluid" id="txt" >
                                    <span><?php echo $msg; ?></span>
                                </div>
                            </div></a>
                    </div>
                    <div class="container-fluid col-lg-3" id="t2">
                        <a href="view_report.php?room=2"> 
                             <?php 
                                if ($roomNum[2] > 0) {
                                    $color = '#F44336';
                                    $color2 = 'black';
                                    $msg = "Number of issue(s): ".$roomNum[2];
                                }else{
                                    $color = NULL;
                                    $color2 = NULL;
                                    $msg = "No issues";
                                }
                             ?>
                            <div class="container-fluid" id="t1a" style="background: <?php echo $color; ?>; color: <?php echo $color2; ?>">
                                <div class="container-fluid" onclick="roomdetails.php">
                                    <span>Room No.2</span>
                                </div>
                                <div class="container-fluid">
                                    <span>1st floor</span>
                                </div>
                                <div class="container-fluid" id="txt" >
                                    <span><?php echo $msg; ?></span>
                                </div>
                            </div></a>
                         <a href="view_report.php?room=6"> <?php 
                                if ($roomNum[6] > 0) {
                                    $color = '#F44336';
                                    $color2 = 'black';
                                    $msg = "Number of issue(s): ".$roomNum[6];
                                }else{
                                    $color = NULL;
                                    $color2 = NULL;
                                    $msg = "No issues";
                                }
                             ?>
                            <div class="container-fluid" id="t1a" style="background: <?php echo $color; ?>; color: <?php echo $color2; ?>">
                                <div class="container-fluid" onclick="roomdetails.php">
                                    <span>Room No.6</span>
                                </div>
                                <div class="container-fluid">
                                    <span>2nd floor</span>
                                </div>
                                <div class="container-fluid" id="txt" >
                                    <span><?php echo $msg; ?></span>
                                </div>
                            </div></a>
                        <a href="view_report.php?room=10"> <?php 
                                if ($roomNum[10] > 0) {
                                    $color = '#F44336';
                                    $color2 = 'black';
                                    $msg = "Number of issue(s): ".$roomNum[10];
                                }else{
                                    $color = NULL;
                                    $color2 = NULL;
                                    $msg = "No issues";
                                }
                             ?>
                            <div class="container-fluid" id="t1a" style="background: <?php echo $color; ?>; color: <?php echo $color2; ?>">
                                <div class="container-fluid" onclick="roomdetails.php">
                                    <span>Room No.10</span>
                                </div>
                                <div class="container-fluid">
                                    <span>3rd floor</span>
                                </div>
                                <div class="container-fluid" id="txt" >
                                    <span><?php echo $msg; ?></span>
                                </div>
                            </div></a>
                    </div>
                    <div class="container-fluid col-lg-3" id="t3">
                        <a href="view_report.php?room=3"> <?php 
                                if ($roomNum[3] > 0) {
                                    $color = '#F44336';
                                    $color2 = 'black';
                                    $msg = "Number of issue(s): ".$roomNum[3];
                                }else{
                                    $color = NULL;
                                    $color2 = NULL;
                                    $msg = "No issues";
                                }
                             ?>
                            <div class="container-fluid" id="t1a" style="background: <?php echo $color; ?>; color: <?php echo $color2; ?>">
                                <div class="container-fluid" onclick="roomdetails.php">
                                    <span>Room No.3</span>
                                </div>
                                <div class="container-fluid">
                                    <span>1st floor</span>
                                </div>
                                <div class="container-fluid" id="txt" >
                                    <span><?php echo $msg; ?></span>
                                </div>
                            </div></a>
                        <a href="view_report.php?room=7"> <?php 
                                if ($roomNum[7] > 0) {
                                    $color = '#F44336';
                                    $color2 = 'black';
                                    $msg = "Number of issue(s): ".$roomNum[7];
                                }else{
                                    $color = NULL;
                                    $color2 = NULL;
                                    $msg = "No issues";
                                }
                             ?>
                            <div class="container-fluid" id="t1a" style="background: <?php echo $color; ?>; color: <?php echo $color2; ?>">
                                <div class="container-fluid" onclick="roomdetails.php">
                                    <span>Room No.7</span>
                                </div>
                                <div class="container-fluid">
                                    <span>2nd floor</span>
                                </div>
                                <div class="container-fluid" id="txt" >
                                    <span><?php echo $msg; ?></span>
                                </div>
                            </div></a>
                        <a href="view_report.php?room=11"> 
                            <?php 
                                if ($roomNum[11] > 0) {
                                    $color = '#F44336';
                                    $color2 = 'black';
                                    $msg = "Number of issue(s): ".$roomNum[11];
                                }else{
                                    $color = NULL;
                                    $color2 = NULL;
                                    $msg = "No issues";
                                }
                             ?>
                            <div class="container-fluid" id="t1a" style="background: <?php echo $color; ?>; color: <?php echo $color2; ?>">
                                <div class="container-fluid" onclick="roomdetails.php">
                                    <span>Room No.11</span>
                                </div>
                                <div class="container-fluid">
                                    <span>3rd floor</span>
                                </div>
                                <div class="container-fluid" id="txt" >
                                    <span><?php echo $msg; ?></span>
                                </div>
                            </div>
                    </div></a>
                    <div class="container-fluid col-lg-3" id="t4">
                        <a href="view_report.php?room=4"> 
                            <?php 
                                if ($roomNum[4] > 0) {
                                    $color = '#F44336';
                                    $color2 = 'black';
                                    $msg = "Number of issue(s): ".$roomNum[4];
                                }else{
                                    $color = NULL;
                                    $color2 = NULL;
                                    $msg = "No issues";
                                }
                             ?>
                            <div class="container-fluid" id="t1a" style="background: <?php echo $color; ?>; color: <?php echo $color2; ?>">
                                <div class="container-fluid" onclick="roomdetails.php">
                                    <span>Room No.4</span>
                                </div>
                                <div class="container-fluid">
                                    <span>1st floor</span>
                                </div>
                                <div class="container-fluid" id="txt" >
                                    <span><?php echo $msg; ?></span>
                                </div>
                            </div></a>
                        <a href="view_report.php?room=8"> <?php 
                                if ($roomNum[8] > 0) {
                                    $color = '#F44336';
                                    $color2 = 'black';
                                    $msg = "Number of issue(s): ".$roomNum[8];
                                }else{
                                    $color = NULL;
                                    $color2 = NULL;
                                    $msg = "No issues";
                                }
                             ?>
                            <div class="container-fluid" id="t1a" style="background: <?php echo $color; ?>; color: <?php echo $color2; ?>">
                                <div class="container-fluid" onclick="roomdetails.php">
                                    <span>Room No.8</span>
                                </div>
                                <div class="container-fluid">
                                    <span>2nd floor</span>
                                </div>
                                <div class="container-fluid" id="txt" >
                                    <span><?php echo $msg; ?></span>
                                </div>
                            </div></a>
                        <a href="view_report.php?room=12"> 
                            <?php 
                                if ($roomNum[12] > 0) {
                                    $color = '#F44336';
                                    $color2 = 'black';
                                    $msg = "Number of issue(s): ".$roomNum[12];
                                }else{
                                    $color = NULL;
                                    $color2 = NULL;
                                    $msg = "No issues";
                                }
                             ?>
                            <div class="container-fluid" id="t1a" style="background: <?php echo $color; ?>; color: <?php echo $color2; ?>">
                                <div class="container-fluid" onclick="roomdetails.php">
                                    <span>Room No.12</span>
                                </div>
                                <div class="container-fluid">
                                    <span>3rd floor</span>
                                </div>
                                <div class="container-fluid" id="txt" >
                                    <span><?php echo $msg; ?></span>
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


