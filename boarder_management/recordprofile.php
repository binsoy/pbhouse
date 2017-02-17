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
			$curRoom = $rowB['roomID'];
			$res2 = mysql_query("SELECT * FROM tenant where roomID = '$curRoom'") or die(mysql_error());
			$num = mysql_num_rows($res2);
			$res1 = mysql_query("SELECT * FROM tenant where roomID = '$room'") or die(mysql_error());
			$rowNum = mysql_num_rows($res1);

			$q = "SELECT * FROM room where roomID = '$room'";
			$res = mysql_query($q) or die(mysql_error());
			$row = mysql_fetch_assoc($res);

			if ($row['state'] <> 3) {
				$queryC = "UPDATE tenant SET fname='$fname', lname='$lname', address='$permAddress', contactNum='$phoneNo', username='$username', passwrd='$oldpasswrd', gender='$gender', birthDate='$bdate', emergencyContactNum='$emergencyNo', emailAddress='$emailAddress', displayPic='$filename', roomID='$room' WHERE tenantID='$tenantID'";
				$resultC = mysql_query($queryC) or die(mysql_error());

				if (($row['capacity'] - 1) == $rowNum) {
					$queryC = "UPDATE room SET state = 3 where roomID = '$room'";
				}else{
					$queryC = "UPDATE room SET state = 2 where roomID = '$room'";
				}

				$resultC = mysql_query($queryC) or die(mysql_error());

			

				if ($curRoom != $room) {

					$q = mysql_query("SELECT * FROM room where roomID = $curRoom") or die(mysql_error());
					$r = mysql_fetch_assoc($q);
					if ($r['state'] == 3) {
						$queryD = "UPDATE room SET state = 2 where roomID = '$curRoom'";
					}else{
						if ($num == 1) {
							$queryD = "UPDATE room SET state = 1 where roomID = '$curRoom'";			
								
						}else{
							$queryD = "UPDATE room SET state = 2 where roomID = '$curRoom'";
						}
						mysql_query($queryD) or die(mysql_error());		
				}
			}





				$_SESSION['notification'] = "Tenant successfully edited.";

			}else{
				$_SESSION['notification'] = "Room is already full.";
				header('Location: editprofile.php?id=' . $tenantID);
		}
			header('Location: userprof.php?id=' . $tenantID);
			
		}
		
		
		
	}
	else {
		$_SESSION['notification'] = "Username already exists. Please try again.";
		header('Location: editprofile.php?id=' . $tenantID);
	}
	


?>