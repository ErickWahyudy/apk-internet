<?php
if(isset($_GET['kode'])){
            $sql_hapus = "DELETE FROM tb_lapor WHERE id_lapor ='".$_GET['kode']."'";
            $query_hapus = mysqli_query($koneksi, $sql_hapus);

            if ($query_hapus) {
                echo "<script>
                Swal.fire({title: 'Hapus Data Berhasil',text: '',icon: 'success',confirmButtonText: 'OK'
                }).then((result) => {
                    if (result.value) {
                        window.location = 'index.php?page=data-lapor';
                    }
                })</script>";
                }else{
                echo "<script>
                Swal.fire({title: 'Hapus Data Gagal',text: '',icon: 'error',confirmButtonText: 'OK'
                }).then((result) => {
                    if (result.value) {
                        window.location = 'index.php?page=data-lapor';
                    }
                })</script>";
            }
        }

$files    =glob('uploadfile/*');
foreach ($files as $lapor) {
    if (is_file($lapor))
    unlink($lapor); // hapus file
}