<section class="content-header">
	<h1 class="fa fa-money">
		Data Tagihan Lainnya |
		<small>
			<a href="?page=_plg">Beranda</a> > 
			<a href="?page=data-tagihan-lain">Data Tagihan Lainnya</a>
		</small>
	</h1>
</section>

<section class="content">

	<div class="box box-primary">
		<div class="box-header with-border">
			<b style="font-size: 14pt">DATA TAGIHAN LAINNYA</b>
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
							<th>Deskripsi</th>
							<th>Status</th>
							<th>Total Biaya</th>
							<th>Tgl Bayar</th>
							<th>Opsi</th>
						</tr>
					</thead>
					<tbody>

						<?php
                  $no = 1;
                  $sql = $koneksi->query("SELECT * from tb_tagihan_lain where id_pelanggan='$data_id' order by tgl_bayar asc");
                  while ($data= $sql->fetch_assoc()) {
                ?>

						<tr>
							<td>
								<?php echo $no++; ?>
							</td>
							<td>
								<?php echo $data['keterangan']; ?>
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
								<?php echo rupiah($data['tagihan']); ?>
							</td>
							<td>
								<?php $tgl = $data['tgl_bayar']  ?>
								<?php if($tgl == '0000-00-00'){ ?>
								<span class="">-- / -- / ----</span>
								<?php }elseif($tgl = $data['tgl_bayar']){ ?>
								<span class=""><?php  $tgl = $data['tgl_bayar']; echo date("d F Y", strtotime($tgl))?></span>
							</td>
							<?php } ?>
							<td>
								<?php $stt = $data['status']  ?>
								<?php if($stt == 'BL'){ ?>
								<span class="label label-danger"></span>
								<?php }elseif($stt == 'LS'){ ?>
								<span class=""><a href="./struk/cetak_struk_tagihan_lain.php?id_tagihan_lain=<?php echo $data['id_tagihan_lain']; ?>" target=" _blank" title="Cetak Struk" class="btn btn-primary">
								<i class="glyphicon glyphicon-print"></i> Download Struk</a>
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