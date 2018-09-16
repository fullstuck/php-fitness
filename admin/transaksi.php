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
                <!--  search form start -->
                <ul class="nav top-menu">                    
                    <li>
                        <form class="navbar-form" action='transaksi.php' method="POST">
                            <input class="form-control" placeholder="Cari Tgl Transaksi" type="text" name='qcari'>
                        </form>
                    </li>                    
                </ul>
                <!--  search form end -->                
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
	  
			<?php
             if(isset($_GET['hal']) == 'hapus'){
				$id_transaksi = $_GET['kd'];
				$cek = mysqli_query($koneksi, "SELECT * FROM tb_transaksi WHERE id_transaksi='$id_transaksi'");
				if(mysqli_num_rows($cek) == 0){
					echo '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> Data tidak ditemukan.</div>';
				}else{
					$delete = mysqli_query($koneksi, "DELETE FROM tb_transaksi WHERE id_transaksi='$id_transaksi'");
					if($delete){
						echo '<div class="alert alert-primary alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> Data berhasil dihapus.</div>';
					}else{
						echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> Data gagal dihapus.</div>';
					}
				}
			}
			?>

      <!--main content start-->
      <section id="main-content">
          <section class="wrapper">
		  <div class="row">
				<div class="col-lg-12">
					<h3 class="page-header"><i class="fa fa fa-bars"></i> Transaksi</h3>
					<ol class="breadcrumb">
						<li><i class="fa fa-home"></i><a href="index.php">Dashboard</a></li>
						<li><i class="fa fa-bars"></i>Transaksi</li>
						<li><a class="btn btn-info icon-btn" href="cetak-transaksi.php"><i class="fa fa-print"></i>Cetak Transaksi</a></li>
					</ol>
				</div>
			</div>
              <!-- page start-->
			  
			  <p><a class="btn btn-primary icon-btn" href="tambah_transaksi.php"><i class="fa fa-plus"></i> Tambah Transaksi	</a></p>
              
			  <div class="row">
                  <div class="col-lg-12">
                      <section class="panel">
                          <header class="panel-heading">
                              Data Transaksi
                          </header>
						  
						  <!-- Fungsi Menampikan Isi dari Database -->
									
							<?php
							$query1="SELECT id_transaksi, tb_member.no_card, tb_kategori.nama_kategori, nama_anggota,
									pembayaran, tgl_transaksi, user.fullname
									FROM tb_transaksi, tb_member, tb_kategori, user 
									WHERE tb_transaksi.id_member=tb_member.id_member AND tb_transaksi.id_kategori=tb_kategori.id_kategori
									AND tb_transaksi.user_id=user.user_id
									ORDER BY id_transaksi DESC";
							
							// Fungsi Search
							if(isset($_POST['qcari'])){
						   $qcari=$_POST['qcari'];
						   $query1="SELECT id_transaksi, tb_member.no_card, tb_kategori.nama_kategori, nama_anggota,
									pembayaran, tgl_transaksi, user.fullname
									FROM tb_transaksi, tb_member, tb_kategori, user 
									WHERE tb_transaksi.id_member=tb_member.id_member AND tb_transaksi.id_kategori=tb_kategori.id_kategori
									AND tb_transaksi.user_id=user.user_id 
									AND tgl_transaksi like '%$qcari%'";
							}
							$tampil=mysqli_query($koneksi, $query1) or die(mysqli_error());
							?>		
						  <!-- End -->
                          
                          <table class="table table-striped table-advance table-hover">
                           <tbody>
                              <tr>
                                 <th><center><i class="icon_profile"></i> No.</center></th>
								 <th><center><i class="icon_mail_alt"></i> No. Card</center></th>
                                 <th><center><i class="icon_mail_alt"></i> Nama</center></th>
								 <th><center><i class="icon_pin_alt"></i> Data Paket</center></th>
								 <th><center><i class="icon_pin_alt"></i> Total</center></th>
								 <th><center><i class="icon_mobile"></i> Tanggal Transaksi</center></th>
                                 <th><center><i class="icon_mobile"></i> Kasir</center></th>
                                 <th><center><i class="icon_cogs"></i> Action</center></th>
                              </tr>
                              <tr>
                                 <!-- Fungsi Menampilkan data dari database -->	
									<?php 
										 $no=0;
										 while($data=mysqli_fetch_array($tampil))
										{ $no++; ?>
                              
								<td><center><?php echo $no; ?></center></td>
								<td><center><?php echo $data['no_card'];?></center></td>
								<td><center><?php echo $data['nama_anggota'];?></center></td>
								<td><center><?php echo $data['nama_kategori'];?></center></td>
								<td><center><strong>Rp. <?php echo $data['pembayaran']; ?></strong></center></td>
								<td><center><span class="label label-danger"><?php echo $data['tgl_transaksi']; ?></span></center></td>
								<td><center><?php echo $data['fullname']; ?></center></td>
								
								<td><center><div id="thanks"><a class="btn btn-sm btn-info" data-placement="bottom" data-toggle="tooltip" title="Edit Transaksi" href="edit_transaksi.php?hal=edit&kd=<?php echo $data['id_transaksi'];?>"><span class="fa fa-edit"> Edit</span></a>  
								<a onclick="return confirm ('Yakin hapus <?php echo $data['nama'];?>.?');" class="btn btn-sm btn-danger tooltips" data-placement="bottom" data-toggle="tooltip" title="Hapus Transaksi" href="hapus-transaksi.php?hal=hapus&kd=<?php echo $data['id_transaksi'];?>"><span class="fa fa-ban"> Delete</span></a></center></td></tr></div>
								 <?php   
								  } 
								 ?>   								
							<!-- End -->  
                                 
                              </tr>
                                                           
                           </tbody>
                        </table>
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
