-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 15, 2020 at 08:25 PM
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
-- Database: `simplifiedtechnologyservices`
--

-- --------------------------------------------------------

--
-- Table structure for table `appchemtable`
--

CREATE TABLE `appchemtable` (
  `ID` int(11) NOT NULL,
  `GenAppID` int(11) NOT NULL,
  `ChemAppID` int(11) NOT NULL,
  `AppType` int(11) NOT NULL,
  `ChemID` int(11) NOT NULL,
  `MonitorAcres` int(11) NOT NULL,
  `Rate` double NOT NULL,
  `TotalUsed` double NOT NULL,
  `AdjustedAmount` double NOT NULL,
  `Date` date NOT NULL,
  `ReconcileDate` date NOT NULL,
  `WindSpeed` int(11) NOT NULL,
  `WindDirection` varchar(255) NOT NULL,
  `Humidity` double NOT NULL,
  `Temperature` int(11) NOT NULL,
  `TipSize` double NOT NULL,
  `Pressure` double NOT NULL,
  `GroundSpeed` int(11) NOT NULL,
  `Other` varchar(255) NOT NULL,
  `UserID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `appchemtable`
--

INSERT INTO `appchemtable` (`ID`, `GenAppID`, `ChemAppID`, `AppType`, `ChemID`, `MonitorAcres`, `Rate`, `TotalUsed`, `AdjustedAmount`, `Date`, `ReconcileDate`, `WindSpeed`, `WindDirection`, `Humidity`, `Temperature`, `TipSize`, `Pressure`, `GroundSpeed`, `Other`, `UserID`) VALUES
(1, 2, 2, 0, 0, 0, 0, 0, 0, '2020-02-24', '2020-02-29', 0, '', 0, 0, 0, 0, 0, '', 22),
(2, 10, 654, 0, 0, 0, 0, 0, 0, '0000-00-00', '0000-00-00', 0, '', 0, 0, 0, 0, 0, '', 21),
(3, 12, 231, 651, 323, 2313, 2165, 5007645, 0, '0000-00-00', '0000-00-00', 0, '', 0, 0, 0, 0, 0, '', 22),
(4, 17, 0, 1, 2, 3, 4, 5, 5, '0000-00-00', '0000-00-00', 0, '0', 0, 0, 0, 0, 0, '0', 22),
(5, 21, 0, 5, 0, 0, 0, 0, 0, '0000-00-00', '0000-00-00', 0, '', 0, 0, 0, 0, 0, '', 22),
(6, 21, 0, 3, 0, 0, 0, 0, 0, '0000-00-00', '0000-00-00', 0, '', 0, 0, 0, 0, 0, '', 22);

-- --------------------------------------------------------

--
-- Table structure for table `appferttable`
--

CREATE TABLE `appferttable` (
  `ID` int(11) NOT NULL,
  `FertAppID` int(11) NOT NULL,
  `GenAppID` int(11) NOT NULL,
  `AppType` varchar(255) NOT NULL,
  `FertID` int(11) NOT NULL,
  `MonitorAcres` int(11) NOT NULL,
  `Rate` double NOT NULL,
  `TotalUsed` double NOT NULL,
  `AdjustedAmount` double NOT NULL,
  `Date` date NOT NULL,
  `ReconcileDate` date NOT NULL,
  `UserID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `appferttable`
--

INSERT INTO `appferttable` (`ID`, `FertAppID`, `GenAppID`, `AppType`, `FertID`, `MonitorAcres`, `Rate`, `TotalUsed`, `AdjustedAmount`, `Date`, `ReconcileDate`, `UserID`) VALUES
(1, 2, 3, '3', 5, 5, 10, 2, 2, '2020-02-25', '2020-02-19', 22),
(2, 654, 8, '', 0, 0, 0, 0, 0, '0000-00-00', '0000-00-00', 22),
(3, 3216, 12, '0231', 216, 26, 651, 16926, 0, '0000-00-00', '0000-00-00', 22),
(4, 0, 22, '22221', 0, 0, 0, 0, 0, '0000-00-00', '0000-00-00', 22);

-- --------------------------------------------------------

--
-- Table structure for table `appgeninfo`
--

CREATE TABLE `appgeninfo` (
  `GenAppID` int(11) NOT NULL,
  `UserID` int(11) NOT NULL,
  `Applicator` int(11) NOT NULL,
  `AppType` int(11) NOT NULL,
  `DateApplied` date NOT NULL,
  `StopTime` time NOT NULL,
  `Conditions` varchar(255) NOT NULL,
  `ReconcileDate` date NOT NULL,
  `FieldFrom` int(11) NOT NULL,
  `FieldTo` int(11) NOT NULL,
  `Type` varchar(255) NOT NULL,
  `AutoSteerHeading` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `appgeninfo`
--

INSERT INTO `appgeninfo` (`GenAppID`, `UserID`, `Applicator`, `AppType`, `DateApplied`, `StopTime`, `Conditions`, `ReconcileDate`, `FieldFrom`, `FieldTo`, `Type`, `AutoSteerHeading`) VALUES
(10, 21, 0, 0, '0000-00-00', '00:00:00', '', '0000-00-00', 0, 0, '', 0),
(14, 22, 222222, 0, '0000-00-00', '00:00:00', '', '0000-00-00', 0, 0, 'chemical', 0),
(17, 22, 15, 0, '0000-00-00', '00:00:00', '', '0000-00-00', 0, 0, 'chemical', 0),
(18, 22, 31541, 0, '0000-00-00', '00:00:00', '', '0000-00-00', 0, 0, 'fertilizer', 0),
(20, 22, 2147483647, 0, '0000-00-00', '00:00:00', '', '0000-00-00', 0, 0, 'fertilizer', 0),
(22, 22, 22222222, 0, '0000-00-00', '00:00:00', '', '0000-00-00', 0, 0, 'fertilizer', 0),
(25, 22, 404, 0, '0000-00-00', '00:00:00', '', '0000-00-00', 0, 0, 'misc', 0);

-- --------------------------------------------------------

--
-- Table structure for table `appmiscentry`
--

CREATE TABLE `appmiscentry` (
  `ID` int(11) NOT NULL,
  `AppMiscEntryID` int(11) NOT NULL,
  `GenAppID` int(11) NOT NULL,
  `AppType` int(11) NOT NULL,
  `AppDescription` varchar(255) NOT NULL,
  `EnteredAcres` int(11) NOT NULL,
  `CostPerAcre` double NOT NULL,
  `TotalUsed` double NOT NULL,
  `AdjustedAmount` double NOT NULL,
  `UserID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `appmiscentry`
--

INSERT INTO `appmiscentry` (`ID`, `AppMiscEntryID`, `GenAppID`, `AppType`, `AppDescription`, `EnteredAcres`, `CostPerAcre`, `TotalUsed`, `AdjustedAmount`, `UserID`) VALUES
(5, 5, 25, 404, '', 0, 0, 0, 0, 22);

-- --------------------------------------------------------

--
-- Table structure for table `appseedtable`
--

CREATE TABLE `appseedtable` (
  `SeedAppID` int(11) NOT NULL,
  `GenAppID` int(11) NOT NULL,
  `AppType` int(11) NOT NULL,
  `SeedID` int(11) NOT NULL,
  `MonitorAcres` int(11) NOT NULL,
  `Population` int(11) NOT NULL,
  `TotalUsed` double NOT NULL,
  `AdjustedAmount` double NOT NULL,
  `Date` date NOT NULL,
  `ReconcileDate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `chemicals`
--

CREATE TABLE `chemicals` (
  `ID` int(11) NOT NULL,
  `UserID` int(11) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `EnteredUnits` varchar(255) NOT NULL,
  `PurchasedUnits` varchar(255) NOT NULL,
  `Ratio` decimal(10,0) NOT NULL,
  `ShowOnReport` tinyint(1) NOT NULL,
  `IsActive` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `chemicals`
--

INSERT INTO `chemicals` (`ID`, `UserID`, `Name`, `EnteredUnits`, `PurchasedUnits`, `Ratio`, `ShowOnReport`, `IsActive`) VALUES
(1, 22, 'DDT', '', '', '0', 1, 1),
(2, 22, 'Corn', '', '', '0', 1, 1),
(3, 22, 'Corn', '', '', '0', 1, 1),
(4, 22, 'kjlh', '1', '', '0', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `chemicalyears`
--

CREATE TABLE `chemicalyears` (
  `ID` int(11) NOT NULL,
  `UserID` int(11) NOT NULL,
  `DateFrom` date NOT NULL,
  `DateTo` date NOT NULL,
  `Price` double NOT NULL,
  `CropGroup` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `crop`
--

CREATE TABLE `crop` (
  `ID` int(11) NOT NULL,
  `UserID` int(11) NOT NULL,
  `CropID` int(11) DEFAULT NULL,
  `FieldID` int(11) DEFAULT NULL,
  `Year` year(4) DEFAULT NULL,
  `Description` varchar(255) DEFAULT NULL,
  `StartDate` date DEFAULT NULL,
  `StopDate` date DEFAULT NULL,
  `Latitude` float DEFAULT NULL,
  `Longitude` float DEFAULT NULL,
  `IsActive` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `crop`
--

INSERT INTO `crop` (`ID`, `UserID`, `CropID`, `FieldID`, `Year`, `Description`, `StartDate`, `StopDate`, `Latitude`, `Longitude`, `IsActive`) VALUES
(1, 22, 2, 1, 2020, '', '2020-02-11', '2020-12-31', 42.422, -84.5537, 1),
(31, 22, 3, 2, 2030, '', '0000-00-00', '0000-00-00', 0, 0, 1),
(62, 22, 1, 1, 2019, 'Corn', '2019-01-01', '2019-12-31', 0, 0, 1),
(63, 22, 2, 3, 2019, 'Corn', '2019-01-01', '2019-12-31', 0, 0, 1),
(64, 22, 3, 2, 2019, 'Soybeans', '2019-01-01', '2019-12-31', 0, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `farms`
--

CREATE TABLE `farms` (
  `ID` int(11) NOT NULL,
  `UserID` int(11) NOT NULL,
  `FarmNumber` int(11) DEFAULT NULL,
  `OperatorID` int(11) DEFAULT NULL,
  `BusinessID` int(11) DEFAULT NULL,
  `Owner` varchar(255) DEFAULT NULL,
  `FarmName` varchar(255) DEFAULT NULL,
  `CropLand` int(11) DEFAULT NULL,
  `FSA_Farm` varchar(255) DEFAULT NULL,
  `FSA_Tract` varchar(255) DEFAULT NULL,
  `InsuranceID` varchar(255) DEFAULT NULL,
  `County` varchar(255) DEFAULT NULL,
  `Description` varchar(255) DEFAULT NULL,
  `RentType` varchar(255) DEFAULT NULL,
  `PID` int(11) DEFAULT NULL,
  `IsActive` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `farms`
--

INSERT INTO `farms` (`ID`, `UserID`, `FarmNumber`, `OperatorID`, `BusinessID`, `Owner`, `FarmName`, `CropLand`, `FSA_Farm`, `FSA_Tract`, `InsuranceID`, `County`, `Description`, `RentType`, `PID`, `IsActive`) VALUES
(1, 21, 1, 1, 1, 'Brendan', 'Brendan\'s Farm', 0, 'FSA_Farm', 'Tract', '1', 'OH', 'Excellent', '2', 1, 1),
(7, 22, NULL, NULL, NULL, 'Bryan', 'Brendan\'s Farm', 1, 'FSA_Farm', 'Tract', '1', 'Defiance', 'Excellent', '2', 0, 1),
(8, 22, NULL, NULL, NULL, 'Brendan Degryse', 'Bre Farm', 0, '', '', '', '', '', '', 0, 1),
(9, 22, NULL, NULL, NULL, 'Brendan Degryse', 'asdf', 0, '', '', '', '', '', '', 0, 1),
(10, 22, NULL, NULL, NULL, '', 'Farm 1', 0, '', '', '', '', '', '', 0, 1),
(11, 22, NULL, NULL, NULL, '', 'Brendans Farm', 0, '', '', '', '', '', '', 0, 1),
(12, 22, NULL, NULL, NULL, '', 'Test Farm', 0, '', '', '', '', '', '', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `fertilizers`
--

CREATE TABLE `fertilizers` (
  `ID` int(11) NOT NULL,
  `UserID` int(11) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `EnteredUnits` varchar(255) NOT NULL,
  `PurchasedUnits` varchar(255) NOT NULL,
  `Ratio` decimal(10,0) NOT NULL,
  `IsActive` tinyint(1) NOT NULL,
  `ShowOnReport` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `fertilizers`
--

INSERT INTO `fertilizers` (`ID`, `UserID`, `Name`, `EnteredUnits`, `PurchasedUnits`, `Ratio`, `IsActive`, `ShowOnReport`) VALUES
(1, 22, 'Night', '', '', '0', 1, 1),
(3, 22, 'Beans', '', '', '0', 1, 1),
(5, 22, 'asdf', '1', 'sdf', '1', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `fertilizeryears`
--

CREATE TABLE `fertilizeryears` (
  `ID` int(11) NOT NULL,
  `UserID` int(11) NOT NULL,
  `DateFrom` date NOT NULL,
  `DateTo` date NOT NULL,
  `Price` double NOT NULL,
  `CropGroup` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `fields`
--

CREATE TABLE `fields` (
  `ID` int(11) NOT NULL,
  `UserID` int(11) NOT NULL,
  `FieldNumber` int(11) DEFAULT NULL,
  `FarmNumber` int(11) DEFAULT NULL,
  `FieldName` varchar(255) DEFAULT NULL,
  `Acres` int(11) DEFAULT NULL,
  `FSA_Farm` varchar(255) DEFAULT NULL,
  `FSA_Tract` varchar(255) DEFAULT NULL,
  `FSA_Field` varchar(255) DEFAULT NULL,
  `FSA_Area` varchar(255) DEFAULT NULL,
  `InsuranceID` varchar(255) DEFAULT NULL,
  `County` varchar(255) DEFAULT NULL,
  `Township` varchar(255) DEFAULT NULL,
  `FarmRange` varchar(255) DEFAULT NULL,
  `Section` varchar(255) DEFAULT NULL,
  `Legal` varchar(255) DEFAULT NULL,
  `Watershed` varchar(255) DEFAULT NULL,
  `Restriction` varchar(255) DEFAULT NULL,
  `Slope` int(11) DEFAULT NULL,
  `TRating` varchar(255) DEFAULT NULL,
  `Location` varchar(255) DEFAULT NULL,
  `PID` int(11) DEFAULT NULL,
  `TicketTrackID` int(11) DEFAULT NULL,
  `AutoSteerHeading` int(11) DEFAULT NULL,
  `IsActive` tinyint(1) DEFAULT NULL,
  `farmID` int(11) DEFAULT NULL,
  `FarmName` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `fields`
--

INSERT INTO `fields` (`ID`, `UserID`, `FieldNumber`, `FarmNumber`, `FieldName`, `Acres`, `FSA_Farm`, `FSA_Tract`, `FSA_Field`, `FSA_Area`, `InsuranceID`, `County`, `Township`, `FarmRange`, `Section`, `Legal`, `Watershed`, `Restriction`, `Slope`, `TRating`, `Location`, `PID`, `TicketTrackID`, `AutoSteerHeading`, `IsActive`, `farmID`, `FarmName`) VALUES
(1, 22, NULL, NULL, 'Brendan\'s Farm', 0, '1', '1', '', 'asdf', 'asdf', 'asdf', 'asdf', 'asdf', '1', '0', '0', '1', 1, '1', '0', 0, 0, 0, 1, NULL, 'Brendan\'s Farm'),
(2, 22, NULL, NULL, 'Brendan\'s Farm', 0, '0', '', '', '', '', '', '', '', '0', '0', '0', '0', 0, '0', '0', 0, 0, 0, 1, NULL, NULL),
(3, 22, NULL, NULL, 'Field 1', 50, '', '', '', '0', '', '', '', '', '', '', '', '', 0, '', '', 0, 0, 0, 1, NULL, ''),
(4, 22, NULL, NULL, 'Field2', 75, '', '', '', '0', '', '', '', '', '', '', '', '', 0, '', '', 0, 0, 0, 1, NULL, ''),
(5, 22, NULL, NULL, 'Field1', 50, '', '', '', '0', '', '', '', '', '', '', '', '', 0, '', '', 0, 0, 0, 1, NULL, '');

-- --------------------------------------------------------

--
-- Table structure for table `fieldsplit`
--

CREATE TABLE `fieldsplit` (
  `ID` int(11) NOT NULL,
  `UserID` int(11) NOT NULL,
  `FarmNumber` int(11) DEFAULT NULL,
  `Operator` varchar(255) DEFAULT NULL,
  `SplitPercent` int(11) DEFAULT NULL,
  `SplitGroup` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `fieldsplit`
--

INSERT INTO `fieldsplit` (`ID`, `UserID`, `FarmNumber`, `Operator`, `SplitPercent`, `SplitGroup`) VALUES
(1, 22, 1, 'Brendan', 50, 1),
(2, 22, 1, 'Dave', 50, 1);

-- --------------------------------------------------------

--
-- Table structure for table `operator`
--

CREATE TABLE `operator` (
  `OperatorID` int(11) NOT NULL,
  `OpNumber` int(11) DEFAULT NULL,
  `OpName` varchar(255) DEFAULT NULL,
  `OpAddress` varchar(255) DEFAULT NULL,
  `OpCity` varchar(255) DEFAULT NULL,
  `OpState` varchar(255) DEFAULT NULL,
  `OpZip` int(11) DEFAULT NULL,
  `IsActive` tinyint(1) DEFAULT NULL,
  `OpPhone` varchar(255) DEFAULT NULL,
  `UserID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `operator`
--

INSERT INTO `operator` (`OperatorID`, `OpNumber`, `OpName`, `OpAddress`, `OpCity`, `OpState`, `OpZip`, `IsActive`, `OpPhone`, `UserID`) VALUES
(84, 1, 'Brendan Degryse', '14361 Scott Rd. Bryan OH 43506', 'Bryan', 'OH', 43506, 0, '5672396350', 21),
(85, 1, 'Brendan Degryse', '14361 Scott Rd. Bryan OH 43506', 'Bryan', 'OH', 43506, 1, '5672396350', 22),
(92, 2, 'Brody', '14361 Scott Rd. Bryan OH 43506', '', '', 0, 1, '', 22),
(104, NULL, 'Bryan', '14361 Scott Rd. Bryan OH 43506', '', '', 2, 1, '', 22),
(105, NULL, 'Brendan Degryse', '14361 Scott Rd. Bryan OH 43506', 'Bryan', 'OH', 43506, 1, '5672396350', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `seeds`
--

CREATE TABLE `seeds` (
  `ID` int(11) NOT NULL,
  `UserID` int(11) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `Variety` varchar(255) NOT NULL,
  `SeedsPerUnit` int(11) NOT NULL,
  `EnteredUnit` varchar(255) NOT NULL,
  `PurchasedUnits` varchar(255) NOT NULL,
  `ShowOnReport` tinyint(1) NOT NULL,
  `IsActive` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `seeds`
--

INSERT INTO `seeds` (`ID`, `UserID`, `Name`, `Variety`, `SeedsPerUnit`, `EnteredUnit`, `PurchasedUnits`, `ShowOnReport`, `IsActive`) VALUES
(2, 22, 'Corn', '', 0, '', '', 1, 1),
(9, 22, 'jhb', 'jg', 654, 'hfjjg', 'jhgf', 1, 1),
(10, 22, 'laskd', 'asdf', 0, 'asdf', 'adf', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `seedsyears`
--

CREATE TABLE `seedsyears` (
  `ID` int(11) NOT NULL,
  `UserID` int(11) NOT NULL,
  `DateFrom` date NOT NULL,
  `DateTo` date NOT NULL,
  `Price` double NOT NULL,
  `CropGroup` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `seedsyears`
--

INSERT INTO `seedsyears` (`ID`, `UserID`, `DateFrom`, `DateTo`, `Price`, `CropGroup`) VALUES
(8, 22, '2020-03-17', '2020-03-18', 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `UserID` int(11) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `accountType` varchar(255) DEFAULT NULL,
  `ExpireDate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`UserID`, `email`, `name`, `phone`, `password`, `accountType`, `ExpireDate`) VALUES
(21, 'brendandegryse@yahoo.com', 'Brendan Degryse', '5672396350', '$2y$10$HZNJQ0FFyx1PsZ2krNe6du792To.TXpgZ41mN76ldzBdlDgEHbxsu', 'active', '2020-04-01'),
(22, 'brendeg39@gmail.com', 'Brendan Degryse', '5672396350', '$2y$10$zK2/7Yv0jGgh6pizpusms.dzBwrHjHsto.gU4sJ8Ys.j9MtlfENHu', 'active', '2020-04-30');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appchemtable`
--
ALTER TABLE `appchemtable`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `GenAppID` (`GenAppID`);

--
-- Indexes for table `appferttable`
--
ALTER TABLE `appferttable`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `appgeninfo`
--
ALTER TABLE `appgeninfo`
  ADD PRIMARY KEY (`GenAppID`);

--
-- Indexes for table `appmiscentry`
--
ALTER TABLE `appmiscentry`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `appseedtable`
--
ALTER TABLE `appseedtable`
  ADD PRIMARY KEY (`SeedAppID`);

--
-- Indexes for table `chemicals`
--
ALTER TABLE `chemicals`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `chemicalyears`
--
ALTER TABLE `chemicalyears`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `CropGroup` (`CropGroup`);

--
-- Indexes for table `crop`
--
ALTER TABLE `crop`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `farms`
--
ALTER TABLE `farms`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `UserID` (`UserID`);

--
-- Indexes for table `fertilizers`
--
ALTER TABLE `fertilizers`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `fertilizeryears`
--
ALTER TABLE `fertilizeryears`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `CropGroupFertilizers` (`CropGroup`);

--
-- Indexes for table `fields`
--
ALTER TABLE `fields`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `UserID` (`UserID`);

--
-- Indexes for table `fieldsplit`
--
ALTER TABLE `fieldsplit`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `operator`
--
ALTER TABLE `operator`
  ADD PRIMARY KEY (`OperatorID`);

--
-- Indexes for table `seeds`
--
ALTER TABLE `seeds`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `seedsyears`
--
ALTER TABLE `seedsyears`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `CropGroup` (`CropGroup`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`UserID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `appchemtable`
--
ALTER TABLE `appchemtable`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `appferttable`
--
ALTER TABLE `appferttable`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `appgeninfo`
--
ALTER TABLE `appgeninfo`
  MODIFY `GenAppID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `appmiscentry`
--
ALTER TABLE `appmiscentry`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `appseedtable`
--
ALTER TABLE `appseedtable`
  MODIFY `SeedAppID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `chemicals`
--
ALTER TABLE `chemicals`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `chemicalyears`
--
ALTER TABLE `chemicalyears`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `crop`
--
ALTER TABLE `crop`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT for table `farms`
--
ALTER TABLE `farms`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `fertilizers`
--
ALTER TABLE `fertilizers`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `fertilizeryears`
--
ALTER TABLE `fertilizeryears`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `fields`
--
ALTER TABLE `fields`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `fieldsplit`
--
ALTER TABLE `fieldsplit`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `operator`
--
ALTER TABLE `operator`
  MODIFY `OperatorID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=157;

--
-- AUTO_INCREMENT for table `seeds`
--
ALTER TABLE `seeds`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `seedsyears`
--
ALTER TABLE `seedsyears`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `UserID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `chemicalyears`
--
ALTER TABLE `chemicalyears`
  ADD CONSTRAINT `ChemicalYearsCascade` FOREIGN KEY (`CropGroup`) REFERENCES `chemicals` (`ID`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `farms`
--
ALTER TABLE `farms`
  ADD CONSTRAINT `farms_ibfk_1` FOREIGN KEY (`UserID`) REFERENCES `users` (`UserID`);

--
-- Constraints for table `fertilizeryears`
--
ALTER TABLE `fertilizeryears`
  ADD CONSTRAINT `FertilizerYearsCascade` FOREIGN KEY (`CropGroup`) REFERENCES `fertilizers` (`ID`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `fields`
--
ALTER TABLE `fields`
  ADD CONSTRAINT `fields_ibfk_1` FOREIGN KEY (`UserID`) REFERENCES `users` (`UserID`);

--
-- Constraints for table `seedsyears`
--
ALTER TABLE `seedsyears`
  ADD CONSTRAINT `SeedYearsCascade` FOREIGN KEY (`CropGroup`) REFERENCES `seeds` (`ID`) ON DELETE CASCADE ON UPDATE NO ACTION;

DELIMITER $$
--
-- Events
--
CREATE DEFINER=`root`@`localhost` EVENT `Users disable` ON SCHEDULE EVERY 2 MINUTE STARTS '2020-03-31 00:00:00' ENDS '2022-12-30 00:00:00' ON COMPLETION NOT PRESERVE ENABLE DO UPDATE users SET accountType = "inactive" WHERE ExpireDate < CURRENT_DATE$$

DELIMITER ;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
