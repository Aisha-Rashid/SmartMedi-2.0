-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 22, 2023 at 01:27 PM
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
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `adminFname` varchar(100) NOT NULL,
  `adminLname` varchar(100) NOT NULL,
  `workID` int(11) NOT NULL,
  `IDnumber` int(11) NOT NULL,
  `phone` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `adminpass` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `billing`
--

CREATE TABLE `billing` (
  `ID` int(11) NOT NULL,
  `hospitalname` varchar(255) NOT NULL,
  `invoice` int(11) NOT NULL,
  `amountDue` int(11) NOT NULL,
  `amountPaid` int(11) NOT NULL,
  `datePaid` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `blood`
--

CREATE TABLE `blood` (
  `id` int(11) NOT NULL,
  `bloodgroup` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `blood`
--

INSERT INTO `blood` (`id`, `bloodgroup`) VALUES
(1, 'A+'),
(2, 'A-'),
(3, 'B+'),
(4, 'B-'),
(5, 'AB+'),
(6, 'AB-'),
(7, 'O+'),
(8, 'O-');

-- --------------------------------------------------------

--
-- Table structure for table `conditions`
--

CREATE TABLE `conditions` (
  `id` int(11) NOT NULL,
  `conditions` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `conditions`
--

INSERT INTO `conditions` (`id`, `conditions`) VALUES
(1, 'Cancer, growths or tumors'),
(2, 'Cardiovascular (heart and blood vessels) disorders'),
(3, 'Respiratory and Ear Nose and Throat (ENT) disorders'),
(4, 'Endocrine disorders'),
(5, 'Eye related disorders'),
(6, 'Gastro-intestinal disorders'),
(7, 'Gynaecological and Obstetric disorders'),
(8, 'Genitourinary disorders'),
(9, 'Musculoskeletal disorders'),
(10, 'Neurological and psychological disorders'),
(11, 'Blood and connective tissue disorder'),
(12, 'Congenital/inherited/hereditary disorders'),
(13, 'Skin disorders');

-- --------------------------------------------------------

--
-- Table structure for table `counties`
--

CREATE TABLE `counties` (
  `id` int(11) NOT NULL,
  `county` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `counties`
--

INSERT INTO `counties` (`id`, `county`) VALUES
(1, 'Baringo\r\n'),
(2, 'Bomet\r\n'),
(3, 'Bungoma\r\n'),
(4, 'Busia\r\n'),
(5, 'Elgeyo/Marakwet\r\n'),
(6, 'Embu\r\n'),
(7, 'Garissa\r\n'),
(8, 'Homa Bay\r\n'),
(9, 'Isiolo\r\n'),
(10, 'Kajiado\r\n'),
(11, 'Kakamega\r\n'),
(12, 'Kericho\r\n'),
(13, 'Kiambu\r\n'),
(14, 'Kilifi\r\n'),
(15, 'Kirinyaga\r\n'),
(16, 'Kisii\r\n'),
(17, 'Kisumu\r\n'),
(18, 'Kitui\r\n'),
(19, 'Kwale\r\n'),
(20, 'Laikipia\r\n'),
(21, 'Lamu\r\n'),
(22, 'Machakos\r\n'),
(23, 'Makueni\r\n'),
(24, 'Mandera\r\n'),
(25, 'Marsabit\r\n'),
(26, 'Meru\r\n'),
(27, 'Migori\r\n'),
(28, 'Mombasa\r\n'),
(29, 'Murang\'a\r\n'),
(30, 'Nairobi City\r\n'),
(31, 'Nakuru\r\n'),
(32, 'Nandi\r\n'),
(33, 'Narok\r\n'),
(34, 'Nyamira\r\n'),
(35, 'Nyandarua\r\n'),
(36, 'Nyeri\r\n'),
(37, 'Samburu\r\n'),
(38, 'Siaya\r\n'),
(39, 'Taita/Taveta\r\n'),
(40, 'Tana River\r\n'),
(41, 'Tharaka-Nithi\r\n'),
(42, 'Trans Nzoia\r\n'),
(43, 'Turkana\r\n'),
(44, 'Uasin Gishu\r\n'),
(45, 'Vihiga\r\n'),
(46, 'Wajir\r\n'),
(47, 'West Pokot\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `dependants`
--

CREATE TABLE `dependants` (
  `ID_dep` int(11) NOT NULL,
  `IDNo` int(11) NOT NULL,
  `FirstName_dep` varchar(100) NOT NULL,
  `LastName_dep` varchar(100) NOT NULL,
  `dob` date NOT NULL,
  `gender_dep` varchar(20) NOT NULL,
  `blood_group` varchar(20) NOT NULL,
  `allergies` varchar(255) NOT NULL,
  `medical_conditions` varchar(255) NOT NULL,
  `notes` text NOT NULL,
  `filename` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `docnotes`
--

CREATE TABLE `docnotes` (
  `id` int(11) NOT NULL,
  `IDNo` int(11) NOT NULL,
  `docid` int(11) NOT NULL,
  `date` date NOT NULL,
  `notes` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `docnotesdependants`
--

CREATE TABLE `docnotesdependants` (
  `id` int(11) NOT NULL,
  `dependantID` int(11) NOT NULL,
  `docid` int(11) NOT NULL,
  `date` date NOT NULL,
  `notes` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `docspecialty`
--

CREATE TABLE `docspecialty` (
  `id` int(11) NOT NULL,
  `specialty` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `docspecialty`
--

INSERT INTO `docspecialty` (`id`, `specialty`) VALUES
(1, 'Critical Care and Emergency'),
(2, 'Dermatology'),
(3, 'Diagnostic Radiology'),
(4, 'Endocrinology and Metabolism'),
(5, 'Gastroenterology'),
(6, 'General Surgery'),
(7, 'General/Clinical Pathology'),
(8, 'Geriatric Medicine'),
(9, 'Hematology'),
(10, 'Medical Microbiology and Infectious Diseases'),
(11, 'Medical Oncology'),
(12, 'Nephrology'),
(13, 'Neurology'),
(14, 'Neurosurgery'),
(15, 'Obstetrics/Gynecology'),
(16, 'Ophthalmology'),
(17, 'Orthopedic Surgery'),
(18, 'Otolaryngology'),
(19, 'Pediatrics'),
(20, 'Physical Medicine and Rehabilitation (PM & R)'),
(21, 'Plastic Surgery	'),
(22, 'Psychiatry'),
(23, 'Public Health and Preventive Medicine (PhPm)'),
(24, 'Radiation Oncology'),
(25, 'Respirology'),
(26, 'Rheumatology'),
(27, 'Urology');

-- --------------------------------------------------------

--
-- Table structure for table `doctors`
--

CREATE TABLE `doctors` (
  `id` int(11) NOT NULL,
  `nationalid` int(11) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `hospital` varchar(255) NOT NULL,
  `workid` int(11) NOT NULL,
  `specialty` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `fileupload`
--

CREATE TABLE `fileupload` (
  `id` int(10) NOT NULL,
  `name` varchar(255) NOT NULL,
  `date` datetime NOT NULL,
  `IDNo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `hospitalreg`
--

CREATE TABLE `hospitalreg` (
  `id` int(11) NOT NULL,
  `hospital` varchar(100) NOT NULL,
  `branch` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `tel` int(11) NOT NULL,
  `applied` date NOT NULL,
  `file` varchar(100) NOT NULL,
  `status` int(1) NOT NULL,
  `approval` varchar(100) NOT NULL,
  `approvalDate` datetime NOT NULL,
  `mail` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `insurance`
--

CREATE TABLE `insurance` (
  `id` int(11) NOT NULL,
  `insurer` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `insurance`
--

INSERT INTO `insurance` (`id`, `insurer`) VALUES
(1, 'AAR Insurance Kenya Limited'),
(2, 'Africa Merchant Assurance Company Limited'),
(3, 'AIG Kenya Insurance Company Limited'),
(4, 'Allianz Insurance Company Of Kenya Ltd'),
(5, 'APA Insurance Limited'),
(6, 'Apollo Life Assurance Limited'),
(7, 'Britam Insurance Company'),
(8, 'Cannon Assurance Limited'),
(9, 'CIC General Insurance Limited'),
(10, 'Continental Reinsurance Limited'),
(11, 'Corporate Insurance Company Limited'),
(12, 'Directline Assurance Company Limited'),
(13, 'East Africa Reinsurance Company Limited'),
(14, 'Fidelity Shield Insurance Company Limited'),
(15, 'First Assurance Company Limited'),
(16, 'GA Insurance'),
(17, 'Gateway Insurance Company Limited'),
(18, 'Geminia Insurance Company Limited'),
(19, 'Heritage Insurance Company'),
(20, 'ICEA LION General Insurance Company Limited'),
(21, 'ICEA LION Life Assurance Company Limited'),
(22, 'Intra Africa Assurance Company Limited'),
(23, 'Invesco Assurance Company Limited'),
(24, 'Kenindia Assurance Company Limited'),
(25, 'Kenya Orient Insurance Limited'),
(26, 'Kenya Reinsurance Corporation Limited'),
(27, 'Kenyan Alliance Insurance Company Ltd'),
(28, 'Liberty Life Assurance Kenya Limited'),
(29, 'Madison Insurance Company Kenya Limited'),
(30, 'Mayfair Insurance Company Limited'),
(31, 'Mercantile Insurance Company Limited'),
(32, 'Metropolitan Life Insurance Kenya Limited'),
(33, 'Occidental Insurance Company Limited'),
(34, 'Old Mutual Life Assurance Company Limited'),
(35, 'Pacis Insurance Company Limited'),
(36, 'Pan Africa Life Assurance Limited'),
(37, 'Phoenix Of East Africa Assurance Company Limited'),
(38, 'Pioneer Assurance Company Limited'),
(39, 'Real Insurance Company Limited'),
(40, 'Resolution Insurance'),
(41, 'Shield Life Assurance Kenya'),
(42, 'Takaful Insurance Of Africa Limited'),
(43, 'Tausi Assurance Company Limited'),
(44, 'The Jubilee Insurance Company Of Kenya Limited'),
(45, 'The Monarch Insurance Company Limited'),
(46, 'Trident Insurance Company Limited'),
(47, 'UAP Insurance Company Limited'),
(48, 'UAP Life Assurance Limited'),
(49, 'Xplico Insurance Company Limited');

-- --------------------------------------------------------

--
-- Table structure for table `medicalcover`
--

CREATE TABLE `medicalcover` (
  `id` int(11) NOT NULL,
  `nhiftype` varchar(100) NOT NULL,
  `nhifnumber` int(11) NOT NULL,
  `insurancetype` varchar(255) NOT NULL,
  `insurancenumber` int(11) NOT NULL,
  `insuranceprincipal` varchar(100) NOT NULL,
  `expiry` date NOT NULL,
  `IDNo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `nextofkin`
--

CREATE TABLE `nextofkin` (
  `id` int(11) NOT NULL,
  `kinFirstName` varchar(50) NOT NULL,
  `kinLastName` varchar(50) NOT NULL,
  `relationship` varchar(50) NOT NULL,
  `telephone` varchar(100) NOT NULL,
  `IDNo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `patients`
--

CREATE TABLE `patients` (
  `ID` int(11) NOT NULL,
  `FirstName` varchar(255) NOT NULL,
  `LastName` varchar(255) NOT NULL,
  `TelNo` varchar(100) NOT NULL,
  `IDNo` int(11) NOT NULL,
  `DOB` date NOT NULL,
  `gender` varchar(20) NOT NULL,
  `bloodgroup` varchar(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `county` varchar(100) NOT NULL,
  `town` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `filename` varchar(100) CHARACTER SET latin1 NOT NULL,
  `role` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `response`
--

CREATE TABLE `response` (
  `id` int(11) NOT NULL,
  `IDNo` int(11) NOT NULL,
  `conditions` text NOT NULL,
  `allergies` text NOT NULL,
  `notes` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `billing`
--
ALTER TABLE `billing`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `blood`
--
ALTER TABLE `blood`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `conditions`
--
ALTER TABLE `conditions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `counties`
--
ALTER TABLE `counties`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dependants`
--
ALTER TABLE `dependants`
  ADD PRIMARY KEY (`ID_dep`),
  ADD KEY `IDNo` (`IDNo`);

--
-- Indexes for table `docnotes`
--
ALTER TABLE `docnotes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDNo` (`IDNo`),
  ADD KEY `docid` (`docid`);

--
-- Indexes for table `docnotesdependants`
--
ALTER TABLE `docnotesdependants`
  ADD PRIMARY KEY (`id`),
  ADD KEY `docid` (`docid`),
  ADD KEY `dependantID` (`dependantID`);

--
-- Indexes for table `docspecialty`
--
ALTER TABLE `docspecialty`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `doctors`
--
ALTER TABLE `doctors`
  ADD PRIMARY KEY (`workid`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `fileupload`
--
ALTER TABLE `fileupload`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDNo` (`IDNo`);

--
-- Indexes for table `hospitalreg`
--
ALTER TABLE `hospitalreg`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `insurance`
--
ALTER TABLE `insurance`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `medicalcover`
--
ALTER TABLE `medicalcover`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDNo` (`IDNo`);

--
-- Indexes for table `nextofkin`
--
ALTER TABLE `nextofkin`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDNo` (`IDNo`);

--
-- Indexes for table `patients`
--
ALTER TABLE `patients`
  ADD PRIMARY KEY (`IDNo`),
  ADD UNIQUE KEY `ID` (`ID`),
  ADD KEY `bloodgroup` (`bloodgroup`);

--
-- Indexes for table `response`
--
ALTER TABLE `response`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDNo` (`IDNo`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `billing`
--
ALTER TABLE `billing`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `blood`
--
ALTER TABLE `blood`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `conditions`
--
ALTER TABLE `conditions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `counties`
--
ALTER TABLE `counties`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `dependants`
--
ALTER TABLE `dependants`
  MODIFY `ID_dep` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `docnotes`
--
ALTER TABLE `docnotes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `docnotesdependants`
--
ALTER TABLE `docnotesdependants`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `docspecialty`
--
ALTER TABLE `docspecialty`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `doctors`
--
ALTER TABLE `doctors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `fileupload`
--
ALTER TABLE `fileupload`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `hospitalreg`
--
ALTER TABLE `hospitalreg`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `insurance`
--
ALTER TABLE `insurance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `medicalcover`
--
ALTER TABLE `medicalcover`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `nextofkin`
--
ALTER TABLE `nextofkin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `patients`
--
ALTER TABLE `patients`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `response`
--
ALTER TABLE `response`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
