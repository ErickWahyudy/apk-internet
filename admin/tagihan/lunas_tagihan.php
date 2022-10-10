<?php
$kode_bulan = date("m");
$kode_tahun = date("Y");

// perintah tampil data totel pendapatan
$sql = $koneksi->query("SELECT sum(tagihan) as tagihan from tb_tagihan where status='LS' and bulan='$kode_bulan' and tahun='$kode_tahun'");
     
$total = 0;
$tot_bayar = 0;
$no = 1;

while ($data= $sql->fetch_assoc()) {
 // total adalah hasil dari harga x qty
 $total = $data['tagihan'];
 // total bayar adalah penjumlahan dari keseluruhan total
 $tot_bayar += $total;
}

?>

<section class="content-header">
	<h1 class="fa fa-money">
		Data Pembayaran |
		<small> 
			<a href="?page=admin">Beranda</a> >
		 	<a href="?page=lunas-tagihan">Data Lunas Pembayaran</a>
		</small>
	</h1>
</section>

<section class="content">

	<div class="alert alert-info alert-dismissible">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		<h4>
			<i class="icon fa fa-info"></i> Total Pembayaran Pelanggan Bulan <?php echo date('F'); ?> Tahun <?php echo date('Y'); ?> </h4>
		<h4>
		<?php echo rupiah($tot_bayar); ?>
		</h4>
	</div>

	<div class="box box-primary">
		<div class="box-header with-border">
			<h3 class="box-title">TAGIHAN LUNAS</h3>
		</div>
		<!-- /.box-header -->
		<div class="box-body">
			<div class="table-responsive">
				<table id="example1" class="table table-bordered table-striped">
					<thead>
						<tr>
							<th>No</th>
							<th>Pelanggan</th>
							<th>Bulan/Tahun</th>
							<th>Tagihan</th>
							<th>Status</th>
							<th>Tgl Bayar</th>
							<th>Aksi</th>
						</tr>
					</thead>
					<tbody>

						<?php
                  $no = 1;
                  $sql = $koneksi->query("SELECT p.id_pelanggan, p.nama, p.no_hp, t.id_tagihan, t.tagihan, t.status, t.tgl_bayar, t.bulan, t.tahun   
				  from tb_pelanggan p inner join tb_tagihan t on p.id_pelanggan=t.id_pelanggan where status='LS'
				  order by tgl_bayar desc");
                  while ($data= $sql->fetch_assoc()) {
                ?>

						<tr>
							<td>
								<?php echo $no++; ?>
							</td>
							<td>
								<?php echo $data['id_pelanggan']; ?>
								-
								<?php echo $data['nama']; ?>
							</td>
							<td>
								<?php echo $data['bulan']; ?>
								/
								<?php echo $data['tahun']; ?>
							</td>
							<td>
								<?php echo rupiah($data['tagihan']); ?>
							</td>
							<td>
								<?php $stt = $data['status']  ?>
								<?php if($stt == 'BL'){ ?>
								<span class="label label-danger">Belum Bayar</span>
								<?php }elseif($stt == 'LS'){ ?>
								<span class="label label-success">LUNAS</span>
							</td>
							<td>
								<?php  $tgl = $data['tgl_bayar']; echo date("d-M-Y", strtotime($tgl))?>
							</td>
							<?php } ?>

							<td>
								<a href="?page=edit-tagihanL&kode=<?php echo $data['id_tagihan']; ?>" title="Ubah"
								 class="btn btn-warning">
									<i class="glyphicon glyphicon-edit"></i> EDIT
								</a>&nbsp;&nbsp;&nbsp;
								<a href="./struk/cetak_struk.php?id_tagihan=<?php echo $data['id_tagihan']; ?>"
								 target=" _blank" title="Cetak Struk" class="btn btn-primary">
									<i class="glyphicon glyphicon-print"></i> Struk</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
									<a href="https://api.whatsapp.com/send?phone=<?php echo $data['no_hp']; ?>&text=Terima kasih Sdr/i%20<?php echo $data['nama']; ?>,%20
									Sudah melakukan pembayaran Tagihan%20hotspot%20KassandraWiFi%20untuk%20Bulan%20<?php echo $data['bulan']; ?>%20Tahun%20<?php echo $data['tahun']; ?>%0A
									Sebesar%20<?php echo rupiah($data['tagihan']); ?> pada tanggal <?php $data['tgl_bayar']; echo date("d F Y", strtotime($tgl)) ?>.%0A
									Tetap nikmati layanan hotspot unlimited 24 jam non stop tanpa lemot kecuali saat wifi down dari KassandraWiFi.%0A%0A
									Anda juga bisa mendownload ataupun melihat struk pembayaran lunas tagihan di aplikasi KassandraWiFi%0A
									https://wifi.kassandra.my.id/pelanggan/tagihan_plg.php?id_tagihan=<?php echo $data['id_tagihan']; ?> %0A%0A
									_Pesan ini dikirim otomatis oleh system aplikasi KassandraWifi._%0A
									-wifi@kassandra.my.id-"
								 	target=" _blank" title="Pesan WhatsApp" class="btn btn-success">
								 	 <i class="fa fa-whatsapp"> WA</i>
								</a>
							</td>
						</tr>
						<?php
						}
						?>
					</tbody>

				</table>
				<!-- /.box-body -->
			</div>
		</div>
	</div>
</section>