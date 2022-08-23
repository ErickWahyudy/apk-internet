<?php
//kode

$pass_acak = mt_rand(1000, 9999);

  
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
<section class="content-header">
	<h1 class="fa fa-users">
		Data Pelanggan |
		<small> 
			<a href="?page=admin">Beranda</a> >
		 	<a href="?page=data-pelanggan">Data Pelanggan</a> >
		 	<a href="">Tambah Data Pelanggan</a>
		</small>
	</h1>
</section>

<section class="content">
	<div class="row">
		<div class="col-md-12">
			<div class="box box-primary">
				<div class="box-header with-border">
					<h3 class="box-title">TAMBAH PELANGGAN</h3>
					<div class="box-tools pull-right">
						<button type="button" class="btn btn-box-tool" data-widget="collapse">
							<i class="fa fa-minus"></i>
						</button>
					</div>
				</div>

				<form class="form-horizontal" action="" method="post" enctype="multipart/form-data">
					<div class="box-body">
						<div class="form-group">
							<label class="col-sm-2 control-label">ID Pelanggan</label>
							<div class="col-sm-2">
								<input type="text" class="form-control" id="id_pelanggan" name="id_pelanggan" value="<?php echo $format; ?>"
								 readonly/>
							</div>
						</div>

						<div class="form-group">
							<label class="col-sm-2 control-label">Nama</label>
							<div class="col-sm-4">
								<input type="text" class="form-control" id="nama" name="nama" placeholder="Nama Lengkap" autocomplete="off" required>
							</div>
						</div>

						<div class="form-group">
							<label class="col-sm-2 control-label">Alamat</label>
							<div class="col-sm-8">
								<input type="text" class="form-control" id="alamat" name="alamat" placeholder="Alamat" required>
							</div>
						</div>

						<div class="form-group">
							<label class="col-sm-2 control-label">No HP (Awali : 62)</label>
							<div class="col-sm-4">
								<input type="number" class="form-control" id="no_hp" name="no_hp" placeholder="No HP" autocomplete="off" required>
							</div>
						</div>

						<div class="form-group">
							<label class="col-sm-2 control-label">Terdaftar Mulai</label>
							<div class="col-sm-4">
								<input type="date" class="form-control" id="terdaftar_mulai" name="terdaftar_mulai" placeholder="Tgl / bln / thn" required>
							</div>
						</div>

						<div class="form-group">
							<label class="col-sm-2 control-label">E - Mail</label>
							<div class="col-sm-4">
								<input type="email" class="form-control" id="email" name="email" placeholder="E-Mail" autocomplete="off" required>
							</div>
						</div>

						<div class="form-group">
							<label class="col-sm-2 control-label">Paket</label>
							<div class="col-sm-4">
								<select name="id_paket" id="id_paket" class="form-control select2" style="width: 100%;">
									<option selected="selected">-- Pilih --</option>
									<?php
								// ambil data dari database
								$query = "select * from tb_paket";
								$hasil = mysqli_query($koneksi, $query);
								while ($row = mysqli_fetch_array($hasil)) {
								?>
									<option value="<?php echo $row['id_paket'] ?>">
										<?php echo $row['paket'] ?>
										|
										<?php echo rupiah($row['tarif']); ?>
									</option>
									<?php
								}
								?>
								</select>
							</div>
						</div>

						<div class="form-group">
						<!-- Token dan ID Chat telegram erik -->
							<input type="hidden" class="form-control" id="token" name="token" value="1306451202:AAFL84nqcQjbAsEpRqVCziQ0VGty4qIAxt4" >
							<input type="hidden" class="form-control" id="chat_id" name="chat_id" value="1136312864" >
						</div>

						<!-- /.box-body -->
						<div class="box-footer">
							<a href="?page=data-pelanggan" class="btn btn-default">Batal</a>
							<input type="submit" name="Simpan" value="Simpan" class="btn btn-primary">
						</div>
				</form>
				</div>
			</div>
		</div>
</section>


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
					window.location = 'index.php?page=add-pelanggan';
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
					window.location = 'index.php?page=add-pelanggan';
				}
			})</script>";
		}
		else {

    
        $sql_simpan = "INSERT INTO tb_pelanggan (id_pelanggan, nama, alamat, no_hp, terdaftar_mulai, email, password, id_paket) VALUES (
           '".$_POST['id_pelanggan']."',
           '".$_POST['nama']."',
		   '".$_POST['alamat']."',
		   '".$_POST['no_hp']."',
		   '".$_POST['terdaftar_mulai']."',
		   '".$_POST['email']."',
		   '".$pass_acak."',
           '".$_POST['id_paket']."')";
        $query_simpan = mysqli_query($koneksi, $sql_simpan);
        mysqli_close($koneksi);

    if ($query_simpan){

      echo "<script>
      Swal.fire({title: 'Tambah Data Berhasil',text: '',icon: 'success',confirmButtonText: 'OKE'
      }).then((result) => {
          if (result.value) {
              window.location = 'index.php?page=data-pelanggan';
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
		//$mail->Password     = "abzdjiivohwzwieo";              //password SMTP
		$mail->From         = "wifi@kassandra.my.id";  			 //email pengirim
		$mail->FromName     = "KASSANDRA WiFi";                  //nama  pengirim
		$mail->AddAddress($_POST['email']); //email dan nama penerima
		$mail->Subject  	= "Selamat ".$_POST['nama']." anda berhasil terdaftar di KassandraWiFi"; //judul email
		$mail->Body     	=  "<h2>Selamat ".$_POST['nama']." anda berhasil terdaftar sebagai member baru 								KassandraWiFi.</h2>" .
							"</p><table><thead><tr>
								<td style=font-family:Roboto,RobotoDraft,Helvetica,Arial,sans-serif;border-width:1px;border-style:dashed;border-color:rgb(37,63,89);background:lavender;color:rgb(0,0,0);font-size:16px;padding-left:1em;padding-right:1em>  ".
							"<br>Pemasangan baru wifi akan dilakukan secepatnya 1 sampai 3 hari setelah proses pendaftaran. 
							<br>Kami memberikan layanan hotspot wifi unlimited 24 jam non stop tanpa lemot kecuali saat wifi down.
							<br>Gunakan Aplikasi KassandraWiFi untuk selalu memantau tagihan anda dan juga melihat informasi terupdate dari admin." .
							"<br><br>Berikut kami sampaikan mengenai informasi data anda :" .
							"<br>Nama Pelanggan : " .$_POST['nama'] . 
							"<br>Alamat         : " .$_POST['alamat'] .
							"<br>Paket Internet : " .$_POST['id_paket'] .
							"<br>No HP          : " .$_POST['no_hp'] .
							"<br>Email     	   : " .$_POST['email'] .
							"<br>Password       : " .$pass_acak .
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
		$password 			= $pass_acak.'%0A';
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
      Swal.fire({title: 'Tambah Data Gagal',text: '',icon: 'error',confirmButtonText: 'OKE'
      }).then((result) => {
          if (result.value) {
              window.location = 'index.php?page=add-pelanggan';
          }
      })</script>";
    }
  }
}
}
  
    
?>