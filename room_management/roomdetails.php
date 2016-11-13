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
                <h1 class="page-header">Rooms</h1>
				
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
        
      
      	<div class="container-fluid" id="contain">
      		<div class="container-fluid" id="roomtop">
      			<span>Room No. <?php echo $_GET['room'];?></span>
      			<hr>
      			<span>1st floor</span>
      			<span>status: <?php $status;?></span>
      		</div>

      		<div class="container-fluid" id="top">
      			<div class="container-fluid">
	      			<div class="container-fluid" id="pop">
	      				<span>Population: </span>
	      				<span><?php echo '2/2';?></span>
	      				<a href="#">Boarders</a>
	      			</div>
	      		</div>
	      		<div class="container-fluid">
	      			<div class="container-fluid" id="rate">
	      				<span>rate: </span>
	      				<span>PHP <? $price?></span>
	      				<div class="container-fluid" id="edit">
	      					<button type="button" class="btn btn-default btn-lg" id="myBtn">Edit Details</button>
	      				</div>
	      			</div>
      			</div>
      		</div>
      		

      		<div class="container-fluid" id="bigbox">
      			<div class="container-fluid" id="picbox">
      				<img src="../_images/floorplan/fp.png" width="1000px" height="280px" class="img-responsive">
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
      				<a href="#">NO. 1</a>
      				<a href="#">NO. 2</a>
      				<a href="#">NO. 3</a>
      				<a href="#">NO. 4</a>
      				<a href="#">NO. 5</a>
      				<a href="#">NO. 6</a>
      				<a href="#">NO. 7</a>
      				<a href="#">NO. 8</a>
      				<a href="#">NO. 9</a>
      				<a href="#">NO. 10</a>
      				<a href="#">NO. 11</a>
      				<a href="#">NO. 12</a>
      			</div>
      		</div>
      	</div>
        <div class="container-fluid" id="foot">
            <hr>
        </div>
	    <div class="container-fluid">
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


