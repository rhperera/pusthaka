-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 11, 2015 at 07:40 PM
-- Server version: 5.5.24-log
-- PHP Version: 5.3.13

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `digital-library`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `p2`()
    DETERMINISTIC
BEGIN
SELECT 'Hello World';
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(20) DEFAULT NULL,
  UNIQUE KEY `category_id` (`category_id`),
  UNIQUE KEY `category_name` (`category_name`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`category_id`, `category_name`) VALUES
(2, 'Computer Science'),
(0, 'Hardware'),
(3, 'Networks'),
(5, 'Programming '),
(1, 'Stories'),
(4, 'Web Development');

-- --------------------------------------------------------

--
-- Table structure for table `materials`
--

CREATE TABLE IF NOT EXISTS `materials` (
  `material_id` int(11) NOT NULL AUTO_INCREMENT,
  `ISBN` varchar(15) NOT NULL,
  `name` varchar(30) DEFAULT NULL,
  `author` varchar(30) DEFAULT NULL,
  `uploader_id` int(11) NOT NULL,
  `upload_date` date DEFAULT NULL,
  `path` varchar(100) DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `description` text,
  `tags` varchar(100) DEFAULT NULL,
  `privacy` int(1) NOT NULL,
  PRIMARY KEY (`material_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

-- --------------------------------------------------------

--
-- Table structure for table `material_category`
--

CREATE TABLE IF NOT EXISTS `material_category` (
  `material_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  KEY `fk_category_id` (`category_id`),
  KEY `fk_material_id` (`material_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(10) DEFAULT NULL,
  `email` varchar(25) DEFAULT NULL,
  `password` varchar(30) DEFAULT NULL,
  `user_type` enum('admin','librarian','user') DEFAULT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `email`, `password`, `user_type`) VALUES
(1, 'admin', 'admin@mail.com', 'admin', 'admin'),
(2, 'user', 'user@user.com', 'user', 'user'),
(3, 'librarian', 'librarian@librarian.com', 'librarian', 'librarian'),
(4, 'user1', 'user1', 'user1', 'user');

-- --------------------------------------------------------

--
-- Table structure for table `view_results`
--

CREATE TABLE IF NOT EXISTS `view_results` (
  `user_id` int(11) DEFAULT NULL,
  `material_id` int(11) DEFAULT NULL,
  KEY `user_id` (`user_id`),
  KEY `material_id` (`material_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `material_category`
--
ALTER TABLE `material_category`
  ADD CONSTRAINT `fk_category_id` FOREIGN KEY (`category_id`) REFERENCES `categories` (`category_id`),
  ADD CONSTRAINT `fk_material_id` FOREIGN KEY (`material_id`) REFERENCES `materials` (`material_id`) ON DELETE CASCADE;

--
-- Constraints for table `view_results`
--
ALTER TABLE `view_results`
  ADD CONSTRAINT `view_results_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `view_results_ibfk_2` FOREIGN KEY (`material_id`) REFERENCES `materials` (`material_id`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
