-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 23, 2022 at 11:33 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `phptrials-smartmedi`
--

-- --------------------------------------------------------

--
-- Table structure for table `patients`
--

CREATE TABLE `patients` (
  `ID` int(11) NOT NULL,
  `FirstName` varchar(255) NOT NULL,
  `LastName` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `TelNo` varchar(255) NOT NULL,
  `IDNo` int(11) NOT NULL,
  `DOB` date NOT NULL,
  `gender` varchar(20) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `patients`
--

INSERT INTO `patients` (`ID`, `FirstName`, `LastName`, `username`, `TelNo`, `IDNo`, `DOB`, `gender`, `email`, `password`) VALUES
(4, '', '', 'wanja', '738497366', 683048723, '1999-08-12', '', 'wanja@yahoo.com', 'fcf613bb97eda9c59956c4ddfeb0426e'),
(5, '', '', 'wairimu', '378938465628', 374850773, '1992-07-19', '', 'wairimu@yahoo.com', 'd7bd55438649c87b5994c50737cd83b2'),
(6, '', '', 'farida', '', 0, '0000-00-00', '', 'farida@yahoo.com', '41a6a36598a0acd0d0c3aac95edc7b35'),
(7, '', '', 'rehema', '', 0, '0000-00-00', '', 'rehema@yahoo.com', '5eaf0467a7fdc9fe2a16b9b8a8fd8b4a'),
(8, '', '', 'fatuma', '', 0, '0000-00-00', '', 'fatuma@yahoo.com', 'e1383fab8950a059a5627c398f2ec590'),
(14, '', '', 'imran', '', 0, '0000-00-00', '', 'imran@yahoo.com', 'e18fdc9fa7cc2b5f4e497d21a48ea3b7'),
(15, 'Ashraf', 'Aringo', 'sharaf', '947463844083', 2147483647, '2022-10-06', 'Male', 'sharaf@yahoo.com', '508924b0eac2ba101ada28841c931e44');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `patients`
--
ALTER TABLE `patients`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `patients`
--
ALTER TABLE `patients`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
