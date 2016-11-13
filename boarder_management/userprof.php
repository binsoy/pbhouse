<?php
	session_start();
	include '../_includes/connection.php';
	include '../_includes/functions.php';

	$tenantID = $_GET['id'];
	$query = "SELECT * FROM tenant WHERE tenantID='$tenantID'";
	$result = mysql_query($query) or die(mysql_error());
	$row = mysql_fetch_array($result);
	$name = $row['fname'] . " " . $row['lname'];
	$gender = $row['gender'];
	$bdate = $row['birthDate'];
	$contactNo = $row['contactNum'];
	$email = $row['emailAddress'];
	$emergencyContact = $row['emergencyContactNum'];
	$roomID = $row['roomID'];
	$dateStart = $row['dateStart'];
	$displayPic = $row['displayPic'];
	$username = $row['username'];
	$address = $row['address'];

	$warning = $_SESSION['notification'];
	$_SESSION['notification'] = NULL;

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
                <h1 class="page-header">Profile</h1>
				
                <ol class="breadcrumb">
                    <li><a href="#">Home</a></li>
                    <li><a href="boarder.php">Boarder Management</a></li>
                    <li>User Profile</li>
                </ol>
            </div>
        </div>
        <!-- /.row -->

        <hr>

        <!-- Project One -->
        <div class="row">
        <div class="col-sm-3"></div>
            <div class="col-md-8">
                    <div class="row">
                        <div class="col-md-4">
                            <img style="width: 250px; height: 300px; float: left;" class="img-responsive img-hover" src="../_images/<?php echo $displayPic; ?>" alt="<?php echo $displayPic; ?>">
                            <p style="text-align: center;">Username: <span style="font-weight: bold;"><?php echo $username; ?></span></p>
                            <p style="text-align: center;">Password: ********</p>
                        </div>
                        <div class="col-md-4">
                            <h2><?php echo $name; ?></h2>
            				<p><span style="margin-left: 5px;"><?php echo $address; ?></span></p>
                            <p><span style="margin-left: 5px;">Sex: <?php echo int2Gender($gender); ?></span></p>
                            <p><span style="margin-left: 5px;">Birthdate: <?php echo $bdate; ?></span></p>
                            <img src="../_images/phone.png" class="img-responsive img-hover" style="width: 25px; height: 25px; float: left; margin-left: 10px">
                            <p style="margin-top: 13px; margin-left: 30px;"><strong><?php echo $contactNo; ?></strong></p>
                            <p><span style="margin-left: 5px;">Email: <span style="color: red; font-weight: bold;"><?php echo $email; ?></span></span></p>
                            <p><span style="margin-left: 5px;">Emergency Contact Number:</span></p>
                            <p><span style="margin-left: 30px;"><span style="color: red; font-weight: bold;"><?php echo $emergencyContact; ?></span></span></p>
                            <br>
                            <a href="editprofile.php?id=<?php echo $tenantID; ?>">Edit Profile Details / Change Password</a>
                        </div>
                    </div>
                    <br>
                    <br>
                    <div style="margin-left: 10%">
                        <p>Currently Occupying <span style="font-weight: bold; color: red">Room No. <?php echo $roomID; ?></span> since <span style="font-weight: bold; color: red"><?php echo $dateStart; ?></span></p>
                        <a href="#">View Transaction Logs</a><br>
                        <a href="#">Report Issue</a><br>
                        <a href="#">Write feedback about our service</a><br>
                    </div>
                </div>
            </div>

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
