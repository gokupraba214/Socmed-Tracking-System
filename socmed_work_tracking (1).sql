-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 16, 2021 at 03:24 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `socmed_work_tracking`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbladmin`
--

CREATE TABLE `tbladmin` (
  `ID` int(10) NOT NULL,
  `AdminName` varchar(120) DEFAULT NULL,
  `UserName` varchar(120) DEFAULT NULL,
  `Email` varchar(200) DEFAULT NULL,
  `Password` varchar(120) DEFAULT NULL,
  `AdminRegdate` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbladmin`
--

INSERT INTO `tbladmin` (`ID`, `AdminName`, `UserName`, `Email`, `Password`, `AdminRegdate`) VALUES
(1, 'Test123', 'admin', 'Bluedale@gmail.com', '68eacb97d86f0c4621fa2b0e17cabd8c', '2020-01-21 11:48:13');

-- --------------------------------------------------------

--
-- Table structure for table `tblartworkchaseform`
--

CREATE TABLE `tblartworkchaseform` (
  `ID` int(10) NOT NULL,
  `Client_ID` int(10) DEFAULT NULL,
  `ClientName` varchar(200) DEFAULT NULL,
  `Campaign` varchar(200) DEFAULT NULL,
  `Duration` varchar(200) DEFAULT NULL,
  `ArtworkDeadline` varchar(200) DEFAULT NULL,
  `ArtworkReceived` varchar(200) DEFAULT NULL,
  `ChopAndSignSent` varchar(200) DEFAULT NULL,
  `ChopAndSignReceived` varchar(200) DEFAULT NULL,
  `DatetoLive` varchar(200) DEFAULT NULL,
  `Remark` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblartworkchaseform`
--

INSERT INTO `tblartworkchaseform` (`ID`, `Client_ID`, `ClientName`, `Campaign`, `Duration`, `ArtworkDeadline`, `ArtworkReceived`, `ChopAndSignSent`, `ChopAndSignReceived`, `DatetoLive`, `Remark`) VALUES
(77, 22, 'ABC', 'Campaign 1', '3 Mpnths', '2021-08-16', '2021-08-17', '2021-08-17', '2021-08-17', '2021-08-23', '');

-- --------------------------------------------------------

--
-- Table structure for table `tblclientname`
--

CREATE TABLE `tblclientname` (
  `ID` int(10) NOT NULL,
  `Date` varchar(200) DEFAULT NULL,
  `ClientName` varchar(200) DEFAULT NULL,
  `CS` varchar(200) DEFAULT NULL,
  `SocialMediaType` varchar(200) DEFAULT NULL,
  `ArtworkFormat` varchar(200) DEFAULT NULL,
  `AudienceReach` varchar(200) DEFAULT NULL,
  `Tenure` varchar(200) DEFAULT NULL,
  `StartDate` varchar(200) DEFAULT NULL,
  `EndDate` varchar(200) DEFAULT NULL,
  `Remark` varchar(200) DEFAULT NULL,
  `Status` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblclientname`
--

INSERT INTO `tblclientname` (`ID`, `Date`, `ClientName`, `CS`, `SocialMediaType`, `ArtworkFormat`, `AudienceReach`, `Tenure`, `StartDate`, `EndDate`, `Remark`, `Status`) VALUES
(22, '2021-08-16', 'ABC', 'Sim', 'Facebook', '2 Video', '20k', '6 Months', '2021-08-23', '2022-02-23', '', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbladmin`
--
ALTER TABLE `tbladmin`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tblartworkchaseform`
--
ALTER TABLE `tblartworkchaseform`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `Client_ID` (`Client_ID`);

--
-- Indexes for table `tblclientname`
--
ALTER TABLE `tblclientname`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `ID` (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbladmin`
--
ALTER TABLE `tbladmin`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tblartworkchaseform`
--
ALTER TABLE `tblartworkchaseform`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;

--
-- AUTO_INCREMENT for table `tblclientname`
--
ALTER TABLE `tblclientname`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
