<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="description" content="Layanan hotspot wifi unlimited 24 jam non stop tanpa lemot kecuali saat wifi down">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>KASSANDRA WIFI</title>
    <link rel="icon" href="../../dist/img/komp.png">
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.6 -->
    <link rel="stylesheet" href="../../bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="../../plugins/datatables/dataTables.bootstrap.css">
    <!-- Select2 -->
    <link rel="stylesheet" href="../../plugins/select2/select2.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../../dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="../../dist/css/skins/_all-skins.min.css">
    <link rel="shortcut icon" href="../../dist/img/favicon.ico" type="image/x-icon">

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
</head>
<body>
    <!-- jQuery 2.2.3 -->
    <script src="../../plugins/jQuery/jquery-2.2.3.min.js"></script>
    <!-- Bootstrap 3.3.6 -->
    <script src="../../bootstrap/js/bootstrap.min.js"></script>
    <!-- iCheck -->
    <script src="../../https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
    <!-- sweet alert -->
</body>
</html>

<?php
$pinjam          = date("d M Y");
$dua_hari        = mktime(0,0,0,date("n"),date("j")+2,date("Y"));
$deadline        = date("d M Y", $dua_hari);

require '../../email/PHPMailer/src/PHPMailer.php' ;
require '../../email/PHPMailer/src/SMTP.php';
require '../../email/PHPMailer/src/Exception.php';

include "../../inc/koneksi.php"; //memulai koneksi ke database
include "../../inc/rupiah.php";
// Cek koneksi
if (mysqli_connect_errno()) {
    echo "Koneksi database gagal : " . mysqli_connect_error();
}
$result = mysqli_query($koneksi, "SELECT p.id_pelanggan, p.nama, p.no_hp, p.email, p.password, t.id_tagihan, t.tagihan, t.bulan, t.tahun from tb_pelanggan p inner join tb_tagihan t on p.id_pelanggan=t.id_pelanggan where status='BL'");
// Mengambil semua data email dalam bentuk array
$result = mysqli_fetch_all($result, MYSQLI_ASSOC);

foreach ($result as $key => $data) { //mengirim email untuk setiap baris data
    $mail =  new PHPMailer\PHPMailer\PHPMailer();
    $mail->IsSMTP();
    $mail->IsHTML(true);
    $mail->SMTPAuth     = true;
    $mail->Host         = "smtp.gmail.com";
    $mail->Port         = 587;
    $mail->SMTPSecure   = "tls";
    $mail->Username     = "kassandramikrotik@gmail.com";   //username SMTP
    $mail->Password     = "abzdjiivohwzwieo";                 //password SMTP
    $mail->From         = "kassandramikrotik@gmail.com";   //email pengirim
    $mail->FromName     = "KASSANDRA WiFi";                   //nama  pengirim
    $mail->AddAddress($data['email'], $data['nama']);//email dan nama penerima
    $mail->Subject  	=  "Yth. " .$data['nama'] . " Ada Tagihan KassandraWiFi Untuk Bulan ".$data['bulan'] . " / " .$data['tahun'] . " Yang Belum Dibayar" ; //judul email
    $mail->Body     	=  "<table><thead><tr>
                            <td style=font-family:Roboto,RobotoDraft,Helvetica,Arial,sans-serif;border-width:1px;border-style:dashed;border-color:rgb(37,63,89);background:lavender;color:rgb(0,0,0);font-size:16px;padding-left:1em;padding-right:1em>  ".
                            "<p style=font-size:18px>Pelanggan Yth. Sdr/i ".$data['nama']. " Ada tagihan hotspot
                            KassandraWiFi untuk Bulan ".$data['bulan'] . " / Tahun " .$data['tahun']. " yang belum dibayar.</p>".
                           "Dengan rincian Biaya Tagihan : <br><b>Rp. ".number_format($data['tagihan'], 0, ',', '.') . "</b>".
                           "<br>Pembayaran dapat dilakukan secara Tunai maupun transfer Bank, ShopeePay, LinkAja, Dana, Alfamart atau platform digital lainnya.
                           <br><br>Anda dapat melunasi pembayaran sebelum batas akhir pada tanggal 10 - ".$data['bulan'] . " - " .$data['tahun'] . 
                           ". Mari lunasi tagihan ini segera, demi kenyamanan internet bersama!
                           <p align=center colspan=2 style=font-family:Roboto,RobotoDraft,Helvetica,Arial,sans-serif>
                           <a href='https://wifi.kassandra.my.id/pelanggan/tagihan_plg.php?id_tagihan=" .$data['id_tagihan']. "' style=color:rgb(255,255,255);background-color:#589bf2;border-width:initial;border-style:none;border-radius:15px;padding:10px 20px target=_blank >" .
                           " Bayar Sekarang</a></p><br><br>Abaikan pesan jika sudah melakukan pembayaran. Terima kasih." .
                           "<br><br></td></tr></thead></table>
                           
                             <p style=font-size:18px;padding-left:1em;padding-right:1em>
                            Bayar lebih mudah melalui merchant KassandraWifi berikut ini :
                            </p>

                            <table><thead>
                            <tr>
                            <td style=padding-left:1em;padding-right:1em>
                                <a>
                                <img src=https://wifi.kassandra.my.id/dist/img/transferbank.png height=35px>
                                </a>

                                <a>
                                <img src=https://wifi.kassandra.my.id/dist/img/shopeepay.png height=22px>
                                </a>

                                <a>
                                <img src=https://wifi.kassandra.my.id/dist/img/linkaja.png height=35px>
                                </a>

                                <a>
                                <img src=https://wifi.kassandra.my.id/dist/img/dana.png height=35px>
                                </a>

                                <a>
                                <img src=https://wifi.kassandra.my.id/dist/img/alfamart.png height=35px>
                                </a>

                                <a>
                                <img src=https://wifi.kassandra.my.id/dist/img/indomaret.png height=35px>
                                </a>
                            </td>
                            </tr>
                            </thead></table><br>

                            <p style=font-size:16px;padding-left:1em;padding-right:1em>
                            <i>Pesan ini dikirim otomatis oleh system aplikasi KassandraWiFi</i>
                            <br><img src='https://wifi.kassandra.my.id/dist/img/wifi.png'>
                            <br><b>~ wifi@kassandra.my.id ~</b></p>" ; //isi   email
    //$mail->AddAttachment("cpanel.png", "filesaya.png");
    if ($mail->Send()) {
        echo "<script>
        Swal.fire({title: 'Berhasil mengirim email',text: '',icon: 'success',confirmButtonText: 'OK'
        }).then((result) => {
            if (result.value) {
                window.location = '../../index.php?page=buka-tagihan';
            }
        })</script>";
        }else{
        echo "<script>
        Swal.fire({title: 'Gagal mengirim email',text: '',icon: 'error',confirmButtonText: 'OK'
        }).then((result) => {
            if (result.value) {
                window.location = '../../index.php?page=buka-tagihan';
            }
        })</script>";
    }
}
mysqli_close($koneksi);
