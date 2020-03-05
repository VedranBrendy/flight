-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 05, 2020 at 11:42 PM
-- Server version: 10.1.26-MariaDB
-- PHP Version: 7.1.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `let`
--

-- --------------------------------------------------------

--
-- Table structure for table `flight`
--

CREATE TABLE `flight` (
  `id` int(11) NOT NULL,
  `polaziste` varchar(50) NOT NULL,
  `odrediste` varchar(50) NOT NULL,
  `datum_odlazak` date NOT NULL,
  `datum_povratak` date DEFAULT NULL,
  `vrsta_leta` varchar(20) DEFAULT NULL,
  `polaziste2` varchar(50) DEFAULT NULL,
  `odrediste2` varchar(50) DEFAULT NULL,
  `datum_odlaska2` date DEFAULT NULL,
  `polaziste3` varchar(50) DEFAULT NULL,
  `odrediste3` varchar(252) DEFAULT NULL,
  `datum_odlaska` date DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `flight`
--

INSERT INTO `flight` (`id`, `polaziste`, `odrediste`, `datum_odlazak`, `datum_povratak`, `vrsta_leta`, `polaziste2`, `odrediste2`, `datum_odlaska2`, `polaziste3`, `odrediste3`, `datum_odlaska`, `created_at`) VALUES
(1, 'Zagreb', 'London', '2020-03-06', '2020-03-07', 'viseDestinacija', 'London', 'Paris', '2020-03-12', 'Paris', 'Zagreb', '2020-03-08', '2020-03-05 23:21:45'),
(2, 'Zagreb', 'Moscow', '2020-03-12', NULL, 'jednosmjerna', NULL, NULL, NULL, NULL, NULL, NULL, '2020-03-05 23:22:14'),
(3, 'Zagreb', 'Prague', '2020-03-07', '2020-03-13', 'povratna', NULL, NULL, NULL, NULL, NULL, NULL, '2020-03-05 23:22:27');

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
