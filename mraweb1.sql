-- phpMyAdmin SQL Dump
-- version 5.2.1deb3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Dec 06, 2025 at 09:29 AM
-- Server version: 8.0.43-0ubuntu0.24.04.2
-- PHP Version: 8.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mraweb`
--

-- --------------------------------------------------------

--
-- Table structure for table `attandance`
--

CREATE TABLE `attandance` (
  `id` int NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `ic` char(14) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `timein` time DEFAULT NULL,
  `timeout` time DEFAULT NULL,
  `date` date DEFAULT NULL,
  `reason` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `attandance`
--

INSERT INTO `attandance` (`id`, `name`, `ic`, `timein`, `timeout`, `date`, `reason`, `update`) VALUES
(1, 'MOHAMAD FARISH SYAH DANIAL BIN TUKIMAN', '000922012519', '15:12:46', '00:00:00', '2025-11-24', 'Hujan', '2025-11-24 07:12:52'),
(3, 'MOHAMAD FARISH SYAH DANIAL BIN TUKIMAN', '000922012519', '08:14:26', '00:00:00', '2025-11-25', '', '2025-11-25 00:14:43'),
(4, 'MOHAMAD FARISH SYAH DANIAL BIN TUKIMAN', '000922012519', '07:31:24', '00:00:00', '2025-11-26', '', '2025-11-25 23:31:27'),
(5, 'AZLIN NATASHA BINTI AZAHAR', '980203565340', '17:40:09', '21:01:04', '2025-11-26', 'hujan', '2025-11-26 13:01:05'),
(6, 'IKHWAN DARWISH BIN AHMAD JAIDI', '01051710717', '10:59:34', '00:00:00', '2025-11-27', '', '2025-11-27 02:59:35'),
(7, 'IKHWAN DARWISH BIN AHMAD JAIDI', '01051710717', '07:48:06', '00:00:00', '2025-11-28', '', '2025-11-27 23:48:08'),
(9, 'IKHWAN DARWISH BIN AHMAD JAIDI', '01051710717', '08:01:53', '00:00:00', '2025-12-01', '', '2025-12-01 00:01:54'),
(15, 'IKHWAN DARWISH BIN AHMAD JAIDI', '01051710717', '20:41:55', '22:18:22', '2025-12-03', '', '2025-12-03 14:18:24'),
(16, 'MOHAMAD FARISH SYAH DANIAL BIN TUKIMAN', '000922012519', '08:12:55', '00:00:00', '2025-12-04', '', '2025-12-04 00:12:57');

-- --------------------------------------------------------

--
-- Table structure for table `dateleave`
--

CREATE TABLE `dateleave` (
  `id` int NOT NULL,
  `ic` varchar(14) NOT NULL,
  `dateleave` date NOT NULL,
  `updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `dateleave`
--

INSERT INTO `dateleave` (`id`, `ic`, `dateleave`, `updated`) VALUES
(1, '001221140176', '2025-11-05', '2025-12-06 09:23:48'),
(2, '001221140176', '2025-11-06', '2025-12-06 09:23:48'),
(3, '000922012519', '2025-11-13', '2025-12-06 09:23:48'),
(4, '980203565340', '2026-01-26', '2025-12-06 09:23:48'),
(5, '980203565340', '2026-01-27', '2025-12-06 09:23:48'),
(6, '980203565340', '2026-01-28', '2025-12-06 09:23:48'),
(7, '980203565340', '2026-01-29', '2025-12-06 09:23:48'),
(8, '980203565340', '2026-01-30', '2025-12-06 09:23:48'),
(9, '980203565340', '2026-01-31', '2025-12-06 09:23:48'),
(10, '980203565340', '2026-02-01', '2025-12-06 09:23:48'),
(11, '980203565340', '2026-02-02', '2025-12-06 09:23:48'),
(12, '980203565340', '2026-02-03', '2025-12-06 09:23:48'),
(13, '980203565340', '2026-02-04', '2025-12-06 09:23:48'),
(14, '980203565340', '2026-02-05', '2025-12-06 09:23:48'),
(15, '980203565340', '2026-02-06', '2025-12-06 09:23:48'),
(16, '000922012519', '2025-12-06', '2025-12-06 09:23:48'),
(17, '000922012519', '2025-12-07', '2025-12-06 09:23:48'),
(18, '000922012519', '2025-12-08', '2025-12-06 09:23:48'),
(19, '000922012519', '2025-12-09', '2025-12-06 09:23:48'),
(20, '000922012519', '2025-12-10', '2025-12-06 09:23:48'),
(21, '000922012519', '2025-12-11', '2025-12-06 09:23:48'),
(22, '000922012519', '2025-12-12', '2025-12-06 09:23:48');

-- --------------------------------------------------------

--
-- Table structure for table `download`
--

CREATE TABLE `download` (
  `id` int NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ic` char(14) COLLATE utf8mb4_unicode_ci NOT NULL,
  `namesave` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `download`
--

INSERT INTO `download` (`id`, `name`, `ic`, `namesave`, `url`, `created_at`, `updated_at`) VALUES
(1, 'MOHAMAD FARISH SYAH DANIAL BIN TUKIMAN', '000922012519', 'garam madu', 'bhXL4B00j3Q.mp3', '2025-03-27 23:01:35', '2025-03-27 23:01:35'),
(6, 'MOHAMAD FARISH SYAH DANIAL BIN TUKIMAN', '000922012519', 'Rindu Semalam', 'OXqZXTQUlso.mp3', '2025-04-09 23:06:51', '2025-04-09 23:06:51');

-- --------------------------------------------------------

--
-- Table structure for table `list_quotation`
--

CREATE TABLE `list_quotation` (
  `id` int NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date` date DEFAULT NULL,
  `qtnno` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hours` int DEFAULT NULL,
  `manhour` decimal(10,2) DEFAULT NULL,
  `manhourcost` decimal(10,2) DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `list_quotation`
--

INSERT INTO `list_quotation` (`id`, `name`, `date`, `qtnno`, `description`, `hours`, `manhour`, `manhourcost`, `updated_at`) VALUES
(1, 'AZLIN NATASHA BINTI AZAHAR', '2025-11-06', 'dgdsgsd', 'asdfsafa', 2, 150.00, 300.00, '2025-11-06 12:09:56'),
(3, 'AZLIN NATASHA BINTI AZAHAR', '2025-11-06', 'asfasfasf', 'sadshg', 2, 150.00, 300.00, '2025-11-06 12:26:56'),
(5, 'NURUL SYUHADAH', '2025-11-09', 'QYN-6543', 'sfs', 2, 150.00, 300.00, '2025-11-09 03:13:22'),
(16, 'NURUL SYUHADAH', '2025-11-09', 'QYN-6543', 'wrwc ertwv', 4, 150.00, 600.00, '2025-11-11 05:39:38'),
(17, 'NURUL SYUHADAH', '2025-11-09', 'QYN-6543', 'fsaf', 4, 150.00, 600.00, '2025-11-11 05:46:31'),
(18, 'NURUL SYUHADAH', '2025-11-09', 'QYN-6543', 'dgsd', 3, 150.00, 450.00, '2025-11-11 05:55:11');

-- --------------------------------------------------------

--
-- Table structure for table `list_request`
--

CREATE TABLE `list_request` (
  `id` int NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `date` date NOT NULL,
  `appoinment` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `link` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `descriptions` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `quantity` char(10) COLLATE utf8mb4_general_ci NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `amount` decimal(10,2) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `list_request`
--

INSERT INTO `list_request` (`id`, `name`, `date`, `appoinment`, `link`, `descriptions`, `quantity`, `price`, `amount`) VALUES
(1, 'MOHAMAD FARISH SYAH DANIAL BIN TUKIMAN', '2025-10-29', 'Job TRML', 'https://www.youtube.com/watch?v=5Q1f7a49-N8&t=3907s', 'barang spepart', '2', 100.00, 200.00),
(5, 'NURUL SYUHADAH', '2025-12-04', 'keperluan trml', 'https://www.youtube.com/watch?v=5Q1f7a49-N8&t=3907s', 'power supply 30 V', '5', 100.00, 500.00),
(3, 'MOHAMAD FARISH SYAH DANIAL BIN TUKIMAN', '2025-10-29', 'Job TRML', 'https://www.youtube.com/watch?v=5Q1f7a49-N8&t=3907s', 'bateri', '3', 60.00, 180.00);

-- --------------------------------------------------------

--
-- Table structure for table `mra_claim`
--

CREATE TABLE `mra_claim` (
  `id` int NOT NULL,
  `apply` date NOT NULL,
  `tajuk` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `ic` varchar(14) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `status` char(11) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `folder` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `excel` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `mra_claim`
--

INSERT INTO `mra_claim` (`id`, `apply`, `tajuk`, `ic`, `status`, `folder`, `excel`, `updated`) VALUES
(1, '2025-08-17', 'CLAIM BULAN 8', '000922012519', '1', 'MOHAMAD FARISH SYAH DANIAL BIN TUKIMAN(Aug 2025).pdf', '', '2025-09-02 04:22:40'),
(6, '2025-09-25', 'CLAIM BULAN 9', '000922012519', '1', 'MOHAMAD FARISH(Sep 2025) (1).pdf', 'MOHAMAD FARISH(Sep 2025) (1).xlsx', '2025-10-01 08:02:55');

-- --------------------------------------------------------

--
-- Table structure for table `mra_claims`
--

CREATE TABLE `mra_claims` (
  `id` int NOT NULL,
  `date` date NOT NULL,
  `noic` varchar(14) COLLATE utf8mb4_general_ci NOT NULL,
  `purpose` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `details` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `status` char(11) COLLATE utf8mb4_general_ci NOT NULL,
  `resit` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `amount` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `mra_claims`
--

INSERT INTO `mra_claims` (`id`, `date`, `noic`, `purpose`, `details`, `status`, `resit`, `amount`) VALUES
(1, '2024-08-20', '000922012519', 'TRIP MEMPAGA', 'LAPANG SASAR 200 METER', '2', '', 40.00),
(2, '2024-08-21', '000922012519', 'TRIP MEMPAGA', 'LAPANG SASAR 200 METER', '2', '', 40.00),
(3, '2024-08-22', '000922012519', 'TRIP MEMPAGA', 'LAPANG SASAR 200 METER', '2', '', 25.00),
(4, '2024-08-20', '000922012519', 'TRIP MEMPAGA', 'LAPANG SASAR 200 METER', '1', '', 40.00),
(11, '2024-01-04', '000922012519', 'TRIP TO MEMPAGA', 'LAPANG SASAR 200 METER', '1', '', 25.00),
(12, '2024-09-05', '000922012519', 'TRIP TO MEMPAGA', 'LAPANG SASAR 200 METER', '1', '', 25.00),
(13, '2024-09-10', '000922012519', 'TRIP TO MEMPAGA', 'LAPANG SASAR 200 METER', '1', '', 40.00),
(14, '2024-09-11', '000922012519', 'TRIP TO MEMPAGA', 'LAPANG SASAR 200 METER', '1', '', 25.00),
(15, '2024-09-12', '000922012519', 'TRIP TO MEMPAGA', 'LAPANG SASAR 200 METER', '1', '', 25.00),
(16, '2024-02-29', '000922012519', 'TRIP TO MEMPAGA', 'LAPANG SASAR 200 METER', '1', '', 25.00),
(17, '2024-10-04', '000922012519', 'TRIP TO MEMPAGA', 'LAPANG SASAR 200 METER', '1', '', 25.00),
(18, '2024-10-09', '000922012519', 'TRIP TO MEMPAGA', 'LAPANG SASAR 200 METER', '1', '', 40.00),
(19, '2024-10-10', '000922012519', 'TRIP TO MEMPAGA', 'LAPANG SASAR 200 METER', '1', '', 40.00),
(20, '2024-10-11', '000922012519', 'TRIP TO MEMPAGA', 'LAPANG SASAR 200 METER', '1', '', 25.00),
(21, '2024-10-19', '000922012519', 'TRIP TO SEREMBAN', 'ROBOT', '1', '', 40.00),
(22, '2024-10-20', '000922012519', 'TRIP TO SEREMBAN', 'ROBOT', '1', '', 25.00),
(42, '2025-02-06', '000922012519', 'TRIP TO MERSING', 'LAPANG SASAR 200 METER', '1', '', 25.00),
(44, '2025-03-16', '000922012519', 'TRIP MERSING', 'LAPANG SASAR 600 METER', '1', '', 40.00),
(49, '2025-04-15', '000922012519', 'TRIP MEMPAGA', 'LAPANG SASAR 200 METER', '1', '', 25.00),
(50, '2025-04-16', '000922012519', 'TRIP MEMPAGA', 'LAPANG SASAR 200 METER', '1', '', 25.00),
(51, '2025-04-18', '000922012519', 'TRIP MEMPAGA', 'LAPANG SASAR 200 METER', '1', '', 25.00),
(52, '2025-04-22', '000922012519', 'TRIP MERSING', 'LAPANG SASAR 600 METER', '1', '', 40.00),
(53, '2025-04-23', '000922012519', 'TRIP MERSING', 'LAPANG SASAR 600 METER', '1', '', 25.00),
(54, '2025-04-30', '000922012519', 'TRIP MEMPAGA', 'LAPANG SASAR 200 METER', '1', '', 25.00),
(58, '2025-05-06', '000922012519', 'TRIP MEMPAGA', 'LAPANG SASAR 200 METER', '1', '', 25.00),
(59, '2025-05-13', '000922012519', 'TRIP MEMPAGA', 'LAPANG SASAR 200 METER', '1', '', 25.00),
(60, '2025-05-14', '000922012519', 'TRIP MEMPAGA', 'LAPANG SASAR 200 METER', '1', '', 25.00),
(62, '2025-05-15', '000922012519', 'TRIP TO MEMPAGA', 'LAPANG SASAR 200 METER', '1', '', 25.00),
(63, '2025-05-20', '000922012519', 'TRIP TO MEMPAGA', 'LAPANG SASAR 200 METER', '1', '', 25.00),
(64, '2025-05-21', '000922012519', 'TRIP TO MEMPAGA', 'LAPANG SASAR 200 METER', '1', '', 25.00),
(65, '2025-05-22', '000922012519', 'TRIP TO MEMPAGA', 'LAPANG SASAR 200 METER', '1', '', 25.00),
(66, '2025-05-27', '000922012519', 'TRIP MEMPAGA', 'LAPANG SASAR 200 METER', '1', '', 25.00),
(67, '2025-05-28', '000922012519', 'TRIP MEMPAGA', 'LAPANG SASAR 200 METER', '1', '', 25.00),
(68, '2025-06-03', '000922012519', 'TRIP MEMPAGA', 'LAPANG SASAR 200 METER', '1', '', 25.00),
(69, '2025-06-04', '000922012519', 'TRIP MEMPAGA', 'LAPANG SASAR 200 METER', '1', '', 25.00),
(70, '2025-06-05', '000922012519', 'TRIP MEMPAGA', 'LAPANG SASAR 200 METER', '1', '', 25.00),
(71, '2025-06-09', '000922012519', 'TRIP MEMPAGA', 'LAPANG SASAR 200 METER', '1', '', 25.00),
(72, '2025-06-10', '000922012519', 'TRIP MEMPAGA', 'LAPANG SASAR 200 METER', '1', '', 25.00),
(73, '2025-06-11', '000922012519', 'TRIP MEMPAGA', 'LAPANG SASAR 200 METER', '1', '', 25.00),
(74, '2025-06-12', '000922012519', 'TRIP MEMPAGA', 'LAPANG SASAR 200 METER', '1', '', 25.00),
(75, '2025-06-13', '000922012519', 'TRIP MEMPAGA', 'LAPANG SASAR 200 METER', '1', '', 25.00),
(76, '2025-06-19', '000922012519', 'TRIP MEMPAGA', 'LAPANG SASAR 200 METER', '1', '', 25.00),
(78, '2025-06-25', '000922012519', 'TRIP MEMPAGA', 'LAPANG SASAR 200 METER', '1', '', 25.00),
(80, '2025-06-26', '000922012519', 'TRIP TO MEMPAGA', 'LAPANG SASAR 600 METER', '1', '', 25.00),
(81, '2025-06-27', '000922012519', 'TRIP TO MEMPAGA', 'LAPANG SASAR 200 METER', '1', '', 25.00),
(82, '2025-06-28', '000922012519', 'TRIP TO MEMPAGA', 'LAPANG SASAR 200 METER', '1', '', 25.00),
(83, '2025-06-29', '000922012519', 'TRIP TO MEMPAGA', 'LAPANG SASAR 200 METER', '1', '', 25.00),
(84, '2025-06-30', '000922012519', 'TRIP TO MEMPAGA', 'LAPANG SASAR 200 METER', '1', '', 25.00),
(85, '2025-07-03', '000922012519', 'TRIP TO KUANTAN', 'SEMULATOR ADNAN', '1', '', 40.00),
(86, '2025-07-04', '000922012519', 'TRIP TO KUANTAN', 'SEMULATOR ADNAN', '1', '', 40.00),
(87, '2025-07-05', '000922012519', 'TRIP TO KUANTAN', 'SEMULATOR ADNAN ', '1', '', 25.00),
(88, '2025-07-21', '000922012519', 'TRIP MEMPAGA', 'LAPANG SASAR 200 METER', '1', '', 25.00),
(89, '2025-07-22', '000922012519', 'TRIP TO MERSING', 'LAPANG SASAR 600 METER', '1', '', 40.00),
(90, '2025-07-23', '000922012519', 'TRIP TO MERSING', 'LAPANG SASAR 600 METER', '1', '', 40.00),
(91, '2025-07-24', '000922012519', 'TRIP TO MERSING', 'LAPANG SASAR 600 METER', '1', '', 40.00),
(92, '2025-07-25', '000922012519', 'TRIP TO MERSING', 'LAPANG SASAR 600 METER', '1', '', 25.00),
(93, '2025-08-14', '980203565340', 'OFFICE KL ', 'CLAIM STATIONARY KUALA LUMPUR  OFFICE', '1', '', 50.00),
(95, '2025-08-06', '000922012519', 'TRIP TO MERSING', 'LAPANG SASAR 600 METER', '1', '', 40.00),
(96, '2025-08-14', '000922012519', 'TNG CLAIM', 'TRIP TO  MEMPAGA', '1', '', 2.00),
(97, '2025-08-14', '000922012519', 'TNG CLAIM', 'TRIP MEMPAGA', '1', '', 6.00),
(103, '2025-11-04', '000922012519', 'TNG', 'TNG KL TO MERSING', '1', 'WhatsApp Image 2025-11-03 at 8.13.08 PM.jpeg', 330.00),
(106, '2025-10-29', '980203565340', 'TRIP PERAK', 'TRML', '1', '', 40.00),
(107, '2025-11-10', '001221140176', 'TRIP MERSING', 'LAPANG SASAR 600 METER', '1', '', 40.00),
(108, '2025-11-11', '001221140176', 'TNG', 'TNG KL - GEMAS', '1', 'WhatsApp Image 2025-11-03 at 8.13.08 PM (1).jpeg', 330.00),
(110, '2025-11-12', '000922012519', 'TRIP MERSING', 'LAPANG SASAR 600 METER', '1', '', 40.00),
(111, '2025-11-13', '000922012519', 'TRIP MERSING', 'LAPANG SASAR 600 METER', '1', '', 40.00),
(113, '2025-11-17', '000922012519', 'TRIP MEMPAGA', 'LAPANG SASAR 200 METER', '1', '', 40.00),
(118, '2025-11-18', '000922012519', 'TRIP MERSING', 'LAPANG SASAR 600 METER', '1', '', 40.00),
(120, '2025-11-20', '980203565340', 'TRIP MERSING', 'LAPANG SASAR 600 METER', '1', '', 40.00),
(121, '2025-11-25', '970218095135', 'TRIP MERSING', 'LAPANG SASAR 600 METER', '1', '', 40.00),
(122, '2025-11-26', '970218095135', 'TRIP MERSING', 'LAPANG SASAR 600 METER', '1', '', 40.00),
(128, '2025-12-03', '000922012519', 'TRIP MERSING', 'LAPANG SASAR 600 METER', '1', '', 40.00);

-- --------------------------------------------------------

--
-- Table structure for table `mra_leave`
--

CREATE TABLE `mra_leave` (
  `leaveid` int NOT NULL,
  `dateapply` date DEFAULT NULL,
  `nameapply` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `noic` varchar(14) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `position` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `status` int NOT NULL,
  `datestart` date DEFAULT NULL,
  `dateend` date DEFAULT NULL,
  `daysleave` varchar(5) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `purpose` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `contactno` varchar(14) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `matters` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `mc` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `statsupport` int NOT NULL,
  `namesupport` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `datestatsupport` date DEFAULT NULL,
  `statapprove` int NOT NULL,
  `nameapprove` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `datestatapprove` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `mra_leave`
--

INSERT INTO `mra_leave` (`leaveid`, `dateapply`, `nameapply`, `noic`, `position`, `status`, `datestart`, `dateend`, `daysleave`, `purpose`, `contactno`, `matters`, `mc`, `statsupport`, `namesupport`, `datestatsupport`, `statapprove`, `nameapprove`, `datestatapprove`) VALUES
(51, '2025-11-05', 'NURUL SYUHADAH', '001221140176', 'ADMIN', 1, '2025-11-05', '2025-11-06', '1', 'Balik Kampung', '0189178650', 'ANNUAL LEAVE', NULL, 0, '', NULL, 0, '', NULL),
(52, '2025-12-03', 'MOHAMAD FARISH SYAH DANIAL BIN TUKIMAN', '000922012519', 'SOFTWARE ENGINEER', 1, '2025-11-13', '2025-11-13', '1', 'cuti', '01156640727', 'ANNUAL LEAVE', NULL, 0, '', NULL, 0, '', NULL),
(53, '2025-12-03', 'AZLIN NATASHA BINTI AZAHAR', '980203565340', 'Admin Executive', 1, '2026-01-26', '2026-02-06', '10 ', 'UMRAH AZLIN NATASHA', '0176445413', 'ANNUAL LEAVE', NULL, 2, 'AMRI BIN YAHYA', '2025-12-03', 0, '', NULL),
(60, '2025-12-06', 'MOHAMAD FARISH SYAH DANIAL BIN TUKIMAN', '000922012519', 'SOFTWARE ENGINEER', 1, '2025-12-06', '2025-12-12', '7', 'Balik Kampung', '01156640727', 'ANNUAL LEAVE', NULL, 1, NULL, NULL, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `mra_outstation`
--

CREATE TABLE `mra_outstation` (
  `id` int NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `ic` char(14) COLLATE utf8mb4_general_ci NOT NULL,
  `datestart` date NOT NULL,
  `purpose` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `details` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `dateapply` date NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `mra_outstation`
--

INSERT INTO `mra_outstation` (`id`, `name`, `ic`, `datestart`, `purpose`, `details`, `dateapply`, `amount`, `updated_at`) VALUES
(1, 'MOHAMAD FARISH SYAH DANIAL BIN TUKIMAN', '000922012519', '2025-11-18', 'TRIP MERSING', 'LAPANG SASAR 600 METER', '2025-11-17', 40.00, '2025-11-17 13:37:03'),
(2, 'MOHAMAD FARISH SYAH DANIAL BIN TUKIMAN', '000922012519', '2025-11-19', 'TRIP MERSING', 'LAPANG SASAR 600 METER', '2025-11-18', 40.00, '2025-11-18 10:01:46'),
(3, 'MOHAMAD FARISH SYAH DANIAL BIN TUKIMAN', '000922012519', '2025-11-18', 'TRIP MERSING', 'LAPANG SASAR 600 METER', '2025-11-18', 40.00, '2025-11-18 13:30:59'),
(4, 'AZLIN NATASHA BINTI AZAHAR', '980203565340', '2025-11-20', 'TRIP MERSING', 'LAPANG SASAR 600 METER', '2025-11-20', 40.00, '2025-11-20 03:50:13'),
(5, 'MOHAMMAD AFFENDY BIN MOHD ASRI', '970218095135', '2025-11-25', 'TRIP MERSING', 'LAPANG SASAR 600 METER', '2025-11-25', 40.00, '2025-11-25 00:08:38'),
(6, 'MOHAMMAD AFFENDY BIN MOHD ASRI', '970218095135', '2025-11-26', 'TRIP MERSING', 'LAPANG SASAR 600 METER', '2025-11-26', 40.00, '2025-11-25 23:32:24'),
(11, 'MOHAMAD FARISH SYAH DANIAL BIN TUKIMAN', '000922012519', '2025-12-03', 'TRIP MERSING', 'LAPANG SASAR 600 METER', '2025-12-03', 40.00, '2025-12-03 11:55:08');

-- --------------------------------------------------------

--
-- Table structure for table `mra_staff`
--

CREATE TABLE `mra_staff` (
  `id` int NOT NULL,
  `id_user` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `icno` varchar(14) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `position` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `password` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `status` varchar(14) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `statattan` int DEFAULT NULL,
  `dateattan` date DEFAULT NULL,
  `timein` time DEFAULT NULL,
  `timeout` time DEFAULT NULL,
  `phoneno` varchar(14) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `bank_name` varchar(10) COLLATE utf8mb4_general_ci NOT NULL,
  `acc_no` varchar(30) COLLATE utf8mb4_general_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `syarikat` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `portfolio` varchar(50) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `mra_staff`
--

INSERT INTO `mra_staff` (`id`, `id_user`, `name`, `email`, `icno`, `position`, `password`, `status`, `statattan`, `dateattan`, `timein`, `timeout`, `phoneno`, `bank_name`, `acc_no`, `image`, `syarikat`, `portfolio`) VALUES
(3, 'wish', 'IKHWAN DARWISH BIN AHMAD JAIDI', 'ikhwan.awish@gmail.com', '01051710717', 'COMPUTER ENGINEER', 'mra123', 'STAFF', 1, '2025-12-04', '00:00:00', '00:00:00', '0125948508', 'Maybank', '162870151398', 'wish.png', 'LETILICA SDN BHD', 'Ikhwan Darwish CV.pdf'),
(5, 'fendy', 'MOHAMMAD AFFENDY BIN MOHD ASRI', 'mohammadaffendyasri@gmail.com', '970218095135', 'COMPUTER ENGINEER', 'mra123', 'STAFF', 1, '2025-12-04', '00:00:00', '00:00:00', '01172259030', 'Maybank', '162107427034', '', '', ''),
(6, 'farish', 'MOHAMAD FARISH SYAH DANIAL BIN TUKIMAN', 'farishtukiman@gmail.com', '000922012519', 'SOFTWARE ENGINEER', 'wak@2519', 'STAFF', 2, '2025-12-04', '08:12:55', '00:00:00', '01156640727', 'Bank Islam', '01032020736545', 'signature.png', 'LETILICA SDN BHD', 'CV Farish2.pdf'),
(12, 'AZLINNATASHA', 'AZLIN NATASHA BINTI AZAHAR', 'azlinnatasha8@gmail.com', '980203565340', 'Admin Executive', 'mra123', 'HR STAFF', 1, '2025-12-04', '00:00:00', '00:00:00', '0176445413', 'Maybank', '162200182861', '', 'MIM DEFENSE SDN BHD', ''),
(13, 'nuyull', 'NURUL SYUHADAH', 'nurulsyuhadaaa21@gmail.com', '001221140176', 'ADMIN', 'MRA123', 'HR STAFF', 1, '2025-12-04', '00:00:00', '00:00:00', '0189178650', 'Maybank', '164221637324', 'signature_nurul.png', 'MRA GLOBAL SDN BHD', ''),
(16, 'amri', 'AMRI BIN YAHYA', 'farishtukiman@gmail.com', '000922019851', 'SOFTWARE ENGINEER', 'mra123', 'LEADER STAFF', 1, '2025-12-04', '00:00:00', '00:00:00', '01156640727', 'Bank Islam', '01032020736545', 'signature_amri.png', 'LETILICA SDN BHD', ''),
(17, 'bad', 'BADRUL', 'farishtukiman@gmail.com', '000922014523', 'CEO', 'mra123', 'MANAGER', 1, '2025-12-04', '00:00:00', '00:00:00', '01156640727', '', '01032020733453', 'badrul_sign.png', 'LETILICA SDN BHD', ''),
(19, 'aizam', 'AIZAM', 'muhdaizam2003@gmail.com', '000922019836', 'SOFTWARE ENGINEER', '449610', 'STAFF', 1, '2025-12-04', '00:00:00', '00:00:00', '0188705012', 'Maybank', '164221637324', '', 'MRA GLOBAL SDN BHD', '');

-- --------------------------------------------------------

--
-- Table structure for table `mra_wfh`
--

CREATE TABLE `mra_wfh` (
  `id` int NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `ic` char(14) COLLATE utf8mb4_general_ci NOT NULL,
  `purpose` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `details` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `datesign` date NOT NULL,
  `dateapply` date NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `mra_wfh`
--

INSERT INTO `mra_wfh` (`id`, `name`, `ic`, `purpose`, `details`, `datesign`, `dateapply`, `updated_at`) VALUES
(2, 'IKHWAN DARWISH BIN AHMAD JAIDI', '01051710717', 'TAK TAHU', 'TAk TAHU', '2025-03-17', '2025-03-15', '2025-03-15 01:12:53'),
(3, 'MOHAMAD FARISH SYAH DANIAL BIN TUKIMAN', '000922012519', 'BALIK KAMPUNG', 'BALIK KAMPUNG', '2025-05-06', '2025-05-04', '2025-05-03 23:53:13'),
(4, 'MOHAMAD FARISH SYAH DANIAL BIN TUKIMAN', '000922012519', 'BALIK KAMPUNG', 'BALIK KAMPUNG', '2025-11-14', '2025-11-14', '2025-11-14 07:29:35');

-- --------------------------------------------------------

--
-- Table structure for table `notpresent`
--

CREATE TABLE `notpresent` (
  `id` int NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ic` varchar(14) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` date DEFAULT NULL,
  `matter` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `reason` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `quotation`
--

CREATE TABLE `quotation` (
  `id` int NOT NULL,
  `namecreate` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alamat1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alamat2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alamat3` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alamat4` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alamat5` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `qtnno` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date` date NOT NULL,
  `page` int DEFAULT NULL,
  `project` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contractno` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nodaftar` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remarks` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sparepartcost` decimal(10,2) DEFAULT NULL,
  `signmana` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` char(5) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `quotation`
--

INSERT INTO `quotation` (`id`, `namecreate`, `alamat1`, `alamat2`, `alamat3`, `alamat4`, `alamat5`, `qtnno`, `date`, `page`, `project`, `contractno`, `nodaftar`, `remarks`, `sparepartcost`, `signmana`, `name`, `status`, `created_at`) VALUES
(1, 'AZLIN NATASHA BINTI AZAHAR', 'NO 6 JALAN PERWIRA', 'KAMPUNG MELAYU', 'KANGKAR BAHRU', '83700 YONG PENG', 'JOHOR', 'dgdsgsd', '2025-11-06', 2, 'sdgdgsdgsd', 'dgsgsdgsd', 'gsdgsdg', 'sdgsdg', 7463.20, 'badrul_sign.png', 'BADRUL', '2', '2025-11-09 23:19:41'),
(2, 'AZLIN NATASHA BINTI AZAHAR', 'iuasgfg aisugfiuas asiugfiuaws asofghoas oashf asf', '', '', '', '', 'asfasfasf', '2025-11-06', 1, 'asfsaf', 'asfsa', 'fsafas', 'asfsa', 9370.20, 'badrul_sign.png', 'BADRUL', '3', '2025-11-09 23:22:33'),
(3, 'NURUL SYUHADAH', 'NO 6 JALAN PERIWRA', 'KAMPUNG MELAYU', 'KANGKAR BAHRU', '83700 YONG PENG', 'JOHOR', 'QYN-6543', '2025-11-09', 3, 'PEROLEHAN PERKHIDMATAN SENGGARAAN DAN MEMBEKALKAN ALAT GANTI SISTEM\r\nRADAR AMARAN TEMPATAN 3D/32 KEPADA RADAR 1001 DAN RADAR 1002 SECARA\r\nKOMPREHENSIF UNTUK TENTERA DARAT\r\n', 'KP/PERO1B/T300/2021/OE.Jil.3 bertarikh 3 Januari 2024', '4. KPR NOMBOR DAFTAR ZC 1437 : SPEEDOMETER', 'We hope our quotation is favouravle to you and we are looking forward to receive your valued orders. If you require further clarification, please do not hesitate to contact us.', 7620.50, NULL, NULL, '1', '2025-11-11 05:02:51');

-- --------------------------------------------------------

--
-- Table structure for table `request`
--

CREATE TABLE `request` (
  `id` int NOT NULL,
  `namestaff` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `dateapply` date NOT NULL,
  `syarikat` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `appoiment` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `department` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `supplirename` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `suppladderss` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `attention` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `termpayment` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `payto` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `accno` varchar(30) COLLATE utf8mb4_general_ci NOT NULL,
  `bankname` varchar(10) COLLATE utf8mb4_general_ci NOT NULL,
  `remark` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `signreq` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `signmanager` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `datemanager` varchar(10) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `signacc` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `dateacc` varchar(10) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `signdirector` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `datedirector` varchar(10) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `statusacc` int NOT NULL,
  `statusmana` int NOT NULL,
  `statusdirec` int NOT NULL,
  `refno` varchar(255) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `request`
--

INSERT INTO `request` (`id`, `namestaff`, `dateapply`, `syarikat`, `appoiment`, `department`, `supplirename`, `suppladderss`, `attention`, `termpayment`, `payto`, `accno`, `bankname`, `remark`, `signreq`, `signmanager`, `datemanager`, `signacc`, `dateacc`, `signdirector`, `datedirector`, `statusacc`, `statusmana`, `statusdirec`, `refno`) VALUES
(10, 'MOHAMAD FARISH SYAH DANIAL BIN TUKIMAN', '2025-10-29', NULL, 'Job TRML', 'WANGSA MAJU', 'SOFTWARE', 'WILAYAH PERSEKUTUAN', '-', 'Test', 'Test', 'Test', 'Test', 'Test', 'signature.png', 'badrul_sign.png', '2025-10-29', 'signature_nurul.png', '2025-11-03', 'NULL', '0000-00-00', 2, 2, 1, 'RQF (GMS)-MRA2302004'),
(12, 'NURUL SYUHADAH', '2025-12-04', 'MRA GLOBAL SDN BHD', 'keperluan trml', 'GEMAS', 'GEMAS MOTOR SERVICE', 'GEMAS NEGERI SEMBILAN', 'test', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'signature_nurul.png', 'NULL', '0000-00-00', 'NULL', '0000-00-00', 'NULL', '0000-00-00', 1, 1, 1, 'RQF (GMS)-MRA2302004');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `attandance`
--
ALTER TABLE `attandance`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dateleave`
--
ALTER TABLE `dateleave`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `download`
--
ALTER TABLE `download`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `list_quotation`
--
ALTER TABLE `list_quotation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `list_request`
--
ALTER TABLE `list_request`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mra_claim`
--
ALTER TABLE `mra_claim`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mra_claims`
--
ALTER TABLE `mra_claims`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mra_leave`
--
ALTER TABLE `mra_leave`
  ADD PRIMARY KEY (`leaveid`);

--
-- Indexes for table `mra_outstation`
--
ALTER TABLE `mra_outstation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mra_staff`
--
ALTER TABLE `mra_staff`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mra_wfh`
--
ALTER TABLE `mra_wfh`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notpresent`
--
ALTER TABLE `notpresent`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `quotation`
--
ALTER TABLE `quotation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `request`
--
ALTER TABLE `request`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `attandance`
--
ALTER TABLE `attandance`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `dateleave`
--
ALTER TABLE `dateleave`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `download`
--
ALTER TABLE `download`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `list_quotation`
--
ALTER TABLE `list_quotation`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `list_request`
--
ALTER TABLE `list_request`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `mra_claim`
--
ALTER TABLE `mra_claim`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `mra_claims`
--
ALTER TABLE `mra_claims`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=129;

--
-- AUTO_INCREMENT for table `mra_leave`
--
ALTER TABLE `mra_leave`
  MODIFY `leaveid` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `mra_outstation`
--
ALTER TABLE `mra_outstation`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `mra_staff`
--
ALTER TABLE `mra_staff`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `mra_wfh`
--
ALTER TABLE `mra_wfh`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `notpresent`
--
ALTER TABLE `notpresent`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `quotation`
--
ALTER TABLE `quotation`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `request`
--
ALTER TABLE `request`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;