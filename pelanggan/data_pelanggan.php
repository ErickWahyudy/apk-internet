<section class="content-header">
	<h1 class="fa fa-users">
		Data Akun Anda |
		<small>
			<a href="?page=_plg">Beranda</a> > 
			<a href="?page=data-pelanggan">Data Akun Anda</a>
		</small>
	</h1>
</section>

<section class="content">

	<div class="box box-primary">
		<div class="box-header with-border">
			<b style="font-size: 14pt">DATA AKUN ANDA</b>
			<div class="box-tools pull-right">
			</div>
			<br>Pastikan data anda sudah benar dan terUpdate agar admin bisa selalu memberikan informasi mengenai layanan di KassandraWiFi dan pelanggan bisa tersinkron dengan aplikasi ini. Jika belum silakan dibetulkan di menu edit data. Terima Kasih 🙂
		</div>
		<!-- /.box-header -->
		<div class="box-body">
			<div class="table-responsive">
				<table id="" class="table table-bordered table-striped">
					<thead>					
					<?php
                  $no = 1;
                  $sql = $koneksi->query("SELECT * from tb_pelanggan inner join tb_paket on tb_pelanggan.id_paket=tb_paket.id_paket where id_pelanggan='$data_id'");
                  while ($data= $sql->fetch_assoc()) {
              	  ?>
						<tr>
							<th class="col-sm-2">ID Pelanggan</th>
							<td>
								<?php echo $data['id_pelanggan']; ?>
							</td>
						</tr>

						<tr>
							<th class="col-sm-2">Nama Lengkap</th>
							<td>
								<?php echo $data['nama']; ?>
							</td>
						</tr>

						<tr>
							<th class="col-sm-2">Alamat</th>
							<td>
								<?php echo $data['alamat']; ?>
							</td>
						</tr>

						<tr>
							<th class="col-sm-2">No HP / WA</th>
							<td>
								<?php echo $data['no_hp']; ?>
							</td>
						</tr>

						<tr>
							<th class="col-sm-2">Terdaftar Mulai</th>
							<td>
								<?php echo tanggal ($data['terdaftar_mulai']); ?>
							</td>
						</tr>

						<tr>
							<th class="col-sm-2">Paket Internet</th>
							<td>
								<?php echo $data['id_paket'] ?> | <?php echo $data['paket'] ?> 
							</td>
						</tr>

						<tr>
							<th class="col-sm-2">E-Mail Login</th>
							<td>
								<?php echo $data['email']; ?>
							</td>
						</tr>

						<tr>
							<th class="col-sm-2">Password</th>
							<td>
								<?php echo $data['password']; ?>
							</td>
						</tr>

						<tr>
							<th>Edit Data</th>
							<td>
								<a href="?page=edit-pelanggan&kode=<?php echo $data['nama']; ?>" title="Ubah"
								 class="btn btn-warning">
									<i class="glyphicon glyphicon-edit"></i> EDIT
								</a>
							</td>
						</tr>
					
						<?php
						}
						?>
						</thead>
					</tbody>

				</table>
				<!-- /.box-body -->
			</div>
		</div>
	</div>
</section>