<section class="content-header">
	<h1 class="fa fa-creative-commons">
		Data Pelanggan Daftar Promo Pemasangan |
		<small> 
			<a href="?page=admin">Beranda</a> >
		 	<a href="?page=data-promo">Data Pelanggan Daftar Promo Pemasangan</a>
		</small>
	</h1>
</section>

<!-- Main content -->
<section class="content">
	<div class="box box-primary">
		<div class="box-header with-border">
		<a href="?page=status-promo&kode=Z001" title="Ubah" class="btn btn-primary">
				<i class="fa fa-gear"></i> Edit Status Promo</a>
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
							<th>No HP / Email</th>
							<th>Alamat</th>
							<th>Tgl Daftar</th>
							<th>Status</th>
							<th>Bukti KTP</th>
							<th>TTD</th>
							<th>Aksi</th>
						</tr>
					</thead>
					<tbody>

						<?php
                  $no = 1;
                  $sql = $koneksi->query("SELECT  a.id_pelanggan, a.nama, a.no_hp, a.alamat, b.id_promo, b.id_pelanggan, b.tgl_daftar, b.status , b.signature, b.bukti_ktp
				  								FROM tb_pelanggan a, tb_promo b WHERE a.id_pelanggan=b.id_pelanggan order by tgl_daftar desc");
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
								<?php echo $data['no_hp']; ?>
							</td>
							<td>
								<?php echo $data['alamat']; ?>
							</td>
							<td>
								<?php echo tanggal ($data['tgl_daftar']); ?>
							</td>
							<td>
								<?php echo $data['status']; ?>
							</td>
							<td>
								<a href="uploadfile/bukti_ktp/<?php echo $data['bukti_ktp']; ?>" target='blank'>
								<?php echo "<img src='uploadfile/bukti_ktp/$data[bukti_ktp]' width='70' height='50' />";?>
								</a>
							</td>
							<td>
								<a href="uploadfile/signature/<?php echo $data['signature']; ?>" target='blank'>
								<?php echo "<img src='uploadfile/signature/$data[signature]' width='70' height='50' />";?>
								</a>
							</td>
							<td>
								<a href="?page=del-promo&kode=<?php echo $data['id_promo']; ?>" onclick="return confirm('Yakin Edit Data Ini ?')" title="Edit" class="btn btn-warning">
								<i class="glyphicon glyphicon-edit"></i> Edit</a>
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