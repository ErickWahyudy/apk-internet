<section class="content-header">
	<h1 class="fa fa-users">
		Data Feedback |
		<small> 
			<a href="?page=admin">Beranda</a> >
		 	<a href="?page=data-feedback">Data Feedback</a> >
            <a href="?page=feedback-pelanggan">Data Pelanggan</a>
		</small>
	</h1>
</section>

<section class="content">
	<div class="box box-primary">
		<div class="box-header with-border">
			
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
							<th>No HP</th>
							<th>Aksi</th>
						</tr>
					</thead>
					<tbody>

						<?php
                  $no = 1;
                  $sql = $koneksi->query("SELECT * from tb_pelanggan where status_plg='aktif' order by id_pelanggan asc");
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
								<?php echo $data['no_hp']; ?>
							</td>

							<td>

								<a href="https://api.whatsapp.com/send?phone=<?php echo $data['no_hp']; ?>&text=
								Halo <?php echo $data['nama']; ?>, Berikan penilaian anda kepada kami melalui link berikut untuk menjaga, meningkatkan kualitas layanan kami %0A
								https://wifi.kassandra.my.id/feedback_p.php?id=<?php echo $data['no_hp']; ?> %0A%0A
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