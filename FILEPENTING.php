<?php

//menampilkan nama hari berdasarkan tanggal
$tanggal = "Y-m-d";
$hari = date('l', strtotime($tanggal));
if ($hari == "Sunday") {
	$hari_ini = "Minggu";
} elseif ($hari == "Monday") {
	$hari_ini = "Senin";
} elseif ($hari == "Tuesday") {
	$hari_ini = "Selasa";
} elseif ($hari == "Wednesday") {
	$hari_ini = "Rabu";
} elseif ($hari == "Thursday") {
	$hari_ini = "Kamis";
} elseif ($hari == "Friday") {
	$hari_ini = "Jumat";
} elseif ($hari == "Saturday") {
	$hari_ini = "Sabtu";
}

//Membuat nomor antrian pasien otomatis yang akan reset setiap hari
$no_antrian = "SELECT max(no_antrian) as no_antrian FROM tb_antrian WHERE tgl_antrian = '$tanggal'";
$hasil = mysqli_query($koneksi, $no_antrian);
$data = mysqli_fetch_array($hasil);
$no_antrian = $data['no_antrian'];
$noUrut = (int) substr($no_antrian, 3, 3);
$noUrut++;
$char = "SL";
$no_antrian = $char . sprintf("%03s", $noUrut);


?>