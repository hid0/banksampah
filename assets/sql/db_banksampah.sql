-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 02, 2020 at 01:26 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_banksampah`
--

-- --------------------------------------------------------

--
-- Table structure for table `kep_organisasi`
--

CREATE TABLE `kep_organisasi` (
  ` id_tabungan` int(15) NOT NULL,
  `laporan_uang` varchar(30) NOT NULL,
  `laporan_data` varchar(50) NOT NULL,
  `ket` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tabel_anggota`
--

CREATE TABLE `tabel_anggota` (
  `no_anggota` int(40) NOT NULL,
  `nama_anggota` varchar(40) DEFAULT NULL,
  `jenkel` varchar(2) DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `telp` varchar(15) DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `level` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tabel_anggota`
--

INSERT INTO `tabel_anggota` (`no_anggota`, `nama_anggota`, `jenkel`, `alamat`, `telp`, `username`, `password`, `level`) VALUES
(1, 'Faiz Hidayatulloh', 'L', 'Jepara, ID', '089671891052', 'faiz', '8ab7b004f4ac17eab77eebf3b0e733fa74ddbf99', 'administrator'),
(3, 'Farieq Setyo Utomo', 'L', 'Jepara, ID', '08956654564564', 'utomo', '8ab7b004f4ac17eab77eebf3b0e733fa74ddbf99', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `tabel_jenis`
--

CREATE TABLE `tabel_jenis` (
  `id_jensam` int(20) NOT NULL,
  `nama_jensam` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tabel_jenis`
--

INSERT INTO `tabel_jenis` (`id_jensam`, `nama_jensam`) VALUES
(1, 'Organik'),
(2, 'Anorganik');

-- --------------------------------------------------------

--
-- Table structure for table `tabel_pembelian`
--

CREATE TABLE `tabel_pembelian` (
  `id_pembelian` int(20) NOT NULL,
  `id_sampah` varchar(30) NOT NULL,
  `tgl` date NOT NULL,
  `no_anggota` varchar(20) NOT NULL,
  `berat` int(20) NOT NULL,
  `tebal` int(40) NOT NULL,
  `keterangan` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tabel_penjualan`
--

CREATE TABLE `tabel_penjualan` (
  `id_penjualan` int(20) NOT NULL,
  `id_sampah` varchar(30) NOT NULL,
  `tg` date NOT NULL,
  `berat` int(20) NOT NULL,
  `total` int(30) NOT NULL,
  `petugas` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tabel_sampah`
--

CREATE TABLE `tabel_sampah` (
  `id_sampah` int(20) NOT NULL,
  `nama_sampah` varchar(40) NOT NULL,
  `id_jensam` varchar(40) NOT NULL,
  `harga_beli` int(30) NOT NULL,
  `harga_jual` int(60) NOT NULL,
  `stok` int(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tabel_tabungan`
--

CREATE TABLE `tabel_tabungan` (
  `id_tabungan` int(20) NOT NULL,
  `no_anggota` varchar(20) NOT NULL,
  `tgl` date NOT NULL,
  `jumlah` double NOT NULL,
  `ket` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_jenis`
--

CREATE TABLE `tb_jenis` (
  `id_jenis` int(11) NOT NULL,
  `nama_jenis` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kategori` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ket` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tb_jenis`
--

INSERT INTO `tb_jenis` (`id_jenis`, `nama_jenis`, `kategori`, `ket`) VALUES
(1, 'Kulit Pisang', 'Organik', ''),
(2, 'Kaca', 'Anorganik', 'Pecahan Gelas Kaca');

-- --------------------------------------------------------

--
-- Table structure for table `tb_sampah`
--

CREATE TABLE `tb_sampah` (
  `id_sampah` int(11) NOT NULL,
  `id_jenis` int(11) NOT NULL,
  `berat` int(11) NOT NULL,
  `lokasi` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tgl` date NOT NULL,
  `ket` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `operator` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tb_sampah`
--

INSERT INTO `tb_sampah` (`id_sampah`, `id_jenis`, `berat`, `lokasi`, `tgl`, `ket`, `operator`) VALUES
(1, 1, 2, 'Pantai Kartini', '2020-01-01', '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kep_organisasi`
--
ALTER TABLE `kep_organisasi`
  ADD PRIMARY KEY (` id_tabungan`);

--
-- Indexes for table `tabel_anggota`
--
ALTER TABLE `tabel_anggota`
  ADD PRIMARY KEY (`no_anggota`);

--
-- Indexes for table `tabel_jenis`
--
ALTER TABLE `tabel_jenis`
  ADD PRIMARY KEY (`id_jensam`);

--
-- Indexes for table `tabel_pembelian`
--
ALTER TABLE `tabel_pembelian`
  ADD PRIMARY KEY (`id_pembelian`);

--
-- Indexes for table `tabel_penjualan`
--
ALTER TABLE `tabel_penjualan`
  ADD PRIMARY KEY (`id_penjualan`);

--
-- Indexes for table `tabel_sampah`
--
ALTER TABLE `tabel_sampah`
  ADD PRIMARY KEY (`id_sampah`);

--
-- Indexes for table `tabel_tabungan`
--
ALTER TABLE `tabel_tabungan`
  ADD PRIMARY KEY (`id_tabungan`);

--
-- Indexes for table `tb_jenis`
--
ALTER TABLE `tb_jenis`
  ADD PRIMARY KEY (`id_jenis`);

--
-- Indexes for table `tb_sampah`
--
ALTER TABLE `tb_sampah`
  ADD PRIMARY KEY (`id_sampah`),
  ADD KEY `id_jenis` (`id_jenis`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tabel_anggota`
--
ALTER TABLE `tabel_anggota`
  MODIFY `no_anggota` int(40) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tabel_jenis`
--
ALTER TABLE `tabel_jenis`
  MODIFY `id_jensam` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_jenis`
--
ALTER TABLE `tb_jenis`
  MODIFY `id_jenis` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_sampah`
--
ALTER TABLE `tb_sampah`
  MODIFY `id_sampah` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_sampah`
--
ALTER TABLE `tb_sampah`
  ADD CONSTRAINT `tb_sampah_ibfk_1` FOREIGN KEY (`id_jenis`) REFERENCES `tb_jenis` (`id_jenis`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
