-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 02, 2018 at 06:37 PM
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
-- Table structure for table `medical_details`
--

CREATE TABLE `medical_details` (
  `MedicalID` int(15) NOT NULL,
  `AdmissionID` varchar(15) NOT NULL,
  `AttendingID` int(6) NOT NULL,
  `ArrivalDate` varchar(25) NOT NULL,
  `ArrivalTime` varchar(25) NOT NULL,
  `BedID` varchar(10) NOT NULL,
  `VitalsID` int(15) NOT NULL,
  `MedicationID` int(15) NOT NULL,
  `NurseryID` int(15) NOT NULL,
  `PreviousSurgeries` varchar(50) NOT NULL,
  `Weight` decimal(15,2) NOT NULL,
  `Height` int(10) NOT NULL,
  `Class` varchar(15) NOT NULL,
  `QR_Path` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `medical_details`
--

INSERT INTO `medical_details` (`MedicalID`, `AdmissionID`, `AttendingID`, `ArrivalDate`, `ArrivalTime`, `BedID`, `VitalsID`, `MedicationID`, `NurseryID`, `PreviousSurgeries`, `Weight`, `Height`, `Class`, `QR_Path`) VALUES
(168164, '2017340646', 906868, '2018-04-25', '10:12 PM', '', 807274, 588653, 0, 'Nothing', '75.00', 150, '', ''),
(180087, '2017396577', 784361, '2018-04-26', '01:25 AM', '412', 214595, 481926, 0, 'Nothing', '75.00', 160, '', 'qr-generator/temp/2017396577.png'),
(189228, '2017340646', 537978, '2018-04-26', '02:47 AM', 'ER', 515764, 120987, 0, 'Nothing', '78.00', 168, '', 'qr-generator/temp/2017340646.png'),
(198059, '2017319597', 123062, '2018-04-22', '01:41 AM', '306-1', 690767, 175276, 0, 'Nothing', '68.00', 165, '', 'qr-generator/temp/2017319597.png'),
(230119, '2017137517', 515927, '2018-05-02', '09:46 PM', '', 875290, 139335, 0, 'na', '66.00', 166, '', 'qr-generator/temp/2017137517.png'),
(253018, '2017429909', 371941, '2018-04-29', '11:25 PM', 'ER', 726694, 364855, 0, 'Nothing', '75.00', 165, '', 'qr-generator/temp/2017429909.png'),
(287446, '2017296688', 291251, '2018-05-02', '10:59 PM', 'ER', 402313, 786117, 0, 'na', '69.00', 169, '', 'qr-generator/temp/2017296688.png'),
(339455, '2017429909', 287640, '2018-04-26', '04:39 PM', '400', 901192, 812701, 0, 'None', '70.00', 160, '', ''),
(340696, '2017429909', 478874, '2018-05-02', '12:31 PM', 'ER', 579122, 246911, 0, 'Nothing', '68.00', 164, '', 'qr-generator/temp/2017429909.png'),
(359506, '2017396577', 175345, '2018-04-26', '02:22 AM', 'ER', 169547, 277647, 0, 'Nothing', '78.00', 164, '', 'qr-generator/temp/2017396577.png'),
(371963, '2017340646', 202611, '2018-04-24', '10:07 PM', '', 605338, 123654, 0, 'Nothing', '60.00', 160, '', ''),
(372192, '2017296688', 506282, '2018-04-26', '04:59 PM', '', 445429, 524888, 0, 'None', '80.00', 170, '', ''),
(381093, '2017340646', 351036, '2018-04-23', '03:55 PM', '306-2', 364875, 0, 0, 'nothing', '40.00', 155, '', ''),
(382284, '2017975723-1', 942568, '2018-04-30', '12:27 AM', 'Infant', 412370, 477330, 0, '', '3.00', 0, '', ''),
(393117, '2017429909', 148068, '2018-04-26', '05:47 PM', '', 514659, 280215, 0, 'None', '70.00', 160, '', ''),
(400204, '2017296688', 918349, '2018-04-26', '04:41 PM', '', 296193, 480239, 0, 'None', '65.00', 167, '', ''),
(417457, '2017975723', 120260, '2018-04-30', '12:20 AM', 'ER', 397206, 480135, 0, 'Nothing', '65.00', 160, '', 'qr-generator/temp/2017975723.png'),
(425305, '2017429909', 626239, '2018-04-26', '04:49 PM', '303-2', 719168, 692886, 0, 'None', '80.00', 160, '', ''),
(455985, '2017429909', 297180, '2018-05-02', '12:24 AM', 'ER', 126399, 573679, 0, 'Nothing', '76.00', 150, '', 'qr-generator/temp/2017429909.png'),
(533909, '2017340646', 863100, '2018-04-23', '11:23 PM', '306-2', 195721, 434035, 0, 'Nothing', '59.00', 168, '', 'qr-generator/temp/2017340646.png'),
(573736, '2017396577', 630654, '2018-04-26', '02:06 AM', 'ER', 477133, 257373, 0, 'Nothing', '75.00', 150, '', 'qr-generator/temp/2017396577.png'),
(632874, '2017396577', 215759, '2018-04-26', '01:42 AM', '412', 183267, 697951, 0, 'Nothing', '75.00', 170, '', 'qr-generator/temp/2017396577.png'),
(638289, '2017340646', 648446, '2018-04-14', '07:56 PM', '306-2', 552407, 329587, 0, 'Nothing', '80.00', 170, '', 'qr-generator/temp/2017340646.png'),
(669930, '2017340646', 637974, '2018-04-25', '10:48 PM', 'ER', 352899, 591822, 0, 'Nothing', '45.00', 160, '', ''),
(670321, '2017340646', 696431, '2018-04-25', '03:07 AM', '', 932501, 321451, 0, 'Nothing', '67.00', 160, '', ''),
(773880, '2017429909', 919388, '2018-05-02', '11:10 PM', 'ER', 360891, 363754, 0, 'na', '66.00', 177, '', 'qr-generator/temp/2017429909.png'),
(819837, '2017340646', 499570, '2018-04-23', '03:45 PM', '306-2', 326194, 0, 0, 'Nothing', '45.00', 160, '', ''),
(829588, '2017975723', 728236, '2018-05-02', '10:34 PM', 'ER', 628782, 167789, 0, 'na', '66.00', 177, '', 'qr-generator/temp/2017975723.png'),
(841819, '2017319597', 317455, '2018-05-02', '11:18 PM', 'ER', 794187, 185824, 0, 'na', '1.00', 0, '', 'qr-generator/temp/2017319597.png'),
(853895, '2017288509', 384835, '2018-04-16', '12:21 AM', '', 662987, 142893, 0, 'Nothing', '78.00', 165, '', ''),
(899312, '2017340646', 590253, '2018-04-14', '03:45 PM', '306-2', 642080, 390399, 0, 'Nothing', '85.00', 175, '', 'qr-generator/temp/2017340646.png'),
(955231, '2017296688', 694072, '2018-05-02', '09:22 PM', '', 687170, 194828, 0, 'na', '66.00', 170, '', 'qr-generator/temp/2017296688.png'),
(961181, '2017396577', 887537, '2018-04-26', '02:34 AM', 'ER', 495715, 387446, 0, 'Nothing', '74.00', 160, '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `medical_details`
--
ALTER TABLE `medical_details`
  ADD PRIMARY KEY (`MedicalID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
