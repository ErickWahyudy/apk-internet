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

		 	<a href="">Edit Data Layanan Informasi</a>

		</small>

	</h1>

</section>



<section class="content">

	<div class="row">

		<div class="col-md-12">

			<!-- general form elements -->

			<div class="box box-success">

				<div class="box-header with-border">

					<h3 class="box-title">UBAH Informasi</h3>

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

							<input type='text' class="form-control" name="id_informasi" value="<?php echo $data_cek['id_informasi']; ?>"

							 readonly/>

						</div>



						<div class="form-group">

							<label>Nama Informasi</label>

							<input type="text" class="form-control" name="informasi" value="<?php echo $data_cek['informasi']; ?>"

							/>

						</div>

						

						<!-- /.box-body -->



						<div class="box-footer">

							<a href="?page=del-informasi&kode=<?php echo $data_cek['id_informasi']; ?>" onclick="return confirm('Yakin Hapus Data Ini ?')" title="Hapus" class="btn btn-danger">

							<i class="glyphicon glyphicon-remove"></i> Hapus</a>&emsp;

							<a href="?page=data-informasi" title="Kembali" class="btn btn-warning">Batal</a>&emsp;

							<input type="submit" name="Ubah" value="Ubah" class="btn btn-success">

						</div>

				</form>

				</div>

				<!-- /.box -->

</section>



<?php



if (isset ($_POST['Ubah'])){

    //mulai proses ubah

		$sql_ubah = "UPDATE tb_informasi SET

        informasi 			='".$_POST['informasi']."'

        WHERE id_informasi	='".$_POST['id_informasi']."'";



    // Masukkan informasi file ke database

    $query_ubah = mysqli_query($koneksi, $sql_ubah);

    if ($query_ubah) {

        echo "<script>

      Swal.fire({title: 'Ubah Data Berhasil',text: '',icon: 'success',confirmButtonText: 'OK'

      }).then((result) => {

          if (result.value) {

              window.location = 'index.php?page=data-informasi';

          }

      })</script>";

      }else{

      echo "<script>

      Swal.fire({title: 'Ubah Data Gagal',text: '',icon: 'error',confirmButtonText: 'OK'

      }).then((result) => {

          if (result.value) {

              window.location = 'index.php?page=data-informasi';

          }

      })</script>";

    }



    //selesai proses ubah

}







?>

