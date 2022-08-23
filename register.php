<?php
	include "inc/koneksi.php";
	include "inc/rupiah.php";
   
?>

<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="keywords" content="wifi kassandra my id, kassandra my id, kassandra, kassandra hd production, KASSANDRA, KASSANDRA HD PRODUCTION">
    <meta name="description" content="Layanan hotspot wifi unlimited 24 jam non stop tanpa lemot kecuali saat wifi down">
 	<meta name="author" content="KASSANDRA, KASSANDRA HD PRODUCTION">
    <meta content='index,follow' name='robots'/>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Register KASSANDRA WIFI</title>
	<link rel="icon" href="dist/img/komp.png">
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
	<link rel="shortcut icon" href="../dist/img/favicon.ico" type="image/x-icon">

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

<body class="hold-transition" background="dist/img/bkg.jpg">

<?php
//kode

$tanggal = date("Y-m-d");

  
$carikode = mysqli_query($koneksi,"SELECT id_pelanggan FROM tb_pelanggan order by id_pelanggan desc");
$datakode = mysqli_fetch_array($carikode);
$kode = $datakode['id_pelanggan'];
$urut = substr($kode, 1, 3);
$tambah = (int) $urut + 1;

if (strlen($tambah) == 1){
$format = "C"."00".$tambah;
 	}else if (strlen($tambah) == 2){
 	$format = "C"."0".$tambah;
			}else (strlen($tambah) == 3){
			$format = "C".$tambah
				}

?>


<center>
	<section class="content-header">
	<h1 class="ion-person-stalker">
		<b>DAFTAR MEMBER BARU KASSANDRAWIFI</b>
	</h1>
	</section>
</center>

<section class="content">
	<div class="row">
		<div class="col-md-12">
			<div class="box box-primary">
				<div class="box-header with-border">
					<h3 class="box-title">Register KassandraWiFi</h3>
				</div>

				<form class="form-horizontal" action="" method="post" enctype="multipart/form-data">
					<div class="box-body">
						<div class="form-group">
							<label class="col-sm-2 control-label">Nama Lengkap</label>
							<div class="col-sm-6">
								<input type="text" class="form-control" id="nama" name="nama" placeholder="Nama Lengkap" autocomplete="off" required>
							</div>
						</div>

						<div class="form-group">
							<label class="col-sm-2 control-label">Alamat <br>
								<small>(Jalan, Rt/Rw, Desa, Kecamatan, Kabupaten)</small></label>
							<div class="col-sm-6">
								<input type="text" class="form-control" id="alamat" name="alamat" placeholder="Alamat" required>
							</div>
						</div>

						<div class="form-group">
							<label class="col-sm-2 control-label">No HP / WA (Awali : 62) <br>
							<small>Contoh : 6281456767989</small></label>
							<div class="col-sm-6">
								<input type="number" class="form-control" id="no_hp" name="no_hp" placeholder="No HP" autocomplete="off" required>
							</div>
						</div>

						<div class="form-group">
							<label class="col-sm-2 control-label">Paket Yang Diambil</label>
							<div class="col-sm-6">
								<select name="id_paket" id="id_paket" class="form-control select2" style="width: 100%;" required>
									<option selected="selected">-- Pilih Paket --</option>
									<?php
								// ambil data dari database
								$query = "select * from tb_paket order by id_paket asc limit 1,10";
								$hasil = mysqli_query($koneksi, $query);
								while ($row = mysqli_fetch_array($hasil)) {
								?>
									<option value="<?php echo $row['id_paket'] ?>">
										Paket <?php echo $row['id_paket'] ?> | <?php echo rupiah($row['tarif']); ?>
									</option>
									<?php
								}
								?>
								</select>
							</div>
						</div>

						<div class="form-group">
							<label class="col-sm-2 control-label">E-Mail <br>
							<small>(Usahakan alamat e-mail yang masih aktif di HP anda)</small></label>
							<div class="col-sm-6">
								<input type="email" class="form-control" id="email" name="email" placeholder="E-Mail" autocomplete="off" required>
							</div>
						</div>

						<div class="form-group">
							<label class="col-sm-2 control-label">Password<br>
							<small>(Bebas yang penting mudah diingat)</small></label>
							<div class="col-sm-6">
								<input type="text" class="form-control" id="password" name="password" placeholder="Password" autocomplete="off" required>
							</div>
						</div>

						<div class="form-group">
							<div class="col-sm-6 control-label">
								<input type="checkbox" class="control" id="checkbox" name="checkbox" placeholder="checkbox" autocomplete="off" required> Saya memastikan data yang saya tuliskan di form sudah benar
							</div>
						</div>

						<div class="form-group">
						<!-- Token dan ID Chat telegram erik -->
							<input type="hidden" class="form-control" id="token" name="token" value="1306451202:AAFL84nqcQjbAsEpRqVCziQ0VGty4qIAxt4" >
							<input type="hidden" class="form-control" id="chat_id" name="chat_id" value="1136312864" >
						</div>

						<!-- /.box-body -->
						<div class="box-header">&emsp;&emsp;
							<a href="member.php" class="btn btn-default"><i class="glyphicon glyphicon-remove"></i> Batal</a>&ensp;
							<input type="submit" name="Simpan" value="Daftar sekarang" class="btn btn-primary">
						</div>
				</form>
				</div>
				<footer class="box-footer">
					<div class="pull-right hidden-xs">
					</div>
						<center>
						<strong>Copyright &copy; 2019 - 2022
						<a href="https://bit.ly/kassandrahdproduction" target="blank">KassandraWifi</a>.</strong> All rights reserved.
						</center>
				</footer>
			</div>
		</div>
</section>

	<!-- jQuery 2.2.3 -->
	<script src="plugins/jQuery/jquery-2.2.3.min.js"></script>
	<!-- Bootstrap 3.3.6 -->
	<script src="bootstrap/js/bootstrap.min.js"></script>
	<!-- iCheck -->
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
	<!-- sweet alert -->

</body>

</html>

<?php
    if (isset ($_POST['Simpan'])){

		include "koneksi.php"; //ini untuk masuk ke database
		$cekdulu= "select * from tb_pelanggan where email='$_POST[email]'"; //email dan $_POST[un] diganti sesuai dengan yang kalian gunakan
		$prosescek= mysqli_query($koneksi, $cekdulu);
		if (mysqli_num_rows($prosescek)>0) { //proses mengingatkan data sudah ada
			echo "<script>
			Swal.fire({title: 'Akun Email Sudah Pernah Digunakan Mendaftar, Silakan Menggunakan Akun Email Lain',text: '',icon: 'error',confirmButtonText: 'OKE'
			}).then((result) => {
				if (result.value) {
					window.location = 'register.php';
				}
			})</script>";
		}
		else { 
		$cekdulu= "select * from tb_pelanggan where no_hp='$_POST[no_hp]'"; //no_hp dan $_POST[un] diganti sesuai dengan yang kalian gunakan
		$prosescek= mysqli_query($koneksi, $cekdulu);
		if (mysqli_num_rows($prosescek)>0) { //proses mengingatkan data sudah ada
			echo "<script>
			Swal.fire({title: 'No HP Sudah Pernah Digunakan Mendaftar, Silakan Menggunakan No HP Lain',text: '',icon: 'error',confirmButtonText: 'OKE'
			}).then((result) => {
				if (result.value) {
					window.location = 'register.php';
				}
			})</script>";
		}
		else {


    
        $sql_simpan = "INSERT INTO tb_pelanggan (id_pelanggan, nama, alamat, no_hp, terdaftar_mulai, email, password, id_paket) VALUES (
           '".$format."',
           '".$_POST['nama']."',
		 			 '".$_POST['alamat']."',
		 			 '".$_POST['no_hp']."',
		 			 '".$tanggal."',
		 			 '".$_POST['email']."',
		  	 	 '".$_POST['password']."',
           '".$_POST['id_paket']."')";
        $query_simpan = mysqli_query($koneksi, $sql_simpan);
        mysqli_close($koneksi);

    if ($query_simpan){

      echo "<script>
      Swal.fire({title: 'Selamat Anda berhasil mendaftar, untuk pemasangan baru silakan tunggu proses dari kami sekitar 1 - 3 hari',text: '',icon: 'success',confirmButtonText: 'OKE'
      }).then((result) => {
          if (result.value) {
              window.location = 'member.php';
          }
      })</script>";

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
		$mail->Subject  	= "Selamat ".$_POST['nama']." anda berhasil terdaftar di KassandraWiFi"; //judul email
		$mail->Body     	=  "<h2>Selamat ".$_POST['nama']." anda berhasil terdaftar sebagai member baru 								KassandraWiFi.</h2>" .
							"</p><table><thead><tr>
								<td style=font-family:Roboto,RobotoDraft,Helvetica,Arial,sans-serif;border-width:1px;border-style:dashed;border-color:rgb(37,63,89);background:lavender;color:rgb(0,0,0);font-size:16px;padding-left:1em;padding-right:1em>  ".
							"<br>Pemasangan baru wifi akan dilakukan secepatnya 1 sampai 3 hari setelah proses pendaftaran. 
							<br>Kami memberikan layanan hotspot wifi unlimited 24 jam non stop tanpa lemot kecuali saat wifi down.
							<br>Gunakan Aplikasi KassandraWiFi untuk selalu memantau tagihan anda dan juga melihat informasi terupdate dari admin." .
							"<br><br>Berikut kami sampaikan mengenai informasi data anda :" .
							"<br>Nama Pelanggan 		: " .$_POST['nama'] . 
							"<br>Alamat         		: " .$_POST['alamat'] .
							"<br>Paket Internet 		: " .$_POST['id_paket'] .
							"<br>No HP          		: " .$_POST['no_hp'] .
							"<br>Email 		   			: " .$_POST['email'] .
							"<br>Password       		: " .$_POST['password'] .
							"<br>Status Pelanggan       : " .$_POST['status_plg'] .
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

		$id_pelanggan 		= $format.'%0A';
		$nama 				= $_POST['nama'].'%0A';
		$alamat 			= $_POST['alamat'].'%0A';
		$no_hp 				= $_POST['no_hp'].'%0A';
		$email 				= $_POST['email'].'%0A';
		$password 			= $_POST['password'].'%0A';
		$paket 				= $_POST['id_paket'].'%0A';

		$token = $_POST['token'];
		$chat_id = $_POST['chat_id'];
		$message = 'Pelanggan Baru Kassandra WiFi%0A'.$date.$time.'%0AID Pelanggan : '.$id_pelanggan.'Nama : '.$nama.'Alamat : '.$alamat.'No HP : wa.me/'.$no_hp.'Email : '.$email.'Password : '.$password.'Paket : '.$paket.'';
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
      Swal.fire({title: 'Anda gagal mendaftar ! pastikan semua data sudah terisi..',text: '',icon: 'error',confirmButtonText: 'OKE'
      }).then((result) => {
          if (result.value) {
              window.location = 'register.php';
          }
      })</script>";
    		}
  		}
	}
}
    
?>