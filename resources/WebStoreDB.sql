-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 05, 2023 at 01:38 AM
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
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `user_id` int(3) NOT NULL,
  `item_id` int(3) NOT NULL,
  `quantity` int(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`user_id`, `item_id`, `quantity`) VALUES
(1, 8, 2);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `cat_id` int(3) NOT NULL,
  `cat_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`cat_id`, `cat_name`) VALUES
(1, 'Power Tools'),
(2, 'Hand Tool'),
(3, 'Hardware'),
(4, 'Accessories'),
(5, 'Electrical'),
(6, 'Paint Supplies'),
(7, 'Safty'),
(8, 'Lubricants');

-- --------------------------------------------------------

--
-- Table structure for table `item`
--

CREATE TABLE `item` (
  `item_id` int(3) NOT NULL,
  `title` varchar(50) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `price` decimal(10,3) NOT NULL,
  `avail_stock` int(11) NOT NULL,
  `pictures` varchar(2000) NOT NULL,
  `cat_id` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `item`
--

INSERT INTO `item` (`item_id`, `title`, `description`, `price`, `avail_stock`, `pictures`, `cat_id`) VALUES
(7, 'Hammer Drill', 'AED520 Stanely Hammer Drill 720W', '300.000', 100, '48a7c5be06b602fa1d9cd37a32a3d684.jpg', 1),
(8, 'Hammer Drill Low', 'Stanely Hammer Drill', '200.000', 100, '325601099f60f51e1811ced8002c6757.jpg', 1),
(9, 'Angle Grinder 9 Inch', 'BOSCH GWS 20-230 Angle Grinder 9 Inch\r\nIt is the compact and lightweight tool with a Powerful 2000 W motor and having Armoured coils that protect the motor against sharp grinding dust ensures a long lifetime.', '6500.000', 80, 'd88dd6defed83cbe4a6a0ff8f31eb3b3.jpeg', 1),
(10, 'Universal Helmet', 'Vaultex Universal helmet Safety Ear Muffs Yellow', '150.000', 250, '1bc3387f16a7574aef1bd9a320b3a8e9.jpg', 1),
(11, 'Universal Helmet 2', 'Vaultex Universal helmet Safety Ear Muffs Yellow', '170.000', 250, 'b4b1a3f2b70f3ae7c4bde2647bdd4dea.jpg', 1),
(13, 'Hand Shover 2', 'Thsid ', '450.000', 1000, 'bd2d166e9e1bd59abdac5acb072bac33.jpg', 1),
(14, 'Hand Shover', 'Thsid sfs osfsf sfksfs sfsmf sf fsfssssssssssssssssss sfssssss ggggggggggggggggggggggggggggggggggg gddddddddddddddddd', '45.000', 1000, '', 1),
(18, 'TLM99 Laser Distance Measurer', 'STANLEY STHT1-77138 TLM99 Laser Distance Measurer.\r\nStanley TLM99 is the 100 ft./ 30Mtrs Laser Distance Measure which allows one person to take measurements without assistance.', '22500.000', 100, '48d21598f7d411a0d7af7c6e86e4c23a.jpg', 1),
(19, 'NEDO DISTO™ D510 Set 705575', 'NEDO DISTO™ D510 Set 705575\r\nThe D510 can handle many types of measurement tasks that AEC professionals regularly need to complete. It covers the basics but also includes more advanced features, like Smart Horizontal and Height Tracking. And it excels at complex measurements such as our Trapezium Function, which allows you to measure the slope, length, and area of a roof from one location. ', '210000.000', 0, 'e59efb969d1fe0d96f2fb66c59a41255.jpeg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `order_id` int(3) NOT NULL,
  `item_id` int(3) NOT NULL,
  `quantity` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`order_id`, `item_id`, `quantity`) VALUES
(1, 9, 2),
(2, 8, 3);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(3) NOT NULL,
  `full_name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(20) NOT NULL,
  `ac_type` int(1) NOT NULL DEFAULT 0,
  `tp_number` varchar(10) NOT NULL,
  `address` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `full_name`, `email`, `password`, `ac_type`, `tp_number`, `address`) VALUES
(1, 'nipun', 'abc@gmail.com', 'abc', 0, '097123', 'aaaa bbbbb cccccc'),
(2, 'dilshan', 'def@gmail.com', 'def', 0, '09553', 'dsdd ddaaaaa bbbbb cccccc'),
(3, 'liyanage', 'abcghi@gmail.com', 'abc', 0, '011453', 'vvv bbbbb cccccc'),
(4, 'nipun', 'nipun@gmail.com', 'nipun', 0, '077123456', 'aaaa bbbbbb cccc ddd ee fffff ggggg'),
(5, 'Nipun Liyanage', 'nipun@admin.com', 'admin', 1, '097123', 'aaaa bbbbb cccccc'),
(6, 'nipun', 'abcdef@gmail.com', '1234', 0, '1111', 'adada');

-- --------------------------------------------------------

--
-- Table structure for table `user_order`
--

CREATE TABLE `user_order` (
  `order_id` int(3) NOT NULL,
  `user_id` int(3) NOT NULL,
  `order_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_order`
--

INSERT INTO `user_order` (`order_id`, `user_id`, `order_date`) VALUES
(1, 1, '2022-12-06'),
(2, 2, '2022-12-06');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD KEY `fk_user_id_cart` (`user_id`),
  ADD KEY `fk_item_id` (`item_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`item_id`),
  ADD KEY `fk_cat_id` (`cat_id`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD KEY `fk_item_id_details` (`item_id`),
  ADD KEY `fk_order_id_details` (`order_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `user_order`
--
ALTER TABLE `user_order`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `fk_user_id_order` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `cat_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `item`
--
ALTER TABLE `item`
  MODIFY `item_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `user_order`
--
ALTER TABLE `user_order`
  MODIFY `order_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `fk_item_id` FOREIGN KEY (`item_id`) REFERENCES `item` (`item_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_user_id_cart` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `item`
--
ALTER TABLE `item`
  ADD CONSTRAINT `fk_cat_id` FOREIGN KEY (`cat_id`) REFERENCES `category` (`cat_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `order_details`
--
ALTER TABLE `order_details`
  ADD CONSTRAINT `fk_item_id_details` FOREIGN KEY (`item_id`) REFERENCES `item` (`item_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_order_id_details` FOREIGN KEY (`order_id`) REFERENCES `user_order` (`order_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user_order`
--
ALTER TABLE `user_order`
  ADD CONSTRAINT `fk_user_id_order` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
