-- phpMyAdmin SQL Dump
-- version 3.2.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 13, 2011 at 03:05 AM
-- Server version: 5.1.44
-- PHP Version: 5.3.2

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

--
-- Database: `tourney`
--

-- --------------------------------------------------------

--
-- Table structure for table `best_scores`
--

DROP TABLE IF EXISTS `best_scores`;
CREATE TABLE IF NOT EXISTS `best_scores` (
  `id` int(11) NOT NULL DEFAULT '0',
  `name` varchar(128) NOT NULL DEFAULT '',
  `score` double NOT NULL DEFAULT '0',
  `scoring_type` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`scoring_type`,`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `best_scores`
--

INSERT INTO `best_scores` (`id`, `name`, `score`, `scoring_type`) VALUES(2, 'jweldin', 45.4, 'main');
INSERT INTO `best_scores` (`id`, `name`, `score`, `scoring_type`) VALUES(2, 'jweldin', 188, 'geometric');
INSERT INTO `best_scores` (`id`, `name`, `score`, `scoring_type`) VALUES(2, 'jweldin', 1640, 'espn');
INSERT INTO `best_scores` (`id`, `name`, `score`, `scoring_type`) VALUES(2, 'jweldin', 224, 'fibonacci');
INSERT INTO `best_scores` (`id`, `name`, `score`, `scoring_type`) VALUES(2, 'jweldin', 35.078, 'odds');
INSERT INTO `best_scores` (`id`, `name`, `score`, `scoring_type`) VALUES(2, 'jweldin', 0, 'constant');

-- --------------------------------------------------------

--
-- Table structure for table `brackets`
--

DROP TABLE IF EXISTS `brackets`;
CREATE TABLE IF NOT EXISTS `brackets` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userid` int(11) unsigned NOT NULL,
  `tiebreaker` int(3) NOT NULL DEFAULT '0',
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'time bracket was submitted',
  `1` varchar(32) NOT NULL DEFAULT '',
  `2` varchar(32) NOT NULL DEFAULT '',
  `3` varchar(32) NOT NULL DEFAULT '',
  `4` varchar(32) NOT NULL DEFAULT '',
  `5` varchar(32) NOT NULL DEFAULT '',
  `6` varchar(32) NOT NULL DEFAULT '',
  `7` varchar(32) NOT NULL DEFAULT '',
  `8` varchar(32) NOT NULL DEFAULT '',
  `9` varchar(32) NOT NULL DEFAULT '',
  `10` varchar(32) NOT NULL DEFAULT '',
  `11` varchar(32) NOT NULL DEFAULT '',
  `12` varchar(32) NOT NULL DEFAULT '',
  `13` varchar(32) NOT NULL DEFAULT '',
  `14` varchar(32) NOT NULL DEFAULT '',
  `15` varchar(32) NOT NULL DEFAULT '',
  `16` varchar(32) NOT NULL DEFAULT '',
  `17` varchar(32) NOT NULL DEFAULT '',
  `18` varchar(32) NOT NULL DEFAULT '',
  `19` varchar(32) NOT NULL DEFAULT '',
  `20` varchar(32) NOT NULL DEFAULT '',
  `21` varchar(32) NOT NULL DEFAULT '',
  `22` varchar(32) NOT NULL DEFAULT '',
  `23` varchar(32) NOT NULL DEFAULT '',
  `24` varchar(32) NOT NULL DEFAULT '',
  `25` varchar(32) NOT NULL DEFAULT '',
  `26` varchar(32) NOT NULL DEFAULT '',
  `27` varchar(32) NOT NULL DEFAULT '',
  `28` varchar(32) NOT NULL DEFAULT '',
  `29` varchar(32) NOT NULL DEFAULT '',
  `30` varchar(32) NOT NULL DEFAULT '',
  `31` varchar(32) NOT NULL DEFAULT '',
  `32` varchar(32) NOT NULL DEFAULT '',
  `33` varchar(32) NOT NULL DEFAULT '',
  `34` varchar(32) NOT NULL DEFAULT '',
  `35` varchar(32) NOT NULL DEFAULT '',
  `36` varchar(32) NOT NULL DEFAULT '',
  `37` varchar(32) NOT NULL DEFAULT '',
  `38` varchar(32) NOT NULL DEFAULT '',
  `39` varchar(32) NOT NULL DEFAULT '',
  `40` varchar(32) NOT NULL DEFAULT '',
  `41` varchar(32) NOT NULL DEFAULT '',
  `42` varchar(32) NOT NULL DEFAULT '',
  `43` varchar(32) NOT NULL DEFAULT '',
  `44` varchar(32) NOT NULL DEFAULT '',
  `45` varchar(32) NOT NULL DEFAULT '',
  `46` varchar(32) NOT NULL DEFAULT '',
  `47` varchar(32) NOT NULL DEFAULT '',
  `48` varchar(32) NOT NULL DEFAULT '',
  `49` varchar(32) NOT NULL DEFAULT '',
  `50` varchar(32) NOT NULL DEFAULT '',
  `51` varchar(32) NOT NULL DEFAULT '',
  `52` varchar(32) NOT NULL DEFAULT '',
  `53` varchar(32) NOT NULL DEFAULT '',
  `54` varchar(32) NOT NULL DEFAULT '',
  `55` varchar(32) NOT NULL DEFAULT '',
  `56` varchar(32) NOT NULL DEFAULT '',
  `57` varchar(32) NOT NULL DEFAULT '',
  `58` varchar(32) NOT NULL DEFAULT '',
  `59` varchar(32) NOT NULL DEFAULT '',
  `60` varchar(32) NOT NULL DEFAULT '',
  `61` varchar(32) NOT NULL DEFAULT '',
  `62` varchar(32) NOT NULL DEFAULT '',
  `63` varchar(32) NOT NULL DEFAULT '',
  `eliminated` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'Equals 1 when eliminated',
  PRIMARY KEY (`id`),
  UNIQUE KEY `userid_2` (`userid`),
  KEY `userid` (`userid`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `brackets`
--

INSERT INTO `brackets` (`id`, `userid`, `tiebreaker`, `time`, `1`, `2`, `3`, `4`, `5`, `6`, `7`, `8`, `9`, `10`, `11`, `12`, `13`, `14`, `15`, `16`, `17`, `18`, `19`, `20`, `21`, `22`, `23`, `24`, `25`, `26`, `27`, `28`, `29`, `30`, `31`, `32`, `33`, `34`, `35`, `36`, `37`, `38`, `39`, `40`, `41`, `42`, `43`, `44`, `45`, `46`, `47`, `48`, `49`, `50`, `51`, `52`, `53`, `54`, `55`, `56`, `57`, `58`, `59`, `60`, `61`, `62`, `63`, `eliminated`) VALUES(2, 1, 126, '2011-03-08 00:28:47', 'Lehigh', 'Northern Iowa', 'New Mexico St.', 'Maryland', 'San Diego St.', 'Georgetown', 'Oklahoma St.', 'Ohio St.', 'Syracuse', 'Florida St.', 'Butler', 'Murray St.', 'Minnesota', 'Pittsburgh', 'BYU', 'Kansas St.', 'Kentucky', 'Wake Forest', 'Temple', 'Wisconsin', 'Washington', 'New Mexico', 'Clemson', 'Morgan St.', 'Play In', 'Louisville', 'Texas A&M', 'Siena', 'Notre Dame', 'Baylor', '', 'Villanova', 'Northern Iowa', 'New Mexico St.', 'Georgetown', 'Ohio St.', 'Florida St.', 'Butler', 'Pittsburgh', 'Kansas St.', 'Kentucky', 'Temple', 'New Mexico', 'Morgan St.', 'Play In', 'Texas A&M', 'Notre Dame', '', 'Northern Iowa', 'Ohio St.', 'Florida St.', 'Pittsburgh', 'Kentucky', 'Morgan St.', 'Texas A&M', 'Notre Dame', 'Northern Iowa', 'Pittsburgh', 'Morgan St.', 'Texas A&M', 'Pittsburgh', 'Morgan St.', 'Pittsburgh', 0);

-- --------------------------------------------------------

--
-- Table structure for table `end_games`
--

DROP TABLE IF EXISTS `end_games`;
CREATE TABLE IF NOT EXISTS `end_games` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `49` varchar(32) DEFAULT NULL,
  `50` varchar(32) DEFAULT NULL,
  `51` varchar(32) DEFAULT NULL,
  `52` varchar(32) DEFAULT NULL,
  `53` varchar(32) DEFAULT NULL,
  `54` varchar(32) DEFAULT NULL,
  `55` varchar(32) DEFAULT NULL,
  `56` varchar(32) DEFAULT NULL,
  `57` varchar(32) DEFAULT NULL,
  `58` varchar(32) DEFAULT NULL,
  `59` varchar(32) DEFAULT NULL,
  `60` varchar(32) DEFAULT NULL,
  `61` varchar(32) DEFAULT NULL,
  `62` varchar(32) DEFAULT NULL,
  `63` varchar(32) DEFAULT NULL,
  `round` int(11) DEFAULT NULL,
  `eliminated` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `end_games`
--


-- --------------------------------------------------------

--
-- Table structure for table `master`
--

DROP TABLE IF EXISTS `master`;
CREATE TABLE IF NOT EXISTS `master` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `1` varchar(32) NOT NULL DEFAULT '',
  `2` varchar(32) NOT NULL DEFAULT '',
  `3` varchar(32) NOT NULL DEFAULT '',
  `4` varchar(32) NOT NULL DEFAULT '',
  `5` varchar(32) NOT NULL DEFAULT '',
  `6` varchar(32) NOT NULL DEFAULT '',
  `7` varchar(32) NOT NULL DEFAULT '',
  `8` varchar(32) NOT NULL DEFAULT '',
  `9` varchar(32) NOT NULL DEFAULT '',
  `10` varchar(32) NOT NULL DEFAULT '',
  `11` varchar(32) NOT NULL DEFAULT '',
  `12` varchar(32) NOT NULL DEFAULT '',
  `13` varchar(32) NOT NULL DEFAULT '',
  `14` varchar(32) NOT NULL DEFAULT '',
  `15` varchar(32) NOT NULL DEFAULT '',
  `16` varchar(32) NOT NULL DEFAULT '',
  `17` varchar(32) NOT NULL DEFAULT '',
  `18` varchar(32) NOT NULL DEFAULT '',
  `19` varchar(32) NOT NULL DEFAULT '',
  `20` varchar(32) NOT NULL DEFAULT '',
  `21` varchar(32) NOT NULL DEFAULT '',
  `22` varchar(32) NOT NULL DEFAULT '',
  `23` varchar(32) NOT NULL DEFAULT '',
  `24` varchar(32) NOT NULL DEFAULT '',
  `25` varchar(32) NOT NULL DEFAULT '',
  `26` varchar(32) NOT NULL DEFAULT '',
  `27` varchar(32) NOT NULL DEFAULT '',
  `28` varchar(32) NOT NULL DEFAULT '',
  `29` varchar(32) NOT NULL DEFAULT '',
  `30` varchar(32) NOT NULL DEFAULT '',
  `31` varchar(32) NOT NULL DEFAULT '',
  `32` varchar(32) NOT NULL DEFAULT '',
  `33` varchar(32) NOT NULL DEFAULT '',
  `34` varchar(32) NOT NULL DEFAULT '',
  `35` varchar(32) NOT NULL DEFAULT '',
  `36` varchar(32) NOT NULL DEFAULT '',
  `37` varchar(32) NOT NULL DEFAULT '',
  `38` varchar(32) NOT NULL DEFAULT '',
  `39` varchar(32) NOT NULL DEFAULT '',
  `40` varchar(32) NOT NULL DEFAULT '',
  `41` varchar(32) NOT NULL DEFAULT '',
  `42` varchar(32) NOT NULL DEFAULT '',
  `43` varchar(32) NOT NULL DEFAULT '',
  `44` varchar(32) NOT NULL DEFAULT '',
  `45` varchar(32) NOT NULL DEFAULT '',
  `46` varchar(32) NOT NULL DEFAULT '',
  `47` varchar(32) NOT NULL DEFAULT '',
  `48` varchar(32) NOT NULL DEFAULT '',
  `49` varchar(32) NOT NULL DEFAULT '',
  `50` varchar(32) NOT NULL DEFAULT '',
  `51` varchar(32) NOT NULL DEFAULT '',
  `52` varchar(32) NOT NULL DEFAULT '',
  `53` varchar(32) NOT NULL DEFAULT '',
  `54` varchar(32) NOT NULL DEFAULT '',
  `55` varchar(32) NOT NULL DEFAULT '',
  `56` varchar(32) NOT NULL DEFAULT '',
  `57` varchar(32) NOT NULL DEFAULT '',
  `58` varchar(32) NOT NULL DEFAULT '',
  `59` varchar(32) NOT NULL DEFAULT '',
  `60` varchar(32) NOT NULL DEFAULT '',
  `61` varchar(32) NOT NULL DEFAULT '',
  `62` varchar(32) NOT NULL DEFAULT '',
  `63` varchar(32) NOT NULL DEFAULT '',
  `64` varchar(32) NOT NULL DEFAULT '',
  `type` varchar(32) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `type` (`type`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `master`
--

INSERT INTO `master` (`id`, `1`, `2`, `3`, `4`, `5`, `6`, `7`, `8`, `9`, `10`, `11`, `12`, `13`, `14`, `15`, `16`, `17`, `18`, `19`, `20`, `21`, `22`, `23`, `24`, `25`, `26`, `27`, `28`, `29`, `30`, `31`, `32`, `33`, `34`, `35`, `36`, `37`, `38`, `39`, `40`, `41`, `42`, `43`, `44`, `45`, `46`, `47`, `48`, `49`, `50`, `51`, `52`, `53`, `54`, `55`, `56`, `57`, `58`, `59`, `60`, `61`, `62`, `63`, `64`, `type`) VALUES(4, '1', '16', '8', '9', '5', '12', '4', '13', '6', '11', '3', '14', '7', '10', '2', '15', '1', '16', '8', '9', '5', '12', '4', '13', '6', '11', '3', '14', '7', '10', '2', '15', '1', '16', '8', '9', '5', '12', '4', '13', '6', '11', '3', '14', '7', '10', '2', '15', '1', '16', '8', '9', '5', '12', '4', '13', '6', '11', '3', '14', '7', '10', '2', '15', 'seeds');
INSERT INTO `master` (`id`, `1`, `2`, `3`, `4`, `5`, `6`, `7`, `8`, `9`, `10`, `11`, `12`, `13`, `14`, `15`, `16`, `17`, `18`, `19`, `20`, `21`, `22`, `23`, `24`, `25`, `26`, `27`, `28`, `29`, `30`, `31`, `32`, `33`, `34`, `35`, `36`, `37`, `38`, `39`, `40`, `41`, `42`, `43`, `44`, `45`, `46`, `47`, `48`, `49`, `50`, `51`, `52`, `53`, `54`, `55`, `56`, `57`, `58`, `59`, `60`, `61`, `62`, `63`, `64`, `type`) VALUES(1, 'Kansas', 'Lehigh', 'UNLV', 'Northern Iowa', 'Michigan St.', 'New Mexico St.', 'Maryland', 'Houston', 'Tennessee', 'San Diego St.', 'Georgetown', 'Ohio', 'Oklahoma St.', 'Georgia Tech', 'Ohio St.', 'UCSB', 'Syracuse', 'Vermont', 'Gonzaga', 'Florida St.', 'Butler', 'UTEP', 'Vanderbilt', 'Murray St.', 'Xavier', 'Minnesota', 'Pittsburgh', 'Oakland', 'BYU', 'Florida', 'Kansas St.', 'North Texas', 'Kentucky', 'E. Tennessee St.', 'Texas', 'Wake Forest', 'Temple', 'Cornell', 'Wisconsin', 'Wofford', 'Marquette', 'Washington', 'New Mexico', 'Montana', 'Clemson', 'Missouri', 'West Virginia', 'Morgan St.', 'Duke', 'Play In', 'California', 'Louisville', 'Texas A&M', 'Utah St.', 'Purdue', 'Siena', 'Notre Dame', 'Old Dominion', 'Baylor', 'Sam Houston St.', 'Richmond', 'St. Mary''s', 'Villanova', 'Robert Morris', NULL);
INSERT INTO `master` (`id`, `1`, `2`, `3`, `4`, `5`, `6`, `7`, `8`, `9`, `10`, `11`, `12`, `13`, `14`, `15`, `16`, `17`, `18`, `19`, `20`, `21`, `22`, `23`, `24`, `25`, `26`, `27`, `28`, `29`, `30`, `31`, `32`, `33`, `34`, `35`, `36`, `37`, `38`, `39`, `40`, `41`, `42`, `43`, `44`, `45`, `46`, `47`, `48`, `49`, `50`, `51`, `52`, `53`, `54`, `55`, `56`, `57`, `58`, `59`, `60`, `61`, `62`, `63`, `64`, `type`) VALUES(2, 'Kansas', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL);
INSERT INTO `master` (`id`, `1`, `2`, `3`, `4`, `5`, `6`, `7`, `8`, `9`, `10`, `11`, `12`, `13`, `14`, `15`, `16`, `17`, `18`, `19`, `20`, `21`, `22`, `23`, `24`, `25`, `26`, `27`, `28`, `29`, `30`, `31`, `32`, `33`, `34`, `35`, `36`, `37`, `38`, `39`, `40`, `41`, `42`, `43`, `44`, `45`, `46`, `47`, `48`, `49`, `50`, `51`, `52`, `53`, `54`, `55`, `56`, `57`, `58`, `59`, `60`, `61`, `62`, `63`, `64`, `type`) VALUES(3, 'Lehigh', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `meta`
--

DROP TABLE IF EXISTS `meta`;
CREATE TABLE IF NOT EXISTS `meta` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(64) NOT NULL,
  `subtitle` varchar(128) NOT NULL,
  `name` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `cost` double NOT NULL,
  `cut` double NOT NULL,
  `cutType` int(1) NOT NULL COMMENT '1=percent, 0=dollars',
  `closed` tinyint(1) NOT NULL COMMENT '1=submission is closed',
  `sweet16` tinyint(1) NOT NULL COMMENT '1=sweet 16 has started',
  `rules` text NOT NULL,
  `mail` int(1) NOT NULL,
  `tiebreaker` int(3) DEFAULT NULL,
  `region1` varchar(64) NOT NULL,
  `region2` varchar(64) NOT NULL,
  `region3` varchar(64) NOT NULL,
  `region4` varchar(64) NOT NULL,
  `db_version` varchar(255) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `meta`
--

INSERT INTO `meta` (`id`, `title`, `subtitle`, `name`, `email`, `cost`, `cut`, `cutType`, `closed`, `sweet16`, `rules`, `mail`, `tiebreaker`, `region1`, `region2`, `region3`, `region4`, `db_version`) VALUES(1, 'Hoops for Hunger', 'Feeding America/Change for a $10', 'Jeremie Weldin', 'jweldin@jweldin.com', 10, 2, 1, 1, 0, '<p>Here we need rules.</p>', 1, 0, 'Midwest', 'East', 'South', 'West', 'ver 1.5.1');

-- --------------------------------------------------------

--
-- Table structure for table `possible_scores`
--

DROP TABLE IF EXISTS `possible_scores`;
CREATE TABLE IF NOT EXISTS `possible_scores` (
  `outcome_id` int(11) DEFAULT NULL,
  `bracket_id` int(11) DEFAULT NULL,
  `score` double DEFAULT NULL,
  `type` char(32) DEFAULT NULL,
  `rank` int(11) DEFAULT NULL,
  `eliminated` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `possible_scores`
--


-- --------------------------------------------------------

--
-- Table structure for table `possible_scores_eliminated`
--

DROP TABLE IF EXISTS `possible_scores_eliminated`;
CREATE TABLE IF NOT EXISTS `possible_scores_eliminated` (
  `outcome_id` int(11) DEFAULT NULL,
  `bracket_id` int(11) DEFAULT NULL,
  `score` double DEFAULT NULL,
  `type` char(32) DEFAULT NULL,
  `rank` int(11) DEFAULT NULL,
  `eliminated` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `possible_scores_eliminated`
--


-- --------------------------------------------------------

--
-- Table structure for table `probability_of_winning`
--

DROP TABLE IF EXISTS `probability_of_winning`;
CREATE TABLE IF NOT EXISTS `probability_of_winning` (
  `id` int(11) DEFAULT NULL,
  `rank` int(11) DEFAULT NULL,
  `probability_win` double DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `probability_of_winning`
--


-- --------------------------------------------------------

--
-- Table structure for table `scores`
--

DROP TABLE IF EXISTS `scores`;
CREATE TABLE IF NOT EXISTS `scores` (
  `id` int(11) NOT NULL DEFAULT '0',
  `name` varchar(128) NOT NULL DEFAULT '',
  `score` double NOT NULL DEFAULT '0',
  `scoring_type` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`scoring_type`,`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `scores`
--

INSERT INTO `scores` (`id`, `name`, `score`, `scoring_type`) VALUES(2, 'jweldin', 0, 'main');
INSERT INTO `scores` (`id`, `name`, `score`, `scoring_type`) VALUES(2, 'jweldin', 0, 'geometric');
INSERT INTO `scores` (`id`, `name`, `score`, `scoring_type`) VALUES(2, 'jweldin', 0, 'espn');
INSERT INTO `scores` (`id`, `name`, `score`, `scoring_type`) VALUES(2, 'jweldin', 0, 'fibonacci');
INSERT INTO `scores` (`id`, `name`, `score`, `scoring_type`) VALUES(2, 'jweldin', 0, 'odds');
INSERT INTO `scores` (`id`, `name`, `score`, `scoring_type`) VALUES(2, 'jweldin', 0, 'constant');

-- --------------------------------------------------------

--
-- Table structure for table `scoring`
--

DROP TABLE IF EXISTS `scoring`;
CREATE TABLE IF NOT EXISTS `scoring` (
  `seed` int(11) NOT NULL DEFAULT '0',
  `1` double DEFAULT NULL,
  `2` double DEFAULT NULL,
  `3` double DEFAULT NULL,
  `4` double DEFAULT NULL,
  `5` double DEFAULT NULL,
  `6` double DEFAULT NULL,
  `type` char(255) DEFAULT NULL,
  KEY `system` (`type`,`seed`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `scoring`
--

INSERT INTO `scoring` (`seed`, `1`, `2`, `3`, `4`, `5`, `6`, `type`) VALUES(2, 1, 2, 4, 8, 16, 32, 'geometric');
INSERT INTO `scoring` (`seed`, `1`, `2`, `3`, `4`, `5`, `6`, `type`) VALUES(3, 1, 2, 4, 8, 16, 32, 'geometric');
INSERT INTO `scoring` (`seed`, `1`, `2`, `3`, `4`, `5`, `6`, `type`) VALUES(4, 1, 2, 4, 8, 16, 32, 'geometric');
INSERT INTO `scoring` (`seed`, `1`, `2`, `3`, `4`, `5`, `6`, `type`) VALUES(5, 1, 2, 4, 8, 16, 32, 'geometric');
INSERT INTO `scoring` (`seed`, `1`, `2`, `3`, `4`, `5`, `6`, `type`) VALUES(6, 1, 2, 4, 8, 16, 32, 'geometric');
INSERT INTO `scoring` (`seed`, `1`, `2`, `3`, `4`, `5`, `6`, `type`) VALUES(7, 1, 2, 4, 8, 16, 32, 'geometric');
INSERT INTO `scoring` (`seed`, `1`, `2`, `3`, `4`, `5`, `6`, `type`) VALUES(8, 1, 2, 4, 8, 16, 32, 'geometric');
INSERT INTO `scoring` (`seed`, `1`, `2`, `3`, `4`, `5`, `6`, `type`) VALUES(9, 1, 2, 4, 8, 16, 32, 'geometric');
INSERT INTO `scoring` (`seed`, `1`, `2`, `3`, `4`, `5`, `6`, `type`) VALUES(10, 1, 2, 4, 8, 16, 32, 'geometric');
INSERT INTO `scoring` (`seed`, `1`, `2`, `3`, `4`, `5`, `6`, `type`) VALUES(11, 1, 2, 4, 8, 16, 32, 'geometric');
INSERT INTO `scoring` (`seed`, `1`, `2`, `3`, `4`, `5`, `6`, `type`) VALUES(12, 1, 2, 4, 8, 16, 32, 'geometric');
INSERT INTO `scoring` (`seed`, `1`, `2`, `3`, `4`, `5`, `6`, `type`) VALUES(13, 1, 2, 4, 8, 16, 32, 'geometric');
INSERT INTO `scoring` (`seed`, `1`, `2`, `3`, `4`, `5`, `6`, `type`) VALUES(14, 1, 2, 4, 8, 16, 32, 'geometric');
INSERT INTO `scoring` (`seed`, `1`, `2`, `3`, `4`, `5`, `6`, `type`) VALUES(15, 1, 2, 4, 8, 16, 32, 'geometric');
INSERT INTO `scoring` (`seed`, `1`, `2`, `3`, `4`, `5`, `6`, `type`) VALUES(16, 1, 2, 4, 8, 16, 32, 'geometric');
INSERT INTO `scoring` (`seed`, `1`, `2`, `3`, `4`, `5`, `6`, `type`) VALUES(1, 1, 2, 4, 8, 16, 32, 'geometric');
INSERT INTO `scoring` (`seed`, `1`, `2`, `3`, `4`, `5`, `6`, `type`) VALUES(16, 10, 20, 40, 80, 120, 160, 'espn');
INSERT INTO `scoring` (`seed`, `1`, `2`, `3`, `4`, `5`, `6`, `type`) VALUES(15, 10, 20, 40, 80, 120, 160, 'espn');
INSERT INTO `scoring` (`seed`, `1`, `2`, `3`, `4`, `5`, `6`, `type`) VALUES(14, 10, 20, 40, 80, 120, 160, 'espn');
INSERT INTO `scoring` (`seed`, `1`, `2`, `3`, `4`, `5`, `6`, `type`) VALUES(13, 10, 20, 40, 80, 120, 160, 'espn');
INSERT INTO `scoring` (`seed`, `1`, `2`, `3`, `4`, `5`, `6`, `type`) VALUES(12, 10, 20, 40, 80, 120, 160, 'espn');
INSERT INTO `scoring` (`seed`, `1`, `2`, `3`, `4`, `5`, `6`, `type`) VALUES(11, 10, 20, 40, 80, 120, 160, 'espn');
INSERT INTO `scoring` (`seed`, `1`, `2`, `3`, `4`, `5`, `6`, `type`) VALUES(10, 10, 20, 40, 80, 120, 160, 'espn');
INSERT INTO `scoring` (`seed`, `1`, `2`, `3`, `4`, `5`, `6`, `type`) VALUES(9, 10, 20, 40, 80, 120, 160, 'espn');
INSERT INTO `scoring` (`seed`, `1`, `2`, `3`, `4`, `5`, `6`, `type`) VALUES(8, 10, 20, 40, 80, 120, 160, 'espn');
INSERT INTO `scoring` (`seed`, `1`, `2`, `3`, `4`, `5`, `6`, `type`) VALUES(7, 10, 20, 40, 80, 120, 160, 'espn');
INSERT INTO `scoring` (`seed`, `1`, `2`, `3`, `4`, `5`, `6`, `type`) VALUES(6, 10, 20, 40, 80, 120, 160, 'espn');
INSERT INTO `scoring` (`seed`, `1`, `2`, `3`, `4`, `5`, `6`, `type`) VALUES(5, 10, 20, 40, 80, 120, 160, 'espn');
INSERT INTO `scoring` (`seed`, `1`, `2`, `3`, `4`, `5`, `6`, `type`) VALUES(4, 10, 20, 40, 80, 120, 160, 'espn');
INSERT INTO `scoring` (`seed`, `1`, `2`, `3`, `4`, `5`, `6`, `type`) VALUES(3, 10, 20, 40, 80, 120, 160, 'espn');
INSERT INTO `scoring` (`seed`, `1`, `2`, `3`, `4`, `5`, `6`, `type`) VALUES(2, 10, 20, 40, 80, 120, 160, 'espn');
INSERT INTO `scoring` (`seed`, `1`, `2`, `3`, `4`, `5`, `6`, `type`) VALUES(1, 10, 20, 40, 80, 120, 160, 'espn');
INSERT INTO `scoring` (`seed`, `1`, `2`, `3`, `4`, `5`, `6`, `type`) VALUES(1, 2, 3, 5, 8, 13, 21, 'fibonacci');
INSERT INTO `scoring` (`seed`, `1`, `2`, `3`, `4`, `5`, `6`, `type`) VALUES(2, 2, 3, 5, 8, 13, 21, 'fibonacci');
INSERT INTO `scoring` (`seed`, `1`, `2`, `3`, `4`, `5`, `6`, `type`) VALUES(3, 2, 3, 5, 8, 13, 21, 'fibonacci');
INSERT INTO `scoring` (`seed`, `1`, `2`, `3`, `4`, `5`, `6`, `type`) VALUES(4, 2, 3, 5, 8, 13, 21, 'fibonacci');
INSERT INTO `scoring` (`seed`, `1`, `2`, `3`, `4`, `5`, `6`, `type`) VALUES(5, 2, 3, 5, 8, 13, 21, 'fibonacci');
INSERT INTO `scoring` (`seed`, `1`, `2`, `3`, `4`, `5`, `6`, `type`) VALUES(6, 2, 3, 5, 8, 13, 21, 'fibonacci');
INSERT INTO `scoring` (`seed`, `1`, `2`, `3`, `4`, `5`, `6`, `type`) VALUES(7, 2, 3, 5, 8, 13, 21, 'fibonacci');
INSERT INTO `scoring` (`seed`, `1`, `2`, `3`, `4`, `5`, `6`, `type`) VALUES(8, 2, 3, 5, 8, 13, 21, 'fibonacci');
INSERT INTO `scoring` (`seed`, `1`, `2`, `3`, `4`, `5`, `6`, `type`) VALUES(9, 2, 3, 5, 8, 13, 21, 'fibonacci');
INSERT INTO `scoring` (`seed`, `1`, `2`, `3`, `4`, `5`, `6`, `type`) VALUES(10, 2, 3, 5, 8, 13, 21, 'fibonacci');
INSERT INTO `scoring` (`seed`, `1`, `2`, `3`, `4`, `5`, `6`, `type`) VALUES(11, 2, 3, 5, 8, 13, 21, 'fibonacci');
INSERT INTO `scoring` (`seed`, `1`, `2`, `3`, `4`, `5`, `6`, `type`) VALUES(12, 2, 3, 5, 8, 13, 21, 'fibonacci');
INSERT INTO `scoring` (`seed`, `1`, `2`, `3`, `4`, `5`, `6`, `type`) VALUES(13, 2, 3, 5, 8, 13, 21, 'fibonacci');
INSERT INTO `scoring` (`seed`, `1`, `2`, `3`, `4`, `5`, `6`, `type`) VALUES(14, 2, 3, 5, 8, 13, 21, 'fibonacci');
INSERT INTO `scoring` (`seed`, `1`, `2`, `3`, `4`, `5`, `6`, `type`) VALUES(15, 2, 3, 5, 8, 13, 21, 'fibonacci');
INSERT INTO `scoring` (`seed`, `1`, `2`, `3`, `4`, `5`, `6`, `type`) VALUES(16, 2, 3, 5, 8, 13, 21, 'fibonacci');
INSERT INTO `scoring` (`seed`, `1`, `2`, `3`, `4`, `5`, `6`, `type`) VALUES(1, 0, 0.132, 0.289, 0.566, 0.776, 0.855, 'odds');
INSERT INTO `scoring` (`seed`, `1`, `2`, `3`, `4`, `5`, `6`, `type`) VALUES(2, 0.053, 0.355, 0.539, 0.789, 0.895, 0.961, 'odds');
INSERT INTO `scoring` (`seed`, `1`, `2`, `3`, `4`, `5`, `6`, `type`) VALUES(3, 0.171, 0.539, 0.776, 0.868, 0.921, 0.974, 'odds');
INSERT INTO `scoring` (`seed`, `1`, `2`, `3`, `4`, `5`, `6`, `type`) VALUES(4, 0.211, 0.553, 0.855, 0.908, 0.974, 0.987, 'odds');
INSERT INTO `scoring` (`seed`, `1`, `2`, `3`, `4`, `5`, `6`, `type`) VALUES(5, 0.316, 0.658, 0.947, 0.961, 0.974, 1, 'odds');
INSERT INTO `scoring` (`seed`, `1`, `2`, `3`, `4`, `5`, `6`, `type`) VALUES(6, 0.316, 0.658, 0.947, 0.961, 0.974, 1, 'odds');
INSERT INTO `scoring` (`seed`, `1`, `2`, `3`, `4`, `5`, `6`, `type`) VALUES(7, 0.408, 0.842, 0.947, 1, 1, 1, 'odds');
INSERT INTO `scoring` (`seed`, `1`, `2`, `3`, `4`, `5`, `6`, `type`) VALUES(8, 0.5, 0.895, 0.947, 1, 1, 1, 'odds');
INSERT INTO `scoring` (`seed`, `1`, `2`, `3`, `4`, `5`, `6`, `type`) VALUES(9, 0.5, 0.974, 0.987, 1, 1, 1, 'odds');
INSERT INTO `scoring` (`seed`, `1`, `2`, `3`, `4`, `5`, `6`, `type`) VALUES(10, 0.592, 0.842, 0.987, 1, 1, 1, 'odds');
INSERT INTO `scoring` (`seed`, `1`, `2`, `3`, `4`, `5`, `6`, `type`) VALUES(11, 0.684, 0.868, 0.987, 1, 1, 1, 'odds');
INSERT INTO `scoring` (`seed`, `1`, `2`, `3`, `4`, `5`, `6`, `type`) VALUES(12, 0.684, 0.829, 0.987, 1, 1, 1, 'odds');
INSERT INTO `scoring` (`seed`, `1`, `2`, `3`, `4`, `5`, `6`, `type`) VALUES(13, 0.789, 0.961, 1, 1, 1, 1, 'odds');
INSERT INTO `scoring` (`seed`, `1`, `2`, `3`, `4`, `5`, `6`, `type`) VALUES(14, 0.829, 0.974, 1, 1, 1, 1, 'odds');
INSERT INTO `scoring` (`seed`, `1`, `2`, `3`, `4`, `5`, `6`, `type`) VALUES(15, 0.947, 1, 1, 1, 1, 1, 'odds');
INSERT INTO `scoring` (`seed`, `1`, `2`, `3`, `4`, `5`, `6`, `type`) VALUES(16, 1, 1, 1, 1, 1, 1, 'odds');
INSERT INTO `scoring` (`seed`, `1`, `2`, `3`, `4`, `5`, `6`, `type`) VALUES(16, 1, 0.6, 0.5, 0.4, 0.3, 0.2, 'main');
INSERT INTO `scoring` (`seed`, `1`, `2`, `3`, `4`, `5`, `6`, `type`) VALUES(15, 1, 0.6, 0.5, 0.4, 0.3, 0.2, 'main');
INSERT INTO `scoring` (`seed`, `1`, `2`, `3`, `4`, `5`, `6`, `type`) VALUES(14, 1, 0.6, 0.5, 0.4, 0.3, 0.2, 'main');
INSERT INTO `scoring` (`seed`, `1`, `2`, `3`, `4`, `5`, `6`, `type`) VALUES(13, 1, 0.6, 0.5, 0.4, 0.3, 0.2, 'main');
INSERT INTO `scoring` (`seed`, `1`, `2`, `3`, `4`, `5`, `6`, `type`) VALUES(12, 1, 0.6, 0.5, 0.4, 0.3, 0.2, 'main');
INSERT INTO `scoring` (`seed`, `1`, `2`, `3`, `4`, `5`, `6`, `type`) VALUES(11, 1, 0.6, 0.5, 0.4, 0.3, 0.2, 'main');
INSERT INTO `scoring` (`seed`, `1`, `2`, `3`, `4`, `5`, `6`, `type`) VALUES(10, 1, 0.6, 0.5, 0.4, 0.3, 0.2, 'main');
INSERT INTO `scoring` (`seed`, `1`, `2`, `3`, `4`, `5`, `6`, `type`) VALUES(9, 1, 0.6, 0.5, 0.4, 0.3, 0.2, 'main');
INSERT INTO `scoring` (`seed`, `1`, `2`, `3`, `4`, `5`, `6`, `type`) VALUES(8, 1, 0.6, 0.5, 0.4, 0.3, 0.2, 'main');
INSERT INTO `scoring` (`seed`, `1`, `2`, `3`, `4`, `5`, `6`, `type`) VALUES(7, 1, 0.6, 0.5, 0.4, 0.3, 0.2, 'main');
INSERT INTO `scoring` (`seed`, `1`, `2`, `3`, `4`, `5`, `6`, `type`) VALUES(6, 1, 0.6, 0.5, 0.4, 0.3, 0.2, 'main');
INSERT INTO `scoring` (`seed`, `1`, `2`, `3`, `4`, `5`, `6`, `type`) VALUES(5, 1, 0.6, 0.5, 0.4, 0.3, 0.2, 'main');
INSERT INTO `scoring` (`seed`, `1`, `2`, `3`, `4`, `5`, `6`, `type`) VALUES(4, 1, 0.6, 0.5, 0.4, 0.3, 0.2, 'main');
INSERT INTO `scoring` (`seed`, `1`, `2`, `3`, `4`, `5`, `6`, `type`) VALUES(3, 1, 0.6, 0.5, 0.4, 0.3, 0.2, 'main');
INSERT INTO `scoring` (`seed`, `1`, `2`, `3`, `4`, `5`, `6`, `type`) VALUES(2, 1, 0.6, 0.5, 0.4, 0.3, 0.2, 'main');
INSERT INTO `scoring` (`seed`, `1`, `2`, `3`, `4`, `5`, `6`, `type`) VALUES(1, 1, 0.6, 0.5, 0.4, 0.3, 0.2, 'main');

-- --------------------------------------------------------

--
-- Table structure for table `scoring_info`
--

DROP TABLE IF EXISTS `scoring_info`;
CREATE TABLE IF NOT EXISTS `scoring_info` (
  `type` varchar(255) NOT NULL DEFAULT '',
  `display_name` varchar(255) DEFAULT NULL,
  `description` blob,
  PRIMARY KEY (`type`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `scoring_info`
--

INSERT INTO `scoring_info` (`type`, `display_name`, `description`) VALUES('espn', 'ESPN', 0x3c7461626c6520626f726465723d2731273e3c747220616c69676e3d2763656e746572273e3c746420636f6c7370616e3d2737273e4553504e3c2f74643e3c2f74723e3c747220616c69676e3d2763656e746572273e3c74643e53656564733c2f74643e3c746420636f6c7370616e3d2736273e526f756e64733c2f74643e3c2f74723e3c74723e3c74643e266e6273703b3c2f74643e3c74643e313c2f74643e3c74643e323c2f74643e3c74643e333c2f74643e3c74643e343c2f74643e3c74643e353c2f74643e3c74643e363c2f74643e3c2f74723e3c74723e3c74643e313c2f74643e3c74643e31303c2f74643e3c74643e32303c2f74643e3c74643e34303c2f74643e3c74643e38303c2f74643e3c74643e3132303c2f74643e3c74643e3136303c2f74643e3c74723e3c74723e3c74643e323c2f74643e3c74643e31303c2f74643e3c74643e32303c2f74643e3c74643e34303c2f74643e3c74643e38303c2f74643e3c74643e3132303c2f74643e3c74643e3136303c2f74643e3c74723e3c74723e3c74643e333c2f74643e3c74643e31303c2f74643e3c74643e32303c2f74643e3c74643e34303c2f74643e3c74643e38303c2f74643e3c74643e3132303c2f74643e3c74643e3136303c2f74643e3c74723e3c74723e3c74643e343c2f74643e3c74643e31303c2f74643e3c74643e32303c2f74643e3c74643e34303c2f74643e3c74643e38303c2f74643e3c74643e3132303c2f74643e3c74643e3136303c2f74643e3c74723e3c74723e3c74643e353c2f74643e3c74643e31303c2f74643e3c74643e32303c2f74643e3c74643e34303c2f74643e3c74643e38303c2f74643e3c74643e3132303c2f74643e3c74643e3136303c2f74643e3c74723e3c74723e3c74643e363c2f74643e3c74643e31303c2f74643e3c74643e32303c2f74643e3c74643e34303c2f74643e3c74643e38303c2f74643e3c74643e3132303c2f74643e3c74643e3136303c2f74643e3c74723e3c74723e3c74643e373c2f74643e3c74643e31303c2f74643e3c74643e32303c2f74643e3c74643e34303c2f74643e3c74643e38303c2f74643e3c74643e3132303c2f74643e3c74643e3136303c2f74643e3c74723e3c74723e3c74643e383c2f74643e3c74643e31303c2f74643e3c74643e32303c2f74643e3c74643e34303c2f74643e3c74643e38303c2f74643e3c74643e3132303c2f74643e3c74643e3136303c2f74643e3c74723e3c74723e3c74643e393c2f74643e3c74643e31303c2f74643e3c74643e32303c2f74643e3c74643e34303c2f74643e3c74643e38303c2f74643e3c74643e3132303c2f74643e3c74643e3136303c2f74643e3c74723e3c74723e3c74643e31303c2f74643e3c74643e31303c2f74643e3c74643e32303c2f74643e3c74643e34303c2f74643e3c74643e38303c2f74643e3c74643e3132303c2f74643e3c74643e3136303c2f74643e3c74723e3c74723e3c74643e31313c2f74643e3c74643e31303c2f74643e3c74643e32303c2f74643e3c74643e34303c2f74643e3c74643e38303c2f74643e3c74643e3132303c2f74643e3c74643e3136303c2f74643e3c74723e3c74723e3c74643e31323c2f74643e3c74643e31303c2f74643e3c74643e32303c2f74643e3c74643e34303c2f74643e3c74643e38303c2f74643e3c74643e3132303c2f74643e3c74643e3136303c2f74643e3c74723e3c74723e3c74643e31333c2f74643e3c74643e31303c2f74643e3c74643e32303c2f74643e3c74643e34303c2f74643e3c74643e38303c2f74643e3c74643e3132303c2f74643e3c74643e3136303c2f74643e3c74723e3c74723e3c74643e31343c2f74643e3c74643e31303c2f74643e3c74643e32303c2f74643e3c74643e34303c2f74643e3c74643e38303c2f74643e3c74643e3132303c2f74643e3c74643e3136303c2f74643e3c74723e3c74723e3c74643e31353c2f74643e3c74643e31303c2f74643e3c74643e32303c2f74643e3c74643e34303c2f74643e3c74643e38303c2f74643e3c74643e3132303c2f74643e3c74643e3136303c2f74643e3c74723e3c74723e3c74643e31363c2f74643e3c74643e31303c2f74643e3c74643e32303c2f74643e3c74643e34303c2f74643e3c74643e38303c2f74643e3c74643e3132303c2f74643e3c74643e3136303c2f74643e3c74723e3c2f7461626c653e);
INSERT INTO `scoring_info` (`type`, `display_name`, `description`) VALUES('geometric', 'Geometric', 0x3c7461626c6520626f726465723d2731273e3c747220616c69676e3d2763656e746572273e3c746420636f6c7370616e3d2737273e47656f6d65747269633c2f74643e3c2f74723e3c747220616c69676e3d2763656e746572273e3c74643e53656564733c2f74643e3c746420636f6c7370616e3d2736273e526f756e64733c2f74643e3c2f74723e3c74723e3c74643e266e6273703b3c2f74643e3c74643e313c2f74643e3c74643e323c2f74643e3c74643e333c2f74643e3c74643e343c2f74643e3c74643e353c2f74643e3c74643e363c2f74643e3c2f74723e3c74723e3c74643e313c2f74643e3c74643e313c2f74643e3c74643e323c2f74643e3c74643e343c2f74643e3c74643e383c2f74643e3c74643e31363c2f74643e3c74643e33323c2f74643e3c74723e3c74723e3c74643e323c2f74643e3c74643e313c2f74643e3c74643e323c2f74643e3c74643e343c2f74643e3c74643e383c2f74643e3c74643e31363c2f74643e3c74643e33323c2f74643e3c74723e3c74723e3c74643e333c2f74643e3c74643e313c2f74643e3c74643e323c2f74643e3c74643e343c2f74643e3c74643e383c2f74643e3c74643e31363c2f74643e3c74643e33323c2f74643e3c74723e3c74723e3c74643e343c2f74643e3c74643e313c2f74643e3c74643e323c2f74643e3c74643e343c2f74643e3c74643e383c2f74643e3c74643e31363c2f74643e3c74643e33323c2f74643e3c74723e3c74723e3c74643e353c2f74643e3c74643e313c2f74643e3c74643e323c2f74643e3c74643e343c2f74643e3c74643e383c2f74643e3c74643e31363c2f74643e3c74643e33323c2f74643e3c74723e3c74723e3c74643e363c2f74643e3c74643e313c2f74643e3c74643e323c2f74643e3c74643e343c2f74643e3c74643e383c2f74643e3c74643e31363c2f74643e3c74643e33323c2f74643e3c74723e3c74723e3c74643e373c2f74643e3c74643e313c2f74643e3c74643e323c2f74643e3c74643e343c2f74643e3c74643e383c2f74643e3c74643e31363c2f74643e3c74643e33323c2f74643e3c74723e3c74723e3c74643e383c2f74643e3c74643e313c2f74643e3c74643e323c2f74643e3c74643e343c2f74643e3c74643e383c2f74643e3c74643e31363c2f74643e3c74643e33323c2f74643e3c74723e3c74723e3c74643e393c2f74643e3c74643e313c2f74643e3c74643e323c2f74643e3c74643e343c2f74643e3c74643e383c2f74643e3c74643e31363c2f74643e3c74643e33323c2f74643e3c74723e3c74723e3c74643e31303c2f74643e3c74643e313c2f74643e3c74643e323c2f74643e3c74643e343c2f74643e3c74643e383c2f74643e3c74643e31363c2f74643e3c74643e33323c2f74643e3c74723e3c74723e3c74643e31313c2f74643e3c74643e313c2f74643e3c74643e323c2f74643e3c74643e343c2f74643e3c74643e383c2f74643e3c74643e31363c2f74643e3c74643e33323c2f74643e3c74723e3c74723e3c74643e31323c2f74643e3c74643e313c2f74643e3c74643e323c2f74643e3c74643e343c2f74643e3c74643e383c2f74643e3c74643e31363c2f74643e3c74643e33323c2f74643e3c74723e3c74723e3c74643e31333c2f74643e3c74643e313c2f74643e3c74643e323c2f74643e3c74643e343c2f74643e3c74643e383c2f74643e3c74643e31363c2f74643e3c74643e33323c2f74643e3c74723e3c74723e3c74643e31343c2f74643e3c74643e313c2f74643e3c74643e323c2f74643e3c74643e343c2f74643e3c74643e383c2f74643e3c74643e31363c2f74643e3c74643e33323c2f74643e3c74723e3c74723e3c74643e31353c2f74643e3c74643e313c2f74643e3c74643e323c2f74643e3c74643e343c2f74643e3c74643e383c2f74643e3c74643e31363c2f74643e3c74643e33323c2f74643e3c74723e3c74723e3c74643e31363c2f74643e3c74643e313c2f74643e3c74643e323c2f74643e3c74643e343c2f74643e3c74643e383c2f74643e3c74643e31363c2f74643e3c74643e33323c2f74643e3c74723e3c2f7461626c653e);
INSERT INTO `scoring_info` (`type`, `display_name`, `description`) VALUES('main', 'Actual', 0x3c7461626c6520626f726465723d27312720616c69676e3d2763656e746572273e3c74723e3c746420636f6c7370616e3d2738273e56616c7565206f6620612077696e2062792061207365656420696e206120706172746963756c617220726f756e643c2f74643e3c2f74723e3c74723e3c74643e5365656420233c2f74643e3c74643e52313c2f74643e3c74643e52323c2f74643e3c74643e52333c2f74643e3c74643e52343c2f74643e3c74643e52353c2f74643e3c74643e52363c2f74643e3c2f74723e3c74723e3c74643e313c2f74643e3c74643e313c2f74643e3c74643e302e363c2f74643e3c74643e302e353c2f74643e3c74643e302e343c2f74643e3c74643e302e333c2f74643e3c74643e302e323c2f74643e3c2f74723e3c74723e3c74643e323c2f74643e3c74643e313c2f74643e3c74643e302e363c2f74643e3c74643e302e353c2f74643e3c74643e302e343c2f74643e3c74643e302e333c2f74643e3c74643e302e323c2f74643e3c2f74723e3c74723e3c74643e333c2f74643e3c74643e313c2f74643e3c74643e302e363c2f74643e3c74643e302e353c2f74643e3c74643e302e343c2f74643e3c74643e302e333c2f74643e3c74643e302e323c2f74643e3c2f74723e3c74723e3c74643e343c2f74643e3c74643e313c2f74643e3c74643e302e363c2f74643e3c74643e302e353c2f74643e3c74643e302e343c2f74643e3c74643e302e333c2f74643e3c74643e302e323c2f74643e3c2f74723e3c74723e3c74643e353c2f74643e3c74643e313c2f74643e3c74643e302e363c2f74643e3c74643e302e353c2f74643e3c74643e302e343c2f74643e3c74643e302e333c2f74643e3c74643e302e323c2f74643e3c2f74723e3c74723e3c74643e363c2f74643e3c74643e313c2f74643e3c74643e302e363c2f74643e3c74643e302e353c2f74643e3c74643e302e343c2f74643e3c74643e302e333c2f74643e3c74643e302e323c2f74643e3c2f74723e3c74723e3c74643e373c2f74643e3c74643e313c2f74643e3c74643e302e363c2f74643e3c74643e302e353c2f74643e3c74643e302e343c2f74643e3c74643e302e333c2f74643e3c74643e302e323c2f74643e3c2f74723e3c74723e3c74643e383c2f74643e3c74643e313c2f74643e3c74643e302e363c2f74643e3c74643e302e353c2f74643e3c74643e302e343c2f74643e3c74643e302e333c2f74643e3c74643e302e323c2f74643e3c2f74723e3c74723e3c74643e393c2f74643e3c74643e313c2f74643e3c74643e302e363c2f74643e3c74643e302e353c2f74643e3c74643e302e343c2f74643e3c74643e302e333c2f74643e3c74643e302e323c2f74643e3c2f74723e3c74723e3c74643e31303c2f74643e3c74643e313c2f74643e3c74643e302e363c2f74643e3c74643e302e353c2f74643e3c74643e302e343c2f74643e3c74643e302e333c2f74643e3c74643e302e323c2f74643e3c2f74723e3c74723e3c74643e31313c2f74643e3c74643e313c2f74643e3c74643e302e363c2f74643e3c74643e302e353c2f74643e3c74643e302e343c2f74643e3c74643e302e333c2f74643e3c74643e302e323c2f74643e3c2f74723e3c74723e3c74643e31323c2f74643e3c74643e313c2f74643e3c74643e302e363c2f74643e3c74643e302e353c2f74643e3c74643e302e343c2f74643e3c74643e302e333c2f74643e3c74643e302e323c2f74643e3c2f74723e3c74723e3c74643e31333c2f74643e3c74643e313c2f74643e3c74643e302e363c2f74643e3c74643e302e353c2f74643e3c74643e302e343c2f74643e3c74643e302e333c2f74643e3c74643e302e323c2f74643e3c2f74723e3c74723e3c74643e31343c2f74643e3c74643e313c2f74643e3c74643e302e363c2f74643e3c74643e302e353c2f74643e3c74643e302e343c2f74643e3c74643e302e333c2f74643e3c74643e302e323c2f74643e3c2f74723e3c74723e3c74643e31353c2f74643e3c74643e313c2f74643e3c74643e302e363c2f74643e3c74643e302e353c2f74643e3c74643e302e343c2f74643e3c74643e302e333c2f74643e3c74643e302e323c2f74643e3c2f74723e3c74723e3c74643e31363c2f74643e3c74643e313c2f74643e3c74643e302e363c2f74643e3c74643e302e353c2f74643e3c74643e302e343c2f74643e3c74643e302e333c2f74643e3c74643e302e323c2f74643e3c2f74723e3c2f7461626c653e);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `userid` int(11) NOT NULL AUTO_INCREMENT,
  `useremail` varchar(50) NOT NULL DEFAULT '',
  `displayname` varchar(50) NOT NULL DEFAULT '',
  `password` varchar(50) NOT NULL DEFAULT '',
  `userlevel` int(11) NOT NULL DEFAULT '0',
  `paid` int(1) NOT NULL DEFAULT '0' COMMENT '0 = no, 1 = yes',
  `supportedcharity` varchar(100) NOT NULL DEFAULT '',
  PRIMARY KEY (`userid`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

alter table users add (`amtpaid` int(11) NOT NULL DEFAULT 0);

alter table users add (
    address_state varchar(20) NOT NULL DEFAULT '',
    payment_date DATETIME NULL,
    payment_gross DECIMAL(19,4) NOT NULL DEFAULT 0.00,
    first_name VARCHAR(25) NOT NULL DEFAULT '',
    last_name VARCHAR(25) NOT NULL DEFAULT ''
);

alter table users add (`resetpwdnextlogon` INT(1) NOT NULL DEFAULT '0' COMMENT '1 means pwd has been generated and needs to be reset by user at next logon' );



--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userid`, `useremail`, `displayname`, `password`, `userlevel`, `paid`, `supportedcharity`) VALUES(1, 'jweldin@jweldin.com', 'jweldin', '098f6bcd4621d373cade4e832627b4f6', 1, 0, '');
