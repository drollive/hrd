-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 10, 2022 at 02:50 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hrd`
--

-- --------------------------------------------------------

--
-- Table structure for table `bills`
--

CREATE TABLE `bills` (
  `bill_id` int(20) NOT NULL,
  `tenant_id` int(20) NOT NULL,
  `house_rent_pay` float NOT NULL,
  `electric_bill` float NOT NULL,
  `water_bill` float NOT NULL,
  `other_bill` float NOT NULL,
  `bill_desc` text DEFAULT NULL,
  `bill_total` float NOT NULL,
  `bill_status` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `house`
--

CREATE TABLE `house` (
  `house_id` int(11) NOT NULL,
  `house_address` varchar(199) NOT NULL,
  `house_price` int(20) NOT NULL,
  `house_desc` text DEFAULT NULL,
  `house_status` tinyint(1) NOT NULL DEFAULT 0 COMMENT '0-invisible, 1-visible, 2-delete',
  `house_avail` tinyint(1) NOT NULL DEFAULT 0 COMMENT '0-invisible, 1-visible, 2-delete',
  `added_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `house`
--

INSERT INTO `house` (`house_id`, `house_address`, `house_price`, `house_desc`, `house_status`, `house_avail`, `added_date`) VALUES
(1, 'Blk 1 Lo 9 Esperanza St. Payatas A. QC', 18000, 'Nakakainis', 2, 0, '2022-02-02 06:38:46'),
(2, '06 Palayan St. ', 0, 'Vharottohhr', 2, 1, '2022-02-02 06:41:14'),
(3, ' ', 0, '', 2, 0, '2022-02-02 06:44:12'),
(4, '06 Palayan St. ', 0, 'Em char', 2, 0, '2022-02-02 06:45:06'),
(5, '06 Palayan St. Payatas A. QC ', 10000, 'Small House hotdog', 2, 1, '2022-02-04 13:57:21'),
(6, '06 Palayan St. Payatas A. QC  ', 10000, 'K', 2, 1, '2022-02-04 14:05:01'),
(7, 'Elysium St. ', 18000, '<p style=\"user-select: auto;\"><b>Update</b></p>', 2, 0, '2022-02-06 02:41:22'),
(8, 'Elysium St. update ', 18000, '<p style=\"user-select: auto;\">Ewan</p>', 2, 0, '2022-02-06 02:46:26'),
(9, 'Blk 1 Lo 9 Esperanza St. Payatas A. QC update ', 18000, '<p style=\"user-select: auto;\"><span style=\"font-family: &quot;Arial Black&quot;; user-select: auto;\">﻿</span><span style=\"font-family: &quot;Arial Black&quot;; user-select: auto;\">﻿</span><span style=\"font-family: &quot;Arial Black&quot;; user-select: auto;\">Hotdog</span></p>', 2, 0, '2022-02-06 02:49:44'),
(10, '01 Elysium St. Paris France ', 100000, '<p><b>House of Zeus</b></p>', 1, 1, '2022-02-07 15:12:36'),
(11, '02 Elysium St. Paris France ', 10000, '<p>House of Medusa</p>', 1, 1, '2022-02-07 15:13:06'),
(12, '03 Elysium St. Paris France ', 1000, '<p>House of Athena</p>', 1, 1, '2022-02-07 15:13:38');

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `payment_id` int(11) NOT NULL,
  `bill_id` int(20) NOT NULL,
  `tenant_id` int(20) NOT NULL,
  `payment_desc` text NOT NULL,
  `payment_status` tinyint(1) DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `post_id` int(11) NOT NULL,
  `house_id` int(11) NOT NULL,
  `post_name` varchar(199) NOT NULL,
  `house_price` int(20) NOT NULL,
  `house_desc` text DEFAULT NULL,
  `house_status` tinyint(1) NOT NULL DEFAULT 0,
  `house_avail` tinyint(1) NOT NULL DEFAULT 0,
  `image` varchar(199) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`post_id`, `house_id`, `post_name`, `house_price`, `house_desc`, `house_status`, `house_avail`, `image`, `created_at`) VALUES
(20, 11, 'House of Zeus', 100000, '<p>lkjihuh</p>', 1, 0, '1644248687.jpeg', '2022-02-07 15:44:47'),
(21, 10, ' House of Zeus updated', 100000, '<p>Eme</p>', 2, 0, '1644302597.jpg', '2022-02-08 02:38:33'),
(22, 10, 'House of Zeus', 100000, '<p>Eme</p>', 2, 0, '1644299712.jpg', '2022-02-08 05:55:12');

-- --------------------------------------------------------

--
-- Table structure for table `tenant`
--

CREATE TABLE `tenant` (
  `tenant_id` int(199) NOT NULL,
  `users_id` int(199) NOT NULL,
  `t_fname` varchar(199) NOT NULL,
  `t_lname` varchar(199) NOT NULL,
  `tenant_email` varchar(199) NOT NULL,
  `t_phone` int(20) NOT NULL,
  `t_rented_address` varchar(199) NOT NULL,
  `t_advance` int(10) NOT NULL,
  `t_rent_monthly` int(10) NOT NULL,
  `t_rent_date` date NOT NULL,
  `t_gone_date` date NOT NULL,
  `added_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `fname` varchar(191) NOT NULL,
  `lname` varchar(191) NOT NULL,
  `email` varchar(191) NOT NULL,
  `phone` varchar(15) DEFAULT NULL,
  `password` varchar(191) NOT NULL,
  `role_as` tinyint(4) NOT NULL DEFAULT 0,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fname`, `lname`, `email`, `phone`, `password`, `role_as`, `status`, `created_at`) VALUES
(1, 'Chuychuy', 'Mejorada', 'mejoradajudell15@gmail.com', '09774839769', 'Hpotter0615', 1, 1, '2022-01-22 11:59:43'),
(3, 'Rawr', 'Hotdog', 'mejoradajudell@yahoo.com', '09111111111', 'Hotdog', 0, 1, '2022-01-22 16:17:00'),
(8, 'Jumbo', 'Hotdog', 'judel@yahoo.com', '0982873217321', 'Hotdog', 0, 0, '2022-02-08 12:39:10'),
(9, 'Loraine', 'Naval', 'meme@gmail.com', 'phone', 'meme', 0, 0, '2022-02-10 13:33:42');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bills`
--
ALTER TABLE `bills`
  ADD PRIMARY KEY (`bill_id`);

--
-- Indexes for table `house`
--
ALTER TABLE `house`
  ADD PRIMARY KEY (`house_id`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`payment_id`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`post_id`);

--
-- Indexes for table `tenant`
--
ALTER TABLE `tenant`
  ADD PRIMARY KEY (`tenant_id`),
  ADD KEY `tenant_id` (`users_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bills`
--
ALTER TABLE `bills`
  MODIFY `bill_id` int(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `house`
--
ALTER TABLE `house`
  MODIFY `house_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `tenant`
--
ALTER TABLE `tenant`
  MODIFY `tenant_id` int(199) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tenant`
--
ALTER TABLE `tenant`
  ADD CONSTRAINT `tenant_ibfk_1` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
