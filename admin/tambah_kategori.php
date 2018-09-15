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
                  <li class="sub-menu">
                      <a href="member.php" class="">
                          <i class="icon_genius"></i>
                          <span>Member</span>
                      </a>
                  </li>
                  <li class="active">
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
					<h3 class="page-header"><i class="fa fa fa-bars"></i> Kategori</h3>
					<ol class="breadcrumb">
						<li><i class="fa fa-home"></i><a href="index.php">Dashboard</a></li>
						<li><i class="fa fa-bars"></i>Kategori</li>
					</ol>
				</div>
			</div>
              <!-- page start-->
			  
			  <!-- Fungsi Memasukkan Data kedalam Database -->
					<?php
						if(isset($_POST['input'])){
							$nama_kategori		= $_POST['nama_kategori'];
							$biaya				= $_POST['biaya'];
							
							$cek = mysqli_query($koneksi, "SELECT * FROM tb_kategori WHERE nama_kategori='$nama_kategori'");
							if(mysqli_num_rows($cek) == 0){
									$insert = mysqli_query($koneksi, "INSERT INTO tb_kategori(nama_kategori, biaya)
																		VALUES('$nama_kategori', '$biaya')") 
																		or die(mysqli_error());
									if($insert){
										echo '<div class="alert alert-info alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Data Kategori Berhasil Di Simpan.</div>';
									}else{
										echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Ups, Data Kategori Gagal Di simpan !</div>';
									}
							}else{
								echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Kategori Sudah Ada..!</div>';
							}
						}
						?>
					<!-- End -->	
			  
			  
			  <div class="row">
                  <div class="col-lg-12">
                      <section class="panel">
                          <header class="panel-heading">
                              Input Data Kategori
                          </header>
						  
						  <div class="panel-body">
                              <div class="form">
                                  <form class="form-horizontal style-form" action="tambah_kategori.php" method="post" enctype="multipart/form-data" name="form1" id="form1">
									<div class="form-group ">
                                          <label for="nama_kategori" class="control-label col-lg-2">Nama Kategori <span class="required">*</span></label>
                                          <div class="col-lg-3">
                                              <input class="form-control" id="nama_kategori" name="nama_kategori"  type="text" required />
                                          </div>
                                      </div>
                                      <div class="form-group ">
                                          <label for="biaya" class="control-label col-lg-2">Biaya <span class="required">*</span></label>
                                          <div class="col-lg-2">
                                              <input class="form-control " id="biaya" type="text" name="biaya" required />
                                          </div>
                                      </div>
                                      <div class="form-group">
                                          <div class="col-lg-offset-2 col-lg-10">
                                              <button class="btn btn-primary" name="input" type="submit">Save</button>
                                              <a class="btn btn-default"  href="kategori.php">Cancel</a>
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


  </body>
</html>
