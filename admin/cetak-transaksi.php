<?php
session_start();
if (empty($_SESSION['username'])){
	header('location:../index.php');	
} else {
	include "../koneksi.php";
require('../fpdf17/fpdf.php');
require('../koneksi.php');


//Select the Products you want to show in your PDF file

$result=mysqli_query($koneksi, "SELECT * FROM tb_transaksi a JOIN tb_member b ON a.id_member=b.id_member 
JOIN tb_kategori c ON a.id_kategori=c.id_kategori JOIN user d ON a.user_id=d.user_id ORDER BY tgl_transaksi DESC") or die(mysql_error());

//Initialize the 3 columns and the total

$column_id_transaksi = "";
$column_id_member = "";
$column_id_kategori = "";
$column_nama_anggota = "";
$column_pembayaran = "";
$column_tgl_transaksi = "";
$column_user_id = "";


//For each row, add the field to the corresponding column
while($row = mysqli_fetch_array($result))
{
	$id_transaksi 	= $row["id_transaksi"];
    $id_member		= $row["no_card"];
	$id_kategori 	= $row["nama_kategori"];
    $nama_anggota 	= $row["nama_anggota"];
	$pembayaran 	= $row["pembayaran"];
	$tgl_transaksi 	= $row["tgl_transaksi"];
	$user_id 		= $row["fullname"];
	
    $column_id_transaksi 	= $column_id_transaksi.$id_transaksi."\n";
    $column_id_member 		= $column_id_member.$id_member."\n";
	$column_id_kategori 	= $column_id_kategori.$id_kategori."\n";
    $column_nama_anggota 	= $column_nama_anggota.$nama_anggota."\n";
	$column_pembayaran 		= $column_pembayaran.$pembayaran."\n";
    $column_tgl_transaksi 	= $column_tgl_transaksi.$tgl_transaksi."\n";
	$column_user_id 		= $column_user_id.$user_id."\n";
	

//Create a new PDF file
$pdf = new FPDF('P','mm',array(210,297)); //L For Landscape / P For Portrait
$pdf->AddPage();

$pdf->SetFont('Arial','B',13);
$pdf->Cell(80);
$pdf->Cell(30,10,'DATA LAPORAN TRANSAKSI',0,0,'C');
$pdf->Ln();
$pdf->Cell(80);
$pdf->Cell(30,5,'Berikut List Data Transaksi',0,0,'C');
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
$pdf->Cell(20,8,'No. Card',1,0,'C',1);
$pdf->SetX(40);
$pdf->Cell(50,8,'Kategori Paket',1,0,'C',1);
$pdf->SetX(90);
$pdf->Cell(40,8,'Nama Anggota',1,0,'C',1);
$pdf->SetX(130);
$pdf->Cell(20,8,'Biaya',1,0,'C',1);
$pdf->SetX(150);
$pdf->Cell(30,8,'Tgl. Transaksi',1,0,'C',1);
$pdf->SetX(180);
$pdf->Cell(20,8,'Kasir',1,0,'C',1);
$pdf->Ln();

//Table position, under Fields Name
$Y_Table_Position = 38;

//Now show the columns
$pdf->SetFont('Arial','',9);

$pdf->SetY($Y_Table_Position);
$pdf->SetX(10);
$pdf->MultiCell(10,6,$column_id_transaksi,1,'C');

$pdf->SetY($Y_Table_Position);
$pdf->SetX(20);
$pdf->MultiCell(20,6,$column_id_member,1,'C');

$pdf->SetY($Y_Table_Position);
$pdf->SetX(40);
$pdf->MultiCell(50,6,$column_id_kategori,1,'C');

$pdf->SetY($Y_Table_Position);
$pdf->SetX(90);
$pdf->MultiCell(40,6,$column_nama_anggota,1,'L');

$pdf->SetY($Y_Table_Position);
$pdf->SetX(130);
$pdf->MultiCell(20,6,$column_pembayaran,1,'C');

$pdf->SetY($Y_Table_Position);
$pdf->SetX(150);
$pdf->MultiCell(30,6,$column_tgl_transaksi,1,'C');

$pdf->SetY($Y_Table_Position);
$pdf->SetX(180);
$pdf->MultiCell(20,6,$column_user_id,1,'L');

$pdf->Output();
}
?>
