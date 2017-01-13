<?php
	session_start();

	include '../_includes/connection.php';

	$water = $_POST['water'];
	$roomrate = $_POST['rent'];
	$elec = $_POST['elec'];
	$roomid = $_POST['roomid'];
	$adminID = $_SESSION['adminID'];
	

	$query = "SELECT * from room where roomID = '$roomid'";
	$result = mysql_query($query) or die(mysql_error());
	$row = mysql_fetch_array($result);

	$bal = $row['balance'];
	$op = $row['overPayment'];

	$totl = $water + $roomrate + $elec;
	$subTot = $totl;
	$totl = $totl + $row['balance'];
	$totl = $totl - $row['overPayment'];

	//fix this!! payment status bug: addbill when there is an overpayment 
	if ($row['overPayment'] != 0) {
		$diff = $row['overPayment'] - $op;
		$qq = "UPDATE room SET overPayment = '$diff', paymentStat = 1 where roomID = '$roomid'";
		$rr = mysql_query($qq) or die(mysql_error());
	}



	$time = strtotime("now");
	$month = date("m",strtotime("now"));
	$year = date("Y", $time);

		$query2 = "INSERT INTO bill( billID,rent, water, electricity, month, annum, adminID, roomID, total, overPayment, prevBalance, subTotal, datePrep, billStat ) VALUES ('','$roomrate','$water', '$elec' , '$month', '$year','$adminID', '$roomid', '$totl', '$op', '$bal','$subTot', now(), 0)";
		

		
			$query3 = "UPDATE room SET balance = '$totl'  where roomID = '$roomid'";
			$res = mysql_query($query3) or die(mysql_error());
		


		
		$result2 = mysql_query($query2) or die(mysql_error());

	

	$_SESSION['addbillnote']="Successfully added!";
	header('Location: billing.php?room='.$roomid);


?>