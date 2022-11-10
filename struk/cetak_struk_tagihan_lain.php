<?php



include "../inc/koneksi.php";

include "../inc/rupiah.php";



?>



<!DOCTYPE html>

<html lang="en">



<head>

					<?php

						$id = $_GET['id_tagihan_lain'];



						$no=1;

						$sql_tampil = "SELECT p.id_pelanggan, p.nama, p.alamat, p.no_hp, t.id_tagihan_lain, t.tagihan, t.status, t.keterangan, t.tgl_bayar   

						from tb_pelanggan p inner join tb_tagihan_lain t on p.id_pelanggan=t.id_pelanggan 

						 where id_tagihan_lain='$id'";

						$query_tampil = mysqli_query($koneksi, $sql_tampil);

						while ($data = mysqli_fetch_array($query_tampil,MYSQLI_BOTH)) {

					?>

	<title>Nota KassandraWiFi <?php echo $data['id_tagihan_lain']; ?> <?php echo $data['nama']; ?></title>

	<link rel="shortcut icon" href="../dist/img/favicon.ico" type="image/x-icon">

</head>



<body>

<font face="Courier New" size="2px">



<style>

#tabel

{

font-size:15px;

border-collapse:collapse;

}

#tabel  td

{

padding-left:5px;

border: 1px solid black;

}

</style>

</head>

<body style='font-family:tahoma; font-size:8pt;'>

<center>

<table id="example1" class="table table-bordered table-striped" border="0" cellspacing="1" style="width: 100%">

	<thead>

		

<td width='70%' align='left' style='padding-right:80px; vertical-align:top'>

<span style='font-size:12pt'><b><u>KASSANDRAWIFI</u></b></span></br>

Alamat Jl. H. Agus Salim 07/03 Ds. Jalen Kec. Balong Kab. Ponorogo ( 63461 ) </br>

Telp / Wa : 081456141227<br>

Email : kassandramikrotik@gmail.com

</td>

<td style='vertical-align:top' width='30%' align='left'>

<b><span style='font-size:12pt'>Nota Pembayaran Tagihan KassandraWiFi</span></b></br>

No Tagihan :  <?php echo $data['id_tagihan_lain']; ?></br>

</td>

</table></br><br>

<table id="example1" class="table table-bordered table-striped" border="0" cellspacing="1" style="width: 100%">

<td width='70%' align='left' style='padding-right:80px; vertical-align:top'>

Nama Pelanggan : <?php echo $data['nama']; ?></br>

Alamat : <?php echo $data['alamat']; ?><br>

No Telp / Wa : <?php echo $data['no_hp']; ?>

</td>

</table>

<table id="example1" class="table table-bordered table-striped" border="1" cellspacing="1" style="width: 100%">

 

<tr>

							<th>ID Pelanggan</th>

							<td>

								<?php echo $data['id_pelanggan']; ?>

							</td>

						</tr>



						<tr>

							<th>Deskripsi Tagihan</th>

							<td>

								<?php echo $data['keterangan']; ?>

							</td>

						</tr>



						<tr>

							<th >Total Biaya</th>

							<td>

								<?php echo rupiah($data['tagihan']); ?>

							</td>

						</tr>



						<tr>

							<th >Status</th>

							<td>

								<?php $stt = $data['status']  ?>

								<?php if($stt == 'BL'){ ?>

								<span class="label label-danger"><b>Belum Di Bayar</b></span>

								<?php }elseif($stt == 'LS'){ ?>

								<span class="label label-info">Lunas</span>

							</td>

							<?php } ?>

						</tr>



						<tr>

							<th >Tanggal Bayar</th>

							<td>

								<?php $tgl = $data['tgl_bayar']  ?>

								<?php if($tgl == '0000-00-00'){ ?>

								<span class=""><b>-- / -- / ----</b></span>

								<?php }elseif($tgl = $data['tgl_bayar']){ ?>

								<span class=""><?php  $tgl = $data['tgl_bayar']; echo date("d F Y", strtotime($tgl))?></span>

							</td>

							<?php } ?>

						</tr>

</table>

 

<table style='width:650; font-size:7pt;' cellspacing='2'>

<tr>

	<td align='center'>Ponorogo, <?php echo date("d F Y");  ?> </br></td>

</tr>

<tr>

	<td align='center'>Diterima Oleh,<br><br><br><br><br>(<u>.................</u>)</td>

	<td style='border:0px solid black; padding:5px; text-align:left; width:40%'></td>

	<td align='center'>Admin,<br>

		<img src="../dist/img/ttd-erik.jpg" style="width: 40px; height: 40px;"><br>

		(<u>Kassandra WiFi</u>)

	</td>

</tr>

<?php

				}

        		?>

        		</thead>

</table>

</center>



	<script>

		window.print();

	</script>

</body>



</html>