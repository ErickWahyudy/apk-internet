<?php
	$sql = $koneksi->query("SELECT count(tagihan) as tagih_b from tb_tagihan where status='BL' and id_pelanggan='$data_id'");
	while ($data= $sql->fetch_assoc()) {
	
		$tagih=$data['tagih_b'];
	}
?>

<?php
	$sql = $koneksi->query("SELECT count(id_tagihan) as tagih_l from tb_tagihan where status='LS' and id_pelanggan='$data_id'");
	while ($data= $sql->fetch_assoc()) {
	
		$lunas=$data['tagih_l'];
	}
?>

<?php
	$sql = $koneksi->query("SELECT count(id_tagihan_lain) as tagih_lainB from tb_tagihan_lain where status='BL' and id_pelanggan='$data_id'");
	while ($data= $sql->fetch_assoc()) {
	
		$tagih_lainB=$data['tagih_lainB'];
	}
?>

<?php
	$sql = $koneksi->query("SELECT count(id_tagihan_lain) as tagih_lainL from tb_tagihan_lain where status='LS' and id_pelanggan='$data_id'");
	while ($data= $sql->fetch_assoc()) {
	
		$tagih_lainL=$data['tagih_lainL'];
	}
?>


<section class="content-header">
	<h1 class="fa fa-dashboard">
		Dashboard |
		<small>Pelanggan</small>
	</h1>
</section>

<!-- Main content -->
<section class="content">
	<!-- Small boxes (Stat box) -->
	<div class="row">


<?php $stt =  $tagih ?>
	<?php if($stt ==  $tagih ){ ?>
		<?php }if($stt == '0'){ ?>
		<?php }elseif($stt ==  $tagih ){ ?>
		<div class="col-lg-3 col-xs-6">
			<!-- small box -->
			<div class="small-box bg-red">
				<div class="inner">
					<h2>
						<b>
							<?= $tagih; ?>
						</b>
					</h2>

					<p>Belum Bayar Iuran Bulanan</p>
				</div>
				<div class="icon">
					<i class="ion-sad"></i>
				</div>
				<a href="?page=data-tagihan" class="small-box-footer">Cek info selengkapnya..
					<i class="fa fa-arrow-circle-right"></i>
				</a>
			</div>
		</div>
		<?php } ?>

<?php $stt =   $tagih_lainB ?>
	<?php if($stt ==   $tagih_lainB ){ ?>
		<?php }if($stt == '0'){ ?>
		<?php }elseif($stt ==   $tagih_lainB ){ ?>
		<div class="col-lg-3 col-xs-6">
			<!-- small box -->
			<div class="small-box bg-orange">
				<div class="inner">
					<h2>
						<b>
							<?= $tagih_lainB; ?>
						</b>
					</h2>

					<p>Belum Bayar Tagihan Lainnya</p>
				</div>
				<div class="icon">
					<i class="ion-sad"></i>
				</div>
				<a href="?page=data-tagihan-lain" class="small-box-footer">Cek info selengkapnya..
					<i class="fa fa-arrow-circle-right"></i>
				</a>
			</div>
		</div>
		<?php } ?>

		<div class="col-lg-3 col-xs-6">
			<!-- small box -->
			<div class="small-box bg-blue">
				<div class="inner">
					<h2>
						<b>
							<i class="fa fa-rss"></i>
						</b>
					</h2>

					<p>Speedtest Server Jaringan</p>
				</div>
				<div class="icon">
					<i class="fa fa-tv"></i>
				</div>
				<a href="?page=speedtest-jaringan" class="small-box-footer">Cek info selengkapnya..
					<i class="fa fa-arrow-circle-right"></i>
				</a>
			</div>
		</div>
	</div>

	<div class="row">
	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
	<div class="box box-default">
	<div class="box box-primary">
		<div class="box-header with-border">
			<i class="fa fa-money"></i>
			<b style="font-size: 12pt">TAGIHAN TERBARU ANDA</b>
			<br>Silakan cek tagihan anda selengkapnya atau download nota tagihan di lihat <a href="?page=data-tagihan"><u>detail tagihan !</u></a>
			<div class="box-tools pull-right">
			</div>
		</div>
		<!-- /.box-header -->
		<div class="box-body">
			<div class="table-responsive">
				<table id="" class="table table-bordered table-striped">
					<?php
                  		$sql = $koneksi->query("SELECT * from tb_tagihan where id_pelanggan='$data_id' order by id_tagihan desc limit 1");
                 		 while ($data= $sql->fetch_assoc()) {
                	?>
					<thead>

						<tr>
							<th>Periode Tagihan</th>
							<td>
								Bulan <?php echo $data['bulan']; ?> Tahun <?php echo $data['tahun']; ?>
							</td>
						</tr>

						<tr>
							<th>Total Tagihan</th>
							<td>
								<?php echo rupiah($data['tagihan']); ?>
							</td>
						</tr>

						
						<tr>
							<th>Status</th>
							<td>
								<?php $stt = $data['status']  ?>
								<?php if($stt == 'BL'){ ?>
								<span class="label label-danger">Belum Anda Bayar</span>
								<?php }elseif($stt == 'LS'){ ?>
								<span class="label label-info">Lunas</span>
							</td>
							<?php } ?>
						</tr>

						<?php $tgl = $data['tgl_bayar']  ?>
								<?php if($tgl == '0000-00-00'){ ?>
								<span class=""></span>
								<?php }elseif($tgl = $data['tgl_bayar']){ ?>
								<tr>
									<th>Tanggal Bayar</th>
									<td>
									<span class=""><?php echo tanggal ($data['tgl_bayar']); ?></span>
									</td>
								</tr>
									<?php } ?>

						<tr>
							<th>Opsi</th>
							<td>
								<span class="">
								<?php $stt = $data['status']  ?>
								<?php if($stt == 'BL'){ ?>
								<span><a href="?page=bayar-tagihan&kode=<?php echo $data['id_tagihan']; ?>" title="Bayar" class="btn btn-warning">
									<i class="fa fa-dollar"></i> Bayar Tagihan
									</a></span>
								<?php }elseif($stt == 'LS'){ ?>
								<span><a href="?page=bayar-tagihan&kode=<?php echo $data['id_tagihan']; ?>" title="Bayar" class="btn btn-primary">
									<i class="fa fa-money"></i> Lihat Nota
									</a></span>
							
									
								</span>
							</td>
							<?php } ?>
						</tr>
						
					</thead>
						<?php
						}
						?>
					</tbody>

				</table>
				<!-- /.box-body -->
			</div>
		</div>
	</div>
</div>
</div>

	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
	<div class="box box-default">
	<div class="box box-primary">
		<div class="box-header with-border">
			<div class="box-header with-border">
			<i class="fa fa-bullhorn"></i>
			<b style="font-size: 12pt">LAYANAN INFORMASI</b> 
			<u><a href="?page=data-informasi"> Help desk !</a></u>
			<div class="box-tools pull-right">
			</div>
		</div>
		<!-- /.box-header -->
		<div class="responsive">
			<div class="table">
				<table id="example1" class="table table-responsive table-bordered table-striped" >
					<thead>
						<tr>
							<th>No</th>
							<th class="col-sm-12">Informasi Penting</th>
						</tr>
					</thead>
					<tbody>

						<?php
                  $no = 1;
                  $sql = $koneksi->query("SELECT * from tb_informasi order by id_informasi desc limit 2");
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
</div>
</div>
</div>
</div>

	<div class="box box-primary">
		<div class="box-header with-border">
			<i class="fa fa-users"></i>
			<b style="font-size: 12pt">DATA PELANGGAN</b>
			<div class="box-tools pull-right">
			</div>
			<br>Silakan cek data anda selengkapnya atau perbarui data akun anda di lihat <a href="?page=data-pelanggan"><u>detail data !</u></a>
		</div>
		<!-- /.box-header -->
		<div class="box-body">
			<div class="table-responsive">
				<table id="" class="table table-bordered table-striped">
					<?php
                  		$no = 1;
                  		$sql = $koneksi->query("SELECT * from tb_pelanggan where id_pelanggan='$data_id'");
                  		while ($data= $sql->fetch_assoc()) {
                	?>
					<thead>
						<tr>
							<th class="col-sm-2">Nama Lengkap</th>
							<td>
								<?php echo $data['nama']; ?>
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
							<th class="col-sm-2">No HP</th>
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
							<th class="col-sm-2">Lihat Detail Data</th>
							<td>
								<a href="?page=data-pelanggan"class="btn bg-yellow"><b>Lihat detail</b></a>
							</td>
						</tr>
						
					</thead>			
						<?php
						}
						?>

				</table>
				<!-- /.box-body -->
			</div>
		</div>
	</div>

</section>