-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 17, 2017 at 01:47 AM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.6.23

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

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`adminID`, `fname`, `lname`, `address`, `contactNum`, `username`, `passwrd`, `lastLogin`) VALUES
(1, 'Juster', 'Pastillo', 'asdasd', '1231', 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997', '2016-11-20 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `analytics`
--

CREATE TABLE `analytics` (
  `id` int(6) UNSIGNED NOT NULL,
  `jan` float DEFAULT NULL,
  `feb` float DEFAULT NULL,
  `mar` float DEFAULT NULL,
  `april` float DEFAULT NULL,
  `may` float DEFAULT NULL,
  `jun` float DEFAULT NULL,
  `jul` float DEFAULT NULL,
  `aug` float DEFAULT NULL,
  `sept` float DEFAULT NULL,
  `oct` float DEFAULT NULL,
  `nov` float DEFAULT NULL,
  `decem` float DEFAULT NULL,
  `curYear` varchar(128) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `analytics`
--

INSERT INTO `analytics` (`id`, `jan`, `feb`, `mar`, `april`, `may`, `jun`, `jul`, `aug`, `sept`, `oct`, `nov`, `decem`, `curYear`) VALUES
(4, 3050, 2214, 4214, 5661, 9022, 1245, 7223, 8232, 8123, 5155, 2340, 0, '2016');

-- --------------------------------------------------------

--
-- Table structure for table `bill`
--

CREATE TABLE `bill` (
  `billID` int(11) NOT NULL,
  `rent` float NOT NULL,
  `water` float NOT NULL,
  `electricity` float NOT NULL,
  `month` varchar(2) NOT NULL,
  `annum` varchar(4) NOT NULL,
  `adminID` int(11) NOT NULL,
  `roomID` int(11) NOT NULL,
  `total` float DEFAULT NULL,
  `overPayment` float DEFAULT NULL,
  `prevBalance` float DEFAULT NULL,
  `subTotal` float DEFAULT NULL,
  `datePrep` varchar(128) DEFAULT NULL,
  `billStat` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `invoice`
--

CREATE TABLE `invoice` (
  `invoiceID` int(11) NOT NULL,
  `amountPaid` float DEFAULT NULL,
  `datePaid` varchar(128) DEFAULT NULL,
  `payee` int(11) DEFAULT NULL,
  `roomID` int(11) DEFAULT NULL
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
  `wattage` int(11) NOT NULL,
  `balance` int(11) DEFAULT NULL,
  `overPayment` int(11) DEFAULT NULL,
  `paymentStat` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `room`
--

INSERT INTO `room` (`roomID`, `floor`, `state`, `capacity`, `floorplan`, `rent`, `water`, `wattage`, `balance`, `overPayment`, `paymentStat`) VALUES
(1, 1, 2, 5, '../_images/floorplan/calm.jpeg', 4000, 0, 0, 0, 0, 1);

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
-- Dumping data for table `tenant`
--

INSERT INTO `tenant` (`tenantID`, `fname`, `lname`, `address`, `contactNum`, `username`, `passwrd`, `gender`, `birthDate`, `emergencyContactNum`, `emailAddress`, `dateStart`, `displayPic`, `roomID`) VALUES
(22, 'John', 'Doe', 'Talamban Cebu', '09282791231', 'john', 'a51dda7c7ff50b61eaea0444371f4a6a9301e501', 1, '2017-02-01 00:00:00', '09232241234', 'johndoe@gmail.com', '2017-02-17 08:43:58', 'calm.jpeg', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`adminID`);

--
-- Indexes for table `analytics`
--
ALTER TABLE `analytics`
  ADD PRIMARY KEY (`id`);

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
  ADD KEY `payee` (`payee`),
  ADD KEY `roomID` (`roomID`);

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
  MODIFY `adminID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `analytics`
--
ALTER TABLE `analytics`
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `bill`
--
ALTER TABLE `bill`
  MODIFY `billID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;
--
-- AUTO_INCREMENT for table `invoice`
--
ALTER TABLE `invoice`
  MODIFY `invoiceID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;
--
-- AUTO_INCREMENT for table `report`
--
ALTER TABLE `report`
  MODIFY `reportID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
--
-- AUTO_INCREMENT for table `room`
--
ALTER TABLE `room`
  MODIFY `roomID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tenant`
--
ALTER TABLE `tenant`
  MODIFY `tenantID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
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
  ADD CONSTRAINT `invoice_ibfk_2` FOREIGN KEY (`roomID`) REFERENCES `room` (`roomID`);

--
-- Constraints for table `tenant`
--
ALTER TABLE `tenant`
  ADD CONSTRAINT `tenant_ibfk_1` FOREIGN KEY (`roomID`) REFERENCES `room` (`roomID`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
