-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Nov 22, 2023 at 04:27 PM
-- Server version: 8.0.31
-- PHP Version: 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `quillquest`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

DROP TABLE IF EXISTS `cart`;
CREATE TABLE IF NOT EXISTS `cart` (
  `username` varchar(20) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `prod_id` int NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`username`, `prod_id`) VALUES
('titik', 7),
('titik', 5),
('shreya', 8),
('shreya', 2);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `product_id` int NOT NULL AUTO_INCREMENT,
  `prod_title` varchar(255) NOT NULL,
  `prod_price` varchar(255) NOT NULL,
  `prod_img` varchar(255) NOT NULL,
  PRIMARY KEY (`product_id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `prod_title`, `prod_price`, `prod_img`) VALUES
(1, 'Harrypotter', '300', 'harrypotter.png'),
(2, 'Harrypotter 2', '400', 'harrypotter2.png'),
(3, 'Gangai konda cholapuram', '200', 'gangai_konda_cholapuram.jpeg'),
(4, 'Lord of rings', '500', 'lord_of_rings.jpeg'),
(5, 'Mahabharat', '1000', 'mahabharat.jpeg'),
(6, 'Naladiyar', '500', 'naladiar.jpeg'),
(7, 'The ocean at the end of the lake', '400', 'ocean_at_the_end_of_lake.jpeg'),
(8, 'The space between worlds', '300', 'space_bet_worlds.jpeg'),
(9, 'A stranger in a strange land', '400', 'stranger_in_a_strange_land.jpeg'),
(10, 'The tale of two cities', '700', 'tale_of_2_cities.jpeg'),
(11, 'The verse', '600', 'the_verse.jpeg'),
(12, 'When I understand myself', '500', 'when_i_understand_myself.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `username` varchar(20) NOT NULL,
  `email` varchar(20) NOT NULL,
  `mobile` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`username`, `email`, `mobile`, `password`) VALUES
('titik', 'titikgmail.com', '9889567854', 'lkjhhg'),
('titik', 'titikgmail.com', '9889567854', 'lkjhhg'),
('titik', 'titikgmail.com', '9889567854', 'lkjhhg'),
('sathya', 'sathya@gmail.com', '9889567854', 'mnbvc'),
('shreya', 'shreya123@gmail.com', '8897564321', 'shres098');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
