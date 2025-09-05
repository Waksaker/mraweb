-- phpMyAdmin SQL Dump
-- version 5.2.1deb3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Sep 05, 2025 at 04:26 PM
-- Server version: 8.0.43-0ubuntu0.24.04.1
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
  `name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `ic` char(14) COLLATE utf8mb4_general_ci NOT NULL,
  `mac` char(20) COLLATE utf8mb4_general_ci NOT NULL,
  `ip` char(20) COLLATE utf8mb4_general_ci NOT NULL,
  `time` time NOT NULL,
  `date` date NOT NULL,
  `update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `attandance`
--

INSERT INTO `attandance` (`id`, `name`, `ic`, `mac`, `ip`, `time`, `date`, `update`) VALUES
(1, 'MOHAMAD FARISH SYAH DANIAL BIN TUKIMAN', '000922012519', '8C:7A:3D:9F:13:16', '192.168.0.102', '06:46:04', '2025-04-17', '2025-04-16 22:46:04'),
(2, 'MUHAMMAD HAMSANI IRWAN BIN HAMZAH', '910309025613', '6A:39:D7:A3:4F:AB', '192.168.0.106', '09:52:42', '2025-04-17', '2025-04-17 01:52:43'),
(3, 'AFIFFIKRI BIN AUSPAN', '941118146051', '1E:87:30:48:8F:36', '192.168.0.113', '09:07:48', '2025-04-17', '2025-04-17 01:07:49'),
(4, 'MOHAMMAD AFFENDY BIN MOHD ASRI', '970218095135', '6E:FF:7B:7D:10:8F', '192.168.0.117', '07:14:56', '2025-04-17', '2025-04-16 23:14:57'),
(5, 'IKHWAN DARWISH BIN AHMAD JAIDI', '01051710717', 'C2:8C:29:B8:98:20', '192.168.0.102', '13:47:16', '2025-03-11', '2025-03-11 05:47:16');

-- --------------------------------------------------------

--
-- Table structure for table `list_request`
--

CREATE TABLE `list_request` (
  `id` int NOT NULL,
  `name` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `descriptions` varchar(255) NOT NULL,
  `quantity` char(10) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `amount` varchar(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `mra_claim`
--

CREATE TABLE `mra_claim` (
  `id` int NOT NULL,
  `apply` date NOT NULL,
  `tajuk` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `ic` varchar(14) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `status` char(11) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `folder` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `mra_claim`
--

INSERT INTO `mra_claim` (`id`, `apply`, `tajuk`, `ic`, `status`, `folder`, `updated`) VALUES
(1, '2025-08-17', 'CLAIM BULAN 8', '000922012519', '1', 'MOHAMAD FARISH SYAH DANIAL BIN TUKIMAN(Aug 2025).pdf', '2025-08-17 01:41:32');

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
  `amount` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `mra_claims`
--

INSERT INTO `mra_claims` (`id`, `date`, `noic`, `purpose`, `details`, `amount`) VALUES
(1, '2024-08-20', '000922012519', 'TRIP MEMPAGA', 'LAPANG SASAR 200 METER', 40.00),
(2, '2024-08-21', '000922012519', 'TRIP MEMPAGA', 'LAPANG SASAR 200 METER', 40.00),
(3, '2024-08-22', '000922012519', 'TRIP MEMPAGA', 'LAPANG SASAR 200 METER', 25.00),
(4, '2024-08-20', '000922012519', 'TRIP MEMPAGA', 'LAPANG SASAR 200 METER', 40.00),
(11, '2024-01-04', '000922012519', 'TRIP TO MEMPAGA', 'LAPANG SASAR 200 METER', 25.00),
(12, '2024-09-05', '000922012519', 'TRIP TO MEMPAGA', 'LAPANG SASAR 200 METER', 25.00),
(13, '2024-09-10', '000922012519', 'TRIP TO MEMPAGA', 'LAPANG SASAR 200 METER', 40.00),
(14, '2024-09-11', '000922012519', 'TRIP TO MEMPAGA', 'LAPANG SASAR 200 METER', 25.00),
(15, '2024-09-12', '000922012519', 'TRIP TO MEMPAGA', 'LAPANG SASAR 200 METER', 25.00),
(16, '2024-02-29', '000922012519', 'TRIP TO MEMPAGA', 'LAPANG SASAR 200 METER', 25.00),
(17, '2024-10-04', '000922012519', 'TRIP TO MEMPAGA', 'LAPANG SASAR 200 METER', 25.00),
(18, '2024-10-09', '000922012519', 'TRIP TO MEMPAGA', 'LAPANG SASAR 200 METER', 40.00),
(19, '2024-10-10', '000922012519', 'TRIP TO MEMPAGA', 'LAPANG SASAR 200 METER', 40.00),
(20, '2024-10-11', '000922012519', 'TRIP TO MEMPAGA', 'LAPANG SASAR 200 METER', 25.00),
(21, '2024-10-19', '000922012519', 'TRIP TO SEREMBAN', 'ROBOT', 40.00),
(22, '2024-10-20', '000922012519', 'TRIP TO SEREMBAN', 'ROBOT', 25.00),
(28, '2024-11-04', '000922012519', 'TRIP TO SEREMBAN', 'ROBOT', 25.00),
(29, '2024-11-05', '000922012519', 'TRIP TO MERSING', 'LAPANG SASAR 600 METER', 40.00),
(31, '2024-11-06', '000922012519', 'TRIP TO MERSING', 'LAPANG SASAR 600 METER', 40.00),
(32, '2024-11-07', '000922012519', 'TRIP TO MERSING', 'LAPANG SASAR 600 METER', 25.00),
(34, '2024-11-14', '000922012519', 'TRIP TO PUDU', 'HANTAR ROBOT', 25.00),
(35, '2024-11-25', '000922012519', 'TRIP TO MERSING', 'LAPANG SASAR 600 METER', 40.00),
(36, '2024-11-26', '000922012519', 'TRIP TO MERSING', 'LAPANG SASAR 600 METER', 40.00),
(37, '2024-11-27', '000922012519', 'TRIP TO MERSING', 'LAPANG SASAR 600 METER', 25.00),
(38, '2024-12-11', '000922012519', 'TRIP TO GEMAS', 'ASTROS', 40.00),
(39, '2024-12-12', '000922012519', 'TRIP TO GEMAS', 'ASTROS', 25.00),
(40, '2024-12-13', '000922012519', 'TRIP TO GEMAS', 'ASTROS', 25.00),
(42, '2025-02-06', '000922012519', 'TRIP TO MERSING', 'LAPANG SASAR 200 METER', 25.00),
(44, '2025-03-16', '000922012519', 'TRIP MERSING', 'LAPANG SASAR 600 METER', 40.00);

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
  `datestart` date DEFAULT NULL,
  `dateend` date DEFAULT NULL,
  `daysleave` varchar(5) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `purpose` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `contactno` varchar(14) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `matters` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `mra_leave`
--

INSERT INTO `mra_leave` (`leaveid`, `dateapply`, `nameapply`, `noic`, `position`, `datestart`, `dateend`, `daysleave`, `purpose`, `contactno`, `matters`) VALUES
(6, '2024-09-27', 'MOHAMAD FARISH SYAH DANIAL BIN TUKIMAN', '000922012519', 'SOFTWARE ENGINEER', '2024-10-01', '2024-10-02', '2', 'Balik Kampung', '01156640727', 'ANNUAL LEAVE'),
(7, '2024-09-27', 'MOHAMAD FARISH SYAH DANIAL BIN TUKIMAN', '000922012519', 'SOFTWARE ENGINEER', '2024-10-01', '2024-10-02', '2', 'Balik Kampung', '01156640727', 'MEDICAL LEAVE'),
(8, '2024-09-27', 'MOHAMAD FARISH SYAH DANIAL BIN TUKIMAN', '000922012519', 'SOFTWARE ENGINEER', '2024-09-28', '2024-09-28', '1', 'Balik Kampung', '01156640727', 'UNPAID LEAVE'),
(9, '2024-09-27', 'MOHAMAD FARISH SYAH DANIAL BIN TUKIMAN', '000922012519', 'SOFTWARE ENGINEER', '2024-09-28', '2024-09-28', '1', 'Balik Kampung', '01156640727', 'ANNUAL LEAVE'),
(11, '2024-09-30', 'MOHAMAD FARISH SYAH DANIAL BIN TUKIMAN', '000922012519', 'SOFTWARE ENGINEER', '2024-10-01', '2024-10-02', '2', 'Balik Kampung Isteri', '01156640727', 'MEDICAL LEAVE'),
(13, '2024-11-01', 'MOHAMMAD AFFENDY BIN MOHD ASRI', '970218095135', 'COMPUTER ENGINEER', '2024-11-01', '2024-11-02', '2', 'Balik Kampung', '01172259030', 'ANNUAL LEAVE'),
(15, '2024-11-16', 'MOHAMAD FARISH SYAH DANIAL BIN TUKIMAN', '000922012519', 'SOFTWARE ENGINEER', '2024-11-18', '2024-11-19', '1', 'Balik Kampung', '01156640727', 'ANNUAL LEAVE'),
(17, '2024-12-17', 'MOHAMAD FARISH SYAH DANIAL BIN TUKIMAN', '000922012519', 'SOFTWARE ENGINEER', '2024-12-23', '2024-12-31', '7', 'Balik Kampung', '01156640727', 'ANNUAL LEAVE'),
(18, '2024-12-17', 'AFIFFIKRI BIN AUSPAN', '941118146051', 'SYSTEM ENGINEER', '2024-12-23', '2024-12-31', '7', 'CUTI  REHAT ', '0176963081', 'ANNUAL LEAVE'),
(19, '2025-02-18', 'MOHAMAD FARISH SYAH DANIAL BIN TUKIMAN', '000922012519', 'SOFTWARE ENGINEER', '2025-02-18', '2025-02-19', '2', 'Balik Kampung', '01156640727', 'ANNUAL LEAVE'),
(21, '2025-08-05', 'MOHAMAD FARISH SYAH DANIAL BIN TUKIMAN', '000922012519', 'SOFTWARE ENGINEER', '2025-08-06', '2025-08-08', '3', 'Balik Kampung', '01156640727', 'ANNUAL LEAVE');

-- --------------------------------------------------------

--
-- Table structure for table `mra_office`
--

CREATE TABLE `mra_office` (
  `id` int NOT NULL,
  `ic` char(14) COLLATE utf8mb4_general_ci NOT NULL,
  `inoffice` time NOT NULL,
  `outoffice` time DEFAULT NULL,
  `date_apply` date NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `mra_office`
--

INSERT INTO `mra_office` (`id`, `ic`, `inoffice`, `outoffice`, `date_apply`, `updated_at`) VALUES
(1, '000922012519', '08:07:13', '13:33:37', '2025-03-15', '2025-03-15 05:33:50'),
(2, '970218095135', '08:07:59', '11:19:35', '2025-03-15', '2025-03-15 03:19:55'),
(3, '000922012519', '05:45:10', '00:00:00', '2025-03-17', '2025-03-17 06:57:34'),
(4, '941118146051', '08:12:21', '14:56:06', '2025-03-17', '2025-03-17 06:56:35'),
(8, '910309025613', '09:54:32', '14:27:19', '2025-03-17', '2025-03-17 06:27:45'),
(7, '910309025613', '09:54:31', '14:27:19', '2025-03-17', '2025-03-17 06:27:45'),
(9, '910309025613', '09:54:35', '14:27:19', '2025-03-17', '2025-03-17 06:27:45'),
(10, '910309025613', '09:54:33', '14:27:19', '2025-03-17', '2025-03-17 06:27:45'),
(11, '910309025613', '09:54:36', '14:27:19', '2025-03-17', '2025-03-17 06:27:45'),
(12, '000922012519', '23:14:09', '00:00:00', '2025-03-28', '2025-03-28 15:33:42'),
(13, '000922012519', '23:14:09', '00:00:00', '2025-03-28', '2025-03-28 15:33:42'),
(14, '000922012519', '23:14:09', '00:00:00', '2025-03-28', '2025-03-28 15:33:42'),
(15, '000922012519', '07:53:01', '00:00:00', '2025-03-29', '2025-03-29 00:58:59'),
(16, '000922012519', '07:52:59', '00:00:00', '2025-03-29', '2025-03-29 00:58:59'),
(17, '970218095135', '10:04:03', '15:29:37', '2025-04-07', '2025-04-07 07:30:22'),
(18, '000922012519', '10:04:03', '15:34:54', '2025-04-07', '2025-04-07 07:35:12'),
(19, '941118146051', '10:04:07', '15:33:59', '2025-04-07', '2025-04-07 07:34:44'),
(20, '910309025613', '10:10:04', '15:18:31', '2025-04-07', '2025-04-07 07:18:55'),
(21, '910309025613', '10:10:04', '15:18:31', '2025-04-07', '2025-04-07 07:18:55'),
(22, '970218095135', '06:24:03', '12:07:17', '2025-04-08', '2025-04-08 04:08:10'),
(23, '000922012519', '06:24:03', '11:20:14', '2025-04-08', '2025-04-08 03:20:34'),
(24, '941118146051', '09:42:03', '10:15:45', '2025-04-08', '2025-04-08 02:16:19'),
(25, '910309025613', '09:42:21', '11:59:27', '2025-04-08', '2025-04-08 03:59:57'),
(26, '000922012519', '06:46:04', '00:00:00', '2025-04-17', '2025-04-17 02:01:56'),
(27, '970218095135', '07:14:56', '00:00:00', '2025-04-17', '2025-04-17 02:01:49'),
(28, '941118146051', '09:07:48', '00:00:00', '2025-04-17', '2025-04-17 02:02:03'),
(29, '910309025613', '09:52:42', '00:00:00', '2025-04-17', '2025-04-17 02:01:59');

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
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `mra_outstation`
--

INSERT INTO `mra_outstation` (`id`, `name`, `ic`, `datestart`, `purpose`, `details`, `dateapply`, `updated_at`) VALUES
(1, 'MOHAMAD FARISH SYAH DANIAL BIN TUKIMAN', '000922012519', '2025-03-16', 'TRIP MERSING', 'LAPANG SASAR 600 METER', '2025-03-15', '2025-03-15 00:43:15');

-- --------------------------------------------------------

--
-- Table structure for table `mra_staff`
--

CREATE TABLE `mra_staff` (
  `id` int NOT NULL,
  `id_user` varchar(20) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `icno` varchar(14) DEFAULT NULL,
  `position` varchar(100) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `status` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `phoneno` varchar(14) DEFAULT NULL,
  `bank_name` varchar(10) NOT NULL,
  `acc_no` varchar(30) NOT NULL,
  `image` varchar(255) NOT NULL,
  `syarikat` varchar(255) NOT NULL,
  `portfolio` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `mra_staff`
--

INSERT INTO `mra_staff` (`id`, `id_user`, `name`, `email`, `icno`, `position`, `password`, `status`, `phoneno`, `bank_name`, `acc_no`, `image`, `syarikat`, `portfolio`) VALUES
(3, 'wish', 'IKHWAN DARWISH BIN AHMAD JAIDI', 'ikhwan.awish@gmail.com', '01051710717', 'COMPUTER ENGINEER', 'mra123', 'STAFF', '0125948508', 'Maybank', '162870151398', 'wish.png', 'LETILICA SDN BHD', ''),
(5, 'fendy', 'MOHAMMAD AFFENDY BIN MOHD ASRI', 'mohammadaffendyasri@gmail.com', '970218095135', 'COMPUTER ENGINEER', 'mra123', 'STAFF', '01172259030', 'Maybank', '162107427034', '', '', ''),
(6, 'farish', 'MOHAMAD FARISH SYAH DANIAL BIN TUKIMAN', 'farishtukiman@gmail.com', '000922012519', 'SOFTWARE ENGINEER', 'wak@2519', 'STAFF', '01156640727', 'Bank Islam', '01032020736545', 'signature.png', '', 'CV Farish.pdf'),
(12, 'alin', 'AZLIN NATASHA BINTI AZAHAR', 'azlinnatasha8@gmail.com', '980203565340', 'Admin Executive', 'mra123', 'HR STAFF', '0176445413', 'Maybank', '162200182861', '', 'MIM DEFENSE SDN BHD', ''),
(13, 'nuyull', 'NURUL SYUHADAH', 'nurulsyuhadaaa21@gmail.com', '001221140176', 'ADMIN', 'MRA123', 'ADMIN STAFF', '0189178650', 'Maybank', '164221637324', '', 'MRA GLOBAL SDN BHD', ''),
(16, 'amri', 'AMRI BIN YAHYA', 'farishtukiman@gmail.com', '000922019851', 'SOFTWARE ENGINEER', '265285', 'STAFF', '01156640727', 'Bank Islam', '01032020736545', '', 'LETILICA SDN BHD', '');

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
(2, 'IKHWAN DARWISH BIN AHMAD JAIDI', '01051710717', 'TAK TAHU', 'TAk TAHU', '2025-03-17', '2025-03-15', '2025-03-15 01:12:53');

-- --------------------------------------------------------

--
-- Table structure for table `request`
--

CREATE TABLE `request` (
  `id` int NOT NULL,
  `namestaff` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `dateapply` date DEFAULT NULL,
  `appoiment` varchar(255) NOT NULL,
  `department` varchar(255) NOT NULL,
  `supplirename` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `suppladderss` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `attention` varchar(255) NOT NULL,
  `termpayment` varchar(255) NOT NULL,
  `payto` varchar(255) NOT NULL,
  `accno` varchar(30) NOT NULL,
  `bankname` varchar(10) NOT NULL,
  `remark` varchar(255) NOT NULL,
  `signreq` varchar(255) NOT NULL,
  `signmanager` varchar(255) NOT NULL,
  `datemanager` date NOT NULL,
  `signacc` varchar(255) NOT NULL,
  `dateacc` date NOT NULL,
  `signdirector` varchar(255) NOT NULL,
  `datedirector` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `attandance`
--
ALTER TABLE `attandance`
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
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `mra_claims`
--
ALTER TABLE `mra_claims`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `mra_leave`
--
ALTER TABLE `mra_leave`
  MODIFY `leaveid` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `mra_office`
--
ALTER TABLE `mra_office`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `mra_outstation`
--
ALTER TABLE `mra_outstation`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `mra_staff`
--
ALTER TABLE `mra_staff`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `mra_wfh`
--
ALTER TABLE `mra_wfh`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
