<?php
			if(isset($_GET['kode'])){
			$sql_cek = "SELECT p.id_pelanggan, p.nama, p.no_hp, p.alamat, t.id_tagihan, t.tagihan, t.status, t.tgl_bayar, t.bulan, t.tahun, k.id_paket, k.paket   
				from tb_pelanggan p inner join tb_tagihan t on p.id_pelanggan=t.id_pelanggan 
				inner join tb_paket k on k.id_paket=p.id_paket where id_tagihan='".$_GET['kode']."'";
			$query_cek = mysqli_query($koneksi, $sql_cek);
			$data_cek = mysqli_fetch_array($query_cek,MYSQLI_BOTH);
			}
		?>

<section class="content-header">
	<h1 class="fa fa-dollar">
		Data Tagihan |
		<small>
			<a href="?page=_plg">Beranda</a> > 
			<a href="?page=data-tagihan">Data Tagihan</a> >
			<a href="">Bayar Tagihan</a>
		</small>
	</h1>
</section>

<section class="content">
	
	<div class="box box-primary">
		<div class="box-header with-border">
			<b style="font-size: 14pt">Tagihan Anda</b>
			<div class="box-tools pull-right">
			</div>
			<br>
			<span class="">
					<?php $stt = $data_cek['status']  ?>
								<?php if($stt == 'BL'){ ?>
								<span class="">
									Segera selesaikan pembayaran tagihan Anda agar selalu dapat terhubung dengan layanan hotspot KassandraWiFi. Terima Kasih 🙂
								</span>
								<?php }elseif($stt == 'LS'){ ?>
								<span class="">
									Terima Kasih sudah melunasi tagihan anda. Tetap nikmati layanan hotspot unlimited 24 jam non stop tanpa lemot kecuali saat wifi down dari KassandraWiFi 🙂
								</span>
					<?php } ?>
					</a>
				</span>
						<span style='font-size:15pt' class="pull-right">
					<?php $stt = $data_cek['status']  ?>
					<?php if($stt == 'BL'){ ?>
					<span class="label label-danger">Belum Anda Bayar</span>
					<?php }elseif($stt == 'LS'){ ?>
					<span class="label label-info">Lunas</span>
					<?php } ?>
		</div>
		<!-- /.box-header -->
		
		<div class="box-body">
			<div class="table-responsive">
				<table id="" class="table" border="0" cellspacing="0" style="width: 100%">
	<thead>
				
<td class="col-sm-2" width='70%' align='left' style='padding-right:80px; vertical-align:top;'>
<span style='font-size:12pt'><b>Periode Tagihan</b></span></br>
<?php echo $data_cek['bulan']; ?> / <?php echo $data_cek['tahun']; ?>
</td>
<td style='vertical-align:top' width='30%' align='left'>
<b><td class="col-sm-2" style='vertical-align:top' width='30%' align='left'>
<b>Batas Waktu Pembayaran</b><br>
Tanggal 10 - Bulan <?php echo $data_cek['bulan']; ?> / <?php echo $data_cek['tahun']; ?>
</td>

</table>
<table id="" class="table table-striped" border="0" cellspacing="0" style="width: 100%">
 
							<tr>
							<th class="col-sm-2">Detail Tagihan</th>
							<td>
								:
							</td>
							</tr>


						<tr>
							<th class="col-sm-2">ID Pelanggan</th>
							<td>
								: <?php echo $data_cek['id_pelanggan']; ?> / <?php echo $data_cek['nama']; ?>
							</td>
						</tr>

						<tr>
							<th class="col-sm-2">Paket Internet</th>
							<td>
								: <?php echo $data_cek['id_paket']; ?> | <?php echo $data_cek['paket']; ?>
							</td>
						</tr>

						<tr>
							<th class="col-sm-2">Nomor Tagihan</th>
							<td>
								: <?php echo $data_cek['id_tagihan']; ?>
							</td>
						</tr>

						<tr>
							<th class="col-sm-2">Deskripsi</th>
							<td>
								: Iuran Hotspot WiFi Bulan <?php echo $data_cek['bulan']; ?> / <?php echo $data_cek['tahun']; ?>
							</td>
						</tr>

						<tr>
							<th class="col-sm-2">Total Biaya</th>
							<td>
								: <?php echo rupiah($data_cek['tagihan']); ?>
							</td>
						</tr>					

						<?php $tgl = $data_cek['tgl_bayar']  ?>
								<?php if($tgl == '0000-00-00'){ ?>
								<span class="">
								</span>
								
								<?php }elseif($tgl = $data_cek['tgl_bayar']){ ?>
								<tr>
									<th>Tanggal Bayar</th>
									<td>
									<span class="">: <?php  $tgl = $data_cek['tgl_bayar']; echo date("d F Y", strtotime($tgl))?></span>
									</td>
								</tr>
									<?php } ?>
						</table>

<!-- /.box-body -->
			</div>
			<center>
				<span class="">
					<?php $stt = $data_cek['status']  ?>
								<?php if($stt == 'BL'){ ?>
								<span class="">
								<a href="aplication.php?page=konfirmasi-pembayaran&kode=<?php echo $data_cek['id_tagihan']; ?>" title="Konfirmasi"  class="btn btn-primary">
											<i class="fa fa-money"></i> Konfirmasi pembayaran
											</a>
									<a href="aplication.php?page=pembayaran" title="Bayar"  class="btn btn-warning" style="font-size:16px;">
									<i class="fa fa-dollar"></i> Bayar Sekarang
									</a>
								</span>
								<?php }elseif($stt == 'LS'){ ?>
								<span class="btn btn-success" style="font-size:16px;">
									<i class="fa fa-money"></i> Anda Sudah Melunasi Tagihan
								</span>
								<span class="btn btn"style="font-size:16px;">
									<a href="./struk/cetak_struk.php?id_tagihan=<?php echo $data_cek['id_tagihan']; ?>" target=" _blank" title="Cetak Struk" class="btn btn-primary">
									<i class="glyphicon glyphicon-print"></i> Download / Cetak Struk</a>
								</span>
					<?php } ?>
					</a>
				</span>

			</center>
		</div>
	</div>
</section>