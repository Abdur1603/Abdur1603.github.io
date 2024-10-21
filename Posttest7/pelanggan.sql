-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 21, 2024 at 02:17 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pelanggan`
--

-- --------------------------------------------------------

--
-- Table structure for table `data_plgn`
--

CREATE TABLE `data_plgn` (
  `id` int(10) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `no_hp` int(20) NOT NULL,
  `pembayaran` varchar(50) NOT NULL,
  `durasi` varchar(30) NOT NULL,
  `bukti_pembayaran` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `data_plgn`
--

INSERT INTO `data_plgn` (`id`, `nama`, `no_hp`, `pembayaran`, `durasi`, `bukti_pembayaran`) VALUES
(12, 'rahman', 2147483647, 'OVO', '6', '2024-10-16 11.30.45.png'),
(27, 'rahman', 12345, 'Transfer Bank', '6', '2024-10-16 22.00.10.png');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `role`) VALUES
(1, 'rahman', '$2y$10$DH.KT0siIydwmBAfVp.ll.xAYuq8Ht4Ld5ri0yT5eoUejCTo91glC', 'Admin'),
(2, 'vicky', '$2y$10$nYu471KU2OH7P4ATE0.C3eI4CbVZscK9dihFWfj0E1E7t54urpcwi', 'User');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `data_plgn`
--
ALTER TABLE `data_plgn`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `data_plgn`
--
ALTER TABLE `data_plgn`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
