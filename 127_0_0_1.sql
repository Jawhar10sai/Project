-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 21, 2021 at 04:55 PM
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
-- Database: `lvedbexp`
--
CREATE DATABASE IF NOT EXISTS `lvedbexp` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `lvedbexp`;

-- --------------------------------------------------------

--
-- Stand-in structure for view `declarations_intralot`
-- (See below for the actual view)
--
CREATE TABLE `declarations_intralot` (
`Agence` varchar(250)
,`courrier_id` int(20)
,`Numero` varchar(250)
,`Date` datetime
,`Code1` varchar(250)
,`Expediteur` varchar(250)
,`Code2` varchar(250)
,`destinataire` varchar(250)
,`adresse1` varchar(250)
,`adresse2` varchar(250)
,`Ville1` varchar(250)
,`Ville2` varchar(250)
,`Port` char(2)
,`Colis` int(11)
,`Poids` decimal(16,3)
,`type` char(2)
,`Montant_ttc` decimal(16,3)
,`Espece` decimal(16,3)
,`Cheque` decimal(16,3)
,`Traite` decimal(16,3)
,`bl` decimal(16,3)
,`Recu` int(20)
,`date_recu` date
,`num` varchar(250)
,`date_bordereau` date
,`date_livraison` datetime
,`Delais_Cible` int(11)
,`Ecart` int(11)
,`Depassement` int(11)
,`Ecart2` int(11)
,`service` varchar(250)
,`BORDEREAU_NUM` decimal(18,0)
,`livraison` char(2)
,`ramasseur` varchar(250)
,`FC_date1` datetime
,`FC_date2` datetime
,`date_caisse` datetime
,`statut` varchar(250)
,`statut_suivis` varchar(250)
,`FC_date_arrive` datetime
,`Motif` varchar(250)
,`Taxateur` varchar(250)
);

-- --------------------------------------------------------

--
-- Table structure for table `etat_expedition`
--

CREATE TABLE `etat_expedition` (
  `Agence` varchar(250) NOT NULL,
  `courrier_id` int(20) NOT NULL,
  `Numero` varchar(250) NOT NULL,
  `Date` date DEFAULT NULL,
  `Code1` varchar(250) NOT NULL,
  `Expediteur` varchar(250) NOT NULL,
  `Code2` varchar(250) NOT NULL,
  `destinataire` varchar(250) NOT NULL,
  `adresse1` varchar(250) NOT NULL,
  `adresse2` varchar(250) NOT NULL,
  `Ville1` varchar(250) NOT NULL,
  `Ville2` varchar(250) NOT NULL,
  `Port` char(2) DEFAULT NULL,
  `Colis` int(11) NOT NULL,
  `Poids` decimal(16,3) DEFAULT NULL,
  `type` char(2) DEFAULT NULL,
  `Montant_ttc` decimal(16,3) DEFAULT NULL,
  `Espece` decimal(16,3) DEFAULT NULL,
  `Cheque` decimal(16,3) DEFAULT NULL,
  `Traite` decimal(16,3) DEFAULT NULL,
  `bl` decimal(16,3) DEFAULT NULL,
  `Recu` int(20) DEFAULT NULL,
  `date_recu` date DEFAULT NULL,
  `num` varchar(250) DEFAULT NULL,
  `date_bordereau` date DEFAULT NULL,
  `date_livraison` datetime DEFAULT NULL,
  `Delais_Cible` int(11) DEFAULT NULL,
  `Ecart` int(11) DEFAULT NULL,
  `Depassement` int(11) DEFAULT NULL,
  `Ecart2` int(11) DEFAULT NULL,
  `service` varchar(250) NOT NULL,
  `BORDEREAU_NUM` decimal(18,0) DEFAULT NULL,
  `livraison` char(2) DEFAULT NULL,
  `ramasseur` varchar(250) DEFAULT NULL,
  `FC_date1` datetime DEFAULT NULL,
  `FC_date2` datetime DEFAULT NULL,
  `date_caisse` datetime DEFAULT NULL,
  `statut` varchar(250) NOT NULL,
  `statut_suivis` varchar(250) DEFAULT NULL,
  `FC_date_arrive` datetime DEFAULT NULL,
  `Motif` varchar(250) DEFAULT NULL,
  `Taxateur` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `etat_expedition`
--

INSERT INTO `etat_expedition` (`Agence`, `courrier_id`, `Numero`, `Date`, `Code1`, `Expediteur`, `Code2`, `destinataire`, `adresse1`, `adresse2`, `Ville1`, `Ville2`, `Port`, `Colis`, `Poids`, `type`, `Montant_ttc`, `Espece`, `Cheque`, `Traite`, `bl`, `Recu`, `date_recu`, `num`, `date_bordereau`, `date_livraison`, `Delais_Cible`, `Ecart`, `Depassement`, `Ecart2`, `service`, `BORDEREAU_NUM`, `livraison`, `ramasseur`, `FC_date1`, `FC_date2`, `date_caisse`, `statut`, `statut_suivis`, `FC_date_arrive`, `Motif`, `Taxateur`) VALUES
('CASABLANCA                                        ', 2610416, 'A1258933        ', '2013-05-23', '4118    ', 'FMTM', '0       ', 'GRAMEC', 'N° 9 Z.I Sud Ouest Mohammedia', '', 'MOHAMMEDIA                                        ', 'AIT BAHA', 'D', 1, '2.000', 'M', '53.010', '0.000', '360.000', '0.000', '0.000', NULL, NULL, NULL, NULL, NULL, 5, NULL, NULL, NULL, 'NON', NULL, 'G', '1227       BAAZAOUI ISSAM', '2013-05-23 16:00:07', '2013-05-23 16:00:07', NULL, 'à Relivrée', 'En cours', '2013-05-24 07:29:00', NULL, '2111       RIMA AYOUB'),
('AIT MELLOUL                                       ', 2824884, 'C               ', '2014-04-17', '0       ', 'LABOMAG', '9126    ', 'LABOMAG', '', 'Rue J N°1 Km 10500 Route 111 Ain Sebaâ Casablanca', 'AIT MELLOUL                                       ', 'CASABLANCA', 'P', 1, '1500.000', 'M', '5543.717', '0.000', '0.000', '0.000', '0.000', NULL, NULL, NULL, NULL, '2014-04-21 09:57:30', 1, 4, 3, NULL, 'NON', NULL, 'D', '¿ë         EXPEDITEUR A', '2014-04-17 18:10:54', '2014-04-17 18:10:54', '2014-04-19 12:08:19', 'Livrée', 'Livrée', '2014-04-19 01:55:44', NULL, '355        HARFAOUI HASSAN'),
('CASABLANCA                                        ', 2874635, 'B195891         ', '2014-06-03', '855     ', 'FOGIA', '0       ', 'IRRI SYS', 'ang oulad ziane et bd ibn tachfine res azzahra', '', 'CASABLANCA', 'AIT MELLOUL                                       ', 'D', 3, '138.000', 'M', '133.836', '0.000', '0.000', '0.000', '0.000', NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, 'NON', NULL, 'D', '1223       ELKHAL HASSAN', '2014-06-03 20:29:57', '2014-06-04 08:55:12', NULL, 'à Relivrée', 'En cours', '2014-06-04 12:12:20', NULL, '2201       OUAAZIZ HAMZA'),
('CASABLANCA                                        ', 2924511, '7036951         ', '2014-07-22', '0       ', 'NOUVEL ESPACE', '0       ', 'PNEUSMATIQUE ROUIDA', '', '', 'CASABLANCA', 'AIT MELLOUL                                       ', 'D', 2, '22.000', 'M', '196.500', '0.000', '0.000', '0.000', '0.000', NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, 'NON', NULL, 'D', '2221       DAOUIR ABDERRAHMAN', '2014-07-22 19:07:47', '2014-07-22 19:07:47', NULL, 'à Relivrée', 'En cours', '2014-07-23 07:32:43', NULL, '2201       OUAAZIZ HAMZA'),
('CASABLANCA                                        ', 3400290, 'B0338153        ', '2015-12-14', '3978    ', 'SPAR AUTO', '0       ', 'MOHAMED', 'LA GIRONDE', '', 'CASABLANCA', 'TAZA                                              ', 'D', 1, '6.000', 'M', '28.500', '0.000', '0.000', '0.000', '0.000', NULL, NULL, NULL, NULL, '2015-12-16 18:49:14', 1, 2, 1, NULL, 'NON', NULL, 'G', '1223       ELKHAL HASSAN', '2015-12-14 18:31:38', '2015-12-14 18:31:38', '2015-12-17 20:07:55', 'Livrée', 'Livrée', '2015-12-15 08:24:44', NULL, '2309       BOUZZAIT ABDERRAHIM'),
('TAZA                                              ', 3410160, 'b0324579        ', '2015-12-23', '11770   ', 'SOCIETE VINDI II SARL 02', '0       ', 'DHL', 'RUE  DE LA GARE ', '', 'GUERCIF                                           ', 'MEKNES                                            ', 'P', 1, '32.000', 'M', '80.000', '0.000', '0.000', '0.000', '0.000', NULL, NULL, NULL, NULL, '2015-12-25 17:09:03', 1, 2, 1, NULL, 'NON', NULL, 'D', '2284       BOULIMA SABER', '2015-12-23 17:35:17', '2015-12-23 21:21:34', '2015-12-28 18:17:59', 'Livrée', 'Livrée', '2015-12-25 08:27:18', NULL, '1543       AKODAD IBRAHIM'),
('RABAT                                             ', 3458052, 'B0171443        ', '2016-02-12', '0       ', 'TRAD COMPTOIR', '0       ', 'SALAF ALA BARAKA', '', '', 'RABAT                                             ', 'OUALIDIA', 'P', 1, '50.000', 'M', '311.505', '0.000', '0.000', '0.000', '0.000', NULL, NULL, NULL, NULL, '2018-09-27 14:16:51', 3, 958, 955, NULL, 'NON', NULL, 'D', '2020       EZ ZRIBI RACHID', '2016-02-12 19:36:13', '2018-04-17 19:06:52', NULL, 'Epave', 'En cours', '2018-04-18 06:40:33', NULL, '2020       EZ ZRIBI RACHID'),
('MARRAKECH                                         ', 3586407, 'B00545188       ', '2016-06-10', '0       ', 'AMZIANE', '0       ', 'KARIM', '', '', 'MARRAKECH                                         ', 'AIT MELLOUL                                       ', 'P', 1, '4.000', 'M', '79.447', '0.000', '0.000', '0.000', '0.000', NULL, NULL, NULL, NULL, '2016-06-10 15:42:06', 1, 0, -1, NULL, 'NON', NULL, 'G', '1678       AHAJJAM AZZEDDINE', '2016-06-10 14:37:17', '2016-06-10 14:37:17', '2016-06-10 17:25:41', 'Livrée', 'Livrée', '2016-06-11 15:13:16', NULL, '1678       AHAJJAM AZZEDDINE'),
('EL JADIDA                                         ', 3787041, 'B00778068       ', '2016-12-28', '11920   ', 'FILAGRI', '0       ', 'KARIM BENTBIB', 'eljadida', '', 'EL JADIDA                                         ', 'LARACHE                                           ', 'P', 1, '15.000', 'M', '40.003', '0.000', '0.000', '0.000', '0.000', NULL, NULL, NULL, NULL, '2017-02-14 17:48:10', 3, 48, 45, NULL, 'NON', NULL, 'G', '1533       EL OKRI ABDELKRIM', '2016-12-28 17:08:58', '2016-12-28 18:39:17', NULL, 'Arrivée : Agence de Destination La Voie Express', 'En cours', '2016-12-29 09:09:15', 'Client refuse la marchandise', '502        MOUTAFIK BRAHIM'),
('CASABLANCA                                        ', 3800233, 'B00754334       ', '2017-01-09', '10036   ', 'LACASEM', '20012011', 'ASWAK ASSALAM ESSAOUIRA', 'rue mamoun ahmed n 86 maarif ', '', 'CASABLANCA', 'ESSAOUIRA                                         ', 'P', 1, '17.000', 'M', '45.600', '0.000', '0.000', '0.000', '1.000', 1918771, '2017-01-18', NULL, '2017-01-24', '2017-01-16 18:04:42', 7, 7, 0, 8, 'NON', '51172', 'D', '667        EL KHATTAB ABDERRAZZAK', '2017-01-09 22:18:16', '2017-01-09 22:18:16', '2017-01-16 18:07:21', 'Livrée', 'Livrée', '2017-01-10 08:04:48', NULL, '1556       HASNI RACHID'),
('CASABLANCA                                        ', 3817276, 'B00754335       ', '2017-01-16', '10036   ', 'LACASEM', '11065016', 'marjane sidi slimane', 'rue mamoun ahmed n 86 maarif ', '', 'CASABLANCA', 'KENITRA                                           ', 'P', 1, '10.000', 'M', '45.600', '0.000', '0.000', '0.000', '1.000', 1920611, '2017-01-23', '', '2017-01-24', '2017-01-19 09:26:42', 1, 3, 2, 5, 'NON', '51172', 'D', '667        EL KHATTAB ABDERRAZZAK', '2017-01-16 22:54:28', '2017-01-16 22:54:28', '2017-01-19 18:18:55', 'Livrée', 'Livrée', '2017-01-17 07:57:02', NULL, '1556       HASNI RACHID'),
('CASABLANCA                                        ', 3828978, 'B00754337       ', '2017-01-25', '10036   ', 'LACASEM', '0       ', 'ABDERRAZAK', 'rue mamoun ahmed n 86 maarif ', '', 'CASABLANCA', 'TIFELT                                            ', 'P', 1, '20.000', 'M', '45.600', '1400.000', '0.000', '0.000', '0.000', 1936553, '2017-02-22', NULL, '2017-08-30', '2017-02-14 21:30:16', 3, 20, 17, 197, 'NON', '53528', 'D', '667        EL KHATTAB ABDERRAZZAK', '2017-01-25 18:59:48', '2017-01-25 18:59:48', '2017-02-15 18:02:47', 'Livrée', 'Livrée', '2017-01-26 08:26:13', NULL, '1811       SERHANE ABDELJLIL'),
('KENITRA', 5831944, 'C01496397       ', '2020-11-30', '11610   ', 'TABA SARL', '0       ', 'MTAPIS', 'Quartier el Batha Rue Georges Sand N6 RDC ', '', 'KENITRA                                           ', 'CASABLANCA', 'P', 1, '50.000', 'M', '47.550', '0.000', '0.000', '0.000', '0.000', NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, 'NON', NULL, 'D', '2669       ATYQ OMAR', NULL, NULL, NULL, 'Expedition Encore dans l\'\'agence de depart', 'En cours', NULL, NULL, '2048       BOUHAHI OUAFAE');

-- --------------------------------------------------------

--
-- Table structure for table `etat_expedition_speed`
--

CREATE TABLE `etat_expedition_speed` (
  `Agence` varchar(250) NOT NULL,
  `courrier_id` int(20) NOT NULL,
  `Numero` varchar(250) NOT NULL,
  `Date` timestamp NULL DEFAULT current_timestamp(),
  `Code1` varchar(250) NOT NULL DEFAULT '9588',
  `Expediteur` varchar(250) NOT NULL DEFAULT 'INTRALOT',
  `Code2` varchar(250) NOT NULL DEFAULT '0',
  `destinataire` varchar(250) NOT NULL,
  `adresse1` varchar(250) NOT NULL DEFAULT '24 rue ali abderrazak porte d''anfa casablanca',
  `adresse2` varchar(250) NOT NULL,
  `Ville1` varchar(250) NOT NULL DEFAULT 'Casablanca',
  `Ville2` varchar(250) NOT NULL,
  `Port` char(2) DEFAULT NULL,
  `Colis` int(11) NOT NULL,
  `Poids` decimal(16,3) DEFAULT NULL,
  `type` char(2) DEFAULT NULL,
  `Montant_ttc` decimal(16,3) DEFAULT NULL,
  `Espece` decimal(16,3) DEFAULT NULL,
  `Cheque` decimal(16,3) DEFAULT NULL,
  `Traite` decimal(16,3) DEFAULT NULL,
  `bl` decimal(16,3) DEFAULT NULL,
  `Recu` int(20) DEFAULT NULL,
  `date_recu` date DEFAULT NULL,
  `num` varchar(250) DEFAULT NULL,
  `date_bordereau` date DEFAULT NULL,
  `date_livraison` datetime DEFAULT NULL,
  `Delais_Cible` int(11) DEFAULT NULL,
  `Ecart` int(11) DEFAULT NULL,
  `Depassement` int(11) DEFAULT NULL,
  `Ecart2` int(11) DEFAULT NULL,
  `service` varchar(250) NOT NULL,
  `BORDEREAU_NUM` decimal(18,0) DEFAULT NULL,
  `livraison` char(2) DEFAULT NULL,
  `ramasseur` varchar(250) DEFAULT NULL,
  `FC_date1` datetime DEFAULT NULL,
  `FC_date2` datetime DEFAULT NULL,
  `date_caisse` datetime DEFAULT NULL,
  `statut` varchar(250) NOT NULL,
  `statut_suivis` varchar(250) DEFAULT NULL,
  `FC_date_arrive` datetime DEFAULT NULL,
  `Motif` varchar(250) DEFAULT NULL,
  `Taxateur` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `etat_expedition_speed`
--

INSERT INTO `etat_expedition_speed` (`Agence`, `courrier_id`, `Numero`, `Date`, `Code1`, `Expediteur`, `Code2`, `destinataire`, `adresse1`, `adresse2`, `Ville1`, `Ville2`, `Port`, `Colis`, `Poids`, `type`, `Montant_ttc`, `Espece`, `Cheque`, `Traite`, `bl`, `Recu`, `date_recu`, `num`, `date_bordereau`, `date_livraison`, `Delais_Cible`, `Ecart`, `Depassement`, `Ecart2`, `service`, `BORDEREAU_NUM`, `livraison`, `ramasseur`, `FC_date1`, `FC_date2`, `date_caisse`, `statut`, `statut_suivis`, `FC_date_arrive`, `Motif`, `Taxateur`) VALUES
('', 0, 'E0000 2806', '2019-12-06 00:00:00', '9588', 'INTRALOT', '0', '10573 - Sara GAMRAOUI', '24 rue ali abderrazak porte d\'anfa casablanca', 'Hay Diza, Avenue Abda, Martil', 'Casablanca', 'MARTIL', NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '906157', NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, 'Préparée', 'Préparée', NULL, NULL, NULL),
('', 0, 'E000028600', '2019-12-06 00:00:00', '9588', 'INTRALOT', '0', '10299 - Yahya KHANFOUR', '24 rue ali abderrazak porte d\'anfa casablanca', 'Rue Ezahra No 14', 'Casablanca', 'OUJDA', NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '601129/43805', NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, 'Préparée', 'Préparée', NULL, NULL, NULL),
('', 0, 'E0000005', '2019-12-06 00:00:00', '9588', 'INTRALOT', '0', '5719 - ECHAHBOUNI ABDENNASSER', '24 rue ali abderrazak porte d\'anfa casablanca', '9 RUE B BD THAMI  EL OUZZANI  TETOUAN', 'Casablanca', 'TETOUAN', NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '902077/43805', NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, 'Préparée', 'Préparée', NULL, NULL, NULL),
('', 0, 'E00003829', '2019-12-06 00:00:00', '9588', 'INTRALOT', '0', '10501 - Ste STANISLAS SARL Géré par Mr Souheil ABADARRINE', '24 rue ali abderrazak porte d\'anfa casablanca', 'Av Allal El Fassi, Nfis 1, Imm S, Rdc N°5, Marrake', 'Casablanca', 'MARRAKECH', NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '401298/43805', NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, 'Préparée', 'Préparée', NULL, NULL, NULL),
('', 0, 'E00003830', '2019-12-06 00:00:00', '9588', 'INTRALOT', '0', '10502 - Sté LA CREME SERVICE SARL Géré Par Mr Mohamed KARK', '24 rue ali abderrazak porte d\'anfa casablanca', 'N°235, Bis, Lot Nakhil, Bloc 12 Syba Marrakech', 'Casablanca', 'Marrakech', NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '401746/43805', NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, 'Préparée', 'Préparée', NULL, NULL, NULL),
('', 0, 'E00003020', '2020-07-16 00:00:00', '9588', 'INTRALOT', '0', '502106 - TALHA MOHAMED', '24 rue ali abderrazak porte d\'anfa casablanca', 'No 38, Lot Saada   Boufekarane', 'Casablanca', 'Boufakrane', NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'ILOT 5180', NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, 'Préparée', 'Préparée', NULL, NULL, NULL),
('', 0, 'E00003021', '2020-07-16 00:00:00', '9588', 'INTRALOT', '0', '807054 - Mr EL BOUDALI REGRAGUI', '24 rue ali abderrazak porte d\'anfa casablanca', 'No 06-02 Avenue la Marche Verte', 'Casablanca', 'Essaouira', NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'ILOT 5181', NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, 'Préparée', 'Préparée', NULL, NULL, NULL),
('', 0, 'E00003022', '2020-07-16 00:00:00', '9588', 'INTRALOT', '0', '504035 - E L MATICHI ABD LAZIZ', '24 rue ali abderrazak porte d\'anfa casablanca', 'Rue 5, Route d\'azrou Ain Sihand', 'Casablanca', 'El Hajeb', NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'ILOT 5182', NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, 'Préparée', 'Préparée', NULL, NULL, NULL),
('', 0, 'E00003023', '2020-07-16 00:00:00', '9588', 'INTRALOT', '0', '501002 - LAMINE MOHAMED', '24 rue ali abderrazak porte d\'anfa casablanca', '15 av des Sports', 'Casablanca', 'Fès', NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'ILOT 5183', NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, 'Préparée', 'Préparée', NULL, NULL, NULL),
('', 0, 'E00003024', '2020-07-16 00:00:00', '9588', 'INTRALOT', '0', '509029 - EL MOSSAID IDRISSI Ayoub', '24 rue ali abderrazak porte d\'anfa casablanca', '2, Bloc 01, Rue 8   Tamoument', 'Casablanca', 'Khénifra', NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'ILOT 5184', NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, 'Préparée', 'Préparée', NULL, NULL, NULL),
('', 0, 'E00003025', '2020-07-16 00:00:00', '9588', 'INTRALOT', '0', '602006 - Saif-din TOUZANI', '24 rue ali abderrazak porte d\'anfa casablanca', '36, rue Tansift Imzouren', 'Casablanca', 'Al Hoceïma', NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'ILOT 5185', NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, 'Préparée', 'Préparée', NULL, NULL, NULL),
('', 0, 'E00003026', '2020-07-16 00:00:00', '9588', 'INTRALOT', '0', '524007 - Farid Gounina', '24 rue ali abderrazak porte d\'anfa casablanca', 'Café Atlas Avenue Mly El Hassan, Taza Haut', 'Casablanca', 'Taza', NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'ILOT 5186', NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, 'Préparée', 'Préparée', NULL, NULL, NULL),
('', 0, 'E00003027', '2020-07-16 00:00:00', '9588', 'INTRALOT', '0', '602046 - KOUBIA Ibrahim', '24 rue ali abderrazak porte d\'anfa casablanca', 'Douar Kasia CR Ait  Youssef Ouali', 'Casablanca', 'Al Hoceïma', NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'ILOT 5187', NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, 'Préparée', 'Préparée', NULL, NULL, NULL),
('', 0, 'E00003028', '2020-07-16 00:00:00', '9588', 'INTRALOT', '0', '906002 - OULAD ZOUHAIR ABDENNASER', '24 rue ali abderrazak porte d\'anfa casablanca', 'av Belghazi n° 72', 'Casablanca', 'Martil', NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'ILOT 5188', NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, 'Préparée', 'Préparée', NULL, NULL, NULL),
('', 0, 'E00003029', '2020-07-16 00:00:00', '9588', 'INTRALOT', '0', '422098 - Hamid ABOUSSIF', '24 rue ali abderrazak porte d\'anfa casablanca', '45, Bloc D Citée la Résistance', 'Casablanca', 'Ouarzazate', NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'ILOT 5189', NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, 'Préparée', 'Préparée', NULL, NULL, NULL),
('', 0, 'E00003030', '2020-07-16 00:00:00', '9588', 'INTRALOT', '0', '817059 - Mr BOUSSETTA AHMED', '24 rue ali abderrazak porte d\'anfa casablanca', 'No 151, Bloc 1   Lot El Fath', 'Casablanca', 'Ait Melloul', NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'ILOT 5190', NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, 'Préparée', 'Préparée', NULL, NULL, NULL),
('', 0, 'E00003031', '2020-07-16 00:00:00', '9588', 'INTRALOT', '0', '815059 - EL BEZZARI AHMED', '24 rue ali abderrazak porte d\'anfa casablanca', 'Hay Bir Anzarane, bloc 13, Tikiouine, AGADIR', 'Casablanca', 'Tikiouine', NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'ILOT 5191', NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, 'Préparée', 'Préparée', NULL, NULL, NULL),
('', 0, 'E00003032', '2020-07-16 00:00:00', '9588', 'INTRALOT', '0', '801004 - EL YAKOUBI ABDELAH', '24 rue ali abderrazak porte d\'anfa casablanca', 'Imm Bakrim Place des Autobus   Quartier Industriel', 'Casablanca', 'Agadir', NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'ILOT 5192', NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, 'Préparée', 'Préparée', NULL, NULL, NULL),
('', 0, 'E00003033', '2020-07-16 00:00:00', '9588', 'INTRALOT', '0', '801151 - AATAFAY HABIB', '24 rue ali abderrazak porte d\'anfa casablanca', '137 Rue de Fes   Quartier Industriel', 'Casablanca', 'Agadir', NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'ILOT 5193', NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, 'Préparée', 'Préparée', NULL, NULL, NULL),
('', 0, 'E00003034', '2020-07-16 00:00:00', '9588', 'INTRALOT', '0', '801195 - SABIR AHMED', '24 rue ali abderrazak porte d\'anfa casablanca', '13 Rue Mhand Nait Taleb   Talbotjt', 'Casablanca', 'AGADIR', NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'ILOT 5194', NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, 'Préparée', 'Préparée', NULL, NULL, NULL),
('', 0, 'E00003035', '2020-07-16 00:00:00', '9588', 'INTRALOT', '0', '289056 - MERMRI Abdelaziz', '24 rue ali abderrazak porte d\'anfa casablanca', 'No 12 Bloc 137 Sidi Bernoussi', 'Casablanca', 'Casablanca', NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'ILOT 5195', NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, 'Préparée', 'Préparée', NULL, NULL, NULL),
('', 0, 'E00003036', '2020-07-16 00:00:00', '9588', 'INTRALOT', '0', '541011 - ZDA Khalid', '24 rue ali abderrazak porte d\'anfa casablanca', 'Boulevard Mohamed V ( Ex rue 7)', 'Casablanca', 'Tinejdad', NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'ILOT 5196', NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, 'Préparée', 'Préparée', NULL, NULL, NULL),
('', 0, 'E00003092', '2020-08-03 00:00:00', '9588', 'INTRALOT', '0', '901046 - CHAKKOUH Soufian', '24 rue ali abderrazak porte d\'anfa casablanca', 'No 07 Avenue Omar Khiyam', 'Casablanca', 'Tanger', NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'ILOT 5277', NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, 'Préparée', 'Préparée', NULL, NULL, NULL),
('', 0, 'E00003228', '2020-08-25 00:00:00', '9588', 'INTRALOT', '0', '401092 - ABOULFATH Adil', '24 rue ali abderrazak porte d\'anfa casablanca', 'N° 20, Residence Tafilalet   Hay El Massira II', 'Casablanca', 'MARRAKECH', NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'ILOT 5413', NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, 'Préparée', 'Préparée', NULL, NULL, NULL),
('', 0, 'E00003284', '2020-09-03 00:00:00', '9588', 'INTRALOT', '0', '421156 - TOUZANI Abdelkrim', '24 rue ali abderrazak porte d\'anfa casablanca', '120, Boulevard Dimachek Hay EL Mourabitine', 'Casablanca', 'Beni Mellal', NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'ILOT 5469', NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, 'Préparée', 'Préparée', NULL, NULL, NULL),
('', 0, 'E00003426', '2020-09-22 00:00:00', '9588', 'INTRALOT', '0', '501048 - DAOUDI BELKACEM', '24 rue ali abderrazak porte d\'anfa casablanca', 'Hay Msalla rue 201   Ain Kadouss', 'Casablanca', 'Fès', NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'ILOT 5618', NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, 'Préparée', 'Préparée', NULL, NULL, NULL),
('', 0, 'E00004411', '2020-11-30 00:00:00', '9588', 'INTRALOT', '0', '901357 - ECHAOUI Afif', '24 rue ali abderrazak porte d\'anfa casablanca', 'Lot Al Majd, Tr N°447, Tanger', 'Casablanca', 'Tanger', NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'ILOT 6584', NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, 'Préparée', 'Préparée', NULL, NULL, NULL),
('', 0, 'E00004412', '2020-11-30 00:00:00', '9588', 'INTRALOT', '0', '701157 - LAARIF Yassine', '24 rue ali abderrazak porte d\'anfa casablanca', 'G5, Amal 1, N° 707 CYM, Rabat', 'Casablanca', 'RABAT', NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'ILOT 6587', NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, 'Préparée', 'Préparée', NULL, NULL, NULL),
('', 0, 'E00004413', '2020-11-30 00:00:00', '9588', 'INTRALOT', '0', '701096 - LAARIF Yassine', '24 rue ali abderrazak porte d\'anfa casablanca', 'No 104, Amal O CYM', 'Casablanca', 'RABAT', NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'ILOT 6588', NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, 'Préparée', 'Préparée', NULL, NULL, NULL),
('', 0, 'E00004414', '2020-11-30 00:00:00', '9588', 'INTRALOT', '0', '204019 - ERRACHED ABDELHADI', '24 rue ali abderrazak porte d\'anfa casablanca', '66 Kissariyat Al mostakbal', 'Casablanca', 'Sidi Bennour', NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'ILOT 6589', NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, 'Préparée', 'Préparée', NULL, NULL, NULL),
('', 0, 'E00004415', '2020-11-30 00:00:00', '9588', 'INTRALOT', '0', '429034 - YOUSSEF EL ALAOUI', '24 rue ali abderrazak porte d\'anfa casablanca', '120 av Kennedy', 'Casablanca', 'Safi', NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'ILOT 6590', NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, 'Préparée', 'Préparée', NULL, NULL, NULL),
('', 0, 'E00004416', '2020-11-30 00:00:00', '9588', 'INTRALOT', '0', '618014 - MRABTI Abderrazak', '24 rue ali abderrazak porte d\'anfa casablanca', 'Prop. Amal No 4 Boulevard Ibn Khaldoun', 'Casablanca', 'Guercif', NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'ILOT 6591', NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, 'Préparée', 'Préparée', NULL, NULL, NULL),
('', 0, 'E00004417', '2020-11-30 00:00:00', '9588', 'INTRALOT', '0', '910070 - Mr Adil BOUIDA', '24 rue ali abderrazak porte d\'anfa casablanca', 'Cite Badre, Groupe E, No 258, Souk El arbaa du Gha', 'Casablanca', 'Souk El Arbaâ', NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'ILOT 6592', NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, 'Préparée', 'Préparée', NULL, NULL, NULL),
('', 0, 'E00004418', '2020-11-30 00:00:00', '9588', 'INTRALOT', '0', '902122 - Fouad KERKICH', '24 rue ali abderrazak porte d\'anfa casablanca', 'No 23 Avenue Ouazir Mohamed Seffar', 'Casablanca', 'Tétouan', NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'ILOT 6593', NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, 'Préparée', 'Préparée', NULL, NULL, NULL),
('', 0, 'E00004419', '2020-11-30 00:00:00', '9588', 'INTRALOT', '0', '297012 - FATIH ABDELKRIM', '24 rue ali abderrazak porte d\'anfa casablanca', '90 (ex 50) Rue Brahim Nekhai', 'Casablanca', 'Casablanca', NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'ILOT 6594', NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, 'Préparée', 'Préparée', NULL, NULL, NULL),
('', 0, 'E00004420', '2020-11-30 00:00:00', '9588', 'INTRALOT', '0', '428034 - YOUSSEF Mohamed', '24 rue ali abderrazak porte d\'anfa casablanca', 'C fé Arryad   Quartier Sidi Hadri', 'Casablanca', 'Souk Sebt Oulad Nemma', NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'ILOT 6595', NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, 'Préparée', 'Préparée', NULL, NULL, NULL),
('', 0, 'E00004421', '2020-11-30 00:00:00', '9588', 'INTRALOT', '0', '298195 - RAIHANE Yassine', '24 rue ali abderrazak porte d\'anfa casablanca', '97 Bis, Rue 70, Hay Mabrouka Sidi Othmane', 'Casablanca', 'Casablanca', NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'ILOT 6596', NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, 'Préparée', 'Préparée', NULL, NULL, NULL),
('', 0, 'E00004422', '2020-11-30 00:00:00', '9588', 'INTRALOT', '0', '502072 - LAMKHANTAR Abdelmajid', '24 rue ali abderrazak porte d\'anfa casablanca', 'No 06, Rue Doukkala Ville Nouvelle', 'Casablanca', 'Meknès', NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'ILOT 6597', NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, 'Préparée', 'Préparée', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Stand-in structure for view `total_courrier`
-- (See below for the actual view)
--
CREATE TABLE `total_courrier` (
`Agence` varchar(250)
,`courrier_id` int(20)
,`Numero` varchar(250)
,`Date` datetime
,`Code1` varchar(250)
,`Expediteur` varchar(250)
,`Code2` varchar(250)
,`destinataire` varchar(250)
,`adresse1` varchar(250)
,`adresse2` varchar(250)
,`Ville1` varchar(250)
,`Ville2` varchar(250)
,`Port` char(2)
,`Colis` int(11)
,`Poids` decimal(16,3)
,`type` char(2)
,`Montant_ttc` decimal(16,3)
,`Espece` decimal(16,3)
,`Cheque` decimal(16,3)
,`Traite` decimal(16,3)
,`bl` decimal(16,3)
,`Recu` int(20)
,`date_recu` date
,`num` varchar(250)
,`date_bordereau` date
,`date_livraison` datetime
,`Delais_Cible` int(11)
,`Ecart` int(11)
,`Depassement` int(11)
,`Ecart2` int(11)
,`service` varchar(250)
,`BORDEREAU_NUM` decimal(18,0)
,`livraison` char(2)
,`ramasseur` varchar(250)
,`FC_date1` datetime
,`FC_date2` datetime
,`date_caisse` datetime
,`statut` varchar(250)
,`statut_suivis` varchar(250)
,`FC_date_arrive` datetime
,`Motif` varchar(250)
,`Taxateur` varchar(250)
);

-- --------------------------------------------------------

--
-- Structure for view `declarations_intralot`
--
DROP TABLE IF EXISTS `declarations_intralot`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `declarations_intralot`  AS  (select `etat_expedition_speed`.`Agence` AS `Agence`,`etat_expedition_speed`.`courrier_id` AS `courrier_id`,`etat_expedition_speed`.`Numero` AS `Numero`,`etat_expedition_speed`.`Date` AS `Date`,`etat_expedition_speed`.`Code1` AS `Code1`,`etat_expedition_speed`.`Expediteur` AS `Expediteur`,`etat_expedition_speed`.`Code2` AS `Code2`,`etat_expedition_speed`.`destinataire` AS `destinataire`,`etat_expedition_speed`.`adresse1` AS `adresse1`,`etat_expedition_speed`.`adresse2` AS `adresse2`,`etat_expedition_speed`.`Ville1` AS `Ville1`,`etat_expedition_speed`.`Ville2` AS `Ville2`,`etat_expedition_speed`.`Port` AS `Port`,`etat_expedition_speed`.`Colis` AS `Colis`,`etat_expedition_speed`.`Poids` AS `Poids`,`etat_expedition_speed`.`type` AS `type`,`etat_expedition_speed`.`Montant_ttc` AS `Montant_ttc`,`etat_expedition_speed`.`Espece` AS `Espece`,`etat_expedition_speed`.`Cheque` AS `Cheque`,`etat_expedition_speed`.`Traite` AS `Traite`,`etat_expedition_speed`.`bl` AS `bl`,`etat_expedition_speed`.`Recu` AS `Recu`,`etat_expedition_speed`.`date_recu` AS `date_recu`,`etat_expedition_speed`.`num` AS `num`,`etat_expedition_speed`.`date_bordereau` AS `date_bordereau`,`etat_expedition_speed`.`date_livraison` AS `date_livraison`,`etat_expedition_speed`.`Delais_Cible` AS `Delais_Cible`,`etat_expedition_speed`.`Ecart` AS `Ecart`,`etat_expedition_speed`.`Depassement` AS `Depassement`,`etat_expedition_speed`.`Ecart2` AS `Ecart2`,`etat_expedition_speed`.`service` AS `service`,`etat_expedition_speed`.`BORDEREAU_NUM` AS `BORDEREAU_NUM`,`etat_expedition_speed`.`livraison` AS `livraison`,`etat_expedition_speed`.`ramasseur` AS `ramasseur`,`etat_expedition_speed`.`FC_date1` AS `FC_date1`,`etat_expedition_speed`.`FC_date2` AS `FC_date2`,`etat_expedition_speed`.`date_caisse` AS `date_caisse`,`etat_expedition_speed`.`statut` AS `statut`,`etat_expedition_speed`.`statut_suivis` AS `statut_suivis`,`etat_expedition_speed`.`FC_date_arrive` AS `FC_date_arrive`,`etat_expedition_speed`.`Motif` AS `Motif`,`etat_expedition_speed`.`Taxateur` AS `Taxateur` from `etat_expedition_speed` where `etat_expedition_speed`.`Code1` = '9588') union (select `etat_expedition`.`Agence` AS `Agence`,`etat_expedition`.`courrier_id` AS `courrier_id`,`etat_expedition`.`Numero` AS `Numero`,`etat_expedition`.`Date` AS `Date`,`etat_expedition`.`Code1` AS `Code1`,`etat_expedition`.`Expediteur` AS `Expediteur`,`etat_expedition`.`Code2` AS `Code2`,`etat_expedition`.`destinataire` AS `destinataire`,`etat_expedition`.`adresse1` AS `adresse1`,`etat_expedition`.`adresse2` AS `adresse2`,`etat_expedition`.`Ville1` AS `Ville1`,`etat_expedition`.`Ville2` AS `Ville2`,`etat_expedition`.`Port` AS `Port`,`etat_expedition`.`Colis` AS `Colis`,`etat_expedition`.`Poids` AS `Poids`,`etat_expedition`.`type` AS `type`,`etat_expedition`.`Montant_ttc` AS `Montant_ttc`,`etat_expedition`.`Espece` AS `Espece`,`etat_expedition`.`Cheque` AS `Cheque`,`etat_expedition`.`Traite` AS `Traite`,`etat_expedition`.`bl` AS `bl`,`etat_expedition`.`Recu` AS `Recu`,`etat_expedition`.`date_recu` AS `date_recu`,`etat_expedition`.`num` AS `num`,`etat_expedition`.`date_bordereau` AS `date_bordereau`,`etat_expedition`.`date_livraison` AS `date_livraison`,`etat_expedition`.`Delais_Cible` AS `Delais_Cible`,`etat_expedition`.`Ecart` AS `Ecart`,`etat_expedition`.`Depassement` AS `Depassement`,`etat_expedition`.`Ecart2` AS `Ecart2`,`etat_expedition`.`service` AS `service`,`etat_expedition`.`BORDEREAU_NUM` AS `BORDEREAU_NUM`,`etat_expedition`.`livraison` AS `livraison`,`etat_expedition`.`ramasseur` AS `ramasseur`,`etat_expedition`.`FC_date1` AS `FC_date1`,`etat_expedition`.`FC_date2` AS `FC_date2`,`etat_expedition`.`date_caisse` AS `date_caisse`,`etat_expedition`.`statut` AS `statut`,`etat_expedition`.`statut_suivis` AS `statut_suivis`,`etat_expedition`.`FC_date_arrive` AS `FC_date_arrive`,`etat_expedition`.`Motif` AS `Motif`,`etat_expedition`.`Taxateur` AS `Taxateur` from `etat_expedition` where `etat_expedition`.`Code1` = '9588') order by `Date` ;

-- --------------------------------------------------------

--
-- Structure for view `total_courrier`
--
DROP TABLE IF EXISTS `total_courrier`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `total_courrier`  AS  (select `etat_expedition`.`Agence` AS `Agence`,`etat_expedition`.`courrier_id` AS `courrier_id`,`etat_expedition`.`Numero` AS `Numero`,`etat_expedition`.`Date` AS `Date`,`etat_expedition`.`Code1` AS `Code1`,`etat_expedition`.`Expediteur` AS `Expediteur`,`etat_expedition`.`Code2` AS `Code2`,`etat_expedition`.`destinataire` AS `destinataire`,`etat_expedition`.`adresse1` AS `adresse1`,`etat_expedition`.`adresse2` AS `adresse2`,`etat_expedition`.`Ville1` AS `Ville1`,`etat_expedition`.`Ville2` AS `Ville2`,`etat_expedition`.`Port` AS `Port`,`etat_expedition`.`Colis` AS `Colis`,`etat_expedition`.`Poids` AS `Poids`,`etat_expedition`.`type` AS `type`,`etat_expedition`.`Montant_ttc` AS `Montant_ttc`,`etat_expedition`.`Espece` AS `Espece`,`etat_expedition`.`Cheque` AS `Cheque`,`etat_expedition`.`Traite` AS `Traite`,`etat_expedition`.`bl` AS `bl`,`etat_expedition`.`Recu` AS `Recu`,`etat_expedition`.`date_recu` AS `date_recu`,`etat_expedition`.`num` AS `num`,`etat_expedition`.`date_bordereau` AS `date_bordereau`,`etat_expedition`.`date_livraison` AS `date_livraison`,`etat_expedition`.`Delais_Cible` AS `Delais_Cible`,`etat_expedition`.`Ecart` AS `Ecart`,`etat_expedition`.`Depassement` AS `Depassement`,`etat_expedition`.`Ecart2` AS `Ecart2`,`etat_expedition`.`service` AS `service`,`etat_expedition`.`BORDEREAU_NUM` AS `BORDEREAU_NUM`,`etat_expedition`.`livraison` AS `livraison`,`etat_expedition`.`ramasseur` AS `ramasseur`,`etat_expedition`.`FC_date1` AS `FC_date1`,`etat_expedition`.`FC_date2` AS `FC_date2`,`etat_expedition`.`date_caisse` AS `date_caisse`,`etat_expedition`.`statut` AS `statut`,`etat_expedition`.`statut_suivis` AS `statut_suivis`,`etat_expedition`.`FC_date_arrive` AS `FC_date_arrive`,`etat_expedition`.`Motif` AS `Motif`,`etat_expedition`.`Taxateur` AS `Taxateur` from `etat_expedition`) union (select `etat_expedition_speed`.`Agence` AS `Agence`,`etat_expedition_speed`.`courrier_id` AS `courrier_id`,`etat_expedition_speed`.`Numero` AS `Numero`,`etat_expedition_speed`.`Date` AS `Date`,`etat_expedition_speed`.`Code1` AS `Code1`,`etat_expedition_speed`.`Expediteur` AS `Expediteur`,`etat_expedition_speed`.`Code2` AS `Code2`,`etat_expedition_speed`.`destinataire` AS `destinataire`,`etat_expedition_speed`.`adresse1` AS `adresse1`,`etat_expedition_speed`.`adresse2` AS `adresse2`,`etat_expedition_speed`.`Ville1` AS `Ville1`,`etat_expedition_speed`.`Ville2` AS `Ville2`,`etat_expedition_speed`.`Port` AS `Port`,`etat_expedition_speed`.`Colis` AS `Colis`,`etat_expedition_speed`.`Poids` AS `Poids`,`etat_expedition_speed`.`type` AS `type`,`etat_expedition_speed`.`Montant_ttc` AS `Montant_ttc`,`etat_expedition_speed`.`Espece` AS `Espece`,`etat_expedition_speed`.`Cheque` AS `Cheque`,`etat_expedition_speed`.`Traite` AS `Traite`,`etat_expedition_speed`.`bl` AS `bl`,`etat_expedition_speed`.`Recu` AS `Recu`,`etat_expedition_speed`.`date_recu` AS `date_recu`,`etat_expedition_speed`.`num` AS `num`,`etat_expedition_speed`.`date_bordereau` AS `date_bordereau`,`etat_expedition_speed`.`date_livraison` AS `date_livraison`,`etat_expedition_speed`.`Delais_Cible` AS `Delais_Cible`,`etat_expedition_speed`.`Ecart` AS `Ecart`,`etat_expedition_speed`.`Depassement` AS `Depassement`,`etat_expedition_speed`.`Ecart2` AS `Ecart2`,`etat_expedition_speed`.`service` AS `service`,`etat_expedition_speed`.`BORDEREAU_NUM` AS `BORDEREAU_NUM`,`etat_expedition_speed`.`livraison` AS `livraison`,`etat_expedition_speed`.`ramasseur` AS `ramasseur`,`etat_expedition_speed`.`FC_date1` AS `FC_date1`,`etat_expedition_speed`.`FC_date2` AS `FC_date2`,`etat_expedition_speed`.`date_caisse` AS `date_caisse`,`etat_expedition_speed`.`statut` AS `statut`,`etat_expedition_speed`.`statut_suivis` AS `statut_suivis`,`etat_expedition_speed`.`FC_date_arrive` AS `FC_date_arrive`,`etat_expedition_speed`.`Motif` AS `Motif`,`etat_expedition_speed`.`Taxateur` AS `Taxateur` from `etat_expedition_speed`) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `etat_expedition`
--
ALTER TABLE `etat_expedition`
  ADD PRIMARY KEY (`courrier_id`);
--
-- Database: `lvexfw`
--
CREATE DATABASE IF NOT EXISTS `lvexfw` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `lvexfw`;

-- --------------------------------------------------------

--
-- Table structure for table `declarations`
--

CREATE TABLE `declarations` (
  `numero` varchar(255) NOT NULL,
  `facture_id` varchar(255) DEFAULT NULL,
  `colis` int(11) NOT NULL,
  `poids` decimal(8,2) NOT NULL,
  `palettes` int(11) DEFAULT NULL,
  `paletteA` int(11) DEFAULT NULL,
  `paletteB` int(11) DEFAULT NULL,
  `paletteC` int(11) DEFAULT NULL,
  `paletteAutre` int(11) DEFAULT NULL,
  `Nbre_palettes` int(11) DEFAULT NULL,
  `longueur` decimal(8,2) DEFAULT NULL,
  `hauteur` decimal(8,2) DEFAULT NULL,
  `largeur` decimal(8,2) DEFAULT NULL,
  `coef` decimal(8,2) DEFAULT NULL,
  `valeur` decimal(24,2) NOT NULL,
  `client1_id` int(11) NOT NULL,
  `client2_id` int(11) NOT NULL,
  `livraison` char(5) DEFAULT NULL,
  `express` char(5) NOT NULL,
  `port` char(5) NOT NULL,
  `courrier_typ` char(5) NOT NULL,
  `courrier_eta` char(5) NOT NULL,
  `userid` int(11) NOT NULL,
  `nature` varchar(255) DEFAULT NULL,
  `Espece` decimal(16,2) DEFAULT NULL,
  `Cheque` decimal(16,2) DEFAULT NULL,
  `Traite` decimal(16,2) DEFAULT NULL,
  `Nbre_BL` int(11) DEFAULT NULL,
  `BL` varchar(255) DEFAULT NULL,
  `id_adres` int(11) NOT NULL,
  `statut` varchar(255) DEFAULT NULL,
  `commentaire` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2021_04_19_094447_create_declarations_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- Database: `lve_gpda`
--
CREATE DATABASE IF NOT EXISTS `lve_gpda` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `lve_gpda`;

-- --------------------------------------------------------

--
-- Table structure for table `agence`
--

CREATE TABLE `agence` (
  `AGENCE_COD` varchar(4) NOT NULL,
  `AGENCE_LIB` varchar(250) NOT NULL,
  `AGENCE_ADRESSE` varchar(250) NOT NULL,
  `AGENCE_TEL` varchar(20) NOT NULL,
  `modifie_le` datetime DEFAULT NULL,
  `supprime_le` datetime DEFAULT NULL,
  `commit_par` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `agence`
--

INSERT INTO `agence` (`AGENCE_COD`, `AGENCE_LIB`, `AGENCE_ADRESSE`, `AGENCE_TEL`, `modifie_le`, `supprime_le`, `commit_par`) VALUES
('100', 'Casablanca', '19, rue abou bakr ibnou koutia, oukacha , ain sebaa', '0522344316', NULL, NULL, NULL),
('110', 'El jadida', '19, lot ennassim, rue essafa', '0523390304', NULL, NULL, NULL),
('120', 'Safi', '56 route de l aviation kodiat si hamza', '0524462226', NULL, NULL, NULL),
('200', 'Tanger', '103 alle n 3 zone industrielle mghougha', '0539352455 /56', NULL, NULL, NULL),
('210', 'Tetouan', 'nahj el baraka el kheniores en face college ibn sina', '0539713155', NULL, NULL, NULL),
('220', 'Larache', 'Avenue du Caire N 116', '0539914122', NULL, NULL, NULL),
('300', 'Agadir', '17 rue rue titou, quartiert el quods', '0528223822', NULL, NULL, NULL),
('350', 'Ait Melloul', '18, lot guicharde, avenue med VI', '0528246824', NULL, NULL, NULL),
('400', 'Oujda', '13 angle rass foughal et abdellah ben yassine', '0536705196', NULL, NULL, NULL),
('410', 'Nador', 'bd niama n 79, quartier ouled mimoun', '0536603160', NULL, NULL, NULL),
('430', 'Taza', '272, bloc 2 adarissa', '0535285078', NULL, NULL, NULL),
('500', 'FES', 'Qt sidi brahim rue 806', '0535658103', NULL, NULL, NULL),
('550', 'Meknes', '201 avenue des far ville nouvelle', '0535511141', NULL, NULL, NULL),
('600', 'Rabat', '77 rue london, l\'ocean', '0537262597', NULL, NULL, NULL),
('650', 'Kenitra', '10 rue ibnou al banna, ville nouvelle', '0537379821', NULL, NULL, NULL),
('700', 'Marrakech', '514 quartier industriel sidi ghanem', '0524336174', NULL, NULL, NULL),
('800', 'Beni Mellal', '8JPR+MJ Beni Mellal', '0523483928', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `historique_maj`
--

CREATE TABLE `historique_maj` (
  `id_maj` int(11) NOT NULL,
  `id_pda` int(11) NOT NULL,
  `id_utilisateur` int(11) NOT NULL,
  `mis_a_jour_le` datetime NOT NULL DEFAULT current_timestamp(),
  `statut` varchar(250) NOT NULL,
  `commentaire` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `livreurs`
--

CREATE TABLE `livreurs` (
  `id_livreur` int(11) NOT NULL,
  `nom` varchar(250) DEFAULT NULL,
  `prenom` varchar(250) DEFAULT NULL,
  `agence` int(11) DEFAULT NULL,
  `matricule` varchar(50) DEFAULT NULL,
  `date_embauche` datetime DEFAULT NULL,
  `date_sortie` datetime DEFAULT NULL,
  `numero_telephone` varchar(20) DEFAULT NULL,
  `date_creation` date NOT NULL DEFAULT current_timestamp(),
  `date_modification` date DEFAULT NULL,
  `date_suppression` date DEFAULT NULL,
  `commit_par` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `marque`
--

CREATE TABLE `marque` (
  `id_marque` int(11) NOT NULL,
  `nomination` varchar(250) DEFAULT NULL,
  `date_creation` datetime DEFAULT current_timestamp(),
  `date_modification` datetime DEFAULT NULL,
  `date_suppression` datetime DEFAULT NULL,
  `commit_par` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `pda`
--

CREATE TABLE `pda` (
  `id_pda` int(11) NOT NULL,
  `nomination` varchar(250) DEFAULT NULL,
  `Marque` int(11) NOT NULL,
  `imei` varchar(250) DEFAULT NULL,
  `mac_wifi` varchar(250) DEFAULT NULL,
  `affectation` int(11) NOT NULL,
  `date_affectation` datetime NOT NULL,
  `licence_pda` int(11) NOT NULL,
  `date_creation` datetime NOT NULL DEFAULT current_timestamp(),
  `date_modification` datetime DEFAULT NULL,
  `date_suppression` datetime DEFAULT NULL,
  `commit_par` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `pda_maj`
--

CREATE TABLE `pda_maj` (
  `id_maj` int(11) NOT NULL,
  `titre_maj` varchar(250) NOT NULL,
  `description_maj` text DEFAULT NULL,
  `date_debut` datetime NOT NULL,
  `date_fin` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `reparation`
--

CREATE TABLE `reparation` (
  `id_reparation` int(11) NOT NULL,
  `motif_reparation` text NOT NULL,
  `pda` int(11) NOT NULL,
  `date_reparation` datetime NOT NULL DEFAULT current_timestamp(),
  `date_fin_reparation` datetime NOT NULL,
  `commentaire` int(11) NOT NULL,
  `effectue_par` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `utilisateurs`
--

CREATE TABLE `utilisateurs` (
  `id` int(11) NOT NULL,
  `nom` varchar(250) NOT NULL,
  `prenom` varchar(250) NOT NULL,
  `poste` varchar(250) NOT NULL,
  `us_login` varchar(50) NOT NULL,
  `us_mdpasse` varchar(250) NOT NULL DEFAULT '7c222fb2927d828af22f592134e8932480637c0d',
  `date_creation` datetime NOT NULL DEFAULT current_timestamp(),
  `date_modification` datetime DEFAULT NULL,
  `date_suppression` datetime DEFAULT NULL,
  `commit_par` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `agence`
--
ALTER TABLE `agence`
  ADD PRIMARY KEY (`AGENCE_COD`);

--
-- Indexes for table `livreurs`
--
ALTER TABLE `livreurs`
  ADD PRIMARY KEY (`id_livreur`),
  ADD UNIQUE KEY `matricule` (`matricule`);

--
-- Indexes for table `marque`
--
ALTER TABLE `marque`
  ADD PRIMARY KEY (`id_marque`);

--
-- Indexes for table `pda`
--
ALTER TABLE `pda`
  ADD PRIMARY KEY (`id_pda`);

--
-- Indexes for table `pda_maj`
--
ALTER TABLE `pda_maj`
  ADD PRIMARY KEY (`id_maj`);

--
-- Indexes for table `reparation`
--
ALTER TABLE `reparation`
  ADD PRIMARY KEY (`id_reparation`);

--
-- Indexes for table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `log_uni` (`us_login`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `livreurs`
--
ALTER TABLE `livreurs`
  MODIFY `id_livreur` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `marque`
--
ALTER TABLE `marque`
  MODIFY `id_marque` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pda`
--
ALTER TABLE `pda`
  MODIFY `id_pda` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pda_maj`
--
ALTER TABLE `pda_maj`
  MODIFY `id_maj` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `reparation`
--
ALTER TABLE `reparation`
  MODIFY `id_reparation` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- Database: `lve_taxation_test`
--
CREATE DATABASE IF NOT EXISTS `lve_taxation_test` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `lve_taxation_test`;

-- --------------------------------------------------------

--
-- Table structure for table `adresses`
--

CREATE TABLE `adresses` (
  `id_adresse` bigint(20) UNSIGNED NOT NULL,
  `lib_adresse` varchar(255) NOT NULL,
  `id_client` bigint(20) NOT NULL,
  `id_user` bigint(20) NOT NULL,
  `id_ville` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `agences`
--

CREATE TABLE `agences` (
  `AGENCE_COD` varchar(255) NOT NULL,
  `AGENCE_LIB` varchar(255) NOT NULL,
  `AGENCE_ADRESSE` varchar(255) NOT NULL,
  `AGENCE_TEL` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `CLIENT_ID` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `NOM` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `PRENOM` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `CIVILITE_COD` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `CLIENT_TYP` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `IDENTITE_TYP` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'de',
  `IDENTITE_VAL` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ID_FISCALE` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `CAPITAL_SOC` decimal(50,0) DEFAULT NULL,
  `CLIENT_ETA` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `MOTIF_ETA` int(11) DEFAULT NULL,
  `SECTEUR_COD` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `EMPLOYE_ID` int(11) DEFAULT NULL,
  `AGENCE_COD` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `CLIENT_COD` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `commentaire` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mail` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ICE` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `CLIENT_ID_client_lve` int(11) NOT NULL,
  `telephone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `client_lves`
--

CREATE TABLE `client_lves` (
  `CLIENT_ID` bigint(20) UNSIGNED NOT NULL,
  `CLIENT_COD` varchar(255) NOT NULL,
  `NOM` varchar(255) NOT NULL,
  `PRENOM` varchar(255) DEFAULT NULL,
  `CIVILITE_COD` varchar(255) DEFAULT NULL,
  `CLIENT_TYP` varchar(255) DEFAULT NULL,
  `IDENTITE_TYP` varchar(255) NOT NULL DEFAULT 'de',
  `IDENTITE_VAL` varchar(255) DEFAULT NULL,
  `ID_FISCALE` varchar(255) DEFAULT NULL,
  `CAPITAL_SOC` decimal(50,0) DEFAULT NULL,
  `CLIENT_ETA` varchar(255) DEFAULT NULL,
  `MOTIF_ETA` int(11) DEFAULT NULL,
  `SECTEUR_COD` varchar(255) DEFAULT NULL,
  `EMPLOYE_ID` int(11) DEFAULT NULL,
  `AGENCE_COD` varchar(255) DEFAULT NULL,
  `CLIENT_COD2` varchar(255) NOT NULL,
  `debinterval` int(11) NOT NULL DEFAULT 0,
  `fininterval` int(11) NOT NULL DEFAULT 0,
  `intervalag_deb` int(11) NOT NULL DEFAULT 0,
  `intervalag_fin` int(11) NOT NULL DEFAULT 0,
  `commentaire` varchar(255) DEFAULT NULL,
  `mail` varchar(255) NOT NULL,
  `ICE` varchar(255) DEFAULT NULL,
  `adresse` varchar(255) NOT NULL,
  `ville` varchar(255) NOT NULL,
  `telephone` varchar(255) NOT NULL,
  `login` varchar(255) NOT NULL,
  `mot_de_passe` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `declarations`
--

CREATE TABLE `declarations` (
  `numero` varchar(255) NOT NULL,
  `facture_id` varchar(255) DEFAULT NULL,
  `colis` int(11) NOT NULL,
  `poids` decimal(8,2) NOT NULL,
  `palettes` int(11) DEFAULT NULL,
  `paletteA` int(11) DEFAULT NULL,
  `paletteB` int(11) DEFAULT NULL,
  `paletteC` int(11) DEFAULT NULL,
  `paletteAutre` int(11) DEFAULT NULL,
  `Nbre_palettes` int(11) DEFAULT NULL,
  `longueur` decimal(8,2) DEFAULT NULL,
  `hauteur` decimal(8,2) DEFAULT NULL,
  `largeur` decimal(8,2) DEFAULT NULL,
  `coef` decimal(8,2) DEFAULT NULL,
  `valeur` decimal(24,2) NOT NULL,
  `client1_id` int(11) NOT NULL,
  `client2_id` int(11) NOT NULL,
  `livraison` char(5) DEFAULT NULL,
  `express` char(5) NOT NULL,
  `port` char(5) NOT NULL,
  `courrier_typ` char(5) NOT NULL,
  `courrier_eta` char(5) NOT NULL,
  `userid` int(11) NOT NULL,
  `nature` varchar(255) DEFAULT NULL,
  `Espece` decimal(16,2) DEFAULT NULL,
  `Cheque` decimal(16,2) DEFAULT NULL,
  `Traite` decimal(16,2) DEFAULT NULL,
  `Nbre_BL` int(11) DEFAULT NULL,
  `BL` varchar(255) DEFAULT NULL,
  `id_adres` int(11) NOT NULL,
  `statut` varchar(255) DEFAULT NULL,
  `commentaire` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_11_27_142330_create_clients_table', 1),
(5, '2019_11_27_142617_create_declarations_table', 1),
(6, '2019_11_27_142647_create_agences_table', 1),
(7, '2019_11_27_142700_create_villes_table', 1),
(8, '2019_11_27_142714_create_sessions_table', 1),
(9, '2019_11_27_142812_create_adresses_table', 1),
(10, '2019_11_27_142838_create_points_relais_table', 1),
(11, '2019_11_28_113248_create_client_lves_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `points_relais`
--

CREATE TABLE `points_relais` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `AGENCE_COD` varchar(255) NOT NULL,
  `AGENCE_LIB` varchar(255) NOT NULL,
  `REFERENCIEE` bigint(20) NOT NULL,
  `LOGIN` varchar(255) NOT NULL,
  `MOT_D_PASS` varchar(255) NOT NULL,
  `IDENTITE_TYP` varchar(255) NOT NULL DEFAULT 'de',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `codeuser` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `villes`
--

CREATE TABLE `villes` (
  `VILLE_COD` bigint(20) NOT NULL,
  `AGENCE_COD` varchar(255) NOT NULL,
  `VILLE_LIB` varchar(255) NOT NULL,
  `VILLE_TYP` varchar(255) DEFAULT NULL,
  `DELAI` smallint(6) DEFAULT NULL,
  `ZONE_COD` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `villes`
--

INSERT INTO `villes` (`VILLE_COD`, `AGENCE_COD`, `VILLE_LIB`, `VILLE_TYP`, `DELAI`, `ZONE_COD`, `created_at`, `updated_at`) VALUES
(100, '100', 'Casablanca', '1', 1, 'A', '2021-04-19 15:34:42', NULL),
(800, '800', 'Beni Méllal', '1', 2, 'A', '2021-04-19 15:34:42', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `adresses`
--
ALTER TABLE `adresses`
  ADD PRIMARY KEY (`id_adresse`);

--
-- Indexes for table `client_lves`
--
ALTER TABLE `client_lves`
  ADD PRIMARY KEY (`CLIENT_ID`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `points_relais`
--
ALTER TABLE `points_relais`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `adresses`
--
ALTER TABLE `adresses`
  MODIFY `id_adresse` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `client_lves`
--
ALTER TABLE `client_lves`
  MODIFY `CLIENT_ID` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `points_relais`
--
ALTER TABLE `points_relais`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- Database: `phpmyadmin`
--
CREATE DATABASE IF NOT EXISTS `phpmyadmin` DEFAULT CHARACTER SET utf8 COLLATE utf8_bin;
USE `phpmyadmin`;

-- --------------------------------------------------------

--
-- Table structure for table `pma__bookmark`
--

CREATE TABLE `pma__bookmark` (
  `id` int(10) UNSIGNED NOT NULL,
  `dbase` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `user` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `label` varchar(255) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `query` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Bookmarks';

-- --------------------------------------------------------

--
-- Table structure for table `pma__central_columns`
--

CREATE TABLE `pma__central_columns` (
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `col_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `col_type` varchar(64) COLLATE utf8_bin NOT NULL,
  `col_length` text COLLATE utf8_bin DEFAULT NULL,
  `col_collation` varchar(64) COLLATE utf8_bin NOT NULL,
  `col_isNull` tinyint(1) NOT NULL,
  `col_extra` varchar(255) COLLATE utf8_bin DEFAULT '',
  `col_default` text COLLATE utf8_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Central list of columns';

-- --------------------------------------------------------

--
-- Table structure for table `pma__column_info`
--

CREATE TABLE `pma__column_info` (
  `id` int(5) UNSIGNED NOT NULL,
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `column_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `comment` varchar(255) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `mimetype` varchar(255) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `transformation` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `transformation_options` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `input_transformation` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `input_transformation_options` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Column information for phpMyAdmin';

-- --------------------------------------------------------

--
-- Table structure for table `pma__designer_settings`
--

CREATE TABLE `pma__designer_settings` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `settings_data` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Settings related to Designer';

-- --------------------------------------------------------

--
-- Table structure for table `pma__export_templates`
--

CREATE TABLE `pma__export_templates` (
  `id` int(5) UNSIGNED NOT NULL,
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `export_type` varchar(10) COLLATE utf8_bin NOT NULL,
  `template_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `template_data` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Saved export templates';

-- --------------------------------------------------------

--
-- Table structure for table `pma__favorite`
--

CREATE TABLE `pma__favorite` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `tables` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Favorite tables';

-- --------------------------------------------------------

--
-- Table structure for table `pma__history`
--

CREATE TABLE `pma__history` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `db` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `table` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `timevalue` timestamp NOT NULL DEFAULT current_timestamp(),
  `sqlquery` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='SQL history for phpMyAdmin';

-- --------------------------------------------------------

--
-- Table structure for table `pma__navigationhiding`
--

CREATE TABLE `pma__navigationhiding` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `item_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `item_type` varchar(64) COLLATE utf8_bin NOT NULL,
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Hidden items of navigation tree';

-- --------------------------------------------------------

--
-- Table structure for table `pma__pdf_pages`
--

CREATE TABLE `pma__pdf_pages` (
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `page_nr` int(10) UNSIGNED NOT NULL,
  `page_descr` varchar(50) CHARACTER SET utf8 NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='PDF relation pages for phpMyAdmin';

-- --------------------------------------------------------

--
-- Table structure for table `pma__recent`
--

CREATE TABLE `pma__recent` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `tables` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Recently accessed tables';

-- --------------------------------------------------------

--
-- Table structure for table `pma__relation`
--

CREATE TABLE `pma__relation` (
  `master_db` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `master_table` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `master_field` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `foreign_db` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `foreign_table` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `foreign_field` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Relation table';

-- --------------------------------------------------------

--
-- Table structure for table `pma__savedsearches`
--

CREATE TABLE `pma__savedsearches` (
  `id` int(5) UNSIGNED NOT NULL,
  `username` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `search_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `search_data` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Saved searches';

-- --------------------------------------------------------

--
-- Table structure for table `pma__table_coords`
--

CREATE TABLE `pma__table_coords` (
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `pdf_page_number` int(11) NOT NULL DEFAULT 0,
  `x` float UNSIGNED NOT NULL DEFAULT 0,
  `y` float UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Table coordinates for phpMyAdmin PDF output';

-- --------------------------------------------------------

--
-- Table structure for table `pma__table_info`
--

CREATE TABLE `pma__table_info` (
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `display_field` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Table information for phpMyAdmin';

-- --------------------------------------------------------

--
-- Table structure for table `pma__table_uiprefs`
--

CREATE TABLE `pma__table_uiprefs` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `prefs` text COLLATE utf8_bin NOT NULL,
  `last_update` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Tables'' UI preferences';

-- --------------------------------------------------------

--
-- Table structure for table `pma__tracking`
--

CREATE TABLE `pma__tracking` (
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `version` int(10) UNSIGNED NOT NULL,
  `date_created` datetime NOT NULL,
  `date_updated` datetime NOT NULL,
  `schema_snapshot` text COLLATE utf8_bin NOT NULL,
  `schema_sql` text COLLATE utf8_bin DEFAULT NULL,
  `data_sql` longtext COLLATE utf8_bin DEFAULT NULL,
  `tracking` set('UPDATE','REPLACE','INSERT','DELETE','TRUNCATE','CREATE DATABASE','ALTER DATABASE','DROP DATABASE','CREATE TABLE','ALTER TABLE','RENAME TABLE','DROP TABLE','CREATE INDEX','DROP INDEX','CREATE VIEW','ALTER VIEW','DROP VIEW') COLLATE utf8_bin DEFAULT NULL,
  `tracking_active` int(1) UNSIGNED NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Database changes tracking for phpMyAdmin';

-- --------------------------------------------------------

--
-- Table structure for table `pma__userconfig`
--

CREATE TABLE `pma__userconfig` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `timevalue` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `config_data` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='User preferences storage for phpMyAdmin';

--
-- Dumping data for table `pma__userconfig`
--

INSERT INTO `pma__userconfig` (`username`, `timevalue`, `config_data`) VALUES
('root', '2020-12-10 12:00:43', '{\"Console\\/Mode\":\"collapse\",\"lang\":\"fr\",\"DefaultConnectionCollation\":\"utf8mb4_general_ci\"}');

-- --------------------------------------------------------

--
-- Table structure for table `pma__usergroups`
--

CREATE TABLE `pma__usergroups` (
  `usergroup` varchar(64) COLLATE utf8_bin NOT NULL,
  `tab` varchar(64) COLLATE utf8_bin NOT NULL,
  `allowed` enum('Y','N') COLLATE utf8_bin NOT NULL DEFAULT 'N'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='User groups with configured menu items';

-- --------------------------------------------------------

--
-- Table structure for table `pma__users`
--

CREATE TABLE `pma__users` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `usergroup` varchar(64) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Users and their assignments to user groups';

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pma__bookmark`
--
ALTER TABLE `pma__bookmark`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pma__central_columns`
--
ALTER TABLE `pma__central_columns`
  ADD PRIMARY KEY (`db_name`,`col_name`);

--
-- Indexes for table `pma__column_info`
--
ALTER TABLE `pma__column_info`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `db_name` (`db_name`,`table_name`,`column_name`);

--
-- Indexes for table `pma__designer_settings`
--
ALTER TABLE `pma__designer_settings`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `pma__export_templates`
--
ALTER TABLE `pma__export_templates`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `u_user_type_template` (`username`,`export_type`,`template_name`);

--
-- Indexes for table `pma__favorite`
--
ALTER TABLE `pma__favorite`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `pma__history`
--
ALTER TABLE `pma__history`
  ADD PRIMARY KEY (`id`),
  ADD KEY `username` (`username`,`db`,`table`,`timevalue`);

--
-- Indexes for table `pma__navigationhiding`
--
ALTER TABLE `pma__navigationhiding`
  ADD PRIMARY KEY (`username`,`item_name`,`item_type`,`db_name`,`table_name`);

--
-- Indexes for table `pma__pdf_pages`
--
ALTER TABLE `pma__pdf_pages`
  ADD PRIMARY KEY (`page_nr`),
  ADD KEY `db_name` (`db_name`);

--
-- Indexes for table `pma__recent`
--
ALTER TABLE `pma__recent`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `pma__relation`
--
ALTER TABLE `pma__relation`
  ADD PRIMARY KEY (`master_db`,`master_table`,`master_field`),
  ADD KEY `foreign_field` (`foreign_db`,`foreign_table`);

--
-- Indexes for table `pma__savedsearches`
--
ALTER TABLE `pma__savedsearches`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `u_savedsearches_username_dbname` (`username`,`db_name`,`search_name`);

--
-- Indexes for table `pma__table_coords`
--
ALTER TABLE `pma__table_coords`
  ADD PRIMARY KEY (`db_name`,`table_name`,`pdf_page_number`);

--
-- Indexes for table `pma__table_info`
--
ALTER TABLE `pma__table_info`
  ADD PRIMARY KEY (`db_name`,`table_name`);

--
-- Indexes for table `pma__table_uiprefs`
--
ALTER TABLE `pma__table_uiprefs`
  ADD PRIMARY KEY (`username`,`db_name`,`table_name`);

--
-- Indexes for table `pma__tracking`
--
ALTER TABLE `pma__tracking`
  ADD PRIMARY KEY (`db_name`,`table_name`,`version`);

--
-- Indexes for table `pma__userconfig`
--
ALTER TABLE `pma__userconfig`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `pma__usergroups`
--
ALTER TABLE `pma__usergroups`
  ADD PRIMARY KEY (`usergroup`,`tab`,`allowed`);

--
-- Indexes for table `pma__users`
--
ALTER TABLE `pma__users`
  ADD PRIMARY KEY (`username`,`usergroup`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pma__bookmark`
--
ALTER TABLE `pma__bookmark`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pma__column_info`
--
ALTER TABLE `pma__column_info`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pma__export_templates`
--
ALTER TABLE `pma__export_templates`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pma__history`
--
ALTER TABLE `pma__history`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pma__pdf_pages`
--
ALTER TABLE `pma__pdf_pages`
  MODIFY `page_nr` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pma__savedsearches`
--
ALTER TABLE `pma__savedsearches`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- Database: `questionnaire`
--
CREATE DATABASE IF NOT EXISTS `questionnaire` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `questionnaire`;

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id_admin` int(11) NOT NULL,
  `pseudo` varchar(30) NOT NULL,
  `mot_de_passe` varchar(30) NOT NULL,
  `nom` varchar(30) NOT NULL,
  `prenom` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id_admin`, `pseudo`, `mot_de_passe`, `nom`, `prenom`) VALUES
(1, 'm.aber', 'mouaddd', 'ABER', 'Mouad');

-- --------------------------------------------------------

--
-- Table structure for table `questionnaire`
--

CREATE TABLE `questionnaire` (
  `id_questionnaire` int(11) NOT NULL,
  `titre_questionnaire` varchar(250) NOT NULL,
  `statut_questionnaire` varchar(50) NOT NULL DEFAULT 'nouveau',
  `date_creation` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `questionnaire`
--

INSERT INTO `questionnaire` (`id_questionnaire`, `titre_questionnaire`, `statut_questionnaire`, `date_creation`) VALUES
(1, 'Questionnaire SMSI', 'nouveau', '2020-03-09'),
(2, 'Questionnaire GED', 'cloture', '2020-03-09'),
(3, 'Questionnaire SI', 'nouveau', '2020-03-09'),
(4, 'Questionnaire TEST', 'nouveau', '2020-03-09'),
(5, 'Satisfaction partie interrr', 'nouveau', '2020-03-10'),
(6, 'Questionnaire TEST 2', 'nouveau', '2020-03-10');

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `id_question` int(11) NOT NULL,
  `question` text NOT NULL,
  `id_questionnaire` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`id_question`, `question`, `id_questionnaire`) VALUES
(1, 'Est ce que votre entreprise a une solution antivirale ?', 1),
(2, 'SMSI signife ?', 1),
(3, 'Est que l\'audit SMSI est utile pour vous?', 1),
(4, 'Question de Test 1?', 3),
(5, 'Question de Test 1?', 1),
(6, 'Est que l\'audit SMSI est utile pour vous?', 4),
(7, 'Question de Test 2?', 4),
(8, 'Est ce que nnnn', 5);

-- --------------------------------------------------------

--
-- Table structure for table `reponses`
--

CREATE TABLE `reponses` (
  `id_reponses` int(11) NOT NULL,
  `reponse` text NOT NULL,
  `id_question` int(11) NOT NULL,
  `validite` varchar(10) NOT NULL,
  `point` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `reponses`
--

INSERT INTO `reponses` (`id_reponses`, `reponse`, `id_question`, `validite`, `point`) VALUES
(1, 'Oui', 1, 'V', 1),
(2, 'Non', 1, 'F', 0),
(3, 'solution antiviral minimale ', 1, 'F', 0),
(6, 'Système de management du système informatique.  ', 2, 'V', 1),
(7, 'Système de management de sécurité informatique.  ', 2, 'V', 1),
(8, 'Système de management de santé immo.  ', 2, 'F', 0),
(9, 'Système de messagerie SI', 2, 'F', 0),
(11, 'Pas de solutions', 1, 'F', 0),
(13, 'Non', 3, 'F', 0),
(14, 'Pas d\'information', 3, 'F', 0),
(15, 'coté SI Oui', 3, 'V', 1),
(16, 'Généralement Oui', 3, 'V', 1),
(17, 'Pas d\'information', 4, 'F', 0),
(18, 'Non', 4, 'V', 1),
(19, 'Non', 5, 'V', 1),
(20, 'Oui', 5, 'F', 0),
(21, 'Oui', 6, 'V', 1),
(22, 'Non', 6, 'F', 0),
(23, 'Oui', 8, 'F', 0),
(24, 'Non', 8, 'V', 1);

--
-- Triggers `reponses`
--
DELIMITER $$
CREATE TRIGGER `validite_check` BEFORE INSERT ON `reponses` FOR EACH ROW BEGIN
    IF(new.validite ='F') THEN
	SET NEW.point = 0;
    END IF;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `reponses_questionnaire`
--

CREATE TABLE `reponses_questionnaire` (
  `id_questionnaire` int(11) NOT NULL,
  `id_question` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_reponse` int(11) NOT NULL,
  `score` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `reponses_questionnaire`
--

INSERT INTO `reponses_questionnaire` (`id_questionnaire`, `id_question`, `id_user`, `id_reponse`, `score`) VALUES
(1, 1, 5, 1, 1),
(1, 1, 6, 1, 1),
(1, 1, 9, 1, 1),
(1, 1, 10, 1, 1),
(1, 1, 12, 2, 0),
(1, 2, 5, 6, 1),
(1, 2, 5, 7, 1),
(1, 2, 6, 6, 1),
(1, 2, 6, 7, 1),
(1, 2, 9, 7, 1),
(1, 2, 10, 6, 1),
(1, 2, 10, 7, 1),
(1, 2, 12, 7, 1),
(1, 2, 12, 8, 0),
(1, 3, 5, 15, 1),
(1, 3, 6, 15, 1),
(1, 3, 6, 16, 1),
(1, 3, 9, 14, 0),
(1, 3, 10, 15, 1),
(1, 3, 12, 14, 0),
(1, 5, 10, 19, 1),
(1, 5, 12, 20, 0),
(3, 4, 5, 18, 1),
(3, 4, 6, 17, 0),
(4, 6, 11, 21, 1);

-- --------------------------------------------------------

--
-- Table structure for table `score_questionnaire`
--

CREATE TABLE `score_questionnaire` (
  `id_questionnaire` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `score` int(11) NOT NULL,
  `date_passage` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `score_questionnaire`
--

INSERT INTO `score_questionnaire` (`id_questionnaire`, `id_user`, `score`, `date_passage`) VALUES
(1, 5, 2, '2020-03-09'),
(1, 6, 3, '2020-03-09'),
(1, 9, 1, '2020-03-09'),
(1, 10, 3, '2020-03-09'),
(1, 12, 0, '2020-03-10'),
(3, 5, 1, '2020-03-09'),
(3, 6, 0, '2020-03-09');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nom`, `prenom`) VALUES
(5, 'Hassou', 'Jawhar'),
(6, 'Takourt', 'Youssef'),
(7, 'Hassou', 'Youssef'),
(8, 'Takourt', 'Yousse'),
(9, 'Takourt', 'Jawhar'),
(10, 'Taxat-cara', 'Jawhar'),
(11, 'Mouad', 'Aber'),
(12, 'Boussalham', 'Mohammed');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `questionnaire`
--
ALTER TABLE `questionnaire`
  ADD PRIMARY KEY (`id_questionnaire`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`id_question`),
  ADD KEY `Fk_id_questionnaire_question` (`id_questionnaire`);

--
-- Indexes for table `reponses`
--
ALTER TABLE `reponses`
  ADD PRIMARY KEY (`id_reponses`),
  ADD KEY `fk_id_question_choix` (`id_question`);

--
-- Indexes for table `reponses_questionnaire`
--
ALTER TABLE `reponses_questionnaire`
  ADD PRIMARY KEY (`id_questionnaire`,`id_question`,`id_user`,`id_reponse`),
  ADD KEY `id_question` (`id_question`),
  ADD KEY `id_reponse` (`id_reponse`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `score_questionnaire`
--
ALTER TABLE `score_questionnaire`
  ADD PRIMARY KEY (`id_questionnaire`,`id_user`),
  ADD KEY `FK_score_id_user` (`id_user`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `questionnaire`
--
ALTER TABLE `questionnaire`
  MODIFY `id_questionnaire` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `id_question` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `reponses`
--
ALTER TABLE `reponses`
  MODIFY `id_reponses` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `questions`
--
ALTER TABLE `questions`
  ADD CONSTRAINT `Fk_id_questionnaire_question` FOREIGN KEY (`id_questionnaire`) REFERENCES `questionnaire` (`id_questionnaire`);

--
-- Constraints for table `reponses`
--
ALTER TABLE `reponses`
  ADD CONSTRAINT `fk_id_question_choix` FOREIGN KEY (`id_question`) REFERENCES `questions` (`id_question`);

--
-- Constraints for table `reponses_questionnaire`
--
ALTER TABLE `reponses_questionnaire`
  ADD CONSTRAINT `reponses_questionnaire_ibfk_1` FOREIGN KEY (`id_questionnaire`) REFERENCES `questionnaire` (`id_questionnaire`),
  ADD CONSTRAINT `reponses_questionnaire_ibfk_2` FOREIGN KEY (`id_question`) REFERENCES `questions` (`id_question`),
  ADD CONSTRAINT `reponses_questionnaire_ibfk_3` FOREIGN KEY (`id_reponse`) REFERENCES `reponses` (`id_reponses`),
  ADD CONSTRAINT `reponses_questionnaire_ibfk_4` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`);

--
-- Constraints for table `score_questionnaire`
--
ALTER TABLE `score_questionnaire`
  ADD CONSTRAINT `FK_score_id_quest` FOREIGN KEY (`id_questionnaire`) REFERENCES `questionnaire` (`id_questionnaire`),
  ADD CONSTRAINT `FK_score_id_user` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`);
--
-- Database: `site_voieex`
--
CREATE DATABASE IF NOT EXISTS `site_voieex` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `site_voieex`;

-- --------------------------------------------------------

--
-- Table structure for table `agence`
--

CREATE TABLE `agence` (
  `AGENCE_COD` varchar(4) NOT NULL,
  `AGENCE_LIB` varchar(250) NOT NULL,
  `AGENCE_ADRESSE` varchar(250) NOT NULL,
  `AGENCE_TEL` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `agence`
--

INSERT INTO `agence` (`AGENCE_COD`, `AGENCE_LIB`, `AGENCE_ADRESSE`, `AGENCE_TEL`) VALUES
('100', 'Casablanca', '19, rue abou bakr ibnou koutia, oukacha , ain sebaa', '0522344316'),
('110', 'El jadida', '19, lot ennassim, rue essafa', '0523390304'),
('120', 'Safi', '56 route de l aviation kodiat si hamza', '0524462226'),
('200', 'Tanger', '103 alle n 3 zone industrielle mghougha', '0539352455/56'),
('210', 'Tetouan', 'nahj el baraka el kheniores en face college ibn sina', '0539713155'),
('220', 'Larache', 'Avenue du Caire N 116', '0539914122'),
('300', 'Agadir', '17 rue rue titou, quartiert el quods', '0528223822'),
('350', 'Ait Melloul', '18, lot guicharde, avenue med VI', '0528246824'),
('400', 'Oujda', '13 angle rass foughal et abdellah ben yassine', '0536705196'),
('410', 'Nador', 'bd niama n 79, quartier ouled mimoun', '0536603160'),
('430', 'Taza', '272, bloc 2 adarissa', '0535285078'),
('500', 'FES', 'Qt sidi brahim rue 806', '0535658103'),
('550', 'Meknes', '201 avenue des far ville nouvelle', '0535511141'),
('600', 'Rabat', '77 rue london, l\'océan', '0537262597'),
('650', 'Kenitra', '10 rue ibnou al banna, ville nouvelle', '0537379821'),
('700', 'Marrakech', '514 quartier industriel sidi ghanem', '0524336174'),
('800', 'Beni Mellal', '8JPR+MJ Béni Mellal', '0523483928');

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `id_image` int(11) NOT NULL,
  `file_name` varchar(250) NOT NULL,
  `uploaded_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `img_ref`
--

CREATE TABLE `img_ref` (
  `code_ref` int(20) NOT NULL,
  `emplacement` varchar(250) NOT NULL,
  `soc_lib` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `img_ref`
--

INSERT INTO `img_ref` (`code_ref`, `emplacement`, `soc_lib`) VALUES
(1, 'images/up_ref/references-logo-1.jpg', 'Pfizer'),
(2, 'images/up_ref/references-logo-2.jpg', 'BASF'),
(3, 'images/up_ref/references-logo-3.jpg', 'King Toys'),
(4, 'images/up_ref/references-logo-4.jpg', 'Kitea'),
(5, 'images/up_ref/references-logo-5.jpg', 'Sterifil'),
(6, 'images/up_ref/references-logo-6.jpg', 'Bayer'),
(7, 'images/up_ref/references-logo-7.jpg', 'Total'),
(8, 'images/up_ref/references-logo-8.jpg', 'Mitsubishi'),
(9, 'images/up_ref/references-logo-9.jpg', 'Scania'),
(10, 'images/up_ref/references-logo-10.jpg', 'BMW'),
(11, 'images/up_ref/references-logo-11.jpg', 'Imperial Tobacco'),
(12, 'images/up_ref/references-logo-12.jpg', 'Renault'),
(13, 'images/up_ref/references-logo-13.jpg', 'Simens'),
(14, 'images/up_ref/references-logo-14.jpg', 'Kraft'),
(15, 'images/up_ref/references-logo-15.jpg', 'La grande récré'),
(16, 'images/up_ref/references-logo-16.jpg', 'Bimo'),
(17, 'images/up_ref/references-logo-17.jpg', 'Electroplanet'),
(18, 'images/up_ref/references-logo-18.jpg', 'Marbar'),
(19, 'images/up_ref/references-logo-19.jpg', 'Mobilia'),
(20, 'images/up_ref/references-logo-20.jpg', 'Don Simon'),
(21, 'images/up_ref/references-logo-21.jpg', 'Azbane'),
(22, 'images/up_ref/references-logo-22.jpg', 'Lesieur'),
(23, 'images/up_ref/references-logo-23.jpg', 'P&G'),
(24, 'images/up_ref/references-logo-24.jpg', 'Carrefour'),
(25, 'images/up_ref/references-logo-25.jpg', 'Marjane'),
(26, 'images/up_ref/references-logo-26.jpg', 'SDG'),
(27, 'images/up_ref/references-logo-27.jpg', 'Intralot'),
(28, 'images/up_ref/references-logo-28.jpg', 'Label vie'),
(29, 'images/up_ref/references-logo-29.jpg', 'Acima'),
(30, 'images/up_ref/references-logo-30.jpg', 'Weldom'),
(31, 'images/up_ref/references-logo-31.jpg', 'Marwa'),
(32, 'images/up_ref/references-logo-32.jpg', 'Aswak assalam'),
(33, 'images/up_ref/references-logo-33.jpg', 'Ecotherm'),
(34, 'images/up_ref/references-logo-34.jpg', 'Stokvis'),
(35, 'images/up_ref/references-logo-35.jpg', 'Colorado'),
(36, 'images/up_ref/references-logo-36.jpg', 'BDF Beiersdort'),
(37, 'images/up_ref/references-logo-37.jpg', 'SC johnson'),
(38, 'images/up_ref/references-logo-38.jpg', 'Nespresso'),
(39, 'images/up_ref/references-logo-39.jpg', 'Juver'),
(40, 'images/up_ref/references-logo-40.jpg', 'Citruma'),
(41, 'images/up_ref/references-logo-41.jpg', 'GlaxoSmithKline'),
(42, 'images/up_ref/references-logo-42.jpg', 'Laboratoires BIOTAL Cosmetics'),
(43, 'images/up_ref/references-logo-43.jpg', 'Margafrique'),
(44, 'images/up_ref/references-logo-44.jpg', 'BSH'),
(45, 'images/up_ref/references-logo-45.jpg', 'Cadbury'),
(46, 'images/up_ref/references-logo-46.jpg', 'Bel');

-- --------------------------------------------------------

--
-- Table structure for table `offres_d_emploi`
--

CREATE TABLE `offres_d_emploi` (
  `id_offre` int(11) NOT NULL,
  `titre_offre` varchar(150) NOT NULL,
  `presentation` text NOT NULL,
  `presentation_mission` text NOT NULL,
  `missions` text NOT NULL,
  `profil` text NOT NULL,
  `disponibilite` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `offres_d_emploi`
--

INSERT INTO `offres_d_emploi` (`id_offre`, `titre_offre`, `presentation`, `presentation_mission`, `missions`, `profil`, `disponibilite`) VALUES
(1, 'Résponsable qualité', 'Créé en 1997, la Voie Express est aujourd’hui leader sur le marché marocain. Nous nous positionnons sur le marché de Transport, Messagerie et également la Logistique. Grâce à l’engagement de la Direction Générale, à l’implication de nos collaborateurs et à l’inscription dans une démarche qualité basée sur l’amélioration continue et la satisfaction Client, nous sommes certifiés ISO 9001 version 2008. Pour accompagner notre croissance, nous recherchons un Responsable Management Qualité (RMQ)', 'Rattaché à la Direction Générale, et en tant qu’un \'interlocuteur privilégié dans le domaine de la qualité, vos principales missions seront les suivantes: Manager, assurer et optimiser le fonctionnement de son service dans le cadre des règles internes et conformément au manuel qualité.', '    Développer la culture qualité |     Assurer et entretenir le système de management de qualité |     Assurer la gestion et le reporting autour du SMQ |     Assurer le suivi et le développement du système documentaire |     Assurer le suivi, l\'amélioration continue autour de l\'ensemble des processus de management de la qualité en assistant les opérationnels dans la rédaction et l\'évolution de leur processus |     Sensibiliser et veiller à l\'application des procédures |     Assurer le suivi et la mesure de l\'efficacité des actions correctives et préventives sur les processus |     Participer aux audits systèmes (internes et externes) et au pilotage des plans d\'actions correspondants. |     Assurer le traitement des réclamations clients et des non-conformités. |     Participer à la revue de Direction et rédiger le compte rendu.', 'De formation Bac + 5 en management de la qualité. Vous justifiez une expérience de 5 ans minimum dans un poste similaire et idéalement dans un environnement certifié ISO. Esprit de synthèse et d\'analyse, autonomie, perspicacité, rigueur, ténacité, pédagogie, capacité d\'animation et leadership, capacité d\'encadrement, capacité à convaincre, clarté d\'expression orale et écrite avec de réelles aptitudes à véhiculer l\'esprit qualité Maîtrise de l\'anglais est un atout souhaitable', 'Disponible immédiatement');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `agence`
--
ALTER TABLE `agence`
  ADD PRIMARY KEY (`AGENCE_COD`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id_image`);

--
-- Indexes for table `img_ref`
--
ALTER TABLE `img_ref`
  ADD PRIMARY KEY (`code_ref`);

--
-- Indexes for table `offres_d_emploi`
--
ALTER TABLE `offres_d_emploi`
  ADD PRIMARY KEY (`id_offre`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `id_image` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `img_ref`
--
ALTER TABLE `img_ref`
  MODIFY `code_ref` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `offres_d_emploi`
--
ALTER TABLE `offres_d_emploi`
  MODIFY `id_offre` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Database: `taxation`
--
CREATE DATABASE IF NOT EXISTS `taxation` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `taxation`;

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `adminname` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `mailadmin` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `adminname`, `password`, `mailadmin`) VALUES
(1, 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'admin@lve.supp.com');

-- --------------------------------------------------------

--
-- Table structure for table `adresses`
--

CREATE TABLE `adresses` (
  `id_adresse` int(11) NOT NULL,
  `lib_adresse` varchar(250) NOT NULL,
  `id_client` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_ville` int(11) NOT NULL,
  `modifie_le` datetime DEFAULT NULL,
  `supprime_le` datetime DEFAULT NULL,
  `commit_par` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `adresses`
--

INSERT INTO `adresses` (`id_adresse`, `lib_adresse`, `id_client`, `id_user`, `id_ville`, `modifie_le`, `supprime_le`, `commit_par`) VALUES
(52, 'Mhamid 9 Lotissement Gharnata No 10', 1, 1, 100, NULL, NULL, NULL),
(54, 'adresse 3', 3, 1, 102, NULL, NULL, NULL),
(55, 'adresse 1azertyui 123 qsdfghjk', 4, 1, 103, NULL, NULL, NULL),
(56, 'Adressse 2', 5, 1, 104, NULL, NULL, NULL),
(57, '$$*rfffffffffffffffffhh', 9, 1, 105, NULL, NULL, NULL),
(58, 'wwwwwwwwwwww', 10, 1, 106, NULL, NULL, NULL),
(59, 'Adresse de FFF', 11, 1, 107, NULL, NULL, NULL),
(60, '22 rue mamonia, EL yassamine', 12, 1, 109, NULL, NULL, NULL),
(61, 'CSEGZ bd 25 SEBT GZOULA', 13, 1, 110, NULL, NULL, NULL),
(62, 'hhhhhh hhhhh 73 hhhhh', 14, 1, 111, NULL, NULL, NULL),
(63, 'rfffffffffffffffffffhhhh', 15, 1, 112, NULL, NULL, NULL),
(64, 'rfffffffffffffffffffhhhh', 16, 1, 100, NULL, NULL, NULL),
(65, 'vvvvvvvvv', 17, 1, 100, NULL, NULL, NULL),
(66, 'cccccccccccccccc', 18, 1, 101, NULL, NULL, NULL),
(67, 'rfffffffffffffffffffhhhh', 19, 1, 101, NULL, NULL, NULL),
(68, 'KKKKKK', 20, 1, 110, NULL, NULL, NULL),
(69, 'hh3333', 81, 1, 150, NULL, NULL, NULL),
(70, 'hh22', 81, 1, 120, NULL, NULL, NULL),
(71, 'Adressse 33', 5, 1, 300, NULL, NULL, NULL),
(72, 'eeeeeeeeeeeeeee', 12, 1, 109, NULL, NULL, NULL),
(73, 'hh', 21, 1, 500, NULL, NULL, NULL),
(74, 'fffffffffffffffffffffffffff55', 11, 1, 107, NULL, NULL, NULL),
(76, 'BOUZfffffffffffffffffffffffffff55', 11, 1, 107, NULL, NULL, NULL),
(77, 'Adressse 25', 21, 1, 300, NULL, NULL, NULL),
(82, 'fffffffffffffffffffffffffff60', 11, 1, 107, NULL, NULL, NULL),
(83, 'ppppppppp', 82, 1, 600, NULL, NULL, NULL),
(84, 'ppppppp', 82, 1, 600, NULL, NULL, NULL),
(89, 'Adressse 25 Casa', 21, 1, 100, NULL, NULL, NULL),
(100, 'hh', 21, 1, 500, NULL, NULL, NULL),
(120, 'YYYYYYYYYYYYYYYY', 85, 4, 128, NULL, NULL, NULL),
(121, 'yyyyyyyyyyyyyyyyyyyy', 84, 4, 126, NULL, NULL, NULL),
(122, 'YYYYYYYYY', 85, 4, 125, NULL, NULL, NULL),
(123, 'rrrrrrr778', 86, 4, 129, NULL, NULL, NULL),
(124, 'hhhhhhhhhhhhhhhh', 88, 4, 124, NULL, NULL, NULL),
(125, 'rrrrrrr', 87, 4, 129, NULL, NULL, NULL),
(126, 'khyayta', 86, 4, 100, NULL, NULL, NULL),
(128, '55 bd m23 Der', 89, 5, 718, NULL, NULL, NULL),
(129, 'YYYYYYYYYYYYYYYY', 82, 1, 128, NULL, NULL, NULL),
(130, 'YYYYYYYYYYYYYYYY', 82, 1, 128, NULL, NULL, NULL),
(131, '78 bd mly Ismail', 90, 5, 100, NULL, NULL, NULL),
(132, '7777 Roches noires', 91, 6, 100, NULL, NULL, NULL),
(133, '7884 Casper', 92, 6, 373, NULL, NULL, NULL),
(134, '34 rue abdelkarim el khattabi, HASSAN', 93, 3, 600, NULL, NULL, NULL),
(135, '55 Rue Abdelattif ben kaddour', 94, 3, 100, NULL, NULL, NULL),
(136, '66 rue hh ble', 95, 3, 401, NULL, NULL, NULL),
(137, '30 derb ghallef', 96, 3, 905, NULL, NULL, NULL),
(138, '50 bd el mernissi', 97, 3, 373, NULL, NULL, NULL),
(139, '22 Bernoussi', 98, 3, 501, NULL, NULL, NULL),
(140, '22 Bee', 99, 3, 152, NULL, NULL, NULL),
(141, '22 Bee', 99, 3, 152, NULL, NULL, NULL),
(142, '22 Bee', 99, 3, 152, NULL, NULL, NULL),
(143, '22 Bee', 99, 3, 152, NULL, NULL, NULL),
(144, '22 Bee', 99, 3, 152, NULL, NULL, NULL),
(145, '22 Bee', 99, 3, 152, NULL, NULL, NULL),
(146, '22 Bee', 99, 3, 152, NULL, NULL, NULL),
(147, '22 Bee', 99, 3, 152, NULL, NULL, NULL),
(148, '22 Bee', 99, 3, 152, NULL, NULL, NULL),
(154, 'hh', 21, 1, 500, NULL, NULL, NULL),
(157, '39 bd ezziraoui', 100, 3, 100, NULL, NULL, NULL),
(158, '55 bd M5', 101, 3, 600, NULL, NULL, NULL),
(159, '77 bd hassan 2 ', 102, 3, 700, NULL, NULL, NULL),
(160, '10 rue el houssaini', 103, 3, 214, NULL, NULL, NULL),
(161, '14 karimi reg 20000', 104, 3, 660, NULL, NULL, NULL),
(162, '999 rue noussairi', 105, 6, 718, NULL, NULL, NULL),
(163, '10 rue jiahna', 106, 6, 501, NULL, NULL, NULL),
(164, '73 Bd Zerktouni, El Maarif ', 107, 1, 100, NULL, NULL, NULL),
(165, 'hh2256', 81, 1, 120, NULL, NULL, NULL),
(166, '78 Bd Omar El moukhtar', 108, 1, 300, NULL, NULL, NULL),
(167, '88 rue Argane Adrar ', 109, 7, 300, NULL, NULL, NULL),
(168, '79 bd Morabet Ain sebÃ¢', 110, 1, 100, NULL, NULL, NULL),
(169, '79 bd Ennassim Zenata', 111, 1, 100, NULL, NULL, NULL),
(170, '55 bd Al Quds Bernoussi', 112, 1, 100, NULL, NULL, NULL),
(171, 'bd em Mouhdadi Zenata', 23, 1, 100, NULL, NULL, NULL),
(174, '18 Avenue HASSAN II', 113, 10, 200, NULL, NULL, NULL),
(175, 'Adresse de test 1', 114, 1, 502, '2020-06-18 12:44:04', NULL, 'SYNTHEMEDIC - Synthemedic-FES'),
(176, 'MyADDRESS', 117, 1, 103, NULL, NULL, NULL),
(177, 'Tighdouinss', 22, 1, 710, NULL, NULL, NULL),
(178, 'Adress 22', 118, 1, 709, NULL, NULL, NULL),
(179, 'My address hopping to be valid', 120, 1, 619, NULL, NULL, NULL),
(180, '45 Rue Allal EL FASSI 25310 Agdal', 121, 1, 600, NULL, NULL, NULL),
(181, 'Adresse du nouveau client', 122, 1, 350, NULL, NULL, NULL),
(182, 'Bej 145 Num 85585', 123, 2, 600, NULL, NULL, NULL),
(183, 'Adresse 2', 124, 2, 300, NULL, NULL, NULL),
(184, 'MyAddress', 125, 6, 615, NULL, NULL, NULL),
(185, 'myaddsam 1', 126, 2, 612, NULL, NULL, 'Samsung'),
(187, 'Add_p', 127, 2, 617, NULL, NULL, 'Samsung');

-- --------------------------------------------------------

--
-- Table structure for table `agence`
--

CREATE TABLE `agence` (
  `AGENCE_COD` varchar(4) NOT NULL,
  `AGENCE_LIB` varchar(250) NOT NULL,
  `AGENCE_ADRESSE` varchar(250) NOT NULL,
  `AGENCE_TEL` varchar(20) NOT NULL,
  `modifie_le` datetime DEFAULT NULL,
  `supprime_le` datetime DEFAULT NULL,
  `commit_par` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `agence`
--

INSERT INTO `agence` (`AGENCE_COD`, `AGENCE_LIB`, `AGENCE_ADRESSE`, `AGENCE_TEL`, `modifie_le`, `supprime_le`, `commit_par`) VALUES
('100', 'Casablanca', '19, rue abou bakr ibnou koutia, oukacha , ain sebaa', '0522344316', NULL, NULL, NULL),
('110', 'El jadida', '19, lot ennassim, rue essafa', '0523390304', NULL, NULL, NULL),
('120', 'Safi', '56 route de l aviation kodiat si hamza', '0524462226', NULL, NULL, NULL),
('200', 'Tanger', '103 alle n 3 zone industrielle mghougha', '0539352455 /56', NULL, NULL, NULL),
('210', 'Tetouan', 'nahj el baraka el kheniores en face college ibn sina', '0539713155', NULL, NULL, NULL),
('220', 'Larache', 'Avenue du Caire N 116', '0539914122', NULL, NULL, NULL),
('300', 'Agadir', '17 rue rue titou, quartiert el quods', '0528223822', NULL, NULL, NULL),
('350', 'Ait Melloul', '18, lot guicharde, avenue med VI', '0528246824', NULL, NULL, NULL),
('400', 'Oujda', '13 angle rass foughal et abdellah ben yassine', '0536705196', NULL, NULL, NULL),
('410', 'Nador', 'bd niama n 79, quartier ouled mimoun', '0536603160', NULL, NULL, NULL),
('430', 'Taza', '272, bloc 2 adarissa', '0535285078', NULL, NULL, NULL),
('500', 'FES', 'Qt sidi brahim rue 806', '0535658103', NULL, NULL, NULL),
('550', 'Meknes', '201 avenue des far ville nouvelle', '0535511141', NULL, NULL, NULL),
('600', 'Rabat', '77 rue london, l\'ocean', '0537262597', NULL, NULL, NULL),
('650', 'Kenitra', '10 rue ibnou al banna, ville nouvelle', '0537379821', NULL, NULL, NULL),
('700', 'Marrakech', '514 quartier industriel sidi ghanem', '0524336174', NULL, NULL, NULL),
('800', 'Beni Mellal', '8JPR+MJ Beni Mellal', '0523483928', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `client`
--

CREATE TABLE `client` (
  `CLIENT_ID` int(11) NOT NULL,
  `CLIENT_COD` varchar(32) DEFAULT NULL,
  `NOM` varchar(250) NOT NULL,
  `PRENOM` varchar(250) DEFAULT NULL,
  `CIVILITE_COD` char(2) DEFAULT NULL,
  `CLIENT_TYP` char(2) DEFAULT NULL,
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
  `commentaire` varchar(80) DEFAULT NULL,
  `mail` varchar(50) DEFAULT NULL,
  `ICE` varchar(50) DEFAULT NULL,
  `telephone` varchar(250) DEFAULT NULL,
  `modifie_le` datetime DEFAULT NULL,
  `supprime_le` datetime DEFAULT NULL,
  `commit_par` varchar(250) DEFAULT NULL,
  `CLIENT_ID_client_lve` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `client`
--

INSERT INTO `client` (`CLIENT_ID`, `CLIENT_COD`, `NOM`, `PRENOM`, `CIVILITE_COD`, `CLIENT_TYP`, `IDENTITE_TYP`, `IDENTITE_VAL`, `ID_FISCALE`, `CAPITAL_SOC`, `CREATION_DAT`, `CLIENT_ETA`, `MOTIF_ETA`, `SECTEUR_COD`, `EMPLOYE_ID`, `SAISIE_DAT`, `AGENCE_COD`, `commentaire`, `mail`, `ICE`, `telephone`, `modifie_le`, `supprime_le`, `commit_par`, `CLIENT_ID_client_lve`) VALUES
(1, '11111', 'ABIR ', 'Mohamed', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '06 54 77 11 26', NULL, NULL, NULL, 1),
(2, '11112', 'n2n', 'n2n', '', '', '', '', '', '100', '0000-00-00', 'a', 100, '', 100, NULL, '', '', '', '', '+0661123465', NULL, NULL, NULL, 1),
(3, '11113', 'n3', 'n3', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '123', NULL, NULL, NULL, 1),
(4, '11114', 'lve dÃ©c', 'lve dÃ©c', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '+0661123465', NULL, NULL, NULL, 1),
(5, '11115', 'Mmm', 'Nnn', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '+21255889966', NULL, NULL, NULL, 1),
(9, '11116', 'NNN', 'Mnn', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0523232323', NULL, NULL, NULL, 1),
(10, '11117', 'WWW', 'www', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '05222222222', NULL, NULL, NULL, 1),
(11, '11118', 'FFF', 'fff', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '107', NULL, NULL, NULL, 1),
(12, '11119', 'EEEE', 'eee', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '066666666', NULL, NULL, NULL, 1),
(13, '11120', 'GGGG', 'gggg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0588888888', NULL, NULL, NULL, 1),
(14, '11121', 'HHHH', 'hhhh', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '+212524242424', NULL, NULL, NULL, 1),
(15, '11122', 'JJJJJJ', 'gggg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0523232323', NULL, NULL, NULL, 1),
(16, '11123', 'LLLL', 'lll', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0523232323', NULL, NULL, NULL, 1),
(17, '11124', 'vvvvvvv', 'vvvvvv', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '55555555555', NULL, NULL, NULL, 1),
(18, '11125', 'cccccccc', 'ccccccccccc', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '777777777777777', NULL, NULL, NULL, 1),
(19, '11126', 'KKKCC', 'ccccccc', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0523232323', NULL, NULL, NULL, 1),
(20, '11127', 'KKKK', 'kkkk', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0523232323', NULL, NULL, NULL, 1),
(21, '11128', 'Mmm', 'Nnn', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '500', NULL, NULL, NULL, 1),
(22, '11130', 'HNN', 'hnn', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0537373737', NULL, NULL, NULL, 1),
(23, '11131', 'HMM', 'HMM', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0537373737', NULL, NULL, NULL, 1),
(81, '11132', 'KKLL', 'HMM', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0569656565', NULL, NULL, NULL, 1),
(82, '11133', 'HNN', 'HMM', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'fffffffff', NULL, NULL, NULL, 1),
(84, '141414', 'YYYY', 'yyyy', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0588888888', NULL, NULL, NULL, 4),
(85, '141141', 'YYYYYYYYyy', 'YYYYYYYY', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0588888888', NULL, '2021-02-11 12:45:10', 'admin', 4),
(86, '12222', 'RRR', 'rrr', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0223333333', NULL, NULL, NULL, 4),
(87, '12223', 'rrrrrr', 'rrrrrrrrrr', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, 4),
(88, '55555', 'hhhhh', 'hhhhhhh', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '555555555', NULL, NULL, NULL, 4),
(89, '558899', 'Heu mea', 'morica', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0522363255', NULL, NULL, NULL, 5),
(90, '558898', 'Xiaomi', 'mi', '', '', '', '', '', '100', '0000-00-00', 'a', 100, '', 100, NULL, '', '', 'mi.support@xiaomi.com', '', '0522114254', NULL, NULL, NULL, 5),
(91, '552424', 'Bosh', 'Casa', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0522332265', NULL, NULL, NULL, 6),
(92, '774477', 'Hmm', 'mHh', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0524242424', NULL, NULL, NULL, 6),
(93, '556622', 'Ndesign', 'Cas', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0537885241', NULL, NULL, NULL, 3),
(94, '557744', 'MMdes', 'cam', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0522323266', NULL, NULL, NULL, 3),
(95, '665522', 'Cam', 'tasia', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0588669955', NULL, NULL, NULL, 3),
(96, '888999', 'Kam', 'Cam', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0522663344', NULL, NULL, NULL, 3),
(97, '888777', 'Kam', 'kam', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0522663344', NULL, NULL, NULL, 3),
(98, '888776', 'Kam', 'Camera', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0538996585', NULL, NULL, NULL, 3),
(99, '888779', 'Kam', 'Camera', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0538996585', NULL, NULL, NULL, 3),
(100, '888552', 'Msi', 'techno', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0522478895', NULL, NULL, NULL, 3),
(101, '885522', 'Nikon', 'Prod', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0537225362', NULL, NULL, NULL, 3),
(102, '664455', 'Panoramic', 'cams', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0524106633', NULL, NULL, NULL, 3),
(103, '774488', 'mmllCams', 'Jap', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0544663635', NULL, NULL, NULL, 3),
(104, '669966', 'PO', 'cam', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0538525262', NULL, NULL, NULL, 3),
(105, '551422', 'Hulet', 'packard', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0514221422', NULL, NULL, NULL, 6),
(106, '774857', 'kkkkkljs', 'jhkdhjghfd', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0525346787', NULL, NULL, NULL, 6),
(107, '107', 'Mohammed', 'Hamid', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0522352352', NULL, NULL, NULL, 1),
(108, '11134', 'Mrabet', 'Hamid', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '300', NULL, NULL, NULL, 1),
(109, '566689', 'Steve', 'Jobs', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0588565656', NULL, NULL, NULL, 7),
(110, '110', 'Pharmacie', 'Phar', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0522653265', NULL, NULL, NULL, 1),
(111, '111', 'Pharmacie Narjis', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0522113366', NULL, NULL, NULL, 1),
(112, NULL, 'Pharmacie Ennassim', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0522363636', NULL, NULL, NULL, 1),
(113, '45854', 'Test', 'Client', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0616161616', NULL, NULL, NULL, 10),
(114, '114', 'Montest', 'MonTest', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0523146451', NULL, NULL, NULL, 1),
(115, 'MR3001', 'Montest2', 'Montest', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0528282828', NULL, NULL, NULL, 1),
(117, '11174', 'Myclient', '', '', '', 'de', '', '', '0', '2020-06-04', '', 0, '', 0, '2020-06-04', '', '', '', '', '0532341545', NULL, NULL, NULL, 1),
(118, '11178', 'moClient', '', '', '', 'de', '', '', '0', '2020-06-04', '', 0, '', 0, '2020-06-04', '', '', '', '', '0523526552', NULL, NULL, NULL, 1),
(119, '898989', 'Client test', 'Prenom client TEST', '', '', 'de', '', '', '0', '2020-06-04', '', 0, '', 0, '2020-06-04', '', '', '', '', '0522332526', NULL, NULL, NULL, 1),
(120, '990990', 'Client test 2', '', '', '', 'de', '', '', '0', '2020-06-04', '', 0, '', 0, '2020-06-04', '', '', '', '', '0537898885', NULL, NULL, NULL, 1),
(121, '2523', 'Ema', '', '', '', 'de', '', '', '0', '2020-06-05', '', 0, '', 0, '2020-06-05', '', '', '', '', '0537142260', NULL, NULL, NULL, 1),
(122, '90000', 'nouveau', 'Client', '', '', 'de', '', '', '0', '2020-06-08', '', 0, '', 0, '2020-06-08', '', '', '', '', '0537898956', NULL, NULL, NULL, 1),
(123, '110110', 'Amazon', '', '', '', 'de', '', '', '0', '2020-06-17', '', 0, '', 0, '2020-06-17', '', '', '', '', '0537895652', NULL, NULL, NULL, 2),
(124, '110111', 'MyClient', 'two', '', '', 'de', '', '', '0', '2020-06-17', '', 0, '', 0, '2020-06-17', '', '', '', '', '0598565565', NULL, NULL, NULL, 2),
(125, '11224', 'MyClient', '', '', '', 'de', '', '', '0', '2020-07-09', '', 0, '', 0, '2020-07-09', '', '', '', '', '0522332522', NULL, NULL, NULL, 6),
(126, '1125', 'Sam1', 'Psam1', '', '', 'de', '', '', '0', '2021-03-23', '', 0, '', 0, '2021-03-23', '', '', '', '', '0523252214', '2021-03-23 11:01:58', NULL, 'Samsung', 2),
(127, '0', 'ClientP', '', '', '', 'de', '', '', '0', '2021-03-23', '', 0, '', 0, '2021-03-23', '', '', '', '', '0521411414', '2021-03-25 12:31:40', NULL, 'Samsung', 2);

-- --------------------------------------------------------

--
-- Stand-in structure for view `clientsnombres`
-- (See below for the actual view)
--
CREATE TABLE `clientsnombres` (
`CLIENT_ID` int(11)
,`NOM` varchar(250)
,`total_declars` bigint(21)
,`total_sous_clients` bigint(21)
,`total_session` bigint(21)
);

-- --------------------------------------------------------

--
-- Table structure for table `client_lve`
--

CREATE TABLE `client_lve` (
  `CLIENT_ID` int(11) NOT NULL,
  `CLIENT_COD` char(8) NOT NULL,
  `NOM` varchar(250) NOT NULL,
  `PRENOM` varchar(250) DEFAULT NULL,
  `CIVILITE_COD` char(2) NOT NULL,
  `CLIENT_TYP` char(3) NOT NULL,
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
  `commentaire` varchar(80) DEFAULT NULL,
  `mail` varchar(50) DEFAULT NULL,
  `ICE` varchar(50) DEFAULT NULL,
  `telephone` varchar(250) DEFAULT NULL,
  `modifie_le` datetime DEFAULT NULL,
  `supprime_le` datetime DEFAULT NULL,
  `commit_par` varchar(250) DEFAULT NULL,
  `CLIENT_COD2` varchar(32) DEFAULT NULL,
  `debinterval` int(11) NOT NULL,
  `fininterval` int(11) NOT NULL,
  `intervalag_deb` int(11) NOT NULL,
  `intervalag_fin` int(11) NOT NULL,
  `adresse` text DEFAULT NULL,
  `ville` varchar(250) DEFAULT NULL,
  `login` varchar(250) DEFAULT NULL,
  `mot_de_passe` varchar(250) DEFAULT '7c222fb2927d828af22f592134e8932480637c0d'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `client_lve`
--

INSERT INTO `client_lve` (`CLIENT_ID`, `CLIENT_COD`, `NOM`, `PRENOM`, `CIVILITE_COD`, `CLIENT_TYP`, `IDENTITE_TYP`, `IDENTITE_VAL`, `ID_FISCALE`, `CAPITAL_SOC`, `CREATION_DAT`, `CLIENT_ETA`, `MOTIF_ETA`, `SECTEUR_COD`, `EMPLOYE_ID`, `SAISIE_DAT`, `AGENCE_COD`, `commentaire`, `mail`, `ICE`, `telephone`, `modifie_le`, `supprime_le`, `commit_par`, `CLIENT_COD2`, `debinterval`, `fininterval`, `intervalag_deb`, `intervalag_fin`, `adresse`, `ville`, `login`, `mot_de_passe`) VALUES
(1, '15038', 'SYNTHEMEDIC', 'Medic', ' 1', ' EC', 'de', ' test ', ' 852963741 ', '40000055', '0000-00-00', NULL, 0, NULL, 0, '0000-00-00', NULL, NULL, ' SYNTHEMEDIC@contact.com', ' SY1515152323 ', '0522334455', '2021-04-21 14:46:26', NULL, 'SYNTHEMEDIC', ' E0000 ', 3050, 3401, 3005, 3021, ' BD CHEFCHAOUNI ROUTE 110KM 10, 30 SIDI BERNOUSSI', ' Casablanca ', '11129', '7c222fb2927d828af22f592134e8932480637c0d'),
(2, '9588', 'Samsung', NULL, '1', 'TR', 'de', NULL, '74185296633', '9999999999', '0000-00-00', NULL, 0, NULL, 0, '0000-00-00', NULL, NULL, 'support@samsung.com', 'SS8589965856', '0522444444', '2021-03-25 17:20:57', NULL, 'Samsung', 'S0000', 4004, 4200, 4002, 4020, 'Casanershore 12 Sidi Maarouf', 'Casablanca', '11178', '7c222fb2927d828af22f592134e8932480637c0d'),
(3, '552623', 'Canon', 'INC', '', '1', 'de', NULL, '5444755485', '200000', NULL, NULL, 0, NULL, 0, NULL, NULL, NULL, 'canoninc@gmail.com', '4454755485', '0522666666', NULL, NULL, NULL, 'C0000', 1005, 2000, 1000, 1020, '73 bd Molay Ismail', 'Casablanca', '444545', '7c222fb2927d828af22f592134e8932480637c0d'),
(4, '78999', 'HP', 'Tec', '', '1', 'de', NULL, '7844444458', '300000', NULL, NULL, 0, NULL, 0, NULL, NULL, NULL, 'hptec@gmail.com', 'hp789523658', '0522777777', NULL, NULL, NULL, 'H0000', 5006, 5200, 5000, 5000, '73 bd Med V', 'Casablanca', '78999', '7c222fb2927d828af22f592134e8932480637c0d'),
(5, '74444', 'Huawei', 'Tec', '', '1', 'de', NULL, '4585859568', '4585859568', NULL, NULL, 0, NULL, 0, NULL, NULL, NULL, 'huawei@support.com', '745858585', '0522242424', NULL, NULL, NULL, 'HU00', 80003, 80200, 80001, 80020, '73 rue victor hugo', 'Casablanca', '74444', '7c222fb2927d828af22f592134e8932480637c0d'),
(6, '8888', 'BOSH', 'log', '', '1', 'de', '', '4585866666', '78000000', '0000-00-00', '', 0, '', 0, '0000-00-00', '', '', 'BOSHlog@BOSH.fr', '8585858747', '0522266666', '2020-07-09 16:45:42', NULL, 'BOSH', 'B002D', 90003, 90200, 90001, 90020, '73 rue des graves', 'Casablanca', '88888', '7c222fb2927d828af22f592134e8932480637c0d'),
(7, '99999', 'Apple', 'Tech', '', '', 'de', NULL, '666665253362', '51204120000', NULL, NULL, 0, NULL, 0, NULL, NULL, NULL, 'apple@support.apple.com', '8585556856', '0522568956', NULL, NULL, NULL, 'A0000', 5001, 5200, 13, 23, '73 rue Enbu Al arabi', 'Casablanca', '99999', '7c222fb2927d828af22f592134e8932480637c0d'),
(8, '784596', 'Logi', 'Prod', '', '', 'de', '', '5522356455', '400000', '0000-00-00', '', 0, '', 0, '0000-00-00', '', '', 'logisupport@loprod.com', '5487544578', '0522656356', '2020-10-15 12:45:54', NULL, 'Admin', 'L000L', 5500, 5700, 5030, 5040, '50 rue Al jiahna Bernoussi', 'Casablanca', 'Logigi99', '7c222fb2927d828af22f592134e8932480637c0d'),
(9, '963258', 'Oumatech', ' ', '', '', 'de', '', '25445441e544', '502541000', '0000-00-00', '', 0, '', 0, '0000-00-00', '', '', 'oumatech@gmail.com', '4124121452', '0522412141', '2020-10-13 18:02:17', NULL, 'Admin', 'E00', 2500, 3500, 0, 0, 'bd omar el khayam', 'Casablanca', '963258', '7c222fb2927d828af22f592134e8932480637c0d'),
(10, '85658', 'Aksal', NULL, '', '', 'de', NULL, '0', '0', NULL, NULL, 0, NULL, 0, '2019-10-18', NULL, NULL, 'n.bouadib@groupaksal.com', '000035911000015', '0522792121', NULL, NULL, NULL, 'E000', 1001, 2000, 1010, 1020, '1, Angle Boulevard de la Corniche et Boulevard de l’Océan Atlantique, Ain Diab. Casablanca', 'Casablanca', '85658', '7c222fb2927d828af22f592134e8932480637c0d'),
(19, '9233', 'TM TRADING MOROCCO', '', 'SL', 'TR', 'RC', '125521', '0', '0', '2020-10-13', '', 0, NULL, 0, '2020-10-13', '100', 'GHIZLANE ', '', '001535247000020', '', NULL, NULL, NULL, NULL, 0, 0, 0, 0, '', '', 'lve_TM TRADING MOROCCO', '7c222fb2927d828af22f592134e8932480637c0d'),
(20, '10512', 'CALLIOPE', '', 'SL', 'TR', 'RC', '86205', '900054', '547454', '2020-10-13', 'A', 0, '', 0, '2020-10-13', '100', 'REDA ', 'mail.support@calliope.ma', '0000655000066', '05232521', '2020-11-23 17:13:00', NULL, 'Admin', '', 0, 0, 0, 0, 'AnfaPlace Ain diab Casablanca', 'Casablanca', 'lve_CALLIOPE', '6df73cc169278dd6daab5fe7d6cacb1fed537131'),
(21, '12703', 'STG MAROC TANGER', '', 'SL', 'TR', 'de', '12', '0', '0', '2020-10-13', '', 0, '', 0, '2020-10-13', '200', 'TANGER ', '', '000088492000020', '', '2020-11-23 18:32:55', NULL, 'Admin', '', 0, 0, 0, 0, '', '', 'lve_STG MAROC TANGER', '728348f63167a287d2509edf88d74dbf79c44480'),
(22, '14449', 'STG TELECOM', '', 'SC', 'TR', 'RC', '82933', '0', '0', '2020-10-13', 'A', 0, NULL, 0, '2020-10-13', '200', 'TANGER ', '', '001931434000034', '', NULL, NULL, NULL, NULL, 0, 0, 0, 0, '', '', 'lve_STG TELECOM', 'a2527be74e139db702563dc49ac9b3244d379359'),
(23, '14914', 'LIBREDIS', '', 'N', 'TR', 'de', '139047', '0', '0', '2020-10-13', '', 0, '', 0, '2020-10-13', '100', 'BRONZE ', '', '0002697500048', '', '2020-11-23 18:33:00', NULL, 'Admin', 'E000', 9000, 9900, 9000, 9005, '', '', 'lve_LIBREDIS', '0efb9c3071bcb39e854fb753547d0c2d6c754f78'),
(24, '14946', 'WORLD SYNERGY', '', 'SL', 'TR', 'RC', '365207', '0', '0', '2020-10-13', '', 0, NULL, 0, '2020-10-13', '100', 'BRONZE ', '', '001797819000015', '', NULL, NULL, NULL, NULL, 0, 0, 0, 0, '', '', 'lve_WORLD SYNERGY', '823d40ad64305b11c0cca67f4a50f0028b7131b8'),
(25, '15436', 'MILA ROSES MAROC', '', 'SA', 'TR', 'RC', '1', '0', '0', '2020-10-13', '', 0, NULL, 0, '2020-10-13', '100', '', '', '002162873000018', '', NULL, NULL, NULL, NULL, 0, 0, 0, 0, '', '', 'lve_MILA ROSES MAROC', '471ad83f168f521dadcf09ed8b20323d299384ad'),
(26, '5233', 'KOMAX MAROC S.A.R.L', '', 'SL', 'TR', 'de', '4099', '0', '0', '2020-10-13', 'A', 0, '', 0, '2020-10-13', '100', 'REDA ', '', '001536896000020', '', '2020-11-23 18:04:34', NULL, 'Admin', '', 0, 0, 0, 0, '', '', 'lve_KOMAX MAROC S.A.R.L', '7c72da9450c9cf7c70fae7f259ea19846c927cc3');

-- --------------------------------------------------------

--
-- Table structure for table `client_lve_session`
--

CREATE TABLE `client_lve_session` (
  `AGENCE_COD` varchar(50) NOT NULL,
  `AGENCE_LIB` varchar(100) NOT NULL,
  `REFERENCIEE` int(11) NOT NULL,
  `LOGIN` varchar(50) NOT NULL,
  `MOT_D_PASS` varchar(50) NOT NULL,
  `IDENTITE_TYP` char(2) NOT NULL,
  `modifie_le` datetime DEFAULT NULL,
  `supprime_le` datetime DEFAULT NULL,
  `commit_par` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `client_lve_session`
--

INSERT INTO `client_lve_session` (`AGENCE_COD`, `AGENCE_LIB`, `REFERENCIEE`, `LOGIN`, `MOT_D_PASS`, `IDENTITE_TYP`, `modifie_le`, `supprime_le`, `commit_par`) VALUES
('BOSH-90001', 'BOSH-Casa', 6, 'BOSH/90001', 'BOSH/90001', 'de', NULL, NULL, NULL),
('Huawei-80001', 'Huawei-Casa', 5, 'Huawei/80001', '6f05f658c58f3bcb9e63afd4c87d774f3951daa9', 'de', NULL, NULL, NULL),
('Samsung-4001', 'Sams-Casa', 2, 'Samsung/4001', '012446f77548059562d5b3bf97d244480f1e8131', 'de', '2020-11-17 09:29:13', NULL, 'Admin'),
('Samsung-4002', 'Sams-Rabat', 2, 'Samsung/4002', '7c222fb2927d828af22f592134e8932480637c0d', 'de', '2020-11-17 09:47:56', NULL, 'Admin'),
('SYNTHEMEDIC-3001', 'Synth-Casa', 1, 'SYNTHEMEDIC/3001', '7c222fb2927d828af22f592134e8932480637c0d', 'de', '2020-08-10 16:44:28', NULL, 'SYNTHEMEDIC'),
('SYNTHEMEDIC-3002', 'Synth-Rabat', 1, 'SYNTHEMEDIC/3002', '7c222fb2927d828af22f592134e8932480637c0d', 'de', '2020-06-22 09:50:46', NULL, 'SYNTHEMEDIC'),
('SYNTHEMEDIC-3003', 'Synth-Marrakech', 1, 'SYNTHEMEDIC/3003', '7c222fb2927d828af22f592134e8932480637c0d', 'de', NULL, '2020-06-18 11:00:39', NULL),
('SYNTHEMEDIC-3004', 'Synth-Tanger', 1, 'SYNTHEMEDIC/3004', '7c222fb2927d828af22f592134e8932480637c0d', 'de', NULL, NULL, NULL),
('SYNTHEMEDIC-3005', 'Synthemedic-FES', 1, 'SYNTHEMEDIC/3005', '7c222fb2927d828af22f592134e8932480637c0d', 'de', '2020-06-18 12:33:08', NULL, 'SYNTHEMEDIC');

-- --------------------------------------------------------

--
-- Table structure for table `connexion`
--

CREATE TABLE `connexion` (
  `id` int(11) NOT NULL,
  `id_utilisateur` int(11) NOT NULL,
  `date_connexion` timestamp NULL DEFAULT current_timestamp(),
  `date_deconnexion` timestamp NULL DEFAULT NULL,
  `type_utilisateur` varchar(250) NOT NULL DEFAULT 'client'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `connexion`
--

INSERT INTO `connexion` (`id`, `id_utilisateur`, `date_connexion`, `date_deconnexion`, `type_utilisateur`) VALUES
(38, 1, '2021-03-17 08:31:21', NULL, 'client'),
(39, 1, '2021-03-17 08:31:24', NULL, 'client'),
(40, 1, '2021-03-17 08:31:33', NULL, 'client'),
(41, 1, '2021-03-17 08:39:37', NULL, 'client'),
(42, 1, '2021-03-17 08:47:56', NULL, 'client'),
(43, 1, '2021-03-17 08:49:41', NULL, 'client'),
(44, 1, '2021-03-17 08:50:11', NULL, 'client'),
(45, 1, '2021-03-17 08:51:27', NULL, 'client'),
(46, 1, '2021-03-17 08:51:50', NULL, 'client'),
(47, 1, '2021-03-17 08:58:13', NULL, 'client'),
(48, 1, '2021-03-17 09:51:13', NULL, 'client'),
(49, 1, '2021-03-17 17:29:35', NULL, 'client'),
(50, 1, '2021-03-18 07:44:14', NULL, 'client'),
(51, 1, '2021-03-18 07:55:55', NULL, 'client'),
(52, 1, '2021-03-18 07:57:43', NULL, 'client'),
(53, 1, '2021-03-18 08:03:36', NULL, 'client'),
(54, 1, '2021-03-18 08:36:43', NULL, 'client'),
(55, 1, '2021-03-18 08:36:45', NULL, 'client'),
(56, 1, '2021-03-18 08:37:38', NULL, 'client'),
(57, 1, '2021-03-18 08:40:20', NULL, 'client'),
(58, 1, '2021-03-18 08:40:57', NULL, 'client'),
(59, 1, '2021-03-18 08:42:23', NULL, 'client'),
(60, 1, '2021-03-18 08:43:11', NULL, 'client'),
(61, 1, '2021-03-18 08:43:12', NULL, 'client'),
(62, 1, '2021-03-18 08:43:13', NULL, 'client'),
(63, 1, '2021-03-18 08:43:13', NULL, 'client'),
(64, 1, '2021-03-18 08:43:13', NULL, 'client'),
(65, 1, '2021-03-18 08:43:13', NULL, 'client'),
(66, 1, '2021-03-18 08:43:13', NULL, 'client'),
(67, 1, '2021-03-18 08:43:14', NULL, 'client'),
(68, 1, '2021-03-18 08:43:14', NULL, 'client'),
(69, 1, '2021-03-18 08:43:14', NULL, 'client'),
(70, 1, '2021-03-18 08:43:14', NULL, 'client'),
(71, 1, '2021-03-18 08:43:15', NULL, 'client'),
(72, 1, '2021-03-18 08:44:33', NULL, 'client'),
(73, 1, '2021-03-18 08:48:38', NULL, 'client'),
(74, 1, '2021-03-18 09:57:02', NULL, 'client'),
(75, 1, '2021-03-18 10:40:40', NULL, 'client'),
(76, 1, '2021-03-18 11:36:57', NULL, 'client'),
(77, 1, '2021-03-18 11:43:31', NULL, 'client'),
(78, 1, '2021-03-18 11:48:11', NULL, 'client'),
(79, 1, '2021-03-18 11:52:54', NULL, 'client'),
(80, 1, '2021-03-18 11:55:04', NULL, 'client'),
(81, 1, '2021-03-18 11:56:23', NULL, 'client'),
(82, 1, '2021-03-19 16:00:25', NULL, 'client'),
(83, 1, '2021-03-22 08:14:26', '2021-03-22 15:35:34', 'client'),
(84, 2, '2021-03-22 17:07:19', NULL, 'client'),
(85, 2, '2021-03-22 17:07:43', NULL, 'client'),
(86, 2, '2021-03-22 17:08:19', NULL, 'client'),
(87, 2, '2021-03-22 17:08:21', NULL, 'client'),
(88, 2, '2021-03-22 17:09:29', NULL, 'client'),
(89, 2, '2021-03-22 17:10:12', NULL, 'client'),
(90, 1, '2021-03-22 17:10:24', NULL, 'client'),
(91, 1, '2021-03-22 17:10:56', NULL, 'client'),
(92, 1, '2021-03-22 17:13:45', NULL, 'client'),
(93, 1, '2021-03-22 17:17:03', NULL, 'client'),
(94, 2, '2021-03-23 07:50:53', NULL, 'client'),
(95, 2, '2021-03-23 07:52:11', NULL, 'client'),
(96, 2, '2021-03-23 07:53:45', NULL, 'client'),
(97, 2, '2021-03-23 07:54:24', NULL, 'client'),
(98, 2, '2021-03-23 07:56:30', NULL, 'client'),
(99, 2, '2021-03-23 07:57:00', '2021-03-23 07:59:46', 'client'),
(100, 2, '2021-03-23 08:11:18', NULL, 'client'),
(101, 2, '2021-03-25 11:30:42', '2021-03-25 11:32:02', 'client'),
(102, 1, '2021-03-25 14:39:50', '2021-03-25 14:40:36', 'client'),
(103, 2, '2021-03-25 16:02:46', '2021-03-25 16:20:57', 'client'),
(104, 1, '2021-04-01 14:44:07', '2021-04-01 15:03:04', 'client'),
(105, 1, '2021-04-01 15:03:20', '2021-04-01 15:16:05', 'client'),
(106, 1, '2021-04-01 15:16:25', '2021-04-01 15:30:28', 'client'),
(107, 1, '2021-04-01 15:30:39', '2021-04-01 15:30:48', 'client'),
(108, 1, '2021-04-01 15:30:59', '2021-04-01 16:30:30', 'client'),
(109, 1, '2021-04-01 16:31:15', '2021-04-01 17:38:26', 'client'),
(110, 1, '2021-04-02 14:13:52', '2021-04-02 15:12:36', 'client'),
(111, 1, '2021-04-06 10:11:46', '2021-04-06 17:43:57', 'client'),
(112, 1, '2021-04-12 17:57:51', '2021-04-12 18:31:43', 'client'),
(113, 1, '2021-04-13 09:48:07', '2021-04-13 09:51:28', 'client'),
(114, 1, '2021-04-13 09:51:48', '2021-04-13 09:54:50', 'client'),
(115, 1, '2021-04-13 16:13:57', '2021-04-13 18:34:58', 'client'),
(116, 1, '2021-04-14 10:57:34', '2021-04-14 13:07:41', 'client'),
(117, 1, '2021-04-14 13:07:54', '2021-04-14 14:54:47', 'client'),
(118, 1, '2021-04-14 14:55:04', '2021-04-15 08:50:23', 'client'),
(119, 1, '2021-04-20 14:45:19', '2021-04-21 12:40:09', 'client'),
(120, 1, '2021-04-21 14:22:58', '2021-04-21 14:46:26', 'client');

-- --------------------------------------------------------

--
-- Table structure for table `declaration_v`
--

CREATE TABLE `declaration_v` (
  `numero` varchar(50) NOT NULL,
  `date` date NOT NULL,
  `facture_id` int(16) DEFAULT NULL,
  `colis` int(11) NOT NULL,
  `poids` decimal(16,2) DEFAULT NULL,
  `palettes` int(11) DEFAULT NULL,
  `paletteA` int(11) NOT NULL,
  `paletteB` int(11) NOT NULL,
  `paletteC` int(11) NOT NULL,
  `paletteAutre` int(11) NOT NULL,
  `Nbre_palettes` int(11) NOT NULL,
  `longueur` decimal(8,2) DEFAULT NULL,
  `hauteur` decimal(8,2) DEFAULT NULL,
  `largeur` decimal(8,2) DEFAULT NULL,
  `coef` decimal(8,2) DEFAULT NULL,
  `valeur` decimal(24,2) DEFAULT NULL,
  `client1_id` int(11) NOT NULL,
  `client2_id` int(11) NOT NULL,
  `livraison` char(1) DEFAULT NULL,
  `express` char(1) DEFAULT NULL,
  `port` char(1) DEFAULT NULL,
  `courrier_typ` char(2) DEFAULT NULL,
  `courrier_eta` char(1) DEFAULT 'S',
  `date_saisie` datetime DEFAULT current_timestamp(),
  `userid` int(18) DEFAULT NULL,
  `nature` varchar(50) DEFAULT NULL,
  `Espece` decimal(16,2) DEFAULT NULL,
  `Cheque` decimal(16,2) DEFAULT NULL,
  `Traite` decimal(16,2) DEFAULT NULL,
  `Nbre_BL` int(11) NOT NULL,
  `BL` text DEFAULT NULL,
  `id_adres` int(11) NOT NULL,
  `statut` varchar(250) NOT NULL,
  `commentaire` varchar(250) NOT NULL,
  `modifie_le` datetime DEFAULT NULL,
  `supprime_le` datetime DEFAULT NULL,
  `commit_par` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `declaration_v`
--

INSERT INTO `declaration_v` (`numero`, `date`, `facture_id`, `colis`, `poids`, `palettes`, `paletteA`, `paletteB`, `paletteC`, `paletteAutre`, `Nbre_palettes`, `longueur`, `hauteur`, `largeur`, `coef`, `valeur`, `client1_id`, `client2_id`, `livraison`, `express`, `port`, `courrier_typ`, `courrier_eta`, `date_saisie`, `userid`, `nature`, `Espece`, `Cheque`, `Traite`, `Nbre_BL`, `BL`, `id_adres`, `statut`, `commentaire`, `modifie_le`, `supprime_le`, `commit_par`) VALUES
('A00005001', '2019-07-23', 0, 5, '32.00', 0, 2, 0, 0, 0, 2, '2.00', '5.00', '2.00', '20.00', '120.00', 7, 109, 'D', 'S', 'D', 'M', 'S', '2019-07-23 10:31:59', NULL, 'Fragile', '3500.00', '350.00', '2950.00', 0, '', 167, '', '', NULL, NULL, NULL),
('B002D90001', '2019-06-14', 0, 2, '70.00', 0, 0, 0, 0, 0, 0, '0.00', '0.00', '0.00', NULL, '1500.00', 6, 91, 'G', 'S', 'P', 'M', 'L', '2019-06-14 17:48:59', NULL, 'Normal', '1500.00', '0.00', '650.00', 0, ' BL17;', 132, '', '', NULL, NULL, NULL),
('B002D90003', '2020-07-09', 0, 2, '30.00', 0, 0, 0, 0, 0, 0, '1.00', '1.00', '1.00', '1.00', '100.00', 6, 125, 'D', 'S', 'P', 'M', '', '2020-07-09 00:00:00', 6, 'Normal', '11225.00', '4120.00', '0.00', 2, '12541 | 13641 | ', 184, '', '', NULL, NULL, NULL),
('C00001001', '2019-06-17', 0, 4, '30.00', 0, 0, 0, 0, 0, 0, '0.00', '0.00', '0.00', NULL, '1200.00', 3, 93, 'p', 'S', 'P', '25', 'P', '2019-06-17 08:46:49', NULL, 'Normal', '0.00', '0.00', '0.00', 0, 'BL1;', 134, '', '', NULL, NULL, NULL),
('C00001002', '2019-06-17', 0, 5, '50.00', 0, 0, 0, 0, 0, 0, '0.00', '0.00', '0.00', NULL, '1500.00', 3, 94, 'G', 'S', 'P', 'M', 'S', '2019-06-17 08:52:24', NULL, 'Normal', '0.00', '0.00', '20.00', 0, ' ', 135, '', '', NULL, NULL, NULL),
('C00001003', '2019-06-17', 0, 2, '10.00', 0, 0, 0, 0, 0, 0, '0.00', '0.00', '0.00', NULL, '0.00', 3, 95, 'G', 'S', 'P', 'M', 'S', '2019-06-17 09:02:54', NULL, 'Normal', '500.00', '0.00', '0.00', 0, ' ', 136, '', '', NULL, NULL, NULL),
('C00001004', '2019-06-17', 0, 2, '20.00', 0, 0, 0, 0, 0, 0, '0.00', '0.00', '0.00', NULL, '0.00', 3, 98, 'G', 'S', 'P', 'M', 'A', '2019-06-17 10:51:53', NULL, 'Normal', '0.00', '0.00', '0.00', 0, ' ', 139, '', '', NULL, NULL, NULL),
('C00001005', '2019-06-17', 0, 6, '10.00', 0, 0, 0, 0, 0, 0, '0.00', '0.00', '0.00', NULL, '1700.00', 3, 98, 'G', 'S', 'P', 'M', 'R', '2019-06-17 10:54:28', NULL, 'Normal', '0.00', '0.00', '0.00', 0, ' ', 139, '', '', NULL, NULL, NULL),
('E00003006', '2019-05-24', 0, 3, '30.00', 0, 1, 0, 0, 0, 0, '0.00', '0.00', '0.00', NULL, '950.00', 1, 21, 'G', 'S', 'P', 'M', NULL, '2019-05-24 13:53:26', NULL, 'Très fragile', '950.00', '1500.00', '20.00', 0, 'BL1', 73, '', '', NULL, NULL, NULL),
('E00003007', '2019-05-24', 0, 2, '20.00', 0, 0, 0, 0, 0, 0, '0.00', '0.00', '0.00', NULL, '400.00', 1, 11, 'G', 'X', 'P', 'U', NULL, '2019-05-24 13:55:24', NULL, 'Normal', '200.00', '200.00', '20.00', 0, 'BL2', 82, '', '', NULL, NULL, NULL),
('E00003008', '2019-05-28', 0, 4, '150.00', 0, 0, 0, 0, 0, 0, '0.00', '0.00', '0.00', NULL, '15.00', 1, 11, 'G', 'S', 'P', 'L', NULL, '2019-05-28 10:54:59', NULL, 'Normal', '0.00', '0.00', '0.00', 0, ' ', 76, '', '', NULL, NULL, NULL),
('E00003009', '2019-05-28', 0, 3, '40.00', 0, 0, 0, 0, 0, 0, '0.00', '0.00', '0.00', NULL, '0.00', 1, 21, 'G', 'X', 'P', 'M', 'R', '2019-05-28 12:25:04', NULL, 'Normal', '0.00', '0.00', '0.00', 0, ' ', 73, '', '', NULL, NULL, NULL),
('E00003010', '2019-05-28', 0, 3, '40.00', 0, 0, 0, 0, 0, 0, '0.00', '0.00', '0.00', NULL, '0.00', 1, 21, 'G', 'X', 'P', 'M', 'L', '2019-05-28 14:11:12', NULL, 'Normal', '1500.00', '0.00', '0.00', 0, ' ', 77, '', '', NULL, NULL, NULL),
('E00003012', '2019-05-29', 0, 4, '50.00', 0, 0, 0, 0, 0, 0, '0.00', '0.00', '0.00', NULL, '0.00', 1, 82, 'G', 'S', 'P', 'M', NULL, '2019-05-29 11:23:37', NULL, 'Normal', '0.00', '0.00', '0.00', 0, ' ', 84, '', '', NULL, NULL, NULL),
('E00003013', '2019-05-30', 0, 2, '35.00', 0, 0, 0, 0, 0, 0, '0.00', '0.00', '0.00', NULL, '0.00', 1, 21, 'G', 'S', 'P', 'M', NULL, '2019-05-30 10:39:20', NULL, 'Normal', '0.00', '0.00', '0.00', 0, ' ', 89, '', '', NULL, NULL, NULL),
('E00003018', '2019-05-30', 0, 2, '10.00', 0, 0, 0, 0, 0, 0, '0.00', '0.00', '0.00', NULL, '0.00', 1, 82, 'G', 'S', 'P', 'M', NULL, '2019-05-30 13:46:51', NULL, 'Normal', '0.00', '0.00', '0.00', 0, ' ', 84, '', '', NULL, NULL, NULL),
('E00003019', '2019-06-14', 0, 5, '556.00', 0, 0, 0, 0, 0, 0, '0.00', '0.00', '0.00', NULL, '0.00', 1, 82, 'G', 'S', 'P', 'M', NULL, '2019-06-14 10:46:46', NULL, 'Normal', '0.00', '0.00', '1500.00', 0, ' ', 120, '', '', NULL, NULL, NULL),
('E00003020', '2019-06-17', 0, 5, '10.00', 0, 0, 0, 0, 0, 0, '0.00', '0.00', '0.00', NULL, '0.00', 1, 21, 'G', 'S', 'P', 'M', 'S', '2019-06-17 10:43:57', NULL, 'Normal', '0.00', '0.00', '0.00', 0, ' ', 154, '', '', NULL, NULL, NULL),
('E00003021', '2019-06-19', 0, 3, '20.00', 0, 0, 0, 0, 0, 0, '0.00', '0.00', '0.00', NULL, '0.00', 1, 21, 'G', 'S', 'P', 'M', 'A', '2019-06-19 14:53:15', NULL, 'Normal', '0.00', '0.00', '0.00', 0, ' ', 73, '', '', NULL, NULL, NULL),
('E00003022', '2019-07-08', 0, 5, '50.00', 0, 0, 0, 0, 0, 0, '0.00', '0.00', '0.00', NULL, '100.00', 1, 20, 'D', 'S', 'P', '5', NULL, '2019-07-08 09:57:19', NULL, 'Normal', '300.00', '110.00', '0.00', 0, 'BL2;', 68, '', '', NULL, NULL, NULL),
('E00003023', '2019-07-15', 0, 2, '20.00', 0, 0, 0, 0, 0, 5, '10.00', '10.00', '10.00', '1000.00', '100.00', 1, 81, 'D', 'S', 'P', '5', NULL, '2019-07-15 14:42:22', NULL, 'Fragile', '30.00', '70.00', '0.00', 0, ' ', 70, '', '', NULL, NULL, NULL),
('E00003024', '2019-07-15', 0, 10, '10.00', 0, 0, 2, 0, 0, 0, '10.00', '10.00', '10.00', '1000.00', '100.00', 1, 82, 'D', 'S', 'P', 'M', NULL, '2019-07-15 16:03:21', NULL, 'Normal', '0.00', '0.00', '0.00', 0, ' ', 120, '', '', NULL, NULL, NULL),
('E00003025', '2019-07-16', 0, 2, '20.00', 0, 0, 0, 0, 0, 0, '10.00', '10.00', '10.00', '1000.00', '100.00', 1, 21, 'D', 'S', 'P', 'M', NULL, '2019-07-16 10:43:11', NULL, 'Normal', '0.00', '0.00', '0.00', 0, 'BL1;', 73, '', '', NULL, NULL, NULL),
('E00003026', '2019-07-17', 0, 5, '20.00', 0, 10, 0, 0, 0, 10, '10.00', '3.00', '5.00', '150.00', '100.00', 1, 107, 'D', 'S', 'P', 'M', NULL, '2019-07-17 09:24:06', NULL, 'Normal', '0.00', '0.00', '0.00', 0, ' ', 164, '', '', NULL, NULL, NULL),
('E00003027', '2019-07-18', 0, 5, '3.00', 0, 2, 0, 0, 0, 2, '11.00', '3.00', '2.00', '66.00', '100.00', 1, 81, 'D', 'S', 'P', 'M', 'S', '2019-07-18 10:22:25', NULL, 'Normal', '300.00', '0.00', '0.00', 0, '123;654;897;', 165, '', '', NULL, NULL, NULL),
('E00003028', '2019-07-19', 0, 5, '30.00', 0, 2, 5, 0, 0, 7, '10.00', '5.00', '2.00', '100.00', '100.00', 1, 81, 'D', 'S', 'P', 'M', 'S', '2019-07-19 08:43:44', NULL, 'Normal', '20.00', '300.00', '0.00', 7, '15 | 15020 | 256231 | 256236 | 30020 | 5200 |3526523', 165, '', '', NULL, NULL, NULL),
('E00003029', '2019-07-19', 0, 5, '5.00', 0, 0, 0, 0, 0, 0, '0.00', '0.00', '0.00', '0.00', '100.00', 1, 10, 'D', 'S', 'P', 'M', 'S', '2019-07-19 11:15:37', NULL, 'Normal', '0.00', '0.00', '0.00', 0, '', 58, '', '', NULL, NULL, NULL),
('E00003030', '2019-07-19', 0, 6, '6.00', 0, 0, 0, 0, 0, 0, '0.00', '0.00', '0.00', '0.00', '100.00', 1, 10, 'D', 'S', 'P', 'M', 'S', '2019-07-19 11:24:15', NULL, 'Normal', '0.00', '0.00', '0.00', 0, '', 58, '', '', NULL, NULL, NULL),
('E00003031', '2019-07-19', 0, 5, '3.00', 0, 0, 0, 0, 0, 0, '0.00', '0.00', '0.00', '0.00', '100.00', 1, 11, 'D', 'S', 'P', 'M', 'S', '2019-07-19 15:03:07', NULL, 'Normal', '200.00', '0.00', '0.00', 5, '5 | 23565 | 25258 | 2545545 | 545544 | ', 82, '', '', NULL, NULL, NULL),
('E00003032', '2019-07-22', 0, 5, '23.00', 0, 4, 0, 0, 0, 4, '5.00', '2.00', '6.00', '60.00', '1003.00', 1, 108, 'D', 'S', 'P', 'M', 'S', '2019-07-22 10:43:10', NULL, 'Normal', '320.00', '3200.00', '10.00', 0, '', 166, '', '', NULL, NULL, NULL),
('E00003033', '2019-07-22', 0, 5, '5.00', 0, 5, 0, 0, 0, 5, '2.00', '6.00', '2.00', '24.00', '120.00', 1, 108, 'D', '', 'P', '25', 'S', '2019-07-22 10:44:02', NULL, 'Normal', '232.00', '6565.00', '0.00', 5, '56565 | 565656 | 22525 | 2235 | 466 | ', 166, '', '', NULL, '2020-06-23 16:17:23', 'SYNTHEMEDIC'),
('E00003034', '2019-07-22', 0, 4, '4.00', 0, 0, 2, 0, 0, 0, '2.00', '2.00', '2.00', '8.00', '300.00', 1, 108, 'D', 'S', 'P', 'L', 'S', '2019-07-22 10:46:26', NULL, 'Normal', '0.00', '0.00', '0.00', 2, '15 | 25 | ', 166, '', '', NULL, NULL, NULL),
('E00003035', '2019-07-23', 0, 5, '20.50', 0, 0, 0, 0, 0, 0, '2.00', '2.00', '2.00', '8.00', '4545.44', 1, 108, 'D', 'S', 'P', 'M', 'S', '2019-07-23 15:27:52', NULL, 'Normal', '12.56', '45445.24', '5.00', 0, '', 166, '', '', NULL, NULL, NULL),
('E00003036', '2019-07-24', 0, 5, '20.00', 0, 2, 0, 0, 0, 2, '1.00', '3.00', '2.00', '6.00', '1200.00', 1, 110, 'D', 'S', 'P', 'M', 'S', '2019-07-24 09:00:39', NULL, 'Normal', '1500.00', '500.00', '0.00', 0, '', 168, '', '', NULL, NULL, NULL),
('E00003037', '2019-07-24', 0, 5, '5.00', 0, 0, 0, 0, 0, 0, '1.00', '5.00', '2.00', '10.00', '1200.00', 1, 108, 'D', 'S', 'P', 'M', 'S', '2019-07-24 09:07:12', NULL, 'Normal', '300.00', '0.00', '0.00', 3, '1252 | 23532 | 565885 | ', 166, '', '', NULL, NULL, NULL),
('E00003038', '2019-07-24', 0, 2, '23.00', 0, 0, 0, 0, 0, 0, '2.00', '5.00', '3.00', '30.00', '1500.00', 1, 111, 'D', 'S', 'P', 'M', 'S', '2019-07-24 09:43:37', NULL, 'Normal', '0.00', '0.00', '0.00', 0, '', 169, '', '', NULL, NULL, NULL),
('E00003039', '2019-07-24', 0, 5, '20.00', 0, 0, 0, 0, 0, 0, '3.00', '3.00', '2.00', '18.00', '3000.00', 1, 112, 'D', 'S', 'P', 'M', 'S', '2019-07-24 09:52:58', NULL, 'Normal', '0.00', '0.00', '0.00', 0, '', 170, '', '', NULL, NULL, NULL),
('E00003040', '2019-08-01', 0, 1, '0.52', 0, 0, 0, 0, 0, 0, '0.00', '0.00', '0.00', '0.00', '100.00', 1, 5, 'D', 'S', 'P', 'M', 'S', '2019-08-01 17:00:24', NULL, 'Normal', '0.00', '0.00', '0.00', 0, '', 71, '', '', NULL, NULL, NULL),
('E00003041', '2019-12-02', 0, 20, '30.00', 0, 3, 2, 0, 0, 5, '0.00', '0.00', '0.00', '0.00', '100.00', 1, 114, 'D', 'S', 'P', 'M', 'S', '2019-12-02 15:50:16', 1, 'Normal', '0.00', '0.00', '0.00', 0, '', 175, '', '', '2020-06-18 12:44:04', NULL, 'SYNTHEMEDIC - Synthemedic-FES'),
('E00003042', '2020-06-04', 0, 2, '30.00', 0, 0, 0, 0, 0, 0, '1.00', '1.00', '1.00', '1.00', '350.00', 1, 117, 'D', 'S', 'P', 'M', '', '2020-06-04 00:00:00', 1, 'Normal', '0.00', '0.00', '0.00', 0, '', 176, '', '', NULL, NULL, NULL),
('E00003043', '2020-06-04', 0, 2, '13.00', 0, 0, 0, 0, 0, 0, '1.00', '1.00', '1.00', '1.00', '1450.00', 1, 21, 'D', 'S', 'P', 'M', '', '2020-06-04 00:00:00', 1, 'Normal', '0.00', '0.00', '0.00', 0, '', 73, '', '', NULL, '2020-06-18 11:04:57', NULL),
('E00003044', '2020-06-04', 0, 2, '13.00', 0, 0, 0, 0, 0, 0, '1.00', '1.00', '1.00', '1.00', '1450.00', 1, 21, 'D', 'S', 'P', 'M', '', '2020-06-04 00:00:00', 1, 'Normal', '0.00', '0.00', '0.00', 0, '', 73, '', '', NULL, NULL, NULL),
('E00003045', '2020-06-04', 0, 10, '20.00', 0, 0, 0, 0, 0, 0, '1.00', '1.00', '1.00', '1.00', '1200.00', 1, 22, 'D', 'S', 'P', 'M', '', '2020-06-04 00:00:00', 1, 'Normal', '0.00', '0.00', '0.00', 0, '', 177, '', '', NULL, NULL, NULL),
('E00003046', '2020-06-04', 0, 120, '140.00', 0, 0, 0, 0, 0, 0, '1.00', '1.00', '1.00', '1.00', '3200.00', 1, 118, 'D', 'S', 'P', 'M', '', '2020-06-04 00:00:00', 1, 'Normal', '0.00', '0.00', '0.00', 0, '', 178, '', '', NULL, NULL, NULL),
('E00003047', '2020-06-04', 0, 9, '11.00', 0, 0, 0, 0, 0, 0, '1.00', '1.00', '1.00', '1.00', '990.00', 1, 22, 'D', 'S', 'P', 'M', '', '2020-06-04 00:00:00', 1, 'Normal', '0.00', '0.00', '0.00', 0, '', 177, '', '', NULL, NULL, NULL),
('E00003048', '2020-06-04', 0, 5, '2.00', 0, 0, 0, 0, 0, 0, '1.00', '1.00', '1.00', '1.00', '490.00', 1, 120, 'D', 'S', 'P', 'M', '', '2020-06-04 00:00:00', 1, 'Normal', '0.00', '0.00', '0.00', 0, '', 179, '', '', NULL, NULL, NULL),
('E00003049', '2020-06-05', 0, 2, '20.00', 0, 0, 0, 0, 0, 0, '1.00', '1.00', '1.00', '1.00', '150.00', 1, 121, 'D', 'S', 'P', 'M', '', '2020-06-05 00:00:00', 1, 'Normal', '3670.00', '0.00', '0.00', 1, '66523210 | ', 180, '', '', NULL, NULL, NULL),
('E00003050', '2020-06-08', 0, 2, '30.00', 0, 2, 0, 0, 0, 2, '1.00', '1.00', '1.00', '1.00', '100.00', 1, 122, 'D', 'X', 'P', 'M', '', '2020-06-08 00:00:00', 1, 'Fragile', '1500.00', '0.00', '0.00', 0, '', 181, '', '', NULL, NULL, NULL),
('E0001001', '2019-10-18', 0, 1, '1.00', 0, 0, 0, 0, 0, 0, '0.00', '0.00', '0.00', '0.00', '500.00', 10, 113, 'D', 'X', 'D', 'M', 'S', '2019-10-18 16:39:30', NULL, 'Normal', '500.00', '0.00', '0.00', 0, '', 174, '', '', NULL, NULL, NULL),
('E147', '2019-05-08', 0, 2, '15.20', 0, 0, 0, 0, 0, 0, '0.00', '0.00', '0.00', NULL, '20.20', 1, 4, 'D', 'S', 'P', 'M', 'A', NULL, NULL, 'Normal', '1235.00', '12346.00', '1234568.00', 0, 'BL1,BL2;', 55, '', '', NULL, NULL, NULL),
('E148', '2019-05-08', 0, 2, '44.00', 0, 0, 0, 0, 0, 0, '0.00', '0.00', '0.00', NULL, '1780.00', 1, 17, 'D', 'X', 'P', '25', NULL, '2019-05-19 15:44:45', NULL, 'Normal', '1500.00', '1700.00', '15.00', 0, 'BL1;BL2;', 65, '', '', NULL, NULL, NULL),
('E149', '2019-05-02', 0, 9, '10.00', 0, 0, 0, 0, 0, 0, '0.00', '0.00', '0.00', NULL, '3400.00', 1, 5, 'G', 'S', 'P', '25', NULL, '2019-05-13 15:01:21', NULL, 'Fragile', '3000.00', '400.00', '15.00', 0, 'BL1;BL2;', 56, '', '', NULL, NULL, NULL),
('E150', '2019-05-16', 0, 5, '8.00', 0, 0, 0, 0, 0, 0, '0.00', '0.00', '0.00', NULL, '1300.00', 1, 4, 'D', 'S', 'P', 'M', NULL, '2019-05-15 09:54:12', NULL, 'Normal', '1000.00', '300.00', '15.00', 0, 'BL6;', 55, '', '', NULL, NULL, NULL),
('E171', '2019-05-08', 0, 5, '10.00', 0, 0, 0, 0, 0, 0, '0.00', '0.00', '0.00', NULL, '500.00', 1, 19, 'G', 'X', 'D', '25', NULL, '2019-05-20 14:58:06', NULL, 'TrÃ¨s fragile', '500.00', '0.00', '20.00', 0, 'BL9;', 67, '', '', NULL, NULL, NULL),
('E178', '2019-05-08', 0, 5, '250.00', 0, 0, 0, 0, 0, 0, '0.00', '0.00', '0.00', NULL, '50000.00', 1, 22, 'G', 'X', 'P', '5', NULL, '2019-05-23 09:49:02', NULL, 'Normal', '25000.00', '25000.00', '15.00', 0, 'BL2;', 52, '', '', NULL, NULL, NULL),
('E181', '2019-05-08', 0, 7, '7000.00', 0, 0, 0, 0, 0, 0, '0.00', '0.00', '0.00', NULL, '1400000.00', 1, 23, 'D', 'S', 'P', 'M', NULL, '2019-05-23 09:54:15', NULL, 'Normal', '140000.00', '100000.00', '15.00', 0, 'BL1;', 52, '', '', NULL, NULL, NULL),
('E3004', '2019-05-24', 0, 4, '15.00', 0, 0, 0, 0, 0, 0, '0.00', '0.00', '0.00', NULL, '4500.00', 1, 81, 'G', 'X', 'P', 'M', NULL, '2019-05-23 23:20:05', NULL, 'Normal', '500.00', '4000.00', '15.00', 0, 'BL1;', 70, '', '', NULL, NULL, NULL),
('E3005', '2019-05-24', 0, 4, '30.00', 0, 0, 0, 0, 0, 0, '0.00', '0.00', '0.00', NULL, '900.00', 1, 5, 'D', 'X', 'P', 'M', NULL, '2019-05-24 13:24:29', NULL, 'Fragile', '600.00', '300.00', '20.00', 0, 'BL1;', 84, '', '', NULL, NULL, NULL),
('H00005001', '2019-05-31', 0, 2, '87.00', 0, 0, 0, 0, 0, 0, '0.00', '0.00', '0.00', NULL, '1500.00', 4, 82, 'G', 'S', 'P', 'M', NULL, '2019-05-31 11:33:36', NULL, 'Normal', '0.00', '0.00', '0.00', 0, 'BL1;', 120, '', '', NULL, NULL, NULL),
('H00005002', '2019-05-31', 0, 3, '20.00', 0, 0, 0, 0, 0, 0, '0.00', '0.00', '0.00', NULL, '1600.00', 4, 84, 'G', 'S', 'P', 'M', NULL, '2019-05-31 11:49:55', NULL, 'Normal', '0.00', '0.00', '0.00', 0, ' ', 121, '', '', NULL, NULL, NULL),
('H00005003', '2019-05-31', 0, 2, '20.00', 0, 0, 0, 0, 0, 0, '0.00', '0.00', '0.00', NULL, '1600.00', 4, 85, 'G', 'S', 'P', 'M', NULL, '2019-05-31 11:50:49', NULL, 'Normal', '0.00', '0.00', '0.00', 0, ' ', 122, '', '', NULL, NULL, NULL),
('H00005004', '2019-05-31', 0, 3, '40.00', 0, 0, 0, 0, 0, 0, '0.00', '0.00', '0.00', NULL, '500.00', 4, 86, 'G', 'S', 'P', 'M', NULL, '2019-05-31 11:54:51', NULL, 'Normal', '500.00', '0.00', '0.00', 0, ' ', 123, '', '', NULL, NULL, NULL),
('H00005005', '2019-05-31', 0, 3, '45.00', 0, 0, 0, 0, 0, 0, '0.00', '0.00', '0.00', NULL, '0.00', 4, 87, 'G', 'S', 'P', 'M', NULL, '2019-05-31 12:17:02', NULL, 'Normal', '0.00', '0.00', '0.00', 0, 'BL5;', 125, '', '', NULL, NULL, NULL),
('H00005006', '2019-05-31', 0, 2, '20.00', 0, 0, 0, 0, 0, 0, '0.00', '0.00', '0.00', NULL, '0.00', 4, 88, 'G', 'S', 'P', 'M', NULL, '2019-05-31 12:25:08', NULL, 'Normal', '0.00', '0.00', '0.00', 0, ' ', 124, '', '', NULL, NULL, NULL),
('HU0080001', '2019-06-14', 0, 5, '550.00', 0, 0, 0, 0, 0, 0, '0.00', '0.00', '0.00', NULL, '0.00', 5, 89, 'G', 'S', 'P', 'M', NULL, '2019-06-14 11:18:13', NULL, 'Normal', '0.00', '0.00', '0.00', 0, ' ', 128, '', '', NULL, NULL, NULL),
('HU0080002', '2019-06-14', 0, 14, '150.00', 0, 0, 0, 0, 0, 0, '0.00', '0.00', '0.00', NULL, '60020.00', 5, 90, 'p', 'S', 'P', 'M', NULL, '2019-06-14 11:23:06', NULL, 'Normal', '2000.00', '0.00', '15.00', 0, 'bl25', 131, '', '', NULL, NULL, NULL),
('HU0080003', '2019-06-17', 0, 20, '50.00', 0, 0, 0, 0, 0, 0, '0.00', '0.00', '0.00', NULL, '0.00', 5, 90, 'G', 'S', 'P', 'M', 'P', '2019-06-17 10:47:18', NULL, 'Normal', '0.00', '0.00', '0.00', 0, ' ', 131, '', '', NULL, NULL, NULL),
('S00004001', '2020-06-17', 0, 5, '5.00', 0, 0, 0, 0, 0, 0, '1.00', '1.00', '1.00', '1.00', '2500.00', 2, 123, 'D', 'X', 'P', 'M', '', '2020-06-17 00:00:00', 2, 'Normal', '0.00', '0.00', '0.00', 0, '', 182, '', '', NULL, NULL, NULL),
('S00004002', '2020-06-17', 0, 4, '12.00', 0, 0, 0, 0, 0, 0, '1.00', '1.00', '1.00', '1.00', '100.00', 2, 124, 'D', 'S', 'P', 'M', '', '2020-06-17 00:00:00', 2, 'Normal', '0.00', '0.00', '0.00', 0, '', 183, '', '', NULL, NULL, NULL),
('S00004003', '2021-03-23', 0, 2, '30.00', 7, 0, 2, 5, 0, 7, '1.00', '1.00', '1.00', '1.00', '120.00', 2, 126, 'G', NULL, 'D', 'U', '', '2021-03-23 00:00:00', 2, 'Fragile', '300.00', '0.00', '0.00', 3, '125 | 1758 | 2563 | ', 185, '', '', NULL, NULL, NULL),
('S00004004', '2021-03-25', 0, 2, '12.00', 0, 0, 0, 0, 0, 0, '1.00', '1.00', '1.00', '1.00', '100.00', 2, 127, 'D', 'S', 'P', 'M', '', '2021-03-25 00:00:00', 2, 'Normal', '0.00', '0.00', '0.00', 0, '', 187, '', '', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Stand-in structure for view `impcarnet`
-- (See below for the actual view)
--
CREATE TABLE `impcarnet` (
`NomEx` varchar(250)
,`AdresseEx` text
,`VilleEx` varchar(250)
,`TelEx` varchar(250)
,`NomDest` varchar(250)
,`TelDest` varchar(250)
,`villeDest` int(11)
,`AdresseDest` varchar(250)
,`numero` varchar(50)
,`date` date
,`facture_id` int(16)
,`colis` int(11)
,`poids` decimal(16,2)
,`palettes` int(11)
,`paletteA` int(11)
,`paletteB` int(11)
,`paletteC` int(11)
,`paletteAutre` int(11)
,`Nbre_palettes` int(11)
,`longueur` decimal(8,2)
,`hauteur` decimal(8,2)
,`largeur` decimal(8,2)
,`coef` decimal(8,2)
,`valeur` decimal(24,2)
,`client1_id` int(11)
,`client2_id` int(11)
,`livraison` char(1)
,`express` char(1)
,`port` char(1)
,`courrier_typ` char(2)
,`courrier_eta` char(1)
,`date_saisie` datetime
,`userid` int(18)
,`nature` varchar(50)
,`Espece` decimal(16,2)
,`Cheque` decimal(16,2)
,`Traite` decimal(16,2)
,`Nbre_BL` int(11)
,`BL` text
,`id_adres` int(11)
,`statut` varchar(250)
,`commentaire` varchar(250)
,`numeroCarnet` int(11)
,`declaration` varchar(50)
,`etat` varchar(50)
,`date_modification` datetime
);

-- --------------------------------------------------------

--
-- Table structure for table `panierramasse`
--

CREATE TABLE `panierramasse` (
  `numeroCarnet` int(11) NOT NULL,
  `declaration` varchar(50) NOT NULL,
  `etat` varchar(50) NOT NULL DEFAULT 'En cours',
  `motif_annulation` varchar(250) NOT NULL,
  `date_modification` datetime NOT NULL,
  `supprime_le` datetime DEFAULT NULL,
  `commit_par` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `panierramasse`
--

INSERT INTO `panierramasse` (`numeroCarnet`, `declaration`, `etat`, `motif_annulation`, `date_modification`, `supprime_le`, `commit_par`) VALUES
(63, 'E00003006', 'annule', '', '2020-06-10 12:19:59', NULL, NULL),
(63, 'E00003007', 'annule', '', '2020-06-10 12:19:59', NULL, NULL),
(63, 'E00003008', 'annule', '', '2020-06-10 12:19:59', NULL, NULL),
(63, 'E00003009', 'annule', '', '2020-06-10 12:19:59', NULL, NULL),
(63, 'E00003010', 'annule', '', '2020-06-10 12:19:59', NULL, NULL),
(63, 'E00003012', 'annule', '', '2020-06-10 12:19:59', NULL, NULL),
(63, 'E00003013', 'annule', '', '2020-06-10 12:19:59', NULL, NULL),
(63, 'E00003018', 'annule', '', '2020-06-10 12:19:59', NULL, NULL),
(63, 'E00003019', 'annule', '', '2020-06-10 12:19:59', NULL, NULL),
(63, 'E00003020', 'annule', '', '2020-06-10 12:19:59', NULL, NULL),
(63, 'E00003021', 'annule', '', '2020-06-10 12:19:59', NULL, NULL),
(63, 'E00003022', 'annule', '', '2020-06-10 12:19:59', NULL, NULL),
(63, 'E00003023', 'annule', '', '2020-06-10 12:19:59', NULL, NULL),
(63, 'E00003024', 'annule', '', '2020-06-10 12:19:59', NULL, NULL),
(63, 'E00003025', 'annule', '', '2020-06-10 12:19:59', NULL, NULL),
(63, 'E00003026', 'annule', '', '2020-06-10 12:19:59', NULL, NULL),
(63, 'E00003027', 'annule', '', '2020-06-10 12:19:59', NULL, NULL),
(63, 'E00003028', 'annule', '', '2020-06-10 12:19:59', NULL, NULL),
(122, 'E00003028', 'Valide', '', '2021-04-14 12:16:21', NULL, NULL),
(63, 'E00003029', 'annule', '', '2020-06-10 12:19:59', NULL, NULL),
(126, 'E00003029', 'annule', '', '0000-00-00 00:00:00', NULL, NULL),
(127, 'E00003029', 'annule', 'Retard', '2021-04-21 14:43:06', NULL, NULL),
(63, 'E00003030', 'annule', '', '2020-06-10 12:19:59', NULL, NULL),
(63, 'E00003031', 'annule', '', '2020-06-10 12:19:59', NULL, NULL),
(63, 'E00003032', 'annule', '', '2020-06-10 12:19:59', NULL, NULL),
(67, 'E00003032', 'annule', '', '2019-08-07 09:51:09', NULL, NULL),
(72, 'E00003032', 'annule', '', '2019-08-27 09:14:50', NULL, NULL),
(96, 'E00003032', 'annule', '', '2020-06-09 12:48:29', NULL, NULL),
(126, 'E00003032', 'annule', '', '0000-00-00 00:00:00', NULL, NULL),
(127, 'E00003032', 'annule', 'Retard', '2021-04-21 14:43:06', NULL, NULL),
(63, 'E00003033', 'annule', '', '2020-06-10 12:19:59', NULL, NULL),
(67, 'E00003033', 'annule', '', '2019-08-07 09:51:09', NULL, NULL),
(72, 'E00003033', 'annule', '', '2019-08-27 09:14:50', NULL, NULL),
(63, 'E00003034', 'annule', '', '2020-06-10 12:19:59', NULL, NULL),
(67, 'E00003034', 'annule', '', '2019-08-07 09:51:09', NULL, NULL),
(126, 'E00003034', 'annule', '', '0000-00-00 00:00:00', NULL, NULL),
(127, 'E00003034', 'annule', 'Retard', '2021-04-21 14:43:06', NULL, NULL),
(63, 'E00003035', 'annule', '', '2020-06-10 12:19:59', NULL, NULL),
(67, 'E00003035', 'annule', '', '2019-08-07 09:51:09', NULL, NULL),
(72, 'E00003035', 'annule', '', '2019-08-27 09:14:50', NULL, NULL),
(96, 'E00003035', 'annule', '', '2020-06-09 12:48:29', NULL, NULL),
(98, 'E00003035', 'annule', '', '2020-06-10 16:00:04', NULL, NULL),
(125, 'E00003035', 'Valide', '', '2021-04-21 14:26:46', NULL, NULL),
(63, 'E00003036', 'annule', '', '2020-06-10 12:19:59', NULL, NULL),
(65, 'E00003036', 'annule', '', '2019-08-07 09:36:44', NULL, NULL),
(67, 'E00003036', 'annule', '', '2019-08-07 09:51:09', NULL, NULL),
(68, 'E00003036', 'annule', '', '2019-08-07 09:54:35', NULL, NULL),
(70, 'E00003036', 'annule', '', '2019-08-07 11:10:36', NULL, NULL),
(71, 'E00003036', 'annule', '', '2019-08-27 08:43:12', NULL, NULL),
(72, 'E00003036', 'annule', '', '2019-08-27 09:14:50', NULL, NULL),
(73, 'E00003036', 'annule', 'Retard', '2019-08-27 09:36:24', NULL, NULL),
(74, 'E00003036', 'annule', '', '2019-08-27 09:56:24', NULL, NULL),
(75, 'E00003036', 'annule', '', '2019-08-27 10:01:44', NULL, NULL),
(77, 'E00003036', 'annule', '', '2019-08-27 10:17:53', NULL, NULL),
(78, 'E00003036', 'annule', '', '2019-08-27 10:18:30', NULL, NULL),
(79, 'E00003036', 'annule', '', '2019-08-27 10:42:26', NULL, NULL),
(80, 'E00003036', 'annule', '', '2019-08-27 10:51:53', NULL, NULL),
(81, 'E00003036', 'annule', '', '2019-08-27 10:52:58', NULL, NULL),
(82, 'E00003036', 'annule', '', '2019-08-27 10:55:45', NULL, NULL),
(86, 'E00003036', 'annule', '', '2019-08-27 11:06:40', NULL, NULL),
(87, 'E00003036', 'annule', '', '2019-08-27 11:28:52', NULL, NULL),
(88, 'E00003036', 'annule', '', '2019-08-27 11:30:46', NULL, NULL),
(89, 'E00003036', 'annule', '', '2019-08-27 11:35:27', NULL, NULL),
(90, 'E00003036', 'annule', '', '2019-08-27 11:40:46', NULL, NULL),
(91, 'E00003036', 'annule', '', '2019-08-27 11:41:17', NULL, NULL),
(92, 'E00003036', 'annule', '', '2019-08-27 12:10:42', NULL, NULL),
(93, 'E00003036', 'annule', '', '2019-09-02 11:06:51', NULL, NULL),
(94, 'E00003036', 'Valide', '', '2019-09-02 11:10:18', NULL, NULL),
(63, 'E00003037', 'annule', '', '2020-06-10 12:19:59', NULL, NULL),
(65, 'E00003037', 'annule', '', '2019-08-07 09:36:44', NULL, NULL),
(67, 'E00003037', 'annule', '', '2019-08-07 09:51:09', NULL, NULL),
(68, 'E00003037', 'annule', '', '2019-08-07 09:54:35', NULL, NULL),
(71, 'E00003037', 'annule', '', '2019-08-27 08:43:12', NULL, NULL),
(72, 'E00003037', 'annule', '', '2019-08-27 09:14:50', NULL, NULL),
(74, 'E00003037', 'annule', '', '2019-08-27 09:56:24', NULL, NULL),
(82, 'E00003037', 'annule', '', '2019-08-27 10:55:45', NULL, NULL),
(92, 'E00003037', 'annule', '', '2019-08-27 12:10:42', NULL, NULL),
(102, 'E00003037', 'annule', '', '2020-06-18 15:56:21', NULL, NULL),
(125, 'E00003037', 'Valide', '', '2021-04-21 14:26:46', NULL, NULL),
(63, 'E00003038', 'annule', '', '2020-06-10 12:19:59', NULL, NULL),
(65, 'E00003038', 'annule', '', '2019-08-07 09:36:44', NULL, NULL),
(67, 'E00003038', 'annule', '', '2019-08-07 09:51:09', NULL, NULL),
(71, 'E00003038', 'annule', '', '2019-08-27 08:43:12', NULL, NULL),
(72, 'E00003038', 'annule', '', '2019-08-27 09:14:50', NULL, NULL),
(74, 'E00003038', 'annule', '', '2019-08-27 09:56:24', NULL, NULL),
(92, 'E00003038', 'annule', '', '2019-08-27 12:10:42', NULL, NULL),
(122, 'E00003038', 'Valide', '', '2021-04-14 12:16:21', NULL, NULL),
(63, 'E00003039', 'annule', '', '2020-06-10 12:19:59', NULL, NULL),
(65, 'E00003039', 'annule', '', '2019-08-07 09:36:44', NULL, NULL),
(67, 'E00003039', 'annule', '', '2019-08-07 09:51:09', NULL, NULL),
(72, 'E00003039', 'annule', '', '2019-08-27 09:14:50', NULL, NULL),
(96, 'E00003039', 'annule', '', '2020-06-09 12:48:29', NULL, NULL),
(125, 'E00003039', 'Valide', '', '2021-04-21 14:26:46', NULL, NULL),
(64, 'E00003040', 'annule', 'retard', '2019-08-07 09:29:15', NULL, NULL),
(65, 'E00003040', 'annule', '', '2019-08-07 09:36:44', NULL, NULL),
(66, 'E00003040', 'annule', '', '2019-08-07 09:36:59', NULL, NULL),
(67, 'E00003040', 'annule', '', '2019-08-07 09:51:09', NULL, NULL),
(68, 'E00003040', 'annule', '', '2019-08-07 09:54:35', NULL, NULL),
(69, 'E00003040', 'annule', '', '2019-08-07 09:55:04', NULL, NULL),
(70, 'E00003040', 'annule', '', '2019-08-07 11:10:36', NULL, NULL),
(71, 'E00003040', 'annule', '', '2019-08-27 08:43:12', NULL, NULL),
(72, 'E00003040', 'annule', '', '2019-08-27 09:14:50', NULL, NULL),
(73, 'E00003040', 'annule', 'Retard', '2019-08-27 09:36:24', NULL, NULL),
(74, 'E00003040', 'annule', '', '2019-08-27 09:56:24', NULL, NULL),
(75, 'E00003040', 'annule', '', '2019-08-27 10:01:44', NULL, NULL),
(76, 'E00003040', 'annule', '', '2019-08-27 10:16:07', NULL, NULL),
(77, 'E00003040', 'annule', '', '2019-08-27 10:17:53', NULL, NULL),
(78, 'E00003040', 'annule', '', '2019-08-27 10:18:30', NULL, NULL),
(79, 'E00003040', 'annule', '', '2019-08-27 10:42:26', NULL, NULL),
(80, 'E00003040', 'annule', '', '2019-08-27 10:51:53', NULL, NULL),
(81, 'E00003040', 'annule', '', '2019-08-27 10:52:58', NULL, NULL),
(82, 'E00003040', 'annule', '', '2019-08-27 10:55:45', NULL, NULL),
(83, 'E00003040', 'annule', '', '2019-08-27 10:58:11', NULL, NULL),
(84, 'E00003040', 'annule', '', '2019-08-27 11:00:39', NULL, NULL),
(85, 'E00003040', 'annule', '', '2019-08-27 11:04:12', NULL, NULL),
(86, 'E00003040', 'annule', '', '2019-08-27 11:06:40', NULL, NULL),
(87, 'E00003040', 'annule', '', '2019-08-27 11:28:52', NULL, NULL),
(88, 'E00003040', 'annule', '', '2019-08-27 11:30:46', NULL, NULL),
(89, 'E00003040', 'annule', '', '2019-08-27 11:35:27', NULL, NULL),
(90, 'E00003040', 'annule', '', '2019-08-27 11:40:46', NULL, NULL),
(91, 'E00003040', 'annule', '', '2019-08-27 11:41:17', NULL, NULL),
(92, 'E00003040', 'annule', '', '2019-08-27 12:10:42', NULL, NULL),
(93, 'E00003040', 'annule', '', '2019-09-02 11:06:51', NULL, NULL),
(94, 'E00003040', 'Valide', '', '2019-09-02 11:10:18', NULL, NULL),
(95, 'E00003041', 'annule', '', '2020-01-22 11:29:05', NULL, NULL),
(102, 'E00003041', 'annule', '', '2020-06-18 15:56:21', NULL, NULL),
(103, 'E00003041', 'annule', '', '2020-06-18 15:59:32', NULL, NULL),
(106, 'E00003041', 'annule', '', '2020-06-18 16:36:50', NULL, NULL),
(108, 'E00003041', 'annule', '', '2020-06-18 16:58:50', NULL, NULL),
(120, 'E00003041', 'annule', 'retard', '2021-04-14 11:11:14', NULL, NULL),
(121, 'E00003041', 'annule', '', '2021-04-14 11:35:28', NULL, NULL),
(124, 'E00003041', 'Valide', '', '2021-04-21 12:38:55', NULL, NULL),
(96, 'E00003042', 'annule', '', '2020-06-09 12:48:29', NULL, NULL),
(97, 'E00003042', 'Valide', '', '2020-06-09 14:19:45', NULL, NULL),
(96, 'E00003043', 'annule', '', '2020-06-09 12:48:29', NULL, NULL),
(96, 'E00003044', 'annule', '', '2020-06-09 12:48:29', NULL, NULL),
(99, 'E00003044', 'annule', '', '2020-06-18 15:48:55', NULL, NULL),
(101, 'E00003044', 'Valide', '', '2020-06-18 15:49:55', NULL, NULL),
(96, 'E00003045', 'annule', '', '2020-06-09 12:48:29', NULL, NULL),
(99, 'E00003045', 'annule', '', '2020-06-18 15:48:55', NULL, NULL),
(100, 'E00003045', 'Valide', '', '2020-06-18 15:43:56', NULL, NULL),
(96, 'E00003046', 'annule', '', '2020-06-09 12:48:29', NULL, NULL),
(100, 'E00003046', 'Valide', '', '2020-06-18 15:43:56', NULL, NULL),
(101, 'E00003047', 'Valide', '', '2020-06-18 15:49:55', NULL, NULL),
(103, 'E00003048', 'annule', '', '2020-06-18 15:59:32', NULL, NULL),
(104, 'E00003048', 'annule', '', '2020-06-18 16:02:35', NULL, NULL),
(105, 'E00003048', 'annule', '', '2020-06-18 16:03:15', NULL, NULL),
(106, 'E00003048', 'annule', '', '2020-06-18 16:36:50', NULL, NULL),
(107, 'E00003048', 'annule', '', '2020-06-18 16:38:07', NULL, NULL),
(108, 'E00003048', 'annule', '', '2020-06-18 16:58:50', NULL, NULL),
(120, 'E00003048', 'annule', 'retard', '2021-04-14 11:11:14', NULL, NULL),
(121, 'E00003048', 'annule', '', '2021-04-14 11:35:28', NULL, NULL),
(122, 'E00003048', 'Valide', '', '2021-04-14 12:16:21', NULL, NULL),
(96, 'E00003049', 'annule', '', '2020-06-09 12:48:29', NULL, NULL),
(97, 'E00003049', 'Valide', '', '2020-06-09 14:19:45', NULL, NULL),
(104, 'E00003050', 'annule', '', '2020-06-18 16:02:35', NULL, NULL),
(105, 'E00003050', 'annule', '', '2020-06-18 16:03:15', NULL, NULL),
(107, 'E00003050', 'annule', '', '2020-06-18 16:38:07', NULL, NULL),
(120, 'E00003050', 'annule', 'retard', '2021-04-14 11:11:14', NULL, NULL),
(121, 'E00003050', 'annule', '', '2021-04-14 11:35:28', NULL, NULL),
(124, 'E00003050', 'Valide', '', '2021-04-21 12:38:55', NULL, NULL),
(63, 'E147', 'annule', '', '2020-06-10 12:19:59', NULL, NULL),
(63, 'E148', 'annule', '', '2020-06-10 12:19:59', NULL, NULL),
(63, 'E149', 'annule', '', '2020-06-10 12:19:59', NULL, NULL),
(63, 'E150', 'annule', '', '2020-06-10 12:19:59', NULL, NULL),
(63, 'E171', 'annule', '', '2020-06-10 12:19:59', NULL, NULL),
(63, 'E178', 'annule', '', '2020-06-10 12:19:59', NULL, NULL),
(63, 'E181', 'annule', '', '2020-06-10 12:19:59', NULL, NULL),
(63, 'E3004', 'annule', '', '2020-06-10 12:19:59', NULL, NULL),
(63, 'E3005', 'annule', '', '2020-06-10 12:19:59', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `points_relais`
--

CREATE TABLE `points_relais` (
  `id_pr` int(11) NOT NULL,
  `lib_pr` varchar(250) NOT NULL,
  `id_ville` int(11) NOT NULL,
  `loc_ver` varchar(50) NOT NULL,
  `loc_hor` varchar(50) NOT NULL,
  `modifie_le` datetime DEFAULT NULL,
  `supprime_le` datetime DEFAULT NULL,
  `commit_par` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `points_relais`
--

INSERT INTO `points_relais` (`id_pr`, `lib_pr`, `id_ville`, `loc_ver`, `loc_hor`, `modifie_le`, `supprime_le`, `commit_par`) VALUES
(1, 'Taghazout', 300, '3335.22722', '888885.2455', NULL, NULL, NULL),
(2, 'Adrar', 300, '3335.22222', '888885.2255', NULL, NULL, NULL),
(3, 'Bernoussi - Tarik', 100, '3340.22222', '3340.22292', NULL, NULL, NULL),
(4, 'Anassi', 100, '3341.22222', '3341.22292', NULL, NULL, NULL),
(5, 'PR - Hassan', 600, '3331.22222', '3331.22292', NULL, NULL, NULL),
(6, 'PR - hay Hassani', 100, '5525.22525', '2555.55252', NULL, NULL, NULL),
(7, 'Pr Hay Al massira 2', 700, '5585547.22554511', '558458754.255565', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `ramasse`
--

CREATE TABLE `ramasse` (
  `numeroCarnet` int(11) NOT NULL,
  `datedesaisie` datetime NOT NULL DEFAULT current_timestamp(),
  `dateramassage` date NOT NULL,
  `user_id` int(11) NOT NULL,
  `code_ramassage` varchar(50) NOT NULL,
  `modifie_le` datetime DEFAULT NULL,
  `supprime_le` datetime DEFAULT NULL,
  `commit_par` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ramasse`
--

INSERT INTO `ramasse` (`numeroCarnet`, `datedesaisie`, `dateramassage`, `user_id`, `code_ramassage`, `modifie_le`, `supprime_le`, `commit_par`) VALUES
(63, '2019-08-01 15:14:21', '2019-08-01', 1, '0', NULL, NULL, NULL),
(64, '2019-08-07 09:18:55', '2019-08-07', 1, '0', NULL, NULL, NULL),
(65, '2019-08-07 09:31:14', '2019-08-07', 1, '0', NULL, NULL, NULL),
(66, '2019-08-07 09:36:53', '2019-08-07', 1, '0', NULL, NULL, NULL),
(67, '2019-08-07 09:37:34', '2019-08-07', 1, '0', NULL, NULL, NULL),
(68, '2019-08-07 09:51:59', '2019-08-07', 1, '0', NULL, NULL, NULL),
(69, '2019-08-07 09:54:53', '2019-08-07', 1, '0', NULL, NULL, NULL),
(70, '2019-08-07 11:09:44', '2019-08-07', 1, '0', NULL, NULL, NULL),
(71, '2019-08-26 16:58:29', '2019-08-26', 1, '0', NULL, NULL, NULL),
(72, '2019-08-27 08:43:27', '2019-08-27', 1, '0', NULL, NULL, NULL),
(73, '2019-08-27 09:14:59', '2019-08-27', 1, '0', NULL, NULL, NULL),
(74, '2019-08-27 09:41:20', '2019-08-27', 1, '0', NULL, NULL, NULL),
(75, '2019-08-27 09:56:36', '2019-08-27', 1, '0', NULL, NULL, NULL),
(76, '2019-08-27 10:08:52', '2019-08-27', 1, '0', NULL, NULL, NULL),
(77, '2019-08-27 10:16:15', '2019-08-27', 1, '0', NULL, NULL, NULL),
(78, '2019-08-27 10:18:02', '2019-08-27', 1, '0', NULL, NULL, NULL),
(79, '2019-08-27 10:25:27', '2019-08-27', 1, '0', NULL, NULL, NULL),
(80, '2019-08-27 10:42:32', '2019-08-27', 1, '0', NULL, NULL, NULL),
(81, '2019-08-27 10:52:00', '2019-08-27', 1, '0', NULL, NULL, NULL),
(82, '2019-08-27 10:53:06', '2019-08-27', 1, '0', NULL, NULL, NULL),
(83, '2019-08-27 10:56:53', '2019-08-27', 1, '0', NULL, NULL, NULL),
(84, '2019-08-27 10:58:15', '2019-08-27', 1, '0', NULL, NULL, NULL),
(85, '2019-08-27 11:00:44', '2019-08-27', 1, '0', NULL, NULL, NULL),
(86, '2019-08-27 11:04:18', '2019-08-27', 1, '0', NULL, NULL, NULL),
(87, '2019-08-27 11:07:02', '2019-08-27', 1, '0', NULL, NULL, NULL),
(88, '2019-08-27 11:29:00', '2019-08-27', 1, '0', NULL, NULL, NULL),
(89, '2019-08-27 11:30:58', '2019-08-27', 1, '0', NULL, NULL, NULL),
(90, '2019-08-27 11:35:32', '2019-08-27', 1, '0', NULL, NULL, NULL),
(91, '2019-08-27 11:41:02', '2019-08-27', 1, '0', NULL, NULL, NULL),
(92, '2019-08-27 11:50:54', '2019-08-27', 1, '0', NULL, NULL, NULL),
(93, '2019-09-02 11:05:42', '2019-09-02', 1, '0', NULL, NULL, NULL),
(94, '2019-09-02 11:09:58', '2019-09-02', 1, '0', NULL, NULL, NULL),
(95, '2020-01-16 17:24:53', '2020-01-16', 1, '0', NULL, NULL, NULL),
(96, '2020-06-09 12:16:00', '2020-06-09', 1, '0', NULL, NULL, NULL),
(97, '2020-06-09 14:17:09', '2020-06-09', 1, '0', NULL, NULL, NULL),
(98, '2020-06-10 15:59:53', '2020-06-10', 1, '0', NULL, NULL, NULL),
(99, '2020-06-18 11:26:18', '2020-06-18', 1, '0', NULL, NULL, NULL),
(100, '2020-06-18 14:40:08', '2020-06-18', 1, '0', NULL, NULL, NULL),
(101, '2020-06-18 15:49:18', '2020-06-18', 1, '0', NULL, NULL, NULL),
(102, '2020-06-18 15:56:09', '2020-06-18', 1, '0', NULL, NULL, NULL),
(103, '2020-06-18 15:57:29', '2020-06-18', 1, '0', NULL, NULL, NULL),
(104, '2020-06-18 16:00:11', '2020-06-18', 1, '0', NULL, NULL, NULL),
(105, '2020-06-18 16:03:06', '2020-06-18', 1, '0', NULL, NULL, NULL),
(106, '2020-06-18 16:36:20', '2020-06-18', 1, '0', NULL, NULL, NULL),
(107, '2020-06-18 16:37:01', '2020-06-18', 1, '0', NULL, NULL, NULL),
(108, '2020-06-18 16:38:28', '2020-06-18', 1, '0', NULL, NULL, NULL),
(109, '2020-06-19 08:36:45', '2020-06-19', 1, '0', NULL, NULL, NULL),
(110, '2020-06-19 08:50:08', '2020-06-19', 1, '0', NULL, NULL, NULL),
(111, '2020-06-19 08:53:00', '2020-06-19', 1, '0', NULL, NULL, NULL),
(112, '2020-06-19 08:54:11', '2020-06-19', 1, '0', NULL, NULL, NULL),
(113, '2020-06-19 09:04:12', '2020-06-19', 1, '0', NULL, NULL, NULL),
(114, '2020-06-19 09:15:28', '2020-06-19', 1, '0', NULL, NULL, NULL),
(115, '2020-06-19 09:24:02', '2020-06-19', 1, '0', NULL, NULL, NULL),
(116, '2020-06-25 12:10:34', '2020-06-25', 1, '0', NULL, NULL, NULL),
(117, '2020-06-25 12:11:19', '2020-06-25', 1, '0', NULL, NULL, NULL),
(118, '2020-06-25 12:15:36', '2020-06-25', 1, '0', NULL, NULL, NULL),
(119, '2020-06-25 12:25:36', '2020-06-25', 1, '0', NULL, NULL, NULL),
(120, '2021-02-19 15:07:34', '2021-02-19', 1, '0', NULL, NULL, NULL),
(121, '2021-04-14 11:20:20', '2021-04-14', 1, '0', NULL, NULL, NULL),
(122, '2021-04-14 12:15:25', '2021-04-14', 1, '0', NULL, NULL, NULL),
(123, '2021-04-21 11:33:22', '2021-04-21', 1, '0', NULL, NULL, NULL),
(124, '2021-04-21 11:36:24', '2021-04-21', 1, '0', NULL, NULL, NULL),
(125, '2021-04-21 14:24:08', '2021-04-21', 1, '0', NULL, NULL, NULL),
(126, '2021-04-21 14:28:48', '2021-04-21', 1, '0', NULL, NULL, NULL),
(127, '2021-04-21 14:33:01', '2021-04-21', 1, '0', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `reclamation`
--

CREATE TABLE `reclamation` (
  `id_reclamation` int(11) NOT NULL,
  `date_reclamation` date NOT NULL,
  `idclient` int(11) DEFAULT NULL,
  `client` varchar(250) NOT NULL,
  `num_declar` varchar(50) NOT NULL,
  `objet_reclamation` varchar(250) NOT NULL,
  `id_user` int(11) NOT NULL,
  `type_utilisateur` varchar(25) NOT NULL,
  `tpy_reclam` varchar(250) NOT NULL,
  `modifie_le` datetime DEFAULT NULL,
  `supprime_le` datetime DEFAULT NULL,
  `commit_par` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `reclamation`
--

INSERT INTO `reclamation` (`id_reclamation`, `date_reclamation`, `idclient`, `client`, `num_declar`, `objet_reclamation`, `id_user`, `type_utilisateur`, `tpy_reclam`, `modifie_le`, `supprime_le`, `commit_par`) VALUES
(14, '2021-04-20', NULL, 'test', 'E00003006', 'test', 1, 'test', 'test', NULL, NULL, NULL),
(15, '2021-04-20', NULL, 'Syntyty', 'E00003006', '5', 1, 'Expéditeur', '1', NULL, NULL, NULL),
(16, '2021-04-21', NULL, 'Synthythy', 'E00003006', '2', 1, 'Expéditeur', '1', NULL, NULL, NULL),
(17, '2021-04-21', NULL, 'Synthythy', 'E00003006', '2', 1, 'Expéditeur', '1', NULL, NULL, NULL),
(18, '2021-04-21', NULL, 'Synthythy', 'E00003006', '2', 1, 'Expéditeur', '1', NULL, NULL, NULL),
(19, '2021-04-21', NULL, 'Synthythy', 'E00003006', '2', 1, 'Expéditeur', '1', NULL, NULL, NULL),
(20, '2021-04-21', NULL, 'Synthythy', 'E00003006', '2', 1, 'Expéditeur', '1', NULL, NULL, NULL),
(21, '2021-04-21', NULL, 'Synthy', 'E00003006', '2', 1, 'Expéditeur', '1', NULL, NULL, NULL),
(22, '2021-04-21', NULL, '', 'E00003006', '8', 1, 'Expéditeur', '2', NULL, NULL, NULL),
(23, '2021-04-21', NULL, '', 'E00003006', '2', 1, 'Expéditeur', '1', NULL, NULL, NULL),
(24, '2021-04-21', NULL, 'Synthy', 'E00003006', '2', 1, 'Déstinataire', '1', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Stand-in structure for view `vdeclaration`
-- (See below for the actual view)
--
CREATE TABLE `vdeclaration` (
`numero` varchar(50)
,`date` date
,`facture_id` int(16)
,`colis` int(11)
,`poids` decimal(16,2)
,`palettes` int(11)
,`paletteA` int(11)
,`paletteB` int(11)
,`paletteC` int(11)
,`paletteAutre` int(11)
,`Nbre_palettes` int(11)
,`longueur` decimal(8,2)
,`hauteur` decimal(8,2)
,`largeur` decimal(8,2)
,`coef` decimal(8,2)
,`valeur` decimal(24,2)
,`client1_id` int(11)
,`client2_id` int(11)
,`livraison` char(1)
,`express` char(1)
,`port` char(1)
,`courrier_typ` char(2)
,`courrier_eta` char(1)
,`date_saisie` datetime
,`userid` int(18)
,`nature` varchar(50)
,`Espece` decimal(16,2)
,`Cheque` decimal(16,2)
,`Traite` decimal(16,2)
,`BL` text
,`id_adres` int(11)
,`statut` varchar(250)
,`commentaire` varchar(250)
,`CLIENT_ID` int(11)
,`NOM` varchar(250)
,`PRENOM` varchar(250)
,`CLIENT_COD` varchar(32)
,`CLIENT_ID_client_lve` int(11)
,`telephone` varchar(250)
,`ville` varchar(64)
,`Adresse` varchar(250)
);

-- --------------------------------------------------------

--
-- Table structure for table `ville`
--

CREATE TABLE `ville` (
  `VILLE_COD` int(11) NOT NULL,
  `AGENCE_COD` varchar(4) DEFAULT NULL,
  `VILLE_LIB` varchar(64) NOT NULL,
  `VILLE_TYP` char(2) DEFAULT NULL,
  `DELAI` int(11) DEFAULT NULL,
  `ZONE_COD` char(4) DEFAULT NULL,
  `modifie_le` datetime DEFAULT NULL,
  `supprime_le` datetime DEFAULT NULL,
  `commit_par` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ville`
--

INSERT INTO `ville` (`VILLE_COD`, `AGENCE_COD`, `VILLE_LIB`, `VILLE_TYP`, `DELAI`, `ZONE_COD`, `modifie_le`, `supprime_le`, `commit_par`) VALUES
(100, '100', 'CASABLANCA', '1', 1, 'A', NULL, NULL, NULL),
(101, '100', 'BOUSKOURA', '1', 1, 'B', NULL, NULL, NULL),
(102, '100', 'MOHAMMEDIA', '1', 1, 'A', NULL, NULL, NULL),
(103, '100', 'AIN HARROUDA', '1', 1, 'B', NULL, NULL, NULL),
(104, '100', 'HAD SOUALEM', '1', 1, 'B', NULL, NULL, NULL),
(105, '100', 'NOUASSER', '1', 1, 'B', NULL, NULL, NULL),
(106, '100', 'Lissasfa IAM', '1', 1, 'B', NULL, NULL, NULL),
(107, '600', 'BOUZNIKA', '1', 1, 'B', NULL, NULL, NULL),
(109, '100', 'MOHAMMADIA BIS', '2', 1, 'B', NULL, NULL, NULL),
(110, '110', 'EL JADIDA', '1', 1, 'A', NULL, NULL, NULL),
(111, '110', 'AZEMMOUR', '1', 1, 'B', NULL, NULL, NULL),
(112, '110', 'BIR JDID', '1', 1, 'B', NULL, NULL, NULL),
(120, '120', 'SAFI', '1', 1, 'A', NULL, NULL, NULL),
(121, '110', 'SIDI BENNOUR', '1', 10, 'C', NULL, NULL, NULL),
(122, '120', 'SIDI SMAIL', '1', 2, 'C', NULL, NULL, NULL),
(123, '110', 'KHEMISS ZEMAMRA', '1', 2, 'C', NULL, NULL, NULL),
(124, '120', 'YOUSSOUFIA', '1', 3, 'C', NULL, NULL, NULL),
(125, '120', 'JEMAA SHAIM', '1', 2, 'C', NULL, NULL, NULL),
(126, '120', 'CHEMAIA', '1', 2, 'C', NULL, NULL, NULL),
(127, '120', 'TNINE LAGHYAT', '2', 3, 'C', NULL, NULL, NULL),
(128, '110', 'OUALIDIA', '1', 3, 'C', NULL, NULL, NULL),
(129, '120', 'SEBT GZOULA', '1', 2, 'C', NULL, NULL, NULL),
(150, '100', 'AIN SEBAA', '1', 1, 'B', NULL, NULL, NULL),
(151, '100', 'Logiprod', '1', 1, 'C', NULL, NULL, NULL),
(152, '600', 'Ain Atiq', '2', 1, 'C', NULL, NULL, NULL),
(200, '200', 'TANGER', '1', 1, 'A', NULL, NULL, NULL),
(210, '210', 'TETOUAN', '1', 1, 'A', NULL, NULL, NULL),
(211, '220', 'CHEFCHAOUEN', '1', 3, 'C', NULL, NULL, NULL),
(212, '210', 'FNIDEQ', '1', 1, 'B', NULL, NULL, NULL),
(213, '220', 'CHAOUEN', '1', 3, 'C', NULL, NULL, NULL),
(214, '210', 'HAD BENI RZINE', '2', 2, 'C', NULL, NULL, NULL),
(215, '210', 'BAB BERRED', '1', 5, 'C', NULL, NULL, NULL),
(216, '220', 'OUAZZANE', '1', 3, 'C', NULL, NULL, NULL),
(217, '210', 'Ain Derrij', '2', 10, 'C', NULL, NULL, NULL),
(218, '210', 'MARTIL', '1', 1, 'B', NULL, NULL, NULL),
(219, '210', 'MEDIAQ', '1', 1, 'B', NULL, NULL, NULL),
(220, '220', 'LARACHE', '1', 3, 'A', NULL, NULL, NULL),
(221, '220', 'LAOUAMRA', '1', 5, 'B', NULL, NULL, NULL),
(222, '220', 'ASILAH', '1', 15, 'B', NULL, NULL, NULL),
(223, '220', 'KSAR EL KEBIR', '1', 5, 'B', NULL, NULL, NULL),
(224, '200', 'DEPOT TANGER', '1', 1, 'C', NULL, NULL, NULL),
(230, '200', 'TANGER MED', '1', 1, 'C', NULL, NULL, NULL),
(300, '300', 'AGADIR', '1', 1, 'A', NULL, NULL, NULL),
(301, '300', 'AOURIR', '1', 3, 'C', NULL, NULL, NULL),
(302, '300', 'BOUIZAKARNE', '1', 7, 'C', NULL, NULL, NULL),
(303, NULL, 'BOUJDOUR', '1', 30, 'C', NULL, NULL, NULL),
(304, NULL, 'DAKHLA', '1', 30, 'C', NULL, NULL, NULL),
(305, '350', 'GUELMIM', '1', 15, 'C', NULL, NULL, NULL),
(306, '300', 'IMINTANOUTE', '1', 3, 'C', NULL, NULL, NULL),
(307, '300', 'BEN SERGAO', '1', 3, 'B', NULL, NULL, NULL),
(308, '300', 'SMARA', '1', 30, 'C', NULL, NULL, NULL),
(309, '350', 'TANTAN', '1', 15, 'C', NULL, NULL, NULL),
(310, NULL, 'TARFAYA', '1', 15, 'C', NULL, NULL, NULL),
(311, '300', 'TATA', '2', 30, 'C', NULL, NULL, NULL),
(312, '300', 'ANZA', '1', 1, 'C', NULL, NULL, NULL),
(320, '350', 'OULED BERHIL', '2', 3, 'C', NULL, NULL, NULL),
(321, '350', 'IGHREM', '2', 5, 'C', NULL, NULL, NULL),
(322, '350', 'MASSA', '1', 5, 'C', NULL, NULL, NULL),
(323, '350', 'KHEMIS AIT AMIRA', '1', 5, 'C', NULL, NULL, NULL),
(324, '350', 'KLEAA', '1', 5, 'C', NULL, NULL, NULL),
(325, '350', 'AZROU SUD', '1', 5, 'C', NULL, NULL, NULL),
(326, '350', 'TIKIOUINE', '1', 1, 'B', NULL, NULL, NULL),
(327, '350', 'SMIMOU', '1', 5, 'C', NULL, NULL, NULL),
(328, '350', 'TAMANAR', '1', 5, 'C', NULL, NULL, NULL),
(329, '350', 'TIZNIT', '1', 3, 'C', NULL, NULL, NULL),
(350, '350', 'AIT MELLOUL', '1', 1, 'A', NULL, NULL, NULL),
(351, '350', 'INZEGANE', '1', 1, 'A', NULL, NULL, NULL),
(352, '350', 'OULED TEIMA', '1', 2, 'B', NULL, NULL, NULL),
(353, '350', 'TAROUDANTE', '1', 2, 'B', NULL, NULL, NULL),
(354, '350', 'SIDI IFNI', '1', 15, 'C', NULL, NULL, NULL),
(355, '350', 'TALIOUINE', '1', 5, 'C', NULL, NULL, NULL),
(356, '350', 'DCHEIRA', '1', 3, 'B', NULL, NULL, NULL),
(357, '350', 'BIOUGRA', '1', 3, 'B', NULL, NULL, NULL),
(370, '350', 'LAAYOUNE', '1', 15, 'A', NULL, NULL, NULL),
(371, NULL, 'ESSMARA', '2', 30, 'C', NULL, NULL, NULL),
(372, '350', 'AIT BAHA', '1', 5, 'C', NULL, NULL, NULL),
(373, '350', 'AIT MILK', '2', 5, 'C', NULL, NULL, NULL),
(400, '400', 'OUJDA', '1', 1, 'A', NULL, NULL, NULL),
(401, '400', 'AHFIR', '1', 1, 'C', NULL, NULL, NULL),
(402, '400', 'BOUARFA', '1', 15, 'C', NULL, NULL, NULL),
(403, '400', 'FIGUIG', '2', 15, 'C', NULL, NULL, NULL),
(404, '400', 'JERADA', '1', 15, 'C', NULL, NULL, NULL),
(405, '400', 'LAYOUN', '1', 3, 'C', NULL, NULL, NULL),
(406, '430', 'TAOURIRT', '1', 5, 'C', NULL, NULL, NULL),
(407, '400', 'SAIDIA', '1', 2, 'B', NULL, NULL, NULL),
(408, '400', 'EL AIOUN', '1', 3, 'C', NULL, NULL, NULL),
(410, '410', 'NADOR', '1', 1, 'A', NULL, NULL, NULL),
(411, '410', 'ZAIO', '1', 2, 'B', NULL, NULL, NULL),
(412, '410', 'DRIOUCH', '1', 2, 'C', NULL, NULL, NULL),
(413, '410', 'BENI NSAR', '1', 2, 'C', NULL, NULL, NULL),
(414, '410', 'EL HOCEIMA', '1', 7, 'C', NULL, NULL, NULL),
(415, '410', 'IMZOUREN', '1', 7, 'C', NULL, NULL, NULL),
(416, '410', 'MONT AROUI', '1', 5, 'C', NULL, NULL, NULL),
(417, '410', 'BENI HDIFA', '1', 7, 'C', NULL, NULL, NULL),
(418, '410', 'Ain Zaura', '2', 7, 'C', NULL, NULL, NULL),
(419, '410', 'AIT MILK', '2', 7, 'C', NULL, NULL, NULL),
(420, '400', 'BERKANE', '1', 1, 'B', NULL, NULL, NULL),
(421, '410', 'MIDAR', '1', 7, 'C', NULL, NULL, NULL),
(422, '410', 'ZGHENGHEN', '1', 7, 'C', NULL, NULL, NULL),
(423, '410', 'SELOUANE', '1', 7, 'C', NULL, NULL, NULL),
(424, '410', 'BEN TAYEB', '1', 7, 'C', NULL, NULL, NULL),
(425, '410', 'KARIAT AREKMAN', '1', 5, 'C', NULL, NULL, NULL),
(430, '430', 'TAZA', '1', 1, 'A', NULL, NULL, NULL),
(431, '430', 'GUERCIF', '1', 1, 'B', NULL, NULL, NULL),
(432, '430', 'OUED AMLIL', '1', 1, 'C', NULL, NULL, NULL),
(433, '430', 'TAHLA', '1', 3, 'C', NULL, NULL, NULL),
(434, '430', 'KETAMA', '1', 7, 'C', NULL, NULL, NULL),
(435, '430', 'BENI BOUAYACH', '1', 7, 'C', NULL, NULL, NULL),
(436, '410', 'TARGUIST', '1', 5, 'C', NULL, NULL, NULL),
(437, '430', 'GHAFSAI', '1', 1, 'C', NULL, NULL, NULL),
(500, '500', 'FES', '1', 1, 'A', NULL, NULL, NULL),
(501, '500', 'AIN TAOUJTATE', '1', 2, 'C', NULL, NULL, NULL),
(502, '500', 'ARFOUD', '1', 7, 'C', NULL, NULL, NULL),
(503, '500', 'BOULMANE', '1', 5, 'C', NULL, NULL, NULL),
(504, '500', 'ERRACHIDIA', '1', 7, 'C', NULL, NULL, NULL),
(505, '500', 'GUOULMIMA', '2', 7, 'C', NULL, NULL, NULL),
(506, '500', 'IFRANE', '1', 5, 'B', NULL, NULL, NULL),
(507, '500', 'IMMOUZER', '1', 3, 'C', NULL, NULL, NULL),
(508, '800', 'KHENIFRA', '1', 5, 'C', NULL, NULL, NULL),
(509, '500', 'MIDELT', '1', 7, 'C', NULL, NULL, NULL),
(510, '500', 'SEFROU', '1', 5, 'B', NULL, NULL, NULL),
(511, '500', 'TAOUNATE', '1', 15, 'C', NULL, NULL, NULL),
(512, '500', 'TISSA', '2', 15, 'C', NULL, NULL, NULL),
(513, '500', 'AOUFOUS', '2', 15, 'C', NULL, NULL, NULL),
(514, '500', 'MISSOUR', '2', 15, 'C', NULL, NULL, NULL),
(515, '500', 'KARIAT BA MHAMED', '1', 15, 'C', NULL, NULL, NULL),
(516, '500', 'RIBAT EL KHEIR', '1', 15, 'C', NULL, NULL, NULL),
(517, '500', 'OUTAT EL HAJ', '2', 15, 'C', NULL, NULL, NULL),
(550, '550', 'MEKNES', '1', 1, 'A', NULL, NULL, NULL),
(551, '500', 'AZROU', '1', 5, 'C', NULL, NULL, NULL),
(552, '550', 'KHEMISSET', '1', 3, 'B', NULL, NULL, NULL),
(553, '500', 'LABHALIL', '1', 3, 'C', NULL, NULL, NULL),
(554, '500', 'ITZER', '1', 15, 'C', NULL, NULL, NULL),
(555, '500', 'BOUMIA', '1', 15, 'C', NULL, NULL, NULL),
(556, '550', 'MRIRT', '1', 7, 'C', NULL, NULL, NULL),
(557, '550', 'BOUFEKRANE', '1', 3, 'C', NULL, NULL, NULL),
(558, '550', 'OUISLANE', '1', 2, 'C', NULL, NULL, NULL),
(559, '550', 'ROMMANI', '1', 5, 'C', NULL, NULL, NULL),
(560, '550', 'OULMES', '1', 5, 'C', NULL, NULL, NULL),
(561, '550', 'ZAIDA', '1', 5, 'C', NULL, NULL, NULL),
(562, '550', 'Station Shell OumRrbii', '1', 3, 'C', NULL, NULL, NULL),
(600, '600', 'RABAT', '1', 1, 'A', NULL, NULL, NULL),
(601, '600', 'SALE', '1', 1, 'A', NULL, NULL, NULL),
(602, '600', 'SIDI ALLAL BAHRAOUI', '1', 2, 'C', NULL, NULL, NULL),
(603, '650', 'SIDI KACEM', '1', 3, 'C', NULL, NULL, NULL),
(604, '650', 'SIDI SLIMANE', '1', 3, 'B', NULL, NULL, NULL),
(605, '650', 'SIDI YAHIA GHARB', '1', 3, 'B', NULL, NULL, NULL),
(606, '220', 'SOUK LARBAA', '1', 3, 'B', NULL, NULL, NULL),
(607, '600', 'TEMARA', '1', 1, 'A', NULL, NULL, NULL),
(608, '550', 'TIFELT', '1', 3, 'B', NULL, NULL, NULL),
(609, '600', 'SKHIRAT', '1', 1, 'B', NULL, NULL, NULL),
(610, '100', 'BEN SLIMANE', '1', 2, 'C', NULL, NULL, NULL),
(611, '650', 'BELKSIRI', '1', 3, 'C', NULL, NULL, NULL),
(612, '650', 'LALLA MAYMOUNA', '1', 3, 'C', NULL, NULL, NULL),
(614, '650', 'SIDI YAHYA ZAER', '1', 3, 'C', NULL, NULL, NULL),
(615, '650', 'ARBAOUA', '1', 3, 'C', NULL, NULL, NULL),
(616, '650', 'HAD KOURT', '1', 3, 'C', NULL, NULL, NULL),
(617, '650', 'MECHRAA BEL KSIRI', '1', 3, 'C', NULL, NULL, NULL),
(618, '650', 'SOUK TLET GHARB', '1', 3, 'C', NULL, NULL, NULL),
(619, '600', 'AIN ATIQ', '1', 1, 'B', NULL, NULL, NULL),
(620, '650', 'JORF EL MELHA', '1', 3, 'C', NULL, NULL, NULL),
(621, '600', 'Rabat Centre', '2', 1, 'B', NULL, NULL, NULL),
(622, '600', 'Rabat océan', '2', 1, 'B', NULL, NULL, NULL),
(650, '650', 'KENITRA', '1', 1, 'A', NULL, NULL, NULL),
(651, '650', 'DAR EL GUEDDARI', '1', 3, 'C', NULL, NULL, NULL),
(652, '650', 'El Mudzine', '1', 3, 'C', NULL, NULL, NULL),
(653, '650', 'KSIBIA', '1', 3, 'C', NULL, NULL, NULL),
(660, NULL, 'AL GHARB', '1', 3, 'C', NULL, NULL, NULL),
(700, '700', 'MARRAKECH', '1', 1, 'A', NULL, NULL, NULL),
(701, '700', 'BEN GUERIR', '1', 3, 'C', NULL, NULL, NULL),
(702, '700', 'KELAAT SRAGHNA', '1', 5, 'C', NULL, NULL, NULL),
(703, '700', 'CHICHAOUA', '1', 5, 'C', NULL, NULL, NULL),
(704, '120', 'ESSAOUIRA', '1', 7, 'C', NULL, NULL, NULL),
(705, '700', 'OUARZAZATE', '1', 7, 'C', NULL, NULL, NULL),
(706, '700', 'TINGHIR', '1', 7, 'C', NULL, NULL, NULL),
(707, '700', 'KELAAT MEGOUNA', '1', 7, 'C', NULL, NULL, NULL),
(708, '700', 'ZAGOURA', '1', 15, 'C', NULL, NULL, NULL),
(709, '700', 'AGDZ', '1', 10, 'C', NULL, NULL, NULL),
(710, '700', 'AIT OURIR', '1', 7, 'C', NULL, NULL, NULL),
(711, '700', 'ATTAOUIA', '1', 5, 'C', NULL, NULL, NULL),
(712, '700', 'BOUMALNE DADES', '1', 7, 'C', NULL, NULL, NULL),
(713, '700', 'RISSANI', '1', 15, 'C', NULL, NULL, NULL),
(715, '700', 'TINJDAD', '1', 15, 'C', NULL, NULL, NULL),
(716, '700', 'OURIKA', '1', 5, 'C', NULL, NULL, NULL),
(717, '500', 'RICH', '1', 15, 'C', NULL, NULL, NULL),
(718, '700', 'DEMNATE', '1', 7, 'C', NULL, NULL, NULL),
(719, '700', 'AMZMIZ', '1', 7, 'C', NULL, NULL, NULL),
(800, '800', 'BENI MELLAL', '1', 1, 'A', NULL, NULL, NULL),
(801, '100', 'BEJAAD', '1', 3, 'C', NULL, NULL, NULL),
(802, '100', 'BEN HMAD', '1', 2, 'B', NULL, NULL, NULL),
(803, '100', 'BERRECHID', '1', 1, 'A', NULL, NULL, NULL),
(804, '100', 'FKIH BEN SALEH', '1', 2, 'B', NULL, NULL, NULL),
(805, '800', 'KASBAT TADLA', '1', 2, 'B', NULL, NULL, NULL),
(806, '100', 'KHOURIBGA', '1', 1, 'B', NULL, NULL, NULL),
(807, '800', 'OUED ZEM', '1', 2, 'B', NULL, NULL, NULL),
(808, '100', 'SETTAT', '1', 1, 'A', NULL, NULL, NULL),
(809, '800', 'SOUK SEBT', '1', 2, 'B', NULL, NULL, NULL),
(810, '800', 'AZILAL', '1', 5, 'C', NULL, NULL, NULL),
(811, '100', 'EL GARA', '1', 2, 'C', NULL, NULL, NULL),
(812, '550', 'EL HAJEB', '1', 3, 'C', NULL, NULL, NULL),
(813, '800', 'TAMELLALTE', '1', 5, 'C', NULL, NULL, NULL),
(814, '800', 'OULED AYAD', '1', 5, 'C', NULL, NULL, NULL),
(815, NULL, 'KHMISS OULAD AYAD', '1', 5, 'C', NULL, NULL, NULL),
(816, NULL, 'BOUJNIBA', '1', 3, 'C', NULL, NULL, NULL),
(817, '800', 'DEPOT BENI MELLAL', '1', 1, 'B', NULL, NULL, NULL),
(818, NULL, 'SEBT NEMMA', '1', 3, 'C', NULL, NULL, NULL),
(819, NULL, 'AFOURAR', '1', 3, 'C', NULL, NULL, NULL),
(820, NULL, 'ZAOUIYAT CHEIKH', '1', 5, 'C', NULL, NULL, NULL),
(822, NULL, 'OULED ZIDOUH', '1', 5, 'C', NULL, NULL, NULL),
(823, NULL, 'OULED LAMRAH', '1', 5, 'C', NULL, NULL, NULL),
(824, '800', 'OULAD ZMAM', '1', 5, 'C', NULL, NULL, NULL),
(825, NULL, 'OULAD MBAREK', '1', 5, 'C', NULL, NULL, NULL),
(826, NULL, 'KSSIBA', '1', 5, 'C', NULL, NULL, NULL),
(827, NULL, 'OUAOUIZERTH', '1', 5, 'C', NULL, NULL, NULL),
(828, '800', 'OULED ZMAM', '2', 3, 'C', NULL, NULL, NULL),
(829, NULL, 'TIGHSSALINE', '1', 5, 'C', NULL, NULL, NULL),
(830, NULL, 'AIT ISHAQ', '1', 5, 'C', NULL, NULL, NULL),
(831, '100', 'LAKHYAYTA', '1', 1, 'C', NULL, NULL, NULL),
(832, '800', 'TLAT OULAD', '1', 2, 'C', NULL, NULL, NULL),
(833, NULL, 'GUISSER', '1', 3, 'C', NULL, NULL, NULL),
(834, '100', 'TIT MELLIL', '1', 1, 'C', NULL, NULL, NULL),
(905, '100', 'DERB GHALEF', '1', 5, 'C', NULL, NULL, NULL),
(906, NULL, 'Tafilalt', '1', 1, 'A', NULL, NULL, NULL),
(907, NULL, 'Tafraout', '1', 1, 'C', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Stand-in structure for view `vimpression`
-- (See below for the actual view)
--
CREATE TABLE `vimpression` (
`NomEx` varchar(250)
,`AdresseEx` text
,`VilleEx` varchar(250)
,`TelEx` varchar(250)
,`NomDest` varchar(250)
,`TelDest` varchar(250)
,`villeDest` int(11)
,`AdresseDest` varchar(250)
,`numero` varchar(50)
,`date` date
,`facture_id` int(16)
,`colis` int(11)
,`poids` decimal(16,2)
,`palettes` int(11)
,`paletteA` int(11)
,`paletteB` int(11)
,`paletteC` int(11)
,`paletteAutre` int(11)
,`Nbre_palettes` int(11)
,`longueur` decimal(8,2)
,`hauteur` decimal(8,2)
,`largeur` decimal(8,2)
,`coef` decimal(8,2)
,`valeur` decimal(24,2)
,`client1_id` int(11)
,`client2_id` int(11)
,`livraison` char(1)
,`express` char(1)
,`port` char(1)
,`courrier_typ` char(2)
,`courrier_eta` char(1)
,`date_saisie` datetime
,`userid` int(18)
,`nature` varchar(50)
,`Espece` decimal(16,2)
,`Cheque` decimal(16,2)
,`Traite` decimal(16,2)
,`Nbre_BL` int(11)
,`BL` text
,`id_adres` int(11)
,`statut` varchar(250)
,`commentaire` varchar(250)
);

-- --------------------------------------------------------

--
-- Structure for view `clientsnombres`
--
DROP TABLE IF EXISTS `clientsnombres`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `clientsnombres`  AS SELECT `cllve`.`CLIENT_ID` AS `CLIENT_ID`, `cllve`.`NOM` AS `NOM`, (select count(0) from `declaration_v` `de` where `cllve`.`CLIENT_ID` = `de`.`client1_id`) AS `total_declars`, (select count(0) from `client` `cl` where `cllve`.`CLIENT_ID` = `cl`.`CLIENT_ID_client_lve`) AS `total_sous_clients`, (select count(0) from `client_lve_session` `clses` where `cllve`.`CLIENT_ID` = `clses`.`REFERENCIEE`) AS `total_session` FROM `client_lve` AS `cllve` ;

-- --------------------------------------------------------

--
-- Structure for view `impcarnet`
--
DROP TABLE IF EXISTS `impcarnet`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `impcarnet`  AS SELECT DISTINCT `vimpression`.`NomEx` AS `NomEx`, `vimpression`.`AdresseEx` AS `AdresseEx`, `vimpression`.`VilleEx` AS `VilleEx`, `vimpression`.`TelEx` AS `TelEx`, `vimpression`.`NomDest` AS `NomDest`, `vimpression`.`TelDest` AS `TelDest`, `vimpression`.`villeDest` AS `villeDest`, `vimpression`.`AdresseDest` AS `AdresseDest`, `vimpression`.`numero` AS `numero`, `vimpression`.`date` AS `date`, `vimpression`.`facture_id` AS `facture_id`, `vimpression`.`colis` AS `colis`, `vimpression`.`poids` AS `poids`, `vimpression`.`palettes` AS `palettes`, `vimpression`.`paletteA` AS `paletteA`, `vimpression`.`paletteB` AS `paletteB`, `vimpression`.`paletteC` AS `paletteC`, `vimpression`.`paletteAutre` AS `paletteAutre`, `vimpression`.`Nbre_palettes` AS `Nbre_palettes`, `vimpression`.`longueur` AS `longueur`, `vimpression`.`hauteur` AS `hauteur`, `vimpression`.`largeur` AS `largeur`, `vimpression`.`coef` AS `coef`, `vimpression`.`valeur` AS `valeur`, `vimpression`.`client1_id` AS `client1_id`, `vimpression`.`client2_id` AS `client2_id`, `vimpression`.`livraison` AS `livraison`, `vimpression`.`express` AS `express`, `vimpression`.`port` AS `port`, `vimpression`.`courrier_typ` AS `courrier_typ`, `vimpression`.`courrier_eta` AS `courrier_eta`, `vimpression`.`date_saisie` AS `date_saisie`, `vimpression`.`userid` AS `userid`, `vimpression`.`nature` AS `nature`, `vimpression`.`Espece` AS `Espece`, `vimpression`.`Cheque` AS `Cheque`, `vimpression`.`Traite` AS `Traite`, `vimpression`.`Nbre_BL` AS `Nbre_BL`, `vimpression`.`BL` AS `BL`, `vimpression`.`id_adres` AS `id_adres`, `vimpression`.`statut` AS `statut`, `vimpression`.`commentaire` AS `commentaire`, `panierramasse`.`numeroCarnet` AS `numeroCarnet`, `panierramasse`.`declaration` AS `declaration`, `panierramasse`.`etat` AS `etat`, `panierramasse`.`date_modification` AS `date_modification` FROM (`vimpression` join `panierramasse`) WHERE `vimpression`.`numero` = `panierramasse`.`declaration` ;

-- --------------------------------------------------------

--
-- Structure for view `vdeclaration`
--
DROP TABLE IF EXISTS `vdeclaration`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vdeclaration`  AS SELECT `declaration_v`.`numero` AS `numero`, `declaration_v`.`date` AS `date`, `declaration_v`.`facture_id` AS `facture_id`, `declaration_v`.`colis` AS `colis`, `declaration_v`.`poids` AS `poids`, `declaration_v`.`palettes` AS `palettes`, `declaration_v`.`paletteA` AS `paletteA`, `declaration_v`.`paletteB` AS `paletteB`, `declaration_v`.`paletteC` AS `paletteC`, `declaration_v`.`paletteAutre` AS `paletteAutre`, `declaration_v`.`Nbre_palettes` AS `Nbre_palettes`, `declaration_v`.`longueur` AS `longueur`, `declaration_v`.`hauteur` AS `hauteur`, `declaration_v`.`largeur` AS `largeur`, `declaration_v`.`coef` AS `coef`, `declaration_v`.`valeur` AS `valeur`, `declaration_v`.`client1_id` AS `client1_id`, `declaration_v`.`client2_id` AS `client2_id`, `declaration_v`.`livraison` AS `livraison`, `declaration_v`.`express` AS `express`, `declaration_v`.`port` AS `port`, `declaration_v`.`courrier_typ` AS `courrier_typ`, `declaration_v`.`courrier_eta` AS `courrier_eta`, `declaration_v`.`date_saisie` AS `date_saisie`, `declaration_v`.`userid` AS `userid`, `declaration_v`.`nature` AS `nature`, `declaration_v`.`Espece` AS `Espece`, `declaration_v`.`Cheque` AS `Cheque`, `declaration_v`.`Traite` AS `Traite`, `declaration_v`.`BL` AS `BL`, `declaration_v`.`id_adres` AS `id_adres`, `declaration_v`.`statut` AS `statut`, `declaration_v`.`commentaire` AS `commentaire`, `client`.`CLIENT_ID` AS `CLIENT_ID`, `client`.`NOM` AS `NOM`, `client`.`PRENOM` AS `PRENOM`, `client`.`CLIENT_COD` AS `CLIENT_COD`, `client`.`CLIENT_ID_client_lve` AS `CLIENT_ID_client_lve`, `client`.`telephone` AS `telephone`, `ville`.`VILLE_LIB` AS `ville`, `adresses`.`lib_adresse` AS `Adresse` FROM (((`declaration_v` join `client`) join `ville`) join `adresses`) WHERE `declaration_v`.`client1_id` = `client`.`CLIENT_ID_client_lve` AND `ville`.`VILLE_COD` = `adresses`.`id_ville` AND `declaration_v`.`client2_id` = `client`.`CLIENT_ID` AND `adresses`.`id_client` in (select `declaration_v`.`client2_id` from (`declaration_v` join `client`) where `declaration_v`.`client2_id` = `client`.`CLIENT_ID`) AND `adresses`.`id_adresse` = `declaration_v`.`id_adres` ;

-- --------------------------------------------------------

--
-- Structure for view `vimpression`
--
DROP TABLE IF EXISTS `vimpression`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vimpression`  AS SELECT DISTINCT `client_lve`.`NOM` AS `NomEx`, `client_lve`.`adresse` AS `AdresseEx`, `client_lve`.`ville` AS `VilleEx`, `client_lve`.`telephone` AS `TelEx`, `client`.`NOM` AS `NomDest`, `client`.`telephone` AS `TelDest`, `adresses`.`id_ville` AS `villeDest`, `adresses`.`lib_adresse` AS `AdresseDest`, `declaration_v`.`numero` AS `numero`, `declaration_v`.`date` AS `date`, `declaration_v`.`facture_id` AS `facture_id`, `declaration_v`.`colis` AS `colis`, `declaration_v`.`poids` AS `poids`, `declaration_v`.`palettes` AS `palettes`, `declaration_v`.`paletteA` AS `paletteA`, `declaration_v`.`paletteB` AS `paletteB`, `declaration_v`.`paletteC` AS `paletteC`, `declaration_v`.`paletteAutre` AS `paletteAutre`, `declaration_v`.`Nbre_palettes` AS `Nbre_palettes`, `declaration_v`.`longueur` AS `longueur`, `declaration_v`.`hauteur` AS `hauteur`, `declaration_v`.`largeur` AS `largeur`, `declaration_v`.`coef` AS `coef`, `declaration_v`.`valeur` AS `valeur`, `declaration_v`.`client1_id` AS `client1_id`, `declaration_v`.`client2_id` AS `client2_id`, `declaration_v`.`livraison` AS `livraison`, `declaration_v`.`express` AS `express`, `declaration_v`.`port` AS `port`, `declaration_v`.`courrier_typ` AS `courrier_typ`, `declaration_v`.`courrier_eta` AS `courrier_eta`, `declaration_v`.`date_saisie` AS `date_saisie`, `declaration_v`.`userid` AS `userid`, `declaration_v`.`nature` AS `nature`, `declaration_v`.`Espece` AS `Espece`, `declaration_v`.`Cheque` AS `Cheque`, `declaration_v`.`Traite` AS `Traite`, `declaration_v`.`Nbre_BL` AS `Nbre_BL`, `declaration_v`.`BL` AS `BL`, `declaration_v`.`id_adres` AS `id_adres`, `declaration_v`.`statut` AS `statut`, `declaration_v`.`commentaire` AS `commentaire` FROM ((((`adresses` join `client`) join `client_lve`) join `ville`) join `declaration_v`) WHERE `declaration_v`.`client1_id` = `client`.`CLIENT_ID_client_lve` AND `declaration_v`.`client2_id` = `client`.`CLIENT_ID` AND `ville`.`VILLE_COD` = `adresses`.`id_ville` AND `declaration_v`.`id_adres` = `adresses`.`id_adresse` AND `client`.`CLIENT_ID_client_lve` = `client_lve`.`CLIENT_ID` ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `adresses`
--
ALTER TABLE `adresses`
  ADD PRIMARY KEY (`id_adresse`,`id_client`),
  ADD KEY `Fk_client` (`id_client`),
  ADD KEY `Fk_client_lve` (`id_user`),
  ADD KEY `fk_ville` (`id_ville`);

--
-- Indexes for table `agence`
--
ALTER TABLE `agence`
  ADD PRIMARY KEY (`AGENCE_COD`);

--
-- Indexes for table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`CLIENT_ID`),
  ADD UNIQUE KEY `CLIENT_COD` (`CLIENT_COD`),
  ADD KEY `fkclirntlive` (`CLIENT_ID_client_lve`);

--
-- Indexes for table `client_lve`
--
ALTER TABLE `client_lve`
  ADD PRIMARY KEY (`CLIENT_ID`);

--
-- Indexes for table `client_lve_session`
--
ALTER TABLE `client_lve_session`
  ADD PRIMARY KEY (`AGENCE_COD`) USING BTREE,
  ADD KEY `fk_ag_ref` (`REFERENCIEE`);

--
-- Indexes for table `connexion`
--
ALTER TABLE `connexion`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `declaration_v`
--
ALTER TABLE `declaration_v`
  ADD PRIMARY KEY (`numero`),
  ADD KEY `FKher_client_lve` (`client1_id`),
  ADD KEY `FKher_client` (`client2_id`),
  ADD KEY `fkadresse` (`id_adres`);

--
-- Indexes for table `panierramasse`
--
ALTER TABLE `panierramasse`
  ADD PRIMARY KEY (`declaration`,`numeroCarnet`),
  ADD KEY `Fk_num_caar` (`numeroCarnet`);

--
-- Indexes for table `points_relais`
--
ALTER TABLE `points_relais`
  ADD PRIMARY KEY (`id_pr`),
  ADD KEY `fk_v_pr` (`id_ville`);

--
-- Indexes for table `ramasse`
--
ALTER TABLE `ramasse`
  ADD PRIMARY KEY (`numeroCarnet`);

--
-- Indexes for table `reclamation`
--
ALTER TABLE `reclamation`
  ADD PRIMARY KEY (`id_reclamation`),
  ADD KEY `fk_num_user` (`id_user`),
  ADD KEY `fk_declarations` (`num_declar`),
  ADD KEY `FK_ID_C` (`idclient`);

--
-- Indexes for table `ville`
--
ALTER TABLE `ville`
  ADD PRIMARY KEY (`VILLE_COD`),
  ADD KEY `fk_agences` (`AGENCE_COD`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `adresses`
--
ALTER TABLE `adresses`
  MODIFY `id_adresse` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=188;

--
-- AUTO_INCREMENT for table `client`
--
ALTER TABLE `client`
  MODIFY `CLIENT_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=128;

--
-- AUTO_INCREMENT for table `client_lve`
--
ALTER TABLE `client_lve`
  MODIFY `CLIENT_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `connexion`
--
ALTER TABLE `connexion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=121;

--
-- AUTO_INCREMENT for table `points_relais`
--
ALTER TABLE `points_relais`
  MODIFY `id_pr` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `ramasse`
--
ALTER TABLE `ramasse`
  MODIFY `numeroCarnet` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=128;

--
-- AUTO_INCREMENT for table `reclamation`
--
ALTER TABLE `reclamation`
  MODIFY `id_reclamation` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `adresses`
--
ALTER TABLE `adresses`
  ADD CONSTRAINT `Fk_client` FOREIGN KEY (`id_client`) REFERENCES `client` (`CLIENT_ID`),
  ADD CONSTRAINT `Fk_client_lve` FOREIGN KEY (`id_user`) REFERENCES `client_lve` (`CLIENT_ID`),
  ADD CONSTRAINT `fk_ville` FOREIGN KEY (`id_ville`) REFERENCES `ville` (`VILLE_COD`);

--
-- Constraints for table `client`
--
ALTER TABLE `client`
  ADD CONSTRAINT `fkclirntlive` FOREIGN KEY (`CLIENT_ID_client_lve`) REFERENCES `client_lve` (`CLIENT_ID`);

--
-- Constraints for table `client_lve_session`
--
ALTER TABLE `client_lve_session`
  ADD CONSTRAINT `fk_ag_ref` FOREIGN KEY (`REFERENCIEE`) REFERENCES `client_lve` (`CLIENT_ID`);

--
-- Constraints for table `declaration_v`
--
ALTER TABLE `declaration_v`
  ADD CONSTRAINT `FKher_client` FOREIGN KEY (`client2_id`) REFERENCES `client` (`CLIENT_ID`),
  ADD CONSTRAINT `FKher_client_lve` FOREIGN KEY (`client1_id`) REFERENCES `client_lve` (`CLIENT_ID`),
  ADD CONSTRAINT `fkadresse` FOREIGN KEY (`id_adres`) REFERENCES `adresses` (`id_adresse`);

--
-- Constraints for table `panierramasse`
--
ALTER TABLE `panierramasse`
  ADD CONSTRAINT `Fk_num_caar` FOREIGN KEY (`numeroCarnet`) REFERENCES `ramasse` (`numeroCarnet`),
  ADD CONSTRAINT `Fk_num_deec` FOREIGN KEY (`declaration`) REFERENCES `declaration_v` (`numero`);

--
-- Constraints for table `points_relais`
--
ALTER TABLE `points_relais`
  ADD CONSTRAINT `fk_v_pr` FOREIGN KEY (`id_ville`) REFERENCES `ville` (`VILLE_COD`);

--
-- Constraints for table `reclamation`
--
ALTER TABLE `reclamation`
  ADD CONSTRAINT `FK_ID_C` FOREIGN KEY (`idclient`) REFERENCES `client` (`CLIENT_ID`),
  ADD CONSTRAINT `fk_declarations` FOREIGN KEY (`num_declar`) REFERENCES `declaration_v` (`numero`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_num_user` FOREIGN KEY (`id_user`) REFERENCES `client_lve` (`CLIENT_ID`);

--
-- Constraints for table `ville`
--
ALTER TABLE `ville`
  ADD CONSTRAINT `fk_agences` FOREIGN KEY (`AGENCE_COD`) REFERENCES `agence` (`AGENCE_COD`);
--
-- Database: `taxation_test`
--
CREATE DATABASE IF NOT EXISTS `taxation_test` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `taxation_test`;

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `adminname` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `mailadmin` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `adminname`, `password`, `mailadmin`) VALUES
(1, 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'admin@lve.supp.com');

-- --------------------------------------------------------

--
-- Table structure for table `adresses`
--

CREATE TABLE `adresses` (
  `id_adresse` int(11) NOT NULL,
  `lib_adresse` varchar(250) NOT NULL,
  `id_client` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_ville` int(11) NOT NULL,
  `modifie_le` datetime DEFAULT NULL,
  `supprime_le` datetime DEFAULT NULL,
  `commit_par` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `agence`
--

CREATE TABLE `agence` (
  `AGENCE_COD` varchar(4) NOT NULL,
  `AGENCE_LIB` varchar(250) NOT NULL,
  `AGENCE_ADRESSE` varchar(250) NOT NULL,
  `AGENCE_TEL` varchar(20) NOT NULL,
  `modifie_le` datetime DEFAULT NULL,
  `supprime_le` datetime DEFAULT NULL,
  `commit_par` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `agence`
--

INSERT INTO `agence` (`AGENCE_COD`, `AGENCE_LIB`, `AGENCE_ADRESSE`, `AGENCE_TEL`, `modifie_le`, `supprime_le`, `commit_par`) VALUES
('100', 'Casablanca', '19, rue abou bakr ibnou koutia, oukacha , ain sebaa', '0522344316', NULL, NULL, NULL),
('110', 'El jadida', '19, lot ennassim, rue essafa', '0523390304', NULL, NULL, NULL),
('120', 'Safi', '56 route de l aviation kodiat si hamza', '0524462226', NULL, NULL, NULL),
('200', 'Tanger', '103 alle n 3 zone industrielle mghougha', '0539352455 /56', NULL, NULL, NULL),
('210', 'Tetouan', 'nahj el baraka el kheniores en face college ibn sina', '0539713155', NULL, NULL, NULL),
('220', 'Larache', 'Avenue du Caire N 116', '0539914122', NULL, NULL, NULL),
('300', 'Agadir', '17 rue rue titou, quartiert el quods', '0528223822', NULL, NULL, NULL),
('350', 'Ait Melloul', '18, lot guicharde, avenue med VI', '0528246824', NULL, NULL, NULL),
('400', 'Oujda', '13 angle rass foughal et abdellah ben yassine', '0536705196', NULL, NULL, NULL),
('410', 'Nador', 'bd niama n 79, quartier ouled mimoun', '0536603160', NULL, NULL, NULL),
('430', 'Taza', '272, bloc 2 adarissa', '0535285078', NULL, NULL, NULL),
('500', 'FES', 'Qt sidi brahim rue 806', '0535658103', NULL, NULL, NULL),
('550', 'Meknes', '201 avenue des far ville nouvelle', '0535511141', NULL, NULL, NULL),
('600', 'Rabat', '77 rue london, l\'ocean', '0537262597', NULL, NULL, NULL),
('650', 'Kenitra', '10 rue ibnou al banna, ville nouvelle', '0537379821', NULL, NULL, NULL),
('700', 'Marrakech', '514 quartier industriel sidi ghanem', '0524336174', NULL, NULL, NULL),
('800', 'Beni Mellal', '8JPR+MJ Beni Mellal', '0523483928', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `client`
--

CREATE TABLE `client` (
  `CLIENT_ID` int(11) NOT NULL,
  `NOM` varchar(250) NOT NULL,
  `PRENOM` varchar(250) DEFAULT NULL,
  `CIVILITE_COD` char(2) DEFAULT NULL,
  `CLIENT_TYP` char(2) DEFAULT NULL,
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
  `CLIENT_COD` varchar(32) DEFAULT NULL,
  `commentaire` varchar(80) DEFAULT NULL,
  `mail` varchar(50) DEFAULT NULL,
  `ICE` varchar(50) DEFAULT NULL,
  `CLIENT_ID_client_lve` int(11) NOT NULL,
  `telephone` varchar(250) DEFAULT NULL,
  `modifie_le` datetime DEFAULT NULL,
  `supprime_le` datetime DEFAULT NULL,
  `commit_par` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Stand-in structure for view `clientsnombres`
-- (See below for the actual view)
--
CREATE TABLE `clientsnombres` (
`CLIENT_ID` int(11)
,`NOM` varchar(250)
,`total_declars` bigint(21)
,`total_sous_clients` bigint(21)
,`total_session` bigint(21)
);

-- --------------------------------------------------------

--
-- Table structure for table `client_lve`
--

CREATE TABLE `client_lve` (
  `CLIENT_ID` int(11) NOT NULL,
  `CLIENT_COD` char(8) NOT NULL,
  `NOM` varchar(250) NOT NULL,
  `PRENOM` varchar(250) DEFAULT NULL,
  `CIVILITE_COD` char(2) NOT NULL,
  `CLIENT_TYP` char(3) NOT NULL,
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
  `mot_de_passe` varchar(250) DEFAULT '7c222fb2927d828af22f592134e8932480637c0d',
  `modifie_le` datetime DEFAULT NULL,
  `supprime_le` datetime DEFAULT NULL,
  `commit_par` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `client_lve_session`
--

CREATE TABLE `client_lve_session` (
  `AGENCE_COD` varchar(50) NOT NULL,
  `AGENCE_LIB` varchar(100) NOT NULL,
  `REFERENCIEE` int(11) NOT NULL,
  `LOGIN` varchar(50) NOT NULL,
  `MOT_D_PASS` varchar(50) NOT NULL,
  `IDENTITE_TYP` char(2) NOT NULL,
  `modifie_le` datetime DEFAULT NULL,
  `supprime_le` datetime DEFAULT NULL,
  `commit_par` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `connexion`
--

CREATE TABLE `connexion` (
  `id` int(11) NOT NULL,
  `id_utilisateur` int(11) NOT NULL,
  `date_connexion` timestamp NULL DEFAULT current_timestamp(),
  `date_deconnexion` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `declaration_v`
--

CREATE TABLE `declaration_v` (
  `numero` varchar(50) NOT NULL,
  `date` date NOT NULL,
  `facture_id` int(16) DEFAULT NULL,
  `colis` int(11) NOT NULL,
  `poids` decimal(16,2) DEFAULT NULL,
  `palettes` int(11) DEFAULT NULL,
  `paletteA` int(11) NOT NULL,
  `paletteB` int(11) NOT NULL,
  `paletteC` int(11) NOT NULL,
  `paletteAutre` int(11) NOT NULL,
  `Nbre_palettes` int(11) NOT NULL,
  `longueur` decimal(8,2) DEFAULT NULL,
  `hauteur` decimal(8,2) DEFAULT NULL,
  `largeur` decimal(8,2) DEFAULT NULL,
  `coef` decimal(8,2) DEFAULT NULL,
  `valeur` decimal(24,2) DEFAULT NULL,
  `client1_id` int(11) NOT NULL,
  `client2_id` int(11) NOT NULL,
  `livraison` char(1) DEFAULT NULL,
  `express` char(1) DEFAULT NULL,
  `port` char(1) DEFAULT NULL,
  `courrier_typ` char(2) DEFAULT NULL,
  `courrier_eta` char(1) DEFAULT 'S',
  `date_saisie` datetime DEFAULT current_timestamp(),
  `userid` int(18) DEFAULT NULL,
  `nature` varchar(50) DEFAULT NULL,
  `Espece` decimal(16,2) DEFAULT NULL,
  `Cheque` decimal(16,2) DEFAULT NULL,
  `Traite` decimal(16,2) DEFAULT NULL,
  `Nbre_BL` int(11) NOT NULL,
  `BL` text DEFAULT NULL,
  `id_adres` int(11) NOT NULL,
  `statut` varchar(250) NOT NULL,
  `commentaire` varchar(250) NOT NULL,
  `modifie_le` datetime DEFAULT NULL,
  `supprime_le` datetime DEFAULT NULL,
  `commit_par` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Stand-in structure for view `impcarnet`
-- (See below for the actual view)
--
CREATE TABLE `impcarnet` (
`NomEx` varchar(250)
,`AdresseEx` text
,`VilleEx` varchar(250)
,`TelEx` varchar(250)
,`NomDest` varchar(250)
,`TelDest` varchar(250)
,`villeDest` int(11)
,`AdresseDest` varchar(250)
,`numero` varchar(50)
,`date` date
,`facture_id` int(16)
,`colis` int(11)
,`poids` decimal(16,2)
,`palettes` int(11)
,`paletteA` int(11)
,`paletteB` int(11)
,`paletteC` int(11)
,`paletteAutre` int(11)
,`Nbre_palettes` int(11)
,`longueur` decimal(8,2)
,`hauteur` decimal(8,2)
,`largeur` decimal(8,2)
,`coef` decimal(8,2)
,`valeur` decimal(24,2)
,`client1_id` int(11)
,`client2_id` int(11)
,`livraison` char(1)
,`express` char(1)
,`port` char(1)
,`courrier_typ` char(2)
,`courrier_eta` char(1)
,`date_saisie` datetime
,`userid` int(18)
,`nature` varchar(50)
,`Espece` decimal(16,2)
,`Cheque` decimal(16,2)
,`Traite` decimal(16,2)
,`Nbre_BL` int(11)
,`BL` text
,`id_adres` int(11)
,`statut` varchar(250)
,`commentaire` varchar(250)
,`numeroCarnet` int(11)
,`declaration` varchar(50)
,`etat` varchar(50)
,`date_modification` datetime
);

-- --------------------------------------------------------

--
-- Table structure for table `panierramasse`
--

CREATE TABLE `panierramasse` (
  `numeroCarnet` int(11) NOT NULL,
  `declaration` varchar(50) NOT NULL,
  `etat` varchar(50) NOT NULL DEFAULT 'En cours',
  `motif_annulation` varchar(250) NOT NULL,
  `date_modification` datetime NOT NULL,
  `supprime_le` datetime DEFAULT NULL,
  `commit_par` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `points_relais`
--

CREATE TABLE `points_relais` (
  `id_pr` int(11) NOT NULL,
  `lib_pr` varchar(250) NOT NULL,
  `id_ville` int(11) NOT NULL,
  `loc_ver` varchar(50) NOT NULL,
  `loc_hor` varchar(50) NOT NULL,
  `modifie_le` datetime DEFAULT NULL,
  `supprime_le` datetime DEFAULT NULL,
  `commit_par` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `ramasse`
--

CREATE TABLE `ramasse` (
  `numeroCarnet` int(11) NOT NULL,
  `datedesaisie` datetime NOT NULL DEFAULT current_timestamp(),
  `dateramassage` date NOT NULL,
  `user_id` int(11) NOT NULL,
  `code_ramassage` varchar(50) NOT NULL,
  `modifie_le` datetime DEFAULT NULL,
  `supprime_le` datetime DEFAULT NULL,
  `commit_par` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `reclamation`
--

CREATE TABLE `reclamation` (
  `id_reclamation` int(11) NOT NULL,
  `date_reclamation` date NOT NULL,
  `idclient` int(11) DEFAULT NULL,
  `client` varchar(250) NOT NULL,
  `num_declar` varchar(50) NOT NULL,
  `objet_reclamation` varchar(250) NOT NULL,
  `id_user` int(11) NOT NULL,
  `type_utilisateur` varchar(25) NOT NULL,
  `tpy_reclam` varchar(250) NOT NULL,
  `modifie_le` datetime DEFAULT NULL,
  `supprime_le` datetime DEFAULT NULL,
  `commit_par` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `ville`
--

CREATE TABLE `ville` (
  `VILLE_COD` int(11) NOT NULL,
  `AGENCE_COD` varchar(4) DEFAULT NULL,
  `VILLE_LIB` varchar(64) NOT NULL,
  `VILLE_TYP` char(2) DEFAULT NULL,
  `DELAI` int(11) DEFAULT NULL,
  `ZONE_COD` char(4) DEFAULT NULL,
  `modifie_le` datetime DEFAULT NULL,
  `supprime_le` datetime DEFAULT NULL,
  `commit_par` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ville`
--

INSERT INTO `ville` (`VILLE_COD`, `AGENCE_COD`, `VILLE_LIB`, `VILLE_TYP`, `DELAI`, `ZONE_COD`, `modifie_le`, `supprime_le`, `commit_par`) VALUES
(100, '100', 'CASABLANCA', '1', 1, 'A', NULL, NULL, NULL),
(101, '100', 'BOUSKOURA', '1', 1, 'B', NULL, NULL, NULL),
(102, '100', 'MOHAMMEDIA', '1', 1, 'A', NULL, NULL, NULL),
(103, '100', 'AIN HARROUDA', '1', 1, 'B', NULL, NULL, NULL),
(104, '100', 'HAD SOUALEM', '1', 1, 'B', NULL, NULL, NULL),
(105, '100', 'NOUASSER', '1', 1, 'B', NULL, NULL, NULL),
(106, '100', 'Lissasfa IAM', '1', 1, 'B', NULL, NULL, NULL),
(107, '600', 'BOUZNIKA', '1', 1, 'B', NULL, NULL, NULL),
(109, '100', 'MOHAMMADIA BIS', '2', 1, 'B', NULL, NULL, NULL),
(110, '110', 'EL JADIDA', '1', 1, 'A', NULL, NULL, NULL),
(111, '110', 'AZEMMOUR', '1', 1, 'B', NULL, NULL, NULL),
(112, '110', 'BIR JDID', '1', 1, 'B', NULL, NULL, NULL),
(120, '120', 'SAFI', '1', 1, 'A', NULL, NULL, NULL),
(121, '110', 'SIDI BENNOUR', '1', 10, 'C', NULL, NULL, NULL),
(122, '120', 'SIDI SMAIL', '1', 2, 'C', NULL, NULL, NULL),
(123, '110', 'KHEMISS ZEMAMRA', '1', 2, 'C', NULL, NULL, NULL),
(124, '120', 'YOUSSOUFIA', '1', 3, 'C', NULL, NULL, NULL),
(125, '120', 'JEMAA SHAIM', '1', 2, 'C', NULL, NULL, NULL),
(126, '120', 'CHEMAIA', '1', 2, 'C', NULL, NULL, NULL),
(127, '120', 'TNINE LAGHYAT', '2', 3, 'C', NULL, NULL, NULL),
(128, '110', 'OUALIDIA', '1', 3, 'C', NULL, NULL, NULL),
(129, '120', 'SEBT GZOULA', '1', 2, 'C', NULL, NULL, NULL),
(150, '100', 'AIN SEBAA', '1', 1, 'B', NULL, NULL, NULL),
(151, '100', 'Logiprod', '1', 1, 'C', NULL, NULL, NULL),
(152, '600', 'Ain Atiq', '2', 1, 'C', NULL, NULL, NULL),
(200, '200', 'TANGER', '1', 1, 'A', NULL, NULL, NULL),
(210, '210', 'TETOUAN', '1', 1, 'A', NULL, NULL, NULL),
(211, '220', 'CHEFCHAOUEN', '1', 3, 'C', NULL, NULL, NULL),
(212, '210', 'FNIDEQ', '1', 1, 'B', NULL, NULL, NULL),
(213, '220', 'CHAOUEN', '1', 3, 'C', NULL, NULL, NULL),
(214, '210', 'HAD BENI RZINE', '2', 2, 'C', NULL, NULL, NULL),
(215, '210', 'BAB BERRED', '1', 5, 'C', NULL, NULL, NULL),
(216, '220', 'OUAZZANE', '1', 3, 'C', NULL, NULL, NULL),
(217, '210', 'Ain Derrij', '2', 10, 'C', NULL, NULL, NULL),
(218, '210', 'MARTIL', '1', 1, 'B', NULL, NULL, NULL),
(219, '210', 'MEDIAQ', '1', 1, 'B', NULL, NULL, NULL),
(220, '220', 'LARACHE', '1', 3, 'A', NULL, NULL, NULL),
(221, '220', 'LAOUAMRA', '1', 5, 'B', NULL, NULL, NULL),
(222, '220', 'ASILAH', '1', 15, 'B', NULL, NULL, NULL),
(223, '220', 'KSAR EL KEBIR', '1', 5, 'B', NULL, NULL, NULL),
(224, '200', 'DEPOT TANGER', '1', 1, 'C', NULL, NULL, NULL),
(230, '200', 'TANGER MED', '1', 1, 'C', NULL, NULL, NULL),
(300, '300', 'AGADIR', '1', 1, 'A', NULL, NULL, NULL),
(301, '300', 'AOURIR', '1', 3, 'C', NULL, NULL, NULL),
(302, '300', 'BOUIZAKARNE', '1', 7, 'C', NULL, NULL, NULL),
(303, NULL, 'BOUJDOUR', '1', 30, 'C', NULL, NULL, NULL),
(304, NULL, 'DAKHLA', '1', 30, 'C', NULL, NULL, NULL),
(305, '350', 'GUELMIM', '1', 15, 'C', NULL, NULL, NULL),
(306, '300', 'IMINTANOUTE', '1', 3, 'C', NULL, NULL, NULL),
(307, '300', 'BEN SERGAO', '1', 3, 'B', NULL, NULL, NULL),
(308, '300', 'SMARA', '1', 30, 'C', NULL, NULL, NULL),
(309, '350', 'TANTAN', '1', 15, 'C', NULL, NULL, NULL),
(310, NULL, 'TARFAYA', '1', 15, 'C', NULL, NULL, NULL),
(311, '300', 'TATA', '2', 30, 'C', NULL, NULL, NULL),
(312, '300', 'ANZA', '1', 1, 'C', NULL, NULL, NULL),
(320, '350', 'OULED BERHIL', '2', 3, 'C', NULL, NULL, NULL),
(321, '350', 'IGHREM', '2', 5, 'C', NULL, NULL, NULL),
(322, '350', 'MASSA', '1', 5, 'C', NULL, NULL, NULL),
(323, '350', 'KHEMIS AIT AMIRA', '1', 5, 'C', NULL, NULL, NULL),
(324, '350', 'KLEAA', '1', 5, 'C', NULL, NULL, NULL),
(325, '350', 'AZROU SUD', '1', 5, 'C', NULL, NULL, NULL),
(326, '350', 'TIKIOUINE', '1', 1, 'B', NULL, NULL, NULL),
(327, '350', 'SMIMOU', '1', 5, 'C', NULL, NULL, NULL),
(328, '350', 'TAMANAR', '1', 5, 'C', NULL, NULL, NULL),
(329, '350', 'TIZNIT', '1', 3, 'C', NULL, NULL, NULL),
(350, '350', 'AIT MELLOUL', '1', 1, 'A', NULL, NULL, NULL),
(351, '350', 'INZEGANE', '1', 1, 'A', NULL, NULL, NULL),
(352, '350', 'OULED TEIMA', '1', 2, 'B', NULL, NULL, NULL),
(353, '350', 'TAROUDANTE', '1', 2, 'B', NULL, NULL, NULL),
(354, '350', 'SIDI IFNI', '1', 15, 'C', NULL, NULL, NULL),
(355, '350', 'TALIOUINE', '1', 5, 'C', NULL, NULL, NULL),
(356, '350', 'DCHEIRA', '1', 3, 'B', NULL, NULL, NULL),
(357, '350', 'BIOUGRA', '1', 3, 'B', NULL, NULL, NULL),
(370, '350', 'LAAYOUNE', '1', 15, 'A', NULL, NULL, NULL),
(371, NULL, 'ESSMARA', '2', 30, 'C', NULL, NULL, NULL),
(372, '350', 'AIT BAHA', '1', 5, 'C', NULL, NULL, NULL),
(373, '350', 'AIT MILK', '2', 5, 'C', NULL, NULL, NULL),
(400, '400', 'OUJDA', '1', 1, 'A', NULL, NULL, NULL),
(401, '400', 'AHFIR', '1', 1, 'C', NULL, NULL, NULL),
(402, '400', 'BOUARFA', '1', 15, 'C', NULL, NULL, NULL),
(403, '400', 'FIGUIG', '2', 15, 'C', NULL, NULL, NULL),
(404, '400', 'JERADA', '1', 15, 'C', NULL, NULL, NULL),
(405, '400', 'LAYOUN', '1', 3, 'C', NULL, NULL, NULL),
(406, '430', 'TAOURIRT', '1', 5, 'C', NULL, NULL, NULL),
(407, '400', 'SAIDIA', '1', 2, 'B', NULL, NULL, NULL),
(408, '400', 'EL AIOUN', '1', 3, 'C', NULL, NULL, NULL),
(410, '410', 'NADOR', '1', 1, 'A', NULL, NULL, NULL),
(411, '410', 'ZAIO', '1', 2, 'B', NULL, NULL, NULL),
(412, '410', 'DRIOUCH', '1', 2, 'C', NULL, NULL, NULL),
(413, '410', 'BENI NSAR', '1', 2, 'C', NULL, NULL, NULL),
(414, '410', 'EL HOCEIMA', '1', 7, 'C', NULL, NULL, NULL),
(415, '410', 'IMZOUREN', '1', 7, 'C', NULL, NULL, NULL),
(416, '410', 'MONT AROUI', '1', 5, 'C', NULL, NULL, NULL),
(417, '410', 'BENI HDIFA', '1', 7, 'C', NULL, NULL, NULL),
(418, '410', 'Ain Zaura', '2', 7, 'C', NULL, NULL, NULL),
(419, '410', 'AIT MILK', '2', 7, 'C', NULL, NULL, NULL),
(420, '400', 'BERKANE', '1', 1, 'B', NULL, NULL, NULL),
(421, '410', 'MIDAR', '1', 7, 'C', NULL, NULL, NULL),
(422, '410', 'ZGHENGHEN', '1', 7, 'C', NULL, NULL, NULL),
(423, '410', 'SELOUANE', '1', 7, 'C', NULL, NULL, NULL),
(424, '410', 'BEN TAYEB', '1', 7, 'C', NULL, NULL, NULL),
(425, '410', 'KARIAT AREKMAN', '1', 5, 'C', NULL, NULL, NULL),
(430, '430', 'TAZA', '1', 1, 'A', NULL, NULL, NULL),
(431, '430', 'GUERCIF', '1', 1, 'B', NULL, NULL, NULL),
(432, '430', 'OUED AMLIL', '1', 1, 'C', NULL, NULL, NULL),
(433, '430', 'TAHLA', '1', 3, 'C', NULL, NULL, NULL),
(434, '430', 'KETAMA', '1', 7, 'C', NULL, NULL, NULL),
(435, '430', 'BENI BOUAYACH', '1', 7, 'C', NULL, NULL, NULL),
(436, '410', 'TARGUIST', '1', 5, 'C', NULL, NULL, NULL),
(437, '430', 'GHAFSAI', '1', 1, 'C', NULL, NULL, NULL),
(500, '500', 'FES', '1', 1, 'A', NULL, NULL, NULL),
(501, '500', 'AIN TAOUJTATE', '1', 2, 'C', NULL, NULL, NULL),
(502, '500', 'ARFOUD', '1', 7, 'C', NULL, NULL, NULL),
(503, '500', 'BOULMANE', '1', 5, 'C', NULL, NULL, NULL),
(504, '500', 'ERRACHIDIA', '1', 7, 'C', NULL, NULL, NULL),
(505, '500', 'GUOULMIMA', '2', 7, 'C', NULL, NULL, NULL),
(506, '500', 'IFRANE', '1', 5, 'B', NULL, NULL, NULL),
(507, '500', 'IMMOUZER', '1', 3, 'C', NULL, NULL, NULL),
(508, '800', 'KHENIFRA', '1', 5, 'C', NULL, NULL, NULL),
(509, '500', 'MIDELT', '1', 7, 'C', NULL, NULL, NULL),
(510, '500', 'SEFROU', '1', 5, 'B', NULL, NULL, NULL),
(511, '500', 'TAOUNATE', '1', 15, 'C', NULL, NULL, NULL),
(512, '500', 'TISSA', '2', 15, 'C', NULL, NULL, NULL),
(513, '500', 'AOUFOUS', '2', 15, 'C', NULL, NULL, NULL),
(514, '500', 'MISSOUR', '2', 15, 'C', NULL, NULL, NULL),
(515, '500', 'KARIAT BA MHAMED', '1', 15, 'C', NULL, NULL, NULL),
(516, '500', 'RIBAT EL KHEIR', '1', 15, 'C', NULL, NULL, NULL),
(517, '500', 'OUTAT EL HAJ', '2', 15, 'C', NULL, NULL, NULL),
(550, '550', 'MEKNES', '1', 1, 'A', NULL, NULL, NULL),
(551, '500', 'AZROU', '1', 5, 'C', NULL, NULL, NULL),
(552, '550', 'KHEMISSET', '1', 3, 'B', NULL, NULL, NULL),
(553, '500', 'LABHALIL', '1', 3, 'C', NULL, NULL, NULL),
(554, '500', 'ITZER', '1', 15, 'C', NULL, NULL, NULL),
(555, '500', 'BOUMIA', '1', 15, 'C', NULL, NULL, NULL),
(556, '550', 'MRIRT', '1', 7, 'C', NULL, NULL, NULL),
(557, '550', 'BOUFEKRANE', '1', 3, 'C', NULL, NULL, NULL),
(558, '550', 'OUISLANE', '1', 2, 'C', NULL, NULL, NULL),
(559, '550', 'ROMMANI', '1', 5, 'C', NULL, NULL, NULL),
(560, '550', 'OULMES', '1', 5, 'C', NULL, NULL, NULL),
(561, '550', 'ZAIDA', '1', 5, 'C', NULL, NULL, NULL),
(562, '550', 'Station Shell OumRrbii', '1', 3, 'C', NULL, NULL, NULL),
(600, '600', 'RABAT', '1', 1, 'A', NULL, NULL, NULL),
(601, '600', 'SALE', '1', 1, 'A', NULL, NULL, NULL),
(602, '600', 'SIDI ALLAL BAHRAOUI', '1', 2, 'C', NULL, NULL, NULL),
(603, '650', 'SIDI KACEM', '1', 3, 'C', NULL, NULL, NULL),
(604, '650', 'SIDI SLIMANE', '1', 3, 'B', NULL, NULL, NULL),
(605, '650', 'SIDI YAHIA GHARB', '1', 3, 'B', NULL, NULL, NULL),
(606, '220', 'SOUK LARBAA', '1', 3, 'B', NULL, NULL, NULL),
(607, '600', 'TEMARA', '1', 1, 'A', NULL, NULL, NULL),
(608, '550', 'TIFELT', '1', 3, 'B', NULL, NULL, NULL),
(609, '600', 'SKHIRAT', '1', 1, 'B', NULL, NULL, NULL),
(610, '100', 'BEN SLIMANE', '1', 2, 'C', NULL, NULL, NULL),
(611, '650', 'BELKSIRI', '1', 3, 'C', NULL, NULL, NULL),
(612, '650', 'LALLA MAYMOUNA', '1', 3, 'C', NULL, NULL, NULL),
(614, '650', 'SIDI YAHYA ZAER', '1', 3, 'C', NULL, NULL, NULL),
(615, '650', 'ARBAOUA', '1', 3, 'C', NULL, NULL, NULL),
(616, '650', 'HAD KOURT', '1', 3, 'C', NULL, NULL, NULL),
(617, '650', 'MECHRAA BEL KSIRI', '1', 3, 'C', NULL, NULL, NULL),
(618, '650', 'SOUK TLET GHARB', '1', 3, 'C', NULL, NULL, NULL),
(619, '600', 'AIN ATIQ', '1', 1, 'B', NULL, NULL, NULL),
(620, '650', 'JORF EL MELHA', '1', 3, 'C', NULL, NULL, NULL),
(621, '600', 'Rabat Centre', '2', 1, 'B', NULL, NULL, NULL),
(622, '600', 'Rabat océan', '2', 1, 'B', NULL, NULL, NULL),
(650, '650', 'KENITRA', '1', 1, 'A', NULL, NULL, NULL),
(651, '650', 'DAR EL GUEDDARI', '1', 3, 'C', NULL, NULL, NULL),
(652, '650', 'El Mudzine', '1', 3, 'C', NULL, NULL, NULL),
(653, '650', 'KSIBIA', '1', 3, 'C', NULL, NULL, NULL),
(660, NULL, 'AL GHARB', '1', 3, 'C', NULL, NULL, NULL),
(700, '700', 'MARRAKECH', '1', 1, 'A', NULL, NULL, NULL),
(701, '700', 'BEN GUERIR', '1', 3, 'C', NULL, NULL, NULL),
(702, '700', 'KELAAT SRAGHNA', '1', 5, 'C', NULL, NULL, NULL),
(703, '700', 'CHICHAOUA', '1', 5, 'C', NULL, NULL, NULL),
(704, '120', 'ESSAOUIRA', '1', 7, 'C', NULL, NULL, NULL),
(705, '700', 'OUARZAZATE', '1', 7, 'C', NULL, NULL, NULL),
(706, '700', 'TINGHIR', '1', 7, 'C', NULL, NULL, NULL),
(707, '700', 'KELAAT MEGOUNA', '1', 7, 'C', NULL, NULL, NULL),
(708, '700', 'ZAGOURA', '1', 15, 'C', NULL, NULL, NULL),
(709, '700', 'AGDZ', '1', 10, 'C', NULL, NULL, NULL),
(710, '700', 'AIT OURIR', '1', 7, 'C', NULL, NULL, NULL),
(711, '700', 'ATTAOUIA', '1', 5, 'C', NULL, NULL, NULL),
(712, '700', 'BOUMALNE DADES', '1', 7, 'C', NULL, NULL, NULL),
(713, '700', 'RISSANI', '1', 15, 'C', NULL, NULL, NULL),
(715, '700', 'TINJDAD', '1', 15, 'C', NULL, NULL, NULL),
(716, '700', 'OURIKA', '1', 5, 'C', NULL, NULL, NULL),
(717, '500', 'RICH', '1', 15, 'C', NULL, NULL, NULL),
(718, '700', 'DEMNATE', '1', 7, 'C', NULL, NULL, NULL),
(719, '700', 'AMZMIZ', '1', 7, 'C', NULL, NULL, NULL),
(800, '800', 'BENI MELLAL', '1', 1, 'A', NULL, NULL, NULL),
(801, '100', 'BEJAAD', '1', 3, 'C', NULL, NULL, NULL),
(802, '100', 'BEN HMAD', '1', 2, 'B', NULL, NULL, NULL),
(803, '100', 'BERRECHID', '1', 1, 'A', NULL, NULL, NULL),
(804, '100', 'FKIH BEN SALEH', '1', 2, 'B', NULL, NULL, NULL),
(805, '800', 'KASBAT TADLA', '1', 2, 'B', NULL, NULL, NULL),
(806, '100', 'KHOURIBGA', '1', 1, 'B', NULL, NULL, NULL),
(807, '800', 'OUED ZEM', '1', 2, 'B', NULL, NULL, NULL),
(808, '100', 'SETTAT', '1', 1, 'A', NULL, NULL, NULL),
(809, '800', 'SOUK SEBT', '1', 2, 'B', NULL, NULL, NULL),
(810, '800', 'AZILAL', '1', 5, 'C', NULL, NULL, NULL),
(811, '100', 'EL GARA', '1', 2, 'C', NULL, NULL, NULL),
(812, '550', 'EL HAJEB', '1', 3, 'C', NULL, NULL, NULL),
(813, '800', 'TAMELLALTE', '1', 5, 'C', NULL, NULL, NULL),
(814, '800', 'OULED AYAD', '1', 5, 'C', NULL, NULL, NULL),
(815, NULL, 'KHMISS OULAD AYAD', '1', 5, 'C', NULL, NULL, NULL),
(816, NULL, 'BOUJNIBA', '1', 3, 'C', NULL, NULL, NULL),
(817, '800', 'DEPOT BENI MELLAL', '1', 1, 'B', NULL, NULL, NULL),
(818, NULL, 'SEBT NEMMA', '1', 3, 'C', NULL, NULL, NULL),
(819, NULL, 'AFOURAR', '1', 3, 'C', NULL, NULL, NULL),
(820, NULL, 'ZAOUIYAT CHEIKH', '1', 5, 'C', NULL, NULL, NULL),
(822, NULL, 'OULED ZIDOUH', '1', 5, 'C', NULL, NULL, NULL),
(823, NULL, 'OULED LAMRAH', '1', 5, 'C', NULL, NULL, NULL),
(824, '800', 'OULAD ZMAM', '1', 5, 'C', NULL, NULL, NULL),
(825, NULL, 'OULAD MBAREK', '1', 5, 'C', NULL, NULL, NULL),
(826, NULL, 'KSSIBA', '1', 5, 'C', NULL, NULL, NULL),
(827, NULL, 'OUAOUIZERTH', '1', 5, 'C', NULL, NULL, NULL),
(828, '800', 'OULED ZMAM', '2', 3, 'C', NULL, NULL, NULL),
(829, NULL, 'TIGHSSALINE', '1', 5, 'C', NULL, NULL, NULL),
(830, NULL, 'AIT ISHAQ', '1', 5, 'C', NULL, NULL, NULL),
(831, '100', 'LAKHYAYTA', '1', 1, 'C', NULL, NULL, NULL),
(832, '800', 'TLAT OULAD', '1', 2, 'C', NULL, NULL, NULL),
(833, NULL, 'GUISSER', '1', 3, 'C', NULL, NULL, NULL),
(834, '100', 'TIT MELLIL', '1', 1, 'C', NULL, NULL, NULL),
(905, '100', 'DERB GHALEF', '1', 5, 'C', NULL, NULL, NULL),
(906, NULL, 'Tafilalt', '1', 1, 'A', NULL, NULL, NULL),
(907, NULL, 'Tafraout', '1', 1, 'C', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Stand-in structure for view `vimpression`
-- (See below for the actual view)
--
CREATE TABLE `vimpression` (
`NomEx` varchar(250)
,`AdresseEx` text
,`VilleEx` varchar(250)
,`TelEx` varchar(250)
,`NomDest` varchar(250)
,`TelDest` varchar(250)
,`villeDest` int(11)
,`AdresseDest` varchar(250)
,`numero` varchar(50)
,`date` date
,`facture_id` int(16)
,`colis` int(11)
,`poids` decimal(16,2)
,`palettes` int(11)
,`paletteA` int(11)
,`paletteB` int(11)
,`paletteC` int(11)
,`paletteAutre` int(11)
,`Nbre_palettes` int(11)
,`longueur` decimal(8,2)
,`hauteur` decimal(8,2)
,`largeur` decimal(8,2)
,`coef` decimal(8,2)
,`valeur` decimal(24,2)
,`client1_id` int(11)
,`client2_id` int(11)
,`livraison` char(1)
,`express` char(1)
,`port` char(1)
,`courrier_typ` char(2)
,`courrier_eta` char(1)
,`date_saisie` datetime
,`userid` int(18)
,`nature` varchar(50)
,`Espece` decimal(16,2)
,`Cheque` decimal(16,2)
,`Traite` decimal(16,2)
,`Nbre_BL` int(11)
,`BL` text
,`id_adres` int(11)
,`statut` varchar(250)
,`commentaire` varchar(250)
);

-- --------------------------------------------------------

--
-- Structure for view `clientsnombres`
--
DROP TABLE IF EXISTS `clientsnombres`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `clientsnombres`  AS SELECT `cllve`.`CLIENT_ID` AS `CLIENT_ID`, `cllve`.`NOM` AS `NOM`, (select count(0) from `declaration_v` `de` where `cllve`.`CLIENT_ID` = `de`.`client1_id`) AS `total_declars`, (select count(0) from `client` `cl` where `cllve`.`CLIENT_ID` = `cl`.`CLIENT_ID_client_lve`) AS `total_sous_clients`, (select count(0) from `client_lve_session` `clses` where `cllve`.`CLIENT_ID` = `clses`.`REFERENCIEE`) AS `total_session` FROM `client_lve` AS `cllve` ;

-- --------------------------------------------------------

--
-- Structure for view `impcarnet`
--
DROP TABLE IF EXISTS `impcarnet`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `impcarnet`  AS SELECT DISTINCT `vimpression`.`NomEx` AS `NomEx`, `vimpression`.`AdresseEx` AS `AdresseEx`, `vimpression`.`VilleEx` AS `VilleEx`, `vimpression`.`TelEx` AS `TelEx`, `vimpression`.`NomDest` AS `NomDest`, `vimpression`.`TelDest` AS `TelDest`, `vimpression`.`villeDest` AS `villeDest`, `vimpression`.`AdresseDest` AS `AdresseDest`, `vimpression`.`numero` AS `numero`, `vimpression`.`date` AS `date`, `vimpression`.`facture_id` AS `facture_id`, `vimpression`.`colis` AS `colis`, `vimpression`.`poids` AS `poids`, `vimpression`.`palettes` AS `palettes`, `vimpression`.`paletteA` AS `paletteA`, `vimpression`.`paletteB` AS `paletteB`, `vimpression`.`paletteC` AS `paletteC`, `vimpression`.`paletteAutre` AS `paletteAutre`, `vimpression`.`Nbre_palettes` AS `Nbre_palettes`, `vimpression`.`longueur` AS `longueur`, `vimpression`.`hauteur` AS `hauteur`, `vimpression`.`largeur` AS `largeur`, `vimpression`.`coef` AS `coef`, `vimpression`.`valeur` AS `valeur`, `vimpression`.`client1_id` AS `client1_id`, `vimpression`.`client2_id` AS `client2_id`, `vimpression`.`livraison` AS `livraison`, `vimpression`.`express` AS `express`, `vimpression`.`port` AS `port`, `vimpression`.`courrier_typ` AS `courrier_typ`, `vimpression`.`courrier_eta` AS `courrier_eta`, `vimpression`.`date_saisie` AS `date_saisie`, `vimpression`.`userid` AS `userid`, `vimpression`.`nature` AS `nature`, `vimpression`.`Espece` AS `Espece`, `vimpression`.`Cheque` AS `Cheque`, `vimpression`.`Traite` AS `Traite`, `vimpression`.`Nbre_BL` AS `Nbre_BL`, `vimpression`.`BL` AS `BL`, `vimpression`.`id_adres` AS `id_adres`, `vimpression`.`statut` AS `statut`, `vimpression`.`commentaire` AS `commentaire`, `panierramasse`.`numeroCarnet` AS `numeroCarnet`, `panierramasse`.`declaration` AS `declaration`, `panierramasse`.`etat` AS `etat`, `panierramasse`.`date_modification` AS `date_modification` FROM (`vimpression` join `panierramasse`) WHERE `vimpression`.`numero` = `panierramasse`.`declaration` ;

-- --------------------------------------------------------

--
-- Structure for view `vimpression`
--
DROP TABLE IF EXISTS `vimpression`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vimpression`  AS SELECT DISTINCT `client_lve`.`NOM` AS `NomEx`, `client_lve`.`adresse` AS `AdresseEx`, `client_lve`.`ville` AS `VilleEx`, `client_lve`.`telephone` AS `TelEx`, `client`.`NOM` AS `NomDest`, `client`.`telephone` AS `TelDest`, `adresses`.`id_ville` AS `villeDest`, `adresses`.`lib_adresse` AS `AdresseDest`, `declaration_v`.`numero` AS `numero`, `declaration_v`.`date` AS `date`, `declaration_v`.`facture_id` AS `facture_id`, `declaration_v`.`colis` AS `colis`, `declaration_v`.`poids` AS `poids`, `declaration_v`.`palettes` AS `palettes`, `declaration_v`.`paletteA` AS `paletteA`, `declaration_v`.`paletteB` AS `paletteB`, `declaration_v`.`paletteC` AS `paletteC`, `declaration_v`.`paletteAutre` AS `paletteAutre`, `declaration_v`.`Nbre_palettes` AS `Nbre_palettes`, `declaration_v`.`longueur` AS `longueur`, `declaration_v`.`hauteur` AS `hauteur`, `declaration_v`.`largeur` AS `largeur`, `declaration_v`.`coef` AS `coef`, `declaration_v`.`valeur` AS `valeur`, `declaration_v`.`client1_id` AS `client1_id`, `declaration_v`.`client2_id` AS `client2_id`, `declaration_v`.`livraison` AS `livraison`, `declaration_v`.`express` AS `express`, `declaration_v`.`port` AS `port`, `declaration_v`.`courrier_typ` AS `courrier_typ`, `declaration_v`.`courrier_eta` AS `courrier_eta`, `declaration_v`.`date_saisie` AS `date_saisie`, `declaration_v`.`userid` AS `userid`, `declaration_v`.`nature` AS `nature`, `declaration_v`.`Espece` AS `Espece`, `declaration_v`.`Cheque` AS `Cheque`, `declaration_v`.`Traite` AS `Traite`, `declaration_v`.`Nbre_BL` AS `Nbre_BL`, `declaration_v`.`BL` AS `BL`, `declaration_v`.`id_adres` AS `id_adres`, `declaration_v`.`statut` AS `statut`, `declaration_v`.`commentaire` AS `commentaire` FROM ((((`adresses` join `client`) join `client_lve`) join `ville`) join `declaration_v`) WHERE `declaration_v`.`client1_id` = `client`.`CLIENT_ID_client_lve` AND `declaration_v`.`client2_id` = `client`.`CLIENT_ID` AND `ville`.`VILLE_COD` = `adresses`.`id_ville` AND `declaration_v`.`id_adres` = `adresses`.`id_adresse` AND `client`.`CLIENT_ID_client_lve` = `client_lve`.`CLIENT_ID` ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `adresses`
--
ALTER TABLE `adresses`
  ADD PRIMARY KEY (`id_adresse`,`id_client`),
  ADD KEY `Fk_client` (`id_client`),
  ADD KEY `Fk_client_lve` (`id_user`),
  ADD KEY `fk_ville` (`id_ville`);

--
-- Indexes for table `agence`
--
ALTER TABLE `agence`
  ADD PRIMARY KEY (`AGENCE_COD`);

--
-- Indexes for table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`CLIENT_ID`),
  ADD UNIQUE KEY `CLIENT_COD` (`CLIENT_COD`),
  ADD KEY `fkclirntlive` (`CLIENT_ID_client_lve`);

--
-- Indexes for table `client_lve`
--
ALTER TABLE `client_lve`
  ADD PRIMARY KEY (`CLIENT_ID`);

--
-- Indexes for table `client_lve_session`
--
ALTER TABLE `client_lve_session`
  ADD PRIMARY KEY (`AGENCE_COD`) USING BTREE,
  ADD KEY `fk_ag_ref` (`REFERENCIEE`);

--
-- Indexes for table `connexion`
--
ALTER TABLE `connexion`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `declaration_v`
--
ALTER TABLE `declaration_v`
  ADD PRIMARY KEY (`numero`),
  ADD KEY `FKher_client_lve` (`client1_id`),
  ADD KEY `FKher_client` (`client2_id`),
  ADD KEY `fkadresse` (`id_adres`);

--
-- Indexes for table `panierramasse`
--
ALTER TABLE `panierramasse`
  ADD PRIMARY KEY (`declaration`,`numeroCarnet`),
  ADD KEY `Fk_num_caar` (`numeroCarnet`);

--
-- Indexes for table `points_relais`
--
ALTER TABLE `points_relais`
  ADD PRIMARY KEY (`id_pr`),
  ADD KEY `fk_v_pr` (`id_ville`);

--
-- Indexes for table `ramasse`
--
ALTER TABLE `ramasse`
  ADD PRIMARY KEY (`numeroCarnet`);

--
-- Indexes for table `reclamation`
--
ALTER TABLE `reclamation`
  ADD PRIMARY KEY (`id_reclamation`),
  ADD KEY `fk_num_user` (`id_user`),
  ADD KEY `fk_declarations` (`num_declar`),
  ADD KEY `FK_ID_C` (`idclient`);

--
-- Indexes for table `ville`
--
ALTER TABLE `ville`
  ADD PRIMARY KEY (`VILLE_COD`),
  ADD KEY `fk_agences` (`AGENCE_COD`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `adresses`
--
ALTER TABLE `adresses`
  MODIFY `id_adresse` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=185;

--
-- AUTO_INCREMENT for table `client`
--
ALTER TABLE `client`
  MODIFY `CLIENT_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=126;

--
-- AUTO_INCREMENT for table `client_lve`
--
ALTER TABLE `client_lve`
  MODIFY `CLIENT_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `connexion`
--
ALTER TABLE `connexion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `points_relais`
--
ALTER TABLE `points_relais`
  MODIFY `id_pr` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `ramasse`
--
ALTER TABLE `ramasse`
  MODIFY `numeroCarnet` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=120;

--
-- AUTO_INCREMENT for table `reclamation`
--
ALTER TABLE `reclamation`
  MODIFY `id_reclamation` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `adresses`
--
ALTER TABLE `adresses`
  ADD CONSTRAINT `Fk_client` FOREIGN KEY (`id_client`) REFERENCES `client` (`CLIENT_ID`),
  ADD CONSTRAINT `Fk_client_lve` FOREIGN KEY (`id_user`) REFERENCES `client_lve` (`CLIENT_ID`),
  ADD CONSTRAINT `fk_ville` FOREIGN KEY (`id_ville`) REFERENCES `ville` (`VILLE_COD`);

--
-- Constraints for table `client`
--
ALTER TABLE `client`
  ADD CONSTRAINT `fkclirntlive` FOREIGN KEY (`CLIENT_ID_client_lve`) REFERENCES `client_lve` (`CLIENT_ID`);

--
-- Constraints for table `client_lve_session`
--
ALTER TABLE `client_lve_session`
  ADD CONSTRAINT `fk_ag_ref` FOREIGN KEY (`REFERENCIEE`) REFERENCES `client_lve` (`CLIENT_ID`);

--
-- Constraints for table `declaration_v`
--
ALTER TABLE `declaration_v`
  ADD CONSTRAINT `FKher_client` FOREIGN KEY (`client2_id`) REFERENCES `client` (`CLIENT_ID`),
  ADD CONSTRAINT `FKher_client_lve` FOREIGN KEY (`client1_id`) REFERENCES `client_lve` (`CLIENT_ID`),
  ADD CONSTRAINT `fkadresse` FOREIGN KEY (`id_adres`) REFERENCES `adresses` (`id_adresse`);

--
-- Constraints for table `panierramasse`
--
ALTER TABLE `panierramasse`
  ADD CONSTRAINT `Fk_num_caar` FOREIGN KEY (`numeroCarnet`) REFERENCES `ramasse` (`numeroCarnet`),
  ADD CONSTRAINT `Fk_num_deec` FOREIGN KEY (`declaration`) REFERENCES `declaration_v` (`numero`);

--
-- Constraints for table `points_relais`
--
ALTER TABLE `points_relais`
  ADD CONSTRAINT `fk_v_pr` FOREIGN KEY (`id_ville`) REFERENCES `ville` (`VILLE_COD`);

--
-- Constraints for table `reclamation`
--
ALTER TABLE `reclamation`
  ADD CONSTRAINT `FK_ID_C` FOREIGN KEY (`idclient`) REFERENCES `client` (`CLIENT_ID`),
  ADD CONSTRAINT `fk_declarations` FOREIGN KEY (`num_declar`) REFERENCES `declaration_v` (`numero`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_num_user` FOREIGN KEY (`id_user`) REFERENCES `client_lve` (`CLIENT_ID`);

--
-- Constraints for table `ville`
--
ALTER TABLE `ville`
  ADD CONSTRAINT `fk_agences` FOREIGN KEY (`AGENCE_COD`) REFERENCES `agence` (`AGENCE_COD`);
--
-- Database: `test`
--
CREATE DATABASE IF NOT EXISTS `test` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `test`;

-- --------------------------------------------------------

--
-- Table structure for table `distinctdate`
--

CREATE TABLE `distinctdate` (
  `jj` int(11) NOT NULL,
  `mm` int(11) NOT NULL,
  `aaaa` int(11) NOT NULL,
  `dateedition` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `distinctdate`
--

INSERT INTO `distinctdate` (`jj`, `mm`, `aaaa`, `dateedition`) VALUES
(1, 8, 2020, '2020-08-01'),
(2, 8, 2020, '2020-08-02'),
(3, 8, 2020, '2020-08-03'),
(4, 8, 2020, '2020-08-04'),
(5, 8, 2020, '2020-08-05'),
(6, 8, 2020, '2020-08-06'),
(7, 8, 2020, '2020-08-07'),
(8, 8, 2020, '2020-08-08'),
(9, 8, 2020, '2020-08-09'),
(10, 8, 2020, '2020-08-10'),
(11, 8, 2020, '2020-08-11'),
(12, 8, 2020, '2020-08-12'),
(13, 8, 2020, '2020-08-13'),
(14, 8, 2020, '2020-08-14'),
(15, 8, 2020, '2020-08-15'),
(16, 8, 2020, '2020-08-16'),
(17, 8, 2020, '2020-08-17'),
(18, 8, 2020, '2020-08-18'),
(19, 8, 2020, '2020-08-19'),
(20, 8, 2020, '2020-08-20'),
(21, 8, 2020, '2020-08-21'),
(22, 8, 2020, '2020-08-22'),
(23, 8, 2020, '2020-08-23'),
(24, 8, 2020, '2020-08-24'),
(25, 8, 2020, '2020-08-25'),
(26, 8, 2020, '2020-08-26'),
(27, 8, 2020, '2020-08-27'),
(28, 8, 2020, '2020-08-28'),
(29, 8, 2020, '2020-08-29'),
(30, 8, 2020, '2020-08-30'),
(31, 8, 2020, '2020-08-31');

-- --------------------------------------------------------

--
-- Table structure for table `employe`
--

CREATE TABLE `employe` (
  `id` int(11) NOT NULL,
  `nom` varchar(250) NOT NULL,
  `prenom` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employe`
--

INSERT INTO `employe` (`id`, `nom`, `prenom`, `email`) VALUES
(1, 'mytest', '', ''),
(2, 'my\' test 1', 'testPrenom', 'test@mail.com'),
(3, 'my\' test 3', 'testPrenom', 'test@mail.com'),
(4, 'my\' test 4', 'testPrenom5', 'test@mail.com'),
(5, 'my\' test 5', 'testPrenom', 'test@mail.com'),
(6, 'import1', 'test1', 'mail_import@test.com'),
(7, 'import2', 'test2', 'mail_import@test.com'),
(8, 'import3', 'test3', 'mail_import@test.com'),
(9, 'import4', 'test4', 'mail_import@test.com'),
(10, 'import5', 'test5', 'mail_import@test.com'),
(11, 'import6', 'test6', 'mail_import@test.com'),
(12, 'import7', 'test7', 'mail_import@test.com'),
(13, 'import8', 'test8', 'mail_import@test.com');

-- --------------------------------------------------------

--
-- Table structure for table `person`
--

CREATE TABLE `person` (
  `matricule` varchar(25) NOT NULL,
  `nom` varchar(250) NOT NULL,
  `mail` varchar(250) NOT NULL,
  `position` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `person`
--

INSERT INTO `person` (`matricule`, `nom`, `mail`, `position`) VALUES
('DEV1001', 'test 1\'', 'testPrenom', 'test@mail.com'),
('DEV1002', 'test 1', 'testPrenom1', 'test@mail.com1'),
('DEV1003', 'test 2', 'testPrenom1', 'test@mail.com1'),
('DEV1004', 'test 3', 'testPrenom1', 'test@mail.com1'),
('DEV1005', 'testnom1', 'testPrenom1', 'test@mail.com1'),
('DEV1006', 'test 3', 'testPrenom1', NULL),
('test 1\'', 'test 1\'', 'testPrenom', 'test@mail.com');

-- --------------------------------------------------------

--
-- Table structure for table `sample_datas`
--

CREATE TABLE `sample_datas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sample_datas`
--

INSERT INTO `sample_datas` (`id`, `first_name`, `last_name`, `created_at`, `updated_at`) VALUES
(75, 'John’s', 'Smith', '2019-10-12 02:09:09', '2019-10-12 02:09:09'),
(76, 'Peter', 'Parker', '2019-10-12 02:09:09', '2019-10-12 02:09:09'),
(77, 'Larry', 'Degraw', '2019-10-12 02:09:09', '2019-10-12 02:09:09'),
(78, 'Susan', 'Diener', '2019-10-14 05:00:00', '2019-10-14 05:00:00'),
(79, 'William’s', 'Batiste', '2019-10-14 05:00:00', '2019-10-14 05:00:00'),
(80, 'Butler', 'Tucker', '2019-10-14 05:00:00', '2019-10-19 07:54:32'),
(81, 'Eva', 'King', '2019-10-14 05:00:00', '2019-10-14 05:00:00'),
(82, 'Dorothy', 'Hays', '2019-10-14 08:00:00', '2019-10-14 08:00:00'),
(83, 'Nannie', 'Ayers', '2019-10-14 08:00:00', '2019-10-14 08:00:00'),
(84, 'Gerald', 'Brown', '2019-10-14 09:00:00', '2019-10-14 09:00:00'),
(85, 'Judith', 'Smith', '2019-10-14 09:00:00', '2019-10-14 09:00:00'),
(86, 'Delores', 'Schumacher', '2019-10-14 18:00:00', '2019-10-14 18:00:00'),
(87, 'Gloria', 'Romero', '2019-10-14 11:00:00', '2019-10-14 11:00:00'),
(88, 'Paul', 'Pate', '2019-10-14 18:00:00', '2019-10-14 18:00:00'),
(89, 'Ryan', 'Hoang', '2019-10-14 18:00:00', '2019-10-14 18:00:00'),
(90, 'Dixie', 'Smith', '2019-10-17 11:22:21', '2019-10-17 11:22:21'),
(91, 'Jack', 'Smith', '2019-10-18 03:52:30', '2019-10-19 05:09:56'),
(92, 'Ronald', 'Derby', '2019-10-18 04:30:01', '2019-10-18 04:30:01');

-- --------------------------------------------------------

--
-- Table structure for table `table_test`
--

CREATE TABLE `table_test` (
  `id` int(11) NOT NULL,
  `statut` varchar(10) NOT NULL,
  `count` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `table_test`
--

INSERT INTO `table_test` (`id`, `statut`, `count`) VALUES
(1, 'v', 0),
(2, 'v', 2),
(6, 'v', 25);

-- --------------------------------------------------------

--
-- Table structure for table `table_test_two`
--

CREATE TABLE `table_test_two` (
  `id` int(11) NOT NULL,
  `statut` varchar(10) NOT NULL,
  `count` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `table_test_two`
--

INSERT INTO `table_test_two` (`id`, `statut`, `count`) VALUES
(0, 'b', 23),
(1, 'v', 0),
(2, 'v', 2),
(3, 'b', 23);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `employe`
--
ALTER TABLE `employe`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `person`
--
ALTER TABLE `person`
  ADD PRIMARY KEY (`matricule`);

--
-- Indexes for table `sample_datas`
--
ALTER TABLE `sample_datas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `table_test`
--
ALTER TABLE `table_test`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `table_test_two`
--
ALTER TABLE `table_test_two`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `employe`
--
ALTER TABLE `employe`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `sample_datas`
--
ALTER TABLE `sample_datas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=93;

--
-- AUTO_INCREMENT for table `table_test`
--
ALTER TABLE `table_test`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
