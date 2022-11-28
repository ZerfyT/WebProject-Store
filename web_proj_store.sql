-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 28, 2022 at 02:23 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `web_project_store`
--
CREATE DATABASE IF NOT EXISTS `web_project_store` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `web_project_store`;

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`username`, `password`) VALUES
('admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `item`
--

CREATE TABLE `item` (
  `id_num` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `unit_price` decimal(10,3) NOT NULL,
  `unit` varchar(10) NOT NULL,
  `avail_stock` int(11) NOT NULL,
  `pictures` varchar(2000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `item`
--

INSERT INTO `item` (`id_num`, `title`, `description`, `unit_price`, `unit`, `avail_stock`, `pictures`) VALUES
(0, 'abc', '123ada', '13.000', 'aa', 12, ''),
(1, 'ABC', 'aaaaaaaaa bbbbbbbbbbb ccccccccccccc dddddddddd', '10.500', 'Rs', 100, 'images/item_1.jpg,images/item_2.jpg'),
(2, 'Stones', 'dfdg dfdf gghhhhh ccccccccccccc ', '50.870', 'Rs', 200, 'images/item_3.jpg,images/item_2.jpg'),
(3, 'Drill', 'aajjjjjjjjj aaaaaaa bbbbbbbbbbb  ', '6.600', 'Rs', 50, 'images/item_4.jpg,images/item_5.jpg'),
(4, 'Piler', 'aaytttttt fvvvvaaaa bgggggggggggggg ', '56.000', 'Rs', 70, 'images/item_4.jpg,images/item_1.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_num` int(11) NOT NULL,
  `full_name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(20) NOT NULL,
  `tp_number` varchar(10) NOT NULL,
  `address` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_num`, `full_name`, `email`, `password`, `tp_number`, `address`) VALUES
(1, 'nipun', 'abc@gmail.com', 'abc', '097123', 'aaaa bbbbb cccccc'),
(2, 'dilshan', 'def@gmail.com', 'def', '09553', 'dsdd ddaaaaa bbbbb cccccc'),
(3, 'liyanage', 'abcghi@gmail.com', 'abc', '011453', 'vvv bbbbb cccccc'),
(4, 'nipun', 'nipun@gmail.com', 'nipun', '077123456', 'aaaa bbbbbb cccc ddd ee fffff ggggg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`id_num`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_num`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_num` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
