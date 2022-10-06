<?php

//kode



$pass_acak = mt_rand(1000, 9999);

  

$carikode = mysqli_query($koneksi,"SELECT id_informasi FROM tb_informasi order by id_informasi desc");

$datakode = mysqli_fetch_array($carikode);

$kode = $datakode['id_informasi'];

$urut = substr($kode, 1, 3);

$tambah = (int) $urut + 1;



if (strlen($tambah) == 1){

$format = "I"."00".$tambah;

 	}else if (strlen($tambah) == 2){

 	$format = "I"."0".$tambah;

			}else (strlen($tambah) == 3){

			$format = "I".$tambah

				}



?>





<section class="content-header">

    <h1 class="fa fa-bullhorn">

        Layanan Informasi |

        <small>

            <a href="?page=admin">Beranda</a> >

            <a href="?page=data-informasi">Data Layanan Informasi</a> >

            <a href="">Tambah Data Layanan Informasi</a>

        </small>

    </h1>

</section>



<section class="content">

    <div class="row">

        <div class="col-md-12">

            <!-- general form elements -->

            <div class="box box-info">

                <div class="box-header with-border">

                    <h3 class="box-title">TAMBAH INFORMASI</h3>

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

                <!-- form start -->

                <form action="" method="post" enctype="multipart/form-data">

                    <div class="box-body">

                        <div class="form-group">

                            <label class="col-sm-2 control-label">ID Informasi</label>

                            <input type="text" name="id_informasi" id="id_informasi" class="form-control"
                                placeholder="ID Informasi" readonly="" value="<?php echo $format; ?>">

                        </div>



                        <div class="form-group">

                            <label class="col-sm-2 control-label">Nama Informasi</label>

                            <input type="text" name="informasi" id="informasi" class="form-control"
                                placeholder="Nama Informasi">

                        </div>









                    </div>

                    <!-- /.box-body -->



                    <div class="box-footer">

                        <a href="?page=data-informasi" title="Kembali" class="btn btn-warning">Batal</a>

                        <input type="submit" name="Simpan" value="Simpan" class="btn btn-info">

                    </div>

                </form>

            </div>

            <!-- /.box -->

</section>



<?php



     if (isset ($_POST['Simpan'])){

    //mulai proses simpan data

     	$sql_simpan = "INSERT INTO tb_informasi (id_informasi,informasi) VALUES (

        '".$_POST['id_informasi']."',

        '".$_POST['informasi']."')";



		// Masukkan informasi file ke database

        $query_simpan = mysqli_query($koneksi, $sql_simpan);

    if ($query_simpan) {

      echo "<script>

      Swal.fire({title: 'Tambah Data Berhasil',text: '',icon: 'success',confirmButtonText: 'OK'

      }).then((result) => {if (result.value){

        window.location = 'index.php?page=data-informasi';

        }

      })</script>";

      }else{

      echo "<script>

      Swal.fire({title: 'Tambah Data Gagal',text: '',icon: 'error',confirmButtonText: 'OK'

      }).then((result) => {if (result.value){

        window.location = 'index.php?page=add-informasi';

        }

      })</script>";

    }

     //selesai proses simpan data

}









    