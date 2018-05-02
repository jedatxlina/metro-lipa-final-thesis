-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 02, 2018 at 06:40 PM
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
-- Table structure for table `adv_payment`
--

CREATE TABLE `adv_payment` (
  `PaymentID` int(15) NOT NULL,
  `AdmissionID` int(15) NOT NULL,
  `Amount` int(15) NOT NULL,
  `Status` varchar(20) NOT NULL,
  `DateTimePaid` varchar(30) NOT NULL,
  `AdmissionNo` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `adv_payment`
--

INSERT INTO `adv_payment` (`PaymentID`, `AdmissionID`, `Amount`, `Status`, `DateTimePaid`, `AdmissionNo`) VALUES
(94452, 2017340646, 0, 'Paid', '2018-04-21', 0),
(16932, 2017319597, 0, 'Paid', '2018-04-23', 0),
(24482, 2017340646, 0, 'Paid', '2018-04-23', 0),
(59147, 2017396577, 0, 'Paid', '2018-04-26 01:26:25am', 0),
(60630, 2017396577, 0, 'Paid', '2018-04-26 01:43:08am', 0),
(67436, 2017429909, 5000, 'Paid', '2018-04-26 05:17:25pm', 0),
(14780, 2017134695, 2000, 'Paid', '2018-05-02 10:10:56pm', 0),
(78132, 2017296688, 2000, 'Paid', '2018-05-02 11:28:52pm', 34);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
