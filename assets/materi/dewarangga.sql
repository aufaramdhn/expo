-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 14 Okt 2022 pada 15.20
-- Versi server: 10.4.22-MariaDB
-- Versi PHP: 8.0.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dewarangga`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `product`
--

CREATE TABLE `product` (
  `id_product` int(11) NOT NULL,
  `paket` varchar(50) NOT NULL,
  `harga` varchar(20) NOT NULL,
  `halaman` varchar(100) NOT NULL,
  `domain` varchar(100) NOT NULL,
  `penyimpanan` varchar(100) NOT NULL,
  `free_ssl` varchar(100) NOT NULL,
  `revisi` varchar(100) NOT NULL,
  `wordpress` varchar(100) NOT NULL,
  `whatsapp` varchar(100) NOT NULL,
  `responsif` varchar(100) NOT NULL,
  `penayangan` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `perpanjangan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `product`
--

INSERT INTO `product` (`id_product`, `paket`, `harga`, `halaman`, `domain`, `penyimpanan`, `free_ssl`, `revisi`, `wordpress`, `whatsapp`, `responsif`, `penayangan`, `email`, `perpanjangan`) VALUES
(8, 'BRONZE', '200.000', '1 ', '.site', '1 Gb (Kuota 15 Foto)', 'SSL', '1x', 'Wordpress', 'WhatsApp', 'Ringan And Responsif', 'Tayang 24 Jam Tanpa Down', '5', '100.000'),
(10, 'SILVER', '350.000', '2', '.online', '1,5 Gb (Kuota 20 Foto)', 'SSL', '2x', 'Wordpress', 'WhatsApp', 'Ringan And Responsif', 'Tayang 24 Jam Tanpa Down', '10', '200.000'),
(11, 'GOLD', '400.000', '3', '.xyz', '2 Gb (Kuota 30 Foto)', 'SSL', '3x', 'Wordpress', 'WhatsApp', 'Ringan And Responsif', 'Tayang 24 Jam Tanpa Down', '15', '300.000'),
(12, 'PLATINUM', '550.000', '4', '.org', '2,5 Gb (Kuota 40 Foto)', 'SSL', '4x', 'Wordpress', 'WhatsApp', 'Ringan And Responsif', 'Tayang 24 Jam Tanpa Down', '20', '400.000'),
(14, 'DIAMOND', '750.000', '6', '.net', '3 Gb (Kuota 50 Foto)', 'SSL', '6x', 'Wordpress', 'WhatsApp', 'Ringan And Responsif', 'Tayang 24 Jam Tanpa Down', '25', '400.000'),
(15, 'CROWN', '875.000', '7', '.co', '3,5 Gb (Kuota 60 Foto)', 'SSL', '7x', 'Wordpress', 'WhatsApp', 'Ringan And Responsif', 'Tayang 24 Jam Tanpa Down', '30', '500.000');

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_product` int(11) NOT NULL,
  `pembayaran` varchar(100) NOT NULL,
  `wkt` datetime DEFAULT NULL,
  `pesan` longtext NOT NULL,
  `bukti` longtext NOT NULL,
  `materi` longtext NOT NULL,
  `status` varchar(100) NOT NULL DEFAULT 'Pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `id_user`, `id_product`, `pembayaran`, `wkt`, `pesan`, `bukti`, `materi`, `status`) VALUES
(80, 35, 10, 'No.rekening : 982301010 (BCA)', '2022-08-19 19:43:42', '123', '1153033.jpg', 'dewarangga.sql', 'accept'),
(88, 30, 10, 'No.rekening : 982301010 (BRI)', '2022-09-16 09:50:21', 'ASD', 'a7002e59320c8993afec09e3ec6b4c7d.jpg', 'pkn.txt', 'reject'),
(89, 41, 15, 'No.rekening : 982301010 (BCA)', '2022-10-14 20:14:27', 'Buat dengan sebaik mungkin', 'Screenshot (66).png', 'Cadwal · SlidesCarnival.pptx', 'accept');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `no_tlp` varchar(20) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `level` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `nama`, `no_tlp`, `username`, `password`, `level`) VALUES
(30, 'Adi Saputra', '0981234123', 'adi', 'adi', 'user'),
(31, 'Aufa Ramadhan', '01231423321', 'aufa', 'aufa', 'admin'),
(33, 'Destuty', '09812341223', 'tuty', 'tuty', 'user'),
(34, 'Albert Enstein', '01234198234', 'albert', 'albert', 'user'),
(40, 'hai', '9837412384', 'hai', 'hai', 'user'),
(41, 'Mirza', '098123412', 'mirzaen', '123', 'user');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id_product`);

--
-- Indeks untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_product` (`id_product`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `product`
--
ALTER TABLE `product`
  MODIFY `id_product` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=90;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;