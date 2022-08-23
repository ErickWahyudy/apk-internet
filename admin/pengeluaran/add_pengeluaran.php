<?php
//kode

$pass_acak = mt_rand(1000, 9999);

  
$carikode = mysqli_query($koneksi,"SELECT id_pengeluaran FROM tb_pengeluaran order by id_pengeluaran desc");
$datakode = mysqli_fetch_array($carikode);
$kode = $datakode['id_pengeluaran'];
$urut = substr($kode, 1, 3);
$tambah = (int) $urut + 1;

if (strlen($tambah) == 1){
$format = "S"."00".$tambah;
 	}else if (strlen($tambah) == 2){
 	$format = "S"."0".$tambah;
			}else (strlen($tambah) == 3){
			$format = "S".$tambah
				}

?>
<section class="content-header">
	<h1 class="fa fa-dollar">
		Data Pengeluaran |
		<small> 
			<a href="?page=admin">Beranda</a> >
		 	<a href="?page=data-pengeluaran">Data Pengeluaran</a> >
		 	<a href="">Tambah Data Pengeluaran</a>
		</small>
	</h1>
</section>

<section class="content">
	<div class="row">
		<div class="col-md-12">
			<div class="box box-primary">
				<div class="box-header with-border">
					<h3 class="box-title">TAMBAH PENGELUARAN</h3>
					<div class="box-tools pull-right">
						<button type="button" class="btn btn-box-tool" data-widget="collapse">
							<i class="fa fa-minus"></i>
						</button>
					</div>
				</div>

				<form class="form-horizontal" action="" method="post" enctype="multipart/form-data">
					<div class="box-body">
						<div class="form-group">
							<label class="col-sm-2 control-label">ID Pengeluaran</label>
							<div class="col-sm-2">
								<input type="text" class="form-control" id="id_pengeluaran" name="id_pengeluaran" value="<?php echo $format; ?>"
								 readonly/>
							</div>
						</div>

						<div class="form-group">
							<label class="col-sm-2 control-label">Jenis Pengeluaran</label>
							<div class="col-sm-4">
								<input type="text" class="form-control" id="jenis_pengeluaran" name="jenis_pengeluaran" placeholder="Jenis pengeluaran" autofocus required>
							</div>
						</div>

						<div class="form-group">
							<label class="col-sm-2 control-label">Biaya</label>
							<div class="col-sm-4">
								<input type="number" class="form-control" id="biaya_pengeluaran" name="biaya_pengeluaran" placeholder="biaya_pengeluaran" autofocus required>
							</div>
						</div>

						<div class="form-group">
							<label class="col-sm-2 control-label">Tanggal</label>
							<div class="col-sm-4">
								<input type="date" class="form-control" id="tanggal" name="tanggal" placeholder="tanggal">
							</div>
						</div>

						<div class="form-group">
							<label class="col-sm-2 control-label">Status</label>
							<div class="col-sm-4">
								<select name="keterangan" id="keterangan" class="form-control select2" style="width: 100%;">
                  <option >-- Pilih --</option>
                  <option selected="selected" value="Belum Saya Bayar">Belum Saya Bayar</option>
				          <option value="LUNAS">LUNAS</option>
                </select>
							</div>
						</div>


						<!-- /.box-body -->
						<div class="box-footer">
							<a href="?page=data-pengeluaran" class="btn btn-default">Batal</a>
							<input type="submit" name="Simpan" value="Simpan" class="btn btn-primary">
						</div>
				</form>
				</div>
			</div>
		</div>
</section>

<?php

    if (isset ($_POST['Simpan'])){
    
        $sql_simpan = "INSERT INTO tb_pengeluaran (id_pengeluaran, jenis_pengeluaran, biaya_pengeluaran, tanggal, keterangan) VALUES (
           '".$_POST['id_pengeluaran']."',
         	 '".$_POST['jenis_pengeluaran']."',
		  		 '".$_POST['biaya_pengeluaran']."',
				   '".$_POST['tanggal']."',
				   '".$_POST['keterangan']."')";
        $query_simpan = mysqli_query($koneksi, $sql_simpan);
        mysqli_close($koneksi);

    if ($query_simpan){

      echo "<script>
      Swal.fire({title: 'Tambah Data Berhasil',text: '',icon: 'success',confirmButtonText: 'OKE'
      }).then((result) => {
          if (result.value) {
              window.location = 'index.php?page=data-pengeluaran';
          }
      })</script>";
      }else{
      echo "<script>
      Swal.fire({title: 'Tambah Data Gagal',text: '',icon: 'error',confirmButtonText: 'OKE'
      }).then((result) => {
          if (result.value) {
              window.location = 'index.php?page=data-pengeluaran';
          }
      })</script>";
    }
  }
    
