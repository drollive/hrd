-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 12, 2022 at 12:19 AM
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
-- Database: `hrd4`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_bill_add` (IN `param_tenant_id` INT(200), IN `param_house_rent_pay` INT(20), IN `param_electric_bill` INT(20), IN `param_water_bill` INT(20), IN `param_other_bill` INT(20), IN `param_bill_desc` TEXT, IN `param_bill_status` TINYINT(1), IN `param_due_date` DATE, IN `param_total_bill` INT(20))  INSERT INTO bills (tenant_id,house_rent_pay,electric_bill, water_bill,other_bill,bill_desc,bill_status, due_date, bill_total) VALUES (param_tenant_id, param_house_rent_pay, param_electric_bill, param_water_bill, param_other_bill, param_bill_desc, param_bill_status, param_due_date, param_total_bill)$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_bill_delete` (IN `param_bill_id` INT(200))  UPDATE bills SET bill_status = 2 
WHERE bill_id= param_bill_id LIMIT 1$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_bill_select` (IN `param_bill_id` INT(200))  SELECT * FROM bills WHERE bill_id= param_bill_id LIMIT 1$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_bill_update` (IN `param_bill_id` INT(200), IN `param_tenant_id` INT(200), IN `param_house_rent_pay` INT(20), IN `param_electric_bill` INT(20), IN `param_water_bill` INT(20), IN `param_other_bill` INT(20), IN `param_bill_desc` TEXT, IN `param_bill_status` TINYINT(1), IN `param_due_date` DATE, IN `param_total_bill` INT(20))  UPDATE bills SET tenant_id= param_tenant_id, house_rent_pay = param_house_rent_pay, electric_bill = param_electric_bill, water_bill = param_water_bill,other_bill = param_other_bill, bill_desc = param_bill_desc, bill_status = param_bill_status, 
due_date = param_due_date, bill_total = param_total_bill
WHERE bill_id= param_bill_id$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_house_add` (IN `param_house_add` VARCHAR(200), IN `param_house_price` INT(20), IN `param_house_desc` TEXT, IN `param_house_status` TINYINT(1))  INSERT INTO house (house_address, house_price, house_desc,house_status) VALUES (param_house_add, param_house_price, param_house_desc, param_house_status)$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_house_delete` (IN `param_house_id` INT(200))  UPDATE house SET house_status='2' WHERE house_id=param_house_id LIMIT 1$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_house_select` (IN `param_house_id` INT(200))  SELECT * FROM house WHERE house_id= param_house_id LIMIT 1$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_house_update` (IN `param_house_id` INT(200), IN `param_house_add` VARCHAR(200), IN `param_house_price` INT(200), IN `param_house_desc` TEXT, IN `param_house_status` TINYINT(1))  UPDATE house SET house_address=param_house_add, house_price= param_house_price, house_desc= param_house_desc, house_status= param_house_status
WHERE house_id= param_house_id$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_insert_logs` (IN `param_user` VARCHAR(200), IN `param_log_date` TIMESTAMP, IN `param_action` TEXT)  INSERT INTO logs (user, log_date, action)
	VALUES (param_user, CURRENT_TIMESTAMP(), param_action)$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_payment_add` (IN `param_bill_id` INT(200), IN `param_payment_total` INT(20), IN `param_payment_desc` TEXT, IN `param_payment_date` DATE)  INSERT INTO payments (bill_id, payment_total, payment_desc, payment_date) 
VALUES (param_bill_id, param_payment_total, param_payment_desc, param_payment_date)$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_payment_delete` (IN `param_payment_id` INT(200))  UPDATE payments SET payment_status = 2 
WHERE payment_id=param_payment_id LIMIT 1$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_payment_update` (IN `param_payment_id` INT(200), IN `param_bill_id` INT(200), IN `param_payment_total` INT(20), IN `param_payment_desc` TEXT, IN `param_payment_date` DATE)  UPDATE payments SET payment_id = param_payment_id, bill_id = param_bill_id, payment_total = param_payment_total, payment_desc = param_payment_desc, payment_date = param_payment_date
WHERE payment_id=param_payment_id$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_tenant_add` (IN `param_users_id` INT(200), IN `param_house_id` INT(200), IN `param_tenant_status` TINYINT(1))  INSERT INTO tenant (users_id, house_id, tenant_status)
VALUES (param_users_id, param_house_id, param_tenant_status)$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_tenant_delete` (IN `param_tenant_id` INT(200))  UPDATE tenant SET tenant_status=2
WHERE tenant_id= param_tenant_id LIMIT 1$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_tenant_select` (INOUT `param_tenant_id` INT(200))  SELECT t.*, concat(u.fname,' ',u.lname) AS name
FROM tenant t
RIGHT JOIN users u
ON t.users_id = u.id
WHERE tenant_status= 1$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_tenant_update` (IN `param_tenant_id` INT(200), IN `param_users_id` INT(200), IN `param_house_id` INT(200), IN `param_tenant_status` TINYINT(1))  UPDATE tenant SET users_id= param_users_id,house_id= param_house_id,tenant_status = param_tenant_status

WHERE tenant_id=param_tenant_id$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_users_add` (IN `param_fname` VARCHAR(200), IN `param_lname` VARCHAR(200), IN `param_email` VARCHAR(200), IN `param_phone` VARCHAR(20), IN `param_password` VARCHAR(200), IN `param_role_as` TINYINT(1), IN `param_status` TINYINT(1))  INSERT INTO users (fname,lname,email,phone,password,role_as,status) 
      VALUES(param_fname, param_lname, param_email, param_phone, param_password, param_role_as, param_status )$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_users_delete` (IN `param_user_id` INT(200))  UPDATE users SET status = 2 WHERE id=param_user_id LIMIT 1$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_users_update` (IN `param_user_id` INT(200), IN `param_fname` VARCHAR(200), IN `param_lname` VARCHAR(200), IN `param_email` VARCHAR(200), IN `param_phone` VARCHAR(20), IN `param_role_as` TINYINT(1), IN `param_status` TINYINT(1))  UPDATE users SET fname=param_fname, lname= param_lname, email=param_email, phone=param_phone, role_as=param_role_as, status= param_status
WHERE id= param_user_id$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Stand-in structure for view `balance`
-- (See below for the actual view)
--
CREATE TABLE `balance` (
`paid` decimal(65,0)
,`t_bill` decimal(65,0)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `bill`
-- (See below for the actual view)
--
CREATE TABLE `bill` (
`name` varchar(383)
,`due` varchar(10)
,`bill_total` int(200)
);

-- --------------------------------------------------------

--
-- Table structure for table `bills`
--

CREATE TABLE `bills` (
  `bill_id` int(20) NOT NULL,
  `tenant_id` int(20) NOT NULL,
  `house_rent_pay` int(20) NOT NULL,
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
(34, 40, 10000, 100, 100, 1000, '', 1, '2022-01-01', 11200, '2022-03-08 17:07:27'),
(35, 40, 10000, 500, 500, 123, '', 0, '2022-04-13', 11123, '2022-03-09 00:28:23'),
(36, 43, 0, 0, 900, 0, '', 0, '2022-04-01', 900, '2022-03-09 08:39:14'),
(37, 43, 0, 0, 0, 0, '', 2, '2023-01-01', 0, '2022-03-09 08:39:53'),
(38, 40, 0, 0, 1345, 0, '', 0, '2022-03-10', 1345, '2022-03-09 08:42:19'),
(39, 43, 0, 0, 0, 1234, '', 2, '1970-01-01', 1234, '2022-03-09 08:44:43'),
(40, 43, 8000, 2344, 110, 0, '', 0, '2022-03-10', 10454, '2022-03-09 08:45:51'),
(41, 47, 9499, 2400, 900, 0, '', 0, '2022-03-12', 12799, '2022-03-09 09:19:16');

-- --------------------------------------------------------

--
-- Stand-in structure for view `bill_all`
-- (See below for the actual view)
--
CREATE TABLE `bill_all` (
`bill_id` int(20)
,`tenant_id` int(20)
,`house_rent_pay` int(20)
,`electric_bill` int(200)
,`water_bill` int(200)
,`other_bill` int(200)
,`bill_desc` text
,`bill_status` tinyint(1)
,`due_date` date
,`bill_total` int(200)
,`created_at` timestamp
,`due` varchar(10)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `bill_all_stat`
-- (See below for the actual view)
--
CREATE TABLE `bill_all_stat` (
`name` varchar(383)
,`bill_id` int(20)
,`bill_total` int(200)
,`bill_desc` text
,`bill_status` tinyint(1)
,`b_id` int(20)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `bill_users`
-- (See below for the actual view)
--
CREATE TABLE `bill_users` (
`name` varchar(383)
,`bill_status` tinyint(1)
,`bill_total` int(200)
,`bill_id` int(20)
,`t_id` int(20)
,`due` varchar(73)
);

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
(15, 'Blk 1 Lot 2 Elysium St. Phase 1 Ely Homes San Lorenzo Makati City ', 10000, '<p style=\"user-select: auto;\"><span style=\"color: rgb(17, 17, 17); font-family: -apple-system, BlinkMacSystemFont, \"Segoe UI\", Roboto, Oxygen-Sans, Ubuntu, Cantarell, \"Fira Sans\", \"Droid Sans\", \"Helvetica Neue\", Helvetica, \"ヒラギノ角ゴ Pro W3\", \"Hiragino Kaku Gothic Pro\", メイリオ, Meiryo, \"ＭＳ Ｐゴシック\", Arial, sans-serif, \"Apple Color Emoji\", \"Segoe UI Emoji\", \"Segoe UI Symbol\"; font-size: 14px; user-select: auto;\">This<span style=\"user-select: auto;\"><b> 4 bedroom modern house</b></span> is <b style=\"user-select: auto;\">185 sq.m</b>. total floor area ( 92 sq.m. ground floor and 93 sq.m. second floor) which will require at least 106 sq.m. lot area.</span><br style=\"user-select: auto;\"></p>', 0, '2022-02-25 17:49:48'),
(16, 'Blk 2 Lot 2 Elysium St. Phase 2 Ely Homes San Lorenzo Makati City ', 8000, '<div data-test-id=\"closeup-title\" class=\"zI7 iyn Hsu\" style=\"user-select: auto;\"><div class=\"zI7 iyn Hsu\" style=\"user-select: auto;\"><div class=\"CloseupTitleCard\" style=\"color: rgb(68, 68, 68); user-select: auto;\"><div class=\"KO4 zI7 iyn Hsu\" style=\"margin-top: 16px; user-select: auto;\"><div itemscope=\"\" itemtype=\"https://schema.org/Article\" style=\"user-select: auto;\"><div itemprop=\"name\" style=\"user-select: auto;\"><a class=\"Wk9 xQ4 CCY czT eEj kVc\" href=\"https://wp.me/p8jWDO-2X\" rel=\"noopener noreferrer nofollow\" target=\"_blank\" style=\"font-weight: 700; user-select: auto; outline: 0px; color: rgb(68, 68, 68); transition: transform 85ms ease-out 0s; text-decoration: none; display: block; border-radius: 0px;\"></a><pre style=\"display: inline-block; margin-top: 4px; user-select: auto;\"><p style=\"user-select: auto;\"><span style=\"font-family: Arial; user-select: auto;\">﻿</span><span style=\"font-family: Arial; user-select: auto;\">﻿</span><span style=\"font-family: Arial; user-select: auto;\">﻿</span><span style=\"font-family: Arial; user-select: auto;\">﻿</span><span style=\"font-family: Arial; user-select: auto;\">﻿</span><span style=\"user-select: auto;\"><span style=\"font-family: Arial;\">Single Storey House Plan With </span><b>125 Square Meters</b><span style=\"font-family: Arial;\"> Of Lot Area</span></span></p></pre></div></div></div></div></div></div><div class=\"jzS ujU un8 TB_\" style=\"display: flex; margin-bottom: 0px; margin-top: 0px; flex-direction: column; flex: 1 1 auto; min-height: 0px; min-width: 0px; user-select: auto;\"><div class=\"Rnj hs0 un8 C9i\" style=\"display: flex; margin-left: 0px; margin-right: 0px; flex-direction: row; align-items: baseline; color: rgb(33, 25, 34); user-select: auto;\" segoe=\"\" ui\",=\"\" roboto,=\"\" oxygen-sans,=\"\" ubuntu,=\"\" cantarell,=\"\" \"fira=\"\" sans\",=\"\" \"droid=\"\" \"helvetica=\"\" neue\",=\"\" helvetica,=\"\" \"ヒラギノ角ゴ=\"\" pro=\"\" w3\",=\"\" \"hiragino=\"\" kaku=\"\" gothic=\"\" pro\",=\"\" メイリオ,=\"\" meiryo,=\"\" \"ＭＳ=\"\" Ｐゴシック\",=\"\" arial,=\"\" sans-serif,=\"\" \"apple=\"\" color=\"\" emoji\",=\"\" \"segoe=\"\" ui=\"\" symbol\";=\"\" font-size:=\"\" 12px;=\"\" user-select:=\"\" auto;\"=\"\"><div class=\"richPinInformation\" style=\"user-select: auto;\"><div class=\"zI7 iyn Hsu\" style=\"user-select: auto;\"><span class=\"tBJ dyH iFc j1A pBj zDA IZT swG\" style=\"user-select: auto; color: var(--g-colorGray300); -webkit-font-smoothing: antialiased; font-size: var(--font-size-200); font-family: var(--font-family-default-latin); font-weight: var(--font-weight-normal); overflow-wrap: break-word;\"></span></div></div></div><div class=\"zI7 iyn Hsu\" style=\"color: rgb(33, 25, 34); user-select: auto;\" segoe=\"\" ui\",=\"\" roboto,=\"\" oxygen-sans,=\"\" ubuntu,=\"\" cantarell,=\"\" \"fira=\"\" sans\",=\"\" \"droid=\"\" \"helvetica=\"\" neue\",=\"\" helvetica,=\"\" \"ヒラギノ角ゴ=\"\" pro=\"\" w3\",=\"\" \"hiragino=\"\" kaku=\"\" gothic=\"\" pro\",=\"\" メイリオ,=\"\" meiryo,=\"\" \"ＭＳ=\"\" Ｐゴシック\",=\"\" arial,=\"\" sans-serif,=\"\" \"apple=\"\" color=\"\" emoji\",=\"\" \"segoe=\"\" ui=\"\" symbol\";=\"\" font-size:=\"\" 12px;=\"\" user-select:=\"\" auto;\"=\"\"><div data-test-id=\"canonical-card\" id=\"canonical-card\" class=\"WbA zI7 iyn Hsu\" style=\"margin-top: 40px; user-select: auto;\"><div class=\"gjz hs0 un8 C9i\" style=\"display: flex; margin-left: 0px; margin-right: 0px; flex-direction: row; align-items: center; user-select: auto;\"><div class=\"Rz6 zI7 iyn Hsu\" style=\"margin-right: 4px; user-select: auto;\"></div></div></div></div></div><p style=\"user-select: auto;\"></p><p style=\"user-select: auto;\"></p>', 0, '2022-02-25 17:56:20'),
(17, 'Blk 3 Lot 2 Elysium St. Phase 3 Ely Homes San Lorenzo Makati City ', 7999, '<p style=\"user-select: auto;\"><span style=\"color: rgb(17, 17, 17); font-family: -apple-system, BlinkMacSystemFont, \" segoe=\"\" ui\",=\"\" roboto,=\"\" oxygen-sans,=\"\" ubuntu,=\"\" cantarell,=\"\" \"fira=\"\" sans\",=\"\" \"droid=\"\" \"helvetica=\"\" neue\",=\"\" helvetica,=\"\" \"ヒラギノ角ゴ=\"\" pro=\"\" w3\",=\"\" \"hiragino=\"\" kaku=\"\" gothic=\"\" pro\",=\"\" メイリオ,=\"\" meiryo,=\"\" \"ＭＳ=\"\" Ｐゴシック\",=\"\" arial,=\"\" sans-serif,=\"\" \"apple=\"\" color=\"\" emoji\",=\"\" \"segoe=\"\" ui=\"\" symbol\";=\"\" font-size:=\"\" 14px;=\"\" user-select:=\"\" auto;\"=\"\"><span style=\"font-family: Arial;\">House Financing Bungalow Lot area 80 sqm. . Floor area </span><b><span style=\"font-family: Arial;\">43.5 sqm.&nbsp;</span></b></span><br style=\"user-select: auto;\"></p>', 0, '2022-02-25 18:17:37'),
(18, 'Blk 4 Lot 2 Elysium St. Phase 4 Ely Homes San Lorenzo Makati City ', 5000, '<p style=\"user-select: auto;\"><span style=\"font-family: Arial; user-select: auto;\">﻿</span><span style=\"font-family: Arial; user-select: auto;\">﻿</span><span style=\"user-select: auto;\">This newly built 3,880 sq. ft. south-facing house is situated in a large, secluded, and quiet plot of <b>28,821 sq</b>. ft.<br style=\"user-select: auto;\"></span><span style=\"text-align: var(--bs-body-text-align); user-select: auto;\">It is protected from the north-east winds in the winter months, whilst enjoying the light east/southeast winds in <br style=\"user-select: auto;\">the summer months, making it cool year-rou</span><span style=\"text-align: var(--bs-body-text-align); user-select: auto;\">nd.</span></p>', 2, '2022-02-25 18:26:33'),
(19, 'Blk 5 Lot 2 Elysium St. Phase 5 Ely Homes San Lorenzo Makati City ', 5000, '<p style=\"user-select: auto;\"><span style=\"color: rgb(44, 44, 45); font-family: -apple-system, BlinkMacSystemFont, \"Segoe UI\", Roboto, \"Droid Sans\", \"Helvetica Neue\", sans-serif; white-space: pre-wrap; user-select: auto;\">4 bedrooms, master bedroom has a balcony facing the garden (2 upstairs and 2\r\non the ground floor) All bedrooms have ceiling fans, master bedroom with split type\r\ninverter AC</span><br style=\"user-select: auto;\"></p>', 1, '2022-02-25 18:29:07'),
(20, 'Blk 4 Lot 2 Elysium St. Phase 5 Ely Homes San Lorenzo Makati City ', 6999, '<p>Boasting an array of sleek finishes and a thoughtful open plan layout, this immaculate 1-bedroom, 1-bathroom condo is a paradigm of contemporary Elysium living. Features of this 50 sqm.<br></p>', 0, '2022-03-04 03:13:41'),
(21, 'Blk 6 Lot 2 Elysium St. Phase 6 Ely Homes San Lorenzo Makati City ', 9499, '<p><span style=\"color: rgb(38, 38, 38); font-family: \"PT Sans Caption\"; font-size: 18px; font-style: italic;\">This 3 Bedroom W/ 2 Full Bathroom Ranch Home Is Immaculate & Full Of Upgrades! Enjoy The Open Floor Plan W/ Vaulted 15ft Ceilings & Large Windows Throughout.</span><br></p>', 0, '2022-03-04 03:16:07'),
(22, 'Blk 7 Lot 2 Elysium St. Phase 6 Ely Homes San Lorenzo Makati City ', 10000, '<p><span style=\"color: rgb(34, 34, 34); font-family: \"2\", \"Helvetica Neue\", sans-serif;\">Spacious, sun-filled corner studio located in the premier full-service Makati, in the heart of the Elysium. This cozy home can easily accommodate a living area, bedroom, and dining.</span><br></p>', 0, '2022-03-04 03:19:45'),
(23, 'Blk 9 Lot 2 Elysium St. Phase 5 Ely Homes San Lorenzo Makati City ', 9500, '<p>Adorable Cape Cod on nearly an acre that is ready to move into right away! Beautiful hardwood floors and carpet, a large master bathroom with double sinks, and his and her master bedroom closets.</p>', 0, '2022-03-04 03:27:16'),
(24, 'Blk 10 Lot 7 Elysium St. Phase 5 Ely Homes San Lorenzo Makati City ', 5999, '<p>Enjoy your own space and privacy in this beautifully updated one-story home, which comes fully furnished. Would make an excellent full-time residence or investment property in Elysium.<br></p>', 0, '2022-03-04 03:34:01'),
(25, 'Blk 11 Lot 7 Elysium St. Phase 1 Ely Homes San Lorenzo Makati City ', 7000, '<p>A beautiful, spacious townhome with an open floor plan awaits you! Enjoy a private wooded view from the deck, as well as upgrades galore throughout this lovely home.</p><div><br></div>', 0, '2022-03-04 03:37:26');

-- --------------------------------------------------------

--
-- Stand-in structure for view `house_view`
-- (See below for the actual view)
--
CREATE TABLE `house_view` (
`house_id` int(11)
,`house_address` varchar(199)
,`house_price` int(20)
,`house_desc` text
,`house_status` tinyint(1)
,`added_date` timestamp
);

-- --------------------------------------------------------

--
-- Table structure for table `logs`
--

CREATE TABLE `logs` (
  `log_id` int(200) NOT NULL,
  `user` varchar(200) NOT NULL,
  `log_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `action` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `logs`
--

INSERT INTO `logs` (`log_id`, `user`, `log_date`, `action`) VALUES
(78, 'Judell Mejorada', '2022-03-08 17:07:27', 'Added bill for tenant 40 by Judell Mejorada'),
(79, 'Judell Mejorada', '2022-03-08 21:15:44', 'Updated bill for tenant 40 by Judell Mejorada'),
(80, 'Judell Mejorada', '2022-03-08 21:21:22', 'Updated bill for tenant 40 by Judell Mejorada'),
(81, 'Judell Mejorada', '2022-03-09 00:06:50', 'Updated bill for tenant 40 by Judell Mejorada'),
(82, 'Judell Mejorada', '2022-03-09 00:07:40', 'Added payment  by Judell Mejorada'),
(83, 'Judell Mejorada', '2022-03-09 00:07:54', 'Updated bill for tenant 40 by Judell Mejorada'),
(84, 'Judell Mejorada', '2022-03-09 00:28:23', 'Added bill for tenant 40 by Judell Mejorada'),
(85, 'Judell Mejorada', '2022-03-09 00:28:48', 'Updated bill for tenant 40 by Judell Mejorada'),
(86, 'Judell Mejorada', '2022-03-09 00:33:07', 'Updated user 1 by Judell Mejorada'),
(87, 'HRD ELYSIUM', '2022-03-09 00:36:46', 'Updated payment 24 by HRD ELYSIUM'),
(88, 'HRD ELYSIUM', '2022-03-09 00:46:51', 'Added payment  by HRD ELYSIUM'),
(89, 'HRD ELYSIUM', '2022-03-09 07:58:10', 'Updated user 68 by HRD ELYSIUM'),
(90, 'HRD ELYSIUM', '2022-03-09 07:58:41', 'Added tenant  by HRD ELYSIUM'),
(91, 'HRD ELYSIUM', '2022-03-09 08:36:53', 'Added tenant  by HRD ELYSIUM'),
(92, 'HRD ELYSIUM', '2022-03-09 08:37:18', 'Updated tenant 42 by HRD ELYSIUM'),
(93, 'HRD ELYSIUM', '2022-03-09 08:37:28', 'Added tenant  by HRD ELYSIUM'),
(94, 'HRD ELYSIUM', '2022-03-09 08:37:47', 'Added tenant  by HRD ELYSIUM'),
(95, 'HRD ELYSIUM', '2022-03-09 08:37:52', 'Deleted tenant 44 by HRD ELYSIUM'),
(96, 'HRD ELYSIUM', '2022-03-09 08:38:01', 'Added tenant  by HRD ELYSIUM'),
(97, 'HRD ELYSIUM', '2022-03-09 08:39:14', 'Added bill for tenant 43 by HRD ELYSIUM'),
(98, 'HRD ELYSIUM', '2022-03-09 08:39:53', 'Added bill for tenant 43 by HRD ELYSIUM'),
(99, 'HRD ELYSIUM', '2022-03-09 08:42:19', 'Added bill for tenant 40 by HRD ELYSIUM'),
(100, 'HRD ELYSIUM', '2022-03-09 08:44:43', 'Added bill for tenant 43 by HRD ELYSIUM'),
(101, 'HRD ELYSIUM', '2022-03-09 08:45:18', 'Deleted bill 39 by HRD ELYSIUM'),
(102, 'HRD ELYSIUM', '2022-03-09 08:45:51', 'Added bill for tenant 43 by HRD ELYSIUM'),
(103, 'HRD ELYSIUM', '2022-03-09 09:17:18', 'Added tenant  by HRD ELYSIUM'),
(104, 'HRD ELYSIUM', '2022-03-09 09:17:41', 'Added tenant  by HRD ELYSIUM'),
(105, 'HRD ELYSIUM', '2022-03-09 09:18:26', 'Added payment  by HRD ELYSIUM'),
(106, 'HRD ELYSIUM', '2022-03-09 09:19:16', 'Added bill for tenant 47 by HRD ELYSIUM'),
(107, 'HRD ELYSIUM', '2022-03-09 09:19:37', 'Added payment  by HRD ELYSIUM'),
(108, 'HRD ELYSIUM', '2022-03-09 14:31:39', 'Updated payment 25 by HRD ELYSIUM'),
(109, 'HRD ELYSIUM', '2022-03-09 14:31:59', 'Updated payment 25 by HRD ELYSIUM'),
(110, 'HRD ELYSIUM', '2022-03-09 14:32:27', 'Updated bill for tenant 43 by HRD ELYSIUM'),
(111, 'HRD ELYSIUM', '2022-03-09 14:36:52', 'Added payment  by HRD ELYSIUM'),
(112, 'HRD ELYSIUM', '2022-03-09 14:39:26', 'Updated payment 28 by HRD ELYSIUM'),
(113, 'HRD ELYSIUM', '2022-03-09 14:39:55', 'Updated bill for tenant 43 by HRD ELYSIUM'),
(114, 'HRD ELYSIUM', '2022-03-09 14:42:21', 'Updated payment 28 by HRD ELYSIUM'),
(115, 'HRD ELYSIUM', '2022-03-09 14:43:57', 'Updated payment 28 by HRD ELYSIUM'),
(116, 'HRD ELYSIUM', '2022-03-09 14:44:19', 'Updated payment 25 by HRD ELYSIUM'),
(117, 'HRD ELYSIUM', '2022-03-09 14:44:34', 'Added payment  by HRD ELYSIUM'),
(118, 'HRD ELYSIUM', '2022-03-09 14:44:43', 'Deleted payment 29 by HRD ELYSIUM'),
(119, 'HRD ELYSIUM', '2022-03-09 14:57:11', 'Updated payment 25 by HRD ELYSIUM'),
(120, 'HRD ELYSIUM', '2022-03-09 14:57:24', 'Deleted payment 28 by HRD ELYSIUM'),
(121, 'HRD ELYSIUM', '2022-03-09 14:57:40', 'Updated payment 26 by HRD ELYSIUM'),
(122, 'HRD ELYSIUM', '2022-03-09 14:58:04', 'Updated payment 27 by HRD ELYSIUM'),
(123, 'HRD ELYSIUM', '2022-03-09 14:58:51', 'Updated user 68 by HRD ELYSIUM'),
(124, 'HRD ELYSIUM', '2022-03-09 14:59:00', 'Updated user 69 by HRD ELYSIUM'),
(125, 'HRD ELYSIUM', '2022-03-09 14:59:08', 'Updated user 70 by HRD ELYSIUM'),
(126, 'HRD ELYSIUM', '2022-03-09 14:59:17', 'Updated user 71 by HRD ELYSIUM'),
(127, 'HRD ELYSIUM', '2022-03-09 14:59:25', 'Updated user 72 by HRD ELYSIUM'),
(128, 'HRD ELYSIUM', '2022-03-09 14:59:34', 'Updated user 73 by HRD ELYSIUM'),
(129, 'HRD ELYSIUM', '2022-03-09 15:00:13', 'Updated house 15 by HRD ELYSIUM'),
(130, 'HRD ELYSIUM', '2022-03-09 15:00:26', 'Updated house 16 by HRD ELYSIUM'),
(131, 'HRD ELYSIUM', '2022-03-09 15:00:41', 'Updated house 20 by HRD ELYSIUM'),
(132, 'HRD ELYSIUM', '2022-03-09 15:00:48', 'Updated house 22 by HRD ELYSIUM'),
(133, 'HRD ELYSIUM', '2022-03-09 15:01:02', 'Updated house 21 by HRD ELYSIUM'),
(134, 'HRD ELYSIUM', '2022-03-09 15:01:16', 'Updated house 23 by HRD ELYSIUM'),
(135, 'HRD ELYSIUM', '2022-03-11 07:14:40', 'Deleted bill 37 by HRD ELYSIUM'),
(136, 'HRD ELYSIUM', '2022-03-11 10:57:19', 'Updated bill for tenant 43 by HRD ELYSIUM'),
(137, 'HRD ELYSIUM', '2022-03-11 10:57:40', 'Updated bill for tenant 40 by HRD ELYSIUM'),
(138, 'HRD ELYSIUM', '2022-03-11 10:58:29', 'Updated payment 25 by HRD ELYSIUM'),
(139, 'HRD ELYSIUM', '2022-03-11 13:19:57', 'Updated bill for tenant 43 by HRD ELYSIUM'),
(140, 'HRD ELYSIUM', '2022-03-11 15:34:23', 'Added tenant  by HRD ELYSIUM'),
(141, 'HRD ELYSIUM', '2022-03-11 15:34:48', 'Updated house 17 by HRD ELYSIUM'),
(142, 'HRD ELYSIUM', '2022-03-11 15:35:41', 'Updated bill for tenant 47 by HRD ELYSIUM'),
(143, 'HRD ELYSIUM', '2022-03-11 17:51:03', 'Updated house 17 by HRD ELYSIUM'),
(144, 'HRD ELYSIUM', '2022-03-11 17:51:20', 'Updated house 16 by HRD ELYSIUM'),
(145, 'HRD ELYSIUM', '2022-03-11 17:54:44', 'Updated payment 25 by HRD ELYSIUM'),
(146, 'HRD ELYSIUM', '2022-03-11 17:54:58', 'Updated payment 26 by HRD ELYSIUM'),
(147, 'HRD ELYSIUM', '2022-03-11 17:55:18', 'Updated payment 27 by HRD ELYSIUM'),
(148, 'HRD ELYSIUM', '2022-03-11 19:38:55', 'Updated bill for tenant 40 by HRD ELYSIUM');

-- --------------------------------------------------------

--
-- Stand-in structure for view `paid_bills`
-- (See below for the actual view)
--
CREATE TABLE `paid_bills` (
`id` int(11)
,`bill_status` tinyint(1)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `pay`
-- (See below for the actual view)
--
CREATE TABLE `pay` (
`payment_id` int(11)
,`bill_id` int(20)
,`payment_total` int(200)
,`payment_desc` text
,`payment_date` date
,`payment_status` tinyint(1)
,`created_at` timestamp
,`name` varchar(383)
,`bill_total` int(200)
,`pay` varchar(10)
);

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
(24, 34, 11200, '<p>paid via gcash</p>', '2022-03-09', 0, '2022-03-09 00:07:40'),
(25, 35, 10000, '<p>paid via credit card</p>', '2022-03-10', 0, '2022-03-09 00:46:51'),
(26, 40, 7000, '<p>paid via cash</p>', '2022-06-15', 0, '2022-03-09 09:18:26'),
(27, 41, 9499, '<p>paid via bank transfer</p>', '2022-03-01', 0, '2022-03-09 09:19:37'),
(28, 35, 900, '', '1970-01-01', 2, '2022-03-09 14:36:52'),
(29, 35, 1000, '', '2022-03-02', 2, '2022-03-09 14:44:34');

-- --------------------------------------------------------

--
-- Stand-in structure for view `pay_view`
-- (See below for the actual view)
--
CREATE TABLE `pay_view` (
`payment_id` int(11)
,`bill_id` int(20)
,`payment_total` int(200)
,`payment_desc` text
,`payment_date` date
,`payment_status` tinyint(1)
,`created_at` timestamp
,`name` varchar(383)
,`bill_total` int(200)
,`pay` varchar(73)
);

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
(40, 67, 15, 1, '2022-03-08 17:01:43'),
(41, 68, 23, 1, '2022-03-09 07:58:41'),
(43, 69, 16, 1, '2022-03-09 08:37:28'),
(44, 70, 19, 2, '2022-03-09 08:37:47'),
(45, 72, 20, 0, '2022-03-09 08:38:01'),
(46, 71, 22, 1, '2022-03-09 09:17:18'),
(47, 73, 21, 1, '2022-03-09 09:17:41'),
(48, 70, 17, 1, '2022-03-11 15:34:23');

-- --------------------------------------------------------

--
-- Stand-in structure for view `tenant_bill_view`
-- (See below for the actual view)
--
CREATE TABLE `tenant_bill_view` (
`name` varchar(383)
,`id` int(11)
,`due` varchar(73)
,`bill_status` tinyint(1)
,`bill_id` int(20)
,`bill_total` int(200)
,`bill_desc` text
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `tenant_payments`
-- (See below for the actual view)
--
CREATE TABLE `tenant_payments` (
`id` int(11)
,`pay` int(20)
,`payment_status` tinyint(1)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `tenant_payments_view`
-- (See below for the actual view)
--
CREATE TABLE `tenant_payments_view` (
`payment_id` int(11)
,`bill_id` int(20)
,`payment_total` int(200)
,`payment_desc` text
,`payment_date` date
,`payment_status` tinyint(1)
,`created_at` timestamp
,`name` varchar(383)
,`bill_total` int(200)
,`pay` varchar(73)
,`id` int(11)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `tenant_user`
-- (See below for the actual view)
--
CREATE TABLE `tenant_user` (
`tenant_id` int(199)
,`users_id` int(199)
,`house_id` int(200)
,`tenant_status` tinyint(1)
,`date_in` timestamp
,`name` varchar(383)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `tenant_user_house`
-- (See below for the actual view)
--
CREATE TABLE `tenant_user_house` (
`tenant_id` int(199)
,`users_id` int(199)
,`house_id` int(200)
,`tenant_status` tinyint(1)
,`date_in` timestamp
,`name` varchar(383)
,`email` varchar(191)
,`phone` varchar(15)
,`id` int(11)
,`house_price` int(20)
,`house_address` varchar(199)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `tenant_view`
-- (See below for the actual view)
--
CREATE TABLE `tenant_view` (
`tenant_id` int(199)
,`users_id` int(199)
,`house_id` int(200)
,`tenant_status` tinyint(1)
,`date_in` timestamp
,`name` varchar(383)
,`email` varchar(191)
,`phone` varchar(15)
,`id` int(11)
,`house_price` int(20)
,`house_address` varchar(199)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `total_bills`
-- (See below for the actual view)
--
CREATE TABLE `total_bills` (
`bill_id` int(20)
,`tenant_id` int(20)
,`house_rent_pay` int(20)
,`electric_bill` int(200)
,`water_bill` int(200)
,`other_bill` int(200)
,`bill_desc` text
,`bill_status` tinyint(1)
,`due_date` date
,`bill_total` int(200)
,`created_at` timestamp
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `total_house`
-- (See below for the actual view)
--
CREATE TABLE `total_house` (
`house_id` int(11)
,`house_address` varchar(199)
,`house_price` int(20)
,`house_desc` text
,`house_status` tinyint(1)
,`added_date` timestamp
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `total_payments`
-- (See below for the actual view)
--
CREATE TABLE `total_payments` (
`payment_id` int(11)
,`bill_id` int(20)
,`payment_total` int(200)
,`payment_desc` text
,`payment_date` date
,`payment_status` tinyint(1)
,`created_at` timestamp
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `total_tenants`
-- (See below for the actual view)
--
CREATE TABLE `total_tenants` (
`tenant_id` int(199)
,`users_id` int(199)
,`house_id` int(200)
,`tenant_status` tinyint(1)
,`date_in` timestamp
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `total_users`
-- (See below for the actual view)
--
CREATE TABLE `total_users` (
`id` int(11)
,`fname` varchar(191)
,`lname` varchar(191)
,`email` varchar(191)
,`phone` varchar(15)
,`password` varchar(191)
,`verify_token` varchar(200)
,`role_as` tinyint(1)
,`status` tinyint(1)
,`created_at` timestamp
);

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
  `status` tinyint(1) NOT NULL DEFAULT 1 COMMENT '0-inactive, 1 -active, 2- delete',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fname`, `lname`, `email`, `phone`, `password`, `verify_token`, `role_as`, `status`, `created_at`) VALUES
(1, 'HRD', 'ELYSIUM', 'hrdelysium@gmail.com', '09774839769', '$2y$10$vnp6/P8/v4ISVKe6DWV/D./x.ghney9l3PBsDMyStXZT/ZithON3.', '79b96c948f887012f5ebb9a4beb7202e', 1, 1, '2022-01-22 11:59:43'),
(67, 'Loraine', 'Naval', 'meme@gmail.com', '09391968957', '$2y$10$gTKBzYtShai6FDjDGXhHF.CE9IpvA3aiOpJ/afK5y.chYsu34uPXu', '', 0, 1, '2022-03-08 16:44:48'),
(68, 'Eugemy', 'Grullo', 'eugemygrullo@gmail.com', '09472093859', '$2y$10$fERwdWR6bY62SReWYxC8.u3Y.QVqZtxRcdH6Ho88bUHjrrQGGRSC.', '', 0, 1, '2022-03-09 07:56:13'),
(69, 'Daniel Ray', 'Fegason', 'danielfegason@gmail.com', '09472093859', '$2y$10$4SAhHFCNF9SDxnNHDzY2Su12tw3afvPGJx5ciP5o3TH/XTaNaoe7W', '', 0, 1, '2022-03-09 08:07:08'),
(70, 'Filwayne', 'De Lara', 'filwaynedelara@gmail.com', '09092486451', '$2y$10$wg8DyBBIDzkGRtKEqPImpOiDmhdIj1CWcL6ukWoT1Bc7TnlkGgHx2', '', 0, 1, '2022-03-09 08:14:02'),
(71, 'Ashlee Jude', 'Del Mundo', 'ashleejudedelmundo@gmail.com', '09094618461', '$2y$10$LEU8kR4xxZRb.Wh0/Pa6EuoS8gwDs7bUOy1jwHNv99AiAnuvlO9zq', '', 0, 1, '2022-03-09 08:14:50'),
(72, 'Renzo Ruiz', 'Moreño', 'renzoruiz@gmail.com', '09094618561', '$2y$10$MjQ3C99PTXkquXzD4vyf9OAfTl1GrHly04tctMHQY0SQTln9mcbXe', '', 0, 1, '2022-03-09 08:16:14'),
(73, 'Ace ', 'Flores', 'aceflores@gmail.com', '09091468521', '$2y$10$mmMb/bnG6.PBwk6Ix9DmHeB3kKp4FBMxgMKMQb9afCJuT/izGm.dm', '', 0, 1, '2022-03-09 08:20:09');

-- --------------------------------------------------------

--
-- Structure for view `balance`
--
DROP TABLE IF EXISTS `balance`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `balance`  AS SELECT sum(`payments`.`payment_total`) AS `paid`, sum(`bills`.`bill_total`) AS `t_bill` FROM (`payments` join `bills` on(`bills`.`bill_id` = `payments`.`bill_id`)) WHERE `payments`.`payment_status` <> 2 ;

-- --------------------------------------------------------

--
-- Structure for view `bill`
--
DROP TABLE IF EXISTS `bill`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `bill`  AS SELECT concat(`users`.`fname`,' ',`users`.`lname`) AS `name`, date_format(`bills`.`due_date`,'%m/%d/%Y') AS `due`, `bills`.`bill_total` AS `bill_total` FROM ((`bills` join `tenant`) join `users` on(`bills`.`tenant_id` = `tenant`.`tenant_id` and `tenant`.`users_id` = `users`.`id`)) WHERE `bills`.`bill_status` = 0 ORDER BY date_format(`bills`.`due_date`,'%m/%d/%Y') ASC LIMIT 0, 5 ;

-- --------------------------------------------------------

--
-- Structure for view `bill_all`
--
DROP TABLE IF EXISTS `bill_all`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `bill_all`  AS SELECT `bills`.`bill_id` AS `bill_id`, `bills`.`tenant_id` AS `tenant_id`, `bills`.`house_rent_pay` AS `house_rent_pay`, `bills`.`electric_bill` AS `electric_bill`, `bills`.`water_bill` AS `water_bill`, `bills`.`other_bill` AS `other_bill`, `bills`.`bill_desc` AS `bill_desc`, `bills`.`bill_status` AS `bill_status`, `bills`.`due_date` AS `due_date`, `bills`.`bill_total` AS `bill_total`, `bills`.`created_at` AS `created_at`, date_format(`bills`.`due_date`,'%m/%d/%Y') AS `due` FROM `bills` ;

-- --------------------------------------------------------

--
-- Structure for view `bill_all_stat`
--
DROP TABLE IF EXISTS `bill_all_stat`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `bill_all_stat`  AS SELECT concat(`users`.`fname`,' ',`users`.`lname`) AS `name`, `b`.`bill_id` AS `bill_id`, `b`.`bill_total` AS `bill_total`, `b`.`bill_desc` AS `bill_desc`, `b`.`bill_status` AS `bill_status`, `b`.`tenant_id` AS `b_id` FROM ((`bills` `b` join `tenant`) join `users` on(`b`.`tenant_id` = `tenant`.`tenant_id` and `tenant`.`users_id` = `users`.`id`)) WHERE `b`.`bill_status` <> 2 ;

-- --------------------------------------------------------

--
-- Structure for view `bill_users`
--
DROP TABLE IF EXISTS `bill_users`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `bill_users`  AS SELECT concat(`u`.`fname`,' ',`u`.`lname`) AS `name`, `b`.`bill_status` AS `bill_status`, `b`.`bill_total` AS `bill_total`, `b`.`bill_id` AS `bill_id`, `b`.`tenant_id` AS `t_id`, date_format(`b`.`due_date`,'%M %e, %Y') AS `due` FROM ((`bills` `b` join `tenant` `t`) join `users` `u` on(`b`.`tenant_id` = `t`.`tenant_id` and `t`.`users_id` = `u`.`id`)) WHERE `b`.`bill_status` <> 2 ;

-- --------------------------------------------------------

--
-- Structure for view `house_view`
--
DROP TABLE IF EXISTS `house_view`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `house_view`  AS SELECT `house`.`house_id` AS `house_id`, `house`.`house_address` AS `house_address`, `house`.`house_price` AS `house_price`, `house`.`house_desc` AS `house_desc`, `house`.`house_status` AS `house_status`, `house`.`added_date` AS `added_date` FROM `house` WHERE `house`.`house_status` <> '2' ;

-- --------------------------------------------------------

--
-- Structure for view `paid_bills`
--
DROP TABLE IF EXISTS `paid_bills`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `paid_bills`  AS SELECT `users`.`id` AS `id`, `bills`.`bill_status` AS `bill_status` FROM ((`bills` join `tenant`) join `users` on(`bills`.`tenant_id` = `tenant`.`tenant_id` and `tenant`.`users_id` = `users`.`id`)) WHERE `bills`.`bill_status` = 1 ;

-- --------------------------------------------------------

--
-- Structure for view `pay`
--
DROP TABLE IF EXISTS `pay`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `pay`  AS SELECT `p`.`payment_id` AS `payment_id`, `p`.`bill_id` AS `bill_id`, `p`.`payment_total` AS `payment_total`, `p`.`payment_desc` AS `payment_desc`, `p`.`payment_date` AS `payment_date`, `p`.`payment_status` AS `payment_status`, `p`.`created_at` AS `created_at`, concat(`u`.`fname`,' ',`u`.`lname`) AS `name`, `b`.`bill_total` AS `bill_total`, date_format(`p`.`payment_date`,'%m/%d/%Y') AS `pay` FROM (((`payments` `p` join `bills` `b`) join `tenant` `t`) join `users` `u` on(`p`.`bill_id` = `b`.`bill_id` and `b`.`tenant_id` = `t`.`tenant_id` and `t`.`users_id` = `u`.`id`)) WHERE `p`.`payment_status` <> '2' ORDER BY date_format(`p`.`payment_date`,'%m/%d/%Y') ASC LIMIT 0, 10 ;

-- --------------------------------------------------------

--
-- Structure for view `pay_view`
--
DROP TABLE IF EXISTS `pay_view`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `pay_view`  AS SELECT `p`.`payment_id` AS `payment_id`, `p`.`bill_id` AS `bill_id`, `p`.`payment_total` AS `payment_total`, `p`.`payment_desc` AS `payment_desc`, `p`.`payment_date` AS `payment_date`, `p`.`payment_status` AS `payment_status`, `p`.`created_at` AS `created_at`, concat(`u`.`fname`,' ',`u`.`lname`) AS `name`, `b`.`bill_total` AS `bill_total`, date_format(`p`.`payment_date`,'%M %e, %Y') AS `pay` FROM (((`payments` `p` join `bills` `b`) join `tenant` `t`) join `users` `u` on(`p`.`bill_id` = `b`.`bill_id` and `b`.`tenant_id` = `t`.`tenant_id` and `t`.`users_id` = `u`.`id`)) WHERE `p`.`payment_status` <> '2' ;

-- --------------------------------------------------------

--
-- Structure for view `tenant_bill_view`
--
DROP TABLE IF EXISTS `tenant_bill_view`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `tenant_bill_view`  AS SELECT concat(`users`.`fname`,' ',`users`.`lname`) AS `name`, `users`.`id` AS `id`, date_format(`bills`.`due_date`,'%M %e, %Y') AS `due`, `bills`.`bill_status` AS `bill_status`, `bills`.`bill_id` AS `bill_id`, `bills`.`bill_total` AS `bill_total`, `bills`.`bill_desc` AS `bill_desc` FROM ((`bills` join `tenant`) join `users` on(`bills`.`tenant_id` = `tenant`.`tenant_id` and `tenant`.`users_id` = `users`.`id`)) WHERE `bills`.`bill_status` <> 2 ;

-- --------------------------------------------------------

--
-- Structure for view `tenant_payments`
--
DROP TABLE IF EXISTS `tenant_payments`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `tenant_payments`  AS SELECT `users`.`id` AS `id`, `payments`.`bill_id` AS `pay`, `payments`.`payment_status` AS `payment_status` FROM (((`payments` join `bills`) join `tenant`) join `users` on(`bills`.`bill_id` = `payments`.`bill_id` and `bills`.`tenant_id` = `tenant`.`tenant_id` and `tenant`.`users_id` = `users`.`id`)) WHERE `payments`.`payment_status` <> 2 ;

-- --------------------------------------------------------

--
-- Structure for view `tenant_payments_view`
--
DROP TABLE IF EXISTS `tenant_payments_view`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `tenant_payments_view`  AS SELECT `payments`.`payment_id` AS `payment_id`, `payments`.`bill_id` AS `bill_id`, `payments`.`payment_total` AS `payment_total`, `payments`.`payment_desc` AS `payment_desc`, `payments`.`payment_date` AS `payment_date`, `payments`.`payment_status` AS `payment_status`, `payments`.`created_at` AS `created_at`, concat(`users`.`fname`,' ',`users`.`lname`) AS `name`, `bills`.`bill_total` AS `bill_total`, date_format(`payments`.`payment_date`,'%M %e, %Y') AS `pay`, `users`.`id` AS `id` FROM (((`payments` join `bills`) join `tenant`) join `users` on(`payments`.`bill_id` = `bills`.`bill_id` and `bills`.`tenant_id` = `tenant`.`tenant_id` and `tenant`.`users_id` = `users`.`id`)) WHERE `payments`.`payment_status` <> '2' ;

-- --------------------------------------------------------

--
-- Structure for view `tenant_user`
--
DROP TABLE IF EXISTS `tenant_user`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `tenant_user`  AS SELECT `t`.`tenant_id` AS `tenant_id`, `t`.`users_id` AS `users_id`, `t`.`house_id` AS `house_id`, `t`.`tenant_status` AS `tenant_status`, `t`.`date_in` AS `date_in`, concat(`u`.`fname`,' ',`u`.`lname`) AS `name` FROM (`users` `u` left join `tenant` `t` on(`t`.`users_id` = `u`.`id`)) WHERE `t`.`tenant_status` = 1 ;

-- --------------------------------------------------------

--
-- Structure for view `tenant_user_house`
--
DROP TABLE IF EXISTS `tenant_user_house`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `tenant_user_house`  AS SELECT `t`.`tenant_id` AS `tenant_id`, `t`.`users_id` AS `users_id`, `t`.`house_id` AS `house_id`, `t`.`tenant_status` AS `tenant_status`, `t`.`date_in` AS `date_in`, concat(`u`.`fname`,' ',`u`.`lname`) AS `name`, `u`.`email` AS `email`, `u`.`phone` AS `phone`, `u`.`id` AS `id`, `h`.`house_price` AS `house_price`, `h`.`house_address` AS `house_address` FROM ((`tenant` `t` join `house` `h` on(`h`.`house_id` = `t`.`house_id`)) join `users` `u` on(`u`.`id` = `t`.`users_id`)) WHERE `t`.`tenant_status` <> 2 ;

-- --------------------------------------------------------

--
-- Structure for view `tenant_view`
--
DROP TABLE IF EXISTS `tenant_view`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `tenant_view`  AS SELECT `t`.`tenant_id` AS `tenant_id`, `t`.`users_id` AS `users_id`, `t`.`house_id` AS `house_id`, `t`.`tenant_status` AS `tenant_status`, `t`.`date_in` AS `date_in`, concat(`u`.`fname`,' ',`u`.`lname`) AS `name`, `u`.`email` AS `email`, `u`.`phone` AS `phone`, `u`.`id` AS `id`, `h`.`house_price` AS `house_price`, `h`.`house_address` AS `house_address` FROM ((`tenant` `t` join `house` `h` on(`h`.`house_id` = `t`.`house_id`)) join `users` `u` on(`u`.`id` = `t`.`users_id`)) WHERE `t`.`tenant_status` <> 2 ;

-- --------------------------------------------------------

--
-- Structure for view `total_bills`
--
DROP TABLE IF EXISTS `total_bills`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `total_bills`  AS SELECT `bills`.`bill_id` AS `bill_id`, `bills`.`tenant_id` AS `tenant_id`, `bills`.`house_rent_pay` AS `house_rent_pay`, `bills`.`electric_bill` AS `electric_bill`, `bills`.`water_bill` AS `water_bill`, `bills`.`other_bill` AS `other_bill`, `bills`.`bill_desc` AS `bill_desc`, `bills`.`bill_status` AS `bill_status`, `bills`.`due_date` AS `due_date`, `bills`.`bill_total` AS `bill_total`, `bills`.`created_at` AS `created_at` FROM `bills` WHERE `bills`.`bill_status` = 0 ;

-- --------------------------------------------------------

--
-- Structure for view `total_house`
--
DROP TABLE IF EXISTS `total_house`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `total_house`  AS SELECT `house`.`house_id` AS `house_id`, `house`.`house_address` AS `house_address`, `house`.`house_price` AS `house_price`, `house`.`house_desc` AS `house_desc`, `house`.`house_status` AS `house_status`, `house`.`added_date` AS `added_date` FROM `house` WHERE `house`.`house_status` = '1' ;

-- --------------------------------------------------------

--
-- Structure for view `total_payments`
--
DROP TABLE IF EXISTS `total_payments`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `total_payments`  AS SELECT `payments`.`payment_id` AS `payment_id`, `payments`.`bill_id` AS `bill_id`, `payments`.`payment_total` AS `payment_total`, `payments`.`payment_desc` AS `payment_desc`, `payments`.`payment_date` AS `payment_date`, `payments`.`payment_status` AS `payment_status`, `payments`.`created_at` AS `created_at` FROM `payments` WHERE `payments`.`payment_status` <> 2 ;

-- --------------------------------------------------------

--
-- Structure for view `total_tenants`
--
DROP TABLE IF EXISTS `total_tenants`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `total_tenants`  AS SELECT `tenant`.`tenant_id` AS `tenant_id`, `tenant`.`users_id` AS `users_id`, `tenant`.`house_id` AS `house_id`, `tenant`.`tenant_status` AS `tenant_status`, `tenant`.`date_in` AS `date_in` FROM `tenant` WHERE `tenant`.`tenant_status` = 1 ;

-- --------------------------------------------------------

--
-- Structure for view `total_users`
--
DROP TABLE IF EXISTS `total_users`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `total_users`  AS SELECT `users`.`id` AS `id`, `users`.`fname` AS `fname`, `users`.`lname` AS `lname`, `users`.`email` AS `email`, `users`.`phone` AS `phone`, `users`.`password` AS `password`, `users`.`verify_token` AS `verify_token`, `users`.`role_as` AS `role_as`, `users`.`status` AS `status`, `users`.`created_at` AS `created_at` FROM `users` WHERE `users`.`status` <> 2 ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bills`
--
ALTER TABLE `bills`
  ADD PRIMARY KEY (`bill_id`),
  ADD KEY `bills_tenant` (`tenant_id`);

--
-- Indexes for table `house`
--
ALTER TABLE `house`
  ADD PRIMARY KEY (`house_id`);

--
-- Indexes for table `logs`
--
ALTER TABLE `logs`
  ADD PRIMARY KEY (`log_id`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`payment_id`),
  ADD KEY `bill_payment` (`bill_id`);

--
-- Indexes for table `tenant`
--
ALTER TABLE `tenant`
  ADD PRIMARY KEY (`tenant_id`),
  ADD KEY `users_tenant` (`users_id`),
  ADD KEY `house_tenant` (`house_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UC_Email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bills`
--
ALTER TABLE `bills`
  MODIFY `bill_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `house`
--
ALTER TABLE `house`
  MODIFY `house_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `logs`
--
ALTER TABLE `logs`
  MODIFY `log_id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=149;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `tenant`
--
ALTER TABLE `tenant`
  MODIFY `tenant_id` int(199) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bills`
--
ALTER TABLE `bills`
  ADD CONSTRAINT `bills_tenant` FOREIGN KEY (`tenant_id`) REFERENCES `tenant` (`tenant_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `payments`
--
ALTER TABLE `payments`
  ADD CONSTRAINT `bill_payment` FOREIGN KEY (`bill_id`) REFERENCES `bills` (`bill_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tenant`
--
ALTER TABLE `tenant`
  ADD CONSTRAINT `house_tenant` FOREIGN KEY (`house_id`) REFERENCES `house` (`house_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `users_tenant` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
