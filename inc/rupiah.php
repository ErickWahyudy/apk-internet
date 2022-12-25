<?php 
//membuat format rupiah dengan PHP 
function rupiah($angka){
	$hasil_rupiah = "Rp " . number_format($angka,2,',','.');
	return $hasil_rupiah;
}

//membuat shortname
function shortname($name){
	$short = explode(" ", $name);
	$shortname = $short[0];
	return $shortname;
}

//membuat format tanggal
function tanggal($date){
	$format = date('d F Y', strtotime($date));
	return $format;
}

//menampilkan hasil nilai dengan format rating ( * )
function rating($nilai){
	$hasil = "";
	for ($i=0; $i < $nilai; $i++) { 
		$hasil .= "<span class='fa fa-star checked'></span>";
	}
	return $hasil;
}
?>