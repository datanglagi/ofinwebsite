<?php
use setasign\Fpdi\Fpdi;

require_once('fpdf182/fpdf.php');
require_once('FPDI-2.3.2/src/autoload.php');

// initiate FPDI
$pdf = new Fpdi();
// add a page
$pdf->AddPage();
// set the source file
$pdf->setSourceFile('report.pdf');
// import page 1
$tplIdx = $pdf->importPage(1);
// use the imported page and place it at position 10,10 with a width of 100 mm
$pdf->useTemplate($tplIdx, 0, 0, 210);

$pdf->AddPage();
$pdf->setSourceFile('report.pdf');
$tplIdx = $pdf->importPage(2);
$pdf->useTemplate($tplIdx, 0, 0, 210);

$pdf->AddPage();
$pdf->setSourceFile('report.pdf');
$tplIdx = $pdf->importPage(3);
$pdf->useTemplate($tplIdx, 0, 0, 210);

$pdf->AddPage();
$pdf->setSourceFile('report.pdf');
$tplIdx = $pdf->importPage(4);
$pdf->useTemplate($tplIdx, 0, 0, 210);

$pdf->AddPage();
$pdf->setSourceFile('report.pdf');
$tplIdx = $pdf->importPage(5);
$pdf->useTemplate($tplIdx, 0, 0, 210);

$pdf->Output();

?>