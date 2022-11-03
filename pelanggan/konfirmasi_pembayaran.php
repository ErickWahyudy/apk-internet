<?php
			if(isset($_GET['kode'])){
			$sql_cek = "SELECT p.id_pelanggan, p.nama, p.no_hp, p.alamat, t.id_tagihan, t.tagihan, t.status, t.tgl_bayar, t.bulan, t.tahun, k.id_paket, k.paket, m.id_bulan, m.bulan   
				from tb_pelanggan p inner join tb_tagihan t on p.id_pelanggan=t.id_pelanggan 
				inner join tb_paket k on k.id_paket=p.id_paket inner join tb_bulan m on m.id_bulan=t.bulan where id_tagihan='".$_GET['kode']."'";
			$query_cek = mysqli_query($koneksi, $sql_cek);
			$data_cek = mysqli_fetch_array($query_cek,MYSQLI_BOTH);
			}

			
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


<section class="content-header">
	<h1 class="fa fa-dollar">
		Data Tagihan |
		<small>
			<a href="?page=_plg">Beranda</a> > 
			<a href="?page=data-tagihan">Data Tagihan</a> >
			<a href="">Konfirmasi Pembayaran</a>
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
								<?php echo $data_cek['nama']; ?> / <?php echo $data_cek['bulan']; ?> / <?php echo rupiah ($data_cek['tagihan']); ?>
							</td>
						</tr>

				</table>
				<!-- /.box-header -->
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
							<a href="?page=bayar-tagihan&kode=<?php echo $data_cek['id_tagihan']; ?>" class="btn btn-default">Batal</a>&emsp;
							<input type="submit" name="Simpan" value="Konfirmasi" class="btn btn-success">
						</div>
				</form>
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
			$namabarubayar 				= $data_cek['nama']."_".$tanggal."_".$bukti_bayar;
			$file_tmp    				= $_FILES['bukti_bayar']['tmp_name'];
			//kompress gambar
			$source_img 				= $file_tmp;
			$destination_img 			= 'uploadfile/bukti_bayar/'.$namabarubayar;
			$quality 					= 20;
			compressImage($source_img, $destination_img, $quality);

$sql_simpan = "INSERT INTO tb_tagihan_konfirmasi (id_konfirmasi, id_pelanggan, id_tagihan, bukti_bayar, tgl_konfirmasi) VALUES (
           	'".$format."',
           	'".$data_cek['id_pelanggan']."',
			'" .$data_cek['id_tagihan']."',
		 	'".$namabarubayar."',
			'".$tanggal."')";
        $query_simpan = mysqli_query($koneksi, $sql_simpan);
        mysqli_close($koneksi);

    if ($query_simpan){
        echo "<script>
        Swal.fire({title: 'Konfirmasi Pembayaran Berhasil Dikirim, Data akan otomatis berubah saat admin sudah verifikasi',text: '',icon: 'success',confirmButtonText: 'OK'
        }).then((result) => {
            if (result.value) {
                window.location = '?page=bayar-tagihan&kode=$data_cek[id_tagihan]';
            }
        })</script>";
				//Info Update Data Telegram serverku
				date_default_timezone_set('Asia/Jakarta');
				$date = date('d F Y').'%20';
				$time = date('H:i:s').'%0A';

				$id_tagihan 		= $data_cek['id_tagihan'].'%0A';
				$nama 				= $data_cek['nama'].'%0A';
				$bulan 				= $data_cek['bulan'].'%0A';
				$tagihan 			= $data_cek['tagihan'].'%0A';

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
                window.location = 'aplication.php?page=data-tagihan';
            }
        })</script>";
    }
}

?>