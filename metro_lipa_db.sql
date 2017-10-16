-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 16, 2017 at 12:35 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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
-- Table structure for table `patients`
--

CREATE TABLE `patients` (
  `PatientID` varchar(10) NOT NULL,
  `Type` varchar(10) NOT NULL,
  `AdmissionDateTime` datetime NOT NULL,
  `Fname` varchar(15) NOT NULL,
  `Mname` varchar(15) NOT NULL,
  `Lname` varchar(15) NOT NULL,
  `Gender` varchar(10) NOT NULL,
  `Birthdate` datetime NOT NULL,
  `Address` varchar(30) NOT NULL,
  `CivilStatus` varchar(15) NOT NULL,
  `BirthPlace` varchar(30) NOT NULL,
  `Citizenship` varchar(15) NOT NULL,
  `Nationality` varchar(15) NOT NULL,
  `Religion` varchar(15) NOT NULL,
  `Bloodtype` varchar(10) NOT NULL,
  `Occupation` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `patients`
--

INSERT INTO `patients` (`PatientID`, `Type`, `AdmissionDateTime`, `Fname`, `Mname`, `Lname`, `Gender`, `Birthdate`, `Address`, `CivilStatus`, `BirthPlace`, `Citizenship`, `Nationality`, `Religion`, `Bloodtype`, `Occupation`) VALUES
('2017826931', 'Outpatient', '2017-10-13 16:06:00', 'Juan', 'Del', 'Cruz', '2', '2017-10-13 16:06:00', 'Lipa City', 'Single', 'Lipa City', 'Filipino', 'Filipino', 'Catholic', 'O', 'Manager');

-- --------------------------------------------------------

--
-- Table structure for table `user_account`
--

CREATE TABLE `user_account` (
  `AccountID` varchar(10) NOT NULL,
  `AccessType` varchar(1) NOT NULL,
  `Username` varchar(20) NOT NULL,
  `Password` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_account`
--

INSERT INTO `user_account` (`AccountID`, `AccessType`, `Username`, `Password`) VALUES
('6523550399', '2', 'MissAdmission', '123'),
('9404058394', '0', 'admin', '123');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `patients`
--
ALTER TABLE `patients`
  ADD PRIMARY KEY (`PatientID`);

--
-- Indexes for table `user_account`
--
ALTER TABLE `user_account`
  ADD PRIMARY KEY (`AccountID`),
  ADD UNIQUE KEY `Username` (`Username`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
