<?php
	include '../_includes/connection.php';
	
	$roomID = $_GET['room'];
	
	switch($roomID) {
		case 1:
			$active1 = "active";
			break;
			
		case 2:
			$active2 = "active";
			break;
			
		case 3:
			$active3 = "active";
			break;
			
		case 4:
			$active4 = "active";
			break;
			
		case 5:
			$active5 = "active";
			break;
			
		case 6:
			$active6 = "active";
			break;
			
		case 7:
			$active7 = "active";
			break;
			
		case 8:
			$active8 = "active";
			break;
			
		case 9:
			$active9 = "active";
			break;
			
		case 10:
			$active10 = "active";
			break;
			
		case 11:
			$active11 = "active";
			break;
			
		case 12:
			$active12 = "active";
			break;
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

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <!-- Navigation -->
   <?php include_once("../_includes/navbar.php"); ?>

    <!-- Page Content -->
    <div class="container">

        <!-- Page Heading/Breadcrumbs -->
        <div class="row">
            <div class="col-lg-10">
                <h1 class="page-header">Boarders</h1>
				
                <ol class="breadcrumb">
                    <li><a href="#">Home</a>
                    </li>
                    <li class="active">Boarder Management</li>
                </ol>
            </div>
        </div>
        <!-- /.row -->
		<?php
			$queryA = "SELECT * FROM tenant WHERE roomID='$roomID'";
			$resultA = mysql_query($queryA) or die(mysql_error());
			while($rowA = mysql_fetch_array($resultA)) {
				$tenantID = $rowA['tenantID'];
				$fname = $rowA['fname'];
				$lname = $rowA['lname'];
				$contactNum = $rowA['contactNum'];
				$roomID = $rowA['roomID'];
				$dateStart = $rowA['dateStart'];
				$displayPic = $rowA['displayPic'];
				$emailAddress = $rowA['emailAddress'];
				if(empty($emailAddress)) {
					$emailAddress = "N/A";
				}
			?>
				
				<div class="row">
					<div class="col-md-3">
						<a href="uploads/<?php echo $displayPic; ?>">
							<center><img style="width: 145px; height: 145px" class="img-responsive img-hover" src="uploads/<?php echo $displayPic; ?>" alt=""></center>
						</a>
							<center><h4 style="color: red"><?php echo $fname . " " . $lname; ?></h4></center>
						
					</div>
					<div class="col-md-8">
						<center>
						<h4><?php echo $contactNum; ?></h4>
						<p>Email: <span style="color: red"><?php echo $emailAddress; ?></span></p>
						<p>Currently occupying <span style="color: red">Room <?php echo $roomID; ?></span> since <span style="color: red"><?php echo $dateStart; ?></span></p>
						<a class="btn btn-primary" href="userprof.php?id=<?php echo $tenantID; ?>">View Profile</i></a></center>
					</div>
				</div>
				<hr>
				<!-- /.row -->
	
		<?php
			}
		?>
		
        <!-- Pagination -->
        <div class="row text-center">
            <div class="col-lg-12">
                <ul class="pagination">
                    
                    <li class="<?php echo $active1; ?>">
                        <a href="boarder.php">1</a>
                    </li>
					
                    <li class="<?php echo $active2; ?>">
                        <a href="boarder_page.php?room=2">2</a>
                    </li>
					
                    <li class="<?php echo $active3; ?>">
                        <a href="boarder_page.php?room=3">3</a>
                    </li>
					
                    <li class="<?php echo $active4; ?>">
                        <a href="boarder_page.php?room=4">4</a>
                    </li>
					
                    <li class="<?php echo $active5; ?>">
                        <a href="boarder_page.php?room=5">5</a>
                    </li>
					
					<li class="<?php echo $active6; ?>">
                        <a href="boarder_page.php?room=6">6</a>
                    </li>
					
					<li class="<?php echo $active7; ?>">
                        <a href="boarder_page.php?room=7">7</a>
                    </li>
					
					<li class="<?php echo $active8; ?>">
                        <a href="boarder_page.php?room=8">8</a>
                    </li>
					
					<li class="<?php echo $active9; ?>">
                        <a href="boarder_page.php?room=9">9</a>
                    </li>
					
					<li class="<?php echo $active10; ?>">
                        <a href="boarder_page.php?room=10">10</a>
                    </li>
					
					<li class="<?php echo $active11; ?>">
                        <a href="boarder_page.php?room=11">11</a>
                    </li>
					
					<li class="<?php echo $active12; ?>">
                        <a href="boarder_page.php?room=12">12</a>
                    </li>
                    
                </ul>
            </div>
        </div>
        <!-- /.row -->

        <hr>

        <!-- Footer -->
        <footer>
            <div class="row">
                <div class="col-lg-12">
                    <p>Copyright &copy; Esperanza</p>
                </div>
            </div>
        </footer>

    </div>
    <!-- /.container -->

    <!-- jQuery -->
    <script src="../_js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../_js/bootstrap.min.js"></script>

</body>

</html>
