<?php 
	session_start();
	include '../_includes/connection.php';

	$reportID = $_POST['reportID'];
	$opt = $_POST['optradio'];
	$roomID = $_POST['roomID'];

	$query = "UPDATE report SET state = '$opt' where reportID = '$reportID'";
	$res = mysql_query($query) or die(mysql_error());

	header('Location: view_report.php?room='.$roomID);

 ?>