-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Nov 23, 2023 at 08:01 AM
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
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
