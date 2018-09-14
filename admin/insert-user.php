<?php
$namafolder="gambar/"; //tempat menyimpan file
/*
$con=mysql_connect("localhost","root","") or die("Gagal");
mysql_select_db("ecommerce")  or die("Gagal");*/
include "../koneksi.php";

if (!empty($_FILES["nama_file"]["tmp_name"]))
{
	$jenis_gambar=$_FILES['nama_file']['type'];
        //$user_id = $_POST['user_id'];
		$username= $_POST['username'];
		$password=$_POST['password'];
        $fullname=$_POST['fullname'];
        $no_hp=$_POST['no_hp'];
		
	if($jenis_gambar=="image/jpeg" || $jenis_gambar=="image/jpg" || $jenis_gambar=="image/gif" || $jenis_gambar=="image/png")
	{			
		$gambar = $namafolder . basename($_FILES['nama_file']['name']);		
		if (move_uploaded_file($_FILES['nama_file']['tmp_name'], $gambar)) {
			$sql="INSERT INTO user(username,password,fullname,no_hp,gambar) VALUES
            ('$username','$password','$fullname','$no_hp','$gambar')";
			$res=mysqli_query($koneksi, $sql) or die (mysqli_error());
			//echo "Gambar berhasil dikirim ke direktori".$gambar;
			 echo "<script>alert('Data Admin Berhasil dimasukan!'); window.location = './user.php'</script>";	
          //  echo "<h3><a href='input-admin.php'> Input Lagi</a></h3>";	   
		} else {
		   echo "<p>Gambar gagal dikirim</p>";
		}
   } else {
		echo "Jenis gambar yang anda kirim salah. Harus .jpg .gif .png";
   }
} else {
	echo "Anda belum memilih gambar";
}



?>