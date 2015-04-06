-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 05, 2015 at 07:29 PM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

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
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`ID`, `first_name`, `last_name`, `street`, `city`, `country`, `email`) VALUES
(1, 'san', 'kalpa', 'street', 'city', 'country', 'email'),
(2, 'nip', 'san', 'dd', 'aa', 'da', 'ed'),
(3, 'ni', 'pu', 'na', 'sa', 'n', 'ka');

-- --------------------------------------------------------

--
-- Table structure for table `admin_mobile`
--

CREATE TABLE IF NOT EXISTS `admin_mobile` (
  `a_ID` int(8) NOT NULL DEFAULT '0',
  `mobile_number` varchar(20) NOT NULL DEFAULT '',
  PRIMARY KEY (`a_ID`,`mobile_number`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `fos_user`
--

CREATE TABLE IF NOT EXISTS `fos_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
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
  `credentials_expire_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_957A647992FC23A8` (`username_canonical`),
  UNIQUE KEY `UNIQ_957A6479A0D96FBF` (`email_canonical`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=16 ;

--
-- Dumping data for table `fos_user`
--

INSERT INTO `fos_user` (`id`, `username`, `username_canonical`, `email`, `email_canonical`, `enabled`, `salt`, `password`, `last_login`, `locked`, `expired`, `expires_at`, `confirmation_token`, `password_requested_at`, `roles`, `credentials_expired`, `credentials_expire_at`) VALUES
(1, 'sankapala', 'sankapala', 'nipuna92@yahoo.com', 'nipuna92@yahoo.com', 1, '7kbp1ir7z08wg8440ks4kg00wgw884s', 'pTZBUYjfuwoRoSlaSBgfkRjx+aQRa0qUH6X1tnrqsa4g2IrGqCjaedobXyewNfop5f2C3fcjvcfDf88nddSKWw==', '2015-04-05 18:26:08', 0, 0, NULL, NULL, NULL, 'a:0:{}', 0, NULL),
(2, 'kotiya', 'kotiya', 'nipuna499@gmail.com', 'nipuna499@gmail.com', 1, 'iile6yhecuo8goc44gksoo0kcw4kk80', '4JL9472O1Ul5QirG9hIUkrYch9d1VpRMOxI7y+IdJiwBGKQzLEEMbmH5HZ90AAnaWwJceBAqhFdWeNkE3aMR3g==', '2015-03-28 10:33:47', 0, 0, NULL, NULL, NULL, 'a:0:{}', 0, NULL),
(3, 'sankalpa', 'sankalpa', 'nipunasankalpa.12@yahoo.com', 'nipunasankalpa.12@yahoo.com', 1, 'iile6yhecuo8goc44gksoo0kcw4kk80', '4JL9472O1Ul5QirG9hIUkrYch9d1VpRMOxI7y+IdJiwBGKQzLEEMbmH5HZ90AAnaWwJceBAqhFdWeNkE3aMR3g==', NULL, 0, 0, NULL, NULL, NULL, '', 0, NULL),
(4, 'janani', 'janani', 'nipun@yahoo.com', 'nipun@yahoo.com', 1, '6w3oiuv0x7wo4gsw844sggwgs8swgww', 'gf0BtjkE23rRMyetcfoio1Sk4U9bTzmviFtu/v7eRWm7mM7BWyWUsI6qjzIu0SWcBtlF1bfuqEZP8gi9YDMjig==', NULL, 0, 0, NULL, NULL, NULL, 'a:0:{}', 0, NULL),
(7, 'Dilip', 'dilip', 'dilip@gamil.com', 'dilip@gamil.com', 1, '397vo233bmm8wsgk884wcsgwo8kwgoc', '4yTtzUkzgQL1t3BEhjgoZBfUsYYBM5cKyJIvqDoiuUNZGR62Ce/klJIf04PqaTw7McMq3Hg3eMXM0mU502eNgw==', NULL, 0, 0, NULL, NULL, NULL, 'a:1:{i:0;s:9:"ROLE_USER";}', 0, NULL),
(14, 'sana', 'sana', 'sana@gmail.com', 'sana@gmail.com', 1, '6ljvz09hm348w0ccw4wggg00gos8ss0', 'EukTrI4MVmqO8rD5I9Svu6CnAJvLVb5YBiJ0QXbIEb8kJAK3aJ8SgRF52DXsrnz3PZeitZKXQ8kCfmL1+soLhw==', NULL, 0, 0, NULL, NULL, NULL, 'a:1:{i:0;s:8:"ROLE_VOL";}', 0, NULL),
(15, 'flash', 'flash', 'flash@doodle.com', 'flash@doodle.com', 1, 'gfkg4nqk6hc8kk0co0wc4kkg84004wc', 'dj5MUDQKne8db0PScBzEMyEvDjc6lBpX++1xlMM5qea3OYuHTTlyzJNpMK26WbET+BmTSx9b+7yB+DJOEXJsow==', NULL, 0, 0, NULL, NULL, NULL, 'a:1:{i:0;s:8:"ROLE_ORG";}', 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `institute`
--

CREATE TABLE IF NOT EXISTS `institute` (
  `ID` int(8) NOT NULL,
  `name` varchar(50) NOT NULL,
  `city` varchar(20) DEFAULT NULL,
  `country` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`ID`)
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
  `country` varchar(15) NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `a_ID` (`a_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `organization`
--

INSERT INTO `organization` (`ID`, `a_ID`, `name`, `description`, `street`, `city`, `country`) VALUES
(1, 1, 'sdfsf', 'sdfsdfs', 'sdfsdf', 'sdfsdf', 'sdfsdfsd');

-- --------------------------------------------------------

--
-- Table structure for table `organization_email`
--

CREATE TABLE IF NOT EXISTS `organization_email` (
  `o_ID` int(8) NOT NULL DEFAULT '0',
  `email` varchar(25) NOT NULL DEFAULT '',
  PRIMARY KEY (`o_ID`,`email`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `organization_fax`
--

CREATE TABLE IF NOT EXISTS `organization_fax` (
  `o_ID` int(8) NOT NULL DEFAULT '0',
  `fax` varchar(20) NOT NULL DEFAULT '',
  PRIMARY KEY (`o_ID`,`fax`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `organization_fax`
--

INSERT INTO `organization_fax` (`o_ID`, `fax`) VALUES
(1, 'qe3ewefg'),
(1, 'sdfsdfs'),
(1, 'sdfsdfsfdsf'),
(1, 'sdfsdfssdfs'),
(1, 'sdssddsdwwdfs');

-- --------------------------------------------------------

--
-- Table structure for table `organization_mobile`
--

CREATE TABLE IF NOT EXISTS `organization_mobile` (
  `o_ID` int(8) NOT NULL DEFAULT '0',
  `mobile_number` varchar(20) NOT NULL DEFAULT '',
  PRIMARY KEY (`o_ID`,`mobile_number`)
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
  `status` varchar(15) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `volunteers_needed` int(3) NOT NULL,
  `no_of_filled_positions` int(3) NOT NULL,
  `posted_date` date NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `o_ID` (`o_ID`),
  KEY `t_ID` (`t_ID`),
  KEY `a_ID` (`a_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `project`
--

INSERT INTO `project` (`ID`, `a_ID`, `t_ID`, `o_ID`, `title`, `description`, `status`, `start_date`, `end_date`, `volunteers_needed`, `no_of_filled_positions`, `posted_date`) VALUES
(1, 1, 1, 1, 'ERP', 'REP PROJECT', 'ongoing', '2015-03-24', '2015-04-17', 20, 5, '2015-03-17'),
(2, 1, 1, 1, 'sdfsdf', 'dfsdfsd', 'asda', '2015-04-08', '2015-04-02', 2, 3, '2015-04-30');

-- --------------------------------------------------------

--
-- Stand-in structure for view `projectview`
--
CREATE TABLE IF NOT EXISTS `projectview` (
`ID` int(8)
,`Duration` int(7)
,`placesLeft` bigint(12)
);
-- --------------------------------------------------------

--
-- Table structure for table `project_skill`
--

CREATE TABLE IF NOT EXISTS `project_skill` (
  `p_ID` int(8) NOT NULL DEFAULT '0',
  `s_ID` int(8) NOT NULL DEFAULT '0',
  PRIMARY KEY (`p_ID`,`s_ID`),
  KEY `s_ID` (`s_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `skill`
--

CREATE TABLE IF NOT EXISTS `skill` (
  `ID` int(8) NOT NULL DEFAULT '0',
  `name` varchar(15) NOT NULL,
  `description` text NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `type`
--

CREATE TABLE IF NOT EXISTS `type` (
  `ID` int(8) NOT NULL DEFAULT '0',
  `name` varchar(15) NOT NULL,
  `description` text NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `type`
--

INSERT INTO `type` (`ID`, `name`, `description`) VALUES
(1, 'software', 'he he');

-- --------------------------------------------------------

--
-- Table structure for table `volunteer`
--

CREATE TABLE IF NOT EXISTS `volunteer` (
  `ID` int(8) NOT NULL DEFAULT '0',
  `a_ID` int(8) DEFAULT NULL,
  `first_name` varchar(15) NOT NULL,
  `last_name` varchar(15) NOT NULL,
  `street` varchar(20) NOT NULL,
  `city` varchar(15) NOT NULL,
  `country` varchar(15) NOT NULL,
  `email` varchar(25) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `availability` varchar(15) NOT NULL,
  `dob` date NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `a_ID` (`a_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `volunteer`
--

INSERT INTO `volunteer` (`ID`, `a_ID`, `first_name`, `last_name`, `street`, `city`, `country`, `email`, `gender`, `availability`, `dob`) VALUES
(1, 1, 'Nipuna', 'Sankalpa', 'vjhj', 'jjhgjhg', 'jhjhg', 'nipuna92@yahoo.com', 'male', 'avilable', '2015-04-22');

-- --------------------------------------------------------

--
-- Table structure for table `volunteer_education`
--

CREATE TABLE IF NOT EXISTS `volunteer_education` (
  `v_ID` int(8) NOT NULL,
  `i_ID` int(8) NOT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `degree` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`v_ID`,`i_ID`),
  KEY `v_ID` (`v_ID`),
  KEY `i_ID` (`i_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `volunteer_interested_area`
--

CREATE TABLE IF NOT EXISTS `volunteer_interested_area` (
  `v_ID` int(8) NOT NULL DEFAULT '0',
  `t_ID` int(8) NOT NULL DEFAULT '0',
  PRIMARY KEY (`v_ID`,`t_ID`),
  KEY `t_ID` (`t_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `volunteer_mobile`
--

CREATE TABLE IF NOT EXISTS `volunteer_mobile` (
  `v_ID` int(8) NOT NULL DEFAULT '0',
  `mobile_number` varchar(20) NOT NULL DEFAULT '',
  PRIMARY KEY (`v_ID`,`mobile_number`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `volunteer_project`
--

CREATE TABLE IF NOT EXISTS `volunteer_project` (
  `v_ID` int(8) NOT NULL DEFAULT '0',
  `p_ID` int(8) NOT NULL DEFAULT '0',
  `contribution` text NOT NULL,
  PRIMARY KEY (`v_ID`,`p_ID`),
  KEY `p_ID` (`p_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `volunteer_skill`
--

CREATE TABLE IF NOT EXISTS `volunteer_skill` (
  `v_ID` int(8) NOT NULL DEFAULT '0',
  `s_ID` int(8) NOT NULL DEFAULT '0',
  PRIMARY KEY (`v_ID`,`s_ID`),
  KEY `s_ID` (`s_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure for view `projectview`
--
DROP TABLE IF EXISTS `projectview`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `projectview` AS select `project`.`ID` AS `ID`,(to_days(`project`.`end_date`) - to_days(`project`.`start_date`)) AS `Duration`,(`project`.`volunteers_needed` - `project`.`no_of_filled_positions`) AS `placesLeft` from `project` WITH CASCADED CHECK OPTION;

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
-- Constraints for table `organization_email`
--
ALTER TABLE `organization_email`
  ADD CONSTRAINT `organization_email_ibfk_1` FOREIGN KEY (`o_ID`) REFERENCES `organization` (`ID`) ON DELETE CASCADE;

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
