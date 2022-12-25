

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

INSERT INTO tb_email VALUES("E001","KASSANDRAWIFI","kassandramikrotik@gmail.com","Selamat hari raya idul fitri 1443 H.","<p>Jika ada kata terselip dusta, ada sikap membekas lara, dan langkah menggores luka, semoga masih ada maaf yang tersisa. Mohon maaf lahir dan batin.</p>

<p>Jika jemari tak sempat berjabat. Jika raga tak bisa bersua. Bila ada kata membekas luka. Semoga pintu maaf masih terbuka. Selamat Idul Fitri 1443 H. Mohon maaf lahir dan batin.</p>

<p>Ketika jarak menghalangi untuk bersalaman, ketika tubuh tak mampu untuk merengkuh. Maka, hanya kata-kata yang bisa dikirimkan untuk mewakili permintaan maaf. Selamat Hari Raya Idul Fitri 1443 H. Mohon maaf lahir batin.</p>
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




CREATE TABLE `tb_informasi` (
  `id_informasi` varchar(11) NOT NULL,
  `informasi` varchar(255) NOT NULL,
  `berkas` varchar(255) NOT NULL,
  PRIMARY KEY (`id_informasi`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO tb_informasi VALUES("I003","LAYANAN HOTSPOT WIFI UNLIMITED 24 NON STOP TANPA LEMOT GANN","");
INSERT INTO tb_informasi VALUES("I004","Cara pembayaran kassandrawifi","Linkpembayaran.txt");



CREATE TABLE `tb_paket` (
  `id_paket` varchar(6) NOT NULL,
  `paket` varchar(20) NOT NULL,
  `tarif` int(11) NOT NULL,
  PRIMARY KEY (`id_paket`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO tb_paket VALUES("P001","1 Mb","50000");
INSERT INTO tb_paket VALUES("P002","1.8 Mb","80000");
INSERT INTO tb_paket VALUES("P003","2 Mb","100000");
INSERT INTO tb_paket VALUES("P004","3 Mb","150000");
INSERT INTO tb_paket VALUES("P005","4 Mb","200000");
INSERT INTO tb_paket VALUES("P006","5 Mb","250000");



CREATE TABLE `tb_pelanggan` (
  `id_pelanggan` varchar(6) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `alamat` text NOT NULL,
  `no_hp` varchar(15) NOT NULL,
  `terdaftar_mulai` date NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `level` varchar(5) NOT NULL DEFAULT 'PLG',
  `id_paket` varchar(20) NOT NULL,
  `status_plg` enum('Aktif','Tidak Aktif') NOT NULL,
  PRIMARY KEY (`id_pelanggan`),
  KEY `id_kamar` (`id_paket`),
  CONSTRAINT `tb_pelanggan_ibfk_1` FOREIGN KEY (`id_paket`) REFERENCES `tb_paket` (`id_paket`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO tb_pelanggan VALUES("C001","Trianto N.A","Etan Serut, Jalen Balong Ponorogo","6285730799367","2019-10-10","erikwahyudy@gmail.com","9491","PLG","P003","Aktif");
INSERT INTO tb_pelanggan VALUES("C002","Mada Al Fatih","Etan Serut, Jalen Balong Ponorogo","886984059823","2019-12-10","crewpanserzero@gmail.com","3728","PLG","P002","Aktif");
INSERT INTO tb_pelanggan VALUES("C003","Mas Nanang R","Jalen Balong Ponorogo","6281555435593","2020-01-10","erickwahyudy5@rtrw.net","8075","PLG","P001","Aktif");
INSERT INTO tb_pelanggan VALUES("C004","Mas Hadi Susanto","Jalen Balong Ponorogo","6285704789290","2020-02-15","sus@rtrw.net","1636","PLG","P001","Aktif");
INSERT INTO tb_pelanggan VALUES("C005","Mbak Nurjannah","Jalen Balong Ponorogo","6282301545816","2020-02-15","nurjannah@rtrw.net","1579","PLG","P001","Aktif");
INSERT INTO tb_pelanggan VALUES("C006","Pak Pairin","Etan Serut, Jalen Balong Ponorogo","6289510608125","2020-04-02","pairin@rtrw.net","3106","PLG","P001","Tidak Aktif");
INSERT INTO tb_pelanggan VALUES("C007","Anggi ( Pak Mad )","Etan Serut, Jalen Balong Ponorogo","628563654361","2020-04-03","anggi@rtrw.net","1272","PLG","P001","Aktif");
INSERT INTO tb_pelanggan VALUES("C008","Mas Herry Pewe","Etan Serut, Jalen Balong Ponorogo","6287758247146","2020-05-01","herry@rtrw.net","9583","PLG","P003","Aktif");
INSERT INTO tb_pelanggan VALUES("C009","Suyoso","Kulon Serut, Jalen Balong Ponorogo","6289666471656","2020-05-17","suyoso@rtrw.net","8563","PLG","P003","Aktif");
INSERT INTO tb_pelanggan VALUES("C010","Pak Miskan","Tenggong, Jalen Balong Ponorogo","6289666471656","2020-06-02","miskan@rtrw.net","9180","PLG","P003","Aktif");
INSERT INTO tb_pelanggan VALUES("C011","Pak Panijan","Irmas, Jalen Balong Ponorogo","6281237487606","2020-06-18","panijan@rtrw.net","5521","PLG","P003","Tidak Aktif");
INSERT INTO tb_pelanggan VALUES("C012","Mas Edy Sutrisno","Etan Serut, Jalen Balong Ponorogo","6289695233930","2020-07-07","edysutrisno@rtrw.net","4053","PLG","P004","Aktif");
INSERT INTO tb_pelanggan VALUES("C013","Kartiko","Etan Serut, Jalen Balong Ponorogo","6285608639832","2020-07-10","kartiko@rtrw.net","8030","PLG","P001","Aktif");
INSERT INTO tb_pelanggan VALUES("C014","Sherly","Etan Serut, Jalen Balong Ponorogo","6281259346337","2020-08-01","sherly@rtrw.net","4303","PLG","P001","Aktif");
INSERT INTO tb_pelanggan VALUES("C015","Emma","Tenggong, Jalen Balong Ponorogo","6281337759260","2020-08-03","emma@rtrw.net","8598","PLG","P004","Aktif");
INSERT INTO tb_pelanggan VALUES("C016","Agung S","Irmas, Jalen Balong Ponorogo","6285854207261","2020-10-11","agung@rtrw.net","8291","PLG","P002","Aktif");
INSERT INTO tb_pelanggan VALUES("C017","Pak Jono","Kulon Serut, Jalen Balong Ponorogo","6282316236826","2020-10-20","jono@rtrw.net","12345","PLG","P003","Tidak Aktif");
INSERT INTO tb_pelanggan VALUES("C018","Pak No","Jalen Balong Ponorogo","6282334015022","2020-12-01","fikran@rtrw.net","3096","PLG","P003","Aktif");
INSERT INTO tb_pelanggan VALUES("C020","Mas Suyanto ( Keto )","Etan Serut, Jalen Balong Ponorogo","999999999999","2021-05-01","suyanto@rtrw.net","4661","PLG","P001","Aktif");
INSERT INTO tb_pelanggan VALUES("C021","Erik wahyudi","Jalen balong ponorogo","6282225634392","2022-12-02","erickwahyudy@gmail.com","Erik","PLG","P006","Aktif");



CREATE TABLE `tb_pengeluaran` (
  `id_pengeluaran` varchar(11) NOT NULL,
  `jenis_pengeluaran` varchar(255) NOT NULL,
  `biaya_pengeluaran` varchar(100) NOT NULL,
  `tanggal` date NOT NULL,
  `tahun` year(4) NOT NULL,
  `keterangan` enum('Belum Saya Bayar','LUNAS') NOT NULL,
  PRIMARY KEY (`id_pengeluaran`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO tb_pengeluaran VALUES("S001","Bulanan Indihome 40Mb + BeatNet 20Mb","500000","2022-09-04","2022","LUNAS");
INSERT INTO tb_pengeluaran VALUES("S002","Bulanan Indihome","2000000","0000-00-00","2022","Belum Saya Bayar");



CREATE TABLE `tb_pengguna` (
  `id_pengguna` int(11) NOT NULL AUTO_INCREMENT,
  `nama_pengguna` varchar(20) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `level` varchar(50) NOT NULL DEFAULT 'Administrator',
  PRIMARY KEY (`id_pengguna`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

INSERT INTO tb_pengguna VALUES("2","Erik Wahyudi","admin@kassandra.com","erick05wahyudy","Administrator");



CREATE TABLE `tb_pesan` (
  `id_pesan` varchar(21) NOT NULL,
  `isi_pesan` varchar(255) NOT NULL,
  `no_hp` varchar(255) NOT NULL,
  PRIMARY KEY (`id_pesan`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO tb_pesan VALUES("WA001","assalamualaikum wr wb","6282225634392");



CREATE TABLE `tb_promo` (
  `id_promo` varchar(30) CHARACTER SET latin1 NOT NULL,
  `id_pelanggan` varchar(50) NOT NULL,
  `tgl_daftar` date NOT NULL,
  `status` enum('promo','tidak ada promo') NOT NULL,
  `biaya_promo` varchar(100) NOT NULL,
  `signature` text NOT NULL,
  `bukti_ktp` text NOT NULL,
  PRIMARY KEY (`id_promo`),
  KEY `id_pelanggan` (`id_pelanggan`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO tb_promo VALUES("Z001","","0000-00-00","promo","200000","","");



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
) ENGINE=InnoDB AUTO_INCREMENT=679 DEFAULT CHARSET=latin1;

INSERT INTO tb_tagihan VALUES("662","01","2022","C001","100000","BL","0000-00-00");
INSERT INTO tb_tagihan VALUES("663","01","2022","C002","80000","BL","0000-00-00");
INSERT INTO tb_tagihan VALUES("664","01","2022","C003","50000","BL","0000-00-00");
INSERT INTO tb_tagihan VALUES("665","01","2022","C004","50000","BL","0000-00-00");
INSERT INTO tb_tagihan VALUES("666","01","2022","C005","50000","BL","0000-00-00");
INSERT INTO tb_tagihan VALUES("667","01","2022","C007","50000","BL","0000-00-00");
INSERT INTO tb_tagihan VALUES("668","01","2022","C008","100000","BL","0000-00-00");
INSERT INTO tb_tagihan VALUES("669","01","2022","C009","100000","BL","0000-00-00");
INSERT INTO tb_tagihan VALUES("670","10","2022","C010","100000","LS","2022-10-02");
INSERT INTO tb_tagihan VALUES("671","01","2022","C012","150000","BL","0000-00-00");
INSERT INTO tb_tagihan VALUES("672","10","2022","C013","50000","LS","2022-10-05");
INSERT INTO tb_tagihan VALUES("673","01","2022","C014","50000","BL","0000-00-00");
INSERT INTO tb_tagihan VALUES("674","01","2022","C015","150000","BL","0000-00-00");
INSERT INTO tb_tagihan VALUES("675","01","2022","C016","80000","BL","0000-00-00");
INSERT INTO tb_tagihan VALUES("676","01","2022","C018","100000","BL","2022-11-25");
INSERT INTO tb_tagihan VALUES("677","01","2022","C020","50000","BL","0000-00-00");



CREATE TABLE `tb_tagihan_konfirmasi` (
  `id_konfirmasi` varchar(50) NOT NULL,
  `id_pelanggan` varchar(100) NOT NULL,
  `id_tagihan` varchar(50) NOT NULL,
  `bukti_bayar` text NOT NULL,
  `tgl_konfirmasi` date NOT NULL,
  PRIMARY KEY (`id_konfirmasi`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO tb_tagihan_konfirmasi VALUES("K001","C018","676","Pak No_0dFT79.jpg","2022-11-10");



CREATE TABLE `tb_tagihan_lain` (
  `id_tagihan_lain` varchar(11) NOT NULL,
  `id_pelanggan` varchar(6) NOT NULL,
  `tagihan` int(11) NOT NULL,
  `status` enum('BL','LS') NOT NULL,
  `tgl_bayar` date NOT NULL,
  `keterangan` varchar(255) NOT NULL,
  PRIMARY KEY (`id_tagihan_lain`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO tb_tagihan_lain VALUES("L002","C004","200000","LS","2021-10-16","tambah AP outdoor merk tp-link bekas");
INSERT INTO tb_tagihan_lain VALUES("L003","C001","400000","BL","0000-00-00","upgrade speed");
INSERT INTO tb_tagihan_lain VALUES("L004","C020","200000","BL","0000-00-00","Ganti Router");

