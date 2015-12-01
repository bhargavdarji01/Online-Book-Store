-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 09, 2014 at 07:00 PM
-- Server version: 5.6.12-log
-- PHP Version: 5.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `onlinebook`
--
CREATE DATABASE IF NOT EXISTS `onlinebook` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `onlinebook`;

-- --------------------------------------------------------

--
-- Table structure for table `invoice`
--

CREATE TABLE IF NOT EXISTS `invoice` (
  `invoice_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `total` double NOT NULL,
  `payment` smallint(6) NOT NULL,
  `date` datetime NOT NULL,
  PRIMARY KEY (`invoice_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `invoice`
--

INSERT INTO `invoice` (`invoice_id`, `user_id`, `total`, `payment`, `date`) VALUES
(1, 7, 46.48, 1, '2014-04-07 07:00:01'),
(2, 7, 185.92, 1, '2014-04-07 07:09:12'),
(3, 7, 23.24, 1, '2014-04-07 07:09:38'),
(4, 7, 46.48, 1, '2014-04-07 13:37:00'),
(5, 7, 53.47, 1, '2014-04-07 18:13:18'),
(6, 7, 26.3, 1, '2014-04-08 23:11:41'),
(7, 7, 199.9, 1, '2014-04-09 00:16:35'),
(8, 7, 23.24, 1, '2014-04-09 00:27:59'),
(9, 7, 116.99, 1, '2014-04-09 00:59:19'),
(10, 7, 83.7, 1, '2014-04-09 18:53:29');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE IF NOT EXISTS `orders` (
  `order_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `date` datetime NOT NULL,
  PRIMARY KEY (`order_id`),
  KEY `user_id` (`user_id`),
  KEY `product_id` (`product_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=26 ;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `user_id`, `product_id`, `quantity`, `date`) VALUES
(10, 7, 1, 5, '2014-04-07 07:00:00'),
(11, 7, 2, 1, '2014-04-07 07:00:00'),
(12, 7, 4, 1, '2014-04-07 07:00:00'),
(13, 7, 1, 8, '2014-04-07 07:09:12'),
(14, 7, 1, 1, '2014-04-07 07:09:38'),
(15, 7, 1, 2, '2014-04-07 13:36:59'),
(16, 7, 1, 1, '2014-04-07 18:13:18'),
(17, 7, 2, 1, '2014-04-07 18:13:18'),
(18, 7, 3, 1, '2014-04-08 23:11:41'),
(19, 7, 1, 6, '2014-04-09 00:16:34'),
(20, 7, 2, 2, '2014-04-09 00:16:34'),
(21, 7, 1, 1, '2014-04-09 00:27:59'),
(22, 7, 2, 3, '2014-04-09 00:59:18'),
(23, 7, 3, 1, '2014-04-09 00:59:18'),
(24, 7, 1, 1, '2014-04-09 18:53:29'),
(25, 7, 2, 2, '2014-04-09 18:53:29');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE IF NOT EXISTS `product` (
  `product_id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(60) NOT NULL,
  `author` varchar(60) NOT NULL,
  `year` varchar(30) NOT NULL,
  `unit_price` double NOT NULL,
  `image` varchar(30) NOT NULL,
  PRIMARY KEY (`product_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `title`, `author`, `year`, `unit_price`, `image`) VALUES
(1, 'PHP: A BEGINNER''S GUIDE', 'Vikram Vaswani ', '2008', 23.24, 'php_beg.jpg'),
(2, 'Head First PHP & MySQL', 'Lynn Beighley and Michael Morrison', '2014', 30.23, 'head_first.jpg'),
(3, 'Learning PHP, MySQL, JavaScript, and CSS: A Step-by-Step', 'Robin Nixon', '2012', 26.3, 'mysql_php.jpg'),
(4, 'PHP for the Web: Visual QuickStart Guide (4th Edition)', 'Larry Ullman', '2011', 26.44, 'php_for_web.jpg'),
(5, 'PHP: The Good Parts', 'Peter MacIntyre', '2010', 19.75, 'php_good_parts.jpg'),
(6, 'PHP 5', 'Mike McGrath', '2004', 33.85, 'php5.jpg'),
(7, 'Pro PHP XML and Web Services (Books for Professionals)', ' Robert Richards ', '2006', 57.58, 'pro_xml.jpg'),
(8, 'PHP and MySQL for Dynamic Web Sites', 'Larry Ullman', '2011', 29.46, 'dynamic.jpg'),
(9, 'Building PHP Applications with Symfony', ' Bartosz Porebski, Karol Przystalski and Leszek Nowak', '2011', 27, 'symphony.jpg'),
(10, 'Web Application Development with Yii and PHP', 'Jeff Winesett', '2012', 44.57, 'yii.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(40) NOT NULL,
  `last_name` varchar(40) NOT NULL,
  `address` text NOT NULL,
  `email` varchar(100) NOT NULL,
  PRIMARY KEY (`Id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`Id`, `first_name`, `last_name`, `address`, `email`) VALUES
(3, 'Vishal', 'Joshi', '125parkway forest drive, Toronto , M2j1l9, ON, canada', 'vishal.joshi.021@gmail.com'),
(4, 'Vishal', 'Joshi', '125 Parkway Forest Drive, Unit 305, Toronto, ON, M2J1L9, Canada', 'abc@gmail.com'),
(5, 'Mark', 'Nelson', '7844 Broadway avenue, Calgery, AB, Canada', 'mark.021@gmail.com'),
(6, 'Jack', 'Lawson', '145 avebnu', 'jack@gmail.com'),
(7, 'Mike', 'Ross', '45 Etobicko, CA', 'mike.021@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `user_login`
--

CREATE TABLE IF NOT EXISTS `user_login` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(40) NOT NULL,
  `password` varchar(32) NOT NULL,
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_login`
--

INSERT INTO `user_login` (`user_id`, `user_name`, `password`) VALUES
(3, 'Vishal21', 'd41d8cd98f00b204e9800998ecf8427e'),
(4, 'Vishal021', 'd41d8cd98f00b204e9800998ecf8427e'),
(5, 'Yourvish', 'd41d8cd98f00b204e9800998ecf8427e'),
(6, 'Jack21', 'd41d8cd98f00b204e9800998ecf8427e'),
(7, 'Mike', '18126e7bd3f84b3f3e4df094def5b7de');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`Id`),
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `product` (`product_id`);

--
-- Constraints for table `user_login`
--
ALTER TABLE `user_login`
  ADD CONSTRAINT `user_login_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`Id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
