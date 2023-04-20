-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 20, 2023 at 01:14 PM
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
(1, 'Aisha', 'Rashid', 5654, 30301518, 754347613, 'chuchuaisha@gmail.com', 'd983d1851e82044a25e554323a4e5f29'),
(2, 'Jeff', 'Githae', 5546, 33284746, 732746248, 'jgithae@gmail.com', '4bde84a7487581a6a3720f901127e1a5');

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

--
-- Dumping data for table `billing`
--

INSERT INTO `billing` (`ID`, `hospitalname`, `invoice`, `amountDue`, `amountPaid`, `datePaid`) VALUES
(1, 'Halisi Family Hospital', 10005, 8000, 8000, '2023-04-04'),
(4, 'Final Hospital', 10006, 24156, 24156, '2023-04-04'),
(5, 'Kitengela Medical', 10007, 16156, 16156, '2023-04-05'),
(6, 'AAR Hospital', 10008, 176156, 176156, '2023-04-12'),
(7, 'Aga Khan University Hospital', 10009, 160156, 160156, '2023-04-12'),
(8, 'Avenue Hospital', 10010, 56156, 56156, '2023-04-12'),
(9, 'Bristol Park Hospital', 10011, 40156, 40156, '2023-04-12'),
(10, 'Brother André Medical Center', 10012, 8156, 8156, '2023-04-12'),
(11, 'Coptic Hospital', 10013, 8156, 8156, '2023-04-12'),
(12, 'Gertrude&#39;s Children&#39;s Hospital', 10014, 216156, 216156, '2023-04-12'),
(13, 'Institution Trial', 10015, 160156, 160156, '2023-04-18'),
(14, 'Institution Trial 2', 10016, 96156, 96156, '2023-04-18'),
(15, 'Halisi Family Hospital nanyuki', 10017, 80156, 80156, '2023-04-18'),
(16, 'Final Hospital email', 10018, 112156, 112156, '2023-04-18'),
(23, 'Pona Hospital', 10019, 40156, 40156, '2023-04-20');

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

--
-- Dumping data for table `dependants`
--

INSERT INTO `dependants` (`ID_dep`, `IDNo`, `FirstName_dep`, `LastName_dep`, `dob`, `gender_dep`, `blood_group`, `allergies`, `medical_conditions`, `notes`, `filename`) VALUES
(13, 54737364, 'fatumajuma', '', '1999-06-05', 'Female', '', 'reactive to paracetamol', 'jkcadlvdbvbdvds test', '', ''),
(14, 54737364, 'Aisha Rashid', '', '1998-06-05', 'Female', 'A+', 'reactive to paracetamol', 'jkcadlvdbvbdvds test', '', 'blog-img-03.jpg'),
(15, 54737364, 'fatuma rashid', '', '2020-03-07', 'Female', 'O+', 'reactive to paracetamol', 'jkcadlvdbvbdvds test', '', 'gallery-06.jpg'),
(16, 54737364, 'rehema rashid', '', '2018-06-05', 'Female', 'O-', 'sulphur, pollen', 'jkcadlvdbvbdvds test', '', 'gallery-03.jpg'),
(17, 54737364, 'trial child', '', '2021-07-05', 'Male', 'A-', 'Pollen', 'Gastro-intestinal disorders Skin disorders   ', '', 'doc3.png'),
(19, 54737364, 'trial child three', '', '2022-07-06', 'Male', 'A-', 'nil', 'Respiratory and Ear Nose and Throat (ENT) disorders , Musculoskeletal disorders ,  ,  ,  , asthma, arthritis', '', '');

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

--
-- Dumping data for table `docnotes`
--

INSERT INTO `docnotes` (`id`, `IDNo`, `docid`, `date`, `notes`) VALUES
(9, 29816629, 23386746, '2023-01-24', 'PMS'),
(17, 29816629, 23386746, '2023-01-24', 'Diagnosed with IBS'),
(18, 29816629, 648392384, '2023-02-06', 'The patient showing signs of extreme anxiety disorder necessitating medication and therapy.'),
(20, 29816629, 263830028, '2023-02-09', 'The patient was admitted over sudden anxiety attacks.'),
(21, 2147483647, 5986655, '2023-03-06', 'The patient shows early signs of arthritis. To keenly observe diet high in calcium and omega');

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

--
-- Dumping data for table `docnotesdependants`
--

INSERT INTO `docnotesdependants` (`id`, `dependantID`, `docid`, `date`, `notes`) VALUES
(1, 15, 648392384, '2023-04-04', 'Developed Asthma- Mild stages');

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
(1, 26738463, 'Sarah', 'Waithaka', 'Gertrude&#39;s Children&#39;s Hospital', 256543, 'Critical Care and Emergency', '9e9d7a08e048e9d604b79460b54969c3'),
(2, 30475486, 'Mitch', 'Odhiambo', 'Coptic Hospital', 653567, 'General Surgery', 'SMedi@123'),
(3, 10364846, 'Racheal', 'Nzioka', 'Coptic Hospital', 653521, 'Critical Care and Emergency', 'SMedi@123'),
(4, 25467384, 'Abdul Aziz', 'Guyo', 'Coptic Hospital', 653577, 'Pediatrics', 'SMedi@123'),
(5, 35435643, 'Vincent', 'Mwanza', 'Brother André Medical Center', 4286941, 'Pediatrics', 'SMedi@123'),
(6, 23456549, 'Samuel', 'Ratemo', 'Brother André Medical Center', 4286947, 'General/Clinical Pathology', 'SMedi@123'),
(7, 34565439, 'Pamela', 'Oteng', 'Brother André Medical Center', 4286935, 'Critical Care and Emergency', 'SMedi@123'),
(8, 34567876, 'Patricia', 'Chemutai', 'Bristol Park Hospital', 309452, 'Medical Microbiology and Infectious Diseases', 'SMedi@123'),
(9, 23456541, 'Julius', 'Chepkorir', 'Bristol Park Hospital', 309457, 'Public Health and Preventive Medicine (PhPm)', 'SMedi@123'),
(10, 23565432, 'Brenda', 'Wangui', 'Bristol Park Hospital', 309464, 'Critical Care and Emergency', 'SMedi@123'),
(11, 12345676, 'Kelvin', 'Nzomo', 'Avenue Hospital', 9875634, 'Critical Care and Emergency', 'SMedi@123'),
(12, 12345439, 'Jack', 'Ochieng', 'Aga Khan University Hospital', 98700054, 'Critical Care and Emergency', 'SMedi@123'),
(13, 12398765, 'Maimuna', 'Idris', 'Aga Khan University Hospital', 98700022, 'Pediatrics', 'SMedi@123'),
(14, 29836547, 'Dexter', 'Mwilonza', 'AAR Hospital', 40570036, 'Critical Care and Emergency', 'SMedi@123');

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
(33, 'module5.pdf', '2023-01-18 12:18:11', 2147483647),
(34, 'Betty Linter.txt', '2023-03-11 10:34:33', 66388463);

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

--
-- Dumping data for table `hospitalreg`
--

INSERT INTO `hospitalreg` (`id`, `hospital`, `branch`, `email`, `tel`, `applied`, `file`, `status`, `approval`, `approvalDate`, `mail`) VALUES
(1, 'AAR Hospital', 22, 'chuchuaisha@gmail.com', 730605500, '2023-04-12', 'SmartMedi EEHR- Doctors.pdf', 1, 'approved', '2023-04-20 13:03:56', 1),
(2, 'Aga Khan University Hospital', 20, 'akuh.nairobi@aku.edu', 111011888, '2023-04-12', 'SmartMedi EEHR- Doctors.pdf', 1, 'approved', '2023-04-20 09:29:57', 1),
(3, 'Avenue Hospital', 7, 'admin@avenuehealthcare.com', 711060200, '2023-04-12', 'SmartMedi EEHR- Doctors.pdf', 1, 'approved', '2023-04-17 14:10:09', 0),
(4, 'Bristol Park Hospital', 5, 'bpembasi@bristolpark.or.ke', 784178015, '2023-04-12', 'SmartMedi EEHR- Doctors.pdf', 1, 'approved', '2023-04-20 10:06:08', 1),
(5, 'Brother André Medical Center', 1, 'chuchuaisha@gmail.com', 792591950, '2023-04-12', 'SmartMedi EEHR- Doctors.pdf', 1, 'approved', '2023-04-20 12:06:58', 1),
(6, 'Coptic Hospital', 1, 'info@coptichospitals.org', 711043000, '2023-04-12', 'SmartMedi EEHR- Doctors.pdf', 1, 'approved', '2023-04-12 10:54:37', 0),
(7, 'Gertrude&#39;s Children&#39;s Hospital', 27, 'info@gerties.org', 207206000, '2023-04-12', 'SmartMedi EEHR- Doctors.pdf', 1, 'approved', '2023-04-12 10:36:20', 0),
(8, 'Institution Trial', 20, 'aisha.wrashid64@gmail.com', 764567744, '2023-04-18', 'README.md', 0, 'Not-Reveiwed', '0000-00-00 00:00:00', 0),
(9, 'Institution Trial 2', 12, 'aisha.wrashid64@gmail.com', 76434567, '2023-04-18', 'README.md', 0, 'Not-Reveiwed', '0000-00-00 00:00:00', 0),
(10, 'Halisi Family Hospital nanyuki', 10, 'aisha.wrashid64@gmail.com', 78654567, '2023-04-18', 'README.md', 0, 'Not-Reveiwed', '0000-00-00 00:00:00', 0),
(11, 'Final Hospital email', 14, 'aisha.wrashid64@gmail.com', 756378463, '2023-04-18', 'README.md', 0, 'Not-Reveiwed', '0000-00-00 00:00:00', 0),
(17, 'Pona Hospital', 5, 'ponamedicalfacility@gmail.com', 745676543, '2023-04-20', 'README.md', 0, 'Not-Reveiwed', '0000-00-00 00:00:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `hospitals`
--

CREATE TABLE `hospitals` (
  `hospitalID` int(11) NOT NULL,
  `hospital` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hospitals`
--

INSERT INTO `hospitals` (`hospitalID`, `hospital`) VALUES
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
(11, 'Kenyatta University Teaching, Referral, and Research Hospital'),
(12, 'AIC Kijabe Hospital Nairobi Medical Center'),
(13, 'Lifecare Hospitals Kenya'),
(14, 'The Nairobi Hospital Outpatient Center'),
(15, 'Kenya Defense Forces Memorial Hospital'),
(16, 'Mediheal Group of Hospitals, Upperhill'),
(17, 'Gatundu Level 5 Hospital'),
(18, 'Kerugoya County Referral Hospital'),
(19, 'Kiambu County Referral Hospital'),
(20, 'Murang\'a County Referral Hospital'),
(21, 'Afya International Hospital'),
(22, 'Alfarooq Hospital'),
(23, 'Bomu Hospital'),
(24, 'Diani Beach Hospital'),
(25, 'Hola County Referral Hospital'),
(26, 'Pandya Memorial Hospital'),
(27, 'Aga Khan Hospital, Mombasa'),
(28, 'Consolata Hospital Nkubu'),
(29, 'Embu Provincial General Hospital'),
(30, 'Galaxy Hospital'),
(31, 'Kitui County Referral Hospital'),
(32, 'Machakos Hospital'),
(33, 'Makueni County Referral Hospital'),
(34, 'Maua Methodist Hospital'),
(35, 'Our Lady of Lourdes Mutomo Hospital'),
(36, 'PCEA Chogoria Hospital'),
(37, 'Mandera County Referral Hospital'),
(38, 'Shamaal Hospital'),
(39, 'Aga Khan Hospital, Kisumu'),
(40, 'Bosongo Hospital'),
(41, 'Jaramogi Oginga Odinga Teaching & Referral Hospital'),
(42, 'Kendu Adventist Hospital'),
(43, 'Tenwek Hospital'),
(44, 'Barnet Memorial Hospital, Kabarnet'),
(45, 'Nakuru Level 6 Hospital'),
(46, 'Nanyuki Cottage Hospital'),
(47, 'Mediheal Hospital and Fertility Center, Uasin Gishu'),
(48, 'Narok County Referral Hospital'),
(49, 'Catholic Hospital Wamba'),
(50, 'Bungoma County Referral Hospital'),
(51, 'Busia County Referral Hospital'),
(52, 'Jumuia Friends Hospital Kaimosi'),
(53, 'Kakamega County General Teaching & Referral Hospital');

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
(2, 'Individual', 620145, 'Old Mutual Life Assurance Company Limited', 2264087, 'Fatuma Wairimu Rashid', '2024-12-07', 29816629),
(3, 'Individual', 5367849, '', 0, '', '0000-00-00', 63748264),
(4, 'Civil Servant', 6374827, '', 0, '', '0000-00-00', 68493736),
(6, 'Employee', 3547826, '', 0, '', '0000-00-00', 367482725),
(8, 'Individual', 35727489, 'ICEA LION General Insurance Company Limited', 64829472, 'Allan Keverenge', '2024-01-01', 2147485),
(12, 'Individual', 456738, 'UAP Life Assurance Limited', 65378409, 'Goosey Lucy', '2024-03-07', 66388463),
(13, 'Individual', 14381499, 'APA Insurance Limited', 1530788, 'Aisha Wanja Rashid', '2023-07-01', 33179878),
(14, 'Individual', 5638463, 'Metropolitan Life Insurance Kenya Limited', 34566543, 'Trial Three', '2024-01-09', 54737364);

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
(3, 'Farida', 'Karanja', 'Parent', '0702567348', 2147483647),
(4, 'Dianah', 'Karanja', 'Parent', '254759320031', 29816629),
(5, 'Fatuma', 'Rashid', 'Parent', '0719876530', 63748264),
(7, 'Dianah', 'Karanja', 'Parent', '0731421925', 33179878);

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

--
-- Dumping data for table `patients`
--

INSERT INTO `patients` (`ID`, `FirstName`, `LastName`, `TelNo`, `IDNo`, `DOB`, `gender`, `bloodgroup`, `email`, `county`, `town`, `password`, `filename`, `role`) VALUES
(1, 'Fatuma', 'Rashid', '273940287', 53664673, '1995-11-09', 'Female', 'O+', 'fatuma@yahoo.com', 'Kilifi', 'Malindi', 'fdc0978bc0cc4c37c3e3d44fc63ee487', '', 'patient'),
(2, 'Ashraf', 'Mbulika', '63647828', 63748264, '2020-07-07', 'Male', 'AB+', 'ashraf@yahoo.com', 'Machakos', 'Athi River', '508924b0eac2ba101ada28841c931e44', '', 'patient'),
(3, 'Rehema', 'Rashid', '637483625', 68493736, '1998-03-10', 'Female', 'O+', 'rehema@yahoo.com', 'Nairobi City', 'Nairobi', '5eaf0467a7fdc9fe2a16b9b8a8fd8b4a', '', 'patient'),
(4, 'Suhaila', 'Salim', '73849837', 82736745, '2017-07-21', 'Female', 'O+', 'suhaila@yahoo.com', 'Kajiado', 'Kitengela', 'e8b3ca806fd3c5e8e18368994a7ee305', '', 'patient'),
(5, 'Rashid', 'Thomas', '73883635', 367482725, '1988-10-13', 'Male', 'A+', 'rashid@yahoo.com', 'Nairobi City', 'Nairobi', '7d0ba610dea3dbcc848a97d8dfd767ae', '', 'patient'),
(6, 'Allan', 'Keverenge', '254795856', 2147485, '1988-03-15', 'Male', 'B-', 'allan@yahoo.com', 'Homa Bay', 'Homa Bay', 'b993e4526238d62f6b1b90e605532ff8', '', 'patient'),
(7, 'Monica', 'Ndunge', '+254788741200', 49798885, '1991-02-05', 'Female', 'O-', 'monica@gmail.com', 'Machakos', 'Machakos', 'ff0d813dd5d2f64dd372c6c4b6aed086', '', 'patient'),
(8, 'Cherlyne ', 'Obeyo', '+254719267540', 78978568, '1992-08-18', 'Female', 'AB+', 'cherlyneobeyo@gmail.com', 'Kakamega', 'Kakamega', 'b5e6859e6c6d07090ee1fc3bb85ec441', '', 'patient'),
(9, 'Satish', 'Kumar', '+254752861926', 79858912, '1987-10-08', 'Male', 'B+', 'satish@yahoo.com', 'Kilifi', 'Kilifi', 'b8377b23bb86899405d2455cc6da3556', '', 'patient'),
(10, 'Winfred', 'Kamunge', '+254752528962', 56552345, '1979-01-25', 'Female', 'A+', 'winfred@gmail.com', 'Kericho', 'Kericho', 'cfeee3fc113367fb6ea82084621e5c0d', '', 'patient'),
(11, 'Annastacia', 'Mbula', '+254718097856', 66989559, '1972-07-01', 'Female', 'A-', 'annastacia@gmail.com', 'Makueni', 'Wote', '2708535b89a179fe383b3b548048687f', '', 'patient'),
(12, 'Mary', 'Wambui', '+254725898989', 9873268, '1993-09-17', 'Female', 'O+', 'mary@gmail.com', 'Kiambu', 'Kiambu', 'b8e7be5dfa2ce0714d21dcfc7d72382c', '', 'patient'),
(13, 'Martin ', 'Sendeyo', '+254710252863', 4879885, '1983-02-17', 'Male', 'AB+', 'martin@gmail.com', 'Busia', 'Busia', '925d7518fc597af0e43f5606f9a51512', '', 'patient'),
(14, 'Peter', 'Mburu', '+254716688262', 6598569, '1976-05-13', 'Male', 'O-', 'peter@yahoo.com', 'Kirinyaga', 'Kirinyaga', '51dc30ddc473d43a6011e9ebba6ca770', '', 'patient'),
(15, 'Timothy', 'Oketch', '+254720858623', 123456789, '1996-04-02', 'Male', 'AB-', 'timothy@gmail.com', 'Kisumu', 'Kisumu', 'ecb97d53d2d35b8ba98cf82a8d78cad9', '', 'patient'),
(16, 'Erastus', 'Kinyua', '+254734528692', 544856500, '1977-10-09', 'Male', 'B-', 'erastus@yahoo.com', 'Embu', 'Embu', '029028fb57ad37f32281997724b97949', '', 'patient'),
(17, 'Faith', 'Katunge', '+25478595596', 56588966, '1995-11-20', 'Female', 'O+', 'faith@gmail.com', 'Elgeyo/Marakwet', 'Marakwet', 'ecee7df9bbac50b9b428483bfea1dd7c', '', 'patient'),
(18, 'Mark', 'Njoroge', '+2547285689', 30562389, '1999-03-18', 'Male', 'B-', 'mark@gmail.com', 'Kajiado', 'kajiado', 'ea82410c7a9991816b5eeeebe195e20a', '', 'patient'),
(19, 'Abdi', 'Osman', '+254720548562', 678456566, '2002-03-29', 'Male', 'AB-', 'abdi@gmail.com', 'Garissa', 'Garissa', '311eba6dada049960e16974e652ef134', '', 'patient'),
(20, 'Abdul', 'Imboha', '+2547856622', 6588689, '1988-12-23', 'Male', 'B+', 'abdul@gmail', 'Bungoma', 'Bungoma', '82027888c5bb8fc395411cb6804a066c', '', 'patient'),
(21, 'Sophia', 'Mwenje', '+2547582544', 2559655, '1983-06-08', 'Female', 'AB-', 'sophia@gmail.com', 'Trans Nzoia', 'Trans Nzoia', '2ee0272b8e1a9705dc3ebe91c10b32f4', '', 'patient'),
(22, 'Biko', 'Biko', '+254710566555', 874797989, '1996-05-14', 'Male', 'O-', 'biko@gmail.com', 'Nairobi City', 'Nairobi', '3aeb4f9aab7e034b7722f070831bce41', '', 'patient'),
(23, 'Samantha', 'Makori', '+254720586321', 96542356, '1967-04-10', 'Female', 'A+', 'samantha@gmail.com', 'Nairobi City', 'Nairobi', 'f01e0d7992a3b7748538d02291b0beae', '', 'patient'),
(24, 'Vitalis', 'Junior', '+254712358256', 545586598, '1994-07-07', 'Male', 'AB+', 'vitalis@gmail.com', 'Vihiga', 'Vihiga', '92b20c90c1bc317620c82dc41b4eb9fd', '', 'patient'),
(25, 'Fatuma', 'Rashid', '254719829526', 29816629, '1993-04-02', 'Female', 'O+', 'fatumarashid4@gmail.com', 'Kajiado', 'Kitengela', '407aa911747042d7f046b62feaf8b4c4', '', 'patient'),
(26, 'Jeff', 'Githae', '254743567854', 43628735, '1996-07-05', 'Male', 'O+', 'jeffgithae@gmail.com', 'Kiambu', 'Kiambu', '166ee015c0e0934a8781e0c86a197c6e', '', 'patient'),
(27, 'Aisha', 'Rashid', '0703277202', 2147483647, '1996-06-25', 'Female', 'O+', 'chuchuaisha@gmail.com', 'Nairobi City', 'Nairobi', 'a381bedb5d4478053eb04be35f8798dd', 'ppic.jpg', 'patient'),
(28, 'Chicken', 'Licken', '0737472368', 47388377, '1992-06-06', 'Male', 'A-', 'chickenlicken@gmail.com', 'Kilifi', 'Malindi', 'cdf3aead074cf574c5ce6c9ce76c2e41', '', 'patient'),
(29, 'Henny', 'Penny', '0764537584', 53648273, '1982-09-06', 'Female', 'AB+', 'hennypenny@gmail.com', 'Nairobi City', 'Ngara', 'penny', '', 'patient'),
(30, 'Ducky', 'Lucky', '0736452749', 24367838, '1990-03-17', 'Female', 'O-', 'duckylucky@yahoo.com', 'Kakamega', 'Isulu', '56975b83de847aa2ee9b2493b6c4bd8f', '', 'patient'),
(31, 'Goosey', 'Lucy', '0726836237', 66388463, '1990-12-09', 'Female', 'A-', 'glucy@gmail.com', 'Nairobi City', 'Umoja', 'aa7a60d9e3f05d9e068c4ba4d3608978', 'gooseyL (2).jfif', 'patient'),
(33, 'Turkey', 'Lucky', '0745384637', 33432676, '1993-03-11', 'Male', 'AB-', 'tlucky@gmail.com', 'Kiambu', 'Ndumberi', 'db77174aa34ded1b6139455a58d0a38b', '', 'patient'),
(34, 'Lemony', 'Snicket', '0736254637', 53748393, '1990-10-10', 'Male', 'O+', 'lsnicket@gmail.com', 'Nairobi City', 'Nairobi', '5684f59763b080bb179fe408b64191bd', 'juice2.jpg', 'patient'),
(35, 'Sheldon', 'Cooper', '0734973497', 33857490, '1991-06-18', 'Male', 'O+', 'scooper@gmail.com', 'Nairobi City', 'Pumwani', 'fcfff28fdbbbf75face3b3d97fdbfc15', 'pancakes.jpg', 'patient'),
(40, 'Aisha', 'Rashid', '0703277202', 33179878, '1996-06-25', 'Female', 'O+', 'chuchuaisha@gmail.com', 'Kajiado', 'Kitengela', 'aae82dfe8d1d25acb0947aad2a77d487', '20200604_120107.jpg', 'patient'),
(41, 'Meshack', 'Milimo', '0703283923', 33535687, '1989-08-07', 'Male', 'B+', 'mmilimo@gmail.com', 'Machakos', 'Kangundo', '2269d672abe86cdd5867e78b65ddb940', 'courage-the-cowardly-dog-dog-animals-tv-wallpaper-preview.jpg', 'patient'),
(42, 'Kelly', 'Kapoor', '0703277202', 35239857, '1992-11-06', '', '', 'kkapoor@gmail.com', '', 'Gede', 'ae074a5692dfb7c26aae5147e52ceb40', '', 'patient'),
(43, 'trial', 'two', '245463746', 253632536, '2019-02-05', 'Female', 'AB+', 'trial@gmail.com', 'Bungoma', 'Nairobi', '58723627fcebc230ab0d53ddf5f16e34', 'gallery-04.jpg', 'patient'),
(44, 'trial', 'three', '36474836', 54737364, '1995-02-05', 'Male', 'B+', 'trial@gmail.com', 'Kericho', 'kitale', '8943be948c11e8ff266c8fc52b0a8826', 'img-3.jpg', 'patient'),
(45, 'Patient', 'One', '0744377736', 29735438, '1999-02-17', 'Male', 'O+', 'pt1one@gmail.com', 'Nairobi City', 'Nairobi', 'c7ec2916ae31da9734952741ed70d08d', 'userMale.JPG', 'patient');

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
(5, 2147483647, 'Respiratory and Ear Nose and Throat (ENT) disorders, Gastro-intestinal disorders, Gynaecological and Obstetric disorders, Neurological and psychological disorders,  ,Eye related disorders ,Skin disorders', 'reactive to iboprufen, dust particles, strong perfumes, eggs, reactive to paracetamol,sulphur, pollen', 'diagnosed with allergic rhinitis, hiatus hernia, peptic ulcers, endometriosis, anxiety and panic attacks ,short-sighted ,Diagnosed with Acne'),
(6, 29816629, 'Cardiovascular (heart and blood vessels) disorders, Respiratory and Ear Nose and Throat (ENT) disorders, Endocrine disorders, Gastro-intestinal disorders, Gynaecological and Obstetric disorders, Musculoskeletal disorders, Skin disorders, ', 'Dust, Kerosene, pollen ', 'Relatives suffering from - High blood pressure, Diabetes, peptic ulcers, arthritis, keloids\r\nPatient suffering from - asthma, ovarian cyst\r\n'),
(7, 82736745, '', 'NIL', ''),
(8, 367482725, 'Gastro-intestinal disorders, ', 'Sulphur', 'Diagnosed with Gastritis on January 2020'),
(9, 2147485, 'Cardiovascular (heart and blood vessels) disorders, Respiratory and Ear Nose and Throat (ENT) disorders, ', 'Dust and smoke particles,\r\nAnimal Protein', 'Close relatives diagnosed with High blood pressure and asthma'),
(10, 49798885, 'Eye related disorders, ', '', 'Glaucoma'),
(11, 6598569, 'Cardiovascular (heart and blood vessels) disorders, Endocrine disorders, Musculoskeletal disorders, ', 'Dust and Pollen', 'Relatives with High Blood Pressure problems, \r\nSelf diagnosed with sporting pelvic injury and diabetes'),
(12, 33179878, 'Cancer, growths or tumors, Cardiovascular (heart and blood vessels) disorders, Respiratory and Ear Nose and Throat (ENT) disorders, Endocrine disorders, Eye related disorders, Gastro-intestinal disorders, Musculoskeletal disorders, ', 'Nil', 'Self - diagnosed with Hiatus hernia type 3 (Endoscopy report of 2019) and GERD(Gastro-Intestinal Reflux Disease) \r\nFamily - immediate family diagnosed with several types of cancers (including pancreatic, colon and cervical), High blood pressure, diabetes, asthma, arthritis and glaucoma.'),
(13, 35239857, '', '', '');

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
  ADD PRIMARY KEY (`ID_dep`);

--
-- Indexes for table `docnotes`
--
ALTER TABLE `docnotes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `docnotesdependants`
--
ALTER TABLE `docnotesdependants`
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
-- Indexes for table `hospitalreg`
--
ALTER TABLE `hospitalreg`
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `billing`
--
ALTER TABLE `billing`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

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
  MODIFY `ID_dep` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `docnotes`
--
ALTER TABLE `docnotes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `docnotesdependants`
--
ALTER TABLE `docnotesdependants`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `docspecialty`
--
ALTER TABLE `docspecialty`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `doctors`
--
ALTER TABLE `doctors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `fileupload`
--
ALTER TABLE `fileupload`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `hospitalreg`
--
ALTER TABLE `hospitalreg`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `hospitals`
--
ALTER TABLE `hospitals`
  MODIFY `hospitalID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `insurance`
--
ALTER TABLE `insurance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `medicalcover`
--
ALTER TABLE `medicalcover`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `nextofkin`
--
ALTER TABLE `nextofkin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `patients`
--
ALTER TABLE `patients`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `response`
--
ALTER TABLE `response`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
