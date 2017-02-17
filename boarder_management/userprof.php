<?php
    session_start();
    error_reporting(0);
	include '../_includes/connection.php';
	include '../_includes/functions.php';

    
	$tenantID = $_GET['id'];
	$query = "SELECT * FROM tenant WHERE tenantID='$tenantID'";
	$result = mysql_query($query) or die(mysql_error());
	$row = mysql_fetch_assoc($result);
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
            <div class="col-lg-12">
        <?php 
            if ($_SESSION['memtype'] == 'member') {  ?>
             
                <h1>Profile</h1>
         

         <?php   }else{   ?>
                <h1 class="page-header">Profile</h1>
                
                <ol class="breadcrumb">
                    <li><a href="../home.php">Home</a></li>
                    <li><a href="boarder.php">Boarder Management</a></li>
                    <li>User Profile</li>
                </ol>
        <?php    }    ?>
        <!-- /.row -->
         </div>
        </div>

        <hr>

        <!-- Project One -->
        <div class="row">
        <div class="col-sm-3"></div>
            <div class="col-md-8">
                    <div class="row">
                        <div class="col-md-4">
                            <img style="width: 250px; height: 300px; float: left;" class="img-responsive img-hover" src="uploads/<?php echo $displayPic; ?>" alt="<?php echo $displayPic; ?>">
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
                            <p><span style="margin-left: 5px;">Emergency Contact Person:</span></p>
                            <p><span style="margin-left: 30px;"><span style="color: red; font-weight: bold;"><?php echo $emergencyContact; ?></span></span></p>
                            <br>
                            <a href="editprofile.php?id=<?php echo $tenantID; ?>">Edit Profile Details / Change Password</a>
                            <br>
                            <?php if ($_SESSION['memtype'] !='member') {
                                echo '<a href="#" data-toggle="modal" data-target="#meModal">Delete User</a>';
                            } ?>
                        </div>
                    </div>
                    <br>
                    <br>
                    <div style="margin-left: 10%">
                        <p>Currently Occupying <span style="font-weight: bold; color: red">Room No. <?php echo $roomID; ?></span> since <span style="font-weight: bold; color: red"><?php echo $dateStart; ?></span></p>
                        <a href="../billing_management/tenantInvoice.php?id=<?php echo $tenantID; ?>">View Transaction Logs</a><br>
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
    <div id="meModal" class="modal fade" role="dialog">
      <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content"  style="text-align: center;">
          <div class="modal-body">
            <h4 class="modal-title">Are you sure you want to delete this tenant?</h4>
            <a href="delete_tenant.php?id=<?php echo $tenantID;  ?>" class="btn btn-danger">Delete</a>
            <button class="btn btn-default" data-dismiss="modal" aria-label="Close">Cancel</button>
          </div>
        </div>

      </div>
    </div>
    <!-- jQuery -->
    <script src="../_js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../_js/bootstrap.min.js"></script>
	
	<?php
			if($warning != NULL) {
				echo '<script type="text/javascript"> alert("' . $warning . '"); </script>';
                $_SESSION['notification'] = NULL;
			}
	?>

</body>

</html>
