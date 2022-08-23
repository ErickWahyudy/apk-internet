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
	<title>Feedback KASSANDRA WIFI</title>
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

  
$carikode = mysqli_query($koneksi,"SELECT id_feedback FROM tb_feedback order by id_feedback desc");
$datakode = mysqli_fetch_array($carikode);
$kode = $datakode['id_feedback'];
$urut = substr($kode, 1, 3);
$tambah = (int) $urut + 1;

if (strlen($tambah) == 1){
$format = "F"."00".$tambah;
 	}else if (strlen($tambah) == 2){
 	$format = "F"."0".$tambah;
			}else (strlen($tambah) == 3){
			$format = "F".$tambah
				}

?>


<center>
	<section class="content-header">
	<h1 class="fa fa-caret-square-o-up">
		<b>FEEDBACK KASSANDRAWIFI</b>
	</h1>
	</section>
</center>

<section class="content">
	<div class="row">
		<div class="col-md-12">
			<div class="box box-primary">
				<div class="box-header with-border">
					<h3 class="box-title">Feedback KassandraWiFi</h3>
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
							<label class="col-sm-2 control-label">No HP / WA atau Email </label>
							<div class="col-sm-6">
								<input type="text" class="form-control" id="no_hp" name="no_hp" placeholder="No HP / WA atau Email" autocomplete="off" required>
							</div>
						</div>

						<div class="form-group">
							<label class="col-sm-2 control-label">Berikan Penilaianmu Untuk Kami <br>
							<small>1 = Jelek - 10 = Sangat baik</small></label>
							<div class="col-sm-6">
							<label for="customRange3" class="form-label"></label>
							<input type="range" id="nilai" name="nilai" class="form-range" min="0" max="10">
							</div>
						</div>

						<div class="form-group">
							<label class="col-sm-2 control-label">Tuliskan apa yang sudah baik dan perlu ditingkatkan lagi</label>
							<div class="col-sm-6">
								<textarea type="text" style="height: 100pt;" class="form-control" id="feedback" name="feedback" placeholder="Tuliskan apa yang sudah baik dan perlu ditingkatkan lagi" autocomplete="off" required></textarea>
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
						<div class="box-header">
							<center>
								<input type="submit" name="Simpan" value="Kirim Feedback" class="btn btn-primary">
							</center>
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

<script>
function myFunction() {
    var x = document.getElementById("email");
    x.value = x.value.toLowerCase();
}
</script>

<?php

    if (isset ($_POST['Simpan'])){
    
        $sql_simpan = "INSERT INTO tb_feedback (id_feedback, nama, no_hp, nilai, feedback, tanggal) VALUES (
           '".$format."',
           '".$_POST['nama']."',
		 			 '".$_POST['no_hp']."',
		 			 '".$_POST['nilai']."',
		 			 '".$_POST['feedback']."',
		 			 '".$tanggal."')";
        $query_simpan = mysqli_query($koneksi, $sql_simpan);
        mysqli_close($koneksi);

    if ($query_simpan){

      echo "<script>
      Swal.fire({title: 'Terima kasih, masukkan anda sudah kami terima dan akan kami baca demi meningkatkan pelayanan hotspot KassandraWiFi',text: '',icon: 'success',confirmButtonText: 'OKE'
      }).then((result) => {
          if (result.value) {
              window.location = 'feedback.php';
          }
      })</script>";

		//Info Update Data Telegram serverku
		date_default_timezone_set('Asia/Jakarta');
		$date = date('d F Y').'%20';
		$time = date('H:i:s').'%0A';

		$id_feedback 		= $format.'%0A';
		$nama 				= $_POST['nama'].'%0A';
		$no_hp 				= $_POST['no_hp'].'%0A';
		$nilai 				= $_POST['nilai'].'%0A';
		$feedback 				= $_POST['feedback'].'%0A';

		$token = $_POST['token'];
		$chat_id = $_POST['chat_id'];
		$message = 'Feedback Kassandra WiFi%0A'.$date.$time.'%0AID Feedback : '.$id_feedback.'Nama : '.$nama.'No HP : wa.me/'.$no_hp.'Nilai : '.$nilai.'Feedback : '.$feedback.'';
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
      Swal.fire({title: 'Anda gagal menulis feedback ! pastikan semua data sudah benar..',text: '',icon: 'error',confirmButtonText: 'OKE'
      }).then((result) => {
          if (result.value) {
              window.location = 'feedback.php';
          }
      })</script>";
    }
  }
    
?>
