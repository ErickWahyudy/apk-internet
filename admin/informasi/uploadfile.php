<?php

    if(isset($_GET['kode'])){
        $sql_cek = "SELECT * FROM tb_informasi WHERE id_informasi='".$_GET['kode']."'";
        $query_cek = mysqli_query($koneksi, $sql_cek);
        $data_cek = mysqli_fetch_array($query_cek,MYSQLI_BOTH);
    }
?>
<section class="content-header">
	<h1 class="fa fa-bullhorn">
		Layanan Informasi |
		<small> 
			<a href="?page=admin">Beranda</a> >
		 	<a href="?page=data-informasi">Data Layanan Informasi</a> >
		 	<a href="">Upload File</a>
		</small>
	</h1>
</section>

<section class="content">
	<div class="row">
		<div class="col-md-12">
			<!-- general form elements -->
			<div class="box box-success">
				<div class="box-header with-border">
					<h3 class="box-title">Upload File</h3>
					<div class="box-tools pull-right">
						<button type="button" class="btn btn-box-tool" data-widget="collapse">
							<i class="fa fa-minus"></i>
						</button>
					</div>
				</div>
				<!-- /.box-header -->
				<!-- form start -->
				<form action="" method="post" enctype="multipart/form-data">
					<div class="box-body">

						<div class="form-group">
							<label>ID Informasi</label>
							<input type='text' class="form-control" name="id_informasi" value="<?php echo $data_cek['id_informasi']; ?> | <?php echo $data_cek['informasi']; ?>"
							 readonly/>
						</div>


						<div class="form-group">
							<label>File</label>
							<input type="text" class="form-control" name="berkas" value="<?php echo $data_cek['berkas']; ?>" readonly
							/>
							<input type="file" class="form-control" name="berkas" value="<?php echo $data_cek['berkas']; ?>"
							/>
						</div>


						<!-- /.box-body -->

						<div class="box-footer">
							<a href="?page=data-informasi" title="Kembali" class="btn btn-warning">Batal</a>&emsp;
							<input type="submit" name="Upload" value="Upload" class="btn btn-success">
						</div>
				</form>
				</div>
				<!-- /.box -->
</section>

<?php

if (isset ($_POST['Upload'])){
    //mulai proses upload
		$ekstensi_diperbolehkan    = array('pdf','docx', 'txt', 'xlsx');
        $filename    	= $_FILES['berkas']['name'];
        $x        		= explode('.', $filename);
        $ekstensi    	= strtolower(end($x));
        $ukuran       = $_FILES['berkas']['size'];
        $file_tmp    	= $_FILES['berkas']['tmp_name']; 
        if(in_array($ekstensi, $ekstensi_diperbolehkan) === true){
            if($ukuran < 1044070){ 
                move_uploaded_file($file_tmp, 'uploadfile/'.$filename);

    // Masukkan informasi file ke database
    $sql_upload = "UPDATE tb_informasi SET
        berkas				='".$filename."'
        WHERE id_informasi='".$_GET['kode']."'";

        
    $query_upload = mysqli_query($koneksi, $sql_upload);
    if ($query_upload) {
        echo "<script>
      Swal.fire({title: 'Upload Data Berhasil',text: '',icon: 'success',confirmButtonText: 'OK'
      }).then((result) => {
          if (result.value) {
              window.location = 'index.php?page=data-informasi';
          }
      })</script>";
      }else{
      echo "<script>
      Swal.fire({title: 'Upload Data Gagal',text: '',icon: 'error',confirmButtonText: 'OK'
      }).then((result) => {
          if (result.value) {
              window.location = 'index.php?page=data-informasi';
          }
      })</script>";
    }

    //selesai proses ubah
}

}}

?>
