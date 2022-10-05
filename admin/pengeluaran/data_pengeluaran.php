<?php
$kode_bulan = date("m");
$kode_tahun = date("Y");

 // perintah tampil data total pengeluaran
 $sql = $koneksi->query("SELECT sum(biaya_pengeluaran) as biaya_pengeluaran from tb_pengeluaran where keterangan='LUNAS' and tahun='$kode_tahun'");
     
 $total = 0;
 $tot_pengeluaran = 0;
 $no = 1;

 while ($data= $sql->fetch_assoc()) {
  // total adalah hasil dari harga x qty
  $total = $data['biaya_pengeluaran'];
  // total pengeluaran adalah penjumlahan dari keseluruhan total
  $tot_pengeluaran += $total;
}

?>

<section class="content-header">

	<h1 class="fa fa-dollar">

		Data Pengeluaran |

		<small> 

			<a href="?page=admin">Beranda</a> >

		 	<a href="?page=data-pengeluaran">Data Pengeluaran</a>

		</small>

	</h1>

</section>



<section class="content">
	<div class="alert alert-info alert-dismissible">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		<h4>
			<i class="icon fa fa-info"></i> Total Pengeluaran Tahun <?php echo date('Y'); ?> </h4>
		<h4>
		<?php echo rupiah($tot_pengeluaran); ?>
		</h4>
	</div>

	<div class="box box-primary">

		<div class="box-header with-border">

			<a href="?page=add-pengeluaran" title="Tambah Data" class="btn btn-primary">

				<i class="glyphicon glyphicon-plus"></i> TAMBAH PENGELUARAN</a>

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

							<th>Jenis Pengeluaran</th>

							<th>Biaya</th>

							<th>Bulan / Tahun</th>

							<th>Status</th>

							<th>Aksi</th>

						</tr>

					</thead>

					<tbody>



						<?php

                  $no = 1;

                  $sql = $koneksi->query("SELECT * from tb_pengeluaran order by keterangan asc");

                  while ($data= $sql->fetch_assoc()) {

                ?>



						<tr>

							<td>

								<?php echo $no++; ?>

							</td>

							<td>

								<?php echo $data['id_pengeluaran']; ?>

							</td>

							<td>

								<?php echo $data['jenis_pengeluaran']; ?>

							</td>

							<td>

								<?php echo rupiah ($data['biaya_pengeluaran']) ?>

							</td>

							<td>

								<?php $tgl = $data['tanggal']  ?>

								<?php if($tgl == '0000-00-00'){ ?>

								<span class="">-- / -- / ----</span>

								<?php }elseif($tgl = $data['tanggal']){ ?>

								<span class=""><?php  $tgl = $data['tanggal']; echo date("d F Y", strtotime($tgl))?></span>

							</td>

							<?php } ?>

							<td>

								<?php $stt = $data['keterangan']  ?>

								<?php if($stt == 'Belum Saya Bayar'){ ?>

								<span class="label label-danger">Belum Saya Bayar</span>

								<?php }elseif($stt == 'LUNAS'){ ?>

								<span class="label label-success">LUNAS</span>

							</td>

								<?php } ?>

							<td>

								<a href="?page=edit-pengeluaran&kode=<?php echo $data['id_pengeluaran']; ?>" title="Ubah"

								 class="btn btn-warning">

									<i class="glyphicon glyphicon-edit"></i> Edit

								</a>&nbsp;&nbsp;&nbsp;

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