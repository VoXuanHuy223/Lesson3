-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jul 24, 2023 at 06:09 AM
-- Server version: 8.0.31
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `test`
--

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int NOT NULL AUTO_INCREMENT,
  `full_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `full_name`, `email`, `password`, `role`) VALUES
(3, 'Administrator', 'admin@admin.com', '$2y$10$YCTOw5564k4cY9zXwI5dC.QOy1HEO9tpkog6YY87.BEIPH.oOZd/C', 'Admin'),
(2, 'User 1', 'user1@user.com', '$2y$10$/usvkTakhZqzoPLwDHNatOlltLLILoGJdexm81HMwyKpV6dLpWWda', 'Admin'),
(4, 'User 2', 'user2@user.com', '$2y$10$KWPQKoZ.zA2dO4pGFez0HOB7CYTmabIrZMIXXc6CsyQxYKy/2Rnwy', 'User'),
(5, 'User 3', 'user3@user.com', '$2y$10$Up9XQljWH026fi8vltKGBuZ9Hx/ruutRMqcsU03Essof7g7dzob.S', 'User'),
(8, 'User 5', 'user5@user.com', '$2y$10$EH0q3KarMu6cF8YTlIbOwuvFbGwuDYJkTpoX5nSzCuxazU1QNemwK', 'User'),
(9, 'Vo Xuan Huy', 'huy@user.com', '$2y$10$8WfEg71zRpD.BG0vmMwJyeno3mIinA1c.5hujIVyhu2VbQXU76K9q', 'User');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
