<?php
//kode
  
$carikode = mysqli_query($koneksi,"SELECT id_tagihan_lain FROM tb_tagihan_lain order by id_tagihan_lain desc");
$datakode = mysqli_fetch_array($carikode);
$kode = $datakode['id_tagihan_lain'];
$urut = substr($kode, 1, 3);
$tambah = (int) $urut + 1;

if (strlen($tambah) == 1){
$format = "L"."00".$tambah;
 	}else if (strlen($tambah) == 2){
 	$format = "L"."0".$tambah;
			}else (strlen($tambah) == 3){
			$format = "L".$tambah
				}
				

?>
<section class="content-header">
	<h1 class="fa fa-calculator">
		Data Tagihan Lainnya |
		<small> 
			<a href="?page=admin">Beranda</a> >
			<a href="?page=data-tagihan-lain">Data Tagihan Lainnya</a> >
		 	<a href="?page=buat-tagihan-khusus">Tambah Tagihan Khusus</a>
		</small>
	</h1>
</section>

<section class="content">
	<div class="row">
		<div class="col-md-12">
			<div class="box box-primary">
				<div class="box-header with-border">
					<h3 class="box-title">TAMBAH TAGIHAN KHUSUS</h3>
					<div class="box-tools pull-right">
						<button type="button" class="btn btn-box-tool" data-widget="collapse">
							<i class="fa fa-minus"></i>
						</button>
					</div>
				</div>

				<form class="form-horizontal" action="" method="post" enctype="multipart/form-data">
					<div class="box-body">
						<div class="form-group">
							<label class="col-sm-2 control-label">ID Tagihan</label>
							<div class="col-sm-2">
								<input type="text" class="form-control" id="id_tagihan_lain" name="id_tagihan_lain" value="<?php echo $format; ?>"
								 readonly/>
							</div>
						</div>

						<div class="form-group">
							<label class="col-sm-2 control-label">Nama Pelanggan</label>
							<div class="col-sm-4">
								<select name="id_pelanggan" id="id_pelanggan" class="form-control select2" style="width: 100%;" required="">
									<option selected="selected">-- Pilih Nama Pelanggan --</option>
									<?php
										
										$sql = $koneksi->query("SELECT p.id_pelanggan, p.nama, k.paket, k.tarif from tb_pelanggan p inner join 
										tb_paket k on p.id_paket=k.id_paket where status_plg='Aktif' order by id_pelanggan");
										while ($row= $sql->fetch_assoc()) {
										?>
										<option value="<?php echo $row['id_pelanggan'] ?>">
										<?php echo $row['id_pelanggan'] ?> | <?php echo $row['nama'] ?>
										
									</option>
									<?php
								}
								?>
								</select>
							</div>
						</div>

						<div class="form-group">
							<label class="col-sm-2 control-label">Tagihan</label>
							<div class="col-sm-4">
								<input type="number" class="form-control" id="tagihan" name="tagihan" placeholder="Total Tagihan" autocomplete="off" required="">
							</div>
						</div>

						<div class="form-group">
							<label class="col-sm-2 control-label">Status</label>
							<div class="col-sm-4">
								<select name="status" id="status" class="form-control select2" style="width: 100%;" required="">
                  <option selected="selected">-- Pilih --</option>
                  <option value="BL">Belum Di Bayar</option>
				          <option value="LS">LUNAS</option>
                </select>
							</div>
						</div>

						<div class="form-group">
							<label class="col-sm-2 control-label">Tanggal bayar</label>
							<div class="col-sm-4">
								<input type="date" class="form-control" id="tgl_bayar" name="tgl_bayar">
							</div>
						</div>

						<div class="form-group">
							<label class="col-sm-2 control-label">Keterangan</label>
							<div class="col-sm-4">
								<input type="text" class="form-control" id="keterangan" name="keterangan" placeholder="Keterangan" autocomplete="off" required="">
							</div>
						</div>


						<!-- /.box-body -->
						<div class="box-footer">
							<a href="?page=data-tagihan-lain" class="btn btn-default">Batal</a>
							<input type="submit" name="Simpan" value="Simpan" class="btn btn-primary">
						</div>
				</form>
				</div>
			</div>
		</div>
</section>

<?php

    if (isset ($_POST['Simpan'])){
    
        $sql_simpan = "INSERT INTO tb_tagihan_lain (id_tagihan_lain, id_pelanggan, tagihan, status, keterangan, tgl_bayar) VALUES (
           '".$_POST['id_tagihan_lain']."',
				   '".$_POST['id_pelanggan']."',
				   '".$_POST['tagihan']."',
				   '".$_POST['status']."',
				   '".$_POST['keterangan']."',
				   '".$_POST['tgl_bayar']."')";
        $query_simpan = mysqli_query($koneksi, $sql_simpan);
        mysqli_close($koneksi);

    if ($query_simpan){

      echo "<script>
      Swal.fire({title: 'Tambah Data Berhasil',text: '',icon: 'success',confirmButtonText: 'OKE'
      }).then((result) => {
          if (result.value) {
              window.location = 'index.php?page=data-tagihan-lain';
          }
      })</script>";
      }else{
      echo "<script>
      Swal.fire({title: 'Tambah Data Gagal',text: '',icon: 'error',confirmButtonText: 'OKE'
      }).then((result) => {
          if (result.value) {
              window.location = 'index.php?page=buat-tagihan-khusus';
          }
      })</script>";
    }
  }
    
