-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 08, 2022 at 05:09 PM
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

--
-- Dumping data for table `doctors`
--

INSERT INTO `doctors` (`id`, `nationalid`, `fname`, `lname`, `hospital`, `workid`, `specialty`, `password`) VALUES
(10910410, 648392384, 'Fatuma', 'Wairimu', 'Gertrude\'s Children\'s Hospital Muthaiga', 637483, 'Nephrology', 'fdc0978bc0cc4c37c3e3d44fc63ee487'),
(23386746, 263830028, 'Imran', 'Mbulika', 'Brother André Medical Center Dandora', 2474357, 'General/Clinical Pathology', 'e18fdc9fa7cc2b5f4e497d21a48ea3b7'),
(23510146, 63849286, 'wanja', 'aisha', 'Avenue Hospital', 6283920, 'Neurosurgery', ''),
(67066255, 638992847, 'Rehema', 'rashid', 'Avenue Hospital', 53748920, 'Diagnostic Radiology', ''),
(70336988, 2147483647, 'Imran', 'Mbulika', 'Gertrude\'s Children\'s Hospital Muthaiga', 6389403, 'Pediatrics', '');

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

--
-- Dumping data for table `fileupload`
--

INSERT INTO `fileupload` (`id`, `name`, `date`, `IDNo`) VALUES
(1, 'File1example.pdf', '2022-11-23 05:30:12', 68493736),
(2, 'fatuma.pdf', '2022-12-04 09:46:20', 53664673),
(4, 'rehema.png', '2022-12-04 09:46:20', 68493736),
(5, 'FORM 1.png', '2022-12-08 14:09:07', 0),
(6, 'FORM 4.png', '2022-12-08 11:49:08', 0),
(7, 'REPORT.png', '2022-12-08 11:52:03', 0),
(10, 'Screenshot (11).png', '2022-12-08 14:31:44', 0),
(12, '2022 Calendar.pdf', '2022-12-08 12:03:46', 0),
(13, 'CyberGirls Interview Schedule (Segun).pdf', '2022-12-08 12:04:55', 2147483647),
(17, 'DAILY ADMISSION LIST-DSF (1).xlsx', '2022-12-08 12:15:09', 2147483647),
(20, 'Git-Cheat-Sheet.pdf', '2022-12-08 12:23:53', 53664673),
(21, 'Accessing Cisco Devices_transcript.txt', '2022-12-08 14:48:01', 68493736),
(22, 'fetch php.txt', '2022-12-08 15:35:59', 63748264),
(23, 'AAR Medical Insurance Quotation 2022-Farida (52yrs).xlsx', '2022-12-08 15:36:13', 63748264),
(24, 'MMUrepo6.docx', '2022-12-08 15:36:47', 63748264);

-- --------------------------------------------------------

--
-- Table structure for table `hospitals`
--

CREATE TABLE `hospitals` (
  `hospitalID` int(11) NOT NULL,
  `hospitalname` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hospitals`
--

INSERT INTO `hospitals` (`hospitalID`, `hospitalname`) VALUES
(1, 'AAR Hospital'),
(2, 'Aga Khan University Hospital, Nairobi'),
(3, 'Avenue Hospital'),
(4, 'Bristol Park Hospital Tasia Embakasi'),
(5, 'Brother André Medical Center Dandora'),
(6, 'Coptic Hospital Nursing Hospital'),
(7, 'Gertrude\'s Children\'s Hospital Muthaiga'),
(8, 'Guru Nanak Ramgarhia Sikh Hospital'),
(9, 'The Karen Hospital'),
(10, 'Kenyatta National Hospital'),
(11, 'Kenyatta University Teaching, Referral, and Research Hospital');

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
  `IDNo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `nextofkin`
--

INSERT INTO `nextofkin` (`id`, `kinFirstName`, `kinLastName`, `relationship`, `IDNo`) VALUES
(1, 'fatuma', 'wairimu', '', 0),
(2, '', '', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `nhif`
--

CREATE TABLE `nhif` (
  `id` int(11) NOT NULL,
  `type` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `nhif`
--

INSERT INTO `nhif` (`id`, `type`) VALUES
(1, 'Civil Servant'),
(2, 'Employee'),
(3, 'Individual');

-- --------------------------------------------------------

--
-- Table structure for table `patients`
--

CREATE TABLE `patients` (
  `ID` int(11) NOT NULL,
  `FirstName` varchar(255) NOT NULL,
  `LastName` varchar(255) NOT NULL,
  `TelNo` varchar(255) NOT NULL,
  `IDNo` int(11) NOT NULL,
  `DOB` date NOT NULL,
  `gender` varchar(20) NOT NULL,
  `bloodgroup` varchar(20) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `pic` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `patients`
--

INSERT INTO `patients` (`ID`, `FirstName`, `LastName`, `TelNo`, `IDNo`, `DOB`, `gender`, `bloodgroup`, `email`, `password`, `pic`) VALUES
(20, 'Aisha', 'Rashid', '+254703277202', 2147483647, '1990-02-09', 'Female', '', 'chuchuaisha@gmail.com', 'a381bedb5d4478053eb04be35f8798dd', ''),
(22, 'Fatuma', 'Rashid', '273940287', 53664673, '1995-11-09', 'Female', '', 'fatuma@yahoo.com', 'fdc0978bc0cc4c37c3e3d44fc63ee487', ''),
(23, 'Ashraf', 'Mbulika', '63647828', 63748264, '2020-07-07', 'Male', 'AB+', 'ashraf@yahoo.com', '508924b0eac2ba101ada28841c931e44', ''),
(24, 'Rehema', 'Rashid', '637483625', 68493736, '1998-03-10', 'Female', 'O+', 'rehema@yahoo.com', '5eaf0467a7fdc9fe2a16b9b8a8fd8b4a', ''),
(25, 'Suhaila', 'Salim', '73849837', 82736745, '2017-07-21', 'Female', 'O+', 'suhaila@yahoo.com', 'e8b3ca806fd3c5e8e18368994a7ee305', '');

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
-- Dumping data for table `response`
--

INSERT INTO `response` (`id`, `IDNo`, `conditions`, `allergies`, `notes`) VALUES
(2, 53664673, 'Respiratory and Ear Nose and Throat (ENT) disorders,Endocrine disorders,Gastro-intestinal disorders,Gynaecological and Obstetric disorders,Neurological and psychological disorders,Congenital/inherited/hereditary disorders,', 'peanuts, flowers', '5-year gastritis diagnosis, anxiety disorder,  stomach hernia, pelvic inflammation'),
(3, 68493736, 'Respiratory and Ear Nose and Throat (ENT) disorders,', 'paracetamol, dust particles', 'rhinitis diagnosed in 2013'),
(4, 63748264, 'Gastro-intestinal disorders,', 'nuts', 'gastritis detected');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blood`
--
ALTER TABLE `blood`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `docspecialty`
--
ALTER TABLE `docspecialty`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `doctors`
--
ALTER TABLE `doctors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fileupload`
--
ALTER TABLE `fileupload`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hospitals`
--
ALTER TABLE `hospitals`
  ADD PRIMARY KEY (`hospitalID`);

--
-- Indexes for table `insurance`
--
ALTER TABLE `insurance`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `medicalcover`
--
ALTER TABLE `medicalcover`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nextofkin`
--
ALTER TABLE `nextofkin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nhif`
--
ALTER TABLE `nhif`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `patients`
--
ALTER TABLE `patients`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `response`
--
ALTER TABLE `response`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blood`
--
ALTER TABLE `blood`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `docspecialty`
--
ALTER TABLE `docspecialty`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `fileupload`
--
ALTER TABLE `fileupload`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `hospitals`
--
ALTER TABLE `hospitals`
  MODIFY `hospitalID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `nhif`
--
ALTER TABLE `nhif`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `patients`
--
ALTER TABLE `patients`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `response`
--
ALTER TABLE `response`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
