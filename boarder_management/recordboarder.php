<?php
	session_start();
	include '../_includes/connection.php';
	
	$fname = $_POST['fname'];
	$lname = $_POST['lname'];
	$gender = $_POST['gender'];
	$bdate = $_POST['bdate'];
	$phoneNo = $_POST['phoneNo'];
	$permAddress = $_POST['permAddress'];
	$emailAddress = $_POST['emailAddress'];
	$emergencyNo = $_POST['telNo'];
	$username = $_POST['username'];
	$passwrd = sha1($_POST['passwrd']);
	$room = $_POST['room'];
	$target_dir = "uploads/";
	$filename = basename($_FILES["filename"]["name"]);
	$path = $target_dir . $filename;

	if(empty($emergencyNo)) {
		$emergencyNo = "N/A";	
	}
	
	$queryA = "SELECT * FROM tenant WHERE username='$username'";
	$resultA = mysql_query($queryA) or die(mysql_error());
	$rowA = mysql_fetch_array($resultA);
			
	if(empty($rowA)) {
		move_uploaded_file($_FILES["filename"]["tmp_name"], $path);
		
		$queryB = "INSERT INTO tenant(tenantID, fname, lname, address, contactNum, username, passwrd, gender, birthDate, emergencyContactNum, emailAddress, dateStart, displayPic, roomID) VALUES('', '$fname', '$lname', '$permAddress', '$phoneNo', '$username', '$passwrd', '$gender', '$bdate', '$emergencyNo', '$emailAddress', now(), '$filename', '$room')";
		$resultB = mysql_query($queryB) or die(mysql_error());
		
		header('Location: boarder.php');
	}
	else {
		$_SESSION['notification'] = "Username already exists. \nPlease try again.";
		header('Location: boarder.php');
	}
	

?>