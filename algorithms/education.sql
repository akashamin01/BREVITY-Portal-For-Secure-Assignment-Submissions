-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 10, 2019 at 02:55 AM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `education`
--

-- --------------------------------------------------------

--
-- Table structure for table `faculty`
--

CREATE TABLE `faculty` (
  `Id` int(50) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Uname` varchar(50) NOT NULL,
  `Password` varchar(50) NOT NULL,
  `Contact` bigint(50) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Address` varchar(100) NOT NULL,
  `Date-of-Joining` datetime(6) NOT NULL,
  `Experience` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `faculty1`
--

CREATE TABLE `faculty1` (
  `Id` int(50) NOT NULL,
  `Question` varchar(100) NOT NULL,
  `keywords` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `faculty1`
--

INSERT INTO `faculty1` (`Id`, `Question`, `keywords`) VALUES
(1, 'hello', 'servlet|servlet-java');

-- --------------------------------------------------------

--
-- Table structure for table `faculty2`
--

CREATE TABLE `faculty2` (
  `Id` int(50) NOT NULL,
  `User Id` bigint(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `Answer` varchar(1000) NOT NULL,
  `Plagiarism` int(10) DEFAULT NULL,
  `Assesment` int(10) DEFAULT NULL,
  `Authentication` int(10) DEFAULT NULL,
  `Status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `faculty2`
--

INSERT INTO `faculty2` (`Id`, `User Id`, `name`, `Answer`, `Plagiarism`, `Assesment`, `Authentication`, `Status`) VALUES
(1, 0, '', '', 0, 0, 0, 0),
(2, 0, '', '', 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `Id` int(50) NOT NULL,
  `User Id` bigint(50) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `File` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`Id`, `User Id`, `Name`, `File`) VALUES
(13, 1601101921, 'Vivek Nathani', 'hiii this is a servlet program , this program is provided by servlet-java. so it is important for us to learn'),
(14, 1601101921, 'Vivek Nathani', 'hiii this is a servlet program , this program is provided by servlet-java. so it is important for us to learn'),
(15, 1601101921, 'Vivek Nathani', 'hiii this is a servlet program , this program is provided by servlet-java. so it is important for us to learn'),
(16, 1601101921, 'Vivek Nathani', 'hiii this is a servlet program , this program is provided by servlet-java. so it is important for us to learn'),
(17, 1601101921, 'Vivek Nathani', 'hiii this is a servlet program , this program is provided by servlet-java. so it is important for us to learn'),
(18, 1601101921, 'Vivek Nathani', 'hiii this is a servlet program , this program is provided by servlet-java. so it is important for us to learn'),
(19, 1601101921, 'Vivek Nathani', 'hiii this is a servlet program , this program is provided by servlet-java. so it is important for us to learn');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `faculty`
--
ALTER TABLE `faculty`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `faculty1`
--
ALTER TABLE `faculty1`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `faculty2`
--
ALTER TABLE `faculty2`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`Id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `faculty`
--
ALTER TABLE `faculty`
  MODIFY `Id` int(50) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `faculty1`
--
ALTER TABLE `faculty1`
  MODIFY `Id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `faculty2`
--
ALTER TABLE `faculty2`
  MODIFY `Id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `Id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
