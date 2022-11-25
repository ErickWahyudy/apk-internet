<?php

	$kode_tanggal = date("dmy");
	$kode_tahun = date("Y"); 

	//paket internet
	$sql = $koneksi->query("SELECT count(id_paket) as paket from tb_paket");
	while ($data= $sql->fetch_assoc()) {
	
		$paket=$data['paket'];
	}

	//konfirmasi pembayaran
	$sql = $koneksi->query("SELECT count(id_konfirmasi) as konfirmasi from tb_tagihan_konfirmasi inner join tb_tagihan on tb_tagihan_konfirmasi.id_tagihan=tb_tagihan.id_tagihan where tb_tagihan.status='BL'");
	while ($data= $sql->fetch_assoc()) {
	
		$konfirmasi=$data['konfirmasi'];
	}

	//pelanggan aktif
	$sql = $koneksi->query("SELECT count(id_pelanggan) as huni from tb_pelanggan where status_plg='Aktif'");
	while ($data= $sql->fetch_assoc()) {
	
		$huni=$data['huni'];
	}

	//tagihan blm lunas
	$sql = $koneksi->query("SELECT count(id_tagihan) as tagih_b from tb_tagihan where status='BL'");
	while ($data= $sql->fetch_assoc()) {
	
		$tagih=$data['tagih_b'];
	}

	//tagihan lainnya blm bayar
	$sql = $koneksi->query("SELECT count(id_tagihan_lain) as tagihL_b from tb_tagihan_lain where status='BL'");
	while ($data= $sql->fetch_assoc()) {
	
		$tagihL=$data['tagihL_b'];
	}

	//tagihan lunas
	$sql = $koneksi->query("SELECT count(id_tagihan) as tagih_l from tb_tagihan where status='LS'");
	while ($data= $sql->fetch_assoc()) {
	
		$lunas=$data['tagih_l'];
	}


     // perintah tampil data totel pendapatan
     $sql = $koneksi->query("SELECT sum(tagihan) as tagihan from tb_tagihan where status='LS' and tahun='$kode_tahun'");
     
     $total = 0;
     $tot_bayar = 0;
     $no = 1;

     while ($data= $sql->fetch_assoc()) {
      // total adalah hasil dari harga x qty
      $total = $data['tagihan'];
      // total bayar adalah penjumlahan dari keseluruhan total
      $tot_bayar += $total;
  }

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
	<h1 class="fa fa-dashboard">
		Dashboard |
		<small>Administrator</small>
	</h1>
</section>

<!-- Main content -->
<section class="content">
	<!-- Small boxes (Stat box) -->
	<div class="row">

		<div class="col-lg-3 col-xs-6">
			<!-- small box -->
			<div class="small-box bg-primary">
				<div class="inner">
					<h2>
						<b>
							<?= $paket; ?>
						</b>
					</h2>

					<p>Paket</p>
				</div>
				<div class="icon">
					<i class="ion-ios-download"></i>
				</div>
				<a href="?page=data-paket" class="small-box-footer">Cek info selengkapnya..
					<i class="fa fa-arrow-circle-right"></i>
				</a>
			</div>
		</div>

		<div class="col-lg-3 col-xs-6">
			<!-- small box -->
			<div class="small-box bg-yellow">
				<div class="inner">
					<h2>
						<b>
							<?= $huni; ?>
						</b>
					</h2>

					<p>Pelanggan Aktif</p>
				</div>
				<div class="icon">
					<i class="ion-person-stalker"></i>
				</div>
				<a href="?page=data-pelanggan" class="small-box-footer">Cek info selengkapnya..
					<i class="fa fa-arrow-circle-right"></i>
				</a>
			</div>
		</div>

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

					<p>Belum Bayar Bulanan</p>
				</div>
				<div class="icon">
					<i class="ion-sad"></i>
				</div>
				<a href="?page=buka-tagihan" class="small-box-footer">Cek info selengkapnya..
					<i class="fa fa-arrow-circle-right"></i>
				</a>
			</div>
		</div>
		<?php } ?>

<?php $stt =  $tagihL ?>
	<?php if($stt ==  $tagihL ){ ?>
		<?php }if($stt == '0'){ ?>
		<?php }elseif($stt ==  $tagihL ){ ?>
		<div class="col-lg-3 col-xs-6">
			<!-- small box -->
			<div class="small-box bg-red">
				<div class="inner">
					<h2>
						<b>
							<?= $tagihL; ?>
						</b>
					</h2>

					<p>Belum Bayar Tagihan Lain</p>
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


<!-- small box -->
<?php $stt =  $konfirmasi ?>
	<?php if($stt ==  $konfirmasi ){ ?>
		<?php }if($stt == '0'){ ?>
		<?php }elseif($stt ==  $konfirmasi ){ ?>
		<div class="col-lg-3 col-xs-6">
			<div class="small-box bg-purple">
				<div class="inner">
					<h2>
						<b>
							<?= $konfirmasi; ?>
						</b>
					</h2>

					<p>Butuh Konfirmasi</p>
				</div>
				<div class="icon">
					<i class="fa fa-clock-o"></i>
				</div>
				<a href="?page=konfirmasi-pembayaran" class="small-box-footer">Cek info selengkapnya..
					<i class="fa fa-arrow-circle-right"></i>
				</a>
			</div>
			</div>
	<?php } ?>
			


		<div class="col-lg-3 col-xs-6">
			<!-- small box -->
			<div class="small-box bg-orange">
				<div class="inner">
					<h2>
						<b>
							<?php echo rupiah($tot_bayar - $tot_pengeluaran); ?>
						</b>
					</h2>

					<p>Total Pendapatan Tahun <?= $kode_tahun; ?> </p>
				</div>
				<div class="icon">
					<i class="fa fa-money"></i>
				</div>
				<a href="?page=lunas-tagihan" class="small-box-footer">Cek info selengkapnya..
					<i class="fa fa-arrow-circle-right"></i>
				</a>
			</div>
		</div>


		<div class="col-lg-3 col-xs-6">
			<!-- small box -->
			<div class="small-box bg-aqua">
				<div class="inner">
					<h2>
						<b>
							<?php echo rupiah($tot_pengeluaran); ?>
						</b>
					</h2>

					<p>Total Pengeluaran Tahun <?= $kode_tahun; ?></p>
				</div>
				<div class="icon">
					<i class="fa fa-dollar"></i>
				</div>
				<a href="?page=data-pengeluaran" class="small-box-footer">Cek info selengkapnya..
					<i class="fa fa-arrow-circle-right"></i>
				</a>
			</div>
		</div>


