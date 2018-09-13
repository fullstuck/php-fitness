<?php
include "../koneksi.php";
$id_anggota = $_GET['kd'];

$query = mysqli_query($koneksi, "DELETE FROM tb_anggota WHERE id_anggota='$id_anggota'");
if ($query){
	echo "<script>alert('Data Berhasil dihapus!'); window.location = 'anggota.php'</script>";	
} else {
	echo "<script>alert('Data Gagal dihapus!'); window.location = 'anggota.php'</script>";	
}
?>