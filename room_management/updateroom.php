<?php
	session_start();
	include '../_includes/connection.php';
	
	$filename = basename($_FILES["filename"]["name"]);
	$status = $_POST['status'];
	$rate = $_POST['rate'];
	$pop = $_POST['population'];
	$water = $_POST['water'];
	$cost = $_POST['wattcost'];
	$floor = $_POST['floor'];
	$id = $_POST['roomID'];
	$room = $_GET['room'];
	$wattage =$_POST['wattage'];

	$target_dir = "../_images/floorplan/";
	$filename = basename($_FILES["filename"]["name"]);
	$path = $target_dir . $filename;

		move_uploaded_file($_FILES["filename"]["tmp_name"], $path);
		$queryC = "UPDATE room SET state='$status', capacity='$pop', floorplan='$path', rent='$rate',water='$water', wattCost='$cost', wattage='$wattage' WHERE roomID='$id'";
		$resultC = mysql_query($queryC) or die(mysql_error());
		header('Location: roomdetails.php?room=' . $room);
?>