<?php
include "../koneksi.php";
$id_kategori = $_GET['kd'];

$query = mysqli_query($koneksi, "DELETE FROM tb_kategori WHERE id_kategori='$id_kategori'");
if ($query){
	echo "<script>alert('Data Berhasil dihapus!'); window.location = 'kategori.php'</script>";	
} else {
	echo "<script>alert('Data Gagal dihapus!'); window.location = 'kategori.php'</script>";	
}
?>