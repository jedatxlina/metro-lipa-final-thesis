-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 23, 2018 at 06:20 PM
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
-- Table structure for table `billing`
--

CREATE TABLE `billing` (
  `BillID` int(20) NOT NULL,
  `AdmissionID` int(20) NOT NULL,
  `Department` varchar(20) NOT NULL,
  `ItemID` int(20) NOT NULL,
  `BillDes` varchar(20) NOT NULL,
  `TotalBill` decimal(15,2) NOT NULL,
  `Status` varchar(10) NOT NULL,
  `MedicalID` int(15) NOT NULL,
  `BedID` varchar(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `billing`
--

INSERT INTO `billing` (`BillID`, `AdmissionID`, `Department`, `ItemID`, `BillDes`, `TotalBill`, `Status`, `MedicalID`, `BedID`) VALUES
(77460, 2017340646, 'Laboratory', 1008, 'ECG', '750.00', '', 0, '0'),
(14997, 2017340646, 'Inpatient', 1000, 'Inpatient Bill', '11955.00', 'Paid', 0, '0'),
(15878, 2017340646, 'Laboratory', 1008, 'ECG', '1125.00', '', 0, '0'),
(464023, 2017340646, 'Pharmacy', 173756, '250', '0.00', 'Unpaid', 638289, '303'),
(571498, 2017340646, 'Pharmacy', 173756, 'Dolfenal 250mg', '225.00', 'Unpaid', 638289, '303');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
