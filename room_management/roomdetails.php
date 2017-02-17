<?php
  session_start();
  error_reporting(0);
  include '../_includes/connection.php';
  $notif = $_SESSION['notification'];
  $acctype = $_SESSION['memtype'];
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

  if($acctype == 'admin'){
    $display="";
  }else if($acctype == 'member'){
    $display="none";
  }


  
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
    <link href="../_css/bootstrap.min.css" rel="stylesheet">
    <link href="../_css/modern-business.css" rel="stylesheet">
    <link href="../_font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="../_includes/style-roomdetails.css">
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
                    <li><a href="../home.php">Home</a>
                    </li>
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
        <label>Room: 
          <select style="width: 50px; text-align-last: center; " id="selectbox">
            <?php $i=1; while ($i<=12) { ?>
            <option value="<?php echo $i; ?>"<?php if ($room == $i) { echo 'selected="selected"'; } ?>>
                              <?php echo $i; ?>
            </option>
            <?php $i++; } ?>
          </select>
        </label>
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
	      				<a style="display:<?php echo $display?>" href="../boarder_management/boarder.php?room=<?php echo $room?>">Boarders</a>
	      			</div>
	      		</div>
	      		<div class="container-fluid">
	      			<div class="container-fluid" id="rate">
	      				<span>rate:</span>
	      				<span>php <?php echo $rent?></span>
	      				<div class="container-fluid" id="edit" style="display:<?php echo $display?>">
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
      	</div>
      <?php }else{?>
        <div class="container fluid" style="height: 450px">
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
    <script type="text/javascript"></script>
    <?php 
      if ($notif != NULL) {
        echo '<script type=text/javascript>alert("'.$notif.'");</script>';
        $_SESSION['notification'] = null;
      }
     ?>

</body>

<script type="text/javascript">
window.location.hash = 'pointer'

var uri = window.location.toString();
if (uri.indexOf("?") > 0 ) {
    var clean_uri = uri.substring(0, uri.indexOf("?"));

    var hash_pos = location.href.indexOf("#");
    if (hash_pos > 0) {
        var hash = location.href.substring(hash_pos, location.href.length);
        clean_uri += hash;
    }   
    window.history.replaceState({}, document.title, clean_uri);
}

window.onload = function () {
    var eSelect = document.getElementById('selectbox');

    eSelect.onchange = function () {
        var strUser = eSelect.options[eSelect.selectedIndex].value;
        window.location.replace("roomdetails.php?room=" + strUser);
    }
}

$(document).ready(function(){
    $("#myBtn").click(function(){
        $("#myModal").modal();
    });
});


</script>

</html>


