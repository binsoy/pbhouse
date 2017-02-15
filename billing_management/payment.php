<?php 
	session_start();
	include '../_includes/connection.php';
	$roomid = $_POST['roomid'];
	$payment = $_POST['payment'];
	$tenantid = $_POST['payee'];
	$billid = $_POST['billid'];

	$query = "SELECT * FROM room where roomID = '$roomid'";
	$result = mysql_query($query) or die(mysql_error());

	$query3 = "SELECT * from bill where billID = '$billid'";
	$result3 = mysql_query($query3) or die(mysql_error());

	$row = mysql_fetch_array($result);
	$row2 = mysql_fetch_assoc($result3);

	if ($row2['billStat'] == 0) {
		if ($row['balance'] > $payment) {
				$bal = $row['balance'] - $payment;
				$query1 = "UPDATE room SET balance = '$bal', overPayment = 0 where roomID = '$roomid'";
				$query2 = "INSERT invoice (invoiceID, amountPaid, datePaid, payee, roomID) VALUES('','$payment',now(), '$tenantid', '$roomid')";
				$result2 = mysql_query($query2) or die(mysql_error());
				$billup = mysql_query("UPDATE bill SET billStat = 0 where billID = '$billid'") or die(mysql_error());
			}else if($row['balance'] < $payment){
				$over = $payment - $row['balance'];
				$sum = $row['overPayment'] + $over;
				$query1 = "UPDATE room SET balance = 0, overPayment = '$sum', paymentStat = 1 where roomID = '$roomid'";
				$query2 = "INSERT invoice (invoiceID, amountPaid, datePaid,payee, roomID) VALUES('','$payment',now(),'$tenantid','$roomid')";
				$result2 = mysql_query($query2) or die(mysql_error());
				$billup = mysql_query("UPDATE bill SET billStat = 1 where billID = '$billid'") or die(mysql_error());
			}else{
				$query1 = "UPDATE room SET balance = 0, overPayment = 0, paymentStat = 1 where roomID = '$roomid'";
				$query2 = "INSERT invoice (invoiceID, amountPaid, datePaid, payee, roomID) VALUES('','$payment',now(), '$tenantid','$roomid')";
				$result2 = mysql_query($query2) or die(mysql_error());
				$billup = mysql_query("UPDATE bill SET billStat = 1 where billID = '$billid'") or die(mysql_error());
			}
			$result = mysql_query($query1) or die(mysql_error());
	}else{
		
		$sum = $row['overPayment'] + $payment;
		$query1 = "UPDATE room SET balance = 0, overPayment = '$sum', paymentStat = 1 where roomID = '$roomid'";
		$query2 = "INSERT invoice (invoiceID, amountPaid, datePaid,payee, roomID) VALUES('','$payment',now(),'$tenantid','$roomid')";
		$result2 = mysql_query($query2) or die(mysql_error());
		$result = mysql_query($query1) or die(mysql_error());

	}
	
	$time = strtotime("now");
	$month = date("m",strtotime("now"));
		

		$stat = "SELECT * FROM analytics";
		$statres = mysql_query($stat) or die(mysql_error());
		$statrow = mysql_fetch_array($statres);

		if ($month == 01) {
			$tot = $statrow['jan'] + $payment;
			$statq = "UPDATE analytics SET jan = '$tot' where id = 1";
		}else if ($month == 02) {
			$tot = $statrow['feb'] + $payment;
			$statq = "UPDATE analytics SET feb = '$tot' where id = 1";
		}else if ($month == 03) {
			$tot = $statrow['mar'] + $payment;
			$statq = "UPDATE analytics SET mar = '$tot' where id = 1";
		}else if ($month == 04) {
			$tot = $statrow['april'] + $payment;
			$statq = "UPDATE analytics SET april = '$tot' where id = 1";
		}else if ($month == 05) {
			$tot = $statrow['may'] + $payment;
			$statq = "UPDATE analytics SET may = '$tot' where id = 1";
		}else if ($month == 06) {
			$tot = $statrow['jun'] + $payment;
			$statq = "UPDATE analytics SET jun = '$tot' where id = 1";
		}else if ($month == 07) {
			$tot = $statrow['jul'] + $payment;
			$statq = "UPDATE analytics SET jul = '$tot' where id = 1";
		}else if ($month == 08) {
			$tot = $statrow['aug'] + $payment;
			$statq = "UPDATE analytics SET aug = '$tot' where id = 1";
		}else if ($month == 09) {
			$tot = $statrow['sept'] + $payment;
			$statq = "UPDATE analytics SET sept = '$tot' where id = 1";
		}else if ($month == 10) {
			$tot = $statrow['oct'] + $payment;
			$statq = "UPDATE analytics SET oct = '$tot' where id = 1";
		}else if ($month == 11) {
			$tot = $statrow['nov'] + $payment;
			$statq = "UPDATE analytics SET nov = '$tot' where id = 1";
		}else{
			$tot = $statrow['decem'] + $payment;
			$statq = "UPDATE analytics SET decem = '$tot' where id = 1";
		}	

		$statqq = mysql_query($statq) or die(mysql_error());															

	$_SESSION['billnotif'] = "Successfully entered Payment!";

	header('Location: billing.php?room='.$roomid);


	//overpayment bug: if you pay again with an existing overpayment


 ?>

 

