-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 09, 2023 at 03:06 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `secrett_store`
--

-- --------------------------------------------------------

--
-- Table structure for table `pembelian`
--

CREATE TABLE `pembelian` (
  `id` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `harga` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `status` enum('Proses','Sukses') NOT NULL,
  `id_pembeli` int(11) NOT NULL,
  `diskon` enum('false','true','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pembelian`
--

INSERT INTO `pembelian` (`id`, `jumlah`, `nama`, `gambar`, `harga`, `total`, `status`, `id_pembeli`, `diskon`) VALUES
(17, 1, 'Maybelline Fit Me Bronzer', 'https://d3t32hsnjxo7q6.cloudfront.net/i/d4f7d82b4858c622bb3c1cef07b9d850_ra,w158,h184_pa,w158,h184.png', 152083, 152083, 'Sukses', 12, 'false'),
(18, 1, 'Maybelline Face Studio Master Hi-Light Light Booster Bronzer', 'https://d3t32hsnjxo7q6.cloudfront.net/i/991799d3e70b8856686979f8ff6dcfe0_ra,w158,h184_pa,w158,h184.png', 221548, 221548, 'Proses', 13, 'false'),
(19, 1, 'Maybelline Face Studio Master Hi-Light Light Booster Blush ', 'https://d3t32hsnjxo7q6.cloudfront.net/i/e8c59b78ebeaec5c4b6aeba49a9ff0f6_ra,w158,h184_pa,w158,h184.png', 221548, 221548, 'Proses', 13, 'false'),
(20, 2, 'Maybelline Face Studio Master Hi-Light Light Booster Bronzer', 'https://d3t32hsnjxo7q6.cloudfront.net/i/991799d3e70b8856686979f8ff6dcfe0_ra,w158,h184_pa,w158,h184.png', 221548, 443096, 'Proses', 13, 'false'),
(21, 2, 'Maybelline Face Studio Master Hi-Light Light Booster Bronzer', 'https://d3t32hsnjxo7q6.cloudfront.net/i/991799d3e70b8856686979f8ff6dcfe0_ra,w158,h184_pa,w158,h184.png', 221548, 398787, 'Proses', 13, 'false');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `tipe_skincare` varchar(255) NOT NULL,
  `kategori` varchar(255) NOT NULL,
  `umur` varchar(255) NOT NULL,
  `gender` enum('','Laki-laki','Perempuan') NOT NULL,
  `role` enum('VIP','MEMBER','ADMIN') NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `kondisi` text NOT NULL,
  `scan_date` date DEFAULT NULL,
  `pengajuan` enum('','Diminta','Diterima','Ditolak') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `username`, `tipe_skincare`, `kategori`, `umur`, `gender`, `role`, `gambar`, `kondisi`, `scan_date`, `pengajuan`) VALUES
(7, 'admin@gmail.com', '202cb962ac59075b964b07152d234b70', '', '', '', '', '', 'ADMIN', '/gambar/uranus.jpg', '', NULL, ''),
(12, 'budi@gmail.com', '202cb962ac59075b964b07152d234b70', 'Budi', '', '', '', 'Laki-laki', 'MEMBER', '/gambar/placeholder.jpg', '', NULL, ''),
(13, 'ridwal@gmail.com', '202cb962ac59075b964b07152d234b70', 'Ridwan', '', '', '', 'Laki-laki', 'MEMBER', '/gambar/placeholder.jpg', '', NULL, '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pembelian`
--
ALTER TABLE `pembelian`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_pembelian` (`id_pembeli`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pembelian`
--
ALTER TABLE `pembelian`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `pembelian`
--
ALTER TABLE `pembelian`
  ADD CONSTRAINT `user_pembelian` FOREIGN KEY (`id_pembeli`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
