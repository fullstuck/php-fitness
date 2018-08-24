<?php
session_start();
if (empty($_SESSION['username'])){
	header('location:../index.php');	
} else {
	include "../koneksi.php";
require('../fpdf17/fpdf.php');
require('../koneksi.php');


//Select the Products you want to show in your PDF file

$result=mysqli_query($koneksi, "SELECT * FROM tb_member a JOIN tb_anggota b ON a.id_anggota=b.id_anggota 
JOIN tb_kategori c ON a.id_kategori=c.id_kategori ORDER BY id_member ASC") or die(mysql_error());

//Initialize the 3 columns and the total

$column_id_member = "";
$column_no_card = "";
$column_id_anggota = "";
$column_id_kategori = "";
$column_tgl_daftar = "";
$column_tgl_expired = "";


//For each row, add the field to the corresponding column
while($row = mysqli_fetch_array($result))
{
	$id_member 		= $row["id_member"];
    $no_card		= $row["no_card"];
	$id_anggota 	= $row["nama"];
    $id_kategori 	= $row["nama_kategori"];
	$tgl_daftar 	= $row["tgl_daftar"];
	$tgl_expired 	= $row["tgl_expired"];
	
    $column_id_member 		= $column_id_member.$id_member."\n";
    $column_no_card 		= $column_no_card.$no_card."\n";
	$column_id_anggota 		= $column_id_anggota.$id_anggota."\n";
    $column_id_kategori 	= $column_id_kategori.$id_kategori."\n";
	$column_tgl_daftar 		= $column_tgl_daftar.$tgl_daftar."\n";
    $column_tgl_expired 	= $column_tgl_expired.$tgl_expired."\n";
	

//Create a new PDF file
$pdf = new FPDF('P','mm',array(210,297)); //L For Landscape / P For Portrait
$pdf->AddPage();

$pdf->SetFont('Arial','B',13);
$pdf->Cell(80);
$pdf->Cell(30,10,'DATA MEMBER FITNESS',0,0,'C');
$pdf->Ln();
$pdf->Cell(80);
$pdf->Cell(30,5,'Berikut List Data Member Fitness',0,0,'C');
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
$pdf->Cell(40,8,'Nama Member',1,0,'C',1);
$pdf->SetX(80);
$pdf->Cell(60,8,'Kategori Paket',1,0,'C',1);
$pdf->SetX(140);
$pdf->Cell(30,8,'Tgl. Daftar',1,0,'C',1);
$pdf->SetX(170);
$pdf->Cell(30,8,'Tgl. Berakhir',1,0,'C',1);
$pdf->Ln();

//Table position, under Fields Name
$Y_Table_Position = 38;

//Now show the columns
$pdf->SetFont('Arial','',9);



$pdf->SetY($Y_Table_Position);
$pdf->SetX(10);
$pdf->MultiCell(10,6,$column_id_member,1,'C');

$pdf->SetY($Y_Table_Position);
$pdf->SetX(20);
$pdf->MultiCell(20,6,$column_no_card,1,'C');

$pdf->SetY($Y_Table_Position);
$pdf->SetX(40);
$pdf->MultiCell(40,6,$column_id_anggota,1,'L');

$pdf->SetY($Y_Table_Position);
$pdf->SetX(80);
$pdf->MultiCell(60,6,$column_id_kategori,1,'C');

$pdf->SetY($Y_Table_Position);
$pdf->SetX(140);
$pdf->MultiCell(30,6,$column_tgl_daftar,1,'C');

$pdf->SetY($Y_Table_Position);
$pdf->SetX(170);
$pdf->MultiCell(30,6,$column_tgl_expired,1,'C');

$pdf->Output();
}
?>
