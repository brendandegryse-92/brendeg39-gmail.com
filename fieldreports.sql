-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 26, 2020 at 06:04 PM
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
  `FieldID` int(11) NOT NULL,
  `VariableRate` tinyint(1) DEFAULT NULL,
  `FallN` int(11) DEFAULT NULL,
  `FallOther` varchar(255) DEFAULT NULL,
  `FallLbs` int(11) DEFAULT NULL,
  `FallInc` tinyint(1) DEFAULT NULL,
  `PreN` int(11) DEFAULT NULL,
  `PreOther` varchar(255) DEFAULT NULL,
  `PreLbs` int(11) DEFAULT NULL,
  `PreInc` tinyint(4) DEFAULT NULL,
  `PreEmergeN` int(11) DEFAULT NULL,
  `PreEmergeOther` varchar(255) DEFAULT NULL,
  `PreEmergeLbs` int(11) DEFAULT NULL,
  `PreEmergeInc` tinyint(4) DEFAULT NULL,
  `StarterNPK` text DEFAULT NULL,
  `StarterRate` varchar(255) DEFAULT NULL,
  `SidedressN` int(11) DEFAULT NULL,
  `SidedressInc` tinyint(4) DEFAULT NULL,
  `SidedressNFarmer` int(11) DEFAULT NULL,
  `SidedressNFarmerInc` int(11) DEFAULT NULL,
  `SidedressN75` int(11) DEFAULT NULL,
  `SidedressN75Inc` int(11) DEFAULT NULL,
  `StabilizerUsed` tinyint(1) DEFAULT NULL,
  `StabilizerProduct` varchar(255) DEFAULT NULL,
  `LbsNfromUAN` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `fertilizerapps`
--

INSERT INTO `fertilizerapps` (`ID`, `FieldID`, `VariableRate`, `FallN`, `FallOther`, `FallLbs`, `FallInc`, `PreN`, `PreOther`, `PreLbs`, `PreInc`, `PreEmergeN`, `PreEmergeOther`, `PreEmergeLbs`, `PreEmergeInc`, `StarterNPK`, `StarterRate`, `SidedressN`, `SidedressInc`, `SidedressNFarmer`, `SidedressNFarmerInc`, `SidedressN75`, `SidedressN75Inc`, `StabilizerUsed`, `StabilizerProduct`, `LbsNfromUAN`) VALUES
(7, 18, 0, 4567848, '', 0, 1, 0, '', 0, 2, 0, '', 0, 1, '', NULL, 0, 2, 0, NULL, 0, NULL, 1, '', 0),
(8, 18, 1, 4565, '', 0, 2, 0, '', 0, 2, 0, '', 0, 1, '', NULL, 0, 1, 0, 1, 0, 1, 1, '', 0);

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

INSERT INTO `field` (`ID`, `GrowerID`, `FieldName`, `Acres`, `County`, `Township`, `Section`, `Quarter`, `Tillage`, `Plantingdate`, `LastYearCrop`, `YearsCorn`, `Irrigated`, `Rotational`, `CropYear`, `CoverCrop`, `DateSeeded`, `How`, `Ncredits`, `HowKilled`, `DateKilled`) VALUES
(18, 58, 'Brendan\'s Field', 0, '', '', '', 3, 2, '0000-00-00', '', 0, 0, 0, 2000, '0000', '0000-00-00', '0000-00-00', 0, 3, '0000-00-00'),
(19, 58, 'Brendan\'s Field', 3, 'Defiance', 'Washington', 'asdf', 1, 0, '2020-05-20', 'Corn', 6, 0, 0, 2020, 'Alfalfa', '2020-05-22', 'SD', 10, 2, '2020-05-24'),
(20, 58, 'Brendan\'s Field', 456, 'Defiance', 'Washington', 'asdf', 3, 2, '2020-05-19', 'Corn', 7, 0, 0, 2020, 'Alfalfa', '2020-05-25', 'SD', 1, 1, '2020-05-27');

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
(58, 'Brendan', '', 'Degryse', '', '14361 Scott Rd. Bryan OH 43506', 'Bryan', 'OH', 43506, 5672396350, 0, 'brendandegryse@yahoo.com');

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
  `NPK` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `fertilizerapps`
--
ALTER TABLE `fertilizerapps`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `Fert` (`FieldID`);

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
  ADD KEY `Manure` (`FieldID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `fertilizerapps`
--
ALTER TABLE `fertilizerapps`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `field`
--
ALTER TABLE `field`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `grower`
--
ALTER TABLE `grower`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT for table `manure`
--
ALTER TABLE `manure`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `fertilizerapps`
--
ALTER TABLE `fertilizerapps`
  ADD CONSTRAINT `Fert` FOREIGN KEY (`FieldID`) REFERENCES `field` (`ID`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `field`
--
ALTER TABLE `field`
  ADD CONSTRAINT `Field` FOREIGN KEY (`GrowerID`) REFERENCES `grower` (`ID`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `manure`
--
ALTER TABLE `manure`
  ADD CONSTRAINT `Manure` FOREIGN KEY (`FieldID`) REFERENCES `field` (`ID`) ON DELETE CASCADE ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
