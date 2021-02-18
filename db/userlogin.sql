-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 18, 2020 at 08:16 AM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `userlogin`
--

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

CREATE TABLE `company` (
  `id` int(11) NOT NULL,
  `c_name` varchar(20) NOT NULL,
  `c_date` datetime NOT NULL,
  `c_mail` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `entryproduct`
--

CREATE TABLE `entryproduct` (
  `id` int(11) NOT NULL,
  `prod_name` varchar(20) NOT NULL,
  `prod_price` double NOT NULL,
  `prod_company` varchar(20) NOT NULL,
  `prod_model` varchar(20) NOT NULL,
  `prod_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `entryproduct`
--

INSERT INTO `entryproduct` (`id`, `prod_name`, `prod_price`, `prod_company`, `prod_model`, `prod_date`) VALUES
(9, 'printer', 20000, 'nikon', 'n1246', '2020-02-20 00:00:00'),
(10, 'motherbord', 5000, 'ibm', 'vr456', '2020-02-20 00:00:00'),
(11, 'mouse', 400, 'dell', 'd455', '2020-02-25 00:00:00'),
(12, 'cpu', 30000, 'dell', 'd12y6', '2020-02-28 00:00:00'),
(13, 'keybored', 700, 'dell', 'd1456', '2020-02-29 00:00:00'),
(14, 'sacanner', 5000, 'canon', 'cs267', '2020-03-02 00:00:00'),
(15, 'earphones', 150, 'jbl', 'j80', '2020-03-17 00:00:00'),
(16, 'projector', 20000, 'canon', 'cd125', '2020-03-17 00:00:00'),
(17, 'motherbord', 500, 'intel', 'y56', '2020-04-29 00:00:00'),
(18, 'earphones', 200, 'jbl', 'j15', '2020-04-16 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `prod_name` varchar(255) NOT NULL,
  `prod_price` varchar(20) NOT NULL,
  `prod_company` varchar(255) NOT NULL,
  `prod_model` varchar(255) NOT NULL,
  `prod_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `prod_name`, `prod_price`, `prod_company`, `prod_model`, `prod_date`) VALUES
(101, 'keyboard', '100', 'dell', 'DL123', '2020-04-16 10:49:46'),
(132, 'printer', '1500', 'nikon', 'n145', '2020-04-17 00:00:00'),
(133, 'motherbord', '670', 'intel', 'u223', '2020-04-17 00:00:00'),
(134, 'mouse', '60', 'dell', 'd15', '2020-04-17 00:00:00'),
(135, 'keybored', '150', 'dell', '124', '2020-04-17 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `usertable`
--

CREATE TABLE `usertable` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `fullname` varchar(100) NOT NULL,
  `gender` varchar(20) NOT NULL,
  `qualification` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `usertable`
--

INSERT INTO `usertable` (`id`, `username`, `fullname`, `gender`, `qualification`, `password`) VALUES
(1, 'ram', 'ram waghmode', 'male', 'BScIT', '123456'),
(3, 'nik@123', 'nikhil mane', 'male', 'BMS', 'nik@123'),
(12, 'd123', 'dnyanu', 'male', 'BE.IT', '1234');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `entryproduct`
--
ALTER TABLE `entryproduct`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `usertable`
--
ALTER TABLE `usertable`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `company`
--
ALTER TABLE `company`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `entryproduct`
--
ALTER TABLE `entryproduct`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=136;
--
-- AUTO_INCREMENT for table `usertable`
--
ALTER TABLE `usertable`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
