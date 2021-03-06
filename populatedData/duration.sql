-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 26, 2018 at 08:13 AM
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
-- Table structure for table `duration`
--

CREATE TABLE `duration` (
  `DurationID` int(11) NOT NULL,
  `AdmissionID` int(11) NOT NULL,
  `AdmissionNo` int(10) NOT NULL,
  `ArrivalDate` datetime NOT NULL,
  `DischargeDate` datetime NOT NULL,
  `BedID` varchar(11) NOT NULL,
  `TotalBill` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `duration`
--

INSERT INTO `duration` (`DurationID`, `AdmissionID`, `AdmissionNo`, `ArrivalDate`, `DischargeDate`, `BedID`, `TotalBill`) VALUES
(72591, 123123, 5, '2018-04-18 02:39:46', '0000-00-00 00:00:00', 'Emergency', 123),
(39040, 2017390766, 3, '2018-04-18 00:00:00', '2018-04-24 00:00:00', '306-4', 0),
(66162, 2017390766, 3, '2018-04-18 00:00:00', '2018-04-24 00:00:00', '306-2', 0),
(18962, 2017390766, 3, '2018-04-18 00:00:00', '2018-04-24 00:00:00', '402', 0),
(83951, 2017390766, 3, '2018-04-19 00:00:00', '2018-04-24 00:00:00', '413', 0),
(61898, 2017601542, 5, '2018-04-21 00:00:00', '2018-04-24 00:00:00', '407', 0),
(40403, 2017601542, 5, '2018-04-21 00:00:00', '2018-04-24 00:00:00', '400', 0),
(72229, 2017601542, 5, '2018-04-21 00:00:00', '2018-04-24 00:00:00', '407', 0),
(66681, 2017340646, 2, '2018-04-21 00:00:00', '2018-04-24 00:00:00', '409', 0),
(65540, 2017676356, 6, '2018-04-21 11:20:29', '2018-04-21 00:00:00', 'ER', 2500),
(25142, 2017676356, 6, '2018-04-21 00:00:00', '2018-04-21 00:00:00', '304-2', 0),
(53906, 2017390766, 3, '2018-04-23 00:00:00', '2018-04-24 00:00:00', '300-1', 0),
(45528, 2017623601, 7, '2018-04-23 04:50:58', '2018-04-24 00:00:00', 'ER', 2500),
(68615, 2017623601, 7, '2018-04-23 00:00:00', '2018-04-24 00:00:00', '400', 0),
(89630, 2017623601, 7, '2018-04-23 00:00:00', '2018-04-24 00:00:00', '402', 0),
(92318, 2017623601, 7, '2018-04-23 06:07:53', '2018-04-24 00:00:00', '407', 0),
(60472, 2017623601, 7, '2018-04-24 12:15:27', '2018-04-24 00:00:00', '413', 0),
(88324, 2017340646, 9, '2018-04-24 09:23:01', '2018-04-24 00:00:00', 'ER', 2500),
(20008, 2017340646, 9, '2018-04-24 03:24:35', '0000-00-00 00:00:00', '401', 0),
(40884, 2017285107, 0, '2018-05-01 05:45:16', '0000-00-00 00:00:00', '', 0),
(28131, 2017285107, 11, '2018-05-01 05:52:13', '2018-05-01 05:56:55', '413', 0),
(80743, 2017285107, 11, '2018-05-01 05:56:55', '0000-00-00 00:00:00', '403', 0),
(15694, 2017285107, 12, '2018-05-01 12:09:05', '2018-05-01 06:09:53', 'ER', 2500),
(53855, 2017285107, 0, '2018-05-01 06:10:07', '0000-00-00 00:00:00', '', 0),
(78105, 2017285107, 12, '2018-05-01 06:19:13', '2018-05-01 06:22:43', '413', 0),
(38859, 2017285107, 12, '2018-05-01 06:22:43', '0000-00-00 00:00:00', '303-2', 0),
(96288, 2017187588, 13, '2018-05-01 06:41:55', '0000-00-00 00:00:00', 'ER', 2500);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
