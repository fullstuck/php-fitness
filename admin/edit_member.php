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
				  <li class="sub-menu">
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
                  <li class="active">
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
					<h3 class="page-header"><i class="fa fa fa-bars"></i> Member</h3>
					<ol class="breadcrumb">
						<li><i class="fa fa-home"></i><a href="index.php">Dashboard</a></li>
						<li><i class="fa fa-bars"></i>Member</li>
					</ol>
				</div>
			</div>
              <!-- page start-->
			  
			  <!-- Fungsi Update Data Pada Database -->
				<?php
					$kd = $_GET['kd'];
					$sql = mysqli_query($koneksi,"SELECT * FROM tb_member a JOIN tb_anggota b ON a.id_anggota=b.id_anggota
												WHERE id_member='$kd'");
					if(mysqli_num_rows($sql) == 0){
						header("Location: transaksi.php");
					}else{
						$row = mysqli_fetch_assoc($sql);
					}
					if(isset($_POST['update'])){
						$id_member		 	= $_POST['id_member'];
						$no_card			= $_POST['no_card'];
						$id_anggota			= $_POST['id_anggota'];
						$tgl_daftar	 		= $_POST['tgl_daftar'];
						$tgl_expired  		= $_POST['tgl_expired'];
						$keterangan   		= $_POST['keterangan'];
						
						$update = mysqli_query($koneksi, "UPDATE tb_member SET no_card='$no_card', id_anggota='$id_anggota', 
							tgl_daftar='$tgl_daftar', tgl_expired='$tgl_expired', keterangan='$keterangan' WHERE id_member='$id_member'") or die(mysqli_error());
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
                              Edit Data Member
                          </header>
						  
						  <div class="panel-body">
                              <div class="form">
                                  <form class="form-horizontal style-form" action="" method="post" enctype="multipart/form-data" name="form1" id="form1">
									<div class="form-group ">
                                          <label for="id_member" class="control-label col-lg-2">ID Member <span class="required">*</span></label>
                                          <div class="col-lg-1">
                                              <input class="form-control" id="id_member" name="id_member"  type="text" value="<?php echo $row['id_member']; ?>" readonly="readonly" autofocus="on" />
                                          </div>
                                      </div>
									<div class="form-group ">
                                          <label for="no_card" class="control-label col-lg-2">No. Card <span class="required">*</span></label>
                                          <div class="col-lg-2">
                                              <input class="form-control" id="no_card" name="no_card" type="text" value="<?php echo $row['no_card']; ?>" readonly="readonly" autofocus="on" />
                                          </div>
                                      </div>
									  <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Nama Anggota</label>
                              <div class="col-sm-3">
                              <select name="id_anggota" class="form-control" required>
                              <option value=""> -- Pilih Nama Anggota -- </option>
                              <?php
									$query1="select * from tb_anggota";
									$tampil=mysqli_query($koneksi, $query1) or die(mysqli_error());
									while($data=mysqli_fetch_array($tampil))
									{
								?>
							<option value="<?php echo $data['id_anggota']; $id_anggota=$data['id_anggota']?>"><?php echo $data['nama'];?></option>
						    <?php } ?>
                              </select>
                              </div>
                          </div>
						  <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">kategori</label>
                              <div class="col-sm-3">
                              <select name="id_kategori" class="form-control" required>
                              <option value=""> -- Pilih Kategori -- </option>
                              <?php
									$query1="select * from tb_kategori";
									$tampil=mysqli_query($koneksi, $query1) or die(mysqli_error());
									while($data=mysqli_fetch_array($tampil))
									{
								?>
							<option value="<?php echo $data['id_kategori']; $id_kategori=$data['id_kategori']?>"><?php echo $data['nama_kategori'];?></option>
						    <?php } ?>
                              </select>
                              </div>
                          </div>
                                      <div class="form-group ">
                                          <label for="tgl_daftar" class="control-label col-lg-2">Tanggal Pendaftaran <span class="required">*</span></label>
                                          <div class="col-lg-3">
                                              <input name="tgl_daftar" id="tgl_daftar" class="input-group date form-control" data-date="" data-date-format="yyyy-mm-dd" type="text" value="<?php echo $row['tgl_daftar']; ?>"/>  
										</div>
                                      </div>
									  <div class="form-group ">
                                          <label for="tgl_expired" class="control-label col-lg-2">Tanggal Expired <span class="required">*</span></label>
                                          <div class="col-lg-3">
                                              <input name="tgl_expired" id="tgl_expired" class="input-group date form-control" data-date="" data-date-format="yyyy-mm-dd" type="text" value="<?php echo $row['tgl_expired']; ?>" />  
										</div>
                                      </div>
                                      <div class="form-group ">
                                          <label for="keterangan" class="control-label col-lg-2">Keterangan <span class="required">*</span></label>
                                          <div class="col-lg-6">
                                              <input class="form-control " id="keterangan" type="text" name="keterangan" value="<?php echo $row['keterangan']; ?>" />
                                          </div>
                                      </div>
                                      <div class="form-group">
                                          <div class="col-lg-offset-2 col-lg-10">
                                              <button class="btn btn-primary" name="update" type="submit">Save</button>
                                              <a class="btn btn-default"  href="member.php">Cancel</a>
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
