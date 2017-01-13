-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 13, 2017 at 02:17 PM
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
  `decem` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `analytics`
--

INSERT INTO `analytics` (`id`, `jan`, `feb`, `mar`, `april`, `may`, `jun`, `jul`, `aug`, `sept`, `oct`, `nov`, `decem`) VALUES
(1, 2125, 0, 0, 0, 0, 3000, 0, 0, 0, 0, 0, 500);

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

--
-- Dumping data for table `bill`
--

INSERT INTO `bill` (`billID`, `rent`, `water`, `electricity`, `month`, `annum`, `adminID`, `roomID`, `total`, `overPayment`, `prevBalance`, `subTotal`, `datePrep`, `billStat`) VALUES
(8, 1500, 500, 1000, '01', '2017', 1, 2, 3000, 0, 0, 3000, '2017-01-11 17:02:12', 0),
(9, 2000, 600, 100, '01', '2017', 1, 2, 5700, 0, 3000, 2700, '2017-01-11 17:02:56', 1),
(10, 333, 123, 5135, '01', '2017', 1, 3, 5091, 500, 0, 5591, '2017-01-13 20:08:55', 0);

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

--
-- Dumping data for table `invoice`
--

INSERT INTO `invoice` (`invoiceID`, `amountPaid`, `datePaid`, `payee`, `roomID`) VALUES
(5, 6000, '2017-01-11 17:09:55', 13, 2),
(6, 500, '2017-01-11 17:17:07', 12, 2),
(7, 0, '2017-01-11 17:18:08', 6, 2),
(8, 2, '2017-01-13 05:55:14', 1, 1),
(9, 500, '2017-01-13 06:22:08', 7, 3),
(10, 2000, '2017-01-13 12:43:55', 6, 2);

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
  `tenantID` int(11) NOT NULL,
  `rpic` varchar(64) DEFAULT NULL,
  `roomID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `report`
--

INSERT INTO `report` (`reportID`, `subject`, `content`, `category`, `dateReported`, `state`, `tenantID`, `rpic`, `roomID`) VALUES
(25, 'test222', 'asdhkjsafhak\r\nasdfasd\r\nf\r\nasdf\r\n\r\nf', 0, '2016-12-09 03:17:07', 1, 6, 'images/kendall.jpg', 2),
(26, 'zxzxc', 'afdshasd\r\nf\r\nasd\r\nf\r\nasdf\r\n\r\nads\r\nf\r\nasd\r\nf\r\nasd\r\nf\r\nasd\r\nf\r\nasd\r\nf\r\nds', 0, '2016-12-09 03:17:51', 1, 6, 'images/emma.jpg', 2),
(27, '', '', 1, '2017-01-04 11:53:18', 0, 7, NULL, NULL);

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
  `wattage` int(11) NOT NULL,
  `balance` int(11) DEFAULT NULL,
  `overPayment` int(11) DEFAULT NULL,
  `paymentStat` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `room`
--

INSERT INTO `room` (`roomID`, `floor`, `state`, `capacity`, `floorplan`, `rent`, `water`, `wattCost`, `wattage`, `balance`, `overPayment`, `paymentStat`) VALUES
(1, 1, 2, 12, '../_images/floorplan/Screenshot from 2016-11-21 22-42-56.png', 2323, 3123, 0, 311, 0, 2, 1),
(2, 1, 2, 3, '../_images/floorplan/emma.jpg', 344, 3213, 0, 2341, 0, 2800, 1),
(3, 1, 2, 4, '../_images/floorplan/lily.jpg', 23131, 131, 0, 13123, 5091, 0, 1);

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
(1, 'veincasd', 'asdasd', 'asdsadqwe', '12311111111', 'vinz', '5aeb8177d2a164345bd5ce6f6fd0a9ccd183c867', 2, '0000-00-00 00:00:00', '09231', 'asdasd@gmail.com', '2016-11-24 21:38:23', 'emma.jpg', 1),
(4, 'gfghf', 'gfdfd', 'hhfhfh', '11111111111', 'sfdsfd', 'c6a084ba4091178863959a2bf18d0e4c16b48e8e', 1, '0000-00-00 00:00:00', '09272691214', 'bjhghg@bk.hj', '2016-12-05 02:11:14', 'cara.jpg', 1),
(6, 'ana', 'ana', 'qeqd', '92726912141', 'ana', '72019bbac0b3dac88beac9ddfef0ca808919104f', 2, '0000-00-00 00:00:00', '09272691214', 'ada2@asd.com', '2016-12-08 15:52:09', 'kendall.jpg', 2),
(7, 'nica', 'nica', 'asdasd', '92726912141', 'nica', 'd28860a550adb588cbe8df5ba8f275290f84831c', 2, '0000-00-00 00:00:00', '09272691214', 'ada2@asd.com', '2016-12-08 15:55:18', 'emma.jpg', 3),
(8, 'chi', 'chi', 'asdasd', '92726912141', 'chi', 'bc32c6fe0275b3332463cb17b6ebe0bf7708ab1e', 2, '0000-00-00 00:00:00', '09272691214', 'veopacarat@gmail.com', '2016-12-08 15:57:31', 'lily.jpg', 3),
(9, 'shey', 'shey', 'asdjlsajd', '11111111111', 'shey', 'd1f3f9dd3abcc06556a873c2dbfaea08864ec6ab', 1, '2017-01-20 00:00:00', '11111111111', 'asdjs@gmail.com', '2017-01-11 14:58:00', 'module_table_top.png', 1),
(10, 'anie', 'anie', 'asdsad', '11111111111', 'anie', '1af64f18ffa79ab9791c0c27eff1b286c599180e', 2, '2017-01-26 00:00:00', '11111111111', 'asdsad@mal.com', '2017-01-11 14:58:54', 'module_table_top.png', 1),
(11, 'john', 'john', 'asdasd', '11111111111', 'john', 'a51dda7c7ff50b61eaea0444371f4a6a9301e501', 1, '2017-01-08 00:00:00', '11111111111', 'asdas@goam.com', '2017-01-11 14:59:53', 'module_table_bottom.png', 2),
(12, 'carl', 'carl', 'asdsad', '11111111111', 'carl', 'de187642e6c75f60d10f29e52cab54cdf676870d', 1, '2017-01-27 00:00:00', '11111111111', 'asdsd@gmail.com', '2017-01-11 15:00:41', 'module_table_top.png', 2),
(13, 'jamee', 'jamee', 'sdasds', '11111111111', 'jamee', '463d64f57e9e420dad585614f1520fbdfceaa273', 2, '2017-01-03 00:00:00', '11111111111', 'asdasd@mgila.com', '2017-01-11 15:01:44', 'module_table_top.png', 2),
(14, 'jay3', 'jay3', 'asdasd', '11111111111', 'jay3', '32f777f01e9116e7cd57af7dab820902e3295cd5', 1, '2017-01-28 00:00:00', '11111111111', 'asd@gmail.com', '2017-01-11 15:02:52', 'module_table_top.png', 3),
(15, 'jun', 'jun', 'asdasd', '11111111111', 'jun', '5bbdd777cd7332b17c04b62043ef590376b29cab', 1, '2017-01-08 00:00:00', '11111111111', 'sadaslk@gmia.com', '2017-01-11 15:04:02', 'module_table_top.png', 3);

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
  ADD KEY `tenantID` (`tenantID`),
  ADD KEY `roomID` (`roomID`);

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
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `bill`
--
ALTER TABLE `bill`
  MODIFY `billID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `invoice`
--
ALTER TABLE `invoice`
  MODIFY `invoiceID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `report`
--
ALTER TABLE `report`
  MODIFY `reportID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT for table `room`
--
ALTER TABLE `room`
  MODIFY `roomID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tenant`
--
ALTER TABLE `tenant`
  MODIFY `tenantID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
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
  ADD CONSTRAINT `invoice_ibfk_1` FOREIGN KEY (`payee`) REFERENCES `tenant` (`tenantID`),
  ADD CONSTRAINT `invoice_ibfk_2` FOREIGN KEY (`roomID`) REFERENCES `room` (`roomID`);

--
-- Constraints for table `report`
--
ALTER TABLE `report`
  ADD CONSTRAINT `report_ibfk_1` FOREIGN KEY (`tenantID`) REFERENCES `tenant` (`tenantID`),
  ADD CONSTRAINT `roomID` FOREIGN KEY (`roomID`) REFERENCES `room` (`roomID`);

--
-- Constraints for table `tenant`
--
ALTER TABLE `tenant`
  ADD CONSTRAINT `tenant_ibfk_1` FOREIGN KEY (`roomID`) REFERENCES `room` (`roomID`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
