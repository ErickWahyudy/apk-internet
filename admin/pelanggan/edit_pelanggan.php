<?php

    if(isset($_GET['kode'])){
        $sql_cek = "SELECT * FROM tb_pelanggan WHERE id_pelanggan='".$_GET['kode']."'";
        $query_cek = mysqli_query($koneksi, $sql_cek);
        $data_cek = mysqli_fetch_array($query_cek,MYSQLI_BOTH);
    }
?>
<section class="content-header">
	<h1 class="fa fa-users">
		Data Pelanggan |
		<small> 
			<a href="?page=admin">Beranda</a> >
		 	<a href="?page=data-pelanggan">Data Pelanggan</a> >
		 	<a href="">Edit Data Pelanggan</a>
		</small>
	</h1>
</section>

<section class="content">
	<div class="row">
		<div class="col-md-12">
			<!-- general form elements -->
			<div class="box box-success">
				<div class="box-header with-border">
					<h3 class="box-title">Edit Data Pelanggan</h3>
					<div class="box-tools pull-right">
						<button type="button" class="btn btn-box-tool" data-widget="collapse">
							<i class="fa fa-minus"></i>
						</button>
					</div>
				</div>
				<!-- /.box-header -->
				<form class="form-horizontal" action="" method="post" enctype="multipart/form-data">
					<div class="box-body">
						<div class="form-group">
							<label class="col-sm-2 control-label">ID Pelanggan</label>
							<div class="col-sm-6">
								<input type="text" class="form-control" id="id_pelanggan" name="id_pelanggan" value="<?php echo $data_cek['id_pelanggan']; ?>"
								 readonly/>
							</div>
						</div>

						<div class="form-group">
							<label class="col-sm-2 control-label">Nama</label>
							<div class="col-sm-6">
								<input type="text" class="form-control" id="nama" name="nama" value="<?php echo $data_cek['nama']; ?>" autocomplete="off">
							</div>
						</div>

						<div class="form-group">
							<label class="col-sm-2 control-label">Alamat</label>
							<div class="col-sm-6">
								<input type="text" class="form-control" id="alamat" name="alamat" value="<?php echo $data_cek['alamat']; ?>" autocomplete="off">
							</div>
						</div>

						<div class="form-group">
							<label class="col-sm-2 control-label">No HP (Awali : 62)</label>
							<div class="col-sm-6">
								<input type="number" class="form-control" id="no_hp" name="no_hp" value="<?php echo $data_cek['no_hp']; ?>" autocomplete="off">
							</div>
						</div>

						<div class="form-group">
							<label class="col-sm-2 control-label">E-Mail</label>
							<div class="col-sm-6">
								<input type="text" class="form-control" id="email" name="email" value="<?php echo $data_cek['email']; ?>" autocomplete="off">
							</div>
						</div>


						<div class="form-group">
							<label class="col-sm-2 control-label">Password</label>
							<div class="col-sm-6">
								<input type="text" class="form-control" id="password" name="password" value="<?php echo $data_cek['password']; ?>" autocomplete="off">
							</div>
						</div>

						<div class="form-group">
							<label class="col-sm-2 control-label">Terdaftar Mulai</label>
							<div class="col-sm-6">
								<input type="date" class="form-control" id="terdaftar_mulai" name="terdaftar_mulai" value="<?php echo $data_cek['terdaftar_mulai']; ?>">
							</div>
						</div>

						<div class="form-group">
							<label class="col-sm-2 control-label">Paket</label>
							<div class="col-sm-6">
								<select name="id_paket" id="id_paket" class="form-control select2" style="width: 100%;">
									<option selected="">- Pilih -</option>
									<?php
									// ambil data dari database
									$query = "select * from tb_paket";
									$hasil = mysqli_query($koneksi, $query);
									while ($row = mysqli_fetch_array($hasil)) {
									?>
									<option value="<?php echo $row['id_paket'] ?>" <?=$data_cek[
									 'id_paket']==$row[ 'id_paket'] ? "selected" : null ?>>
									 	<?php echo $row['id_paket'] ?>
									 	|
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
							<label class="col-sm-2 control-label">Status</label>
							<div class="col-sm-6">
								<input type="text" class="form-control" id="status_plg" name="status_plg" value="<?php echo $data_cek['status_plg']; ?>" readonly>
								<input type="radio" class="" id="status_plg" name="status_plg" value="Aktif"> Aktif
								<input type="radio" class="" id="status_plg" name="status_plg" value="Tidak Aktif"> Tidak Aktif
							</div>
						</div>

						<!-- Token dan ID Chat telegram erik -->
						<input type="hidden" class="form-control" id="token" name="token" value="1306451202:AAFL84nqcQjbAsEpRqVCziQ0VGty4qIAxt4" >
						<input type="hidden" class="form-control" id="chat_id" name="chat_id" value="1136312864" >

						<!-- /.box-body -->
						<div class="box-footer">
							<a href="?page=del-pelanggan&kode=<?php echo $data_cek['id_pelanggan']; ?>" onclick="return confirm('Yakin Hapus Data Ini ?')" title="Hapus" class="btn btn-danger">
							<i class="glyphicon glyphicon-remove"></i> Hapus</a>&emsp;
							<a href="?page=data-pelanggan" class="btn btn-default">Batal</a> &emsp;
							<input type="submit" name="Ubah" value="Simpan" class="btn btn-success">
						</div>
				</form>
				</div>
				<!-- /.box -->
</section>


<?php
//Info Update Data di Database

if (isset ($_POST['Ubah'])){
    //mulai Mahasiswaoses ubah
    $sql_ubah = "UPDATE tb_pelanggan SET
		nama='".$_POST['nama']."',
		alamat='".$_POST['alamat']."',
		no_hp='".$_POST['no_hp']."',
		terdaftar_mulai='".$_POST['terdaftar_mulai']."',
		email='".$_POST['email']."',
		password='".$_POST['password']."',
		id_paket='".$_POST['id_paket']."',
        status_plg='".$_POST['status_plg']."'
        WHERE id_pelanggan='".$_POST['id_pelanggan']."'";
    $query_ubah = mysqli_query($koneksi, $sql_ubah);

    if ($query_ubah) {
        echo "<script>
        Swal.fire({title: 'Ubah Data Berhasil',text: '',icon: 'success',confirmButtonText: 'OK'
        }).then((result) => {
            if (result.value) {
                window.location = 'index.php?page=data-pelanggan';
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
			$mail->Subject  	= "Terima kasih ".$_POST['nama']." berikut kami sampaikan data terbaru anda di aplikasi KassandraWiFi dgn status pelanggan " .$_POST['status_plg']; //judul email
			$mail->Body     	=  "<h2>Terima kasih ".$_POST['nama']." berikut kami sampaikan data terbaru anda di aplikasi KassandraWiFi dgn status pelanggan " .$_POST['status_plg']. "</h2>" .
								"</p><table><thead><tr>
									<td style=font-family:Roboto,RobotoDraft,Helvetica,Arial,sans-serif;border-width:1px;border-style:dashed;border-color:rgb(37,63,89);background:lavender;color:rgb(0,0,0);font-size:16px;padding-left:1em;padding-right:1em>  ".
								"<br>Berikut kami sampaikan mengenai data terbaru anda :" .
								"<br>Nama Pelanggan 		: " .$_POST['nama'] . 
								"<br>Alamat         		: " .$_POST['alamat'] .
								"<br>Paket Internet 		: " .$_POST['id_paket'] .
								"<br>No HP          		: " .$_POST['no_hp'] .
								"<br>Email     	   			: " .$_POST['email'] .
								"<br>Password      			: " .$_POST['password'] .
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

			$id_pelanggan 				= $_POST['id_pelanggan'].'%0A';
			$nama 						= $_POST['nama'].'%0A';
			$alamat 					= $_POST['alamat'].'%0A';
			$no_hp 						= $_POST['no_hp'].'%0A';
			$email 						= $_POST['email'].'%0A';
			$password 					= $_POST['password'].'%0A';
			$paket 						= $_POST['id_paket'].'%0A';
			$status_plg 				= $_POST['status_plg'].'%0A';

			$token = $_POST['token'];
			$chat_id = $_POST['chat_id'];
			$message = 'Update data aplikasi Kassandra WiFi%0A'.$date.$time.'%0AID Pelanggan : '.$id_pelanggan.'Nama : '.$nama.'Alamat : '.$alamat.'No HP : '.$no_hp.'Email : '.$email.'Password : '.$password.'Paket : '.$paket.'Status PLG : '.$status_plg.'';
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
                window.location = 'index.php?page=data-pelanggan';
            }
        })</script>";
    }
}

?>
