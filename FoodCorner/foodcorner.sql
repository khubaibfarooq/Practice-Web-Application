-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 04, 2019 at 01:20 AM
-- Server version: 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `foodcorner`
--

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

CREATE TABLE `accounts` (
  `UID` int(11) NOT NULL,
  `UserName` varchar(50) NOT NULL,
  `Password` varchar(50) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `PhoneNo` varchar(20) NOT NULL,
  `Address` varchar(150) NOT NULL,
  `Type` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`UID`, `UserName`, `Password`, `Email`, `PhoneNo`, `Address`, `Type`) VALUES
(1, 'MUHAMMAD', '12345', 'user@yahoo.com', '12321321', 'adfefasdfd', 'user'),
(2, 'admin', '1234', 'wews', '031', 'sdfasdsad', 'admin'),
(3, 'asd', '0987', 'bc140401995@gmail.com', '09876', 'lkjoij', 'user');

-- --------------------------------------------------------

--
-- Table structure for table `chefs`
--

CREATE TABLE `chefs` (
  `CID` int(11) NOT NULL,
  `Name` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `chefs`
--

INSERT INTO `chefs` (`CID`, `Name`) VALUES
(1, 'asif');

-- --------------------------------------------------------

--
-- Table structure for table `deliveryteam`
--

CREATE TABLE `deliveryteam` (
  `DTID` int(11) NOT NULL,
  `Name` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `deliveryteam`
--

INSERT INTO `deliveryteam` (`DTID`, `Name`) VALUES
(2, 'asdf'),
(3, 'asdf');

-- --------------------------------------------------------

--
-- Table structure for table `foods`
--

CREATE TABLE `foods` (
  `FID` int(11) NOT NULL,
  `FName` varchar(80) NOT NULL,
  `Price` int(8) NOT NULL,
  `Quantity` int(8) NOT NULL,
  `Picture` varchar(100) NOT NULL,
  `Details` varchar(150) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `foods`
--

INSERT INTO `foods` (`FID`, `FName`, `Price`, `Quantity`, `Picture`, `Details`) VALUES
(3, 'mutton', 650, 450, 'sasas.JPG', 'afdsf'),
(2, 'mutton', 1300, 900, 'mutton.jpg', 'dfasdfsd'),
(5, 'asd', 12212, 1231, 'sasas.JPG', 'asdas');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `OID` int(11) NOT NULL,
  `UID` int(11) NOT NULL,
  `ODate` date NOT NULL,
  `DDate` date DEFAULT NULL,
  `DTID` int(11) DEFAULT NULL,
  `DStatus` varchar(20) DEFAULT NULL,
  `Amount` int(8) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`OID`, `UID`, `ODate`, `DDate`, `DTID`, `DStatus`, `Amount`) VALUES
(4, 1, '2019-06-03', '2019-06-03', 2, 'Received', 1300),
(6, 1, '2019-06-03', NULL, 3, NULL, 1950);

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `OID` int(11) NOT NULL,
  `DID` int(11) NOT NULL,
  `CID` int(11) DEFAULT NULL,
  `FID` int(11) NOT NULL,
  `Quantity` int(5) NOT NULL,
  `Price` int(7) NOT NULL,
  `Amount` int(7) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`OID`, `DID`, `CID`, `FID`, `Quantity`, `Price`, `Amount`) VALUES
(6, 8, 1, 3, 1, 650, 650),
(4, 6, NULL, 2, 1, 1300, 1300),
(6, 9, 1, 2, 1, 1300, 1300);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`UID`);

--
-- Indexes for table `chefs`
--
ALTER TABLE `chefs`
  ADD PRIMARY KEY (`CID`);

--
-- Indexes for table `deliveryteam`
--
ALTER TABLE `deliveryteam`
  ADD PRIMARY KEY (`DTID`);

--
-- Indexes for table `foods`
--
ALTER TABLE `foods`
  ADD PRIMARY KEY (`FID`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`OID`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`DID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accounts`
--
ALTER TABLE `accounts`
  MODIFY `UID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `chefs`
--
ALTER TABLE `chefs`
  MODIFY `CID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `deliveryteam`
--
ALTER TABLE `deliveryteam`
  MODIFY `DTID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `foods`
--
ALTER TABLE `foods`
  MODIFY `FID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `OID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `DID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
