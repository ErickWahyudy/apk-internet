<?php

    if(isset($_GET['kode'])){
        $sql_cek = "SELECT * FROM tb_paket WHERE id_paket='".$_GET['kode']."'";
        $query_cek = mysqli_query($koneksi, $sql_cek);
        $data_cek = mysqli_fetch_array($query_cek,MYSQLI_BOTH);
    }
?>
<section class="content-header">
	<h1 class="fa fa-send">
		Data Paket | 
		<small> 
			<a href="?page=admin">Beranda</a> >
		 	<a href="?page=data-paket">Data Paket</a> >
		 	<a href="">Edit Data Paket</a>
		</small>
	</h1>
</section>

<section class="content">
	<div class="row">
		<div class="col-md-12">
			<!-- general form elements -->
			<div class="box box-success">
				<div class="box-header with-border">
					<h3 class="box-title">UBAH PAKET</h3>
					<div class="box-tools pull-right">
						<button type="button" class="btn btn-box-tool" data-widget="collapse">
							<i class="fa fa-minus"></i>
						</button>
						<button type="button" class="btn btn-box-tool" data-widget="remove">
							<i class="fa fa-remove"></i>
						</button>
					</div>
				</div>
				<!-- /.box-header -->
				<form class="form-horizontal" action="" method="post" enctype="multipart/form-data">
					<div class="box-body">
						<div class="form-group">
							<label class="col-sm-2 control-label">ID Paket</label>
							<div class="col-sm-2">
								<input type="text" class="form-control" id="id_paket" name="id_paket" value="<?php echo $data_cek['id_paket']; ?>"
								 readonly/>
							</div>
						</div>

						<div class="form-group">
							<label class="col-sm-2 control-label">Paket (MB)</label>
							<div class="col-sm-4">
								<input type="text" class="form-control" id="paket" name="paket" placeholder="Paket" value="<?php echo $data_cek['paket']; ?>" required>
							</div>
						</div>

						<div class="form-group">
							<label class="col-sm-2 control-label">Tarif Per Bulan</label>
							<div class="col-sm-4">
								<input type="text" class="form-control" id="tarif" name="tarif" placeholder="Tarif Per Bulan" value="<?php echo $data_cek['tarif']; ?>" required>
							</div>
						</div>

						<!-- /.box-body -->
						<div class="box-footer">
							<a href="?page=del-paket&kode=<?php echo $data_cek['id_paket']; ?>" onclick="return confirm('Yakin Hapus Data Ini ?')"
								 title="Hapus" class="btn btn-danger">
							<i class="glyphicon glyphicon-remove"></i> Hapus</a>&emsp;
							<a href="?page=data-paket" class="btn btn-default">Batal</a>&emsp;
							<input type="submit" name="Ubah" value="Simpan" class="btn btn-success">
						</div>
				</form>
				</div>
				<!-- /.box -->
</section>

<?php

if (isset ($_POST['Ubah'])){
    //mulai Mahasiswaoses ubah
    $sql_ubah = "UPDATE tb_paket SET
		paket='".$_POST['paket']."',
        tarif='".$_POST['tarif']."'
        WHERE id_paket='".$_POST['id_paket']."'";
    $query_ubah = mysqli_query($koneksi, $sql_ubah);

    if ($query_ubah) {
        echo "<script>
        Swal.fire({title: 'Ubah Data Berhasil',text: '',icon: 'success',confirmButtonText: 'OK'
        }).then((result) => {
            if (result.value) {
                window.location = 'index.php?page=data-paket';
            }
        })</script>";
        }else{
        echo "<script>
        Swal.fire({title: 'Ubah Data Gagal',text: '',icon: 'error',confirmButtonText: 'OK'
        }).then((result) => {
            if (result.value) {
                window.location = 'index.php?page=data-paket';
            }
        })</script>";
    }
}

