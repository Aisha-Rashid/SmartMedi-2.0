-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 23, 2022 at 11:17 AM
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
-- Database: `db_contact`
--
CREATE DATABASE IF NOT EXISTS `db_contact` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `db_contact`;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_contact`
--

CREATE TABLE `tbl_contact` (
  `id` int(11) NOT NULL,
  `fldName` int(50) NOT NULL,
  `fldEmail` int(150) NOT NULL,
  `fldPhone` varchar(15) NOT NULL,
  `fldMessage` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_contact`
--

INSERT INTO `tbl_contact` (`id`, `fldName`, `fldEmail`, `fldPhone`, `fldMessage`) VALUES
(1, 0, 0, '0703275829', 'Hello'),
(2, 0, 0, '0579337829', 'try2');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_contact`
--
ALTER TABLE `tbl_contact`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_contact`
--
ALTER TABLE `tbl_contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Database: `ehr_database2`
--
CREATE DATABASE IF NOT EXISTS `ehr_database2` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `ehr_database2`;

-- --------------------------------------------------------

--
-- Table structure for table `patientdetails`
--

CREATE TABLE `patientdetails` (
  `RoleID` int(50) NOT NULL,
  `IDNumber` int(50) NOT NULL,
  `FirstName` varchar(150) NOT NULL,
  `LastName` varchar(150) NOT NULL,
  `GenderID` int(50) NOT NULL,
  `DateOfBirth` date NOT NULL,
  `InsuranceID` int(50) NOT NULL,
  `MemberNo` int(50) NOT NULL,
  `Occupation` varchar(150) NOT NULL,
  `CountyID` int(50) NOT NULL,
  `TelNo` varchar(150) NOT NULL,
  `Email` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `patientdetails`
--
ALTER TABLE `patientdetails`
  ADD PRIMARY KEY (`IDNumber`);
--
-- Database: `ehr_databasereview`
--
CREATE DATABASE IF NOT EXISTS `ehr_databasereview` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `ehr_databasereview`;

-- --------------------------------------------------------

--
-- Table structure for table `admindetails`
--

CREATE TABLE `admindetails` (
  `AdminID` int(11) NOT NULL,
  `FirstName` varchar(100) NOT NULL,
  `LastName` varchar(100) NOT NULL,
  `DesignationID` int(11) NOT NULL,
  `TelNo` varchar(100) NOT NULL,
  `Email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `county`
--

CREATE TABLE `county` (
  `CountyID` int(11) NOT NULL,
  `CountyName` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `designationtable`
--

CREATE TABLE `designationtable` (
  `DesignationID` int(11) NOT NULL,
  `DesignationName` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `doctordetails`
--

CREATE TABLE `doctordetails` (
  `RoleID` int(11) NOT NULL,
  `DocID` int(11) NOT NULL,
  `FirstName` varchar(100) NOT NULL,
  `LastName` varchar(100) NOT NULL,
  `GenderID` int(11) NOT NULL,
  `HospitalID` int(11) NOT NULL,
  `TelNo` varchar(100) NOT NULL,
  `Email` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `gendertable`
--

CREATE TABLE `gendertable` (
  `GenderID` int(11) NOT NULL,
  `GenderName` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `gendertable`
--

INSERT INTO `gendertable` (`GenderID`, `GenderName`) VALUES
(1, 'Male'),
(2, 'Female');

-- --------------------------------------------------------

--
-- Table structure for table `hospitaldetails`
--

CREATE TABLE `hospitaldetails` (
  `HospitalID` int(11) NOT NULL,
  `HospitalName` varchar(300) NOT NULL,
  `BranchName` varchar(255) NOT NULL,
  `CountyID` int(11) NOT NULL,
  `TelNo` varchar(100) NOT NULL,
  `PostalCode` varchar(100) NOT NULL,
  `Town` varchar(100) NOT NULL,
  `Email` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `insurancetable`
--

CREATE TABLE `insurancetable` (
  `InsurerID` int(11) NOT NULL,
  `InsuranceType` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `medicaldetails`
--

CREATE TABLE `medicaldetails` (
  `PatientID` int(11) NOT NULL,
  `QuestionNo` int(11) NOT NULL,
  `ResponseID` int(11) NOT NULL,
  `OtherDetails` varchar(900) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `occupationtable`
--

CREATE TABLE `occupationtable` (
  `OccupationID` int(11) NOT NULL,
  `OccupationName` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `package`
--

CREATE TABLE `package` (
  `packageID` int(11) NOT NULL,
  `packageName` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `package`
--

INSERT INTO `package` (`packageID`, `packageName`) VALUES
(1, 'Silver'),
(2, 'Platinum');

-- --------------------------------------------------------

--
-- Table structure for table `patientdetails`
--

CREATE TABLE `patientdetails` (
  `RoleID` int(11) NOT NULL,
  `IDNo` int(11) NOT NULL,
  `packageID` int(11) NOT NULL,
  `FirstName` varchar(100) NOT NULL,
  `LastName` varchar(100) NOT NULL,
  `GenderID` int(11) NOT NULL,
  `DOB` date NOT NULL,
  `InsuranceID` int(11) NOT NULL,
  `OccupationID` int(11) NOT NULL,
  `CountyID` int(11) NOT NULL,
  `TelNo` varchar(100) NOT NULL,
  `Email` varchar(100) DEFAULT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `responsetable`
--

CREATE TABLE `responsetable` (
  `ResponseID` int(11) NOT NULL,
  `ResponseValue` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `roletable`
--

CREATE TABLE `roletable` (
  `RoleID` int(11) NOT NULL,
  `RoleName` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `roletable`
--

INSERT INTO `roletable` (`RoleID`, `RoleName`) VALUES
(1, 'Patient - Silver Package'),
(2, 'Patient - Gold Package'),
(3, 'Medical Practitioner');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admindetails`
--
ALTER TABLE `admindetails`
  ADD PRIMARY KEY (`AdminID`),
  ADD UNIQUE KEY `DesignationID_2` (`DesignationID`),
  ADD KEY `DesignationID` (`DesignationID`),
  ADD KEY `DesignationID_3` (`DesignationID`);

--
-- Indexes for table `county`
--
ALTER TABLE `county`
  ADD PRIMARY KEY (`CountyID`);

--
-- Indexes for table `designationtable`
--
ALTER TABLE `designationtable`
  ADD PRIMARY KEY (`DesignationID`);

--
-- Indexes for table `doctordetails`
--
ALTER TABLE `doctordetails`
  ADD PRIMARY KEY (`DocID`),
  ADD KEY `RoleID` (`RoleID`),
  ADD KEY `RoleID_2` (`RoleID`),
  ADD KEY `GenderID` (`GenderID`),
  ADD KEY `HospitalID` (`HospitalID`);

--
-- Indexes for table `gendertable`
--
ALTER TABLE `gendertable`
  ADD PRIMARY KEY (`GenderID`);

--
-- Indexes for table `hospitaldetails`
--
ALTER TABLE `hospitaldetails`
  ADD PRIMARY KEY (`HospitalID`),
  ADD KEY `CountyID` (`CountyID`);

--
-- Indexes for table `insurancetable`
--
ALTER TABLE `insurancetable`
  ADD PRIMARY KEY (`InsurerID`);

--
-- Indexes for table `medicaldetails`
--
ALTER TABLE `medicaldetails`
  ADD PRIMARY KEY (`QuestionNo`),
  ADD KEY `PatientID` (`PatientID`),
  ADD KEY `ResponseID` (`ResponseID`);

--
-- Indexes for table `occupationtable`
--
ALTER TABLE `occupationtable`
  ADD PRIMARY KEY (`OccupationID`);

--
-- Indexes for table `package`
--
ALTER TABLE `package`
  ADD PRIMARY KEY (`packageID`);

--
-- Indexes for table `patientdetails`
--
ALTER TABLE `patientdetails`
  ADD PRIMARY KEY (`IDNo`),
  ADD KEY `RoleID` (`RoleID`),
  ADD KEY `GenderID` (`GenderID`),
  ADD KEY `InsuranceID` (`InsuranceID`),
  ADD KEY `OccupationID` (`OccupationID`),
  ADD KEY `CountyID` (`CountyID`),
  ADD KEY `packageID` (`packageID`);

--
-- Indexes for table `responsetable`
--
ALTER TABLE `responsetable`
  ADD PRIMARY KEY (`ResponseID`);

--
-- Indexes for table `roletable`
--
ALTER TABLE `roletable`
  ADD PRIMARY KEY (`RoleID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `county`
--
ALTER TABLE `county`
  MODIFY `CountyID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `designationtable`
--
ALTER TABLE `designationtable`
  MODIFY `DesignationID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gendertable`
--
ALTER TABLE `gendertable`
  MODIFY `GenderID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `insurancetable`
--
ALTER TABLE `insurancetable`
  MODIFY `InsurerID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `occupationtable`
--
ALTER TABLE `occupationtable`
  MODIFY `OccupationID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `package`
--
ALTER TABLE `package`
  MODIFY `packageID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `responsetable`
--
ALTER TABLE `responsetable`
  MODIFY `ResponseID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roletable`
--
ALTER TABLE `roletable`
  MODIFY `RoleID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `admindetails`
--
ALTER TABLE `admindetails`
  ADD CONSTRAINT `admindetails_ibfk_1` FOREIGN KEY (`DesignationID`) REFERENCES `designationtable` (`DesignationID`) ON UPDATE CASCADE;

--
-- Constraints for table `doctordetails`
--
ALTER TABLE `doctordetails`
  ADD CONSTRAINT `doctordetails_ibfk_1` FOREIGN KEY (`GenderID`) REFERENCES `gendertable` (`GenderID`),
  ADD CONSTRAINT `doctordetails_ibfk_2` FOREIGN KEY (`HospitalID`) REFERENCES `hospitaldetails` (`HospitalID`) ON UPDATE CASCADE,
  ADD CONSTRAINT `doctordetails_ibfk_3` FOREIGN KEY (`RoleID`) REFERENCES `roletable` (`RoleID`) ON UPDATE CASCADE;

--
-- Constraints for table `hospitaldetails`
--
ALTER TABLE `hospitaldetails`
  ADD CONSTRAINT `hospitaldetails_ibfk_1` FOREIGN KEY (`CountyID`) REFERENCES `county` (`CountyID`) ON UPDATE CASCADE;

--
-- Constraints for table `medicaldetails`
--
ALTER TABLE `medicaldetails`
  ADD CONSTRAINT `medicaldetails_ibfk_1` FOREIGN KEY (`PatientID`) REFERENCES `patientdetails` (`IDNo`) ON UPDATE CASCADE,
  ADD CONSTRAINT `medicaldetails_ibfk_2` FOREIGN KEY (`ResponseID`) REFERENCES `responsetable` (`ResponseID`) ON UPDATE CASCADE;

--
-- Constraints for table `patientdetails`
--
ALTER TABLE `patientdetails`
  ADD CONSTRAINT `patientdetails_ibfk_1` FOREIGN KEY (`CountyID`) REFERENCES `county` (`CountyID`) ON UPDATE CASCADE,
  ADD CONSTRAINT `patientdetails_ibfk_2` FOREIGN KEY (`GenderID`) REFERENCES `gendertable` (`GenderID`),
  ADD CONSTRAINT `patientdetails_ibfk_3` FOREIGN KEY (`InsuranceID`) REFERENCES `insurancetable` (`InsurerID`) ON UPDATE CASCADE,
  ADD CONSTRAINT `patientdetails_ibfk_4` FOREIGN KEY (`OccupationID`) REFERENCES `occupationtable` (`OccupationID`) ON UPDATE CASCADE,
  ADD CONSTRAINT `patientdetails_ibfk_5` FOREIGN KEY (`RoleID`) REFERENCES `roletable` (`RoleID`) ON UPDATE CASCADE,
  ADD CONSTRAINT `patientdetails_ibfk_6` FOREIGN KEY (`packageID`) REFERENCES `package` (`packageID`) ON UPDATE CASCADE;
--
-- Database: `hospital`
--
CREATE DATABASE IF NOT EXISTS `hospital` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `hospital`;

-- --------------------------------------------------------

--
-- Table structure for table `doctor`
--

CREATE TABLE `doctor` (
  `doctorId` int(255) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `Email` varchar(999) NOT NULL,
  `Telephone` int(255) NOT NULL,
  `Age` date NOT NULL,
  `Gender` varchar(999) NOT NULL,
  `Image` varchar(999) NOT NULL,
  `HospitalName` varchar(999) NOT NULL,
  `hospitalId` int(255) NOT NULL,
  `TIMESTAMP` timestamp(6) NOT NULL DEFAULT current_timestamp(6) ON UPDATE current_timestamp(6)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `doctor`
--

INSERT INTO `doctor` (`doctorId`, `Name`, `Email`, `Telephone`, `Age`, `Gender`, `Image`, `HospitalName`, `hospitalId`, `TIMESTAMP`) VALUES
(1, '0', 'bayaa@bayaa.com', 714545222, '2014-04-02', 'Male', 'http://localhost/visit_hospital/Images/IMG-20200727-WA0007.jpg', '0', 0, '2022-04-04 08:46:11.035070'),
(2, '0', 'bayaa@bayaa.com', 714545222, '2022-04-05', 'Male', 'http://localhost/visit_hospital/Images/IMG-20200707-WA0000.jpg', '1', 0, '2022-04-04 08:51:11.457897'),
(3, 'Bayaa', 'bayaa@bayaa.com', 714545222, '2022-04-05', 'Male', 'http://localhost/visit_hospital/Images/IMG-20200707-WA0000.jpg', '\n                             westieagha khancoast general2 Not in Database', 2, '2022-04-04 09:12:22.952633'),
(4, 'Bayaa', 'bayaa@bayaa.com', 714545222, '2022-04-19', 'Male', 'http://localhost/visit_hospital/Images/IMG-20200721-WA0000.jpg', '[object Object]', 2, '2022-04-04 09:13:16.236677'),
(5, 'peter', 'peter@peter.com', 71454688, '2022-04-06', 'Male', 'http://localhost/visit_hospital/Images/IMG-20201103-WA0004.jpg', 'coast general', 3, '2022-04-04 09:29:56.324266');

-- --------------------------------------------------------

--
-- Table structure for table `hospital`
--

CREATE TABLE `hospital` (
  `hospitalId` int(255) NOT NULL,
  `Name` varchar(999) NOT NULL,
  `Email` varchar(999) NOT NULL,
  `Telephone` int(255) NOT NULL,
  `Address` varchar(999) NOT NULL,
  `Image` varchar(999) NOT NULL,
  `TIMESTAMP` timestamp(6) NOT NULL DEFAULT current_timestamp(6) ON UPDATE current_timestamp(6)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hospital`
--

INSERT INTO `hospital` (`hospitalId`, `Name`, `Email`, `Telephone`, `Address`, `Image`, `TIMESTAMP`) VALUES
(1, 'westie', 'westie@westie.com', 714789652, 'westie', 'http://localhost/visit_hospital/Images/IMG-20200722-WA0000.jpg', '2022-04-04 08:14:42.625673'),
(2, 'agha khan', 'agha@khan.com', 715468999, 'mombasa', 'http://localhost/visit_hospital/Images/IMG-20200812-WA0005.jpg', '2022-04-04 08:17:19.620447'),
(3, 'coast general', 'coast@coast.com', 714545422, 'mombasa', 'http://localhost/visit_hospital/Images/IMG-20200904-WA0000.jpg', '2022-04-04 08:19:27.017755');

-- --------------------------------------------------------

--
-- Table structure for table `package`
--

CREATE TABLE `package` (
  `packageId` int(255) NOT NULL,
  `Email` varchar(999) NOT NULL,
  `Package` varchar(999) NOT NULL,
  `TIMESTAMP` timestamp(6) NOT NULL DEFAULT current_timestamp(6) ON UPDATE current_timestamp(6)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `records`
--

CREATE TABLE `records` (
  `recordsId` int(255) NOT NULL,
  `hospitalId` int(255) NOT NULL,
  `Email` varchar(999) NOT NULL,
  `HospitalName` varchar(999) NOT NULL,
  `DoctorName` varchar(999) NOT NULL,
  `Sickness` varchar(999) NOT NULL,
  `Symptoms` text NOT NULL,
  `Medicine` varchar(999) NOT NULL,
  `Treatment` text NOT NULL,
  `TIMESTAMP` timestamp(6) NOT NULL DEFAULT current_timestamp(6) ON UPDATE current_timestamp(6)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `usersId` int(255) NOT NULL,
  `Name` varchar(999) NOT NULL,
  `Age` date NOT NULL,
  `Image` varchar(999) NOT NULL,
  `Email` varchar(999) NOT NULL,
  `Telephone` int(255) NOT NULL,
  `Password` varchar(999) NOT NULL,
  `Gender` varchar(999) NOT NULL,
  `TIMESTAMP` timestamp(6) NOT NULL DEFAULT current_timestamp(6) ON UPDATE current_timestamp(6)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`usersId`, `Name`, `Age`, `Image`, `Email`, `Telephone`, `Password`, `Gender`, `TIMESTAMP`) VALUES
(1, 'aisha, aisha', '2012-03-07', 'http://localhost/visit_hospital/Images/Screenshot (1).png', 'aisha@aisha.com', 712345678, 'aisha', 'Female', '2022-03-30 15:04:50.109131');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `doctor`
--
ALTER TABLE `doctor`
  ADD PRIMARY KEY (`doctorId`);

--
-- Indexes for table `hospital`
--
ALTER TABLE `hospital`
  ADD PRIMARY KEY (`hospitalId`);

--
-- Indexes for table `package`
--
ALTER TABLE `package`
  ADD PRIMARY KEY (`packageId`);

--
-- Indexes for table `records`
--
ALTER TABLE `records`
  ADD PRIMARY KEY (`recordsId`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`usersId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `doctor`
--
ALTER TABLE `doctor`
  MODIFY `doctorId` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `hospital`
--
ALTER TABLE `hospital`
  MODIFY `hospitalId` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `package`
--
ALTER TABLE `package`
  MODIFY `packageId` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `records`
--
ALTER TABLE `records`
  MODIFY `recordsId` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `usersId` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Database: `hospital2`
--
CREATE DATABASE IF NOT EXISTS `hospital2` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `hospital2`;

-- --------------------------------------------------------

--
-- Table structure for table `doctor`
--

CREATE TABLE `doctor` (
  `doctorId` int(255) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `Email` varchar(999) NOT NULL,
  `Telephone` int(255) NOT NULL,
  `Age` date NOT NULL,
  `Gender` varchar(999) NOT NULL,
  `Image` varchar(999) NOT NULL,
  `HospitalName` varchar(999) NOT NULL,
  `hospitalId` int(255) NOT NULL,
  `TIMESTAMP` timestamp(6) NOT NULL DEFAULT current_timestamp(6) ON UPDATE current_timestamp(6)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `doctor`
--

INSERT INTO `doctor` (`doctorId`, `Name`, `Email`, `Telephone`, `Age`, `Gender`, `Image`, `HospitalName`, `hospitalId`, `TIMESTAMP`) VALUES
(3, 'Bayaa', 'bayaa@bayaa.com', 714545222, '2022-04-05', 'Male', 'http://localhost/visit_hospital/Images/IMG-20200707-WA0000.jpg', '\n                             westieagha khancoast general2 Not in Database', 2, '2022-04-04 09:12:22.952633'),
(4, 'Bayaa', 'bayaa@bayaa.com', 714545222, '2022-04-19', 'Male', 'http://localhost/visit_hospital/Images/IMG-20200721-WA0000.jpg', '[object Object]', 2, '2022-04-04 09:13:16.236677'),
(5, 'peter', 'peter@peter.com', 71454688, '2022-04-06', 'Male', 'http://localhost/visit_hospital/Images/IMG-20201103-WA0004.jpg', 'coast general', 3, '2022-04-04 09:29:56.324266');

-- --------------------------------------------------------

--
-- Table structure for table `hospital`
--

CREATE TABLE `hospital` (
  `hospitalId` int(255) NOT NULL,
  `Name` varchar(999) NOT NULL,
  `Email` varchar(999) NOT NULL,
  `Telephone` int(255) NOT NULL,
  `Address` varchar(999) NOT NULL,
  `Image` varchar(999) NOT NULL,
  `TIMESTAMP` timestamp(6) NOT NULL DEFAULT current_timestamp(6) ON UPDATE current_timestamp(6)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hospital`
--

INSERT INTO `hospital` (`hospitalId`, `Name`, `Email`, `Telephone`, `Address`, `Image`, `TIMESTAMP`) VALUES
(1, 'westie', 'westie@westie.com', 714789652, 'westie', 'http://localhost/visit_hospital/Images/IMG-20200722-WA0000.jpg', '2022-04-04 08:14:42.625673'),
(2, 'agha khan', 'agha@khan.com', 715468999, 'mombasa', 'http://localhost/visit_hospital/Images/IMG-20200812-WA0005.jpg', '2022-04-04 08:17:19.620447'),
(3, 'coast general', 'coast@coast.com', 714545422, 'mombasa', 'http://localhost/visit_hospital/Images/IMG-20200904-WA0000.jpg', '2022-04-04 08:19:27.017755');

-- --------------------------------------------------------

--
-- Table structure for table `package`
--

CREATE TABLE `package` (
  `packageId` int(255) NOT NULL,
  `Email` varchar(999) NOT NULL,
  `Package` varchar(999) NOT NULL,
  `TIMESTAMP` timestamp(6) NOT NULL DEFAULT current_timestamp(6) ON UPDATE current_timestamp(6)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `package`
--

INSERT INTO `package` (`packageId`, `Email`, `Package`, `TIMESTAMP`) VALUES
(1, 'test@test.com', 'SILVER', '2022-04-08 12:15:05.741112');

-- --------------------------------------------------------

--
-- Table structure for table `records`
--

CREATE TABLE `records` (
  `recordsId` int(255) NOT NULL,
  `hospitalId` int(255) NOT NULL,
  `doctorId` int(255) NOT NULL,
  `Email` varchar(999) NOT NULL,
  `HospitalName` varchar(999) NOT NULL,
  `DoctorName` varchar(999) NOT NULL,
  `Sickness` varchar(999) NOT NULL,
  `Symptoms` text NOT NULL,
  `Medicine` varchar(999) NOT NULL,
  `Treatment` text NOT NULL,
  `Image` varchar(999) NOT NULL,
  `TIMESTAMP` timestamp(6) NOT NULL DEFAULT current_timestamp(6) ON UPDATE current_timestamp(6)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `usersId` int(255) NOT NULL,
  `Name` varchar(999) NOT NULL,
  `Age` date NOT NULL,
  `Image` varchar(999) NOT NULL,
  `Email` varchar(999) NOT NULL,
  `Telephone` varchar(255) NOT NULL,
  `Password` varchar(999) NOT NULL,
  `Gender` varchar(999) NOT NULL,
  `TIMESTAMP` timestamp(6) NOT NULL DEFAULT current_timestamp(6) ON UPDATE current_timestamp(6)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`usersId`, `Name`, `Age`, `Image`, `Email`, `Telephone`, `Password`, `Gender`, `TIMESTAMP`) VALUES
(1, 'aisha, aisha', '2012-03-07', 'http://localhost/visit_hospital/Images/Screenshot (1).png', 'aisha@aisha.com', '712345678', 'aisha', 'Female', '2022-03-30 15:04:50.109131'),
(2, 'test, test', '2016-04-01', 'http://localhost/visit_hospital/Images/IMG-20200816-WA0003.jpg', 'test@test.com', '254717323852', 'test', 'Male', '2022-04-08 10:56:30.526215');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `doctor`
--
ALTER TABLE `doctor`
  ADD PRIMARY KEY (`doctorId`);

--
-- Indexes for table `hospital`
--
ALTER TABLE `hospital`
  ADD PRIMARY KEY (`hospitalId`);

--
-- Indexes for table `package`
--
ALTER TABLE `package`
  ADD PRIMARY KEY (`packageId`);

--
-- Indexes for table `records`
--
ALTER TABLE `records`
  ADD PRIMARY KEY (`recordsId`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`usersId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `doctor`
--
ALTER TABLE `doctor`
  MODIFY `doctorId` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `hospital`
--
ALTER TABLE `hospital`
  MODIFY `hospitalId` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `package`
--
ALTER TABLE `package`
  MODIFY `packageId` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `records`
--
ALTER TABLE `records`
  MODIFY `recordsId` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `usersId` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Database: `phpmyadmin`
--
CREATE DATABASE IF NOT EXISTS `phpmyadmin` DEFAULT CHARACTER SET utf8 COLLATE utf8_bin;
USE `phpmyadmin`;

-- --------------------------------------------------------

--
-- Table structure for table `pma__bookmark`
--

CREATE TABLE `pma__bookmark` (
  `id` int(10) UNSIGNED NOT NULL,
  `dbase` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `user` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `label` varchar(255) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `query` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Bookmarks';

-- --------------------------------------------------------

--
-- Table structure for table `pma__central_columns`
--

CREATE TABLE `pma__central_columns` (
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `col_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `col_type` varchar(64) COLLATE utf8_bin NOT NULL,
  `col_length` text COLLATE utf8_bin DEFAULT NULL,
  `col_collation` varchar(64) COLLATE utf8_bin NOT NULL,
  `col_isNull` tinyint(1) NOT NULL,
  `col_extra` varchar(255) COLLATE utf8_bin DEFAULT '',
  `col_default` text COLLATE utf8_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Central list of columns';

-- --------------------------------------------------------

--
-- Table structure for table `pma__column_info`
--

CREATE TABLE `pma__column_info` (
  `id` int(5) UNSIGNED NOT NULL,
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `column_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `comment` varchar(255) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `mimetype` varchar(255) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `transformation` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `transformation_options` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `input_transformation` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `input_transformation_options` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Column information for phpMyAdmin';

-- --------------------------------------------------------

--
-- Table structure for table `pma__designer_settings`
--

CREATE TABLE `pma__designer_settings` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `settings_data` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Settings related to Designer';

--
-- Dumping data for table `pma__designer_settings`
--

INSERT INTO `pma__designer_settings` (`username`, `settings_data`) VALUES
('root', '{\"snap_to_grid\":\"off\",\"angular_direct\":\"angular\",\"relation_lines\":\"true\",\"pin_text\":\"false\",\"full_screen\":\"off\",\"small_big_all\":\">\"}');

-- --------------------------------------------------------

--
-- Table structure for table `pma__export_templates`
--

CREATE TABLE `pma__export_templates` (
  `id` int(5) UNSIGNED NOT NULL,
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `export_type` varchar(10) COLLATE utf8_bin NOT NULL,
  `template_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `template_data` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Saved export templates';

--
-- Dumping data for table `pma__export_templates`
--

INSERT INTO `pma__export_templates` (`id`, `username`, `export_type`, `template_name`, `template_data`) VALUES
(1, 'root', 'server', 'Smartmedireview', '{\"quick_or_custom\":\"quick\",\"what\":\"sql\",\"db_select[]\":[\"db_contact\",\"ehr_database2\",\"ehr_databasereview\",\"hospital\",\"hospital2\",\"phpmyadmin\",\"test\",\"test_db\"],\"aliases_new\":\"\",\"output_format\":\"sendit\",\"filename_template\":\"@SERVER@\",\"remember_template\":\"on\",\"charset\":\"utf-8\",\"compression\":\"none\",\"maxsize\":\"\",\"codegen_structure_or_data\":\"data\",\"codegen_format\":\"0\",\"csv_separator\":\",\",\"csv_enclosed\":\"\\\"\",\"csv_escaped\":\"\\\"\",\"csv_terminated\":\"AUTO\",\"csv_null\":\"NULL\",\"csv_structure_or_data\":\"data\",\"excel_null\":\"NULL\",\"excel_columns\":\"something\",\"excel_edition\":\"win\",\"excel_structure_or_data\":\"data\",\"json_structure_or_data\":\"data\",\"json_unicode\":\"something\",\"latex_caption\":\"something\",\"latex_structure_or_data\":\"structure_and_data\",\"latex_structure_caption\":\"Structure of table @TABLE@\",\"latex_structure_continued_caption\":\"Structure of table @TABLE@ (continued)\",\"latex_structure_label\":\"tab:@TABLE@-structure\",\"latex_relation\":\"something\",\"latex_comments\":\"something\",\"latex_mime\":\"something\",\"latex_columns\":\"something\",\"latex_data_caption\":\"Content of table @TABLE@\",\"latex_data_continued_caption\":\"Content of table @TABLE@ (continued)\",\"latex_data_label\":\"tab:@TABLE@-data\",\"latex_null\":\"\\\\textit{NULL}\",\"mediawiki_structure_or_data\":\"data\",\"mediawiki_caption\":\"something\",\"mediawiki_headers\":\"something\",\"htmlword_structure_or_data\":\"structure_and_data\",\"htmlword_null\":\"NULL\",\"ods_null\":\"NULL\",\"ods_structure_or_data\":\"data\",\"odt_structure_or_data\":\"structure_and_data\",\"odt_relation\":\"something\",\"odt_comments\":\"something\",\"odt_mime\":\"something\",\"odt_columns\":\"something\",\"odt_null\":\"NULL\",\"pdf_report_title\":\"\",\"pdf_structure_or_data\":\"data\",\"phparray_structure_or_data\":\"data\",\"sql_include_comments\":\"something\",\"sql_header_comment\":\"\",\"sql_use_transaction\":\"something\",\"sql_compatibility\":\"NONE\",\"sql_structure_or_data\":\"structure_and_data\",\"sql_create_table\":\"something\",\"sql_auto_increment\":\"something\",\"sql_create_view\":\"something\",\"sql_create_trigger\":\"something\",\"sql_backquotes\":\"something\",\"sql_type\":\"INSERT\",\"sql_insert_syntax\":\"both\",\"sql_max_query_size\":\"50000\",\"sql_hex_for_binary\":\"something\",\"sql_utc_time\":\"something\",\"texytext_structure_or_data\":\"structure_and_data\",\"texytext_null\":\"NULL\",\"yaml_structure_or_data\":\"data\",\"\":null,\"as_separate_files\":null,\"csv_removeCRLF\":null,\"csv_columns\":null,\"excel_removeCRLF\":null,\"json_pretty_print\":null,\"htmlword_columns\":null,\"ods_columns\":null,\"sql_dates\":null,\"sql_relation\":null,\"sql_mime\":null,\"sql_disable_fk\":null,\"sql_views_as_tables\":null,\"sql_metadata\":null,\"sql_drop_database\":null,\"sql_drop_table\":null,\"sql_if_not_exists\":null,\"sql_simple_view_export\":null,\"sql_view_current_user\":null,\"sql_or_replace_view\":null,\"sql_procedure_function\":null,\"sql_truncate\":null,\"sql_delayed\":null,\"sql_ignore\":null,\"texytext_columns\":null}');

-- --------------------------------------------------------

--
-- Table structure for table `pma__favorite`
--

CREATE TABLE `pma__favorite` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `tables` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Favorite tables';

-- --------------------------------------------------------

--
-- Table structure for table `pma__history`
--

CREATE TABLE `pma__history` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `db` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `table` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `timevalue` timestamp NOT NULL DEFAULT current_timestamp(),
  `sqlquery` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='SQL history for phpMyAdmin';

-- --------------------------------------------------------

--
-- Table structure for table `pma__navigationhiding`
--

CREATE TABLE `pma__navigationhiding` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `item_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `item_type` varchar(64) COLLATE utf8_bin NOT NULL,
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Hidden items of navigation tree';

-- --------------------------------------------------------

--
-- Table structure for table `pma__pdf_pages`
--

CREATE TABLE `pma__pdf_pages` (
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `page_nr` int(10) UNSIGNED NOT NULL,
  `page_descr` varchar(50) CHARACTER SET utf8 NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='PDF relation pages for phpMyAdmin';

--
-- Dumping data for table `pma__pdf_pages`
--

INSERT INTO `pma__pdf_pages` (`db_name`, `page_nr`, `page_descr`) VALUES
('ehr_databasereview', 1, 'EHR_View');

-- --------------------------------------------------------

--
-- Table structure for table `pma__recent`
--

CREATE TABLE `pma__recent` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `tables` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Recently accessed tables';

--
-- Dumping data for table `pma__recent`
--

INSERT INTO `pma__recent` (`username`, `tables`) VALUES
('root', '[{\"db\":\"phptrials-smartmedi\",\"table\":\"patients\"},{\"db\":\"ehr_databasereview\",\"table\":\"responsetable\"},{\"db\":\"ehr_databasereview\",\"table\":\"county\"},{\"db\":\"staff\",\"table\":\"users\"},{\"db\":\"staff\",\"table\":\"college\"},{\"db\":\"ehr_database2\",\"table\":\"patientdetails\"},{\"db\":\"ehr_databasereview\",\"table\":\"patientdetails\"},{\"db\":\"ehr_databasereview\",\"table\":\"admindetails\"},{\"db\":\"ehr_databasereview\",\"table\":\"occupationtable\"},{\"db\":\"ehr_databasereview\",\"table\":\"gendertable\"}]');

-- --------------------------------------------------------

--
-- Table structure for table `pma__relation`
--

CREATE TABLE `pma__relation` (
  `master_db` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `master_table` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `master_field` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `foreign_db` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `foreign_table` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `foreign_field` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Relation table';

-- --------------------------------------------------------

--
-- Table structure for table `pma__savedsearches`
--

CREATE TABLE `pma__savedsearches` (
  `id` int(5) UNSIGNED NOT NULL,
  `username` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `search_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `search_data` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Saved searches';

-- --------------------------------------------------------

--
-- Table structure for table `pma__table_coords`
--

CREATE TABLE `pma__table_coords` (
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `pdf_page_number` int(11) NOT NULL DEFAULT 0,
  `x` float UNSIGNED NOT NULL DEFAULT 0,
  `y` float UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Table coordinates for phpMyAdmin PDF output';

--
-- Dumping data for table `pma__table_coords`
--

INSERT INTO `pma__table_coords` (`db_name`, `table_name`, `pdf_page_number`, `x`, `y`) VALUES
('ehr_databasereview', 'admindetails', 1, 492, 540),
('ehr_databasereview', 'county', 1, 325, 232),
('ehr_databasereview', 'designationtable', 1, 452, 108),
('ehr_databasereview', 'doctordetails', 1, 534, 399),
('ehr_databasereview', 'gendertable', 1, 440, 216),
('ehr_databasereview', 'hospitaldetails', 1, 529, 142),
('ehr_databasereview', 'insurancetable', 1, 681, 345),
('ehr_databasereview', 'medicaldetails', 1, 32, 499),
('ehr_databasereview', 'occupationtable', 1, 126, 84),
('ehr_databasereview', 'patientdetails', 1, 48, 364),
('ehr_databasereview', 'responsetable', 1, 505, 255),
('ehr_databasereview', 'roletable', 1, 656, 208);

-- --------------------------------------------------------

--
-- Table structure for table `pma__table_info`
--

CREATE TABLE `pma__table_info` (
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `display_field` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Table information for phpMyAdmin';

--
-- Dumping data for table `pma__table_info`
--

INSERT INTO `pma__table_info` (`db_name`, `table_name`, `display_field`) VALUES
('ehr_databasereview', 'admindetails', 'FirstName'),
('ehr_databasereview', 'doctordetails', 'FirstName'),
('ehr_databasereview', 'hospitaldetails', 'HospitalName'),
('ehr_databasereview', 'medicaldetails', 'OtherDetails');

-- --------------------------------------------------------

--
-- Table structure for table `pma__table_uiprefs`
--

CREATE TABLE `pma__table_uiprefs` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `prefs` text COLLATE utf8_bin NOT NULL,
  `last_update` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Tables'' UI preferences';

--
-- Dumping data for table `pma__table_uiprefs`
--

INSERT INTO `pma__table_uiprefs` (`username`, `db_name`, `table_name`, `prefs`, `last_update`) VALUES
('root', 'db_contact', 'tbl_contact', '{\"CREATE_TIME\":\"2021-10-21 09:46:21\",\"col_order\":[0,1,2,3,4],\"col_visib\":[1,1,1,1,1]}', '2021-10-21 07:13:37');

-- --------------------------------------------------------

--
-- Table structure for table `pma__tracking`
--

CREATE TABLE `pma__tracking` (
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `version` int(10) UNSIGNED NOT NULL,
  `date_created` datetime NOT NULL,
  `date_updated` datetime NOT NULL,
  `schema_snapshot` text COLLATE utf8_bin NOT NULL,
  `schema_sql` text COLLATE utf8_bin DEFAULT NULL,
  `data_sql` longtext COLLATE utf8_bin DEFAULT NULL,
  `tracking` set('UPDATE','REPLACE','INSERT','DELETE','TRUNCATE','CREATE DATABASE','ALTER DATABASE','DROP DATABASE','CREATE TABLE','ALTER TABLE','RENAME TABLE','DROP TABLE','CREATE INDEX','DROP INDEX','CREATE VIEW','ALTER VIEW','DROP VIEW') COLLATE utf8_bin DEFAULT NULL,
  `tracking_active` int(1) UNSIGNED NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Database changes tracking for phpMyAdmin';

-- --------------------------------------------------------

--
-- Table structure for table `pma__userconfig`
--

CREATE TABLE `pma__userconfig` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `timevalue` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `config_data` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='User preferences storage for phpMyAdmin';

--
-- Dumping data for table `pma__userconfig`
--

INSERT INTO `pma__userconfig` (`username`, `timevalue`, `config_data`) VALUES
('root', '2022-10-23 07:20:22', '{\"Console\\/Mode\":\"collapse\"}');

-- --------------------------------------------------------

--
-- Table structure for table `pma__usergroups`
--

CREATE TABLE `pma__usergroups` (
  `usergroup` varchar(64) COLLATE utf8_bin NOT NULL,
  `tab` varchar(64) COLLATE utf8_bin NOT NULL,
  `allowed` enum('Y','N') COLLATE utf8_bin NOT NULL DEFAULT 'N'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='User groups with configured menu items';

-- --------------------------------------------------------

--
-- Table structure for table `pma__users`
--

CREATE TABLE `pma__users` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `usergroup` varchar(64) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Users and their assignments to user groups';

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pma__bookmark`
--
ALTER TABLE `pma__bookmark`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pma__central_columns`
--
ALTER TABLE `pma__central_columns`
  ADD PRIMARY KEY (`db_name`,`col_name`);

--
-- Indexes for table `pma__column_info`
--
ALTER TABLE `pma__column_info`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `db_name` (`db_name`,`table_name`,`column_name`);

--
-- Indexes for table `pma__designer_settings`
--
ALTER TABLE `pma__designer_settings`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `pma__export_templates`
--
ALTER TABLE `pma__export_templates`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `u_user_type_template` (`username`,`export_type`,`template_name`);

--
-- Indexes for table `pma__favorite`
--
ALTER TABLE `pma__favorite`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `pma__history`
--
ALTER TABLE `pma__history`
  ADD PRIMARY KEY (`id`),
  ADD KEY `username` (`username`,`db`,`table`,`timevalue`);

--
-- Indexes for table `pma__navigationhiding`
--
ALTER TABLE `pma__navigationhiding`
  ADD PRIMARY KEY (`username`,`item_name`,`item_type`,`db_name`,`table_name`);

--
-- Indexes for table `pma__pdf_pages`
--
ALTER TABLE `pma__pdf_pages`
  ADD PRIMARY KEY (`page_nr`),
  ADD KEY `db_name` (`db_name`);

--
-- Indexes for table `pma__recent`
--
ALTER TABLE `pma__recent`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `pma__relation`
--
ALTER TABLE `pma__relation`
  ADD PRIMARY KEY (`master_db`,`master_table`,`master_field`),
  ADD KEY `foreign_field` (`foreign_db`,`foreign_table`);

--
-- Indexes for table `pma__savedsearches`
--
ALTER TABLE `pma__savedsearches`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `u_savedsearches_username_dbname` (`username`,`db_name`,`search_name`);

--
-- Indexes for table `pma__table_coords`
--
ALTER TABLE `pma__table_coords`
  ADD PRIMARY KEY (`db_name`,`table_name`,`pdf_page_number`);

--
-- Indexes for table `pma__table_info`
--
ALTER TABLE `pma__table_info`
  ADD PRIMARY KEY (`db_name`,`table_name`);

--
-- Indexes for table `pma__table_uiprefs`
--
ALTER TABLE `pma__table_uiprefs`
  ADD PRIMARY KEY (`username`,`db_name`,`table_name`);

--
-- Indexes for table `pma__tracking`
--
ALTER TABLE `pma__tracking`
  ADD PRIMARY KEY (`db_name`,`table_name`,`version`);

--
-- Indexes for table `pma__userconfig`
--
ALTER TABLE `pma__userconfig`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `pma__usergroups`
--
ALTER TABLE `pma__usergroups`
  ADD PRIMARY KEY (`usergroup`,`tab`,`allowed`);

--
-- Indexes for table `pma__users`
--
ALTER TABLE `pma__users`
  ADD PRIMARY KEY (`username`,`usergroup`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pma__bookmark`
--
ALTER TABLE `pma__bookmark`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pma__column_info`
--
ALTER TABLE `pma__column_info`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pma__export_templates`
--
ALTER TABLE `pma__export_templates`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pma__history`
--
ALTER TABLE `pma__history`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pma__pdf_pages`
--
ALTER TABLE `pma__pdf_pages`
  MODIFY `page_nr` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pma__savedsearches`
--
ALTER TABLE `pma__savedsearches`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- Database: `phptrials-smartmedi`
--
CREATE DATABASE IF NOT EXISTS `phptrials-smartmedi` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `phptrials-smartmedi`;

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
--
-- Database: `staff`
--
CREATE DATABASE IF NOT EXISTS `staff` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `staff`;

-- --------------------------------------------------------

--
-- Table structure for table `college`
--

CREATE TABLE `college` (
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `college`
--

INSERT INTO `college` (`first_name`, `last_name`, `gender`, `address`, `email`) VALUES
('aisha', 'vudembeke', 'female', 'kisumu', 'aishavuds@gmail.com'),
('tuma', 'tumika', 'male', 'biryaniwala', 'tummika@yahoo.com'),
('tuma', 'tumika', 'male', 'biryaniwala', 'tummika@yahoo.com'),
('tuma', 'tumika', 'male', 'biryaniwala', 'tummika@yahoo.com');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`) VALUES
(1, 'chuchu22', 'chuchu22@hotmail.com', 'dd4a169762ac762aca1a59495e796da0'),
(2, 'aisha', 'aishavuds@gmail.com', 'a381bedb5d4478053eb04be35f8798dd'),
(3, 'wanja', 'wanja@yahoo.com', 'fcf613bb97eda9c59956c4ddfeb0426e'),
(4, 'farida', 'farida@yahoo.com', '41a6a36598a0acd0d0c3aac95edc7b35');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- Database: `test`
--
CREATE DATABASE IF NOT EXISTS `test` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `test`;
--
-- Database: `test_db`
--
CREATE DATABASE IF NOT EXISTS `test_db` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `test_db`;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_contact`
--

CREATE TABLE `tbl_contact` (
  `id` int(11) NOT NULL,
  `fldName` varchar(50) NOT NULL,
  `fldEmail` varchar(150) NOT NULL,
  `fldPhone` varchar(15) NOT NULL,
  `fldMessage` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_contact`
--
ALTER TABLE `tbl_contact`
  ADD PRIMARY KEY (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
