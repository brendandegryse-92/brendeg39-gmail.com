-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 15, 2020 at 05:56 AM
-- Server version: 5.7.23-23
-- PHP Version: 7.2.7

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
  `StarterNPK` text,
  `StarterRate` varchar(255) DEFAULT NULL,
  `SidedressN` int(11) DEFAULT NULL,
  `SidedressInc` tinyint(4) DEFAULT NULL,
  `SidedressNFarmer` int(11) DEFAULT NULL,
  `SidedressNFarmerInc` int(11) DEFAULT NULL,
  `SidedressN75` int(11) DEFAULT NULL,
  `SidedressN75Inc` int(11) DEFAULT NULL,
  `StabilizerUsed` tinyint(1) DEFAULT NULL,
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
(10, 29, 0, 987, '871', 0, NULL, 0, '', 0, NULL, 0, '', 0, NULL, '', NULL, 0, NULL, 0, NULL, 0, NULL, NULL, '', 0, '', 2),
(11, 29, 0, 7856, '456456', 0, 0, 0, '', 0, 0, 0, '', 0, 0, '', NULL, 0, 0, 0, 0, 0, 0, 0, '', 0, ' && $key != 23', 5),
(12, 29, 0, 45645, '456456', 0, 0, 0, '', 0, 0, 0, '', 0, 0, '', NULL, 0, 0, 0, 0, 0, 0, 0, '', 0, '', 5),
(13, 30, 0, 1, '1', 0, 0, 0, '', 0, 0, 0, '', 0, 0, '', NULL, 0, 0, 0, 0, 0, 0, 0, '', 0, 'Notes', 5);

-- --------------------------------------------------------

--
-- Table structure for table `field`
--

CREATE TABLE `field` (
  `ID` int(11) NOT NULL,
  `GrowerID` int(11) NOT NULL,
  `FieldName` varchar(255) DEFAULT NULL,
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
  `Notes` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `field`
--

INSERT INTO `field` (`ID`, `GrowerID`, `FieldName`, `Acres`, `County`, `Township`, `Section`, `Quarter`, `Tillage`, `Plantingdate`, `LastYearCrop`, `YearsCorn`, `Irrigated`, `Rotational`, `CropYear`, `CoverCrop`, `DateSeeded`, `How`, `Ncredits`, `HowKilled`, `DateKilled`, `UserID`, `Last5`, `8of10`, `Notes`) VALUES
(26, 68, 'Field 1', 0, '', '', '', 0, 0, '0000-00-00', '', 0, 0, 0, 0000, '', '0000-00-00', '', 0, 0, '0000-00-00', 2, 0, NULL, NULL),
(27, 67, 'Gary\'s Field', 0, '', '', '', 0, 0, '0000-00-00', '', 0, 0, 0, 0000, '', '0000-00-00', '', 0, 0, '0000-00-00', 2, 0, NULL, ''),
(28, 67, 'Brendan\'s Field', 0, '', '', '', NULL, NULL, '0000-00-00', '', 0, 0, 0, 0000, '', '0000-00-00', '', 0, NULL, '0000-00-00', 2, 0, NULL, NULL),
(29, 67, 'Gary\'s Field', 0, '', '', '', 0, 0, '0000-00-00', '', 0, 0, 0, 0000, '', '0000-00-00', '', 0, 0, '0000-00-00', 5, 0, 2, 'Notes notes'),
(30, 67, 'Brendan\'s Field', 0, '', '', '', 0, 0, '0000-00-00', '', 0, 0, 0, 0000, '', '0000-00-00', '', 0, 0, '0000-00-00', 5, 0, NULL, 'Notes');

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
(68, 'John', '', '', '', '', '', '', 0, 0, 0, '', 5),
(69, 'Brendan', '', 'Degryse', 'STS', '14361 Scott Rd. Bryan OH 43506', 'Bryan', 'OH', 43506, 5672396350, 0, 'brendandegryse@yahoo.com', 5),
(70, 'Bren', '', 'Degryse', 'STS', '14361 Scott Rd. Bryan OH 43506', 'Bryan', 'OH', 43506, 5672396350, 0, 'brendandegryse@yahoo.com', 5);

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
(14, 29, 'Dairy', NULL, '00:00:00', 0, 0, 0, 0, '', '', 2),
(15, 29, 'Swine', NULL, '00:00:00', 0, 0, 0, 0, '15%45%47%', 'Notes', 5),
(16, 29, 'Swine', NULL, '00:00:00', 0, 0, 0, 0, '', 'Notes', 5);

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
('cpses_up1j0qpeax', '[{\"db\":\"upgrado3_fieldreports\",\"table\":\"fertilizerapps\"},{\"db\":\"upgrado3_fieldreports\",\"table\":\"users\"}]'),
('cpses_up7bpru8ly', '[{\"db\":\"upgrado3_fieldreports\",\"table\":\"fertilizerapps\"}]'),
('cpses_up9rwntp6m', '[{\"db\":\"upgrado3_fieldreports\",\"table\":\"users\"},{\"db\":\"upgrado3_fieldreports\",\"table\":\"fertilizerapps\"},{\"db\":\"upgrado3_fieldreports\",\"table\":\"manure\"},{\"db\":\"upgrado3_fieldreports\",\"table\":\"field\"},{\"db\":\"upgrado3_fieldreports\",\"table\":\"grower\"}]'),
('cpses_upah1pmo4a', '[{\"db\":\"upgrado3_fieldreports\",\"table\":\"manure\"},{\"db\":\"upgrado3_fieldreports\",\"table\":\"field\"},{\"db\":\"upgrado3_fieldreports\",\"table\":\"users\"},{\"db\":\"upgrado3_fieldreports\",\"table\":\"grower\"}]'),
('cpses_upciusl3m7', '[{\"db\":\"upgrado3_fieldreports\",\"table\":\"users\"},{\"db\":\"upgrado3_fieldreports\",\"table\":\"grower\"}]'),
('cpses_upcsd5yy0i', '[{\"db\":\"upgrado3_fieldreports\",\"table\":\"users\"}]'),
('cpses_uphk17nq62', '[{\"db\":\"upgrado3_fieldreports\",\"table\":\"users\"}]'),
('cpses_upjeqjm5fz', '[{\"db\":\"upgrado3_fieldreports\",\"table\":\"users\"}]'),
('cpses_upruce4z4r', '[{\"db\":\"upgrado3_fieldreports\",\"table\":\"users\"}]'),
('cpses_uprvcmkihx', '[{\"db\":\"upgrado3_fieldreports\",\"table\":\"manure\"},{\"db\":\"upgrado3_fieldreports\",\"table\":\"fertilizerapps\"},{\"db\":\"upgrado3_fieldreports\",\"table\":\"field\"}]'),
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
('cpses_up1j0qpeax', '2020-06-08 17:46:40', '{\"Console\\/Mode\":\"collapse\"}'),
('cpses_up3ek4hv7a', '2020-06-01 19:25:21', '{\"Console\\/Mode\":\"collapse\"}'),
('cpses_up5js4yog8', '2020-06-02 15:24:58', '{\"Console\\/Mode\":\"collapse\"}'),
('cpses_up8dng43pg', '2020-06-03 15:30:47', '{\"Console\\/Mode\":\"collapse\"}'),
('cpses_up9rwntp6m', '2020-06-04 15:46:35', '{\"Console\\/Mode\":\"collapse\"}'),
('cpses_upciusl3m7', '2020-06-11 16:07:11', '{\"Console\\/Mode\":\"collapse\"}'),
('cpses_uprvcmkihx', '2020-06-03 13:32:37', '{\"Console\\/Mode\":\"collapse\"}'),
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
(1, 'John McGuire', '$2y$10$sAOnAAJusqjWJREjUXx2dOko8fyShJSM9qCQvuvRPpWxp8bhwwk3G', 'mcguire9@gmail.com', 'Admin', 0),
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
(16, 'Greg Kneubuhler', '$2y$10$gfGuMWcYJ9OHmwUu/.Pt8ONdmX7RiMV/FjP6RibjJnUf/gih7ozX61', 'mcguire2649@gmail.com', '', 0),
(17, 'Kyle Haselman', '$2y$10$T8K6viRgrCZpyeIfptkF7ezcmz6hfFmtdfT7HWD16ebNeH4uGCfhK1', 'haselman@gmail.com', '', 0),
(18, 'Todd Dallas', '$2y$10$hNTKRs/byUGzEFXvfA22ZeY.cXbZc7ut2azzGhSpVQ7KTFVt.bk4K1', 'dallasag@ctcn.net', '', 0),
(19, 'Brian Dargus', '$2y$10$PwqlPT/F09rW9Wx1T6LykON68l4.aORV3DjrLr65mCeaCFb0fIRkq1', 'bdargus@msn.com', '', 0),
(20, 'John Mackson', '$2y$10$Xo6Zkazpjlo4GwMRl209HOnikavqIEgcUrcARJp.ATxFvG1upIg.G1', 'jmackson@maxagronomy.com', '', 0),
(21, 'Jeremiah Durbin', '$2y$10$zA8ZjIQ777ShcNThv4JaoebT6iAXIL.Hf2zk1Ep..EdUQbq1nEZcO1', 'jeremiah.durbinslc@gmail.com', '', 0),
(22, 'Jim Moffit', '$2y$10$c4mjume8pt7ls5orsgTxsOBbAju1wBRGpCVusDY9rmUIyA/BBcKOq1', 'jpmoffitt@frontier.com', '', 0),
(23, 'Geoffrey Ecker', '$2y$10$ACuUF8TjWNEw3MZfZ3rmk.uyPrfc/TPSp8Cux9csvpExx6kRqpOYq1', 'giecker@gmail.com', '', 0),
(24, 'Jon Gilbert', '$2y$10$dmpkD3yIdponzSuTlLofz.zS62pKmc6OVn5RtGrrVWqJYjYvlguEC1', 'jongilbert24@hotmail.com', '', 0),
(25, 'Scott Eickholt', '$2y$10$mMKDEL2mX05A.9COcrUtvurCAYOEUFD5DWxAMpmJRHBunSbDHzUni1', 'srefarms@gmail.com', '', 0),
(26, 'Mitchell Hora', '$2y$10$ZKX5PMu4lheiGmRoMmYQyeScHKQoziNTe.Cp4awUpXBInMS6YPKFO', 'mitchell@continuumagllc.com', '', 0);

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
-- AUTO_INCREMENT for table `fertilizerapps`
--
ALTER TABLE `fertilizerapps`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `field`
--
ALTER TABLE `field`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `grower`
--
ALTER TABLE `grower`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- AUTO_INCREMENT for table `manure`
--
ALTER TABLE `manure`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

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
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

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
