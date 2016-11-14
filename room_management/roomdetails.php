<?php
  include '../_includes/connection.php';

  $room = $_GET['room'];

  $query = "SELECT * FROM room WHERE roomID='$room'";
  $result = mysql_query($query) or die(mysql_error());
  $row = mysql_fetch_array($result);

  $floor = $row['floor'];
  $state = $row['state'];
  $capacity = $row['capacity'];
  $floorplan = $row['floorplan'];
  $rent = $row['rent'];
  $water = $row['water'];
  $roomID = $row['roomID'];
  $path = $row['floorplan'];

  $resultc=mysql_query("SELECT count(*) as total from tenant WHERE roomID = '$room'");
  $boarder=mysql_fetch_assoc($resultc);

  
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title href="roommngmt.php">Pastillo's Boarding House</title>

    <!-- Bootstrap Core CSS -->
    <link href="../_css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../_css/modern-business.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../_font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="../_includes/style-roomdetails.css">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>
   <?php include_once("../_includes/navbar.php"); ?>
    <!-- Page Content -->
    <div class="container" id="body">
    	<div class="container-fluid" id="my">
    		<!-- Page Heading/Breadcrumbs -->
        <div class="row">
            <div class="col-lg-10">
                <h1 class="page-header">Room</h1>
				
                <ol id="pointer"  class="breadcrumb">
                    <li><a href="Roommngmt.php">Home</a>
                    </li>
                    <li class="active">Room Management</li>
                    <li class="active">Rooms</li>
                    <li class="active">Room Details</li>
                </ol>
            </div>
        </div>
        <!-- /.row -->
        <?php if($state == 1){
                    $stat = 'available';
                    $color = '#6aca6b';
                }else if($state == 2){
                    $stat = 'Occupied';
                    $color = '#4fa8f0';
                }else if($state == 3){
                    $stat = 'Full';
                    $color = '#f93e3e';
                }else{
                    $stat = 'Under Maintenance';
                    $color = '#fd9985';
                }
        ?>
        
      <?php if($roomID != NULL){?>
      	<div class="container-fluid" id="contain">
      		<div class="container-fluid" id="roomtop">
      			<span>Room No. <?php echo $_GET['room'];?></span>
      			<hr>
      			<span>Floor: <?php echo $floor?></span>
            <span style="color:<?php echo $color?>">status: <?php echo $stat?></span>
      		</div>

      		<div class="container-fluid" id="top">
      			<div class="container-fluid">
	      			<div class="container-fluid" id="pop">
	      				<span>Population: </span>
	      				<span><?php echo $boarder['total'];echo '/';echo $capacity;?></span>
	      				<a href="../boarder_management/boarder.php?room=<?php echo $room?>">Boarders</a>
	      			</div>
	      		</div>
	      		<div class="container-fluid">
	      			<div class="container-fluid" id="rate">
	      				<span>rate:</span>
	      				<span>php <?php echo $rent?></span>
	      				<div class="container-fluid" id="edit">
	      					<button type="button" class="btn btn-default btn-lg" id="myBtn">Edit Details</button>
	      				</div>
	      			</div>
      			</div>
      		</div>
      		

      		<div class="container-fluid" id="bigbox">
      			<div class="container-fluid" id="picbox">
      				<img src="<?php echo $path;?>" width="1000px" height="280px" class="img-responsive">
      			</div>
      		</div>

      		<div class="container-fluid">
      			<div class="container-fluid" id="issues">
      				<span class="issuee">Room Issues: </span>
      				<div class="container-fluid" id="issuetext">
      					<ul>
	      					<li>malfunctioning electricfan</li>
	      					<li>Defective light</li>
	      					<li>rusty Doorknob</li>   
      					</ul>				
      				</div>
      			</div>
      		</div>
      		<div class="container-fluid" id="rooms">
      			<div class="container-fluid">
      				<span>ROOMS</span>
      			</div>
      			<div class="container-fluid">
      				<a href="roomdetails.php?room=1">NO. 1</a>
      				<a href="roomdetails.php?room=2">NO. 2</a>
      				<a href="roomdetails.php?room=3">NO. 3</a>
      				<a href="roomdetails.php?room=4">NO. 4</a>
      				<a href="roomdetails.php?room=5">NO. 5</a>
      				<a href="roomdetails.php?room=6">NO. 6</a>
      				<a href="roomdetails.php?room=7">NO. 7</a>
      				<a href="roomdetails.php?room=8">NO. 8</a>
      				<a href="roomdetails.php?room=9">NO. 9</a>
      				<a href="roomdetails.php?room=10">NO. 10</a>
      				<a href="roomdetails.php?room=11">NO. 11</a>
      				<a href="roomdetails.php?room=12">NO. 12</a>
      			</div>
      		</div>
      	</div>
      <?php }else{?>
        <div class="container fluid">
              <h3>Room no.<?php echo $room?> is not yet registered</h3>
              <a href="addroom.php?room=3#pointer">Click here to add a room</a>
        </div>
      <?php }?>
        <div class="container-fluid" id="foot">
            <hr>
        </div>
	    <div class="container-fluid" id="body2">
	        <footer>
	            <div class="row">
	                <div class="col-lg-12">
	                   <p>Copyright &copy; Esperanza Inc. 2016</p>
	                </div>
	            </div>
	        </footer>
	    </div>
	    </div>
    </div>
    <!-- /.container -->

    <!-- MMMMMMMMMMOODAAAAAAAAAAAAL-->
  <div class="modal fade" id="myModal" role="dialog">
    <?php include_once("editroom.php"); ?>
  </div>

    
    


    <!-- jQuery -->
    <script src="../_js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../_js/bootstrap.min.js"></script>

</body>

<script type="text/javascript">
window.location.hash = 'pointer'


$(document).ready(function(){
    $("#myBtn").click(function(){
        $("#myModal").modal();
    });
});


</script>

</html>


