<?php
	$tanggal = date("Y-m-d");

    if(isset($_GET['kode'])){
        $sql_cek = "SELECT * FROM tb_tagihan WHERE id_tagihan='".$_GET['kode']."'";
        $query_cek = mysqli_query($koneksi, $sql_cek);
        $data_cek = mysqli_fetch_array($query_cek,MYSQLI_BOTH);
	}
	
    $sql_ubah = "UPDATE tb_tagihan SET
		status='LS',
        tgl_bayar='".$tanggal."'
        WHERE id_tagihan='".$_GET['kode']."'";
    $query_ubah = mysqli_query($koneksi, $sql_ubah);

    if ($query_ubah) {
        echo "<script>
        Swal.fire({title: 'Pembayaran Berhasil',text: '',icon: 'success',confirmButtonText: 'OK'
        }).then((result) => {
            if (result.value) {
                window.location = 'index.php?page=lunas-tagihan';
            }
        })</script>";

        $pinjam          = date("d M Y");
        $dua_hari        = mktime(0,0,0,date("n"),date("j")+2,date("Y"));
        $deadline        = date("d M Y", $dua_hari);
    
        require 'email/PHPMailer/src/PHPMailer.php' ;
        require 'email/PHPMailer/src/SMTP.php';
        require 'email/PHPMailer/src/Exception.php';
    
        include "inc/koneksi.php"; //memulai koneksi ke database
        // Cek koneksi
        if (mysqli_connect_errno()) {
            echo "Koneksi database gagal : " . mysqli_connect_error();
        }
        $result = mysqli_query($koneksi, "SELECT p.id_pelanggan, p.nama, p.no_hp, p.email, p.password, t.id_tagihan, t.tagihan, t.bulan, t.tahun, t.tgl_bayar from tb_pelanggan p inner join tb_tagihan t on p.id_pelanggan=t.id_pelanggan WHERE id_tagihan='".$_GET['kode']."'");
        // Mengambil semua data email dalam bentuk array
        $result = mysqli_fetch_all($result, MYSQLI_ASSOC);
    
        foreach ($result as $key => $data) { //mengirim email untuk setiap baris data
            $mail =  new PHPMailer\PHPMailer\PHPMailer();
           //$mail->IsSMTP();
            $mail->IsHTML(true);
            //$mail->SMTPAuth     = true;
            //$mail->Host         = "smtp.gmail.com";
            //$mail->Port         = 587;
            //$mail->SMTPSecure   = "tls";
            //$mail->Username     = "kassandramikrotik@gmail.com";       //username SMTP
            //$mail->Password     = "abzdjiivohwzwieo";                  //password SMTPSecure
            $mail->From         = "wifi@kassandra.my.id";   //email pengirim
            $mail->FromName     = "KASSANDRA WiFi";                   //nama  pengirim
            $mail->AddAddress($data['email'], $data['nama']);//email dan nama penerima
            $mail->Subject  	=  "Terima Kasih Sdr/i " .$data['nama'] . " Sudah Melakukan Pembayaran Tagihan KassandraWiFi Untuk Bulan ".$data['bulan'] . " / " .$data['tahun'] ; //judul email
            $mail->Body     	=  "<table><thead><tr>
                                    <td style=font-family:Roboto,RobotoDraft,Helvetica,Arial,sans-serif;border-width:1px;border-style:dashed;border-color:rgb(37,63,89);background:lavender;color:rgb(0,0,0);font-size:16px;padding-left:1em;padding-right:1em>  ".
                                    "<p style=font-size:18px>Terima kasih Sdr/i ".$data['nama']. " sudah melakukan pembayaran tagihan hotspot
                                    KassandraWiFi untuk Bulan ".$data['bulan'] . " / Tahun " .$data['tahun']. "</p>".
                                "Dengan rincian Biaya Tagihan : <br>Rp. ".number_format($data['tagihan'], 0, ',', '.') . 
                                "<br>Tgl Pembayaran : ".date("d F Y", strtotime($data['tgl_bayar']))."<br>".
                                "<br>Tetap nikmati layanan hotspot unlimited 24 jam non stop tanpa lemot kecuali saat wifi down
                                <br><br> Berikut kami sampaikan juga nota pelunasan anda
                                <p align=center colspan=2 style=font-family:Roboto,RobotoDraft,Helvetica,Arial,sans-serif>
                                <a href='https://wifi.kassandra.my.id/pelanggan/tagihan_plg.php?id_tagihan=" .$data['id_tagihan']. "' style=color:rgb(255,255,255);background-color:#589bf2;border-width:initial;border-style:none;border-radius:15px;padding:10px 20px target=_blank >" .
                                " Lihat Nota Pembayaran</a></p>" .
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
            if ($mail->Send());
          }
                                
        
        }else{
        echo "<script>
        Swal.fire({title: 'Pembayaran Gagal',text: '',icon: 'error',confirmButtonText: 'OK'
        }).then((result) => {
            if (result.value) {
                window.location = 'index.php?page=lunas-tagihan';
            }
        })</script>";
	    }

?>
<!-- END -->