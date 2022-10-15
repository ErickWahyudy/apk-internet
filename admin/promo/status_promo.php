<?php

    if(isset($_GET['kode'])){
        $sql_cek = "SELECT * FROM tb_promo WHERE id_promo='".$_GET['kode']."'";
        $query_cek = mysqli_query($koneksi, $sql_cek);
        $data_cek = mysqli_fetch_array($query_cek,MYSQLI_BOTH);
    }
?>
<section class="content-header">
	<h1 class="fa fa-whatsapp">
		Status Promo |
		<small> 
			<a href="?page=admin">Beranda</a> >
		 	<a href="?page=data-promo">Data Status Promo</a> >
		 	<a href="">Edit Data Status Promo</a>
		</small>
	</h1>
</section>

<section class="content">
	<div class="row">
		<div class="col-md-12">
			<!-- general form elements -->
			<div class="box box-success">
				<div class="box-header with-border">
					<h3 class="box-title">UBAH PROMO</h3>
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
							<label>ID Status</label>
							<input type='text' class="form-control" name="id_promo" value="<?php echo $data_cek['id_promo']; ?>"
							 readonly/>
						</div>

						<div class="form-group">
							<label>Status Promo</label>
							<input type="text" class="form-control" name="status" value="<?php echo $data_cek['status']; ?>" readonly/>
							<input type="radio" name="status" value="promo"/> Promo
							<input type="radio" name="status" value="tidak ada promo"/> Tidak Ada Promo
						</div>
						
						<!-- /.box-body -->

						<div class="box-footer">
							<a href="?page=data-promo" title="Kembali" class="btn btn-warning">Batal</a>&emsp;
							<input type="submit" name="Ubah" value="Ubah" class="btn btn-success">
						</div>
				</form>
				</div>
				<!-- /.box -->
</section>

<?php

if (isset ($_POST['Ubah'])){
    //mulai proses ubah
		$sql_ubah = "UPDATE tb_promo SET
        status='".$_POST['status']."'
        WHERE id_promo	='".$_POST['id_promo']."'";

    // Masukkan promo file ke database
    $query_ubah = mysqli_query($koneksi, $sql_ubah);
    if ($query_ubah) {
        echo "<script>
      Swal.fire({title: 'Ubah Status Berhasil',text: '',icon: 'success',confirmButtonText: 'OK'
      }).then((result) => {
          if (result.value) {
              window.location = 'index.php?page=data-promo';
          }
      })</script>";
      }else{
      echo "<script>
      Swal.fire({title: 'Ubah Status Gagal',text: '',icon: 'error',confirmButtonText: 'OK'
      }).then((result) => {
          if (result.value) {
              window.location = 'index.php?page=data-promo';
          }
      })</script>";
    }

    //selesai proses ubah
}



?>
