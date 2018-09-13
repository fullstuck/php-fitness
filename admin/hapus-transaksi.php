<?php
include "../koneksi.php";
$id_transaksi = $_GET['kd'];

$query = mysqli_query($koneksi, "DELETE FROM tb_transaksi WHERE id_transaksi='$id_transaksi'");
if ($query){
	echo "<script>alert('Data Berhasil dihapus!'); window.location = 'transaksi.php'</script>";	
} else {
	echo "<script>alert('Data Gagal dihapus!'); window.location = 'transaksi.php'</script>";	
}
?>