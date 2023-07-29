-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jul 25, 2023 at 06:29 PM
-- Server version: 8.0.31
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bdd`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `id_admin` int NOT NULL AUTO_INCREMENT,
  `nom_admin` varchar(240) NOT NULL,
  `role_admin` varchar(240) NOT NULL,
  `mdp` varchar(240) NOT NULL,
  PRIMARY KEY (`id_admin`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `nom_admin`, `role_admin`, `mdp`) VALUES
(1, 'Dera', 'Admin', 'rabodoarimanga'),
(2, 'Bodo', 'Admin', 'bodoarimanga');

-- --------------------------------------------------------

--
-- Table structure for table `chambre`
--

DROP TABLE IF EXISTS `chambre`;
CREATE TABLE IF NOT EXISTS `chambre` (
  `id_chambre` int NOT NULL AUTO_INCREMENT,
  `numero_chambre` int NOT NULL,
  `classe_chambre` varchar(240) NOT NULL,
  `type_chambre` varchar(240) NOT NULL,
  `etat_chambre` varchar(240) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT 'Libre',
  `occupationDebut` datetime NOT NULL,
  `id_client` int NOT NULL,
  `durre` int NOT NULL,
  PRIMARY KEY (`id_chambre`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `chambre`
--

INSERT INTO `chambre` (`id_chambre`, `numero_chambre`, `classe_chambre`, `type_chambre`, `etat_chambre`, `occupationDebut`, `id_client`, `durre`) VALUES
(1, 1, 'Economique', '2 lits', 'Libre', '0000-00-00 00:00:00', 61, 1),
(2, 2, 'Economique', 'Lit simple', 'Libre', '0000-00-00 00:00:00', 0, 3),
(3, 3, 'Gold', '2 lits', 'Libre', '2023-07-04 17:56:53', 0, 0),
(4, 4, 'Presidentielle', '4 lits', 'Occupe', '0000-00-00 00:00:00', 65, 3),
(5, 5, 'Normal', '1 lit', 'Occupe', '0000-00-00 00:00:00', 64, 3),
(6, 6, 'Gold', '4 lits', 'Libre', '2023-07-05 16:40:56', 0, 0),
(7, 8, 'Normal', '2 lits', 'Libre', '2023-07-05 16:40:56', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `client`
--

DROP TABLE IF EXISTS `client`;
CREATE TABLE IF NOT EXISTS `client` (
  `id_client` bigint NOT NULL AUTO_INCREMENT,
  `nom_client` varchar(240) NOT NULL,
  `numero_client` varchar(240) NOT NULL,
  `adresse_client` varchar(240) NOT NULL,
  `type_client` varchar(240) NOT NULL,
  `id_chambre` int NOT NULL,
  PRIMARY KEY (`id_client`),
  UNIQUE KEY `id_chambre` (`id_chambre`)
) ENGINE=MyISAM AUTO_INCREMENT=66 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `client`
--

INSERT INTO `client` (`id_client`, `nom_client`, `numero_client`, `adresse_client`, `type_client`, `id_chambre`) VALUES
(2, 'Bodo', '214', 'j,vkvkhvk', 'jbjlbljbl', 0),
(64, 'nn', '2', 'ALAROBIA', '', 5);

-- --------------------------------------------------------

--
-- Table structure for table `facture`
--

DROP TABLE IF EXISTS `facture`;
CREATE TABLE IF NOT EXISTS `facture` (
  `facture_id` int NOT NULL AUTO_INCREMENT,
  `id_client` int NOT NULL,
  `total` int NOT NULL,
  `debut` datetime NOT NULL,
  `dure` int NOT NULL,
  `dateDuFacture` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `nom_client` varchar(240) NOT NULL,
  PRIMARY KEY (`facture_id`)
) ENGINE=MyISAM AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `facture`
--

INSERT INTO `facture` (`facture_id`, `id_client`, `total`, `debut`, `dure`, `dateDuFacture`, `nom_client`) VALUES
(1, 1, 2, '2023-07-07 20:12:17', 1, '2023-07-07 23:12:31', ''),
(2, 13, 2, '2023-07-07 20:12:34', 1, '2023-07-07 23:12:54', ''),
(3, 49, 55, '2023-07-07 20:13:05', 5, '2023-07-07 23:13:17', ''),
(4, 50, 4, '2023-07-07 20:13:05', 4, '2023-07-07 23:13:17', ''),
(5, 53, 0, '2023-07-05 16:40:56', 0, '2023-07-07 23:26:43', ''),
(6, 53, 0, '2023-07-05 16:40:56', 0, '2023-07-07 23:44:21', ''),
(7, 53, 0, '2023-07-05 16:40:56', 0, '2023-07-07 23:44:49', ''),
(8, 0, 0, '0000-00-00 00:00:00', 0, '2023-07-07 23:45:37', ''),
(22, 64, 0, '0000-00-00 00:00:00', 3, '2023-07-25 21:23:53', '');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
