-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 04, 2020 at 07:28 PM
-- Server version: 5.7.30-0ubuntu0.18.04.1
-- PHP Version: 7.2.24-0ubuntu0.18.04.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ucc-test`
--

-- --------------------------------------------------------

--
-- Table structure for table `engine`
--

CREATE TABLE `engine` (
  `ucc_id` varchar(50) NOT NULL,
  `ucc_name` varchar(30) NOT NULL,
  `ucc_engine_cm` float NOT NULL,
  `ucc_engine_inc` float NOT NULL,
  `ucc_engine_lit` float NOT NULL,
  `ucc_engine_pow` int(11) NOT NULL,
  `ucc_price` int(11) NOT NULL,
  `ucc_loc` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `engine`
--

INSERT INTO `engine` (`ucc_id`, `ucc_name`, `ucc_engine_cm`, `ucc_engine_inc`, `ucc_engine_lit`, `ucc_engine_pow`, `ucc_price`, `ucc_loc`) VALUES
('UCC-Ferrari-20201204-181230', 'Ferrari', 1000, 61.024, 1, 8000, 98000, 'Paris');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `engine`
--
ALTER TABLE `engine`
  ADD PRIMARY KEY (`ucc_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
