-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Sep 04, 2024 at 11:00 AM
-- Server version: 5.7.36
-- PHP Version: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `car_rental`
--

-- --------------------------------------------------------

--
-- Table structure for table `agencies`
--

DROP TABLE IF EXISTS `agencies`;
CREATE TABLE IF NOT EXISTS `agencies` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `agency_name` varchar(100) NOT NULL,
  `contact_person` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `passwords` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `agencies`
--

INSERT INTO `agencies` (`id`, `agency_name`, `contact_person`, `email`, `phone`, `passwords`) VALUES
(1, 'Kasid', 'Kingpin', 'kasid@dfg.com', '8299533795', '$2y$10$0BwpV2nTdNOtYsShWCcjBOHKsQPh8c1bt7BQCeEi.3vIOUUSagQna'),
(9, 'DLF Cars', 'Kasid Shakeel', 'kasid@asd.com', '12345678', '$2y$10$VwRK83DqsYq0wT6yeYQBe.CO12gXwkwkeCbnecRyELEZazMwDUpxu');

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

DROP TABLE IF EXISTS `booking`;
CREATE TABLE IF NOT EXISTS `booking` (
  `booking_id` int(11) NOT NULL AUTO_INCREMENT,
  `customer_id` int(11) NOT NULL,
  `customer_name` varchar(45) NOT NULL,
  `customer_email` varchar(45) NOT NULL,
  `customer_phone` int(110) NOT NULL,
  `agency_name` varchar(45) NOT NULL,
  `contact_person` varchar(45) NOT NULL,
  `images` longblob NOT NULL,
  `car_name` varchar(45) NOT NULL,
  `car_number` varchar(45) NOT NULL,
  `seats` int(11) NOT NULL,
  `cost` double(10,2) NOT NULL,
  `duration` varchar(45) NOT NULL,
  `descr` varchar(200) NOT NULL,
  PRIMARY KEY (`booking_id`),
  UNIQUE KEY `car_number` (`car_number`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`booking_id`, `customer_id`, `customer_name`, `customer_email`, `customer_phone`, `agency_name`, `contact_person`, `images`, `car_name`, `car_number`, `seats`, `cost`, `duration`, `descr`) VALUES
(1, 3, 'Kasid Shakeel', 'kasid@dfg.com', 829955, 'Kasid', '', '', 'Toyota Corolla', 'ABC123', 5, 60.00, '12-months', 'Some quick example text to build on the card title and make up the bulk of the cards content 1.'),
(4, 4, 'Mohd Zafar', 'zafar@dfg.cm', 1234567890, 'Kasid', 'Kingpin', 0x466f72642d4d757374616e672e6a7067, 'Ford Mustang                        ', 'LMN456', 2, 75.00, '3 Months', 'Some quick example text to build on the card title and make up the bulk of the card\'s content 3.');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

DROP TABLE IF EXISTS `customers`;
CREATE TABLE IF NOT EXISTS `customers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `full_name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `passwords` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `full_name`, `email`, `phone`, `passwords`) VALUES
(3, 'Kasid Shakeel', 'kasid@dfg.com', '8299533795', '$2y$10$fTk.FhDBkjfY.VkQ7QtVM.fq5sTMKyuA1fnIldxjeE3/yTUighwQO'),
(4, 'Mohd Zafar', 'zafar@dfg.com', '123456', '$2y$10$jtg/RyGh6yzfspbabYkhweCCErrLZN6Q4eQ6kOyToyGXBqkQV6aU6');

-- --------------------------------------------------------

--
-- Table structure for table `vehicles`
--

DROP TABLE IF EXISTS `vehicles`;
CREATE TABLE IF NOT EXISTS `vehicles` (
  `VehicleID` int(11) NOT NULL AUTO_INCREMENT,
  `VehicleModel` varchar(255) NOT NULL,
  `VehicleNumber` varchar(20) NOT NULL,
  `SeatingCapacity` int(11) NOT NULL,
  `RentPerDay` double(10,2) NOT NULL,
  `images` longblob NOT NULL,
  `book` tinyint(1) NOT NULL,
  `descr` varchar(200) NOT NULL,
  `agency` int(11) NOT NULL,
  PRIMARY KEY (`VehicleID`),
  UNIQUE KEY `VehicleNumber` (`VehicleNumber`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vehicles`
--

INSERT INTO `vehicles` (`VehicleID`, `VehicleModel`, `VehicleNumber`, `SeatingCapacity`, `RentPerDay`, `images`, `book`, `descr`, `agency`) VALUES
(1, 'Toyota Corolla', 'ABC123', 5, 60.00, 0x746f796f74612d636f726f6c6c612e6a7067, 1, 'Some quick example text to build on the card title and make up the bulk of the card\'s content 1.', 1),
(2, 'Honda Civic', 'XYZ789', 4, 45.00, 0x686f6e64612d63697669632e6a7067, 0, 'Some quick example text to build on the card title and make up the bulk of the card\'s content 2.', 1),
(3, 'Ford Mustang', 'LMN456', 2, 75.00, 0x466f72642d4d757374616e672e6a7067, 1, 'Some quick example text to build on the card title and make up the bulk of the card\'s content 3.', 1),
(6, 'Toyota Corolla New', 'UP32 HF23232', 4, 30.00, 0x746f796f74612d636f726f6c6c612e6a7067, 0, 'Some quick example text to build on the card title and make up the bulk of the card\'s content New.', 9);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
