-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 03, 2020 at 03:38 PM
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
(6, 21, 0, 3, 0, 0, 0, 0, 0, '0000-00-00', '0000-00-00', 0, '', 0, 0, 0, 0, 0, '', 22),
(7, 27, 0, 10, 0, 0, 0, 0, 0, '0000-00-00', '0000-00-00', 0, '', 0, 0, 0, 0, 0, '', 22);

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
(4, 0, 22, '22223', 0, 0, 0, 0, 0, '0000-00-00', '0000-00-00', 22),
(5, 0, 28, 'App1', 1, 156, 0.25, 39, 0, '2020-04-27', '2020-04-28', 22);

-- --------------------------------------------------------

--
-- Table structure for table `appgeninfo`
--

CREATE TABLE `appgeninfo` (
  `GenAppID` int(11) NOT NULL,
  `UserID` int(11) NOT NULL,
  `Applicator` varchar(255) NOT NULL,
  `AppType` varchar(255) NOT NULL,
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
(10, 21, '0', '0', '0000-00-00', '00:00:00', '', '0000-00-00', 0, 0, '', 0),
(14, 22, '222222', '0', '0000-00-00', '00:00:00', '', '0000-00-00', 0, 0, 'chemical', 0),
(17, 22, '15', '0', '0000-00-00', '00:00:00', '', '0000-00-00', 0, 0, 'chemical', 0),
(18, 22, '31541', '0', '0000-00-00', '00:00:00', 'kjhg', '0000-00-00', 0, 0, 'fertilizer', 0),
(20, 22, '2147483647', '0', '0000-00-00', '00:00:00', '', '0000-00-00', 0, 0, 'fertilizer', 0),
(22, 22, '22222222', '0', '0000-00-00', '00:00:00', '', '0000-00-00', 0, 0, 'fertilizer', 0),
(25, 22, '404', '0', '0000-00-00', '00:00:00', '', '0000-00-00', 0, 0, 'misc', 0),
(26, 22, '0', '1354987', '2020-04-21', '00:00:00', '', '0000-00-00', 0, 0, 'misc', 0),
(27, 22, '10', '10', '2020-04-18', '00:00:00', '', '0000-00-00', 0, 0, 'chemical', 0),
(28, 22, 'App1', 'App1', '2020-04-27', '00:00:00', '', '0000-00-00', 0, 0, 'fertilizer', 0);

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
(5, 5, 25, 404, '', 0, 0, 0, 0, 22),
(6, 0, 26, 4659, '', 0, 0, 0, 0, 22);

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
(953, 22, 'RoundUp  PM', 'Ounces', 'Gallons', '0', 0, 1),
(954, 22, '2,4-D', 'Pint', 'Gallons', '0', 1, 1),
(955, 22, 'Select', 'Ounces', 'Gallons', '0', 0, 1),
(956, 22, 'Crop Oil', 'Ounces', 'Gallons', '0', 0, 0),
(957, 22, 'AMS (Water treatment)', 'Pounds', 'Pounds', '1', 0, 0),
(958, 22, 'Warrior', 'Ounces', 'Ounces', '1', 0, 1),
(959, 22, 'Improve', 'Pints', 'Gallons', '0', 0, 0),
(960, 22, 'Headline', 'Ounces', 'Gallons', '0', 0, 0),
(961, 22, 'Extreme', 'Pints', 'Gallons', '0', 0, 0),
(962, 22, 'Gaurdsmanmax', 'Quarts', 'Gallons', '0', 0, 0),
(963, 22, 'Simazine', 'Quarts', 'Gallons', '0', 0, 1),
(964, 22, 'Aspa80', 'Ounces', 'Gallons', '0', 1, 1),
(965, 22, 'Status', 'Ounces', 'Ounces', '1', 0, 1),
(966, 22, 'Option', 'Ounces', 'Ounces', '1', 0, 1),
(967, 22, 'Destiny', 'Pints', 'Gallons', '0', 0, 0),
(968, 22, 'Max-in', 'Quarts', 'Gallons', '0', 0, 1),
(969, 22, 'Fotress', 'Pounds', 'Pounds', '1', 0, 0),
(970, 22, 'Radius', 'Ounces', 'Gallons', '0', 0, 1),
(971, 22, 'Atrazine4L', 'Quarts', 'Gallons', '0', 0, 0),
(972, 22, 'Dimethoate', 'Pint', 'Gallons', '0', 0, 0),
(973, 22, 'Superb HC', 'Pint', 'Gallons', '0', 0, 1),
(974, 22, 'Preference', 'Pint', 'Galoons', '0', 0, 1),
(975, 22, 'Manganese', 'Quart', 'Gallons', '0', 0, 1),
(976, 22, 'Equipt', '0unces', 'Ounces', '1', 0, 0),
(977, 22, 'Interlock', 'Ounces', 'Gallons', '0', 0, 0),
(978, 22, 'Cornerstone', 'Ounces', 'Gallons', '0', 0, 0),
(979, 22, 'NANOBOOST', 'OUNCES', 'GALLONS', '0', 0, 1),
(980, 22, 'Corvus', 'Ounces', 'ounces', '1', 0, 0),
(981, 22, 'Bucceneer', 'Ounces', 'Gallons', '0', 0, 0),
(982, 22, 'Boundry', 'Pints', 'Gallons', '0', 0, 0),
(983, 22, 'Request', 'Quarts', 'Gallons', '0', 0, 1),
(984, 22, 'Touchdown', 'Ounces', 'Gallons', '0', 0, 1),
(985, 22, 'x99 Surfactant', 'Ounces', 'Gallons', '0', 0, 1),
(986, 22, 'Border 250', 'Ounces', 'Pounds', '0', 0, 0),
(987, 22, 'Control', 'Ounces', 'Quarts', '0', 0, 0),
(988, 22, 'Baythroid', 'Ounces', 'Ounces', '1', 0, 0),
(989, 22, 'Halex GT', 'Pints', 'Gallons', '0', 0, 0),
(990, 22, 'Citron', 'Pounds', 'Pounds', '1', 0, 0),
(991, 22, 'Flex Star GT', 'Pints', 'Gallons', '0', 0, 0),
(992, 22, 'Prosaro', 'Ounces', 'Gallons', '0', 0, 1),
(993, 22, 'Clarity', 'Ounces', 'Gallons', '0', 0, 1),
(994, 22, 'Perc Plus', 'Ounces', 'Gallons', '0', 0, 1),
(995, 22, 'Liberty', 'Ounces', 'Gallons', '0', 0, 0),
(996, 22, 'Quadris', 'Ounces', 'Gallons', '0', 0, 1),
(997, 22, 'Qujilt XL', 'Ounces', 'Gallons', '0', 0, 1),
(998, 22, 'Peak', 'Ounces', 'Ounces', '1', 0, 1),
(999, 22, 'Fusalade', 'Ounces', 'Gallons', '0', 0, 0),
(1000, 22, 'Resource', 'Ounces', 'Gallon', '0', 0, 1),
(1001, 22, 'Autum', 'Ounces', 'Ounces', '1', 0, 0),
(1002, 22, 'Sencor', 'Ounces', 'Pounds', '0', 0, 1),
(1003, 22, 'Primary', 'Ounces', 'Gallons', '0', 0, 1),
(1004, 22, 'Outlaw', 'Ounces', 'Gallon', '0', 0, 1),
(1005, 22, 'Grow 7', 'Gallons', 'Gallons', '1', 0, 0),
(1006, 22, 'Gramaxzone', 'Ounnces', 'Gallons', '0', 0, 0),
(1007, 22, 'Dual Magnum', 'Pints', 'Gallons', '0', 0, 0),
(1008, 22, 'Endigo', 'Ounces', 'Gallons', '0', 0, 0),
(1009, 22, 'Approach', 'Ounces', 'Gallons', '0', 0, 0),
(1010, 22, 'Envive', 'Ounces', 'Ounces', '1', 0, 0),
(1011, 22, 'Glory', 'Ounces', 'Pounds', '0', 0, 0),
(1012, 22, 'Burndown', 'Gallon', 'Gallon', '1', 0, 0),
(1013, 22, 'Abundnt', 'Ounces', 'Gallons', '0', 0, 0),
(1014, 22, 'Array', 'Pounds', 'Pounds', '1', 0, 0),
(1015, 22, 'Instigate', 'Ounces', 'Ounces', '1', 0, 1),
(1016, 22, 'Cinch', 'Quart', 'Gallons', '0', 0, 0),
(1017, 22, 'Approach Prima', 'Ounces', 'Gallons', '0', 1, 1),
(1018, 22, 'Sharpen', 'Ounces', 'Ounces', '1', 0, 1),
(1019, 22, 'Agrimek', 'Ounces', 'Gallons', '0', 0, 0),
(1020, 22, 'Lorsban', 'Ounces', 'Gallons', '0', 0, 0),
(1021, 22, 'Govern', 'Ounces', 'Gallons', '0', 0, 0),
(1022, 22, 'Pilot', 'Ounces', 'Gallons', '0', 0, 1),
(1023, 22, 'Weedmaster', 'Quarts', 'Gallons', '0', 0, 1),
(1024, 22, 'MONTYS FOLIAR 2', 'GALLONS', 'GALLONS', '1', 0, 1),
(1025, 22, 'Northstar', 'Ounces', 'Ounces', '1', 0, 1),
(1026, 22, 'Calisto', 'Ounces', 'Gallons', '0', 0, 0),
(1027, 22, 'Brawl', 'Pint', 'Gallons', '0', 0, 0),
(1028, 22, 'Fexapan', 'Ounces', 'Gallons', '0', 0, 0),
(1029, 22, 'Rresicore', 'Quarts', 'Gallons', '0', 0, 1),
(1030, 22, 'Province II', 'Ounces', 'Ounces', '1', 0, 1),
(1031, 22, '', '', '', '0', 0, 1);

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

--
-- Dumping data for table `chemicalyears`
--

INSERT INTO `chemicalyears` (`ID`, `UserID`, `DateFrom`, `DateTo`, `Price`, `CropGroup`) VALUES
(7700, 22, '2008-01-01', '2008-12-31', 25.31, 953),
(7701, 22, '2008-01-01', '2008-12-31', 25.31, 953),
(7702, 22, '2008-01-01', '2008-12-31', 12.33, 954),
(7703, 22, '2008-01-01', '2020-12-31', 50, 955),
(7704, 22, '2008-01-01', '2008-12-31', 0, 956),
(7705, 22, '2008-01-01', '2008-12-31', 0.15, 957),
(7706, 22, '2008-01-01', '2008-12-31', 0.15, 957),
(7707, 22, '2008-01-01', '2008-12-31', 0.15, 957),
(7708, 22, '2008-01-01', '2008-12-31', 236, 958),
(7709, 22, '2008-01-01', '2008-12-31', 18, 959),
(7710, 22, '2008-01-01', '2008-12-31', 202.37, 960),
(7711, 22, '2008-01-01', '2008-12-31', 25.74, 961),
(7712, 22, '2008-01-01', '2008-12-31', 25.74, 961),
(7713, 22, '2008-01-01', '2008-12-31', 29, 962),
(7714, 22, '2008-01-01', '2020-12-31', 12.75, 963),
(7715, 22, '2008-01-01', '2008-12-31', 0.1, 964),
(7716, 22, '2008-01-01', '2008-12-31', 0.25, 964),
(7717, 22, '2008-01-01', '2008-12-31', 0.3, 964),
(7719, 22, '2008-01-01', '2008-12-31', 0.9, 964),
(7720, 22, '2008-01-01', '2008-12-31', 0.25, 964),
(7721, 22, '2008-01-01', '2008-12-31', 24.41, 964),
(7722, 22, '2008-01-01', '2008-12-31', 24.41, 964),
(7723, 22, '2008-01-01', '2008-12-31', 2.3, 965),
(7724, 22, '2008-01-01', '2008-12-31', 10.65, 966),
(7725, 22, '2008-01-01', '2008-12-31', 14, 967),
(7726, 22, '2008-01-01', '2008-12-31', 12, 968),
(7727, 22, '2008-01-01', '2008-12-31', 3.88, 969),
(7728, 22, '2008-01-01', '2008-12-31', 0, 970),
(7729, 22, '2008-01-01', '2008-12-31', 0, 971),
(7730, 22, '2008-01-01', '2008-12-31', 0, 971),
(7731, 22, '2008-01-01', '2008-12-31', 0, 971),
(7732, 22, '2008-01-01', '2008-12-31', 0, 972),
(7733, 22, '2008-01-01', '2008-12-31', 0, 973),
(7734, 22, '2008-01-01', '2008-12-31', 0, 974),
(7735, 22, '2008-01-01', '2008-12-31', 0, 975),
(7736, 22, '2008-01-01', '2008-12-31', 0, 975),
(7737, 22, '2008-01-01', '2008-12-31', 0, 976),
(7738, 22, '2008-01-01', '2008-12-31', 0, 977),
(7739, 22, '2008-01-01', '2008-12-31', 0, 978),
(7740, 22, '2008-01-01', '2008-12-31', 0, 978),
(7741, 22, '2008-01-01', '2008-12-31', 0, 979),
(7742, 22, '2008-01-01', '2008-12-31', 0, 980),
(7743, 22, '2008-01-01', '2008-12-31', 0, 980),
(7744, 22, '2008-01-01', '2008-12-31', 0, 981),
(7745, 22, '2008-01-01', '2008-12-31', 0, 981),
(7746, 22, '2008-01-01', '2008-12-31', 0, 982),
(7747, 22, '2008-01-01', '2008-12-31', 0, 983),
(7748, 22, '2008-01-01', '2008-12-31', 0, 984),
(7749, 22, '2008-01-01', '2008-12-31', 0, 985),
(7750, 22, '2008-01-01', '2008-12-31', 0, 986),
(7751, 22, '2008-01-01', '2008-12-31', 0, 987),
(7752, 22, '2008-01-01', '2008-12-31', 0, 988),
(7753, 22, '2008-01-01', '2008-12-31', 0, 989),
(7754, 22, '2008-01-01', '2008-12-31', 0.25, 990),
(7755, 22, '2008-01-01', '2008-12-31', 0, 991),
(7756, 22, '2008-01-01', '2008-12-31', 0, 992),
(7757, 22, '2008-01-01', '2008-12-31', 0, 993),
(7758, 22, '2008-01-01', '2008-12-31', 0, 994),
(7759, 22, '2008-01-01', '2008-12-31', 0, 995),
(7760, 22, '2008-01-01', '2008-12-31', 0, 996),
(7761, 22, '2008-01-01', '2008-12-31', 0, 997),
(7762, 22, '2008-01-01', '2008-12-31', 0, 998),
(7763, 22, '2008-01-01', '2008-12-31', 0, 999),
(7764, 22, '2008-01-01', '2008-12-31', 0, 1000),
(7765, 22, '2008-01-01', '2008-12-31', 0, 1001),
(7766, 22, '2008-01-01', '2008-12-31', 0, 1002),
(7767, 22, '2008-01-01', '2008-12-31', 0, 1003),
(7768, 22, '2008-01-01', '2008-12-31', 0, 1004),
(7769, 22, '2008-01-01', '2008-12-31', 0, 1005),
(7770, 22, '2008-01-01', '2008-12-31', 0, 1006),
(7771, 22, '2008-01-01', '2008-12-31', 0, 1007),
(7772, 22, '2008-01-01', '2008-12-31', 0, 1008),
(7773, 22, '2008-01-01', '2008-12-31', 0, 1009),
(7774, 22, '2008-01-01', '2008-12-31', 0, 1010),
(7775, 22, '2008-01-01', '2008-12-31', 0, 1011),
(7776, 22, '2008-01-01', '2008-12-31', 0, 1012),
(7777, 22, '2008-01-01', '2008-12-31', 0, 1013),
(7778, 22, '2008-01-01', '2008-12-31', 0, 1014),
(7779, 22, '2008-01-01', '2008-12-31', 0, 1015),
(7780, 22, '2008-01-01', '2008-12-31', 0, 1016),
(7781, 22, '2008-01-01', '2008-12-31', 0, 1017),
(7782, 22, '2008-01-01', '2008-12-31', 0, 1018),
(7783, 22, '2008-01-01', '2008-12-31', 0, 1019),
(7784, 22, '2008-01-01', '2008-12-31', 0, 1020),
(7785, 22, '2008-01-01', '2008-12-31', 0, 1021),
(7786, 22, '2008-01-01', '2008-12-31', 0, 1022),
(7787, 22, '2008-01-01', '2008-12-31', 0, 1023),
(7788, 22, '2008-01-01', '2008-12-31', 0, 1024),
(7789, 22, '2008-01-01', '2008-12-31', 0, 1025),
(7790, 22, '2008-01-01', '2008-12-31', 0, 1026),
(7791, 22, '2008-01-01', '2008-12-31', 0, 1027),
(7792, 22, '2008-01-01', '2008-12-31', 0, 1028),
(7793, 22, '2008-01-01', '2008-12-31', 0, 1029),
(7794, 22, '2008-01-01', '2008-12-31', 0, 1030),
(7795, 22, '2009-05-29', '2009-07-20', 0.5, 990),
(7796, 22, '2010-05-29', '2010-12-31', 0.75, 990),
(7797, 22, '2011-10-10', '2011-12-31', 1, 990),
(7798, 22, '2012-05-29', '2012-05-29', 1, 990),
(7799, 22, '2020-05-26', '2020-05-28', 0.9, 964),
(7800, 22, '0000-00-00', '0000-00-00', 1, 1012),
(7801, 22, '2020-06-10', '2020-06-25', 0.25, 1031),
(7802, 22, '2020-06-26', '2020-06-24', 0.26, 1031),
(7803, 22, '2020-06-15', '2020-06-16', 0.27, 1031),
(7804, 22, '2020-06-19', '2020-06-22', 0.3, 1031),
(7805, 22, '2020-06-17', '2020-06-15', 0.28, 1031),
(7806, 22, '2020-06-24', '2020-06-17', 0.29, 1031),
(7807, 22, '2020-06-17', '2020-06-25', 0.31, 1031),
(7808, 22, '2020-06-16', '2020-06-16', 0.32, 1031);

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
(62, 22, 1, 1, 2020, 'Corn', '2019-01-01', '2019-12-31', 41.4155, -84.5513, 1),
(63, 22, 2, 3, 2020, 'Corn', '2019-01-01', '2019-12-31', 41.4135, 0, 1),
(65, 22, 3, 2, 2020, 'Corn', '2020-04-22', '2020-05-17', 0, 0, 1),
(66, 22, 4, 4, 2020, '', '0000-00-00', '0000-00-00', 0, 0, 1);

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
(29, 22, NULL, NULL, NULL, 'Brendan Degryse', 'United States', 0, 'United States', '', '', '', '', '', 0, 1),
(30, 22, NULL, NULL, NULL, 'Brendan Degryse', 'United States', 0, 'United States', 'United States', 'United States', 'OH', '', '', 0, 1);

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
(64, 22, '28%', 'Gallons', 'Tons', '0', 1, 0),
(65, 22, 'AMS 21-00-00', 'Pounds', 'Tons', '0', 0, 0),
(66, 22, 'DAP 18-46-00', 'Pounds', 'Tons', '0', 0, 0),
(67, 22, 'POTASH 00-00-60', 'Pounds', 'Tons', '0', 0, 0),
(68, 22, 'TSP 00-45-00', 'Pounds', 'Tons', '0', 0, 0),
(69, 22, 'Ele. Sulfur', 'Pounds', 'Tons', '0', 0, 0),
(70, 22, 'Cave Lime', 'Tons', 'Tons', '1', 0, 0),
(71, 22, '10-34-0', 'Gallons', 'Tons', '0', 0, 0),
(72, 22, '32%', 'Gallons', 'Tons', '0', 0, 0),
(73, 22, 'llo', 'Pounds', 'Tons', '0', 0, 0),
(74, 22, 'MAP 11-52-00', 'Pounds', 'Tons', '0', 0, 0),
(75, 22, 'Sulfur Mag.', 'Pounds', 'Tons', '0', 0, 0),
(76, 22, 'Dolomite Lime', 'Tons', 'Tons', '1', 0, 0),
(77, 22, 'Anhydrous 82%', 'Pounds', 'Tons', '0', 0, 0),
(78, 22, 'Zinc Starter', 'Pints', 'Gallons', '0', 0, 0),
(79, 22, 'Carbon', 'Quarts', 'Gallons', '0', 1, 0),
(80, 22, 'Biomate', 'Ounces', 'Gallons', '0', 0, 0),
(81, 22, 'Manure', 'Acres', 'Acres', '1', 0, 0),
(82, 22, 'Hose Charge', 'feet', 'feet', '1', 0, 0),
(83, 22, 'Alfalfa Mix', 'Gallons', 'Gallons', '1', 0, 0),
(84, 22, '9-18-9', 'Gallons', 'Gallons', '1', 0, 0),
(85, 22, 'Corn mix', 'Ounces', 'Gallons', '0', 0, 0),
(86, 22, '8-16-8', 'Ounces', 'Gallons', '0', 0, 0),
(87, 22, 'Bean Mix', 'Gallons', 'Gallons', '1', 1, 0),
(88, 22, 'Boron', 'Ounces', 'Gallons', '0', 0, 0),
(89, 22, 'Liquid Urea', 'Gallons', 'Gallons', '1', 0, 0),
(90, 22, '4-15-12', 'Ounces', 'Gallons', '0', 0, 0),
(91, 22, '3-20-15', 'Gallons', 'Gallons', '1', 0, 0),
(92, 22, 'Agrihance S', 'Quarts', 'Gallons', '0', 0, 0),
(93, 22, '0-0-25-17', 'Gallon', 'Gallon', '1', 0, 0),
(94, 22, 'Agrihance V', 'Quarts', 'Gallons', '0', 0, 0),
(95, 22, 'Agrihance R', 'Quarts', 'Gallons', '0', 0, 0),
(96, 22, 'Manure', 'Applications', 'Applications', '1', 0, 0),
(97, 22, 'Enhance', 'Gallons', 'Gallons', '1', 1, 0),
(98, 22, 'Liberate', 'Quarts', 'Gallons', '0', 0, 0),
(99, 22, 'Crop Carb', 'Quarts', 'Gallons', '0', 0, 0),
(100, 22, 'Manganeese', 'Quarts', 'Gallons', '0', 0, 0),
(101, 22, 'Micro 500', 'Quarts', 'Gallons', '0', 0, 0),
(102, 22, 'Wheat Foliar', 'Gallons', 'Gallons', '1', 1, 0),
(103, 22, 'Versa Max Corn', 'Ounces', 'Gallons', '0', 0, 0),
(104, 22, 'Versa Max Soy', 'Quarts', 'Gallon', '0', 0, 0),
(105, 22, 'Nutri Pellets', 'Tons', 'Tons', '1', 0, 0),
(106, 22, 'N-Response', 'Gallons', 'Gallons', '1', 1, 0),
(107, 22, 'Humitill', 'Quarts', 'Gallons', '0', 0, 0),
(108, 22, 'Pro Germ', 'Gallons', 'Gallons', '1', 0, 0),
(109, 22, 'High NRG N', 'Gallons', 'Gallons', '1', 0, 0),
(110, 22, 'Access', 'Gallons', 'Gallons', '1', 0, 0),
(111, 22, 'Corn Popup', 'Gallons', 'Gallons', '1', 1, 0),
(112, 22, 'Thy-Sol', 'Galllons', 'Gallons', '1', 0, 0),
(113, 22, 'Microhance', 'Quarts', 'Gallons', '0', 1, 0),
(114, 22, 'Sulfer Plus', 'Quarts', 'Gallons', '0', 1, 0),
(115, 22, 'Montys Foliar', 'Gallons', 'Gallons', '1', 1, 0),
(116, 22, 'Corn Sidedress', 'Gallons', 'Gallons', '1', 1, 0),
(117, 22, 'Fert1', '', '', '0', 1, 1);

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

INSERT INTO `fields` (`ID`, `UserID`, `FieldName`, `Acres`, `FSA_Farm`, `FSA_Tract`, `FSA_Field`, `FSA_Area`, `InsuranceID`, `County`, `Township`, `FarmRange`, `Section`, `Legal`, `Watershed`, `Restriction`, `Slope`, `TRating`, `Location`, `PID`, `TicketTrackID`, `AutoSteerHeading`, `IsActive`, `farmID`, `FarmName`) VALUES
(1, 22, '', 0, '1', '1', '', 'asdf', 'asdf', 'asdf', 'asdf', 'asdf', '1', '0', '0', '1', 1, '1', '0', 0, 0, 0, 1, NULL, 'Farm 1'),
(2, 22, '', 0, '', '', '', '', '', '', '', '', '', '', '', '', 0, '', '', 0, 0, 0, 1, NULL, 'Farm 1'),
(3, 22, '', 50, '', '', '', '0', '', '', '', '', '', '', '', '', 0, '', '', 0, 0, 0, 1, NULL, 'Test Farm'),
(4, 22, 'Ben\'s Field', 75, '', '', '', '0', '', '', '', '', '', '', '', '', 0, '', '', 0, 0, 0, 1, NULL, 'Ben\'s Farm'),
(5, 22, '', 50, '', '', '', '0', '', '', '', '', '', '', '', '', 0, '', '', 0, 0, 0, 1, NULL, 'Farm 1');

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
(1, 22, 1, 'Brendan', 40, 1),
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
(104, NULL, 'Bryan', '14361 Scott Rd. Bryan OH 43506', '', '', 2, 1, '', 22),
(105, NULL, 'Brendan Degryse', '14361 Scott Rd. Bryan OH 43506', 'Bryan', 'OH', 43506, 1, '5672396350', NULL),
(158, NULL, 'Gary', '', '', '', 0, 1, '', 22),
(159, NULL, 'Ben', '', '', '', 0, 1, '', 22);

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
(1175, 22, 'Wheat', 'Wheat', 1, 'Pounds', 'poundsl', 1, 1),
(1176, 22, 'Corn', 'corn', 80000, 'Seeds', 'bags', 1, 1),
(1177, 22, 'Soybeans', 'beans', 140000, 'SEEDS', 'Bags', 1, 1),
(1178, 22, 'Rye', 'Rye', 1, 'Units', 'Units', 1, 0),
(1179, 22, 'Corn', '33H29(HXXRR2)', 80000, 'Seeds', 'Bags', 1, 0),
(1180, 22, 'Corn', '31G70(HXXRR2', 80000, 'Seeds', 'Bags', 1, 0),
(1181, 22, 'Corn', '8T215', 80000, 'Seeds', 'Bags', 1, 0),
(1182, 22, 'Corn', '76485 vt3', 80000, 'Seeds', 'Bags', 1, 0),
(1183, 22, 'Corn', '2545', 80000, 'Seeds', 'Bags', 1, 0),
(1184, 22, 'Corn', '2640', 80000, 'Seeds', 'Bags', 1, 0),
(1185, 22, 'Corn', '2552', 80000, 'Seeds', 'Bags', 1, 0),
(1186, 22, 'Corn', '2600', 80000, 'Seeds', 'Bags', 1, 0),
(1187, 22, 'Corn', '2605', 80000, 'Seeds', 'Bags', 1, 0),
(1188, 22, 'Corn', '2625', 80000, 'Seeds', 'Bags', 1, 0),
(1189, 22, 'Corn', '2627', 80000, 'Seeds', 'Bags', 1, 0),
(1190, 22, 'Corn', '2727', 80000, 'Seeds', 'Bags', 1, 0),
(1191, 22, 'TILLAGE ROOTMAX', ' RYE', 1, 'Seeds', 'Bags', 1, 0),
(1192, 22, 'CC Blend', 'blend', 1, 'Seeds', 'Bags', 1, 0),
(1193, 22, 'Corn', 'corn', 80000, 'Seeds', 'Bags', 1, 1),
(1194, 22, 'Peak blend', 'corn', 1, 'Seeds', 'Bags', 1, 1),
(1195, 22, 'Soybeans', 'LG 3031', 2500, '', '', 1, 0),
(1196, 22, 'Soybeans', 'LG 3500', 2500, '', '', 1, 0),
(1197, 22, 'Soybeans', 'LG2985', 2500, '', '', 1, 0),
(1198, 22, 'Soybeans', 'LG 2777', 2500, '', '', 1, 0),
(1199, 22, 'Soybeans', 'replant beans', 140000, '', '', 1, 1),
(1200, 22, 'Soybeans', 'LG2731', 1, '', '', 1, 0),
(1201, 22, 'Soybeans', 'MW GR3190', 1, '', '', 1, 0),
(1202, 22, 'Soybeans', 'LG3445', 1, '', '', 1, 0),
(1203, 22, 'Soybeans Double crop', 'DOUBLE CROP BEANS', 140000, '', 'Ba', 1, 1);

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
(22, 'brendeg39@gmail.com', 'Brendan Degryse', '5672396350', '$2y$10$zK2/7Yv0jGgh6pizpusms.dzBwrHjHsto.gU4sJ8Ys.j9MtlfENHu', 'active', '2020-06-17');

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
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `appferttable`
--
ALTER TABLE `appferttable`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `appgeninfo`
--
ALTER TABLE `appgeninfo`
  MODIFY `GenAppID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `appmiscentry`
--
ALTER TABLE `appmiscentry`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `appseedtable`
--
ALTER TABLE `appseedtable`
  MODIFY `SeedAppID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `chemicals`
--
ALTER TABLE `chemicals`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1032;

--
-- AUTO_INCREMENT for table `chemicalyears`
--
ALTER TABLE `chemicalyears`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7809;

--
-- AUTO_INCREMENT for table `crop`
--
ALTER TABLE `crop`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT for table `farms`
--
ALTER TABLE `farms`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `fertilizers`
--
ALTER TABLE `fertilizers`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=118;

--
-- AUTO_INCREMENT for table `fertilizeryears`
--
ALTER TABLE `fertilizeryears`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

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
  MODIFY `OperatorID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=160;

--
-- AUTO_INCREMENT for table `seeds`
--
ALTER TABLE `seeds`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1204;

--
-- AUTO_INCREMENT for table `seedsyears`
--
ALTER TABLE `seedsyears`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4887;

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
