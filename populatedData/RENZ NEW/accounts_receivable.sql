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
-- Table structure for table `accounts_receivable`
--

CREATE TABLE `accounts_receivable` (
  `AccountReceiveID` int(6) NOT NULL,
  `AdmissionID` int(11) NOT NULL,
  `Provider` varchar(30) NOT NULL,
  `Amount` decimal(15,2) NOT NULL,
  `DateTimePosted` varchar(30) NOT NULL,
  `ControlNo` varchar(15) NOT NULL,
  `Remarks` varchar(25) NOT NULL,
  `AdmissionNo` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `accounts_receivable`
--

INSERT INTO `accounts_receivable` (`AccountReceiveID`, `AdmissionID`, `Provider`, `Amount`, `DateTimePosted`, `ControlNo`, `Remarks`, `AdmissionNo`) VALUES
(36297, 2017340646, 'Maxicare', '1500.00', '2018-04-25 10:46 PM', '', 'Pending', 0),
(43241, 2017340646, 'Intellicare', '500.00', '2018-04-25 10:50 PM', '', 'Pending', 0),
(84970, 2017429909, 'ValuCare', '300.00', '2018-04-26 05:06 PM', '', 'Pending', 0),
(89977, 2017296688, 'EA Philippines', '480.00', '2018-04-26 05:02 PM', '', 'Pending', 0),
(168288, 2017319597, 'Philhealth', '0.00', '', '', 'Pending', 0),
(169805, 2017136706, 'Philhealth', '0.00', '', '', 'Not Applicable', 37),
(216547, 2017340646, 'Philhealth', '0.00', '', '', 'Pending', 0),
(224030, 2017319597, 'Intellicare', '0.00', '', '', 'Pending', 0),
(234397, 2017340646, 'Generali Pilipinas', '0.00', '', '', 'Pending', 42),
(289073, 2017340646, 'Philhealth', '0.00', '', '', 'Pending', 0),
(308180, 2017789492, 'Philhealth', '0.00', '', '', 'Pending', 0),
(318234, 2017340646, 'Philhealth', '0.00', '', '', 'Not Applicable', 42),
(436118, 2017340646, 'HMI Health Maintenance Inc', '0.00', '', '', 'Pending', 0),
(472835, 2017340646, 'Intellicare', '0.00', '', '', 'Pending', 0),
(494280, 2017340646, 'Philhealth', '0.00', '', '', 'Pending', 0),
(560785, 2017139938, 'EastWest Healthcare', '12000.00', '', '', 'Posted', 40),
(611492, 2017789492, 'Generali Pilipinas', '0.00', '', '', 'Pending', 0),
(612642, 2017159933, 'Cocolife', '0.00', '', '', 'Pending', 0),
(656632, 2017340646, 'HMO', '0.00', '', '', 'Not Applicable', 0),
(674535, 2017159933, 'Philhealth', '0.00', '', '', 'Not Applicable', 0),
(762350, 2017429909, 'Philhealth', '0.00', '', '', 'Not Applicable', 36),
(775618, 2017428856, 'Philhealth', '0.00', '', '', 'Not Applicable', 41),
(856849, 2017428856, 'Medi - Access', '0.00', '', '', 'Pending', 41),
(947877, 2017348806, 'Philhealth', '0.00', '', '', 'Pending', 35),
(980294, 2017139938, 'Philhealth', '0.00', '', '', 'Pending', 40);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounts_receivable`
--
ALTER TABLE `accounts_receivable`
  ADD PRIMARY KEY (`AccountReceiveID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
