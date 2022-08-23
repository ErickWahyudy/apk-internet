<?php

    if(isset($_GET['kode'])){
        $sql_cek = "SELECT p.id_pelanggan, p.nama, p.no_hp, t.id_tagihan, t.tagihan, t.status, t.tgl_bayar, t.bulan, t.tahun   
				  from tb_pelanggan p inner join tb_tagihan t on p.id_pelanggan=t.id_pelanggan WHERE id_tagihan='".$_GET['kode']."'";
        $query_cek = mysqli_query($koneksi, $sql_cek);
        $data_cek = mysqli_fetch_array($query_cek,MYSQLI_BOTH);
    }
?>
<section class="content-header">
	<h1 class="fa fa-money">
		Data Pembayaran |
		<small> 
			<a href="?page=admin">Beranda</a> >
		 	<a href="?page=lunas-tagihan">Data Lunas Pembayaran</a> >
		 	<a href="">Edit Data Lunas Pembayaran</a>
		</small>
	</h1>
</section>

<section class="content">
	<div class="row">
		<div class="col-md-12">
			<!-- general form elements -->
			<div class="box box-success">
				<div class="box-header with-border">
					<h3 class="box-title">Edit Data Pembayaran</h3>
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
								<input type="text" class="form-control" id="id_tagihan" name="id_tagihan" value="<?php echo $data_cek['id_tagihan']; ?>"
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
							<label class="col-sm-2 control-label">Bulan / Tahun</label>
							<div class="col-sm-4">
								<input type="text" class="form-control" id="bulan" name="bulan" value="<?php echo $data_cek['bulan']; ?> / <?php echo $data_cek['tahun']; ?>"
								readonly/>
							</div>
						</div>

						<div class="form-group">
							<label class="col-sm-2 control-label">Status</label>
							<div class="col-sm-4">
								<input type="text" class="form-control" id="status" name="status" value="<?php echo $data_cek['status']; ?>" readonly/>
							</div>
						</div>

						<div class="form-group">
							<label class="col-sm-2 control-label">Tgl Bayar</label>
							<div class="col-sm-4">
								<input type="date" class="form-control" id="tgl_bayar" name="tgl_bayar" value="<?php echo $data_cek['tgl_bayar']; ?>"/>
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
							<a href="?page=lunas-tagihan" class="btn btn-default">Batal</a>&emsp;
							<input type="submit" name="Ubah" value="Simpan" class="btn btn-success">
						</div>
				</form>
				</div>
				<!-- /.box -->
</section>

<?php

if (isset ($_POST['Ubah'])){
    //mulai Mahasiswaoses ubah
    $sql_ubah = "UPDATE tb_tagihan SET
    	tgl_bayar='".$_POST['tgl_bayar']."',
		tagihan='".$_POST['tagihan']."'
        WHERE id_tagihan='".$_POST['id_tagihan']."'";
    $query_ubah = mysqli_query($koneksi, $sql_ubah);

    if ($query_ubah) {
        echo "<script>
        Swal.fire({title: 'Ubah Data Berhasil',text: '',icon: 'success',confirmButtonText: 'OK'
        }).then((result) => {
            if (result.value) {
                window.location = 'index.php?page=lunas-tagihan';
            }
        })</script>";
        }else{
        echo "<script>
        Swal.fire({title: 'Ubah Data Gagal',text: '',icon: 'error',confirmButtonText: 'OK'
        }).then((result) => {
            if (result.value) {
                window.location = 'index.php?page=lunas-tagihan';
            }
        })</script>";
    }
}

