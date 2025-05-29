-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mar. 27 mai 2025 à 21:52
-- Version du serveur : 9.1.0
-- Version de PHP : 8.3.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `quickride`
--

-- --------------------------------------------------------

--
-- Structure de la table `bookings`
--

DROP TABLE IF EXISTS `bookings`;
CREATE TABLE IF NOT EXISTS `bookings` (
  `id` int NOT NULL AUTO_INCREMENT,
  `car_id` int NOT NULL,
  `client_id` int NOT NULL,
  `booking_date` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `bookings`
--

INSERT INTO `bookings` (`id`, `car_id`, `client_id`, `booking_date`) VALUES
(16, 5, 17, '2025-05-27 21:04:27');

-- --------------------------------------------------------

--
-- Structure de la table `cars`
--

DROP TABLE IF EXISTS `cars`;
CREATE TABLE IF NOT EXISTS `cars` (
  `id` int NOT NULL AUTO_INCREMENT,
  `brand` varchar(50) DEFAULT NULL,
  `model` varchar(50) DEFAULT NULL,
  `year` year DEFAULT NULL,
  `price_per_day` decimal(10,2) DEFAULT NULL,
  `availability` enum('Available','Unavailable') DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `cars`
--

INSERT INTO `cars` (`id`, `brand`, `model`, `year`, `price_per_day`, `availability`, `image`) VALUES
(1, 'Toyota', 'Corolla', '2022', 50.00, 'Available', 'images/corolla.jpg'),
(2, 'Honda', 'Civic', '2021', 55.00, 'Available', 'images/civic.jpg'),
(3, 'Ford', 'Mustang', '2023', 120.00, 'Available', 'images/mustang.jpg'),
(4, 'Chevrolet', 'Camaro', '2022', 115.00, 'Available', 'images/camaro.jpg'),
(5, 'BMW', '3 Series', '2023', 130.00, 'Available', 'images/bmw3.jpg'),
(6, 'Audi', 'A4', '2022', 125.00, 'Available', 'images/a4.jpg'),
(7, 'Mercedes', 'C-Class', '2022', 140.00, 'Available', 'images/cclass.jpg'),
(8, 'Tesla', 'Model 3', '2023', 110.00, 'Available', 'images/model3.jpg'),
(9, 'Hyundai', 'Elantra', '2021', 45.00, 'Available', 'images/elantra.jpg'),
(10, 'Kia', 'Optima', '2020', 48.00, 'Available', 'images/optima.jpg'),
(11, 'Nissan', 'Altima', '2021', 50.00, 'Available', 'images/altima.jpg'),
(12, 'Volkswagen', 'Jetta', '2022', 52.00, 'Available', 'images/jetta.jpg'),
(13, 'Mazda', 'Mazda3', '2021', 49.00, 'Available', 'images/mazda3.jpg'),
(14, 'Subaru', 'Impreza', '2022', 51.00, 'Available', 'images/impreza.jpg'),
(15, 'Dodge', 'Charger', '2023', 115.00, 'Available', 'images/charger.jpg'),
(16, 'Jeep', 'Wrangler', '2022', 125.00, 'Available', 'images/wrangler.jpg'),
(17, 'Lexus', 'IS 300', '2022', 135.00, 'Available', 'images/is300.jpg'),
(18, 'Infiniti', 'Q50', '2023', 130.00, 'Available', 'images/q50.jpg'),
(19, 'Porsche', '911', '2023', 250.00, 'Available', 'images/911.jpg'),
(20, 'Ferrari', 'Roma', '2024', 400.00, 'Available', 'images/roma.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `contact_form`
--

DROP TABLE IF EXISTS `contact_form`;
CREATE TABLE IF NOT EXISTS `contact_form` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `subject` varchar(255) DEFAULT NULL,
  `message` text,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('admin','client') NOT NULL DEFAULT 'client',
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `role`) VALUES
(17, 'Intissar@gmail.com', '$2y$10$cVqjd7nK.o8BjdOT0C1ovuvaLzQxgJcGPgvnO7alXtzAup0X7bCD2', 'client'),
(18, 'raedboukadida@gmail.com', '$2y$10$rawSCYem24O6IlrEnAOuLuy2b1iF4gKckXiTUa65UJXCgonxYHxpC', 'admin');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
