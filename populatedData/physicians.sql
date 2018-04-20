-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 19, 2018 at 08:31 AM
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
-- Table structure for table `physicians`
--

CREATE TABLE `physicians` (
  `PhysicianID` int(6) NOT NULL,
  `LastName` varchar(25) NOT NULL,
  `FirstName` varchar(20) NOT NULL,
  `MiddleName` varchar(20) NOT NULL,
  `Gender` varchar(10) NOT NULL,
  `Address` varchar(80) NOT NULL,
  `Contact` varchar(15) NOT NULL,
  `Birthdate` varchar(20) NOT NULL,
  `Specialization` varchar(50) NOT NULL,
  `ProfessionalFee` decimal(15,2) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `pathPhoto` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `physicians`
--

INSERT INTO `physicians` (`PhysicianID`, `LastName`, `FirstName`, `MiddleName`, `Gender`, `Address`, `Contact`, `Birthdate`, `Specialization`, `ProfessionalFee`, `Email`, `pathPhoto`) VALUES
(422018, 'Atienza', 'Rico', 'Bautista', 'Male', 'Lipa City Batangas', '', '08/25/1961', 'Surgeon', '0.00', 'rba@gmail.com', ''),
(423430, 'Silva', 'Romeo', 'Siy', 'Male', 'Lipa City Batangas', '', '06/20/1984', 'Internal Medicine', '0.00', 'RSSilva@gmail.com', ''),
(426113, 'Villanueva', 'Renz', 'Marinez', 'Male', 'Lipa City', '', '06/17/1998', 'Orthopedic', '0.00', 'jmatthewatx.lina@gmail.com', ''),
(434985, 'Subido', 'Rose', 'Angel', 'Female', 'Lipa City Batangas', '', '06/25/1970', 'Dentist ', '0.00', 'roseangelsbudi@gmail.com', ''),
(439870, 'Dimayuga', 'Edna', 'Dyann', 'Female', 'Lipa City Batangas', '', '07/12/1984', 'Cardiac', '0.00', 'ednadaynmayuga@gmail.com', ''),
(441283, 'Navarro', 'Bonan', 'Odoro', 'Male', 'Lipa City Batangas', '', '07/18/1984', 'Endocrinologist', '0.00', 'bonanodoronavarro@gmail.com', ''),
(445018, 'Desipeda', 'Arvin', 'James', 'Male', 'Lipa City Batangas', '', '07/26/1975', 'Anesthesiologists ', '0.00', 'arvinjames123@gmail.com', ''),
(451763, 'Cuyos', 'Fernando', 'Perez', 'Male', 'Lipa City Batangas', '', '12/24/1976', 'Neuro-surgeon ', '0.00', 'FperezC@gmail.com', ''),
(456325, 'Rizal', 'Jose', 'Mercado', 'Male', 'Santa Rosa Calamba', '639175669856', '12-02-21', 'Diabetologist', '500.00', 'jose@gmail.com', 'uploads/4563255abcaf828e6fb.jpg'),
(498455, 'Lina', 'Jed', 'Matthew', 'Male', 'Lipa City', '', '07/19/1995', 'Diabetologist ', '0.00', 'jmatthewatx.lina@gmail.com', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `physicians`
--
ALTER TABLE `physicians`
  ADD PRIMARY KEY (`PhysicianID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
