-- phpMyAdmin SQL Dump
-- version 4.6.6deb1+deb.cihar.com~xenial.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Feb 05, 2018 at 10:22 AM
-- Server version: 5.7.20-0ubuntu0.16.04.1
-- PHP Version: 7.0.26-2+ubuntu16.04.1+deb.sury.org+2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_futsal`
--

-- --------------------------------------------------------

--
-- Table structure for table `agenda`
--

CREATE TABLE `agenda` (
  `id` int(11) NOT NULL,
  `id_owner` int(11) DEFAULT NULL,
  `judul` varchar(100) DEFAULT NULL,
  `isiagenda` text,
  `tanggal_posting` date DEFAULT NULL,
  `tanggal_kegiatan` date DEFAULT NULL,
  `foto_agenda` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `agenda`
--

INSERT INTO `agenda` (`id`, `id_owner`, `judul`, `isiagenda`, `tanggal_posting`, `tanggal_kegiatan`, `foto_agenda`) VALUES
(1, 10, 'Pemkot Rembang Cup', 'asas', '2017-08-11', '2017-08-18', '1502444063.png'),
(3, 10, 'Kompetisi Futsal Cup sekabupaten sleman', 'asas', '2017-08-14', '2017-08-14', '1502683930.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `akses_admin`
--

CREATE TABLE `akses_admin` (
  `id_admin` int(11) NOT NULL,
  `username_admin` varchar(30) NOT NULL,
  `password_admin` varchar(32) NOT NULL,
  `nama_admin` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `akses_admin`
--

INSERT INTO `akses_admin` (`id_admin`, `username_admin`, `password_admin`, `nama_admin`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'administrator');

-- --------------------------------------------------------

--
-- Table structure for table `data_lapangan`
--

CREATE TABLE `data_lapangan` (
  `id_lapangan` int(11) NOT NULL,
  `kd_lapangan` varchar(11) DEFAULT NULL,
  `id_owner` int(11) DEFAULT NULL,
  `nama_lapangan` varchar(200) DEFAULT NULL,
  `foto_lapangan` varchar(50) DEFAULT NULL,
  `ket_lapangan` text,
  `info_harga` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data_lapangan`
--

INSERT INTO `data_lapangan` (`id_lapangan`, `kd_lapangan`, `id_owner`, `nama_lapangan`, `foto_lapangan`, `ket_lapangan`, `info_harga`) VALUES
(1, NULL, 1, 'Lapangan Satua', '1502441434.png', 'asas', '200000'),
(2, NULL, 2, 'Lapangan Dua', '1502441488.png', 'Asik', '300001'),
(3, NULL, 3, 'Lapangan Duaa', NULL, 'Asik', '20000'),
(4, NULL, 10, 'Lapangan Satus', '1502446055.png', 'as', '2000');

-- --------------------------------------------------------

--
-- Table structure for table `jadwal`
--

CREATE TABLE `jadwal` (
  `id_jadwal` int(11) NOT NULL,
  `id_member` int(11) DEFAULT NULL,
  `id_owner` int(11) DEFAULT NULL,
  `id_lapangan` int(11) DEFAULT NULL,
  `tgl_pesan` date DEFAULT NULL,
  `jam_pesan` time DEFAULT NULL,
  `exp_hour` date DEFAULT NULL,
  `tgl_main` date DEFAULT NULL,
  `jam_awal` time DEFAULT NULL,
  `jam_akhir` time DEFAULT NULL,
  `status` enum('0','1') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jadwal`
--

INSERT INTO `jadwal` (`id_jadwal`, `id_member`, `id_owner`, `id_lapangan`, `tgl_pesan`, `jam_pesan`, `exp_hour`, `tgl_main`, `jam_awal`, `jam_akhir`, `status`) VALUES
(1, 4, 3, 3, NULL, NULL, NULL, '2017-08-03', '02:00:00', '03:00:00', NULL),
(6, 8, 10, 4, '2017-08-13', '19:39:11', '2017-08-15', '2017-08-14', '06:30:00', '07:30:00', '0'),
(8, 9, 2, 2, '2017-08-13', '19:41:34', '2017-08-15', '2017-08-16', '01:30:00', '02:30:00', '0'),
(9, 9, 10, 4, '2017-08-13', '19:43:57', '2017-08-15', '2017-08-12', '01:00:00', '02:00:00', '1'),
(10, 9, 10, 4, '2017-08-13', '19:46:39', '2017-08-15', '2017-08-13', '00:30:00', '01:30:00', '0');

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE `member` (
  `id_member` int(11) NOT NULL,
  `username_member` varchar(30) DEFAULT NULL,
  `password_member` varchar(32) DEFAULT NULL,
  `nama_member` varchar(30) DEFAULT NULL,
  `telephone_member` varchar(30) DEFAULT NULL,
  `alamat_member` text,
  `email_member` varchar(100) DEFAULT NULL,
  `status` enum('0','1') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`id_member`, `username_member`, `password_member`, `nama_member`, `telephone_member`, `alamat_member`, `email_member`, `status`) VALUES
(2, '', '63a9f0ea7bb98050796b649e85481845', 'rootas', '1', 'as', 'as@as.com', '0'),
(3, 'faris', '7d77e825b80cff62a72e680c1c81424f', 'faris', '0812', 'm', 'as@a.com', '0'),
(4, 'abdul', '82027888c5bb8fc395411cb6804a066c', 'abdul', '012', 'as', 'ka@a.com', '0'),
(5, 'budi', '00dfc53ee86af02e742515cdcf075ed3', 'budi', '0812', 'as', 'ansA@a.com', '0'),
(6, 'imam', 'eaccb8ea6090a40a98aa28c071810371', 'imam', '0912', 'alsk', 'kak@as.com', '0'),
(7, 'aman', '63a9f0ea7bb98050796b649e85481845', 'aroot', '081213', 'as', 'a@a.com', '0'),
(8, 'ismail', 'f3b32717d5322d7ba7c505c230785468', 'ismail', '0821212', 'a', 'ismail@mail.com', '0'),
(9, 'agung', 'e59cd3ce33a68f536c19fedb82a7936f', 'agunga', '0812', 'as', 'agung@agung.com', '0');

-- --------------------------------------------------------

--
-- Table structure for table `owner_futsal`
--

CREATE TABLE `owner_futsal` (
  `id_owner` int(11) NOT NULL,
  `username_owner` varchar(30) DEFAULT NULL,
  `password_owner` varchar(32) DEFAULT NULL,
  `nama_owner` varchar(30) DEFAULT NULL,
  `telp` varchar(50) DEFAULT NULL,
  `nama_futsal` varchar(50) DEFAULT NULL,
  `alamat_futsal` varchar(500) DEFAULT NULL,
  `fasilitas` varchar(300) DEFAULT NULL,
  `info_futsal` text,
  `foto_futsal` varchar(20) DEFAULT NULL,
  `status_aktif` enum('0','1') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `owner_futsal`
--

INSERT INTO `owner_futsal` (`id_owner`, `username_owner`, `password_owner`, `nama_owner`, `telp`, `nama_futsal`, `alamat_futsal`, `fasilitas`, `info_futsal`, `foto_futsal`, `status_aktif`) VALUES
(1, 'juan', '81dc9bdb52d04dc20036dbd8313ed055', 'Juan', '1212', NULL, 'as', 'asj', 'jas', NULL, '1'),
(2, 'juan', '81dc9bdb52d04dc20036dbd8313ed055', 'tes', '0812', 'as', 'as', 'asj\r\n', 'jas', '', '1'),
(3, 'as', 'f970e2767d0cfe75876ea857f92e319b', '1212', '123', NULL, 'as', 'ams', 'asm', '', '0'),
(9, 'as', 'f970e2767d0cfe75876ea857f92e319b', 'as', '12', NULL, 'a', 'as', 'as', '1502385506.jpg', '0'),
(10, 'budiawan', '4fa90b92498a7fec545ec0110c8697de', 'budiawan sujatmiko', '0812', 'Les Bleus', 'a', 'Kamar TIdur', 'Sangat Indah', '1502415773.jpg', '1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `agenda`
--
ALTER TABLE `agenda`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_owner` (`id_owner`);

--
-- Indexes for table `akses_admin`
--
ALTER TABLE `akses_admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `data_lapangan`
--
ALTER TABLE `data_lapangan`
  ADD PRIMARY KEY (`id_lapangan`),
  ADD KEY `id_owner` (`id_owner`);

--
-- Indexes for table `jadwal`
--
ALTER TABLE `jadwal`
  ADD PRIMARY KEY (`id_jadwal`),
  ADD KEY `id_member` (`id_member`,`id_owner`,`id_lapangan`),
  ADD KEY `id_owner` (`id_owner`),
  ADD KEY `id_lapangan` (`id_lapangan`);

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`id_member`);

--
-- Indexes for table `owner_futsal`
--
ALTER TABLE `owner_futsal`
  ADD PRIMARY KEY (`id_owner`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `agenda`
--
ALTER TABLE `agenda`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `akses_admin`
--
ALTER TABLE `akses_admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `data_lapangan`
--
ALTER TABLE `data_lapangan`
  MODIFY `id_lapangan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `jadwal`
--
ALTER TABLE `jadwal`
  MODIFY `id_jadwal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `member`
--
ALTER TABLE `member`
  MODIFY `id_member` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `owner_futsal`
--
ALTER TABLE `owner_futsal`
  MODIFY `id_owner` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `agenda`
--
ALTER TABLE `agenda`
  ADD CONSTRAINT `agenda_ibfk_1` FOREIGN KEY (`id_owner`) REFERENCES `owner_futsal` (`id_owner`);

--
-- Constraints for table `data_lapangan`
--
ALTER TABLE `data_lapangan`
  ADD CONSTRAINT `data_lapangan_ibfk_1` FOREIGN KEY (`id_owner`) REFERENCES `owner_futsal` (`id_owner`);

--
-- Constraints for table `jadwal`
--
ALTER TABLE `jadwal`
  ADD CONSTRAINT `jadwal_ibfk_1` FOREIGN KEY (`id_owner`) REFERENCES `owner_futsal` (`id_owner`),
  ADD CONSTRAINT `jadwal_ibfk_2` FOREIGN KEY (`id_member`) REFERENCES `member` (`id_member`),
  ADD CONSTRAINT `jadwal_ibfk_3` FOREIGN KEY (`id_lapangan`) REFERENCES `data_lapangan` (`id_lapangan`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
