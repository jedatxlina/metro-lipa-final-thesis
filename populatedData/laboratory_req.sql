-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 23, 2018 at 03:34 PM
-- Server version: 10.1.29-MariaDB
-- PHP Version: 7.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `metro_lipa_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `laboratory_req`
--

CREATE TABLE `laboratory_req` (
  `RequestID` int(6) NOT NULL,
  `LaboratoryID` int(6) NOT NULL,
  `AdmissionID` int(10) NOT NULL,
  `Status` varchar(10) NOT NULL,
  `SpecialRequest` varchar(50) NOT NULL,
  `DateRequest` varchar(25) NOT NULL,
  `TimeRequest` varchar(25) NOT NULL,
  `DateCleared` varchar(25) NOT NULL,
  `TimeCleared` varchar(25) NOT NULL,
  `MedicalID` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `laboratory_req`
--

INSERT INTO `laboratory_req` (`RequestID`, `LaboratoryID`, `AdmissionID`, `Status`, `SpecialRequest`, `DateRequest`, `TimeRequest`, `DateCleared`, `TimeCleared`, `MedicalID`) VALUES
(118890, 1008, 2017340646, 'Cleared', '', '2018-04-22', '01:44 AM', '', '', 0),
(735728, 1008, 2017340646, 'Cleared', '', '2018-04-22', '01:18 AM', '', '', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `laboratory_req`
--
ALTER TABLE `laboratory_req`
  ADD PRIMARY KEY (`RequestID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
