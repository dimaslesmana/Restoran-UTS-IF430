-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 14, 2021 at 05:05 AM
-- Server version: 10.3.27-MariaDB-log-cll-lve
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dimasles_uts_pemweb`
--
CREATE DATABASE IF NOT EXISTS `dimasles_uts_pemweb` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `dimasles_uts_pemweb`;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `category_id` char(5) NOT NULL,
  `category_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`category_id`, `category_name`) VALUES
('C0001', 'Snacks'),
('C0002', 'Meals'),
('C0003', 'Beverages');

-- --------------------------------------------------------

--
-- Table structure for table `menus`
--

CREATE TABLE `menus` (
  `id` int(11) NOT NULL,
  `category_id` char(5) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `harga` bigint(20) UNSIGNED NOT NULL,
  `deskripsi` longtext NOT NULL,
  `gambar` mediumtext NOT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `menus`
--

INSERT INTO `menus` (`id`, `category_id`, `nama`, `harga`, `deskripsi`, `gambar`, `created_at`, `updated_at`) VALUES
(1, 'C0001', 'Eomuk', 50000, 'Eomuk atau yang biasa disebut juga Odeng, merupakan daging ikan yang \r\ndihaluskan lalu dicampur tepung terigu dan beberapa bumbu. Kemudian ditusuk \r\ndengan tusuk sate dan direbus dengan kaldu.', 'Eomuk.png', '2021-03-11 20:39:37', '2021-03-11 20:39:37'),
(2, 'C0003', 'Strawberry Milk', 20000, 'Cocok dibarengi ketika memakan makanan pedas, minuman ini memiliki senasi\r\nfresh dari susu segar dan juga manis dari strawberry terbaik yang fresh.', 'StrawberryMilk.png', '2021-03-11 20:39:37', '2021-03-11 20:39:37'),
(3, 'C0001', 'Tteokbokki', 40000, 'Tteokbokki terbuat dari garaetteok (kue beras berbentuk silinder bertekstur \r\nkenyal) yang direbus dengan saus gochujang (pasta cabai yang difermentasi).', 'Tteokbokki.png', '2021-03-11 21:06:03', '2021-03-11 21:06:03'),
(4, 'C0001', 'Kimbap', 35000, 'Kimbap terdiri dari nasi putih dibumbui dengan garam dan minyak wijen yang \r\ndigulung rumput laut serta terdapat daging dan sayur didalamnya. dagingnya\r\nberupa iga sapi, dan untuk sayurnya berupa ketimun, bayam, dan wortel. Kamu\r\nakan mendapatkan 6 pcs kimbap ketika memesan menu ini.', 'Kimbab.png', '2021-03-11 21:06:03', '2021-03-11 21:06:03'),
(5, 'C0001', 'Corndog', 40000, 'Corndog atau biasa disebut dokkebi hotdog merupakan jajanan khas korea selatan\r\nyang mengkombinasikan sosis dengan adonan tepung yang tebal. Biasanya disajikan\r\ndengan saus sambal, saus tomat, dan juga mustard', 'Corndog.png', '2021-03-11 21:06:03', '2021-03-11 21:06:03'),
(6, 'C0003', 'Butterfly Pea Tea Lemonade', 17000, 'Warna biru gelap yang berasal dari bunga butterfly pea, dan juga rasa segar dari\r\nlemon dan sparkling soda serta rasa mint dari daun mint akan memberikan \r\nsensasi yang baru ketika Anda meminum Butterfly pea tea lemonade ini.', 'Butterflypeatealemonade.png', '2021-03-11 21:07:35', '2021-03-11 21:07:35'),
(7, 'C0003', 'Dalgona Latte', 25000, 'Dalgona terbuat dari gula dan baking soda yang mengeras lalu dihancurkan menjadi\r\nberkeping keping lalu ditaburkan keatas susu.', 'DalgonaLatte.png', '2021-03-11 21:07:35', '2021-03-11 21:07:35'),
(8, 'C0003', 'Blue Lemonade', 29000, 'Warna biru terang yang berasal dari sirup, dan air soda serta perasaan air \r\nlemon. Cocok diminum ketika panas atau sedang memakan makanan pedas.', 'BlueLemonade.png', '2021-03-11 21:07:35', '2021-03-11 21:07:35'),
(9, 'C0002', 'Kimchi Fried Rice', 24000, 'Berbeda dengan nasi goreng pada umumnya, kimchi fried rice ini merupakan nasi\r\nyang digoreng menggunakan minyak wijen serta diberikan kimchi didalamnya, serta\r\ntopping telur mata sapi dan juga ham sapi', 'KimchiFriedRice.png', '2021-03-11 21:09:19', '2021-03-11 21:09:19'),
(10, 'C0002', 'Rapokki', 70000, 'Rapokki merupakan kombinasi dari ramyun atau mie korea dan juga tteokbokki dan\r\nberbagai macam topping seperti eomuk, sosis, telur, dan juga daun bawang.', 'Rabokki.png', '2021-03-11 21:09:19', '2021-03-11 21:09:19'),
(11, 'C0002', 'Sweet and Spicy Chicken Wing', 150000, 'Sayap ayam dengan racikan saus yang memberikan sensasi pedas dan manis secara\r\nbersamaan. Terdapat sebanyak 8pcs sayap ayam yang akan didapatkan ketika membeli\r\nmenu ini.', 'SweetSpicyChickenWing.png', '2021-03-11 21:09:19', '2021-03-11 21:09:19'),
(12, 'C0002', 'Bibimbap', 76000, 'Semangkuk nasi putih dengan beberapa lauk didalamnya berupa sayur-sayuran, daging\r\nsapi, telur, dan saus gochujang. Semua komponen diaduk hingga rata agar makanan ini\r\nterasa lebih nikmat.', 'Bibimbap.png', '2021-03-11 21:09:19', '2021-03-11 21:09:19');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `harga` bigint(20) UNSIGNED NOT NULL,
  `deskripsi` longtext NOT NULL,
  `gambar` mediumtext NOT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `role_id` char(5) NOT NULL,
  `role_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`role_id`, `role_name`) VALUES
('R0001', 'Admin'),
('R0002', 'User');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `role_id` char(5) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `jenis_kelamin` enum('L','P') NOT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `email` (`email`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`role_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `role_id` (`role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `menus`
--
ALTER TABLE `menus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `menus`
--
ALTER TABLE `menus`
  ADD CONSTRAINT `menus_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`category_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`email`) REFERENCES `users` (`email`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `roles` (`role_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
