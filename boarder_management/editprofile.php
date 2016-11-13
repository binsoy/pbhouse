<?php
	session_start();
	include '../_includes/connection.php';
	
	$warning = $_SESSION['notification'];
	$_SESSION['notification'] = NULL;

	$tenantID = $_GET['id'];
	$query = "SELECT * FROM tenant WHERE tenantID='$tenantID'";
	$result = mysql_query($query) or die(mysql_error());
	$row = mysql_fetch_array($result);

	$fname = $row['fname'];
	$lname = $row['lname'];
	$address = $row['address'];
	$contactNo = $row['contactNum'];
	$username = $row['username'];
	$gender = $row['gender'];
	$bdate = $row['birthDate'];
	$emergencyContact = $row['emergencyContactNum'];
	$email = $row['emailAddress'];
	$dateStart = $row['dateStart'];
	$displayPic = $row['displayPic'];
	$roomID = $row['roomID'];
	
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
                <h1 class="page-header">Register</h1>
				
                <ol class="breadcrumb">
                    <li><a href="#">Home</a></li>
                    <li><a href="boarder.php">Boarder Management</a></li>
                    <li><a href="userprof.php?id=<?php echo $tenantID; ?>"><?php echo $fname . " " . $lname; ?></a></li>
					<li>Edit Profile</li>
                </ol>
            </div>
        </div>
        <!-- /.row -->

        <hr>

        <!-- M A I N   C O N T E N T -->
        <div class="row">
            <div class="form-group" style="margin-left: 20px; margin-right: 20px;">
			<form action="recordprofile.php?id=<?php echo $tenantID; ?>" method="post" enctype="multipart/form-data">
						<label for="fname">First Name</label>
						<input type="text" class="form-control" id="fname" name="fname" value="<?php echo $fname; ?>" required /> <br />
						<label for="lname">Last Name</label>
						<input type="text" class="form-control" id="lname" name="lname" value="<?php echo $lname; ?>" required /> <br />
						<label for="gender">Sex</label>
						<select class="form-control" id="gender" name="gender" required>
						  <option disabled selected value> -- select an option -- </option>
						  <option value="1">Male</option>
						  <option value="2">Female</option>
						</select> <br />
						<label for="bdate">Birth Date</label>
						<input type="text" class="form-control" id="bdate" name="bdate" value="<?php echo $bdate; ?>" required /> <br />
						<label for="phoneNo">Mobile Number</label>
						<input type="text" class="form-control" id="phoneNo" name="phoneNo" pattern="[0-9]{11,}" title="Mobile number must be 11 digits long" maxlength="11" value="<?php echo $contactNo; ?>" required /> <br />
						<label for="permAddress">Permanent Address</label>
						<input type="text" class="form-control" id="permAddress" name="permAddress" value="<?php echo $address; ?>" /> <br />
						<label for="emailAddress">Email Address</label>
						<input type="email" class="form-control" id="emailAddress" name="emailAddress" value="<?php echo $email; ?>" required/> <br />
						<label for="telNo">Emergency Contact Person</label>
						<input type="text" class="form-control" id="telNo" name="telNo" value="<?php echo $emergencyContact; ?>" required /> <br />
						<label for="username">Username</label>
						<input type="text" class="form-control" id="username" name="username" value="<?php echo $username; ?>" required /> <br />
						<label for="newpasswrd">New Password</label>
						<input type="password" class="form-control" id="newpasswrd" name="newpasswrd" placeholder="optional" /> <br />
						<label for="oldpasswrd">Old Password</label>
						<input type="password" class="form-control" id="oldpasswrd" name="oldpasswrd" required /> <br />

						<label for="room">Room Occupied</label>
						<select class="form-control" id="room" name="room" required>
						  <option disabled selected value> -- select an option -- </option>
						  <option>1</option>
						  <option>2</option>
						  <option>3</option>
						  <option>4</option>
						  <option>5</option>
						  <option>6</option>
						  <option>7</option>
						  <option>8</option>
						  <option>9</option>
						  <option>10</option>
						  <option>11</option>
						  <option>12</option>
						</select> <br />
						
						<label for="filename">Profile Picture</label>
						<input type="file" class="file" name="filename" required id="filename" > <br />
						
						<center><button type="submit" class="btn btn-primary">Submit</button></center>
					</form>
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
</body>

</html>
