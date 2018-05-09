-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 09, 2018 at 10:30 AM
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
-- Table structure for table `laboratories`
--

CREATE TABLE `laboratories` (
  `LaboratoryID` int(4) NOT NULL,
  `Description` varchar(50) NOT NULL,
  `Rate` int(10) NOT NULL,
  `Type` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `laboratories`
--

INSERT INTO `laboratories` (`LaboratoryID`, `Description`, `Rate`, `Type`) VALUES
(1008, 'ECG', 750, 'Laboratory'),
(1075, 'CT-SCAN', 2100, 'Laboratory'),
(1087, 'XRAY - Arms', 500, 'Laboratory'),
(123723, 'Fecalysis', 665, 'Laboratory'),
(183807, 'XRAY - Abdomen', 800, 'Laboratory'),
(217067, 'Creatinine', 565, 'Laboratory'),
(217354, 'Labor', 13500, 'Operation'),
(236425, 'AIDS Test', 900, 'Laboratory'),
(258493, 'Blood Creatinine', 540, 'Laboratory'),
(259017, 'XRAY - Teeth', 300, 'Laboratory'),
(288383, 'XRAY - Kidney', 200, 'Laboratory'),
(302776, 'Hemoglobin', 1430, 'Laboratory'),
(364011, 'Complete Blood Count', 445, 'Laboratory'),
(401476, 'Glucose Test', 350, 'Laboratory'),
(443666, 'XRAY - Bladder', 250, 'Laboratory'),
(507651, 'Hepatitis C Testing', 1880, 'Laboratory'),
(564834, 'Hepatitis A Testing', 1950, 'Laboratory'),
(600013, 'Hepatitis B Testing', 1430, 'Laboratory'),
(881779, 'Drug Test', 550, 'Laboratory'),
(907738, 'Heart Transplant', 450, 'Laboratory'),
(947990, 'Urinalysis', 550, 'Laboratory'),
(964405, 'XRAY - Chest', 550, 'Laboratory');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `laboratories`
--
ALTER TABLE `laboratories`
  ADD PRIMARY KEY (`LaboratoryID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
