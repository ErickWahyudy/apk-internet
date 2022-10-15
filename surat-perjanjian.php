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
	<title>SURAT PERJANJIAN KASSANDRA WIFI</title>
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
	<!-- ttd digital -->
	<script type="text/javascript" src="inc/signature.js"></script>

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

<style>
     body{
     padding: 15px;
     }
     #note{position:absolute;left:50px;top:35px;padding:0px;margin:0px;cursor:default;}
</style>
	
</head>

<body class="hold-transition" background="dist/img/bkg.jpg">
	
<?php
//kode

$tanggal = date("Y-m-d");

  
$carikode = mysqli_query($koneksi,"SELECT id FROM tb_perjanjian order by id desc");
$datakode = mysqli_fetch_array($carikode);
$kode = $datakode['id'];
$urut = substr($kode, 1, 3);
$tambah = (int) $urut + 1;

if (strlen($tambah) == 1){
$format = "J"."00".$tambah;
 	}else if (strlen($tambah) == 2){
 	$format = "J"."0".$tambah;
			}else (strlen($tambah) == 3){
			$format = "J".$tambah
				}

?>


<center>
	<section class="content-header">
	<h1 class="ion-person-stalker">
		<b>SURAT PERJANJIAN KASSANDRAWIFI</b>
	</h1>
	</section>
</center>

<section class="content">
	<div class="row">
		<div class="col-md-12">
			<div class="box box-primary">
				<div class="box-header with-border">
					<h3 class="box-title">Surat Perjanjian KassandraWiFi</h3>
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
							<label class="col-sm-2 control-label">No HP / WA atau Email</label>
							<div class="col-sm-6">
								<input type="text" class="form-control" id="no_hp" name="no_hp" placeholder="No HP / WA atau Email" autocomplete="off" required>
							</div>
						</div>

						<div class="form-group">
							<label class="col-sm-2 control-label">TTD Digital</label>
							<div class="col-sm-6" id="signature-pad">
								<div style="border:solid 1px teal; width:auto;height:auto;padding:3px;position:relative;">
									<div id="note" onmouseover="my_function();">The signature should be inside box</div>
									<canvas id="the_canvas" width="auto" height="auto"></canvas>
								</div>
								<div style="margin:10px;">
									<input type="hidden" id="signature" name="signature">
									<button type="button" id="clear_btn" class="btn btn-danger" data-action="clear"><span class="glyphicon glyphicon-remove"></span> hapus</button>
								</div>
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
							<input type="submit" name="Simpan" value="Kirim laporan" class="btn btn-primary">
						</div>
				</form>
				</div>
				<footer class="box-footer">
					<div class="pull-right hidden-xs">
					</div>
						<center>
						<strong>Copyright &copy; 2019 - <?php echo date('Y'); ?>
						<a href="https://bit.ly/kassandrahdproduction" target="blank">KassandraWifi</a>.</strong> All rights reserved.
						</center>
				</footer>
			</div>
		</div>
</section>

	<script>
	var wrapper = document.getElementById("signature-pad");
	var clearButton = wrapper.querySelector("[data-action=clear]");
	var savePNGButton = wrapper.querySelector("[data-action=save-png]");
	var canvas = wrapper.querySelector("canvas");
	var el_note = document.getElementById("note");
	var signaturePad;
	signaturePad = new SignaturePad(canvas);
	clearButton.addEventListener("click", function (event) {
	document.getElementById("note").innerHTML="The signature should be inside box";
	signaturePad.clear();
	});
	savePNGButton.addEventListener("click", function (event){
	if (signaturePad.isEmpty()){
		alert("Please provide signature first.");
		event.preventDefault();
	}else{
		var canvas  = document.getElementById("the_canvas");
		var dataUrl = canvas.toDataURL();
		document.getElementById("signature").value = dataUrl;
	}
	});
	function my_function(){
	document.getElementById("note").innerHTML="";
	}
	</script>

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

		$sig_string=$_POST['signature'];
   		$nama_file=$_POST['nama'].date("his").".jpg";
   		file_put_contents($nama_file, file_get_contents($sig_string));
		if(file_exists($nama_file)){
			move_uploaded_file($nama_file, 'uploadfile/signature/'.$nama_file);
		
		
        // $ekstensi_diperbolehkan     = array('jpg','png', 'JPG', 'PNG', 'jpeg', 'JPEG');
        // $bukti_pembayaran    		= $_FILES['bukti_pembayaran']['name'];
        // $x        					= explode('.', $bukti_pembayaran);
        // $ekstensi    				= strtolower(end($x));
        // $ukuran       				= $_FILES['bukti_pembayaran']['size'];
		// $namabarupembayaran 		= $_POST['nama']."_".$bukti_pembayaran;
        // $file_tmp    				= $_FILES['bukti_pembayaran']['tmp_name']; 
        // if(in_array($ekstensi, $ekstensi_diperbolehkan) === true){
        //     if($ukuran < 5000000){ 
        //         move_uploaded_file($file_tmp, 'uploadfile/bukti_pembayaran/'.$namabarupembayaran);
    
    
        $sql_simpan = "INSERT INTO tb_perjanjian (id, nama, no_hp, signature, tanggal) VALUES (
           '".$format."',
           '".$_POST['nama']."',
		 			 '".$_POST['no_hp']."',
		 			 '".$nama_file."',
		 			 '".$tanggal."')";
        $query_simpan = mysqli_query($koneksi, $sql_simpan);
        mysqli_close($koneksi);

    if ($query_simpan){

      echo "<script>
      Swal.fire({title: 'Terima kasih, sudah mengisi form surat perjanjian ini',text: '',icon: 'success',confirmButtonText: 'OKE'
      }).then((result) => {
          if (result.value) {
              window.location = 'surat-perjanjian.php';
          }
      })</script>";
      }else{
      echo "<script>
      Swal.fire({title: 'Anda gagal mengisi surat ! pastikan semua data sudah terisi..',text: '',icon: 'error',confirmButtonText: 'OKE'
      }).then((result) => {
          if (result.value) {
              window.location = 'surat-perjanjian.php';
          }
      })</script>";
    }
  }
}
    
?>
