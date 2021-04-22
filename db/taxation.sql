-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 22, 2021 at 11:18 AM
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
-- Database: `taxation`
--

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
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
