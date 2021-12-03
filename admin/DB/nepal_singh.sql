-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 15, 2017 at 11:51 AM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `nepal_singh`
--

-- --------------------------------------------------------

--
-- Table structure for table `add_reciver_gaurdian_info`
--

CREATE TABLE `add_reciver_gaurdian_info` (
  `id` int(11) NOT NULL,
  `student_id` varchar(255) NOT NULL,
  `father_name` varchar(255) NOT NULL,
  `monther_name` varchar(255) NOT NULL,
  `garjiyan_first` varchar(255) NOT NULL,
  `garjiyan_second` varchar(255) NOT NULL,
  `garjiyan_third` varchar(255) NOT NULL,
  `college_name` varchar(255) NOT NULL,
  `rec_date` text NOT NULL,
  `receiver_name` varchar(255) NOT NULL,
  `file_name` text NOT NULL,
  `mobile_no` bigint(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `add_reciver_gaurdian_info`
--

INSERT INTO `add_reciver_gaurdian_info` (`id`, `student_id`, `father_name`, `monther_name`, `garjiyan_first`, `garjiyan_second`, `garjiyan_third`, `college_name`, `rec_date`, `receiver_name`, `file_name`, `mobile_no`) VALUES
(16, 'sdasdsfdsfsf4335', 'dgfgfg', 'dfgfgfgf', 'gfg', 'gfgf', 'gfgfg', 'NEPAL SINGH  MAHILA VIDYALAY', '05/01/2017', 'ssdsds', '74598-sdsd.jpg', 7800992805),
(17, 'sdasdsfdsfsf4335', 'dgfgfg', 'dfgfgfgf', 'gfg', 'gfgf', 'gfgfg', 'NEPAL SINGH  MAHILA VIDYALAY', '05/01/2017', 'Ramu', '74598-sdsd.jpg', 9839301200),
(18, 'Abhay4468', 'ABC', 'XYZ', 'ABC', 'ABC2', 'ABC3', 'ON KAR SINGH BACHPANA', '05/01/2017', 'fgfdgdg', '36499-y.jpg', 0),
(19, 'sdasdsfdsfsf20520', 'dgfgfg', 'dfgfgfgf', 'gfg', 'gfgf', 'gfgfg', 'NEPAL SINGH  MAHILA VIDYALAY', '05/03/2017', 'jbkh', '', 0),
(20, 'Abhay4468', 'ABC', 'XYZ', 'ABC', 'ABC2', 'ABC3', 'ON KAR SINGH BACHPANA', '05/03/2017', 'dfsf', '64990-DSC00882.JPG', 5435353);

-- --------------------------------------------------------

--
-- Table structure for table `attendance_entry_teacher`
--

CREATE TABLE `attendance_entry_teacher` (
  `id` int(11) NOT NULL,
  `teacher_id` varchar(255) NOT NULL,
  `teacher_status` varchar(255) NOT NULL,
  `date_entry` text NOT NULL,
  `college_name` varchar(255) NOT NULL,
  `teacher_name` varchar(255) NOT NULL,
  `principle_id` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `attendance_entry_teacher`
--

INSERT INTO `attendance_entry_teacher` (`id`, `teacher_id`, `teacher_status`, `date_entry`, `college_name`, `teacher_name`, `principle_id`) VALUES
(1, 'vsdfs22170', 'Present', '04/25/2017', '3', 'vsdfs', 'upper27087'),
(2, 'drgdg12101', 'Present', '04/27/2017', '3', 'drgdg', 'upper27087'),
(3, 'sumit24624', 'Present', '04/28/2017', '3', 'sumit', 'upper27087');

-- --------------------------------------------------------

--
-- Table structure for table `castes`
--

CREATE TABLE `castes` (
  `id` int(11) NOT NULL,
  `castes_name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `castes`
--

INSERT INTO `castes` (`id`, `castes_name`) VALUES
(1, 'General'),
(2, 'OBC'),
(3, 'SC'),
(4, 'ST');

-- --------------------------------------------------------

--
-- Table structure for table `college`
--

CREATE TABLE `college` (
  `id` int(11) NOT NULL,
  `college_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `college`
--

INSERT INTO `college` (`id`, `college_name`) VALUES
(1, 'NEPAL SINGH MAHAVIDYALAY/P.G. KAZIKAMALPUR'),
(2, 'NEPAL SINGH MAHAVIDYALAY/P.G. HARGOAN'),
(3, 'NEPAL SINGH  MAHILA VIDYALAY'),
(4, 'ON KAR SINGH BACHPANA ');

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `id` int(11) NOT NULL,
  `course_num` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `course_num`) VALUES
(1, 1),
(2, 2),
(3, 3),
(4, 4),
(5, 5),
(6, 6);

-- --------------------------------------------------------

--
-- Table structure for table `course_fees`
--

CREATE TABLE `course_fees` (
  `id` int(11) NOT NULL,
  `course_class` int(5) NOT NULL,
  `course_class_fee` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `course_fees`
--

INSERT INTO `course_fees` (`id`, `course_class`, `course_class_fee`) VALUES
(1, 1, 1671),
(2, 2, 1704),
(3, 3, 1721),
(4, 4, 1726),
(5, 5, 2006),
(6, 6, 2406);

-- --------------------------------------------------------

--
-- Table structure for table `department_name`
--

CREATE TABLE `department_name` (
  `id` int(11) NOT NULL,
  `dept_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `department_name`
--

INSERT INTO `department_name` (`id`, `dept_name`) VALUES
(2, 'Principle'),
(3, 'Teacher'),
(4, 'Staff');

-- --------------------------------------------------------

--
-- Table structure for table `fee_structure`
--

CREATE TABLE `fee_structure` (
  `id` int(11) NOT NULL,
  `standard` int(10) NOT NULL,
  `prospectus` int(10) NOT NULL,
  `admission_fee` int(10) NOT NULL,
  `activity_fee` int(10) NOT NULL,
  `annual_fee` int(10) NOT NULL,
  `monthly_fee` int(10) NOT NULL,
  `uniform_fee` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fee_structure`
--

INSERT INTO `fee_structure` (`id`, `standard`, `prospectus`, `admission_fee`, `activity_fee`, `annual_fee`, `monthly_fee`, `uniform_fee`) VALUES
(1, 1, 200, 1500, 1500, 1000, 700, 750),
(2, 2, 200, 1500, 1500, 1000, 700, 750),
(3, 3, 200, 1500, 1500, 1000, 700, 750),
(4, 4, 200, 1500, 1500, 1000, 750, 800),
(5, 5, 200, 1500, 1500, 1000, 750, 800),
(6, 6, 200, 1500, 1500, 1000, 800, 800);

-- --------------------------------------------------------

--
-- Table structure for table `manually_fees_entry_student`
--

CREATE TABLE `manually_fees_entry_student` (
  `id` int(11) NOT NULL,
  `student_fee_id` varchar(255) NOT NULL,
  `fee_month` text NOT NULL,
  `paid_date` text NOT NULL,
  `student_name` varchar(255) NOT NULL,
  `college_name` text NOT NULL,
  `amount_paid` decimal(10,2) NOT NULL,
  `class_name` varchar(255) NOT NULL,
  `year` varchar(255) NOT NULL,
  `monthly_fee` int(10) NOT NULL,
  `annual_fee` int(10) NOT NULL,
  `remaining_amount` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `manually_fees_entry_student`
--

INSERT INTO `manually_fees_entry_student` (`id`, `student_fee_id`, `fee_month`, `paid_date`, `student_name`, `college_name`, `amount_paid`, `class_name`, `year`, `monthly_fee`, `annual_fee`, `remaining_amount`) VALUES
(1, 'edgd17363', '6', '04/21/2017', 'edgd', 'ON KAR SINGH BACHPANA', '345.00', '', '', 0, 0, 0),
(2, 'fgfg26125', '4', '04/11/2017', 'fgfg', 'NEPAL SINGH MAHAVIDYALAY/P.G. KAZIKAMALPUR', '100.00', '', '', 0, 0, 0),
(3, 'hdfgdgdf22764', '6', '04/13/2017', 'hdfgdgdf', 'NEPAL SINGH MAHAVIDYALAY/P.G. KAZIKAMALPUR', '1234.00', '', '', 0, 0, 0),
(4, 'fgfg21920', '3', '04/12/2017', 'fgfg', 'NEPAL SINGH MAHAVIDYALAY/P.G. KAZIKAMALPUR', '12345.00', '', '', 0, 0, 0),
(5, '', '0', '', '', '', '0.00', '', '', 0, 0, 0),
(6, 'dfhfgh22025', 'April', '04/12/2017', 'dfhfgh', 'NEPAL SINGH MAHAVIDYALAY/P.G. KAZIKAMALPUR', '12345.00', '', '', 0, 0, 0),
(7, 'dfhfgh22025', 'April', '04/12/2017', 'dfhfgh', 'NEPAL SINGH MAHAVIDYALAY/P.G. KAZIKAMALPUR', '12345.00', '', '', 0, 0, 0),
(8, 'dfhfgh22025', 'March', '04/12/2017', 'dfhfgh', 'NEPAL SINGH MAHAVIDYALAY/P.G. HARGOAN', '12345.00', '', '', 0, 0, 0),
(9, 'dfhfgh22025', 'March', '04/12/2017', 'dfhfgh', 'NEPAL SINGH MAHAVIDYALAY/P.G. KAZIKAMALPUR', '233.00', '', '', 0, 0, 0),
(10, 'edgd17363', 'April', '04/13/2017', 'edgd', 'ON KAR SINGH BACHPANA', '1234.00', '', '', 0, 0, 0),
(17, 'upper30880', 'January', '04/27/2017', 'upper', '3', '1234.00', '3', '', 0, 0, 0),
(18, 'Amit31425', 'July', '04/26/2017', 'Amit', '3', '1244.00', '2', '2021', 0, 0, 0),
(19, 'hdfgdgdf22764', 'April', '04/19/2017', 'hdfgdgdf', '3', '2234.00', '2', '2017', 0, 0, 0),
(20, 'ABX28535', 'December', '04/27/2017', 'ABX', '3', '123.00', '10', '2017', 0, 0, 0),
(21, 'Abhishek11920', 'March', '04/27/2017', 'Abhishek', '3', '2490.00', '12', '2021', 0, 0, 0),
(22, 'Amit31425', 'June', '04/26/2017', 'Amit', '3', '100.00', '4', '2020', 0, 0, 0),
(23, 'Abhishek11920', 'February', '04/27/2017', 'Abhishek', '3', '23.00', '123', '2020', 0, 0, 0),
(24, 'ABX28535', 'March', '04/27/2017', 'ABX', '3', '246.00', '12', '2019', 0, 0, 0),
(26, 'wasim2599', 'January', '04/29/2017', 'wasim', '3', '100.00', '2', '2017', 0, 0, 0),
(27, 'hdfgdgdf22764', 'January', '04/29/2017', 'hdfgdgdf', 'Please Select College Name', '100.00', '4', '2017', 0, 0, 0),
(31, 'cxxcvq12869', 'January,February,March', '05/13/2017', 'cxxcvq', '', '24.00', '3', '2017', 0, 1000, 0);

-- --------------------------------------------------------

--
-- Table structure for table `studentfees_autoenter`
--

CREATE TABLE `studentfees_autoenter` (
  `id` int(11) NOT NULL,
  `student_id` varchar(255) NOT NULL,
  `fees_month` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `student_attandance_entry`
--

CREATE TABLE `student_attandance_entry` (
  `id` int(11) NOT NULL,
  `student_id` varchar(255) NOT NULL,
  `student_status` varchar(20) NOT NULL,
  `date_entry` text NOT NULL,
  `college_name` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `student_name` varchar(255) NOT NULL,
  `teacher_id` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student_attandance_entry`
--

INSERT INTO `student_attandance_entry` (`id`, `student_id`, `student_status`, `date_entry`, `college_name`, `class`, `student_name`, `teacher_id`) VALUES
(5, 'Abhishek11920', 'Present', '04/27/2017', '3', '12', 'Abhishek', 'sumit24624'),
(7, 'abh3559', 'Present', '04/24/2017', '3', '5', 'abh', 'sumit24624'),
(8, 'abh3559', 'Absent', '04/25/2017', '3', '12', 'abh', 'upper27087'),
(9, 'upper30880', 'Present', '04/28/2017', '3', '12', 'upper', 'upper27087'),
(10, 'Abhishek11920', 'Present', '04/28/2017', '3', '3', 'Abhishek', 'upper27087'),
(11, 'ABX28535', 'Present', '04/29/2017', '3', '7', 'ABX', 'Abhay17577'),
(12, 'Abhishek11920', 'Present', '04/29/2017', '3', '3', 'Abhishek', 'ABHAY22256');

-- --------------------------------------------------------

--
-- Table structure for table `student_registration_hargoan`
--

CREATE TABLE `student_registration_hargoan` (
  `id` int(11) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `father_name` varchar(255) NOT NULL,
  `monther_name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `sex` varchar(255) NOT NULL,
  `mobile_no` bigint(100) NOT NULL,
  `castes` varchar(255) NOT NULL,
  `DOB` text NOT NULL,
  `address` varchar(255) NOT NULL,
  `college` varchar(255) NOT NULL,
  `pincode` int(100) NOT NULL,
  `file_name` varchar(100) NOT NULL,
  `student_id` varchar(100) NOT NULL,
  `class_enry` varchar(100) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `admis_date` text NOT NULL,
  `transport_type` text NOT NULL,
  `garjiyan_first` varchar(255) NOT NULL,
  `garjiyan_second` varchar(255) NOT NULL,
  `prospectus` int(20) NOT NULL,
  `admission_fee` int(255) NOT NULL,
  `activity_fee` int(20) NOT NULL,
  `annual_fee` int(20) NOT NULL,
  `uniform_fee` int(20) NOT NULL,
  `transport_dis` text NOT NULL,
  `transport_price` int(20) NOT NULL,
  `courses_type` text NOT NULL,
  `monthly_fee` int(20) NOT NULL,
  `courses_price` int(20) NOT NULL,
  `garjiyan_third` varchar(255) NOT NULL,
  `total_amount` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student_registration_hargoan`
--

INSERT INTO `student_registration_hargoan` (`id`, `fname`, `lname`, `father_name`, `monther_name`, `password`, `sex`, `mobile_no`, `castes`, `DOB`, `address`, `college`, `pincode`, `file_name`, `student_id`, `class_enry`, `status`, `admis_date`, `transport_type`, `garjiyan_first`, `garjiyan_second`, `prospectus`, `admission_fee`, `activity_fee`, `annual_fee`, `uniform_fee`, `transport_dis`, `transport_price`, `courses_type`, `monthly_fee`, `courses_price`, `garjiyan_third`, `total_amount`) VALUES
(35, 'sdasdsfdsfsf', 'dfdfdfd', 'dgfgfg', 'dfgfgfgf', 'ac97fd1cdd45b4095b5186dfc47c970a7bfaa4d8', 'male', 567, 'General', '04/29/2017', 'dfgdgd', '3', 0, '', 'sdasdsfdsfsf4335', '2', 0, '04/30/2017', '2', 'gfg', 'gfgf', 200, 1500, 1500, 1000, 750, '5', 300, '3', 700, 1721, 'gfgfg', 0),
(36, 'sdasdsfdsfsf', 'dfdfdfd', 'dgfgfg', 'dfgfgfgf', 'ac97fd1cdd45b4095b5186dfc47c970a7bfaa4d8', 'male', 567, 'General', '04/29/2017', 'dfgdgd', '3', 0, '', 'sdasdsfdsfsf20520', '2', 0, '04/30/2017', '2', 'gfg', 'gfgf', 200, 1500, 1500, 1000, 750, '5', 300, '3', 700, 1721, 'gfgfg', 0),
(37, 'sdffdsf', 'sfdsffsfdfs', 'sffdd', 'ddgfd', '41a2d8d07eeb79fc9390287f20c6bb9ca7b4dfa3', 'male', 45445, 'General', '04/30/2017', 'fsfdsddgdfgdf', '3', 3433, '', 'sdffdsf14332', '2', 0, '04/05/2017', '2', 'dfgdgdgdgd', 'dgdffdgdgdg', 200, 1500, 1500, 1000, 750, '5', 300, '4', 700, 1726, 'dgdgdgfdf', 0),
(40, 'Abhay', 'Singh', 'ABC', 'XYZ', 'a21427eea16b57d89d7bdf5c1715b441272542d3', 'male', 123456, 'General', '06/08/2016', 'Indra Nagar', '4', 123456, '', 'Abhay4468', '6', 0, '05/01/2017', '1', 'ABC', 'ABC2', 200, 1500, 1500, 1000, 800, '4', 750, '6', 800, 2406, 'ABC3', 0),
(41, 'cxxcvq', 'dff', 'dsfd', 'dfss', 'c59c669b9bf605adee11c94b543389e404f14d39', 'male', 23332, 'General', '05/03/2017', 'sdfsdf', '4', 3232, '', 'cxxcvq12869', '3', 0, '05/03/2017', '2', 'dd', 'dfd', 200, 1500, 1500, 1000, 750, '6', 400, '2', 700, 1704, 'dsfdf', 7754),
(42, 'cxxcvq', 'dff', 'dsfd', 'dfss', 'c59c669b9bf605adee11c94b543389e404f14d39', 'male', 23332, 'General', '05/03/2017', 'sdfsdf', '4', 3232, '', 'cxxcvq7578', '3', 0, '05/03/2017', '2', 'dd', 'dfd', 200, 1500, 1500, 1000, 750, '', 0, '2', 700, 0, 'dsfdf', 7754),
(43, 'sdfs', 'sddsnk', 'dfdk', 'sfskdmn', '1dc4eeb24503150c0088a66d5b3b4e7a9e73cd3c', 'male', 34343, 'General', '05/03/2017', 'dfvvdfv', '4', 45, '', 'sdfs14027', '2', 0, '05/03/2017', '2', 'fdkfm', 'fcdsknmf', 200, 1500, 1500, 1000, 750, '5', 300, '3', 0, 1721, 'fsfknmk', 6971);

-- --------------------------------------------------------

--
-- Table structure for table `super_admin`
--

CREATE TABLE `super_admin` (
  `id` int(11) NOT NULL,
  `userName` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `role` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `super_admin`
--

INSERT INTO `super_admin` (`id`, `userName`, `password`, `role`) VALUES
(1, 'admin', '123456', '1');

-- --------------------------------------------------------

--
-- Table structure for table `teacher_registration`
--

CREATE TABLE `teacher_registration` (
  `id` int(11) NOT NULL,
  `fname` varchar(30) NOT NULL,
  `lname` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `sex` varchar(30) NOT NULL,
  `castes` varchar(30) NOT NULL,
  `DOB` text NOT NULL,
  `city` varchar(30) NOT NULL,
  `address` varchar(255) NOT NULL,
  `college` varchar(255) NOT NULL,
  `pincode` int(100) NOT NULL,
  `salary` bigint(100) NOT NULL,
  `mobile_no` bigint(100) NOT NULL,
  `file_name` varchar(255) NOT NULL,
  `teacher_id` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `dept_name` varchar(255) NOT NULL,
  `designation` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `joining_date` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teacher_registration`
--

INSERT INTO `teacher_registration` (`id`, `fname`, `lname`, `email`, `sex`, `castes`, `DOB`, `city`, `address`, `college`, `pincode`, `salary`, `mobile_no`, `file_name`, `teacher_id`, `password`, `dept_name`, `designation`, `status`, `joining_date`) VALUES
(31, 'abhay', 'Singh', 'vyanktesh.srivastava@gmail.com', 'male', 'OBC', '04/17/2017', 'Lucknow', 'Lucknow', 'NEPAL SINGH MAHAVIDYALAY/P.G. HARGOAN', 2332323, 200, 7800992805, '48642-thZHJ8OPTS.jpg', 'abhay12198', 'bf2ed112ede3b768ea07e178b7ace183d81c9ec6', '1', '', 0, ''),
(40, 'dfghdfgf', 'dfgdgdfg', 'a.pandey@uppertechsolutions.co', 'male', 'SC', '04/18/2017', 'dfrgdgdg', 'dgdg', 'NEPAL SINGH MAHAVIDYALAY/P.G. KAZIKAMALPUR', 0, 0, 0, '', 'dfghdfgf2142', '28460b90b3c76c07c49fe28969c456f3bc6cf044', '1', 'dgdgdfg', 0, ''),
(42, 'sdsdsdsd', 'admin', 'dfdf@gmail.com', 'male', 'OBC', '', '', '', '3', 0, 54541, 7878, '', 'sdsdsdsd1207', 'a0fcdd93cd2dfe3118c9ebe24b978e424490fef2', '3', '2323', 1, '04/28/2017'),
(43, 'dfdfdd', 'sefseff', 'uppertech@gmail.com', 'male', 'ST', '04/12/2017', '', '', 'NEPAL SINGH MAHAVIDYALAY/P.G. KAZIKAMALPUR', 0, 4535, 322, '', 'dfdfdd29732', 'ba525613882a192397b8d4d830a282776cf652d4', '1', '2323', 0, ''),
(44, 'gfg', 'dfdf', 'abidhindustan@gmail.com', 'male', 'Please Select The Caste', '', '', '', '', 0, 0, 0, '', 'gfg4578', '37c47faf51a94e054b435b149d58028c176bb0ea', '', '', 0, ''),
(45, '', '', '', '', '', '', '', '', '', 0, 0, 0, '', '10611', '93cabe08023b3520b4d3c2f305971f664a018b22', '', '', 0, ''),
(46, 'sumit', 'Kumar', 'sumit@gmail.com', 'male', 'OBC', '01/10/2017', 'Indra', 'Luckonow', '3', 123456, 85, 1234567, '', 'sumit24624', '7c4a8d09ca3762af61e59520943dc26494f8941b', '3', 'Lecturer', 1, '04/28/2017'),
(47, 'Abhay', 'Kumar', 'singhabhay396@gmail.com', 'male', 'General', '04/12/2017', 'Lucknow', 'Indra', '3', 1234567, 8, 3445, '', 'Abhay17577', '7c4a8d09ca3762af61e59520943dc26494f8941b', '4', 'Staff', 0, '04/28/2017'),
(48, 'upper', 'tech', 'uppertech2017@gmail.com', 'male', 'General', '04/04/2017', 'Lucknow', 'Lucknow', '3', 226016, 12, 7800992805, '', 'upper27087', '7c4a8d09ca3762af61e59520943dc26494f8941b', '2', 'Principle', 0, '04/28/2017'),
(49, 'dfdfdd', 'sdds', 'dfgdasasgdg@gmail.com', 'male', 'OBC', '', '', '', '', 0, 0, 0, '', 'dfdfdd20316', 'ba525613882a192397b8d4d830a282776cf652d4', '', '', 0, ''),
(50, 'sdsdsdsd', 'dssd', 'dfdssssf@gmail.com', 'male', 'General', '', '', '', '', 0, 23323, 0, '', 'sdsdsdsd613', 'a0fcdd93cd2dfe3118c9ebe24b978e424490fef2', '', '', 0, ''),
(52, 'sfsf', 'sfsf', 'a.pandey@uppertechsolutions.co', 'male', 'OBC', '', '', '', '', 0, 0, 0, '', 'sfsf5489', 'df8fbe682ae1c9f382aac141c2667e289a903abc', '', '', 0, ''),
(58, 'drgdg', 'km', 'abidhihhjjhjdffdustan@gmail.co', 'male', 'OBC', '04/26/2017', 'ffghh', 'fghfhf', '3', 232, 4554, 343, '', 'drgdg12101', 'b325e46705b5de0281be117fa29bb560e43678f2', '3', 'gfcgh', 1, '04/28/2017'),
(62, 'fhgdg', 'dgfdgd', 'ffdgdg@gmail.com', 'male', 'General', '04/28/2017', 'cdfg', 'fgvbb', '3', 34334, 2332323, 3434, '', 'fhgdg24037', '8bc2cffd6697a56b6bab1dbb29973e255af8cf5e', '3', 'dfsfdd', 0, '04/28/2017'),
(64, 'Staff', 'Member', 'staff@gmail.com', 'male', 'General', '04/29/2017', 'Lucknow', 'Indra', '3', 123456, 123456, 100, '', 'Staff21609', '7c4a8d09ca3762af61e59520943dc26494f8941b', '4', 'fdfdf', 0, '04/29/2017'),
(65, 'noida', 'delhi', 'singhdurgesh250@gmail.com', 'male', 'OBC', '05/13/2017', 'Lucknow', 'sdsds', '3', 123456, 1234567890, 1234, '', 'noida23220', 'a0d0e0e5b1e0cca9dfd58cebd0f8f8c5ec3cc6c7', '2', 'xff', 0, '05/13/2017');

-- --------------------------------------------------------

--
-- Table structure for table `total_classes`
--

CREATE TABLE `total_classes` (
  `id` int(11) NOT NULL,
  `classes_num` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `total_classes`
--

INSERT INTO `total_classes` (`id`, `classes_num`) VALUES
(1, '1'),
(2, '2'),
(3, '3'),
(4, '4'),
(5, '5'),
(6, '6');

-- --------------------------------------------------------

--
-- Table structure for table `transport_distance_van`
--

CREATE TABLE `transport_distance_van` (
  `id` int(11) NOT NULL,
  `van_distance` text NOT NULL,
  `van_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transport_distance_van`
--

INSERT INTO `transport_distance_van` (`id`, `van_distance`, `van_id`) VALUES
(1, '0-3', 1),
(2, '3-6', 1),
(3, '6-9', 1),
(4, '10-15', 1),
(5, '0-3', 2),
(6, '3-6', 2);

-- --------------------------------------------------------

--
-- Table structure for table `transport_dis_erickshaw`
--

CREATE TABLE `transport_dis_erickshaw` (
  `id` int(11) NOT NULL,
  `erickshaw_dis` text NOT NULL,
  `erickshaw_dis_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transport_dis_erickshaw`
--

INSERT INTO `transport_dis_erickshaw` (`id`, `erickshaw_dis`, `erickshaw_dis_id`) VALUES
(1, '0-3', 2),
(2, '3-6', 2);

-- --------------------------------------------------------

--
-- Table structure for table `transport_fee_erickshaw`
--

CREATE TABLE `transport_fee_erickshaw` (
  `id` int(11) NOT NULL,
  `erickshaw_fee` int(10) NOT NULL,
  `erickshaw_dis` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transport_fee_erickshaw`
--

INSERT INTO `transport_fee_erickshaw` (`id`, `erickshaw_fee`, `erickshaw_dis`) VALUES
(1, 300, '0-3'),
(2, 400, '3-6');

-- --------------------------------------------------------

--
-- Table structure for table `transport_fee_van`
--

CREATE TABLE `transport_fee_van` (
  `id` int(11) NOT NULL,
  `distance` text NOT NULL,
  `van_fee` int(10) NOT NULL,
  `unique_tras_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transport_fee_van`
--

INSERT INTO `transport_fee_van` (`id`, `distance`, `van_fee`, `unique_tras_id`) VALUES
(1, '0-3', 400, 1),
(2, '3-6', 500, 2),
(3, '6-9', 600, 3),
(4, '10-15', 750, 4),
(5, '0-3', 300, 5),
(6, '3-6', 400, 6);

-- --------------------------------------------------------

--
-- Table structure for table `transport_information`
--

CREATE TABLE `transport_information` (
  `id` int(11) NOT NULL,
  `transport_name` varchar(255) NOT NULL,
  `transport_type` varchar(255) NOT NULL,
  `van_number` varchar(255) NOT NULL,
  `driving_license` text NOT NULL,
  `college_name` int(20) NOT NULL,
  `address` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `pin_code` int(20) NOT NULL,
  `mobile_no` bigint(12) NOT NULL,
  `date_join` text NOT NULL,
  `file_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transport_information`
--

INSERT INTO `transport_information` (`id`, `transport_name`, `transport_type`, `van_number`, `driving_license`, `college_name`, `address`, `city`, `pin_code`, `mobile_no`, `date_join`, `file_name`) VALUES
(7, 'kdsdhskdshdsd', '2', 'FDGDGDFV', '223GFGFG', 4, 'EFDFDFGFGGV', 'FGG', 45454, 454545, '05/01/2017', '11610-DSC00882.JPG'),
(8, 'XCVC', '2', 'FBDGDGDF', 'FDGD', 4, 'sdfsffsdfsfffsfsf', 'FGF4353', 435353, 3433, '05/01/2017', '5081-DSC00882.JPG'),
(10, 'Abghhcgfhjv', '1', 'dfdfsfdvsf', 'dff', 4, 'fdgdfd', 'dfdf', 2323, 964634, '05/03/2017', '74232-DSC00882.JPG');

-- --------------------------------------------------------

--
-- Table structure for table `transport_type`
--

CREATE TABLE `transport_type` (
  `id` int(11) NOT NULL,
  `type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transport_type`
--

INSERT INTO `transport_type` (`id`, `type`) VALUES
(1, 'VAN'),
(2, 'E-RICKSHAW');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `add_reciver_gaurdian_info`
--
ALTER TABLE `add_reciver_gaurdian_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `attendance_entry_teacher`
--
ALTER TABLE `attendance_entry_teacher`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `castes`
--
ALTER TABLE `castes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `college`
--
ALTER TABLE `college`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `course_fees`
--
ALTER TABLE `course_fees`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `department_name`
--
ALTER TABLE `department_name`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fee_structure`
--
ALTER TABLE `fee_structure`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `standard` (`standard`);

--
-- Indexes for table `manually_fees_entry_student`
--
ALTER TABLE `manually_fees_entry_student`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `studentfees_autoenter`
--
ALTER TABLE `studentfees_autoenter`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `student_id` (`student_id`),
  ADD UNIQUE KEY `id` (`id`),
  ADD KEY `id_2` (`id`);

--
-- Indexes for table `student_attandance_entry`
--
ALTER TABLE `student_attandance_entry`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_registration_hargoan`
--
ALTER TABLE `student_registration_hargoan`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `student_id` (`student_id`);

--
-- Indexes for table `super_admin`
--
ALTER TABLE `super_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teacher_registration`
--
ALTER TABLE `teacher_registration`
  ADD KEY `id` (`id`),
  ADD KEY `teacher_id` (`teacher_id`);

--
-- Indexes for table `total_classes`
--
ALTER TABLE `total_classes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `classes_num` (`classes_num`);

--
-- Indexes for table `transport_distance_van`
--
ALTER TABLE `transport_distance_van`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transport_dis_erickshaw`
--
ALTER TABLE `transport_dis_erickshaw`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`),
  ADD KEY `id_2` (`id`),
  ADD KEY `erickshaw_dis_id` (`erickshaw_dis_id`);

--
-- Indexes for table `transport_fee_erickshaw`
--
ALTER TABLE `transport_fee_erickshaw`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transport_fee_van`
--
ALTER TABLE `transport_fee_van`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transport_information`
--
ALTER TABLE `transport_information`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transport_type`
--
ALTER TABLE `transport_type`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `add_reciver_gaurdian_info`
--
ALTER TABLE `add_reciver_gaurdian_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `attendance_entry_teacher`
--
ALTER TABLE `attendance_entry_teacher`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `castes`
--
ALTER TABLE `castes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `college`
--
ALTER TABLE `college`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `course_fees`
--
ALTER TABLE `course_fees`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `department_name`
--
ALTER TABLE `department_name`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `fee_structure`
--
ALTER TABLE `fee_structure`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `manually_fees_entry_student`
--
ALTER TABLE `manually_fees_entry_student`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
--
-- AUTO_INCREMENT for table `studentfees_autoenter`
--
ALTER TABLE `studentfees_autoenter`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `student_attandance_entry`
--
ALTER TABLE `student_attandance_entry`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `student_registration_hargoan`
--
ALTER TABLE `student_registration_hargoan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;
--
-- AUTO_INCREMENT for table `super_admin`
--
ALTER TABLE `super_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `teacher_registration`
--
ALTER TABLE `teacher_registration`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;
--
-- AUTO_INCREMENT for table `total_classes`
--
ALTER TABLE `total_classes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `transport_distance_van`
--
ALTER TABLE `transport_distance_van`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `transport_dis_erickshaw`
--
ALTER TABLE `transport_dis_erickshaw`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `transport_fee_erickshaw`
--
ALTER TABLE `transport_fee_erickshaw`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `transport_fee_van`
--
ALTER TABLE `transport_fee_van`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `transport_information`
--
ALTER TABLE `transport_information`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `transport_type`
--
ALTER TABLE `transport_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
