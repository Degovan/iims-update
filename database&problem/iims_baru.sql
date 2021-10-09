-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 09 Okt 2021 pada 07.33
-- Versi server: 10.3.31-MariaDB-cll-lve
-- Versi PHP: 7.3.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `iims`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `cp`
--

CREATE TABLE `cp` (
  `id_cp` int(11) NOT NULL,
  `nama` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hp` int(11) NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_vendor` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `customer`
--

CREATE TABLE `customer` (
  `id_customer` int(11) NOT NULL,
  `nama_customer` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat_customer` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telepon` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fax` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_cp` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hp` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `catatan` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `customer`
--

INSERT INTO `customer` (`id_customer`, `nama_customer`, `alamat_customer`, `telepon`, `fax`, `email`, `customer_cp`, `nama`, `hp`, `catatan`) VALUES
(2, 'dany putra', 'kp. kapudang', '9890131089', '13123123', 'putradany@gmail.com', '0989131298', 'putra', '082398912', 'selamat');

-- --------------------------------------------------------

--
-- Struktur dari tabel `deliveri_order`
--

CREATE TABLE `deliveri_order` (
  `id` int(11) NOT NULL,
  `no_do` varchar(50) DEFAULT NULL,
  `tanggal_do` datetime DEFAULT NULL,
  `customer_id` int(11) DEFAULT NULL,
  `produk_id` int(11) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `catatan` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `flag` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `deliveri_order`
--

INSERT INTO `deliveri_order` (`id`, `no_do`, `tanggal_do`, `customer_id`, `produk_id`, `created_by`, `catatan`, `created_at`, `updated_at`, `flag`) VALUES
(3, '12345', '2021-09-25 15:01:00', 1, 1, 2, 'baru', '2021-09-25 08:01:38', '2021-09-26 12:45:14', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `inventory`
--

CREATE TABLE `inventory` (
  `id_inventory` int(11) NOT NULL,
  `lokasi_gudang` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lokasi_rak` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lokasi_barisRak` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lokasi_kolomRak` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `inventory`
--

INSERT INTO `inventory` (`id_inventory`, `lokasi_gudang`, `lokasi_rak`, `lokasi_barisRak`, `lokasi_kolomRak`) VALUES
(3, 'OMM', '1', '1', 'AA'),
(4, 'OMM', '2', '2', 'A'),
(5, 'OMM', '1', '1', 'B');

-- --------------------------------------------------------

--
-- Struktur dari tabel `itr`
--

CREATE TABLE `itr` (
  `id` int(11) NOT NULL,
  `no_itr` varchar(50) DEFAULT NULL,
  `id_pr` int(11) DEFAULT NULL,
  `tanggal_itr` datetime DEFAULT NULL,
  `qty` int(11) DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL,
  `flag` int(11) NOT NULL DEFAULT 0,
  `valid_itr` varchar(255) DEFAULT NULL,
  `id_validator` int(11) DEFAULT NULL,
  `id_pemeriksa` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `itr`
--

INSERT INTO `itr` (`id`, `no_itr`, `id_pr`, `tanggal_itr`, `qty`, `status`, `flag`, `valid_itr`, `id_validator`, `id_pemeriksa`, `created_at`, `updated_at`) VALUES
(1, '123', 1, '2021-09-14 13:12:00', 23, NULL, 1, NULL, 2, NULL, '2021-09-21 06:12:40', NULL),
(2, '123', 2, '2021-09-14 19:41:00', 232, NULL, 1, 'valid_1;valid_2;valid_3;valid_4;valid_5', 2, NULL, '2021-09-26 12:44:00', '2021-09-26 05:44:12'),
(3, '34534534', 3, '2021-10-13 11:24:00', 23, NULL, 0, NULL, 2, NULL, '2021-10-05 04:24:10', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(19, '2014_10_12_000000_create_users_table', 1),
(20, '2014_10_12_100000_create_password_resets_table', 1),
(21, '2019_08_19_000000_create_failed_jobs_table', 1),
(22, '2021_07_14_081933_create_vendor_table', 1),
(23, '2021_07_14_082126_create_cp_table', 1),
(24, '2021_07_14_082932_create_customer_table', 1),
(25, '2021_07_14_083140_create_inventory_table', 1),
(26, '2021_07_14_083524_create_produk_table', 1),
(27, '2021_07_14_101520_create_permission_tables', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\User', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `otr`
--

CREATE TABLE `otr` (
  `id` int(11) NOT NULL,
  `no_otr` varchar(50) DEFAULT NULL,
  `id_do` int(11) DEFAULT NULL,
  `validated_by` int(11) DEFAULT NULL,
  `flag` int(11) DEFAULT 0,
  `valid_otr` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `otr`
--

INSERT INTO `otr` (`id`, `no_otr`, `id_do`, `validated_by`, `flag`, `valid_otr`, `created_at`, `updated_at`) VALUES
(2, '12345', 3, 2, 0, NULL, '2021-09-25 08:52:16', NULL),
(3, '12345', 3, 2, 1, 'valid_1;valid_2;valid_3;valid_4;valid_5;valid_6;valid_7', '2021-09-26 12:44:48', '2021-09-26 12:45:14');

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'read-product', 'web', '2021-09-20 23:06:58', '2021-09-20 23:06:58'),
(2, 'read-vendor', 'web', '2021-09-20 23:06:58', '2021-09-20 23:06:58'),
(3, 'read-user', 'web', '2021-09-20 23:06:58', '2021-09-20 23:06:58'),
(4, 'read-inventory', 'web', '2021-09-20 23:06:59', '2021-09-20 23:06:59'),
(5, 'read-customer', 'web', '2021-09-20 23:06:59', '2021-09-20 23:06:59'),
(6, 'read-role', 'web', '2021-09-20 23:06:59', '2021-09-20 23:06:59'),
(7, 'read-permission', 'web', '2021-09-20 23:06:59', '2021-09-20 23:06:59'),
(8, 'read-pr', 'web', '2021-09-20 23:06:59', '2021-09-20 23:06:59'),
(9, 'read-itr', 'web', '2021-09-20 23:06:59', '2021-09-20 23:06:59'),
(10, 'read-otr', 'web', '2021-09-20 23:06:59', '2021-09-20 23:06:59'),
(11, 'read-do', 'web', '2021-09-20 23:06:59', '2021-09-20 23:06:59');

-- --------------------------------------------------------

--
-- Struktur dari tabel `produk`
--

CREATE TABLE `produk` (
  `id_produk` int(11) NOT NULL,
  `id_inventory` int(11) NOT NULL,
  `kode_produk` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_seri` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_produk` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo_produk` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis_produk` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kategori_produk` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `barcode` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `harga` int(11) NOT NULL,
  `modal` int(11) NOT NULL,
  `dimensi` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `berat` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `unit_pembelian` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lokasi_gudang` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `qty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `produk`
--

INSERT INTO `produk` (`id_produk`, `id_inventory`, `kode_produk`, `no_seri`, `nama_produk`, `photo_produk`, `jenis_produk`, `kategori_produk`, `barcode`, `harga`, `modal`, `dimensi`, `berat`, `unit_pembelian`, `lokasi_gudang`, `qty`) VALUES
(1, 0, 'gfs', '089123', 'aibon', 'jpg', 'lem', 'lem', '23498', 8000, 80000, '3', '3kg', '23', 'a', 10),
(2, 0, 'gfs', '089123', 'aibon', 'jpg', 'lem', 'lem', '23498', 8000, 80000, '3', '3kg', '23', 'a', 10),
(3, 0, 'gfs', '089123', 'aibon', 'jpg', 'lem', 'lem', '23498', 8000, 80000, '3', '3kg', '23', 'a', 10),
(4, 0, 'gfs', '089123', 'aibon', 'jpg', 'lem', 'lem', '23498', 8000, 80000, '3', '3kg', '23', 'a', 10),
(5, 0, 'gfs', '089123', 'aibon', 'jpg', 'lem', 'lem', '23498', 8000, 80000, '3', '3kg', '23', 'a', 10),
(6, 0, 'gfs', '089123', 'aibon', 'jpg', 'lem', 'lem', '23498', 8000, 80000, '3', '3kg', '23', 'a', 10),
(7, 0, 'gfs', '089123', 'aibon', 'jpg', 'lem', 'lem', '23498', 8000, 80000, '3', '3kg', '23', 'a', 10),
(8, 0, 'gfs', '089123', 'aibon', 'jpg', 'lem', 'lem', '23498', 8000, 80000, '3', '3kg', '23', 'a', 10),
(9, 0, 'gfs', '089123', 'aibon', 'jpg', 'lem', 'lem', '23498', 8000, 80000, '3', '3kg', '23', 'a', 10),
(10, 0, 'gfs', '089123', 'aibon', 'jpg', 'lem', 'lem', '23498', 8000, 80000, '3', '3kg', '23', 'a', 10),
(11, 0, 'gfs', '089123', 'aibon', 'jpg', 'lem', 'lem', '23498', 8000, 80000, '3', '3kg', '23', 'a', 10),
(12, 0, 'gfs', '089123', 'aibon', 'jpg', 'lem', 'lem', '23498', 8000, 80000, '3', '3kg', '23', 'a', 10),
(13, 0, 'gfs', '089123', 'aibon', 'jpg', 'lem', 'lem', '23498', 8000, 80000, '3', '3kg', '23', 'a', 10),
(14, 0, 'gfs', '089123', 'aibon', 'jpg', 'lem', 'lem', '23498', 8000, 80000, '3', '3kg', '23', 'a', 10),
(15, 0, 'gfs', '089123', 'aibon', 'jpg', 'lem', 'lem', '23498', 8000, 80000, '3', '3kg', '23', 'a', 10),
(16, 0, 'gfs', '089123', 'aibon', 'jpg', 'lem', 'lem', '23498', 8000, 80000, '3', '3kg', '23', 'a', 10),
(17, 0, 'gfs', '089123', 'aibon', 'jpg', 'lem', 'lem', '23498', 8000, 80000, '3', '3kg', '23', 'a', 10),
(18, 0, 'gfs', '089123', 'aibon', 'jpg', 'lem', 'lem', '23498', 8000, 80000, '3', '3kg', '23', 'a', 10),
(19, 0, 'gfs', '089123', 'aibon', 'jpg', 'lem', 'lem', '23498', 8000, 80000, '3', '3kg', '23', 'a', 10),
(20, 0, 'gfs', '089123', 'aibon', 'jpg', 'lem', 'lem', '23498', 8000, 80000, '3', '3kg', '23', 'a', 10),
(21, 0, 'gfs', '089123', 'aibon', 'jpg', 'lem', 'lem', '23498', 8000, 80000, '3', '3kg', '23', 'a', 10),
(22, 0, 'gfs', '089123', 'aibon', 'jpg', 'lem', 'lem', '23498', 8000, 80000, '3', '3kg', '23', 'a', 10),
(23, 0, 'gfs', '089123', 'aibon', 'jpg', 'lem', 'lem', '23498', 8000, 80000, '3', '3kg', '23', 'a', 10),
(24, 0, 'gfs', '089123', 'aibon', 'jpg', 'lem', 'lem', '23498', 8000, 80000, '3', '3kg', '23', 'a', 10),
(25, 0, 'gfs', '089123', 'aibon', 'jpg', 'lem', 'lem', '23498', 8000, 80000, '3', '3kg', '23', 'a', 10),
(26, 0, 'gfs', '089123', 'aibon', 'jpg', 'lem', 'lem', '23498', 8000, 80000, '3', '3kg', '23', 'a', 10),
(27, 0, 'gfs', '089123', 'aibon', 'jpg', 'lem', 'lem', '23498', 8000, 80000, '3', '3kg', '23', 'a', 10),
(28, 0, 'gfs', '089123', 'aibon', 'jpg', 'lem', 'lem', '23498', 8000, 80000, '3', '3kg', '23', 'a', 10),
(29, 0, 'gfs', '089123', 'aibon', 'jpg', 'lem', 'lem', '23498', 8000, 80000, '3', '3kg', '23', 'a', 10),
(30, 0, 'gfs', '089123', 'aibon', 'jpg', 'lem', 'lem', '23498', 8000, 80000, '3', '3kg', '23', 'a', 10),
(31, 0, 'gfs', '089123', 'aibon', 'jpg', 'lem', 'lem', '23498', 8000, 80000, '3', '3kg', '23', 'a', 10),
(32, 0, 'gfs', '089123', 'aibon', 'jpg', 'lem', 'lem', '23498', 8000, 80000, '3', '3kg', '23', 'a', 10),
(33, 0, 'gfs', '089123', 'aibon', 'jpg', 'lem', 'lem', '23498', 8000, 80000, '3', '3kg', '23', 'a', 10),
(34, 0, 'gfs', '089123', 'aibon', 'jpg', 'lem', 'lem', '23498', 8000, 80000, '3', '3kg', '23', 'a', 10),
(35, 0, 'gfs', '089123', 'aibon', 'jpg', 'lem', 'lem', '23498', 8000, 80000, '3', '3kg', '23', 'a', 10),
(36, 0, 'gfs', '089123', 'aibon', 'jpg', 'lem', 'lem', '23498', 8000, 80000, '3', '3kg', '23', 'a', 10),
(37, 0, 'gfs', '089123', 'aibon', '$data->photo_produk', 'lem', 'lem', '23498', 8000, 80000, '3', '3kg', '23', 'OMM/1/1/AA', 10),
(39, 2, 'a', '090', 'aibon', '1633262465.1.jpg', 'bbb', 'b', '2342232', 8000, 10000, '23', '5kg', 'a', 'OMM/1/1/AA', 232),
(45, 0, 'CR000011', 'BRAZ109409', 'Komputer', '$data->photo_produk', 'Sparepart', 'Mesin Part', '1fd23232v', 12000, 10000, '100X100X100', '5kg', 'Set', 'a', 120);

-- --------------------------------------------------------

--
-- Struktur dari tabel `purchase_request`
--

CREATE TABLE `purchase_request` (
  `id` int(11) NOT NULL,
  `no_pr` varchar(50) DEFAULT NULL,
  `tanggal` timestamp NULL DEFAULT NULL,
  `vendor_id` int(11) DEFAULT NULL,
  `produk_id` int(11) DEFAULT NULL,
  `qty` int(11) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `created_by` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `purchase_request`
--

INSERT INTO `purchase_request` (`id`, `no_pr`, `tanggal`, `vendor_id`, `produk_id`, `qty`, `status`, `created_by`, `created_at`, `updated_at`) VALUES
(2, '123456', '2021-09-15 12:40:00', 1, 1, 232, 1, 2, '2021-09-26 12:40:47', '2021-09-26 12:44:12'),
(3, '098923496', '2021-10-05 04:20:00', 1, 3, 23, 0, 2, '2021-10-05 04:20:42', '2021-10-05 04:23:47');

-- --------------------------------------------------------

--
-- Struktur dari tabel `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'web', '2021-09-20 23:06:58', '2021-09-20 23:06:58'),
(3, 'kepala gudang 1', 'web', '2021-09-22 23:34:20', '2021-10-04 21:19:52');

-- --------------------------------------------------------

--
-- Struktur dari tabel `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(1, 1),
(2, 1),
(3, 1),
(4, 1),
(5, 1),
(6, 1),
(7, 1),
(8, 1),
(9, 1),
(10, 1),
(11, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
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

INSERT INTO `users` (`id`, `name`, `photo`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(2, 'admin@gmail.com', NULL, 'admin@gmail.com', NULL, '$2y$10$eX8oQ3kujZpUHphLg4Ca1eH6x9OJdm/mr6hu7jyKT70Xf/cwBk9aK', NULL, '2021-09-20 23:07:53', '2021-09-20 23:07:53');

-- --------------------------------------------------------

--
-- Struktur dari tabel `vendor`
--

CREATE TABLE `vendor` (
  `id_vendor` int(11) NOT NULL,
  `nama_vendor` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat_vendor` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telp` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fax` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `vendor`
--

INSERT INTO `vendor` (`id_vendor`, `nama_vendor`, `alamat_vendor`, `telp`, `fax`) VALUES
(1, 'b', 'tangerang', '0213123198', '021398912312');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `cp`
--
ALTER TABLE `cp`
  ADD PRIMARY KEY (`id_cp`),
  ADD KEY `cp_id_vendor_foreign` (`id_vendor`);

--
-- Indeks untuk tabel `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id_customer`);

--
-- Indeks untuk tabel `deliveri_order`
--
ALTER TABLE `deliveri_order`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `inventory`
--
ALTER TABLE `inventory`
  ADD PRIMARY KEY (`id_inventory`);

--
-- Indeks untuk tabel `itr`
--
ALTER TABLE `itr`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indeks untuk tabel `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indeks untuk tabel `otr`
--
ALTER TABLE `otr`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indeks untuk tabel `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indeks untuk tabel `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indeks untuk tabel `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`);

--
-- Indeks untuk tabel `purchase_request`
--
ALTER TABLE `purchase_request`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indeks untuk tabel `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indeks untuk tabel `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

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
  MODIFY `id_customer` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `deliveri_order`
--
ALTER TABLE `deliveri_order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `inventory`
--
ALTER TABLE `inventory`
  MODIFY `id_inventory` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `itr`
--
ALTER TABLE `itr`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT untuk tabel `otr`
--
ALTER TABLE `otr`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `produk`
--
ALTER TABLE `produk`
  MODIFY `id_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT untuk tabel `purchase_request`
--
ALTER TABLE `purchase_request`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `vendor`
--
ALTER TABLE `vendor`
  MODIFY `id_vendor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `cp`
--
ALTER TABLE `cp`
  ADD CONSTRAINT `cp_id_vendor_foreign` FOREIGN KEY (`id_vendor`) REFERENCES `vendor` (`id_vendor`);

--
-- Ketidakleluasaan untuk tabel `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
