-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 28, 2019 at 01:27 AM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rentalmobil`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `username` varchar(10) NOT NULL,
  `password` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`username`, `password`) VALUES
('admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_mobil`
--

CREATE TABLE `tbl_mobil` (
  `id_mobil` varchar(15) NOT NULL,
  `tipe_mobil` varchar(50) NOT NULL,
  `foto_mobil` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_mobil`
--

INSERT INTO `tbl_mobil` (`id_mobil`, `tipe_mobil`, `foto_mobil`) VALUES
('MOBIL0001', 'Toyota Avanza', 'MOBIL0001.jpg'),
('MOBIL0002', 'Daihatsu Xenia', 'MOBIL0002.png');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pelanggan`
--

CREATE TABLE `tbl_pelanggan` (
  `id_pelanggan` varchar(15) NOT NULL,
  `nik_pelanggan` varchar(16) NOT NULL,
  `nama_pelanggan` varchar(50) NOT NULL,
  `nohp_pelanggan` varchar(12) NOT NULL,
  `email_pelanggan` varchar(30) NOT NULL,
  `password_pelanggan` varchar(15) NOT NULL,
  `alamat_pelanggan` text NOT NULL,
  `foto_pelanggan` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_pelanggan`
--

INSERT INTO `tbl_pelanggan` (`id_pelanggan`, `nik_pelanggan`, `nama_pelanggan`, `nohp_pelanggan`, `email_pelanggan`, `password_pelanggan`, `alamat_pelanggan`, `foto_pelanggan`) VALUES
('PELANGGAN0001', '9171030506960007', 'Muhammad Iriansyah', '082248080870', 'ryanjoker87@gmail.com', 'ryan', 'Jl. H Junib No. 18 RT 014 RW 007', 'PELANGGAN0001.jpg'),
('PELANGGAN0002', '9171030506960008', 'Muhammad Angga', '081354141927', 'angga@gmail.com', 'angga', 'Jl. Polimak', 'PELANGGAN0002.png'),
('PELANGGAN0003', '91710606060697', 'rudolf', '081545546778', 'rudolf@gmail.com', 'rudolf', 'Base G', 'PELANGGAN0003.jpg'),
('PELANGGAN0004', '991434946734949', 'angga saputra', '081344488782', 'asyhptr@gmail.com', 'angga', 'polimak', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_sewa`
--

CREATE TABLE `tbl_sewa` (
  `id_sewa` varchar(15) NOT NULL,
  `id_pelanggan` varchar(15) NOT NULL,
  `id_supir` varchar(15) NOT NULL,
  `alamat_pengantaran` text NOT NULL,
  `tanggal_mulai` timestamp NULL DEFAULT NULL,
  `tanggal_selesai` timestamp NULL DEFAULT NULL,
  `tanggal_kembali` timestamp NULL DEFAULT NULL,
  `supir` int(1) NOT NULL,
  `durasi_sewa` int(5) NOT NULL,
  `biaya` int(10) NOT NULL,
  `denda` int(10) DEFAULT NULL,
  `selesai` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_sewa`
--

INSERT INTO `tbl_sewa` (`id_sewa`, `id_pelanggan`, `id_supir`, `alamat_pengantaran`, `tanggal_mulai`, `tanggal_selesai`, `tanggal_kembali`, `supir`, `durasi_sewa`, `biaya`, `denda`, `selesai`) VALUES
('SEWA0001', 'PELANGGAN0001', 'SUPIR0001', 'junib', '2019-01-26 04:51:00', '2019-01-27 04:51:00', '2019-01-27 04:51:00', 1, 1, 500000, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_supir`
--

CREATE TABLE `tbl_supir` (
  `id_supir` varchar(15) NOT NULL,
  `nik_supir` varchar(16) NOT NULL,
  `nama_supir` varchar(50) NOT NULL,
  `nohp_supir` varchar(12) NOT NULL,
  `email_supir` varchar(30) NOT NULL,
  `password_supir` varchar(15) NOT NULL,
  `alamat_supir` text NOT NULL,
  `foto_supir` text,
  `id_mobil` varchar(15) NOT NULL,
  `no_polisi` varchar(15) NOT NULL,
  `tahun` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_supir`
--

INSERT INTO `tbl_supir` (`id_supir`, `nik_supir`, `nama_supir`, `nohp_supir`, `email_supir`, `password_supir`, `alamat_supir`, `foto_supir`, `id_mobil`, `no_polisi`, `tahun`) VALUES
('SUPIR0001', '9171022103870005', 'Agus Sugiarto', '081344907733', 'ryanjoker87@gmail.com', 'agus', 'Polimak', 'SUPIR0001.jpg', 'MOBIL0002', 'PA 1789 RC', '2018'),
('SUPIR0002', '9171022103860058', 'Nasir', '085244890767', 'nasir@gmail.com', 'nasir', 'Apo', NULL, 'MOBIL0002', 'PA 1695 RB', '2014'),
('SUPIR0003', '9171034983734889', 'Sahar', '085387987899', 'sahar@gmail.com', 'sahar', 'Entrop', 'SUPIR0003.jpg', 'MOBIL0002', 'PA 1687 RB', '2018'),
('SUPIR0004', '9171064567493927', 'Usman', '081344980846', 'usman@gmail.com', 'usman', 'Dok 5', 'SUPIR0004.jpg', 'MOBIL0001', 'PA 1415 AR', '2017'),
('SUPIR0005', '9171068478237482', 'Eddy', '085244985758', 'eddy@gmail.com', 'eddy', 'Hamadi', NULL, 'MOBIL0001', 'PA 1631 RB', '2016'),
('SUPIR0006', '9171068347823474', 'Baim', '081344897854', 'baim@gmail.com', 'baim', 'Entrop', NULL, 'MOBIL0001', 'PA 1405 RA', '2014'),
('SUPIR0007', '9171038742367645', 'David', '081344643847', 'david@gmail.com', 'david', 'Apo', 'SUPIR0007.jpg', 'MOBIL0001', 'PA 1811 RB', '2014'),
('SUPIR0008', '9171983928676789', 'Asril', '085244873249', 'asril@gmail.com', 'asril', 'Paldam', NULL, 'MOBIL0001', 'PA 1832 AV', '2014'),
('SUPIR0009', '9171984933782703', 'Adi', '081344524764', 'adi@gmail.com', 'adi', 'Entrop', NULL, 'MOBIL0001', 'PA 1474 AG', '2018'),
('SUPIR0010', '9171874374836470', 'Zakaria', '085244732736', 'zakaria@gmail.com', 'zakaria', 'Hamadi', NULL, 'MOBIL0001', 'PA 1241 AM', '2017');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `tbl_mobil`
--
ALTER TABLE `tbl_mobil`
  ADD PRIMARY KEY (`id_mobil`);

--
-- Indexes for table `tbl_pelanggan`
--
ALTER TABLE `tbl_pelanggan`
  ADD PRIMARY KEY (`id_pelanggan`);

--
-- Indexes for table `tbl_sewa`
--
ALTER TABLE `tbl_sewa`
  ADD PRIMARY KEY (`id_sewa`),
  ADD KEY `id_pelanggan` (`id_pelanggan`),
  ADD KEY `id_supir` (`id_supir`);

--
-- Indexes for table `tbl_supir`
--
ALTER TABLE `tbl_supir`
  ADD PRIMARY KEY (`id_supir`),
  ADD KEY `id_mobil` (`id_mobil`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_sewa`
--
ALTER TABLE `tbl_sewa`
  ADD CONSTRAINT `tbl_sewa_ibfk_2` FOREIGN KEY (`id_pelanggan`) REFERENCES `tbl_pelanggan` (`id_pelanggan`),
  ADD CONSTRAINT `tbl_sewa_ibfk_3` FOREIGN KEY (`id_supir`) REFERENCES `tbl_supir` (`id_supir`);

--
-- Constraints for table `tbl_supir`
--
ALTER TABLE `tbl_supir`
  ADD CONSTRAINT `tbl_supir_ibfk_1` FOREIGN KEY (`id_mobil`) REFERENCES `tbl_mobil` (`id_mobil`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
