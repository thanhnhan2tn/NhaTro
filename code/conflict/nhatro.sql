-- phpMyAdmin SQL Dump
-- version 4.1.6
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 26, 2014 at 01:49 PM
-- Server version: 5.6.16
-- PHP Version: 5.5.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `nhatro`
--

-- --------------------------------------------------------

--
-- Table structure for table `duong`
--

CREATE TABLE IF NOT EXISTS `duong` (
  `duong_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `duong_name` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`duong_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Dumping data for table `duong`
--

INSERT INTO `duong` (`duong_id`, `duong_name`) VALUES
(1, 'vidu'),
(2, 'vidu2');

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE IF NOT EXISTS `groups` (
  `group_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `group_name` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `group_detail` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`group_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `nhatro`
--

CREATE TABLE IF NOT EXISTS `nhatro` (
  `nhatro_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `duong_id` int(10) unsigned NOT NULL,
  `phuong_id` int(10) unsigned NOT NULL,
  `phuong_quan_id` int(10) unsigned NOT NULL,
  `users_user_id` int(10) unsigned NOT NULL,
  `nhatro_name` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nhatro_mota` varchar(2000) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nhatro_sdt` int(20) unsigned DEFAULT NULL,
  `nhatro_diachi` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nhatro_gia` int(10) unsigned DEFAULT NULL,
  `nhatro_trangthai` int(1) DEFAULT NULL,
  `nhatro_soluong` int(3) DEFAULT NULL,
  PRIMARY KEY (`nhatro_id`,`duong_id`,`phuong_id`,`phuong_quan_id`,`users_user_id`),
  KEY `nhatro_FKIndex1` (`duong_id`),
  KEY `nhatro_FKIndex2` (`phuong_id`,`phuong_quan_id`),
  KEY `nhatro_FKIndex3` (`users_user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `phuong`
--

CREATE TABLE IF NOT EXISTS `phuong` (
  `phuong_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `quan_id` int(10) unsigned NOT NULL,
  `phuong_name` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`phuong_id`,`quan_id`),
  KEY `phuong_FKIndex1` (`quan_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `quan`
--

CREATE TABLE IF NOT EXISTS `quan` (
  `quan_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `quan_name` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`quan_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_name` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `user_pass` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `user_email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `group_id` int(1) unsigned NOT NULL DEFAULT '1',
  `user_fullname` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `user_sdt` int(20) unsigned DEFAULT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `users_has_groups`
--

CREATE TABLE IF NOT EXISTS `users_has_groups` (
  `users_user_id` int(10) unsigned NOT NULL,
  `groups_group_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`users_user_id`,`groups_group_id`),
  KEY `users_has_groups_FKIndex1` (`users_user_id`),
  KEY `users_has_groups_FKIndex2` (`groups_group_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
