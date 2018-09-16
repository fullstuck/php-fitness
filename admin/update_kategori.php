<?php
include "../koneksi.php";
$id_kategori      = $_POST['id_kategori'];
$nama_kategori    = $_POST['nama_kategori'];
$biaya		      = $_POST['biaya'];

$query = mysqli_query($koneksi, "UPDATE tb_kategori SET nama_kategori='$nama_kategori', biaya='$biaya' WHERE id_kategori='$id_kategori'")or die(mysql_error());
if ($query){
header('location:kategori.php');	
} else {
	echo "gagal";
    }
?>