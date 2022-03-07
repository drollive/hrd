-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 07, 2022 at 01:23 PM
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
-- Database: `hrd3`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_bill_add` (IN `param_tenant_id` INT(200), IN `param_house_rent_pay` INT(20), IN `param_electric_bill` INT(20), IN `param_water_bill` INT(20), IN `param_other_bill` INT(20), IN `param_bill_desc` TEXT, IN `param_bill_status` TINYINT(1), IN `param_due_date` DATE, IN `param_total_bill` INT(20))  INSERT INTO bills (tenant_id,house_rent_pay,electric_bill, water_bill,other_bill,bill_desc,bill_status, due_date, bill_total) VALUES (param_tenant_id, param_house_rent_pay, param_electric_bill, param_water_bill, param_other_bill, param_bill_desc, param_bill_status, param_due_date, param_total_bill)$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_bill_delete` (IN `param_bill_id` INT(200))  UPDATE bills SET bill_status = 2 
WHERE bill_id= param_bill_id LIMIT 1$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_bill_select` ()  SELECT t.*, concat(u.fname,' ',u.lname) AS name
FROM tenant t
RIGHT JOIN users u
ON t.users_id = u.id
WHERE tenant_status='1'$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_bill_update` (IN `param_bill_id` INT(200), IN `param_tenant_id` INT(200), IN `param_house_rent_pay` INT(20), IN `param_electric_bill` INT(20), IN `param_water_bill` INT(20), IN `param_other_bill` INT(20), IN `param_bill_desc` TEXT, IN `param_bill_status` TINYINT(1), IN `param_due_date` DATE, IN `param_total_bill` INT(20))  UPDATE bills SET tenant_id= param_tenant_id, house_rent_pay = param_house_rent_pay, electric_bill = param_electric_bill, water_bill = param_water_bill,other_bill = param_other_bill, bill_desc = param_bill_desc, bill_status = param_bill_status, 
due_date = param_due_date, bill_total = param_total_bill
WHERE bill_id= param_bill_id$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_house_add` (IN `param_house_add` VARCHAR(200), IN `param_house_price` INT(20), IN ` param_house_desc` TEXT, IN `param_house_status` TINYINT(1))  INSERT INTO house (house_address, house_price, house_desc,house_status) VALUES (param_house_add, param_house_price, param_house_desc, param_house_status)$$

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

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_payment_update` (IN `param_payment_id` INT(200), IN `param_bill_id` INT(200), IN `param_payment_total` INT(20), IN `param_payment_desc` TEXT, IN `param_payment_date` DATE)  UPDATE hrd3.payments SET payment_id = param_payment_id, bill_id = param_bill_id, payment_total = param_payment_total, payment_desc = param_payment_desc, payment_date = param_payment_date
WHERE payment_id=param_payment_id$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_tenant_add` (IN `param_users_id` INT(200), IN `param_house_id` INT(200), IN `param_tenant_status` TINYINT(1))  INSERT INTO tenant (users_id, house_id, tenant_status)
VALUES (param_users_id, param_house_id, param_tenant_status)$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_tenant_delete` (IN `param_tenant_id` INT(200))  UPDATE tenant SET tenant_status=2
WHERE tenant_id= param_tenant_id LIMIT 1$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_tenant_update` (IN `param_tenant_id` INT(200), IN `param_users_id` INT(200), IN `param_house_id` INT(200), IN `param_tenant_status` TINYINT(1))  UPDATE tenant SET users_id= param_users_id,house_id= param_house_id,tenant_status = param_tenant_status

WHERE tenant_id=param_tenant_id$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_users_add` (IN `param_fname` VARCHAR(200), IN `param_lname` VARCHAR(200), IN `param_email` VARCHAR(200), IN `param_phone` INT(20), IN `param_password` VARCHAR(200), IN `param_role_as` TINYINT(1), IN `param_status` TINYINT(1))  INSERT INTO users (fname,lname,email,phone,password,role_as,status) 
      VALUES(param_fname, param_lname, param_email, param_phone, param_password, param_role_as, param_status )$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_users_delete` (IN `param_user_id` INT(200))  UPDATE users SET status = 2 WHERE id=param_user_id LIMIT 1$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_users_update` (IN `param_user_id` INT(200), IN `param_fname` VARCHAR(200), IN `param_lname` VARCHAR(200), IN `param_email` VARCHAR(200), IN `param_phone` INT(20), IN `param_role_as` TINYINT(1), IN `param_status` TINYINT(1))  UPDATE users SET fname=param_fname, lname= param_lname, email=param_email, phone= param_phone, role_as=param_role_as, status= param_status
WHERE id= param_user_id$$

DELIMITER ;

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
(22, 24, 10000, 123, 134, 123, '', 2, '1970-01-01', 10380, '2022-03-03 13:24:51'),
(23, 24, 9499, 1000, 1500, 500, '', 0, '2022-04-14', 12499, '2022-03-04 03:45:17'),
(24, 27, 7000, 1000, 600, 400, '', 0, '2022-05-17', 9000, '2022-03-04 03:45:44'),
(25, 28, 5999, 1200, 700, 650, '', 1, '2022-05-10', 8549, '2022-03-04 03:50:19'),
(26, 29, 9500, 1974, 1673, 499, '', 1, '2022-05-11', 13646, '2022-03-04 03:54:47'),
(27, 30, 10000, 2000, 2400, 698, '', 1, '2022-03-31', 15098, '2022-03-04 04:04:00'),
(28, 32, 9499, 1997, 2042, 692, '', 1, '2022-04-12', 14230, '2022-03-04 04:14:30'),
(29, 33, 5000, 5122, 4992, 2011, '', 0, '2022-03-31', 12125, '2022-03-04 04:15:33'),
(30, 34, 7999, 2415, 2612, 522, '', 1, '2022-04-08', 13548, '2022-03-04 04:17:28'),
(31, 35, 8000, 2477, 1763, 600, '', 1, '2022-04-14', 12840, '2022-03-04 04:18:07'),
(32, 36, 10000, 4921, 2910, 1921, '', 1, '2022-05-20', 19752, '2022-03-04 04:18:47'),
(33, 29, 95000, 1000, 1000, 1000, '<p style=\"user-select: auto;\">OKay update update</p>', 2, '2022-01-01', 98000, '2022-03-06 23:16:43');

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
(16, 'Blk 2 Lot 2 Elysium St. Phase 2 Ely Homes San Lorenzo Makati City ', 8000, '<div data-test-id=\"closeup-title\" class=\"zI7 iyn Hsu\" style=\"user-select: auto;\"><div class=\"zI7 iyn Hsu\" style=\"user-select: auto;\"><div class=\"CloseupTitleCard\" style=\"color: rgb(68, 68, 68); user-select: auto;\"><div class=\"KO4 zI7 iyn Hsu\" style=\"margin-top: 16px; user-select: auto;\"><div itemscope=\"\" itemtype=\"https://schema.org/Article\" style=\"user-select: auto;\"><div itemprop=\"name\" style=\"user-select: auto;\"><a class=\"Wk9 xQ4 CCY czT eEj kVc\" href=\"https://wp.me/p8jWDO-2X\" rel=\"noopener noreferrer nofollow\" target=\"_blank\" style=\"font-weight: 700; user-select: auto; outline: 0px; color: rgb(68, 68, 68); transition: transform 85ms ease-out 0s; text-decoration: none; display: block; border-radius: 0px;\"></a><pre style=\"display: inline-block; margin-top: 4px; user-select: auto;\"><p style=\"user-select: auto;\"><span style=\"font-family: Arial; user-select: auto;\">﻿</span><span style=\"font-family: Arial; user-select: auto;\">﻿</span><span style=\"font-family: Arial; user-select: auto;\">﻿</span><span style=\"font-family: Arial; user-select: auto;\">﻿</span><span style=\"font-family: Arial; user-select: auto;\">﻿</span><span style=\"user-select: auto;\">Single Storey House Plan With <b>125 Square Meters</b> Of Lot Area</span></p></pre></div></div></div></div></div></div><div class=\"jzS ujU un8 TB_\" style=\"display: flex; margin-bottom: 0px; margin-top: 0px; flex-direction: column; flex: 1 1 auto; min-height: 0px; min-width: 0px; user-select: auto;\"><div class=\"Rnj hs0 un8 C9i\" style=\"display: flex; margin-left: 0px; margin-right: 0px; flex-direction: row; align-items: baseline; color: rgb(33, 25, 34); user-select: auto;\" segoe=\"\" ui\",=\"\" roboto,=\"\" oxygen-sans,=\"\" ubuntu,=\"\" cantarell,=\"\" \"fira=\"\" sans\",=\"\" \"droid=\"\" \"helvetica=\"\" neue\",=\"\" helvetica,=\"\" \"ヒラギノ角ゴ=\"\" pro=\"\" w3\",=\"\" \"hiragino=\"\" kaku=\"\" gothic=\"\" pro\",=\"\" メイリオ,=\"\" meiryo,=\"\" \"ＭＳ=\"\" Ｐゴシック\",=\"\" arial,=\"\" sans-serif,=\"\" \"apple=\"\" color=\"\" emoji\",=\"\" \"segoe=\"\" ui=\"\" symbol\";=\"\" font-size:=\"\" 12px;=\"\" user-select:=\"\" auto;\"=\"\"><div class=\"richPinInformation\" style=\"user-select: auto;\"><div class=\"zI7 iyn Hsu\" style=\"user-select: auto;\"><span class=\"tBJ dyH iFc j1A pBj zDA IZT swG\" style=\"user-select: auto; color: var(--g-colorGray300); -webkit-font-smoothing: antialiased; font-size: var(--font-size-200); font-family: var(--font-family-default-latin); font-weight: var(--font-weight-normal); overflow-wrap: break-word;\"></span></div></div></div><div class=\"zI7 iyn Hsu\" style=\"color: rgb(33, 25, 34); user-select: auto;\" segoe=\"\" ui\",=\"\" roboto,=\"\" oxygen-sans,=\"\" ubuntu,=\"\" cantarell,=\"\" \"fira=\"\" sans\",=\"\" \"droid=\"\" \"helvetica=\"\" neue\",=\"\" helvetica,=\"\" \"ヒラギノ角ゴ=\"\" pro=\"\" w3\",=\"\" \"hiragino=\"\" kaku=\"\" gothic=\"\" pro\",=\"\" メイリオ,=\"\" meiryo,=\"\" \"ＭＳ=\"\" Ｐゴシック\",=\"\" arial,=\"\" sans-serif,=\"\" \"apple=\"\" color=\"\" emoji\",=\"\" \"segoe=\"\" ui=\"\" symbol\";=\"\" font-size:=\"\" 12px;=\"\" user-select:=\"\" auto;\"=\"\"><div data-test-id=\"canonical-card\" id=\"canonical-card\" class=\"WbA zI7 iyn Hsu\" style=\"margin-top: 40px; user-select: auto;\"><div class=\"gjz hs0 un8 C9i\" style=\"display: flex; margin-left: 0px; margin-right: 0px; flex-direction: row; align-items: center; user-select: auto;\"><div class=\"Rz6 zI7 iyn Hsu\" style=\"margin-right: 4px; user-select: auto;\"></div></div></div></div></div><p style=\"user-select: auto;\"></p><p style=\"user-select: auto;\"></p>', 1, '2022-02-25 17:56:20'),
(17, 'Blk 3 Lot 2 Elysium St. Phase 3 Ely Homes San Lorenzo Makati City ', 7999, '<p style=\"user-select: auto;\"><span style=\"color: rgb(17, 17, 17); font-family: -apple-system, BlinkMacSystemFont, \"Segoe UI\", Roboto, Oxygen-Sans, Ubuntu, Cantarell, \"Fira Sans\", \"Droid Sans\", \"Helvetica Neue\", Helvetica, \"ヒラギノ角ゴ Pro W3\", \"Hiragino Kaku Gothic Pro\", メイリオ, Meiryo, \"ＭＳ Ｐゴシック\", Arial, sans-serif, \"Apple Color Emoji\", \"Segoe UI Emoji\", \"Segoe UI Symbol\"; font-size: 14px; user-select: auto;\">House Financing Bungalow Lot area 80 sqm. . Floor area <b>43.5 sqm. </b></span><br style=\"user-select: auto;\"></p>', 0, '2022-02-25 18:17:37'),
(18, 'Blk 4 Lot 2 Elysium St. Phase 4 Ely Homes San Lorenzo Makati City ', 5000, '<p style=\"user-select: auto;\"><span style=\"font-family: Arial; user-select: auto;\">﻿</span><span style=\"font-family: Arial; user-select: auto;\">﻿</span><span style=\"user-select: auto;\">This newly built 3,880 sq. ft. south-facing house is situated in a large, secluded, and quiet plot of <b>28,821 sq</b>. ft.<br style=\"user-select: auto;\"></span><span style=\"text-align: var(--bs-body-text-align); user-select: auto;\">It is protected from the north-east winds in the winter months, whilst enjoying the light east/southeast winds in <br style=\"user-select: auto;\">the summer months, making it cool year-rou</span><span style=\"text-align: var(--bs-body-text-align); user-select: auto;\">nd.</span></p>', 2, '2022-02-25 18:26:33'),
(19, 'Blk 5 Lot 2 Elysium St. Phase 5 Ely Homes San Lorenzo Makati City ', 5000, '<p style=\"user-select: auto;\"><span style=\"color: rgb(44, 44, 45); font-family: -apple-system, BlinkMacSystemFont, \"Segoe UI\", Roboto, \"Droid Sans\", \"Helvetica Neue\", sans-serif; white-space: pre-wrap; user-select: auto;\">4 bedrooms, master bedroom has a balcony facing the garden (2 upstairs and 2\r\non the ground floor) All bedrooms have ceiling fans, master bedroom with split type\r\ninverter AC</span><br style=\"user-select: auto;\"></p>', 0, '2022-02-25 18:29:07'),
(20, 'Blk 4 Lot 2 Elysium St. Phase 5 Ely Homes San Lorenzo Makati City ', 6999, '<p>Boasting an array of sleek finishes and a thoughtful open plan layout, this immaculate 1-bedroom, 1-bathroom condo is a paradigm of contemporary Elysium living. Features of this 50 sqm.<br></p>', 0, '2022-03-04 03:13:41'),
(21, 'Blk 6 Lot 2 Elysium St. Phase 6 Ely Homes San Lorenzo Makati City ', 9499, '<p><span style=\"color: rgb(38, 38, 38); font-family: \"PT Sans Caption\"; font-size: 18px; font-style: italic;\">This 3 Bedroom W/ 2 Full Bathroom Ranch Home Is Immaculate & Full Of Upgrades! Enjoy The Open Floor Plan W/ Vaulted 15ft Ceilings & Large Windows Throughout.</span><br></p>', 0, '2022-03-04 03:16:07'),
(22, 'Blk 7 Lot 2 Elysium St. Phase 6 Ely Homes San Lorenzo Makati City ', 10000, '<p><span style=\"color: rgb(34, 34, 34); font-family: \"2\", \"Helvetica Neue\", sans-serif;\">Spacious, sun-filled corner studio located in the premier full-service Makati, in the heart of the Elysium. This cozy home can easily accommodate a living area, bedroom, and dining.</span><br></p>', 0, '2022-03-04 03:19:45'),
(23, 'Blk 9 Lot 2 Elysium St. Phase 5 Ely Homes San Lorenzo Makati City ', 9500, '<p>Adorable Cape Cod on nearly an acre that is ready to move into right away! Beautiful hardwood floors and carpet, a large master bathroom with double sinks, and his and her master bedroom closets.</p>', 0, '2022-03-04 03:27:16'),
(24, 'Blk 10 Lot 7 Elysium St. Phase 5 Ely Homes San Lorenzo Makati City ', 5999, '<p>Enjoy your own space and privacy in this beautifully updated one-story home, which comes fully furnished. Would make an excellent full-time residence or investment property in Elysium.<br></p>', 0, '2022-03-04 03:34:01'),
(25, 'Blk 11 Lot 7 Elysium St. Phase 1 Ely Homes San Lorenzo Makati City ', 7000, '<p>A beautiful, spacious townhome with an open floor plan awaits you! Enjoy a private wooded view from the deck, as well as upgrades galore throughout this lovely home.</p><div><br></div>', 0, '2022-03-04 03:37:26');

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
(13, 25, 8549, '<p>paid via credit card</p>', '2022-03-25', 0, '2022-03-04 04:28:43'),
(14, 26, 13646, '<p>paid via cheque</p>', '2022-04-13', 0, '2022-03-04 04:29:11'),
(15, 27, 15098, '<p>paid via credit card</p>', '2022-04-23', 0, '2022-03-04 04:31:53'),
(16, 28, 14230, '<p>paid via e-wallet</p>', '2022-04-08', 0, '2022-03-04 04:33:16'),
(17, 29, 12125, '<p>pay your debts</p>', '2022-05-11', 0, '2022-03-04 04:33:40'),
(18, 30, 13548, '<p>paid via bank</p>', '2022-03-30', 0, '2022-03-04 04:35:18'),
(19, 32, 19752, '<p>paid via bank</p>', '2022-05-09', 0, '2022-03-04 04:35:52'),
(20, 24, 5000, '<p>paid via credit card, balance is 4000</p>', '2022-03-31', 0, '2022-03-04 05:44:34'),
(21, 29, 1900, '<p>paid via swiss bank, balance is 10225</p>', '2022-04-15', 2, '2022-03-04 05:44:49'),
(23, 23, 12500, 'ok update', '2022-01-08', 0, '2022-03-06 22:03:30');

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
(24, 26, 15, 0, '2022-02-26 23:52:30'),
(25, 30, 16, 1, '2022-02-26 23:52:46'),
(26, 54, 15, 1, '2022-03-04 03:38:15'),
(27, 47, 25, 1, '2022-03-04 03:38:53'),
(28, 44, 24, 1, '2022-03-04 03:39:07'),
(29, 42, 23, 1, '2022-03-04 03:39:16'),
(30, 54, 22, 1, '2022-03-04 03:40:14'),
(31, 52, 22, 0, '2022-03-04 03:40:30'),
(32, 51, 21, 1, '2022-03-04 03:41:08'),
(33, 26, 15, 1, '2022-03-04 03:41:18'),
(34, 52, 17, 1, '2022-03-04 03:41:38'),
(35, 48, 16, 1, '2022-03-04 03:42:00'),
(36, 45, 15, 1, '2022-03-04 03:42:17'),
(38, 26, 16, 1, '2022-03-07 01:47:16'),
(39, 27, 16, 0, '2022-03-07 01:49:34');

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
(1, 'Judell', 'Mejorada', 'mejoradajudell15@gmail.com', '09774839769', 'portia', '6eff92a1f825007bb44d712247a565c0elysium', 1, 1, '2022-01-22 11:59:43'),
(26, 'Mark', 'Banaba', 'markbanaba@yahoo.com', '09635056582', 'qqq', '', 0, 1, '2022-02-25 07:24:20'),
(27, 'Anne', 'Polly', 'anne@gmail.com', '09702832323', '123', '', 0, 1, '2022-02-26 11:20:10'),
(28, 'Loraine', 'Naval', 'loraine5@gmail.com', '09812324143', 'qqq', '', 0, 1, '2022-02-26 18:00:21'),
(29, 'Hannah', 'Cordelia', 'cordelia101@gmail.com', '09702832323', '123', '', 0, 2, '2022-02-26 23:04:53'),
(30, 'Warren', 'Sy', 'warrrensy@gmail.com', '09702832322', '1234567', '', 0, 1, '2022-02-26 23:07:19'),
(31, 'John Aron', 'Locked', 'johnaron@gmail.com', '09702832326', 'locked', '', 0, 2, '2022-02-26 23:08:20'),
(32, 'Daniel', 'Fegason', 'danielfegason@gmail.com', '09102832324', 'rolly', '', 0, 2, '2022-02-26 23:09:46'),
(33, 'Loraine', 'Naval', 'meme@gmail.com', '0971237123', '111', '', 0, 1, '2022-03-02 16:43:02'),
(34, 'Judell', 'Mejorada', 'mejoradajudell@yahoo.com', '9635056582', 'okay', '', 0, 0, '2022-03-03 14:24:37'),
(35, 'Ferdinand ', 'Marcos', 'martiallaw@gmail.com', '09557115823', 'diktadorako', '', 0, 1, '2022-03-04 02:20:40'),
(36, 'Perla', 'Aventura', 'perlaaventura06@yahoo.com', '09582240125', 'perla12345', '', 0, 1, '2022-03-04 02:21:41'),
(37, 'Walter ', 'White', 'walterwhite@hotmail.com', '09922215367', 'breakingbad', '', 0, 2, '2022-03-04 02:23:03'),
(38, 'Saul', 'Goodman', 'bettercallsaul@gmail.com', '09202533507', 'slippinjimmy', '', 0, 1, '2022-03-04 02:23:57'),
(39, 'Tobey ', 'Maguire', 'bestspiderman@gmail.com', '09555285199', 'tobeyvincent', '', 0, 1, '2022-03-04 02:25:17'),
(40, 'Chadwick', 'Boseman', 'wakandaforever@gmail.com', '09974220015', 'blackpanther', '', 0, 1, '2022-03-04 02:27:43'),
(41, 'Corey', 'Taylor', 'slipknot@gmail.com', '09666111999', 'psychosocial', '', 0, 1, '2022-03-04 02:31:39'),
(42, 'Taylor', 'Swift', 'alltoowell@gmail.com', '09123456776', 'tayloralison', '', 0, 1, '2022-03-04 02:32:40'),
(43, 'Oliver', 'Sykes', 'bringmethehorizonuk@gmail.com', '09992216347', 'sempiternal', '', 0, 1, '2022-03-04 02:33:20'),
(44, 'Hayley Nichole', 'Williams', 'petalsforarmor@gmail.com', '09777641231', 'paramore', '', 0, 1, '2022-03-04 02:34:36'),
(45, 'Sabine ', 'Callas', 'vipertoxic@gmail.com', '09876458989', 'snakebite', '', 0, 1, '2022-03-04 02:35:33'),
(46, 'Avril', 'Lavigne', 'lovesux143@yahoo.com', '09344571123', 'imwithyou', '', 0, 1, '2022-03-04 02:36:40'),
(47, 'Eren', 'Yeager', 'rumblingiscoming@gmail.com', '09025889109', 'mikasa', '', 0, 1, '2022-03-04 02:37:28'),
(48, 'Myoui', ' Mina', 'sharonpenguin@gmail.com', '09026812258', 'twice', '', 0, 1, '2022-03-04 02:38:24'),
(49, 'Marshall ', 'Mathers', 'realslimshady@gmail.com', '09092261277', 'no1rapper', '', 0, 1, '2022-03-04 02:40:10'),
(50, 'Ji Min', 'Yu', 'aespa@gmail.com', '09928525512', 'yujimin', '', 0, 1, '2022-03-04 02:41:32'),
(51, 'Levi', 'Ackerman', 'zekesdaddy@gmail.com', '09143619069', 'strong', '', 0, 1, '2022-03-04 02:43:13'),
(52, 'Cardo', 'Dalisay', 'talamattalahat@yahoo.com', '09922188554', 'coco', '', 0, 1, '2022-03-04 02:45:12'),
(53, 'Jayson', 'Tatum', 'celtics0@yahoo.com', '09002422611', 'duke', '', 0, 1, '2022-03-04 02:46:39'),
(54, 'Jennie', 'Ruby', 'blackpinkhiatus@gmail.com', '095595857567', 'kai', '', 0, 1, '2022-03-04 02:48:52');

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
  MODIFY `bill_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `house`
--
ALTER TABLE `house`
  MODIFY `house_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `tenant`
--
ALTER TABLE `tenant`
  MODIFY `tenant_id` int(199) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
