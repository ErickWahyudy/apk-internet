<!DOCTYPE html>
<html>
<head>
    <title>Tanda Tangan Touch Screen HTML</title>
	
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.css">
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script> 
    <link type="text/css" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/south-street/jquery-ui.css" rel="stylesheet"> 
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
    <script type="text/javascript" src="inc/signature/js/jquery.signature.min.js"></script>
    <script type="text/javascript" src="inc/signature/js/jquery.ui.touch-punch.min.js"></script>
    <link rel="stylesheet" type="text/css" href="inc/signature/css/jquery.signature.css">
   
    <style>
        .kbw-signature { width: 400px; height: 400px;}
        #sig canvas{
            width: 100% !important;
            height: auto;
        }
    </style>
   
</head>
<body>
   
<div class="container">
   
    <form method="POST" action="">
   
        <h1>Tanda Tangan Touch Screen HTML</h1>
   
        <div class="col-md-12">
            <label class="" for="">Tanda Tangan:</label>
            <br/>
            <div id="sig" ></div>
            <br/>
            <button id="clear">Hapus Tanda Tangan</button>
            <textarea id="signature64" name="signed" style="display: none"></textarea>
        </div>
   
        <br/>

	<input type="submit" name="Simpan" value="Kirim laporan" class="btn btn-primary">
    </form>
   
</div>
   
<script type="text/javascript">
    var sig = $('#sig').signature({syncField: '#signature64', syncFormat: 'PNG'});
    $('#clear').click(function(e) {
        e.preventDefault();
        sig.signature('clear');
        $("#signature64").val('');
    });
</script>
</body>
</html>

<?php

    if (isset ($_POST['Simpan'])){
	
		//menyimpan tanda tangan digital ke dalam folder
			$folderPath = "uploadfile/signature/";
			if(empty($_POST['signed'])){
				echo "Kosong";
			}else{
			$image_parts = explode(";base64,", $_POST['signed']); 
			$image_type_aux = explode("image/", $image_parts[0]);
			$image_type = $image_type_aux[1];
			$image_base64 = base64_decode($image_parts[1]);
			$file = $folderPath . uniqid() . '.'.$image_type;
			file_put_contents($file, $image_base64);
			echo "Tanda Tangan Sukses Diupload ";
			}


		
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
    
    
        $sql_simpan = "INSERT INTO tb_promo (id_promo, id_pelanggan, signature, tgl_daftar) VALUES (
           '".$format."',
           '".$_POST['id_pelanggan']."',
		 			 '".$_POST['signature']."',
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

    
?>