-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 01 Jul 2021 pada 16.31
-- Versi server: 10.4.17-MariaDB
-- Versi PHP: 8.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ims_db`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `cp`
--

CREATE TABLE `cp` (
  `id_cp` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `hp` int(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `id_vendor` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `customer`
--

CREATE TABLE `customer` (
  `id_customer` int(11) NOT NULL,
  `nama_customer` varchar(50) NOT NULL,
  `alamat_customer` varchar(50) NOT NULL,
  `telepon` int(50) NOT NULL,
  `fax` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `customer_cp` varchar(50) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `hp` int(50) NOT NULL,
  `catatan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `inventory`
--

CREATE TABLE `inventory` (
  `id_inventory` int(11) NOT NULL,
  `lokasi_gudang` varchar(50) NOT NULL,
  `lokasi_rak` varchar(50) NOT NULL,
  `lokasi_barisRak` varchar(50) NOT NULL,
  `lokasi_kolomRak` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `produk`
--

CREATE TABLE `produk` (
  `id_produk` int(11) NOT NULL,
  `kode_produk` varchar(50) NOT NULL,
  `no_seri` varchar(50) NOT NULL,
  `nama_produk` varchar(50) NOT NULL,
  `photo_produk` varchar(50) NOT NULL,
  `jenis_produk` varchar(50) NOT NULL,
  `kategori_produk` varchar(50) NOT NULL,
  `barcode` varchar(50) NOT NULL,
  `harga` int(50) NOT NULL,
  `modal` int(50) NOT NULL,
  `dimensi` varchar(50) NOT NULL,
  `berat` varchar(50) NOT NULL,
  `unit_pembelian` varchar(50) NOT NULL,
  `lokasi_gudang` varchar(50) NOT NULL,
  `lokasi_rak` varchar(50) NOT NULL,
  `lokasi_barisRak` varchar(50) NOT NULL,
  `lokasi_kolomRak` varchar(50) NOT NULL,
  `qty` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `produk`
--

INSERT INTO `produk` (`id_produk`, `kode_produk`, `no_seri`, `nama_produk`, `photo_produk`, `jenis_produk`, `kategori_produk`, `barcode`, `harga`, `modal`, `dimensi`, `berat`, `unit_pembelian`, `lokasi_gudang`, `lokasi_rak`, `lokasi_barisRak`, `lokasi_kolomRak`, `qty`) VALUES
(5, 'gfs', '089123', 'aibon', 'jpg', 'lem', 'lem', '23498', 8000, 80000, '3', '3kg', '23', 'a', '1', '1', '2', 10),
(6, 'gfsa', '089123', 'aibon', 'jpg', 'lem', 'lem', '23498', 8000, 80000, '3', '3kg', '23', 'a', '1', '1', '2', 10),
(7, 'gfs', '089123', 'aibon', 'jpg', 'lem', 'lem', '23498', 8000, 80000, '3', '3kg', '23', 'a', '1', '1', '2', 10),
(8, 'gfs', '089123', 'aibon', 'jpg', 'lem', 'lem', '23498', 8000, 80000, '3', '3kg', '23', 'a', '1', '1', '2', 10),
(9, 'gfs', '089123', 'aibon', 'jpg', 'lem', 'lem', '23498', 8000, 80000, '3', '3kg', '23', 'a', '1', '1', '2', 10),
(10, 'gfs', '089123', 'aibon', 'jpg', 'lem', 'lem', '23498', 8000, 80000, '3', '3kg', '23', 'a', '1', '1', '2', 10),
(12, 'gfs', '089123', 'aibon', 'jpg', 'lem', 'lem', '23498', 8000, 80000, '3', '3kg', '23', 'a', '1', '1', '2', 10),
(13, 'gfs', '089123', 'aibon', 'jpg', 'lem', 'lem', '23498', 8000, 80000, '3', '3kg', '23', 'a', '1', '1', '2', 10),
(14, 'gfs', '089123', 'aibon', 'jpg', 'lem', 'lem', '23498', 8000, 80000, '3', '3kg', '23', 'a', '1', '1', '2', 10),
(15, 'gfs', '089123', 'aibon', 'jpg', 'lem', 'lem', '23498', 8000, 80000, '3', '5kg', '23', 'a', '1', '1', '2', 10),
(17, 'gfs', '089123', 'aibon', 'jpg', 'lem', 'lem', '23498', 8000, 80000, '3', '3kg', '23', 'a', '1', '1', '2', 10),
(18, 'gfs', '089123', 'aibon', 'jpg', 'lem', 'lem', '23498', 8000, 80000, '3', '3kg', '23', 'a', '1', '1', '2', 10),
(19, 'gfs', '089123', 'aibon', 'jpg', 'lem', 'lem', '23498', 8000, 80000, '3', '3kg', '23', 'a', '1', '1', '2', 10),
(20, 'gfs', '089123', 'aibon', 'jpg', 'lem', 'lem', '23498', 8000, 80000, '3', '3kg', '23', 'a', '1', '1', '2', 10),
(21, 'gfs', '089123', 'aibon', 'jpg', 'lem', 'lem', '23498', 8000, 80000, '3', '3kg', '23', 'a', '1', '1', '2', 10),
(22, 'gfs', '089123', 'aibon', 'jpg', 'lem', 'lem', '23498', 8000, 80000, '3', '3kg', '23', 'a', '1', '1', '2', 10),
(23, 'gfs', '089123', 'aibon', 'jpg', 'lem', 'lem', '23498', 8000, 80000, '3', '3kg', '23', 'a', '1', '1', '2', 10),
(24, 'gfs', '089123', 'aibon', 'jpg', 'lem', 'lem', '23498', 8000, 80000, '3', '3kg', '23', 'a', '1', '1', '2', 10),
(25, 'gfs', '089123', 'aibon', 'jpg', 'lem', 'lem', '23498', 8000, 80000, '3', '3kg', '23', 'a', '1', '1', '2', 10),
(26, 'gfs', '089123', 'aibon', 'jpg', 'lem', 'lem', '23498', 8000, 80000, '3', '3kg', '23', 'a', '1', '1', '2', 10),
(27, 'gfs', '089123', 'aibon', 'jpg', 'lem', 'lem', '23498', 8000, 80000, '3', '3kg', '23', 'a', '1', '1', '2', 10),
(28, 'gfs', '089123', 'aibon', 'jpg', 'lem', 'lem', '23498', 8000, 80000, '3', '3kg', '23', 'a', '1', '1', '2', 10),
(29, 'gfs', '089123', 'aibon', 'jpg', 'lem', 'lem', '23498', 8000, 80000, '3', '3kg', '23', 'a', '1', '1', '2', 10),
(30, 'gfs', '089123', 'aibon', 'jpg', 'lem', 'lem', '23498', 8000, 80000, '3', '3kg', '23', 'a', '1', '1', '2', 10),
(31, 'gfs', '089123', 'aibon', 'jpg', 'lem', 'lem', '23498', 8000, 80000, '3', '3kg', '23', 'a', '1', '1', '2', 10),
(32, 'gfs', '089123', 'aibon', 'jpg', 'lem', 'lem', '23498', 8000, 80000, '3', '3kg', '23', 'a', '1', '1', '2', 10),
(33, 'gfs', '089123', 'aibon', 'jpg', 'lem', 'lem', '23498', 8000, 80000, '3', '3kg', '23', 'a', '1', '1', '2', 10),
(34, 'gfs', '089123', 'aibon', 'jpg', 'lem', 'lem', '23498', 8000, 80000, '3', '3kg', '23', 'a', '1', '1', '2', 10),
(35, 'gfs', '089123', 'aibon', 'jpg', 'lem', 'lem', '23498', 8000, 80000, '3', '3kg', '23', 'a', '1', '1', '2', 10),
(36, 'gfs', '089123', 'aibon', 'jpg', 'lem', 'lem', '23498', 8000, 80000, '3', '3kg', '23', 'a', '1', '1', '2', 10),
(37, 'gfs', '089123', 'aibon', 'jpg', 'lem', 'lem', '23498', 8000, 80000, '3', '3kg', '23', 'a', '1', '1', '2', 10),
(38, 'gfs', '089123', 'aibon', 'jpg', 'lem', 'lem', '23498', 8000, 80000, '3', '3kg', '23', 'a', '1', '1', '2', 10),
(39, 'gfs', '089123', 'aibon', 'jpg', 'lem', 'lem', '23498', 8000, 80000, '3', '3kg', '23', 'a', '1', '1', '2', 10),
(40, 'gfs', '089123', 'aibon', 'jpg', 'lem', 'lem', '23498', 8000, 80000, '3', '3kg', '23', 'a', '1', '1', '2', 10),
(41, 'gfs', '089123', 'aibon', 'jpg', 'lem', 'lem', '23498', 8000, 80000, '3', '3kg', '23', 'a', '1', '1', '2', 10),
(42, 'gfs', '089123', 'aibon', 'jpg', 'lem', 'lem', '23498', 8000, 80000, '3', '3kg', '23', 'a', '1', '1', '2', 10),
(43, 'gfs', '089123', 'aibon', 'jpg', 'lem', 'lem', '23498', 8000, 80000, '3', '3kg', '23', 'a', '1', '1', '2', 10),
(44, 'gfs', '089123', 'aibon', 'jpg', 'lem', 'lem', '23498', 8000, 80000, '3', '3kg', '23', 'a', '1', '1', '2', 10),
(45, 'gfs', '089123', 'aibon', 'jpg', 'lem', 'lem', '23498', 8000, 80000, '3', '3kg', '23', 'a', '1', '1', '2', 10);

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hak_akses` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `photo`, `hak_akses`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'dany', '', '', 'admin@gmail.com', NULL, '$2y$10$V.Uzf2qw/e.NOkdDB2V0s.1PEXld8gw5neSAsRAalce5GT2wqNfue', NULL, '2021-06-26 06:33:12', '2021-06-26 06:33:12');

-- --------------------------------------------------------

--
-- Struktur dari tabel `vendor`
--

CREATE TABLE `vendor` (
  `id_vendor` int(11) NOT NULL,
  `nama_vendor` varchar(50) NOT NULL,
  `alamat_vendor` varchar(50) NOT NULL,
  `telp` int(50) NOT NULL,
  `fax` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `cp`
--
ALTER TABLE `cp`
  ADD PRIMARY KEY (`id_cp`),
  ADD KEY `id_vendor` (`id_vendor`);

--
-- Indeks untuk tabel `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id_customer`);

--
-- Indeks untuk tabel `inventory`
--
ALTER TABLE `inventory`
  ADD PRIMARY KEY (`id_inventory`);

--
-- Indeks untuk tabel `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indeks untuk tabel `vendor`
--
ALTER TABLE `vendor`
  ADD PRIMARY KEY (`id_vendor`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `cp`
--
ALTER TABLE `cp`
  MODIFY `id_cp` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `customer`
--
ALTER TABLE `customer`
  MODIFY `id_customer` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `inventory`
--
ALTER TABLE `inventory`
  MODIFY `id_inventory` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `produk`
--
ALTER TABLE `produk`
  MODIFY `id_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `vendor`
--
ALTER TABLE `vendor`
  MODIFY `id_vendor` int(11) NOT NULL AUTO_INCREMENT;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `cp`
--
ALTER TABLE `cp`
  ADD CONSTRAINT `cp_ibfk_1` FOREIGN KEY (`id_vendor`) REFERENCES `vendor` (`id_vendor`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
