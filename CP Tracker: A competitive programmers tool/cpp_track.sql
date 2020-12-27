-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Dec 27, 2020 at 10:15 PM
-- Server version: 5.7.26
-- PHP Version: 7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cpp_track`
--

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

DROP TABLE IF EXISTS `order`;
CREATE TABLE IF NOT EXISTS `order` (
  `orderid` varchar(50) NOT NULL,
  `category` varchar(50) NOT NULL,
  `quantity` varchar(50) NOT NULL,
  `price` varchar(50) NOT NULL,
  `Buyer` varchar(50) NOT NULL,
  `productid` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `problems`
--

DROP TABLE IF EXISTS `problems`;
CREATE TABLE IF NOT EXISTS `problems` (
  `pid` int(32) UNSIGNED NOT NULL AUTO_INCREMENT,
  `pname` varchar(50) NOT NULL,
  `oj` varchar(50) NOT NULL,
  `link` varchar(50) NOT NULL,
  `difficulty` varchar(30) NOT NULL,
  PRIMARY KEY (`pid`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `id` int(50) UNSIGNED NOT NULL,
  `CompanyName` varchar(50) NOT NULL,
  `Category` varchar(50) NOT NULL,
  `type_product` varchar(100) NOT NULL,
  `Description` varchar(256) NOT NULL,
  `Phone` varchar(50) NOT NULL,
  `Prcie` double NOT NULL,
  `ImageName` varchar(50) NOT NULL,
  `image` longblob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `submission`
--

DROP TABLE IF EXISTS `submission`;
CREATE TABLE IF NOT EXISTS `submission` (
  `subid` int(64) UNSIGNED NOT NULL AUTO_INCREMENT,
  `pid` int(32) NOT NULL,
  `id` varchar(32) NOT NULL,
  `tim` datetime NOT NULL,
  PRIMARY KEY (`subid`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(6) UNSIGNED NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user_data`
--

DROP TABLE IF EXISTS `user_data`;
CREATE TABLE IF NOT EXISTS `user_data` (
  `id` int(32) UNSIGNED NOT NULL AUTO_INCREMENT,
  `firstname` varchar(30) NOT NULL,
  `lasttname` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phn` varchar(30) NOT NULL,
  `passwords` varchar(30) NOT NULL,
  `codeforce` varchar(30) NOT NULL,
  `codechef` varchar(30) NOT NULL,
  `institute` varchar(100) NOT NULL,
  `dept` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_data`
--

INSERT INTO `user_data` (`id`, `firstname`, `lasttname`, `email`, `phn`, `passwords`, `codeforce`, `codechef`, `institute`, `dept`) VALUES
(7, 'Sabbir', 'Ahmed ', 'sas114507@gmail.com', '+8801941378013', '1234', '10_01', '10_01', 'Jahangirnagar University', 'Information Technology (IT)'),
(6, 'Md. Farhad', ' Hossain ', 'farhadiitju@gmail.com', '01521499777', 'haha', 'redblackpanda', 'frdhsn', 'Jahangirnagar University', 'Information Technology (IT)');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
