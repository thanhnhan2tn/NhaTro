-- phpMyAdmin SQL Dump
-- version 4.1.6
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 14, 2014 at 02:46 PM
-- Server version: 5.6.16
-- PHP Version: 5.5.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `csdl_n8`
--

-- --------------------------------------------------------

--
-- Table structure for table `quan`
--

CREATE TABLE IF NOT EXISTS `quan` (
  `quan_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `quan_name` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`quan_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 PACK_KEYS=0 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `quan`
--

INSERT INTO `quan` (`quan_id`, `quan_name`) VALUES
(1, 'Ninh Kiều'),
(2, 'Bình Thủy'),
(3, 'Cái Răng'),
(4, 'Ô Môn'),
(5, 'Thốt Nốt'),
(6, 'Phong Điền'),
(7, 'Cờ Đỏ'),
(8, 'Thới Lai'),
(9, 'Vĩnh Thạnh');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
