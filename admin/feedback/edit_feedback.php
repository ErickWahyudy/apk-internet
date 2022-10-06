<?php

    if(isset($_GET['kode'])){
        $sql_cek = "SELECT * FROM tb_feedback WHERE id_feedback='".$_GET['kode']."'";
        $query_cek = mysqli_query($koneksi, $sql_cek);
        $data_cek = mysqli_fetch_array($query_cek,MYSQLI_BOTH);
    }
?>
<section class="content-header">
    <h1 class="fa fa-caret-square-o-up">
        Feedback |
        <small>
            <a href="?page=admin">Beranda</a> >
            <a href="?page=data-feedback">Data Feedback</a> >
            <a href="">Edit Data Feedback</a>
        </small>
    </h1>
</section>

<section class="content">
    <div class="row">
        <div class="col-md-12">
            <!-- general form elements -->
            <div class="box box-success">
                <div class="box-header with-border">
                    <h3 class="box-title">Ubah Feedback</h3>
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
                            <label>ID feedback</label>
                            <input type='text' class="form-control" name="id_feedback"
                                value="<?php echo $data_cek['id_feedback']; ?>" readonly />
                        </div>

                        <div class="form-group">
                            <label>Nama User</label>
                            <input type="text" class="form-control" name="nama"
                                value="<?php echo $data_cek['nama']; ?>" />
                        </div>

                        <div class="form-group">
                            <label>No HP / Email</label>
                            <input type="text" class="form-control" name="no_hp"
                                value="<?php echo $data_cek['no_hp']; ?>" />
                        </div>

                        <div class="form-group">
                            <label>Nilai</label>
                            <input type="number" class="form-control" name="nilai"
                                value="<?php echo $data_cek['nilai']; ?>" />
                        </div>

                        <div class="form-group">
                            <label>Feedback</label>
                            <input type="text" class="form-control" name="feedback"
                                value="<?php echo $data_cek['feedback']; ?>" />
                        </div>

                        <div class="form-group">
                            <label>Tanggal</label>
                            <input type="date" class="form-control" name="tanggal"
                                value="<?php echo $data_cek['tanggal']; ?>" />
                        </div>

                        <!-- /.box-body -->

                        <div class="box-footer">
                            <a href="?page=del-feedback&kode=<?php echo $data_cek['id_feedback']; ?>"
                                onclick="return confirm('Yakin Hapus Data Ini ?')" title="Hapus" class="btn btn-danger">
                                <i class="glyphicon glyphicon-remove"></i> Hapus</a>&emsp;
                            <a href="?page=data-feedback" title="Kembali" class="btn btn-warning">Batal</a>&emsp;
                            <input type="submit" name="Ubah" value="Ubah" class="btn btn-success">
                        </div>
                </form>
            </div>
            <!-- /.box -->
</section>

<?php

if (isset ($_POST['Ubah'])){
    //mulai proses ubah
		$sql_ubah = "UPDATE tb_feedback SET
        nama='".$_POST['nama']."',
		no_hp='".$_POST['no_hp']."',
		nilai='".$_POST['nilai']."',
		feedback='".$_POST['feedback']."',
        tanggal='".$_POST['tanggal']."'
        WHERE id_feedback	='".$_POST['id_feedback']."'";

    // Masukkan feedback file ke database
    $query_ubah = mysqli_query($koneksi, $sql_ubah);
    if ($query_ubah) {
        echo "<script>
      Swal.fire({title: 'Ubah Data Berhasil',text: '',icon: 'success',confirmButtonText: 'OK'
      }).then((result) => {
          if (result.value) {
              window.location = 'index.php?page=data-feedback';
          }
      })</script>";
      }else{
      echo "<script>
      Swal.fire({title: 'Ubah Data Gagal',text: '',icon: 'error',confirmButtonText: 'OK'
      }).then((result) => {
          if (result.value) {
              window.location = 'index.php?page=data-feedback';
          }
      })</script>";
    }

    //selesai proses ubah
}



?>