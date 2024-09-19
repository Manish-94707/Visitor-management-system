-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 28, 2024 at 07:56 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `avms_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `apartment`
--

CREATE TABLE `apartment` (
  `ID` int(11) NOT NULL,
  `apartment_number` varchar(255) NOT NULL,
  `building_number` varchar(20) NOT NULL,
  `apartment_status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `apartment`
--

INSERT INTO `apartment` (`ID`, `apartment_number`, `building_number`, `apartment_status`) VALUES
(20, '623', 'A', 'Owned');

-- --------------------------------------------------------

--
-- Table structure for table `tbladmin`
--

CREATE TABLE `tbladmin` (
  `ID` int(5) NOT NULL,
  `AdminName` varchar(45) DEFAULT NULL,
  `UserName` char(45) DEFAULT NULL,
  `Security_Code` int(50) NOT NULL,
  `MobileNumber` bigint(11) DEFAULT NULL,
  `Email` varchar(120) DEFAULT NULL,
  `Password` varchar(120) DEFAULT NULL,
  `AdminRegdate` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbladmin`
--

INSERT INTO `tbladmin` (`ID`, `AdminName`, `UserName`, `Security_Code`, `MobileNumber`, `Email`, `Password`, `AdminRegdate`) VALUES
(1, 'Manish Kumar', 'admin', 1010, 9123456789, 'admin@mail.com', '0192023a7bbd73250516f069df18b500', '2022-04-20 22:05:37');

-- --------------------------------------------------------

--
-- Table structure for table `tblvisitor`
--

CREATE TABLE `tblvisitor` (
  `ID` int(5) NOT NULL,
  `VisitorName` varchar(120) DEFAULT NULL,
  `MobileNumber` int(10) DEFAULT NULL,
  `Address` varchar(250) DEFAULT NULL,
  `Gender` varchar(11) NOT NULL,
  `email` varchar(120) NOT NULL,
  `device` varchar(155) NOT NULL,
  `WhomtoMeet` varchar(120) DEFAULT NULL,
  `Reason` varchar(120) DEFAULT NULL,
  `EnterDate` timestamp NULL DEFAULT current_timestamp(),
  `remark` varchar(255) DEFAULT NULL,
  `outtime` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `Govt_ID` varchar(255) DEFAULT NULL,
  `image` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tblvisitor`
--

INSERT INTO `tblvisitor` (`ID`, `VisitorName`, `MobileNumber`, `Address`, `Gender`, `email`, `device`, `WhomtoMeet`, `Reason`, `EnterDate`, `remark`, `outtime`, `Govt_ID`, `image`) VALUES
(17, 'Samantha Jane', 912354789, 'Sample Address', 'Female', '623', '        A    ', 'The Owner', 'Sample Business', '2022-06-17 02:01:35', NULL, NULL, NULL, NULL),
(18, 'saaa', 100, 'asa', 'Male', '', '', 'sa,eer', '6687', '2024-05-20 04:25:12', NULL, NULL, NULL, NULL),
(19, 'Full Name', 2147483647, 'Address', 'Male', '', 'evice name', 'Govnment ID', 'Reason for Visiting', '2024-05-21 00:08:36', 'done', '2024-05-23 05:34:39', NULL, NULL),
(20, 'Full Name', 0, 'Address', 'Male', 'Email', 'Device name', 'Whom to meet', 'Reason for Visiting', '2024-05-21 00:52:28', NULL, NULL, 'Govnment ID', NULL),
(21, 'asa', 21212, 'asa', '', 'asas@d', 'asas', 'as', 'sas', '2024-05-22 02:28:18', NULL, NULL, 'asas', NULL),
(22, 'Manish', 2147483647, 'Noida', 'Male', 'manishkumar@gmail.com', 'mobile', 'HR', 'Interview', '2024-05-22 03:27:50', NULL, NULL, '98766788976', NULL),
(23, 'Manish', 2147483647, 'Noida', 'Male', 'manishkumar@gmail.com', 'mobile', 'HR', 'Interview', '2024-05-22 03:28:53', NULL, NULL, '98766788976', NULL),
(24, 'saaa', 1313, 'sas', 'Female', 'shiv123@gmail.com', 'asa', 'vdx', 'sdsd', '2024-05-22 03:37:28', NULL, NULL, '121', NULL),
(25, 'saaa', 1313, 'sas', 'Female', 'shiv123@gmail.com', 'asa', 'vdx', 'sdsd', '2024-05-22 03:37:34', NULL, NULL, '121', NULL),
(26, 'ss', 121, 'asas', 'Male', 'ss@gmail.com', 'laptop', 'vdx', 'asa', '2024-05-22 05:18:35', NULL, NULL, 'aaaaaaaaaa', 'image'),
(27, 'ss', 121, 'asas', 'Male', 'ss@gmail.com', 'laptop', 'vdx', 'asa', '2024-05-22 05:28:57', NULL, NULL, 'aaaaaaaaaa', 'image'),
(28, 'saaa', 2147483647, 'asas', 'Male', 'ss@gmail.com', 'asa', 'saa', 'asa', '2024-05-22 05:29:36', NULL, NULL, '32143ds', 'image'),
(29, 'asa', 1212, 'asas', 'Male', 'saa', 'as', 'asa', 'as', '2024-05-22 06:01:20', NULL, NULL, 'as', 'image'),
(30, 'asa', 1212, 'asas', 'Male', 'saa', 'as', 'asa', 'as', '2024-05-22 06:28:36', NULL, NULL, 'as', 'logo.jpg'),
(31, 'ASADADSAD', 3213, 'EDASAD', 'Male', 'manishkumar@gmail.com', 'mobile', 'aaaa', 'Interview', '2024-05-22 23:13:42', NULL, NULL, '98766788976', 'logo.jpg'),
(32, 'Manish', 2147483647, 'greater noida', 'Male', 'abhishek@gmail.copm', 'laptop', 'hr', 'visit', '2024-05-23 04:51:44', NULL, NULL, '889878878789', 'logo11.jpg'),
(33, 'Manish', 2147483647, 'greater noida', 'Male', 'abhishek@gmail.copm', 'laptop', 'hr', 'visit', '2024-05-23 05:40:16', NULL, NULL, '889878878789', 'logo11.jpg'),
(34, 'Manish', 2147483647, 'greater noida', 'Male', 'abhishek@gmail.copm', 'laptop', 'hr', 'visit', '2024-05-23 05:42:07', NULL, NULL, '889878878789', 'background-img1.png'),
(35, 'Manish', 2147483647, 'greater noida', 'Male', 'abhishek@gmail.copm', 'laptop', 'hr', 'visit', '2024-05-23 05:44:31', NULL, NULL, '889878878789', 'background-img1.png'),
(36, 'trail', 1234567, 'noida', 'Male', 'trail@gmail.com', 'mobile', 'trail', 'trail', '2024-05-23 05:45:24', NULL, NULL, 'unknown', 'module_table_bottom.png'),
(37, 'trail', 2147483647, 'noida', 'Male', 'trail@gmail.com', 'mobile', 'trail', 'trail', '2024-05-23 06:40:02', NULL, NULL, 'unknown', 'module_table_bottom.png'),
(38, 'trail', 2147483647, 'noida', 'Male', 'trail@gmail.com', 'mobile', 'trail', 'trail', '2024-05-23 06:45:35', NULL, NULL, 'unknown', 'module_table_bottom.png'),
(39, 'trail', 2147483647, 'noida', 'Male', 'trail@gmail.com', 'mobile', 'trail', 'trail', '2024-05-23 06:46:07', NULL, NULL, 'unknown', 'logo11.jpg'),
(40, 'shivam', 2147483647, 'noida', 'Male', 'trail@gmail.com', 'mobile', 'trail', 'trail', '2024-05-23 06:55:07', NULL, NULL, 'unknown', 'logo11.jpg'),
(41, 'shivam', 2147483647, 'noida', 'Male', 'trail@gmail.com', 'mobile', 'trail', 'trail', '2024-05-23 06:55:36', NULL, NULL, 'unknown', 'logo11.jpg'),
(42, 'nishant', 1234578698, 'qwert', 'Others', 'nishant123@gmail.com', 'qw', 'hr', 'qwerty', '2024-05-23 10:49:52', NULL, NULL, '23456432145643214', ''),
(43, 'nishant', 1234578698, 'qwert', 'Others', 'nishant123@gmail.com', 'qw', 'hr', 'qwerty', '2024-05-23 10:50:18', NULL, NULL, '23456432145643214', ''),
(44, 'nishant', 1234578698, 'qwert', 'Others', 'nishant123@gmail.com', 'qw', 'hr', 'qwerty', '2024-05-23 10:51:28', NULL, NULL, '23456432145643214', ''),
(45, 'nishant', 1234578698, 'qwert', 'Others', 'nishant123@gmail.com', 'qw', 'hr', 'qwerty', '2024-05-23 10:51:43', NULL, NULL, '23456432145643214', ''),
(46, 'pali', 12345678, 'kerela', 'Female', 'pali@gmail.com', 'mobile', 'pali', 'none', '2024-05-24 10:28:02', NULL, NULL, 'passport', 'logo1.jpg'),
(47, 'pali', 12345678, 'kerela', 'Female', 'pali@gmail.com', 'mobile', 'pali', 'none', '2024-05-24 10:28:11', NULL, NULL, 'passport', 'logo1.jpg'),
(48, 'ahoshao', 2147483647, 'sfsdfdsfsf', 'Female', 'sdffsfdsfcscsdc', 'sdcscsdcsdc', 'sdcscsdcsc', 'sdcsdcsdcs', '2024-05-24 10:36:51', NULL, NULL, 'sdcscdcsc', 'nature.jpg'),
(49, 'Mnsiha ', 0, 'manish', 'Male', 'manish', 'manish', 'manish', 'manish', '2024-05-24 11:29:42', NULL, NULL, 'manish', 'photo.jpg'),
(50, 'riya', 1234567654, 'riya ka ghar', 'Female', 'riya@gmail.com', 'riya ka phone ', 'riya ke papa ', 'riya se kaam hai', '2024-05-24 11:51:27', NULL, NULL, 'riya ka adhar card', 'photo.jpg'),
(51, '', 0, '', '', '', '', '', '', '2024-05-24 12:06:39', NULL, '2024-05-27 12:09:31', '', 'wqerty4356753455.jpg'),
(52, 'test', 2131333333, 'test', 'Others', 'test@', 'test', 'test', 'test', '2024-05-25 06:20:25', NULL, NULL, 'test', 'photo.jpg'),
(53, 'Shivam', 2147483647, 'Noida', 'Male', 'nishant123@gmail.com', 'laptop', 'HR', 'Interview', '2024-05-27 11:05:06', NULL, NULL, 'Hggs781273gshas', 'nature.jpg'),
(54, 'Manish', 897099898, 'noida', 'Male', 'arjun123@gmail.com', 'laptop', 'HR', 'visit', '2024-05-27 11:18:04', NULL, NULL, 'newfile', 'nature.jpg'),
(55, 'nishant', 2147483647, 'indraprastha', 'Male', 'nishant123@gmail.com', 'laptop', 'HR', 'Interview', '2024-05-27 11:39:59', NULL, NULL, 'Uslpp2872B', 'nature.jpg'),
(56, 'Aman', 2147483647, 'Noida', 'Male', 'Aman@gmail.com', 'LAptop', 'CRO', 'na', '2024-05-27 12:09:31', NULL, '2024-05-27 12:11:40', 'wqerty4356753455', 'wqerty4356753455.jpg'),
(57, 'man', 1234567890, 'indraprastha', 'Male', 'arjun123@gmail.com', 'laptop', 'HR', 'visit', '2024-05-27 12:11:40', NULL, '2024-05-27 12:11:40', 'wqerty4356753455', 'wqerty4356753455.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `apartment`
--
ALTER TABLE `apartment`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tbladmin`
--
ALTER TABLE `tbladmin`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tblvisitor`
--
ALTER TABLE `tblvisitor`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `apartment`
--
ALTER TABLE `apartment`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `tbladmin`
--
ALTER TABLE `tbladmin`
  MODIFY `ID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tblvisitor`
--
ALTER TABLE `tblvisitor`
  MODIFY `ID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
