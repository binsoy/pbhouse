<?php 
	session_start();
	include '../_includes/connection.php';

	$tenantid = $_GET['id'];

	

	$q = mysql_query("SELECT * FROM tenant where tenantID = '$tenantid'") or die(mysql_error());
	$raw = mysql_fetch_assoc($q);
	$roomID = $raw['roomID'];

	$qqq = mysql_query("SELECT * FROM tenant where roomID = '$roomID'") or die(mysql_error());
	$numRow = mysql_num_rows($qqq);

				if ($numRow == 1) {
					$queryC = "UPDATE room SET state = 1 where roomID = '$roomID'";
				}else{
					$queryC = "UPDATE room SET state = 2 where roomID = '$roomID'";
				}

				$resultC = mysql_query($queryC) or die(mysql_error());

	$query = "DELETE FROM tenant where tenantID = '$tenantid'";
	$res = mysql_query($query) or die(mysql_error());
	$_SESSION['notification'] = 'Successfully deleted tenant.';

	header('Location: boarder.php');
 ?>