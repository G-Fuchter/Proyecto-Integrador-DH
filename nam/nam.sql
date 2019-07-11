-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 12, 2019 at 01:14 AM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `nam`
--

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `ID` int(11) NOT NULL,
  `NAME` varchar(20) COLLATE latin1_general_cs NOT NULL,
  `DESCRIPTION` char(200) COLLATE latin1_general_cs NOT NULL,
  `DIET` varchar(15) COLLATE latin1_general_cs NOT NULL,
  `PRICE` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_cs;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `ID` int(11) NOT NULL,
  `NAME` varchar(20) COLLATE latin1_general_cs NOT NULL,
  `SURNAME` varchar(20) COLLATE latin1_general_cs NOT NULL,
  `EMAIL` char(50) COLLATE latin1_general_cs NOT NULL,
  `ADDRESS` char(30) COLLATE latin1_general_cs NOT NULL,
  `PASSWORD` char(100) COLLATE latin1_general_cs NOT NULL,
  `COUNTRY` char(30) COLLATE latin1_general_cs NOT NULL,
  `DIET` varchar(15) COLLATE latin1_general_cs NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_cs;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`ID`, `NAME`, `SURNAME`, `EMAIL`, `ADDRESS`, `PASSWORD`, `COUNTRY`, `DIET`) VALUES
(2, 'George', 'Loco', 'email', 'address', 'password', 'country', 'diet'),
(4, 'Guille', 'Gute', 'hola@hola.com', 'Washington 2020', '$2y$10$uEdxkQKZbXm4v2yAHF1h7etC1PyGvY65HbGOWDvKHxbL4vKeXflKK', 'Argentina', 'Vegan');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
