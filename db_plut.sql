-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Oct 12, 2024 at 05:20 PM
-- Server version: 8.0.30
-- PHP Version: 7.4.33

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

-- --------------------------------------------------------

--
-- Table structure for table `t_buku_tamu`
--

CREATE TABLE `t_buku_tamu` (
  `id_buku_tamu` int NOT NULL,
  `layanan` varchar(100) NOT NULL,
  `kategori_layanan` varchar(255) NOT NULL,
  `jam_kedatangan` time NOT NULL,
  `jam_pulang` time NOT NULL,
  `tanggal_kedatangan` date NOT NULL,
  `tanggal_pulang` date NOT NULL,
  `foto` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `t_perkembangan`
--

CREATE TABLE `t_perkembangan` (
  `kode_perkembangan` int NOT NULL,
  `kode_umkm` int NOT NULL,
  `tahun` varchar(5) NOT NULL,
  `asset` varchar(255) NOT NULL,
  `omzet` varchar(500) NOT NULL,
  `produk_unggulan` varchar(255) NOT NULL,
  `foto_produk` varchar(500) NOT NULL,
  `jumlah_tenaga_kerja` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `t_umkm`
--

CREATE TABLE `t_umkm` (
  `kode_umkm` int NOT NULL,
  `nama_umkm` varchar(255) NOT NULL,
  `alamat` text NOT NULL,
  `desa` varchar(50) NOT NULL,
  `kecamatan` varchar(255) NOT NULL,
  `kode_pos` varchar(20) NOT NULL,
  `telp` varchar(20) NOT NULL,
  `email` varchar(255) NOT NULL,
  `nik_pemilik` varchar(50) NOT NULL,
  `nama_pemilik` varchar(100) NOT NULL,
  `alamat_pemilik` varchar(255) NOT NULL,
  `pendidikan_terakhir` varchar(100) NOT NULL,
  `tahun_beroperasi` varchar(10) NOT NULL,
  `jenis_usaha` varchar(100) NOT NULL,
  `wilayah_pemasaran` varchar(255) NOT NULL,
  `media_pemasaran` varchar(100) NOT NULL,
  `jumlah_modal_sendiri` varchar(255) NOT NULL,
  `jumlah_modal_pinjaman` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `t_umkm`
--

INSERT INTO `t_umkm` (`kode_umkm`, `nama_umkm`, `alamat`, `desa`, `kecamatan`, `kode_pos`, `telp`, `email`, `nik_pemilik`, `nama_pemilik`, `alamat_pemilik`, `pendidikan_terakhir`, `tahun_beroperasi`, `jenis_usaha`, `wilayah_pemasaran`, `media_pemasaran`, `jumlah_modal_sendiri`, `jumlah_modal_pinjaman`) VALUES
(1, '1', 'ahsdsajhv', '', '', '', '12312', '', '', '', '', '', '', '', '', '', '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `t_buku_tamu`
--
ALTER TABLE `t_buku_tamu`
  ADD PRIMARY KEY (`id_buku_tamu`);

--
-- Indexes for table `t_perkembangan`
--
ALTER TABLE `t_perkembangan`
  ADD PRIMARY KEY (`kode_perkembangan`);

--
-- Indexes for table `t_umkm`
--
ALTER TABLE `t_umkm`
  ADD PRIMARY KEY (`kode_umkm`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `t_buku_tamu`
--
ALTER TABLE `t_buku_tamu`
  MODIFY `id_buku_tamu` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `t_perkembangan`
--
ALTER TABLE `t_perkembangan`
  MODIFY `kode_perkembangan` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `t_umkm`
--
ALTER TABLE `t_umkm`
  MODIFY `kode_umkm` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
