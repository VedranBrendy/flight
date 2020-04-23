-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 23, 2020 at 12:49 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `flightapi`
--

-- --------------------------------------------------------

--
-- Table structure for table `flight`
--

CREATE TABLE `flight` (
  `id` int(11) NOT NULL,
  `departure` varchar(50) NOT NULL,
  `arrival` varchar(50) NOT NULL,
  `departure_date` date NOT NULL,
  `arrival_date` date DEFAULT NULL,
  `flight_type` varchar(20) DEFAULT NULL,
  `departure2` varchar(50) DEFAULT NULL,
  `arrival2` varchar(50) DEFAULT NULL,
  `departure_date2` date DEFAULT NULL,
  `departure3` varchar(50) DEFAULT NULL,
  `arrival3` varchar(252) DEFAULT NULL,
  `departure_date3` date DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `flight`
--

INSERT INTO `flight` (`id`, `departure`, `arrival`, `departure_date`, `arrival_date`, `flight_type`, `departure2`, `arrival2`, `departure_date2`, `departure3`, `arrival3`, `departure_date3`, `created_at`) VALUES
(1, 'Zagreb', 'Pariz', '2020-04-24', '2020-04-25', 'recurrent', NULL, NULL, NULL, NULL, NULL, NULL, '2020-04-23 12:36:31'),
(2, 'Zagreb', 'London', '2020-04-25', NULL, 'oneWay', NULL, NULL, NULL, NULL, NULL, NULL, '2020-04-23 12:36:43'),
(3, 'Zagreb', 'London', '2020-04-23', '2020-04-25', 'multipleDestinations', 'London', 'Paris', '2020-04-27', 'Prague', 'Zagreb', '2020-04-30', '2020-04-23 12:39:57');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `flight`
--
ALTER TABLE `flight`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `flight`
--
ALTER TABLE `flight`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
