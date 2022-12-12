-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.4.24-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win64
-- HeidiSQL Version:             11.3.0.6295
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for web_project_store
DROP DATABASE IF EXISTS `web_project_store`;
CREATE DATABASE IF NOT EXISTS `web_project_store` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;
USE `web_project_store`;

-- Dumping structure for table web_project_store.aa
DROP TABLE IF EXISTS `aa`;
CREATE TABLE IF NOT EXISTS `aa` (
  `a` varchar(50) DEFAULT NULL,
  `b` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Dumping data for table web_project_store.aa: ~2 rows (approximately)
/*!40000 ALTER TABLE `aa` DISABLE KEYS */;
INSERT INTO `aa` (`a`, `b`) VALUES
	('1', 'aaaa'),
	('2', 'bbbb');
/*!40000 ALTER TABLE `aa` ENABLE KEYS */;

-- Dumping structure for table web_project_store.bb
DROP TABLE IF EXISTS `bb`;
CREATE TABLE IF NOT EXISTS `bb` (
  `a` varchar(50) DEFAULT NULL,
  `b` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Dumping data for table web_project_store.bb: ~2 rows (approximately)
/*!40000 ALTER TABLE `bb` DISABLE KEYS */;
INSERT INTO `bb` (`a`, `b`) VALUES
	('1', 'cccc'),
	('2', 'ddddd');
/*!40000 ALTER TABLE `bb` ENABLE KEYS */;

-- Dumping structure for table web_project_store.cart
DROP TABLE IF EXISTS `cart`;
CREATE TABLE IF NOT EXISTS `cart` (
  `user_id` int(3) NOT NULL,
  `item_id` int(3) NOT NULL,
  `quantity` int(4) NOT NULL DEFAULT 0,
  KEY `fk_user_id_cart` (`user_id`),
  KEY `fk_item_id` (`item_id`),
  CONSTRAINT `fk_item_id` FOREIGN KEY (`item_id`) REFERENCES `item` (`item_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_user_id_cart` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Dumping data for table web_project_store.cart: ~1 rows (approximately)
/*!40000 ALTER TABLE `cart` DISABLE KEYS */;
INSERT INTO `cart` (`user_id`, `item_id`, `quantity`) VALUES
	(1, 8, 1);
/*!40000 ALTER TABLE `cart` ENABLE KEYS */;

-- Dumping structure for table web_project_store.category
DROP TABLE IF EXISTS `category`;
CREATE TABLE IF NOT EXISTS `category` (
  `cat_id` int(3) NOT NULL AUTO_INCREMENT,
  `cat_name` varchar(100) NOT NULL,
  PRIMARY KEY (`cat_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table web_project_store.category: ~8 rows (approximately)
/*!40000 ALTER TABLE `category` DISABLE KEYS */;
INSERT INTO `category` (`cat_id`, `cat_name`) VALUES
	(1, 'Power Tools'),
	(2, 'Hand Tool'),
	(3, 'Hardware'),
	(4, 'Accessories'),
	(5, 'Electrical'),
	(6, 'Paint Supplies'),
	(7, 'Safty'),
	(8, 'Lubricants');
/*!40000 ALTER TABLE `category` ENABLE KEYS */;

-- Dumping structure for table web_project_store.item
DROP TABLE IF EXISTS `item`;
CREATE TABLE IF NOT EXISTS `item` (
  `item_id` int(3) NOT NULL AUTO_INCREMENT,
  `title` varchar(50) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `price` decimal(10,3) NOT NULL,
  `avail_stock` int(11) NOT NULL,
  `pictures` varchar(2000) NOT NULL,
  `cat_id` int(3) NOT NULL,
  PRIMARY KEY (`item_id`),
  KEY `fk_cat_id` (`cat_id`),
  CONSTRAINT `fk_cat_id` FOREIGN KEY (`cat_id`) REFERENCES `category` (`cat_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table web_project_store.item: ~9 rows (approximately)
/*!40000 ALTER TABLE `item` DISABLE KEYS */;
INSERT INTO `item` (`item_id`, `title`, `description`, `price`, `avail_stock`, `pictures`, `cat_id`) VALUES
	(7, 'Hammer Drill', 'AED520 Stanely Hammer Drill 720W', 300.000, 100, '1669642819.jpg', 1),
	(8, 'Hammer Drill Low', 'Stanely Hammer Drill', 200.000, 100, '1669642819.jpg', 1),
	(9, 'Angle Grinder', 'Bosch Angle Grinder 9 Inch GWS 20-230', 450.000, 80, '1669642819.jpg', 1),
	(10, 'Universal Helmet', 'Vaultex Universal helmet Safety Ear Muffs Yellow', 150.000, 250, '1669642819.jpg', 7),
	(11, 'Universal Helmet 2', 'Vaultex Universal helmet Safety Ear Muffs Yellow', 170.000, 250, '1669642819.jpg', 7),
	(13, 'Hand Shover', 'Thsid sfs osfsf sfksfs sfsmf sf fsfssssssssssssssssss sfssssss ggggggggggggggggggggggggggggggggggg gddddddddddddddddd', 45.000, 1000, '', 1),
	(14, 'Hand Shover', 'Thsid sfs osfsf sfksfs sfsmf sf fsfssssssssssssssssss sfssssss ggggggggggggggggggggggggggggggggggg gddddddddddddddddd', 45.000, 1000, '', 1),
	(15, 'ds', 'ddddddddddd', 23.000, 21, '', 1),
	(16, 'dfd', 'dgd', 34.000, 2, '3b2595efeb70f328a5f3b703dccc71f8.png', 1);
/*!40000 ALTER TABLE `item` ENABLE KEYS */;

-- Dumping structure for table web_project_store.order_details
DROP TABLE IF EXISTS `order_details`;
CREATE TABLE IF NOT EXISTS `order_details` (
  `order_id` int(3) NOT NULL,
  `item_id` int(3) NOT NULL,
  `quantity` int(4) NOT NULL,
  KEY `fk_item_id_details` (`item_id`),
  KEY `fk_order_id_details` (`order_id`),
  CONSTRAINT `fk_item_id_details` FOREIGN KEY (`item_id`) REFERENCES `item` (`item_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_order_id_details` FOREIGN KEY (`order_id`) REFERENCES `user_order` (`order_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Dumping data for table web_project_store.order_details: ~2 rows (approximately)
/*!40000 ALTER TABLE `order_details` DISABLE KEYS */;
INSERT INTO `order_details` (`order_id`, `item_id`, `quantity`) VALUES
	(1, 9, 2),
	(2, 8, 3);
/*!40000 ALTER TABLE `order_details` ENABLE KEYS */;

-- Dumping structure for table web_project_store.product
DROP TABLE IF EXISTS `product`;
CREATE TABLE IF NOT EXISTS `product` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `description` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `price` double DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table web_project_store.product: ~4 rows (approximately)
/*!40000 ALTER TABLE `product` DISABLE KEYS */;
INSERT INTO `product` (`id`, `description`, `image`, `price`) VALUES
	(1, 'iphone x', '1.png', 140000),
	(2, 'iphone 11', '2.png', 160000),
	(3, 'iphone xr', '3.png', 130000),
	(4, 'iphone 7', '4.png', 70000);
/*!40000 ALTER TABLE `product` ENABLE KEYS */;

-- Dumping structure for table web_project_store.user
DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `user_id` int(3) NOT NULL AUTO_INCREMENT,
  `full_name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(20) NOT NULL,
  `ac_type` int(1) NOT NULL DEFAULT 0,
  `tp_number` varchar(10) NOT NULL,
  `address` varchar(50) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table web_project_store.user: ~6 rows (approximately)
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` (`user_id`, `full_name`, `email`, `password`, `ac_type`, `tp_number`, `address`) VALUES
	(1, 'nipun', 'abc@gmail.com', 'abc', 0, '097123', 'aaaa bbbbb cccccc'),
	(2, 'dilshan', 'def@gmail.com', 'def', 0, '09553', 'dsdd ddaaaaa bbbbb cccccc'),
	(3, 'liyanage', 'abcghi@gmail.com', 'abc', 0, '011453', 'vvv bbbbb cccccc'),
	(4, 'nipun', 'nipun@gmail.com', 'nipun', 0, '077123456', 'aaaa bbbbbb cccc ddd ee fffff ggggg'),
	(5, 'Nipun Liyanage', 'nipun@admin.com', 'admin', 1, '097123', 'aaaa bbbbb cccccc'),
	(6, 'nipun', 'abcdef@gmail.com', '1234', 0, '1111', 'adada');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;

-- Dumping structure for table web_project_store.user_order
DROP TABLE IF EXISTS `user_order`;
CREATE TABLE IF NOT EXISTS `user_order` (
  `order_id` int(3) NOT NULL AUTO_INCREMENT,
  `user_id` int(3) NOT NULL,
  `order_date` date NOT NULL,
  PRIMARY KEY (`order_id`),
  KEY `fk_user_id_order` (`user_id`),
  CONSTRAINT `fk_user_id_order` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table web_project_store.user_order: ~2 rows (approximately)
/*!40000 ALTER TABLE `user_order` DISABLE KEYS */;
INSERT INTO `user_order` (`order_id`, `user_id`, `order_date`) VALUES
	(1, 1, '2022-12-06'),
	(2, 2, '2022-12-06');
/*!40000 ALTER TABLE `user_order` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
