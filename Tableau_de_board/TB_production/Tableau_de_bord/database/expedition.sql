-- phpMyAdmin SQL Dump
-- version 4.0.9
-- http://www.phpmyadmin.net
--
-- Client: 127.0.0.1
-- Généré le: Mar 05 Mai 2020 à 12:06
-- Version du serveur: 5.5.34
-- Version de PHP: 5.4.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `lvedbmobile`
--

-- --------------------------------------------------------

--
-- Structure de la table `expedition`
--

CREATE TABLE IF NOT EXISTS `expedition` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `courrierid` int(11) NOT NULL,
  `numero` varchar(50) NOT NULL,
  `datesaisie` varchar(40) NOT NULL,
  `colis` int(11) NOT NULL,
  `poids` int(11) NOT NULL,
  `palettes` int(11) NOT NULL,
  `valeur` int(11) NOT NULL,
  `expediteur` text NOT NULL,
  `destinataire` text NOT NULL,
  `code_expediteur` int(11) NOT NULL,
  `code_destinataire` int(11) NOT NULL,
  `ville1` text NOT NULL,
  `ville2` text NOT NULL,
  `adresse1` text NOT NULL,
  `adresse2` text NOT NULL,
  `port` text NOT NULL,
  `payement` text NOT NULL,
  `ttc` float NOT NULL,
  `espece` float NOT NULL,
  `cheque` float NOT NULL,
  `traite` float NOT NULL,
  `bl` int(11) NOT NULL,
  `ttcrecup` float NOT NULL,
  `especerecup` float NOT NULL,
  `chequerecup` float NOT NULL,
  `traiterecup` float NOT NULL,
  `blrecup` int(11) NOT NULL,
  `bonconsignation` int(11) NOT NULL,
  `livraisoncode` int(11) NOT NULL,
  `livraisondate` datetime DEFAULT NULL,
  `motif` int(11) NOT NULL,
  `numerocl` varchar(50) NOT NULL,
  `lattitude` varchar(100) NOT NULL,
  `longitude` varchar(100) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `unique_index` (`numero`,`numerocl`),
  KEY `livraisoncode` (`livraisoncode`),
  KEY `numero` (`numero`),
  KEY `code_destinataire` (`code_destinataire`),
  KEY `livraisondate` (`livraisondate`),
  KEY `motif` (`motif`),
  KEY `numerocl` (`numerocl`),
  KEY `courrierid` (`courrierid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6946144 ;

--
-- Contenu de la table `expedition`
--

INSERT INTO `expedition` (`id`, `courrierid`, `numero`, `datesaisie`, `colis`, `poids`, `palettes`, `valeur`, `expediteur`, `destinataire`, `code_expediteur`, `code_destinataire`, `ville1`, `ville2`, `adresse1`, `adresse2`, `port`, `payement`, `ttc`, `espece`, `cheque`, `traite`, `bl`, `ttcrecup`, `especerecup`, `chequerecup`, `traiterecup`, `blrecup`, `bonconsignation`, `livraisoncode`, `livraisondate`, `motif`, `numerocl`, `lattitude`, `longitude`) VALUES
(1, 3548568, 'B00489315', '', 0, 0, 0, 0, 'MAISON', 'MARJANE', 0, 0, 'CASABLANCA', 'CASABLANCA', '', 'CASABLANCA', 'P', 'C', 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, '0000-00-00 00:00:00', 0, 'CL1001603861', '', ''),
(2, 3547532, 'B00508714', '', 0, 0, 0, 0, 'PERFECT', 'MARJANE', 0, 0, 'CASABLANCA', 'CASABLANCA', '', '', 'P', 'C', 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, '0000-00-00 00:00:00', 0, 'CL1001603861', '', ''),
(3, 3548740, 'B0404272', '', 0, 0, 0, 0, 'SIMEC', 'MARJANE', 0, 0, 'CASABLANCA', 'CASABLANCA', '', '', 'P', 'C', 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, '0000-00-00 00:00:00', 0, 'CL1001603861', '', ''),
(4, 3548099, 'B0413223', '', 0, 0, 0, 0, '', '', 0, 0, '', '', '', '', '', '', 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, '0000-00-00 00:00:00', 0, 'CL1001603861', '', ''),
(5, 3547424, 'B0444748', '', 0, 0, 0, 0, 'BSH', 'MARJANE', 0, 0, 'CASABLANCA', 'CASABLANCA', '', '', 'P', 'C', 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, '0000-00-00 00:00:00', 0, 'CL1001603861', '', ''),
(6, 3547369, 'B0444749', '', 0, 0, 0, 0, 'BSH', 'MARJANE', 0, 0, 'CASABLANCA', 'CASABLANCA', '', '', 'P', 'C', 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, '0000-00-00 00:00:00', 0, 'CL1001603861', '', ''),
(7, 3548556, 'B00505785', '', 1, 7, 0, 0, 'NESS', 'ACIMA', 0, 0, 'CASABLANCA', 'CASABLANCA', '', '', 'P', 'C', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '0000-00-00 00:00:00', 0, 'CL1001603892', '', ''),
(8, 3549081, 'B0444857', '', 3, 50, 0, 0, 'MAISON', 'MARJANE', 0, 0, 'CASABLANCA', 'CASABLANCA', '', 'CASABLANCA', 'P', 'C', 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, '0000-00-00 00:00:00', 0, 'CL1001603892', '', ''),
(9, 3549121, 'B0444891', '', 3, 50, 0, 0, 'MAISON', 'MARJANE', 0, 0, 'CASABLANCA', 'CASABLANCA', '', 'CASABLANCA', 'P', 'C', 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, '0000-00-00 00:00:00', 0, 'CL1001603892', '', ''),
(10, 3549143, 'B0444896', '', 1, 0, 0, 0, 'BSH', 'COMPTOIR', 0, 0, 'CASABLANCA', 'CASABLANCA', '', '', 'P', 'C', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '0000-00-00 00:00:00', 0, 'CL1001603892', '', ''),
(11, 3595811, '999B00513183', '', 0, 0, 0, 0, '', '', 0, 0, '', '', '', '', '', '', 184.98, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '0000-00-00 00:00:00', 0, 'CL1001605516', '', ''),
(12, 3598691, 'B00492155', '22/06/2016', 5, 150, 0, 0, 'MOUSSA BOUJETOY', 'PA AISSA', 0, 0, 'TETOUAN', 'CASABLANCA', '', '', 'D', 'G ', 200, 0, 0, 9500, 0, 0, 0, 0, 0, 0, 0, 0, NULL, 0, 'CL1001605572', '', ''),
(13, 3598703, 'B00492227', '', 1, 20, 0, 0, 'MAFROCHAT', 'KADIRI', 0, 0, 'TETOUAN', 'CASABLANCA', '', '', 'D', 'G', 132.59, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '0000-00-00 00:00:00', 0, 'CL1001605516', '', ''),
(14, 3598721, 'B00498473', '', 0, 0, 0, 0, '', '', 0, 0, '', '', '', '', '', '', 0, 0, 4828.2, 0, 1, 0, 0, 0, 0, 0, 0, 0, '0000-00-00 00:00:00', 0, 'CL1001605516', '', ''),
(15, 3598843, 'B00515881', '', 1, 2, 0, 0, 'MAROC', 'SGS', 0, 0, '', '', '', '67', 'D', 'C', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '0000-00-00 00:00:00', 0, 'CL1001605516', '', ''),
(16, 3599660, 'B00531381', '', 0, 0, 0, 0, '', '', 0, 0, '', '', '', '', '', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '0000-00-00 00:00:00', 0, 'CL1001605516', '', ''),
(17, 3597263, 'B00534047', '', 15, 150, 0, 0, 'AZDOUFEL', 'FAOUZI', 0, 0, 'NADOR', 'CASABLANCA', '', '', 'D', 'G', 300, 0, 0, 0, 0, 300, 0, 0, 0, 0, 0, 0, '0000-00-00 00:00:00', 0, 'CL1001605516', '', ''),
(18, 3598637, 'B00540528', '', 1, 3, 0, 0, 'S', 'SGS', 0, 0, '', '', '', '67', 'D', 'C', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '0000-00-00 00:00:00', 0, 'CL1001605516', '', ''),
(19, 3598327, 'B00545104', '', 1, 2, 0, 0, 'ZOUBAIRI', 'ZOUBAIRI', 0, 0, 'MARRAKECH', 'CASABLANCA', '', '', 'P', 'G', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '0000-00-00 00:00:00', 0, 'CL1001605516', '', ''),
(20, 3598224, 'B00545143', '', 1, 14, 0, 0, 'DECO', 'ZAKARIA', 0, 0, 'MARRAKECH', 'CASABLANCA', '', '', 'D', 'G', 112.03, 0, 0, 0, 0, 112.03, 0, 0, 0, 0, 0, 0, '0000-00-00 00:00:00', 0, 'CL1001605516', '', ''),
(21, 3598334, 'B00552031', '22/06/2016', 1, 4, 0, 0, 'ASWAK SALAM', 'PLACIPRO SARL', 0, 5495, 'KENITRA', 'CASABLANCA', '', '80 BD SIDI ABDERRAHMAN BEAUSEJOUR RES. JAWHARA APP', 'D', 'C ', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, 0, 'CL1001605572', '', ''),
(22, 3598388, 'B00556376', '', 1, 2, 0, 0, 'SOUFFIANE', 'RACHID', 0, 0, 'AIT', '', '', '', 'P', 'G', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, '0000-00-00 00:00:00', 0, 'CL1001605516', '', ''),
(23, 3598704, 'B00560437', '', 2, 10, 0, 0, 'NOVAVISION', 'BYMARO', 0, 0, 'FES', 'CASABLANCA', '', '', 'P', 'C', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, '0000-00-00 00:00:00', 0, 'CL1001605516', '', '')
