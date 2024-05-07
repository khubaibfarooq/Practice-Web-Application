-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 21, 2019 at 04:51 AM
-- Server version: 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `airline`
--

-- --------------------------------------------------------

--
-- Table structure for table `flights`
--

CREATE TABLE `flights` (
  `FID` int(11) NOT NULL,
  `PlaneID` int(11) NOT NULL,
  `Source` varchar(100) NOT NULL,
  `Destination` varchar(100) NOT NULL,
  `Dep_Date` date NOT NULL,
  `Dep_Time` time NOT NULL,
  `Price` float NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `flights`
--

INSERT INTO `flights` (`FID`, `PlaneID`, `Source`, `Destination`, `Dep_Date`, `Dep_Time`, `Price`) VALUES
(1, 1, '1', '1', '2019-06-18', '01:00:00', 2600);

-- --------------------------------------------------------

--
-- Table structure for table `locations`
--

CREATE TABLE `locations` (
  `LID` int(11) NOT NULL,
  `LName` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `locations`
--

INSERT INTO `locations` (`LID`, `LName`) VALUES
(1, 'lahore'),
(2, 'Chakwal');

-- --------------------------------------------------------

--
-- Table structure for table `login_info`
--

CREATE TABLE `login_info` (
  `UID` int(11) NOT NULL,
  `FullName` varchar(100) NOT NULL,
  `UserName` varchar(50) NOT NULL,
  `Password` varchar(50) NOT NULL,
  `Type` varchar(30) NOT NULL,
  `Email` varchar(150) NOT NULL,
  `ContactNo` varchar(20) NOT NULL,
  `Address` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login_info`
--

INSERT INTO `login_info` (`UID`, `FullName`, `UserName`, `Password`, `Type`, `Email`, `ContactNo`, `Address`) VALUES
(1, 'muhammad', 'muhammad', '1234', 'admin', 'admin@gmail.com', '342134', 'asdsad'),
(2, 'asif', 'asif', '321', 'user', 'user@gmail.com', '12412', 'asefe');

-- --------------------------------------------------------

--
-- Table structure for table `planes`
--

CREATE TABLE `planes` (
  `PlaneID` int(11) NOT NULL,
  `Model` varchar(11) NOT NULL,
  `Company` varchar(100) NOT NULL,
  `Name` varchar(100) NOT NULL,
  `NSeats` int(12) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `planes`
--

INSERT INTO `planes` (`PlaneID`, `Model`, `Company`, `Name`, `NSeats`) VALUES
(1, '2019', 'PIA', 'pia', 252);

-- --------------------------------------------------------

--
-- Table structure for table `reservations`
--

CREATE TABLE `reservations` (
  `ResID` int(11) NOT NULL,
  `FID` int(11) NOT NULL,
  `UID` int(11) NOT NULL,
  `TotalPrice` int(9) NOT NULL,
  `FlightDate` date NOT NULL,
  `FlightTime` time NOT NULL,
  `ResDate` date NOT NULL,
  `BasicPrice` float NOT NULL,
  `Seats` int(3) NOT NULL,
  `Status` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reservations`
--

INSERT INTO `reservations` (`ResID`, `FID`, `UID`, `TotalPrice`, `FlightDate`, `FlightTime`, `ResDate`, `BasicPrice`, `Seats`, `Status`) VALUES
(1, 1, 1, 2500, '2019-06-18', '01:00:00', '2019-06-14', 2500, 1, 'Accept'),
(2, 1, 2, 5000, '2019-06-18', '01:00:00', '2019-06-15', 2500, 2, 'Accept'),
(3, 1, 2, 7500, '2019-06-18', '01:00:00', '2019-06-15', 2500, 3, 'Accept'),
(4, 1, 2, 2600, '2019-06-18', '01:00:00', '2019-06-17', 2600, 1, 'Accept'),
(5, 1, 2, 5200, '2019-06-18', '01:00:00', '2019-06-17', 2600, 2, 'Pending'),
(6, 1, 2, 5200, '2019-06-18', '01:00:00', '2019-06-17', 2600, 2, 'Pending'),
(7, 1, 2, 5200, '2019-06-18', '01:00:00', '2019-06-17', 2600, 2, 'Pending');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `flights`
--
ALTER TABLE `flights`
  ADD PRIMARY KEY (`FID`);

--
-- Indexes for table `locations`
--
ALTER TABLE `locations`
  ADD PRIMARY KEY (`LID`);

--
-- Indexes for table `login_info`
--
ALTER TABLE `login_info`
  ADD PRIMARY KEY (`UID`);

--
-- Indexes for table `planes`
--
ALTER TABLE `planes`
  ADD PRIMARY KEY (`PlaneID`);

--
-- Indexes for table `reservations`
--
ALTER TABLE `reservations`
  ADD PRIMARY KEY (`ResID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `flights`
--
ALTER TABLE `flights`
  MODIFY `FID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `locations`
--
ALTER TABLE `locations`
  MODIFY `LID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `login_info`
--
ALTER TABLE `login_info`
  MODIFY `UID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `planes`
--
ALTER TABLE `planes`
  MODIFY `PlaneID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `reservations`
--
ALTER TABLE `reservations`
  MODIFY `ResID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
