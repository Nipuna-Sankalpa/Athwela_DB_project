-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 03, 2015 at 10:01 AM
-- Server version: 5.6.21
-- PHP Version: 5.5.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `athwela`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `ID` int(8) NOT NULL DEFAULT '0',
  `first_name` varchar(15) NOT NULL,
  `last_name` varchar(15) NOT NULL,
  `street` varchar(20) NOT NULL,
  `city` varchar(15) NOT NULL,
  `country` varchar(15) NOT NULL,
  `email` varchar(25) NOT NULL,
  `access_level` int(1) NOT NULL,
  `password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `admin_mobile`
--

CREATE TABLE IF NOT EXISTS `admin_mobile` (
  `a_ID` int(8) NOT NULL DEFAULT '0',
  `mobile_number` varchar(20) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `fos_user`
--

CREATE TABLE IF NOT EXISTS `fos_user` (
`id` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `username_canonical` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email_canonical` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `enabled` tinyint(1) NOT NULL,
  `salt` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `last_login` datetime DEFAULT NULL,
  `locked` tinyint(1) NOT NULL,
  `expired` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL,
  `confirmation_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password_requested_at` datetime DEFAULT NULL,
  `roles` longtext COLLATE utf8_unicode_ci NOT NULL COMMENT '(DC2Type:array)',
  `credentials_expired` tinyint(1) NOT NULL,
  `credentials_expire_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `institute`
--

CREATE TABLE IF NOT EXISTS `institute` (
  `ID` int(8) NOT NULL,
  `name` varchar(50) NOT NULL,
  `city` varchar(20) DEFAULT NULL,
  `country` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `organization`
--

CREATE TABLE IF NOT EXISTS `organization` (
  `ID` int(8) NOT NULL DEFAULT '0',
  `a_ID` int(8) DEFAULT NULL,
  `name` varchar(20) NOT NULL,
  `description` text NOT NULL,
  `street` varchar(20) NOT NULL,
  `city` varchar(15) NOT NULL,
  `country` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `organization_fax`
--

CREATE TABLE IF NOT EXISTS `organization_fax` (
  `o_ID` int(8) NOT NULL DEFAULT '0',
  `fax` varchar(20) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `organization_mobile`
--

CREATE TABLE IF NOT EXISTS `organization_mobile` (
  `o_ID` int(8) NOT NULL DEFAULT '0',
  `mobile_number` varchar(20) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `organiztion_email`
--

CREATE TABLE IF NOT EXISTS `organiztion_email` (
  `o_ID` int(8) NOT NULL DEFAULT '0',
  `email` varchar(25) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `project`
--

CREATE TABLE IF NOT EXISTS `project` (
  `ID` int(8) NOT NULL DEFAULT '0',
  `a_ID` int(8) DEFAULT NULL,
  `t_ID` int(8) DEFAULT NULL,
  `o_ID` int(8) DEFAULT NULL,
  `title` varchar(15) NOT NULL,
  `description` text NOT NULL,
  `status` int(1) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `volunteers_needed` int(3) NOT NULL,
  `no_of_filled_positions` int(3) NOT NULL,
  `posted_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `project_skill`
--

CREATE TABLE IF NOT EXISTS `project_skill` (
  `p_ID` int(8) NOT NULL DEFAULT '0',
  `s_ID` int(8) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `skill`
--

CREATE TABLE IF NOT EXISTS `skill` (
  `ID` int(8) NOT NULL DEFAULT '0',
  `name` varchar(15) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `type`
--

CREATE TABLE IF NOT EXISTS `type` (
  `ID` int(8) NOT NULL DEFAULT '0',
  `name` varchar(15) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `volunteer`
--

CREATE TABLE IF NOT EXISTS `volunteer` (
  `ID` int(8) NOT NULL DEFAULT '0',
  `a_ID` int(8) DEFAULT NULL,
  `first_name` varchar(15) NOT NULL,
  `last_name` varchar(15) NOT NULL,
  `dob` date NOT NULL,
  `street` varchar(20) NOT NULL,
  `city` varchar(15) NOT NULL,
  `country` varchar(15) NOT NULL,
  `email` varchar(25) NOT NULL,
  `gender` tinyint(1) NOT NULL,
  `availability` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `volunteer_education`
--

CREATE TABLE IF NOT EXISTS `volunteer_education` (
  `v_ID` int(8) NOT NULL,
  `i_ID` int(8) NOT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `qualification` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `volunteer_interested_area`
--

CREATE TABLE IF NOT EXISTS `volunteer_interested_area` (
  `v_ID` int(8) NOT NULL DEFAULT '0',
  `t_ID` int(8) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `volunteer_mobile`
--

CREATE TABLE IF NOT EXISTS `volunteer_mobile` (
  `v_ID` int(8) NOT NULL DEFAULT '0',
  `mobile_number` varchar(20) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `volunteer_project`
--

CREATE TABLE IF NOT EXISTS `volunteer_project` (
  `v_ID` int(8) NOT NULL DEFAULT '0',
  `p_ID` int(8) NOT NULL DEFAULT '0',
  `contribution` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `volunteer_skill`
--

CREATE TABLE IF NOT EXISTS `volunteer_skill` (
  `v_ID` int(8) NOT NULL DEFAULT '0',
  `s_ID` int(8) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
 ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `admin_mobile`
--
ALTER TABLE `admin_mobile`
 ADD PRIMARY KEY (`a_ID`,`mobile_number`);

--
-- Indexes for table `fos_user`
--
ALTER TABLE `fos_user`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `UNIQ_957A647992FC23A8` (`username_canonical`), ADD UNIQUE KEY `UNIQ_957A6479A0D96FBF` (`email_canonical`);

--
-- Indexes for table `institute`
--
ALTER TABLE `institute`
 ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `organization`
--
ALTER TABLE `organization`
 ADD PRIMARY KEY (`ID`), ADD KEY `a_ID` (`a_ID`);

--
-- Indexes for table `organization_fax`
--
ALTER TABLE `organization_fax`
 ADD PRIMARY KEY (`o_ID`,`fax`);

--
-- Indexes for table `organization_mobile`
--
ALTER TABLE `organization_mobile`
 ADD PRIMARY KEY (`o_ID`,`mobile_number`);

--
-- Indexes for table `organiztion_email`
--
ALTER TABLE `organiztion_email`
 ADD PRIMARY KEY (`o_ID`,`email`);

--
-- Indexes for table `project`
--
ALTER TABLE `project`
 ADD PRIMARY KEY (`ID`), ADD KEY `o_ID` (`o_ID`), ADD KEY `t_ID` (`t_ID`), ADD KEY `a_ID` (`a_ID`);

--
-- Indexes for table `project_skill`
--
ALTER TABLE `project_skill`
 ADD PRIMARY KEY (`p_ID`,`s_ID`), ADD KEY `s_ID` (`s_ID`);

--
-- Indexes for table `skill`
--
ALTER TABLE `skill`
 ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `type`
--
ALTER TABLE `type`
 ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `volunteer`
--
ALTER TABLE `volunteer`
 ADD PRIMARY KEY (`ID`), ADD KEY `a_ID` (`a_ID`);

--
-- Indexes for table `volunteer_education`
--
ALTER TABLE `volunteer_education`
 ADD PRIMARY KEY (`v_ID`,`i_ID`), ADD KEY `v_ID` (`v_ID`), ADD KEY `i_ID` (`i_ID`);

--
-- Indexes for table `volunteer_interested_area`
--
ALTER TABLE `volunteer_interested_area`
 ADD PRIMARY KEY (`v_ID`,`t_ID`), ADD KEY `t_ID` (`t_ID`);

--
-- Indexes for table `volunteer_mobile`
--
ALTER TABLE `volunteer_mobile`
 ADD PRIMARY KEY (`v_ID`,`mobile_number`);

--
-- Indexes for table `volunteer_project`
--
ALTER TABLE `volunteer_project`
 ADD PRIMARY KEY (`v_ID`,`p_ID`), ADD KEY `p_ID` (`p_ID`);

--
-- Indexes for table `volunteer_skill`
--
ALTER TABLE `volunteer_skill`
 ADD PRIMARY KEY (`v_ID`,`s_ID`), ADD KEY `s_ID` (`s_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `fos_user`
--
ALTER TABLE `fos_user`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `admin_mobile`
--
ALTER TABLE `admin_mobile`
ADD CONSTRAINT `admin_mobile_ibfk_1` FOREIGN KEY (`a_ID`) REFERENCES `admin` (`ID`) ON DELETE CASCADE;

--
-- Constraints for table `organization`
--
ALTER TABLE `organization`
ADD CONSTRAINT `organization_ibfk_1` FOREIGN KEY (`a_ID`) REFERENCES `admin` (`ID`) ON DELETE CASCADE;

--
-- Constraints for table `organization_fax`
--
ALTER TABLE `organization_fax`
ADD CONSTRAINT `organization_fax_ibfk_1` FOREIGN KEY (`o_ID`) REFERENCES `organization` (`ID`) ON DELETE CASCADE;

--
-- Constraints for table `organization_mobile`
--
ALTER TABLE `organization_mobile`
ADD CONSTRAINT `organization_mobile_ibfk_1` FOREIGN KEY (`o_ID`) REFERENCES `organization` (`ID`) ON DELETE CASCADE;

--
-- Constraints for table `organiztion_email`
--
ALTER TABLE `organiztion_email`
ADD CONSTRAINT `organiztion_email_ibfk_1` FOREIGN KEY (`o_ID`) REFERENCES `organization` (`ID`) ON DELETE CASCADE;

--
-- Constraints for table `project`
--
ALTER TABLE `project`
ADD CONSTRAINT `project_ibfk_1` FOREIGN KEY (`o_ID`) REFERENCES `organization` (`ID`) ON DELETE CASCADE,
ADD CONSTRAINT `project_ibfk_2` FOREIGN KEY (`t_ID`) REFERENCES `type` (`ID`) ON DELETE CASCADE,
ADD CONSTRAINT `project_ibfk_3` FOREIGN KEY (`a_ID`) REFERENCES `admin` (`ID`) ON DELETE CASCADE;

--
-- Constraints for table `project_skill`
--
ALTER TABLE `project_skill`
ADD CONSTRAINT `project_skill_ibfk_1` FOREIGN KEY (`p_ID`) REFERENCES `project` (`ID`) ON DELETE CASCADE,
ADD CONSTRAINT `project_skill_ibfk_2` FOREIGN KEY (`s_ID`) REFERENCES `skill` (`ID`) ON DELETE CASCADE;

--
-- Constraints for table `volunteer`
--
ALTER TABLE `volunteer`
ADD CONSTRAINT `volunteer_ibfk_1` FOREIGN KEY (`a_ID`) REFERENCES `admin` (`ID`) ON DELETE CASCADE;

--
-- Constraints for table `volunteer_education`
--
ALTER TABLE `volunteer_education`
ADD CONSTRAINT `volunteer_education_ibfk_1` FOREIGN KEY (`v_ID`) REFERENCES `volunteer` (`ID`),
ADD CONSTRAINT `volunteer_education_ibfk_2` FOREIGN KEY (`i_ID`) REFERENCES `institute` (`ID`);

--
-- Constraints for table `volunteer_interested_area`
--
ALTER TABLE `volunteer_interested_area`
ADD CONSTRAINT `volunteer_interested_area_ibfk_1` FOREIGN KEY (`t_ID`) REFERENCES `type` (`ID`) ON DELETE CASCADE,
ADD CONSTRAINT `volunteer_interested_area_ibfk_2` FOREIGN KEY (`v_ID`) REFERENCES `volunteer` (`ID`) ON DELETE CASCADE;

--
-- Constraints for table `volunteer_mobile`
--
ALTER TABLE `volunteer_mobile`
ADD CONSTRAINT `volunteer_mobile_ibfk_1` FOREIGN KEY (`v_ID`) REFERENCES `volunteer` (`ID`) ON DELETE CASCADE;

--
-- Constraints for table `volunteer_project`
--
ALTER TABLE `volunteer_project`
ADD CONSTRAINT `volunteer_project_ibfk_1` FOREIGN KEY (`v_ID`) REFERENCES `volunteer` (`ID`) ON DELETE CASCADE,
ADD CONSTRAINT `volunteer_project_ibfk_2` FOREIGN KEY (`p_ID`) REFERENCES `project` (`ID`) ON DELETE CASCADE;

--
-- Constraints for table `volunteer_skill`
--
ALTER TABLE `volunteer_skill`
ADD CONSTRAINT `volunteer_skill_ibfk_1` FOREIGN KEY (`v_ID`) REFERENCES `volunteer` (`ID`) ON DELETE CASCADE,
ADD CONSTRAINT `volunteer_skill_ibfk_2` FOREIGN KEY (`s_ID`) REFERENCES `skill` (`ID`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
