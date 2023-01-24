-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 24, 2023 at 04:17 PM
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

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `adminFname`, `adminLname`, `workID`, `IDnumber`, `phone`, `email`, `adminpass`) VALUES
(1, 'Aisha', 'Rashid', 5654, 30301518, 754347613, 'chuchuaisha@gmail.com', 'aisharashid');

-- --------------------------------------------------------

--
-- Table structure for table `appointments`
--

CREATE TABLE `appointments` (
  `id` int(11) NOT NULL,
  `IDNo` int(11) NOT NULL,
  `hospital` varchar(255) NOT NULL,
  `clinic` varchar(255) NOT NULL,
  `visit` varchar(20) NOT NULL,
  `doctype` varchar(20) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `appointments`
--

INSERT INTO `appointments` (`id`, `IDNo`, `hospital`, `clinic`, `visit`, `doctype`, `date`, `time`) VALUES
(1, 29816629, 'Avenue Hospital', 'Gastroenterology', 'First Visit', 'Specialist', '2023-01-10', '01:30:00'),
(2, 2147483647, 'The Nairobi Hospital Outpatient Center', 'Gastroenterology', 'First Visit', 'Specialist', '2023-01-27', '01:30:00'),
(3, 2147483647, 'Bristol Park Hospital Tasia Embakasi', 'Obstetrics/Gynecology', 'First Visit', 'Specialist', '2023-01-21', '10:00:00'),
(4, 2147483647, 'AAR Hospital', '', 'Regular Patient', 'General Doctor', '2023-01-23', '09:00:00'),
(5, 2147483647, 'AAR Hospital', 'Dermatology', 'Regular Patient', 'Specialist', '2023-01-23', '10:30:00'),
(6, 2147483647, 'Coptic Hospital Nursing Hospital', '', 'Regular Patient', 'General Doctor', '2023-02-01', '02:30:00'),
(7, 2147483647, 'AIC Kijabe Hospital Nairobi Medical Center', 'Endocrinology and Metabolism', 'First Visit', 'Specialist', '2023-01-25', '09:00:00');

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
-- Table structure for table `docnotes`
--

CREATE TABLE `docnotes` (
  `id` int(11) NOT NULL,
  `IDNo` int(11) NOT NULL,
  `docid` int(11) NOT NULL,
  `date` date NOT NULL,
  `notes` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `docnotes`
--

INSERT INTO `docnotes` (`id`, `IDNo`, `docid`, `date`, `notes`) VALUES
(8, 29816629, 23386746, '2023-01-17', 'Hypertension'),
(9, 29816629, 23386746, '2023-01-24', 'PMS'),
(17, 29816629, 23386746, '2023-01-24', 'Diagnosed with IBS');

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
(13955393, 545678, 'Sarah', 'Waithaka', 'Bosongo Hospital', 6568986, 'Hematology', '9e9d7a08e048e9d604b79460b54969c3'),
(23386746, 263830028, 'Imran', 'Mbulika', 'Brother André Medical Center Dandora', 2474357, 'General/Clinical Pathology', 'e18fdc9fa7cc2b5f4e497d21a48ea3b7'),
(27901648, 5986655, 'Mitch', 'Odhiambo', 'Consolata Hospital Nkubu', 5686656, 'Respirology', 'fae53351b9effc708e764e871bef3119'),
(30953278, 7455685, 'Abdul Aziz', 'Guyo', 'Kakamega County General Teaching & Referral Hospital', 46986565, 'Radiation Oncology', '82027888c5bb8fc395411cb6804a066c'),
(31863166, 2236566, 'Vincent', 'Mwanza', 'Narok County Referral Hospital', 4564652, 'Neurosurgery', 'b15ab3f829f0f897fe507ef548741afb'),
(41922387, 6865865, 'Samuel', 'Ratemo', 'Diani Beach Hospital', 6666666, 'Plastic Surgery', 'd8ae5776067290c4712fa454006c8ec6'),
(57778499, 4455635, 'Rachael', 'Nzioka', 'Machakos Hospital', 5646687, 'Gastroenterology', '3676efb616c47897b2d427b4cd8b9253'),
(69409721, 654689, 'Pamela', 'Oteng', 'Nanyuki Cottage Hospital', 45665625, 'Ophthalmology', '669ffc150d1f875819183addfc842cab'),
(72057544, 6556968, 'Patricia', 'Chemutai', 'Aga Khan Hospital, Mombasa', 6666666, 'Urology', '823fec7a2632ea7b498c1d0d11c11377'),
(77276605, 2252652, 'Julius', 'Chepkorir', 'Maua Methodist Hospital', 3465468, 'General Surgery', '30e6d8432ce54710f9c09f305e7b9829'),
(81653946, 6486650, 'Brenda', 'Wangui', 'Mandera County Referral Hospital', 5858758, 'Obstetrics/Gynecology', 'e5e9b41c8f1ad39ffb22df4a7aa7d876'),
(93643432, 56559856, 'Kelvin', 'Nzomo', 'Gatundu Level 5 Hospital', 56465565, 'Nephrology', 'b2c6de510d584484d74c9aa9f8fa9f04'),
(95142858, 5696598, 'Jack ', 'Ochieng', 'Kiambu County Referral Hospital', 6655665, 'Endocrinology and Metabolism', '4ff9fc6e4e5d5f590c4f2134a8cc96d1'),
(96784800, 11455985, 'Maimuna', 'Idris', 'Mandera County Referral Hospital', 2556590, 'Pediatrics', 'cbf306d2c9df16d0bd7ba7888cbb1b5e');

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
(24, 'MMUrepo6.docx', '2022-12-08 15:36:47', 63748264),
(25, '4_entropy_coding.pdf', '2022-12-13 15:34:25', 2147483647),
(26, 'TRIAL1.pdf', '2023-01-02 11:55:52', 29816629),
(32, 'module5.pdf', '2023-01-18 12:17:26', 29816629),
(33, 'module5.pdf', '2023-01-18 12:18:11', 2147483647);

-- --------------------------------------------------------

--
-- Table structure for table `hospitals`
--

CREATE TABLE `hospitals` (
  `hospitalID` int(11) NOT NULL,
  `hospitalname` varchar(255) NOT NULL,
  `county` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hospitals`
--

INSERT INTO `hospitals` (`hospitalID`, `hospitalname`, `county`) VALUES
(1, 'AAR Hospital', 'Kiambu'),
(2, 'Aga Khan University Hospital, Nairobi', 'Nairobi'),
(3, 'Avenue Hospital', 'Nairobi'),
(4, 'Bristol Park Hospital Tasia Embakasi', 'Nairobi'),
(5, 'Brother André Medical Center Dandora', 'Nairobi'),
(6, 'Coptic Hospital Nursing Hospital', 'Nairobi'),
(7, 'Gertrude\'s Children\'s Hospital Muthaiga', 'Kiambu'),
(8, 'Guru Nanak Ramgarhia Sikh Hospital', 'Nairobi'),
(9, 'The Karen Hospital', 'Kajiado'),
(10, 'Kenyatta National Hospital', 'Nairobi'),
(11, 'Kenyatta University Teaching, Referral, and Research Hospital', 'Kiambu'),
(12, 'AIC Kijabe Hospital Nairobi Medical Center', 'Nairobi'),
(13, 'Lifecare Hospitals Kenya', 'Nairobi'),
(14, 'The Nairobi Hospital Outpatient Center', 'Nairobi'),
(15, 'Kenya Defense Forces Memorial Hospital', 'Nairobi'),
(16, 'Mediheal Group of Hospitals, Upperhill', 'Nairobi'),
(17, 'Gatundu Level 5 Hospital', 'Nyeri'),
(18, 'Kerugoya County Referral Hospital', 'Kirinyaga'),
(19, 'Kiambu County Referral Hospital', 'Kiambu'),
(20, 'Murang\'a County Referral Hospital', 'Murang\'a'),
(21, 'Afya International Hospital', 'Malindi'),
(22, 'Alfarooq Hospital', 'Mombasa'),
(23, 'Bomu Hospital', 'Mombasa'),
(24, 'Diani Beach Hospital', 'Kwale'),
(25, 'Hola County Referral Hospital', 'Tana River'),
(26, 'Pandya Memorial Hospital', 'Mombasa'),
(27, 'Aga Khan Hospital, Mombasa', 'Mombasa'),
(28, 'Consolata Hospital Nkubu', 'Meru'),
(29, 'Embu Provincial General Hospital', 'Embu'),
(30, 'Galaxy Hospital', 'Isiolo'),
(31, 'Kitui County Referral Hospital', 'Kitui'),
(32, 'Machakos Hospital', 'Machakos'),
(33, 'Makueni County Referral Hospital', 'Makueni'),
(34, 'Maua Methodist Hospital', 'Meru'),
(35, 'Our Lady of Lourdes Mutomo Hospital', 'Kitui'),
(36, 'PCEA Chogoria Hospital', 'Tharaka-Nithi'),
(37, 'Mandera County Referral Hospital', 'Mandera'),
(38, 'Shamaal Hospital', 'Mandera'),
(39, 'Aga Khan Hospital, Kisumu', 'Kisumu'),
(40, 'Bosongo Hospital', 'Kisii'),
(41, 'Jaramogi Oginga Odinga Teaching & Referral Hospital', 'Kisumu'),
(42, 'Kendu Adventist Hospital', 'Homa Bay'),
(43, 'Tenwek Hospital', 'Bomet'),
(44, 'Barnet Memorial Hospital, Kabarnet', 'Baringo'),
(45, 'Nakuru Level 6 Hospital', 'Nakuru'),
(46, 'Nanyuki Cottage Hospital', 'Laikipia'),
(47, 'Mediheal Hospital and Fertility Center, Uasin Gishu', 'Uasin Gishu'),
(48, 'Narok County Referral Hospital', 'Narok'),
(49, 'Catholic Hospital Wamba', 'Samburu'),
(50, 'Bungoma County Referral Hospital', 'Bungoma'),
(51, 'Busia County Referral Hospital', 'Busia'),
(52, 'Jumuia Friends Hospital Kaimosi', 'Vihiga'),
(53, 'Kakamega County General Teaching & Referral Hospital', 'Kakamega');

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

--
-- Dumping data for table `medicalcover`
--

INSERT INTO `medicalcover` (`id`, `nhiftype`, `nhifnumber`, `insurancetype`, `insurancenumber`, `insuranceprincipal`, `expiry`, `IDNo`) VALUES
(1, 'Individual', 64792764, 'APA Insurance Limited', 5367286, 'Aisha Wanja Rashid', '2023-07-11', 2147483647),
(2, 'Individual', 620145, 'Old Mutual Life Assurance Company Limited', 2264087, 'Fatuma Wairimu Rashid', '2024-12-07', 29816629);

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

--
-- Dumping data for table `nextofkin`
--

INSERT INTO `nextofkin` (`id`, `kinFirstName`, `kinLastName`, `relationship`, `telephone`, `IDNo`) VALUES
(1, 'fatuma', 'wairimu', '', '', 0),
(2, '', '', '', '', 0),
(3, 'Rehema', 'Rashid', 'Sibling', '152671827', 2147483647),
(4, 'Dianah', 'Karanja', 'Parent', '254759320031', 29816629);

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
  `pic` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `patients`
--

INSERT INTO `patients` (`ID`, `FirstName`, `LastName`, `TelNo`, `IDNo`, `DOB`, `gender`, `bloodgroup`, `email`, `county`, `town`, `password`, `pic`) VALUES
(20, 'Aisha', 'Rashid', '+254703277202', 2147483647, '1990-02-09', 'Female', 'O+', 'chuchuaisha@gmail.com', 'Kajiado', 'Kitengela', 'a381bedb5d4478053eb04be35f8798dd', ''),
(22, 'Fatuma', 'Rashid', '273940287', 53664673, '1995-11-09', 'Female', 'O+', 'fatuma@yahoo.com', 'Kilifi', 'Malindi', 'fdc0978bc0cc4c37c3e3d44fc63ee487', ''),
(23, 'Ashraf', 'Mbulika', '63647828', 63748264, '2020-07-07', 'Male', 'AB+', 'ashraf@yahoo.com', 'Machakos', 'Athi River', '508924b0eac2ba101ada28841c931e44', ''),
(24, 'Rehema', 'Rashid', '637483625', 68493736, '1998-03-10', 'Female', 'O+', 'rehema@yahoo.com', 'Nairobi', 'Nairobi', '5eaf0467a7fdc9fe2a16b9b8a8fd8b4a', ''),
(25, 'Suhaila', 'Salim', '73849837', 82736745, '2017-07-21', 'Female', 'O+', 'suhaila@yahoo.com', 'Kajiado', 'Kitengela', 'e8b3ca806fd3c5e8e18368994a7ee305', ''),
(26, 'Rashid', 'Thomas', '73883635', 367482725, '1988-10-13', 'Male', 'A+', 'rashid@yahoo.com', 'Nairobi', 'Nairobi', '7d0ba610dea3dbcc848a97d8dfd767ae', ''),
(27, 'Allan', 'Keverenge', '254795846312', 2147483647, '1988-03-15', 'Male', 'B-', 'allan@yahoo.com', 'Homa Bay', 'Homa Bay', 'b993e4526238d62f6b1b90e605532ff8', ''),
(28, 'Monica', 'Ndunge', '+254788741200', 49798885, '1991-02-05', 'Female', 'O-', 'monica@gmail.com', 'Machakos', 'Machakos', 'ff0d813dd5d2f64dd372c6c4b6aed086', ''),
(29, 'Cherlyne ', 'Obeyo', '+254719267540', 78978568, '1992-08-18', 'Female', 'AB+', 'cherlyneobeyo@gmail.com', 'Kakamega', 'Kakamega', 'b5e6859e6c6d07090ee1fc3bb85ec441', ''),
(30, 'Satish', 'Kumar', '+254752861926', 79858912, '1987-10-08', 'Male', 'B+', 'satish@yahoo.com', 'Kilifi', 'Kilifi', 'b8377b23bb86899405d2455cc6da3556', ''),
(31, 'Winfred', 'Kamunge', '+254752528962', 56552345, '1979-01-25', 'Female', 'A+', 'winfred@gmail.com', 'Kericho', 'Kericho', 'cfeee3fc113367fb6ea82084621e5c0d', ''),
(32, 'Annastacia', 'Mbula', '+254718097856', 66989559, '1972-07-01', 'Female', 'A-', 'annastacia@gmail.com', 'Makueni', 'Wote', '2708535b89a179fe383b3b548048687f', ''),
(33, 'Mary', 'Wambui', '+254725898989', 9873268, '1993-09-17', 'Female', 'O+', 'mary@gmail.com', 'Kiambu', 'Kiambu', 'b8e7be5dfa2ce0714d21dcfc7d72382c', ''),
(34, 'Martin ', 'Sendeyo', '+254710252863', 4879885, '1983-02-17', 'Male', 'AB+', 'martin@gmail.com', 'Busia', 'Busia', '925d7518fc597af0e43f5606f9a51512', ''),
(35, 'Peter', 'Mburu', '+254716688262', 6598569, '1976-05-13', 'Male', 'O-', 'peter@yahoo.com', 'Kirinyaga', 'Kirinyaga', '51dc30ddc473d43a6011e9ebba6ca770', ''),
(36, 'Timothy', 'Oketch', '+254720858623', 123456789, '1996-04-02', 'Male', 'AB-', 'timothy@gmail.com', 'Kisumu', 'Kisumu', 'ecb97d53d2d35b8ba98cf82a8d78cad9', ''),
(37, 'Erastus', 'Kinyua', '+254734528692', 544856500, '1977-10-09', 'Male', 'B-', 'erastus@yahoo.com', 'Embu', 'Embu', '029028fb57ad37f32281997724b97949', ''),
(38, 'Faith', 'Katunge', '+25478595596', 56588966, '1995-11-20', 'Female', 'O+', 'faith@gmail.com', 'Elgeyo/Marakwet', 'Marakwet', 'ecee7df9bbac50b9b428483bfea1dd7c', ''),
(39, 'Mark', 'Njoroge', '+2547285689', 30562389, '1999-03-18', 'Male', 'B-', 'mark@gmail.com', 'Kajiado', 'kajiado', 'ea82410c7a9991816b5eeeebe195e20a', ''),
(40, 'Abdi', 'Osman', '+254720548562', 678456566, '2002-03-29', 'Male', 'AB-', 'abdi@gmail.com', 'Garissa', 'Garissa', '311eba6dada049960e16974e652ef134', ''),
(41, 'Abdul', 'Imboha', '+2547856622', 6588689, '1988-12-23', 'Male', 'B+', 'abdul@gmail', 'Bungoma', 'Bungoma', '82027888c5bb8fc395411cb6804a066c', ''),
(42, 'Sophia', 'Mwenje', '+2547582544', 2559655, '1983-06-08', 'Female', 'AB-', 'sophia@gmail.com', 'Trans Nzoia', 'Trans Nzoia', '2ee0272b8e1a9705dc3ebe91c10b32f4', ''),
(43, 'Biko', 'Biko', '+254710566555', 874797989, '1996-05-14', 'Male', 'O-', 'biko@gmail.com', 'Nairobi City', 'Nairobi', '3aeb4f9aab7e034b7722f070831bce41', ''),
(44, 'Samantha', 'Makori', '+254720586321', 96542356, '1967-04-10', 'Female', 'A+', 'samantha@gmail.com', 'Nairobi City', 'Nairobi', 'f01e0d7992a3b7748538d02291b0beae', ''),
(45, 'Vitalis', 'Junior', '+254712358256', 545586598, '1994-07-07', 'Male', 'AB+', 'vitalis@gmail.com', 'Vihiga', 'Vihiga', '92b20c90c1bc317620c82dc41b4eb9fd', ''),
(46, 'Fatuma', 'Rashid', '254719829526', 29816629, '1993-04-02', 'Female', 'O+', 'fatumarashid4@gmail.com', 'Kajiado', 'Kitengela', '407aa911747042d7f046b62feaf8b4c4', ''),
(47, 'Jeff', 'Githae', '254743567854', 43628735, '1996-07-05', 'Male', 'O+', 'jeffgithae@gmail.com', 'Kiambu', 'Kiambu', '166ee015c0e0934a8781e0c86a197c6e', '');

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
(4, 63748264, 'Gastro-intestinal disorders,', 'nuts', 'gastritis detected'),
(5, 2147483647, 'Respiratory and Ear Nose and Throat (ENT) disorders, Gastro-intestinal disorders, Gynaecological and Obstetric disorders, Neurological and psychological disorders, ', 'reactive to iboprufen, dust particles, strong perfumes, eggs', 'diagnosed with allergic rhinitis, hiatus hernia, peptic ulcers, endometriosis, anxiety and panic attacks'),
(6, 29816629, 'Cardiovascular (heart and blood vessels) disorders, Respiratory and Ear Nose and Throat (ENT) disorders, Endocrine disorders, Gastro-intestinal disorders, Gynaecological and Obstetric disorders, Musculoskeletal disorders, Skin disorders, ', 'Dust, Kerosene, pollen ', 'Relatives suffering from - High blood pressure, Diabetes, peptic ulcers, arthritis, keloids\r\nPatient suffering from - asthma, ovarian cyst\r\n');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `appointments`
--
ALTER TABLE `appointments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blood`
--
ALTER TABLE `blood`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `counties`
--
ALTER TABLE `counties`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `docnotes`
--
ALTER TABLE `docnotes`
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
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `appointments`
--
ALTER TABLE `appointments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `blood`
--
ALTER TABLE `blood`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `counties`
--
ALTER TABLE `counties`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `docnotes`
--
ALTER TABLE `docnotes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `docspecialty`
--
ALTER TABLE `docspecialty`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `fileupload`
--
ALTER TABLE `fileupload`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `hospitals`
--
ALTER TABLE `hospitals`
  MODIFY `hospitalID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `insurance`
--
ALTER TABLE `insurance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `medicalcover`
--
ALTER TABLE `medicalcover`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `nextofkin`
--
ALTER TABLE `nextofkin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `patients`
--
ALTER TABLE `patients`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `response`
--
ALTER TABLE `response`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
