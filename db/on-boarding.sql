-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 11, 2023 at 07:19 AM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `on-boarding`
--

-- --------------------------------------------------------

--
-- Table structure for table `academic_tbl`
--

CREATE TABLE `academic_tbl` (
  `id` int(11) NOT NULL,
  `application_ID` varchar(50) DEFAULT NULL,
  `regNo` varchar(50) DEFAULT NULL,
  `institution` varchar(50) DEFAULT NULL,
  `department` varchar(50) DEFAULT NULL,
  `program` varchar(50) DEFAULT NULL,
  `level` varchar(50) DEFAULT NULL,
  `cgpa` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `academic_tbl`
--

INSERT INTO `academic_tbl` (`id`, `application_ID`, `regNo`, `institution`, `department`, `program`, `level`, `cgpa`) VALUES
(5, '5G9O7BGJP8', 'CST/17/IFT/00029', 'Bayero University Kano ', 'Information Technology ', 'Information Technology', '400', '5.00');

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `create_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `email`, `password`, `create_at`) VALUES
(1, 'yunusisah123@gmail.com', '12345', '2023-01-10 16:20:06'),
(2, 'admin', '12345', '2023-01-10 16:20:06');

-- --------------------------------------------------------

--
-- Table structure for table `idea_tbl`
--

CREATE TABLE `idea_tbl` (
  `id` int(11) NOT NULL,
  `application_ID` varchar(50) DEFAULT NULL,
  `ideaTitle` varchar(250) DEFAULT NULL,
  `ideaDescription` varchar(250) DEFAULT NULL,
  `videoUrl` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `idea_tbl`
--

INSERT INTO `idea_tbl` (`id`, `application_ID`, `ideaTitle`, `ideaDescription`, `videoUrl`) VALUES
(4, '5G9O7BGJP8', 'Project Support Team', 'Project Support Team is designed to help students carry out their final year project activities.                                            \r\n                                            ', 'http://localhost/on-boarding/user-dashboard.php');

-- --------------------------------------------------------

--
-- Table structure for table `profile_tbl`
--

CREATE TABLE `profile_tbl` (
  `id` int(11) NOT NULL,
  `Application_ID` varchar(50) DEFAULT NULL,
  `FullNAme` varchar(50) DEFAULT NULL,
  `Email` varchar(50) DEFAULT NULL,
  `Phone` varchar(50) DEFAULT NULL,
  `Gender` varchar(50) DEFAULT NULL,
  `Age` varchar(50) DEFAULT NULL,
  `Password` varchar(50) DEFAULT NULL,
  `completed` varchar(3) DEFAULT NULL,
  `Create_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `profile_tbl`
--

INSERT INTO `profile_tbl` (`id`, `Application_ID`, `FullNAme`, `Email`, `Phone`, `Gender`, `Age`, `Password`, `completed`, `Create_date`) VALUES
(13, '5G9O7BGJP8', 'Yunus Isah', 'yunusisah123@gmail.com', '+2349033248408', 'Male', '20', '123456', '1', '2023-01-11 07:13:46');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `academic_tbl`
--
ALTER TABLE `academic_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `idea_tbl`
--
ALTER TABLE `idea_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `profile_tbl`
--
ALTER TABLE `profile_tbl`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `academic_tbl`
--
ALTER TABLE `academic_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `idea_tbl`
--
ALTER TABLE `idea_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `profile_tbl`
--
ALTER TABLE `profile_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
