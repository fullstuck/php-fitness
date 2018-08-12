<?php
session_start();
if (empty($_SESSION['username'])){
	header('location:../index.php');	
} else {
	include "../koneksi.php";
require('../fpdf17/fpdf.php');
require('../koneksi.php');


//Select the Products you want to show in your PDF file

$result=mysqli_query($koneksi, "SELECT * FROM tb_anggota ORDER BY id_anggota ASC") or die(mysql_error());

//Initialize the 3 columns and the total

$column_id_anggota = "";
$column_jenis_identitas = "";
$column_no_identitas = "";
$column_nama = "";
$column_tempat_lahir = "";
$column_tgl_lahir = "";
$column_alamat = "";
$column_no_hp = "";

//For each row, add the field to the corresponding column
while($row = mysqli_fetch_array($result))
{
	$id_anggota 		= $row["id_anggota"];
    $jenis_identitas	= $row["jenis_identitas"];
	$no_identitas 		= $row["no_identitas"];
    $nama			 	= $row["nama"];
	$tempat_lahir	 	= $row["tempat_lahir"];
	$tgl_lahir	 		= $row["tgl_lahir"];
    $alamat		 		= $row["alamat"];
	$no_hp			 	= $row["no_hp"];
	
    $column_id_anggota 			= $column_id_anggota.$id_anggota."\n";
    $column_jenis_identitas		= $column_jenis_identitas.$jenis_identitas."\n";
	$column_no_identitas 		= $column_no_identitas.$no_identitas."\n";
    $column_nama		 		= $column_nama.$nama."\n";
	$column_tempat_lahir		= $column_tempat_lahir.$tempat_lahir."\n";
	$column_tgl_lahir 			= $column_tgl_lahir.$tgl_lahir."\n";
    $column_alamat		 		= $column_alamat.$alamat."\n";
	$column_no_hp	 			= $column_no_hp.$no_hp."\n";

//Create a new PDF file
$pdf = new FPDF('L','mm',array(210,297)); //L For Landscape / P For Portrait
$pdf->AddPage();

$pdf->SetFont('Arial','B',12);
$pdf->Cell(130);
$pdf->Cell(30,10,'DATA ANGGOTA',0,0,'C');
$pdf->Ln();
$pdf->Cell(130);
$pdf->Cell(30,5,'Berikut List Data Anggota',0,0,'C');
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

$pdf->SetX(10);
$pdf->Cell(10,8,'No.',1,0,'C',1);
$pdf->SetX(20);
$pdf->Cell(35,8,'Jenis ID',1,0,'C',1);
$pdf->SetX(55);
$pdf->Cell(40,8,'No. Identitas',1,0,'C',1);
$pdf->SetX(95);
$pdf->Cell(40,8,'Nama Anggota',1,0,'C',1);
$pdf->SetX(135);
$pdf->Cell(30,8,'Tempat Lahir',1,0,'C',1);
$pdf->SetX(165);
$pdf->Cell(30,8,'Tgl. Lahir',1,0,'C',1);
$pdf->SetX(195);
$pdf->Cell(60,8,'Alamat',1,0,'C',1);
$pdf->SetX(255);
$pdf->Cell(30,8,'No. HP',1,0,'C',1);

$pdf->Ln();

//Table position, under Fields Name
$Y_Table_Position = 38;

//Now show the columns
$pdf->SetFont('Arial','',9);

$pdf->SetY($Y_Table_Position);
$pdf->SetX(10);
$pdf->MultiCell(10,6,$column_id_anggota,1,'C');

$pdf->SetY($Y_Table_Position);
$pdf->SetX(20);
$pdf->MultiCell(35,6,$column_jenis_identitas,1,'L');

$pdf->SetY($Y_Table_Position);
$pdf->SetX(55);
$pdf->MultiCell(40,6,$column_no_identitas,1,'C');

$pdf->SetY($Y_Table_Position);	
$pdf->SetX(95);
$pdf->MultiCell(40,6,$column_nama,1,'L');

$pdf->SetY($Y_Table_Position);
$pdf->SetX(135);
$pdf->MultiCell(30,6,$column_tempat_lahir,1,'L');

$pdf->SetY($Y_Table_Position);
$pdf->SetX(165);
$pdf->MultiCell(30,6,$column_tgl_lahir,1,'C');

$pdf->SetY($Y_Table_Position);	
$pdf->SetX(195);
$pdf->MultiCell(60,6,$column_alamat,1,'C');

$pdf->SetY($Y_Table_Position);
$pdf->SetX(255);
$pdf->MultiCell(30,6,$column_no_hp,1,'C');

$pdf->Output();
}
?>
