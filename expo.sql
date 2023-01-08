-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 08 Jan 2023 pada 12.21
-- Versi server: 10.4.25-MariaDB
-- Versi PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `expo`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id_pembayaran` int(11) NOT NULL,
  `norek` int(11) NOT NULL,
  `bank` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pembayaran`
--

INSERT INTO `pembayaran` (`id_pembayaran`, `norek`, `bank`) VALUES
(1, 982301010, 'BCA'),
(2, 982301011, 'BRI'),
(3, 982301012, 'BNI'),
(4, 982301013, 'MANDIRI'),
(5, 871283736, 'OVO'),
(6, 871283737, 'DANA');

-- --------------------------------------------------------

--
-- Struktur dari tabel `product`
--

CREATE TABLE `product` (
  `id_product` int(11) NOT NULL,
  `paket` varchar(50) NOT NULL,
  `harga` int(11) NOT NULL,
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
(8, 'BRONZE', 200000, '1 ', '.site', '1 Gb (Kuota 15 Foto)', 'SSL', '1x', 'Wordpress', 'WhatsApp', 'Ringan And Responsif', 'Tayang 24 Jam Tanpa Down', '5', '100.000'),
(10, 'SILVER', 350000, '2', '.online', '1,5 Gb (Kuota 20 Foto)', 'SSL', '2x', 'Wordpress', 'WhatsApp', 'Ringan And Responsif', 'Tayang 24 Jam Tanpa Down', '10', '200.000'),
(11, 'GOLD', 400000, '3', '.xyz', '2 Gb (Kuota 30 Foto)', 'SSL', '3x', 'Wordpress', 'WhatsApp', 'Ringan And Responsif', 'Tayang 24 Jam Tanpa Down', '15', '300.000'),
(12, 'PLATINUM', 550000, '4', '.org', '2,5 Gb (Kuota 40 Foto)', 'SSL', '4x', 'Wordpress', 'WhatsApp', 'Ringan And Responsif', 'Tayang 24 Jam Tanpa Down', '20', '400.000'),
(14, 'DIAMOND', 750000, '6', '.net', '3 Gb (Kuota 50 Foto)', 'SSL', '6x', 'Wordpress', 'WhatsApp', 'Ringan And Responsif', 'Tayang 24 Jam Tanpa Down', '25', '500.000'),
(15, 'CROWN', 875000, '7', '.co', '3,5 Gb (Kuota 60 Foto)', 'SSL', '7x', 'Wordpress', 'WhatsApp', 'Ringan And Responsif', 'Tayang 24 Jam Tanpa Down', '30', '600.000');

-- --------------------------------------------------------

--
-- Struktur dari tabel `testimoni`
--

CREATE TABLE `testimoni` (
  `id_testimoni` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `pesan` varchar(100) NOT NULL,
  `tgl_pesan` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `testimoni`
--

INSERT INTO `testimoni` (`id_testimoni`, `id_user`, `pesan`, `tgl_pesan`) VALUES
(2, 1, 'Testing', '2023-01-03 08:05:39');

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_product` int(11) NOT NULL,
  `id_pembayaran` int(11) NOT NULL,
  `wkt` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `pesan` longtext NOT NULL,
  `bukti` longtext NOT NULL,
  `materi` longtext NOT NULL,
  `status` varchar(100) NOT NULL DEFAULT 'Pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `id_user`, `id_product`, `id_pembayaran`, `wkt`, `pesan`, `bukti`, `materi`, `status`) VALUES
(1, 1, 10, 1, '2023-01-03 07:59:57', '123', '1.png', 'LAPORAN PKL.docx', 'pending'),
(2, 1, 11, 1, '2023-01-03 08:01:38', '123', '1.png', 'LAPORAN PKL.docx', 'accept'),
(3, 1, 12, 1, '2023-01-03 08:01:42', '123', '2.png', 'LAPORAN PKL.docx', 'reject'),
(4, 1, 15, 1, '2023-01-03 08:01:50', '123', '12as.jpg', 'LAPORAN PKL.docx', 'done');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `no_tlp` varchar(13) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `img` longtext NOT NULL,
  `level` varchar(255) NOT NULL,
  `tgl_daftar` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `nama`, `email`, `no_tlp`, `username`, `password`, `img`, `level`, `tgl_daftar`) VALUES
(1, 'Adi Saputra', 'adi@gmail.com', '6282112594075', 'adi', '123', 'NULL', 'user', '2023-01-03 08:03:32'),
(2, 'Albert Enstein', 'albert@gmail.com', '6289687167886', 'albert', '123', 'NULL', 'user', '2023-01-03 04:16:58'),
(3, 'Aufa Ramadhan', 'aufa@gmail.com', '6281398057408', 'aufa', '123', 'NULL', 'admin', '2023-01-03 04:17:37');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id_pembayaran`);

--
-- Indeks untuk tabel `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id_product`);

--
-- Indeks untuk tabel `testimoni`
--
ALTER TABLE `testimoni`
  ADD PRIMARY KEY (`id_testimoni`),
  ADD KEY `id_user` (`id_user`);

--
-- Indeks untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_product` (`id_product`),
  ADD KEY `id_pembayaran` (`id_pembayaran`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id_pembayaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `product`
--
ALTER TABLE `product`
  MODIFY `id_product` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `testimoni`
--
ALTER TABLE `testimoni`
  MODIFY `id_testimoni` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
