-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 27, 2025 at 09:54 AM
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
-- Database: `mraweb`
--

-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--

CREATE TABLE `attendance` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `ic` varchar(14) DEFAULT NULL,
  `position` varchar(20) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `status` varchar(15) DEFAULT NULL,
  `time_in` time DEFAULT NULL,
  `time_out` time DEFAULT NULL,
  `remark` varchar(255) DEFAULT NULL,
  `location` int(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `dateleave`
--

CREATE TABLE `dateleave` (
  `id` int(11) NOT NULL,
  `ic` varchar(14) NOT NULL,
  `status` varchar(255) DEFAULT NULL,
  `dateleave` date NOT NULL,
  `updated` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `dateleave`
--

INSERT INTO `dateleave` (`id`, `ic`, `status`, `dateleave`, `updated`) VALUES
(1, '001221140176', NULL, '2025-11-05', '2025-12-08 00:54:42'),
(2, '001221140176', NULL, '2025-11-06', '2025-12-08 00:54:42'),
(3, '000922012519', NULL, '2025-11-13', '2025-12-08 00:54:42'),
(4, '980203565340', NULL, '2026-01-26', '2025-12-08 00:54:42'),
(5, '980203565340', NULL, '2026-01-27', '2025-12-08 00:54:42'),
(6, '980203565340', NULL, '2026-01-28', '2025-12-08 00:54:42'),
(7, '980203565340', NULL, '2026-01-29', '2025-12-08 00:54:42'),
(8, '980203565340', NULL, '2026-01-30', '2025-12-08 00:54:42'),
(9, '980203565340', NULL, '2026-01-31', '2025-12-08 00:54:42'),
(10, '980203565340', NULL, '2026-02-01', '2025-12-08 00:54:42'),
(11, '980203565340', NULL, '2026-02-02', '2025-12-08 00:54:42'),
(12, '980203565340', NULL, '2026-02-03', '2025-12-08 00:54:42'),
(13, '980203565340', NULL, '2026-02-04', '2025-12-08 00:54:42'),
(14, '980203565340', NULL, '2026-02-05', '2025-12-08 00:54:42'),
(15, '980203565340', NULL, '2026-02-06', '2025-12-08 00:54:42'),
(16, '000922012519', NULL, '2025-12-06', '2025-12-08 00:54:42'),
(17, '000922012519', NULL, '2025-12-07', '2025-12-08 00:54:42'),
(18, '000922012519', NULL, '2025-12-08', '2025-12-08 00:54:42'),
(19, '000922012519', NULL, '2025-12-09', '2025-12-08 00:54:42'),
(20, '000922012519', NULL, '2025-12-10', '2025-12-08 00:54:42'),
(21, '000922012519', NULL, '2025-12-11', '2025-12-08 00:54:42'),
(22, '000922012519', NULL, '2025-12-12', '2025-12-08 00:54:42');

-- --------------------------------------------------------

--
-- Table structure for table `document`
--

CREATE TABLE `document` (
  `id` int(11) NOT NULL,
  `rendom` text NOT NULL,
  `pembaikan` varchar(255) DEFAULT NULL,
  `namcretae` varchar(255) NOT NULL,
  `ic` varchar(14) NOT NULL,
  `lponum` text DEFAULT NULL,
  `document` varchar(255) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `document`
--

INSERT INTO `document` (`id`, `rendom`, `pembaikan`, `namcretae`, `ic`, `lponum`, `document`, `updated_at`) VALUES
(7, '60', 'Membekal Alat Ganti Sistem Radar Amaran Tempatan TRML 3D/32\r\n', 'NURUL SYUHADAH', '001221140176', 'CO250000000347463', 'Chaiseri Company Profile.pdf', '2025-12-13 17:45:54'),
(6, '60', 'Robotic Vehicle Guardian UK - KL', 'NURUL SYUHADAH', '001221140176', 'CO230000000450026', 'SURAT WAKIL ABD MALEK.pdf', '2025-12-13 17:44:20'),
(8, '91', 'Simulator Unit Lancar Berganda (ULB) Astros ', 'NURUL SYUHADAH', '001221140176', 'CO250000000347502', 'PERMOHONAN MEMASUKI KEM ISKANDAR MERSING BAGI TUJUAN PEMBAIKAN DIBAWAH JAMINAN PERALATAN ELEKTRONIK LAP.pdf', '2025-12-13 17:50:59'),
(10, '60', 'Pembekalan Alat Ganti Simulator ACV ', 'NURUL SYUHADAH', '001221140176', 'C02500000001477793', '1000193814 (1).PDF', '2025-12-15 04:25:36'),
(12, '71', 'Simulator Unit Perintah Kawalan Tembakan (UPKB) Astross', 'NURUL SYUHADAH', '001221140176', 'C0230000000446189', 'Certificate(MYSQL).pdf', '2025-12-15 12:29:08'),
(13, '72', 'Robotic Vehicle Guardian UK - KL', 'NURUL SYUHADAH', '001221140176', 'CO230000000450026', 'claim_bulan_4(FARISH).pdf', '2025-12-15 12:37:23'),
(14, '13', 'PEMBAIKAN DI BAWAH JAMINAN', 'AZLIN NATASHA BINTI AZAHAR', '980203565340', 'A-327470/1', 'SENARAI KERJA - KERJA PT91 2021 AVP ENGINEERING.pdf', '2025-12-16 02:32:12'),
(15, '97', 'Simulator Unit Perintah Kawalan Tembakan (UPKB) Astross', 'AZLIN NATASHA BINTI AZAHAR', '980203565340', 'C0230000000446189', '2. PAYSLIP LETILICA - FARISH SHAH_FEB 25.pdf', '2025-12-18 04:12:12'),
(16, '77', 'KD JEBAT 1', 'AZLIN NATASHA BINTI AZAHAR', '980203565340', 'A-327471/1', 'claim form JUNE.staff.pdf', '2025-12-18 04:26:38');

-- --------------------------------------------------------

--
-- Table structure for table `list_quotation`
--

CREATE TABLE `list_quotation` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `qtnno` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `hours` int(11) DEFAULT NULL,
  `manhour` decimal(10,2) DEFAULT NULL,
  `manhourcost` decimal(10,2) DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
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
(5, 'NURUL SYUHADAH', '2025-12-04', 'keperluan trml', 'https://www.youtube.com/watch?v=5Q1f7a49-N8&t=3907s', 'power supply 30 V', '5', 100.00, 500.00),
(3, 'MOHAMAD FARISH SYAH DANIAL BIN TUKIMAN', '2025-10-29', 'Job TRML', 'https://www.youtube.com/watch?v=5Q1f7a49-N8&t=3907s', 'bateri', '3', 60.00, 180.00),
(6, 'NURUL SYUHADAH', '2025-12-09', 'keperluan boat', 'https://www.youtube.com/watch?v=5Q1f7a49-N8&t=3907s', 'bateri', '3', 100.00, 300.00);

-- --------------------------------------------------------

--
-- Table structure for table `mra_claim`
--

CREATE TABLE `mra_claim` (
  `id` int(11) NOT NULL,
  `bulan` text NOT NULL,
  `tahun` text NOT NULL,
  `namestaff` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `nameapprove` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `status` char(11) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `resit` varchar(255) NOT NULL,
  `updated` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
  `nameapprove` varchar(255) DEFAULT NULL,
  `buktiresit` varchar(255) DEFAULT NULL,
  `amount` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `mra_claims`
--

INSERT INTO `mra_claims` (`id`, `date`, `noic`, `purpose`, `details`, `status`, `resit`, `nameapprove`, `buktiresit`, `amount`) VALUES
(1, '2024-08-20', '000922012519', 'TRIP MEMPAGA', 'LAPANG SASAR 200 METER', '2', '', NULL, NULL, 40.00),
(2, '2024-08-21', '000922012519', 'TRIP MEMPAGA', 'LAPANG SASAR 200 METER', '2', '', NULL, NULL, 40.00),
(3, '2024-08-22', '000922012519', 'TRIP MEMPAGA', 'LAPANG SASAR 200 METER', '2', '', NULL, NULL, 25.00),
(4, '2024-08-20', '000922012519', 'TRIP MEMPAGA', 'LAPANG SASAR 200 METER', '1', '', NULL, NULL, 40.00),
(11, '2024-01-04', '000922012519', 'TRIP TO MEMPAGA', 'LAPANG SASAR 200 METER', '1', '', NULL, NULL, 25.00),
(12, '2024-09-05', '000922012519', 'TRIP TO MEMPAGA', 'LAPANG SASAR 200 METER', '1', '', NULL, NULL, 25.00),
(13, '2024-09-10', '000922012519', 'TRIP TO MEMPAGA', 'LAPANG SASAR 200 METER', '1', '', NULL, NULL, 40.00),
(14, '2024-09-11', '000922012519', 'TRIP TO MEMPAGA', 'LAPANG SASAR 200 METER', '1', '', NULL, NULL, 25.00),
(15, '2024-09-12', '000922012519', 'TRIP TO MEMPAGA', 'LAPANG SASAR 200 METER', '1', '', NULL, NULL, 25.00),
(16, '2024-02-29', '000922012519', 'TRIP TO MEMPAGA', 'LAPANG SASAR 200 METER', '1', '', NULL, NULL, 25.00),
(17, '2024-10-04', '000922012519', 'TRIP TO MEMPAGA', 'LAPANG SASAR 200 METER', '1', '', NULL, NULL, 25.00),
(18, '2024-10-09', '000922012519', 'TRIP TO MEMPAGA', 'LAPANG SASAR 200 METER', '1', '', NULL, NULL, 40.00),
(19, '2024-10-10', '000922012519', 'TRIP TO MEMPAGA', 'LAPANG SASAR 200 METER', '1', '', NULL, NULL, 40.00),
(20, '2024-10-11', '000922012519', 'TRIP TO MEMPAGA', 'LAPANG SASAR 200 METER', '1', '', NULL, NULL, 25.00),
(21, '2024-10-19', '000922012519', 'TRIP TO SEREMBAN', 'ROBOT', '1', '', NULL, NULL, 40.00),
(22, '2024-10-20', '000922012519', 'TRIP TO SEREMBAN', 'ROBOT', '1', '', NULL, NULL, 25.00),
(42, '2025-02-06', '000922012519', 'TRIP TO MERSING', 'LAPANG SASAR 200 METER', '1', '', NULL, NULL, 25.00),
(44, '2025-03-16', '000922012519', 'TRIP MERSING', 'LAPANG SASAR 600 METER', '1', '', NULL, NULL, 40.00),
(49, '2025-04-15', '000922012519', 'TRIP MEMPAGA', 'LAPANG SASAR 200 METER', '1', '', NULL, NULL, 25.00),
(50, '2025-04-16', '000922012519', 'TRIP MEMPAGA', 'LAPANG SASAR 200 METER', '1', '', NULL, NULL, 25.00),
(51, '2025-04-18', '000922012519', 'TRIP MEMPAGA', 'LAPANG SASAR 200 METER', '1', '', NULL, NULL, 25.00),
(52, '2025-04-22', '000922012519', 'TRIP MERSING', 'LAPANG SASAR 600 METER', '1', '', NULL, NULL, 40.00),
(53, '2025-04-23', '000922012519', 'TRIP MERSING', 'LAPANG SASAR 600 METER', '1', '', NULL, NULL, 25.00),
(54, '2025-04-30', '000922012519', 'TRIP MEMPAGA', 'LAPANG SASAR 200 METER', '1', '', NULL, NULL, 25.00),
(58, '2025-05-06', '000922012519', 'TRIP MEMPAGA', 'LAPANG SASAR 200 METER', '1', '', NULL, NULL, 25.00),
(59, '2025-05-13', '000922012519', 'TRIP MEMPAGA', 'LAPANG SASAR 200 METER', '1', '', NULL, NULL, 25.00),
(60, '2025-05-14', '000922012519', 'TRIP MEMPAGA', 'LAPANG SASAR 200 METER', '1', '', NULL, NULL, 25.00),
(62, '2025-05-15', '000922012519', 'TRIP TO MEMPAGA', 'LAPANG SASAR 200 METER', '1', '', NULL, NULL, 25.00),
(63, '2025-05-20', '000922012519', 'TRIP TO MEMPAGA', 'LAPANG SASAR 200 METER', '1', '', NULL, NULL, 25.00),
(64, '2025-05-21', '000922012519', 'TRIP TO MEMPAGA', 'LAPANG SASAR 200 METER', '1', '', NULL, NULL, 25.00),
(65, '2025-05-22', '000922012519', 'TRIP TO MEMPAGA', 'LAPANG SASAR 200 METER', '1', '', NULL, NULL, 25.00),
(66, '2025-05-27', '000922012519', 'TRIP MEMPAGA', 'LAPANG SASAR 200 METER', '1', '', NULL, NULL, 25.00),
(67, '2025-05-28', '000922012519', 'TRIP MEMPAGA', 'LAPANG SASAR 200 METER', '1', '', NULL, NULL, 25.00),
(68, '2025-06-03', '000922012519', 'TRIP MEMPAGA', 'LAPANG SASAR 200 METER', '1', '', NULL, NULL, 25.00),
(69, '2025-06-04', '000922012519', 'TRIP MEMPAGA', 'LAPANG SASAR 200 METER', '1', '', NULL, NULL, 25.00),
(70, '2025-06-05', '000922012519', 'TRIP MEMPAGA', 'LAPANG SASAR 200 METER', '1', '', NULL, NULL, 25.00),
(71, '2025-06-09', '000922012519', 'TRIP MEMPAGA', 'LAPANG SASAR 200 METER', '1', '', NULL, NULL, 25.00),
(72, '2025-06-10', '000922012519', 'TRIP MEMPAGA', 'LAPANG SASAR 200 METER', '1', '', NULL, NULL, 25.00),
(73, '2025-06-11', '000922012519', 'TRIP MEMPAGA', 'LAPANG SASAR 200 METER', '1', '', NULL, NULL, 25.00),
(74, '2025-06-12', '000922012519', 'TRIP MEMPAGA', 'LAPANG SASAR 200 METER', '1', '', NULL, NULL, 25.00),
(75, '2025-06-13', '000922012519', 'TRIP MEMPAGA', 'LAPANG SASAR 200 METER', '1', '', NULL, NULL, 25.00),
(76, '2025-06-19', '000922012519', 'TRIP MEMPAGA', 'LAPANG SASAR 200 METER', '1', '', NULL, NULL, 25.00),
(78, '2025-06-25', '000922012519', 'TRIP MEMPAGA', 'LAPANG SASAR 200 METER', '1', '', NULL, NULL, 25.00),
(80, '2025-06-26', '000922012519', 'TRIP TO MEMPAGA', 'LAPANG SASAR 600 METER', '1', '', NULL, NULL, 25.00),
(81, '2025-06-27', '000922012519', 'TRIP TO MEMPAGA', 'LAPANG SASAR 200 METER', '1', '', NULL, NULL, 25.00),
(82, '2025-06-28', '000922012519', 'TRIP TO MEMPAGA', 'LAPANG SASAR 200 METER', '1', '', NULL, NULL, 25.00),
(83, '2025-06-29', '000922012519', 'TRIP TO MEMPAGA', 'LAPANG SASAR 200 METER', '1', '', NULL, NULL, 25.00),
(84, '2025-06-30', '000922012519', 'TRIP TO MEMPAGA', 'LAPANG SASAR 200 METER', '1', '', NULL, NULL, 25.00),
(85, '2025-07-03', '000922012519', 'TRIP TO KUANTAN', 'SEMULATOR ADNAN', '1', '', NULL, NULL, 40.00),
(86, '2025-07-04', '000922012519', 'TRIP TO KUANTAN', 'SEMULATOR ADNAN', '1', '', NULL, NULL, 40.00),
(87, '2025-07-05', '000922012519', 'TRIP TO KUANTAN', 'SEMULATOR ADNAN ', '1', '', NULL, NULL, 25.00),
(88, '2025-07-21', '000922012519', 'TRIP MEMPAGA', 'LAPANG SASAR 200 METER', '1', '', NULL, NULL, 25.00),
(89, '2025-07-22', '000922012519', 'TRIP TO MERSING', 'LAPANG SASAR 600 METER', '1', '', NULL, NULL, 40.00),
(90, '2025-07-23', '000922012519', 'TRIP TO MERSING', 'LAPANG SASAR 600 METER', '1', '', NULL, NULL, 40.00),
(91, '2025-07-24', '000922012519', 'TRIP TO MERSING', 'LAPANG SASAR 600 METER', '1', '', NULL, NULL, 40.00),
(92, '2025-07-25', '000922012519', 'TRIP TO MERSING', 'LAPANG SASAR 600 METER', '1', '', NULL, NULL, 25.00),
(93, '2025-08-14', '980203565340', 'OFFICE KL ', 'CLAIM STATIONARY KUALA LUMPUR  OFFICE', '1', '', NULL, NULL, 50.00),
(95, '2025-08-06', '000922012519', 'TRIP TO MERSING', 'LAPANG SASAR 600 METER', '1', '', NULL, NULL, 40.00),
(96, '2025-08-14', '000922012519', 'TNG CLAIM', 'TRIP TO  MEMPAGA', '1', '', NULL, NULL, 2.00),
(97, '2025-08-14', '000922012519', 'TNG CLAIM', 'TRIP MEMPAGA', '1', '', NULL, NULL, 6.00),
(103, '2025-11-04', '000922012519', 'TNG', 'TNG KL TO MERSING', '1', 'WhatsApp Image 2025-11-03 at 8.13.08 PM.jpeg', NULL, NULL, 330.00),
(106, '2025-10-29', '980203565340', 'TRIP PERAK', 'TRML', '1', '', NULL, NULL, 40.00),
(107, '2025-11-10', '001221140176', 'TRIP MERSING', 'LAPANG SASAR 600 METER', '1', '', NULL, NULL, 40.00),
(108, '2025-11-11', '001221140176', 'TNG', 'TNG KL - GEMAS', '1', 'WhatsApp Image 2025-11-03 at 8.13.08 PM (1).jpeg', NULL, NULL, 330.00),
(110, '2025-11-12', '000922012519', 'TRIP MERSING', 'LAPANG SASAR 600 METER', '1', '', NULL, NULL, 40.00),
(111, '2025-11-13', '000922012519', 'TRIP MERSING', 'LAPANG SASAR 600 METER', '1', '', NULL, NULL, 40.00),
(113, '2025-11-17', '000922012519', 'TRIP MEMPAGA', 'LAPANG SASAR 200 METER', '1', '', NULL, NULL, 40.00),
(118, '2025-11-18', '000922012519', 'TRIP MERSING', 'LAPANG SASAR 600 METER', '1', '', NULL, NULL, 40.00),
(120, '2025-11-20', '980203565340', 'TRIP MERSING', 'LAPANG SASAR 600 METER', '1', '', NULL, NULL, 40.00),
(121, '2025-11-25', '970218095135', 'TRIP MERSING', 'LAPANG SASAR 600 METER', '1', '', NULL, NULL, 40.00),
(122, '2025-11-26', '970218095135', 'TRIP MERSING', 'LAPANG SASAR 600 METER', '1', '', NULL, NULL, 40.00),
(129, '2025-12-10', '001221140176', 'TRIP MERSING', 'LAPANG SASAR 600 METER', '1', '', NULL, NULL, 40.00),
(134, '2025-12-17', '980203565340', 'TRIP MERSING', 'LAPANG SASAR 600 METER', '1', '', NULL, NULL, 25.00),
(136, '2025-12-18', '000922012519', 'TRIP MERSING', 'LAPANG SASAR 600 METER', '1', '', NULL, NULL, 25.00),
(139, '2025-12-16', '000922012519', 'TNG', 'TNG KL - GEMAS', '1', 'images-invoice3.png', NULL, NULL, 25.00);

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
  `mc` varchar(255) DEFAULT NULL,
  `statsupport` int(11) NOT NULL,
  `namesupport` varchar(255) DEFAULT NULL,
  `datestatsupport` date DEFAULT NULL,
  `statapprove` int(11) NOT NULL,
  `nameapprove` varchar(255) DEFAULT NULL,
  `datestatapprove` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `mra_leave`
--

INSERT INTO `mra_leave` (`leaveid`, `dateapply`, `nameapply`, `noic`, `position`, `status`, `datestart`, `dateend`, `daysleave`, `purpose`, `contactno`, `matters`, `mc`, `statsupport`, `namesupport`, `datestatsupport`, `statapprove`, `nameapprove`, `datestatapprove`) VALUES
(51, '2025-11-05', 'NURUL SYUHADAH', '001221140176', 'ADMIN', 1, '2025-11-05', '2025-11-06', '1', 'Balik Kampung', '0189178650', 'ANNUAL LEAVE', NULL, 1, '', NULL, 1, '', NULL),
(52, '2025-12-03', 'MOHAMAD FARISH SYAH DANIAL BIN TUKIMAN', '000922012519', 'SOFTWARE ENGINEER', 1, '2025-11-13', '2025-11-13', '1', 'cuti', '01156640727', 'ANNUAL LEAVE', NULL, 1, '', NULL, 1, '', NULL),
(53, '2025-12-03', 'AZLIN NATASHA BINTI AZAHAR', '980203565340', 'Admin Executive', 1, '2026-01-26', '2026-02-06', '10 ', 'UMRAH AZLIN NATASHA', '0176445413', 'ANNUAL LEAVE', NULL, 2, 'AMRI BIN YAHYA', '2025-12-03', 1, '', NULL),
(60, '2025-12-06', 'MOHAMAD FARISH SYAH DANIAL BIN TUKIMAN', '000922012519', 'SOFTWARE ENGINEER', 1, '2025-12-06', '2025-12-12', '7', 'Balik Kampung', '01156640727', 'ANNUAL LEAVE', NULL, 1, NULL, NULL, 1, NULL, NULL),
(63, '2025-12-15', 'MOHAMMAD AFFENDY BIN MOHD ASRI', '970218095135', 'COMPUTER ENGINEER', 2, '2025-12-09', '2025-12-09', '1', 'Test', '01172259030', 'MEDICAL LEAVE', '', 2, 'AMRI BIN YAHYA', '2025-12-15', 1, NULL, NULL),
(64, '2025-12-15', 'MOHAMAD FARISH SYAH DANIAL BIN TUKIMAN', '000922012519', 'SOFTWARE ENGINEER', 2, '2025-12-15', '2025-12-15', '1', 'demam', '01156640727', 'MEDICAL LEAVE', 'images-invoice3.png', 2, 'AMRI BIN YAHYA', '2025-12-15', 2, 'BADRUL', '2025-12-15');

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
  `statattan` int(11) DEFAULT NULL,
  `dateattan` date DEFAULT NULL,
  `timein` time DEFAULT NULL,
  `timeout` time DEFAULT NULL,
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

INSERT INTO `mra_staff` (`id`, `id_user`, `name`, `email`, `icno`, `position`, `password`, `status`, `statattan`, `dateattan`, `timein`, `timeout`, `phoneno`, `bank_name`, `acc_no`, `image`, `syarikat`, `portfolio`) VALUES
(5, 'fendy', 'MOHAMMAD AFFENDY BIN MOHD ASRI', 'mohammadaffendyasri@gmail.com', '970218095135', 'COMPUTER ENGINEER', 'mra123', 'LEADER STAFF', 1, '2025-12-13', '00:00:00', '00:00:00', '01172259030', 'Maybank', '162107427034', '', 'MRA GLOBAL SDN BHD', ''),
(6, 'farish', 'MOHAMAD FARISH SYAH DANIAL BIN TUKIMAN', 'farishtukiman@gmail.com', '000922012519', 'SOFTWARE ENGINEER', 'wak@2519', 'STAFF', 1, '2025-12-13', '00:00:00', '00:00:00', '01156640727', 'Bank Islam', '01032020736545', 'signature.png', 'LETILICA SDN BHD', 'CV Farish2.pdf'),
(12, 'AZLINNATASHA', 'AZLIN NATASHA BINTI AZAHAR', 'azlinnatasha8@gmail.com', '980203565340', 'Admin Executive', 'mra123', 'HR STAFF', 1, '2025-12-13', '00:00:00', '00:00:00', '0176445413', 'Maybank', '162200182861', '', 'MIM DEFENSE SDN BHD', ''),
(13, 'nuyull', 'NURUL SYUHADAH', 'nurulsyuhadaaa21@gmail.com', '001221140176', 'ADMIN', 'MRA123', 'HR STAFF', 1, '2025-12-13', '00:00:00', '00:00:00', '0189178650', 'Maybank', '164221637324', 'signature_nurul.png', 'MRA GLOBAL SDN BHD', ''),
(17, 'bad', 'BADRUL', 'farishtukiman@gmail.com', '000922014523', 'CEO', 'mra123', 'MANAGER', 1, '2025-12-13', '00:00:00', '00:00:00', '01156640727', '', '01032020733453', 'badrul_sign.png', 'LETILICA SDN BHD', ''),
(19, 'aizam', 'AIZAM', 'muhdaizam2003@gmail.com', '000922019836', 'SOFTWARE ENGINEER', '449610', 'STAFF', 1, '2025-12-13', '00:00:00', '00:00:00', '0188705012', 'Maybank', '164221637324', '', 'MRA GLOBAL SDN BHD', ''),
(20, 'MAULANA', 'TUAN MAULANA', 'maulana@mraglobal.com.my', '670417035245', 'MANAGER ADMIN', '955768', 'LEADER STAFF', 1, '2025-12-16', '00:00:00', '00:00:00', '0162320345', 'CIMB', '144445', '', 'MRA GLOBAL SDN BHD', ''),
(21, 'Sabrina', 'NUR UMMI SABRINA', 'sabrina@mraglobal.com.my', '970705146390', 'HUMAN RESOURCES', '864359', 'LEADER STAFF', 1, '2025-12-16', '00:00:00', '00:00:00', '0173751974', 'Maybank', ' 1622 0018 2861 ', '', 'MIM DEFENSE SDN BHD', '');

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
(3, 'MOHAMAD FARISH SYAH DANIAL BIN TUKIMAN', '000922012519', 'BALIK KAMPUNG', 'BALIK KAMPUNG', '2025-05-06', '2025-05-04', '2025-05-03 23:53:13'),
(4, 'MOHAMAD FARISH SYAH DANIAL BIN TUKIMAN', '000922012519', 'BALIK KAMPUNG', 'BALIK KAMPUNG', '2025-11-14', '2025-11-14', '2025-11-14 07:29:35');

-- --------------------------------------------------------

--
-- Table structure for table `notpresent`
--

CREATE TABLE `notpresent` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `ic` varchar(14) NOT NULL,
  `date` date DEFAULT NULL,
  `matter` varchar(20) NOT NULL,
  `reason` varchar(255) NOT NULL,
  `status` int(11) DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `notpresent`
--

INSERT INTO `notpresent` (`id`, `name`, `ic`, `date`, `matter`, `reason`, `status`, `updated_at`) VALUES
(3, 'IKHWAN DARWISH BIN AHMAD JAIDI', '01051710717', '2025-12-08', 'MEDICAL LEAVE', 'demam', NULL, '2025-12-08 08:23:22'),
(4, 'MOHAMMAD AFFENDY BIN MOHD ASRI', '970218095135', '2025-12-09', 'MEDICAL LEAVE', 'Test', NULL, '2025-12-08 23:18:22');

-- --------------------------------------------------------

--
-- Table structure for table `projek`
--

CREATE TABLE `projek` (
  `id` int(11) NOT NULL,
  `rendom` text DEFAULT NULL,
  `namecreate` varchar(15) DEFAULT NULL,
  `ic` varchar(14) DEFAULT NULL,
  `syarikat` varchar(20) DEFAULT NULL,
  `lponum` varchar(20) DEFAULT NULL,
  `stardate` datetime DEFAULT NULL,
  `duedate` datetime DEFAULT NULL,
  `pembaikan` varchar(255) DEFAULT NULL,
  `payment` decimal(15,2) DEFAULT NULL,
  `price` decimal(15,2) DEFAULT NULL,
  `invoice` varchar(255) DEFAULT NULL,
  `invoicedoc` varchar(255) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `bildate` varchar(10) DEFAULT NULL,
  `catatan` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `projek`
--

INSERT INTO `projek` (`id`, `rendom`, `namecreate`, `ic`, `syarikat`, `lponum`, `stardate`, `duedate`, `pembaikan`, `payment`, `price`, `invoice`, `invoicedoc`, `status`, `bildate`, `catatan`) VALUES
(6, '60', 'NURUL SYUHADAH', '001221140176', 'MRA GLOBAL SDN BHD', 'CO250000000347463', '2025-12-23 00:00:00', '2025-12-26 00:00:00', 'Membekal Alat Ganti Sistem Radar Amaran Tempatan TRML 3D/32\r\n', 131638.43, 131638.43, 'Dalam Pembaikan ', 'simple-invoice-2.png', 5, '5', 'test'),
(7, '91', 'NURUL SYUHADAH', '001221140176', 'MRA GLOBAL SDN BHD', 'CO250000000347502', '2025-12-15 00:00:00', '2025-12-16 00:00:00', 'Simulator Unit Lancar Berganda (ULB) Astros ', 102000.00, 102000.00, 'INV-23072 / DO-23069', 'image-invoice.jpg', 1, '-5', 'Test'),
(5, '60', 'NURUL SYUHADAH', '001221140176', 'MIM DEFENSE SDN BHD', 'CO230000000450026', '2025-12-13 00:00:00', '2025-12-31 00:00:00', 'Robotic Vehicle Guardian UK - KL', 203000.00, 203000.00, 'INV-23072 / DO-23069', 'invoice-template.png', 1, '10', ' Dibawah Jaminan '),
(8, '60', 'NURUL SYUHADAH', '001221140176', 'MRA GLOBAL SDN BHD', 'C02500000001477793', '2025-12-16 00:00:00', '2025-12-19 00:00:00', 'Pembekalan Alat Ganti Simulator ACV ', 271955.60, 271955.60, 'INV-25020 | DO-25016', 'invoice-temple2.png', 1, '-2', 'Dalam pembaikan'),
(9, '71', 'NURUL SYUHADAH', '001221140176', 'MRA GLOBAL SDN BHD', 'C0220000000413103', '2025-12-15 00:00:00', '2025-12-15 00:00:00', 'Senggaraan Lapang Sasar Elektronik 200 Meter Sius Ascor', 144000.00, 144000.00, 'INV-22045 / DO-22053', 'images-invoice.png', 1, '-6', ' Dibawah Jaminan '),
(10, '71', 'NURUL SYUHADAH', '001221140176', 'MRA GLOBAL SDN BHD', 'C0230000000446189', '2025-12-16 00:00:00', '2025-12-17 00:00:00', 'Simulator Unit Perintah Kawalan Tembakan (UPKB) Astross', 287700.00, 287700.00, 'INV-23070 / DO-23067', 'images-invoice1.png', 1, '-4', ' Dibawah Jaminan '),
(11, '72', 'NURUL SYUHADAH', '001221140176', 'MRA GLOBAL SDN BHD', 'CO230000000450026', '2025-12-16 00:00:00', '2025-12-17 00:00:00', 'Robotic Vehicle Guardian UK - KL', 203000.00, 203000.00, 'INV-23072 / DO-23069', 'images-invoice2.png', 1, '-4', ' Dibawah Jaminan '),
(12, '72', 'NURUL SYUHADAH', '001221140176', 'MRA GLOBAL SDN BHD', 'CO230000000446191', '2025-12-17 00:00:00', '2025-12-19 00:00:00', 'Simulator Unit Kawalan Tembakan (UKT) Kenderaan Astros ', 300000.00, 300000.00, 'INV-23071 / DO-23068', 'images-invoice3.png', 2, '-2', ' Dibawah Jaminan'),
(14, '13', 'AZLIN NATASHA B', '980203565340', 'MIM DEFENSE SDN BHD', 'A-327470/1', '2025-07-05 00:00:00', '2025-07-05 00:00:00', 'PEMBAIKAN DI BAWAH JAMINAN', 102000.00, 255955.60, 'INV-25018', 'SENARAI KERJA - KERJA PT91 2024 AVP ENGINEERING.pdf', 2, '-169', 'SPAREPART PENDING'),
(15, '97', 'AZLIN NATASHA B', '980203565340', 'MIM DEFENSE SDN BHD', 'C0230000000446189', '2025-12-19 00:00:00', '2025-12-26 00:00:00', 'Simulator Unit Perintah Kawalan Tembakan (UPKB) Astross', 287700.00, 287700.00, 'INV-23070 / DO-23067', 'images-invois2.jpg', 1, '5', ' Dibawah Jaminan '),
(16, '77', 'AZLIN NATASHA B', '980203565340', 'MIM DEFENSE SDN BHD', 'A-327471/1', '2025-12-21 00:00:00', '2025-12-26 00:00:00', 'KD JEBAT 1', 255010.20, 255010.20, 'INV-25019', 'images-invois3.png', 1, '5', 'PAYMENT 11/9/2025');

-- --------------------------------------------------------

--
-- Table structure for table `projekname`
--

CREATE TABLE `projekname` (
  `id` int(11) NOT NULL,
  `rendom` text DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `ic` varchar(14) DEFAULT NULL,
  `syarikat` varchar(20) DEFAULT NULL,
  `namepro` varchar(255) DEFAULT NULL,
  `datecreate` date DEFAULT NULL,
  `update_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `projekname`
--

INSERT INTO `projekname` (`id`, `rendom`, `name`, `ic`, `syarikat`, `namepro`, `datecreate`, `update_at`) VALUES
(1, '60', 'AZLIN NATASHA BINTI AZAHAR', '980203565340', 'MRA GLOBAL SDN BHD', 'PERKHIDMATAN SENGGARAAN DAN PEMBEKAL ALAT GANTI SIMULATOR ACV 300 ( SEPT 2022 - SEPT 2025)', '2025-12-20', '2025-12-12 10:35:28'),
(2, '91', 'NURUL SYUHADAH', '001221140176', 'LETILICA SDN BHD', 'TEKNIKAL', '2025-12-14', '2025-12-13 17:46:51'),
(3, '71', 'NURUL SYUHADAH', '001221140176', 'MRA GLOBAL SDN BHD', 'SENARAI PEMBAIKAN PADA TAHUN 2023 (DIBAWAH JAMINAN SYARIKAT)', '2025-12-15', '2025-12-15 12:24:19'),
(4, '72', 'NURUL SYUHADAH', '001221140176', 'MIM DEFENSE SDN BHD', 'SENARAI PEMBAIKAN PADA TAHUN 2025', '2025-12-15', '2025-12-15 12:31:12'),
(5, '83', 'AZLIN NATASHA BINTI AZAHAR', '980203565340', 'MRA GLOBAL SDN BHD', 'LUNAS - JEBAT 2', '2025-12-17', '2025-12-16 02:24:52'),
(6, '13', 'AZLIN NATASHA BINTI AZAHAR', '980203565340', '', 'LUNAS - JEBAT 2', '2025-12-16', '2025-12-16 02:30:12'),
(7, '97', 'AZLIN NATASHA BINTI AZAHAR', '980203565340', 'MRA GLOBAL SDN BHD', 'SENARAI PEMBAIKAN PADA TAHUN 2025 (DIBAWAH JAMINAN SYARIKAT)', '2025-12-18', '2025-12-18 01:04:24'),
(8, '77', 'AZLIN NATASHA BINTI AZAHAR', '980203565340', 'MIM DEFENSE SDN BHD', 'Test', '2025-12-18', '2025-12-18 04:20:56');

-- --------------------------------------------------------

--
-- Table structure for table `quotation`
--

CREATE TABLE `quotation` (
  `id` int(11) NOT NULL,
  `namecreate` varchar(255) DEFAULT NULL,
  `alamat1` varchar(255) DEFAULT NULL,
  `alamat2` varchar(255) DEFAULT NULL,
  `alamat3` varchar(255) DEFAULT NULL,
  `alamat4` varchar(255) DEFAULT NULL,
  `alamat5` varchar(255) DEFAULT NULL,
  `qtnno` varchar(255) DEFAULT NULL,
  `date` date NOT NULL,
  `page` int(11) DEFAULT NULL,
  `project` varchar(255) DEFAULT NULL,
  `contractno` varchar(100) DEFAULT NULL,
  `nodaftar` varchar(100) DEFAULT NULL,
  `remarks` varchar(255) DEFAULT NULL,
  `sparepartcost` decimal(10,2) DEFAULT NULL,
  `signmana` varchar(100) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `status` char(5) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
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
  `id` int(11) NOT NULL,
  `namestaff` varchar(255) NOT NULL,
  `dateapply` date NOT NULL,
  `syarikat` varchar(255) DEFAULT NULL,
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

INSERT INTO `request` (`id`, `namestaff`, `dateapply`, `syarikat`, `appoiment`, `department`, `supplirename`, `suppladderss`, `attention`, `termpayment`, `payto`, `accno`, `bankname`, `remark`, `signreq`, `signmanager`, `datemanager`, `signacc`, `dateacc`, `signdirector`, `datedirector`, `statusacc`, `statusmana`, `statusdirec`, `refno`) VALUES
(10, 'MOHAMAD FARISH SYAH DANIAL BIN TUKIMAN', '2025-10-29', 'LETILICA SDN BHD', 'Job TRML', 'WANGSA MAJU', 'SOFTWARE', 'WILAYAH PERSEKUTUAN', '-', 'Test', 'Test', 'Test', 'Test', 'Test', 'signature.png', 'badrul_sign.png', '2025-10-29', 'signature_nurul.png', '2025-12-14', 'NULL', '0000-00-00', 2, 2, 1, 'RQF (GMS)-MRA2302004'),
(12, 'NURUL SYUHADAH', '2025-12-04', 'MRA GLOBAL SDN BHD', 'keperluan trml', 'GEMAS', 'GEMAS MOTOR SERVICE', 'GEMAS NEGERI SEMBILAN', 'test', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'signature_nurul.png', 'NULL', '0000-00-00', 'NULL', '0000-00-00', 'NULL', '0000-00-00', 1, 1, 1, 'RQF (GMS)-MRA2302004'),
(13, 'NURUL SYUHADAH', '2025-12-09', 'MRA GLOBAL SDN BHD', 'keperluan boat', 'GEMAS', 'GEMAS MOTOR SERVICE', 'GEMAS NEGERI SEMBILAN', 'test', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'signature_nurul.png', 'NULL', '0000-00-00', 'NULL', '0000-00-00', 'NULL', '0000-00-00', 1, 1, 1, 'RQF (GMS)-MRA2302004');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `attendance`
--
ALTER TABLE `attendance`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dateleave`
--
ALTER TABLE `dateleave`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `document`
--
ALTER TABLE `document`
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
-- Indexes for table `projek`
--
ALTER TABLE `projek`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `projekname`
--
ALTER TABLE `projekname`
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
-- AUTO_INCREMENT for table `attendance`
--
ALTER TABLE `attendance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `dateleave`
--
ALTER TABLE `dateleave`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `document`
--
ALTER TABLE `document`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `list_quotation`
--
ALTER TABLE `list_quotation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `list_request`
--
ALTER TABLE `list_request`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `mra_claim`
--
ALTER TABLE `mra_claim`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `mra_claims`
--
ALTER TABLE `mra_claims`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=140;

--
-- AUTO_INCREMENT for table `mra_leave`
--
ALTER TABLE `mra_leave`
  MODIFY `leaveid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT for table `mra_staff`
--
ALTER TABLE `mra_staff`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `mra_wfh`
--
ALTER TABLE `mra_wfh`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `notpresent`
--
ALTER TABLE `notpresent`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `projek`
--
ALTER TABLE `projek`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `projekname`
--
ALTER TABLE `projekname`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `quotation`
--
ALTER TABLE `quotation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `request`
--
ALTER TABLE `request`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;