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
				$sql_tampil = "SELECT p.id_pelanggan, p.nama, p.no_hp, p.alamat, t.id_tagihan, t.tagihan, t.status, t.tgl_bayar, t.bulan, t.tahun, k.id_paket, k.paket, m.id_bulan, m.bulan    
				from tb_pelanggan p inner join tb_tagihan t on p.id_pelanggan=t.id_pelanggan 
				inner join tb_paket k on k.id_paket=p.id_paket inner join tb_bulan m on m.id_bulan=t.bulan where t.id_tagihan='$id'";
				$query_tampil = mysqli_query($koneksi, $sql_tampil);
				while ($data = mysqli_fetch_array($query_tampil,MYSQLI_BOTH)) {

//kode
 
$tanggal = date("Y-m-d");

$carikode = mysqli_query($koneksi,"SELECT id_konfirmasi FROM tb_tagihan_konfirmasi order by id_konfirmasi desc");
$datakode = mysqli_fetch_array($carikode);
$kode = $datakode['id_konfirmasi'];
$urut = substr($kode, 1, 3);
$tambah = (int) $urut + 1;

if (strlen($tambah) == 1){
$format = "K"."00".$tambah;
 	}else if (strlen($tambah) == 2){
 	$format = "K"."0".$tambah;
			}else (strlen($tambah) == 3){
			$format = "K".$tambah
				}

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
	<div class="row">
		<div class="col-md-12">
			<!-- general form elements -->
			<div class="box box-success">
				<div class="box-header with-border">
					<h3 class="box-title">Konfirmasi Pembayaran ?</h3>
				</div>
				<table id="" class="table table-striped" border="0" cellspacing="0" style="width: 100%">
 						<tr>
							<th class="col-sm-2 control-label">Pelanggan :</th>
							<td>
								<?php echo $data['nama']; ?> / <?php echo $data['bulan']; ?> / <?php echo rupiah ($data['tagihan']); ?>
							</td>
						</tr>

				</table>
				<!-- /.box-header -->
				<span class="">
					<?php $stt = $data['bukti_bayar']   ?>
								<?php if($stt == ''){ ?>

				<form class="form-horizontal" action="" method="post" enctype="multipart/form-data">
					<div class="box-body">
						<div class="form-group">
							<label class="col-sm-2">Kirim bukti :</label>
							<div class="col-sm-10">
								<input type="file" class="form-control" id="bukti_bayar" name="bukti_bayar" placeholder="bukti_bayar" autocomplete="off" onchange="previewBAYAR()" required>
								<img id="preview_bayar" alt="image preview" width="30%" style="display:none" />
							</div>
						</div>	
					</div>

						<!-- /.box-body -->
						<div class="box-footer">
							<a href="../pelanggan/tagihan_plg.php?id_tagihan=<?php echo $data['id_tagihan']; ?>" class="btn btn-default">Batal</a>&emsp;
							<input type="submit" name="Simpan" value="Konfirmasi" class="btn btn-success">
						</div>
				</form>

				<?php }elseif($stt == 'LS'){ ?>
								<span class="btn btn-success" style="font-size:16px;">
									<i class="fa fa-money"></i> Anda Sudah Melakukan Konfirmasi Pembayaran
								</span>
					<?php } ?>
					</a>
				</span>
				</div>
				<!-- /.box -->
</section>
<script type="text/javascript">
		//preview gambar
		function previewBAYAR() {
		document.getElementById("preview_bayar").style.display = "block";
		var oFReader = new FileReader();
		oFReader.readAsDataURL(document.getElementById("bukti_bayar").files[0]);
	
		oFReader.onload = function(oFREvent) {
		document.getElementById("preview_bayar").src = oFREvent.target.result;
		};
		
	};
</script>

<?php
    if (isset ($_POST['Simpan'])){
		
			//kompress gambar
			function compressImage($source, $destination, $quality) {
				// Mendapatkan info gambar
				$imgInfo = getimagesize($source);
				$mime = $imgInfo['mime'];
				 
				// Membuat gambar baru dari file yang diupload
				switch($mime){
					case 'image/jpeg':
						$image = imagecreatefromjpeg($source);
						break;
					case 'image/png':
						$image = imagecreatefrompng($source);
						break;
					case 'image/gif':
						$image = imagecreatefromgif($source);
						break;
					default:
						$image = imagecreatefromjpeg($source);
				}
				 
				// simpan gambar
				imagejpeg($image, $destination, $quality);
				 
				// Return gambar yang dikompres
				return $destination;
			}
			//menyimpan bukti bayar ke folder
			//upload file ke server
			$ekstensi_diperbolehkan     = array('jpg','png', 'JPG', 'PNG', 'jpeg', 'JPEG');
			$bukti_bayar    			= $_FILES['bukti_bayar']['name'];
			$x        					= explode('.', $bukti_bayar);
			$ekstensi    				= strtolower(end($x));
			$ukuran       				= $_FILES['bukti_bayar']['size'];
			$namabarubayar 				= $data['nama']."_".$tanggal."_".$bukti_bayar;
			$file_tmp    				= $_FILES['bukti_bayar']['tmp_name'];
			//kompress gambar
			$source_img 				= $file_tmp;
			$destination_img 			= '../uploadfile/bukti_bayar/'.$namabarubayar;
			$quality 					= 50;
			compressImage($source_img, $destination_img, $quality);

$sql_simpan = "INSERT INTO tb_tagihan_konfirmasi (id_konfirmasi, id_pelanggan, id_tagihan, bukti_bayar, tgl_konfirmasi) VALUES (
           	'".$format."',
           	'".$data['id_pelanggan']."',
			'".$data['id_tagihan']."',
		 	'".$namabarubayar."',
			'".$tanggal."')";
        $query_simpan = mysqli_query($koneksi, $sql_simpan);
        mysqli_close($koneksi);

    if ($query_simpan){
        echo "<script>
        Swal.fire({title: 'Konfirmasi Pembayaran Berhasil Disimpan, Data akan otomatis berubah saat admin sudah acc',text: '',icon: 'success',confirmButtonText: 'OK'
        }).then((result) => {
            if (result.value) {
                window.location = '../pelanggan/tagihan_plg.php?&id_tagihan=$data[id_tagihan]';
            }
        })</script>";
				//Info Update Data Telegram serverku
				date_default_timezone_set('Asia/Jakarta');
				$date = date('d F Y').'%20';
				$time = date('H:i:s').'%0A';

				$id_tagihan 		= $data['id_tagihan'].'%0A';
				$nama 				= $data['nama'].'%0A';
				$bulan 				= $data['bulan'].'%0A';
				$tagihan 			= $data['tagihan'].'%0A';

				$token = '1306451202:AAFL84nqcQjbAsEpRqVCziQ0VGty4qIAxt4';
				$chat_id = '1136312864';
				$message = 'Perlu konfirmasi pembayaran Kassandra WiFi%0A'.$date.$time.'%0AID tagihan : '.$id_tagihan.'Nama : '.$nama.'Bulan : '.$bulan.'Tagihan : '.$tagihan.'';
				//$api = 'https://api.telegram.org/botTokenBotAnda/sendMessage?chat_id=xxxx&text='.$message.'';
				$api = 'https://api.telegram.org/bot'.$token.'/sendMessage?chat_id='.$chat_id.'&text='.$message.'';


				$ch = curl_init($api);
					curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
					curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
					curl_setopt($ch, CURLOPT_URL, $api);
					$result = curl_exec($ch);
					curl_close($ch);
					return $result;

        }else{
        echo "<script>
        Swal.fire({title: 'Konfirmasi Pembayaran Gagal',text: '',icon: 'error',confirmButtonText: 'OK'
        }).then((result) => {
            if (result.value) {
                window.location = '../pelanggan/konfirmasi_byr.php?&id_tagihan=$data[id_tagihan]';
            }
        })</script>";
    }
}

?>
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