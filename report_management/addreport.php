<?php
	session_start();
	include '../_includes/connection.php';

	$subject = $_POST['subject'];
	$content = $_POST['contnt'];
	$category = $_POST['category'];
	$tenantID = $_POST['tenantID'];

	$query = "INSERT INTO report(reportID, subject, content, category, dateReported, state, tenantID) Values('','$subject', '$content', '$category', now(), 0, '$tenantID')";

	$result = mysql_query($query) or die(mysql_error());

	if ($category == 0) {
		$_SESSION['note'] = "Successfully reported room issue.";
		header('Location: room_report.php');
	}else{
		$_SESSION['note'] = "Successfully reported building issue.";
		header('Location: building_report.php');
	}



	

?>