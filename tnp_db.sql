-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 04, 2018 at 07:57 AM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.0.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tnp_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_info`
--

CREATE TABLE `admin_info` (
  `adminEmail` varchar(60) NOT NULL,
  `adminPassword` text NOT NULL,
  `adminRegId` varchar(11) NOT NULL,
  `adminName` varchar(60) NOT NULL,
  `adminMobile` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_info`
--

INSERT INTO `admin_info` (`adminEmail`, `adminPassword`, `adminRegId`, `adminName`, `adminMobile`) VALUES
('admin@pict.edu', 'admin', 'S1234567890', 'Admin PICT', '9812345670');

-- --------------------------------------------------------

--
-- Table structure for table `student_be`
--

CREATE TABLE `student_be` (
  `studentEmail` varchar(60) NOT NULL,
  `feOrDiplomaMarksObtained` int(11) NOT NULL,
  `feOrDiplomaMarksOutOf` int(11) NOT NULL,
  `seMarksObtained` int(11) NOT NULL,
  `seMarksOutOf` int(11) NOT NULL,
  `teMarksObtained` int(11) NOT NULL,
  `teMarksOutOf` int(11) NOT NULL,
  `beMarksObtained` int(11) NOT NULL,
  `beMarksOutOf` int(11) NOT NULL,
  `backlog` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student_be`
--

INSERT INTO `student_be` (`studentEmail`, `feOrDiplomaMarksObtained`, `feOrDiplomaMarksOutOf`, `seMarksObtained`, `seMarksOutOf`, `teMarksObtained`, `teMarksOutOf`, `beMarksObtained`, `beMarksOutOf`, `backlog`) VALUES
('vaibhav@gmail.com', 1200, 1400, 1200, 1400, 1200, 1400, 1200, 1400, 0);

-- --------------------------------------------------------

--
-- Table structure for table `student_hsc`
--

CREATE TABLE `student_hsc` (
  `studentEmail` varchar(60) NOT NULL,
  `board` varchar(50) NOT NULL,
  `institute` varchar(50) NOT NULL,
  `marksObtained` varchar(50) NOT NULL,
  `marksOutOf` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student_hsc`
--

INSERT INTO `student_hsc` (`studentEmail`, `board`, `institute`, `marksObtained`, `marksOutOf`) VALUES
('vaibhav@gmail.com', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `student_info`
--

CREATE TABLE `student_info` (
  `studentEmail` varchar(60) NOT NULL,
  `studentRegId` varchar(11) NOT NULL,
  `studentName` varchar(60) NOT NULL,
  `studentPassword` text NOT NULL,
  `studentCourse` varchar(10) NOT NULL,
  `studentBranch` varchar(10) NOT NULL,
  `studentRollNo` int(11) NOT NULL,
  `studentGender` varchar(10) NOT NULL,
  `studentMobile` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Student basic information table';

--
-- Dumping data for table `student_info`
--

INSERT INTO `student_info` (`studentEmail`, `studentRegId`, `studentName`, `studentPassword`, `studentCourse`, `studentBranch`, `studentRollNo`, `studentGender`, `studentMobile`) VALUES
('akash@gmail.com', 'C2K16207191', 'Akash', '123456', 'BE', 'IT', 3910, '', NULL),
('sagar@gmail.com', '44123456789', 'Sagar Hire', '123456', 'BE', 'Comp', 3428, '', NULL),
('vaibhav@gmail.com', 'C2K16207181', 'Vaibhav Kumbhar', 'vaibhav', 'BE', 'Comp', 3434, 'MALE', '9890811301');

-- --------------------------------------------------------

--
-- Table structure for table `student_ssc`
--

CREATE TABLE `student_ssc` (
  `studentEmail` varchar(60) NOT NULL,
  `board` varchar(50) NOT NULL,
  `institute` varchar(50) NOT NULL,
  `passingYear` year(4) NOT NULL,
  `marksObtained` int(11) NOT NULL,
  `marksOutOf` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student_ssc`
--

INSERT INTO `student_ssc` (`studentEmail`, `board`, `institute`, `passingYear`, `marksObtained`, `marksOutOf`) VALUES
('vaibhav@gmail.com', 'SSC', 'NESW', 2013, 519, 550);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `student_be`
--
ALTER TABLE `student_be`
  ADD PRIMARY KEY (`studentEmail`);

--
-- Indexes for table `student_hsc`
--
ALTER TABLE `student_hsc`
  ADD PRIMARY KEY (`studentEmail`);

--
-- Indexes for table `student_info`
--
ALTER TABLE `student_info`
  ADD PRIMARY KEY (`studentEmail`),
  ADD UNIQUE KEY `studentRegId` (`studentRegId`);

--
-- Indexes for table `student_ssc`
--
ALTER TABLE `student_ssc`
  ADD PRIMARY KEY (`studentEmail`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `student_be`
--
ALTER TABLE `student_be`
  ADD CONSTRAINT `foreignkey_be` FOREIGN KEY (`studentEmail`) REFERENCES `student_info` (`studentEmail`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `student_hsc`
--
ALTER TABLE `student_hsc`
  ADD CONSTRAINT `fkk_hsc` FOREIGN KEY (`studentEmail`) REFERENCES `student_info` (`studentEmail`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `student_ssc`
--
ALTER TABLE `student_ssc`
  ADD CONSTRAINT `FK` FOREIGN KEY (`studentEmail`) REFERENCES `student_info` (`studentEmail`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
