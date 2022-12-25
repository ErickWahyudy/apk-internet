<section class="content-header">
	<h1 class="fa fa-dollar">
		Data Tagihan |
		<small>
			<a href="?page=_plg">Beranda</a> > 
			<a href="?page=data-tagihan">Data Tagihan</a>
		</small>
	</h1>
</section>

<section class="content">

	<div class="box box-primary">
		<div class="box-header with-border">
			<b style="font-size: 14pt">DATA TAGIHAN</b>
			<div class="box-tools pull-right">
			</div>
		</div>
		<!-- /.box-header -->
		<div class="box-body">
			<div class="table-responsive">
				<table id="example1" class="table table-bordered table-striped">
					<thead>
						<tr>
							<th>No</th>
							<th>Bulan/Tahun</th>
							<th>Tagihan</th>
							<th>Status</th>
							<th>Tgl Bayar</th>
							<th>Opsi</th>
						</tr>
					</thead>
					<tbody>

						<?php
                  $no = 1;
                  $sql = $koneksi->query("SELECT * from tb_tagihan where id_pelanggan='$data_id' order by tgl_bayar asc");
                  while ($data= $sql->fetch_assoc()) {
                ?>

						<tr>
							<td>
								<?php echo $no++; ?>
							</td>
							<td>
								<?php echo $data['bulan']; ?> / <?php echo $data['tahun']; ?>
							</td>
							<td>
								<?php echo rupiah($data['tagihan']); ?>
							</td>
							<td>
								<?php $stt = $data['status']  ?>
								<?php if($stt == 'BL'){ ?>
								<span class="label label-danger">Belum Anda Bayar</span>
								<?php }elseif($stt == 'LS'){ ?>
								<span class="label label-info">Lunas</span>
							</td>
							<?php } ?>
							<td>
								<?php $tgl = $data['tgl_bayar']  ?>
								<?php if($tgl == '0000-00-00'){ ?>
								<span class="">-- / -- / ----</span>
								<?php }elseif($tgl = $data['tgl_bayar']){ ?>
								<span class=""><?php  echo tanggal ($data['tgl_bayar']); ?></span>
							</td>
							<?php } ?>
							<td>
								<?php $stt = $data['status']  ?>
								<?php if($stt == 'BL'){ ?>
								<span class="">
									<a href="?page=bayar-tagihan&kode=<?php echo $data['id_tagihan']; ?>" title="Bayar" class="btn btn-warning">
									<i class="fa fa-dollar"></i> Bayar Tagihan
									</a>
								</span>
								<?php }elseif($stt == 'LS'){ ?>
								<span class=""><a href="./struk/cetak_struk.php?id_tagihan=<?php echo $data['id_tagihan']; ?>" target=" _blank" title="Cetak Struk" class="btn btn-primary">
								<i class="glyphicon glyphicon-print"></i> Download Struk</a></span></td>
							</td>
							<?php } ?>
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