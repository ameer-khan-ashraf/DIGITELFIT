-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 26, 2019 at 02:02 PM
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
-- Database: `loginsystem`
--

-- --------------------------------------------------------

--
-- Table structure for table `purchaseint`
--

CREATE TABLE `purchaseint` (
  `id` int(11) NOT NULL,
  `dept` varchar(60) DEFAULT NULL,
  `udate` date DEFAULT NULL,
  `pcode` varchar(255) DEFAULT NULL,
  `pdesc` varchar(255) DEFAULT NULL,
  `ddate` date DEFAULT NULL,
  `mstatus` varchar(255) NOT NULL DEFAULT 'Pending Approval',
  `remarks` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `purchaseint`
--

INSERT INTO `purchaseint` (`id`, `dept`, `udate`, `pcode`, `pdesc`, `ddate`, `mstatus`, `remarks`) VALUES
(4, 'production', '2019-12-26', '3445', 'Wrench', NULL, 'Pending Approval', 'Product must be size 10');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `purchaseint`
--
ALTER TABLE `purchaseint`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `purchaseint`
--
ALTER TABLE `purchaseint`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
