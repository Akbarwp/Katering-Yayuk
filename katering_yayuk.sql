-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 04, 2023 at 08:46 AM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `katering_yayuk`
--

-- --------------------------------------------------------

--
-- Table structure for table `alternatifs`
--

CREATE TABLE `alternatifs` (
  `id` varchar(10) NOT NULL,
  `id_paket` varchar(10) NOT NULL,
  `harga` varchar(100) NOT NULL,
  `jumlah_menu` varchar(100) NOT NULL,
  `popularitas` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `alternatifs`
--

INSERT INTO `alternatifs` (`id`, `id_paket`, `harga`, `jumlah_menu`, `popularitas`) VALUES
('A001', 'P001', 'Baik', 'Cukup', 'Baik'),
('A002', 'P002', 'Cukup', 'Cukup', 'Cukup'),
('A003', 'P003', 'Cukup', 'Baik', 'Kurang'),
('A004', 'P004', 'Kurang', 'Cukup', 'Baik'),
('A005', 'P005', 'Cukup', 'Kurang', 'Baik');

-- --------------------------------------------------------

--
-- Table structure for table `hasil_ahp`
--

CREATE TABLE `hasil_ahp` (
  `alternatif` varchar(10) NOT NULL,
  `harga` float NOT NULL,
  `jumlah_menu` float NOT NULL,
  `popularitas` float NOT NULL,
  `jumlah` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hasil_ahp`
--

INSERT INTO `hasil_ahp` (`alternatif`, `harga`, `jumlah_menu`, `popularitas`, `jumlah`) VALUES
('A001', 0.01, 0.066, 0.072, 0.148),
('A002', 0.03, 0.066, 0.145, 0.241),
('A003', 0.03, 0.033, 0.384, 0.447),
('A004', 0.06, 0.066, 0.072, 0.198),
('A005', 0.03, 0.199, 0.072, 0.301);

-- --------------------------------------------------------

--
-- Table structure for table `isi_paket`
--

CREATE TABLE `isi_paket` (
  `id` varchar(10) NOT NULL,
  `nasi` varchar(100) NOT NULL,
  `lauk_utama` varchar(100) NOT NULL,
  `lauk_pendamping1` varchar(100) NOT NULL,
  `lauk_pendamping2` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `isi_paket`
--

INSERT INTO `isi_paket` (`id`, `nasi`, `lauk_utama`, `lauk_pendamping1`, `lauk_pendamping2`) VALUES
('P001', 'Nasi Putih', 'Ayam Goreng', 'Mi Kuning', 'Sambel Goreng Kentang Ati'),
('P002', 'Nasi Putih', 'Krengsengan Daging', 'Mi Kuning', 'Kerupuk Udang'),
('P003', 'Nasi Kuning', 'Ayam Goreng', 'Perkedel', 'Kering Tempe'),
('P004', 'Nasi Kuning', 'Balado Telur', 'Sambel Goreng Kentang Ati', 'Kerupuk Udang'),
('P005', 'Nasi Kuning', 'Balado Telur', 'Mi Kuning', 'Perkedel');

-- --------------------------------------------------------

--
-- Table structure for table `kriteria`
--

CREATE TABLE `kriteria` (
  `id` varchar(10) NOT NULL,
  `nama` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kriteria`
--

INSERT INTO `kriteria` (`id`, `nama`) VALUES
('K001', 'Harga'),
('K002', 'Jumlah Menu'),
('K003', 'Popularitas');

-- --------------------------------------------------------

--
-- Table structure for table `kriteria_nilai`
--

CREATE TABLE `kriteria_nilai` (
  `id` varchar(10) NOT NULL,
  `id_kriteria_dari` varchar(10) NOT NULL,
  `id_kriteria_tujuan` varchar(10) NOT NULL,
  `nilai` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kriteria_nilai`
--

INSERT INTO `kriteria_nilai` (`id`, `id_kriteria_dari`, `id_kriteria_tujuan`, `nilai`) VALUES
('KN001', 'K001', 'K001', 1),
('KN002', 'K001', 'K002', 3),
('KN003', 'K001', 'K003', 5),
('KN004', 'K002', 'K001', 0.333),
('KN005', 'K002', 'K002', 1),
('KN006', 'K002', 'K003', 3),
('KN007', 'K003', 'K001', 0.2),
('KN008', 'K003', 'K002', 0.6),
('KN009', 'K003', 'K003', 1);

-- --------------------------------------------------------

--
-- Table structure for table `kriteria_nilai_jumlah`
--

CREATE TABLE `kriteria_nilai_jumlah` (
  `kriteria` varchar(10) NOT NULL,
  `jumlah` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kriteria_nilai_jumlah`
--

INSERT INTO `kriteria_nilai_jumlah` (`kriteria`, `jumlah`) VALUES
('K001', 9),
('K002', 4.333),
('K003', 1.8);

-- --------------------------------------------------------

--
-- Table structure for table `kriteria_prioritas`
--

CREATE TABLE `kriteria_prioritas` (
  `id` varchar(10) NOT NULL,
  `id_kriteria` varchar(10) NOT NULL,
  `prioritas` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kriteria_prioritas`
--

INSERT INTO `kriteria_prioritas` (`id`, `id_kriteria`, `prioritas`) VALUES
('KP001', 'K001', 0.1),
('KP002', 'K002', 0.299),
('KP003', 'K003', 0.601);

-- --------------------------------------------------------

--
-- Table structure for table `lauk_pendamping`
--

CREATE TABLE `lauk_pendamping` (
  `id` varchar(10) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `harga` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `lauk_pendamping`
--

INSERT INTO `lauk_pendamping` (`id`, `nama`, `harga`) VALUES
('LP001', 'Mi Kuning', 4000),
('LP002', 'Sambel Goreng Kentang Ati', 5000),
('LP003', 'Perkedel', 4000),
('LP004', 'Kerupuk Udang', 3000),
('LP005', 'Kering Tempe', 3000);

-- --------------------------------------------------------

--
-- Table structure for table `lauk_utama`
--

CREATE TABLE `lauk_utama` (
  `id` varchar(10) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `harga` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `lauk_utama`
--

INSERT INTO `lauk_utama` (`id`, `nama`, `harga`) VALUES
('LU001', 'Ayam Goreng', 7000),
('LU002', 'Krengsengan Ayam', 10000),
('LU003', 'Krengsengan Daging', 13000),
('LU004', 'Rendang Ayam', 10000),
('LU005', 'Rendang Daging', 13000),
('LU006', 'Balado Telur', 8000),
('LU007', 'Balado Tahu Telur', 9000);

-- --------------------------------------------------------

--
-- Table structure for table `matriks_nilai`
--

CREATE TABLE `matriks_nilai` (
  `id` varchar(10) NOT NULL,
  `id_kriteria_dari` varchar(10) NOT NULL,
  `id_kriteria_tujuan` varchar(10) NOT NULL,
  `nilai` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `matriks_nilai`
--

INSERT INTO `matriks_nilai` (`id`, `id_kriteria_dari`, `id_kriteria_tujuan`, `nilai`) VALUES
('MN001', 'K001', 'K001', 0.111),
('MN002', 'K001', 'K002', 0.333),
('MN003', 'K001', 'K003', 0.556),
('MN004', 'K002', 'K001', 0.077),
('MN005', 'K002', 'K002', 0.231),
('MN006', 'K002', 'K003', 0.692),
('MN007', 'K003', 'K001', 0.111),
('MN008', 'K003', 'K002', 0.333),
('MN009', 'K003', 'K003', 0.556);

-- --------------------------------------------------------

--
-- Table structure for table `matriks_sub_nilai`
--

CREATE TABLE `matriks_sub_nilai` (
  `id` varchar(10) NOT NULL,
  `id_kriteria` varchar(10) NOT NULL,
  `id_sub_kriteria_dari` varchar(10) NOT NULL,
  `id_sub_kriteria_tujuan` varchar(10) NOT NULL,
  `nilai` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `matriks_sub_nilai`
--

INSERT INTO `matriks_sub_nilai` (`id`, `id_kriteria`, `id_sub_kriteria_dari`, `id_sub_kriteria_tujuan`, `nilai`) VALUES
('MSN001', 'K001', 'SK001', 'SK001', 0.111),
('MSN002', 'K001', 'SK001', 'SK002', 0.333),
('MSN003', 'K001', 'SK001', 'SK003', 0.556),
('MSN004', 'K001', 'SK002', 'SK001', 0.077),
('MSN005', 'K001', 'SK002', 'SK002', 0.231),
('MSN006', 'K001', 'SK002', 'SK003', 0.692),
('MSN007', 'K001', 'SK003', 'SK001', 0.111),
('MSN008', 'K001', 'SK003', 'SK002', 0.333),
('MSN009', 'K001', 'SK003', 'SK003', 0.556),
('MSN010', 'K002', 'SK001', 'SK001', 0.111),
('MSN011', 'K002', 'SK001', 'SK002', 0.222),
('MSN012', 'K002', 'SK001', 'SK003', 0.667),
('MSN013', 'K002', 'SK002', 'SK001', 0.111),
('MSN014', 'K002', 'SK002', 'SK002', 0.222),
('MSN015', 'K002', 'SK002', 'SK003', 0.667),
('MSN016', 'K002', 'SK003', 'SK001', 0.111),
('MSN017', 'K002', 'SK003', 'SK002', 0.222),
('MSN018', 'K002', 'SK003', 'SK003', 0.667),
('MSN019', 'K003', 'SK001', 'SK001', 0.125),
('MSN020', 'K003', 'SK001', 'SK002', 0.25),
('MSN021', 'K003', 'SK001', 'SK003', 0.625),
('MSN022', 'K003', 'SK002', 'SK001', 0.111),
('MSN023', 'K003', 'SK002', 'SK002', 0.222),
('MSN024', 'K003', 'SK002', 'SK003', 0.667),
('MSN025', 'K003', 'SK003', 'SK001', 0.125),
('MSN026', 'K003', 'SK003', 'SK002', 0.25),
('MSN027', 'K003', 'SK003', 'SK003', 0.625);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2019_12_14_000001_create_personal_access_tokens_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `nasi`
--

CREATE TABLE `nasi` (
  `id` varchar(10) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `harga` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `nasi`
--

INSERT INTO `nasi` (`id`, `nama`, `harga`) VALUES
('N001', 'Nasi Putih', 5000),
('N002', 'Nasi Kuning', 7000);

-- --------------------------------------------------------

--
-- Table structure for table `paket`
--

CREATE TABLE `paket` (
  `id` varchar(10) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `harga` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `paket`
--

INSERT INTO `paket` (`id`, `nama`, `harga`) VALUES
('P001', 'Paket 1', 25000),
('P002', 'Paket 2', 25000),
('P003', 'Paket 3', 25000),
('P004', 'Paket 4', 25000),
('P005', 'Paket 5', 25000);

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `rekomendasi`
--

CREATE TABLE `rekomendasi` (
  `id` varchar(10) NOT NULL,
  `paket` varchar(10) NOT NULL,
  `nilai` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rekomendasi`
--

INSERT INTO `rekomendasi` (`id`, `paket`, `nilai`) VALUES
('R001', 'P001', 0.148),
('R002', 'P002', 0.241),
('R003', 'P003', 0.447),
('R004', 'P004', 0.198);

-- --------------------------------------------------------

--
-- Table structure for table `sub_kriteria`
--

CREATE TABLE `sub_kriteria` (
  `id` varchar(10) NOT NULL,
  `nama` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sub_kriteria`
--

INSERT INTO `sub_kriteria` (`id`, `nama`) VALUES
('SK001', 'Baik'),
('SK002', 'Cukup'),
('SK003', 'Kurang');

-- --------------------------------------------------------

--
-- Table structure for table `sub_kriteria_nilai`
--

CREATE TABLE `sub_kriteria_nilai` (
  `id` varchar(10) NOT NULL,
  `id_kriteria` varchar(10) NOT NULL,
  `id_sub_kriteria_dari` varchar(10) NOT NULL,
  `id_sub_kriteria_tujuan` varchar(10) NOT NULL,
  `nilai` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sub_kriteria_nilai`
--

INSERT INTO `sub_kriteria_nilai` (`id`, `id_kriteria`, `id_sub_kriteria_dari`, `id_sub_kriteria_tujuan`, `nilai`) VALUES
('SKN001', 'K001', 'SK001', 'SK001', 1),
('SKN002', 'K001', 'SK001', 'SK002', 3),
('SKN003', 'K001', 'SK001', 'SK003', 5),
('SKN004', 'K001', 'SK002', 'SK001', 0.333),
('SKN005', 'K001', 'SK002', 'SK002', 1),
('SKN006', 'K001', 'SK002', 'SK003', 3),
('SKN007', 'K001', 'SK003', 'SK001', 0.2),
('SKN008', 'K001', 'SK003', 'SK002', 0.6),
('SKN009', 'K001', 'SK003', 'SK003', 1),
('SKN010', 'K002', 'SK001', 'SK001', 1),
('SKN011', 'K002', 'SK001', 'SK002', 2),
('SKN012', 'K002', 'SK001', 'SK003', 6),
('SKN013', 'K002', 'SK002', 'SK001', 0.5),
('SKN014', 'K002', 'SK002', 'SK002', 1),
('SKN015', 'K002', 'SK002', 'SK003', 3),
('SKN016', 'K002', 'SK003', 'SK001', 0.167),
('SKN017', 'K002', 'SK003', 'SK002', 0.333),
('SKN018', 'K002', 'SK003', 'SK003', 1),
('SKN019', 'K003', 'SK001', 'SK001', 1),
('SKN020', 'K003', 'SK001', 'SK002', 2),
('SKN021', 'K003', 'SK001', 'SK003', 5),
('SKN022', 'K003', 'SK002', 'SK001', 0.5),
('SKN023', 'K003', 'SK002', 'SK002', 1),
('SKN024', 'K003', 'SK002', 'SK003', 3),
('SKN025', 'K003', 'SK003', 'SK001', 0.2),
('SKN026', 'K003', 'SK003', 'SK002', 0.4),
('SKN027', 'K003', 'SK003', 'SK003', 1);

-- --------------------------------------------------------

--
-- Table structure for table `sub_kriteria_nilai_jumlah`
--

CREATE TABLE `sub_kriteria_nilai_jumlah` (
  `kriteria` varchar(10) NOT NULL,
  `sub_kriteria` varchar(10) NOT NULL,
  `jumlah` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sub_kriteria_nilai_jumlah`
--

INSERT INTO `sub_kriteria_nilai_jumlah` (`kriteria`, `sub_kriteria`, `jumlah`) VALUES
('K001', 'SK001', 9),
('K001', 'SK002', 4.333),
('K001', 'SK003', 1.8),
('K002', 'SK001', 9),
('K002', 'SK002', 4.5),
('K002', 'SK003', 1.5),
('K003', 'SK001', 8),
('K003', 'SK002', 4.5),
('K003', 'SK003', 1.6);

-- --------------------------------------------------------

--
-- Table structure for table `sub_kriteria_prioritas`
--

CREATE TABLE `sub_kriteria_prioritas` (
  `id` varchar(10) NOT NULL,
  `kriteria` varchar(10) NOT NULL,
  `sub_kriteria` varchar(10) NOT NULL,
  `prioritas` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sub_kriteria_prioritas`
--

INSERT INTO `sub_kriteria_prioritas` (`id`, `kriteria`, `sub_kriteria`, `prioritas`) VALUES
('SKP001', 'K001', 'SK001', 0.1),
('SKP002', 'K001', 'SK002', 0.299),
('SKP003', 'K001', 'SK003', 0.601),
('SKP004', 'K002', 'SK001', 0.111),
('SKP005', 'K002', 'SK002', 0.222),
('SKP006', 'K002', 'SK003', 0.667),
('SKP007', 'K003', 'SK001', 0.12),
('SKP008', 'K003', 'SK002', 0.241),
('SKP009', 'K003', 'SK003', 0.639);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` enum('admin') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`email`, `email_verified_at`, `password`, `remember_token`, `name`, `role`, `created_at`, `updated_at`) VALUES
('admin@gmail.com', NULL, '$2y$10$wm4N26jTy.8TwfRdJuIGUORVtjlGcVHtFCMMBRqkHZfD43GTiEC9O', NULL, 'Admin', 'admin', '2022-12-28 00:14:19', '2022-12-28 00:14:19');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `alternatifs`
--
ALTER TABLE `alternatifs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kriteria`
--
ALTER TABLE `kriteria`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lauk_pendamping`
--
ALTER TABLE `lauk_pendamping`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lauk_utama`
--
ALTER TABLE `lauk_utama`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nasi`
--
ALTER TABLE `nasi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `paket`
--
ALTER TABLE `paket`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `rekomendasi`
--
ALTER TABLE `rekomendasi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sub_kriteria`
--
ALTER TABLE `sub_kriteria`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
