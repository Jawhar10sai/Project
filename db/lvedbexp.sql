-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 22, 2021 at 11:15 AM
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
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
