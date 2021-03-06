-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  mer. 24 juil. 2019 à 17:04
-- Version du serveur :  10.1.38-MariaDB
-- Version de PHP :  7.1.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `taxation`
--

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `adminname` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `mailadmin` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
-- --------------------------------------------------------

--
-- Structure de la table `adresses`
--

CREATE TABLE `adresses` (
  `id_adresse` int(11) NOT NULL,
  `lib_adresse` varchar(250) NOT NULL,
  `id_client` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_ville` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `agence`
--

CREATE TABLE `agence` (
  `AGENCE_COD` varchar(4) NOT NULL,
  `AGENCE_LIB` varchar(250) NOT NULL,
  `AGENCE_ADRESSE` varchar(250) NOT NULL,
  `AGENCE_TEL` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
-- --------------------------------------------------------
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
('600', 'Rabat', '77 rue london, l\'ocean', '0537262597'),
('650', 'Kenitra', '10 rue ibnou al banna, ville nouvelle', '0537379821'),
('700', 'Marrakech', '514 quartier industriel sidi ghanem', '0524336174'),
('800', 'Beni Mellal', '8JPR+MJ Beni Mellal', '0523483928');
--
-- Structure de la table `agences`
--

CREATE TABLE `client_lve_session` (
  `AGENCE_COD` varchar(50) NOT NULL,
  `AGENCE_LIB` varchar(100) NOT NULL,
  `REFERENCIEE` int(11) NOT NULL,
  `LOGIN` varchar(50) NOT NULL,
  `MOT_D_PASS` varchar(50) NOT NULL,
  `IDENTITE_TYP` char(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
-- --------------------------------------------------------

--
-- Structure de la table `client`
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
  `telephone` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
-- --------------------------------------------------------

--
-- Structure de la table `clientarchive`
--

CREATE TABLE `clientarchive` (
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
  `telephone` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `client_lve`
--

CREATE TABLE `client_lve` (
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
  `adresse` text,
  `ville` varchar(250) DEFAULT NULL,
  `telephone` varchar(250) DEFAULT NULL,
  `login` varchar(250) DEFAULT NULL,
  `mot_de_passe` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
-- --------------------------------------------------------

--
-- Structure de la table `declarationarchive`
--

CREATE TABLE `declarationarchive` (
  `numero` varchar(50) CHARACTER SET utf8 NOT NULL,
  `date` date NOT NULL,
  `facture_id` int(16) DEFAULT NULL,
  `colis` int(11) NOT NULL,
  `poids` decimal(16,3) DEFAULT NULL,
  `palettes` int(11) DEFAULT NULL,
  `paletteA` int(11) NOT NULL,
  `paletteB` int(11) NOT NULL,
  `paletteC` int(11) NOT NULL,
  `paletteAutre` int(11) NOT NULL,
  `Nbre_palettes` int(11) NOT NULL,
  `longueur` decimal(8,2) NOT NULL,
  `hauteur` decimal(8,2) NOT NULL,
  `largeur` decimal(8,2) NOT NULL,
  `coef` decimal(8,2) DEFAULT NULL,
  `valeur` decimal(24,2) DEFAULT NULL,
  `client1_id` int(11) NOT NULL,
  `client2_id` int(11) NOT NULL,
  `livraison` char(1) DEFAULT NULL,
  `express` char(1) DEFAULT NULL,
  `port` char(1) DEFAULT NULL,
  `courrier_typ` char(2) DEFAULT NULL,
  `courrier_eta` char(1) DEFAULT 'S',
  `date_saisie` datetime DEFAULT NULL,
  `userid` int(18) DEFAULT NULL,
  `nature` varchar(50) DEFAULT NULL,
  `Espece` decimal(16,2) DEFAULT NULL,
  `Cheque` decimal(16,2) DEFAULT NULL,
  `Traite` decimal(16,2) DEFAULT NULL,
  `Nbre_BL` int(11) NOT NULL,
  `BL` text,
  `id_adres` int(11) NOT NULL,
  `statut` varchar(250) NOT NULL,
  `commentaire` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `declaration_v`
--

CREATE TABLE `declaration_v` (
  `numero` varchar(50) CHARACTER SET utf8 NOT NULL,
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
  `date_saisie` datetime DEFAULT CURRENT_TIMESTAMP,
  `userid` int(18) DEFAULT NULL,
  `nature` varchar(50) DEFAULT NULL,
  `Espece` decimal(16,2) DEFAULT NULL,
  `Cheque` decimal(16,2) DEFAULT NULL,
  `Traite` decimal(16,2) DEFAULT NULL,
  `Nbre_BL` int(11) NOT NULL,
  `BL` text,
  `id_adres` int(11) NOT NULL,
  `statut` varchar(250) NOT NULL,
  `commentaire` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
-- --------------------------------------------------------

--
-- Doublure de structure pour la vue `impcarnet`
-- (Voir ci-dessous la vue réelle)
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
-- Structure de la table `panierramasse`
--

CREATE TABLE `panierramasse` (
  `numeroCarnet` int(11) NOT NULL,
  `declaration` varchar(50) NOT NULL,
  `etat` varchar(50) NOT NULL DEFAULT 'En cours',
  `motif_annulation` varchar(250) NOT NULL,
  `date_modification` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `points_relais`
--

CREATE TABLE `points_relais` (
  `id_pr` int(11) NOT NULL,
  `lib_pr` varchar(250) NOT NULL,
  `id_ville` int(11) NOT NULL,
  `loc_ver` varchar(50) NOT NULL,
  `loc_hor` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
-- --------------------------------------------------------

--
-- Structure de la table `ramasse`
--

CREATE TABLE `ramasse` (
  `numeroCarnet` int(11) NOT NULL,
  `datedesaisie` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `dateramassage` date NOT NULL,
  `user_id` int(11) NOT NULL,
  `code_ramassage` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
-- --------------------------------------------------------

--
-- Structure de la table `reclamation`
--

CREATE TABLE `reclamation` (
  `id_reclamation` int(11) NOT NULL,
  `date_reclamation` date NOT NULL,
  `idclient` int(11) NOT NULL,
  `num_declar` varchar(50) NOT NULL,
  `objet_reclamation` varchar(250) NOT NULL,
  `id_user` int(11) NOT NULL,
  `tpy_reclam` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
-- --------------------------------------------------------

--
-- Doublure de structure pour la vue `vadressess`
-- (Voir ci-dessous la vue réelle)
--
CREATE TABLE `vadressess` (
`id_adresse` int(11)
,`lib_adresse` varchar(250)
,`id_client` int(11)
,`id_user` int(11)
,`VILLE_LIB` varchar(64)
,`CLIENT_COD` varchar(32)
);

-- --------------------------------------------------------

--
-- Doublure de structure pour la vue `vdeclaration`
-- (Voir ci-dessous la vue réelle)
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
-- Structure de la table `ville`
--

CREATE TABLE `ville` (
  `VILLE_COD` int(11) NOT NULL,
  `AGENCE_COD` varchar(4) CHARACTER SET utf8 DEFAULT NULL,
  `VILLE_LIB` varchar(64) NOT NULL,
  `VILLE_TYP` char(2) DEFAULT NULL,
  `DELAI` int(11) DEFAULT NULL,
  `ZONE_COD` char(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `ville`
--

INSERT INTO `ville` (`VILLE_COD`, `AGENCE_COD`, `VILLE_LIB`, `VILLE_TYP`, `DELAI`, `ZONE_COD`) VALUES
(100, '100', 'CASABLANCA', '1', 1, 'A'),
(101, '100', 'BOUSKOURA', '1', 1, 'B'),
(102, '100', 'MOHAMMEDIA', '1', 1, 'A'),
(103, '100', 'AIN HARROUDA', '1', 1, 'B'),
(104, '100', 'HAD SOUALEM', '1', 1, 'B'),
(105, '100', 'NOUASSER', '1', 1, 'B'),
(106, '100', 'Lissasfa IAM', '1', 1, 'B'),
(107, '600', 'BOUZNIKA', '1', 1, 'B'),
(109, '100', 'MOHAMMADIA BIS', '1', 1, 'B'),
(110, '110', 'EL JADIDA', '1', 1, 'A'),
(111, '110', 'AZEMMOUR', '1', 1, 'B'),
(112, '110', 'BIR JDID', '1', 1, 'B'),
(120, '120', 'SAFI', '1', 1, 'A'),
(121, '110', 'SIDI BENNOUR', '1', 10, 'C'),
(122, '120', 'SIDI SMAIL', '1', 2, 'C'),
(123, '110', 'KHEMISS ZEMAMRA', '1', 2, 'C'),
(124, '120', 'YOUSSOUFIA', '1', 3, 'C'),
(125, '120', 'JEMAA SHAIM', '1', 2, 'C'),
(126, '120', 'CHEMAIA', '1', 2, 'C'),
(127, '120', 'TNINE LAGHYAT', '1', 3, 'C'),
(128, '110', 'OUALIDIA', '1', 3, 'C'),
(129, '120', 'SEBT GZOULA', '1', 2, 'C'),
(150, '100', 'AIN SEBAA', '1', 1, 'B'),
(151, '100', 'Logiprod', '1', 1, 'C'),
(152, '600', 'Ain Atiq', '1', 1, 'C'),
(200, '200', 'TANGER', '1', 1, 'A'),
(210, '210', 'TETOUAN', '1', 1, 'A'),
(211, '220', 'CHEFCHAOUEN', '1', 3, 'C'),
(212, '210', 'FNIDEQ', '1', 1, 'B'),
(213, '220', 'CHAOUEN', '1', 3, 'C'),
(214, '210', 'HAD BENI RZINE', '1', 2, 'C'),
(215, '210', 'BAB BERRED', '1', 5, 'C'),
(216, '220', 'OUAZZANE', '1', 3, 'C'),
(217, '210', 'Ain Derrij', '1', 10, 'C'),
(218, '210', 'MARTIL', '1', 1, 'B'),
(219, '210', 'MEDIAQ', '1', 1, 'B'),
(220, '220', 'LARACHE', '1', 3, 'A'),
(221, '220', 'LAOUAMRA', '1', 5, 'B'),
(222, '220', 'ASILAH', '1', 15, 'B'),
(223, '220', 'KSAR EL KEBIR', '1', 5, 'B'),
(224, '200', 'DEPOT TANGER', '1', 1, 'C'),
(230, '200', 'TANGER MED', '1', 1, 'C'),
(300, '300', 'AGADIR', '1', 1, 'A'),
(301, '300', 'AOURIR', '1', 3, 'C'),
(302, '300', 'BOUIZAKARNE', '1', 7, 'C'),
(303, NULL, 'BOUJDOUR', '1', 30, 'C'),
(304, NULL, 'DAKHLA', '1', 30, 'C'),
(305, '350', 'GUELMIM', '1', 15, 'C'),
(306, '300', 'IMINTANOUTE', '1', 3, 'C'),
(307, '300', 'BEN SERGAO', '1', 3, 'B'),
(308, '300', 'SMARA', '1', 30, 'C'),
(309, '350', 'TANTAN', '1', 15, 'C'),
(310, NULL, 'TARFAYA', '1', 15, 'C'),
(311, '300', 'TATA', '1', 30, 'C'),
(312, '300', 'ANZA', '1', 1, 'C'),
(320, '350', 'OULED BERHIL', '1', 3, 'C'),
(321, '350', 'IGHREM', '1', 5, 'C'),
(322, '350', 'MASSA', '1', 5, 'C'),
(323, '350', 'KHEMIS AIT AMIRA', '1', 5, 'C'),
(324, '350', 'KLEAA', '1', 5, 'C'),
(325, '350', 'AZROU SUD', '1', 5, 'C'),
(326, '350', 'TIKIOUINE', '1', 1, 'B'),
(327, '350', 'SMIMOU', '1', 5, 'C'),
(328, '350', 'TAMANAR', '1', 5, 'C'),
(329, '350', 'TIZNIT', '1', 3, 'C'),
(350, '350', 'AIT MELLOUL', '1', 1, 'A'),
(351, '350', 'INZEGANE', '1', 1, 'A'),
(352, '350', 'OULED TEIMA', '1', 2, 'B'),
(353, '350', 'TAROUDANTE', '1', 2, 'B'),
(354, '350', 'SIDI IFNI', '1', 15, 'C'),
(355, '350', 'TALIOUINE', '1', 5, 'C'),
(356, '350', 'DCHEIRA', '1', 3, 'B'),
(357, '350', 'BIOUGRA', '1', 3, 'B'),
(370, '350', 'LAAYOUNE', '1', 15, 'A'),
(371, NULL, 'ESSMARA', '1', 30, 'C'),
(372, '350', 'AIT BAHA', '1', 5, 'C'),
(373, '350', 'AIT MILK', '1', 5, 'C'),
(400, '400', 'OUJDA', '1', 1, 'A'),
(401, '400', 'AHFIR', '1', 1, 'C'),
(402, '400', 'BOUARFA', '1', 15, 'C'),
(403, '400', 'FIGUIG', '1', 15, 'C'),
(404, '400', 'JERADA', '1', 15, 'C'),
(405, '400', 'LAYOUN', '1', 3, 'C'),
(406, '430', 'TAOURIRT', '1', 5, 'C'),
(407, '400', 'SAIDIA', '1', 2, 'B'),
(408, '400', 'EL AIOUN', '1', 3, 'C'),
(410, '410', 'NADOR', '1', 1, 'A'),
(411, '410', 'ZAIO', '1', 2, 'B'),
(412, '410', 'DRIOUCH', '1', 2, 'C'),
(413, '410', 'BENI NSAR', '1', 2, 'C'),
(414, '410', 'EL HOCEIMA', '1', 7, 'C'),
(415, '410', 'IMZOUREN', '1', 7, 'C'),
(416, '410', 'MONT AROUI', '1', 5, 'C'),
(417, '410', 'BENI HDIFA', '1', 7, 'C'),
(418, '410', 'Ain Zaura', '1', 7, 'C'),
(419, '410', 'AIT MILK', '1', 7, 'C'),
(420, '400', 'BERKANE', '1', 1, 'B'),
(421, '410', 'MIDAR', '1', 7, 'C'),
(422, '410', 'ZGHENGHEN', '1', 7, 'C'),
(423, '410', 'SELOUANE', '1', 7, 'C'),
(424, '410', 'BEN TAYEB', '1', 7, 'C'),
(425, '410', 'KARIAT AREKMAN', '1', 5, 'C'),
(430, '430', 'TAZA', '1', 1, 'A'),
(431, '430', 'GUERCIF', '1', 1, 'B'),
(432, '430', 'OUED AMLIL', '1', 1, 'C'),
(433, '430', 'TAHLA', '1', 3, 'C'),
(434, '430', 'KETAMA', '1', 7, 'C'),
(435, '430', 'BENI BOUAYACH', '1', 7, 'C'),
(436, '410', 'TARGUIST', '1', 5, 'C'),
(437, '430', 'GHAFSAI', '1', 1, 'C'),
(500, '500', 'FES', '1', 1, 'A'),
(501, '500', 'AIN TAOUJTATE', '1', 2, 'C'),
(502, '500', 'ARFOUD', '1', 7, 'C'),
(503, '500', 'BOULMANE', '1', 5, 'C'),
(504, '500', 'ERRACHIDIA', '1', 7, 'C'),
(505, '500', 'GUOULMIMA', '1', 7, 'C'),
(506, '500', 'IFRANE', '1', 5, 'B'),
(507, '500', 'IMMOUZER', '1', 3, 'C'),
(508, '800', 'KHENIFRA', '1', 5, 'C'),
(509, '500', 'MIDELT', '1', 7, 'C'),
(510, '500', 'SEFROU', '1', 5, 'B'),
(511, '500', 'TAOUNATE', '1', 15, 'C'),
(512, '500', 'TISSA', '1', 15, 'C'),
(513, '500', 'AOUFOUS', '1', 15, 'C'),
(514, '500', 'MISSOUR', '1', 15, 'C'),
(515, '500', 'KARIAT BA MHAMED', '1', 15, 'C'),
(516, '500', 'RIBAT EL KHEIR', '1', 15, 'C'),
(517, '500', 'OUTAT EL HAJ', '1', 15, 'C'),
(550, '550', 'MEKNES', '1', 1, 'A'),
(551, '500', 'AZROU', '1', 5, 'C'),
(552, '550', 'KHEMISSET', '1', 3, 'B'),
(553, '500', 'LABHALIL', '1', 3, 'C'),
(554, '500', 'ITZER', '1', 15, 'C'),
(555, '500', 'BOUMIA', '1', 15, 'C'),
(556, '550', 'MRIRT', '1', 7, 'C'),
(557, '550', 'BOUFEKRANE', '1', 3, 'C'),
(558, '550', 'OUISLANE', '1', 2, 'C'),
(559, '550', 'ROMMANI', '1', 5, 'C'),
(560, '550', 'OULMES', '1', 5, 'C'),
(561, '550', 'ZAIDA', '1', 5, 'C'),
(562, '550', 'Station Shell OumRrbii', '1', 3, 'C'),
(600, '600', 'RABAT', '1', 1, 'A'),
(601, '600', 'SALE', '1', 1, 'A'),
(602, '600', 'SIDI ALLAL BAHRAOUI', '1', 2, 'C'),
(603, '650', 'SIDI KACEM', '1', 3, 'C'),
(604, '650', 'SIDI SLIMANE', '1', 3, 'B'),
(605, '650', 'SIDI YAHIA GHARB', '1', 3, 'B'),
(606, '220', 'SOUK LARBAA', '1', 3, 'B'),
(607, '600', 'TEMARA', '1', 1, 'A'),
(608, '550', 'TIFELT', '1', 3, 'B'),
(609, '600', 'SKHIRAT', '1', 1, 'B'),
(610, '100', 'BEN SLIMANE', '1', 2, 'C'),
(611, '650', 'BELKSIRI', '1', 3, 'C'),
(612, '650', 'LALLA MAYMOUNA', '1', 3, 'C'),
(614, '650', 'SIDI YAHYA ZAER', '1', 3, 'C'),
(615, '650', 'ARBAOUA', '1', 3, 'C'),
(616, '650', 'HAD KOURT', '1', 3, 'C'),
(617, '650', 'MECHRAA BEL KSIRI', '1', 3, 'C'),
(618, '650', 'SOUK TLET GHARB', '1', 3, 'C'),
(619, '600', 'AIN ATIQ', '1', 1, 'B'),
(620, '650', 'JORF EL MELHA', '1', 3, 'C'),
(621, '600', 'Rabat Centre', '1', 1, 'B'),
(622, '600', 'Rabat océan', '1', 1, 'B'),
(650, '650', 'KENITRA', '1', 1, 'A'),
(651, '650', 'DAR EL GUEDDARI', '1', 3, 'C'),
(652, '650', 'El Mudzine', '1', 3, 'C'),
(653, '650', 'KSIBIA', '1', 3, 'C'),
(660, NULL, 'AL GHARB', '1', 3, 'C'),
(700, '700', 'MARRAKECH', '1', 1, 'A'),
(701, '700', 'BEN GUERIR', '1', 3, 'C'),
(702, '700', 'KELAAT SRAGHNA', '1', 5, 'C'),
(703, '700', 'CHICHAOUA', '1', 5, 'C'),
(704, '120', 'ESSAOUIRA', '1', 7, 'C'),
(705, '700', 'OUARZAZATE', '1', 7, 'C'),
(706, '700', 'TINGHIR', '1', 7, 'C'),
(707, '700', 'KELAAT MEGOUNA', '1', 7, 'C'),
(708, '700', 'ZAGOURA', '1', 15, 'C'),
(709, '700', 'AGDZ', '1', 10, 'C'),
(710, '700', 'AIT OURIR', '1', 7, 'C'),
(711, '700', 'ATTAOUIA', '1', 5, 'C'),
(712, '700', 'BOUMALNE DADES', '1', 7, 'C'),
(713, '700', 'RISSANI', '1', 15, 'C'),
(715, '700', 'TINJDAD', '1', 15, 'C'),
(716, '700', 'OURIKA', '1', 5, 'C'),
(717, '500', 'RICH', '1', 15, 'C'),
(718, '700', 'DEMNATE', '1', 7, 'C'),
(719, '700', 'AMZMIZ', '1', 7, 'C'),
(800, '800', 'BENI MELLAL', '1', 1, 'A'),
(801, '100', 'BEJAAD', '1', 3, 'C'),
(802, '100', 'BEN HMAD', '1', 2, 'B'),
(803, '100', 'BERRECHID', '1', 1, 'A'),
(804, '100', 'FKIH BEN SALEH', '1', 2, 'B'),
(805, '800', 'KASBAT TADLA', '1', 2, 'B'),
(806, '100', 'KHOURIBGA', '1', 1, 'B'),
(807, '800', 'OUED ZEM', '1', 2, 'B'),
(808, '100', 'SETTAT', '1', 1, 'A'),
(809, '800', 'SOUK SEBT', '1', 2, 'B'),
(810, '800', 'AZILAL', '1', 5, 'C'),
(811, '100', 'EL GARA', '1', 2, 'C'),
(812, '550', 'EL HAJEB', '1', 3, 'C'),
(813, '800', 'TAMELLALTE', '1', 5, 'C'),
(814, '800', 'OULED AYAD', '1', 5, 'C'),
(815, NULL, 'KHMISS OULAD AYAD', '1', 5, 'C'),
(816, NULL, 'BOUJNIBA', '1', 3, 'C'),
(817, '800', 'DEPOT BENI MELLAL', '1', 1, 'B'),
(818, NULL, 'SEBT NEMMA', '1', 3, 'C'),
(819, NULL, 'AFOURAR', '1', 3, 'C'),
(820, NULL, 'ZAOUIYAT CHEIKH', '1', 5, 'C'),
(822, NULL, 'OULED ZIDOUH', '1', 5, 'C'),
(823, NULL, 'OULED LAMRAH', '1', 5, 'C'),
(824, '800', 'OULAD ZMAM', '1', 5, 'C'),
(825, NULL, 'OULAD MBAREK', '1', 5, 'C'),
(826, NULL, 'KSSIBA', '1', 5, 'C'),
(827, NULL, 'OUAOUIZERTH', '1', 5, 'C'),
(828, '800', 'OULED ZMAM', '1', 3, 'C'),
(829, NULL, 'TIGHSSALINE', '1', 5, 'C'),
(830, NULL, 'AIT ISHAQ', '1', 5, 'C'),
(831, '100', 'LAKHYAYTA', '1', 1, 'C'),
(832, '800', 'TLAT OULAD', '1', 2, 'C'),
(833, NULL, 'GUISSER', '1', 3, 'C'),
(834, '100', 'TIT MELLIL', '1', 1, 'C'),
(905, '100', 'DERB GHALEF', '1', 5, 'C'),
(906, NULL, 'Tafilalt', '1', 1, 'A'),
(907, NULL, 'Tafraout', '1', 1, 'C');

-- --------------------------------------------------------

--
-- Doublure de structure pour la vue `vimpression`
-- (Voir ci-dessous la vue réelle)
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
-- Doublure de structure pour la vue `vu_declaration`
-- (Voir ci-dessous la vue réelle)
--
CREATE TABLE `vu_declaration` (
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
,`Adresse` varchar(250)
,`Ville` varchar(64)
);

-- --------------------------------------------------------

--
-- Structure de la vue `impcarnet`
--
DROP TABLE IF EXISTS `impcarnet`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `impcarnet`  AS  select distinct `vimpression`.`NomEx` AS `NomEx`,`vimpression`.`AdresseEx` AS `AdresseEx`,`vimpression`.`VilleEx` AS `VilleEx`,`vimpression`.`TelEx` AS `TelEx`,`vimpression`.`NomDest` AS `NomDest`,`vimpression`.`TelDest` AS `TelDest`,`vimpression`.`villeDest` AS `villeDest`,`vimpression`.`AdresseDest` AS `AdresseDest`,`vimpression`.`numero` AS `numero`,`vimpression`.`date` AS `date`,`vimpression`.`facture_id` AS `facture_id`,`vimpression`.`colis` AS `colis`,`vimpression`.`poids` AS `poids`,`vimpression`.`palettes` AS `palettes`,`vimpression`.`paletteA` AS `paletteA`,`vimpression`.`paletteB` AS `paletteB`,`vimpression`.`paletteC` AS `paletteC`,`vimpression`.`paletteAutre` AS `paletteAutre`,`vimpression`.`Nbre_palettes` AS `Nbre_palettes`,`vimpression`.`longueur` AS `longueur`,`vimpression`.`hauteur` AS `hauteur`,`vimpression`.`largeur` AS `largeur`,`vimpression`.`coef` AS `coef`,`vimpression`.`valeur` AS `valeur`,`vimpression`.`client1_id` AS `client1_id`,`vimpression`.`client2_id` AS `client2_id`,`vimpression`.`livraison` AS `livraison`,`vimpression`.`express` AS `express`,`vimpression`.`port` AS `port`,`vimpression`.`courrier_typ` AS `courrier_typ`,`vimpression`.`courrier_eta` AS `courrier_eta`,`vimpression`.`date_saisie` AS `date_saisie`,`vimpression`.`userid` AS `userid`,`vimpression`.`nature` AS `nature`,`vimpression`.`Espece` AS `Espece`,`vimpression`.`Cheque` AS `Cheque`,`vimpression`.`Traite` AS `Traite`,`vimpression`.`Nbre_BL` AS `Nbre_BL`,`vimpression`.`BL` AS `BL`,`vimpression`.`id_adres` AS `id_adres`,`vimpression`.`statut` AS `statut`,`vimpression`.`commentaire` AS `commentaire`,`panierramasse`.`numeroCarnet` AS `numeroCarnet`,`panierramasse`.`declaration` AS `declaration`,`panierramasse`.`etat` AS `etat`,`panierramasse`.`date_modification` AS `date_modification` from (`vimpression` join `panierramasse`) where (`vimpression`.`numero` = `panierramasse`.`declaration`) ;

-- --------------------------------------------------------

--
-- Structure de la vue `vadressess`
--
DROP TABLE IF EXISTS `vadressess`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vadressess`  AS  select `ad`.`id_adresse` AS `id_adresse`,`ad`.`lib_adresse` AS `lib_adresse`,`ad`.`id_client` AS `id_client`,`ad`.`id_user` AS `id_user`,`vl`.`VILLE_LIB` AS `VILLE_LIB`,`cl`.`CLIENT_COD` AS `CLIENT_COD` from ((`adresses` `ad` join `ville` `vl`) join `client` `cl`) where ((`ad`.`id_ville` = `vl`.`VILLE_COD`) and (`cl`.`CLIENT_ID` = `ad`.`id_client`)) ;

-- --------------------------------------------------------

--
-- Structure de la vue `vdeclaration`
--
DROP TABLE IF EXISTS `vdeclaration`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vdeclaration`  AS  select `declaration_v`.`numero` AS `numero`,`declaration_v`.`date` AS `date`,`declaration_v`.`facture_id` AS `facture_id`,`declaration_v`.`colis` AS `colis`,`declaration_v`.`poids` AS `poids`,`declaration_v`.`palettes` AS `palettes`,`declaration_v`.`paletteA` AS `paletteA`,`declaration_v`.`paletteB` AS `paletteB`,`declaration_v`.`paletteC` AS `paletteC`,`declaration_v`.`paletteAutre` AS `paletteAutre`,`declaration_v`.`Nbre_palettes` AS `Nbre_palettes`,`declaration_v`.`longueur` AS `longueur`,`declaration_v`.`hauteur` AS `hauteur`,`declaration_v`.`largeur` AS `largeur`,`declaration_v`.`coef` AS `coef`,`declaration_v`.`valeur` AS `valeur`,`declaration_v`.`client1_id` AS `client1_id`,`declaration_v`.`client2_id` AS `client2_id`,`declaration_v`.`livraison` AS `livraison`,`declaration_v`.`express` AS `express`,`declaration_v`.`port` AS `port`,`declaration_v`.`courrier_typ` AS `courrier_typ`,`declaration_v`.`courrier_eta` AS `courrier_eta`,`declaration_v`.`date_saisie` AS `date_saisie`,`declaration_v`.`userid` AS `userid`,`declaration_v`.`nature` AS `nature`,`declaration_v`.`Espece` AS `Espece`,`declaration_v`.`Cheque` AS `Cheque`,`declaration_v`.`Traite` AS `Traite`,`declaration_v`.`BL` AS `BL`,`declaration_v`.`id_adres` AS `id_adres`,`declaration_v`.`statut` AS `statut`,`declaration_v`.`commentaire` AS `commentaire`,`client`.`CLIENT_ID` AS `CLIENT_ID`,`client`.`NOM` AS `NOM`,`client`.`PRENOM` AS `PRENOM`,`client`.`CLIENT_COD` AS `CLIENT_COD`,`client`.`CLIENT_ID_client_lve` AS `CLIENT_ID_client_lve`,`client`.`telephone` AS `telephone`,`ville`.`VILLE_LIB` AS `ville`,`adresses`.`lib_adresse` AS `Adresse` from (((`declaration_v` join `client`) join `ville`) join `adresses`) where ((`declaration_v`.`client1_id` = `client`.`CLIENT_ID_client_lve`) and (`ville`.`VILLE_COD` = `adresses`.`id_ville`) and (`declaration_v`.`client2_id` = `client`.`CLIENT_ID`) and `adresses`.`id_client` in (select `declaration_v`.`client2_id` from (`declaration_v` join `client`) where (`declaration_v`.`client2_id` = `client`.`CLIENT_ID`)) and (`adresses`.`id_adresse` = `declaration_v`.`id_adres`)) ;

-- --------------------------------------------------------

--
-- Structure de la vue `vimpression`
--
DROP TABLE IF EXISTS `vimpression`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vimpression`  AS  select distinct `client_lve`.`NOM` AS `NomEx`,`client_lve`.`adresse` AS `AdresseEx`,`client_lve`.`ville` AS `VilleEx`,`client_lve`.`telephone` AS `TelEx`,`client`.`NOM` AS `NomDest`,`client`.`telephone` AS `TelDest`,`adresses`.`id_ville` AS `villeDest`,`adresses`.`lib_adresse` AS `AdresseDest`,`declaration_v`.`numero` AS `numero`,`declaration_v`.`date` AS `date`,`declaration_v`.`facture_id` AS `facture_id`,`declaration_v`.`colis` AS `colis`,`declaration_v`.`poids` AS `poids`,`declaration_v`.`palettes` AS `palettes`,`declaration_v`.`paletteA` AS `paletteA`,`declaration_v`.`paletteB` AS `paletteB`,`declaration_v`.`paletteC` AS `paletteC`,`declaration_v`.`paletteAutre` AS `paletteAutre`,`declaration_v`.`Nbre_palettes` AS `Nbre_palettes`,`declaration_v`.`longueur` AS `longueur`,`declaration_v`.`hauteur` AS `hauteur`,`declaration_v`.`largeur` AS `largeur`,`declaration_v`.`coef` AS `coef`,`declaration_v`.`valeur` AS `valeur`,`declaration_v`.`client1_id` AS `client1_id`,`declaration_v`.`client2_id` AS `client2_id`,`declaration_v`.`livraison` AS `livraison`,`declaration_v`.`express` AS `express`,`declaration_v`.`port` AS `port`,`declaration_v`.`courrier_typ` AS `courrier_typ`,`declaration_v`.`courrier_eta` AS `courrier_eta`,`declaration_v`.`date_saisie` AS `date_saisie`,`declaration_v`.`userid` AS `userid`,`declaration_v`.`nature` AS `nature`,`declaration_v`.`Espece` AS `Espece`,`declaration_v`.`Cheque` AS `Cheque`,`declaration_v`.`Traite` AS `Traite`,`declaration_v`.`Nbre_BL` AS `Nbre_BL`,`declaration_v`.`BL` AS `BL`,`declaration_v`.`id_adres` AS `id_adres`,`declaration_v`.`statut` AS `statut`,`declaration_v`.`commentaire` AS `commentaire` from ((((`adresses` join `client`) join `client_lve`) join `ville`) join `declaration_v`) where ((`declaration_v`.`client1_id` = `client`.`CLIENT_ID_client_lve`) and (`declaration_v`.`client2_id` = `client`.`CLIENT_ID`) and (`ville`.`VILLE_COD` = `adresses`.`id_ville`) and (`declaration_v`.`id_adres` = `adresses`.`id_adresse`) and (`client`.`CLIENT_ID_client_lve` = `client_lve`.`CLIENT_ID`)) ;

-- --------------------------------------------------------

--
-- Structure de la vue `vu_declaration`
--
DROP TABLE IF EXISTS `vu_declaration`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vu_declaration`  AS  select `declaration_v`.`numero` AS `numero`,`declaration_v`.`date` AS `date`,`declaration_v`.`facture_id` AS `facture_id`,`declaration_v`.`colis` AS `colis`,`declaration_v`.`poids` AS `poids`,`declaration_v`.`palettes` AS `palettes`,`declaration_v`.`paletteA` AS `paletteA`,`declaration_v`.`paletteB` AS `paletteB`,`declaration_v`.`paletteC` AS `paletteC`,`declaration_v`.`paletteAutre` AS `paletteAutre`,`declaration_v`.`Nbre_palettes` AS `Nbre_palettes`,`declaration_v`.`longueur` AS `longueur`,`declaration_v`.`hauteur` AS `hauteur`,`declaration_v`.`largeur` AS `largeur`,`declaration_v`.`coef` AS `coef`,`declaration_v`.`valeur` AS `valeur`,`declaration_v`.`client1_id` AS `client1_id`,`declaration_v`.`client2_id` AS `client2_id`,`declaration_v`.`livraison` AS `livraison`,`declaration_v`.`express` AS `express`,`declaration_v`.`port` AS `port`,`declaration_v`.`courrier_typ` AS `courrier_typ`,`declaration_v`.`courrier_eta` AS `courrier_eta`,`declaration_v`.`date_saisie` AS `date_saisie`,`declaration_v`.`userid` AS `userid`,`declaration_v`.`nature` AS `nature`,`declaration_v`.`Espece` AS `Espece`,`declaration_v`.`Cheque` AS `Cheque`,`declaration_v`.`Traite` AS `Traite`,`declaration_v`.`BL` AS `BL`,`declaration_v`.`id_adres` AS `id_adres`,`declaration_v`.`statut` AS `statut`,`declaration_v`.`commentaire` AS `commentaire`,`client`.`CLIENT_ID` AS `CLIENT_ID`,`client`.`NOM` AS `NOM`,`client`.`PRENOM` AS `PRENOM`,`client`.`CLIENT_COD` AS `CLIENT_COD`,`client`.`CLIENT_ID_client_lve` AS `CLIENT_ID_client_lve`,`client`.`telephone` AS `telephone`,`adresses`.`lib_adresse` AS `Adresse`,`ville`.`VILLE_LIB` AS `Ville` from (((`declaration_v` join `client`) join `ville`) join `adresses`) where ((`declaration_v`.`client1_id` = `client`.`CLIENT_ID_client_lve`) and (`declaration_v`.`client2_id` = `client`.`CLIENT_ID`) and (`ville`.`VILLE_COD` = `adresses`.`id_ville`) and (`client`.`CLIENT_ID` = `adresses`.`id_client`) and (`declaration_v`.`client1_id` = `adresses`.`id_user`) and (`declaration_v`.`id_adres` = `adresses`.`id_adresse`)) ;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Index pour la table `adresses`
--
ALTER TABLE `adresses`
  ADD PRIMARY KEY (`id_adresse`,`id_client`),
  ADD KEY `Fk_client` (`id_client`),
  ADD KEY `Fk_client_lve` (`id_user`),
  ADD KEY `fk_ville` (`id_ville`);

--
-- Index pour la table `agence`
--
ALTER TABLE `agence`
  ADD PRIMARY KEY (`AGENCE_COD`);

--
-- Index pour la table `agences`
--
ALTER TABLE `client_lve_session`
  ADD PRIMARY KEY (`AGENCE_COD`) USING BTREE,
  ADD KEY `fk_ag_ref` (`REFERENCIEE`);

--
-- Index pour la table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`CLIENT_ID`),
  ADD UNIQUE KEY `CLIENT_COD` (`CLIENT_COD`),
  ADD KEY `fkclirntlive` (`CLIENT_ID_client_lve`);

--
-- Index pour la table `client_lve`
--
ALTER TABLE `client_lve`
  ADD PRIMARY KEY (`CLIENT_ID`);

--
-- Index pour la table `declaration_v`
--
ALTER TABLE `declaration_v`
  ADD PRIMARY KEY (`numero`),
  ADD KEY `FKher_client_lve` (`client1_id`),
  ADD KEY `FKher_client` (`client2_id`),
  ADD KEY `fkadresse` (`id_adres`);

--
-- Index pour la table `panierramasse`
--
ALTER TABLE `panierramasse`
  ADD PRIMARY KEY (`declaration`,`numeroCarnet`),
  ADD KEY `Fk_num_caar` (`numeroCarnet`);

--
-- Index pour la table `points_relais`
--
ALTER TABLE `points_relais`
  ADD PRIMARY KEY (`id_pr`),
  ADD KEY `fk_v_pr` (`id_ville`);

--
-- Index pour la table `ramasse`
--
ALTER TABLE `ramasse`
  ADD PRIMARY KEY (`numeroCarnet`);

--
-- Index pour la table `reclamation`
--
ALTER TABLE `reclamation`
  ADD PRIMARY KEY (`id_reclamation`),
  ADD KEY `FK_ID_C` (`idclient`),
  ADD KEY `fk_num_user` (`id_user`),
  ADD KEY `fk_declarations` (`num_declar`);


-- Index pour la table `ville`
--
ALTER TABLE `ville`
  ADD PRIMARY KEY (`VILLE_COD`),
  ADD KEY `fk_agences` (`AGENCE_COD`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `adresses`
--
ALTER TABLE `adresses`
  MODIFY `id_adresse` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=171;

--
-- AUTO_INCREMENT pour la table `client`
--
ALTER TABLE `client`
  MODIFY `CLIENT_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=113;

--
-- AUTO_INCREMENT pour la table `client_lve`
--
ALTER TABLE `client_lve`
  MODIFY `CLIENT_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `points_relais`
--
ALTER TABLE `points_relais`
  MODIFY `id_pr` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `ramasse`
--
ALTER TABLE `ramasse`
  MODIFY `numeroCarnet` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT pour la table `reclamation`
--
ALTER TABLE `reclamation`
  MODIFY `id_reclamation` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `adresses`
--
ALTER TABLE `adresses`
  ADD CONSTRAINT `Fk_client` FOREIGN KEY (`id_client`) REFERENCES `client` (`CLIENT_ID`),
  ADD CONSTRAINT `Fk_client_lve` FOREIGN KEY (`id_user`) REFERENCES `client_lve` (`CLIENT_ID`),
  ADD CONSTRAINT `fk_ville` FOREIGN KEY (`id_ville`) REFERENCES `ville` (`VILLE_COD`);

--
-- Contraintes pour la table `agences`
--
ALTER TABLE `client_lve_session`
  ADD CONSTRAINT `fk_ag_ref` FOREIGN KEY (`REFERENCIEE`) REFERENCES `client_lve` (`CLIENT_ID`);

--
-- Contraintes pour la table `client`
--
ALTER TABLE `client`
  ADD CONSTRAINT `fkclirntlive` FOREIGN KEY (`CLIENT_ID_client_lve`) REFERENCES `client_lve` (`CLIENT_ID`);

--
-- Contraintes pour la table `declaration_v`
--
ALTER TABLE `declaration_v`
  ADD CONSTRAINT `FKher_client` FOREIGN KEY (`client2_id`) REFERENCES `client` (`CLIENT_ID`),
  ADD CONSTRAINT `FKher_client_lve` FOREIGN KEY (`client1_id`) REFERENCES `client_lve` (`CLIENT_ID`),
  ADD CONSTRAINT `fkadresse` FOREIGN KEY (`id_adres`) REFERENCES `adresses` (`id_adresse`);

--
-- Contraintes pour la table `panierramasse`
--
ALTER TABLE `panierramasse`
  ADD CONSTRAINT `Fk_num_caar` FOREIGN KEY (`numeroCarnet`) REFERENCES `ramasse` (`numeroCarnet`),
  ADD CONSTRAINT `Fk_num_deec` FOREIGN KEY (`declaration`) REFERENCES `declaration_v` (`numero`);

--
-- Contraintes pour la table `points_relais`
--
ALTER TABLE `points_relais`
  ADD CONSTRAINT `fk_v_pr` FOREIGN KEY (`id_ville`) REFERENCES `ville` (`VILLE_COD`);

--
-- Contraintes pour la table `reclamation`
--
ALTER TABLE `reclamation`
  ADD CONSTRAINT `FK_ID_C` FOREIGN KEY (`idclient`) REFERENCES `client` (`CLIENT_ID`),
  ADD CONSTRAINT `fk_declarations` FOREIGN KEY (`num_declar`) REFERENCES `declaration_v` (`numero`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_num_user` FOREIGN KEY (`id_user`) REFERENCES `client_lve` (`CLIENT_ID`);

--
-- Contraintes pour la table `ville`
--
ALTER TABLE `ville`
  ADD CONSTRAINT `fk_agences` FOREIGN KEY (`AGENCE_COD`) REFERENCES `agence` (`AGENCE_COD`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
