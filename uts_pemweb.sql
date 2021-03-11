-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 11, 2021 at 06:54 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `uts_pemweb`
--
CREATE DATABASE IF NOT EXISTS `uts_pemweb` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `uts_pemweb`;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `category_id` char(5) NOT NULL,
  `category_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `category_name`) VALUES
('C0001', 'Makanan Ringan'),
('C0002', 'Makanan Berat'),
('C0003', 'Minuman');

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `id` int(11) NOT NULL,
  `category_id` char(5) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `harga` bigint(20) UNSIGNED NOT NULL,
  `deskripsi` varchar(255) NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id`, `category_id`, `nama`, `harga`, `deskripsi`, `gambar`, `created_at`, `updated_at`) VALUES
(3, 'C0001', 'Eomuk', 50000, 'Ini Deskripsi Eomuk', 'Eomuk.png', '2021-03-11 20:39:37', '2021-03-11 20:39:37'),
(4, 'C0003', 'Strawberry Milk', 20000, 'Ini Deskripsi Strawberry Milk', 'StrawberryMilk.png', '2021-03-11 20:39:37', '2021-03-11 20:39:37'),
(5, 'C0001', 'Tteokbokki', 40000, 'Ini Deskripsi Tteokbokki', 'Tteokbokki.png', '2021-03-11 21:06:03', '2021-03-11 21:06:03'),
(6, 'C0001', 'Kimbap', 35000, 'Ini Deskripsi Kimbap', 'Kimbab.png', '2021-03-11 21:06:03', '2021-03-11 21:06:03'),
(7, 'C0001', 'Corndog', 40000, 'Ini Deskripsi Corndog', 'Corndog.png', '2021-03-11 21:06:03', '2021-03-11 21:06:03'),
(8, 'C0003', 'Butterfly Pea Tea Lemonade', 17000, 'Ini Deskripsi Butterfly pea tea lemonade', 'Butterflypeatealemonade.png', '2021-03-11 21:07:35', '2021-03-11 21:07:35'),
(9, 'C0003', 'Dalgona Latte', 25000, 'Ini Deskripsi Dalgona Latte', 'DalgonaLatte.png', '2021-03-11 21:07:35', '2021-03-11 21:07:35'),
(10, 'C0003', 'Blue Lemonade', 29000, 'Ini Deskripsi Blue lemonade', 'BlueLemonade.png', '2021-03-11 21:07:35', '2021-03-11 21:07:35'),
(11, 'C0002', 'Kimchi Fried Rice', 24000, 'Ini Deskripsi Kimchi fried rice', 'KimchiFriedRice.png', '2021-03-11 21:09:19', '2021-03-11 21:09:19'),
(12, 'C0002', 'Rapokki', 70000, 'Ini Deskripsi Rapokki', 'Rabokki.png', '2021-03-11 21:09:19', '2021-03-11 21:09:19'),
(13, 'C0002', 'Sweet and Spicy Chicken Wing', 150000, 'Ini Deskripsi Sweet and Spicy chicken wing', 'SweetSpicyChickenWing.png', '2021-03-11 21:09:19', '2021-03-11 21:09:19'),
(14, 'C0002', 'Bibimbap', 76000, 'Ini Deskripsi Bibimbap', 'Bibimbap.png', '2021-03-11 21:09:19', '2021-03-11 21:09:19');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `jenis_kelamin` enum('L','P') NOT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `menu`
--
ALTER TABLE `menu`
  ADD CONSTRAINT `menu_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `category` (`category_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
