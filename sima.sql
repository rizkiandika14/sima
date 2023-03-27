-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 25, 2023 at 06:39 AM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.1.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sima`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `id` int(11) NOT NULL,
  `nama_brg` varchar(255) NOT NULL,
  `stok` int(11) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`id`, `nama_brg`, `stok`) VALUES
(5, 'Staples ', 2),
(9, 'Laptop', 1),
(21, 'AC', 2),
(30, 'mouse', 1),
(32, 'Keyboard', 1),
(33, 'Isi Staples', 1);

-- --------------------------------------------------------

--
-- Table structure for table `barang_temp`
--

CREATE TABLE `barang_temp` (
  `id_tmp` int(11) NOT NULL,
  `barang_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `nama_brg` varchar(255) NOT NULL,
  `jumlah` varchar(255) NOT NULL,
  `satuan` varchar(255) NOT NULL,
  `harga` varchar(255) NOT NULL,
  `total` varchar(255) NOT NULL,
  `minggu` varchar(255) NOT NULL,
  `divisi` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pengajuan`
--

CREATE TABLE `pengajuan` (
  `id` int(11) NOT NULL,
  `barang_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `harga` varchar(255) NOT NULL,
  `jumlah` varchar(255) NOT NULL,
  `satuan` varchar(255) NOT NULL,
  `total` varchar(255) DEFAULT NULL,
  `minggu` int(11) NOT NULL,
  `divisi` varchar(255) NOT NULL,
  `waktu_pengajuan` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `waktu_validasi` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT 'proses'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengajuan`
--

INSERT INTO `pengajuan` (`id`, `barang_id`, `user_id`, `harga`, `jumlah`, `satuan`, `total`, `minggu`, `divisi`, `waktu_pengajuan`, `waktu_validasi`, `status`) VALUES
(7, 21, 2, '400', '2', 'Buah', '800', 1, 'bak', '2023-03-18 07:31:09', NULL, 'proses'),
(13, 21, 1, '3000', '2', 'Buah', '6000', 1, 'admin', '2023-03-18 08:59:44', NULL, 'proses'),
(14, 21, 1, '3000', '2', 'Buah', '6000', 1, 'admin', '2023-03-24 14:23:19', NULL, 'proses'),
(15, 32, 1, '4000', '2', 'Buah', '8000', 1, 'admin', '2023-03-24 17:01:15', '2023-03-25 00:15:24', 'disetujui'),
(16, 9, 2, '5000', '4', 'Buah', '20000', 1, 'bak', '2023-03-24 17:05:13', NULL, 'proses'),
(17, 33, 2, '3000', '1', 'Buah', '3000', 1, 'bak', '2023-03-24 17:05:13', NULL, 'proses');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `divisi` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `contact` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `divisi`, `email`, `contact`, `username`, `password`, `role`) VALUES
(1, 'admin', 'rizkiandika79@gmail.com', '872318748', 'admin', '21232f297a57a5a743894a0e4a801fc3', 1),
(2, 'bak', 'ckingg9@gmail.com', '090490594', 'ceking', '21232f297a57a5a743894a0e4a801fc3', 2),
(10, 'upb', 'nvtzusy@gmail.com', '45645', 'sohey', '21232f297a57a5a743894a0e4a801fc3', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `barang_temp`
--
ALTER TABLE `barang_temp`
  ADD PRIMARY KEY (`id_tmp`);

--
-- Indexes for table `pengajuan`
--
ALTER TABLE `pengajuan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `barang_temp`
--
ALTER TABLE `barang_temp`
  MODIFY `id_tmp` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pengajuan`
--
ALTER TABLE `pengajuan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
