-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Oct 14, 2024 at 10:15 AM
-- Server version: 8.3.0
-- PHP Version: 8.2.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_plut`
--
CREATE DATABASE IF NOT EXISTS `db_plut` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci;
USE `db_plut`;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` bigint UNSIGNED NOT NULL,
  `version` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `group` varchar(255) NOT NULL,
  `namespace` varchar(255) NOT NULL,
  `time` int NOT NULL,
  `batch` int UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `version`, `class`, `group`, `namespace`, `time`, `batch`) VALUES
(7, '2024-10-13-070142', 'App\\Database\\Migrations\\CreateUmkmTables', 'default', 'App', 1728846061, 1),
(8, '2024-10-13-070212', 'App\\Database\\Migrations\\CreateUserTables', 'default', 'App', 1728846061, 1),
(9, '2024-10-13-070352', 'App\\Database\\Migrations\\CreateKategoriPelayananTables', 'default', 'App', 1728846061, 1),
(10, '2024-10-13-070517', 'App\\Database\\Migrations\\CreateBukuTamuTables', 'default', 'App', 1728846061, 1),
(11, '2024-10-13-070536', 'App\\Database\\Migrations\\CreateUmkmPerkembanganTables', 'default', 'App', 1728846061, 1),
(12, '2024-10-13-151627', 'App\\Database\\Migrations\\CreateUmkmDokumenTables', 'default', 'App', 1728846061, 1);

-- --------------------------------------------------------

--
-- Table structure for table `t_buku_tamu`
--

CREATE TABLE `t_buku_tamu` (
  `id_buku_tamu` int UNSIGNED NOT NULL,
  `layanan` varchar(255) NOT NULL,
  `kategori_layanan` varchar(255) NOT NULL,
  `deskripsi` text NOT NULL,
  `jam_kedatangan` time NOT NULL,
  `jam_pulang` time NOT NULL,
  `tanggal_kedatangan` date NOT NULL,
  `tanggal_pulang` date NOT NULL,
  `foto` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Table structure for table `t_umkm`
--

CREATE TABLE `t_umkm` (
  `kode_umkm` int UNSIGNED NOT NULL,
  `nama_umkm` varchar(255) NOT NULL,
  `alamat` text NOT NULL,
  `desa` varchar(50) NOT NULL,
  `kecamatan` varchar(255) NOT NULL,
  `kode_pos` varchar(20) NOT NULL,
  `telp` varchar(20) NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `nik_pemilik` varchar(50) NOT NULL,
  `nama_pemilik` varchar(100) NOT NULL,
  `alamat_pemilik` varchar(255) NOT NULL,
  `pendidikan_terakhir` varchar(100) NOT NULL,
  `tahun_beroperasi` varchar(10) NOT NULL,
  `jenis_usaha` varchar(100) NOT NULL,
  `wilayah_pemasaran` varchar(255) NOT NULL,
  `media_pemasaran` varchar(100) NOT NULL,
  `jumlah_modal_sendiri` varchar(255) NOT NULL,
  `jumlah_modal_pinjaman` varchar(255) NOT NULL,
  `dokumen_nib` varchar(255) DEFAULT NULL,
  `dokumen_pirt` varchar(255) DEFAULT NULL,
  `dokumen_halal` varchar(255) DEFAULT NULL,
  `dokumen_npwp` varchar(255) DEFAULT NULL,
  `dokumen_lh` varchar(255) DEFAULT NULL,
  `dokumen_lainnya` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `t_umkm`
--

INSERT INTO `t_umkm` (`kode_umkm`, `nama_umkm`, `alamat`, `desa`, `kecamatan`, `kode_pos`, `telp`, `email`, `nik_pemilik`, `nama_pemilik`, `alamat_pemilik`, `pendidikan_terakhir`, `tahun_beroperasi`, `jenis_usaha`, `wilayah_pemasaran`, `media_pemasaran`, `jumlah_modal_sendiri`, `jumlah_modal_pinjaman`, `dokumen_nib`, `dokumen_pirt`, `dokumen_halal`, `dokumen_npwp`, `dokumen_lh`, `dokumen_lainnya`) VALUES
(16, '', '', '', '', '', '', 'admin@example.com', '1234567890098765', 'Admin', '', '', '', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `t_umkm_perkembangan`
--

CREATE TABLE `t_umkm_perkembangan` (
  `id_perkembangan` int UNSIGNED NOT NULL,
  `kode_umkm` int UNSIGNED DEFAULT NULL,
  `tahun` year DEFAULT NULL,
  `asset` int DEFAULT NULL,
  `omzet` int DEFAULT NULL,
  `produk_unggulan` varchar(50) DEFAULT NULL,
  `foto_produk` varchar(255) DEFAULT NULL,
  `jumlah_tenaga_kerja` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Table structure for table `t_users`
--

CREATE TABLE `t_users` (
  `id_user` int UNSIGNED NOT NULL,
  `nama` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('admin_plut','admin_dkupp','umkm','operator') NOT NULL DEFAULT 'umkm',
  `foto` varchar(255) DEFAULT NULL,
  `kode_umkm` int UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `t_users`
--

INSERT INTO `t_users` (`id_user`, `nama`, `email`, `password`, `role`, `foto`, `kode_umkm`) VALUES
(6, 'Admin', 'admin@example.com', '$2y$10$kaO8dwndml15U.9H3Ttu9uVEmkPjkHnR/CQhOsa5LA3skUHkdJ.Rm', 'admin_plut', NULL, 16);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t_buku_tamu`
--
ALTER TABLE `t_buku_tamu`
  ADD PRIMARY KEY (`id_buku_tamu`);

--
-- Indexes for table `t_umkm`
--
ALTER TABLE `t_umkm`
  ADD PRIMARY KEY (`kode_umkm`),
  ADD UNIQUE KEY `nik_pemilik` (`nik_pemilik`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `t_umkm_perkembangan`
--
ALTER TABLE `t_umkm_perkembangan`
  ADD PRIMARY KEY (`id_perkembangan`),
  ADD KEY `kode_umkm` (`kode_umkm`);

--
-- Indexes for table `t_users`
--
ALTER TABLE `t_users`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `kode_umkm` (`kode_umkm`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `t_buku_tamu`
--
ALTER TABLE `t_buku_tamu`
  MODIFY `id_buku_tamu` int UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `t_umkm`
--
ALTER TABLE `t_umkm`
  MODIFY `kode_umkm` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `t_umkm_perkembangan`
--
ALTER TABLE `t_umkm_perkembangan`
  MODIFY `id_perkembangan` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `t_users`
--
ALTER TABLE `t_users`
  MODIFY `id_user` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `t_umkm_perkembangan`
--
ALTER TABLE `t_umkm_perkembangan`
  ADD CONSTRAINT `t_umkm_perkembangan_kode_umkm_foreign` FOREIGN KEY (`kode_umkm`) REFERENCES `t_umkm` (`kode_umkm`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `t_users`
--
ALTER TABLE `t_users`
  ADD CONSTRAINT `t_users_kode_umkm_foreign` FOREIGN KEY (`kode_umkm`) REFERENCES `t_umkm` (`kode_umkm`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
