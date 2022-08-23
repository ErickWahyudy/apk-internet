<?php

    if(isset($_GET['kode'])){
        $sql_cek = "SELECT p.id_pelanggan, p.nama, p.no_hp, t.id_tagihan_lain, t.tagihan, t.status, t.keterangan, t.tgl_bayar   
				  from tb_pelanggan p inner join tb_tagihan_lain t on p.id_pelanggan=t.id_pelanggan WHERE id_tagihan_lain='".$_GET['kode']."'";
        $query_cek = mysqli_query($koneksi, $sql_cek);
        $data_cek = mysqli_fetch_array($query_cek,MYSQLI_BOTH);
    }
?>
<section class="content-header">
	<h1 class="fa fa-tablet">
		Data Tagihan Lainnya |
		<small> 
			<a href="?page=admin">Beranda</a> >
		 	<a href="?page=data-tagihan-lain">Data Tagihan Lainnya</a> >
		 	<a href="">Edit Data Tagihan Khusus</a>
		</small>
	</h1>
</section>

<section class="content">
	<div class="row">
		<div class="col-md-12">
			<!-- general form elements -->
			<div class="box box-success">
				<div class="box-header with-border">
					<h3 class="box-title">Edit Data Tagihan Khusus</h3>
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
							<label class="col-sm-2 control-label">ID Tagihan</label>
							<div class="col-sm-4">
								<input type="text" class="form-control" id="id_tagihan_lain" name="id_tagihan_lain" value="<?php echo $data_cek['id_tagihan_lain']; ?>"
								 readonly/>
							</div>
						</div>

						<div class="form-group">
							<label class="col-sm-2 control-label">ID Pelanggan</label>
							<div class="col-sm-4">
								<input type="text" class="form-control" id="id_pelanggan" name="id_pelanggan" value="<?php echo $data_cek['id_pelanggan']; ?> - <?php echo $data_cek['nama']; ?>"
								 readonly/>
							</div>
						</div>

						<div class="form-group">
							<label class="col-sm-2 control-label">Status</label>
							<div class="col-sm-4">
								<select name="status" id="status" class="form-control select2" style="width: 100%;" required="">
                  				<option selected="selected"><?php echo $data_cek['status']; ?></option>
                 				<option value="BL">Belum Di Bayar</option>
				          		<option value="LS">LUNAS</option>
                				</select>
							</div>
						</div>

						<div class="form-group">
							<label class="col-sm-2 control-label">Tgl Bayar</label>
							<div class="col-sm-4">
								<input type="date" class="form-control" id="tgl_bayar" name="tgl_bayar" value="<?php echo $data_cek['tgl_bayar']; ?>">
							</div>
						</div>

						<div class="form-group">
							<label class="col-sm-2 control-label">Keterangan</label>
							<div class="col-sm-4">
								<input type="text" class="form-control" id="keterangan" name="keterangan" value="<?php echo $data_cek['keterangan']; ?>">
							</div>
						</div>

						<div class="form-group">
							<label class="col-sm-2 control-label">Tagihan</label>
							<div class="col-sm-4">
								<input type="number" class="form-control" id="tagihan" name="tagihan" value="<?php echo $data_cek['tagihan']; ?>">
							</div>
						</div>

						<!-- /.box-body -->
						<div class="box-footer">
							<a href="?page=del-tagihan-lain&kode=<?php echo $data_cek['id_tagihan_lain']; ?>" onclick="return confirm('Yakin Hapus Data Ini ?')"
								 title="Hapus" class="btn btn-danger">
									<i class="glyphicon glyphicon-remove"></i> HAPUS
								</a>&emsp;
							<a href="?page=data-tagihan-lain" class="btn btn-default">Batal</a>&emsp;
							<input type="submit" name="Ubah" value="Simpan" class="btn btn-success">
						</div>
				</form>
				</div>
				<!-- /.box -->
</section>

<?php

if (isset ($_POST['Ubah'])){
    //mulai Mahasiswaoses ubah
    $sql_ubah = "UPDATE tb_tagihan_lain SET
		tagihan='".$_POST['tagihan']."',
		status='".$_POST['status']."',
		tgl_bayar='".$_POST['tgl_bayar']."',
		keterangan='".$_POST['keterangan']."'
        WHERE id_tagihan_lain='".$_POST['id_tagihan_lain']."'";
    $query_ubah = mysqli_query($koneksi, $sql_ubah);

    if ($query_ubah) {
        echo "<script>
        Swal.fire({title: 'Ubah Data Berhasil',text: '',icon: 'success',confirmButtonText: 'OK'
        }).then((result) => {
            if (result.value) {
                window.location = 'index.php?page=data-tagihan-lain';
            }
        })</script>";
        }else{
        echo "<script>
        Swal.fire({title: 'Ubah Data Gagal',text: '',icon: 'error',confirmButtonText: 'OK'
        }).then((result) => {
            if (result.value) {
                window.location = 'index.php?page=edit-tagihan-lain';
            }
        })</script>";
    }
}

