<section class="content-header">
	<h1 class="fa fa-user">
		Admin Sistem |
		<small> 
			<a href="?page=admin">Beranda</a> >
		 	<a href="?page=MyApp/data_pengguna">Data Admin Sistem</a>
		</small>
	</h1>
</section>

<!-- Main content -->
<section class="content">
	<div class="box box-primary">
		<div class="box-header with-border">
			<a href="?page=MyApp/add_pengguna" class="btn btn-primary">
				<i class="glyphicon glyphicon-plus"></i> TAMBAH ADMIN</a>
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
							<th>Username</th>
							<th>Level</th>
							<th>Aksi</th>
						</tr>
					</thead>
					<tbody>

						<?php
                  $no = 1;
                  $sql = $koneksi->query("select * from tb_pengguna");
                  while ($data= $sql->fetch_assoc()) {
                ?>

						<tr>
							<td>
								<?php echo $no++; ?>
							</td>
							<td>
								<?php echo $data['nama_pengguna']; ?>
							</td>
							<td>
								<?php echo $data['username']; ?>
							</td>
							<td>
								<?php echo $data['level']; ?>
							</td>
							<td>
								<a href="?page=MyApp/edit_pengguna&kode=<?php echo $data['id_pengguna']; ?>"
								 title="Ubah" class="btn btn-warning">
									<i class="glyphicon glyphicon-edit"></i> Edit
								</a>
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