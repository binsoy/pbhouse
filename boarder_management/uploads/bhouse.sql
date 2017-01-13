-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 12, 2016 at 02:42 PM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bhouse`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `adminID` int(11) NOT NULL,
  `fname` varchar(32) NOT NULL,
  `lname` varchar(32) NOT NULL,
  `address` varchar(128) NOT NULL,
  `contactNum` varchar(16) NOT NULL,
  `username` varchar(32) NOT NULL,
  `passwrd` char(40) NOT NULL,
  `lastLogin` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `bill`
--

CREATE TABLE `bill` (
  `billID` int(11) NOT NULL,
  `rent` float NOT NULL,
  `water` float NOT NULL,
  `electricity` float NOT NULL,
  `month` int(11) NOT NULL,
  `annum` int(11) NOT NULL,
  `state` int(11) NOT NULL,
  `adminID` int(11) NOT NULL,
  `roomID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `invoice`
--

CREATE TABLE `invoice` (
  `invoiceID` int(11) NOT NULL,
  `amountPaid` float NOT NULL,
  `datePaid` datetime NOT NULL,
  `billID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `report`
--

CREATE TABLE `report` (
  `reportID` int(11) NOT NULL,
  `subject` varchar(32) NOT NULL,
  `content` varchar(256) NOT NULL,
  `category` int(11) NOT NULL,
  `dateReported` datetime NOT NULL,
  `state` int(11) NOT NULL,
  `tenantID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `room`
--

CREATE TABLE `room` (
  `roomID` int(11) NOT NULL,
  `floor` int(11) NOT NULL,
  `state` int(11) NOT NULL,
  `capacity` int(11) NOT NULL,
  `floorplan` varchar(64) NOT NULL,
  `rent` float NOT NULL,
  `water` float NOT NULL,
  `wattCost` float NOT NULL,
  `wattage` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tenant`
--

CREATE TABLE `tenant` (
  `tenantID` int(11) NOT NULL,
  `fname` varchar(32) NOT NULL,
  `lname` varchar(32) NOT NULL,
  `address` varchar(128) NOT NULL,
  `contactNum` varchar(16) NOT NULL,
  `username` varchar(32) NOT NULL,
  `passwrd` char(40) NOT NULL,
  `gender` int(11) NOT NULL,
  `birthDate` datetime NOT NULL,
  `emergencyContactNum` varchar(16) NOT NULL,
  `emailAddress` varchar(64) NOT NULL,
  `dateStart` datetime NOT NULL,
  `displayPic` varchar(64) NOT NULL,
  `roomID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`adminID`);

--
-- Indexes for table `bill`
--
ALTER TABLE `bill`
  ADD PRIMARY KEY (`billID`),
  ADD KEY `adminID` (`adminID`),
  ADD KEY `roomID` (`roomID`);

--
-- Indexes for table `invoice`
--
ALTER TABLE `invoice`
  ADD PRIMARY KEY (`invoiceID`),
  ADD KEY `billID` (`billID`);

--
-- Indexes for table `report`
--
ALTER TABLE `report`
  ADD PRIMARY KEY (`reportID`),
  ADD KEY `tenantID` (`tenantID`);

--
-- Indexes for table `room`
--
ALTER TABLE `room`
  ADD PRIMARY KEY (`roomID`);

--
-- Indexes for table `tenant`
--
ALTER TABLE `tenant`
  ADD PRIMARY KEY (`tenantID`),
  ADD KEY `roomID` (`roomID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `adminID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `bill`
--
ALTER TABLE `bill`
  MODIFY `billID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `invoice`
--
ALTER TABLE `invoice`
  MODIFY `invoiceID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `report`
--
ALTER TABLE `report`
  MODIFY `reportID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `room`
--
ALTER TABLE `room`
  MODIFY `roomID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tenant`
--
ALTER TABLE `tenant`
  MODIFY `tenantID` int(11) NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `bill`
--
ALTER TABLE `bill`
  ADD CONSTRAINT `bill_ibfk_1` FOREIGN KEY (`adminID`) REFERENCES `admin` (`adminID`),
  ADD CONSTRAINT `bill_ibfk_2` FOREIGN KEY (`roomID`) REFERENCES `room` (`roomID`);

--
-- Constraints for table `invoice`
--
ALTER TABLE `invoice`
  ADD CONSTRAINT `invoice_ibfk_2` FOREIGN KEY (`billID`) REFERENCES `bill` (`billID`);

--
-- Constraints for table `report`
--
ALTER TABLE `report`
  ADD CONSTRAINT `report_ibfk_1` FOREIGN KEY (`tenantID`) REFERENCES `tenant` (`tenantID`);

--
-- Constraints for table `tenant`
--
ALTER TABLE `tenant`
  ADD CONSTRAINT `tenant_ibfk_1` FOREIGN KEY (`roomID`) REFERENCES `room` (`roomID`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
