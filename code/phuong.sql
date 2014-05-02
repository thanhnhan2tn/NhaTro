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
-- Table structure for table `phuong`
--

CREATE TABLE IF NOT EXISTS `phuong` (
  `phuong_id` tinyint(3) unsigned NOT NULL AUTO_INCREMENT,
  `quan_id` int(11) unsigned NOT NULL,
  `phuong_name` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`phuong_id`),
  KEY `fk_phuong_quan1_idx` (`quan_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 PACK_KEYS=0 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `phuong`
--

INSERT INTO `phuong` (`phuong_id`, `quan_id`, `phuong_name`) VALUES
(1, 1, 'An Hội'),
(2, 1, 'An Khánh'),
(3, 1, 'An Lạc'),
(4, 1, 'An Nghiệp '),
(5, 1, 'An Phú'),
(6, 1, 'Cái Khế'),
(7, 1, 'An Bình'),
(8, 1, 'An Cư'),
(9, 1, 'An Hòa'),
(10, 1, 'Hưng Lợi'),
(11, 1, 'Tân An '),
(12, 1, 'Thới Bình'),
(13, 1, 'Xuân Khánh');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `phuong`
--
ALTER TABLE `phuong`
  ADD CONSTRAINT `fk_phuong_quan1` FOREIGN KEY (`quan_id`) REFERENCES `quan` (`quan_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
