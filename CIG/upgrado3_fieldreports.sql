-- phpMyAdmin SQL Dump
-- version 4.9.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 13, 2020 at 08:05 AM
-- Server version: 5.7.23-23
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `upgrado3_fieldreports`
--

-- --------------------------------------------------------

--
-- Table structure for table `covercrop`
--

CREATE TABLE `covercrop` (
  `ID` int(11) NOT NULL,
  `FieldID` int(11) NOT NULL,
  `UserID` int(11) NOT NULL,
  `CoverCrop` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `DateSeeded` date DEFAULT NULL,
  `How` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Ncredits` int(11) DEFAULT NULL,
  `HowKilled` int(11) DEFAULT NULL,
  `DateKilled` date DEFAULT NULL,
  `Notes` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `covercrop`
--

INSERT INTO `covercrop` (`ID`, `FieldID`, `UserID`, `CoverCrop`, `DateSeeded`, `How`, `Ncredits`, `HowKilled`, `DateKilled`, `Notes`) VALUES
(1, 27, 5, 'kjg', '2020-06-16', NULL, 456, 0, '2020-06-23', '45645645464565464564564566'),
(2, 27, 5, 'Alfalfa', '0000-00-00', '', 0, NULL, '0000-00-00', '');

-- --------------------------------------------------------

--
-- Table structure for table `fertilizerapps`
--

CREATE TABLE `fertilizerapps` (
  `ID` int(11) NOT NULL,
  `FieldID` int(11) NOT NULL,
  `VariableRate` int(11) DEFAULT NULL,
  `FallN` int(11) DEFAULT NULL,
  `FallOther` varchar(255) DEFAULT NULL,
  `FallLbs` int(11) DEFAULT NULL,
  `FallInc` int(11) DEFAULT NULL,
  `PreN` int(11) DEFAULT NULL,
  `PreOther` varchar(255) DEFAULT NULL,
  `PreLbs` int(11) DEFAULT NULL,
  `PreInc` int(11) DEFAULT NULL,
  `PreEmergeN` int(11) DEFAULT NULL,
  `PreEmergeOther` varchar(255) DEFAULT NULL,
  `PreEmergeLbs` int(11) DEFAULT NULL,
  `PreEmergeInc` int(11) DEFAULT NULL,
  `StarterNPK` text,
  `StarterRate` varchar(255) DEFAULT NULL,
  `SidedressN` int(11) DEFAULT NULL,
  `SidedressInc` int(11) DEFAULT NULL,
  `SidedressNFarmer` int(11) DEFAULT NULL,
  `SidedressNFarmerInc` int(11) DEFAULT NULL,
  `SidedressN75` int(11) DEFAULT NULL,
  `SidedressN75Inc` int(11) DEFAULT NULL,
  `StabilizerUsed` int(11) DEFAULT NULL,
  `StabilizerProduct` varchar(255) DEFAULT NULL,
  `LbsNfromUAN` int(11) DEFAULT NULL,
  `Notes` varchar(255) NOT NULL,
  `UserID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `fertilizerapps`
--

INSERT INTO `fertilizerapps` (`ID`, `FieldID`, `VariableRate`, `FallN`, `FallOther`, `FallLbs`, `FallInc`, `PreN`, `PreOther`, `PreLbs`, `PreInc`, `PreEmergeN`, `PreEmergeOther`, `PreEmergeLbs`, `PreEmergeInc`, `StarterNPK`, `StarterRate`, `SidedressN`, `SidedressInc`, `SidedressNFarmer`, `SidedressNFarmerInc`, `SidedressN75`, `SidedressN75Inc`, `StabilizerUsed`, `StabilizerProduct`, `LbsNfromUAN`, `Notes`, `UserID`) VALUES
(9, 27, 0, 987, '871', 0, NULL, 0, '', 0, NULL, 0, '', 0, NULL, '', NULL, 0, NULL, 0, NULL, 0, NULL, NULL, '', 0, '', 2),
(10, 29, 0, 1000, '871', 0, 0, 0, '', 0, 0, 0, '', 0, 0, '', NULL, 0, NULL, 0, 0, 0, 0, 0, '', 0, '', 2),
(11, 29, 10, 7856, '456456', 0, 0, 0, '', 0, 0, 0, '', 0, 0, '', NULL, 0, 0, 0, 0, 0, 0, 0, '', 0, ' && $key != 23', 5),
(12, 29, 0, 45645, '456456', 0, 0, 0, '', 0, 0, 0, '', 0, 0, '', NULL, 0, 0, 0, 0, 0, 0, 0, '', 0, '', 5),
(13, 30, 0, 1, '1', 0, 0, 0, '', 0, 0, 0, '', 0, 0, '', NULL, 0, 0, 0, 0, 0, 0, 0, '', 0, 'Notes', 5),
(14, 27, 1, 4654, '', 0, 10, 0, '', 0, 10, 0, '', 0, 10, '', NULL, 0, NULL, 0, 10, 0, 10, 10, '', 0, '', 5),
(16, 26, 0, 3, '', 0, 10, 0, '', 0, 10, 0, '', 0, 10, '', NULL, 0, 10, 0, 10, 0, 10, 10, '', 0, '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `field`
--

CREATE TABLE `field` (
  `ID` int(11) NOT NULL,
  `GrowerID` int(11) NOT NULL,
  `FieldName` varchar(255) DEFAULT NULL,
  `ProjectFieldName` varchar(255) DEFAULT NULL,
  `ProductName` varchar(255) DEFAULT NULL,
  `Acres` int(11) DEFAULT NULL,
  `County` varchar(255) DEFAULT NULL,
  `Township` varchar(255) DEFAULT NULL,
  `Section` varchar(255) DEFAULT NULL,
  `Quarter` int(11) DEFAULT NULL,
  `Tillage` int(11) DEFAULT NULL,
  `Plantingdate` date DEFAULT NULL,
  `LastYearCrop` varchar(255) DEFAULT NULL,
  `YearsCorn` int(11) DEFAULT NULL,
  `Irrigated` tinyint(1) DEFAULT NULL,
  `Rotational` int(11) DEFAULT NULL,
  `CropYear` year(4) DEFAULT NULL,
  `CoverCrop` varchar(255) DEFAULT NULL,
  `DateSeeded` date DEFAULT NULL,
  `How` varchar(255) DEFAULT NULL,
  `Ncredits` int(11) DEFAULT NULL,
  `HowKilled` int(11) DEFAULT NULL,
  `DateKilled` date DEFAULT NULL,
  `UserID` int(11) DEFAULT NULL,
  `Last5` int(11) DEFAULT NULL,
  `8of10` tinyint(4) DEFAULT NULL,
  `Notes` varchar(255) DEFAULT NULL,
  `Token` varchar(255) DEFAULT NULL,
  `Style` varchar(255) DEFAULT NULL,
  `Longitude` float DEFAULT NULL,
  `Latitude` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `field`
--

INSERT INTO `field` (`ID`, `GrowerID`, `FieldName`, `ProjectFieldName`, `ProductName`, `Acres`, `County`, `Township`, `Section`, `Quarter`, `Tillage`, `Plantingdate`, `LastYearCrop`, `YearsCorn`, `Irrigated`, `Rotational`, `CropYear`, `CoverCrop`, `DateSeeded`, `How`, `Ncredits`, `HowKilled`, `DateKilled`, `UserID`, `Last5`, `8of10`, `Notes`, `Token`, `Style`, `Longitude`, `Latitude`) VALUES
(1, 73, '', 'CIG2020_01AB001', '', 0, '', '', '', 10, 10, '0000-00-00', '', 0, 0, 0, 0000, '', '0000-00-00', '', 0, 10, '0000-00-00', 13, 13, 10, '0', 'pk.eyJ1IjoiYnJlbmRlZyIsImEiOiJja2IwdGI5eTEwY3oyMnRuMTMzem5uajF2In0.WQWXTAtpxaFNz1HuIUkkqA', 'mapbox://styles/brendeg/ckb0tmstw130b1iqgs90l0q66', -89.686, 37.05),
(2, 75, '', 'CIG2020_01AB002', '', 0, '', '', '', 10, 10, '0000-00-00', '', 0, 0, 0, 0000, '', '0000-00-00', '', 0, 10, '0000-00-00', 13, 0, 0, '', NULL, NULL, NULL, NULL),
(3, 76, '', 'CIG2020_02BCS001', '', 0, '', '', '', 10, 10, '0000-00-00', '', 0, 0, 0, 0000, '', '0000-00-00', '', 0, 10, '0000-00-00', 9, 0, 0, '', NULL, NULL, NULL, NULL),
(4, 76, '', 'CIG2020_02BCS002', '', 0, '', '', '', 10, 10, '0000-00-00', '', 0, 0, 0, 0000, '', '0000-00-00', '', 0, 10, '0000-00-00', 9, 0, 0, '', NULL, NULL, NULL, NULL),
(5, 76, '', 'CIG2020_02BCS003', '', 0, '', '', '', 10, 10, '0000-00-00', '', 0, 0, 0, 0000, '', '0000-00-00', '', 0, 10, '0000-00-00', 9, 0, 0, '', NULL, NULL, NULL, NULL),
(6, 76, '', 'CIG2020_02BCS004', '', 0, '', '', '', 10, 10, '0000-00-00', '', 0, 0, 0, 0000, '', '0000-00-00', '', 0, 10, '0000-00-00', 9, 0, 0, '', NULL, NULL, NULL, NULL),
(7, 76, '', 'CIG2020_02BCS005', '', 0, '', '', '', 10, 10, '0000-00-00', '', 0, 0, 0, 0000, '', '0000-00-00', '', 0, 10, '0000-00-00', 9, 0, 0, '', NULL, NULL, NULL, NULL),
(8, 77, '', 'CIG2020_03BD001', '', 0, '', '', '', 10, 10, '0000-00-00', '', 0, 0, 0, 0000, '', '0000-00-00', '', 0, 10, '0000-00-00', 19, 0, 0, '', NULL, NULL, NULL, NULL),
(9, 78, '', 'CIG2020_03BD002', '', 0, '', '', '', 10, 10, '0000-00-00', '', 0, 0, 0, 0000, '', '0000-00-00', '', 0, 10, '0000-00-00', 19, 0, 0, '', NULL, NULL, NULL, NULL),
(10, 79, '', 'CIG2020_03BD003', '', 0, '', '', '', 10, 10, '0000-00-00', '', 0, 0, 0, 0000, '', '0000-00-00', '', 0, 10, '0000-00-00', 19, 0, 0, '', NULL, NULL, NULL, NULL),
(11, 80, '', 'CIG2020_04CB001', '', 0, '', '', '', 10, 10, '0000-00-00', '', 0, 0, 0, 0000, '', '0000-00-00', '', 0, 10, '0000-00-00', 6, 0, 0, '', NULL, NULL, NULL, NULL),
(12, 81, '', 'CIG2020_04CB002', '', 0, '', '', '', 10, 10, '0000-00-00', '', 0, 0, 0, 0000, '', '0000-00-00', '', 0, 10, '0000-00-00', 6, 0, 0, '', NULL, NULL, NULL, NULL),
(13, 82, '', 'CIG2020_04CB003', '', 0, '', '', '', 10, 10, '0000-00-00', '', 0, 0, 0, 0000, '', '0000-00-00', '', 0, 10, '0000-00-00', 6, 0, 0, '', NULL, NULL, NULL, NULL),
(14, 83, '', 'CIG2020_05CA001', '', 0, '', '', '', 10, 10, '0000-00-00', '', 0, 0, 0, 0000, '', '0000-00-00', '', 0, 10, '0000-00-00', 26, 0, 0, '', NULL, NULL, NULL, NULL),
(15, 84, '', 'CIG2020_06EM001', '', 0, '', '', '', 10, 10, '0000-00-00', '', 0, 0, 0, 0000, '', '0000-00-00', '', 0, 10, '0000-00-00', 14, 0, 0, '', NULL, NULL, NULL, NULL),
(16, 84, '', 'CIG2020_06EM002', '', 0, '', '', '', 10, 10, '0000-00-00', '', 0, 0, 0, 0000, '', '0000-00-00', '', 0, 10, '0000-00-00', 14, 0, 0, '', NULL, NULL, NULL, NULL),
(17, 85, '', 'CIG2020_08GK001', '', 0, '', '', '', 10, 10, '0000-00-00', '', 0, 0, 0, 0000, '', '0000-00-00', '', 0, 10, '0000-00-00', 16, 0, 0, '', NULL, NULL, NULL, NULL),
(18, 86, '', 'CIG2020_08GK002', '', 0, '', '', '', 10, 10, '0000-00-00', '', 0, 0, 0, 0000, '', '0000-00-00', '', 0, 10, '0000-00-00', 16, 0, 0, '', NULL, NULL, NULL, NULL),
(19, 87, '', 'CIG2020_08GK003', '', 0, '', '', '', 10, 10, '0000-00-00', '', 0, 0, 0, 0000, '', '0000-00-00', '', 0, 10, '0000-00-00', 16, 0, 0, '', NULL, NULL, NULL, NULL),
(20, 88, '', 'CIG2020_08GK004', '', 0, '', '', '', 10, 10, '0000-00-00', '', 0, 0, 0, 0000, '', '0000-00-00', '', 0, 10, '0000-00-00', 16, 0, 0, '', NULL, NULL, NULL, NULL),
(21, 89, '', 'CIG2020_08GK005', '', 0, '', '', '', 10, 10, '0000-00-00', '', 0, 0, 0, 0000, '', '0000-00-00', '', 0, 10, '0000-00-00', 16, 0, 0, '', NULL, NULL, NULL, NULL),
(22, 70, '', 'CIG2020_09GE001', '', 0, '', '', '', 10, 10, '0000-00-00', '', 0, 0, 0, 0000, '', '0000-00-00', '', 0, 10, '0000-00-00', 23, 0, 0, '', NULL, NULL, NULL, NULL),
(23, 70, 'Clark North', 'CIG2020_10GR001', '', 0, '', '', '', 10, 10, '0000-00-00', '', 0, 0, 0, 0000, '', '0000-00-00', '', 0, 10, '0000-00-00', 11, 0, 0, '', NULL, NULL, NULL, NULL),
(24, 90, '', 'CIG2020_10GR002', '', 0, '', '', '', 10, 10, '0000-00-00', '', 0, 0, 0, 0000, '', '0000-00-00', '', 0, 10, '0000-00-00', 11, 0, 0, '', NULL, NULL, NULL, NULL),
(25, 91, '', 'CIG2020_11HA001', '', 0, '', '', '', 10, 10, '0000-00-00', '', 0, 0, 0, 0000, '', '0000-00-00', '', 0, 10, '0000-00-00', 17, 0, 0, '', NULL, NULL, NULL, NULL),
(26, 68, 'Field 1', NULL, NULL, 0, '', '', '', 0, 0, '0000-00-00', '', 0, 0, 0, 0000, '', '0000-00-00', '', 0, 0, '0000-00-00', 2, 0, NULL, NULL, NULL, NULL, NULL, NULL),
(27, 67, 'Gary\'s Field', NULL, NULL, 0, '', '', '', 1, 4, '0000-00-00', '', 0, 0, 0, 0000, '', '0000-00-00', '', 0, 2, '0000-00-00', 2, 1, 1, '', NULL, NULL, NULL, NULL),
(28, 67, 'Brendan\'s Field', NULL, NULL, 0, '', '', '', NULL, NULL, '0000-00-00', '', 0, 0, 0, 0000, '', '0000-00-00', '', 0, NULL, '0000-00-00', 2, 0, NULL, NULL, NULL, NULL, NULL, NULL),
(29, 67, 'Gary\'s Field', NULL, NULL, 0, '', '', '', 0, 0, '0000-00-00', '', 0, 0, 0, 0000, '', '2020-06-17', 'SD', 0, 10, '2020-06-02', 5, 0, 0, 'Notes notes', NULL, NULL, NULL, NULL),
(30, 67, 'Brendan\'s Field', NULL, NULL, 0, '', '', '', 0, 0, '0000-00-00', '', 0, 0, 0, 0000, '', '0000-00-00', '', 0, 0, '2020-06-18', 5, 0, 0, 'Notes', NULL, NULL, NULL, NULL),
(32, 67, 'East Field', NULL, NULL, 20, 'Williams', '', '', NULL, NULL, '0000-00-00', '', 0, 0, 0, 0000, '', '0000-00-00', '', 0, NULL, '0000-00-00', 1, 0, NULL, '', NULL, NULL, NULL, NULL),
(33, 67, 'Brendan\'s Field', NULL, NULL, 0, '', '', '', NULL, NULL, '0000-00-00', '', 0, 0, 0, 0000, '', '0000-00-00', '', 0, 10, '0000-00-00', 5, 0, NULL, '', NULL, NULL, NULL, NULL),
(34, 67, 'Gary', 'CIG', 'Stabilizer', 0, '', '', '', 10, 10, '0000-00-00', '', 0, 0, 0, 2020, '', '0000-00-00', '', 0, 10, '0000-00-00', 5, 5, 10, '10', 'pk.eyJ1IjoiYnJlbmRlZyIsImEiOiJja2IwdGI5eTEwY3oyMnRuMTMzem5uajF2In0.WQWXTAtpxaFNz1HuIUkkqA', 'mapbox://styles/brendeg/ckb0tmstw130b1iqgs90l0q66', -89.686, 37.05),
(35, 67, 'Brendan\'s Field', 'CIG', 'Stabilizer', 0, '', '', '', 4, 5, '0000-00-00', '', 0, 0, 0, 0000, '', '0000-00-00', '', 0, 4, '0000-00-00', 5, 0, 3, NULL, NULL, NULL, NULL, NULL),
(36, 70, '', 'CIG2020_16JG001', '', 0, '', '', '', 10, 10, '0000-00-00', '', 0, 0, 0, 0000, '', '0000-00-00', '', 0, 10, '0000-00-00', 24, 0, 0, '', NULL, NULL, NULL, NULL),
(37, 101, '', 'CIG2020_17SS001', '', 0, '', '', '', 10, 10, '0000-00-00', '', 0, 0, 0, 0000, '', '0000-00-00', '', 0, 10, '0000-00-00', 7, 0, 0, '', NULL, NULL, NULL, NULL),
(38, 102, '', 'CIG2020_17SS002', '', 0, '', '', '', 10, 10, '0000-00-00', '', 0, 0, 0, 0000, '', '0000-00-00', '', 0, 10, '0000-00-00', 7, 0, 0, '', NULL, NULL, NULL, NULL),
(39, 103, '', 'CIG2020_17MFT001', '', 0, '', '', '', 10, 10, '0000-00-00', '', 0, 0, 0, 0000, '', '0000-00-00', '', 0, 10, '0000-00-00', 22, 0, 0, '', NULL, NULL, NULL, NULL),
(40, 104, '', 'CIG2020_17MFT002', '', 0, '', '', '', 10, 10, '0000-00-00', '', 0, 0, 0, 0000, '', '0000-00-00', '', 0, 10, '0000-00-00', 22, 0, 0, '', NULL, NULL, NULL, NULL),
(41, 105, '', 'CIG2020_19NAG001', '', 0, '', '', '', 10, 10, '0000-00-00', '', 0, 0, 0, 0000, '', '0000-00-00', '', 0, 10, '0000-00-00', 12, 0, 0, '', NULL, NULL, NULL, NULL),
(42, 106, '', 'CIG2020_19NAG002', '', 0, '', '', '', 10, 10, '0000-00-00', '', 0, 0, 0, 0000, '', '0000-00-00', '', 0, 10, '0000-00-00', 12, 0, 0, '', NULL, NULL, NULL, NULL),
(43, 107, '', 'CIG2020_19NAG003', '', 0, '', '', '', 10, 10, '0000-00-00', '', 0, 0, 0, 0000, '', '0000-00-00', '', 0, 10, '0000-00-00', 12, 0, 0, '', NULL, NULL, NULL, NULL),
(44, 108, '', 'CIG2020_19NAG004', '', 0, '', '', '', 10, 10, '0000-00-00', '', 0, 0, 0, 0000, '', '0000-00-00', '', 0, 10, '0000-00-00', 12, 0, 0, '', NULL, NULL, NULL, NULL),
(45, 109, '', 'CIG2020_19NAG005', '', 0, '', '', '', 10, 10, '0000-00-00', '', 0, 0, 0, 0000, '', '0000-00-00', '', 0, 10, '0000-00-00', 12, 0, 0, '', NULL, NULL, NULL, NULL),
(46, 110, '', 'CIG2020_20OTE001', '', 0, '', '', '', 10, 10, '0000-00-00', '', 0, 0, 0, 0000, '', '0000-00-00', '', 0, 10, '0000-00-00', 8, 0, 0, '', NULL, NULL, NULL, NULL),
(47, 111, '', 'CIG2020_21ANZ001', '', 0, '', '', '', 10, 10, '0000-00-00', '', 0, 0, 0, 0000, '', '0000-00-00', '', 0, 10, '0000-00-00', 2, 0, 0, '', NULL, NULL, NULL, NULL),
(48, 112, '', 'CIG2020_22PAS001', '', 0, '', '', '', 10, 10, '0000-00-00', '', 0, 0, 0, 0000, '', '0000-00-00', '', 0, 10, '0000-00-00', 10, 0, 0, '', NULL, NULL, NULL, NULL),
(49, 113, '', 'CIG2020_23SRE001', '', 0, '', '', '', 10, 10, '0000-00-00', '', 0, 0, 0, 0000, '', '0000-00-00', '', 0, 10, '0000-00-00', 25, 0, 0, '', NULL, NULL, NULL, NULL),
(50, 113, '', 'CIG2020_23SRE002', '', 0, '', '', '', 10, 10, '0000-00-00', '', 0, 0, 0, 0000, '', '0000-00-00', '', 0, 10, '0000-00-00', 25, 0, 0, '', NULL, NULL, NULL, NULL),
(51, 114, '', 'CIG2020_26DAL001', '', 0, '', '', '', 10, 10, '0000-00-00', '', 0, 0, 0, 0000, '', '0000-00-00', '', 0, 10, '0000-00-00', 18, 0, 0, '', NULL, NULL, NULL, NULL),
(52, 115, '', 'CIG2020_26DAL002', '', 0, '', '', '', 10, 10, '0000-00-00', '', 0, 0, 0, 0000, '', '0000-00-00', '', 0, 10, '0000-00-00', 18, 0, 0, '', NULL, NULL, NULL, NULL),
(53, 116, '', 'CIG2020_26DAL003', '', 0, '', '', '', 10, 10, '0000-00-00', '', 0, 0, 0, 0000, '', '0000-00-00', '', 0, 10, '0000-00-00', 18, 0, 0, '', NULL, NULL, NULL, NULL),
(54, 92, '', 'CIG2020_11HA002', '', 0, '', '', '', 10, 10, '0000-00-00', '', 0, 0, 0, 0000, '', '0000-00-00', '', 0, 10, '0000-00-00', 17, 0, 0, '', NULL, NULL, NULL, NULL),
(55, 93, '', 'CIG2020_11HA003', '', 0, '', '', '', 10, 10, '0000-00-00', '', 0, 0, 0, 0000, '', '0000-00-00', '', 0, 10, '0000-00-00', 17, 0, 0, '', NULL, NULL, NULL, NULL),
(56, 94, '', 'CIG2020_11HA004', '', 0, '', '', '', 10, 10, '0000-00-00', '', 0, 0, 0, 0000, '', '0000-00-00', '', 0, 10, '0000-00-00', 17, 0, 0, '', NULL, NULL, NULL, NULL),
(57, 70, '', 'CIG2020_12SLC001', '', 0, '', '', '', 10, 10, '0000-00-00', '', 0, 0, 0, 0000, '', '0000-00-00', '', 0, 10, '0000-00-00', 21, 0, 0, '', NULL, NULL, NULL, NULL),
(58, 70, '', 'CIG2020_13JL001', '', 0, '', '', '', 10, 10, '0000-00-00', '', 0, 0, 0, 0000, '', '0000-00-00', '', 0, 10, '0000-00-00', 3, 0, 0, '', NULL, NULL, NULL, NULL),
(59, 96, '', 'CIG2020_14AA001', '', 0, '', '', '', 10, 10, '0000-00-00', '', 0, 0, 0, 0000, '', '0000-00-00', '', 0, 10, '0000-00-00', 15, 0, 0, '', NULL, NULL, NULL, NULL),
(60, 97, '', 'CIG2020_14AA002', '', 0, '', '', '', 10, 10, '0000-00-00', '', 0, 0, 0, 0000, '', '0000-00-00', '', 0, 10, '0000-00-00', 15, 0, 0, '', NULL, NULL, NULL, NULL),
(61, 98, '', 'CIG2020_15MAX001', '', 0, '', '', '', 10, 10, '0000-00-00', '', 0, 0, 0, 0000, '', '0000-00-00', '', 0, 10, '0000-00-00', 20, 0, 0, '', NULL, NULL, NULL, NULL),
(62, 99, '', 'CIG2020_15MAX002', '', 0, '', '', '', 10, 10, '0000-00-00', '', 0, 0, 0, 0000, '', '0000-00-00', '', 0, 10, '0000-00-00', 20, 0, 0, '', NULL, NULL, NULL, NULL),
(63, 100, '', 'CIG2020_15MAX003', '', 0, '', '', '', 10, 10, '0000-00-00', '', 0, 0, 0, 0000, '', '0000-00-00', '', 0, 10, '0000-00-00', 20, 0, 0, '', NULL, NULL, NULL, NULL),
(64, 95, NULL, 'CIG2020_12JD001', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

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
  `Email` varchar(255) NOT NULL,
  `UserID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `grower`
--

INSERT INTO `grower` (`ID`, `FirstName`, `MI`, `LastName`, `CompanyName`, `MailingAddress`, `City`, `State`, `Zip`, `HomePhone`, `MobilePhone`, `Email`, `UserID`) VALUES
(67, 'Brendan', '', 'Degryse', 'STS', '14361 Scott Rd. Bryan OH 43506', 'Bryan', 'OH', 43506, 5672396350, 0, 'brendandegryse@yahoo.com', 5),
(68, 'John', 'D', '', '', '', '', '', 0, 0, 0, '', 1),
(70, 'Bren', '', 'Degryse', 'STS', '14361 Scott Rd. Bryan OH 43506', 'Bryan', 'OH', 43506, 5672396350, 0, 'brendandegryse@yahoo.com', 5),
(73, 'Seyer', '', '', '', '', '', '', 0, 0, 0, '', 13),
(75, 'Priggle', '', '', '', '', '', '', 0, 0, 0, '', 13),
(76, 'Davis', '', '', '', '', '', '', 0, 0, 0, '', 9),
(77, 'HFF', '', '', '', '', '', '', 0, 0, 0, '', 19),
(78, 'KFI', '', '', '', '', '', '', 0, 0, 0, '', 19),
(79, 'TK', '', '', '', '', '', '', 0, 0, 0, '', 19),
(80, 'Humpal', '', '', '', '', '', '', 0, 0, 0, '', 6),
(81, 'Feldman', '', '', '', '', '', '', 0, 0, 0, '', 6),
(82, 'Katcher', '', '', '', '', '', '', 0, 0, 0, '', 6),
(83, 'John Gingerich', '', '', '', '', '', '', 0, 0, 0, '', 26),
(84, 'Bowman', '', '', '', '', '', '', 0, 0, 0, '', 14),
(85, 'Booth', '', '', '', '', '', '', 0, 0, 0, '', 16),
(86, 'Keys', '', '', '', '', '', '', 0, 0, 0, '', 16),
(87, 'Knuebuhler', '', '', '', '', '', '', 0, 0, 0, '', 16),
(88, 'Stoy', '', '', '', '', '', '', 0, 0, 0, '', 16),
(89, 'Ternet', '', '', '', '', '', '', 0, 0, 0, '', 16),
(90, 'Marlin', '', '', '', '', '', '', 0, 0, 0, '', 11),
(91, 'Storch', '', '', '', '', '', '', 0, 0, 0, '', 17),
(92, 'Haselman', '', '', '', '', '', '', 0, 0, 0, '', 17),
(93, 'Schey', '', '', '', '', '', '', 0, 0, 0, '', 17),
(94, 'H George', '', '', '', '', '', '', 0, 0, 0, '', 17),
(95, 'Wellon', '', '', '', '', '', '', 0, 0, 0, '', 0),
(96, 'Stamp', '', '', '', '', '', '', 0, 0, 0, '', 15),
(97, 'Sunrise', '', '', '', '', '', '', 0, 0, 0, '', 15),
(98, 'Kenny Bros.', '', '', '', '', '', '', 0, 0, 0, '', 20),
(99, 'Knoerr', '', '', '', '', '', '', 0, 0, 0, '', 20),
(100, 'Liebreict', '', '', '', '', '', '', 0, 0, 0, '', 20),
(101, 'Shady Grove Farms', '', '', '', '', '', '', 0, 0, 0, '', 7),
(102, 'Joe', '', 'Barker', '', '', '', '', 0, 0, 0, '', 7),
(103, 'Byerly', '', '', '', '', '', '', 0, 0, 0, '', 22),
(104, 'Franz', '', '', '', '', '', '', 0, 0, 0, '', 22),
(105, 'Coomer', '', '', '', '', '', '', 0, 0, 0, '', 12),
(106, 'Baker', '', '', '', '', '', '', 0, 0, 0, '', 12),
(107, 'Swartz', '', '', '', '', '', '', 0, 0, 0, '', 12),
(108, 'Lakeside', '', '', '', '', '', '', 0, 0, 0, '', 12),
(109, 'Seiler', '', '', '', '', '', '', 0, 0, 0, '', 12),
(110, 'Judge Farms', '', '', '', '', '', '', 0, 0, 0, '', 8),
(111, 'Kroll', '', '', '', '', '', '', 0, 0, 0, '', 2),
(112, 'BFF', '', '', '', '', '', '', 0, 0, 0, '', 10),
(113, 'Eickholt', '', '', '', '', '', '', 0, 0, 0, '', 25),
(114, 'Miller', '', '', '', '', '', '', 0, 0, 0, '', 18),
(115, 'Sonander', '', '', '', '', '', '', 0, 0, 0, '', 18),
(116, 'Phelps', '', '', '', '', '', '', 0, 0, 0, '', 18);

-- --------------------------------------------------------

--
-- Table structure for table `inventory`
--

CREATE TABLE `inventory` (
  `ID` int(11) NOT NULL,
  `DropboxNum` int(11) DEFAULT NULL,
  `Consultant` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `State` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `FieldID` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Boundary` tinyint(1) DEFAULT NULL,
  `SpatialPlotLocation` tinyint(1) DEFAULT NULL,
  `Notes` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `inventory`
--

INSERT INTO `inventory` (`ID`, `DropboxNum`, `Consultant`, `State`, `FieldID`, `Boundary`, `SpatialPlotLocation`, `Notes`) VALUES
(1, 4, 'Cedar Basin (Gomes)', 'IA', 'CIG2020_04CB001', 1, 1, 'Humpal, Vrba West'),
(2, 4, 'Cedar Basin (Gomes)', 'IA', 'CIG2020_04CB002', 1, 1, 'Feldman, Clark Farm'),
(3, 4, 'Cedar Basin (Gomes)', 'IA', 'CIG2020_04CB003', 1, 1, 'Katcher, Tudor South'),
(4, 5, 'Continuum Ag (Hora)', 'IA', 'CIG2020_05CA001', 1, 0, 'Hora gave me what he thinks is the right boundary for the trial the farmer has not decided yet'),
(5, 9, 'Geoffrey Ecker', 'IA', 'CIG2020_09GE001', 1, 0, 'Geoffrey gave us a rough plot location not a boundary'),
(6, 2, 'BCS (Brucker)', 'IL', 'CIG2020_02BCS001', 1, 0, ''),
(7, 2, 'BCS (Brucker)', 'IL', 'CIG2020_02BCS002', 1, 0, ''),
(8, 2, 'BCS (Brucker)', 'IL', 'CIG2020_02BCS003', 1, 0, ''),
(9, 2, 'BCS (Brucker)', 'IL', 'CIG2020_02BCS004', 1, 0, ''),
(10, 2, 'BCS (Brucker)', 'IL', 'CIG2020_02BCS005', 1, 0, ''),
(11, 6, 'Elliot Moughler ', 'IN', 'CIG2020_06EM001', 1, 0, ''),
(12, 6, 'Elliot Moughler ', 'IN', 'CIG2020_06EM002', 1, 0, ''),
(13, 8, 'G&K Concepts', 'IN', 'CIG2020_08GK001', 1, 0, ''),
(14, 8, 'G&K Concepts', 'IN', 'CIG2020_08GK002', 1, 0, ''),
(15, 8, 'G&K Concepts', 'IN', 'CIG2020_08GK003', 1, 0, ''),
(16, 8, 'G&K Concepts', 'IN', 'CIG2020_08GK004', 1, 0, ''),
(17, 8, 'G&K Concepts', 'IN', 'CIG2020_08GK005', 1, 0, ''),
(18, 10, 'Abby Horlacher', 'IN', 'CIG2020_10GR001', 1, 1, ''),
(19, 10, 'Abby Horlacher', 'IN', 'CIG2020_10GR002', 1, 0, ''),
(20, 18, 'Jim Moffit', 'IN', 'CIG2020_17MFT001', 1, 1, ''),
(21, 18, 'Jim Moffit', 'IN', 'CIG2020_17MFT002', 1, 1, ''),
(22, 17, 'Site Specific (Malcolm)', 'IN', 'CIG2020_17SS001', 1, 1, ''),
(23, 17, 'Site Specific (Malcolm)', 'IN', 'CIG2020_17SS002', 0, 0, 'This might be Haakes or Joe Barker'),
(24, 19, 'Nester Ag', 'IN', 'CIG2020_19NAG001', 1, 0, 'Coomer'),
(25, 3, 'Brian Dargus', 'MI', 'CIG2020_03BD001', 1, 0, ''),
(26, 3, 'Brian Dargus', 'MI', 'CIG2020_03BD002', 1, 0, ''),
(27, 3, 'Brian Dargus', 'MI', 'CIG2020_03BD003', 1, 0, ''),
(28, 13, 'Jeff Lehnert', 'MI', 'CIG2020_13JL001', 1, 0, 'Have soil data'),
(29, 14, 'Ag Advantage (Maust)', 'MI', 'CIG2020_14AA001', 1, 0, ''),
(30, 14, 'Ag Advantage (Maust)', 'MI', 'CIG2020_14AA002', 1, 0, ''),
(31, 15, 'Max Ag (Mackson-Koenig)', 'MI', 'CIG2020_15MAX001', 1, 0, 'Kenny'),
(32, 15, 'Max Ag (Mackson-Koenig)', 'MI', 'CIG2020_15MAX002', 1, 0, 'Knoerr'),
(33, 21, 'Paul Anez', 'MN', 'CIG2020_21ANZ001', 1, 0, ''),
(34, 1, 'Aaron Boldrey', 'MO', 'CIG2020_01AB001', 1, 1, ''),
(35, 1, 'Aaron Boldrey', 'MO', 'CIG2020_01AB002', 1, 0, ''),
(36, 12, 'Jeremiah Durbin', 'NC', 'CIG2020_12SLC001', 1, 1, ''),
(37, 11, 'Haselman', 'OH', 'CIG2020_11HA001', 1, 0, ''),
(38, 11, 'Haselman', 'OH', 'CIG2020_11HA002', 1, 0, ''),
(39, 11, 'Haselman', 'OH', 'CIG2020_11HA003', 1, 1, ''),
(40, 11, 'Haselman', 'OH', 'CIG2020_11HA004', 1, 0, ''),
(41, 15, 'Max Ag (Mackson-Koenig)', 'OH', 'CIG2020_15MAX003', 1, 1, 'Liebreict - Karen mapped on 06-17-2020'),
(42, 19, 'Nester Ag', 'OH', 'CIG2020_19NAG002', 1, 0, 'Baker'),
(43, 19, 'Nester Ag', 'OH', 'CIG2020_19NAG003', 1, 0, 'Swartz'),
(44, 19, 'Nester Ag', 'OH', 'CIG2020_19NAG004', 1, 0, 'Lakeside'),
(45, 19, 'Nester Ag', 'OH', 'CIG2020_19NAG005', 1, 0, 'Seiler'),
(46, 20, 'Kevin Otte', 'OH', 'CIG2020_20OTE001', 1, 1, 'Judge Farms'),
(47, 22, 'Precision Agri Services (Vehorn)', 'OH', 'CIG2020_22PAS001', 1, 1, 'BFF - Planter Data - Need Rep as shp'),
(48, 23, 'Scott Eickholt', 'OH', 'CIG2020_23SRE001', 1, 1, ''),
(49, 23, 'Scott Eickholt', 'OH', 'CIG2020_23SRE002', 1, 1, ''),
(50, 26, 'Todd Dallas', 'OH', 'CIG2020_26DAL001', 1, 1, 'BioDyne'),
(51, 26, 'Todd Dallas', 'OH', 'CIG2020_26DAL002', 1, 1, 'Instinct'),
(52, 26, 'Todd Dallas', 'OH', 'CIG2020_26DAL003', 1, 1, 'Instinct'),
(53, 16, 'Jon Gilbert', 'SD', 'CIG2020_16JG001', 0, 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `logintime`
--

CREATE TABLE `logintime` (
  `ID` int(11) NOT NULL,
  `UserID` int(11) DEFAULT NULL,
  `Name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `logintime`
--

INSERT INTO `logintime` (`ID`, `UserID`, `Name`, `Time`) VALUES
(1, 5, 'Brendan Degryse', '2020-06-25 17:06:43'),
(2, 1, 'John McGuire', '2020-06-25 17:37:21'),
(3, 5, 'Brendan Degryse', '2020-06-25 17:46:16'),
(4, 5, 'Brendan Degryse', '2020-06-25 17:58:03'),
(5, 27, 'Rob McGuire', '2020-06-26 12:08:43'),
(6, 5, 'Brendan Degryse', '2020-06-29 15:47:37'),
(7, 5, 'Brendan Degryse', '2020-06-29 15:56:15'),
(8, 5, 'Brendan Degryse', '2020-06-29 16:07:01'),
(9, 5, 'Brendan Degryse', '2020-06-29 16:26:20'),
(10, 5, 'Brendan Degryse', '2020-06-29 16:27:05'),
(11, 5, 'Brendan Degryse', '2020-06-30 12:10:18'),
(12, 5, 'Brendan Degryse', '2020-06-30 14:59:27'),
(13, 5, 'Brendan Degryse', '2020-06-30 15:29:37'),
(14, 5, 'Brendan Degryse', '2020-06-30 17:28:38'),
(15, 5, 'Brendan Degryse', '2020-06-30 17:54:29'),
(16, 5, 'Brendan Degryse', '2020-06-30 18:04:38'),
(17, 5, 'Brendan Degryse', '2020-06-30 18:10:39'),
(18, 5, 'Brendan Degryse', '2020-06-30 19:29:04'),
(19, 5, 'Brendan Degryse', '2020-07-01 12:05:58'),
(20, 5, 'Brendan Degryse', '2020-07-01 12:14:28'),
(21, 5, 'Brendan Degryse', '2020-07-01 14:02:39'),
(22, 1, 'John McGuire', '2020-07-01 15:08:16'),
(23, 1, 'John McGuire', '2020-07-01 15:14:01'),
(24, 1, 'John McGuire', '2020-07-01 15:18:10'),
(25, 1, 'John McGuire', '2020-07-01 15:20:32'),
(26, 5, 'Brendan Degryse', '2020-07-01 15:21:30'),
(27, 5, 'Brendan Degryse', '2020-07-01 15:44:11'),
(28, 5, 'Brendan Degryse', '2020-07-01 17:23:41'),
(29, 5, 'Brendan Degryse', '2020-07-02 12:24:16'),
(30, 5, 'Brendan Degryse', '2020-07-02 14:05:06'),
(31, 5, 'Brendan Degryse', '2020-07-02 14:26:54'),
(32, 5, 'Brendan Degryse', '2020-07-02 14:43:55'),
(33, 5, 'Brendan Degryse', '2020-07-02 16:19:47'),
(34, 5, 'Brendan Degryse', '2020-07-02 18:21:40'),
(35, 5, 'Brendan Degryse', '2020-07-03 12:46:48'),
(36, 5, 'Brendan Degryse', '2020-07-03 13:31:59'),
(37, 5, 'Brendan Degryse', '2020-07-03 13:47:46'),
(38, 5, 'Brendan Degryse', '2020-07-03 13:54:19'),
(39, 5, 'Brendan Degryse', '2020-07-06 12:05:37'),
(40, 5, 'Brendan Degryse', '2020-07-06 13:48:51'),
(41, 5, 'Brendan Degryse', '2020-07-06 16:58:49'),
(42, 5, 'Brendan Degryse', '2020-07-06 17:11:58'),
(43, 5, 'Brendan Degryse', '2020-07-06 18:39:21'),
(44, 5, 'Brendan Degryse', '2020-07-07 12:18:36'),
(45, 5, 'Brendan Degryse', '2020-07-07 12:19:35'),
(46, 5, 'Brendan Degryse', '2020-07-07 13:17:15'),
(47, 5, 'Brendan Degryse', '2020-07-07 13:38:06'),
(48, 5, 'Brendan Degryse', '2020-07-07 13:38:26'),
(49, 5, 'Brendan Degryse', '2020-07-07 17:19:49'),
(50, 5, 'Brendan Degryse', '2020-07-07 18:56:23'),
(51, 5, 'Brendan Degryse', '2020-07-07 19:14:56'),
(52, 5, 'Brendan Degryse', '2020-07-08 12:11:58'),
(53, 5, 'Brendan Degryse', '2020-07-08 14:22:51'),
(54, 5, 'Brendan Degryse', '2020-07-08 14:58:25'),
(55, 5, 'Brendan Degryse', '2020-07-08 17:09:55'),
(56, 5, 'Brendan Degryse', '2020-07-08 18:25:05'),
(57, 5, 'Brendan Degryse', '2020-07-08 19:28:46'),
(58, 1, 'John McGuire', '2020-07-09 14:48:45'),
(59, 5, 'Brendan Degryse', '2020-07-09 14:53:06'),
(60, 1, 'John McGuire', '2020-07-09 14:56:40'),
(61, 5, 'Brendan Degryse', '2020-07-13 12:27:14');

-- --------------------------------------------------------

--
-- Table structure for table `manure`
--

CREATE TABLE `manure` (
  `ID` int(11) NOT NULL,
  `FieldID` int(11) NOT NULL,
  `Manure` varchar(255) DEFAULT NULL,
  `AppType` int(11) DEFAULT NULL,
  `Time` time DEFAULT NULL,
  `Availability` int(11) DEFAULT NULL,
  `AppTiming` int(11) DEFAULT NULL,
  `AmountPerAcre` int(11) DEFAULT NULL,
  `StateOfMatter` tinyint(1) DEFAULT NULL,
  `NPK` varchar(255) DEFAULT NULL,
  `Notes` varchar(255) NOT NULL,
  `UserID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `manure`
--

INSERT INTO `manure` (`ID`, `FieldID`, `Manure`, `AppType`, `Time`, `Availability`, `AppTiming`, `AmountPerAcre`, `StateOfMatter`, `NPK`, `Notes`, `UserID`) VALUES
(14, 29, 'Dairy', 10, '00:00:00', 0, 10, 0, 10, '', '', 2),
(15, 29, 'Swine', NULL, '00:00:00', 0, 10, 0, 10, '15%45%47%', 'Notes', 5),
(16, 29, 'Swine', NULL, '00:00:00', 0, 0, 0, 0, '', 'Notes', 5),
(17, 27, 'Swine', 0, '16:00:00', 456, 0, 0, 0, '', '', 5),
(18, 27, 'Layer', 1, '17:05:00', 3, 1, 1, 10, '15%45%47%', 'Notes', 5),
(20, 26, 'Beef', 10, '00:00:00', 0, 10, 0, NULL, '', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `pma__bookmark`
--

CREATE TABLE `pma__bookmark` (
  `id` int(10) UNSIGNED NOT NULL,
  `dbase` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `user` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `label` varchar(255) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `query` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Bookmarks';

-- --------------------------------------------------------

--
-- Table structure for table `pma__central_columns`
--

CREATE TABLE `pma__central_columns` (
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `col_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `col_type` varchar(64) COLLATE utf8_bin NOT NULL,
  `col_length` text COLLATE utf8_bin,
  `col_collation` varchar(64) COLLATE utf8_bin NOT NULL,
  `col_isNull` tinyint(1) NOT NULL,
  `col_extra` varchar(255) COLLATE utf8_bin DEFAULT '',
  `col_default` text COLLATE utf8_bin
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Central list of columns';

-- --------------------------------------------------------

--
-- Table structure for table `pma__column_info`
--

CREATE TABLE `pma__column_info` (
  `id` int(5) UNSIGNED NOT NULL,
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `column_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `comment` varchar(255) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `mimetype` varchar(255) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `transformation` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `transformation_options` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `input_transformation` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `input_transformation_options` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Column information for phpMyAdmin';

-- --------------------------------------------------------

--
-- Table structure for table `pma__designer_settings`
--

CREATE TABLE `pma__designer_settings` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `settings_data` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Settings related to Designer';

-- --------------------------------------------------------

--
-- Table structure for table `pma__export_templates`
--

CREATE TABLE `pma__export_templates` (
  `id` int(5) UNSIGNED NOT NULL,
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `export_type` varchar(10) COLLATE utf8_bin NOT NULL,
  `template_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `template_data` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Saved export templates';

-- --------------------------------------------------------

--
-- Table structure for table `pma__favorite`
--

CREATE TABLE `pma__favorite` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `tables` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Favorite tables';

-- --------------------------------------------------------

--
-- Table structure for table `pma__history`
--

CREATE TABLE `pma__history` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `db` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `table` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `timevalue` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `sqlquery` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='SQL history for phpMyAdmin';

-- --------------------------------------------------------

--
-- Table structure for table `pma__navigationhiding`
--

CREATE TABLE `pma__navigationhiding` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `item_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `item_type` varchar(64) COLLATE utf8_bin NOT NULL,
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Hidden items of navigation tree';

-- --------------------------------------------------------

--
-- Table structure for table `pma__pdf_pages`
--

CREATE TABLE `pma__pdf_pages` (
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `page_nr` int(10) UNSIGNED NOT NULL,
  `page_descr` varchar(50) CHARACTER SET utf8 NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='PDF relation pages for phpMyAdmin';

-- --------------------------------------------------------

--
-- Table structure for table `pma__recent`
--

CREATE TABLE `pma__recent` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `tables` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Recently accessed tables';

--
-- Dumping data for table `pma__recent`
--

INSERT INTO `pma__recent` (`username`, `tables`) VALUES
('cpses_up0mc6tvc4', '[{\"db\":\"upgrado3_fieldreports\",\"table\":\"manure\"},{\"db\":\"upgrado3_fieldreports\",\"table\":\"logintime\"},{\"db\":\"upgrado3_fieldreports\",\"table\":\"fertilizerapps\"},{\"db\":\"upgrado3_fieldreports\",\"table\":\"covercrop\"}]'),
('cpses_up0nn5fnye', '[{\"db\":\"upgrado3_fieldreports\",\"table\":\"grower\"},{\"db\":\"upgrado3_fieldreports\",\"table\":\"covercrop\"},{\"db\":\"upgrado3_fieldreports\",\"table\":\"fertilizerapps\"},{\"db\":\"upgrado3_fieldreports\",\"table\":\"field\"},{\"db\":\"upgrado3_fieldreports\",\"table\":\"manure\"},{\"db\":\"upgrado3_fieldreports\",\"table\":\"inventory\"},{\"db\":\"upgrado3_fieldreports\",\"table\":\"users\"},{\"db\":\"upgrado3_fieldreports\",\"table\":\"logintime\"}]'),
('cpses_up1j0qpeax', '[{\"db\":\"upgrado3_fieldreports\",\"table\":\"fertilizerapps\"},{\"db\":\"upgrado3_fieldreports\",\"table\":\"users\"}]'),
('cpses_up2bjoimi0', '[{\"db\":\"upgrado3_fieldreports\",\"table\":\"logintime\"},{\"db\":\"upgrado3_fieldreports\",\"table\":\"covercrop\"},{\"db\":\"upgrado3_fieldreports\",\"table\":\"users\"},{\"db\":\"upgrado3_fieldreports\",\"table\":\"manure\"},{\"db\":\"upgrado3_fieldreports\",\"table\":\"grower\"},{\"db\":\"upgrado3_fieldreports\",\"table\":\"fertilizerapps\"},{\"db\":\"upgrado3_fieldreports\",\"table\":\"field\"},{\"db\":\"upgrado3_fieldreports\",\"table\":\"inventory\"}]'),
('cpses_up2phshg6t', '[{\"db\":\"upgrado3_fieldreports\",\"table\":\"logintime\"},{\"db\":\"upgrado3_fieldreports\",\"table\":\"users\"},{\"db\":\"upgrado3_fieldreports\",\"table\":\"inventory\"},{\"db\":\"upgrado3_fieldreports\",\"table\":\"field\"},{\"db\":\"upgrado3_fieldreports\",\"table\":\"manure\"}]'),
('cpses_up4vfb57l1', '[{\"db\":\"upgrado3_fieldreports\",\"table\":\"fertilizerapps\"},{\"db\":\"upgrado3_fieldreports\",\"table\":\"field\"}]'),
('cpses_up57rln3qd', '[{\"db\":\"upgrado3_fieldreports\",\"table\":\"users\"},{\"db\":\"upgrado3_fieldreports\",\"table\":\"grower\"},{\"db\":\"upgrado3_fieldreports\",\"table\":\"field\"},{\"db\":\"upgrado3_fieldreports\",\"table\":\"manure\"},{\"db\":\"upgrado3_fieldreports\",\"table\":\"logintime\"},{\"db\":\"upgrado3_fieldreports\",\"table\":\"inventory\"},{\"db\":\"upgrado3_fieldreports\",\"table\":\"pma__tracking\"}]'),
('cpses_up7bpru8ly', '[{\"db\":\"upgrado3_fieldreports\",\"table\":\"fertilizerapps\"}]'),
('cpses_up7io6mlbm', '[{\"db\":\"upgrado3_fieldreports\",\"table\":\"manure\"},{\"db\":\"upgrado3_fieldreports\",\"table\":\"logintime\"},{\"db\":\"upgrado3_fieldreports\",\"table\":\"field\"},{\"db\":\"upgrado3_fieldreports\",\"table\":\"fertilizerapps\"},{\"db\":\"upgrado3_fieldreports\",\"table\":\"grower\"},{\"db\":\"upgrado3_fieldreports\",\"table\":\"users\"}]'),
('cpses_up8ldjxejc', '[{\"db\":\"upgrado3_fieldreports\",\"table\":\"grower\"},{\"db\":\"upgrado3_fieldreports\",\"table\":\"users\"},{\"db\":\"upgrado3_fieldreports\",\"table\":\"field\"}]'),
('cpses_up9rwntp6m', '[{\"db\":\"upgrado3_fieldreports\",\"table\":\"users\"},{\"db\":\"upgrado3_fieldreports\",\"table\":\"fertilizerapps\"},{\"db\":\"upgrado3_fieldreports\",\"table\":\"manure\"},{\"db\":\"upgrado3_fieldreports\",\"table\":\"field\"},{\"db\":\"upgrado3_fieldreports\",\"table\":\"grower\"}]'),
('cpses_upah1pmo4a', '[{\"db\":\"upgrado3_fieldreports\",\"table\":\"manure\"},{\"db\":\"upgrado3_fieldreports\",\"table\":\"field\"},{\"db\":\"upgrado3_fieldreports\",\"table\":\"users\"},{\"db\":\"upgrado3_fieldreports\",\"table\":\"grower\"}]'),
('cpses_upciusl3m7', '[{\"db\":\"upgrado3_fieldreports\",\"table\":\"users\"},{\"db\":\"upgrado3_fieldreports\",\"table\":\"grower\"}]'),
('cpses_upcsd5yy0i', '[{\"db\":\"upgrado3_fieldreports\",\"table\":\"users\"}]'),
('cpses_updbo21a1e', '[{\"db\":\"upgrado3_fieldreports\",\"table\":\"inventory\"}]'),
('cpses_updsf63btb', '[{\"db\":\"upgrado3_fieldreports\",\"table\":\"logintime\"},{\"db\":\"upgrado3_fieldreports\",\"table\":\"covercrop\"},{\"db\":\"upgrado3_fieldreports\",\"table\":\"users\"},{\"db\":\"upgrado3_fieldreports\",\"table\":\"manure\"},{\"db\":\"upgrado3_fieldreports\",\"table\":\"grower\"},{\"db\":\"upgrado3_fieldreports\",\"table\":\"fertilizerapps\"},{\"db\":\"upgrado3_fieldreports\",\"table\":\"field\"},{\"db\":\"upgrado3_fieldreports\",\"table\":\"inventory\"}]'),
('cpses_upgsw3e2yp', '[{\"db\":\"upgrado3_fieldreports\",\"table\":\"logintime\"},{\"db\":\"upgrado3_fieldreports\",\"table\":\"users\"}]'),
('cpses_uphk17nq62', '[{\"db\":\"upgrado3_fieldreports\",\"table\":\"users\"}]'),
('cpses_uphm4gvbyk', '[{\"db\":\"upgrado3_fieldreports\",\"table\":\"field\"},{\"db\":\"upgrado3_fieldreports\",\"table\":\"grower\"}]'),
('cpses_upiq45gudw', '[{\"db\":\"upgrado3_fieldreports\",\"table\":\"logintime\"},{\"db\":\"upgrado3_fieldreports\",\"table\":\"inventory\"}]'),
('cpses_upj3l4zi41', '[{\"db\":\"upgrado3_fieldreports\",\"table\":\"field\"},{\"db\":\"upgrado3_fieldreports\",\"table\":\"logintime\"},{\"db\":\"upgrado3_fieldreports\",\"table\":\"manure\"},{\"db\":\"upgrado3_fieldreports\",\"table\":\"fertilizerapps\"},{\"db\":\"upgrado3_fieldreports\",\"table\":\"grower\"},{\"db\":\"upgrado3_fieldreports\",\"table\":\"users\"}]'),
('cpses_upjeqjm5fz', '[{\"db\":\"upgrado3_fieldreports\",\"table\":\"users\"}]'),
('cpses_upk159pxrd', '[{\"db\":\"upgrado3_fieldreports\",\"table\":\"grower\"}]'),
('cpses_upk3z4s253', '[{\"db\":\"upgrado3_fieldreports\",\"table\":\"grower\"}]'),
('cpses_upoqyfdwcs', '[{\"db\":\"upgrado3_fieldreports\",\"table\":\"inventory\"},{\"db\":\"upgrado3_fieldreports\",\"table\":\"covercrop\"},{\"db\":\"upgrado3_fieldreports\",\"table\":\"users\"},{\"db\":\"upgrado3_fieldreports\",\"table\":\"grower\"},{\"db\":\"upgrado3_fieldreports\",\"table\":\"field\"},{\"db\":\"upgrado3_fieldreports\",\"table\":\"CoverCrop\"}]'),
('cpses_upplcx4gwf', '[{\"db\":\"upgrado3_fieldreports\",\"table\":\"logintime\"},{\"db\":\"upgrado3_fieldreports\",\"table\":\"manure\"},{\"db\":\"upgrado3_fieldreports\",\"table\":\"field\"},{\"db\":\"upgrado3_fieldreports\",\"table\":\"fertilizerapps\"},{\"db\":\"upgrado3_fieldreports\",\"table\":\"grower\"},{\"db\":\"upgrado3_fieldreports\",\"table\":\"users\"}]'),
('cpses_upq9l4m4ew', '[{\"db\":\"upgrado3_fieldreports\",\"table\":\"inventory\"},{\"db\":\"upgrado3_fieldreports\",\"table\":\"field\"},{\"db\":\"upgrado3_fieldreports\",\"table\":\"grower\"},{\"db\":\"upgrado3_fieldreports\",\"table\":\"users\"}]'),
('cpses_upruce4z4r', '[{\"db\":\"upgrado3_fieldreports\",\"table\":\"users\"}]'),
('cpses_uprvcmkihx', '[{\"db\":\"upgrado3_fieldreports\",\"table\":\"manure\"},{\"db\":\"upgrado3_fieldreports\",\"table\":\"fertilizerapps\"},{\"db\":\"upgrado3_fieldreports\",\"table\":\"field\"}]'),
('cpses_upt42txiyr', '[{\"db\":\"upgrado3_fieldreports\",\"table\":\"inventory\"},{\"db\":\"upgrado3_fieldreports\",\"table\":\"manure\"},{\"db\":\"upgrado3_fieldreports\",\"table\":\"logintime\"},{\"db\":\"upgrado3_fieldreports\",\"table\":\"users\"},{\"db\":\"upgrado3_fieldreports\",\"table\":\"grower\"},{\"db\":\"upgrado3_fieldreports\",\"table\":\"field\"},{\"db\":\"upgrado3_fieldreports\",\"table\":\"pma__tracking\"}]'),
('cpses_upta447snx', '[{\"db\":\"upgrado3_fieldreports\",\"table\":\"fertilizerapps\"},{\"db\":\"upgrado3_fieldreports\",\"table\":\"grower\"}]'),
('cpses_uptwppkmag', '[{\"db\":\"upgrado3_fieldreports\",\"table\":\"field\"},{\"db\":\"upgrado3_fieldreports\",\"table\":\"covercrop\"},{\"db\":\"upgrado3_fieldreports\",\"table\":\"users\"},{\"db\":\"upgrado3_fieldreports\",\"table\":\"grower\"},{\"db\":\"upgrado3_fieldreports\",\"table\":\"manure\"},{\"db\":\"upgrado3_fieldreports\",\"table\":\"pma__recent\"},{\"db\":\"upgrado3_fieldreports\",\"table\":\"pma__pdf_pages\"},{\"db\":\"upgrado3_fieldreports\",\"table\":\"pma__relation\"},{\"db\":\"upgrado3_fieldreports\",\"table\":\"pma__users\"},{\"db\":\"upgrado3_fieldreports\",\"table\":\"pma__usergroups\"}]'),
('cpses_upya6ovwi4', '[{\"db\":\"upgrado3_fieldreports\",\"table\":\"users\"}]'),
('upgrado3', '[{\"db\":\"upgrado3_fieldreports\",\"table\":\"users\"}]');

-- --------------------------------------------------------

--
-- Table structure for table `pma__relation`
--

CREATE TABLE `pma__relation` (
  `master_db` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `master_table` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `master_field` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `foreign_db` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `foreign_table` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `foreign_field` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Relation table';

-- --------------------------------------------------------

--
-- Table structure for table `pma__savedsearches`
--

CREATE TABLE `pma__savedsearches` (
  `id` int(5) UNSIGNED NOT NULL,
  `username` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `search_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `search_data` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Saved searches';

-- --------------------------------------------------------

--
-- Table structure for table `pma__table_coords`
--

CREATE TABLE `pma__table_coords` (
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `pdf_page_number` int(11) NOT NULL DEFAULT '0',
  `x` float UNSIGNED NOT NULL DEFAULT '0',
  `y` float UNSIGNED NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Table coordinates for phpMyAdmin PDF output';

-- --------------------------------------------------------

--
-- Table structure for table `pma__table_info`
--

CREATE TABLE `pma__table_info` (
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `display_field` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Table information for phpMyAdmin';

-- --------------------------------------------------------

--
-- Table structure for table `pma__table_uiprefs`
--

CREATE TABLE `pma__table_uiprefs` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `prefs` text COLLATE utf8_bin NOT NULL,
  `last_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Tables'' UI preferences';

-- --------------------------------------------------------

--
-- Table structure for table `pma__tracking`
--

CREATE TABLE `pma__tracking` (
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `version` int(10) UNSIGNED NOT NULL,
  `date_created` datetime NOT NULL,
  `date_updated` datetime NOT NULL,
  `schema_snapshot` text COLLATE utf8_bin NOT NULL,
  `schema_sql` text COLLATE utf8_bin,
  `data_sql` longtext COLLATE utf8_bin,
  `tracking` set('UPDATE','REPLACE','INSERT','DELETE','TRUNCATE','CREATE DATABASE','ALTER DATABASE','DROP DATABASE','CREATE TABLE','ALTER TABLE','RENAME TABLE','DROP TABLE','CREATE INDEX','DROP INDEX','CREATE VIEW','ALTER VIEW','DROP VIEW') COLLATE utf8_bin DEFAULT NULL,
  `tracking_active` int(1) UNSIGNED NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Database changes tracking for phpMyAdmin';

-- --------------------------------------------------------

--
-- Table structure for table `pma__userconfig`
--

CREATE TABLE `pma__userconfig` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `timevalue` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `config_data` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='User preferences storage for phpMyAdmin';

--
-- Dumping data for table `pma__userconfig`
--

INSERT INTO `pma__userconfig` (`username`, `timevalue`, `config_data`) VALUES
('cpses_up0mc6tvc4', '2020-06-30 17:43:42', '{\"Console\\/Mode\":\"collapse\"}'),
('cpses_up0nn5fnye', '2020-07-03 13:26:35', '{\"Console\\/Mode\":\"collapse\"}'),
('cpses_up1j0qpeax', '2020-06-08 17:46:40', '{\"Console\\/Mode\":\"collapse\"}'),
('cpses_up2phshg6t', '2020-06-25 17:07:26', '{\"Console\\/Mode\":\"collapse\"}'),
('cpses_up3ek4hv7a', '2020-06-01 19:25:21', '{\"Console\\/Mode\":\"collapse\"}'),
('cpses_up4vfb57l1', '2020-06-17 14:37:31', '{\"Console\\/Mode\":\"collapse\"}'),
('cpses_up57rln3qd', '2020-07-07 17:44:16', '{\"Console\\/Mode\":\"collapse\"}'),
('cpses_up5js4yog8', '2020-06-02 15:24:58', '{\"Console\\/Mode\":\"collapse\"}'),
('cpses_up7io6mlbm', '2020-07-09 14:54:26', '{\"Console\\/Mode\":\"collapse\"}'),
('cpses_up8dng43pg', '2020-06-03 15:30:47', '{\"Console\\/Mode\":\"collapse\"}'),
('cpses_up8ldjxejc', '2020-07-13 13:58:49', '{\"Console\\/Mode\":\"collapse\",\"NavigationWidth\":0}'),
('cpses_up9rwntp6m', '2020-06-04 15:46:35', '{\"Console\\/Mode\":\"collapse\"}'),
('cpses_upciusl3m7', '2020-06-11 16:07:11', '{\"Console\\/Mode\":\"collapse\"}'),
('cpses_updbo21a1e', '2020-06-23 19:24:23', '{\"Console\\/Mode\":\"collapse\"}'),
('cpses_upk3z4s253', '2020-06-19 17:29:42', '{\"Console\\/Mode\":\"collapse\"}'),
('cpses_upoqyfdwcs', '2020-06-15 19:03:40', '{\"Console\\/Mode\":\"collapse\"}'),
('cpses_upq9l4m4ew', '2020-06-22 18:47:17', '{\"Console\\/Mode\":\"collapse\"}'),
('cpses_uprvcmkihx', '2020-06-03 13:32:37', '{\"Console\\/Mode\":\"collapse\"}'),
('cpses_uptwppkmag', '2020-06-18 18:41:08', '{\"Console\\/Mode\":\"collapse\"}'),
('cpses_upya6ovwi4', '2020-06-10 12:58:39', '{\"Console\\/Mode\":\"collapse\"}');

-- --------------------------------------------------------

--
-- Table structure for table `pma__usergroups`
--

CREATE TABLE `pma__usergroups` (
  `usergroup` varchar(64) COLLATE utf8_bin NOT NULL,
  `tab` varchar(64) COLLATE utf8_bin NOT NULL,
  `allowed` enum('Y','N') COLLATE utf8_bin NOT NULL DEFAULT 'N'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='User groups with configured menu items';

-- --------------------------------------------------------

--
-- Table structure for table `pma__users`
--

CREATE TABLE `pma__users` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `usergroup` varchar(64) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Users and their assignments to user groups';

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `ID` int(11) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `AccountType` varchar(255) NOT NULL,
  `mode` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`ID`, `Name`, `Password`, `email`, `AccountType`, `mode`) VALUES
(1, 'John McGuire', '$2y$10$sAOnAAJusqjWJREjUXx2dOko8fyShJSM9qCQvuvRPpWxp8bhwwk3G', 'mcguire9@gmail.com', 'Admin', 1),
(2, 'Paul Anez', '$2y$10$G801N52ZmXar99XFe2BaSu5ULwyqPDE7eD7DF9RSKMxBD7.OSR1PG1', 'paul@anezconsulting.com', '', 0),
(3, 'Jeff Lehnert', '$2y$10$JvQE2svqeA.0zmeWXeD.hOHOxBVOfe8KBcIO3tDfssQwNNwEqG0zi1', 'jeff@livingsoilsllc.com ', '', 0),
(4, 'Shannon Gomes', '$2y$10$pTF.dBRkdn9ZOHCJzhd3feELmSEcyn2F/Fsjuk5AutJAQXRKfclZm1', 'cedarbasin@gmail.com ', '', 0),
(5, 'Brendan Degryse', '$2y$10$n5DZ8rJWKzQlNDPPbJpO2udTRhzyXkgQ1DVtWWYTFiPiXMJ01ji4m', 'brendeg39@gmail.com', 'Admin', 1),
(6, 'Shannon Gomes', '$2y$10$Xjz0vA1zSOpoAMtUsdamB.1Py1W/uNOyD5adBzM9bKIcfDuZeUzEK1', 'cedarbasin@gmail.com', '', 0),
(7, 'Jared Malcolm', '$2y$10$xUnf1EGm07cyRMwBIThriOw0ffkSdqOx08SCuih/ytN0iJ4vGh79K1', 'sitespecificag@gmail.com', '', 0),
(8, 'Kevin Otte', '$2y$10$bIhgiw8kS2Wv4qjQQCN45Olt0/KDXA953f7hcX1GCxp8CO4utRqDG1', 'kevin@otte-ag1.com', '', 0),
(9, 'Don Brucker', '$2y$10$3/nHUylagzxmJQ1hztd99Onq2o9Y8ZzcJNJaYlLDgHYik4tmqs5KW1', 'aaron.hand@soilbalance.com', '', 0),
(10, 'Matt Vehorn', '$2y$10$erhULP/R0XKi5l0tUvyvAe4Z5OBI01UEsWG8l6arTdDKY4dH4AMCS1', 'MVehorn@precisionagriservices.com', '', 0),
(11, 'Danny Greene', '$2y$10$z9LHZ7r3si7d1WYeQ2p9CuialFrvwpohqjv3K1kpExSUth3uHIPJu1', 'abby@greenecrop.com', '', 0),
(12, 'Clint Nester', '$2y$10$amuqEYF/R7OMz0S92ZpsWeDfYNVmwlSLl54vpThNR//kkyP3nWAR61', 'clintnester@nesterag.com', '', 0),
(13, 'Aaron Boldrey', '$2y$10$sW8rr0ZT8/flH/mas0aeLO5QqG4jDHd15tVtiwGbjuonttgaLRLfC1', 'crlegrand1s@gmail.com', '', 0),
(14, 'Elliot Moughler', '$2y$10$hh8n3jCMQMYWPW3Rf1llg.LGSrcESDfr2iwB/wYw/aXBwpm41lE0W1', 'emoughler@gmail.com', '', 0),
(15, 'Jason Maust', '$2y$10$dT7Qza0m8L8EdzRD5JydGukexsZvgxkHAkbtjk6og5dvSu/RSMkbu1', 'jmaust@agadvantagellc.com', '', 0),
(16, 'Greg Kneubuhler', '$2y$10$gfGuMWcYJ9OHmwUu/.Pt8ONdmX7RiMV/FjP6RibjJnUf/gih7ozX61', 'Greg@gmail.com', '', 0),
(17, 'Kyle Haselman', '$2y$10$T8K6viRgrCZpyeIfptkF7ezcmz6hfFmtdfT7HWD16ebNeH4uGCfhK1', 'haselman@gmail.com', '', 0),
(18, 'Todd Dallas', '$2y$10$hNTKRs/byUGzEFXvfA22ZeY.cXbZc7ut2azzGhSpVQ7KTFVt.bk4K1', 'dallasag@ctcn.net', '', 0),
(19, 'Brian Dargus', '$2y$10$PwqlPT/F09rW9Wx1T6LykON68l4.aORV3DjrLr65mCeaCFb0fIRkq1', 'bdargus@msn.com', '', 0),
(20, 'John Mackson', '$2y$10$Xo6Zkazpjlo4GwMRl209HOnikavqIEgcUrcARJp.ATxFvG1upIg.G1', 'jmackson@maxagronomy.com', '', 0),
(21, 'Jeremiah Durbin', '$2y$10$zA8ZjIQ777ShcNThv4JaoebT6iAXIL.Hf2zk1Ep..EdUQbq1nEZcO1', 'jeremiah.durbinslc@gmail.com', '', 0),
(22, 'Jim Moffit', '$2y$10$c4mjume8pt7ls5orsgTxsOBbAju1wBRGpCVusDY9rmUIyA/BBcKOq1', 'jpmoffitt@frontier.com', '', 0),
(23, 'Geoffrey Ecker', '$2y$10$ACuUF8TjWNEw3MZfZ3rmk.uyPrfc/TPSp8Cux9csvpExx6kRqpOYq1', 'giecker@gmail.com', '', 0),
(24, 'Jon Gilbert', '$2y$10$dmpkD3yIdponzSuTlLofz.zS62pKmc6OVn5RtGrrVWqJYjYvlguEC1', 'jongilbert24@hotmail.com', '', 0),
(25, 'Scott Eickholt', '$2y$10$mMKDEL2mX05A.9COcrUtvurCAYOEUFD5DWxAMpmJRHBunSbDHzUni1', 'srefarms@gmail.com', '', 0),
(26, 'Mitchell Hora', '$2y$10$ZKX5PMu4lheiGmRoMmYQyeScHKQoziNTe.Cp4awUpXBInMS6YPKFO', 'mitchell@continuumagllc.com', '', 0),
(27, 'Rob McGuire', '$2y$10$17qj3C8VqdlgDxoGNUDu7e31VdUr12.0fAMH2BeeVlHx/uGhsFKoa', 'mcguire2649@gmail.com', 'Admin', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `covercrop`
--
ALTER TABLE `covercrop`
  ADD PRIMARY KEY (`ID`);

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
-- Indexes for table `inventory`
--
ALTER TABLE `inventory`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `logintime`
--
ALTER TABLE `logintime`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `UserID` (`UserID`);

--
-- Indexes for table `manure`
--
ALTER TABLE `manure`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `Manure` (`FieldID`);

--
-- Indexes for table `pma__bookmark`
--
ALTER TABLE `pma__bookmark`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pma__central_columns`
--
ALTER TABLE `pma__central_columns`
  ADD PRIMARY KEY (`db_name`,`col_name`);

--
-- Indexes for table `pma__column_info`
--
ALTER TABLE `pma__column_info`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `db_name` (`db_name`,`table_name`,`column_name`);

--
-- Indexes for table `pma__designer_settings`
--
ALTER TABLE `pma__designer_settings`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `pma__export_templates`
--
ALTER TABLE `pma__export_templates`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `u_user_type_template` (`username`,`export_type`,`template_name`);

--
-- Indexes for table `pma__favorite`
--
ALTER TABLE `pma__favorite`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `pma__history`
--
ALTER TABLE `pma__history`
  ADD PRIMARY KEY (`id`),
  ADD KEY `username` (`username`,`db`,`table`,`timevalue`);

--
-- Indexes for table `pma__navigationhiding`
--
ALTER TABLE `pma__navigationhiding`
  ADD PRIMARY KEY (`username`,`item_name`,`item_type`,`db_name`,`table_name`);

--
-- Indexes for table `pma__pdf_pages`
--
ALTER TABLE `pma__pdf_pages`
  ADD PRIMARY KEY (`page_nr`),
  ADD KEY `db_name` (`db_name`);

--
-- Indexes for table `pma__recent`
--
ALTER TABLE `pma__recent`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `pma__relation`
--
ALTER TABLE `pma__relation`
  ADD PRIMARY KEY (`master_db`,`master_table`,`master_field`),
  ADD KEY `foreign_field` (`foreign_db`,`foreign_table`);

--
-- Indexes for table `pma__savedsearches`
--
ALTER TABLE `pma__savedsearches`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `u_savedsearches_username_dbname` (`username`,`db_name`,`search_name`);

--
-- Indexes for table `pma__table_coords`
--
ALTER TABLE `pma__table_coords`
  ADD PRIMARY KEY (`db_name`,`table_name`,`pdf_page_number`);

--
-- Indexes for table `pma__table_info`
--
ALTER TABLE `pma__table_info`
  ADD PRIMARY KEY (`db_name`,`table_name`);

--
-- Indexes for table `pma__table_uiprefs`
--
ALTER TABLE `pma__table_uiprefs`
  ADD PRIMARY KEY (`username`,`db_name`,`table_name`);

--
-- Indexes for table `pma__tracking`
--
ALTER TABLE `pma__tracking`
  ADD PRIMARY KEY (`db_name`,`table_name`,`version`);

--
-- Indexes for table `pma__userconfig`
--
ALTER TABLE `pma__userconfig`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `pma__usergroups`
--
ALTER TABLE `pma__usergroups`
  ADD PRIMARY KEY (`usergroup`,`tab`,`allowed`);

--
-- Indexes for table `pma__users`
--
ALTER TABLE `pma__users`
  ADD PRIMARY KEY (`username`,`usergroup`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `covercrop`
--
ALTER TABLE `covercrop`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `fertilizerapps`
--
ALTER TABLE `fertilizerapps`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `field`
--
ALTER TABLE `field`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT for table `grower`
--
ALTER TABLE `grower`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=117;

--
-- AUTO_INCREMENT for table `inventory`
--
ALTER TABLE `inventory`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2106113;

--
-- AUTO_INCREMENT for table `logintime`
--
ALTER TABLE `logintime`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT for table `manure`
--
ALTER TABLE `manure`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `pma__bookmark`
--
ALTER TABLE `pma__bookmark`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pma__column_info`
--
ALTER TABLE `pma__column_info`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pma__export_templates`
--
ALTER TABLE `pma__export_templates`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pma__history`
--
ALTER TABLE `pma__history`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pma__pdf_pages`
--
ALTER TABLE `pma__pdf_pages`
  MODIFY `page_nr` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pma__savedsearches`
--
ALTER TABLE `pma__savedsearches`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

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
