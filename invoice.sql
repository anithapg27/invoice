-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Sep 20, 2021 at 07:24 PM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `invoice`
--

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
CREATE TABLE IF NOT EXISTS `orders` (
  `idOrder` bigint(20) NOT NULL AUTO_INCREMENT,
  `ordeDate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `customerName` varchar(250) NOT NULL,
  `customerAddress` longtext NOT NULL,
  `totalTax` decimal(15,2) NOT NULL,
  `subtotalWithoutTax` decimal(10,2) NOT NULL,
  `subtotalWithTax` decimal(10,2) NOT NULL,
  `discountType` varchar(50) NOT NULL,
  `discount` decimal(15,2) NOT NULL DEFAULT 0.00,
  `totalAmount` decimal(15,2) NOT NULL,
  PRIMARY KEY (`idOrder`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`idOrder`, `ordeDate`, `customerName`, `customerAddress`, `totalTax`, `subtotalWithoutTax`, `subtotalWithTax`, `discountType`, `discount`, `totalAmount`) VALUES
(1, '2021-09-20 13:58:17', 'Annet John', 'Rose VIlla\r\nBanglore', '7800.00', '86000.00', '93800.00', 'amount', '1000.00', '92800.00');

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

DROP TABLE IF EXISTS `order_items`;
CREATE TABLE IF NOT EXISTS `order_items` (
  `orderItemId` bigint(20) NOT NULL AUTO_INCREMENT,
  `idOrder` bigint(20) NOT NULL,
  `itemName` varchar(250) NOT NULL,
  `itemQuantity` bigint(20) NOT NULL,
  `itemPrice` decimal(15,2) NOT NULL,
  `tax` int(11) NOT NULL,
  `totalAmount` decimal(15,2) NOT NULL,
  PRIMARY KEY (`orderItemId`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`orderItemId`, `idOrder`, `itemName`, `itemQuantity`, `itemPrice`, `tax`, `totalAmount`) VALUES
(1, 1, 'Mobile', 1, '16000.00', 5, '16800.00'),
(2, 1, 'Laptop', 1, '70000.00', 10, '77000.00');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
