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
                        <form class="navbar-form" action='index.php' method="POST">
                            <input class="form-control" placeholder="Cari Tgl Expired" type="text" name='qcari'>
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
                  <li class="active">
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
              <!--overview start-->
			  <div class="row">
				<div class="col-lg-12">
					<h3 class="page-header"><i class="fa fa-laptop"></i> Dashboard</h3>
					<ol class="breadcrumb">
						<li><i class="fa fa-home"></i><a href="index.php">Home</a></li>
						<li><i class="fa fa-laptop"></i>Dashboard</li>						  	
					</ol>
				</div>
			</div>
              
            <div class="row">
				<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
					<div class="info-box blue-bg">
						<i class="fa fa-cloud-download"></i>
				            <!-- Fungsi Menampilkan Total Anggota dari Database -->
								<b><?php $tampil=mysqli_query($koneksi, "select * from tb_anggota order by id_anggota desc");
									$total=mysqli_num_rows($tampil);
								?>
								<div class="count"><?php echo "$total"; ?></div>
							<!-- End -->
						<div class="title">Anggota</div>						
					</div><!--/.info-box-->			
				</div><!--/.col-->
				
				<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
					<div class="info-box brown-bg">
						<i class="fa fa-shopping-cart"></i>
							<!-- Fungsi Menampilkan Total Transaksi dari Database -->
								<b><?php $tampil=mysqli_query($koneksi, "select * from tb_transaksi order by id_transaksi desc");
									$total=mysqli_num_rows($tampil);
								?>
								<div class="count"><?php echo "$total"; ?></div>
							<!-- End -->
					<div class="title">Transaksi</div>						
					</div><!--/.info-box-->			
				</div><!--/.col-->	
				
				<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
					<div class="info-box dark-bg">
						<i class="fa fa-thumbs-o-up"></i>
						<!-- Fungsi Menampilkan Total Member dari Database -->
								<b><?php $tampil=mysqli_query($koneksi, "select * from tb_member order by id_member desc");
									$total=mysqli_num_rows($tampil);
								?>
								<div class="count"><?php echo "$total"; ?></div>
							<!-- End -->
						<div class="title">Member</div>						
					</div><!--/.info-box-->			
				</div><!--/.col-->
				
				<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
					<div class="info-box green-bg">
						<i class="fa fa-cubes"></i>
						<!-- Fungsi Menampilkan Total Kategori dari Database -->
								<b><?php $tampil=mysqli_query($koneksi, "select * from tb_kategori order by id_kategori desc");
									$total=mysqli_num_rows($tampil);
								?>
								<div class="count"><?php echo "$total"; ?></div>
							<!-- End -->
						<div class="title">Kategori</div>						
					</div><!--/.info-box-->			
				</div><!--/.col-->
				
			</div><!--/.row-->
		
			<div class="row">
                  <div class="col-lg-12">
                      <section class="panel">
                          <header class="panel-heading">
                              <strong>Data Member Vitka Fitness Center</strong>
                          </header>
                          
						   <!-- Fungsi Menampikan Isi dari Database -->
						  <?php
									$query1="SELECT no_card, tb_anggota.nama, tb_kategori.nama_kategori, alamat, tgl_expired, no_hp
									FROM tb_member, tb_anggota, tb_kategori WHERE 
									tb_anggota.id_anggota=tb_member.id_anggota AND tb_member.id_kategori=tb_kategori.id_kategori
									ORDER BY id_member DESC LIMIT 5";
									$hasil=mysqli_query($koneksi, $query1) or die(mysqli_error());
									?>
									
							<?php
							$query1="SELECT id_member, no_card, tb_anggota.nama, tb_kategori.nama_kategori, alamat, tgl_expired, no_hp
									FROM tb_member, tb_anggota, tb_kategori WHERE 
									tb_anggota.id_anggota=tb_member.id_anggota AND tb_member.id_kategori=tb_kategori.id_kategori
									ORDER BY id_member DESC LIMIT 10";
							
							// Fungsi Search
							if(isset($_POST['qcari'])){
						   $qcari=$_POST['qcari'];
						   $query1="SELECT id_member, no_card, tb_anggota.nama, tb_kategori.nama_kategori, alamat, tgl_expired, no_hp
									FROM tb_member, tb_anggota, tb_kategori WHERE 
									tb_anggota.id_anggota=tb_member.id_anggota AND tb_member.id_kategori=tb_kategori.id_kategori 
									AND tgl_expired like '%$qcari%'";
							}
							$tampil=mysqli_query($koneksi, $query1) or die(mysqli_error());
							?>		
						  <!-- End -->
						  
                          <table class="table table-striped table-advance table-hover">
                           <tbody>
                              <tr>
                                 <th><center><i class="icon_profile"></i> No.</center></th>
                                 <th><center><i class="icon_calendar"></i> No. Card</center></th>
                                 <th><center><i class="icon_mail_alt"></i> Nama</center></th>
                                 <th><center><i class="icon_pin_alt"></i> Kategori</center></th>
								 <th><center><i class="icon_pin_alt"></i> Alamat</center></th>
								 <th><center><i class="icon_mobile"></i> Tanggal Expired</center></th>
                                 <th><center><i class="icon_mobile"></i> No. HP</center></th>
                              </tr>
							  <tr>
                              <!-- Fungsi Menampilkan data dari database -->	
									<?php 
										 $no=0;
										 while($data=mysqli_fetch_array($tampil))
										{ $no++; ?>
                              
								<td><center><?php echo $no; ?></center></td>
								<td><center><?php echo $data['no_card'];?></center></td>
								<td><a href="detail_member.php?hal=edit&kd=<?php echo $data['nama'];?>"><span class="fa fa-user fa-lg"></span> <?php echo $data['nama'];?></td>
								<td><center><strong><?php echo $data['nama_kategori']; ?></strong></center></td>
								<td><center><?php echo $data['alamat'];?></center></td>
								<td><center><span class="label label-danger"><?php echo $data['tgl_expired']; ?></span></center></td>
								<td><center><?php echo $data['no_hp']; ?></center></td>
								</tr></div>
								<?php } ?>   
            <!-- End -->  
							 
                           </tbody>
                        </table>
                      </section>
                

                
              <!-- project team & activity end -->

         
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
      <!--main content end-->
  </section>
  <!-- container section start -->

    <!-- javascripts -->
    <script src="js/jquery.js"></script>
	<script src="js/jquery-ui-1.10.4.min.js"></script>
    <script src="js/jquery-1.8.3.min.js"></script>
    <script type="text/javascript" src="js/jquery-ui-1.9.2.custom.min.js"></script>
    <!-- bootstrap -->
    <script src="js/bootstrap.min.js"></script>
    <!-- nice scroll -->
    <script src="js/jquery.scrollTo.min.js"></script>
    <script src="js/jquery.nicescroll.js" type="text/javascript"></script>
    <!-- charts scripts -->
    <script src="assets/jquery-knob/js/jquery.knob.js"></script>
    <script src="js/jquery.sparkline.js" type="text/javascript"></script>
    <script src="assets/jquery-easy-pie-chart/jquery.easy-pie-chart.js"></script>
    <script src="js/owl.carousel.js" ></script>
    <!-- jQuery full calendar -->
    <<script src="js/fullcalendar.min.js"></script> <!-- Full Google Calendar - Calendar -->
	<script src="assets/fullcalendar/fullcalendar/fullcalendar.js"></script>
    <!--script for this page only-->
    <script src="js/calendar-custom.js"></script>
	<script src="js/jquery.rateit.min.js"></script>
    <!-- custom select -->
    <script src="js/jquery.customSelect.min.js" ></script>
	<script src="assets/chart-master/Chart.js"></script>
   
    <!--custome script for all page-->
    <script src="js/scripts.js"></script>
    <!-- custom script for this page-->
    <script src="js/sparkline-chart.js"></script>
    <script src="js/easy-pie-chart.js"></script>
	<script src="js/jquery-jvectormap-1.2.2.min.js"></script>
	<script src="js/jquery-jvectormap-world-mill-en.js"></script>
	<script src="js/xcharts.min.js"></script>
	<script src="js/jquery.autosize.min.js"></script>
	<script src="js/jquery.placeholder.min.js"></script>
	<script src="js/gdp-data.js"></script>	
	<script src="js/morris.min.js"></script>
	<script src="js/sparklines.js"></script>	
	<script src="js/charts.js"></script>
	<script src="js/jquery.slimscroll.min.js"></script>
  

  </body>
</html>
