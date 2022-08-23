<section class="content-header">
	<h1 class="fa fa-bullhorn">
		Layanan Informasi |
		<small> 
			<a href="?page=admin">Beranda</a> >
		 	<a href="?page=data-informasi">Data Layanan Informasi</a>
		</small>
	</h1>
</section>

<!-- Main content -->
<section class="content">
	<div class="box box-primary">
		<div class="box-header with-border">
			<a href="?page=add-informasi" class="btn btn-primary">
				<i class="glyphicon glyphicon-plus"></i> TAMBAH INFORMASI</a>
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
							<th>Informasi Penting</th>
							<th>File</th>
							<th>Aksi</th>
						</tr>
					</thead>
					<tbody>

						<?php
                  $no = 1;
                  $sql = $koneksi->query("SELECT * from tb_informasi order by id_informasi asc");
                  while ($data= $sql->fetch_assoc()) {
                ?>

						<tr>
							<td>
								<?php echo $no++; ?>
							</td>
							<td>
								<?php echo $data['informasi']; ?>
							</td>
							<td>
								<a href="uploadfile/<?php echo $data['berkas']; ?>" target='blank'><?php echo $data['berkas']; ?></a>
								<a href="?page=upload-file&kode=<?php echo $data['id_informasi']; ?>"
								 title="uploadfile" class="btn btn-primary">
									<i class="glyphicon glyphicon-edit"></i>
								</a>
							</td>
							<td>
								<a href="?page=edit-informasi&kode=<?php echo $data['id_informasi']; ?>"
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