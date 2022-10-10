<?php

$kode_tahun = date("Y");

?>

<section class="content-header">

	<h1 class="fa fa-table">

		Data Tagihan |

		<small> 

			<a href="?page=admin">Beranda</a> >

		 	<a href="?page=buka-tagihan">Buka Tagihan</a>

		</small>

	</h1>

</section>



<section class="content">

	<div class="row">

		<div class="col-md-12">

			<div class="box box-primary">

				<div class="box-header with-border">

					<h3 class="box-title">BUKA TAGIHAN</h3>

					<div class="box-tools pull-right">

						<button type="button" class="btn btn-box-tool" data-widget="collapse">

							<i class="fa fa-minus"></i>

						</button>

					</div>

				</div>



				<form class="form-horizontal" action="?page=data-tagihan" method="post" enctype="multipart/form-data">

					<div class="box-body">



						<div class="form-group">

							<label class="col-sm-2 control-label">Bulan</label>

							<div class="col-sm-4">

								<select name="bulan" id="bulan" class="form-control select2" style="width: 100%;" required>

									<option value="">-- Pilih Bulan --</option>

									<?php

								// ambil data dari database

								$query = "SELECT * FROM tb_bulan";

								$hasil = mysqli_query($koneksi, $query);

								while ($row = mysqli_fetch_array($hasil)) {

								?>

									<option value="<?php echo $row['id_bulan'] ?>">

										<?php echo $row['id_bulan'] ?>

										-

										<?php echo $row['bulan'] ?>

									</option>

									<?php

								}

								?>

								</select>

							</div>

						</div>



						<div class="form-group">

							<div class="col-sm-3">

							<input type="hidden" name="tahun" id="tahun" value='<?php echo $kode_tahun; ?>' class="btn btn-success"></input>

	
								<input type="submit" name="Lihat" value="LIHAT" class="btn btn-success"></input>

							</div>



						</div>

				</form>

				</div>

			</div>

		</div>

</section>