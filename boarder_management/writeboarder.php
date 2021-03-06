<?php
	error_reporting(0);
	$warning = $_SESSION['notification'];
	$_SESSION['notification'] = NULL;
	include '../_includes/connection.php';

	$query = "SELECT * FROM room where state != 3";
	$result = mysql_query($query) or die(mysql_error());


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

    <link rel="stylesheet" type="text/css" href="../_css/default.css">
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
                <h1 class="page-header">Register</h1>
				
                <ol class="breadcrumb">
                    <li><a href="../home.php">Home</a></li>
                    <li><a href="boarder.php">Boarder Management</a></li>
                    <li>Add Boarder</li>
                </ol>
            </div>
        </div>
        <!-- /.row -->

        <hr>

        <!-- M A I N   C O N T E N T -->
        <div class="row">

        	<div class="col-lg-2"></div>
        	<div class="col-lg-8">
            <div class="form-group" style="margin-left: 20px; margin-right: 20px;">
			<form action="recordboarder.php" method="post" enctype="multipart/form-data" autocomplete="off">
						<label for="fname">First Name</label>
						<input type="text" class="form-control" id="fname" name="fname" required /> <br />
						<label for="lname">Last Name</label>
						<input type="text" class="form-control" id="lname" name="lname" required /> <br />
						<label for="gender">Sex</label>
						<select class="form-control" id="gender" name="gender" required>
						  <option disabled selected value> -- select an option -- </option>
						  <option value="1">Male</option>
						  <option value="2">Female</option>
						</select> <br />
						<label for="bdate">Birth Date</label>
						<input class="form-control" required name="bdate" id="datepicker-example1" type="text"></input> <br />
						<label for="phoneNo">Mobile Number</label>
						<input type="text" class="form-control" id="phoneNo" name="phoneNo" pattern="[0-9]{11,}" title="Mobile number must be 11 digits long" maxlength="11" required /> <br />
						<label for="permAddress">Permanent Address</label>
						<input type="text" class="form-control" id="permAddress" name="permAddress" /> <br />
						<label for="emailAddress">Email Address</label>
						<input type="email" class="form-control" id="emailAddress" name="emailAddress" required /> <br />
						<label for="telNo">Emergency Contact Number</label>
						<input type="text" class="form-control" id="telNo" name="telNo" required /> <br />
						<label for="username">Username</label>
						<input type="text" class="form-control" id="username" name="username" required /> <br />
						<label for="passwrd">Password</label>
						<input type="password" class="form-control" id="passwrd" name="passwrd" required autocomplete="new-password"/> <br />

						<label for="room">Room Occupied</label>
						<select class="form-control" id="room" name="room" required>
						  <option disabled selected value> -- select an option -- </option>	
						  <?php 

						 while ($res = mysql_fetch_assoc($result)) {		?>

						 		<option value="<?php echo $res['roomID']; ?>"><?php echo $res['roomID']; ?></option>

						  <?php }

						   ?>
						</select> <br />
						
						<label for="filename">Profile Picture</label>
						<input type="file" class="file" name="filename" required id="filename" accept="image/*"> <br />
						
						<center><button type="submit" class="btn btn-primary">Submit</button></center>
					</form>
		</div>
		</div>
        </div>
		<!-- m a i n   c o n t e n t -->
		
		
        <!-- /.row -->

        <hr>

       

        <!-- Footer -->
        <footer>
            <div class="row">
                <div class="col-lg-12">
                    <p>Copyright &copy; Esperanza Inc. 2016</p>
                </div>
            </div>
        </footer>

    </div>
    <!-- /.container -->

    <!-- jQuery -->
    <script src="../_js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../_js/bootstrap.min.js"></script>
	<?php
			if($warning != NULL) {
				echo '<script type="text/javascript"> alert("' . $warning . '"); </script>';
			}
	?>
	<script type="text/javascript" src="../_js/zebra_datepicker.js"></script>
		<script type="text/javascript" src="../_js/core.js"></script>

	<script type="text/javascript">
		$(document).ready(function() {
                
                
                var $zdp2 = $('#datepicker-example1').data('Zebra_DatePicker');
                // assuming the controls you want to attach the plugin to 
                // have the "datepicker" class set
                $('#datepicker-example1').Zebra_DatePicker();
                 
        });

	</script>
</body>

</html>
