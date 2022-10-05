<?php
    //Mulai Sesion
    session_start();
    if (isset($_SESSION["ses_nama"])==""){
		header("location: landingpage.php", true, 301);
    
    }else{
	  $data_id = $_SESSION["ses_id"];
	  $data_email = $_SESSION["ses_email"];
	  $data_nama = $_SESSION["ses_nama"];
	  $data_level = $_SESSION["ses_level"];
    }

    //menampilkan ip address menggunakan function getenv()
	function get_client_ip() {
    $ipaddress = '';
    if (getenv('HTTP_CLIENT_IP'))
        $ipaddress = getenv('HTTP_CLIENT_IP');
    else if(getenv('HTTP_X_FORWARDED_FOR'))
        $ipaddress = getenv('HTTP_X_FORWARDED_FOR');
    else if(getenv('HTTP_X_FORWARDED'))
        $ipaddress = getenv('HTTP_X_FORWARDED');
    else if(getenv('HTTP_FORWARDED_FOR'))
        $ipaddress = getenv('HTTP_FORWARDED_FOR');
    else if(getenv('HTTP_FORWARDED'))
       $ipaddress = getenv('HTTP_FORWARDED');
    else if(getenv('REMOTE_ADDR'))
        $ipaddress = getenv('REMOTE_ADDR');
    else
        $ipaddress = 'IP tidak dikenali';
    return $ipaddress;
}

	 //menampilkan jenis web browser pengunjung
function get_client_browser() {
    $browser = '';
    if(strpos($_SERVER['HTTP_USER_AGENT'], 'Netscape'))
        $browser = 'Netscape';
    else if (strpos($_SERVER['HTTP_USER_AGENT'], 'Firefox'))
        $browser = 'Firefox';
    else if (strpos($_SERVER['HTTP_USER_AGENT'], 'Chrome'))
        $browser = 'Chrome';
    else if (strpos($_SERVER['HTTP_USER_AGENT'], 'Opera'))
        $browser = 'Opera';
    else if (strpos($_SERVER['HTTP_USER_AGENT'], 'MSIE'))
        $browser = 'Internet Explorer';
  	else if (strpos($_SERVER['HTTP_USER_AGENT'], 'Browser'))
        $browser = 'Browser';
    else
        $browser = 'Other';
    return $browser;
}

	include "inc/koneksi.php";
	include "inc/rupiah.php";
?>

<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="keywords" content="wifi kassandra my id, kassandra my id, kassandra, kassandra hd production, KASSANDRA, KASSANDRA HD PRODUCTION">
    <meta name="description" content="Layanan hotspot wifi unlimited 24 jam non stop tanpa lemot kecuali saat wifi down">
 	<meta name="author" content="KASSANDRA, KASSANDRA HD PRODUCTION">
    <meta content='index,follow' name='robots'/>
	<title>KASSANDRA WIFI</title>
	<link rel="shortcut icon" href="dist/img/favicon.ico" type="image/x-icon">
	<!-- Tell the browser to be responsive to screen width -->
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	<!-- Bootstrap 3.3.6 -->
	<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
	<!-- Font Awesome -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
	<!-- Ionicons -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
	<!-- DataTables -->
	<link rel="stylesheet" href="plugins/datatables/dataTables.bootstrap.css">
	<!-- Select2 -->
	<link rel="stylesheet" href="plugins/select2/select2.min.css">
	<!-- Theme style -->
	<link rel="stylesheet" href="dist/css/AdminLTE.min.css">
	<!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
	<link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">

	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>

	<div align="center"><noscript>
	<div style="position:fixed; top:0px; left:0px; z-index:3000; height:100%; width:100%; background-color:#FFFFFF">
	<div style="font-family: Arial; font-size: 17px; background-color:#00bbf9; padding: 11pt;">Mohon aktifkan javascript pada browser untuk mengakses halaman ini! <br>
	Hak web milik kassandra.my.id | Kassandra Production | All rights reserved.
	</div></div>
	</noscript></div>
	<script type="text/javascript">
	function disableSelection(e){if(typeof e.onselectstart!="undefined")e.onselectstart=function(){return false};else if(typeof e.style.MozUserSelect!="undefined")e.style.MozUserSelect="none";else e.onmousedown=function(){return false};e.style.cursor="default"}window.onload=function(){disableSelection(document.body)}
	</script>
	
</head>

<body class="hold-transition skin-blue sidebar-mini">
	<!-- Site wrapper -->
	<div class="wrapper">

		<header class="main-header">
			<!-- Logo -->
			<a href="" class="logo">
				<span class="logo-lg">
					<marquee>
						<b>APLIKASI KASSANDRA WIFI &nbsp;&nbsp;&nbsp; ( LAYANAN INTERNET SEJUTA UMAT )</b>
					</marquee>
				</span>
			</a>
			<!-- Header Navbar: style can be found in header.less -->
			<nav class="navbar navbar-static-top">
				<!-- Sidebar toggle button-->
				<a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</a>

				 <div class="navbar-custom-menu">
      <ul class="nav navbar-nav">
        <!-- User Account: style can be found in dropdown.less -->
        <li class="dropdown user user-menu">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">
           <img src="dist/img/user.png" class="user-image" alt="User Image">
            <span class="hidden-xs"><?php echo $data_nama; ?></span>
          </a>
          <ul class="dropdown-menu">
            <!-- User image -->
            <li class="user-header">
              <img src="dist/img/user.png" class="img-circle" alt="User Image">

              <p>
              	<?php
                  $sql = $koneksi->query("SELECT * from tb_pelanggan where id_pelanggan='$data_id'");
                  while ($data= $sql->fetch_assoc()) {
                ?>
                <?php echo $data_nama; ?><br>
                <span class="label label-warning">
                Pelanggan
                </span>
                <small>Pelanggan Terdaftar Sejak <?php echo date("d - M - Y", strtotime($data['terdaftar_mulai'])) ?></small>
                <?php
								}
								?>
                
              </p>
            </li>
            <li class="user-footer">
              <div class="pull-left">
                <a href="?page=data-pelanggan" data-toggle="modal" class="btn btn-default btn-flat" id="admin_profile"><i class="fa fa-user"></i> Perbarui</a>
              </div>
              <div class="pull-right">
                <a href="logout.php" class="btn btn-default btn-flat" onclick="return confirm('Anda yakin keluar dari aplikasi ? Setelah keluar, Anda harus masuk lagi untuk mengakses fitur-fitur dalam aplikasi KassandraWiFi')"><i class="fa fa-sign-out"></i> Keluar</a>
              </div>
            </li>
          </ul>
        </li>
      </ul>
    </div>
    
				
			</nav>
		</header>

		<!-- =============================================== -->

		<!-- Left side column. contains the sidebar -->
		<aside class="main-sidebar">
			<!-- sidebar: style can be found in sidebar.less -->
			<section class="sidebar">
				<!-- Sidebar user panel -->
				<div class="user-panel">
					<div class="pull-left image">
						<img src="dist/img/user.png" class="" alt="User Image">
					</div>
					<div class="pull-left info">
						<p>
							<?php echo $data_nama; ?>
						</p>
						<span class="label label-warning">
							Pelanggan
						</span>
					</div>
				</div>
				</br>
				<!-- /.search form -->
				<!-- sidebar menu: : style can be found in sidebar.less -->
				<ul class="sidebar-menu">
					<li class="header">HOME</li>

					<!-- Level  -->

					<li class="treeview">
						<a href="?page=_plg">
							<i class="fa fa-home"></i>
							<span>Dashboard</span>
							<span class="pull-right-container">
							</span>
						</a>
					</li>

					<li class="header">PROFILE & TAGIHAN</li>
					<li class="treeview">
						<a href="?page=data-pelanggan">
							<i class="fa fa-users"></i>
							<span>Data Akun Anda</span>
							<span class="pull-right-container">
							</span>
						</a>
					</li>

					<li class="treeview">
						<a href="?page=data-tagihan">
							<i class="fa fa-dollar"></i>
							<span>Data Tagihan</span>
							<span class="pull-right-container">
							</span>
						</a>
					</li>

					<li class="treeview">
						<a href="?page=data-tagihan-lain">
							<i class="fa fa-money"></i>
							<span>Data Tagihan Lainnya</span>
							<span class="pull-right-container">
							</span>
						</a>
					</li>

					<li class="header">OTHER</li>

					<li class="treeview">
						<a href="?page=data-informasi">
							<i class="fa fa-bullhorn"></i>
							<span>Layanan Informasi</span>
							<span class="pull-right-container">
							</span>
						</a>
					</li>

					<li class="treeview">
						<a href="?page=speedtest-jaringan">
							<i class="fa fa-rss"></i>
							<span>Speedtest Server Jaringan</span>
							<span class="pull-right-container">
							</span>
						</a>
					</li>

					<li>
						<a href="logout.php" onclick="return confirm('Anda yakin keluar dari aplikasi ? Setelah keluar, Anda harus masuk lagi untuk mengakses fitur-fitur dalam aplikasi KassandraWiFi')">
							<i class="fa fa-sign-out"></i>
							<span>Logout</span>
							<span class="pull-right-container"></span>
						</a>
					</li>


			</section>
			<!-- /.sidebar -->
		</aside>

		<!-- Content Wrapper. Contains page content -->
		<div class="content-wrapper">
			<!-- Content Header (Page header) -->
			<!-- Main content -->
			<section class="content">
				<?php 
      if(isset($_GET['page'])){
          $hal = $_GET['page'];
  
          switch ($hal) {
              //Klik Halaman Home Pengguna
              case '_plg':
                  include "home/pelanggan.php";
                  break;
        
           
			//Pengguna
              case 'data-pelanggan':
                  include "pelanggan/data_pelanggan.php";
                  break;

              case 'edit-pelanggan':
                  include "pelanggan/edit_pelanggan.php";
                  break;

              case 'data-tagihan':
                  include "pelanggan/data_tagihan.php";
                  break;
              case 'bayar-tagihan':
                  include "pelanggan/bayar_tagihan.php";
                  break;

              case 'data-tagihan-lain':
                  include "pelanggan/data_tagihan_lain.php";
                  break;

              case 'data-informasi':
                  include "pelanggan/data_informasi.php";
                  break;

              case 'speedtest-jaringan':
                  include "pelanggan/speedtest_jaringan.php";
				  break;

			  case 'pembayaran':
				  include "home/merchant/pembayaran-on.php";
				  break;


              //default
              default:
			  include "home/not_found.php";
                  break;    
          }
      }else{
        // Auto Halaman Home Pengguna
          if($data_level=="PLG"){
              include "home/pelanggan.php";
              }
            }
    		?>



			</section>
			<!-- /.content -->
		</div>

		<!-- /.content-wrapper -->

		<!-- Main Footer -->
		<?php
		include "inc/footer.php";
		?>

		<div class="control-sidebar-bg"></div>

		<!-- ./wrapper -->

		<!-- jQuery 2.2.3 -->
		<script src="plugins/jQuery/jquery-2.2.3.min.js"></script>
		<!-- Bootstrap 3.3.6 -->
		<script src="bootstrap/js/bootstrap.min.js"></script>

		<script src="plugins/select2/select2.full.min.js"></script>
		<!-- DataTables -->
		<script src="plugins/datatables/jquery.dataTables.min.js"></script>
		<script src="plugins/datatables/dataTables.bootstrap.min.js"></script>

		<!-- AdminLTE App -->
		<script src="dist/js/app.min.js"></script>
		<!-- AdminLTE for demo purposes -->
		<script src="dist/js/demo.js"></script>
		<!-- page script -->


		<script>
			$(function() {
				$("#example1").DataTable();
				$('#example2').DataTable({
					"paging": true,
					"lengthChange": false,
					"searching": false,
					"ordering": true,
					"info": true,
					"autoWidth": false
				});
			});
		</script>

		<script>
			$(function() {
				//Initialize Select2 Elements
				$(".select2").select2();
			});
		</script>
</body>

</html>