-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 12, 2022 at 10:27 AM
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
-- Database: `ehr_databasereview`
--

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
  `Email` varchar(100) DEFAULT NULL
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
  MODIFY `GenderID` int(11) NOT NULL AUTO_INCREMENT;

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
  MODIFY `RoleID` int(11) NOT NULL AUTO_INCREMENT;

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
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
