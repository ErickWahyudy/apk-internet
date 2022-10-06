<?php
	$bulan = $_POST["bulan"];
	$tahun = $_POST["tahun"];
?>
<?php
	$sql = $koneksi->query("SELECT * from tb_bulan where id_bulan='$bulan'");
	while ($data= $sql->fetch_assoc()) {
	
		$bl=$data['bulan'];
	}
?>

<section class="content-header">
    <h1 class="fa fa-table">
        Data Tagihan |
        <small>
            <a href="?page=admin">Beranda</a> >
            <a href="?page=buka-tagihan">Buka Tagihan</a> > Data Tagihan
        </small>
    </h1>
</section>

<section class="content">

    <div class="alert alert-info alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <h4>
            <i class="icon fa fa-info"></i> Data Tagihan
        </h4>
        <h4>Bulan :
            <?php echo $bl; ?>- Tahun :
            <?php echo $tahun; ?>
        </h4>
    </div>

    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">DATA TAGIHAN</h3>
            <div class="box-footer pull-right">
                <a href="../admin/tagihan/sendemail_BL.php" class="btn btn-warning">
                    <i class="fa fa-envelope"></i> Kirim Email</a>
            </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <div class="table-responsive">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>ID PELANGGAN</th>
                            <th>Nama</th>
                            <th>Tagihan</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php
                  $no = 1;
                  $sql = $koneksi->query("SELECT p.id_pelanggan, p.nama, p.no_hp, p.email, p.password, t.id_tagihan, t.tagihan, t.status, t.tgl_bayar 
				  from tb_pelanggan p inner join tb_tagihan t on p.id_pelanggan=t.id_pelanggan where bulan='$bulan' and tahun='$tahun' and status='BL'
				  order by status asc");
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
                                <?php echo rupiah($data['tagihan']); ?>
                            </td>
                            <td>
                                <?php $stt = $data['status']  ?>
                                <?php if($stt == 'BL'){ ?>
                                <span class="label label-danger">Belum Bayar</span>
                                <?php }elseif($stt == 'LS'){ ?>
                                <span class="label label-primary">Lunas</span>
                                (
                                <?php echo $data['tgl_bayar']; ?>)
                            </td>
                            <?php } ?>

                            <td>
                                <a href="?page=edit-tagihanBL&kode=<?php echo $data['id_tagihan']; ?>" title="Ubah"
                                    class="btn btn-warning">
                                    <i class="glyphicon glyphicon-edit"></i> EDIT
                                </a>&emsp;
                                <a href="?page=bayar-tagihan&kode=<?php echo $data['id_tagihan']; ?>"
                                    title="Bayar Tagihan" class="btn btn-info">
                                    <i class="glyphicon glyphicon-ok"></i> BAYAR
                                </a>&nbsp;&nbsp;&nbsp;
                                <a href="https://api.whatsapp.com/send?phone=<?php echo $data['no_hp']; ?>&text=Pelanggan Yth. Sdr/i%20<?php echo $data['nama']; ?>,
								%20Tagihan%20hotspot%20KassandraWiFi%20untuk Bulan <?php echo $bulan; ?> Tahun <?php echo $tahun; ?> dgn rincian%0A
								Biaya Tagihan : <?php echo rupiah($data['tagihan']); ?>%0A
								Sudah bisa dibayarkan mulai hari ini. Mohon melakukan pembayaran sebelum tgl 10 - <?php echo $bulan; ?> - <?php echo $tahun; ?> demi kenyamanan internet bersama.%0A%0A
								Pembayaran dapat dilakukan secara Tunai maupun transfer Bank, ShopeePay, LinkAja, Dana, Alfamart atau platform digital lainnya. %0A
								_Abaikan pesan jika sudah melakukan pembayaran.%20
								Terima kasih._%0A%0A
								Berikut kami sampaikan juga link pembayaran via transfer.%0A
								https://wifi.kassandra.my.id/pelanggan/tagihan_plg.php?id_tagihan=<?php echo $data['id_tagihan']; ?>  %0A%0A
								
								_Pesan ini dikirim otomatis oleh system aplikasi KassandraWiFi._%0A
								-wifi@kassandra.my.id-" target=" _blank" title="Pesan WhatsApp" class="btn btn-success">
                                    <b>Whatsapp</b>
                                </a>

                            </td>
                        </tr>
                        <?php
						}
						?>
                    </tbody>

                </table>
                <!-- /.box-body -->
                <div class="box-footer">
                    <a href="?page=buka-tagihan" class="btn btn-primary">Kembali</a>
                </div>
            </div>
        </div>
    </div>
</section>