<?php
include "../koneksi.php";
$id_member = $_GET['kd'];

$query = mysqli_query($koneksi, "DELETE FROM tb_member WHERE id_member='$id_member'");
if ($query){
	echo "<script>alert('Data Berhasil dihapus!'); window.location = 'member.php'</script>";	
} else {
	echo "<script>alert('Data Gagal dihapus!'); window.location = 'member.php'</script>";	
}
?>