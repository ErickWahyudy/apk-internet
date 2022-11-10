<section class="content-header">
	<h1 class="fa fa-tablet">
		Data Tagihan Lainnya |
		<small> 
			<a href="?page=admin">Beranda</a> >
		 	<a href="?page=data-tagihan-lain">Data Tagihan Lainnya</a>
		</small>
	</h1>
</section>

<section class="content">

	<div class="box box-primary">
		<div class="box-header with-border">
			<h3 class="box-title">TAGIHAN LAINNYA</h3><br><br>
					<a href="?page=buat-tagihan-lain" title="Tambah Data" class="btn btn-primary">
					<i class="glyphicon glyphicon-plus"></i> BUAT TAGIHAN LAINNYA</a>
			<div class="box-footer pull-right">
				<a href="../admin/tagihan-lain/sendemail_BL_lain.php" class="btn btn-warning">
				<i class="fa fa-envelope"></i> Kirim Email</a>
			</div>
		</div>
		<!-- /.box-header -->
		<div class="box-body">
			<div class="table-responsive">
				<table id="example1" class="table table-bordered table-striped">
					<thead>
						<tr>
							<th>No</th>
							<th>Pelanggan</th>
							<th>Total Biaya</th>
							<th>Status</th>
							<th>Tgl Bayar</th>
							<th>Keterangan</th>
							<th>Aksi</th>
						</tr>
					</thead>
					<tbody>

						<?php
                  $no = 1;
                  $sql = $koneksi->query("SELECT p.id_pelanggan, p.nama, p.no_hp, t.id_tagihan_lain, t.tagihan, t.status, t.keterangan, t.tgl_bayar   
				  from tb_pelanggan p inner join tb_tagihan_lain t on p.id_pelanggan=t.id_pelanggan where id_tagihan_lain=id_tagihan_lain
				  order by status asc");
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
								<?php echo rupiah($data['tagihan']); ?>
							</td>
							<td>
								<?php $stt = $data['status']  ?>
								<?php if($stt == 'BL'){ ?>
								<span class="label label-danger">Belum Bayar</span>
								<?php }elseif($stt == 'LS'){ ?>
								<span class="label label-success">LUNAS</span>
							</td>
							<?php } ?>
							<td>
								<?php $tgl = $data['tgl_bayar']  ?>
								<?php if($tgl == '0000-00-00'){ ?>
								<span class="">-- / -- / ----</span>
								<?php }elseif($tgl = $data['tgl_bayar']){ ?>
								<span class=""><?php  $tgl = $data['tgl_bayar']; echo date("d-M-Y", strtotime($tgl))?></span>
							</td>
							<?php } ?>
							<td>
								<?php echo $data['keterangan']; ?>
							</td>

							<td>
								<a href="?page=edit-tagihan-lain&kode=<?php echo $data['id_tagihan_lain']; ?>" title="Ubah"
								 class="btn btn-warning">
									<i class="glyphicon glyphicon-edit"></i> EDIT
								</a>&nbsp;&nbsp;&nbsp;
								<a href="./struk/cetak_struk_tagihan_lain.php?id_tagihan_lain=<?php echo $data['id_tagihan_lain']; ?>"
								 target=" _blank" title="Cetak Struk" class="btn btn-primary">
									<i class="glyphicon glyphicon-print"></i> Struk</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
									<a href="https://api.whatsapp.com/send?phone=<?php echo $data['no_hp']; ?>&text=Terima kasih Sdr/i%20<?php echo $data['nama']; ?>,%20
									Sudah mempercayai layanan kami ( KassandraWiFi ) %0A
									Berikut adalah total biaya <?php echo $data['keterangan']; ?> anda : <?php echo rupiah($data['tagihan']); ?> dengan status tagihan%20
									<?php $stt = $data['status']  ?>
									<?php if($stt == 'BL'){ ?>*Belum di bayar*.
									<?php }elseif($stt == 'LS'){ ?>LUNAS.<?php } ?>%0A
									Tetap nikmati layanan hotspot unlimited 24 jam non stop tanpa lemot dari KassandraWiFi.%0A%0A
									Anda juga bisa mendownload ataupun melihat struk total biaya anda di aplikasi KassandraWiFi%0A
									https://wifi.kassandra.my.id/struk/cetak_struk_tagihan_lain?id_tagihan_lain=<?php echo $data['id_tagihan_lain']; ?> %0A%0A
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