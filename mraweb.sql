-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 16, 2025 at 04:30 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

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
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `ic` char(14) NOT NULL,
  `mac` char(20) NOT NULL,
  `ip` char(20) NOT NULL,
  `time` time NOT NULL,
  `date` date NOT NULL,
  `update` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `attandance`
--

INSERT INTO `attandance` (`id`, `name`, `ic`, `mac`, `ip`, `time`, `date`, `update`) VALUES
(1, 'MOHAMAD FARISH SYAH DANIAL BIN TUKIMAN', '000922012519', '8C:7A:3D:9F:13:16', '192.168.0.105', '08:07:13', '2025-03-15', '2025-03-15 00:07:13'),
(2, 'MUHAMMAD HAMSANI IRWAN BIN HAMZAH', '910309025613', '52:83:17:84:7D:3F', '192.168.0.109', '10:25:49', '2025-03-13', '2025-03-13 02:25:49'),
(3, 'AFIFFIKRI BIN AUSPAN', '941118146051', '1E:87:30:48:8F:36', '192.168.0.108', '08:35:30', '2025-03-13', '2025-03-13 00:35:31'),
(4, 'MOHAMMAD AFFENDY BIN MOHD ASRI', '970218095135', 'FC:18:3C:DF:E9:0E', '192.168.0.103', '08:07:59', '2025-03-15', '2025-03-15 00:07:59'),
(5, 'IKHWAN DARWISH BIN AHMAD JAIDI', '01051710717', 'C2:8C:29:B8:98:20', '192.168.0.102', '13:47:16', '2025-03-11', '2025-03-11 05:47:16');

-- --------------------------------------------------------

--
-- Table structure for table `download`
--

CREATE TABLE `download` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `ic` char(14) NOT NULL,
  `namesave` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
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
-- Table structure for table `mra_claim`
--

CREATE TABLE `mra_claim` (
  `id` int(11) NOT NULL,
  `apply` date DEFAULT NULL,
  `tajuk` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `ic` varchar(14) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `status` char(11) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `folder` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `updated` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `mra_claim`
--

INSERT INTO `mra_claim` (`id`, `apply`, `tajuk`, `ic`, `status`, `folder`, `updated`) VALUES
(1, '2025-08-15', 'CLAIM BULAN 8', '000922012519', '3', 'MOHAMAD FARISH SYAH DANIAL BIN TUKIMAN(Aug 2025).xlsx', '2025-08-15 06:51:33');

-- --------------------------------------------------------

--
-- Table structure for table `mra_claims`
--

CREATE TABLE `mra_claims` (
  `id` int(11) NOT NULL,
  `date` date NOT NULL,
  `noic` varchar(14) NOT NULL,
  `purpose` varchar(255) NOT NULL,
  `details` varchar(255) NOT NULL,
  `status` char(11) NOT NULL,
  `amount` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `mra_claims`
--

INSERT INTO `mra_claims` (`id`, `date`, `noic`, `purpose`, `details`, `status`, `amount`) VALUES
(1, '2024-08-20', '000922012519', 'TRIP MEMPAGA', 'LAPANG SASAR 200 METER', '1', 40.00),
(2, '2024-08-21', '000922012519', 'TRIP MEMPAGA', 'LAPANG SASAR 200 METER', '1', 40.00),
(3, '2024-08-22', '000922012519', 'TRIP MEMPAGA', 'LAPANG SASAR 200 METER', '1', 25.00),
(4, '2024-08-20', '000922012519', 'TRIP MEMPAGA', 'LAPANG SASAR 200 METER', '1', 40.00),
(11, '2024-01-04', '000922012519', 'TRIP TO MEMPAGA', 'LAPANG SASAR 200 METER', '1', 25.00),
(12, '2024-09-05', '000922012519', 'TRIP TO MEMPAGA', 'LAPANG SASAR 200 METER', '1', 25.00),
(13, '2024-09-10', '000922012519', 'TRIP TO MEMPAGA', 'LAPANG SASAR 200 METER', '1', 40.00),
(14, '2024-09-11', '000922012519', 'TRIP TO MEMPAGA', 'LAPANG SASAR 200 METER', '1', 25.00),
(15, '2024-09-12', '000922012519', 'TRIP TO MEMPAGA', 'LAPANG SASAR 200 METER', '1', 25.00),
(16, '2024-02-29', '000922012519', 'TRIP TO MEMPAGA', 'LAPANG SASAR 200 METER', '1', 25.00),
(17, '2024-10-04', '000922012519', 'TRIP TO MEMPAGA', 'LAPANG SASAR 200 METER', '1', 25.00),
(18, '2024-10-09', '000922012519', 'TRIP TO MEMPAGA', 'LAPANG SASAR 200 METER', '1', 40.00),
(19, '2024-10-10', '000922012519', 'TRIP TO MEMPAGA', 'LAPANG SASAR 200 METER', '1', 40.00),
(20, '2024-10-11', '000922012519', 'TRIP TO MEMPAGA', 'LAPANG SASAR 200 METER', '1', 25.00),
(21, '2024-10-19', '000922012519', 'TRIP TO SEREMBAN', 'ROBOT', '1', 40.00),
(22, '2024-10-20', '000922012519', 'TRIP TO SEREMBAN', 'ROBOT', '1', 25.00),
(28, '2024-11-04', '000922012519', 'TRIP TO SEREMBAN', 'ROBOT', '1', 25.00),
(29, '2024-11-05', '000922012519', 'TRIP TO MERSING', 'LAPANG SASAR 600 METER', '1', 40.00),
(31, '2024-11-06', '000922012519', 'TRIP TO MERSING', 'LAPANG SASAR 600 METER', '1', 40.00),
(32, '2024-11-07', '000922012519', 'TRIP TO MERSING', 'LAPANG SASAR 600 METER', '1', 25.00),
(34, '2024-11-14', '000922012519', 'TRIP TO PUDU', 'HANTAR ROBOT', '1', 25.00),
(35, '2024-11-25', '000922012519', 'TRIP TO MERSING', 'LAPANG SASAR 600 METER', '1', 40.00),
(36, '2024-11-26', '000922012519', 'TRIP TO MERSING', 'LAPANG SASAR 600 METER', '1', 40.00),
(37, '2024-11-27', '000922012519', 'TRIP TO MERSING', 'LAPANG SASAR 600 METER', '1', 25.00),
(38, '2024-12-11', '000922012519', 'TRIP TO GEMAS', 'ASTROS', '1', 40.00),
(39, '2024-12-12', '000922012519', 'TRIP TO GEMAS', 'ASTROS', '1', 25.00),
(40, '2024-12-13', '000922012519', 'TRIP TO GEMAS', 'ASTROS', '1', 25.00),
(42, '2025-02-06', '000922012519', 'TRIP TO MERSING', 'LAPANG SASAR 200 METER', '1', 25.00),
(44, '2025-03-16', '000922012519', 'TRIP MERSING', 'LAPANG SASAR 600 METER', '1', 40.00),
(49, '2025-04-15', '000922012519', 'TRIP MEMPAGA', 'LAPANG SASAR 200 METER', '1', 25.00),
(50, '2025-04-16', '000922012519', 'TRIP MEMPAGA', 'LAPANG SASAR 200 METER', '1', 25.00),
(51, '2025-04-18', '000922012519', 'TRIP MEMPAGA', 'LAPANG SASAR 200 METER', '1', 25.00),
(52, '2025-04-22', '000922012519', 'TRIP MERSING', 'LAPANG SASAR 600 METER', '1', 40.00),
(53, '2025-04-23', '000922012519', 'TRIP MERSING', 'LAPANG SASAR 600 METER', '1', 25.00),
(54, '2025-04-30', '000922012519', 'TRIP MEMPAGA', 'LAPANG SASAR 200 METER', '1', 25.00),
(58, '2025-05-06', '000922012519', 'TRIP MEMPAGA', 'LAPANG SASAR 200 METER', '1', 25.00),
(59, '2025-05-13', '000922012519', 'TRIP MEMPAGA', 'LAPANG SASAR 200 METER', '1', 25.00),
(60, '2025-05-14', '000922012519', 'TRIP MEMPAGA', 'LAPANG SASAR 200 METER', '1', 25.00),
(62, '2025-05-15', '000922012519', 'TRIP TO MEMPAGA', 'LAPANG SASAR 200 METER', '1', 25.00),
(63, '2025-05-20', '000922012519', 'TRIP TO MEMPAGA', 'LAPANG SASAR 200 METER', '1', 25.00),
(64, '2025-05-21', '000922012519', 'TRIP TO MEMPAGA', 'LAPANG SASAR 200 METER', '1', 25.00),
(65, '2025-05-22', '000922012519', 'TRIP TO MEMPAGA', 'LAPANG SASAR 200 METER', '1', 25.00),
(66, '2025-05-27', '000922012519', 'TRIP MEMPAGA', 'LAPANG SASAR 200 METER', '1', 25.00),
(67, '2025-05-28', '000922012519', 'TRIP MEMPAGA', 'LAPANG SASAR 200 METER', '1', 25.00),
(68, '2025-06-03', '000922012519', 'TRIP MEMPAGA', 'LAPANG SASAR 200 METER', '1', 25.00),
(69, '2025-06-04', '000922012519', 'TRIP MEMPAGA', 'LAPANG SASAR 200 METER', '1', 25.00),
(70, '2025-06-05', '000922012519', 'TRIP MEMPAGA', 'LAPANG SASAR 200 METER', '1', 25.00),
(71, '2025-06-09', '000922012519', 'TRIP MEMPAGA', 'LAPANG SASAR 200 METER', '1', 25.00),
(72, '2025-06-10', '000922012519', 'TRIP MEMPAGA', 'LAPANG SASAR 200 METER', '1', 25.00),
(73, '2025-06-11', '000922012519', 'TRIP MEMPAGA', 'LAPANG SASAR 200 METER', '1', 25.00),
(74, '2025-06-12', '000922012519', 'TRIP MEMPAGA', 'LAPANG SASAR 200 METER', '1', 25.00),
(75, '2025-06-13', '000922012519', 'TRIP MEMPAGA', 'LAPANG SASAR 200 METER', '1', 25.00),
(76, '2025-06-19', '000922012519', 'TRIP MEMPAGA', 'LAPANG SASAR 200 METER', '1', 25.00),
(78, '2025-06-25', '000922012519', 'TRIP MEMPAGA', 'LAPANG SASAR 200 METER', '1', 25.00),
(80, '2025-06-26', '000922012519', 'TRIP TO MEMPAGA', 'LAPANG SASAR 600 METER', '1', 25.00),
(81, '2025-06-27', '000922012519', 'TRIP TO MEMPAGA', 'LAPANG SASAR 200 METER', '1', 25.00),
(82, '2025-06-28', '000922012519', 'TRIP TO MEMPAGA', 'LAPANG SASAR 200 METER', '1', 25.00),
(83, '2025-06-29', '000922012519', 'TRIP TO MEMPAGA', 'LAPANG SASAR 200 METER', '1', 25.00),
(84, '2025-06-30', '000922012519', 'TRIP TO MEMPAGA', 'LAPANG SASAR 200 METER', '1', 25.00),
(85, '2025-07-03', '000922012519', 'TRIP TO KUANTAN', 'SEMULATOR ADNAN', '1', 40.00),
(86, '2025-07-04', '000922012519', 'TRIP TO KUANTAN', 'SEMULATOR ADNAN', '1', 40.00),
(87, '2025-07-05', '000922012519', 'TRIP TO KUANTAN', 'SEMULATOR ADNAN ', '1', 25.00),
(88, '2025-07-21', '000922012519', 'TRIP MEMPAGA', 'LAPANG SASAR 200 METER', '1', 25.00),
(89, '2025-07-22', '000922012519', 'TRIP TO MERSING', 'LAPANG SASAR 600 METER', '1', 40.00),
(90, '2025-07-23', '000922012519', 'TRIP TO MERSING', 'LAPANG SASAR 600 METER', '1', 40.00),
(91, '2025-07-24', '000922012519', 'TRIP TO MERSING', 'LAPANG SASAR 600 METER', '1', 40.00),
(92, '2025-07-25', '000922012519', 'TRIP TO MERSING', 'LAPANG SASAR 600 METER', '1', 25.00),
(93, '2025-08-14', '980203565340', 'OFFICE KL ', 'CLAIM STATIONARY KUALA LUMPUR  OFFICE', '1', 50.00),
(95, '2025-08-06', '000922012519', 'TRIP TO MERSING', 'LAPANG SASAR 600 METER', '', 40.00),
(96, '2025-08-14', '000922012519', 'TNG CLAIM', 'TRIP TO  MEMPAGA', '', 2.00),
(97, '2025-08-14', '000922012519', 'TNG CLAIM', 'TRIP MEMPAGA', '', 6.00);

-- --------------------------------------------------------

--
-- Table structure for table `mra_leave`
--

CREATE TABLE `mra_leave` (
  `leaveid` int(11) NOT NULL,
  `dateapply` date DEFAULT NULL,
  `nameapply` varchar(255) DEFAULT NULL,
  `noic` varchar(14) DEFAULT NULL,
  `position` varchar(100) DEFAULT NULL,
  `status` char(11) NOT NULL,
  `datestart` date DEFAULT NULL,
  `dateend` date DEFAULT NULL,
  `daysleave` varchar(5) DEFAULT NULL,
  `purpose` varchar(100) DEFAULT NULL,
  `contactno` varchar(14) DEFAULT NULL,
  `matters` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `mra_leave`
--

INSERT INTO `mra_leave` (`leaveid`, `dateapply`, `nameapply`, `noic`, `position`, `status`, `datestart`, `dateend`, `daysleave`, `purpose`, `contactno`, `matters`) VALUES
(6, '2024-09-27', 'MOHAMAD FARISH SYAH DANIAL BIN TUKIMAN', '000922012519', 'SOFTWARE ENGINEER', '1', '2024-10-01', '2024-10-02', '2', 'Balik Kampung', '01156640727', 'ANNUAL LEAVE'),
(7, '2024-09-27', 'MOHAMAD FARISH SYAH DANIAL BIN TUKIMAN', '000922012519', 'SOFTWARE ENGINEER', '1', '2024-10-01', '2024-10-02', '2', 'Balik Kampung', '01156640727', 'MEDICAL LEAVE'),
(8, '2024-09-27', 'MOHAMAD FARISH SYAH DANIAL BIN TUKIMAN', '000922012519', 'SOFTWARE ENGINEER', '1', '2024-09-28', '2024-09-28', '1', 'Balik Kampung', '01156640727', 'UNPAID LEAVE'),
(9, '2024-09-27', 'MOHAMAD FARISH SYAH DANIAL BIN TUKIMAN', '000922012519', 'SOFTWARE ENGINEER', '1', '2024-09-28', '2024-09-28', '1', 'Balik Kampung', '01156640727', 'ANNUAL LEAVE'),
(11, '2024-09-30', 'MOHAMAD FARISH SYAH DANIAL BIN TUKIMAN', '000922012519', 'SOFTWARE ENGINEER', '1', '2024-10-01', '2024-10-02', '2', 'Balik Kampung Isteri', '01156640727', 'MEDICAL LEAVE'),
(13, '2024-11-01', 'MOHAMMAD AFFENDY BIN MOHD ASRI', '970218095135', 'COMPUTER ENGINEER', '1', '2024-11-01', '2024-11-02', '2', 'Balik Kampung', '01172259030', 'ANNUAL LEAVE'),
(15, '2024-11-16', 'MOHAMAD FARISH SYAH DANIAL BIN TUKIMAN', '000922012519', 'SOFTWARE ENGINEER', '1', '2024-11-18', '2024-11-19', '1', 'Balik Kampung', '01156640727', 'ANNUAL LEAVE'),
(17, '2024-12-17', 'MOHAMAD FARISH SYAH DANIAL BIN TUKIMAN', '000922012519', 'SOFTWARE ENGINEER', '1', '2024-12-23', '2024-12-31', '7', 'Balik Kampung', '01156640727', 'ANNUAL LEAVE'),
(19, '2025-02-18', 'MOHAMAD FARISH SYAH DANIAL BIN TUKIMAN', '000922012519', 'SOFTWARE ENGINEER', '1', '2025-02-18', '2025-02-19', '2', 'Balik Kampung', '01156640727', 'ANNUAL LEAVE'),
(24, '2025-03-26', 'MOHAMAD FARISH SYAH DANIAL BIN TUKIMAN', '000922012519', 'SOFTWARE ENGINEER', '1', '2025-03-27', '2025-03-28', '1', 'BALIK KAMPUNG', '01156640727', 'ANNUAL LEAVE'),
(37, '2025-05-03', 'AZLIN', '0005654', 'HR', '1', '2025-05-05', '2025-05-06', '2', 'Balik Kampung', '017-6445413', 'ANNUAL LEAVE'),
(39, '2025-05-04', 'MOHAMAD FARISH SYAH DANIAL BIN TUKIMAN', '000922012519', 'SOFTWARE ENGINEER', '1', '2025-05-07', '2025-05-08', '2', 'Balik Kampung', '01156640727', 'ANNUAL LEAVE'),
(42, '2025-08-12', 'MOHAMAD FARISH SYAH DANIAL BIN TUKIMAN', '000922012519', 'SOFTWARE ENGINEER', '1', '2025-08-13', '2025-08-14', '1', 'Balik Kampung', '01156640727', 'ANNUAL LEAVE'),
(43, '2025-08-13', 'AZLIN NATASHA BINTI AZAHAR', '980203565340', 'Admin Executive', '1', '2025-09-12', '2025-09-12', '1', 'FAMILY MATTERS', '0176445413', 'ANNUAL LEAVE'),
(47, '2025-08-14', 'MOHAMAD FARISH SYAH DANIAL BIN TUKIMAN', '000922012519', 'SOFTWARE ENGINEER', '1', '2025-08-29', '2025-08-29', '1', 'Balik Kampung', '01156640727', 'ANNUAL LEAVE');

-- --------------------------------------------------------

--
-- Table structure for table `mra_office`
--

CREATE TABLE `mra_office` (
  `id` int(11) NOT NULL,
  `ic` char(14) NOT NULL,
  `inoffice` time NOT NULL,
  `outoffice` time DEFAULT NULL,
  `date_apply` date NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `mra_office`
--

INSERT INTO `mra_office` (`id`, `ic`, `inoffice`, `outoffice`, `date_apply`, `updated_at`) VALUES
(1, '000922012519', '19:04:44', '19:05:13', '2025-05-09', '2025-05-09 11:05:18'),
(2, '234523523', '19:05:58', '19:07:56', '2025-05-09', '2025-05-09 11:08:01');

-- --------------------------------------------------------

--
-- Table structure for table `mra_outstation`
--

CREATE TABLE `mra_outstation` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `ic` char(14) NOT NULL,
  `datestart` date NOT NULL,
  `purpose` varchar(255) NOT NULL,
  `details` varchar(255) NOT NULL,
  `dateapply` date NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `mra_outstation`
--

INSERT INTO `mra_outstation` (`id`, `name`, `ic`, `datestart`, `purpose`, `details`, `dateapply`, `updated_at`) VALUES
(1, 'MOHAMAD FARISH SYAH DANIAL BIN TUKIMAN', '000922012519', '2025-03-16', 'TRIP MERSING', 'LAPANG SASAR 600 METER', '2025-03-15', '2025-03-15 00:43:15'),
(3, 'MOHAMAD FARISH SYAH DANIAL BIN TUKIMAN', '000922012519', '2025-04-15', 'TRIP MEMPAGA', 'LAPANG SASAR 200 METER', '2025-04-17', '2025-04-16 22:34:28'),
(4, 'MOHAMAD FARISH SYAH DANIAL BIN TUKIMAN', '000922012519', '2025-04-16', 'TRIP MEMPAGA', 'LAPANG SASAR 200 METER', '2025-04-17', '2025-04-16 22:34:54'),
(5, 'MOHAMAD FARISH SYAH DANIAL BIN TUKIMAN', '000922012519', '2025-04-18', 'TRIP MEMPAGA', 'LAPANG SASAR 200 METER', '2025-04-22', '2025-04-21 21:54:08'),
(6, 'MOHAMAD FARISH SYAH DANIAL BIN TUKIMAN', '000922012519', '2025-04-22', 'TRIP MERSING', 'LAPANG SASAR 600 METER', '2025-04-22', '2025-04-21 21:54:43'),
(7, 'MOHAMAD FARISH SYAH DANIAL BIN TUKIMAN', '000922012519', '2025-04-23', 'TRIP MERSING', 'LAPANG SASAR 600 METER', '2025-04-22', '2025-04-21 21:54:59'),
(8, 'MOHAMAD FARISH SYAH DANIAL BIN TUKIMAN', '000922012519', '2025-04-30', 'TRIP MEMPAGA', 'LAPANG SASAR 200 METER', '2025-04-30', '2025-04-29 23:23:02');

-- --------------------------------------------------------

--
-- Table structure for table `mra_staff`
--

CREATE TABLE `mra_staff` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `icno` varchar(14) DEFAULT NULL,
  `position` varchar(100) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `status` varchar(14) DEFAULT NULL,
  `phoneno` varchar(14) DEFAULT NULL,
  `bank_name` varchar(10) NOT NULL,
  `acc_no` varchar(30) NOT NULL,
  `image` varchar(255) NOT NULL,
  `syarikat` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `mra_staff`
--

INSERT INTO `mra_staff` (`id`, `name`, `email`, `icno`, `position`, `password`, `status`, `phoneno`, `bank_name`, `acc_no`, `image`, `syarikat`) VALUES
(3, 'IKHWAN DARWISH BIN AHMAD JAIDI', 'ikhwan.awish@gmail.com', '01051710717', 'COMPUTER ENGINEER', 'mra123', 'STAFF', '0125948508', 'MAYBANK', '162870151398', 'wish.png', 'LETILICA SDN BHD'),
(5, 'MOHAMMAD AFFENDY BIN MOHD ASRI', 'mohammadaffendyasri@gmail.com', '970218095135', 'COMPUTER ENGINEER', 'mra123', 'STAFF', '01172259030', 'MAYBANK', '162107427034', '', ''),
(6, 'MOHAMAD FARISH SYAH DANIAL BIN TUKIMAN', 'farishtukiman@gmail.com', '000922012519', 'SOFTWARE ENGINEER', 'wak@2519', 'STAFF', '01156640727', 'BANK ISLAM', '01032020736545', 'signature.png', 'LETILICA SDN BHD'),
(12, 'AZLIN NATASHA BINTI AZAHAR', 'azlinnatasha8@gmail.com', '980203565340', 'Admin Executive', '488753', 'HR STAFF', '0176445413', 'Maybank', '162200182861', '', 'MIM DEFENSE SDN BHD'),
(13, 'NURUL SYUHADAH', 'nurulsyuhadaaa21@gmail.com', '001221140176', 'ADMIN', 'MRA123', 'HR STAFF', '0189178650', 'Maybank', '164221637324', '', 'MRA GLOBAL SDN BHD');

-- --------------------------------------------------------

--
-- Table structure for table `mra_wfh`
--

CREATE TABLE `mra_wfh` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `ic` char(14) NOT NULL,
  `purpose` varchar(255) NOT NULL,
  `details` varchar(255) NOT NULL,
  `datesign` date NOT NULL,
  `dateapply` date NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `mra_wfh`
--

INSERT INTO `mra_wfh` (`id`, `name`, `ic`, `purpose`, `details`, `datesign`, `dateapply`, `updated_at`) VALUES
(2, 'IKHWAN DARWISH BIN AHMAD JAIDI', '01051710717', 'TAK TAHU', 'TAk TAHU', '2025-03-17', '2025-03-15', '2025-03-15 01:12:53'),
(3, 'MOHAMAD FARISH SYAH DANIAL BIN TUKIMAN', '000922012519', 'BALIK KAMPUNG', 'BALIK KAMPUNG', '2025-05-06', '2025-05-04', '2025-05-03 23:53:13');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `attandance`
--
ALTER TABLE `attandance`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `download`
--
ALTER TABLE `download`
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
-- Indexes for table `mra_office`
--
ALTER TABLE `mra_office`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `attandance`
--
ALTER TABLE `attandance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `download`
--
ALTER TABLE `download`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `mra_claim`
--
ALTER TABLE `mra_claim`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `mra_claims`
--
ALTER TABLE `mra_claims`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=98;

--
-- AUTO_INCREMENT for table `mra_leave`
--
ALTER TABLE `mra_leave`
  MODIFY `leaveid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `mra_office`
--
ALTER TABLE `mra_office`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `mra_outstation`
--
ALTER TABLE `mra_outstation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `mra_staff`
--
ALTER TABLE `mra_staff`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `mra_wfh`
--
ALTER TABLE `mra_wfh`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
