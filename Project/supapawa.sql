-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 23, 2020 at 05:02 PM
-- Server version: 10.4.16-MariaDB
-- PHP Version: 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `supapawa`
--

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` varchar(100) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tblproduct`
--

CREATE TABLE `tblproduct` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `code` varchar(255) NOT NULL,
  `image` text NOT NULL,
  `price` double(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblproduct`
--

INSERT INTO `tblproduct` (`id`, `name`, `code`, `image`, `price`) VALUES
(1, 'UMBRO Men Peak Navy', 'UMB01', 'images/navy.jpg', 139.00),
(2, 'PUMA Comet 2 FS', 'PUMA01', 'images/comet.jpg', 179.00),
(3, 'PUMA Flyer Runner', 'PUMA02', 'images/runner.jpg', 189.00),
(4, 'PUMA Interflex Pink', 'PUMA03', 'images/interflex.jpg', 179.00),
(5, 'ASICS Running Kanmei', 'ASICS01', 'images/kanmei.jpg', 129.00),
(6, 'ASICS Gel-Kayano 5 OG', 'ASICS02', 'images/kayano.jpg', 299.00),
(7, 'ASICS Gel-Bnd(Bk/Gy)', 'ASICS03', 'images/bnd.jpg', 209.00),
(8, 'UMBRO Men Peak Black', 'UMB02', 'images/black.jpg', 139.00),
(9, 'UMBRO Men Peak Grey', 'UMB03', 'images/grey.jpg', 139.00);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `created_at`) VALUES
(3, 'haqimy', '$2y$10$B.t2LZNNH5uGkvsxg7.DYO0VkgueNW0KBEXyU5rv0abYR.Y8xcIlm', '2020-11-14 20:36:58'),
(4, 'apek', '$2y$10$w9mqVh20Vwr7.zaoHHGmIuBlnh5dKm5VJqzHYzZs3.j1kDInxkNme', '2020-11-14 20:38:12'),
(5, 'Melati', '$2y$10$W1LKrypfmPf8lN2bUWVXjeML49dRMnHDKv8uPzEygyTTTVvdKXQQG', '2020-11-15 10:24:13'),
(6, 'iqie22', '$2y$10$8sUIyi1EiqTxRv6bikmh3ez6KjLQUUXtxR6/98JU62/tY/cmN35na', '2020-11-16 22:05:45'),
(8, 'iqie', '$2y$10$vrw0svzIx2zkiaAGGAHxvu6XlTvR2iIvRxfEcnQVYWvpTgLeyDklm', '2020-11-23 07:34:44');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
