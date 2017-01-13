<?php 
	session_start();
    error_reporting(0);
    include '../_includes/connection.php';
	
    $billid = $_GET['bill'];
    $roomid = $_GET['room'];

    $query = "DELETE FROM bill WHERE billID = '$billid'";
    $result = mysql_query($query) or die(mysql_error());


    $_SESSION['billnotif'] = "Successfully deleted Bill!";

	header('Location: billing.php?room='.$roomid);

 ?>