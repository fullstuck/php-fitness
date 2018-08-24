<?php
session_start();
if (empty($_SESSION['username'])){
	header('location:../index.php');	
} else {
	include "../koneksi.php";
require('../fpdf17/fpdf.php');
require('../koneksi.php');


//Select the Products you want to show in your PDF file

$result=mysqli_query($koneksi, "SELECT * FROM tb_kategori ORDER BY id_kategori ASC") or die(mysql_error());

//Initialize the 3 columns and the total

$column_id_kategori = "";
$column_nama_kategori = "";
$column_biaya = "";

//For each row, add the field to the corresponding column
while($row = mysqli_fetch_array($result))
{
	$id_kategori 	= $row["id_kategori"];
    $nama_kategori	= $row["nama_kategori"];
	$biaya	 		= $row["biaya"];
	
    $column_id_kategori 	= $column_id_kategori.$id_kategori."\n";
    $column_nama_kategori	= $column_nama_kategori.$nama_kategori."\n";
	$column_biaya 			= $column_biaya.$biaya."\n";

//Create a new PDF file
$pdf = new FPDF('P','mm',array(210,297)); //L For Landscape / P For Portrait
$pdf->AddPage();

$pdf->SetFont('Arial','B',12);
$pdf->Cell(80);
$pdf->Cell(30,10,'DATA KATEGORI PAKET',0,0,'C');
$pdf->Ln();
$pdf->Cell(80);
$pdf->Cell(30,5,'Berikut List Data Kategori Paket',0,0,'C');
$pdf->Ln();

}
//Fields Name position
$Y_Fields_Name_position = 30;

//First create each Field Name
//Gray color filling each Field Name box
$pdf->SetFillColor(207,207,207);
//Bold Font for Field Name
$pdf->SetFont('Arial','B',10);
$pdf->SetY($Y_Fields_Name_position);

$pdf->SetX(40);
$pdf->Cell(10,8,'No.',1,0,'C',1);
$pdf->SetX(50);
$pdf->Cell(80,8,'Nama Kategori Paket',1,0,'C',1);
$pdf->SetX(130);
$pdf->Cell(40,8,'Biaya',1,0,'C',1);

$pdf->Ln();

//Table position, under Fields Name
$Y_Table_Position = 38;

//Now show the columns
$pdf->SetFont('Arial','',9);

$pdf->SetY($Y_Table_Position);
$pdf->SetX(40);
$pdf->MultiCell(10,6,$column_id_kategori,1,'C');

$pdf->SetY($Y_Table_Position);
$pdf->SetX(50);
$pdf->MultiCell(80,6,$column_nama_kategori,1,'C');

$pdf->SetY($Y_Table_Position);
$pdf->SetX(130);
$pdf->MultiCell(40,6,$column_biaya,1,'C');

$pdf->Output();
}
?>
