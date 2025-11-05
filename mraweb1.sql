-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 05, 2025 at 09:22 AM
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
-- Table structure for table `list_request`
--

CREATE TABLE `list_request` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `appoinment` varchar(255) NOT NULL,
  `link` varchar(255) NOT NULL,
  `descriptions` varchar(255) NOT NULL,
  `quantity` char(10) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `amount` decimal(10,2) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `list_request`
--

INSERT INTO `list_request` (`id`, `name`, `date`, `appoinment`, `link`, `descriptions`, `quantity`, `price`, `amount`) VALUES
(1, 'MOHAMAD FARISH SYAH DANIAL BIN TUKIMAN', '2025-10-29', 'Job TRML', 'https://www.youtube.com/watch?v=5Q1f7a49-N8&t=3907s', 'barang spepart', '2', 100.00, 200.00),
(2, 'NURUL SYUHADAH', '2025-10-28', 'JOB TRML', 'https://www.youtube.com/watch?v=5Q1f7a49-N8&t=3907s', 'barang spepart', '3', 100.00, 300.00),
(3, 'MOHAMAD FARISH SYAH DANIAL BIN TUKIMAN', '2025-10-29', 'Job TRML', 'https://www.youtube.com/watch?v=5Q1f7a49-N8&t=3907s', 'bateri', '3', 60.00, 180.00);

-- --------------------------------------------------------

--
-- Table structure for table `mra_claim`
--

CREATE TABLE `mra_claim` (
  `id` int(11) NOT NULL,
  `apply` date NOT NULL,
  `tajuk` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `ic` varchar(14) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `status` char(11) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `folder` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `excel` varchar(255) NOT NULL,
  `updated` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
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
  `id` int(11) NOT NULL,
  `date` date NOT NULL,
  `noic` varchar(14) NOT NULL,
  `purpose` varchar(255) NOT NULL,
  `details` varchar(255) NOT NULL,
  `status` char(11) NOT NULL,
  `resit` varchar(255) NOT NULL,
  `amount` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `mra_claims`
--

INSERT INTO `mra_claims` (`id`, `date`, `noic`, `purpose`, `details`, `status`, `resit`, `amount`) VALUES
(1, '2024-08-20', '000922012519', 'TRIP MEMPAGA', 'LAPANG SASAR 200 METER', '1', '', 40.00),
(2, '2024-08-21', '000922012519', 'TRIP MEMPAGA', 'LAPANG SASAR 200 METER', '1', '', 40.00),
(3, '2024-08-22', '000922012519', 'TRIP MEMPAGA', 'LAPANG SASAR 200 METER', '1', '', 25.00),
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
(38, '2024-12-11', '000922012519', 'TRIP TO GEMAS', 'ASTROS', '1', '', 40.00),
(39, '2024-12-12', '000922012519', 'TRIP TO GEMAS', 'ASTROS', '1', '', 25.00),
(40, '2024-12-13', '000922012519', 'TRIP TO GEMAS', 'ASTROS', '1', '', 25.00),
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
(95, '2025-08-06', '000922012519', 'TRIP TO MERSING', 'LAPANG SASAR 600 METER', '', '', 40.00),
(96, '2025-08-14', '000922012519', 'TNG CLAIM', 'TRIP TO  MEMPAGA', '', '', 2.00),
(97, '2025-08-14', '000922012519', 'TNG CLAIM', 'TRIP MEMPAGA', '', '', 6.00),
(103, '2025-11-04', '000922012519', 'TNG', 'TNG KL TO GEMAS', '1', 'WhatsApp Image 2025-11-03 at 8.13.08 PM.jpeg', 330.00);

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
  `status` int(11) NOT NULL,
  `datestart` date DEFAULT NULL,
  `dateend` date DEFAULT NULL,
  `daysleave` varchar(5) DEFAULT NULL,
  `purpose` varchar(100) DEFAULT NULL,
  `contactno` varchar(14) DEFAULT NULL,
  `matters` varchar(100) DEFAULT NULL,
  `statsupport` int(11) NOT NULL,
  `namesupport` varchar(255) NOT NULL,
  `datestatsupport` date DEFAULT NULL,
  `statapprove` int(11) NOT NULL,
  `nameapprove` varchar(255) NOT NULL,
  `datestatapprove` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `mra_leave`
--

INSERT INTO `mra_leave` (`leaveid`, `dateapply`, `nameapply`, `noic`, `position`, `status`, `datestart`, `dateend`, `daysleave`, `purpose`, `contactno`, `matters`, `statsupport`, `namesupport`, `datestatsupport`, `statapprove`, `nameapprove`, `datestatapprove`) VALUES
(51, '2025-11-05', 'NURUL SYUHADAH', '001221140176', 'ADMIN', 1, '2025-11-05', '2025-11-06', '1', 'Balik Kampung', '0189178650', 'ANNUAL LEAVE', 0, '', NULL, 0, '', NULL);

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
  `id_user` varchar(20) NOT NULL,
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
  `syarikat` varchar(255) NOT NULL,
  `portfolio` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `mra_staff`
--

INSERT INTO `mra_staff` (`id`, `id_user`, `name`, `email`, `icno`, `position`, `password`, `status`, `phoneno`, `bank_name`, `acc_no`, `image`, `syarikat`, `portfolio`) VALUES
(3, 'wish', 'IKHWAN DARWISH BIN AHMAD JAIDI', 'ikhwan.awish@gmail.com', '01051710717', 'COMPUTER ENGINEER', 'mra123', 'STAFF', '0125948508', 'Maybank', '162870151398', 'wish.png', 'LETILICA SDN BHD', 'Ikhwan Darwish CV.pdf'),
(5, 'fendy', 'MOHAMMAD AFFENDY BIN MOHD ASRI', 'mohammadaffendyasri@gmail.com', '970218095135', 'COMPUTER ENGINEER', 'mra123', 'STAFF', '01172259030', 'Maybank', '162107427034', '', '', ''),
(6, 'farish', 'MOHAMAD FARISH SYAH DANIAL BIN TUKIMAN', 'farishtukiman@gmail.com', '000922012519', 'SOFTWARE ENGINEER', 'wak@2519', 'STAFF', '01156640727', 'Bank Islam', '01032020736545', 'signature.png', 'LETILICA SDN BHD', 'CV Farish2.pdf'),
(12, 'alin', 'AZLIN NATASHA BINTI AZAHAR', 'azlinnatasha8@gmail.com', '980203565340', 'Admin Executive', 'mra123', 'HR STAFF', '0176445413', 'Maybank', '162200182861', '', 'MIM DEFENSE SDN BHD', ''),
(13, 'nuyull', 'NURUL SYUHADAH', 'nurulsyuhadaaa21@gmail.com', '001221140176', 'ADMIN', 'MRA123', 'HR STAFF', '0189178650', 'Maybank', '164221637324', 'signature_nurul.png', 'MRA GLOBAL SDN BHD', ''),
(16, 'amri', 'AMRI BIN YAHYA', 'farishtukiman@gmail.com', '000922019851', 'SOFTWARE ENGINEER', 'mra123', 'LEADER STAFF', '01156640727', 'Bank Islam', '01032020736545', 'signature_amri.png', 'LETILICA SDN BHD', ''),
(17, 'bad', 'BADRUL', 'farishtukiman@gmail.com', '000922014523', 'CEO', 'mra123', 'MANAGER', '01156640727', '', '01032020733453', 'badrul_sign.png', 'LETILICA SDN BHD', '');

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

-- --------------------------------------------------------

--
-- Table structure for table `request`
--

CREATE TABLE `request` (
  `id` int(11) NOT NULL,
  `namestaff` varchar(255) NOT NULL,
  `dateapply` date NOT NULL,
  `appoiment` varchar(255) NOT NULL,
  `department` varchar(255) NOT NULL,
  `supplirename` varchar(255) NOT NULL,
  `suppladderss` varchar(255) NOT NULL,
  `attention` varchar(255) NOT NULL,
  `termpayment` varchar(255) NOT NULL,
  `payto` varchar(255) NOT NULL,
  `accno` varchar(30) NOT NULL,
  `bankname` varchar(10) NOT NULL,
  `remark` varchar(255) NOT NULL,
  `signreq` varchar(255) NOT NULL,
  `signmanager` varchar(255) NOT NULL,
  `datemanager` varchar(10) DEFAULT NULL,
  `signacc` varchar(255) NOT NULL,
  `dateacc` varchar(10) DEFAULT NULL,
  `signdirector` varchar(255) NOT NULL,
  `datedirector` varchar(10) DEFAULT NULL,
  `statusacc` int(11) NOT NULL,
  `statusmana` int(11) NOT NULL,
  `statusdirec` int(11) NOT NULL,
  `refno` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `request`
--

INSERT INTO `request` (`id`, `namestaff`, `dateapply`, `appoiment`, `department`, `supplirename`, `suppladderss`, `attention`, `termpayment`, `payto`, `accno`, `bankname`, `remark`, `signreq`, `signmanager`, `datemanager`, `signacc`, `dateacc`, `signdirector`, `datedirector`, `statusacc`, `statusmana`, `statusdirec`, `refno`) VALUES
(10, 'MOHAMAD FARISH SYAH DANIAL BIN TUKIMAN', '2025-10-29', 'Job TRML', 'WANGSA MAJU', 'SOFTWARE', 'WILAYAH PERSEKUTUAN', '-', 'Test', 'Test', 'Test', 'Test', 'Test', 'signature.png', 'badrul_sign.png', '2025-10-29', 'signature_nurul.png', '2025-11-03', 'NULL', '0000-00-00', 2, 2, 1, 'RQF (GMS)-MRA2302004'),
(8, 'NURUL SYUHADAH', '2025-10-28', 'JOB TRML', 'PERAK', 'WAH SING ENT', '-', '-', 'ONLINE BANKING', 'WAH SING ENT', '12456789', 'MAYBANK', 'MRA GLOBAL', '', 'NULL', '0000-00-00', 'signature_nurul.png', '2025-11-03', 'NULL', '0000-00-00', 1, 1, 1, 'RQF (GMS)-MRA2302004');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `download`
--
ALTER TABLE `download`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `list_request`
--
ALTER TABLE `list_request`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `mra_claim`
--
ALTER TABLE `mra_claim`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `mra_claims`
--
ALTER TABLE `mra_claims`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=106;

--
-- AUTO_INCREMENT for table `mra_leave`
--
ALTER TABLE `mra_leave`
  MODIFY `leaveid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `mra_wfh`
--
ALTER TABLE `mra_wfh`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `request`
--
ALTER TABLE `request`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;