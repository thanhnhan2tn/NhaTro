-- phpMyAdmin SQL Dump
-- version 4.1.6
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 10, 2014 at 05:14 PM
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
-- Table structure for table `nhatro`
--

CREATE TABLE IF NOT EXISTS `nhatro` (
  `nhatro_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `phuong_id` int(11) unsigned NOT NULL,
  `user_id` int(11) unsigned NOT NULL,
  `nhatro_name` varchar(100) DEFAULT NULL,
  `nhatro_type` tinyint(1) NOT NULL COMMENT '1: cho thue, 2: share phong, 3 : bán',
  `nhatro_dacdiem` varchar(100) DEFAULT NULL,
  `nhatro_mota` varchar(2000) DEFAULT NULL,
  `nhatro_sdt` int(11) unsigned DEFAULT NULL,
  `nhatro_diachi` varchar(100) DEFAULT NULL,
  `nhatro_gia` int(11) unsigned DEFAULT NULL,
  `nhatro_trangthai` int(1) DEFAULT NULL COMMENT '1: con phong, 0: het phong',
  `nhatro_soluong` int(1) DEFAULT NULL,
  PRIMARY KEY (`nhatro_id`,`phuong_id`,`user_id`),
  KEY `nhatro_FKIndex2` (`phuong_id`),
  KEY `nhatro_FKIndex3` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 PACK_KEYS=0 AUTO_INCREMENT=34 ;

--
-- Dumping data for table `nhatro`
--

INSERT INTO `nhatro` (`nhatro_id`, `phuong_id`, `user_id`, `nhatro_name`, `nhatro_type`, `nhatro_dacdiem`, `nhatro_mota`, `nhatro_sdt`, `nhatro_diachi`, `nhatro_gia`, `nhatro_trangthai`, `nhatro_soluong`) VALUES
(1, 1, 2, 'Nhà trọ số 11', 0, NULL, 'mô tả 123', 909999000, 'so 1', 1900000, 1, 10),
(2, 1, 2, 'Nhà trọ số 12', 0, NULL, 'mô tcdcdcả 123', 909999000, 'so 1', 1900000, 1, 10),
(3, 1, 2, 'Nhà trọ fdf', 0, NULL, 'mô tcdcdcả 123', 909999000, 'so 1', 1900000, 1, 10),
(4, 1, 2, 'Nhà trọ fdf', 0, NULL, 'mô tcdcdcả 123', 909999000, 'so 1', 1900000, 1, 10),
(5, 1, 2, 'Nhà trọ fdf', 0, NULL, 'mô tcdcdcả 123', 909999000, 'so 1', 1900000, 1, 10),
(6, 1, 2, 'Nhà trọ fdf', 0, NULL, 'mô tcdcdcả 123', 909999000, 'so 1', 1900000, 1, 10),
(7, 1, 2, 'Nhà trọ fdf', 0, NULL, 'mô tcdcdcả 123', 909999000, 'so 1', 1900000, 1, 10),
(8, 1, 2, 'Nhà trọ fdf', 0, NULL, 'mô tcdcdcả 123', 909999000, 'so 1', 1900000, 1, 10),
(9, 1, 2, 'Nhà trọ fdf', 0, NULL, 'mô tcdcdcả 123', 909999000, 'so 1', 1900000, 1, 10),
(10, 1, 2, 'Nhà trọ fdf', 0, NULL, 'mô tcdcdcả 123', 909999000, 'so 1', 1900000, 1, 10),
(11, 1, 2, 'Nhà trọ fdf', 0, NULL, 'mô tcdcdcả 123', 909999000, 'so 1', 1900000, 1, 10),
(12, 1, 2, 'Nhà trọ fdf', 0, NULL, 'mô tcdcdcả 123', 909999000, 'so 1', 1900000, 1, 10),
(13, 1, 2, 'Nhà trọ fdf', 0, NULL, 'mô tcdcdcả 123', 909999000, 'so 1', 1900000, 1, 10),
(14, 1, 2, 'Nhà trọ fdf', 0, NULL, 'mô tcdcdcả 123', 909999000, 'so 1', 1900000, 1, 10),
(15, 1, 2, 'Nhà trọ fdf', 0, NULL, 'mô tcdcdcả 123', 909999000, 'so 1', 1900000, 1, 10),
(16, 1, 2, 'Nhà trọ fdf', 0, NULL, 'mô tcdcdcả 123', 909999000, 'so 1', 1900000, 1, 10),
(17, 1, 2, 'Nhà trọ fdf', 0, NULL, 'mô tcdcdcả 123', 909999000, 'so 1', 1900000, 1, 10),
(18, 1, 2, 'Nhà trọ fdf', 0, NULL, 'mô tcdcdcả 123', 909999000, 'so 1', 1900000, 1, 10),
(19, 1, 2, 'Nhà trọ fdf', 0, NULL, 'mô tcdcdcả 123', 909999000, 'so 1', 1900000, 1, 10),
(20, 1, 2, 'Nhà trọ fdf', 0, NULL, 'mô tcdcdcả 123', 909999000, 'so 1', 1900000, 1, 10),
(21, 1, 2, 'Nhà trọ fdf', 0, NULL, 'mô tcdcdcả 123', 909999000, 'so 1', 1900000, 1, 10),
(22, 1, 2, 'Nhà trọ fdf', 0, NULL, 'mô tcdcdcả 123', 909999000, 'so 1', 1900000, 1, 10),
(23, 1, 2, 'Nhà trọ fdf', 0, NULL, 'mô tcdcdcả 123', 909999000, 'so 1', 1900000, 1, 10),
(24, 1, 2, 'Nhà trọ fdf', 0, NULL, 'mô tcdcdcả 123', 909999000, 'so 1', 1900000, 1, 10),
(25, 1, 2, 'Nhà trọ fdf', 0, NULL, 'mô tcdcdcả 123', 909999000, 'so 1', 1900000, 1, 10),
(26, 1, 2, 'Nhà trọ fdf', 0, NULL, 'mô tcdcdcả 123', 909999000, 'so 1', 1900000, 1, 10),
(27, 1, 2, 'Nhà trọ fdf', 0, NULL, 'mô tcdcdcả 123', 909999000, 'so 1', 1900000, 1, 10),
(28, 1, 2, 'Nhà trọ fdf', 0, NULL, 'mô tcdcdcả 123', 909999000, 'so 1', 1900000, 1, 10),
(29, 1, 2, 'Nhà trọ fdf', 0, NULL, 'mô tcdcdcả 123', 909999000, 'so 1', 1900000, 1, 10),
(30, 1, 2, 'Nhà trọ fdf', 0, NULL, 'mô tcdcdcả 123', 909999000, 'so 1', 1900000, 1, 10),
(31, 1, 2, 'Nhà trọ fdf', 0, NULL, 'mô tcdcdcả 123', 909999000, 'so 1', 1900000, 1, 10),
(32, 1, 2, 'Nhà trọ fdf', 0, NULL, 'mô tcdcdcả 123', 909999000, 'so 1', 1900000, 1, 10),
(33, 1, 2, 'Nhà trọ fdf', 0, NULL, 'mô tcdcdcả 123', 909999000, 'so 1', 1900000, 1, 10);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
