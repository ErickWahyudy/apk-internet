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
    if(isset($_GET['kode'])){
        $sql_cek = "SELECT * FROM tb_pelanggan inner join tb_paket on tb_pelanggan.id_paket=tb_paket.id_paket WHERE nama='".$_GET['kode']."'";
        $query_cek = mysqli_query($koneksi, $sql_cek);
        $data_cek = mysqli_fetch_array($query_cek,MYSQLI_BOTH);
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
            <span class="hidden-xs"><?php echo $data_cek['nama']; ?></span>
          </a>
          <ul class="dropdown-menu">
            <!-- User image -->
            <li class="user-header">
              <img src="../dist/img/user.png" class="img-circle" alt="User Image">

              <p>
              	<?php echo $data_cek['nama']; ?> <br>
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
							<?php echo $data_cek['nama']; ?>
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
			<h1 class="fa fa-users">
				Data Pelanggan |
				<small>
					<a href="../member.php" onclick="return confirm('Silakan Login terlebih dahulu untuk mengakses fitur-fitur dalam aplikasi KassandraWiFi')">Beranda</a> > 
					<a href="../member.php" onclick="return confirm('Silakan Login terlebih dahulu untuk mengakses fitur-fitur dalam aplikasi KassandraWiFi')">Data Pelanggan</a> >
					<a href="../member.php" onclick="return confirm('Silakan Login terlebih dahulu untuk mengakses fitur-fitur dalam aplikasi KassandraWiFi')">Update Data</a>
				</small>
			</h1>
		</section>

<section class="content">
	<div class="row">
		<div class="col-md-12">
			<!-- general form elements -->
			<div class="box box-success">
				<div class="box-header with-border">
					<h3 class="box-title">Update Data</h3>
					<p><b>*NB</b> : Jika ingin ganti paket internet silakan hubungi admin via <a href="https://api.whatsapp.com/send?phone=6281456141227&text=Assalamu'alaikum..%0Asaya atas nama <?php echo $data_cek['nama']; ?> ingin ***(KEPERLUAN ANDA)***">Whatsapp</a></p>
					<div class="box-tools pull-right">
					</div>
				</div>
				<!-- /.box-header -->
				<form class="form-horizontal" action="" method="post" enctype="multipart/form-data">
					<div class="box-body">
						<div class="form-group">
							<label class="col-sm-2 control-label">Paket Internet</label>
							<div class="col-sm-6">
								<input type="text" class="form-control" id="id_paket" name="id_paket" value="<?php echo $data_cek['id_paket']; ?> | <?php echo $data_cek['paket']; ?>"
								 readonly/>
							</div>
						</div>

						<div class="form-group">
							<label class="col-sm-2 control-label">Nama Lengkap</label>
							<div class="col-sm-6">
								<input type="text" class="form-control" id="nama" name="nama" value="<?php echo $data_cek['nama']; ?>" autocomplete="off" >
							</div>
						</div>

						<div class="form-group">
							<label class="col-sm-2 control-label">Alamat <br>
								<small>(Jalan, Rt/Rw, Desa, Kecamatan, Kabupaten)</small></label>
							<div class="col-sm-6">
								<input type="text" class="form-control" id="alamat" name="alamat" value="<?php echo $data_cek['alamat']; ?>">
							</div>
						</div>

						<div class="form-group">
							<label class="col-sm-2 control-label">No HP / WA (Awali : 62) <br>
							<small>Contoh : 6281456767989</small></label>
							<div class="col-sm-6">
								<input type="number" class="form-control" id="no_hp" name="no_hp" value="<?php echo $data_cek['no_hp']; ?>" autocomplete="off">
							</div>
						</div>

						<div class="form-group">
							<label class="col-sm-2 control-label">E-Mail <br>
							<small>(Usahakan alamat e-mail yang masih aktif di HP anda)</small></label>
							<div class="col-sm-6">
								<input type="email" class="form-control" id="email" name="email" value="<?php echo $data_cek['email']; ?>" autocomplete="off"/>
							</div>
						</div>


						<div class="form-group">
							<label class="col-sm-2 control-label">Password<br>
							<small>(Bebas yang penting mudah diingat)</small></label>
							<div class="col-sm-6">
								<input type="text" class="form-control" id="password" name="password" value="<?php echo $data_cek['password']; ?>" autocomplete="off">
							</div>
						</div>

						<!-- Token dan ID Chat telegram erik -->
						<input type="hidden" class="form-control" id="token" name="token" value="1306451202:AAFL84nqcQjbAsEpRqVCziQ0VGty4qIAxt4" >
						<input type="hidden" class="form-control" id="chat_id" name="chat_id" value="1136312864" >

						<!-- /.box-body -->
						<div class="box-footer">
							<a href="?page=data-pelanggan" class="btn btn-default">Batal</a>
							<input type="submit" name="Ubah" value="Simpan" class="btn btn-success">
						</div>
				</form>
				</div>
				<!-- /.box -->
		</section>
	</section>
</section>

<?php

if (isset ($_POST['Ubah'])){
    //mulai Mahasiswaoses ubah
    $sql_ubah = "UPDATE tb_pelanggan SET
		nama='".$_POST['nama']."',
		alamat='".$_POST['alamat']."',
		no_hp='".$_POST['no_hp']."',
		email='".$_POST['email']."',
		password='".$_POST['password']."'
        WHERE id_pelanggan='".$_POST['id_pelanggan']."'";
    $query_ubah = mysqli_query($koneksi, $sql_ubah);

    if ($query_ubah) {
        echo "<script>
        Swal.fire({title: 'Ubah Data Berhasil',text: '',icon: 'success',confirmButtonText: 'OK'
        }).then((result) => {
            if (result.value) {
                window.location = 'aplication.php?page=data-pelanggan';
            }
        })</script>";

			//Info Update Data di Email client
			require 'email/PHPMailer/src/PHPMailer.php' ;
			require 'email/PHPMailer/src/SMTP.php';
			require 'email/PHPMailer/src/Exception.php';

			include "inc/koneksi.php"; //memulai koneksi ke database
			// Cek koneksi
			if (mysqli_connect_errno()) {
				echo "Koneksi database gagal : " . mysqli_connect_error();
			}

				$mail =  new PHPMailer\PHPMailer\PHPMailer();
				//$mail->IsSMTP();
				$mail->IsHTML(true);
				//$mail->SMTPAuth     = true;
				//$mail->Host         = "smtp.gmail.com";
				//$mail->Port         = 587;
				//$mail->SMTPSecure   = "tls";
				//$mail->Username     = "kassandramikrotik@gmail.com";   //username SMTP
				//$mail->Password     = "abzdjiivohwzwieo";                 //password SMTP
				$mail->From         = "wifi@kassandra.my.id";   //email pengirim
				$mail->FromName     = "KASSANDRA WiFi";                   //nama  pengirim
				$mail->AddAddress($_POST['email']); //email dan nama penerima
				$mail->Subject  	= "Terima kasih ".$_POST['nama']." data anda di Aplikasi Kassandra WiFi berhasil diperbarui"; //judul email
				$mail->Body     	=  "<h2>Terima kasih ".$_POST['nama']." data anda di Aplikasi Kassandra WiFi berhasil 						diperbarui</h2>" .
									"</p><table><thead><tr>
										<td style=font-family:Roboto,RobotoDraft,Helvetica,Arial,sans-serif;border-width:1px;border-style:dashed;border-color:rgb(37,63,89);background:lavender;color:rgb(0,0,0);font-size:16px;padding-left:1em;padding-right:1em>  ".
									"<br>Berikut kami sampaikan mengenai data terbaru anda :" .
									"<br>Nama Pelanggan : " .$_POST['nama'] . 
									"<br>Alamat         : " .$_POST['alamat'] .
									"<br>Paket Internet : " .$_POST['id_paket'] . " | " .$_POST['paket'] .
									"<br>No HP          : " .$_POST['no_hp'] .
									"<br>Email		    : " .$_POST['email'] .
									"<br>Password       : " .$_POST['password'] .
									"<br><br>Tetap nikmati layanan hotspot unlimited 24 jam non stop tanpa lemot kecuali saat wifi down." .
									"<br><br><p align=center colspan=2 style=font-family:Roboto,RobotoDraft,Helvetica,Arial,sans-serif>
									<a href='https://wifi.kassandra.my.id' style=color:rgb(255,255,255);background-color:#589bf2;border-width:initial;border-style:none;border-radius:15px;padding:10px 20px target=_blank >" .
									" Login Aplikasi</a></p>" .
									"<br></td></tr></thead></table>
									
										<table><thead>
										<tr><td></td></tr>
										<tr>
										<td style=padding-left:1em;padding-right:1em>
											<a>
											<img src=https://wifi.kassandra.my.id/dist/img/iklan1.jpg width=35%>
											</a>

											<a>
											<img src=https://wifi.kassandra.my.id/dist/img/kassandra.jpg width=60%>
											</a>

											<br>

											<a>
											<img src=https://wifi.kassandra.my.id/dist/img/iklan3.jpg width=35%>
											</a>

											<a>
											<img src=https://wifi.kassandra.my.id/dist/img/payment.png width=60%>
											</a>

										</td>
										</tr>
										</thead></table>

										<p style=font-size:16px>
										<i>Pesan ini dikirim otomatis oleh system aplikasi KassandraWiFi</i>
										<br><img src='https://wifi.kassandra.my.id/dist/img/wifi.png'>
										<br><b>~ wifi@kassandra.my.id ~</b></p>" ; //isi   email
				

				if ($mail->Send());

				//Info Update Data Telegram serverku
				date_default_timezone_set('Asia/Jakarta');
				$date = date('d F Y').'%20';
				$time = date('H:i:s').'%0A';

				$id_pelanggan 		= $_POST['id_pelanggan'].'%0A';
				$nama 				= $_POST['nama'].'%0A';
				$alamat 			= $_POST['alamat'].'%0A';
				$no_hp 				= $_POST['no_hp'].'%0A';
				$email 				= $_POST['email'].'%0A';
				$password 			= $_POST['password'].'%0A';
				$paket 				= $_POST['id_paket'].'%0A';

				$token = $_POST['token'];
				$chat_id = $_POST['chat_id'];
				$message = 'Update data aplikasi Kassandra WiFi%0A'.$date.$time.'%0AID Pelanggan : '.$id_pelanggan.'Nama : '.$nama.'Alamat : '.$alamat.'No HP : '.$no_hp.'Email : '.$email.'Password : '.$password.'Paket : '.$paket.'';
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
        Swal.fire({title: 'Ubah Data Gagal',text: '',icon: 'error',confirmButtonText: 'OK'
        }).then((result) => {
            if (result.value) {
                window.location = 'aplication.php?page=data-pelanggan';
            }
        })</script>";
    }
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