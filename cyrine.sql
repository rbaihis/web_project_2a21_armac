-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 09, 2021 at 12:53 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `maha`
--

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `id` int(11) NOT NULL,
  `cardholder` varchar(100) NOT NULL,
  `mm` int(11) NOT NULL,
  `yy` int(11) NOT NULL,
  `cardnumber` int(11) NOT NULL,
  `cvc` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`id`, `cardholder`, `mm`, `yy`, `cardnumber`, `cvc`) VALUES
(1, 'aaa', 11, 11, 11, 11),
(2, 'aaa', 11, 11, 11, 11),
(3, 'aaa', 11, 11, 11, 11),
(4, 'aaa', 11, 11, 11, 11),
(5, 'aaab', 11, 11, 11, 11),
(6, 'Aziz Abrougui', 12, 3, 1234567878, 123),
(7, 'Aziz Abrougui', 11, 11, 2147483647, 123),
(8, 'Aziz Abrougui', 22, 22, 2147483647, 123),
(9, 'Aziz Abrougui', 22, 22, 2147483647, 123),
(10, 'Aziz Abrougui', 12, 22, 2147483647, 123),
(11, 'Aziz Abrougui', 12, 1, 2, 123),
(12, 'Aziz Abrougui', 11, 11, 1223, 123),
(13, 'MOHSEN', 2, 2, 222222222, 123),
(14, 'ASERT', 11, 11, 1234, 333);

-- --------------------------------------------------------

--
-- Table structure for table `commande`
--

CREATE TABLE `commande` (
  `id` int(11) NOT NULL,
  `itemName` varchar(100) NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `commande`
--

INSERT INTO `commande` (`id`, `itemName`, `price`) VALUES
(96, 'Abonnement 1 ans', 100),
(97, 'Abonnement 6 mois', 45);

-- --------------------------------------------------------

--
-- Table structure for table `datap`
--

CREATE TABLE `datap` (
  `id` int(11) NOT NULL,
  `itemName` varchar(100) NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `datap`
--

INSERT INTO `datap` (`id`, `itemName`, `price`) VALUES
(15, 'Abonnement 4 mois', 400),
(17, 'Abonnement 6 mois', 45),
(18, 'Abonnement 5 ans', 500),
(21, 'Abonnement 1 ans', 100);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `commande`
--
ALTER TABLE `commande`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `datap`
--
ALTER TABLE `datap`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `commande`
--
ALTER TABLE `commande`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=98;

--
-- AUTO_INCREMENT for table `datap`
--
ALTER TABLE `datap`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
