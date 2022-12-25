<?php

	include "../inc/koneksi.php";
	include "../inc/rupiah.php";

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


?>

<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Aplikasi KassandraWiFi</title>
	<link rel="icon" href="../dist/img/komp.png">
	<!-- Tell the browser to be responsive to screen width -->
	<meta name="keywords" content="wifi kassandra my id, kassandra my id, kassandra, kassandra hd production, KASSANDRA, KASSANDRA HD PRODUCTION">
    <meta name="description" content="Layanan hotspot wifi unlimited 24 jam non stop tanpa lemot kecuali saat wifi down">
 	<meta name="author" content="KASSANDRA, KASSANDRA HD PRODUCTION">
    <meta content='index,follow' name='robots'/>
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	<!-- Bootstrap 3.3.6 -->
	<link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
	<!-- Font Awesome -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
	<!-- Ionicons -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
	<!-- DataTables -->
	<link rel="stylesheet" href="../plugins/datatables/dataTables.bootstrap.css">
	<!-- Select2 -->
	<link rel="stylesheet" href="../plugins/select2/select2.min.css">
	<!-- Theme style -->
	<link rel="stylesheet" href="../dist/css/AdminLTE.min.css">
	<!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
	<link rel="stylesheet" href="../dist/css/skins/_all-skins.min.css">
	<link rel="shortcut icon" href="../dist/img/favicon.ico" type="image/x-icon">

	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>

	<?php
				$id = $_GET['id_tagihan'];

				$no=1;
				$sql_tampil = "SELECT p.id_pelanggan, p.nama, p.no_hp, p.alamat, t.id_tagihan, t.tagihan, t.status, t.tgl_bayar, t.bulan, t.tahun, k.id_paket, k.paket   
				from tb_pelanggan p inner join tb_tagihan t on p.id_pelanggan=t.id_pelanggan 
				inner join tb_paket k on k.id_paket=p.id_paket where id_tagihan='$id'";
				$query_tampil = mysqli_query($koneksi, $sql_tampil);
				while ($data = mysqli_fetch_array($query_tampil,MYSQLI_BOTH)) {
				?>

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
           <img src="../dist/img/user.png" class="user-image" alt="User Image">
            <span class="hidden-xs"><?php echo $data['nama']; ?></span>
          </a>
          <ul class="dropdown-menu">
            <!-- User image -->
            <li class="user-header">
              <img src="../dist/img/user.png" class="img-circle" alt="User Image">

              <p>
              	<?php echo $data['nama']; ?> <br>
                <span class="label label-warning">
                Pelanggan
                </span>
              </p>
            </li>
            <li class="user-footer">
              	<center>
	                <a href="../member.php" class="btn btn-default btn-flat"><i class="fa fa-sign-in"></i> Login Aplikasi</a>
          		</center>
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
						<img src="../dist/img/user.png" class="" alt="User Image">
					</div>
					<div class="pull-left info">
						<p>
							<?php echo $data['nama']; ?>
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
						<a href="../member.php" onclick="return confirm('Silakan Login terlebih dahulu untuk mengakses fitur-fitur dalam aplikasi KassandraWiFi')">
							<i class="fa fa-home"></i>
							<span>Dashboard</span>
							<span class="pull-right-container">
							</span>
						</a>
					</li>

					<li class="header">PROFILE & TAGIHAN</li>
					<li class="treeview">
						<a href="../member.php" onclick="return confirm('Silakan Login terlebih dahulu untuk mengakses fitur-fitur dalam aplikasi KassandraWiFi')">
							<i class="fa fa-users"></i>
							<span>Data Akun Anda</span>
							<span class="pull-right-container">
							</span>
						</a>
					</li>

					<li class="treeview">
						<a href="../member.php" onclick="return confirm('Silakan Login terlebih dahulu untuk mengakses fitur-fitur dalam aplikasi KassandraWiFi')">
							<i class="fa fa-dollar"></i>
							<span>Data Tagihan</span>
							<span class="pull-right-container">
							</span>
						</a>
					</li>

					<li class="treeview">
						<a href="../member.php" onclick="return confirm('Silakan Login terlebih dahulu untuk mengakses fitur-fitur dalam aplikasi KassandraWiFi')">
							<i class="fa fa-money"></i>
							<span>Data Tagihan Lainnya</span>
							<span class="pull-right-container">
							</span>
						</a>
					</li>

					<li class="header">OTHER</li>

					<li class="treeview">
						<a href="../member.php" onclick="return confirm('Silakan Login terlebih dahulu untuk mengakses fitur-fitur dalam aplikasi KassandraWiFi')">
							<i class="fa fa-bullhorn"></i>
							<span>Layanan Informasi</span>
							<span class="pull-right-container">
							</span>
						</a>
					</li>

					<li class="treeview">
						<a href="../member.php" onclick="return confirm('Silakan Login terlebih dahulu untuk mengakses fitur-fitur dalam aplikasi KassandraWiFi')">
							<i class="fa fa-tv"></i>
							<span>Monitor Server Jaringan</span>
							<span class="pull-right-container">
							</span>
						</a>
					</li>

					<li>
						<a href="../member.php">
							<i class="fa fa-sign-in"></i>
							<span>Login Aplikasi</span>
							<span class="pull-right-container"></span>
						</a>
					</li>


			</section>
			<!-- /.sidebar -->
		</aside>


<section class="content-wrapper">
	<section class="content">
		<section class="content-header">
			<h1 class="fa fa-dollar">
				Data Tagihan |
				<small>
					<a href="../member.php" onclick="return confirm('Silakan Login terlebih dahulu untuk mengakses fitur-fitur dalam aplikasi KassandraWiFi')">Beranda</a> > 
					<a href="../member.php" onclick="return confirm('Silakan Login terlebih dahulu untuk mengakses fitur-fitur dalam aplikasi KassandraWiFi')">Data Tagihan</a> >
					<a href="../member.php" onclick="return confirm('Silakan Login terlebih dahulu untuk mengakses fitur-fitur dalam aplikasi KassandraWiFi')">Bayar Tagihan</a>
				</small>
			</h1>
		</section>

<section class="content">
	<div class="box box-primary">
		<div class="box-header with-border">
			<b style="font-size: 14pt">Tagihan Anda</b>
			<div class="box-tools pull-right">
			</div>
			<br>
			<span class="">
					<?php $stt = $data['status']  ?>
								<?php if($stt == 'BL'){ ?>
								<span class="">
									Segera selesaikan pembayaran tagihan Anda agar selalu dapat terhubung dengan layanan hotspot KassandraWiFi. Terima Kasih 🙂
								</span>
								<?php }elseif($stt == 'LS'){ ?>
								<span class="">
									Terima Kasih sudah melunasi tagihan anda. Tetap nikmati layanan hotspot unlimited 24 jam non stop tanpa lemot kecuali saat wifi down dari KassandraWiFi 🙂
								</span>
					<?php } ?>
			<span style='font-size:15pt' class="pull-right">
			<?php $stt = $data['status']  ?>
			<?php if($stt == 'BL'){ ?>
			<span class="label label-danger">Belum Anda Bayar</span>
			<?php }elseif($stt == 'LS'){ ?>
			<span class="label label-info">Lunas</span>
			<?php } ?>

					</a>
				</span>
		</div>
		<!-- /.box-header -->
		
		<div class="box-body">
			<div class="table-responsive">
				<table id="" class="table" border="0" cellspacing="0" style="width: 100%">
	<thead>
				
<td class="col-sm-2" width='70%' align='left' style='padding-right:80px; vertical-align:top;'>
<span style='font-size:12pt'><b>Periode Tagihan</b></span></br>
<?php echo $data['bulan']; ?> / <?php echo $data['tahun']; ?>
</td>
<td style='vertical-align:top' width='30%' align='left'>
<b><td class="col-sm-2" style='vertical-align:top' width='30%' align='left'>
<b>Batas Waktu Pembayaran</b><br>
Tanggal 10 - Bulan <?php echo $data['bulan']; ?> / <?php echo $data['tahun']; ?>
</td>

</table>
<table id="" class="table table-striped" border="0" cellspacing="0" style="width: 100%">
 
							<tr>
							<th class="col-sm-2">Detail Tagihan</th>
							<td>
								:
							</td>
							</tr>


						<tr>
							<th class="col-sm-2">ID Pelanggan</th>
							<td>
								: <?php echo $data['id_pelanggan']; ?> / <?php echo $data['nama']; ?>
							</td>
						</tr>

						<tr>
							<th class="col-sm-2">Paket Internet</th>
							<td>
								: <?php echo $data['id_paket']; ?> | <?php echo $data['paket']; ?>
							</td>
						</tr>

						<tr>
							<th class="col-sm-2">Nomor Tagihan</th>
							<td>
								: <?php echo $data['id_tagihan']; ?>
							</td>
						</tr>

						<tr>
							<th class="col-sm-2">Deskripsi</th>
							<td>
								: Iuran Hotspot WiFi Bulan <?php echo $data['bulan']; ?> / <?php echo $data['tahun']; ?>
							</td>
						</tr>

						<tr>
							<th class="col-sm-2">Total Biaya</th>
							<td>
								: <?php echo rupiah($data['tagihan']); ?>
							</td>
						</tr>

						<?php $tgl = $data['tgl_bayar']  ?>
								<?php if($tgl == '0000-00-00'){ ?>
								<span class="">	
								</span>

								<?php }elseif($tgl = $data['tgl_bayar']){ ?>
								<tr>
									<th>Tanggal Bayar</th>
									<td>
									<span class="">: <?php echo tanggal ($data['tgl_bayar']); ?></span>
									</td>
								</tr>
									<?php } ?>
</table>
				</table>
				<!-- /.box-body -->
			</div>
			<center>
				<span class="">
					<?php $stt = $data['status']  ?>
								<?php if($stt == 'BL'){ ?>
								<span class="">
									<a href="../pelanggan/konfirmasi_byr.php?&id_tagihan=<?php echo $data['id_tagihan']; ?>" title="Konfirmasi"  class="btn btn-primary">
											<i class="fa fa-money"></i> Konfirmasi pembayaran
											</a>
									<a href="../home/merchant/pembayaran.php?id_tagihan=<?php echo $data['id_tagihan']; ?>" title="Bayar"  class="btn btn-warning" style="font-size:16px;">
									<i class="fa fa-dollar"></i> Bayar Sekarang
									</a>
								</span>
								<?php }elseif($stt == 'LS'){ ?>
								<span class="btn btn-success" style="font-size:16px;">
									<i class="fa fa-money"></i> Anda Sudah Melunasi Tagihan
								</span>
								<span class="btn btn"style="font-size:16px;">
									<a href="../struk/cetak_struk.php?id_tagihan=<?php echo $data['id_tagihan']; ?>" target=" _blank" title="Cetak Struk" class="btn btn-primary">
									<i class="glyphicon glyphicon-print"></i> Download / Cetak Struk</a>
								</span>
					<?php } ?>
					</a>
				</span>

			</center>
		</div>
	</div>
</section>
</section>
</section>
<?php
				}
        		?>
<!-- /.content-wrapper -->

		<footer class="main-footer">
			<div class="pull-right hidden-xs">
			</div>
			<center>
				<strong>Copyright &copy; 2019 - <?php echo date('Y'); ?>
					<a href="https://bit.ly/kassandrahdproduction" target="blank">KassandraWifi</a>.</strong> All rights reserved.<br>
          <i>Access application with <?php echo "". get_client_browser()."";?>. <?php echo "". get_client_ip()."";?></i>
			</center>
		</footer>
		<div class="control-sidebar-bg"></div>

		<!-- ./wrapper -->

		<!-- jQuery 2.2.3 -->
		<script src="../plugins/jQuery/jquery-2.2.3.min.js"></script>
		<!-- Bootstrap 3.3.6 -->
		<script src="../bootstrap/js/bootstrap.min.js"></script>

		<script src="../plugins/select2/select2.full.min.js"></script>
		<!-- DataTables -->
		<script src="../plugins/datatables/jquery.dataTables.min.js"></script>
		<script src="../plugins/datatables/dataTables.bootstrap.min.js"></script>

		<!-- AdminLTE App -->
		<script src="../dist/js/app.min.js"></script>
		<!-- AdminLTE for demo purposes -->
		<script src="../dist/js/demo.js"></script>
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