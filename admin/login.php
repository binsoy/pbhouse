<?php
	 include_once("lib/config.php");
	 include_once("../_includes/connection.php");


	$uname = $_POST['uname'];
	$pass = sha1($_POST['pass']);

	$query = "select * from tenant where username='$uname' AND passwrd='$pass'";
	$result = mysql_query($query) or die(mysql_error());

	$row = mysql_fetch_array($result);
	 
	if(empty($row)){
			
			$queryA = "select * from admin where username='$uname' AND passwrd='$pass'";
			$resultA = mysql_query($queryA) or die(mysql_error());

			$rowA = mysql_fetch_array($resultA);
			
			if(empty($rowA)) {
				header('Location: ../wrongpass.php');
			}
			else {
				header('Location: ../room_management/roommngmt.php');
			}
	 	
	 }else{
	 	header('Location: ../room_management/roommngmt.php');
	 }

?>