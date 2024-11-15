-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 15, 2024 at 04:00 AM
-- Server version: 8.0.30
-- PHP Version: 8.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_absen`
--

-- --------------------------------------------------------

--
-- Table structure for table `access_logs`
--

CREATE TABLE `access_logs` (
  `id` int NOT NULL,
  `user_ip` varchar(45) DEFAULT NULL,
  `access_time` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `token_used` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_absen`
--

CREATE TABLE `tb_absen` (
  `id` int NOT NULL,
  `namaSiswa` varchar(255) NOT NULL,
  `kelas` varchar(255) NOT NULL,
  `statusAbsen` varchar(255) NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `nis` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tb_absen`
--

INSERT INTO `tb_absen` (`id`, `namaSiswa`, `kelas`, `statusAbsen`, `time`, `nis`) VALUES
(4, 'riffa', '11 ', 'Hadir', '2024-10-31 15:03:18', '9'),
(5, 'riffa', '11 PPLG', 'Hadir', '2024-11-01 00:43:04', '0897377729'),
(7, 'kemal', '12 pplg', 'Hadir', '2024-11-08 03:38:57', '11223344'),
(8, 'riffa', '10 PPLG', 'Hadir', '2024-11-12 12:15:08', '08080808'),
(9, 'Maulana Ibrahim kemal', '11 PPLG', 'Hadir', '2024-11-15 02:11:57', '0897377729'),
(10, 'Maulana Ibrahim kemal ganteng', '11 PPLG', 'Hadir', '2024-11-15 02:12:37', '0798776'),
(11, 'Maulana Ibrahim kemal ganteng banget', '11 PPLG', 'Sakit', '2024-11-15 02:12:58', '3782764734826'),
(12, 'riffa', '10 FARMASI', 'Hadir', '2024-11-15 03:18:25', '08080808'),
(13, 'Maulana Ibrahim kemal', '12 pplg', 'Hadir', '2024-11-15 03:21:25', '11223344');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pegawai`
--

CREATE TABLE `tb_pegawai` (
  `id` int NOT NULL,
  `namaPegawai` varchar(255) NOT NULL,
  `noPegawai` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tb_pegawai`
--

INSERT INTO `tb_pegawai` (`id`, `namaPegawai`, `noPegawai`, `password`) VALUES
(1, '', '', '0192023a7bbd73250516f069df18b500'),
(2, 'septian', '909090', '0192023a7bbd73250516f069df18b500'),
(4, 'riffa', '1234', 'ac43724f16e9241d990427ab7c8f4228'),
(5, 'riffa', '909090', '827ccb0eea8a706c4c34a16891f84e7b'),
(6, 'septian', '909090', '76d80224611fc919a5d54f0ff9fba446'),
(7, 'resya', '098', '8d804a5c53b69a7342c5c3c7ddc5364d');

-- --------------------------------------------------------

--
-- Table structure for table `tb_siswa`
--

CREATE TABLE `tb_siswa` (
  `id` int NOT NULL,
  `namaSiswa` varchar(255) NOT NULL,
  `nis` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tb_siswa`
--

INSERT INTO `tb_siswa` (`id`, `namaSiswa`, `nis`, `password`) VALUES
(1, 'riffa', '08080808', '94be33431995263650ee64a5e7b7741f'),
(2, 'dewa abdul', '707070', 'd7fa1fafa855f05e7691272db77a2953'),
(3, 'kemal', '11223344', '248cbc4e10585276190ec3b8218ff1a7'),
(4, 'Maulana Ibrahim kemal', '098098', '94be33431995263650ee64a5e7b7741f'),
(5, 'Maulana Ibrahim kemal', '098098', '94be33431995263650ee64a5e7b7741f'),
(6, 'Maulana Ibrahim kemal', '098098', '94be33431995263650ee64a5e7b7741f'),
(7, 'Maulana Ibrahim kemal', '123456789', '5bc8640bb69c6616ddfc2be733b4ca90'),
(8, 'Maulana Ibrahim kemal', '123456789', 'c449dc4c509fcf3200422e2b95244154'),
(9, 'dewa abdul malik', '09876', 'd7fa1fafa855f05e7691272db77a2953');

-- --------------------------------------------------------

--
-- Table structure for table `tb_tokens`
--

CREATE TABLE `tb_tokens` (
  `id` int NOT NULL,
  `date` date NOT NULL,
  `token` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tb_tokens`
--

INSERT INTO `tb_tokens` (`id`, `date`, `token`) VALUES
(1, '2024-11-08', '1fe2257fa607e2aac6c4f5bbc0a3e58b');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `access_logs`
--
ALTER TABLE `access_logs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_absen`
--
ALTER TABLE `tb_absen`
  ADD PRIMARY KEY (`id`,`nis`);

--
-- Indexes for table `tb_pegawai`
--
ALTER TABLE `tb_pegawai`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_siswa`
--
ALTER TABLE `tb_siswa`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_tokens`
--
ALTER TABLE `tb_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `date` (`date`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `access_logs`
--
ALTER TABLE `access_logs`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_absen`
--
ALTER TABLE `tb_absen`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tb_pegawai`
--
ALTER TABLE `tb_pegawai`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tb_siswa`
--
ALTER TABLE `tb_siswa`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tb_tokens`
--
ALTER TABLE `tb_tokens`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
