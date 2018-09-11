<!-- Fungsi Session -->
<?php 
session_start();
if (empty($_SESSION['username'])){
	header('location:../index.php');	
} else {
	include "../koneksi.php";
?>
<!-- End -->

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Creative - Bootstrap 3 Responsive Admin Template">
    <meta name="author" content="GeeksLabs">
    <meta name="keyword" content="Creative, Dashboard, Admin, Template, Theme, Bootstrap, Responsive, Retina, Minimal">
    <link rel="shortcut icon" href="img/favicon.png">

    <title>Sistem Member Fitness</title>

    <!-- Bootstrap CSS -->    
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- bootstrap theme -->
    <link href="css/bootstrap-theme.css" rel="stylesheet">
    <!--external css-->
    <!-- font icon -->
    <link href="css/elegant-icons-style.css" rel="stylesheet" />
    <link href="css/font-awesome.min.css" rel="stylesheet" />    
    <!-- full calendar css-->
    <link href="assets/fullcalendar/fullcalendar/bootstrap-fullcalendar.css" rel="stylesheet" />
	<link href="assets/fullcalendar/fullcalendar/fullcalendar.css" rel="stylesheet" />
    <!-- easy pie chart-->
    <link href="assets/jquery-easy-pie-chart/jquery.easy-pie-chart.css" rel="stylesheet" type="text/css" media="screen"/>
    <!-- owl carousel -->
    <link rel="stylesheet" href="css/owl.carousel.css" type="text/css">
	<link href="css/jquery-jvectormap-1.2.2.css" rel="stylesheet">
    <!-- Custom styles -->
	<link rel="stylesheet" href="css/fullcalendar.css">
	<link href="css/widgets.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link href="css/style-responsive.css" rel="stylesheet" />
	<link href="css/xcharts.min.css" rel=" stylesheet">	
	<link href="css/jquery-ui-1.10.4.min.css" rel="stylesheet">
	
	<!-- Date Picker -->
        <link href="../css/datepicker/datepicker3.css" rel="stylesheet" type="text/css" />
        <!-- Daterange picker -->
        <link href="../css/daterangepicker/daterangepicker-bs3.css" rel="stylesheet" type="text/css" />
    <!-- =======================================================
        Theme Name: NiceAdmin
        Theme URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-php-template/
        Author: BootstrapMade
        Author URL: https://bootstrapmade.com
    ======================================================= -->
  </head>

  <body>
  <!-- container section start -->
  <section id="container" class="">
     
				<!-- Fungsi Waktu Session -->
				<?php
				$timeout = 10; // Set timeout minutes
				$logout_redirect_url = "../index.php"; // Set logout URL

				$timeout = $timeout * 60; // Converts minutes to seconds
				if (isset($_SESSION['start_time'])) {
					$elapsed_time = time() - $_SESSION['start_time'];
					if ($elapsed_time >= $timeout) {
						session_destroy();
						echo "<script>alert('Session Anda Telah Habis!'); window.location = '$logout_redirect_url'</script>";
					}
				}
				$_SESSION['start_time'] = time();
				?>
				<?php } ?>
				<!-- End -->
				
      
      <header class="header dark-bg">
            <div class="toggle-nav">
                <div class="icon-reorder tooltips" data-original-title="Toggle Navigation" data-placement="bottom"><i class="icon_menu"></i></div>
            </div>

            <!--logo start-->
            <a href="index.php" class="logo">Admin <span class="lite">Fitness</span></a>
            <!--logo end-->

            <div class="nav search-row" id="top_menu">
                             
            </div>

            <div class="top-nav notification-row">                
                <!-- notificatoin dropdown start-->
                <ul class="nav pull-right top-menu">
                    
                    <!-- user login dropdown start-->
                    <li class="dropdown">
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <span class="profile-ava">
                            
							<!-- Fungsi Menampilkan Foto Admin -->
							<img src="<?php echo $_SESSION['gambar']; ?>" height="40" width="40" class="img-circle" alt="User Image" style="border: 2px solid #FFFFFF;" />
							<!-- End -->
							
                            </span>
                            <?php echo $_SESSION['fullname']; ?>
                            <b class="caret"></b>
                        </a>
                        <ul class="dropdown-menu extended logout">
                            <div class="log-arrow-up"></div>
                            <li>
                                <a href="../logout.php"><i class="icon_key_alt"></i> Log Out</a>
                            </li>
                            
                        </ul>
                    </li>
                    <!-- user login dropdown end -->
                </ul>
                <!-- notificatoin dropdown end-->
            </div>
      </header>      
      <!--header end-->

      <!--sidebar start-->
      <aside>
          <div id="sidebar"  class="nav-collapse ">
              <!-- sidebar menu start-->
              <ul class="sidebar-menu">                
                  <li class="sub-menu">
                      <a class="" href="index.php">
                          <i class="icon_house_alt"></i>
                          <span>Dashboard</span>
                      </a>
                  </li>
				  <li class="active">
                      <a href="transaksi.php" class="">
                          <i class="icon_document_alt"></i>
                          <span>Transaksi</span>
                      </a>
                  </li>       
                  <li class="sub-menu">
                      <a href="anggota.php" class="">
                          <i class="icon_desktop"></i>
                          <span>Anggota</span>
                      </a>
                  </li>
                  <li class="sub-menu">
                      <a href="member.php" class="">
                          <i class="icon_genius"></i>
                          <span>Member</span>
                      </a>
                  </li>
                  <li class="sub-menu">
                      <a href="kategori.php" class="">
                          <i class="icon_piechart"></i>
                          <span>Kategori</span>
                      </a>                 
                  </li>
                             
                  <li class="sub-menu">
                      <a href="user.php" class="">
                          <i class="icon_table"></i>
                          <span>User</span>
                      </a>
                  </li>
                                   
              </ul>
              <!-- sidebar menu end-->
          </div>
      </aside>
      <!--sidebar end-->

      <!--main content start-->
      <section id="main-content">
          <section class="wrapper">
		  <div class="row">
				<div class="col-lg-12">
					<h3 class="page-header"><i class="fa fa fa-bars"></i> Transaksi</h3>
					<ol class="breadcrumb">
						<li><i class="fa fa-home"></i><a href="index.php">Dashboard</a></li>
						<li><i class="fa fa-bars"></i>Transaksi</li>
					</ol>
				</div>
			</div>
              <!-- page start-->
			  
			 
			 <!-- Fungsi Menampilkan Data dari Database -->
					<?php
					$kd = $_GET['kd'];
					$sql = mysqli_query($koneksi,"SELECT * FROM tb_transaksi a JOIN tb_member b ON a.id_member=b.id_member 
										JOIN tb_kategori c ON a.id_kategori=c.id_kategori JOIN USER d ON a.user_id=d.user_id 
										WHERE id_transaksi='$kd'");
					if(mysqli_num_rows($sql) == 0){
						header("Location: transaksi.php");
					}else{
						$row = mysqli_fetch_assoc($sql);
					}
					if(isset($_POST['update'])){
						$id_transaksi	 	= $_POST['id_transaksi'];
						$id_member			= $_POST['id_member'];
						$id_kategori		= $_POST['id_kategori'];
						$pembayaran	 		= $_POST['pembayaran'];
						$tgl_transaksi  	= $_POST['tgl_transaksi'];
						$user_id   			= $_POST['user_id'];
						$nama_anggota		= $_POST['nama_anggota'];
						
						$update = mysqli_query($koneksi, "UPDATE tb_transaksi SET pembayaran='$pembayaran', tgl_transaksi='$tgl_transaksi', nama_anggota='$nama_anggota',
							id_member='$id_member', id_kategori='$id_kategori', user_id='$user_id' WHERE id_transaksi='$id_transaksi'") or die(mysqli_error());
						if($update){
							echo '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Data berhasil disimpan.</div>';
						}else{
							echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Data gagal disimpan, silahkan coba lagi.</div>';
							}
						}
								
						?>
			
					<!-- End -->
			  
			  
			  <div class="row">
                  <div class="col-lg-12">
                      <section class="panel">
                          <header class="panel-heading">
                              Edit Data Transaksi
                          </header>
						  <div class="panel-body">
                              <div class="form">
                                  <form class="form-horizontal style-form" action="" method="post" enctype="multipart/form-data" name="form1" id="form1">
							
							<div class="form-group ">
                                          <label for="id_transaksi" class="control-label col-lg-2">ID Transaksi </label>
                                          <div class="col-lg-2">
                                              <input class="form-control" id="id_transaksi" type="text" name="id_transaksi" value="<?php echo $row['id_transaksi'];?>" readonly="readonly" autofocus="on"/>
                                          </div>
                                      </div>
									  
                              <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">No. Card Member</label>
                              <div class="col-sm-3">
                              <select name="id_member" class="form-control" onchange="document.getElementById('nama_anggota').value = nama[this.value]" required>
                              <option value="9999"> -- Pilih No. Card Member -- </option>
                              <?php
									$query1="select tb_member.*, tb_anggota.* from tb_member,tb_anggota where tb_member.id_anggota=tb_anggota.id_anggota ";
									$tampil=mysqli_query($koneksi, $query1) or die(mysqli_error());
									$jsArray = "var nama = new Array();\n";
									while($data=mysqli_fetch_array($tampil))
									{
								?>
							<option value="<?php echo $data['id_member']; $id_member=$data['id_member']?>"><?php echo $data['no_card'];?></option>
						    <?php $jsArray .= "nama['" . $data['id_member'] . "'] = '" . addslashes($data['nama']) . "';\n";  } ?>
                              </select>
                              </div>
                          </div>
						  <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Kategori Paket</label>
                              <div class="col-sm-3">
                              <select name="id_kategori" class="form-control" onchange="document.getElementById('pembayaran').value = harga[this.value]" required>
                              <option value="0"> -- Pilih Kategori Paket -- </option>
                              <?php
									$query1="select * from tb_kategori";
									$tampil=mysqli_query($koneksi, $query1) or die(mysqli_error());
									$jsArray1 = "var harga = new Array();\n";
									while($data=mysqli_fetch_array($tampil))
									{
								?>
							<option value="<?php echo $data['id_kategori']; $id_kategori=$data['id_kategori']?>"><?php echo $data['nama_kategori'];?></option>
						    <?php $jsArray1 .= "harga['" . $data['id_kategori'] . "'] = '" . addslashes($data['biaya']) . "';\n";  } ?>
                              </select>
                              </div>
                          </div>
						   <div class="form-group ">
                                          <label for="nama_anggota" class="control-label col-lg-2">Nama <span class="required">*</span></label>
                                          <div class="col-lg-4">
                                              <input class="form-control " id="nama_anggota" type="text" name="nama_anggota" readonly required />
											  <script type="text/javascript">  
												<?php echo $jsArray; ?>  
											   </script> 
                                          </div>
                                      </div>
                                      <div class="form-group ">
                                          <label for="pembayaran" class="control-label col-lg-2">Total Pembayaran <span class="required">*</span></label>
                                          <div class="col-lg-4">
                                              <input class="form-control " id="pembayaran" type="text" name="pembayaran" readonly required />
											  <script type="text/javascript">  
												<?php echo $jsArray1; ?>  
											   </script>
                                          </div>
                                      </div>
									  <div class="form-group ">
                                          <label for="tgl_transaksi" class="control-label col-lg-2">Tanggal Transaksi <span class="required">*</span></label>
                                          <div class="col-lg-3">
                                              <input name="tgl_transaksi" id="tgl_transaksi" class="input-group date form-control" data-date="" data-date-format="yyyy-mm-dd" type="text" value="<?php echo $row['tgl_transaksi'];?>" required />  
										</div>
                                      </div>
                              <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Nama Kasir</label>
                              <div class="col-sm-3">
                              <select name="user_id" class="form-control" required>
                              <option value=""> -- Pilih Nama Kasir -- </option>
                              <?php
									$query1="select * from user";
									$tampil=mysqli_query($koneksi, $query1) or die(mysqli_error());
									while($data=mysqli_fetch_array($tampil))
									{
								?>
							<option value="<?php echo $data['user_id']; $user_id=$data['user_id']?>"><?php echo $data['fullname'];?></option>
						    <?php } ?>
                              </select>
                              </div>
                          </div>
                                      <div class="form-group">
                                          <div class="col-lg-offset-2 col-lg-10">
                                              <button class="btn btn-primary" name="update" type="submit">Save</button>
                                              <a class="btn btn-default"  href="transaksi.php">Cancel</a>
                                          </div>
                                      </div>
                                  </form>
                              </div>

                          </div>

						  
                      </section>
                  </div>
              </div>
              <!-- page end-->
			  
              <!-- page end-->
          </section>
      </section>
      <!--main content end-->
      <div class="text-right">
            <div class="credits">
                <!-- 
                    All the links in the footer should remain intact. 
                    You can delete the links only if you purchased the pro version.
                    Licensing information: https://bootstrapmade.com/license/
                    Purchase the pro version form: https://bootstrapmade.com/buy/?theme=NiceAdmin
                -->
				<div class="col-md-12">
                    <strong>&copy; 2017 Vitka Fitness Center | By : SPAN Community<strong>
                </div>
				
                </div>
        </div>
  </section>
  <!-- container section end -->
    <!-- javascripts -->
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <!-- nice scroll -->
    <script src="js/jquery.scrollTo.min.js"></script>
    <script src="js/jquery.nicescroll.js" type="text/javascript"></script><!--custome script for all page-->
    <script src="js/scripts.js"></script>
	
	<!-- daterangepicker -->
        <script src="../js/daterangepicker/daterangepicker.js" type="text/javascript"></script>
        <!-- datepicker -->
        <script src="../js/datepicker/bootstrap-datepicker.js" type="text/javascript"></script>

	<script>
		//options method for call datepicker
		$(".input-group.date").datepicker({ autoclose: true, todayHighlight: true });
		</script>

  </body>
</html>
