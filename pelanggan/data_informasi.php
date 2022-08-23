<section class="content-header">
	<h1 class="fa fa-bullhorn">
		Layanan Informasi |
		<small>
			<a href="?page=_plg">Beranda</a> > 
			<a href="?page=data-informasi">Layanan Informasi</a>
		</small>
	</h1>
</section>

<!-- Main content -->
<section class="content">
	<div class="box box-primary">
		<div class="box-header with-border">
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
							<th class="col-sm-12">Informasi Penting</th>
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
								<?php echo $data['informasi']; ?>&ensp;<a href="uploadfile/<?php echo $data['berkas']; ?>" target='blank'><?php echo $data['berkas']; ?></a>
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