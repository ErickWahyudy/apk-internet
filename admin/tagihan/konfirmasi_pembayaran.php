<section class="content-header">
	<h1 class="fa fa-money">
		Data Konfirmasi Pembayaran |
		<small> 
			<a href="?page=admin">Beranda</a> >
		 	<a href="?page=konfirmasi-pembayaran">Data Konfirmasi Pembayaran</a>
		</small>
	</h1>
</section>

<!-- Main content -->
<section class="content">
	<div class="box box-primary">
		<div class="box-header with-border">
			<div class="box-tools pull-right">
				<button type="button" class="btn btn-box-tool" data-widget="collapse">
					<i class="fa fa-minus"></i>
				</button>
			</div>
		</div>
		<!-- /.box-header -->
		<div class="box-body">
			<div class="table-responsive">
				<table id="example1" class="table table-bordered table-striped">
					<thead>
						<tr>
							<th>No</th>
							<th>Nama</th>
							<th>Bulan</th>
							<th>Tagihan</th>
							<th>Status</th>
							<th>Bukti Bayar</th>
							<th>Tanggal Konfirmasi</th>
						</tr>
					</thead>
					<tbody>

						<?php
                  $no = 1;
				  $sql = $koneksi->query("SELECT p.id_pelanggan, p.nama, t.id_tagihan, t.tagihan, t.status, t.bulan, t.tahun, m.id_konfirmasi, m.bukti_bayar, m.tgl_konfirmasi
				  from tb_pelanggan p inner join tb_tagihan t on p.id_pelanggan=t.id_pelanggan inner join tb_tagihan_konfirmasi m on t.id_tagihan=m.id_tagihan");
				  while ($data= $sql->fetch_assoc()) {
				  ?>

						<tr>
							<td>
								<?php echo $no++; ?>
							</td>
							<td>
								<?php echo $data['nama']; ?>
							</td>
							<td>
								<?php echo $data['bulan']; ?> / <?php echo $data['tahun']; ?>
							</td>
							<td>
								<?php echo rupiah ($data['tagihan']); ?>
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
								<a href="uploadfile/bukti_bayar/<?php echo $data['bukti_bayar']; ?>" target='blank'>
								<?php echo "<img src='uploadfile/bukti_bayar/$data[bukti_bayar]' width='70' height='50' />";?>
								</a>
							</td>
							<td>
								<?php  $tgl = $data['tgl_konfirmasi']; echo date("d F Y", strtotime($tgl))?>
							</td>
						</tr>
						<?php
                  }
                ?>
					</tbody>

				</table>
			</div>
		</div>
	</div>
</section>