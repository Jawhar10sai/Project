-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  lun. 04 mai 2020 à 16:28
-- Version du serveur :  10.4.8-MariaDB
-- Version de PHP :  7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `tableau_de_bord`
--

-- --------------------------------------------------------

--
-- Structure de la table `tbl_performance_liv`
--

CREATE TABLE `tdb_performance_liv` (
  `mat` int(11) NOT NULL,
  `agence` int(11) NOT NULL,
  `nom` varchar(100) NOT NULL,
  `lib_ville` varchar(50) NOT NULL,
  `date_generation` datetime NOT NULL,
  `dateedition` date NOT NULL,
  `nbrcolis` decimal(10,0) NOT NULL,
  `nbrpos` bigint(20) NOT NULL,
  `total` bigint(20) NOT NULL,
  `nonlivre` decimal(10,0) NOT NULL,
  `nonlivrelivreur` decimal(10,0) NOT NULL,
  `CAS10` decimal(10,0) NOT NULL,
  `CAS12` decimal(10,0) NOT NULL,
  `CAS14` decimal(10,0) NOT NULL,
  `CAS16` decimal(10,0) NOT NULL,
  `CAS18` decimal(10,0) NOT NULL,
  `CAS20` decimal(10,0) NOT NULL,
  `CAS22` decimal(10,0) NOT NULL,
  `CAS23` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
