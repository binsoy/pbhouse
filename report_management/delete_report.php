<?php 
	session_start();
	include '../_includes/connection.php';

	$reportID = $_POST['reportID'];
	$roomID = $_POST['roomID'];


	$q = "SELECT * FROM report where reportID = '$reportID'";
	$result = mysql_query($q) or die(mysql_error());

	$row = mysql_fetch_assoc($result);


	if ($row['state'] == 2) {
		$query = "DELETE FROM report where reportID = '$reportID'";
		$res = mysql_query($query) or die(mysql_error());
	}else{
		$_SESSION['notification'] = "Unable to delete. Report status is not yet finished.";
	}


	header('Location: view_report.php?room='.$roomID);
	

 ?>