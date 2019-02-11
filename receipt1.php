<?php
require("sql_connect.php");
require('login_middleware.php');
$reg = strtoupper($_SESSION['user']);
//$reg=$_COOKIE['reg'];

$db_handle = new DBController();
$result = $db_handle->runQuery("SELECT * FROM data WHERE reg='$reg'");
$header = $db_handle->runQuery("SELECT * FROM data WHERE reg='$reg'");

require('fpdf/fpdf.php');
$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial','B',12);
foreach($header as $heading) {
	foreach($heading as $column_heading)
		$pdf->Cell(90,12,$column_heading,1);
}
foreach($result as $row) {
	$pdf->SetFont('Arial','',12);
	$pdf->Ln();
	foreach($row as $column)
		$pdf->Cell(90,12,$column,1);
}
$pdf->Output();
?>
