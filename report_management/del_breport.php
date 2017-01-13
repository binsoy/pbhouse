<?php 
	session_start();
	include '../_includes/connection.php';

	$reportID = $_POST['reportID'];

	$query = "DELETE FROM report where reportID = '$reportID'";
	$res = mysql_query($query) or die(mysql_error());

	header('Location: view_breport.php');

 ?>