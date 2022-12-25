<section class="content-header">
	<h1 class="fa fa-users">
		Data Pelanggan |
		<small> 
			<a href="?page=admin">Beranda</a> >
		 	<a href="?page=data-pelanggan">Data Pelanggan</a>
		</small>
	</h1>
</section>

<section class="content">
	<div class="box box-primary">
		<div class="box-header with-border">
			<a href="?page=add-pelanggan" title="Tambah Data" class="btn btn-primary">
				<i class="glyphicon glyphicon-plus"></i> TAMBAH PELANGGAN</a>
				<a href="https://docs.google.com/spreadsheets/d/1y0-1HHY3ZVqvulj2Hgg42wN-VkUeCjygwx6EJvDQBFM/edit#gid=778747165" title="Tambah Data" class="btn btn-success" target="blank">
				<i class="glyphicon glyphicon"></i> DATA GOOGLESHEET</a>
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
							<th>ID</th>
							<th>Nama</th>
							<th>Alamat</th>
							<th>No HP</th>
							<th>Terdaftar Mulai</th>
							<th>E-Mail</th>
							<th>Password</th>
							<th>Paket</th>
							<th>Status Pelanggan</th>
							<th>Aksi</th>
						</tr>
					</thead>
					<tbody>

						<?php
                  $no = 1;
                  $sql = $koneksi->query("SELECT * from tb_pelanggan");
                  while ($data= $sql->fetch_assoc()) {
                ?>

						<tr>
							<td>
								<?php echo $no++; ?>
							</td>
							<td>
								<?php echo $data['id_pelanggan']; ?>
							</td>
							<td>
								<?php echo $data['nama']; ?>
							</td>
							<td>
								<?php echo $data['alamat']; ?>
							</td>
							<td>
								<?php echo $data['no_hp']; ?>
							</td>
							<td>
								<?php echo date("d F Y", strtotime($data['terdaftar_mulai'])) ?>
							</td>
							<td>
								<?php echo $data['email']; ?>
							</td>

							<td>
								<?php echo $data['password']; ?>
							</td>
							
							<td>
								<?php echo $data['id_paket']; ?>
							</td>

							<td>
								<?php echo $data['status_plg']; ?>
							</td>

							<td>
								<a href="?page=edit-pelanggan&kode=<?php echo $data['id_pelanggan']; ?>" title="Ubah"
								 class="btn btn-warning">
									<i class="glyphicon glyphicon-edit"></i> Edit
								</a> &emsp;

								<a href="https://api.whatsapp.com/send?phone=<?php echo $data['no_hp']; ?>&text=
								Berikut kami sampaikan data akun anda yang digunakan di system aplikasi KassandraWiFi%0A
								Nama : <?php echo $data['nama']; ?> %0A
								Alamat : <?php echo $data['alamat']; ?> %0A
								No HP : <?php echo $data['no_hp']; ?> %0A
								Email Login : <?php echo $data['email']; ?> %0A
								Password : <?php echo $data['password']; ?> %0A%0A
								Jika ada perubahan data silakan lakukan perubahan data melalui link berikut %0A
								https://wifi.kassandra.my.id/pelanggan/update_data.php?id=<?php echo $data['no_hp']; ?> %0A%0A
								_Pesan ini dikirim oleh system aplikasi KassandraWifi._%0A
								-wifi@kassandra.my.id-"
								 target=" _blank" title="Pesan WhatsApp" class="btn btn-success">
									<i class="fa fa-whatsapp"></i> WA</i>
								</a> &emsp;

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