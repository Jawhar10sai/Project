-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  jeu. 13 fév. 2020 à 11:02
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
-- Base de données :  `taxation_test`
--

-- --------------------------------------------------------

--
-- Structure de la table `client_lve`
--

CREATE TABLE `client_lve_two` (
  `CLIENT_ID` int(11) NOT NULL,
  `CLIENT_COD` char(8) NOT NULL,
  `NOM` varchar(250) NOT NULL,
  `PRENOM` varchar(250) DEFAULT NULL,
  `CIVILITE_COD` char(2) NOT NULL,
  `CLIENT_TYP` char(2) NOT NULL,
  `IDENTITE_TYP` char(2) DEFAULT NULL,
  `IDENTITE_VAL` varchar(16) DEFAULT NULL,
  `ID_FISCALE` varchar(16) DEFAULT NULL,
  `CAPITAL_SOC` decimal(50,0) DEFAULT NULL,
  `CREATION_DAT` date DEFAULT NULL,
  `CLIENT_ETA` char(1) DEFAULT NULL,
  `MOTIF_ETA` int(11) DEFAULT NULL,
  `SECTEUR_COD` char(5) DEFAULT NULL,
  `EMPLOYE_ID` int(11) DEFAULT NULL,
  `SAISIE_DAT` date DEFAULT NULL,
  `AGENCE_COD` char(4) DEFAULT NULL,
  `CLIENT_COD2` varchar(32) DEFAULT NULL,
  `debinterval` int(11) NOT NULL,
  `fininterval` int(11) NOT NULL,
  `intervalag_deb` int(11) NOT NULL,
  `intervalag_fin` int(11) NOT NULL,
  `commentaire` varchar(80) DEFAULT NULL,
  `mail` varchar(50) DEFAULT NULL,
  `ICE` varchar(50) DEFAULT NULL,
  `adresse` text DEFAULT NULL,
  `ville` varchar(250) DEFAULT NULL,
  `telephone` varchar(250) DEFAULT NULL,
  `login` varchar(250) DEFAULT NULL,
  `mot_de_passe` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `client_lve`
--

INSERT INTO `client_lve_two` (`CLIENT_ID`, `CLIENT_COD`, `NOM`, `PRENOM`, `CIVILITE_COD`, `CLIENT_TYP`, `IDENTITE_TYP`, `IDENTITE_VAL`, `ID_FISCALE`, `CAPITAL_SOC`, `CREATION_DAT`, `CLIENT_ETA`, `MOTIF_ETA`, `SECTEUR_COD`, `EMPLOYE_ID`, `SAISIE_DAT`, `AGENCE_COD`, `CLIENT_COD2`, `debinterval`, `fininterval`, `intervalag_deb`, `intervalag_fin`, `commentaire`, `mail`, `ICE`, `adresse`, `ville`, `telephone`, `login`, `mot_de_passe`) VALUES
(1, '11129', 'SYNTHEMEDIC', 'Medic', '1', '1', 'de', NULL, '852963741', '40000055', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'E0000', 3041, 3400, 3004, 3020, NULL, 'SYNTHEMEDIC@contact.com', 'SY1515152323', 'BD CHEFCHAOUNI ROUTE 110KM 10,30 SIDI BERNOUSSI', 'Casablanca', '0522334455', '11129', '11129'),
(2, '11178', 'Samsung', '', '', '1', 'de', NULL, '74185296633', '9999999999', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'S0000', 4000, 4200, 4001, 4020, NULL, 'support@samsung.com', 'SS8589965856', 'Casanershore', 'Casablanca', '0522444444', '11178', '11178'),
(3, '552623', 'Canon', 'INC', '', '1', 'de', NULL, '5444755485', '200000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'C0000', 1005, 2000, 1000, 1020, NULL, 'canoninc@gmail.com', '4454755485', '73 bd Molay Ismail', 'Casablanca', '0522666666', '444545', '444545'),
(4, '78999', 'HP', 'Tec', '', '1', 'de', NULL, '7844444458', '300000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'H0000', 5006, 5200, 5000, 5000, NULL, 'hptec@gmail.com', 'hp789523658', '73 bd Med V', 'Casablanca', '0522777777', '78999', '78999'),
(5, '74444', 'Huawei', 'Tec', '', '1', 'de', NULL, '4585859568', '4585859568', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'HU00', 80003, 80200, 80001, 80020, NULL, 'huawei@support.com', '745858585', '73 rue victor hugo', 'Casablanca', '0522242424', '74444', '74444'),
(6, '88888', 'BOSH', 'log', '', '1', 'de', NULL, '4585866666', '78000000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'B002D', 90002, 90200, 90001, 90020, NULL, 'BOSHlog@BOSH.fr', '8585858747', '73 rue des graves', 'Casablanca', '0522266666', '88888', '88888'),
(7, '99999', 'Apple', 'Tech', '', '', 'de', NULL, '666665253362', '51204120000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'A0000', 5001, 5200, 13, 23, NULL, 'apple@support.apple.com', '8585556856', '73 rue Enbu Al arabi', 'Casablanca', '0522568956', '99999', '99999'),
(8, '784596', 'Logi', 'Prod', '', '', 'de', NULL, '5522356455', '400000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'L000L', 5500, 5700, 0, 0, NULL, 'logisupport@loprod.com', '5487544578', '50 rue Al jiahna Bernoussi', 'Casablanca', '0522656356', 'Logigi99', 'Logigi99'),
(9, '963258', 'Oumatech', ' ', '', '', NULL, NULL, '25445441e544', '502541000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'E00', 2500, 3500, 0, 0, NULL, 'oumatech@gmail.com', '4124121452', 'bd omar el khayam', 'Casablanca', '0522412141', '963258', '852369'),
(10, '85658', 'Aksal', NULL, '', '', 'de', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-10-18', NULL, 'E000', 1001, 2000, 1010, 1020, NULL, 'n.bouadib@groupaksal.com', '000035911000015', '1, Angle Boulevard de la Corniche et Boulevard de l’Océan Atlantique, Ain Diab. Casablanca', 'Casablanca', '0522792121', '85658', '85658');
(11, '85658', 'Aksàl', NULL, '', '', 'de', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-10-18', NULL, 'E000', 1001, 2000, 1010, 1020, NULL, 'n.bouadib@groupaksal.com', '000035911000015', '1, Angle téééstsééé, Ain Diab. Casablanca', 'Casablanca', '0522792121', '85658', '85658');
--
-- Index pour les tables déchargées
--

--
-- Index pour la table `client_lve`
--
ALTER TABLE `client_lve_two`
  ADD PRIMARY KEY (`CLIENT_ID`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `client_lve`
--
ALTER TABLE `client_lve_two`
  MODIFY `CLIENT_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
