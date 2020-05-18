-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 18, 2020 at 07:38 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fieldreports`
--

-- --------------------------------------------------------

--
-- Table structure for table `fertilizerapps`
--

CREATE TABLE `fertilizerapps` (
  `ID` int(11) NOT NULL,
  `GrowerID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `field`
--

CREATE TABLE `field` (
  `ID` int(11) NOT NULL,
  `GrowerID` int(11) NOT NULL,
  `FieldName` varchar(255) NOT NULL,
  `Acres` int(11) NOT NULL,
  `County` varchar(255) NOT NULL,
  `Township` varchar(255) NOT NULL,
  `Section` varchar(255) NOT NULL,
  `Quarter` int(11) NOT NULL,
  `Tillage` int(11) NOT NULL,
  `Plantingdate` date NOT NULL,
  `Variety` varchar(255) NOT NULL,
  `LastYearCrop` varchar(255) NOT NULL,
  `YearsCorn` int(11) NOT NULL,
  `Irrigated` tinyint(1) NOT NULL,
  `Rotational` int(11) NOT NULL,
  `CropYear` year(4) NOT NULL,
  `CoverCrop` varchar(255) NOT NULL,
  `DateSeeded` date NOT NULL,
  `How` varchar(255) NOT NULL,
  `Ncredits` int(11) NOT NULL,
  `HowKilled` int(11) NOT NULL,
  `DateKilled` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `field`
--

INSERT INTO `field` (`ID`, `GrowerID`, `FieldName`, `Acres`, `County`, `Township`, `Section`, `Quarter`, `Tillage`, `Plantingdate`, `Variety`, `LastYearCrop`, `YearsCorn`, `Irrigated`, `Rotational`, `CropYear`, `CoverCrop`, `DateSeeded`, `How`, `Ncredits`, `HowKilled`, `DateKilled`) VALUES
(15, 58, 'Brendan\'s Field', 0, '', '0', '0', 0, 0, '0000-00-00', '', '', 0, 0, 0, 0000, '', '0000-00-00', '', 0, 0, '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `grower`
--

CREATE TABLE `grower` (
  `ID` int(11) NOT NULL,
  `FirstName` varchar(255) NOT NULL,
  `MI` varchar(2) NOT NULL,
  `LastName` varchar(255) NOT NULL,
  `CompanyName` varchar(255) NOT NULL,
  `MailingAddress` varchar(255) NOT NULL,
  `City` varchar(255) NOT NULL,
  `State` varchar(255) NOT NULL,
  `Zip` int(11) NOT NULL,
  `HomePhone` bigint(20) NOT NULL,
  `MobilePhone` bigint(20) NOT NULL,
  `Email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `grower`
--

INSERT INTO `grower` (`ID`, `FirstName`, `MI`, `LastName`, `CompanyName`, `MailingAddress`, `City`, `State`, `Zip`, `HomePhone`, `MobilePhone`, `Email`) VALUES
(58, 'Brendan', '', 'Degryse', '', '14361 Scott Rd. Bryan OH 43506', 'Bryan', 'OH', 43506, 5672396350, 0, 'brendandegryse@yahoo.com'),
(59, 'Brendan', '', 'Degryse', '', '14361 Scott Rd. Bryan OH 43506', 'Bryan', 'OH', 43506, 5672396350, 0, 'brendandegryse@yahoo.com');

-- --------------------------------------------------------

--
-- Table structure for table `manure`
--

CREATE TABLE `manure` (
  `ID` int(11) NOT NULL,
  `FieldID` int(11) NOT NULL,
  `Manure` varchar(255) NOT NULL,
  `AppType` int(11) NOT NULL,
  `Time` time NOT NULL,
  `Availability` int(11) NOT NULL,
  `AppTiming` int(11) NOT NULL,
  `AmountPerAcre` int(11) NOT NULL,
  `NPK` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `fertilizerapps`
--
ALTER TABLE `fertilizerapps`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `GrowerFert` (`GrowerID`);

--
-- Indexes for table `field`
--
ALTER TABLE `field`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `Grower` (`GrowerID`);

--
-- Indexes for table `grower`
--
ALTER TABLE `grower`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `manure`
--
ALTER TABLE `manure`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `FieldConstraintManure` (`FieldID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `fertilizerapps`
--
ALTER TABLE `fertilizerapps`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `field`
--
ALTER TABLE `field`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `grower`
--
ALTER TABLE `grower`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT for table `manure`
--
ALTER TABLE `manure`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `fertilizerapps`
--
ALTER TABLE `fertilizerapps`
  ADD CONSTRAINT `GrowerFert` FOREIGN KEY (`GrowerID`) REFERENCES `field` (`ID`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `field`
--
ALTER TABLE `field`
  ADD CONSTRAINT `Grower` FOREIGN KEY (`GrowerID`) REFERENCES `grower` (`ID`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `manure`
--
ALTER TABLE `manure`
  ADD CONSTRAINT `FieldConstraintManure` FOREIGN KEY (`FieldID`) REFERENCES `manure` (`ID`) ON DELETE CASCADE ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
