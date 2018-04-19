-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 19, 2018 at 09:06 AM
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
-- Table structure for table `beds`
--

CREATE TABLE `beds` (
  `BedID` varchar(6) NOT NULL,
  `RoomType` varchar(50) NOT NULL,
  `Rate` int(11) NOT NULL,
  `Floor` varchar(10) NOT NULL,
  `Room` int(6) NOT NULL,
  `Status` varchar(25) NOT NULL,
  `Percent` decimal(6,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `beds`
--

INSERT INTO `beds` (`BedID`, `RoomType`, `Rate`, `Floor`, `Room`, `Status`, `Percent`) VALUES
('300-1', 'Ward', 900, '3', 300, 'Available', '1.50'),
('300-2', 'Ward', 900, '3', 300, 'Available', '1.50'),
('300-3', 'Ward', 900, '3', 300, 'Available', '1.50'),
('300-4', 'Ward', 900, '3', 300, 'Available', '1.50'),
('301-1', 'OB-Ward', 900, '3', 301, 'Available', '1.50'),
('301-2', 'OB-Ward', 900, '3', 301, 'Available', '1.50'),
('301-3', 'OB-Ward', 900, '3', 301, 'Available', '1.50'),
('301-4', 'OB-Ward', 900, '3', 301, 'Available', '1.50'),
('302-1', 'Female-Ward', 900, '3', 302, 'Available', '1.50'),
('302-2', 'Female-Ward', 900, '3', 302, 'Available', '1.50'),
('302-3', 'Female-Ward', 900, '3', 302, 'Available', '1.50'),
('302-4', 'Female-Ward', 900, '3', 302, 'Available', '1.50'),
('303-1', 'Male-Ward', 900, '3', 303, 'Available', '1.50'),
('303-2', 'Male-Ward', 900, '3', 303, 'Available', '1.50'),
('303-3', 'Male-Ward', 900, '3', 303, 'Available', '1.50'),
('303-4', 'Male-Ward', 900, '3', 303, 'Available', '1.50'),
('304-1', 'Pedia-Ward', 900, '3', 304, 'Available', '1.50'),
('304-2', 'Pedia-Ward', 900, '3', 304, 'Available', '1.50'),
('304-3', 'Pedia-Ward', 900, '3', 304, 'Available', '1.50'),
('304-4', 'Pedia-Ward', 900, '3', 304, 'Available', '1.50'),
('305-1', 'Surgical-Ward', 900, '3', 305, 'Available', '1.50'),
('305-2', 'Surgical-Ward', 900, '3', 305, 'Available', '1.50'),
('305-3', 'Surgical-Ward', 900, '3', 305, 'Available', '1.50'),
('305-4', 'Surgical-Ward', 900, '3', 305, 'Available', '1.50'),
('306-1', 'Semi-Private', 1250, '3', 306, 'Available', '1.70'),
('306-2', 'Semi-Private', 1250, '3', 306, 'Available', '1.70'),
('306-3', 'Semi-Private', 1250, '3', 306, 'Available', '1.70'),
('306-4', 'Semi-Private', 1250, '3', 306, 'Available', '1.70'),
('307-1', 'Semi-Private', 1500, '3', 307, 'Available', '1.70'),
('307-2', 'Semi-Private', 1500, '3', 307, 'Available', '1.70'),
('308-1', 'Semi-Private', 1500, '3', 308, 'Available', '1.70'),
('308-2', 'Semi-Private', 1500, '3', 308, 'Available', '1.70'),
('400', 'Private', 1800, '4', 400, 'Available', '2.00'),
('401', 'Private', 1800, '4', 401, 'Available', '2.00'),
('402', 'Private', 1800, '4', 402, 'Available', '2.00'),
('403', 'Private', 1800, '4', 403, 'Available', '2.00'),
('404', 'Private', 1800, '4', 404, 'Available', '2.00'),
('405', 'Private', 1800, '4', 405, 'Available', '2.00'),
('406', 'Suite', 2500, '4', 406, 'Available', '2.00'),
('407', 'Suite', 2500, '4', 407, 'Available', '2.00'),
('408', 'Suite', 2500, '4', 408, 'Available', '2.00'),
('409', 'Suite', 2500, '4', 409, 'Available', '2.00'),
('411', 'Infectious', 2500, '4', 411, 'Available', '2.00'),
('412', 'Infectious', 2500, '4', 412, 'Available', '2.00'),
('413', 'ICU', 5000, '4', 413, 'Available', '2.00'),
('414', 'ICU', 5000, '4', 414, 'Available', '2.00'),
('415', 'ICU', 5000, '4', 415, 'Available', '2.00'),
('416', 'ICU', 5000, '4', 416, 'Available', '2.00'),
('ER', 'Emergency', 2000, '1', 101, 'Available', '1.50');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `beds`
--
ALTER TABLE `beds`
  ADD PRIMARY KEY (`BedID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
