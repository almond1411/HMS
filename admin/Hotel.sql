-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 08, 2025 at 03:01 PM
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
-- Database: `Hotel`
--

-- --------------------------------------------------------

--
-- Table structure for table `Companies`
--

CREATE TABLE `Companies` (
  `Id` int(6) NOT NULL,
  `Name` varchar(30) NOT NULL,
  `Type` varchar(30) NOT NULL,
  `Address1` varchar(240) NOT NULL,
  `Address2` varchar(240) NOT NULL,
  `City` varchar(30) NOT NULL,
  `Email` varchar(60) NOT NULL,
  `Website` varchar(120) NOT NULL,
  `Class` char(1) NOT NULL,
  `Link` varchar(240) NOT NULL,
  `Created` timestamp NOT NULL DEFAULT current_timestamp(),
  `Updated` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `Companies`
--

INSERT INTO `Companies` (`Id`, `Name`, `Type`, `Address1`, `Address2`, `City`, `Email`, `Website`, `Class`, `Link`, `Created`, `Updated`) VALUES
(1, 'Travex', '1', '321, Padonar Street', 'Sanchaung', 'Yangon', 'info@travex-myanmar.com', 'www.travex.com', 'D', 'Com_68622f55e64103.39292758', '2025-06-30 06:31:49', '2025-07-02 06:17:24'),
(2, 'Voyager', '1', '56, Pyay Road', 'Dagon', 'Yangon', 'info@voyage-myanmar.com', 'www.voyager.com', 'D', 'Com_68623473336ad0.10032060', '2025-06-30 06:53:39', '2025-06-30 06:53:39');

-- --------------------------------------------------------

--
-- Table structure for table `Company_Types`
--

CREATE TABLE `Company_Types` (
  `Id` int(3) NOT NULL,
  `Type` char(24) NOT NULL,
  `Created` timestamp NOT NULL DEFAULT current_timestamp(),
  `Updated` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `Company_Types`
--

INSERT INTO `Company_Types` (`Id`, `Type`, `Created`, `Updated`) VALUES
(1, 'Tour Operator', '2025-07-02 07:00:18', '0000-00-00 00:00:00'),
(2, 'MICE Organizer', '2025-07-02 07:00:18', '0000-00-00 00:00:00'),
(3, 'Airline', '2025-07-02 07:00:44', '0000-00-00 00:00:00'),
(4, 'Travel Agency', '2025-07-02 07:00:44', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `Room_Types`
--

CREATE TABLE `Room_Types` (
  `Id` int(11) NOT NULL,
  `Room_Type` char(30) NOT NULL,
  `Number_Of_Rooms` int(3) NOT NULL,
  `Remark` int(11) NOT NULL,
  `UsersLink` varchar(240) NOT NULL,
  `Created` timestamp NOT NULL DEFAULT current_timestamp(),
  `Updated` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `Users`
--

CREATE TABLE `Users` (
  `Id` int(12) NOT NULL,
  `Username` char(30) NOT NULL,
  `Password` varchar(240) NOT NULL,
  `Title` char(6) NOT NULL,
  `Name` char(30) NOT NULL,
  `Position` char(60) NOT NULL,
  `Department` char(30) NOT NULL,
  `Email` char(60) NOT NULL,
  `Phone` char(60) NOT NULL,
  `Status` int(1) NOT NULL,
  `Access` int(2) NOT NULL,
  `Link` varchar(240) NOT NULL,
  `Created` timestamp NOT NULL DEFAULT current_timestamp(),
  `Updated` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `Remark` varchar(240) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `Users`
--

INSERT INTO `Users` (`Id`, `Username`, `Password`, `Title`, `Name`, `Position`, `Department`, `Email`, `Phone`, `Status`, `Access`, `Link`, `Created`, `Updated`, `Remark`) VALUES
(1, 'denlahpai', '0d5e846c16cc3807b4756c2df91dce6a713655417c7ea7b733d1e4c2d16a4dcccff4f10d0abc64d92d2192500289951313cbf1c9089353de95a3fe0aca918d71', 'Mr.', 'Den Lahpai', 'Managing Director', 'Management', 'den.lahpai@gmail.com', '09402590317', 1, 1, 'Usr_68544d5b360981.40343588', '2025-06-19 17:45:44', NULL, '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Companies`
--
ALTER TABLE `Companies`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `Company_Types`
--
ALTER TABLE `Company_Types`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `Users`
--
ALTER TABLE `Users`
  ADD PRIMARY KEY (`Id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Companies`
--
ALTER TABLE `Companies`
  MODIFY `Id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `Company_Types`
--
ALTER TABLE `Company_Types`
  MODIFY `Id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `Users`
--
ALTER TABLE `Users`
  MODIFY `Id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
