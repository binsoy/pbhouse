<?php
session_start();
include '../_includes/connection.php';
require('../_includes/pdfMaker/fpdf.php');


    $invoiceid = $_GET['invoice'];
    $query = "SELECT * FROM invoice where invoiceID = '$invoiceid'";
    $result = mysql_query($query) or die(mysql_error());
    $row = mysql_fetch_array($result);
    $tenantid = $row['payee'];

    $query2 = "SELECT * FROM tenant where tenantID = '$tenantid'";
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


$pdf = new PDF();
$pdf->AddPage();
$pdf->SetFont('Arial','B',16);
$pdf->Line(10,55,200,55);
$pdf->Ln(35);
$pdf->Cell(40,0,'Official Receipt');
$pdf->Ln(10);
$pdf->SetLeftMargin(20);
$pdf->SetFont('Arial','B',10);
$pdf->Cell(50,10,'Invoice #: '.$row['invoiceID'],0,2,'L');
$pdf->SetLeftMargin(20);
$pdf->Text(21,87,'Date Prepared: '.$row['datePaid']);
$pdf->Text(160,80, 'Room #: '.$row['roomID']);
$pdf->SetFont('Arial','B',12);
$pdf->Text(15,100,'Amount Paid');
$pdf->Text(85,100,'Date Paid');
$pdf->Text(160,100,'Payee');
$pdf->SetLineWidth(1);
$pdf->Line(15,103,175,103);
$pdf->SetFont('Arial','',11);
$pdf->Text(15,110,$row['amountPaid']);
$pdf->Text(85,110, $row['datePaid']);
$pdf->Text(160,110,$row2['fname']." ".$row2['lname']);
$pdf->SetLineWidth(0.2);
$pdf->Line(10,120,200,120);
$pdf->SetFont('Arial','',8);
$pdf->Text(10,125,'Copyright Esperanza Inc. 2016');
$pdf->Output();


?>