-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 26, 2025 at 02:56 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tempahan_restoran_ssr`
--

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` varchar(50) NOT NULL,
  `kategori_menu` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `kategori_menu`) VALUES
('MK', 'MAKANAN'),
('MN', 'MINUMAN');

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `id_menu` varchar(50) NOT NULL,
  `nama_menu` varchar(100) DEFAULT NULL,
  `id_kategori` varchar(50) DEFAULT NULL,
  `keterangan` text DEFAULT NULL,
  `harga` double(5,2) DEFAULT NULL,
  `gambar` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id_menu`, `nama_menu`, `id_kategori`, `keterangan`, `harga`, `gambar`) VALUES
('M01', 'Pepperoni Pizza', 'MK', 'Pepperoni,sos merah dan cheese', 25.00, '2024-12-24-085050.jpg'),
('M02', 'Sausage Pizza', 'MK', 'Sos pedas,salami ayam dan cheese', 40.00, '2024-12-24-085656.jpg'),
('M03', 'Truffle Mushroom Pizza', 'MK', 'Cendawan dan Krim truffle', 15.00, '2024-12-24-085356.jpg'),
('M04', 'Extra Cheese Pizza', 'MK', '30% extra mozzarella cheese', 30.00, '2024-12-24-085234.jpg'),
('M05', 'Durian Pizza', 'MK', 'Bentong Durian dan cheese', 44.00, '2025-01-10-080442.jpg'),
('M10', 'Mineral Water', 'MN', 'Air mineral', 4.00, '2024-12-24-093023.png'),
('M13', 'Peppsi', 'MN', 'Soda', 9.00, '2024-12-24-093243.png'),
('M15', 'Orang Juice', 'MN', 'Jus oren', 14.00, '2024-12-24-092726.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `pengguna`
--

CREATE TABLE `pengguna` (
  `notel` varchar(15) NOT NULL,
  `nama` varchar(60) DEFAULT NULL,
  `tahap` varchar(30) DEFAULT NULL,
  `katalaluan` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pengguna`
--

INSERT INTO `pengguna` (`notel`, `nama`, `tahap`, `katalaluan`) VALUES
('1234567890', 'admin', 'ADMIN', '123'),
('0123456789', 'user', 'PEMBELI', '012');

-- --------------------------------------------------------

--
-- Table structure for table `resit`
--

CREATE TABLE `resit` (
  `no_resit` varchar(30) NOT NULL,
  `notel` varchar(15) DEFAULT NULL,
  `tarikh` timestamp NOT NULL DEFAULT current_timestamp(),
  `jenis_tempahan` varchar(50) DEFAULT NULL,
  `status_tempahan` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tempahan`
--

CREATE TABLE `tempahan` (
  `no_resit` varchar(30) NOT NULL,
  `id_menu` varchar(50) NOT NULL,
  `harga_asal` double(5,2) DEFAULT NULL,
  `kuantiti` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id_menu`),
  ADD KEY `id_kategori` (`id_kategori`);

--
-- Indexes for table `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`notel`);

--
-- Indexes for table `resit`
--
ALTER TABLE `resit`
  ADD PRIMARY KEY (`no_resit`),
  ADD KEY `notel` (`notel`);

--
-- Indexes for table `tempahan`
--
ALTER TABLE `tempahan`
  ADD PRIMARY KEY (`no_resit`,`id_menu`),
  ADD KEY `id_menu` (`id_menu`),
  ADD KEY `no_resit` (`no_resit`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `menu`
--
ALTER TABLE `menu`
  ADD CONSTRAINT `menu_ibfk_1` FOREIGN KEY (`id_kategori`) REFERENCES `kategori` (`id_kategori`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `resit`
--
ALTER TABLE `resit`
  ADD CONSTRAINT `resit_ibfk_1` FOREIGN KEY (`notel`) REFERENCES `pengguna` (`notel`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tempahan`
--
ALTER TABLE `tempahan`
  ADD CONSTRAINT `tempahan_ibfk_1` FOREIGN KEY (`no_resit`) REFERENCES `resit` (`no_resit`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tempahan_ibfk_2` FOREIGN KEY (`id_menu`) REFERENCES `menu` (`id_menu`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
