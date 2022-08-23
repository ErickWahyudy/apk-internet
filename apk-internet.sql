-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 30 Jul 2021 pada 04.41
-- Versi server: 10.4.19-MariaDB
-- Versi PHP: 7.3.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `apk-internet`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_bulan`
--

CREATE TABLE `tb_bulan` (
  `id_bulan` varchar(2) NOT NULL,
  `bulan` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_bulan`
--

INSERT INTO `tb_bulan` (`id_bulan`, `bulan`) VALUES
('01', 'Januari'),
('02', 'Februari'),
('03', 'Maret'),
('04', 'April'),
('05', 'Mei'),
('06', 'Juni'),
('07', 'Juli'),
('08', 'Agustus'),
('09', 'September'),
('10', 'Oktober'),
('11', 'November'),
('12', 'Desember');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_informasi`
--

CREATE TABLE `tb_informasi` (
  `id_informasi` varchar(11) NOT NULL,
  `informasi` varchar(255) NOT NULL,
  `file` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_informasi`
--

INSERT INTO `tb_informasi` (`id_informasi`, `informasi`, `file`) VALUES
('I001', 'HALAMAN INI MASIH DALAM PENGEMBANGAN', 'Mohon sekiranya bersabar'),
('I002', 'Untuk informasi lebih lanjut ', '081456141227');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_paket`
--

CREATE TABLE `tb_paket` (
  `id_paket` varchar(6) NOT NULL,
  `paket` varchar(20) NOT NULL,
  `tarif` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_paket`
--

INSERT INTO `tb_paket` (`id_paket`, `paket`, `tarif`) VALUES
('P001', '1 Mb', 50000),
('P002', '1.8 Mb', 80000),
('P003', '2 Mb', 100000),
('P004', '3 Mb', 150000),
('P005', '4 Mb', 200000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pelanggan`
--

CREATE TABLE `tb_pelanggan` (
  `id_pelanggan` varchar(6) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `alamat` text NOT NULL,
  `no_hp` varchar(15) NOT NULL,
  `terdaftar_mulai` date NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(15) NOT NULL,
  `level` varchar(5) NOT NULL DEFAULT 'PLG',
  `id_paket` varchar(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_pelanggan`
--

INSERT INTO `tb_pelanggan` (`id_pelanggan`, `nama`, `alamat`, `no_hp`, `terdaftar_mulai`, `email`, `password`, `level`, `id_paket`) VALUES
('C001', 'Trianto N.A', 'Etan Serut, Jalen Balong Ponorogo', '6285730799367', '2019-10-10', 'trianto@rtrw.net', '9491', 'PLG', 'P003'),
('C002', 'Mada Al Fatih', 'Etan Serut, Jalen Balong Ponorogo', '886984059823', '2019-12-10', 'mada@rtrw.net', '3728', 'PLG', 'P002'),
('C003', 'Mas Nanang R', 'Jalen Balong Ponorogo', '6281555435593', '2020-01-10', 'nanang@rtrw.net', '8075', 'PLG', 'P001'),
('C004', 'Mas Hadi Susanto', 'Jalen Balong Ponorogo', '6285704789290', '2020-02-15', 'sus@rtrw.net', '1636', 'PLG', 'P001'),
('C005', 'Mbak Nurjannah', 'Jalen Balong Ponorogo', '6282301545816', '2020-02-15', 'nurjannah@rtrw.net', '1579', 'PLG', 'P001'),
('C006', 'Pak Pairin', 'Etan Serut, Jalen Balong Ponorogo', '6289510608125', '2020-04-02', 'pairin@rtrw.net', '3106', 'PLG', 'P001'),
('C007', 'Anggi ( Pak Mad )', 'Etan Serut, Jalen Balong Ponorogo', '628563654361', '2020-04-03', 'anggi@rtrw.net', '1272', 'PLG', 'P001'),
('C008', 'Mas Herry Pewe', 'Etan Serut, Jalen Balong Ponorogo', '6287758247146', '2020-05-01', 'herry@rtrw.net', '9583', 'PLG', 'P003'),
('C009', 'Kevin Handoko', 'Kulon Serut, Jalen Balong Ponorogo', '6289666471656', '2020-05-17', 'kevin@rtrw.net', '8563', 'PLG', 'P004'),
('C010', 'Pak Miskan', 'Tenggong, Jalen Balong Ponorogo', '6289666471656', '2020-06-02', 'miskan@rtrw.net', '9180', 'PLG', 'P003'),
('C011', 'Pak Panijan', 'Irmas, Jalen Balong Ponorogo', '6281237487606', '2020-06-18', 'panijan@rtrw.net', '5521', 'PLG', 'P003'),
('C012', 'Mas Edy Sutrisno', 'Etan Serut, Jalen Balong Ponorogo', '6289695233930', '2020-07-07', 'edysutrisno@rtrw.net', '4053', 'PLG', 'P004'),
('C013', 'Kartiko', 'Etan Serut, Jalen Balong Ponorogo', '6285608639832', '2020-07-10', 'kartiko@rtrw.net', '8030', 'PLG', 'P001'),
('C014', 'Sherly', 'Etan Serut, Jalen Balong Ponorogo', '6281259346337', '2020-08-01', 'sherly@rtrw.net', '4303', 'PLG', 'P001'),
('C015', 'Emma', 'Tenggong, Jalen Balong Ponorogo', '6281337759260', '2020-08-03', 'emma@rtrw.net', '8598', 'PLG', 'P004'),
('C016', 'Agung S', 'Irmas, Jalen Balong Ponorogo', '6285854207261', '2020-10-11', 'agung@rtrw.net', '8291', 'PLG', 'P002'),
('C017', 'Pak Jono', 'Kulon Serut, Jalen Balong Ponorogo', '6282316236826', '2020-10-20', 'jono@rtrw.net', '5234', 'PLG', 'P003'),
('C018', 'Pak No', 'Jalen Balong Ponorogo', '6282334015022', '2020-12-01', 'fikran@rtrw.net', '3096', 'PLG', 'P003'),
('C019', 'Mas Danang', 'Buh Dung, Jalen Balong Ponorogo', '6285645761988', '2020-12-01', 'danang@rtrw.net', '5163', 'PLG', 'P002'),
('C020', 'Mas Suyanto ( Keto )', 'Etan Serut, Jalen Balong Ponorogo', '999999999999', '2021-05-01', 'suyanto@rtrw.net', '4661', 'PLG', 'P001');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pengeluaran`
--

CREATE TABLE `tb_pengeluaran` (
  `id_pengeluaran` varchar(11) NOT NULL,
  `jenis_pengeluaran` varchar(255) NOT NULL,
  `biaya_pengeluaran` varchar(100) NOT NULL,
  `tanggal` date NOT NULL,
  `keterangan` enum('Belum Saya Bayar','LUNAS') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_pengeluaran`
--

INSERT INTO `tb_pengeluaran` (`id_pengeluaran`, `jenis_pengeluaran`, `biaya_pengeluaran`, `tanggal`, `keterangan`) VALUES
('S001', 'Bulanan Indihome 30Mb', '385000', '2021-04-10', 'LUNAS'),
('S002', 'Bulanan Indihome 40Mb', '410000', '2021-05-10', 'LUNAS'),
('S003', 'Bulanan Indihome 40Mb', '410000', '2021-06-07', 'LUNAS'),
('S004', 'Bulanan Indihome 40Mb', '400000', '2021-07-14', 'LUNAS'),
('S005', 'Beli AP TP-Link CPE220 + Kabel Lan', '610000', '2021-07-16', 'LUNAS');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pengguna`
--

CREATE TABLE `tb_pengguna` (
  `id_pengguna` int(11) NOT NULL,
  `nama_pengguna` varchar(20) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `level` varchar(50) NOT NULL DEFAULT 'Administrator'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_pengguna`
--

INSERT INTO `tb_pengguna` (`id_pengguna`, `nama_pengguna`, `username`, `password`, `level`) VALUES
(2, 'Erik Wahyudi', 'admin', 'admin@erik', 'Administrator');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_tagihan`
--

CREATE TABLE `tb_tagihan` (
  `id_tagihan` int(11) NOT NULL,
  `bulan` varchar(3) NOT NULL,
  `tahun` year(4) NOT NULL,
  `id_pelanggan` varchar(6) NOT NULL,
  `tagihan` int(11) NOT NULL,
  `status` enum('BL','LS') NOT NULL,
  `tgl_bayar` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_tagihan`
--

INSERT INTO `tb_tagihan` (`id_tagihan`, `bulan`, `tahun`, `id_pelanggan`, `tagihan`, `status`, `tgl_bayar`) VALUES
(20, '04', 2021, 'C002', 80000, 'LS', '2021-04-10'),
(21, '04', 2021, 'C003', 50000, 'LS', '2021-04-04'),
(22, '04', 2021, 'C004', 50000, 'LS', '2021-04-16'),
(23, '04', 2021, 'C005', 50000, 'LS', '2021-04-16'),
(24, '04', 2021, 'C006', 50000, 'LS', '2021-04-06'),
(25, '04', 2021, 'C007', 50000, 'LS', '2021-04-08'),
(26, '04', 2021, 'C008', 100000, 'LS', '2021-04-09'),
(27, '04', 2021, 'C009', 100000, 'LS', '2021-04-04'),
(28, '04', 2021, 'C010', 100000, 'LS', '2021-04-04'),
(29, '04', 2021, 'C011', 100000, 'LS', '2021-04-10'),
(30, '04', 2021, 'C012', 150000, 'LS', '2021-04-05'),
(31, '04', 2021, 'C013', 50000, 'LS', '2021-04-08'),
(32, '04', 2021, 'C014', 50000, 'LS', '2021-04-10'),
(33, '04', 2021, 'C015', 150000, 'LS', '2021-04-04'),
(34, '04', 2021, 'C016', 80000, 'LS', '2021-04-05'),
(35, '04', 2021, 'C017', 100000, 'LS', '2021-04-06'),
(36, '04', 2021, 'C018', 100000, 'LS', '2021-04-06'),
(93, '04', 2021, 'C019', 80000, 'LS', '2021-04-09'),
(95, '05', 2021, 'C002', 80000, 'LS', '2021-05-09'),
(96, '05', 2021, 'C003', 50000, 'LS', '2021-05-11'),
(97, '05', 2021, 'C004', 50000, 'LS', '2021-05-15'),
(98, '05', 2021, 'C005', 50000, 'LS', '2021-05-15'),
(99, '05', 2021, 'C006', 50000, 'LS', '2021-05-10'),
(100, '05', 2021, 'C007', 50000, 'LS', '2021-05-10'),
(101, '05', 2021, 'C008', 100000, 'LS', '2021-05-15'),
(102, '05', 2021, 'C009', 100000, 'LS', '2021-05-04'),
(103, '05', 2021, 'C010', 100000, 'LS', '2021-05-04'),
(104, '05', 2021, 'C011', 100000, 'LS', '2021-05-10'),
(105, '05', 2021, 'C012', 150000, 'LS', '2021-05-06'),
(106, '05', 2021, 'C013', 50000, 'LS', '2021-05-10'),
(107, '05', 2021, 'C014', 50000, 'LS', '2021-05-11'),
(108, '05', 2021, 'C015', 150000, 'LS', '2021-05-06'),
(109, '05', 2021, 'C016', 80000, 'LS', '2021-05-06'),
(110, '05', 2021, 'C017', 100000, 'LS', '2021-05-06'),
(111, '05', 2021, 'C018', 100000, 'LS', '2021-05-07'),
(112, '05', 2021, 'C019', 80000, 'LS', '2021-04-30'),
(113, '05', 2021, 'C020', 50000, 'LS', '2021-05-10'),
(134, '06', 2021, 'C001', 100000, 'LS', '2021-06-07'),
(135, '06', 2021, 'C002', 80000, 'LS', '2021-06-06'),
(136, '06', 2021, 'C003', 50000, 'LS', '2021-06-07'),
(137, '06', 2021, 'C004', 50000, 'LS', '2021-06-07'),
(138, '06', 2021, 'C005', 50000, 'LS', '2021-06-10'),
(139, '06', 2021, 'C006', 50000, 'LS', '2021-06-07'),
(140, '06', 2021, 'C007', 50000, 'LS', '2021-06-06'),
(141, '06', 2021, 'C008', 100000, 'LS', '2021-06-07'),
(142, '06', 2021, 'C009', 150000, 'LS', '2021-06-03'),
(143, '06', 2021, 'C010', 100000, 'LS', '2021-06-03'),
(144, '06', 2021, 'C011', 100000, 'LS', '2021-06-09'),
(145, '06', 2021, 'C012', 150000, 'LS', '2021-06-06'),
(146, '06', 2021, 'C013', 50000, 'LS', '2021-06-08'),
(147, '06', 2021, 'C014', 50000, 'LS', '2021-06-09'),
(148, '06', 2021, 'C015', 150000, 'LS', '2021-06-03'),
(149, '06', 2021, 'C016', 80000, 'LS', '2021-06-06'),
(150, '06', 2021, 'C017', 100000, 'LS', '2021-06-07'),
(151, '06', 2021, 'C018', 100000, 'LS', '2021-06-10'),
(153, '06', 2021, 'C020', 50000, 'LS', '2021-06-08'),
(154, '07', 2021, 'C001', 100000, 'LS', '2021-07-10'),
(155, '07', 2021, 'C002', 80000, 'LS', '2021-07-08'),
(156, '07', 2021, 'C003', 50000, 'LS', '2021-07-07'),
(157, '07', 2021, 'C004', 50000, 'LS', '2021-07-13'),
(158, '07', 2021, 'C005', 50000, 'LS', '2021-07-14'),
(159, '07', 2021, 'C006', 50000, 'LS', '2021-07-06'),
(160, '07', 2021, 'C007', 50000, 'LS', '2021-07-07'),
(161, '07', 2021, 'C008', 100000, 'LS', '2021-07-09'),
(162, '07', 2021, 'C009', 150000, 'LS', '2021-07-08'),
(163, '07', 2021, 'C010', 100000, 'LS', '2021-07-08'),
(164, '07', 2021, 'C011', 100000, 'LS', '2021-07-06'),
(165, '07', 2021, 'C012', 150000, 'LS', '2021-07-03'),
(166, '07', 2021, 'C013', 50000, 'LS', '2021-07-12'),
(167, '07', 2021, 'C014', 50000, 'LS', '2021-07-10'),
(168, '07', 2021, 'C015', 150000, 'LS', '2021-07-02'),
(169, '07', 2021, 'C016', 80000, 'LS', '2021-07-03'),
(170, '07', 2021, 'C017', 100000, 'LS', '2021-07-10'),
(171, '07', 2021, 'C018', 100000, 'LS', '2021-07-10'),
(172, '07', 2021, 'C019', 80000, 'LS', '2021-07-10'),
(173, '07', 2021, 'C020', 50000, 'LS', '2021-07-10');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tb_bulan`
--
ALTER TABLE `tb_bulan`
  ADD PRIMARY KEY (`id_bulan`);

--
-- Indeks untuk tabel `tb_informasi`
--
ALTER TABLE `tb_informasi`
  ADD PRIMARY KEY (`id_informasi`);

--
-- Indeks untuk tabel `tb_paket`
--
ALTER TABLE `tb_paket`
  ADD PRIMARY KEY (`id_paket`);

--
-- Indeks untuk tabel `tb_pelanggan`
--
ALTER TABLE `tb_pelanggan`
  ADD PRIMARY KEY (`id_pelanggan`),
  ADD KEY `id_kamar` (`id_paket`);

--
-- Indeks untuk tabel `tb_pengeluaran`
--
ALTER TABLE `tb_pengeluaran`
  ADD PRIMARY KEY (`id_pengeluaran`);

--
-- Indeks untuk tabel `tb_pengguna`
--
ALTER TABLE `tb_pengguna`
  ADD PRIMARY KEY (`id_pengguna`);

--
-- Indeks untuk tabel `tb_tagihan`
--
ALTER TABLE `tb_tagihan`
  ADD PRIMARY KEY (`id_tagihan`),
  ADD KEY `id_penghuni` (`id_pelanggan`),
  ADD KEY `bulan` (`bulan`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tb_pengguna`
--
ALTER TABLE `tb_pengguna`
  MODIFY `id_pengguna` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tb_tagihan`
--
ALTER TABLE `tb_tagihan`
  MODIFY `id_tagihan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=174;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `tb_pelanggan`
--
ALTER TABLE `tb_pelanggan`
  ADD CONSTRAINT `tb_pelanggan_ibfk_1` FOREIGN KEY (`id_paket`) REFERENCES `tb_paket` (`id_paket`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tb_tagihan`
--
ALTER TABLE `tb_tagihan`
  ADD CONSTRAINT `tb_tagihan_ibfk_1` FOREIGN KEY (`id_pelanggan`) REFERENCES `tb_pelanggan` (`id_pelanggan`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_tagihan_ibfk_2` FOREIGN KEY (`bulan`) REFERENCES `tb_bulan` (`id_bulan`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
