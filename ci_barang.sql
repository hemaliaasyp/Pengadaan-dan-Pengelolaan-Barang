-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 22, 2022 at 12:36 PM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 7.3.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ci_barang`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `id_barang` char(7) NOT NULL,
  `kode_barang` varchar(255) NOT NULL,
  `nama_barang` varchar(255) NOT NULL,
  `stok` int(11) NOT NULL,
  `jenis_id` int(11) NOT NULL,
  `nama_satuan` varchar(255) NOT NULL,
  `type_barang` varchar(255) NOT NULL,
  `warna_barang` varchar(255) NOT NULL,
  `ukuran_barang` varchar(255) NOT NULL,
  `berat_barang` varchar(255) NOT NULL,
  `merk_barang` varchar(255) NOT NULL,
  `seri_barang` varchar(255) NOT NULL,
  `kode` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`id_barang`, `kode_barang`, `nama_barang`, `stok`, `jenis_id`, `nama_satuan`, `type_barang`, `warna_barang`, `ukuran_barang`, `berat_barang`, `merk_barang`, `seri_barang`, `kode`) VALUES
('B000002', '3301', 'kapur', 0, 93, 'pcs', '', '', '', '1 kg', '', '', '33'),
('B000003', '3001', 'Belati', 0, 91, 'pack', '', '', '', '1 kg', '', '', '3'),
('B000006', '3003', 'Belati', 0, 91, 'pack', '', '', '', '2 kg', '', '', '3'),
('B000009', '1801', 'Gunting', 0, 80, 'pack', '', '', '', '20gram', '', '', '18'),
('B000010', '3302', 'kapur', 0, 93, 'pack', '', '', '', '20gram', '', '', '33'),
('B000012', '3305', 'kapur', 0, 93, 'pack', '', '', '', '20gram', '', '', '33'),
('B000013', '3306', 'kapur', 0, 93, 'pack', '', '', '', '1 kg', '', '', '33'),
('B000017', '3309', 'kapur', 0, 93, 'pack', '', '', '', '1 kg', '', '', '33'),
('B000018', '3304', 'kapur', 0, 93, 'te', '', '', '', '20gram', '', '', '33'),
('B000019', '3307', 'kapur', 0, 93, 'pack', '', '', '', '1 kg', '', '', '33'),
('B000020', '3310', 'kapur', 0, 93, 'pack', '', '', '', '2 kg', '', '', '33'),
('B000021', '1002', 'Kertas Kado', 0, 52, 'pcs', '', '', '', '1 kg', '', '', '10'),
('B000022', '1003', 'Kertas BC', 0, 48, 'pack', '', '', '', '20gram', '', '', '10'),
('B000023', '1001', 'Kertas Karbon', 0, 53, 'te', '', '', '', '20gram', '', '', '10'),
('B000024', '3308', 'kapur', 0, 93, 'pcs', '', '', '', '1 kg', '', '', '33'),
('B000025', '3303', 'kapur', 0, 93, 'pack', '', '', '', '1 kg', '', '', '33');

-- --------------------------------------------------------

--
-- Table structure for table `barang_keluar`
--

CREATE TABLE `barang_keluar` (
  `id_barang_keluar` char(16) NOT NULL,
  `user_id` int(11) NOT NULL,
  `barang_id` char(7) NOT NULL,
  `jumlah_keluar` int(11) NOT NULL,
  `tanggal_keluar` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Triggers `barang_keluar`
--
DELIMITER $$
CREATE TRIGGER `update_stok_keluar` BEFORE INSERT ON `barang_keluar` FOR EACH ROW UPDATE `barang` SET `barang`.`stok` = `barang`.`stok` - NEW.jumlah_keluar WHERE `barang`.`id_barang` = NEW.barang_id
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `barang_masuk`
--

CREATE TABLE `barang_masuk` (
  `id_barang_masuk` char(16) NOT NULL,
  `supplier_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `barang_id` char(7) NOT NULL,
  `jumlah_masuk` int(11) NOT NULL,
  `tanggal_masuk` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Triggers `barang_masuk`
--
DELIMITER $$
CREATE TRIGGER `update_stok_masuk` BEFORE INSERT ON `barang_masuk` FOR EACH ROW UPDATE `barang` SET `barang`.`stok` = `barang`.`stok` + NEW.jumlah_masuk WHERE `barang`.`id_barang` = NEW.barang_id
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `jenis`
--

CREATE TABLE `jenis` (
  `id_jenis` int(11) NOT NULL,
  `kode_jenis` varchar(11) NOT NULL,
  `nama_jenis` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `jenis`
--

INSERT INTO `jenis` (`id_jenis`, `kode_jenis`, `nama_jenis`) VALUES
(39, '10', 'Kertas HVS'),
(47, '10', 'Kertas Asturo'),
(48, '10', 'Kertas BC'),
(49, '10', 'Kertas CD'),
(50, '10', 'Kertas Emas'),
(51, '10', 'Kertas Flip Chart'),
(52, '10', 'Kertas Kado'),
(53, '10', 'Kertas Karbon'),
(54, '10', 'Kertas Karton'),
(55, '10', 'Kertas Label'),
(56, '10', 'Kertas Manila'),
(57, '10', 'Kertas Marmer'),
(58, '10', 'Kertas Photo'),
(59, '10', 'Kertas Stiker'),
(60, '10', 'Kertas Thermal'),
(61, '10', 'Loose Leaf'),
(62, '11', 'Ballpoint'),
(63, '11', 'Isi Ballpoint'),
(64, '12', 'Isi Pensil'),
(65, '12', 'Pensil Kayu'),
(66, '12', 'Pensil Mekanik'),
(67, '12', 'Pensil Warna'),
(68, '13', 'Busur'),
(69, '13', 'Penggaris'),
(70, '14', 'Jangka'),
(71, '14', 'Kotak Pensil'),
(72, '15', 'Rautan Mekanik'),
(73, '15', 'Rautan Serut'),
(74, '16', 'Amplop'),
(75, '16', 'Amplop Linen'),
(76, '16', 'Amplop Tali'),
(77, '17', 'Correction Pen'),
(78, '17', 'Penghapus'),
(79, '18', 'Cutter'),
(80, '18', 'Gunting'),
(81, '18', 'Isi Cutter'),
(82, '19', 'Isi Spidol'),
(83, '19', 'Kapur Tulis'),
(84, '19', 'Spidol'),
(85, '19', 'Stabilo'),
(86, '20', 'Double Tape'),
(87, '20', 'Isolasi'),
(88, '20', 'Lem Cair'),
(89, '20', 'Lem Gel'),
(90, '20', 'Lem Stik'),
(91, '3', 'Belati'),
(92, '3', 'Dasi'),
(93, '33', 'kapur');

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `id_supplier` int(11) NOT NULL,
  `nama_supplier` varchar(50) NOT NULL,
  `no_telp` varchar(15) NOT NULL,
  `alamat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`id_supplier`, `nama_supplier`, `no_telp`, `alamat`) VALUES
(1, 'Fajri', '085348439785', 'Kalimantan Utara'),
(2, 'Khoirul', '081993335312', 'Madiun'),
(3, 'Tatak', '082245271900', 'Madiun'),
(12, 'Feby', '0895399680461', 'Madiun'),
(17, 'NANA', '081556334521', 'jl. mawar no 15');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `no_telp` varchar(15) NOT NULL,
  `role` enum('gudang','admin') NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` int(11) NOT NULL,
  `foto` text NOT NULL,
  `is_active` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nama`, `username`, `email`, `no_telp`, `role`, `password`, `created_at`, `foto`, `is_active`) VALUES
(1, 'Adminisitrator', 'admin', 'admin@admin.com', '025123456789', 'admin', '$2y$10$wMgi9s3FEDEPEU6dEmbp8eAAEBUXIXUy3np3ND2Oih.MOY.q/Kpoy', 1568689561, '62f184dcc03fe85271831466e01f12cf.png', 1),
(14, 'Feby Velerina', 'feby', 'feby@gmail.com', '0895399680461', 'gudang', '$2y$10$soyt1j//hRyW0VOXmbasyeydeyg0ci6q5oqNky.g96ORG.oCfAC3q', 1650941576, '0aba9f2a1184b134f63f821d905b82fc.JPG', 1),
(15, 'Hema', 'hema', 'hema@gmail.com', '085853587558', 'gudang', '$2y$10$2BsDCd6L7bEaYYT9RsJK5uEdd114tYfAKcY7Lgws8/X778UxjHnua', 1650941830, 'user.png', 1),
(16, 'Khoirul', 'khoirul', 'khoirul@gmail.com', '081993335310', 'gudang', '$2y$10$OYlqd6p1n029vsNypHjlJ.ca9ilCLk4BFG8gHnemtwL.k11a0QJbq', 1650941937, 'user.png', 1),
(17, 'Fajri', 'fajri', 'fajri@gmail.com', '085348439785', 'gudang', '$2y$10$9RWvMTkxnFGo3Cly9hFWneS.cZQvnuSm5f332JxVdkW4SlF9KDxLO', 1650941978, 'user.png', 1),
(18, 'Tatak', 'tatak', 'tatak@gmail.com', '082245271900', 'gudang', '$2y$10$uBkUKxMVAVO7Cv7VeG.6X.2VkbOMf0KzqoVTV21hHFi.dusmY.3ku', 1650942014, 'user.png', 1),
(28, 'Dina asta', 'dina', 'dina43@gmail.com', '081993335312', 'gudang', '$2y$10$ZvZMtrCdCCROEjW5BVHncOQjC.W/0C1m/H8ULgQ5DOnHYL/AiJqJC', 1654827187, 'user.png', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id_barang`),
  ADD KEY `kategori_id` (`jenis_id`);

--
-- Indexes for table `barang_keluar`
--
ALTER TABLE `barang_keluar`
  ADD PRIMARY KEY (`id_barang_keluar`),
  ADD KEY `id_user` (`user_id`),
  ADD KEY `barang_id` (`barang_id`);

--
-- Indexes for table `barang_masuk`
--
ALTER TABLE `barang_masuk`
  ADD PRIMARY KEY (`id_barang_masuk`),
  ADD KEY `id_user` (`user_id`),
  ADD KEY `supplier_id` (`supplier_id`),
  ADD KEY `barang_id` (`barang_id`);

--
-- Indexes for table `jenis`
--
ALTER TABLE `jenis`
  ADD PRIMARY KEY (`id_jenis`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`id_supplier`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `jenis`
--
ALTER TABLE `jenis`
  MODIFY `id_jenis` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=94;

--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `id_supplier` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `barang`
--
ALTER TABLE `barang`
  ADD CONSTRAINT `barang_ibfk_1` FOREIGN KEY (`jenis_id`) REFERENCES `jenis` (`id_jenis`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `barang_keluar`
--
ALTER TABLE `barang_keluar`
  ADD CONSTRAINT `barang_keluar_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `barang_keluar_ibfk_2` FOREIGN KEY (`barang_id`) REFERENCES `barang` (`id_barang`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `barang_masuk`
--
ALTER TABLE `barang_masuk`
  ADD CONSTRAINT `barang_masuk_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `barang_masuk_ibfk_2` FOREIGN KEY (`supplier_id`) REFERENCES `supplier` (`id_supplier`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `barang_masuk_ibfk_3` FOREIGN KEY (`barang_id`) REFERENCES `barang` (`id_barang`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
