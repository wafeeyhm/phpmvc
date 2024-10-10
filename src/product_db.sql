-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 09, 2024 at 09:33 AM
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
-- Database: `product_db`
--
CREATE DATABASE IF NOT EXISTS `product_db` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `product_db`;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

DROP TABLE IF EXISTS `product`;
CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Truncate table before insert `product`
--

TRUNCATE TABLE `product`;
--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `name`, `description`) VALUES
(1, 'iPhone 14', '<p>Latest Apple iPhone with <b>A15 Bionic</b> chip and <i>dual-camera</i> system.</p>'),
(2, 'Samsung Galaxy S23', '<p>Samsung flagship with <b>Snapdragon 8 Gen 1</b> and <i>dynamic AMOLED display</i>.</p>'),
(3, 'Google Pixel 7', '<p>Google\'s newest phone with a <b>stunning camera</b> and <i>smooth stock Android</i>.</p>'),
(4, 'OnePlus 11', '<p>Flagship killer with <b>Snapdragon 8 Gen 1</b> and <i>120Hz fluid AMOLED display</i>.</p>'),
(5, 'Xiaomi Mi 12', '<p>High-performance phone with <b>Snapdragon 888</b> and <i>108MP camera</i>.</p>'),
(6, 'Sony Xperia 1 IV', '<p>4K OLED display with <b>Snapdragon 8 Gen 1</b>, built for <i>content creators</i>.</p>'),
(7, 'Huawei P50 Pro', '<p>Powerful camera phone with <b>50MP Leica quad-camera system</b>.</p>'),
(8, 'Motorola Edge 30 Ultra', '<p>Premium device with a <b>200MP camera</b> and <i>Snapdragon 8 Gen 1</i>.</p>'),
(9, 'Oppo Find X5 Pro', '<p>Stunning design with a <b>6.7\" AMOLED display</b> and <i>80W fast charging</i>.</p>'),
(10, 'Vivo X80 Pro', '<p>Flagship with <b>50MP Zeiss optics</b> and <i>Snapdragon 8 Gen 1</i>.</p>'),
(11, 'Realme GT 2 Pro', '<p>High-end performance with <b>120Hz AMOLED display</b> and <i>Snapdragon 8 Gen 1</i>.</p>'),
(12, 'Asus ROG Phone 6', '<p>Gaming beast with <b>Snapdragon 8 Gen 1</b> and <i>165Hz AMOLED display</i>.</p>'),
(13, 'Nokia G50', '<p>Affordable 5G phone with a <b>6.82\" display</b> and <i>48MP triple-camera</i>.</p>'),
(14, 'iPhone SE (2023)', '<p>Compact iPhone with <b>A15 Bionic chip</b> and a <i>12MP camera system</i>.</p>'),
(15, 'Xiaomi Redmi Note 12', '<p>Budget-friendly phone with a <b>6.5\" display</b> and <i>50MP camera</i>.</p>');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
