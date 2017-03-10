<!DOCTYPE html>
    <?php 
        session_start();
        $notif = $_SESSION['notification'];
        if($_SESSION['logged_in'] == 0){
            header('Location: ../index.php');
        }
        error_reporting(0);
        include '../_includes/connection.php';
        include '../_includes/navbar.php';

          /*$query = "SELECT * FROM room WHERE roomID='$room'";
          $result = mysql_query($query) or die(mysql_error());
          $row = mysql_fetch_array($result);*/

          $query =  mysql_query("SELECT * FROM room ORDER BY roomID") or die(mysql_error());;
          $result = array();
          while($line = mysql_fetch_array($query, MYSQL_ASSOC)){
            $result[] = $line;
          }

          $queryA = "SELECT * FROM room";
          $resultA = mysql_query($queryA) or die(mysql_error());
          $num = mysql_num_rows($resultA)+1;

          /*$floor = $row['floor'];
          $state = $row['state'];
          $capacity = $row['capacity'];
          $floorplan = $row['floorplan'];
          $rent = $row['rent'];
          $water = $row['water'];
          $roomID = $row['roomID'];
          $path = $row['floorplan'];*/
          $resultc=mysql_query("SELECT count(*) as total from room WHERE state = 1");
          $available=mysql_fetch_assoc($resultc);

          $resultd=mysql_query("SELECT count(*) as total from room WHERE state = 2");
          $occupied=mysql_fetch_assoc($resultd);

          $resulte=mysql_query("SELECT count(*) as total from room WHERE state = 3");
          $full=mysql_fetch_assoc($resulte);

          $resultf=mysql_query("SELECT count(*) as total from room WHERE state = 4");
          $underm=mysql_fetch_assoc($resultf);


          $query1 = "SELECT * FROM room WHERE roomID='1'";
		  $result1 = mysql_query($query1) or die(mysql_error());
		  $row1 = mysql_fetch_array($result1);
		  $capacity1 = $row1['capacity'];

		  $query2 = "SELECT * FROM room WHERE roomID='2'";
		  $result2 = mysql_query($query2) or die(mysql_error());
		  $row2 = mysql_fetch_array($result2);
		  $capacity2 = $row1['capacity'];

		  $query3 = "SELECT * FROM room WHERE roomID='3'";
		  $result3 = mysql_query($query3) or die(mysql_error());
		  $row3 = mysql_fetch_array($result3);
		  $capacity3 = $row1['capacity'];

		  $query4 = "SELECT * FROM room WHERE roomID='4'";
		  $result4 = mysql_query($query4) or die(mysql_error());
		  $row4 = mysql_fetch_array($result4);
		  $capacity4 = $row4['capacity'];

		  $query5 = "SELECT * FROM room WHERE roomID='5'";
		  $result5 = mysql_query($query5) or die(mysql_error());
		  $row5 = mysql_fetch_array($result5);
		  $capacity5 = $row5['capacity'];

		  $query6 = "SELECT * FROM room WHERE roomID='6'";
		  $result6 = mysql_query($query6) or die(mysql_error());
		  $row6 = mysql_fetch_array($result6);
		  $capacity6 = $row6['capacity'];

		  $query7 = "SELECT * FROM room WHERE roomID='7'";
		  $result7 = mysql_query($query7) or die(mysql_error());
		  $row7 = mysql_fetch_array($result7);
		  $capacity7 = $row7['capacity'];

		  $query8 = "SELECT * FROM room WHERE roomID='8'";
		  $result8 = mysql_query($query8) or die(mysql_error());
		  $row8 = mysql_fetch_array($result8);
		  $capacity8 = $row8['capacity'];

		  $query9 = "SELECT * FROM room WHERE roomID='9'";
		  $result9 = mysql_query($query9) or die(mysql_error());
		  $row9 = mysql_fetch_array($result9);
		  $capacity9 = $row9['capacity'];

		  $query10 = "SELECT * FROM room WHERE roomID='10'";
		  $result10 = mysql_query($query10) or die(mysql_error());
		  $row10 = mysql_fetch_array($result10);
		  $capacity10 = $row10['capacity'];

		  $query11 = "SELECT * FROM room WHERE roomID='11'";
		  $result11 = mysql_query($query11) or die(mysql_error());
		  $row11 = mysql_fetch_array($result11);
		  $capacity11 = $row11['capacity'];

		  $query12 = "SELECT * FROM room WHERE roomID='12'";
		  $result12 = mysql_query($query12) or die(mysql_error());
		  $row12 = mysql_fetch_array($result12);
		  $capacity12 = $row12['capacity'];


          $result1=mysql_query("SELECT count(*) as total from tenant WHERE roomID = '1'");
		  $boarder1=mysql_fetch_assoc($resultboard1);
		  //echo "HELLOW".$boarder['total'];
		  $result2=mysql_query("SELECT count(*) as total from tenant WHERE roomID = '2'");
		  $boarder2=mysql_fetch_assoc($resultboard2);

		  $result3=mysql_query("SELECT count(*) as total from tenant WHERE roomID = '3'");
		  $boarder3=mysql_fetch_assoc($resultboard3);		  

		  $result4=mysql_query("SELECT count(*) as total from tenant WHERE roomID = '4'");
		  $boarder4=mysql_fetch_assoc($resultboard2);

		  $result5=mysql_query("SELECT count(*) as total from tenant WHERE roomID = '5'");
		  $boarder5=mysql_fetch_assoc($resultboard5);

		  $result6=mysql_query("SELECT count(*) as total from tenant WHERE roomID = '6'");
		  $boarder6=mysql_fetch_assoc($resultboard6);

		  $result7=mysql_query("SELECT count(*) as total from tenant WHERE roomID = '7'");
		  $boarder7=mysql_fetch_assoc($resultboard7);

		  $result8=mysql_query("SELECT count(*) as total from tenant WHERE roomID = '8'");
		  $boarder8=mysql_fetch_assoc($resultboard8);

		  $result9=mysql_query("SELECT count(*) as total from tenant WHERE roomID = '9'");
		  $boarder9=mysql_fetch_assoc($resultboard9);

		  $result10=mysql_query("SELECT count(*) as total from tenant WHERE roomID = '10'");
		  $boarder10=mysql_fetch_assoc($resultboard10);

		  $result11=mysql_query("SELECT count(*) as total from tenant WHERE roomID = '11'");
		  $boarder11=mysql_fetch_assoc($resultboard11);

		  $result12=mysql_query("SELECT count(*) as total from tenant WHERE roomID = '12'");
		  $boarder12=mysql_fetch_assoc($resultboard12);

		 if($boarder1['total'] > 0 && $boarder1['total'] < $capacity1){
		  	$querya1 = "UPDATE room SET state='2' WHERE roomID='1'";
			$resulta1 = mysql_query($querya1) or die(mysql_error());
		  }else if($boarder1['total'] == $capacity1 && $boarder1['total'] > $capacity1){
		  	$querya1 = "UPDATE room SET state='3' WHERE roomID='1'";
			$resulta1 = mysql_query($querya1) or die(mysql_error());
		  }
		  if($boarder2['total'] > 0 && $boarder1['total'] < $capacity1){
		  	$querya2 = "UPDATE room SET state='2' WHERE roomID='2'";
			$resulta2 = mysql_query($querya2) or die(mysql_error());
		  }else if($boarder2['total'] == $capacity1 && $boarder1['total'] > $capacity2){
		  	$querya2 = "UPDATE room SET state='3' WHERE roomID='2'";
			$resulta2 = mysql_query($querya2) or die(mysql_error());
		  }
		  if($boarder3['total'] > 0 && $boarder3['total'] < $capacity3){
		  	$querya3 = "UPDATE room SET state='2' WHERE roomID='3'";
			$resulta3 = mysql_query($querya3) or die(mysql_error());
		  }else if($boarder3['total'] == $capacity3 && $boarder3['total'] > $capacity3){
		  	$querya3 = "UPDATE room SET state='3' WHERE roomID='3'";
			$resulta3 = mysql_query($querya3) or die(mysql_error());
		  }
		   if($boarder4['total'] > 0 && $boarder4['total'] < $capacity4){
		  	$querya4 = "UPDATE room SET state='2' WHERE roomID='4'";
			$resulta4 = mysql_query($querya4) or die(mysql_error());
		  }else if($boarder4['total'] == $capacity4 && $boarder4['total'] > $capacity4){
		  	$querya4 = "UPDATE room SET state='3' WHERE roomID='4'";
			$resulta4 = mysql_query($querya4) or die(mysql_error());
		  }
		   if($boarder5['total'] > 0 && $boarder5['total'] < $capacity5){
		  	$querya5 = "UPDATE room SET state='2' WHERE roomID='5'";
			$resulta5 = mysql_query($querya5) or die(mysql_error());
		  }else if($boarder5['total'] == $capacity5 && $boarder5['total'] > $capacity5){
		  	$querya5 = "UPDATE room SET state='3' WHERE roomID='5'";
			$resulta5 = mysql_query($querya5) or die(mysql_error());
		  }
		   if($boarder6['total'] > 0 && $boarder6['total'] < $capacity6){
		  	$querya6 = "UPDATE room SET state='2' WHERE roomID='6'";
			$resulta6 = mysql_query($querya6) or die(mysql_error());
		  }else if($boarder6['total'] == $capacity6 && $boarder6['total'] > $capacity6){
		  	$querya6 = "UPDATE room SET state='3' WHERE roomID='6'";
			$resulta6 = mysql_query($querya6) or die(mysql_error());
		  }
		   if($boarder7['total'] > 0 && $boarder7['total'] < $capacity7){
		  	$querya7 = "UPDATE room SET state='2' WHERE roomID='7'";
			$resulta7 = mysql_query($querya7) or die(mysql_error());
		  }else if($boarder7['total'] == $capacity7 && $boarder7['total'] > $capacity7){
		  	$querya7 = "UPDATE room SET state='3' WHERE roomID='7'";
			$resulta7 = mysql_query($querya7) or die(mysql_error());
		  }
		   if($boarder8['total'] > 0 && $boarder8['total'] < $capacity8){
		  	$querya8 = "UPDATE room SET state='2' WHERE roomID='8'";
			$resulta8 = mysql_query($querya8) or die(mysql_error());
		  }else if($boarder8['total'] == $capacity8 && $boarder8['total'] > $capacity8){
		  	$querya8 = "UPDATE room SET state='3' WHERE roomID='8'";
			$resulta8 = mysql_query($querya8) or die(mysql_error());
		  }
		   if($boarder9['total'] > 0 && $boarder9['total'] < $capacity9){
		  	$querya9 = "UPDATE room SET state='2' WHERE roomID='9'";
			$resulta9 = mysql_query($querya9) or die(mysql_error());
		  }else if($boarder9['total'] == $capacity9 && $boarder9['total'] > $capacity9){
		  	$querya9 = "UPDATE room SET state='3' WHERE roomID='9'";
			$resulta9 = mysql_query($querya9) or die(mysql_error());
		  }
		   if($boarder10['total'] > 0 && $boarder10['total'] < $capacity10){
		  	$querya10 = "UPDATE room SET state='2' WHERE roomID='10'";
			$resulta10 = mysql_query($querya10) or die(mysql_error());
		  }else if($boarder10['total'] == $capacity10 && $boarder10['total'] > $capacity10){
		  	$querya10 = "UPDATE room SET state='3' WHERE roomID='10'";
			$resulta10 = mysql_query($querya10) or die(mysql_error());
		  }
		   if($boarder11['total'] > 0 && $boarder11['total'] < $capacity11){
		  	$querya11 = "UPDATE room SET state='2' WHERE roomID='11'";
			$resulta11 = mysql_query($querya11) or die(mysql_error());
		  }else if($boarder11['total'] == $capacity11 && $boarder11['total'] > $capacity11){
		  	$querya11 = "UPDATE room SET state='3' WHERE roomID='11'";
			$resulta11 = mysql_query($querya11) or die(mysql_error());
		  }
		   if($boarder12['total'] > 0 && $boarder11['total'] < $capacity12){
		  	$querya12 = "UPDATE room SET state='2' WHERE roomID='12'";
			$resulta12 = mysql_query($querya12) or die(mysql_error());
		  }else if($boarder12['total'] == $capacity12 && $boarder12['total'] > $capacity12){
		  	$querya12 = "UPDATE room SET state='3' WHERE roomID='12'";
			$resulta12 = mysql_query($querya12) or die(mysql_error());
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
                        <h1 class="page-header">Rooms</h1>
                        
                        <ol id="pointer" class="breadcrumb">
                            <li><a href="../home.php">Home</a>
                            </li>
                            <li class="active">Rooms</li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->
                <div class="container-fluid" id="statcontain">
                    <div id ="stattxt">
                        <span>Empty Rooms: <?php echo $available['total'];?></span>
                    </div>
                    <div id="stattxt">
                        <span>Occupied Rooms: <?php echo $occupied['total'];?></span>
                    </div>
                    <div id="stattxt">
                        <span>All Rooms: 12</span>
                    </div>
                    <div id="stattxt">
                        <span>Fully Occupied Rooms: <?php echo $full['total'];?></span>
                    </div>
                </div>

                
                <div class="container" id="tablecont">
                    <div class="container-fluid col-lg-3" id="t1">
                        <a href="roomdetails.php?room=1"><div class="container-fluid" id="t1a">
                            <div class="container-fluid">
                                <span>Room No.1</span>
                            </div>
                            <div class="container-fluid">
                                <span>1st floor</span>
                            </div>
                             <?php 
                             		if($result[0]['state'] == 1){
                                        $stat1 = 'available';
                                        $color1 = '#6aca6b';
                                    }else if($result[0]['state'] == 2){
                                        $stat1 = 'Occupied';
                                        $color1 = '#4fa8f0';
                                    }else if($result[0]['state'] == 3){
                                        $stat1 = 'Full';
                                        $color1 = '#f93e3e';
                                    }else{
                                        $stat1 = 'Unregistered';
                                        $color1 = '#545556';
                                    }
                            ?>
                            <div class="container-fluid" id="txt" style="color:<?php echo $color1?>">
                                <span>status: <?php echo $stat1?></span>
                            </div>
                        </div></a>
                        <a href="roomdetails.php?room=5">
                            <div class="container-fluid" id="t1b">
                            <div class="container-fluid">
                                <span>Room No.5</span>
                            </div>
                            <div class="container-fluid">
                                <span>2nd floor</span>
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
                                        $stat2 = 'Unregistered';
                                        $color2 = '#545556';
                                    }
                            ?>
                            <div class="container-fluid" id="txt" style="color:<?php echo $color2?>">
                                <span>status: <?php echo $stat2?></span>
                            </div>
                        </div></a>
                        <a href="roomdetails.php?room=9"><div class="container-fluid" id="t1c">
                            <div class="container-fluid">
                                <span>Room No.7</span>
                            </div>
                            <div class="container-fluid">
                                <span>3rd floor</span>
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
                                        $stat3 = 'Unregistered';
                                        $color3 = '#545556';
                                    }
                            ?>
                            <div class="container-fluid"  id="txt" style="color:<?php echo $color3?>">
                                <span>status: <?php echo $stat3?></span>
                            </div>
                        </div></a>
                    </div>
                    <div class="container-fluid col-lg-3" id="t2">
                        <a href="roomdetails.php?room=2"><div class="container-fluid" id="t2a">
                            <div class="container-fluid">
                                <span>Room No.2</span>
                            </div>
                            <div class="container-fluid">
                                <span>1st floor</span>
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
                                        $stat4 = 'Unregistered';
                                        $color4 = '#545556';
                                    }
                            ?>
                            <div class="container-fluid"  id="txt" style="color:<?php echo $color4?>">
                                <span>status: <?php echo $stat4?></span>
                            </div>
                        </div></a>
                         <a href="roomdetails.php?room=6"><div class="container-fluid" id="t2b">
                            <div class="container-fluid">
                                <span>Room No.6</span>
                            </div>
                            <div class="container-fluid">
                                <span>2nd floor</span>
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
                                        $stat5 = 'Unregistered';
                                        $color5 = '#545556';
                                    }
                            ?>
                            <div class="container-fluid" id="txt" style="color:<?php echo $color5?>">
                                <span>status: <?php echo $stat5?></span>
                            </div>
                        </div></a>
                        <a href="roomdetails.php?room=10"><div class="container-fluid" id="t2c">
                            <div class="container-fluid">
                                <span>Room No.10</span>
                            </div>
                            <div class="container-fluid">
                                <span>3rd floor</span>
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
                                        $stat6 = 'Unregistered';
                                        $color6 = '#545556';
                                    }
                            ?>
                            <div class="container-fluid" id="txt" style="color:<?php echo $color6?>">
                                <span>status: <?php echo $stat6?></span>
                            </div>
                        </div></a>
                    </div>
                    <div class="container-fluid col-lg-3" id="t3">
                        <a href="roomdetails.php?room=3"><div class="container-fluid" id="t3a">
                            <div class="container-fluid">
                                <span>Room No.3</span>
                            </div>
                            <div class="container-fluid">
                                <span>1st floor</span>
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
                                        $stat7 = 'Unregistered';
                                        $color7 = '#545556';
                                    }
                            ?>
                            <div class="container-fluid" id="txt" style="color:<?php echo $color7?>">
                                <span>status: <?php echo $stat7?></span>
                            </div>
                        </div></a>
                        <a href="roomdetails.php?room=7"><div class="container-fluid" id="t3b">
                            <div class="container-fluid">
                                <span>Room No.7</span>
                            </div>
                            <div class="container-fluid">
                                <span>2nd floor</span>
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
                                        $stat8 = 'Unregistered';
                                        $color8 = '#545556';
                                    }
                            ?>
                            <div class="container-fluid" id="txt" style="color:<?php echo $color8?>">
                                <span>status: <?php echo $stat8?></span>
                            </div>
                        </div></a>
                        <a href="roomdetails.php?room=11"><div class="container-fluid" id="t3c">
                            <div class="container-fluid">
                                <span>Room No.11</span>
                            </div>
                            <div class="container-fluid">
                                <span>3rd floor</span>
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
                                        $stat9 = 'Unregistered';
                                        $color9 = '#545556';
                                    }
                            ?>
                            <div class="container-fluid" id="txt" style="color:<?php echo $color9?>">
                                <span>status: <?php echo $stat9?></span>
                            </div>
                        </div>
                    </div></a>
                    <div class="container-fluid col-lg-3" id="t4">
                        <a href="roomdetails.php?room=4"><div class="container-fluid" id="t4a">
                            <div class="container-fluid">
                                <span>Room No.4</span>
                            </div>
                            <div class="container-fluid">
                                <span>1st floor</span>
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
                                        $stata = 'Unregistered';
                                        $colora = '#545556';
                                    }
                            ?>
                            <div class="container-fluid" id="txt" style="color:<?php echo $colora?>">
                                <span>status: <?php echo $stata?></span>
                            </div>
                        </div></a>
                        <a href="roomdetails.php?room=8"><div class="container-fluid" id="t4b">
                            <div class="container-fluid">
                                <span>Room No.8</span>
                            </div>
                            <div class="container-fluid">
                                <span>2nd floor</span>
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
                                        $statb = 'Unregistered';
                                        $colorb = '#545556';
                                    }
                            ?>
                            <div class="container-fluid" id="txt" style="color:<?php echo $colorb?>">
                                <span>status: <?php echo $statb?></span>
                            </div>
                        </div></a>
                        <a href="roomdetails.php?room=12"><div class="container-fluid" id="t4c">
                            <div class="container-fluid">
                                <span>Room No.12</span>
                            </div>
                            <div class="container-fluid">
                                <span>3rd floor</span>
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
                                        $statc = 'Unregistered';
                                        $colorc = '#545556';
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
    <?php 
      if ($notif != NULL) {
        echo '<script type=text/javascript>alert("'.$notif.'");</script>';
        $_SESSION['notification'] = null;
      }
     ?>

</body>

</html>


