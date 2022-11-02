-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 02 Nov 2022 pada 17.30
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
-- Struktur dari tabel `tb_tagihan_konfirmasi`
--

CREATE TABLE `tb_tagihan_konfirmasi` (
  `id_konfirmasi` varchar(50) NOT NULL,
  `id_pelanggan` varchar(100) NOT NULL,
  `id_tagihan` varchar(50) NOT NULL,
  `bukti_bayar` text NOT NULL,
  `tgl_konfirmasi` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_tagihan_konfirmasi`
--

INSERT INTO `tb_tagihan_konfirmasi` (`id_konfirmasi`, `id_pelanggan`, `id_tagihan`, `bukti_bayar`, `tgl_konfirmasi`) VALUES
('K001', 'C001', '662', 'Trianto N.A_2022-11-02_DSC_1510.JPG', '2022-11-02'),
('K002', 'C009', '669', 'Suyoso_2022-11-02_DSC_1510.JPG', '2022-11-02'),
('K003', 'C018', '676', 'Pak No_2022-11-02_DSC_1515.JPG', '2022-11-02');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tb_tagihan_konfirmasi`
--
ALTER TABLE `tb_tagihan_konfirmasi`
  ADD PRIMARY KEY (`id_konfirmasi`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
