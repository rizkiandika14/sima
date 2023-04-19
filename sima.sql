-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 07, 2023 at 11:53 PM
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
-- Table structure for table `asal_barang`
--

CREATE TABLE `asal_barang` (
  `id_asal_barang` int(11) NOT NULL,
  `nama_asal_barang` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `asal_barang`
--

INSERT INTO `asal_barang` (`id_asal_barang`, `nama_asal_barang`) VALUES
(1, 'Yayasan'),
(2, 'Perguruan Tinggi'),
(4, 'Lainnya'),
(5, 'Hibah PHPPTS'),
(6, 'Donatur'),
(7, 'Alumni');

-- --------------------------------------------------------

--
-- Table structure for table `aset`
--

CREATE TABLE `aset` (
  `id` int(11) NOT NULL,
  `kode_brg` varchar(255) DEFAULT NULL,
  `nama_brg` varchar(255) NOT NULL,
  `serial number` varchar(255) DEFAULT NULL,
  `merek` varchar(255) NOT NULL,
  `asal_brg` varchar(255) NOT NULL,
  `thn_perolehan` varchar(255) NOT NULL,
  `tgl_perolehan` date NOT NULL,
  `hrg_perolehan` varchar(255) NOT NULL,
  `keadaan_brg` varchar(255) NOT NULL,
  `peruntukan` varchar(255) NOT NULL,
  `ket` varchar(255) NOT NULL,
  `jenis_brg` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `aset`
--

INSERT INTO `aset` (`id`, `kode_brg`, `nama_brg`, `serial number`, `merek`, `asal_brg`, `thn_perolehan`, `tgl_perolehan`, `hrg_perolehan`, `keadaan_brg`, `peruntukan`, `ket`, `jenis_brg`) VALUES
(3, NULL, 'mouse', NULL, 'rexus', 'beli', '2023', '2023-03-29', '100000', '100', 'bak', 'baik', 'elektronik');

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `id` int(11) NOT NULL,
  `nama_brg` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`id`, `nama_brg`) VALUES
(5, 'Staples'),
(9, 'Laptop'),
(21, 'AC'),
(30, 'mouse'),
(32, 'Keyboard'),
(33, 'Isi Staples'),
(34, 'HVS'),
(35, 'Meja'),
(36, 'Kursi'),
(37, 'Kyoto Air Mail Tali K.310'),
(38, 'Kyoto Air Mail Tali K.312'),
(39, 'Merpati Mini (Isi 100)'),
(40, 'Merpati No.104 (Isi 100)'),
(41, 'Merpati No.90 (Isi 100'),
(42, 'Papperline Mini (isi 100)'),
(43, 'Papperline No.104 (isi 100)'),
(44, 'Papperline No.90 (Isi 100)'),
(45, 'Tricom 1/2 Folio (isi 100)'),
(46, 'Tricom A4 (isi 100)'),
(47, 'Tricom Folio (isi 100)'),
(48, 'Tricom Kabinet (isi 100)'),
(49, 'Tricom Map (Isi 100)'),
(50, 'Tricom Super Kabinet (Isi 100)'),
(51, 'Tricom Super Map (isi 100)'),
(52, 'Bolpenku Ulir'),
(53, 'Faster C-6'),
(54, 'Faster C-600'),
(55, 'Joyko 4 Warna Quaco 3'),
(56, 'Kenko 4 Warna'),
(57, 'Kenko Easy Gel'),
(58, 'Kenko Gel ke-200'),
(59, 'Kenko King Jeller li ke-100'),
(60, 'Kenko T-Gel ke-303'),
(61, 'Pillot Ball Liner'),
(62, 'Pillot Bptp'),
(63, 'Snowman Bp-7'),
(64, 'Snowman V5'),
(65, 'Snowman V7'),
(66, 'Standar Ae-7'),
(67, 'Standart B\'Gel'),
(68, 'Standart B\'Live'),
(69, 'Standart St-009 Ceramic Ball'),
(70, 'Standart Tecnogrip Ekstra Fine'),
(71, 'Tizo Gel Ink Pen Tg30901-D'),
(72, 'Tizo Gel Liner'),
(73, 'X-Data Pen M-1 (Lilin)'),
(74, 'Zebra Sarasa'),
(75, 'Kenko No. 105 (Isi 12)'),
(76, 'Kenko No. 107 (Isi 12)'),
(77, 'Kenko No. 111 (Isi 12)'),
(78, 'Kenko No. 155 (Isi 12)'),
(79, 'Kenko No. 200 (Isi12)'),
(80, 'Kenko No. 260 (Isi 12)'),
(81, 'Kenko No. 280 (Isi 6)'),
(82, 'Box file Plastik'),
(83, 'Booknote A5 50 Lbr'),
(84, 'Buku Kwitansi '),
(85, 'Gelatik Kembar Buku Batik Ekspedisi 100 Lbr'),
(86, 'Gelatik Kembar Buku Batik Ekspedisi 200 Lbr'),
(87, 'Gelatik Kembar Buku Batik Ekspedisi 50 Lbr'),
(88, 'Gelatik Kembar Buku Batik Folio 100 Lbr'),
(89, 'Gelatik Kembar Buku Batik Folio 200 Lbr'),
(90, 'Gelatik Kembar Buku Batik Folio 300 Lbr'),
(91, 'Gelatik Kembar Buku Batik Folio 50 Lbr'),
(92, 'Gelatik Kembar Buku Batik Kwarto 100 Lbr'),
(93, 'Gelatik Kembar Buku Batik Kwarto 200 Lbr'),
(94, 'Gelatik Kembar Buku Batik Kwarto 50 Lbr'),
(95, 'Gelatik Kembar Buku Batik Oktavo 200 Lbr'),
(96, 'Gelatik Kembar Buku Batik Oktavo 100 Lbr'),
(97, 'Isolasi'),
(98, 'Isolasi / Cellotape 1 x 72 Daimaru'),
(99, 'Isolasi / Cellotape 1/2 X 72 Daimaru'),
(100, 'Isolasi Double Tape 1\"'),
(101, 'Isolasi Double Tape 1/2\"'),
(102, 'Isolasi Double Tape 2\"'),
(103, 'Lakban Bening 2\" Daimaru'),
(104, 'Lakban Coklat 2\" Daimaru'),
(105, 'Lakban Hitam'),
(106, 'Lakban Hitam / Cloth Tape 1\" Daimaru'),
(107, 'Lakban Hitam / Cloth Tape 1,5\" Daimaru'),
(108, 'Lakban Hitam / Cloth Tape 2\" Daimaru'),
(109, 'Lakban Kertas / Masking Tape 1\" Daimaru'),
(110, 'Lakban Kertas / Masking Tape 2\" Daimaru'),
(111, 'Tipe Ex Kenko ke-01'),
(112, 'Tipex Roll Kenko Ct310Sl'),
(113, 'Tipex Roll Kenko Ct906'),
(114, 'Gunindo Cutter Besar A18'),
(115, 'Gunindo Cutter kecil Sc 9 A'),
(116, 'Kenko A 300'),
(117, 'Kenko isi Cutter A 300'),
(118, 'Kenko isi Cutter L 150'),
(119, 'Kenko L 500'),
(120, 'Gunindo Gunting Mm'),
(121, 'Gunindo Gunting Ss'),
(122, 'Kenko Gunting  Kecil Sc 828 N'),
(123, 'Kenko Gunting Tanggung sc-838 N'),
(124, 'Kenko Gunting Besar Sc-848 N'),
(125, 'Karbon Folio'),
(126, 'Kertas Bc'),
(127, 'Kertas Buram'),
(128, 'Kertas Continous Form Hi Print 2 Ply:3'),
(129, 'Kertas Continous Form Papperline 1 Ply:2'),
(130, 'Kertas Continous Form Papperline 3 Ply'),
(131, 'Kertas Continous Form Papperline Cf K3 W Prs'),
(132, 'Kertas Continuous Form Papperline Cf K1 Prs'),
(133, 'Kertas Continuous Form Papperline Cf K3 W'),
(134, 'Kertas Hvs A3 70 Gr'),
(135, 'Kertas Hvs A3 75 Gr'),
(136, 'Kertas Hvs A3 80 Gr'),
(137, 'Kertas Hvs A4 70 Gr'),
(138, 'Kertas Hvs A4 75 Gr'),
(139, 'Kertas Hvs A4 80 gr'),
(140, 'Kertas Hvs F4 60 Gr'),
(141, 'Kertas Hvs F4 70 Gr'),
(142, 'Kertas Hvs F4 75 Gr'),
(143, 'Kertas Hvs F4 80 Gr'),
(144, 'Kertas Hvs F5 '),
(145, 'Kertas Hvs warna F4 70 Gr warna'),
(146, 'Kertas Manila'),
(147, 'Kertas payung'),
(148, 'Kertas Photo Eprint A4 180gsm, isi 20lbr'),
(149, 'Kertas Photo Eprint A4 200gsm, isi 20lbr'),
(150, 'Kertas Photo Eprint A4 230gsm, isi 20lbr'),
(151, 'Kertas Photo Eprint A4 260gsm Silky, isi20lbr'),
(152, 'Kertas Photo Stiker'),
(153, 'Kertas Termarol 70 Mm'),
(154, 'Kertas Termarol 80 Mm'),
(155, 'Kertas Thermal 57X40'),
(156, 'Thermarol Thermal paper Roll 110x30000'),
(157, 'Kertas label Golden Cock'),
(158, 'Kertas Label Champion'),
(159, 'Lem Kertas Povinal'),
(160, 'Lem Cair Joyko 35 ml'),
(161, 'Lem cair Kenko 50 ml'),
(162, 'Lem Stick Kenko 8 gr'),
(163, 'Lem Stick Kenko 15 gr'),
(164, 'Lem Stick Kenko 25 gr'),
(165, 'Lem  Povinal Kecil 22 ml'),
(166, 'Stopmap Kertas'),
(167, 'Snelhecter Plastik Bening'),
(168, 'Stopmap Clear Holder'),
(169, 'Snelhecter Kertas'),
(170, 'Snelhecter Plastik / Business File'),
(171, 'Map Plastik / Clip File'),
(172, 'Map Gantung'),
(173, 'Map Sleting'),
(174, 'Spring File'),
(175, 'Map Zipper'),
(176, 'Map Batik'),
(177, 'Map Batik Kain'),
(178, 'Pp Pocket'),
(179, 'Order Bantex F4'),
(180, 'Odner Bindex F4'),
(181, 'Odner Forte F4'),
(182, 'Bantex Plastic Poket'),
(183, 'Gungyu Odner 401'),
(184, 'Kenko Trigonal No.3'),
(185, 'Kenko Paperclips No.5'),
(186, 'Kenko Paperclips No.1'),
(187, 'Serutan Pensil Joyko B-72'),
(188, 'Serutan Pensil Joyko B-23'),
(189, 'Butterfly Penggaris Plastik 30 Cm'),
(190, 'Kenko Penggaris Besi 30 Cm'),
(191, 'Penghapus Whiteboard Gunindo'),
(192, 'Penghapus Steadler B-40'),
(193, 'Penghapus Pensil Staedler'),
(194, 'Penghapus Whiteboard Enter'),
(195, 'Pensil 2B'),
(196, 'Pensil Biasa'),
(197, 'Pensil Warna'),
(198, 'Joyko Punch No. 40 XI'),
(199, 'Joyko Punch No. 30 XI'),
(200, 'Kenko Punch No. 30 XI'),
(201, 'Kenko Punch No. 40 XI'),
(202, 'Kenko Punch No.85'),
(203, 'Pita Ketik'),
(204, 'Snowman White Board Bg-12'),
(205, 'Snowman Permanent G-12'),
(206, 'Snowman Kecil Satuan'),
(207, 'Snowman Kecil 12 Warna Pw-12A'),
(208, 'Snowman Isi Tinta Spidol Permanent'),
(209, 'Snowman Isi Tinta Spidol White Board'),
(210, 'Snowman White Paint Marker Kecil Efwp-12'),
(211, 'Snowman White Paint Marker Besar Wp-12'),
(212, 'Snowman Gold Paint Marker Kecil Efgp-12'),
(213, 'Snowman Gold Paint Marker Besar Gp-12'),
(214, 'Snowman Silver Paint Marker Kecil Efsp-12'),
(215, 'Snowman Silver Paint Marker Besar Sp-12'),
(216, 'Joyko Bak Stampel No.0'),
(217, 'Kenko Bak Stampel No.1'),
(218, 'Joyko Bak Stampel No.2'),
(219, 'Hero Ungu'),
(220, 'Kenko Hd-10'),
(221, 'Kenko Hd-50'),
(222, 'Kenko Stapler 10D'),
(223, 'Kenko Stapler Mini Hd - 10S'),
(224, 'Kangaro Stapler Hs 10Y'),
(225, 'Kangaro isi Staples No.10'),
(226, 'Kangaro isi Staples No. 3 (24/6)'),
(227, 'Max isi Staples No. 10'),
(228, 'Max isi Staples No. 3 (24/6)'),
(229, 'Great Wall No. 10'),
(230, 'Great Wall No. 3'),
(231, 'Big Sticky Note Kecil 5 Warna Sn 7651 5W'),
(232, 'Tinta Stempel'),
(233, 'Tinta Epson T664 Black'),
(234, 'Tinta Epson T664 Cyan'),
(235, 'Tinta Epson T664 Magenta'),
(236, 'Tinta Epson T664 Yellow'),
(237, 'Tinta Epson T003 Black'),
(238, 'Tinta Epson T003 Cyan'),
(239, 'Tinta Epson T003 Magenta'),
(240, 'Tinta Epson T003 Yellow'),
(241, 'Tinta E Print For Canon 100Ml Black'),
(242, 'Tinta E Print For Canon 100Ml Cyan'),
(243, 'Tinta E Print For Canon 100Ml Magenta'),
(244, 'Tinta E Print For Canon 100Ml Yellow'),
(245, 'Tinta E Print For Canon 200Ml Black'),
(246, 'Tinta E Print For Canon 200Ml Cyan'),
(247, 'Tinta E Print For Canon 200Ml Magenta'),
(248, 'Tinta E Print For Canon 200Ml Yellow'),
(249, 'Tinta E Print For Epson 100Ml Black'),
(250, 'Tinta E Print For Epson 100Ml Cyan'),
(251, 'Tinta E Print For Epson 100Ml Magenta'),
(252, 'Tinta E Print For Epson 100Ml Yellow'),
(253, 'Zenith Isi Tinta Stampel'),
(254, 'Pyramid Isi Tinta Stampel');

-- --------------------------------------------------------

--
-- Table structure for table `barang_satuan`
--

CREATE TABLE `barang_satuan` (
  `id` int(11) NOT NULL,
  `satuan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `barang_satuan`
--

INSERT INTO `barang_satuan` (`id`, `satuan`) VALUES
(1, 'Pcs'),
(2, 'Buah'),
(3, 'Lbr'),
(4, 'Pak'),
(5, 'Kotak'),
(6, 'Roll'),
(7, 'Tube'),
(8, 'Dus'),
(9, 'Rim'),
(10, 'Botol');

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
-- Table structure for table `golongan`
--

CREATE TABLE `golongan` (
  `id_golongan` int(11) NOT NULL,
  `kode_gol` varchar(10) DEFAULT NULL,
  `keterangan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `golongan`
--

INSERT INTO `golongan` (`id_golongan`, `kode_gol`, `keterangan`) VALUES
(1, '1', 'Golongan Persedian'),
(2, '2', 'Golongan Tanah'),
(3, '3', 'Golongan Peralatan dan Mesin'),
(4, '4', 'Golongan Gedung dan Bangunan');

-- --------------------------------------------------------

--
-- Table structure for table `jenis_barang`
--

CREATE TABLE `jenis_barang` (
  `id_jenis_barang` int(11) NOT NULL,
  `jenis_barang` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jenis_barang`
--

INSERT INTO `jenis_barang` (`id_jenis_barang`, `jenis_barang`) VALUES
(1, 'Alat Rumah Tangga'),
(2, 'Alat Musik');

-- --------------------------------------------------------

--
-- Table structure for table `klasifikasi`
--

CREATE TABLE `klasifikasi` (
  `id` int(11) NOT NULL,
  `golongan_id` int(11) NOT NULL,
  `kode_klas` varchar(10) NOT NULL,
  `keterangan_klas` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `klasifikasi`
--

INSERT INTO `klasifikasi` (`id`, `golongan_id`, `kode_klas`, `keterangan_klas`) VALUES
(1, 1, '01', 'Barang Pakai Habis'),
(2, 1, '02', 'Barang Tak Habis Pakai'),
(3, 1, '03', 'Barang Bekas di Pakai'),
(4, 2, '01', 'Tanah Untuk Bangunan Gedung Perdagangan'),
(5, 2, '02', 'Tanah Untuk Bangunan Tempat Kerja'),
(6, 2, '03', 'Tanah Untuk Bangunan Tempat Ibadah'),
(7, 2, '04', 'Tanah Untuk Lapangan dan Tanah');

-- --------------------------------------------------------

--
-- Table structure for table `lantai`
--

CREATE TABLE `lantai` (
  `id` int(11) NOT NULL,
  `kode` varchar(255) NOT NULL,
  `lantai` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lantai`
--

INSERT INTO `lantai` (`id`, `kode`, `lantai`) VALUES
(1, '1', '1'),
(2, '2', '2'),
(3, '3', '3'),
(4, '4', '4'),
(5, '5', '5'),
(6, '6', '6'),
(7, '7', '7');

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
  `realisasi` int(11) DEFAULT NULL,
  `waktu_pengajuan` date DEFAULT NULL,
  `waktu_validasi` date DEFAULT NULL,
  `status` varchar(255) DEFAULT 'proses',
  `validasi` varchar(255) NOT NULL DEFAULT 'belum diterima'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengajuan`
--

INSERT INTO `pengajuan` (`id`, `barang_id`, `user_id`, `harga`, `jumlah`, `satuan`, `total`, `minggu`, `divisi`, `realisasi`, `waktu_pengajuan`, `waktu_validasi`, `status`, `validasi`) VALUES
(50, 21, 2, '2000', '2', 'Buah', '4000', 2, 'bak', 2, '2023-03-26', '2023-03-27', 'disetujui', 'diterima'),
(51, 33, 2, '9000', '2', 'Buah', '18000', 3, 'bak', 2, '2023-03-27', '2023-03-30', 'disetujui', 'diterima'),
(52, 21, 2, '3000', '1', 'Buah', '3000', 4, 'bak', 1, '2023-03-27', '2023-03-30', 'disetujui', 'diterima'),
(53, 30, 1, '4600', '4', 'Buah', '18400', 2, 'admin', 3, '2023-03-27', '2023-03-30', 'disetujui', 'diterima'),
(54, 9, 1, '3000', '2', 'Buah', '6000', 1, 'admin', NULL, '2023-03-27', NULL, 'ditolak', 'belum diterima'),
(56, 21, 2, '2000', '1', 'Buah', '2000', 3, 'bak', 1, '2023-03-27', '2023-03-30', 'disetujui', 'diterima'),
(57, 34, 2, '200', '1', 'Buah', '200', 2, 'bak', NULL, '2023-03-27', NULL, 'ditolak', 'belum diterima'),
(59, 32, 1, '3000', '2', 'Buah', '6000', 1, 'admin', NULL, '2023-03-27', NULL, 'ditolak', 'belum diterima'),
(60, 32, 1, '2000', '2', 'Buah', '4000', 3, 'admin', 2, '2023-03-27', '2023-03-31', 'disetujui', 'diterima'),
(61, 33, 1, '3000', '4', 'Buah', '12000', 4, 'admin', NULL, '2023-03-27', NULL, 'ditolak', 'belum diterima'),
(62, 35, 2, '1000', '2', 'Buah', '2000', 1, 'bak', 2, '2023-03-28', '2023-03-28', 'disetujui', 'diterima'),
(63, 21, 2, '3000', '1', 'Buah', '3000', 1, 'bak', 1, '2023-03-30', '2023-03-30', 'disetujui', 'diterima'),
(64, 32, 2, '4000', '2', 'Buah', '8000', 1, 'bak', 2, '2023-03-30', '2023-03-30', 'disetujui', 'diterima'),
(66, 33, 2, '3000', '2', 'Buah', '6000', 1, 'bak', 2, '2023-03-30', '2023-03-30', 'disetujui', 'diterima'),
(69, 5, 2, '2000', '2', 'Pcs', '4000', 1, 'bak', 2, '2023-04-02', '2023-04-02', 'disetujui', 'diterima'),
(70, 21, 2, '200000', '1', 'Buah', '200000', 1, 'bak', 1, '2023-04-02', '2023-04-02', 'disetujui', 'diterima'),
(71, 34, 2, '50000', '2', 'Rim', '100000', 1, 'bak', 2, '2023-04-02', '2023-04-02', 'disetujui', 'diterima'),
(75, 9, 1, '5000000', '2', 'Buah', '10000000', 1, 'admin', 2, '2023-04-08', '2023-04-08', 'disetujui upb', 'belum diterima'),
(76, 32, 2, '350000', '1', 'Buah', '350000', 1, 'bak', 1, '2023-04-08', NULL, 'waiting approvel', 'belum diterima'),
(77, 30, 2, '150000', '1', 'Buah', '150000', 1, 'bak', 1, '2023-04-08', NULL, 'waiting approvel', 'belum diterima');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `divisi` varchar(255) NOT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `contact` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` int(11) NOT NULL,
  `active` varchar(1) NOT NULL DEFAULT 'N'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `divisi`, `nama`, `email`, `contact`, `username`, `password`, `role`, `active`) VALUES
(1, 'admin', 'Rizki', 'rizkiandika79@gmail.com', '546546', 'admin', '21232f297a57a5a743894a0e4a801fc3', 1, 'Y'),
(2, 'bak', 'ceking', 'ckingg9@gmail.com', '090490594', 'ceking', '21232f297a57a5a743894a0e4a801fc3', 2, 'Y'),
(10, 'upb', 'sohi gantenggg bangettttt', 'nvtzusy@gmail.com', '45645', 'shohi', '21232f297a57a5a743894a0e4a801fc3', 3, 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `user_token`
--

CREATE TABLE `user_token` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_token`
--

INSERT INTO `user_token` (`id`, `email`, `token`, `date_created`) VALUES
(1, 'ckingg9@gmail.com', 'pzNkfLdk06oFKLcf1hcPXp5YPd7fwArfOBzRF8L8aiw=', 1680824980),
(2, 'ckingg9@gmail.com', 'rUIiwiwGIOHApgWxJKyKNGFFQH6QwqgngC3iJ6hxbFQ=', 1680825248),
(3, 'ckingg9@gmail.com', 'jLqnn5Z8OHTzMolX9TnqMvmMG1dOxSLxAbEBsGzHy/I=', 1680825381),
(4, 'ckingg9@gmail.com', 'OBylwMHinjohBbKyuHt4iiSHSBf4kvaFea+ynDSLvUI=', 1680825446),
(5, 'ckingg9@gmail.com', 'zEXSXdJ5mEdqnmth3ygYxu+I49VWz75OE3skcdR40KE=', 1680825535);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `asal_barang`
--
ALTER TABLE `asal_barang`
  ADD PRIMARY KEY (`id_asal_barang`);

--
-- Indexes for table `aset`
--
ALTER TABLE `aset`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `barang_satuan`
--
ALTER TABLE `barang_satuan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `barang_temp`
--
ALTER TABLE `barang_temp`
  ADD PRIMARY KEY (`id_tmp`);

--
-- Indexes for table `golongan`
--
ALTER TABLE `golongan`
  ADD PRIMARY KEY (`id_golongan`);

--
-- Indexes for table `jenis_barang`
--
ALTER TABLE `jenis_barang`
  ADD PRIMARY KEY (`id_jenis_barang`);

--
-- Indexes for table `klasifikasi`
--
ALTER TABLE `klasifikasi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lantai`
--
ALTER TABLE `lantai`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `user_token`
--
ALTER TABLE `user_token`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `asal_barang`
--
ALTER TABLE `asal_barang`
  MODIFY `id_asal_barang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `aset`
--
ALTER TABLE `aset`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=255;

--
-- AUTO_INCREMENT for table `barang_satuan`
--
ALTER TABLE `barang_satuan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `barang_temp`
--
ALTER TABLE `barang_temp`
  MODIFY `id_tmp` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `golongan`
--
ALTER TABLE `golongan`
  MODIFY `id_golongan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `jenis_barang`
--
ALTER TABLE `jenis_barang`
  MODIFY `id_jenis_barang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `klasifikasi`
--
ALTER TABLE `klasifikasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `lantai`
--
ALTER TABLE `lantai`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `pengajuan`
--
ALTER TABLE `pengajuan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `user_token`
--
ALTER TABLE `user_token`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
