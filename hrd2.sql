-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 28, 2022 at 06:32 AM
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
-- Database: `hrd2`
--

-- --------------------------------------------------------

--
-- Table structure for table `bills`
--

CREATE TABLE `bills` (
  `bill_id` int(20) NOT NULL,
  `tenant_id` int(20) NOT NULL,
  `house_rent_pay` int(200) NOT NULL,
  `electric_bill` int(200) NOT NULL,
  `water_bill` int(200) NOT NULL,
  `other_bill` int(200) NOT NULL,
  `bill_desc` text DEFAULT NULL,
  `bill_status` tinyint(1) NOT NULL DEFAULT 0,
  `due_date` date NOT NULL,
  `bill_total` int(200) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bills`
--

INSERT INTO `bills` (`bill_id`, `tenant_id`, `house_rent_pay`, `electric_bill`, `water_bill`, `other_bill`, `bill_desc`, `bill_status`, `due_date`, `bill_total`, `created_at`) VALUES
(14, 24, 10000, 600, 699, 1000, '', 0, '2022-03-01', 2299, '2022-02-23 03:55:12'),
(18, 24, 10000, 600, 80, 555, '', 0, '2022-04-20', 1235, '2022-02-26 23:53:41'),
(19, 24, 10000, 600, 700, 99, '', 2, '2022-05-11', 1399, '2022-02-26 23:54:11'),
(20, 24, 10000, 900, 500, 600, '', 2, '2022-06-02', 2000, '2022-02-26 23:54:38'),
(21, 25, 8000, 1000, 500, 500, '', 0, '1970-01-01', 10000, '2022-02-27 00:31:43');

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
  `added_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `house`
--

INSERT INTO `house` (`house_id`, `house_address`, `house_price`, `house_desc`, `house_status`, `added_date`) VALUES
(15, 'Blk 1 Lot 2 Elysium St. Phase 1 Ely Homes San Lorenzo Makati City ', 10000, '<p style=\"user-select: auto;\"><span style=\"color: rgb(17, 17, 17); font-family: -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Roboto, Oxygen-Sans, Ubuntu, Cantarell, &quot;Fira Sans&quot;, &quot;Droid Sans&quot;, &quot;Helvetica Neue&quot;, Helvetica, &quot;ヒラギノ角ゴ Pro W3&quot;, &quot;Hiragino Kaku Gothic Pro&quot;, メイリオ, Meiryo, &quot;ＭＳ Ｐゴシック&quot;, Arial, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;; font-size: 14px; user-select: auto;\">This<span style=\"user-select: auto;\"><b> 4 bedroom modern house</b></span> is <b style=\"user-select: auto;\">185 sq.m</b>. total floor area ( 92 sq.m. ground floor and 93 sq.m. second floor) which will require at least 106 sq.m. lot area.</span><br style=\"user-select: auto;\"></p>', 1, '2022-02-25 17:49:48'),
(16, 'Blk 2 Lot 2 Elysium St. Phase 2 Ely Homes San Lorenzo Makati City ', 8000, '<div data-test-id=\"closeup-title\" class=\"zI7 iyn Hsu\" style=\"user-select: auto;\"><div class=\"zI7 iyn Hsu\" style=\"user-select: auto;\"><div class=\"CloseupTitleCard\" style=\"color: rgb(68, 68, 68); user-select: auto;\"><div class=\"KO4 zI7 iyn Hsu\" style=\"margin-top: 16px; user-select: auto;\"><div itemscope=\"\" itemtype=\"https://schema.org/Article\" style=\"user-select: auto;\"><div itemprop=\"name\" style=\"user-select: auto;\"><a class=\"Wk9 xQ4 CCY czT eEj kVc\" href=\"https://wp.me/p8jWDO-2X\" rel=\"noopener noreferrer nofollow\" target=\"_blank\" style=\"font-weight: 700; user-select: auto; outline: 0px; color: rgb(68, 68, 68); transition: transform 85ms ease-out 0s; text-decoration: none; display: block; border-radius: 0px;\"></a><pre style=\"display: inline-block; margin-top: 4px; user-select: auto;\"><p style=\"user-select: auto;\"><span style=\"font-family: Arial; user-select: auto;\">﻿</span><span style=\"font-family: Arial; user-select: auto;\">﻿</span><span style=\"font-family: Arial; user-select: auto;\">﻿</span><span style=\"font-family: Arial; user-select: auto;\">﻿</span><span style=\"font-family: Arial; user-select: auto;\">﻿</span><span style=\"user-select: auto;\">Single Storey House Plan With <b>125 Square Meters</b> Of Lot Area</span></p></pre></div></div></div></div></div></div><div class=\"jzS ujU un8 TB_\" style=\"display: flex; margin-bottom: 0px; margin-top: 0px; flex-direction: column; flex: 1 1 auto; min-height: 0px; min-width: 0px; user-select: auto;\"><div class=\"Rnj hs0 un8 C9i\" style=\"display: flex; margin-left: 0px; margin-right: 0px; flex-direction: row; align-items: baseline; color: rgb(33, 25, 34); user-select: auto;\" segoe=\"\" ui\",=\"\" roboto,=\"\" oxygen-sans,=\"\" ubuntu,=\"\" cantarell,=\"\" \"fira=\"\" sans\",=\"\" \"droid=\"\" \"helvetica=\"\" neue\",=\"\" helvetica,=\"\" \"ヒラギノ角ゴ=\"\" pro=\"\" w3\",=\"\" \"hiragino=\"\" kaku=\"\" gothic=\"\" pro\",=\"\" メイリオ,=\"\" meiryo,=\"\" \"ＭＳ=\"\" Ｐゴシック\",=\"\" arial,=\"\" sans-serif,=\"\" \"apple=\"\" color=\"\" emoji\",=\"\" \"segoe=\"\" ui=\"\" symbol\";=\"\" font-size:=\"\" 12px;=\"\" user-select:=\"\" auto;\"=\"\"><div class=\"richPinInformation\" style=\"user-select: auto;\"><div class=\"zI7 iyn Hsu\" style=\"user-select: auto;\"><span class=\"tBJ dyH iFc j1A pBj zDA IZT swG\" style=\"user-select: auto; color: var(--g-colorGray300); -webkit-font-smoothing: antialiased; font-size: var(--font-size-200); font-family: var(--font-family-default-latin); font-weight: var(--font-weight-normal); overflow-wrap: break-word;\"></span></div></div></div><div class=\"zI7 iyn Hsu\" style=\"color: rgb(33, 25, 34); user-select: auto;\" segoe=\"\" ui\",=\"\" roboto,=\"\" oxygen-sans,=\"\" ubuntu,=\"\" cantarell,=\"\" \"fira=\"\" sans\",=\"\" \"droid=\"\" \"helvetica=\"\" neue\",=\"\" helvetica,=\"\" \"ヒラギノ角ゴ=\"\" pro=\"\" w3\",=\"\" \"hiragino=\"\" kaku=\"\" gothic=\"\" pro\",=\"\" メイリオ,=\"\" meiryo,=\"\" \"ＭＳ=\"\" Ｐゴシック\",=\"\" arial,=\"\" sans-serif,=\"\" \"apple=\"\" color=\"\" emoji\",=\"\" \"segoe=\"\" ui=\"\" symbol\";=\"\" font-size:=\"\" 12px;=\"\" user-select:=\"\" auto;\"=\"\"><div data-test-id=\"canonical-card\" id=\"canonical-card\" class=\"WbA zI7 iyn Hsu\" style=\"margin-top: 40px; user-select: auto;\"><div class=\"gjz hs0 un8 C9i\" style=\"display: flex; margin-left: 0px; margin-right: 0px; flex-direction: row; align-items: center; user-select: auto;\"><div class=\"Rz6 zI7 iyn Hsu\" style=\"margin-right: 4px; user-select: auto;\"></div></div></div></div></div><p style=\"user-select: auto;\"></p><p style=\"user-select: auto;\"></p>', 1, '2022-02-25 17:56:20'),
(17, 'Blk 3 Lot 2 Elysium St. Phase 3 Ely Homes San Lorenzo Makati City ', 7999, '<p style=\"user-select: auto;\"><span style=\"color: rgb(17, 17, 17); font-family: -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Roboto, Oxygen-Sans, Ubuntu, Cantarell, &quot;Fira Sans&quot;, &quot;Droid Sans&quot;, &quot;Helvetica Neue&quot;, Helvetica, &quot;ヒラギノ角ゴ Pro W3&quot;, &quot;Hiragino Kaku Gothic Pro&quot;, メイリオ, Meiryo, &quot;ＭＳ Ｐゴシック&quot;, Arial, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;; font-size: 14px; user-select: auto;\">House Financing Bungalow Lot area 80 sqm. . Floor area <b>43.5 sqm.&nbsp;</b></span><br style=\"user-select: auto;\"></p>', 1, '2022-02-25 18:17:37'),
(18, 'Blk 4 Lot 2 Elysium St. Phase 4 Ely Homes San Lorenzo Makati City ', 5000, '<p style=\"user-select: auto;\"><span style=\"font-family: Arial; user-select: auto;\">﻿</span><span style=\"font-family: Arial; user-select: auto;\">﻿</span><span style=\"user-select: auto;\">This newly built 3,880 sq. ft. south-facing house is situated in a large, secluded, and quiet plot of <b>28,821 sq</b>. ft.<br style=\"user-select: auto;\"></span><span style=\"text-align: var(--bs-body-text-align); user-select: auto;\">It is protected from the north-east winds in the winter months, whilst enjoying the light east/southeast winds in <br style=\"user-select: auto;\">the summer months, making it cool year-rou</span><span style=\"text-align: var(--bs-body-text-align); user-select: auto;\">nd.</span></p>', 2, '2022-02-25 18:26:33'),
(19, 'Blk 5 Lot 2 Elysium St. Phase 5 Ely Homes San Lorenzo Makati City ', 5000, '<p style=\"user-select: auto;\"><span style=\"color: rgb(44, 44, 45); font-family: -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Roboto, &quot;Droid Sans&quot;, &quot;Helvetica Neue&quot;, sans-serif; white-space: pre-wrap; user-select: auto;\">4 bedrooms, master bedroom has a balcony facing the garden (2 upstairs and 2\r\non the ground floor) All bedrooms have ceiling fans, master bedroom with split type\r\ninverter AC</span><br style=\"user-select: auto;\"></p>', 1, '2022-02-25 18:29:07');

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `payment_id` int(11) NOT NULL,
  `bill_id` int(20) NOT NULL,
  `payment_total` int(200) NOT NULL,
  `payment_desc` text NOT NULL,
  `payment_date` date NOT NULL,
  `payment_status` tinyint(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`payment_id`, `bill_id`, `payment_total`, `payment_desc`, `payment_date`, `payment_status`, `created_at`) VALUES
(9, 18, 235, 'Please pay this next week.', '1970-01-01', 2, '2022-02-28 04:28:14'),
(10, 14, 200, '<p style=\"user-select: auto;\">Okay&nbsp;</p>', '1970-01-01', 0, '2022-02-28 05:06:41');

-- --------------------------------------------------------

--
-- Table structure for table `tenant`
--

CREATE TABLE `tenant` (
  `tenant_id` int(199) NOT NULL,
  `users_id` int(199) NOT NULL,
  `house_id` int(200) NOT NULL,
  `tenant_status` tinyint(1) NOT NULL DEFAULT 0 COMMENT '0-inactive, 1-active, 2-deleted',
  `date_in` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tenant`
--

INSERT INTO `tenant` (`tenant_id`, `users_id`, `house_id`, `tenant_status`, `date_in`) VALUES
(24, 28, 15, 1, '2022-02-26 23:52:30'),
(25, 30, 16, 2, '2022-02-26 23:52:46');

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
  `verify_token` varchar(200) NOT NULL,
  `role_as` tinyint(1) NOT NULL DEFAULT 0,
  `status` tinyint(1) NOT NULL DEFAULT 0 COMMENT '0-inactive, 1 -active, 2- delete',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fname`, `lname`, `email`, `phone`, `password`, `verify_token`, `role_as`, `status`, `created_at`) VALUES
(1, 'Judell', 'Mejorada', 'mejoradajudell15@gmail.com', '09774839769', '123', 'b8a0d5f961eacb3f1c855968541152e4elysium', 1, 1, '2022-01-22 11:59:43'),
(26, 'Mark', 'Banaba', 'markbanaba@yahoo.com', '09635056582', 'qqq', '', 0, 1, '2022-02-25 07:24:20'),
(27, 'Anne', 'Polland', 'anne@gmail.com', '09702832323', '123', '', 0, 1, '2022-02-26 11:20:10'),
(28, 'Loraine', 'Naval', 'loraine5@gmail.com', '09812324143', 'qqq', '', 0, 1, '2022-02-26 18:00:21'),
(29, 'Hannah', 'Cordelia', 'cordelia101', '09702832323', '123', '', 0, 1, '2022-02-26 23:04:53'),
(30, 'Warren', 'Sy', 'warrrensy@gmail.com', '09702832322', '1234567', '', 0, 1, '2022-02-26 23:07:19'),
(31, 'John Aron', 'Locked', 'johnaron@gmail.com', '09702832326', 'locked', '', 0, 2, '2022-02-26 23:08:20'),
(32, 'Daniel', 'Fegason', 'danielfegason@gmail.com', '09102832324', 'rolly', '', 0, 2, '2022-02-26 23:09:46');

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
-- Indexes for table `tenant`
--
ALTER TABLE `tenant`
  ADD PRIMARY KEY (`tenant_id`);

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
  MODIFY `bill_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `house`
--
ALTER TABLE `house`
  MODIFY `house_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tenant`
--
ALTER TABLE `tenant`
  MODIFY `tenant_id` int(199) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
