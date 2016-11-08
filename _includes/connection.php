<?php 
	$dbhost = 'localhost';
	$dbuser = 'root';
	$dbpass = '';
	$db = 'bhouse';
	
	$conn = mysql_connect($dbhost, $dbuser, $dbpass) or die(mysql_error());
	mysql_select_db($db);
?>