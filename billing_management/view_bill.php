<?php
session_start();
include '../_includes/connection.php';
require('../_includes/pdfMaker/fpdf.php');


$billid = $_GET['bill'];
    $query = "SELECT * FROM bill where billID = '$billid'";
    $result = mysql_query($query) or die(mysql_error());
    $row = mysql_fetch_array($result);
    $adminid = $row['adminID'];

    $query2 = "SELECT * FROM admin where adminID = '$adminid'";
    $result2 = mysql_query($query2) or die(mysql_error());
    $row2 = mysql_fetch_array($result2);


class PDF extends FPDF
{
// Page header
function Header()
{
    // Logo
    $this->Image('../_images/logo2.png',70,20,70);
    $this->Image('../_images/logo3.jpg',70,37,70);
   
    // Move to the right
    $this->Cell(80);
    // Line break
    $this->Ln(20);
}
}


$num = 9;

$pdf = new PDF();
$pdf->AddPage();
$pdf->SetFont('Arial','B',16);
$pdf->Line(10,55,200,55);
$pdf->Ln(35);
$pdf->Cell(40,0,'Official Billing Statment');
$pdf->Ln(10);
$pdf->SetLeftMargin(20);
$pdf->SetFont('Arial','B',10);
$pdf->Cell(50,10,'Bill #: '.$row['billID'],0,2,'L');
$pdf->SetLeftMargin(20);
$pdf->Text(21,87,'Date Prepared: '.$row['datePrep']);
$pdf->Text(145,87,'Prepared By: '.$row2['fname']." ".$row2['lname']);
$pdf->Text(145,80, 'Room #: '.$row['roomID']);
$pdf->SetFont('Arial','B',12);                                  
$pdf->Text(23,100,'Bill Details');
$pdf->SetFont('Arial','',10);
$pdf->Text(50,107,'Current charges:');
$pdf->Text(140,107,'Amount:');
$pdf->Text(59,112,'Rent');
$pdf->Text(59,117,'Water');
$pdf->Text(59,122,'Electricity');
$pdf->Text(140,112, $row['rent']);
$pdf->Text(140,117,$row['water']);
$pdf->Text(140,122,$row['electricity']);
$pdf->Text(110,130,'Previews Balance: '.$row['prevBalance']);
$pdf->Text(123,135,'Sub Total: '.$row['subTotal']);
$pdf->Text(114,150,'Over Payment: -'.$row['overPayment']);
$pdf->SetLineWidth(0.5);
$pdf->Line(114,152,155,152);
$pdf->SetFont('Arial','B',10);
$pdf->Text(108,170,'Total Amount Due: '.$row['total']);
$pdf->Text(108,180,'Current Bill Period: '.$row['month']."/".$row['annum']);

$pdf->SetLineWidth(0.2);
$pdf->Line(10,195,200,195);
$pdf->SetFont('Arial','',8);
$pdf->Text(10,200,'Copyright Esperanza Inc. 2016');
$pdf->Output();


?>