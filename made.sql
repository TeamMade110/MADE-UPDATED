-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 05, 2016 at 03:40 AM
-- Server version: 5.7.9
-- PHP Version: 7.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `made`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_users`
--

DROP TABLE IF EXISTS `admin_users`;
CREATE TABLE IF NOT EXISTS `admin_users` (
  `id` int(11) NOT NULL,
  `firstName` varchar(30) DEFAULT NULL,
  `lastName` varchar(30) DEFAULT NULL,
  `ssn` varchar(9) DEFAULT NULL,
  `userName` varchar(30) DEFAULT NULL,
  `pass` varchar(45) DEFAULT NULL,
  `timeStamp` varchar(45) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `phone` varchar(45) DEFAULT NULL,
  `profession` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=big5 COMMENT='Get ride of LL mod rewrite';

-- --------------------------------------------------------

--
-- Table structure for table `appointment`
--

DROP TABLE IF EXISTS `appointment`;
CREATE TABLE IF NOT EXISTS `appointment` (
  `appointmentID` int(11) NOT NULL,
  `patientID` int(11) NOT NULL,
  `date` varchar(8) NOT NULL,
  `time` varchar(3) NOT NULL,
  `locationName` varchar(45) NOT NULL,
  `locationAddress` varchar(45) NOT NULL,
  `doctorName` varchar(45) NOT NULL,
  `purpose` tinytext NOT NULL,
  PRIMARY KEY (`appointmentID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `appointment`
--

INSERT INTO `appointment` (`appointmentID`, `patientID`, `date`, `time`, `locationName`, `locationAddress`, `doctorName`, `purpose`) VALUES
(0, 1, '19450902', '12', 'ABCDEFG', '111 Address Dr', 'Terry Chan', 'Visual inspection of ...'),
(10, 1, '20160605', '3PM', 'Gillespie Hospital', '123 Gillespie Dr, GG 99099', 'Haejoon', 'Body Inspection'),
(3, 1, '20160601', '9AM', 'Gillespie Hospital', '123 Gillespie Dr, GG 99099', 'Haejoon', 'Private part inspection'),
(1, 1, '20160606', '3PM', 'Happy Wheel', '123 Happy Wheel Dr', 'Dr. Terry Chan', 'Play Happy Wheel and\r\nTry bicycle'),
(2, 1, '20160505', '2AM', 'Gillespie Hospital', '123 Gillespie Dr, GG 99099', 'Dr. Terry Chan', 'Body Inspection');

-- --------------------------------------------------------

--
-- Table structure for table `medical_record`
--

DROP TABLE IF EXISTS `medical_record`;
CREATE TABLE IF NOT EXISTS `medical_record` (
  `medicalRecordID` int(11) NOT NULL,
  `patientID` int(11) NOT NULL,
  `temperature` varchar(3) NOT NULL,
  `pulse` varchar(45) NOT NULL,
  `respiratory` varchar(45) NOT NULL,
  `height` varchar(45) NOT NULL,
  `weight` varchar(45) NOT NULL,
  `bmi` varchar(45) NOT NULL,
  `nutrition` varchar(45) NOT NULL,
  `medications` tinytext NOT NULL,
  `allergies` tinytext NOT NULL,
  `diseases` tinytext NOT NULL,
  `doctorsNotes` tinytext NOT NULL,
  `assignedProvider` varchar(45) NOT NULL,
  `smoking` varchar(3) NOT NULL,
  `alcohol` varchar(45) NOT NULL,
  `timeStamp` timestamp NOT NULL,
  `doctorName` varchar(45) NOT NULL,
  PRIMARY KEY (`medicalRecordID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `medical_record`
--

INSERT INTO `medical_record` (`medicalRecordID`, `patientID`, `temperature`, `pulse`, `respiratory`, `height`, `weight`, `bmi`, `nutrition`, `medications`, `allergies`, `diseases`, `doctorsNotes`, `assignedProvider`, `smoking`, `alcohol`, `timeStamp`, `doctorName`) VALUES
(0, 1, '37', '90/130', 'Bad', '180cm', '90kg', '2', 'Good', 'Hydrogen Peroxide\r\nPotassium Dioxide', 'None', 'Running Nose\r\nCough', 'Good', 'Gillespie Hospital', 'Yes', 'None', '2016-06-05 00:17:17', 'Haejoon'),
(1, 1, '39', '70/120', 'Good', '130mm', '120kg', '1', 'good', 'Panadol\r\nAsprine\r\n', 'Butter\r\nEgg', 'Diabetes\r\nCough', 'Your life is about to end\r\nSo happy is most important', 'Gillespie Hospital', 'No', '6 Bottles a day', '2016-06-05 00:17:26', 'Terry Chan');

-- --------------------------------------------------------

--
-- Table structure for table `message_doctor`
--

DROP TABLE IF EXISTS `message_doctor`;
CREATE TABLE IF NOT EXISTS `message_doctor` (
  `messageID` int(11) NOT NULL,
  `patientID` int(11) NOT NULL,
  `messageSubject` tinytext NOT NULL,
  `messageText` text NOT NULL,
  `doctorName` varchar(45) NOT NULL,
  `timeStamp` timestamp NOT NULL,
  PRIMARY KEY (`messageID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `message_doctor`
--

INSERT INTO `message_doctor` (`messageID`, `patientID`, `messageSubject`, `messageText`, `doctorName`, `timeStamp`) VALUES
(2, 1, 'Terry Gillespie: Request Appointment', 'I want an appointment tomorrow at 3 PM', 'Haejoon', '2016-06-05 00:46:59'),
(5, 1, 'Doctor: Request Approved', 'Your appointment is approved\r\nPlease check you upcoming appointment page', 'Haejoon', '2016-06-05 00:57:26'),
(1, 1, 'Doctor: Confirm Appointment', 'Your appointment is approved\r\nPlease check your upcoming appointment page.', 'Haejoon', '2016-06-05 00:46:52'),
(0, 1, 'Terry Gillespie: Request Appointment', 'I want an appointment tomorrow morning at 9AM.', 'Haejoon', '2016-06-05 00:46:45');

-- --------------------------------------------------------

--
-- Table structure for table `patient_profile`
--

DROP TABLE IF EXISTS `patient_profile`;
CREATE TABLE IF NOT EXISTS `patient_profile` (
  `patientID` int(11) NOT NULL,
  `pUsername` varchar(45) NOT NULL,
  `password` varchar(45) NOT NULL,
  `firstName` varchar(45) DEFAULT NULL,
  `lastName` varchar(45) DEFAULT NULL,
  `sex` varchar(6) DEFAULT NULL,
  `age` varchar(3) DEFAULT NULL,
  `ssn` varchar(9) DEFAULT NULL,
  `DOB` varchar(8) DEFAULT NULL,
  `phone` varchar(10) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `address` varchar(45) DEFAULT NULL,
  `zip` varchar(5) DEFAULT NULL,
  `state` varchar(2) DEFAULT NULL,
  `primaryCare` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`patientID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `patient_profile`
--

INSERT INTO `patient_profile` (`patientID`, `pUsername`, `password`, `firstName`, `lastName`, `sex`, `age`, `ssn`, `DOB`, `phone`, `email`, `address`, `zip`, `state`, `primaryCare`) VALUES
(1, 'USER', '133e3d6b775613651eaedbf7e609d244f2f852af', 'Terry', 'Gillespie', 'Unknow', '40', '123456789', '19450902', '0000000000', 'Terry@Gillespie.com', '123 Address Dr', '54321', 'GG', 'No recent visit'),
(2, 'DuTerry', 'fd79aa5b6f123db3060cbed646243a61e982cc64', 'Terry', 'Du', 'UnKnow', '12', '987654321', '19390901', '1119995555', 'Du@Du.com', '111 Du Dr.', '11111', 'DU', 'DUDUDUDU');

-- --------------------------------------------------------

--
-- Table structure for table `primary_care`
--

DROP TABLE IF EXISTS `primary_care`;
CREATE TABLE IF NOT EXISTS `primary_care` (
  `primaryCareID` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `address` varchar(45) NOT NULL,
  `zip` varchar(5) NOT NULL,
  `state` varchar(2) NOT NULL,
  `phone` varchar(10) NOT NULL,
  `hours` varchar(10) NOT NULL,
  PRIMARY KEY (`primaryCareID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `primary_care`
--

INSERT INTO `primary_care` (`primaryCareID`, `name`, `address`, `zip`, `state`, `phone`, `hours`) VALUES
(0, 'A', 'A Address', '12345', 'AA', '1234567890', '123'),
(1, 'B', 'B Address', '09876', 'BB', '8388383838', 'lkadjf'),
(2, 'Gillespie Hospital', '123 Gillespie Dr', '99099', 'GG', '3837478882', '10AM-10PM');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
