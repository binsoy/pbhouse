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
	$subTot = $totl + $row['balance'];



	$time = strtotime("now");
	$month = date("m",strtotime("now"));
	$year = date("Y", $time);


	//fix this!! payment status bug: addbill when there is an overpayment 
	
		if ($row['overPayment'] > 0) {
			if ($subTot > $op) {
				$tot = $subTot - $op;
				$query3 = "UPDATE room SET balance = '$tot', overPayment=0, paymentStat = 0  where roomID = '$roomid'";
				$res = mysql_query($query3) or die(mysql_error());
				$query2 = "INSERT INTO bill( billID,rent, water, electricity, month, annum, adminID, roomID, total, overPayment, prevBalance, subTotal, datePrep, billStat ) VALUES ('','$roomrate','$water', '$elec' , '$month', '$year','$adminID', '$roomid', '$tot', '$op', '$bal','$subTot', now(), 0)";
			}else{
				$diff = $op - $subTot;
				$qq = "UPDATE room SET overPayment = '$diff', balance = 0, paymentStat = 1 where roomID = '$roomid'";
				$rr = mysql_query($qq) or die(mysql_error());		
				$query2 = "INSERT INTO bill( billID,rent, water, electricity, month, annum, adminID, roomID, total, overPayment, prevBalance, subTotal, datePrep, billStat ) VALUES ('','$roomrate','$water', '$elec' , '$month', '$year','$adminID', '$roomid', 0, '$op', '$bal','$subTot', now(), 1)";
			}
		}else{
			$query3 = "UPDATE room SET balance = '$subTot', overPayment = 0, paymentStat = 0  where roomID = '$roomid'";
			$res = mysql_query($query3) or die(mysql_error());	
			$query2 = "INSERT INTO bill( billID,rent, water, electricity, month, annum, adminID, roomID, total, overPayment, prevBalance, subTotal, datePrep, billStat ) VALUES ('','$roomrate','$water', '$elec' , '$month', '$year','$adminID', '$roomid', '$subTot', '$op', '$bal','$subTot', now(), 0)";
		}

			$result2 = mysql_query($query2) or die(mysql_error());

	$_SESSION['addbillnote']="Successfully added!";
	header('Location: billing.php?room='.$roomid);


?>