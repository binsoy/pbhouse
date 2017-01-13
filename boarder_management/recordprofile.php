<?php
	include '../_includes/connection.php';
	
	$tenantID = $_GET['id'];
	$fname = $_POST['fname'];
	$lname = $_POST['lname'];
	$gender = $_POST['gender'];
	$bdate = $_POST['bdate'];
	$phoneNo = $_POST['phoneNo'];
	$permAddress = $_POST['permAddress'];
	$emailAddress = $_POST['emailAddress'];
	$emergencyNo = $_POST['telNo'];
	$username = $_POST['username'];
	$oldpasswrd = sha1($_POST['oldpasswrd']);
	$newpasswrd = $_POST['newpasswrd'];
	$room = $_POST['room'];
	$target_dir = "uploads/";
	$filename = basename($_FILES["filename"]["name"]);
	$path = $target_dir . $filename;

	if(empty($permAddress)) {
		$permAddress = "N/A";
	}
	
	
	$queryA = "SELECT * FROM tenant WHERE username='$username' AND tenantID<>'$tenantID'";
	$resultA = mysql_query($queryA) or die(mysql_error());
	$rowA = mysql_fetch_array($resultA);
			
	if(empty($rowA)) {
		move_uploaded_file($_FILES["filename"]["tmp_name"], $path);
		
		$queryB = "SELECT * FROM tenant WHERE tenantID='$tenantID' AND passwrd='$oldpasswrd'";
		$resultB = mysql_query($queryB) or die(mysql_error());
		$rowB = mysql_fetch_array($resultB);
		
		if(empty($rowB)) {
			$_SESSION['notification'] = "Wrong password. Please try again.";
			header('Location: editprofile.php?id=' . $tenantID);
			exit();
		}
		else {
			if (!empty($newpasswrd)) {
				$oldpasswrd = $newpasswrd;
			}
			$queryC = "UPDATE tenant SET fname='$fname', lname='$lname', address='$permAddress', contactNum='$phoneNo', username='$username', passwrd='$oldpasswrd', gender='$gender', birthDate='$bdate', emergencyContactNum='$emergencyNo', emailAddress='$emailAddress', displayPic='$filename', roomID='$room' WHERE tenantID='$tenantID'";
			$resultC = mysql_query($queryC) or die(mysql_error());

			

			header('Location: userprof.php?id=' . $tenantID);
			
		}
		
		
		
	}
	else {
		$_SESSION['notification'] = "Username already exists. Please try again.";
		header('Location: editprofile.php?id=' . $tenantID);
	}
	


?>