<?php
	session_start();
	include '../_includes/connection.php';
	
	$filename = basename($_FILES["filename"]["name"]);
	$status = $_POST['status'];
	$rate = $_POST['rate'];
	$pop = $_POST['population'];
	$water = $_POST['water'];
	$cost = $_POST['wattcost'];
	$wattage = $_POST['wattage'];

	$target_dir = "../_images/floorplan/";
	$filename = basename($_FILES["filename"]["name"]);
	$path = $target_dir . $filename;
	
	$queryA = "SELECT * FROM room";
	$resultA = mysql_query($queryA) or die(mysql_error());
	$num = mysql_num_rows($resultA)+1;

			
	if($num <= 12){
		move_uploaded_file($_FILES["filename"]["tmp_name"], $path);		
		if($num <= 4){
			$floor = 1;
		}else if($num <= 8 && $num > 4){
			$floor = 2;
		}else if($num > 8){
			$floor = 3;
		}
		
		$queryB = "INSERT INTO room(roomID, floor, state, capacity, floorplan, rent, balance, overPayment, paymentStat) VALUES('', '$floor', '$status', '$pop', '$path', '$rate', 0, 0, 1)";
		$resultB = mysql_query($queryB) or die(mysql_error());
		header('Location: roommngmt.php');	
	}
	else {
		$_SESSION['notification'] = "You have reached the maximum number of rooms";
		header('Location: roommngmt.php');
	}
	

?>