<?php
	session_start();
	error_reporting(0);
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

	$acctype = $_SESSION['memtype'];
      if($acctype == 'admin'){
        $display="";
      }else if($acctype == 'member'){
        $display="none";
      }

       	  $querya1 = "SELECT * FROM room WHERE roomID='$roomID'";
		  $resulta1 = mysql_query($querya1) or die(mysql_error());
		  $rowa1 = mysql_fetch_array($resulta1);
		  $capacitya1 = $rowa1['capacity'];

		  $result1=mysql_query("SELECT count(*) as total from tenant WHERE roomID = '$roomID'");
		  $boarder1=mysql_fetch_assoc($resultboard1);

		  if($boarder1['total'] == 0){
		  	$querya1 = "UPDATE room SET state='1' WHERE roomID='$roomID'";
			$resulta1 = mysql_query($querya1) or die(mysql_error());
		  }else if($boarder1['total'] > 0 && $boarder1['total'] < $capacity1){
		  	$querya1 = "UPDATE room SET state='2' WHERE roomID='$roomID'";
			$resulta1 = mysql_query($querya1) or die(mysql_error());
		  }else if($boarder1['total'] == $capacity1 && $boarder1['total'] > $capacity1){
		  	$querya1 = "UPDATE room SET state='3' WHERE roomID='$roomID'";
			$resulta1 = mysql_query($querya1) or die(mysql_error());
		  }
	

	$query1 = "SELECT * FROM room";
	$result2 = mysql_query($query1) or die(mysql_error());
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
            <div class="col-lg-12">
                <h1 class="page-header">Edit Profile</h1>
				
                <ol class="breadcrumb">
                    <li><a href="../home.php">Home</a></li>
                    <li><a href="boarder.php">Boarder Management</a></li>
					<li>Edit Profile</li>
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
			<form action="recordprofile.php?id=<?php echo $tenantID; ?>" method="post" enctype="multipart/form-data">
						<label for="fname">First Name</label>
						<input type="text" class="form-control" maxlength="60" id="fname" name="fname" value="<?php echo $fname; ?>" required /> <br />
						<label for="lname">Last Name</label>
						<input type="text" class="form-control" id="lname" maxlength="30" name="lname" value="<?php echo $lname; ?>" required /> <br />
						<label for="bdate">Birth Date</label>
						<input class="form-control"  name="bdate" id="datepicker-example1" type="text" value="<?php echo $bdate; ?>" required>
						 <br />
						<label for="phoneNo">Mobile Number</label>
						<input type="text" class="form-control" id="phoneNo" name="phoneNo" pattern="[0-9]{11,}" title="Mobile number must be 11 digits long" maxlength="11" value="<?php echo $contactNo; ?>" required /> <br />
						<label for="permAddress">Permanent Address</label>
						<input type="text" class="form-control" id="permAddress" maxlength="128" name="permAddress" value="<?php echo $address; ?>" required /> <br />
						<label for="emailAddress">Email Address</label>
						<input type="email" class="form-control" id="emailAddress" name="emailAddress" value="<?php echo $email; ?>" required /> <br />
						<label for="telNo">Emergency Contact Person</label>
						<input type="text" class="form-control" id="telNo" maxlength="20" name="telNo" value="<?php echo $emergencyContact; ?>" required /> <br />
						<label for="username">Username</label>
						<input type="text" class="form-control" id="username" maxlength="20" name="username" value="<?php echo $username; ?>" required /> <br />
						<label for="newpasswrd">New Password</label>
						<input type="password" class="form-control" id="newpasswrd" name="newpasswrd" placeholder="optional" /> <br />
						<label for="oldpasswrd">Old Password</label>
						<input type="password" required="" class="form-control" id="oldpasswrd" name="oldpasswrd"  /> <br />

						<label for="room" style="display:<?php echo $display?>">Room Occupied</label>
						<select class="form-control" id="room" name="room" required style="display:<?php echo $display?>">
						  <?php 

						 while ($res = mysql_fetch_assoc($result2)) {		?>

						 		<option <?php if($res['roomID'] == $roomID){ echo "selected";} ?> value="<?php echo $res['roomID']; ?>"><?php echo $res['roomID']; ?></option>

						  <?php }

						   ?>
						</select> <br />
						
						<label for="filename">Profile Picture</label>
						<input required="" type="file" class="file" name="filename" id="filename" accept="image/*" > <br />
						
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
    

	<script type="text/javascript" src="../_js/zebra_datepicker.js"></script>
	<script type="text/javascript" src="../_js/core.js"></script>

	<script type="text/javascript">
		$(document).ready(function() {
                
                
                var $zdp2 = $('#datepicker-example1').data('Zebra_DatePicker');
                $('#datepicker-example1').Zebra_DatePicker();
                 
        });

	</script>
	<?php
			if($warning != NULL) {
				echo '<script type="text/javascript"> alert("' . $warning . '"); </script>';
			}
	?>
</body>

</html>
