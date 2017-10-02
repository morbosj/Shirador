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
-- Table structure for table `login_history`
--

CREATE TABLE `login_history` (
  `log_id` int(11) NOT NULL,
  `username` varchar(25) NOT NULL,
  `user_role` varchar(25) NOT NULL,
  `type` varchar(25) NOT NULL,
  `log_date` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login_history`
--

INSERT INTO `login_history` (`log_id`, `username`, `user_role`, `type`, `log_date`) VALUES
(1, 'morbosjj', 'Operator', 'Login', 'Oct-03-2017 06:36:18 AM'),
(2, 'morbosjj', 'Operator', 'Login', 'Oct-03-2017 07:23:03 AM'),
(3, 'morbosjj', 'Operator', 'Logout', 'Oct-03-2017 07:25:49 AM'),
(4, '', 'Operator', 'Logout', 'Oct-03-2017 07:25:50 AM'),
(5, 'morbosjj', 'Operator', 'Login', 'Oct-03-2017 07:34:42 AM'),
(6, 'morbosjj', 'Operator', 'Logout', 'Oct-03-2017 07:42:09 AM'),
(7, '', 'Operator', 'Logout', 'Oct-03-2017 07:42:10 AM'),
(8, 'adminjj', 'Administrator', 'Login', 'Oct-03-2017 07:42:46 AM'),
(9, '', 'Administrator', 'Logout', 'Oct-03-2017 07:43:02 AM'),
(10, '', 'Administrator', 'Logout', 'Oct-03-2017 07:43:02 AM');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `login_history`
--
ALTER TABLE `login_history`
  ADD PRIMARY KEY (`log_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `login_history`
--
ALTER TABLE `login_history`
  MODIFY `log_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
