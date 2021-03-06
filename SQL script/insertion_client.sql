-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3307
-- Généré le :  ven. 13 déc. 2019 à 12:13
-- Version du serveur :  10.3.16-MariaDB
-- Version de PHP :  7.3.7

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

CREATE TABLE `client_lve` (
  `CLIENT_ID` int(11) NOT NULL,
  `CLIENT_COD` varchar(20) NOT NULL,
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
  `mot_de_passe` varchar(250) DEFAULT NULL,
  `id_groupe` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `client_lve`
--

INSERT INTO `client_lve` (`CLIENT_COD`, `NOM`, `PRENOM`, `CIVILITE_COD`, `CLIENT_TYP`, `IDENTITE_TYP`, `IDENTITE_VAL`, `ID_FISCALE`, `CAPITAL_SOC`, `CREATION_DAT`, `CLIENT_ETA`, `MOTIF_ETA`, `SECTEUR_COD`, `EMPLOYE_ID`, `SAISIE_DAT`, `AGENCE_COD`, `CLIENT_COD2`, `debinterval`, `fininterval`, `intervalag_deb`, `intervalag_fin`, `commentaire`, `mail`, `ICE`, `adresse`, `ville`, `telephone`, `login`, `mot_de_passe`) 
VALUES
( '14946', 'WORLD SYNERGY', NULL, '', '', 'de', NULL, NULL, NULL, '2019-11-20', NULL, NULL, NULL, NULL, NULL, NULL, 'E00', 52010, 53010, 52010, 52020, NULL, NULL, NULL, NULL, NULL, NULL, 'Worldlve19', 'Worldlve*19'),
( '276', 'TOP BUSINESS', NULL, '', '', 'de', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'E00', 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, 'TB', 'a'),
( '9616', 'BSH Electroménagers S.A', NULL, '', '', 'de', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'E00', 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, 'BSH', 'lvbhs17'),
( '278', 'PROCTER AND GAMBLE DISTRIBUTION MOROCCO ', NULL, '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'E00', 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, 'pg', 'pglv2017*'),
( '279', 'SOMAPAF', NULL, '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'E00', 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, 'somapaf', 'solvepaf17'),
( '280', 'VISION CLIM', NULL, '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'E00', 20530, 210530, 20530, 20540, NULL, NULL, NULL, NULL, NULL, NULL, 'vision', 'climlve10'),
( '281', 'SODIREP BAT', NULL, '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'E00', 20530, 210530, 20530, 20540, NULL, NULL, NULL, NULL, NULL, NULL, 'sodirep', 'sodireplve17'),
( '282', 'SODIREP CLS', NULL, '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'E00', 20530, 210530, 20530, 20540, NULL, NULL, NULL, NULL, NULL, NULL, 'sodirepcls', 'sodilve2017'),
( '283', 'SOMAPAF 2', NULL, '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'E00', 20530, 210530, 20530, 20540, NULL, NULL, NULL, NULL, NULL, NULL, 'somapaf', 'somapaflve17'),
( '9780', 'TEKA', NULL, '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'E00', 20530, 210530, 20530, 20540, NULL, NULL, NULL, NULL, NULL, NULL, 'teka', 'tekalve17'),
( '285', 'FRANKE ', NULL, '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'E00', 20530, 210530, 20530, 20540, NULL, NULL, NULL, NULL, NULL, NULL, 'franke', 'frankelve17'),
( '286', 'FIRST MARK', NULL, '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'E00', 20530, 210530, 20530, 20540, NULL, NULL, NULL, NULL, NULL, NULL, 'firstmark', 'firstlve170'),
( '287', 'PROMAMEC', NULL, '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'E00', 20530, 210530, 20530, 20540, NULL, NULL, NULL, NULL, NULL, NULL, 'pro', 'prolve171'),
( '288', 'PROMAMEC', NULL, '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'E00', 20530, 210530, 20530, 20540, NULL, NULL, NULL, NULL, NULL, NULL, 'pro', 'prolve172'),
( '289', 'MUTICOLLES', NULL, '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'E00', 20530, 210530, 20530, 20540, NULL, NULL, NULL, NULL, NULL, NULL, 'muticolles', 'muticolve173'),
( '290', 'ALEX', NULL, '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'E00', 20530, 210530, 20530, 20540, NULL, NULL, NULL, NULL, NULL, NULL, 'alex', 'alexlve174'),
( '3591', 'DBM', NULL, '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'E00', 20530, 210530, 20530, 20540, NULL, NULL, NULL, NULL, NULL, NULL, 'dbm', 'dbmlve175'),
( '362', 'SICLA', NULL, '', '', 'de', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'E00', 20531, 210530, 20530, 20540, NULL, NULL, NULL, NULL, NULL, NULL, 'sicla', 'sicla*lve19'),
( '293', 'SAH MAROC', NULL, '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'E00', 20530, 210530, 20530, 20540, NULL, NULL, NULL, NULL, NULL, NULL, 'sahmaroc', 'sahlve177'),
( '294', 'CIB GROUPE', NULL, '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'E00', 20530, 210530, 20530, 20540, NULL, NULL, NULL, NULL, NULL, NULL, 'cib', 'ciblve178'),
( '295', 'KOMAX', NULL, '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'E00', 20530, 210530, 20530, 20540, NULL, NULL, NULL, NULL, NULL, NULL, 'komax', 'komaxlve179'),
( '12617', 'FMCG', NULL, '', '', 'de', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'CE00', 20530, 20580, 20530, 20540, NULL, NULL, NULL, NULL, NULL, NULL, 'fmcg', 'fmcglve17'),
( '297', 'UNICYCLES', NULL, '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'E00', 20530, 210530, 20530, 20540, NULL, NULL, NULL, NULL, NULL, NULL, 'unicycles', 'unicycleslve179'),
( '298', 'COATS', NULL, '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'E00', 20530, 210530, 20530, 20540, NULL, NULL, NULL, NULL, NULL, NULL, 'coats', 'coatslve171'),
( '299', 'INGELEC', NULL, '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'E00', 20530, 210530, 20530, 20540, NULL, NULL, NULL, NULL, NULL, NULL, 'ingelec', 'ingeleclve172'),
( '300', 'ROBERT BOSCH', NULL, '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'E00', 20530, 210530, 20530, 20540, NULL, NULL, NULL, NULL, NULL, NULL, 'robertb', 'robertlve173'),
( '301', 'TOP 2000', NULL, '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'E00', 20530, 210530, 20530, 20540, NULL, NULL, NULL, NULL, NULL, NULL, 'top2000', 'top2000lve1'),
( '302', 'INTRALOT', NULL, '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'E00', 20530, 210530, 20530, 20540, NULL, NULL, NULL, NULL, NULL, NULL, 'intra', 'intralve174'),
( '303', 'TOP BUSNESS', NULL, '', '', 'de', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'E00', 20530, 210530, 20530, 20540, NULL, NULL, NULL, NULL, NULL, NULL, 'topbusness', 'topbusness18'),
( '304', 'SIMEC', NULL, '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'E00', 20530, 210530, 20530, 20540, NULL, NULL, NULL, NULL, NULL, NULL, 'simec', 'simeclve17'),
( '305', 'HENRY\'S', NULL, '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'E00', 20530, 210530, 20530, 20540, NULL, NULL, NULL, NULL, NULL, NULL, 'henrys', 'henryslve17'),
( '306', 'ROCAMORA', NULL, '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'E00', 20530, 210530, 20530, 20540, NULL, NULL, NULL, NULL, NULL, NULL, 'rocamora', 'rocalve17'),
( '307', 'BAYER', NULL, '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'E00', 20530, 210530, 20530, 20540, NULL, NULL, NULL, NULL, NULL, NULL, 'bayer', 'bayerlve17'),
( '308', 'SAVOLA', NULL, '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'E00', 20530, 210530, 20530, 20540, NULL, NULL, NULL, NULL, NULL, NULL, 'savola', 'savolalve17'),
( '309', 'SAPRESS', NULL, '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'E00', 20530, 210530, 20530, 20540, NULL, NULL, NULL, NULL, NULL, NULL, 'sapress', 'sapresslve17'),
( '310', 'AUTO DISTRIBUTION MAROC', NULL, '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'E00', 20530, 210530, 20530, 20540, NULL, NULL, NULL, NULL, NULL, NULL, 'a.distribution', 'dlve2017'),
( '311', 'SANCELLA MAROC', NULL, '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'E00', 20530, 210530, 20530, 20540, NULL, NULL, NULL, NULL, NULL, NULL, 's.maroc', 'sanlve2017'),
( '312', 'COTRA FOOD MOROCCO', NULL, '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'E00', 20530, 210530, 20530, 20540, NULL, NULL, NULL, NULL, NULL, NULL, 'c.food', 'foodmaroc*17'),
( '313', 'BOTTU ', NULL, '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'E00', 20530, 210530, 20530, 20540, NULL, NULL, NULL, NULL, NULL, NULL, 'bottu', 'bottulve'),
( '314', 'ECOLAB', NULL, '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'E00', 20530, 210530, 20530, 20540, NULL, NULL, NULL, NULL, NULL, NULL, 'ecolab', 'ecolablve'),
( '12692', 'DISTY', NULL, '', '', 'de', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'E00', 20530, 210530, 20530, 20540, NULL, NULL, NULL, NULL, NULL, NULL, 'disty', 'distylve'),
( '316', 'ITEX', NULL, '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'E00', 20530, 210530, 20530, 20540, NULL, NULL, NULL, NULL, NULL, NULL, 'itex', 'itexlve'),
( '13890', 'JOTUN MAROC', NULL, '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'E00', 20530, 210530, 20530, 20540, NULL, NULL, NULL, NULL, NULL, NULL, 'JOTUN', 'JOTUNLVE18'),
( '317', 'SIRMEL', NULL, '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'E00', 20530, 210530, 20530, 20540, NULL, NULL, NULL, NULL, NULL, NULL, 'SIRMEL', 'SIRMEL*LVE'),
( '2450', 'KAUFMANN', NULL, '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'E00', 20530, 210530, 20530, 20540, NULL, NULL, NULL, NULL, NULL, NULL, 'kaufmann', 'KAUFMANN*LVE19'),
( '14528', 'AUTOPLUS (MAGHREB ACCESSOIRES)', NULL, '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'E00', 20530, 210530, 20530, 20540, NULL, NULL, NULL, NULL, NULL, NULL, 'AUTOPLUS', 'AUTOPLUS*LVE2019'),
( '14657', 'SOFTRETAIL', NULL, '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'E00', 20530, 210530, 20530, 20540, NULL, NULL, NULL, NULL, NULL, NULL, 'SOFTRETAIL', 'SOFTR*LVE2019'),
( '4589', 'BRINKS MAROC', NULL, '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'E00', 20530, 210530, 20530, 20540, NULL, NULL, NULL, NULL, NULL, NULL, 'BRINKS', 'BRINKSLVE*2019'),
( '14714', 'DISWAY', NULL, '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'E00', 20530, 210530, 20530, 20540, NULL, NULL, NULL, NULL, NULL, NULL, 'DISWAY', 'DISWAY*LVE'),
( '10512', 'CALLIOPE', NULL, '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'E00', 20530, 210530, 20530, 20540, NULL, NULL, NULL, NULL, NULL, NULL, 'CALLIOPE', 'CALLIOPE*LVE19'),
( '14914', 'LIBREDIS', NULL, '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'E00', 20530, 210530, 20530, 20540, NULL, NULL, NULL, NULL, NULL, NULL, 'LIBREDIS', 'LIBREDIS*LVE19'),
( '14946', 'WORLD SYNERGY', NULL, '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'E00', 20530, 210530, 20530, 20540, NULL, NULL, NULL, NULL, NULL, NULL, 'world', 'worldlve19'),
( '9233', 'TM TRADING MOROCCO', NULL, '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'E00', 20530, 210530, 20530, 20540, NULL, NULL, NULL, NULL, NULL, NULL, 'tmtrading', 'tmtradinglve19'),
( '15038', 'SISAL LOTERIE MAROC', NULL, '', '', 'de', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'E00', 20530, 210530, 20530, 20540, NULL, NULL, NULL, NULL, NULL, NULL, 'sisal', 'sisallve*19');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `client_lve`
--
ALTER TABLE `client_lve`
  ADD PRIMARY KEY (`CLIENT_ID`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `client_lve`
--
ALTER TABLE `client_lve`
  MODIFY `CLIENT_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
