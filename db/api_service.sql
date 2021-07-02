-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 02, 2021 at 07:12 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `api_service`
--

-- --------------------------------------------------------

--
-- Table structure for table `compte`
--

CREATE TABLE `compte` (
  `numero_compte` int(11) NOT NULL,
  `accord_sms` int(11) NOT NULL,
  `accord_email` int(11) NOT NULL,
  `adresse` varchar(255) DEFAULT NULL,
  `chemin_image` varchar(255) DEFAULT NULL,
  `code_api` varchar(255) DEFAULT NULL,
  `credit` double NOT NULL,
  `date_creation` datetime DEFAULT NULL,
  `gsm_contact` varchar(255) DEFAULT NULL,
  `login_api` varchar(255) DEFAULT NULL,
  `mel_contact` varchar(255) DEFAULT NULL,
  `nom_contact` varchar(255) DEFAULT NULL,
  `password_api` varchar(255) DEFAULT NULL,
  `prenom_contact` varchar(255) DEFAULT NULL,
  `raison_sociale` varchar(255) DEFAULT NULL,
  `service` varchar(255) DEFAULT NULL,
  `souffrance` double NOT NULL,
  `tel_fixe_1` varchar(255) DEFAULT NULL,
  `tel_fixe_2` varchar(255) DEFAULT NULL,
  `ville_siege` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `compte`
--

INSERT INTO `compte` (`numero_compte`, `accord_sms`, `accord_email`, `adresse`, `chemin_image`, `code_api`, `credit`, `date_creation`, `gsm_contact`, `login_api`, `mel_contact`, `nom_contact`, `password_api`, `prenom_contact`, `raison_sociale`, `service`, `souffrance`, `tel_fixe_1`, `tel_fixe_2`, `ville_siege`) VALUES
(34004, 1, 1, '19, Rue Abou Bakr Ibnou Koutaia - Ain Sebaa', 'C:\\dev\\back_office-v1.2\\nom fichier logo.png', 'xSqj@AyTdRG>PQ.M019<:n6pv(JC-H&V', 60000, '2020-02-27 00:00:00', '0661421031', '5ACiP8dmE0un', 'karam_mel', 'TALAL', 'jEJAnSxaLPu8GHqr', 'Karam', 'La Voie EXPRESS 2', 'En Service', 30, '0522344316', '0522343333', ' Casablanca ');

-- --------------------------------------------------------

--
-- Table structure for table `consigne`
--

CREATE TABLE `consigne` (
  `num_serie_consigne` int(11) NOT NULL,
  `etat` varchar(255) DEFAULT NULL,
  `gps_latitude` varchar(255) DEFAULT NULL,
  `gps_localisation` varchar(255) DEFAULT NULL,
  `gps_longitude` varchar(255) DEFAULT NULL,
  `adresse` varchar(255) DEFAULT NULL,
  `adresse_ip` varchar(255) DEFAULT NULL,
  `date_affectation` varchar(255) DEFAULT NULL,
  `date_creation_consigne` varchar(255) DEFAULT NULL,
  `modele` varchar(255) DEFAULT NULL,
  `nbre_de_casier` int(11) NOT NULL,
  `ville_affectation` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `consigne`
--

INSERT INTO `consigne` (`num_serie_consigne`, `etat`, `gps_latitude`, `gps_localisation`, `gps_longitude`, `adresse`, `adresse_ip`, `date_affectation`, `date_creation_consigne`, `modele`, `nbre_de_casier`, `ville_affectation`) VALUES
(1000, 'En Service', '-7.6336534', '', '33.5947324', 'Face Lycee Lyautey - Boulevard Ziraoui ', '555.444.333.001', 'Fri, 28 Feb 2020 00:00:00 GMT', 'Fri, 28 Feb 2020 00:00:00 GMT', ' Standard ', 264, ' casablanca '),
(1001, 'En Service', '-7.6261573', '', '33.5731546', 'Station Service TOTAL - 212, Boulevard Abdelmoumen', '999.100.100.100', 'Wed, 23 Sep 2020 00:00:00 GMT', 'Fri, 27 Jan 2017 00:00:00 GMT', ' Tropical ', 256, ' casablanca '),
(1002, 'En Service', '-7.6639114', '', '33.5986969', 'Anfa Place - Parking 1er Sous-Sol - Entree VIRGIN', '559.625.521.001', 'Wed, 23 Sep 2020 00:00:00 GMT', 'Fri, 13 Sep 2019 00:00:00 GMT', 'Standard', 42, 'casablanca'),
(1003, 'En Service', '-7.6335770', '', '33.5869790', 'Face Zara - 46, Rue Avignon Bd Massira El Khadra', '589.625.321.007', 'Wed, 23 Sep 2020 00:00:00 GMT', 'Wed, 04 Sep 2019 00:00:00 GMT', ' Standard ', 128, ' casablanca '),
(1004, 'En Service', '-7.6098930', '', '33.4955491', 'Universite - UIC - Route Provinciale 3020', '198.605.321.007', 'Wed, 23 Sep 2020 00:00:00 GMT', 'Tue, 09 Jul 2019 00:00:00 GMT', ' Standard ', 128, ' casablanca '),
(1041, 'En Service', '-7.0236', '', '33.7812', 'Parking Electroplanet', '523.085.821.001', 'Thu, 17 Dec 2020 00:00:00 GMT', 'Thu, 17 Dec 2020 00:00:00 GMT', ' Classic OutDoor ', 512, ' rabat '),
(1042, 'En Service', '-7.2521', '', '33.7410', '12, bd Abdelmoumen', '855.205.651.088', 'Thu, 17 Dec 2020 00:00:00 GMT', 'Thu, 17 Dec 2020 00:00:00 GMT', ' Classic InDoor ', 256, ' mohammedia '),
(1045, 'En Service', '-7.2589', '', '33.5067', 'Face Magasin Mr Bricolage - Marjane', '856.445.021.058', 'Fri, 18 Dec 2020 00:00:00 GMT', 'Fri, 18 Dec 2020 00:00:00 GMT', ' Classic OutDoor ', 999, ' casablanca '),
(1046, 'En Service', '-7.3658', '', '33.4267', 'Bricoma - Sidi Maarouf', '289.605.111.111', 'Fri, 18 Dec 2020 00:00:00 GMT', 'Fri, 18 Dec 2020 00:00:00 GMT', ' Classic OutDoor ', 999, ' rabat '),
(1047, 'En Service', '-8.2589', '', '37.4587', '12 Avenue des Oasis', '459.675.021.801', 'Fri, 18 Dec 2020 00:00:00 GMT', 'Fri, 18 Dec 2020 00:00:00 GMT', ' Tropical ', 512, ' casablanca '),
(1048, 'En Service', '-8.0002', '', '33.5098', '12 av des Perdrix', '569.555.371.852', 'Fri, 18 Dec 2020 00:00:00 GMT', 'Fri, 18 Dec 2020 00:00:00 GMT', ' Classic OutDoor ', 512, ' rabat '),
(1050, 'En Service', '-7.3335', '', '33.7461', '15,  Place du 21 Novembre', '785.125.111.045', 'Sat, 19 Dec 2020 00:00:00 GMT', 'Sat, 19 Dec 2020 00:00:00 GMT', ' Classic InDoor ', 256, ' casablanca '),
(1051, 'En Service', '-7.2547', '', '33.4062', 'avenue de l\'Independance', '489.605.301.007', 'Sat, 19 Dec 2020 00:00:00 GMT', 'Sat, 19 Dec 2020 00:00:00 GMT', ' Classic InDoor ', 512, ' tetouan '),
(1052, 'En Service', '-5.0205', '', '32.4512', 'Face Mac Do - 39 rue benezet Casablanca', '125.625.321.008', 'Wed, 30 Dec 2020 00:00:00 GMT', 'Thu, 07 Dec 2017 00:00:00 GMT', ' Classic InDoor ', 128, ' oujda '),
(1053, 'En Service', '-9.1254', '', '30.8753', 'test du champ', '589.625.321.001', 'Thu, 31 Dec 2020 00:00:00 GMT', 'Thu, 31 Dec 2020 00:00:00 GMT', ' Standard ', 256, ' casablanca '),
(1054, 'En Service', '-8.0025', '', '33.4568', 'test point GPS', '789.563.251.002', 'Fri, 14 Feb 2020 00:00:00 GMT', 'Fri, 14 Feb 2020 00:00:00 GMT', ' Standard ', 512, ' casablanca '),
(1055, 'En Service', '-7.7856', '', '44.2587', 'test new GPS', '789.563.251.002', 'Fri, 14 Feb 2020 00:00:00 GMT', 'Fri, 14 Feb 2020 00:00:00 GMT', ' Standard ', 36, ' casablanca '),
(1056, 'En Service', '-7.4444', '', '45.7889', 'test new new GPS2', '875.254.125.003', 'Fri, 14 Feb 2020 00:00:00 GMT', 'Fri, 14 Feb 2020 00:00:00 GMT', ' Standard ', 36, ' casablanca '),
(1057, 'En Service', '-7.5469', '', '34.5698', 'bd bir anzarane', '214.352.121.004', 'Fri, 14 Feb 2020 00:00:00 GMT', 'Fri, 14 Feb 2020 00:00:00 GMT', ' Classic OutDoor ', 128, ' casablanca '),
(1058, 'En Service', '-7.0021', '', '33.4569', 'bd Palestine', '456.236.123.001', 'Fri, 14 Feb 2020 00:00:00 GMT', 'Fri, 14 Feb 2020 00:00:00 GMT', ' Standard ', 512, ' casablanca '),
(1059, 'En Service', '-7.25631', '', '33.523652', 'avenue des Oliviers', '541.254.214.001', 'Fri, 28 Feb 2020 00:00:00 GMT', 'Fri, 28 Feb 2020 00:00:00 GMT', ' Standard ', 512, ' casablanca '),
(1060, 'En Service', '-7.50021', '', '33.2563', 'Bd roudani', '125.632.563.256', 'Fri, 28 Feb 2020 00:00:00 GMT', 'Fri, 28 Feb 2020 00:00:00 GMT', ' Standard ', 512, ' casablanca '),
(1061, 'En Service', '-7.6789', '', '34.9876', 'avenue des Auberges', '001.002.003.004', 'Fri, 28 Feb 2020 00:00:00 GMT', 'Fri, 28 Feb 2020 00:00:00 GMT', ' Standard ', 32, ' rabat '),
(1062, 'En Service', '-7.2563', '', '35.1025', '......???????.....', '256.255.320.001', 'Wed, 08 Apr 2020 00:00:00 GMT', 'Wed, 08 Apr 2020 00:00:00 GMT', ' Standard ', 56, ' tetouan '),
(1064, 'En Service', '-7-7.56485210', '', '3335.78963652', 'Golf PRESTIGIA  - Bouskoura  2-', '777.421125.520100.002111', 'Sat, 18 Apr 2020 00:00:00 GMT', 'Mon, 07 Oct 2019 00:00:00 GMT', ' Standard ', 25465, ' casablanca ');

-- --------------------------------------------------------

--
-- Table structure for table `expedition`
--

CREATE TABLE `expedition` (
  `numero_expedition` varchar(255) NOT NULL,
  `adresse_destination` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `hauteur` int(11) DEFAULT NULL,
  `id_consigne` int(11) NOT NULL,
  `largeur` int(11) DEFAULT NULL,
  `longueur` int(11) DEFAULT NULL,
  `poids` double NOT NULL,
  `status_relais` int(11) NOT NULL,
  `tel` varchar(255) DEFAULT NULL,
  `type_case` varchar(255) DEFAULT NULL,
  `message_erreur` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `expedition`
--

INSERT INTO `expedition` (`numero_expedition`, `adresse_destination`, `email`, `hauteur`, `id_consigne`, `largeur`, `longueur`, `poids`, `status_relais`, `tel`, `type_case`, `message_erreur`) VALUES
('5278732', NULL, 'y.takourt@lavoieexpress.com', 26, 1003, 41, 46, 10, 5, '0', 'M', NULL),
('5279771', NULL, 'ssssa@aa.aa', 26, 1004, 41, 46, 2, 5, '0', 'M', NULL),
('5279901', NULL, 'aaaa@aaa.aa', 56, 1001, 41, 46, 2, 1, '0', 'XL', 'SUCCESS - RESERVATION ENREGISTREE'),
('5279915', NULL, 'y.takourt@lavoieexpress.ma', NULL, 1003, NULL, NULL, 22, 2, '727000007', 'L', NULL),
('5279926', NULL, 'y.takourt@lavoieexpress.com', NULL, 1003, NULL, NULL, 2, 5, '0', 'L', NULL),
('5280281', NULL, 'y.takourt@lavoieexpress.ma', NULL, 1003, NULL, NULL, 416, 5, '727000007', 'L', NULL),
('5280339', NULL, 'y.takourt@lavoieexpress.ma', NULL, 1003, NULL, NULL, 2, 5, '727000007', 'L', NULL),
('5280366', NULL, 'y.takourt@lavoieexpress.ma', NULL, 1003, NULL, NULL, 2, 5, '727000007', 'L', NULL),
('5280395', NULL, 'y.takourt@lavoieexpress.ma', NULL, 1001, NULL, NULL, 80, 1, '727000007', 'XL', NULL),
('5280507', NULL, 'y.takourt@lavoieexpress.ma', NULL, 1001, NULL, NULL, 2, 5, '727000007', 'XL', NULL),
('5280633', NULL, 'y.takourt@lavoieexpress.ma', NULL, 1001, NULL, NULL, 210, 2, '727000007', 'XL', NULL),
('5280688', NULL, 'y.takourt@lavoieexpress.ma', NULL, 1001, NULL, NULL, 21, 2, '727000007', 'XL', NULL),
('5280689', NULL, 'y.takourt@lavoieexpress.ma', NULL, 1001, NULL, NULL, 30, 2, '727000007', 'XL', NULL),
('5768835', NULL, 'y.takourt@lavoieexpress.ma', NULL, 1001, NULL, NULL, 20, 5, '0', 'S', 'ERROR - RESERVATION EN DOUBLON'),
('5778846', NULL, '2y.takourt@lavoieexpress.ma', NULL, 1001, NULL, NULL, 20, 5, '0', 'S', NULL),
('5778849', NULL, 'aaa@aaa.aaa', NULL, 1001, NULL, NULL, 2, 5, '0', 'M', 'ERROR - RESERVATION EN DOUBLON');

-- --------------------------------------------------------

--
-- Table structure for table `expeditionr`
--

CREATE TABLE `expeditionr` (
  `numero_expedition` varchar(255) NOT NULL,
  `code_mot_passe` int(11) NOT NULL,
  `code_retrait` bigint(20) NOT NULL,
  `compte_client` int(11) NOT NULL,
  `consigne_a_reserver` varchar(255) DEFAULT NULL,
  `cout_credit` double NOT NULL,
  `cout_credit_final` double NOT NULL,
  `date_arrivee_consigne` varchar(255) DEFAULT NULL,
  `date_demande_reservation` varchar(255) DEFAULT NULL,
  `date_prise_en_charge` varchar(255) DEFAULT NULL,
  `date_retour_eventuel` varchar(255) DEFAULT NULL,
  `date_retour_final` varchar(255) DEFAULT NULL,
  `date_retrait_final` varchar(255) DEFAULT NULL,
  `gsm_destinataire` varchar(255) DEFAULT NULL,
  `id` int(11) NOT NULL,
  `mel_destinataire` varchar(255) DEFAULT NULL,
  `message_op_gsm` varchar(255) DEFAULT NULL,
  `operateur_final` int(11) NOT NULL,
  `operateur_retour` int(11) NOT NULL,
  `size_casiser_final` varchar(255) DEFAULT NULL,
  `statut` int(11) NOT NULL,
  `tailler_casier` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `expeditionr`
--

INSERT INTO `expeditionr` (`numero_expedition`, `code_mot_passe`, `code_retrait`, `compte_client`, `consigne_a_reserver`, `cout_credit`, `cout_credit_final`, `date_arrivee_consigne`, `date_demande_reservation`, `date_prise_en_charge`, `date_retour_eventuel`, `date_retour_final`, `date_retrait_final`, `gsm_destinataire`, `id`, `mel_destinataire`, `message_op_gsm`, `operateur_final`, `operateur_retour`, `size_casiser_final`, `statut`, `tailler_casier`) VALUES
('5278732', 0, 0, 34004, '1003', 0, 0, '0000-00-00 00:00:00', 'Mon, 31 May 2021 17:43:19 GMT', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0', 13472, 'y.takourt@lavoieexpress.com', '-', 0, 0, NULL, 5, NULL),
('5279771', 0, 0, 34004, '1004', 0, 0, '0000-00-00 00:00:00', 'Mon, 31 May 2021 17:54:14 GMT', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0', 13476, 'ssssa@aa.aa', '-', 0, 0, NULL, 5, NULL),
('5279901', 0, 0, 34004, '1001', 0, 0, NULL, 'Wed, 02 Jun 2021 15:32:02 GMT', NULL, NULL, NULL, NULL, '0', 13649, 'aaaa@aaa.aa', NULL, 0, 0, NULL, 1, NULL),
('5279915', 555813214, 602936386976, 34004, '1003', 6, 0, '0000-00-00 00:00:00', 'Tue, 01 Jun 2021 10:42:11 GMT', 'Tue, 01 Jun 2021 18:34:18 GMT', 'Thu, 01 Jul 2021 18:34:18 GMT', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '727000007', 13538, 'y.takourt@lavoieexpress.ma', '-', 0, 0, NULL, 2, NULL),
('5279926', 0, 0, 34004, '1003', 0, 0, '0000-00-00 00:00:00', 'Tue, 01 Jun 2021 10:42:12 GMT', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0', 13539, 'y.takourt@lavoieexpress.com', '-', 0, 0, NULL, 5, NULL),
('5280281', 0, 0, 34004, '1003', 0, 0, '0000-00-00 00:00:00', 'Tue, 01 Jun 2021 10:42:12 GMT', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '727000007', 13540, 'y.takourt@lavoieexpress.ma', '-', 0, 0, NULL, 5, NULL),
('5280339', 0, 0, 34004, '1003', 0, 0, '0000-00-00 00:00:00', 'Tue, 01 Jun 2021 10:42:13 GMT', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '727000007', 13541, 'y.takourt@lavoieexpress.ma', '-', 0, 0, NULL, 5, NULL),
('5280366', 0, 0, 34004, '1003', 0, 0, '0000-00-00 00:00:00', 'Tue, 01 Jun 2021 10:42:14 GMT', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '727000007', 13542, 'y.takourt@lavoieexpress.ma', '-', 0, 0, NULL, 5, NULL),
('5280507', 0, 0, 34004, '1002', 0, 0, '0000-00-00 00:00:00', 'Tue, 01 Jun 2021 10:42:15 GMT', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '727000007', 13544, 'y.takourt@lavoieexpress.ma', '-', 0, 0, NULL, 5, NULL),
('5280633', 555516846, 437929065753, 34004, '1003', 8, 0, '0000-00-00 00:00:00', 'Tue, 01 Jun 2021 10:42:16 GMT', 'Tue, 01 Jun 2021 18:34:25 GMT', 'Thu, 01 Jul 2021 18:34:25 GMT', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '727000007', 13545, 'y.takourt@lavoieexpress.ma', '-', 0, 0, NULL, 2, NULL),
('5280688', 555623685, 119611423766, 34004, '1003', 8, 0, '0000-00-00 00:00:00', 'Tue, 01 Jun 2021 10:42:16 GMT', 'Tue, 01 Jun 2021 18:34:27 GMT', 'Thu, 01 Jul 2021 18:34:27 GMT', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '727000007', 13546, 'y.takourt@lavoieexpress.ma', '-', 0, 0, NULL, 2, NULL),
('5280689', 555815022, 424940618783, 34004, '1004', 8, 0, '0000-00-00 00:00:00', 'Tue, 01 Jun 2021 10:42:17 GMT', 'Tue, 01 Jun 2021 18:34:28 GMT', 'Thu, 01 Jul 2021 18:34:28 GMT', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '727000007', 13547, 'y.takourt@lavoieexpress.ma', '-', 0, 0, NULL, 2, NULL),
('5768835', 0, 0, 34004, '1002', 0, 0, '0000-00-00 00:00:00', 'Thu, 06 May 2021 12:22:43 GMT', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0772000007', 1699, 'y.takourt@lavoieexpress.ma', '-', 0, 0, NULL, 5, NULL),
('5778846', 0, 0, 34004, '1002', 0, 0, '0000-00-00 00:00:00', 'Tue, 01 Jun 2021 11:38:20 GMT', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0', 13600, '2y.takourt@lavoieexpress.ma', '-', 0, 0, NULL, 5, NULL),
('5778849', 0, 0, 34004, '1003', 0, 0, '0000-00-00 00:00:00', 'Mon, 31 May 2021 16:23:28 GMT', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0772000007', 13471, 'y.takourt@lavoieexpress.ma', '-', 0, 0, NULL, 5, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `hibernate_sequence`
--

CREATE TABLE `hibernate_sequence` (
  `next_val` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hibernate_sequence`
--

INSERT INTO `hibernate_sequence` (`next_val`) VALUES
(233);

-- --------------------------------------------------------

--
-- Table structure for table `operateur`
--

CREATE TABLE `operateur` (
  `matricule` int(11) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `gsm1` varchar(255) DEFAULT NULL,
  `gsm2` varchar(255) DEFAULT NULL,
  `id_gc` int(11) NOT NULL,
  `livreur` int(11) NOT NULL,
  `nom` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `prenom` varchar(255) DEFAULT NULL,
  `ramasseur` int(11) NOT NULL,
  `ville` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `response`
--

CREATE TABLE `response` (
  `status` int(11) NOT NULL,
  `message` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `response`
--

INSERT INTO `response` (`status`, `message`) VALUES
(200, 'SUCCESS - RESERVATION ENREGISTREE'),
(250, 'ERROR - EMAIL MANQUANT ou FORMAT INCORRECT !'),
(300, 'ERROR - AUCUNE CONSIGNE DANS CETTE VILLE !');

-- --------------------------------------------------------

--
-- Table structure for table `type_case`
--

CREATE TABLE `type_case` (
  `type_casier` varchar(255) NOT NULL,
  `hauteur` int(11) NOT NULL,
  `largeur` int(11) NOT NULL,
  `poids` int(11) NOT NULL,
  `profondeur` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `type_case`
--

INSERT INTO `type_case` (`type_casier`, `hauteur`, `largeur`, `poids`, `profondeur`) VALUES
('L', 407, 410, 0, 460),
('M', 255, 410, 0, 460),
('S', 102, 410, 0, 460),
('XL', 560, 410, 0, 460),
('XXL', 712, 410, 0, 460);

-- --------------------------------------------------------

--
-- Table structure for table `ville`
--

CREATE TABLE `ville` (
  `id_ville` int(11) NOT NULL,
  `ville` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ville`
--

INSERT INTO `ville` (`id_ville`, `ville`) VALUES
(1, 'AFOURAR'),
(2, 'AGADIR'),
(3, 'AGDZ'),
(4, 'AHFIR'),
(5, 'AIN AOUDA'),
(6, 'Ain Atiq'),
(7, 'AIN ATIQ'),
(8, 'Ain Derrij'),
(9, 'AIN HARROUDA'),
(10, 'AIN SEBAA'),
(11, 'AIN TAOUJTATE'),
(12, 'Ain Zaura'),
(13, 'AIT BAHA'),
(14, 'AIT ISHAQ'),
(15, 'AIT MELLOUL'),
(16, 'AIT MILK'),
(17, 'AIT MILK'),
(18, 'AIT OURIR'),
(19, 'AKLIM'),
(20, 'AL GHARB'),
(21, 'AMZMIZ'),
(22, 'ANZA'),
(23, 'AOUFOUS'),
(24, 'AOULOUZ'),
(25, 'AOURIR'),
(26, 'ARBAOUA'),
(27, 'ARFOUD'),
(28, 'ASILAH'),
(29, 'ATTAOUIA'),
(30, 'AZEMMOUR'),
(31, 'AZILAL'),
(32, 'AZROU'),
(33, 'AZROU SUD'),
(34, 'BAB BERRED'),
(35, 'BEJAAD'),
(36, 'BELKSIRI'),
(37, 'BEN GUERIR'),
(38, 'BEN HMAD'),
(39, 'BEN SERGAO'),
(40, 'BEN SLIMANE'),
(41, 'BEN TAYEB'),
(42, 'BENI BOUAYACH'),
(43, 'BENI HDIFA'),
(44, 'BENI MELLAL'),
(45, 'BENI NSAR'),
(46, 'BERKANE'),
(47, 'BERRECHID'),
(48, 'BHALIL'),
(49, 'BIOUGRA'),
(50, 'BIR JDID'),
(51, 'BIR MEZOUI'),
(52, 'BOUARFA'),
(53, 'BOUFEKRANE'),
(54, 'BOUIZAKARNE'),
(55, 'BOUJDOUR'),
(56, 'BOUJNIBA'),
(57, 'BOULMANE'),
(58, 'BOUMALNE DADES'),
(59, 'BOUMIA'),
(60, 'BOUSKOURA'),
(61, 'BOUZNIKA'),
(62, 'CASABLANCA'),
(63, 'CHAOUEN'),
(64, 'CHEFCHAOUEN'),
(65, 'CHEMAIA'),
(66, 'CHICHAOUA'),
(67, 'CHTOUKA AIT-BAHA'),
(68, 'DAKHLA'),
(69, 'DAR EL GUEDDARI'),
(70, 'DCHEIRA'),
(71, 'DEMNATE'),
(72, 'DRIOUCH'),
(73, 'EL AIOUN'),
(74, 'EL GARA'),
(75, 'EL HAJEB'),
(76, 'EL HOCEIMA'),
(77, 'EL JADIDA'),
(78, 'El Mudzine'),
(79, 'ERRACHIDIA'),
(80, 'ESSAOUIRA'),
(81, 'ESSMARA'),
(82, 'FAM EL HISN'),
(83, 'FES'),
(84, 'FIGUIG'),
(85, 'FKIH BEN SALEH'),
(86, 'FNIDEQ'),
(87, 'FOUM OUDI'),
(88, 'GHAFSAI'),
(89, 'GUELMIM'),
(90, 'GUERCIF'),
(91, 'GUISSER'),
(92, 'GUOULMIMA'),
(93, 'HAD BENI RZINE'),
(94, 'HAD BRADIA'),
(95, 'HAD KOURT'),
(96, 'HAD SOUALEM'),
(97, 'IFRANE'),
(98, 'IGHREM'),
(99, 'IMINTANOUTE'),
(100, 'IMMOUZER'),
(101, 'IMZOUREN'),
(102, 'INZEGANE'),
(103, 'ISSAGUEN'),
(104, 'ITZER'),
(105, 'JEMAA SHAIM'),
(106, 'JERADA'),
(107, 'JORF EL MELHA'),
(108, 'KARIAT ARKMANE'),
(109, 'KARIAT BA MHAMED'),
(110, 'KASBAT TADLA'),
(111, 'KELAAT MEGOUNA'),
(112, 'KELAAT SRAGHNA'),
(113, 'KENITRA'),
(114, 'KETAMA'),
(115, 'KHEMIS AIT AMIRA'),
(116, 'KHEMISS ZEMAMRA'),
(117, 'KHEMISSET'),
(118, 'KHENIFRA'),
(119, 'KHMISS OULAD AYAD'),
(120, 'KHOURIBGA'),
(121, 'KLEAA'),
(122, 'KSAR EL KEBIR'),
(123, 'KSIBIA'),
(124, 'KSSIBA'),
(125, 'LAAYOUNE'),
(126, 'LABHALIL'),
(127, 'LAKHYAYTA'),
(128, 'LALLA MAYMOUNA'),
(129, 'LAOUAMRA'),
(130, 'LARACHE'),
(131, 'LAYOUN'),
(132, 'Lissasfa IAM'),
(133, 'Logiprod'),
(134, 'MARRAKECH'),
(135, 'MARTIL'),
(136, 'MASSA'),
(137, 'MECHRAA BEL KSIRI'),
(138, 'MEDIAQ'),
(139, 'MEKNES'),
(140, 'MIDAR'),
(141, 'MIDELT'),
(142, 'MISSOUR'),
(143, 'MOHAMMADIA BIS'),
(144, 'MOHAMMEDIA'),
(145, 'MONT AROUI'),
(146, 'MOULAY BOUSSELHAM'),
(147, 'MOULAY DRISS ZERHOUN'),
(148, 'MRIRT'),
(149, 'NADOR'),
(150, 'NOUASSER'),
(151, 'OUALIDIA'),
(152, 'OUAOUIZERTH'),
(153, 'OUARZAZATE'),
(154, 'OUAZZANE'),
(155, 'OUED AMLIL'),
(156, 'OUED ZEM'),
(157, 'OUISLANE'),
(158, 'OUJDA'),
(159, 'OUJDA AR'),
(160, 'OUJDA vides'),
(161, 'OULAD MBAREK'),
(162, 'OULAD ZMAM'),
(163, 'OULED AYAD'),
(164, 'OULED BERHIL'),
(165, 'OULED MRAH'),
(166, 'OULED TEIMA'),
(167, 'OULED ZIDOUH'),
(168, 'OULED ZMAM'),
(169, 'OULMES'),
(170, 'OURIKA'),
(171, 'OUTAT EL HAJ'),
(172, 'RABAT'),
(173, 'RIBAT EL KHEIR'),
(174, 'RICH'),
(175, 'RISSANI'),
(176, 'ROMMANI'),
(177, 'SAFI'),
(178, 'SAIDIA'),
(179, 'SALE'),
(180, 'SEBT GZOULA'),
(181, 'SEBT NEMMA'),
(182, 'SEFROU'),
(183, 'SELOUANE'),
(184, 'SETTAT'),
(185, 'SIDI ALLAL BAHRAOUI'),
(186, 'SIDI BENNOUR'),
(187, 'SIDI IFNI'),
(188, 'SIDI KACEM'),
(189, 'SIDI SLIMANE'),
(190, 'SIDI SMAIL'),
(191, 'SIDI YAHIA GHARB'),
(192, 'SIDI YAHYA ZAER'),
(193, 'SKHIRAT'),
(194, 'SMARA'),
(195, 'SMIMOU'),
(196, 'SOUK LARBAA'),
(197, 'SOUK SEBT'),
(198, 'SOUK TLET GHARB'),
(199, 'STATION PETROMIN'),
(200, 'TAHLA'),
(201, 'TALIOUINE'),
(202, 'TALSINT'),
(203, 'TAMANAR'),
(204, 'TAMELLALTE'),
(205, 'TANGER'),
(206, 'TANGER MED'),
(207, 'TANTAN'),
(208, 'TAOUNATE'),
(209, 'TAOURIRT'),
(210, 'TARFAYA'),
(211, 'TARGUIST'),
(212, 'TAROUDANTE'),
(213, 'TATA'),
(214, 'TAZA'),
(215, 'TEMARA'),
(216, 'TETOUAN'),
(217, 'TIFELT'),
(218, 'TIGHSSALINE'),
(219, 'TIKIOUINE'),
(220, 'TINGHIR'),
(221, 'TINJDAD'),
(222, 'TISSA'),
(223, 'TIT MELLIL'),
(224, 'TIZNIT'),
(225, 'TLAT OULAD'),
(226, 'TNINE LAGHYAT'),
(227, 'YOUSSOUFIA'),
(228, 'ZAGOURA'),
(229, 'ZAIDA'),
(230, 'ZAIO'),
(231, 'ZAOUIYAT CHEIKH'),
(232, 'ZGHENGHEN');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `compte`
--
ALTER TABLE `compte`
  ADD PRIMARY KEY (`numero_compte`);

--
-- Indexes for table `consigne`
--
ALTER TABLE `consigne`
  ADD PRIMARY KEY (`num_serie_consigne`);

--
-- Indexes for table `expedition`
--
ALTER TABLE `expedition`
  ADD PRIMARY KEY (`numero_expedition`);

--
-- Indexes for table `expeditionr`
--
ALTER TABLE `expeditionr`
  ADD PRIMARY KEY (`numero_expedition`);

--
-- Indexes for table `operateur`
--
ALTER TABLE `operateur`
  ADD PRIMARY KEY (`matricule`);

--
-- Indexes for table `response`
--
ALTER TABLE `response`
  ADD PRIMARY KEY (`status`);

--
-- Indexes for table `type_case`
--
ALTER TABLE `type_case`
  ADD PRIMARY KEY (`type_casier`);

--
-- Indexes for table `ville`
--
ALTER TABLE `ville`
  ADD PRIMARY KEY (`id_ville`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
