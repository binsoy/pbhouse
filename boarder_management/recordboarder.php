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

	if(empty($permAddress)) {
		$permAddress = "N/A";
	}

	$queryA = "SELECT * FROM tenant WHERE username='$username'";
	$resultA = mysql_query($queryA) or die(mysql_error());
	$rowA = mysql_fetch_array($resultA);
			
	if(empty($rowA)) {
		move_uploaded_file($_FILES["filename"]["tmp_name"], $path);

		$res1 = mysql_query("SELECT * FROM tenant where roomID = '$room'") or die(mysql_error());
		$rowNum = mysql_num_rows($res1);

		$q = "SELECT * FROM room where roomID = '$room'";
		$res = mysql_query($q) or die(mysql_error());
		$row = mysql_fetch_assoc($res);

		if ($row['state'] <> 3) {
				$queryB = "INSERT INTO tenant(tenantID, fname, lname, address, contactNum, username, passwrd, gender, birthDate, emergencyContactNum, emailAddress, dateStart, displayPic, roomID) VALUES('', '$fname', '$lname', '$permAddress', '$phoneNo', '$username', '$passwrd', '$gender', '$bdate', '$emergencyNo', '$emailAddress', now(), '$filename', '$room')";
				$resultB = mysql_query($queryB) or die(mysql_error());

				if (($row['capacity'] - 1) == $rowNum) {
					$queryC = "UPDATE room SET state = 3 where roomID = '$room'";
				}else{
					$queryC = "UPDATE room SET state = 2 where roomID = '$room'";
				}

				$resultC = mysql_query($queryC) or die(mysql_error());

			
				$_SESSION['notification'] = "Tenant successfully added.";
			
		}else{
				$_SESSION['notification'] = "Room is already full.";
				header('Location: writeboarder.php');
		}

		header('Location: boarder.php');
	}
	else {
		$_SESSION['notification'] = "Username already exists. Please try again.";
		header('Location: writeboarder.php');
	}
	

?>