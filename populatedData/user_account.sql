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
-- Table structure for table `user_account`
--

CREATE TABLE `user_account` (
  `AccountID` varchar(100) NOT NULL,
  `AccessType` varchar(1) NOT NULL,
  `Passwordd` varchar(100) NOT NULL,
  `hash` varchar(32) NOT NULL,
  `Email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_account`
--

INSERT INTO `user_account` (`AccountID`, `AccessType`, `Passwordd`, `hash`, `Email`) VALUES
('146404', '1', '$2y$10$ckZloJ0urCvSgYP/.t6cLePlZLR/C7i7NMm7vf9pTWhqyh0KZfsuu', '847cc55b7032108eee6dd897f3bca8a5', 'admin@gmail.com'),
('156956', '1', '$2y$10$KwR8PbLrffLEGs3JSkq7IuWsAxv/Q0gDfukVjIWio2oiqbwF7GdXm', 'fc49306d97602c8ed1be1dfbf0835ead', 'giiovanni@gmail.com'),
('292556', '2', '$2y$10$WXd0kGvt2052wAMqSVWdeuWQZqaLFP6W06PX9Xu5buKK9hAcK.3gC', 'd709f38ef758b5066ef31b18039b8ce5', 'admission@gmail.com'),
('352367', '3', '$2y$10$2QIryHcnG4FAjJkVXtDEEOEr2ApY7BeloqDisSXh7WayqrNssaumq', '1f50893f80d6830d62765ffad7721742', 'kendalljenner@gmail.com'),
('422018', '4', '$2y$10$6.geYf9McMRhctgm1LfDPujw73tAebLie5oNvABgelOj7SGOalcD.', 'b2f627fff19fda463cb386442eac2b3d', 'rba@gmail.com'),
('423430', '4', '$2y$10$xQ4rTLLoozUU.Yur3N5rnucc3qzggGvGcd9gD4RTYRmr9SP7o/jzu', '109a0ca3bc27f3e96597370d5c8cf03d', 'RSSilva@gmail.com'),
('426113', '4', '$2y$10$PgQpVSTAh3Z36eZJaXzcvOAMPMc5rnhs8nnkUppNN7KNo2xxRowp.', '82489c9737cc245530c7a6ebef3753ec', 'jmatthewatx.lina@gmail.com'),
('434985', '4', '$2y$10$RCGhVnJy8HBcdB9fSzbk3OwUriD1U7iZZzD9l7cIYhGh9qufmhr5q', '39059724f73a9969845dfe4146c5660e', 'roseangelsbudi@gmail.com'),
('439870', '4', '$2y$10$sVd/jYVcvi0NsKgOx57d0.cnYl079ouXN70M1qP7meZJf3bzDD3YO', 'f457c545a9ded88f18ecee47145a72c0', 'ednadaynmayuga@gmail.com'),
('441283', '4', '$2y$10$CrXpG40836L62jccS21nSeunKiyvizACD8bpIkxfRLZhC3p679MUi', 'e4bb4c5173c2ce17fd8fcd40041c068f', 'bonanodoronavarro@gmail.com'),
('445018', '4', '$2y$10$KjZ9usq.SDfsohIFWDNqfOtkvF5uwhypWKrsI8DMyfUhq/zZp0wE6', '2823f4797102ce1a1aec05359cc16dd9', 'arvinjames123@gmail.com'),
('451763', '4', '$2y$10$q4MUUZdtD8.qEctctx47leu3Ih38wqXuRLvstc1ZX1jraRzI/hkBC', '7d04bbbe5494ae9d2f5a76aa1c00fa2f', 'FperezC@gmail.com'),
('456325', '4', '$2y$10$rALMHQbyTlm6TuvaZ4znRux9yQtY.K2PJJsLRp2G.HJvzoQyQoSPC', '82cec96096d4281b7c95cd7e74623496', 'doctor@gmail.com'),
('498455', '4', '$2y$10$AzHBpXscQPZ3JMM9t5CKIeQzU3JJAOTGztSk/YMwK4Jy0xLGX/IbK', '7380ad8a673226ae47fce7bff88e9c33', 'jmatthewatx.lina@gmail.com'),
('542987', '5', '$2y$10$kS80201Q1RHUS6pVI9wer.S47KfgQFCVLWTePcEiT/qFZnIf8rtOi', '3328bdf9a4b9504b9398284244fe97c2', 'marinez.renzc@gmail.com'),
('699279', '6', '$2y$10$9JyQlIvSRvTGSdXT/ju4reKLWF1TQVo3fVmbJ.b8dTAe2JdwZP1qu', '73278a4a86960eeb576a8fd4c9ec6997', 'jmatthewatx.lina@gmail.com'),
('739062', '7', '$2y$10$YT4oPbjuIWOIemkMvQoRSePnwpXjqHfaquGbVptaZaJVutAMYY6X.', '7f39f8317fbdb1988ef4c628eba02591', 'jmatthewatx.lina@gmail.com'),
('792857', '7', '$2y$10$qTtSmN7zs85zDUhG7hEiIODhCIrocBIdvP4kolLueYhp4n3ZXqiy6', 'f1c1592588411002af340cbaedd6fc33', 'secretary@gmail.com'),
('830454', '8', '$2y$10$dEsTpFqvR79XKOzIXNnhieKR0ZhslIZNgLXykvDQLpWoiwEYFCJsW', '7250eb93b3c18cc9daa29cf58af7a004', 'labtest@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `user_account`
--
ALTER TABLE `user_account`
  ADD PRIMARY KEY (`AccountID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
