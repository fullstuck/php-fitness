<?php
include "../koneksi.php";
$id_anggota       	= $_POST['id_anggota'];
$jenis_identitas    = $_POST['jenis_identitas'];
$no_identitas      	= $_POST['no_identitas'];
$nama      			= $_POST['nama'];
$tempat_lahir       = $_POST['tempat_lahir'];
$tgl_lahir		    = $_POST['tgl_lahir'];
$jenis_kelamin     	= $_POST['jenis_kelamin'];
$alamat   			= $_POST['alamat'];
$no_hp		        = $_POST['no_hp'];

$query = mysqli_query($koneksi, "UPDATE tb_anggota SET jenis_identitas='$jenis_identitas', no_identitas='$no_identitas', nama='$nama', 
tempat_lahir='$tempat_lahir', tgl_lahir='$tgl_lahir', jenis_kelamin='$jenis_kelamin', alamat='$alamat', no_hp='$no_hp' WHERE id_anggota='$id_anggota'")or die(mysql_error());
if ($query){
header('location:anggota.php');	
} else {
	echo "gagal";
    }
?>