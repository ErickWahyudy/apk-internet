

CREATE TABLE `tb_bulan` (
  `id_bulan` varchar(2) NOT NULL,
  `bulan` varchar(20) NOT NULL,
  PRIMARY KEY (`id_bulan`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO tb_bulan VALUES("01","Januari");
INSERT INTO tb_bulan VALUES("02","Februari");
INSERT INTO tb_bulan VALUES("03","Maret");
INSERT INTO tb_bulan VALUES("04","April");
INSERT INTO tb_bulan VALUES("05","Mei");
INSERT INTO tb_bulan VALUES("06","Juni");
INSERT INTO tb_bulan VALUES("07","Juli");
INSERT INTO tb_bulan VALUES("08","Agustus");
INSERT INTO tb_bulan VALUES("09","September");
INSERT INTO tb_bulan VALUES("10","Oktober");
INSERT INTO tb_bulan VALUES("11","November");
INSERT INTO tb_bulan VALUES("12","Desember");



CREATE TABLE `tb_email` (
  `id_email` varchar(50) NOT NULL,
  `nama_pengirim` varchar(255) NOT NULL,
  `email_pengirim` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `isi_pesan` text NOT NULL,
  `tanda_tangan` varchar(255) NOT NULL,
  PRIMARY KEY (`id_email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO tb_email VALUES("E001","KASSANDRAWIFI","cs@kassandra.my.id","TROBEL JARINGAN DARI SERVER, DAN MASIH DILAKUKAN PERBAIKAN","<p>Selamat pagi, kami sampaikan mohon maaf yang sebesar besarnya saat ini sedang terjadi gagal restart di server sehingga menyebabkan semua internet down.. Perbaikan sedang kami lakukan secepatnya. Terima kasih</p>
","wifi@kassandra.my.id");



CREATE TABLE `tb_feedback` (
  `id_feedback` varchar(50) CHARACTER SET latin1 NOT NULL,
  `nama` varchar(255) CHARACTER SET latin1 NOT NULL,
  `no_hp` varchar(100) CHARACTER SET latin1 NOT NULL,
  `nilai` varchar(6) CHARACTER SET latin1 NOT NULL,
  `feedback` varchar(255) CHARACTER SET latin1 NOT NULL,
  `tanggal` date NOT NULL,
  PRIMARY KEY (`id_feedback`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO tb_feedback VALUES("F001","Septian Wahyu","0881036227698","9","Wah sudah baik ????????","2022-03-07");



CREATE TABLE `tb_informasi` (
  `id_informasi` varchar(11) NOT NULL,
  `informasi` varchar(255) NOT NULL,
  `berkas` varchar(255) NOT NULL,
  PRIMARY KEY (`id_informasi`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO tb_informasi VALUES("I001","Link pembayaran KassandraWiFi","Linkpembayaran.txt");
INSERT INTO tb_informasi VALUES("I002","APLIKASI INI MASIH DALAM PENGEMBANGAN, MOHON DUKUNGANNYA AGAR BISA MANAJAMEN DATA ANTAR ADMIN DAN PELANGGAN DENGAN BAIK","");
INSERT INTO tb_informasi VALUES("I003","Untuk informasi lebih lanjut hub. 081456141227 atau email cs@kassandra.my.id ","");



CREATE TABLE `tb_lapor` (
  `id_lapor` varchar(30) CHARACTER SET latin1 NOT NULL,
  `nama` varchar(100) CHARACTER SET latin1 NOT NULL,
  `no_hp` varchar(50) CHARACTER SET latin1 NOT NULL,
  `kendala` text CHARACTER SET latin1 NOT NULL,
  `tanggal` date NOT NULL,
  PRIMARY KEY (`id_lapor`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;




CREATE TABLE `tb_paket` (
  `id_paket` varchar(6) NOT NULL,
  `paket` varchar(20) NOT NULL,
  `tarif` int(22) NOT NULL,
  PRIMARY KEY (`id_paket`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO tb_paket VALUES("P001","1 Mb","50000");
INSERT INTO tb_paket VALUES("P002","1.8 Mb","80000");
INSERT INTO tb_paket VALUES("P003","2 Mb","100000");
INSERT INTO tb_paket VALUES("P003++","2.5 Mb","140000");
INSERT INTO tb_paket VALUES("P004","3 Mb","150000");
INSERT INTO tb_paket VALUES("P005","4 Mb","200000");
INSERT INTO tb_paket VALUES("P006","10 Mb","300000");



CREATE TABLE `tb_pelanggan` (
  `id_pelanggan` varchar(6) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `alamat` text NOT NULL,
  `no_hp` varchar(15) NOT NULL,
  `terdaftar_mulai` date NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `level` varchar(5) NOT NULL DEFAULT 'PLG',
  `id_paket` varchar(6) NOT NULL,
  `status_plg` enum('Aktif','Tidak Aktif') NOT NULL,
  PRIMARY KEY (`id_pelanggan`),
  KEY `id_kamar` (`id_paket`),
  CONSTRAINT `tb_pelanggan_ibfk_1` FOREIGN KEY (`id_paket`) REFERENCES `tb_paket` (`id_paket`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO tb_pelanggan VALUES("C001","Trianto N.A","Etan Serut, Jalen Balong Ponorogo","6285730799367","2019-10-10","ululroisya@gmail.com","9491","PLG","P003++","Aktif");
INSERT INTO tb_pelanggan VALUES("C002","Mada Al Fatih","Etan Serut, Jalen Balong Ponorogo","886984059823","2019-12-10","mada@rtrw.net","3728","PLG","P002","Aktif");
INSERT INTO tb_pelanggan VALUES("C003","Mas Nanang R","Jalen Balong Ponorogo","6281555435593","2020-01-10","rifidamayanti8@gmail.com","8075","PLG","P001","Aktif");
INSERT INTO tb_pelanggan VALUES("C004","Mas Hadi Susanto","Jalen Balong Ponorogo","6288230517455","2020-02-15","anapuspita639@gmail.com","1636","PLG","P001","Aktif");
INSERT INTO tb_pelanggan VALUES("C005","Mbak Nurjannah","Jalen Balong Ponorogo","6282301545816","2020-02-15","snurjanah5816@gmail.com","1579","PLG","P001","Aktif");
INSERT INTO tb_pelanggan VALUES("C006","Pak Pairin","Etan Serut, Jalen Balong Ponorogo","6289510608125","2020-04-02","pairin@rtrw.net","3106","PLG","P001","Tidak Aktif");
INSERT INTO tb_pelanggan VALUES("C007","Pemdes Jalen","Jl. Gajah Mada Ds. Jalen Kec. Balong Kab. Ponorogo","6285156575371","2021-12-25","landu.paranggi57@gmail.com","8461","PLG","P006","Aktif");
INSERT INTO tb_pelanggan VALUES("C008","Mas Herry Pewe","Etan Serut, Jalen Balong Ponorogo","6287758247146","2020-05-01","crewpanserzero@gmail.com","9583","PLG","P003","Aktif");
INSERT INTO tb_pelanggan VALUES("C009","Suyoso","Kulon Serut, Jalen Balong Ponorogo","6289666471656","2020-05-17","ekasaputa94@gmail.com","8563","PLG","P003","Aktif");
INSERT INTO tb_pelanggan VALUES("C010","Pak Mono","Tenggong, Jalen Balong Ponorogo","6289666471656","2020-06-02","ekasaputa94@gmail.com","9180","PLG","P003","Aktif");
INSERT INTO tb_pelanggan VALUES("C011","Pak Panijan","Irmas, Jalen Balong Ponorogo","6281237487606","2020-06-18","panijan@rtrw.net","5521","PLG","P003","Tidak Aktif");
INSERT INTO tb_pelanggan VALUES("C012","Mas Imam Wahyudi","Etan Serut, Jalen Balong Ponorogo","6285330598686","2020-07-07","imam@rtrw.net","4053","PLG","P001","Aktif");
INSERT INTO tb_pelanggan VALUES("C013","Kartiko","Jl. H. Agus Salim (Etan Serut), Jalen Balong Ponorogo","6285608639832","2020-07-10","mahendrakartiko75@gmail.com","8030","PLG","P001","Aktif");
INSERT INTO tb_pelanggan VALUES("C014","Sherly","Etan Serut, Jalen Balong Ponorogo","6281259346337","2020-08-01","sherlisaskiamh@gmail.com","4303","PLG","P001","Aktif");
INSERT INTO tb_pelanggan VALUES("C015","Emma","Tenggong, Jalen Balong Ponorogo","6281337759260","2020-08-03","dwiemma4@gmail.com","8598","PLG","P004","Aktif");
INSERT INTO tb_pelanggan VALUES("C016","Boby p","Irmas, Jalen Balong Ponorogo","6285785030865","2020-10-11","botaxskchilljr@gmail.com","Boby1234","PLG","P002","Aktif");
INSERT INTO tb_pelanggan VALUES("C017","Pak Jono","Jl. Hassanudin (Kulon serut), Jalen, Balong, Ponorogo","6282316236826","2020-10-20","riohandoyorio12@gmail.com","5234","PLG","P003","Tidak Aktif");
INSERT INTO tb_pelanggan VALUES("C018","Pak No","Jalen Balong Ponorogo","6282334015022","2020-12-01","yantobrojo519@gmail.com","3096","PLG","P003","Aktif");
INSERT INTO tb_pelanggan VALUES("C019","Mas Suyanto ( Keto )","Etan Serut, Jalen Balong Ponorogo","886970015258","2021-05-01","suyanto@rtrw.net","4661","PLG","P001","Tidak Aktif");
INSERT INTO tb_pelanggan VALUES("C020","Nurinta Zumrotin Aswaty","Jl. H. Agus Salim Rt 007/Rw 003, Jalen, Balong, Ponorogo","6285852518697","2021-08-06","nurintaaswaty@gmail.com","nurinta28041998","PLG","P002","Aktif");
INSERT INTO tb_pelanggan VALUES("C021","Rafika Respitasari","Jl. Gajahmada RT 07 RW 03 ds. Jalen kec. Balong Ponorogo","6285745004092","2021-09-07","rafika.respitasari@gmail.com","Fikadila9306","PLG","P003","Aktif");
INSERT INTO tb_pelanggan VALUES("C022","Septian Wahyu S","Jl. H. Agus Salim RT07 RW03 Dukuh Medelan Desa Jalen Kecamatan Balong","62881036227698","2021-09-28","sw646678@gmail.com","8731","PLG","P002","Aktif");



CREATE TABLE `tb_pengeluaran` (
  `id_pengeluaran` varchar(11) NOT NULL,
  `jenis_pengeluaran` text NOT NULL,
  `biaya_pengeluaran` varchar(100) NOT NULL,
  `tanggal` date NOT NULL,
  `keterangan` enum('Belum Saya Bayar','LUNAS') NOT NULL,
  PRIMARY KEY (`id_pengeluaran`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO tb_pengeluaran VALUES("S001","Bulanan Indihome 30Mb","385000","2021-04-10","LUNAS");
INSERT INTO tb_pengeluaran VALUES("S002","Bulanan Indihome 40Mb","410000","2021-05-10","LUNAS");
INSERT INTO tb_pengeluaran VALUES("S003","Bulanan Indihome 40Mb","410000","2021-06-07","LUNAS");
INSERT INTO tb_pengeluaran VALUES("S004","Bulanan Indihome 40Mb","400000","2021-07-14","LUNAS");
INSERT INTO tb_pengeluaran VALUES("S005","Beli AP TP-Link CPE220 + Kabel Lan","610000","2021-07-16","LUNAS");
INSERT INTO tb_pengeluaran VALUES("S006","Bulanan Indihome 40Mb","400000","2021-08-09","LUNAS");
INSERT INTO tb_pengeluaran VALUES("S007","Bulanan Indihome 40Mb","400000","2021-09-13","LUNAS");
INSERT INTO tb_pengeluaran VALUES("S008","Bulanan Indihome 40Mb","400000","2021-10-11","LUNAS");
INSERT INTO tb_pengeluaran VALUES("S009","Bulanan Indihome 40Mb","400000","2021-11-12","LUNAS");
INSERT INTO tb_pengeluaran VALUES("S010","Bulanan Indihome 40Mb","400000","2021-12-11","LUNAS");
INSERT INTO tb_pengeluaran VALUES("S011","Bulanan Indihome 40Mb","400000","2022-01-14","LUNAS");
INSERT INTO tb_pengeluaran VALUES("S012","Bulanan Indihome 40Mb","400000","2022-02-13","LUNAS");
INSERT INTO tb_pengeluaran VALUES("S013","Bulanan Indihome 40Mb","400000","2022-03-11","LUNAS");
INSERT INTO tb_pengeluaran VALUES("S014","Bulanan indihome 40Mb","400000","2022-04-12","LUNAS");
INSERT INTO tb_pengeluaran VALUES("S015","Bulanan Indihome 40Mb","400000","2022-05-13","LUNAS");
INSERT INTO tb_pengeluaran VALUES("S016","Bulanan Indihome 40Mb","400000","2022-06-13","LUNAS");
INSERT INTO tb_pengeluaran VALUES("S017","Beli Access Ponit TP Link CPE 220","515000","2022-05-07","LUNAS");
INSERT INTO tb_pengeluaran VALUES("S018","Bulanan Indihome 50Mb","406000","2022-07-14","LUNAS");



CREATE TABLE `tb_pengguna` (
  `id_pengguna` int(11) NOT NULL AUTO_INCREMENT,
  `nama_pengguna` varchar(20) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `level` varchar(50) NOT NULL DEFAULT 'Administrator',
  PRIMARY KEY (`id_pengguna`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

INSERT INTO tb_pengguna VALUES("1","Erik Wahyudi","admin@kassandra.com","erick05wahyudy","Administrator");



CREATE TABLE `tb_tagihan` (
  `id_tagihan` int(11) NOT NULL AUTO_INCREMENT,
  `bulan` varchar(3) NOT NULL,
  `tahun` year(4) NOT NULL,
  `id_pelanggan` varchar(6) NOT NULL,
  `tagihan` int(11) NOT NULL,
  `status` enum('BL','LS') NOT NULL,
  `tgl_bayar` date NOT NULL,
  PRIMARY KEY (`id_tagihan`),
  KEY `id_penghuni` (`id_pelanggan`),
  KEY `bulan` (`bulan`),
  CONSTRAINT `tb_tagihan_ibfk_1` FOREIGN KEY (`id_pelanggan`) REFERENCES `tb_pelanggan` (`id_pelanggan`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `tb_tagihan_ibfk_2` FOREIGN KEY (`bulan`) REFERENCES `tb_bulan` (`id_bulan`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=474 DEFAULT CHARSET=latin1;

INSERT INTO tb_tagihan VALUES("20","04","2021","C002","80000","LS","2021-04-10");
INSERT INTO tb_tagihan VALUES("21","04","2021","C003","50000","LS","2021-04-04");
INSERT INTO tb_tagihan VALUES("22","04","2021","C004","50000","LS","2021-04-16");
INSERT INTO tb_tagihan VALUES("23","04","2021","C005","50000","LS","2021-04-16");
INSERT INTO tb_tagihan VALUES("24","04","2021","C006","50000","LS","2021-04-06");
INSERT INTO tb_tagihan VALUES("26","04","2021","C008","100000","LS","2021-04-09");
INSERT INTO tb_tagihan VALUES("27","04","2021","C009","100000","LS","2021-04-03");
INSERT INTO tb_tagihan VALUES("28","04","2021","C010","100000","LS","2021-04-04");
INSERT INTO tb_tagihan VALUES("29","04","2021","C011","100000","LS","2021-04-10");
INSERT INTO tb_tagihan VALUES("30","04","2021","C012","150000","LS","2021-04-02");
INSERT INTO tb_tagihan VALUES("31","04","2021","C013","50000","LS","2021-04-08");
INSERT INTO tb_tagihan VALUES("32","04","2021","C014","50000","LS","2021-04-10");
INSERT INTO tb_tagihan VALUES("33","04","2021","C015","150000","LS","2021-04-04");
INSERT INTO tb_tagihan VALUES("34","04","2021","C016","80000","LS","2021-04-02");
INSERT INTO tb_tagihan VALUES("35","04","2021","C017","100000","LS","2021-04-06");
INSERT INTO tb_tagihan VALUES("36","04","2021","C018","100000","LS","2021-04-06");
INSERT INTO tb_tagihan VALUES("95","05","2021","C002","80000","LS","2021-05-09");
INSERT INTO tb_tagihan VALUES("96","05","2021","C003","50000","LS","2021-05-11");
INSERT INTO tb_tagihan VALUES("97","05","2021","C004","50000","LS","2021-05-15");
INSERT INTO tb_tagihan VALUES("98","05","2021","C005","50000","LS","2021-05-15");
INSERT INTO tb_tagihan VALUES("99","05","2021","C006","50000","LS","2021-05-10");
INSERT INTO tb_tagihan VALUES("101","05","2021","C008","100000","LS","2021-05-15");
INSERT INTO tb_tagihan VALUES("102","05","2021","C009","150000","LS","2021-05-04");
INSERT INTO tb_tagihan VALUES("103","05","2021","C010","100000","LS","2021-05-04");
INSERT INTO tb_tagihan VALUES("104","05","2021","C011","100000","LS","2021-05-10");
INSERT INTO tb_tagihan VALUES("105","05","2021","C012","150000","LS","2021-05-02");
INSERT INTO tb_tagihan VALUES("106","05","2021","C013","50000","LS","2021-05-10");
INSERT INTO tb_tagihan VALUES("107","05","2021","C014","50000","LS","2021-05-11");
INSERT INTO tb_tagihan VALUES("108","05","2021","C015","150000","LS","2021-05-06");
INSERT INTO tb_tagihan VALUES("109","05","2021","C016","80000","LS","2021-05-02");
INSERT INTO tb_tagihan VALUES("110","05","2021","C017","100000","LS","2021-05-06");
INSERT INTO tb_tagihan VALUES("111","05","2021","C018","100000","LS","2021-05-07");
INSERT INTO tb_tagihan VALUES("113","05","2021","C019","50000","LS","2021-05-10");
INSERT INTO tb_tagihan VALUES("134","06","2021","C001","100000","LS","2021-06-07");
INSERT INTO tb_tagihan VALUES("135","06","2021","C002","80000","LS","2021-06-06");
INSERT INTO tb_tagihan VALUES("136","06","2021","C003","50000","LS","2021-06-07");
INSERT INTO tb_tagihan VALUES("137","06","2021","C004","50000","LS","2021-06-07");
INSERT INTO tb_tagihan VALUES("138","06","2021","C005","50000","LS","2021-06-10");
INSERT INTO tb_tagihan VALUES("139","06","2021","C006","50000","LS","2021-06-07");
INSERT INTO tb_tagihan VALUES("141","06","2021","C008","100000","LS","2021-06-07");
INSERT INTO tb_tagihan VALUES("142","06","2021","C009","100000","LS","2021-06-03");
INSERT INTO tb_tagihan VALUES("143","06","2021","C010","100000","LS","2021-06-03");
INSERT INTO tb_tagihan VALUES("144","06","2021","C011","100000","LS","2021-06-09");
INSERT INTO tb_tagihan VALUES("145","06","2021","C012","150000","LS","2021-06-02");
INSERT INTO tb_tagihan VALUES("146","06","2021","C013","50000","LS","2021-06-08");
INSERT INTO tb_tagihan VALUES("147","06","2021","C014","50000","LS","2021-06-09");
INSERT INTO tb_tagihan VALUES("148","06","2021","C015","150000","LS","2021-06-03");
INSERT INTO tb_tagihan VALUES("149","06","2021","C016","80000","LS","2021-06-02");
INSERT INTO tb_tagihan VALUES("150","06","2021","C017","100000","LS","2021-06-07");
INSERT INTO tb_tagihan VALUES("151","06","2021","C018","100000","LS","2021-06-10");
INSERT INTO tb_tagihan VALUES("153","06","2021","C019","50000","LS","2021-06-08");
INSERT INTO tb_tagihan VALUES("154","07","2021","C001","100000","LS","2021-07-10");
INSERT INTO tb_tagihan VALUES("155","07","2021","C002","80000","LS","2021-07-08");
INSERT INTO tb_tagihan VALUES("156","07","2021","C003","50000","LS","2021-07-07");
INSERT INTO tb_tagihan VALUES("157","07","2021","C004","50000","LS","2021-07-13");
INSERT INTO tb_tagihan VALUES("158","07","2021","C005","50000","LS","2021-07-14");
INSERT INTO tb_tagihan VALUES("159","07","2021","C006","50000","LS","2021-07-06");
INSERT INTO tb_tagihan VALUES("161","07","2021","C008","100000","LS","2021-07-09");
INSERT INTO tb_tagihan VALUES("162","07","2021","C009","150000","LS","2021-07-08");
INSERT INTO tb_tagihan VALUES("163","07","2021","C010","100000","LS","2021-07-08");
INSERT INTO tb_tagihan VALUES("164","07","2021","C011","100000","LS","2021-07-06");
INSERT INTO tb_tagihan VALUES("165","07","2021","C012","150000","LS","2021-07-03");
INSERT INTO tb_tagihan VALUES("166","07","2021","C013","50000","LS","2021-07-12");
INSERT INTO tb_tagihan VALUES("167","07","2021","C014","50000","LS","2021-07-10");
INSERT INTO tb_tagihan VALUES("168","07","2021","C015","150000","LS","2021-07-02");
INSERT INTO tb_tagihan VALUES("169","07","2021","C016","80000","LS","2021-07-03");
INSERT INTO tb_tagihan VALUES("170","07","2021","C017","100000","LS","2021-07-10");
INSERT INTO tb_tagihan VALUES("171","07","2021","C018","100000","LS","2021-07-10");
INSERT INTO tb_tagihan VALUES("173","07","2021","C019","50000","LS","2021-07-10");
INSERT INTO tb_tagihan VALUES("174","08","2021","C001","100000","LS","2021-08-02");
INSERT INTO tb_tagihan VALUES("175","08","2021","C002","80000","LS","2021-08-04");
INSERT INTO tb_tagihan VALUES("176","08","2021","C003","50000","LS","2021-08-13");
INSERT INTO tb_tagihan VALUES("177","08","2021","C004","50000","LS","2021-08-16");
INSERT INTO tb_tagihan VALUES("178","08","2021","C005","50000","LS","2021-08-14");
INSERT INTO tb_tagihan VALUES("179","08","2021","C006","50000","LS","2021-08-03");
INSERT INTO tb_tagihan VALUES("181","08","2021","C008","100000","LS","2021-08-05");
INSERT INTO tb_tagihan VALUES("182","08","2021","C009","100000","LS","2021-08-06");
INSERT INTO tb_tagihan VALUES("183","08","2021","C010","100000","LS","2021-08-06");
INSERT INTO tb_tagihan VALUES("184","08","2021","C011","100000","LS","2021-08-09");
INSERT INTO tb_tagihan VALUES("185","08","2021","C012","150000","LS","2021-08-02");
INSERT INTO tb_tagihan VALUES("186","08","2021","C013","50000","LS","2021-08-05");
INSERT INTO tb_tagihan VALUES("187","08","2021","C014","50000","LS","2021-08-09");
INSERT INTO tb_tagihan VALUES("188","08","2021","C015","150000","LS","2021-08-03");
INSERT INTO tb_tagihan VALUES("189","08","2021","C016","80000","LS","2021-08-02");
INSERT INTO tb_tagihan VALUES("190","08","2021","C017","100000","LS","2021-08-05");
INSERT INTO tb_tagihan VALUES("191","08","2021","C018","100000","LS","2021-08-02");
INSERT INTO tb_tagihan VALUES("192","08","2021","C019","50000","LS","2021-08-09");
INSERT INTO tb_tagihan VALUES("233","09","2021","C001","100000","LS","2021-09-07");
INSERT INTO tb_tagihan VALUES("234","09","2021","C002","80000","LS","2021-09-03");
INSERT INTO tb_tagihan VALUES("235","09","2021","C003","50000","LS","2021-09-04");
INSERT INTO tb_tagihan VALUES("236","09","2021","C004","50000","LS","2021-09-15");
INSERT INTO tb_tagihan VALUES("237","09","2021","C005","50000","LS","2021-09-15");
INSERT INTO tb_tagihan VALUES("238","09","2021","C006","50000","LS","2021-09-05");
INSERT INTO tb_tagihan VALUES("240","09","2021","C008","100000","LS","2021-09-09");
INSERT INTO tb_tagihan VALUES("241","09","2021","C009","100000","LS","2021-09-04");
INSERT INTO tb_tagihan VALUES("242","09","2021","C010","100000","LS","2021-09-04");
INSERT INTO tb_tagihan VALUES("243","09","2021","C011","100000","LS","2021-09-10");
INSERT INTO tb_tagihan VALUES("244","09","2021","C012","150000","LS","2021-09-01");
INSERT INTO tb_tagihan VALUES("245","09","2021","C013","50000","LS","2021-09-07");
INSERT INTO tb_tagihan VALUES("246","09","2021","C014","50000","LS","2021-09-07");
INSERT INTO tb_tagihan VALUES("247","09","2021","C015","150000","LS","2021-09-01");
INSERT INTO tb_tagihan VALUES("248","09","2021","C016","80000","LS","2021-09-01");
INSERT INTO tb_tagihan VALUES("249","09","2021","C017","100000","LS","2021-09-06");
INSERT INTO tb_tagihan VALUES("250","09","2021","C018","100000","LS","2021-09-03");
INSERT INTO tb_tagihan VALUES("252","09","2021","C020","80000","LS","2021-09-04");
INSERT INTO tb_tagihan VALUES("253","09","2021","C021","150000","LS","2021-09-12");
INSERT INTO tb_tagihan VALUES("254","10","2021","C001","100000","LS","2021-10-09");
INSERT INTO tb_tagihan VALUES("255","10","2021","C002","80000","LS","2021-10-08");
INSERT INTO tb_tagihan VALUES("256","10","2021","C003","50000","LS","2021-10-09");
INSERT INTO tb_tagihan VALUES("257","10","2021","C004","50000","LS","2021-10-16");
INSERT INTO tb_tagihan VALUES("258","10","2021","C005","50000","LS","2021-10-15");
INSERT INTO tb_tagihan VALUES("259","10","2021","C006","50000","LS","2021-10-08");
INSERT INTO tb_tagihan VALUES("261","10","2021","C008","100000","LS","2021-10-10");
INSERT INTO tb_tagihan VALUES("262","10","2021","C009","100000","LS","2021-10-05");
INSERT INTO tb_tagihan VALUES("263","10","2021","C010","100000","LS","2021-10-05");
INSERT INTO tb_tagihan VALUES("264","10","2021","C011","100000","LS","2021-10-09");
INSERT INTO tb_tagihan VALUES("265","10","2021","C012","50000","LS","2021-10-02");
INSERT INTO tb_tagihan VALUES("266","10","2021","C013","50000","LS","2021-10-06");
INSERT INTO tb_tagihan VALUES("267","10","2021","C014","50000","LS","2021-10-09");
INSERT INTO tb_tagihan VALUES("268","10","2021","C015","150000","LS","2021-10-01");
INSERT INTO tb_tagihan VALUES("269","10","2021","C016","80000","LS","2021-10-11");
INSERT INTO tb_tagihan VALUES("270","10","2021","C017","100000","LS","2021-10-05");
INSERT INTO tb_tagihan VALUES("271","10","2021","C018","100000","LS","2021-10-03");
INSERT INTO tb_tagihan VALUES("273","10","2021","C020","80000","LS","2021-10-09");
INSERT INTO tb_tagihan VALUES("274","10","2021","C021","100000","LS","2021-10-03");
INSERT INTO tb_tagihan VALUES("275","10","2021","C022","80000","LS","2021-10-05");
INSERT INTO tb_tagihan VALUES("276","11","2021","C001","100000","LS","2021-11-08");
INSERT INTO tb_tagihan VALUES("277","11","2021","C002","80000","LS","2021-11-08");
INSERT INTO tb_tagihan VALUES("278","11","2021","C003","50000","LS","2021-11-06");
INSERT INTO tb_tagihan VALUES("279","11","2021","C004","50000","LS","2021-11-16");
INSERT INTO tb_tagihan VALUES("280","11","2021","C005","50000","LS","2021-11-16");
INSERT INTO tb_tagihan VALUES("281","11","2021","C006","50000","LS","2021-11-03");
INSERT INTO tb_tagihan VALUES("283","11","2021","C008","50000","LS","2021-11-11");
INSERT INTO tb_tagihan VALUES("284","11","2021","C009","100000","LS","2021-11-05");
INSERT INTO tb_tagihan VALUES("285","11","2021","C010","100000","LS","2021-11-05");
INSERT INTO tb_tagihan VALUES("286","11","2021","C011","100000","LS","2021-11-10");
INSERT INTO tb_tagihan VALUES("287","11","2021","C012","50000","LS","2021-11-01");
INSERT INTO tb_tagihan VALUES("288","11","2021","C013","50000","LS","2021-11-06");
INSERT INTO tb_tagihan VALUES("289","11","2021","C014","50000","LS","2021-11-08");
INSERT INTO tb_tagihan VALUES("290","11","2021","C015","150000","LS","2021-11-02");
INSERT INTO tb_tagihan VALUES("291","11","2021","C016","80000","LS","2021-11-01");
INSERT INTO tb_tagihan VALUES("292","11","2021","C017","100000","LS","2021-11-05");
INSERT INTO tb_tagihan VALUES("293","11","2021","C018","100000","LS","2021-11-04");
INSERT INTO tb_tagihan VALUES("295","11","2021","C020","80000","LS","2021-11-10");
INSERT INTO tb_tagihan VALUES("296","11","2021","C021","100000","LS","2021-11-06");
INSERT INTO tb_tagihan VALUES("297","11","2021","C022","80000","LS","2021-11-10");
INSERT INTO tb_tagihan VALUES("298","12","2021","C001","100000","LS","2021-12-07");
INSERT INTO tb_tagihan VALUES("299","12","2021","C002","80000","LS","2021-12-09");
INSERT INTO tb_tagihan VALUES("300","12","2021","C003","50000","LS","2021-12-05");
INSERT INTO tb_tagihan VALUES("301","12","2021","C004","50000","LS","2021-12-15");
INSERT INTO tb_tagihan VALUES("302","12","2021","C005","50000","LS","2021-12-15");
INSERT INTO tb_tagihan VALUES("305","12","2021","C008","50000","LS","2021-12-10");
INSERT INTO tb_tagihan VALUES("306","12","2021","C009","100000","LS","2021-12-06");
INSERT INTO tb_tagihan VALUES("307","12","2021","C010","80000","LS","2021-12-09");
INSERT INTO tb_tagihan VALUES("308","12","2021","C011","100000","LS","2021-12-10");
INSERT INTO tb_tagihan VALUES("309","12","2021","C012","50000","LS","2021-12-04");
INSERT INTO tb_tagihan VALUES("310","12","2021","C013","50000","LS","2021-12-08");
INSERT INTO tb_tagihan VALUES("311","12","2021","C014","50000","LS","2021-12-09");
INSERT INTO tb_tagihan VALUES("312","12","2021","C015","150000","LS","2021-12-04");
INSERT INTO tb_tagihan VALUES("313","12","2021","C016","80000","LS","2021-12-04");
INSERT INTO tb_tagihan VALUES("314","12","2021","C017","100000","LS","2021-12-04");
INSERT INTO tb_tagihan VALUES("315","12","2021","C018","100000","LS","2021-12-05");
INSERT INTO tb_tagihan VALUES("316","12","2021","C019","50000","LS","2021-12-09");
INSERT INTO tb_tagihan VALUES("317","12","2021","C020","80000","LS","2021-12-09");
INSERT INTO tb_tagihan VALUES("318","12","2021","C021","100000","LS","2021-12-05");
INSERT INTO tb_tagihan VALUES("319","12","2021","C022","80000","LS","2021-12-05");
INSERT INTO tb_tagihan VALUES("320","01","2022","C001","100000","LS","2022-01-06");
INSERT INTO tb_tagihan VALUES("321","01","2022","C002","80000","LS","2022-01-07");
INSERT INTO tb_tagihan VALUES("322","01","2022","C003","50000","LS","2022-01-01");
INSERT INTO tb_tagihan VALUES("323","01","2022","C004","50000","LS","2022-01-15");
INSERT INTO tb_tagihan VALUES("324","01","2022","C005","50000","LS","2022-01-14");
INSERT INTO tb_tagihan VALUES("326","01","2022","C007","300000","LS","2022-01-13");
INSERT INTO tb_tagihan VALUES("327","01","2022","C008","100000","LS","2022-01-12");
INSERT INTO tb_tagihan VALUES("328","01","2022","C009","100000","LS","2022-01-01");
INSERT INTO tb_tagihan VALUES("329","01","2022","C010","100000","LS","2022-01-01");
INSERT INTO tb_tagihan VALUES("330","01","2022","C011","100000","LS","2022-01-12");
INSERT INTO tb_tagihan VALUES("331","01","2022","C012","50000","LS","2022-01-01");
INSERT INTO tb_tagihan VALUES("332","01","2022","C013","50000","LS","2022-01-04");
INSERT INTO tb_tagihan VALUES("333","01","2022","C014","50000","LS","2022-01-08");
INSERT INTO tb_tagihan VALUES("334","01","2022","C015","150000","LS","2022-01-03");
INSERT INTO tb_tagihan VALUES("335","01","2022","C016","80000","LS","2022-01-01");
INSERT INTO tb_tagihan VALUES("336","01","2022","C017","100000","LS","2022-01-05");
INSERT INTO tb_tagihan VALUES("337","01","2022","C018","100000","LS","2022-01-04");
INSERT INTO tb_tagihan VALUES("338","01","2022","C019","50000","LS","2022-01-09");
INSERT INTO tb_tagihan VALUES("339","01","2022","C020","80000","LS","2022-01-10");
INSERT INTO tb_tagihan VALUES("340","01","2022","C021","100000","LS","2022-01-05");
INSERT INTO tb_tagihan VALUES("341","01","2022","C022","80000","LS","2022-01-06");
INSERT INTO tb_tagihan VALUES("342","02","2022","C001","100000","LS","2022-02-07");
INSERT INTO tb_tagihan VALUES("343","02","2022","C002","80000","LS","2022-02-07");
INSERT INTO tb_tagihan VALUES("344","02","2022","C003","50000","LS","2022-02-04");
INSERT INTO tb_tagihan VALUES("345","02","2022","C004","50000","LS","2022-02-16");
INSERT INTO tb_tagihan VALUES("346","02","2022","C005","50000","LS","2022-02-14");
INSERT INTO tb_tagihan VALUES("348","02","2022","C007","300000","LS","2022-02-20");
INSERT INTO tb_tagihan VALUES("349","02","2022","C008","100000","LS","2022-02-10");
INSERT INTO tb_tagihan VALUES("350","02","2022","C009","100000","LS","2022-02-07");
INSERT INTO tb_tagihan VALUES("351","02","2022","C010","100000","LS","2022-02-07");
INSERT INTO tb_tagihan VALUES("353","02","2022","C012","50000","LS","2022-02-01");
INSERT INTO tb_tagihan VALUES("354","02","2022","C013","50000","LS","2022-02-07");
INSERT INTO tb_tagihan VALUES("355","02","2022","C014","50000","LS","2022-02-10");
INSERT INTO tb_tagihan VALUES("356","02","2022","C015","150000","LS","2022-02-05");
INSERT INTO tb_tagihan VALUES("357","02","2022","C016","80000","LS","2022-02-01");
INSERT INTO tb_tagihan VALUES("358","02","2022","C017","100000","LS","2022-02-07");
INSERT INTO tb_tagihan VALUES("359","02","2022","C018","100000","LS","2022-02-05");
INSERT INTO tb_tagihan VALUES("360","02","2022","C019","50000","LS","2022-02-09");
INSERT INTO tb_tagihan VALUES("361","02","2022","C020","80000","LS","2022-02-09");
INSERT INTO tb_tagihan VALUES("362","02","2022","C021","100000","LS","2022-02-06");
INSERT INTO tb_tagihan VALUES("363","02","2022","C022","80000","LS","2022-02-09");
INSERT INTO tb_tagihan VALUES("364","03","2022","C001","100000","LS","2022-03-09");
INSERT INTO tb_tagihan VALUES("365","03","2022","C002","80000","LS","2022-03-06");
INSERT INTO tb_tagihan VALUES("366","03","2022","C003","50000","LS","2022-03-06");
INSERT INTO tb_tagihan VALUES("367","03","2022","C004","50000","LS","2022-03-16");
INSERT INTO tb_tagihan VALUES("368","03","2022","C005","50000","LS","2022-03-16");
INSERT INTO tb_tagihan VALUES("370","03","2022","C007","300000","LS","2022-03-10");
INSERT INTO tb_tagihan VALUES("371","03","2022","C008","100000","LS","2022-03-10");
INSERT INTO tb_tagihan VALUES("372","03","2022","C009","100000","LS","2022-03-09");
INSERT INTO tb_tagihan VALUES("373","03","2022","C010","100000","LS","2022-03-09");
INSERT INTO tb_tagihan VALUES("375","03","2022","C012","50000","LS","2022-03-01");
INSERT INTO tb_tagihan VALUES("376","03","2022","C013","50000","LS","2022-03-06");
INSERT INTO tb_tagihan VALUES("377","03","2022","C014","50000","LS","2022-03-06");
INSERT INTO tb_tagihan VALUES("378","03","2022","C015","150000","LS","2022-03-04");
INSERT INTO tb_tagihan VALUES("379","03","2022","C016","80000","LS","2022-03-01");
INSERT INTO tb_tagihan VALUES("380","03","2022","C017","100000","LS","2022-03-05");
INSERT INTO tb_tagihan VALUES("381","03","2022","C018","100000","LS","2022-03-05");
INSERT INTO tb_tagihan VALUES("382","03","2022","C019","50000","LS","2022-03-09");
INSERT INTO tb_tagihan VALUES("383","03","2022","C020","80000","LS","2022-03-11");
INSERT INTO tb_tagihan VALUES("384","03","2022","C021","100000","LS","2022-03-05");
INSERT INTO tb_tagihan VALUES("385","03","2022","C022","80000","LS","2022-03-04");
INSERT INTO tb_tagihan VALUES("386","04","2022","C001","140000","LS","2022-04-07");
INSERT INTO tb_tagihan VALUES("387","04","2022","C002","80000","LS","2022-04-08");
INSERT INTO tb_tagihan VALUES("388","04","2022","C003","50000","LS","2022-04-09");
INSERT INTO tb_tagihan VALUES("389","04","2022","C004","50000","LS","2022-04-16");
INSERT INTO tb_tagihan VALUES("390","04","2022","C005","50000","LS","2022-04-13");
INSERT INTO tb_tagihan VALUES("392","04","2022","C007","300000","LS","2022-04-09");
INSERT INTO tb_tagihan VALUES("393","04","2022","C008","100000","LS","2022-04-11");
INSERT INTO tb_tagihan VALUES("394","04","2022","C009","100000","LS","2022-04-07");
INSERT INTO tb_tagihan VALUES("395","04","2022","C010","100000","LS","2022-04-07");
INSERT INTO tb_tagihan VALUES("397","04","2022","C012","50000","LS","2022-04-04");
INSERT INTO tb_tagihan VALUES("398","04","2022","C013","50000","LS","2022-04-10");
INSERT INTO tb_tagihan VALUES("399","04","2022","C014","50000","LS","2022-04-06");
INSERT INTO tb_tagihan VALUES("400","04","2022","C015","150000","LS","2022-04-04");
INSERT INTO tb_tagihan VALUES("401","04","2022","C016","80000","LS","2022-04-04");
INSERT INTO tb_tagihan VALUES("402","04","2022","C017","100000","LS","2022-04-06");
INSERT INTO tb_tagihan VALUES("403","04","2022","C018","100000","LS","2022-04-05");
INSERT INTO tb_tagihan VALUES("404","04","2022","C019","50000","LS","2022-04-07");
INSERT INTO tb_tagihan VALUES("405","04","2022","C020","80000","LS","2022-04-08");
INSERT INTO tb_tagihan VALUES("406","04","2022","C021","100000","LS","2022-04-08");
INSERT INTO tb_tagihan VALUES("407","04","2022","C022","80000","LS","2022-04-08");
INSERT INTO tb_tagihan VALUES("408","05","2022","C001","140000","LS","2022-05-06");
INSERT INTO tb_tagihan VALUES("409","05","2022","C002","80000","LS","2022-05-09");
INSERT INTO tb_tagihan VALUES("410","05","2022","C003","50000","LS","2022-05-03");
INSERT INTO tb_tagihan VALUES("411","05","2022","C004","50000","LS","2022-05-15");
INSERT INTO tb_tagihan VALUES("412","05","2022","C005","50000","LS","2022-05-16");
INSERT INTO tb_tagihan VALUES("414","05","2022","C007","300000","LS","2022-05-09");
INSERT INTO tb_tagihan VALUES("415","05","2022","C008","100000","LS","2022-05-12");
INSERT INTO tb_tagihan VALUES("416","05","2022","C009","100000","LS","2022-05-09");
INSERT INTO tb_tagihan VALUES("417","05","2022","C010","100000","LS","2022-05-09");
INSERT INTO tb_tagihan VALUES("419","05","2022","C012","50000","LS","2022-05-03");
INSERT INTO tb_tagihan VALUES("420","05","2022","C013","50000","LS","2022-05-09");
INSERT INTO tb_tagihan VALUES("421","05","2022","C014","50000","LS","2022-05-06");
INSERT INTO tb_tagihan VALUES("422","05","2022","C015","150000","LS","2022-05-03");
INSERT INTO tb_tagihan VALUES("423","05","2022","C016","80000","LS","2022-05-03");
INSERT INTO tb_tagihan VALUES("424","05","2022","C017","100000","LS","2022-05-06");
INSERT INTO tb_tagihan VALUES("425","05","2022","C018","100000","LS","2022-05-05");
INSERT INTO tb_tagihan VALUES("427","05","2022","C020","80000","LS","2022-05-09");
INSERT INTO tb_tagihan VALUES("428","05","2022","C021","100000","LS","2022-05-05");
INSERT INTO tb_tagihan VALUES("429","05","2022","C022","80000","LS","2022-05-06");
INSERT INTO tb_tagihan VALUES("430","06","2022","C001","140000","LS","2022-06-10");
INSERT INTO tb_tagihan VALUES("431","06","2022","C002","80000","LS","2022-06-10");
INSERT INTO tb_tagihan VALUES("432","06","2022","C003","50000","LS","2022-06-04");
INSERT INTO tb_tagihan VALUES("433","06","2022","C004","50000","LS","2022-06-16");
INSERT INTO tb_tagihan VALUES("434","06","2022","C005","50000","LS","2022-06-16");
INSERT INTO tb_tagihan VALUES("436","06","2022","C007","300000","LS","2022-06-07");
INSERT INTO tb_tagihan VALUES("437","06","2022","C008","100000","LS","2022-06-09");
INSERT INTO tb_tagihan VALUES("438","06","2022","C009","100000","LS","2022-06-06");
INSERT INTO tb_tagihan VALUES("439","06","2022","C010","100000","LS","2022-06-06");
INSERT INTO tb_tagihan VALUES("441","06","2022","C012","50000","LS","2022-06-01");
INSERT INTO tb_tagihan VALUES("442","06","2022","C013","50000","LS","2022-06-09");
INSERT INTO tb_tagihan VALUES("443","06","2022","C014","50000","LS","2022-06-07");
INSERT INTO tb_tagihan VALUES("444","06","2022","C015","150000","LS","2022-06-06");
INSERT INTO tb_tagihan VALUES("445","06","2022","C016","80000","LS","2022-06-01");
INSERT INTO tb_tagihan VALUES("446","06","2022","C017","100000","LS","2022-06-06");
INSERT INTO tb_tagihan VALUES("447","06","2022","C018","100000","LS","2022-06-05");
INSERT INTO tb_tagihan VALUES("449","06","2022","C020","80000","LS","2022-06-09");
INSERT INTO tb_tagihan VALUES("450","06","2022","C021","100000","LS","2022-06-05");
INSERT INTO tb_tagihan VALUES("451","06","2022","C022","80000","LS","2022-06-09");
INSERT INTO tb_tagihan VALUES("452","07","2022","C001","140000","LS","2022-07-08");
INSERT INTO tb_tagihan VALUES("453","07","2022","C002","80000","LS","2022-07-10");
INSERT INTO tb_tagihan VALUES("454","07","2022","C003","50000","LS","2022-07-06");
INSERT INTO tb_tagihan VALUES("455","07","2022","C004","50000","LS","2022-07-16");
INSERT INTO tb_tagihan VALUES("456","07","2022","C005","50000","LS","2022-07-15");
INSERT INTO tb_tagihan VALUES("458","07","2022","C007","300000","LS","2022-07-09");
INSERT INTO tb_tagihan VALUES("459","07","2022","C008","100000","LS","2022-07-12");
INSERT INTO tb_tagihan VALUES("460","07","2022","C009","100000","LS","2022-07-05");
INSERT INTO tb_tagihan VALUES("461","07","2022","C010","100000","LS","2022-07-05");
INSERT INTO tb_tagihan VALUES("463","07","2022","C012","50000","LS","2022-07-03");
INSERT INTO tb_tagihan VALUES("464","07","2022","C013","50000","LS","2022-07-10");
INSERT INTO tb_tagihan VALUES("465","07","2022","C014","50000","LS","2022-07-07");
INSERT INTO tb_tagihan VALUES("466","07","2022","C015","150000","LS","2022-07-06");
INSERT INTO tb_tagihan VALUES("467","07","2022","C016","80000","LS","2022-07-03");
INSERT INTO tb_tagihan VALUES("469","07","2022","C018","100000","LS","2022-07-05");
INSERT INTO tb_tagihan VALUES("471","07","2022","C020","80000","LS","2022-07-09");
INSERT INTO tb_tagihan VALUES("472","07","2022","C021","100000","LS","2022-07-07");
INSERT INTO tb_tagihan VALUES("473","07","2022","C022","80000","LS","2022-07-09");



CREATE TABLE `tb_tagihan_lain` (
  `id_tagihan_lain` varchar(11) NOT NULL,
  `id_pelanggan` varchar(6) NOT NULL,
  `tagihan` int(11) NOT NULL,
  `status` char(6) NOT NULL,
  `tgl_bayar` date NOT NULL,
  `keterangan` varchar(255) NOT NULL,
  PRIMARY KEY (`id_tagihan_lain`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO tb_tagihan_lain VALUES("L002","C003","150000","LS","2021-08-13","Access Point tp-link  indoor");
INSERT INTO tb_tagihan_lain VALUES("L003","C004","200000","LS","2021-10-17","Pasang tambahan penguat sinyal / Access Point tp-link  outdoor bekas");
INSERT INTO tb_tagihan_lain VALUES("L004","C020","790000","LS","2021-08-09","Pemasangan baru wifi, free kabel lan 10m dan bulanan pertama 80k");
INSERT INTO tb_tagihan_lain VALUES("L005","C021","800000","LS","2021-09-12","Pasang baru wifi.. Alat TP-Link, Tenda F3, Kabel LAN 26 meter, & Pipa besi 3/4 dim");
INSERT INTO tb_tagihan_lain VALUES("L006","C022","20000","LS","2021-10-05","membantu jasa pemasangan wifi baru");
INSERT INTO tb_tagihan_lain VALUES("L007","C012","600000","LS","2021-10-02","Pembayaran iuran bulanan wifi dalam jangka setahun sampai bulan September 2022");
INSERT INTO tb_tagihan_lain VALUES("L008","C016","320000","LS","2021-10-29","Bayar bulanan hotspot kassandrawifi 4 bulan - sampai bulan maret");
INSERT INTO tb_tagihan_lain VALUES("L009","C007","1500000","LS","2021-12-28","Pemasangan baru wifi.. ( Kabel FO 500m, Router Tenda 1, Converter FO to LAN 2, Claim FO 6, Claim Kabel 1, Connector FO 2, Instalasi Wifi )");
INSERT INTO tb_tagihan_lain VALUES("L010","C016","320000","LS","2022-01-31","Bayar bulanan hotspot kassandrawifi 4 bulan - sampai bulan Juli");

