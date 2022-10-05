<?php



    if(isset($_GET['kode'])){

        $sql_cek = "SELECT * FROM tb_pengeluaran WHERE id_pengeluaran='".$_GET['kode']."'";

        $query_cek = mysqli_query($koneksi, $sql_cek);

        $data_cek = mysqli_fetch_array($query_cek,MYSQLI_BOTH);

    }

?>

<section class="content-header">

	<h1 class="fa fa-dollar">

		Data Pengeluaran |

		<small> 

			<a href="?page=admin">Beranda</a> >

		 	<a href="?page=data-pengeluaran">Data Pengeluaran</a> >

		 	<a href="">Edit Data Pengeluaran</a>

		</small>

	</h1>

</section>



<section class="content">

	<div class="row">

		<div class="col-md-12">

			<!-- general form elements -->

			<div class="box box-success">

				<div class="box-header with-border">

					<h3 class="box-title">Edit Data Pengeluaran</h3>

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

							<label class="col-sm-2 control-label">ID Pengeluaran</label>

							<div class="col-sm-4">

								<input type="text" class="form-control" id="id_pengeluaran" name="id_pengeluaran" value="<?php echo $data_cek['id_pengeluaran']; ?>"

								 readonly/>

							</div>

						</div>



						<div class="form-group">

							<label class="col-sm-2 control-label">Jenis Pengeluaran</label>

							<div class="col-sm-4">

								<input type="text" class="form-control" id="jenis_pengeluaran" name="jenis_pengeluaran" value="<?php echo $data_cek['jenis_pengeluaran']; ?>">

							</div>

						</div>





						<div class="form-group">

							<label class="col-sm-2 control-label">Biaya</label>

							<div class="col-sm-4">

								<input type="number" class="form-control" id="biaya_pengeluaran" name="biaya_pengeluaran" value="<?php echo $data_cek['biaya_pengeluaran']; ?>">

							</div>

						</div>



						<div class="form-group">

							<label class="col-sm-2 control-label">Tanggal</label>

							<div class="col-sm-4">

								<input type="date" class="form-control" id="tanggal" name="tanggal" value="<?php echo $data_cek['tanggal']; ?>">

							</div>

						</div>

						<div class="form-group">

							<label class="col-sm-2 control-label">Status</label>

							<div class="col-sm-4">

								<select name="keterangan" id="keterangan" class="form-control select2" style="width: 100%;">

				                  <option selected="selected" id="keterangan"><?php echo $data_cek['keterangan']; ?></option>

				                  <option value="Belum Saya Bayar">Belum Saya Bayar</option>

				                  <option value="LUNAS">LUNAS</option>

				                </select>

							</div>

						</div>





						<!-- /.box-body -->

						<div class="box-footer">

							<a href="?page=del-pengeluaran&kode=<?php echo $data_cek['id_pengeluaran']; ?>" onclick="return confirm('Yakin Hapus Data Ini ?')" title="Hapus" class="btn btn-danger">

							<i class="glyphicon glyphicon-remove"></i> Hapus</a>&emsp;

							<a href="?page=data-pengeluaran" class="btn btn-default">Batal</a>&emsp;

							<input type="submit" name="Ubah" value="Simpan" class="btn btn-success">

						</div>

				</form>

				</div>

				<!-- /.box -->

</section>



<?php



if (isset ($_POST['Ubah'])){

    //mulai Mahasiswaoses ubah

    $sql_ubah = "UPDATE tb_pengeluaran SET

		jenis_pengeluaran='".$_POST['jenis_pengeluaran']."',

		biaya_pengeluaran='".$_POST['biaya_pengeluaran']."',

		tanggal='".$_POST['tanggal']."',

		keterangan='".$_POST['keterangan']."'

        WHERE id_pengeluaran='".$_POST['id_pengeluaran']."'";

    $query_ubah = mysqli_query($koneksi, $sql_ubah);



    if ($query_ubah) {

        echo "<script>

        Swal.fire({title: 'Ubah Data Berhasil',text: '',icon: 'success',confirmButtonText: 'OK'

        }).then((result) => {

            if (result.value) {

                window.location = 'index.php?page=data-pengeluaran';

            }

        })</script>";

        }else{

        echo "<script>

        Swal.fire({title: 'Ubah Data Gagal',text: '',icon: 'error',confirmButtonText: 'OK'

        }).then((result) => {

            if (result.value) {

                window.location = 'index.php?page=data-pengeluaran';

            }

        })</script>";

    }

}



