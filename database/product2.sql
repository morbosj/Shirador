-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 03, 2017 at 04:52 PM
-- Server version: 10.1.24-MariaDB
-- PHP Version: 7.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sde`
--

-- --------------------------------------------------------

--
-- Table structure for table `product2`
--

CREATE TABLE `product2` (
  `id_product` int(11) NOT NULL,
  `product_code` int(25) NOT NULL,
  `product_name` varchar(50) NOT NULL,
  `brand` varchar(50) NOT NULL,
  `category` varchar(50) NOT NULL,
  `quantity` int(20) NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product2`
--

INSERT INTO `product2` (`id_product`, `product_code`, `product_name`, `brand`, `category`, `quantity`, `status`) VALUES
(69, 1002, 'Symmetry BW', '   Michelin', 'Tires', 10, 'Available'),
(70, 1003, 'Harmony BW', ' Michelin', 'Tires', 10, 'Available'),
(72, 1006, 'H714 Sport IV BW', 'Hanko', 'Tires', 10, 'Available'),
(74, 1005, 'Performance A15 WW', 'Tacom', 'Tires', 10, 'Available'),
(75, 1006, 'Touring LE WW', 'Tacom', 'Tires', 10, 'Available'),
(76, 1007, 'LL Touring SLE BW', 'Coopr', 'Tires', 10, 'Available'),
(77, 1008, 'FR13-7', 'TCM', 'Klift', 10, 'Available'),
(78, 1008, 'FD2516', 'TCM', 'Klift', 10, 'Available'),
(79, 1009, 'FD30T7', 'TCM', 'Klift', 10, 'Available'),
(80, 10010, 'FB13L-II', 'Komatsu', 'Klift', 10, 'Available'),
(81, 1001, 'Energy Lx4 BW', 'Michelin', 'Tires', 10, 'Available'),
(82, 1011, 'Subversible Dewatering Pump', 'Myers', 'Pumps', 5, 'Available'),
(83, 10012, 'Sewage Pumps', 'Myers', 'Pumps', 2, 'Available'),
(84, 10013, 'Deep Well Pump', 'Myers', 'Pumps', 2, 'Available'),
(85, 10014, 'Sump Pump', 'Myers', 'Pumps', 1, 'Not Available'),
(86, 10015, 'Jack Pump', 'Myers', 'Pumps', 1, 'Available'),
(87, 10016, 'Swimming Pool Pump', 'SAER', 'Pumps', 1, 'Available'),
(88, 10017, 'Irrigation Industrial Pump', 'Robin', 'Pumps', 1, 'Available');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `product2`
--
ALTER TABLE `product2`
  ADD PRIMARY KEY (`id_product`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `product2`
--
ALTER TABLE `product2`
  MODIFY `id_product` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=89;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
