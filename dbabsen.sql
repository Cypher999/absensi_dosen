-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 21, 2020 at 06:00 PM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `dbabsen`
--
CREATE DATABASE IF NOT EXISTS `dbabsen` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `dbabsen`;

-- --------------------------------------------------------

--
-- Table structure for table `absen`
--

CREATE TABLE IF NOT EXISTS `absen` (
  `id_data` int(11) NOT NULL,
  `nidn` varchar(15) NOT NULL,
  `tgl` date NOT NULL,
  `jam` time NOT NULL,
  `absen` varchar(1) NOT NULL,
  `ket` varchar(200) NOT NULL,
  `status` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `absen`
--

INSERT INTO `absen` (`id_data`, `nidn`, `tgl`, `jam`, `absen`, `ket`, `status`) VALUES
(1, '234', '2020-03-20', '22:47:00', 'd', 'Mengajar matakuliah ilmu gaib dikelas MI 666', 'A'),
(2, '123', '2020-03-21', '12:05:00', 'd', 'Mengajar di kelas MI 4 mata kuliah jurusan akuntan', 'A'),
(3, '123', '2020-03-21', '12:07:00', 'p', 'Mengajar Selesai', 'A'),
(4, '345', '2020-03-21', '12:09:00', 'i', 'Izin menghadiri acara diklat ke planet mars, surat sudah dikirim tanggal 31 februari 2020', 'A'),
(5, '456', '2020-03-21', '12:13:00', 's', 'Sakit dikarenakan keracunan hidrogen di kantor pusat spaceX', 'A'),
(6, '567', '2020-03-21', '12:16:00', 's', 'sakit cedera tulang setelah berduel dengan banteng', 'D'),
(7, '234', '2020-03-21', '12:28:00', 'd', 'Mengaar dilokal mi3 , mi4, dan mi5 urusan teknik pengobatan alternatif', 'A'),
(8, '234', '2020-03-21', '12:29:00', 'p', 'pulang sebelum waktunya dikarenakan tiba-tiba dapat panggilan dari hutan amazon, ular boa peliharaan saya lepas dan masuk ke perkampungan', 'A');

-- --------------------------------------------------------

--
-- Table structure for table `dosen`
--

CREATE TABLE IF NOT EXISTS `dosen` (
  `nidn` varchar(15) NOT NULL,
  `nm_dosen` varchar(30) NOT NULL,
  `alt` varchar(30) NOT NULL,
  `jekel` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dosen`
--

INSERT INTO `dosen` (`nidn`, `nm_dosen`, `alt`, `jekel`) VALUES
('123', 'secretary', 'las vegas', 'P'),
('234', 'skull_e', 'hell_e', 'P'),
('345', 'lazy girl', 'house', 'P'),
('456', 'elon musk', 'amerika serikat', 'L'),
('567', 'fighter', 'kerinci', 'L');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL,
  `nm_user` varchar(30) NOT NULL,
  `pass` varchar(50) NOT NULL,
  `type` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `nm_user`, `pass`, `type`) VALUES
(1, 'admin', '232', 'admin'),
(3, '234', '12345', 'dosen'),
(4, '123', '123xxx', 'dosen'),
(5, '345', '345xxx', 'dosen'),
(6, '456', '456xxx', 'dosen'),
(7, '567', '567xxx', 'dosen');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `absen`
--
ALTER TABLE `absen`
 ADD PRIMARY KEY (`id_data`);

--
-- Indexes for table `dosen`
--
ALTER TABLE `dosen`
 ADD PRIMARY KEY (`nidn`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
 ADD PRIMARY KEY (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
