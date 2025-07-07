-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 02, 2025 at 07:04 AM
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
(1, 'Travex', '1', '321, Padonar Street', 'Sanchaung', 'Yangon', 'info@travex-myanmar.com', 'www.travex.com', 'D', 'Com_68622f55e64103.39292758', '2025-06-30 06:31:49', '2025-06-30 06:31:49'),
(2, 'Voyager', '1', '56, Pyay Road', 'Dagon', 'Yangon', 'info@voyage-myanmar.com', 'www.voyager.com', 'D', 'Com_68623473336ad0.10032060', '2025-06-30 06:53:39', '2025-06-30 06:53:39');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Companies`
--
ALTER TABLE `Companies`
  ADD PRIMARY KEY (`Id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Companies`
--
ALTER TABLE `Companies`
  MODIFY `Id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
