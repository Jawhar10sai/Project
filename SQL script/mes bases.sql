-- Base de données :  `site_lara_lve`
--
CREATE DATABASE IF NOT EXISTS `site_lara_lve` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `site_lara_lve`;
--
-- Base de données :  `site_lara_lve_test`
--
CREATE DATABASE IF NOT EXISTS `site_lara_lve_test` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `site_lara_lve_test`;
--
-- Base de données :  `site_voieex`
--
CREATE DATABASE IF NOT EXISTS `site_voieex` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `site_voieex`;

-- --------------------------------------------------------

--
-- Structure de la table `agence`
--

CREATE TABLE `agence` (
  `COD_AGENCE` int(11) NOT NULL,
  `AGENCE_LIB` varchar(250) NOT NULL,
  `AG_A` int(11) NOT NULL,
  `AG_B` int(11) NOT NULL,
  `AG_C` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `agence`
--
ALTER TABLE `agence`
  ADD PRIMARY KEY (`COD_AGENCE`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `agence`
--
ALTER TABLE `agence`
  MODIFY `COD_AGENCE` int(11) NOT NULL AUTO_INCREMENT;
--
-- Base de données :  `site_voieex_test`
--
CREATE DATABASE IF NOT EXISTS `site_voieex_test` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `site_voieex_test`;

-- --------------------------------------------------------

--
-- Structure de la table `agence`
--

CREATE TABLE `agence` (
  `COD_AGENCE` int(11) NOT NULL,
  `AGENCE_LIB` varchar(250) NOT NULL,
  `AG_A` int(11) NOT NULL,
  `AG_B` int(11) NOT NULL,
  `AG_C` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `img_ref`
--

CREATE TABLE `img_ref` (
  `code_ref` int(20) NOT NULL,
  `emplacement` varchar(250) NOT NULL,
  `soc_lib` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `img_ref`
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

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `img_ref`
--
ALTER TABLE `img_ref`
  ADD PRIMARY KEY (`code_ref`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `img_ref`
--
ALTER TABLE `img_ref`
  MODIFY `code_ref` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;
--
-- Base de données :  `taxation`
--
CREATE DATABASE IF NOT EXISTS `taxation` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `taxation`;

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

--
-- Déchargement des données de la table `agence`
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
('600', 'Rabat', '77 rue london, l\'ocean', '0537262597'),
('650', 'Kenitra', '10 rue ibnou al banna, ville nouvelle', '0537379821'),
('700', 'Marrakech', '514 quartier industriel sidi ghanem', '0524336174'),
('800', 'Beni Mellal', '8JPR+MJ Beni Mellal', '0523483928');

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
  `adresse` text DEFAULT NULL,
  `ville` varchar(250) DEFAULT NULL,
  `telephone` varchar(250) DEFAULT NULL,
  `login` varchar(250) DEFAULT NULL,
  `mot_de_passe` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `client_lve_session`
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
-- Structure de la table `declaration_v`
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
  `date_modification` datetime NOT NULL DEFAULT current_timestamp()
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
  `datedesaisie` datetime NOT NULL DEFAULT current_timestamp(),
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
  `AGENCE_COD` varchar(4) DEFAULT NULL,
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

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `impcarnet`  AS  select distinct `vimpression`.`NomEx` AS `NomEx`,`vimpression`.`AdresseEx` AS `AdresseEx`,`vimpression`.`VilleEx` AS `VilleEx`,`vimpression`.`TelEx` AS `TelEx`,`vimpression`.`NomDest` AS `NomDest`,`vimpression`.`TelDest` AS `TelDest`,`vimpression`.`villeDest` AS `villeDest`,`vimpression`.`AdresseDest` AS `AdresseDest`,`vimpression`.`numero` AS `numero`,`vimpression`.`date` AS `date`,`vimpression`.`facture_id` AS `facture_id`,`vimpression`.`colis` AS `colis`,`vimpression`.`poids` AS `poids`,`vimpression`.`palettes` AS `palettes`,`vimpression`.`paletteA` AS `paletteA`,`vimpression`.`paletteB` AS `paletteB`,`vimpression`.`paletteC` AS `paletteC`,`vimpression`.`paletteAutre` AS `paletteAutre`,`vimpression`.`Nbre_palettes` AS `Nbre_palettes`,`vimpression`.`longueur` AS `longueur`,`vimpression`.`hauteur` AS `hauteur`,`vimpression`.`largeur` AS `largeur`,`vimpression`.`coef` AS `coef`,`vimpression`.`valeur` AS `valeur`,`vimpression`.`client1_id` AS `client1_id`,`vimpression`.`client2_id` AS `client2_id`,`vimpression`.`livraison` AS `livraison`,`vimpression`.`express` AS `express`,`vimpression`.`port` AS `port`,`vimpression`.`courrier_typ` AS `courrier_typ`,`vimpression`.`courrier_eta` AS `courrier_eta`,`vimpression`.`date_saisie` AS `date_saisie`,`vimpression`.`userid` AS `userid`,`vimpression`.`nature` AS `nature`,`vimpression`.`Espece` AS `Espece`,`vimpression`.`Cheque` AS `Cheque`,`vimpression`.`Traite` AS `Traite`,`vimpression`.`Nbre_BL` AS `Nbre_BL`,`vimpression`.`BL` AS `BL`,`vimpression`.`id_adres` AS `id_adres`,`vimpression`.`statut` AS `statut`,`vimpression`.`commentaire` AS `commentaire`,`panierramasse`.`numeroCarnet` AS `numeroCarnet`,`panierramasse`.`declaration` AS `declaration`,`panierramasse`.`etat` AS `etat`,`panierramasse`.`date_modification` AS `date_modification` from (`vimpression` join `panierramasse`) where `vimpression`.`numero` = `panierramasse`.`declaration` ;

-- --------------------------------------------------------

--
-- Structure de la vue `vadressess`
--
DROP TABLE IF EXISTS `vadressess`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vadressess`  AS  select `ad`.`id_adresse` AS `id_adresse`,`ad`.`lib_adresse` AS `lib_adresse`,`ad`.`id_client` AS `id_client`,`ad`.`id_user` AS `id_user`,`vl`.`VILLE_LIB` AS `VILLE_LIB`,`cl`.`CLIENT_COD` AS `CLIENT_COD` from ((`adresses` `ad` join `ville` `vl`) join `client` `cl`) where `ad`.`id_ville` = `vl`.`VILLE_COD` and `cl`.`CLIENT_ID` = `ad`.`id_client` ;

-- --------------------------------------------------------

--
-- Structure de la vue `vdeclaration`
--
DROP TABLE IF EXISTS `vdeclaration`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vdeclaration`  AS  select `declaration_v`.`numero` AS `numero`,`declaration_v`.`date` AS `date`,`declaration_v`.`facture_id` AS `facture_id`,`declaration_v`.`colis` AS `colis`,`declaration_v`.`poids` AS `poids`,`declaration_v`.`palettes` AS `palettes`,`declaration_v`.`paletteA` AS `paletteA`,`declaration_v`.`paletteB` AS `paletteB`,`declaration_v`.`paletteC` AS `paletteC`,`declaration_v`.`paletteAutre` AS `paletteAutre`,`declaration_v`.`Nbre_palettes` AS `Nbre_palettes`,`declaration_v`.`longueur` AS `longueur`,`declaration_v`.`hauteur` AS `hauteur`,`declaration_v`.`largeur` AS `largeur`,`declaration_v`.`coef` AS `coef`,`declaration_v`.`valeur` AS `valeur`,`declaration_v`.`client1_id` AS `client1_id`,`declaration_v`.`client2_id` AS `client2_id`,`declaration_v`.`livraison` AS `livraison`,`declaration_v`.`express` AS `express`,`declaration_v`.`port` AS `port`,`declaration_v`.`courrier_typ` AS `courrier_typ`,`declaration_v`.`courrier_eta` AS `courrier_eta`,`declaration_v`.`date_saisie` AS `date_saisie`,`declaration_v`.`userid` AS `userid`,`declaration_v`.`nature` AS `nature`,`declaration_v`.`Espece` AS `Espece`,`declaration_v`.`Cheque` AS `Cheque`,`declaration_v`.`Traite` AS `Traite`,`declaration_v`.`BL` AS `BL`,`declaration_v`.`id_adres` AS `id_adres`,`declaration_v`.`statut` AS `statut`,`declaration_v`.`commentaire` AS `commentaire`,`client`.`CLIENT_ID` AS `CLIENT_ID`,`client`.`NOM` AS `NOM`,`client`.`PRENOM` AS `PRENOM`,`client`.`CLIENT_COD` AS `CLIENT_COD`,`client`.`CLIENT_ID_client_lve` AS `CLIENT_ID_client_lve`,`client`.`telephone` AS `telephone`,`ville`.`VILLE_LIB` AS `ville`,`adresses`.`lib_adresse` AS `Adresse` from (((`declaration_v` join `client`) join `ville`) join `adresses`) where `declaration_v`.`client1_id` = `client`.`CLIENT_ID_client_lve` and `ville`.`VILLE_COD` = `adresses`.`id_ville` and `declaration_v`.`client2_id` = `client`.`CLIENT_ID` and `adresses`.`id_client` in (select `declaration_v`.`client2_id` from (`declaration_v` join `client`) where `declaration_v`.`client2_id` = `client`.`CLIENT_ID`) and `adresses`.`id_adresse` = `declaration_v`.`id_adres` ;

-- --------------------------------------------------------

--
-- Structure de la vue `vimpression`
--
DROP TABLE IF EXISTS `vimpression`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vimpression`  AS  select distinct `client_lve`.`NOM` AS `NomEx`,`client_lve`.`adresse` AS `AdresseEx`,`client_lve`.`ville` AS `VilleEx`,`client_lve`.`telephone` AS `TelEx`,`client`.`NOM` AS `NomDest`,`client`.`telephone` AS `TelDest`,`adresses`.`id_ville` AS `villeDest`,`adresses`.`lib_adresse` AS `AdresseDest`,`declaration_v`.`numero` AS `numero`,`declaration_v`.`date` AS `date`,`declaration_v`.`facture_id` AS `facture_id`,`declaration_v`.`colis` AS `colis`,`declaration_v`.`poids` AS `poids`,`declaration_v`.`palettes` AS `palettes`,`declaration_v`.`paletteA` AS `paletteA`,`declaration_v`.`paletteB` AS `paletteB`,`declaration_v`.`paletteC` AS `paletteC`,`declaration_v`.`paletteAutre` AS `paletteAutre`,`declaration_v`.`Nbre_palettes` AS `Nbre_palettes`,`declaration_v`.`longueur` AS `longueur`,`declaration_v`.`hauteur` AS `hauteur`,`declaration_v`.`largeur` AS `largeur`,`declaration_v`.`coef` AS `coef`,`declaration_v`.`valeur` AS `valeur`,`declaration_v`.`client1_id` AS `client1_id`,`declaration_v`.`client2_id` AS `client2_id`,`declaration_v`.`livraison` AS `livraison`,`declaration_v`.`express` AS `express`,`declaration_v`.`port` AS `port`,`declaration_v`.`courrier_typ` AS `courrier_typ`,`declaration_v`.`courrier_eta` AS `courrier_eta`,`declaration_v`.`date_saisie` AS `date_saisie`,`declaration_v`.`userid` AS `userid`,`declaration_v`.`nature` AS `nature`,`declaration_v`.`Espece` AS `Espece`,`declaration_v`.`Cheque` AS `Cheque`,`declaration_v`.`Traite` AS `Traite`,`declaration_v`.`Nbre_BL` AS `Nbre_BL`,`declaration_v`.`BL` AS `BL`,`declaration_v`.`id_adres` AS `id_adres`,`declaration_v`.`statut` AS `statut`,`declaration_v`.`commentaire` AS `commentaire` from ((((`adresses` join `client`) join `client_lve`) join `ville`) join `declaration_v`) where `declaration_v`.`client1_id` = `client`.`CLIENT_ID_client_lve` and `declaration_v`.`client2_id` = `client`.`CLIENT_ID` and `ville`.`VILLE_COD` = `adresses`.`id_ville` and `declaration_v`.`id_adres` = `adresses`.`id_adresse` and `client`.`CLIENT_ID_client_lve` = `client_lve`.`CLIENT_ID` ;

-- --------------------------------------------------------

--
-- Structure de la vue `vu_declaration`
--
DROP TABLE IF EXISTS `vu_declaration`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vu_declaration`  AS  select `declaration_v`.`numero` AS `numero`,`declaration_v`.`date` AS `date`,`declaration_v`.`facture_id` AS `facture_id`,`declaration_v`.`colis` AS `colis`,`declaration_v`.`poids` AS `poids`,`declaration_v`.`palettes` AS `palettes`,`declaration_v`.`paletteA` AS `paletteA`,`declaration_v`.`paletteB` AS `paletteB`,`declaration_v`.`paletteC` AS `paletteC`,`declaration_v`.`paletteAutre` AS `paletteAutre`,`declaration_v`.`Nbre_palettes` AS `Nbre_palettes`,`declaration_v`.`longueur` AS `longueur`,`declaration_v`.`hauteur` AS `hauteur`,`declaration_v`.`largeur` AS `largeur`,`declaration_v`.`coef` AS `coef`,`declaration_v`.`valeur` AS `valeur`,`declaration_v`.`client1_id` AS `client1_id`,`declaration_v`.`client2_id` AS `client2_id`,`declaration_v`.`livraison` AS `livraison`,`declaration_v`.`express` AS `express`,`declaration_v`.`port` AS `port`,`declaration_v`.`courrier_typ` AS `courrier_typ`,`declaration_v`.`courrier_eta` AS `courrier_eta`,`declaration_v`.`date_saisie` AS `date_saisie`,`declaration_v`.`userid` AS `userid`,`declaration_v`.`nature` AS `nature`,`declaration_v`.`Espece` AS `Espece`,`declaration_v`.`Cheque` AS `Cheque`,`declaration_v`.`Traite` AS `Traite`,`declaration_v`.`BL` AS `BL`,`declaration_v`.`id_adres` AS `id_adres`,`declaration_v`.`statut` AS `statut`,`declaration_v`.`commentaire` AS `commentaire`,`client`.`CLIENT_ID` AS `CLIENT_ID`,`client`.`NOM` AS `NOM`,`client`.`PRENOM` AS `PRENOM`,`client`.`CLIENT_COD` AS `CLIENT_COD`,`client`.`CLIENT_ID_client_lve` AS `CLIENT_ID_client_lve`,`client`.`telephone` AS `telephone`,`adresses`.`lib_adresse` AS `Adresse`,`ville`.`VILLE_LIB` AS `Ville` from (((`declaration_v` join `client`) join `ville`) join `adresses`) where `declaration_v`.`client1_id` = `client`.`CLIENT_ID_client_lve` and `declaration_v`.`client2_id` = `client`.`CLIENT_ID` and `ville`.`VILLE_COD` = `adresses`.`id_ville` and `client`.`CLIENT_ID` = `adresses`.`id_client` and `declaration_v`.`client1_id` = `adresses`.`id_user` and `declaration_v`.`id_adres` = `adresses`.`id_adresse` ;

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
-- Index pour la table `client_lve_session`
--
ALTER TABLE `client_lve_session`
  ADD PRIMARY KEY (`AGENCE_COD`) USING BTREE,
  ADD KEY `fk_ag_ref` (`REFERENCIEE`);

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

--
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
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `adresses`
--
ALTER TABLE `adresses`
  MODIFY `id_adresse` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `client`
--
ALTER TABLE `client`
  MODIFY `CLIENT_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `client_lve`
--
ALTER TABLE `client_lve`
  MODIFY `CLIENT_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `points_relais`
--
ALTER TABLE `points_relais`
  MODIFY `id_pr` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `ramasse`
--
ALTER TABLE `ramasse`
  MODIFY `numeroCarnet` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `reclamation`
--
ALTER TABLE `reclamation`
  MODIFY `id_reclamation` int(11) NOT NULL AUTO_INCREMENT;

--
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
-- Contraintes pour la table `client`
--
ALTER TABLE `client`
  ADD CONSTRAINT `fkclirntlive` FOREIGN KEY (`CLIENT_ID_client_lve`) REFERENCES `client_lve` (`CLIENT_ID`);

--
-- Contraintes pour la table `client_lve_session`
--
ALTER TABLE `client_lve_session`
  ADD CONSTRAINT `fk_ag_ref` FOREIGN KEY (`REFERENCIEE`) REFERENCES `client_lve` (`CLIENT_ID`);

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
--
-- Base de données :  `taxation_archive`
--
CREATE DATABASE IF NOT EXISTS `taxation_archive` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `taxation_archive`;

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
  `adresse` text DEFAULT NULL,
  `ville` varchar(250) DEFAULT NULL,
  `telephone` varchar(250) DEFAULT NULL,
  `login` varchar(250) DEFAULT NULL,
  `mot_de_passe` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `client_lve_session`
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
-- Structure de la table `declaration_v`
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
  `commentaire` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `panierramasse`
--

CREATE TABLE `panierramasse` (
  `numeroCarnet` int(11) NOT NULL,
  `declaration` varchar(50) NOT NULL,
  `etat` varchar(50) NOT NULL DEFAULT 'En cours',
  `motif_annulation` varchar(250) NOT NULL,
  `date_modification` datetime NOT NULL DEFAULT current_timestamp()
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
  `datedesaisie` datetime NOT NULL DEFAULT current_timestamp(),
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
-- Structure de la table `ville`
--

CREATE TABLE `ville` (
  `VILLE_COD` int(11) NOT NULL,
  `AGENCE_COD` varchar(4) DEFAULT NULL,
  `VILLE_LIB` varchar(64) NOT NULL,
  `VILLE_TYP` char(2) DEFAULT NULL,
  `DELAI` int(11) DEFAULT NULL,
  `ZONE_COD` char(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
  ADD PRIMARY KEY (`id_adresse`);

--
-- Index pour la table `agence`
--
ALTER TABLE `agence`
  ADD PRIMARY KEY (`AGENCE_COD`);

--
-- Index pour la table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`CLIENT_ID`);

--
-- Index pour la table `client_lve`
--
ALTER TABLE `client_lve`
  ADD PRIMARY KEY (`CLIENT_ID`);

--
-- Index pour la table `client_lve_session`
--
ALTER TABLE `client_lve_session`
  ADD PRIMARY KEY (`AGENCE_COD`);

--
-- Index pour la table `declaration_v`
--
ALTER TABLE `declaration_v`
  ADD PRIMARY KEY (`numero`);

--
-- Index pour la table `panierramasse`
--
ALTER TABLE `panierramasse`
  ADD PRIMARY KEY (`numeroCarnet`);

--
-- Index pour la table `points_relais`
--
ALTER TABLE `points_relais`
  ADD PRIMARY KEY (`id_pr`);

--
-- Index pour la table `reclamation`
--
ALTER TABLE `reclamation`
  ADD PRIMARY KEY (`id_reclamation`);

--
-- Index pour la table `ville`
--
ALTER TABLE `ville`
  ADD PRIMARY KEY (`VILLE_COD`);
--
-- Base de données :  `taxation_test`
--
CREATE DATABASE IF NOT EXISTS `taxation_test` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `taxation_test`;

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

--
-- Déchargement des données de la table `admin`
--

INSERT INTO `admin` (`id_admin`, `adminname`, `password`, `mailadmin`) VALUES
(1, 'admin', 'admin', 'admin@lve.supp.com');

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

--
-- Déchargement des données de la table `adresses`
--

INSERT INTO `adresses` (`id_adresse`, `lib_adresse`, `id_client`, `id_user`, `id_ville`) VALUES
(52, 'Mhamid 9 Lotissement Gharnata No 10', 1, 1, 100),
(54, 'adresse 3', 3, 1, 102),
(55, 'adresse 1azertyui 123 qsdfghjk', 4, 1, 103),
(56, 'Adressse 2', 5, 1, 104),
(57, '$$*rfffffffffffffffffhh', 9, 1, 105),
(58, 'wwwwwwwwwwww', 10, 1, 106),
(59, 'Adresse de FFF', 11, 1, 107),
(60, '22 rue mamonia, EL yassamine', 12, 1, 109),
(61, 'CSEGZ bd 25 SEBT GZOULA', 13, 1, 110),
(62, 'hhhhhh hhhhh 73 hhhhh', 14, 1, 111),
(63, 'rfffffffffffffffffffhhhh', 15, 1, 112),
(64, 'rfffffffffffffffffffhhhh', 16, 1, 100),
(65, 'vvvvvvvvv', 17, 1, 100),
(66, 'cccccccccccccccc', 18, 1, 101),
(67, 'rfffffffffffffffffffhhhh', 19, 1, 101),
(68, 'KKKKKK', 20, 1, 110),
(69, 'hh3333', 81, 1, 150),
(70, 'hh22', 81, 1, 120),
(71, 'Adressse 33', 5, 1, 300),
(72, 'eeeeeeeeeeeeeee', 12, 1, 109),
(73, 'hh', 21, 1, 500),
(74, 'fffffffffffffffffffffffffff55', 11, 1, 107),
(76, 'BOUZfffffffffffffffffffffffffff55', 11, 1, 107),
(77, 'Adressse 25', 21, 1, 300),
(82, 'fffffffffffffffffffffffffff60', 11, 1, 107),
(83, 'ppppppppp', 82, 1, 600),
(84, 'ppppppp', 82, 1, 600),
(89, 'Adressse 25 Casa', 21, 1, 100),
(100, 'hh', 21, 1, 500),
(120, 'YYYYYYYYYYYYYYYY', 85, 4, 128),
(121, 'yyyyyyyyyyyyyyyyyyyy', 84, 4, 126),
(122, 'YYYYYYYYY', 85, 4, 125),
(123, 'rrrrrrr778', 86, 4, 129),
(124, 'hhhhhhhhhhhhhhhh', 88, 4, 124),
(125, 'rrrrrrr', 87, 4, 129),
(126, 'khyayta', 86, 4, 100),
(128, '55 bd m23 Der', 89, 5, 718),
(129, 'YYYYYYYYYYYYYYYY', 82, 1, 128),
(130, 'YYYYYYYYYYYYYYYY', 82, 1, 128),
(131, '78 bd mly Ismail', 90, 5, 100),
(132, '7777 Roches noires', 91, 6, 100),
(133, '7884 Casper', 92, 6, 373),
(134, '34 rue abdelkarim el khattabi, HASSAN', 93, 3, 600),
(135, '55 Rue Abdelattif ben kaddour', 94, 3, 100),
(136, '66 rue hh ble', 95, 3, 401),
(137, '30 derb ghallef', 96, 3, 905),
(138, '50 bd el mernissi', 97, 3, 373),
(139, '22 Bernoussi', 98, 3, 501),
(140, '22 Bee', 99, 3, 152),
(141, '22 Bee', 99, 3, 152),
(142, '22 Bee', 99, 3, 152),
(143, '22 Bee', 99, 3, 152),
(144, '22 Bee', 99, 3, 152),
(145, '22 Bee', 99, 3, 152),
(146, '22 Bee', 99, 3, 152),
(147, '22 Bee', 99, 3, 152),
(148, '22 Bee', 99, 3, 152),
(154, 'hh', 21, 1, 500),
(157, '39 bd ezziraoui', 100, 3, 100),
(158, '55 bd M5', 101, 3, 600),
(159, '77 bd hassan 2 ', 102, 3, 700),
(160, '10 rue el houssaini', 103, 3, 214),
(161, '14 karimi reg 20000', 104, 3, 660),
(162, '999 rue noussairi', 105, 6, 718),
(163, '10 rue jiahna', 106, 6, 501),
(164, '73 Bd Zerktouni, El Maarif ', 107, 1, 100),
(165, 'hh2256', 81, 1, 120),
(166, '78 Bd Omar El moukhtar', 108, 1, 300),
(167, '88 rue Argane Adrar ', 109, 7, 300),
(168, '79 bd Morabet Ain sebÃ¢', 110, 1, 100),
(169, '79 bd Ennassim Zenata', 111, 1, 100),
(170, '55 bd Al Quds Bernoussi', 112, 1, 100),
(171, 'bd em Mouhdadi Zenata', 23, 1, 100),
(174, '18 Avenue HASSAN II', 113, 10, 200);

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

--
-- Déchargement des données de la table `agence`
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
('600', 'Rabat', '77 rue london, l\'ocean', '0537262597'),
('650', 'Kenitra', '10 rue ibnou al banna, ville nouvelle', '0537379821'),
('700', 'Marrakech', '514 quartier industriel sidi ghanem', '0524336174'),
('800', 'Beni Mellal', '8JPR+MJ Beni Mellal', '0523483928');

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

--
-- Déchargement des données de la table `client`
--

INSERT INTO `client` (`CLIENT_ID`, `NOM`, `PRENOM`, `CIVILITE_COD`, `CLIENT_TYP`, `IDENTITE_TYP`, `IDENTITE_VAL`, `ID_FISCALE`, `CAPITAL_SOC`, `CREATION_DAT`, `CLIENT_ETA`, `MOTIF_ETA`, `SECTEUR_COD`, `EMPLOYE_ID`, `SAISIE_DAT`, `AGENCE_COD`, `CLIENT_COD`, `commentaire`, `mail`, `ICE`, `CLIENT_ID_client_lve`, `telephone`) VALUES
(1, 'ABIR ', 'Mohamed', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '11111', NULL, NULL, NULL, 1, '06 54 77 11 26'),
(2, 'n2n', 'n2n', '', '', '', '', '', '100', '0000-00-00', 'a', 100, '', 100, NULL, '', '11112', '', '', '', 1, '+0661123465'),
(3, 'n3', 'n3', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '11113', NULL, NULL, NULL, 1, '123'),
(4, 'lve dÃ©c', 'lve dÃ©c', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '11114', NULL, NULL, NULL, 1, '+0661123465'),
(5, 'Mmm', 'Nnn', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '11115', NULL, NULL, NULL, 1, '+21255889966'),
(9, 'NNN', 'Mnn', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '11116', NULL, NULL, NULL, 1, '0523232323'),
(10, 'WWW', 'www', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '11117', NULL, NULL, NULL, 1, '05222222222'),
(11, 'FFF', 'fff', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '11118', NULL, NULL, NULL, 1, '107'),
(12, 'EEEE', 'eee', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '11119', NULL, NULL, NULL, 1, '066666666'),
(13, 'GGGG', 'gggg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '11120', NULL, NULL, NULL, 1, '0588888888'),
(14, 'HHHH', 'hhhh', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '11121', NULL, NULL, NULL, 1, '+212524242424'),
(15, 'JJJJJJ', 'gggg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '11122', NULL, NULL, NULL, 1, '0523232323'),
(16, 'LLLL', 'lll', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '11123', NULL, NULL, NULL, 1, '0523232323'),
(17, 'vvvvvvv', 'vvvvvv', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '11124', NULL, NULL, NULL, 1, '55555555555'),
(18, 'cccccccc', 'ccccccccccc', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '11125', NULL, NULL, NULL, 1, '777777777777777'),
(19, 'KKKCC', 'ccccccc', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '11126', NULL, NULL, NULL, 1, '0523232323'),
(20, 'KKKK', 'kkkk', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '11127', NULL, NULL, NULL, 1, '0523232323'),
(21, 'Mmm', 'Nnn', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '11128', NULL, NULL, NULL, 1, '+21255889966'),
(22, 'HNN', 'hnn', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '11130', NULL, NULL, NULL, 1, '0537373737'),
(23, 'HMM', 'HMM', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '11131', NULL, NULL, NULL, 1, '0537373737'),
(81, 'KKLL', 'HMM', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '11132', NULL, NULL, NULL, 1, '0569656565'),
(82, 'HNN', 'HMM', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '11133', NULL, NULL, NULL, 1, 'fffffffff'),
(84, 'YYYY', 'yyyy', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '141414', NULL, NULL, NULL, 4, '0588888888'),
(85, 'YYYYYYYYyy', 'YYYYYYYY', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '141141', NULL, NULL, NULL, 4, '0588888888'),
(86, 'RRR', 'rrr', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12222', NULL, NULL, NULL, 4, '0223333333'),
(87, 'rrrrrr', 'rrrrrrrrrr', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12223', NULL, NULL, NULL, 4, ''),
(88, 'hhhhh', 'hhhhhhh', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '55555', NULL, NULL, NULL, 4, '555555555'),
(89, 'Heu mea', 'morica', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '558899', NULL, NULL, NULL, 5, '0522363255'),
(90, 'Xiaomi', 'mi', '', '', '', '', '', '100', '0000-00-00', 'a', 100, '', 100, NULL, '', '558898', '', 'mi.support@xiaomi.com', '', 5, '0522114254'),
(91, 'Bosh', 'Casa', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '552424', NULL, NULL, NULL, 6, '0522332265'),
(92, 'Hmm', 'mHh', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '774477', NULL, NULL, NULL, 6, '0524242424'),
(93, 'Ndesign', 'Cas', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '556622', NULL, NULL, NULL, 3, '0537885241'),
(94, 'MMdes', 'cam', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '557744', NULL, NULL, NULL, 3, '0522323266'),
(95, 'Cam', 'tasia', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '665522', NULL, NULL, NULL, 3, '0588669955'),
(96, 'Kam', 'Cam', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '888999', NULL, NULL, NULL, 3, '0522663344'),
(97, 'Kam', 'kam', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '888777', NULL, NULL, NULL, 3, '0522663344'),
(98, 'Kam', 'Camera', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '888776', NULL, NULL, NULL, 3, '0538996585'),
(99, 'Kam', 'Camera', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '888779', NULL, NULL, NULL, 3, '0538996585'),
(100, 'Msi', 'techno', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '888552', NULL, NULL, NULL, 3, '0522478895'),
(101, 'Nikon', 'Prod', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '885522', NULL, NULL, NULL, 3, '0537225362'),
(102, 'Panoramic', 'cams', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '664455', NULL, NULL, NULL, 3, '0524106633'),
(103, 'mmllCams', 'Jap', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '774488', NULL, NULL, NULL, 3, '0544663635'),
(104, 'PO', 'cam', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '669966', NULL, NULL, NULL, 3, '0538525262'),
(105, 'Hulet', 'packard', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '551422', NULL, NULL, NULL, 6, '0514221422'),
(106, 'kkkkkljs', 'jhkdhjghfd', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '774857', NULL, NULL, NULL, 6, '0525346787'),
(107, 'Mohammed', 'Hamid', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '107', NULL, NULL, NULL, 1, '0522352352'),
(108, 'Mrabet', 'Hamid', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '11134', NULL, NULL, NULL, 1, '300'),
(109, 'Steve', 'Jobs', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '566689', NULL, NULL, NULL, 7, '0588565656'),
(110, 'Pharmacie', 'Phar', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '110', NULL, NULL, NULL, 1, '0522653265'),
(111, 'Pharmacie Narjis', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '111', NULL, NULL, NULL, 1, '0522113366'),
(112, 'Pharmacie Ennassim', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '0522363636'),
(113, 'Test', 'Client', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '45854', NULL, NULL, NULL, 10, '0616161616');

-- --------------------------------------------------------

--
-- Doublure de structure pour la vue `clientsnombres`
-- (Voir ci-dessous la vue réelle)
--
CREATE TABLE `clientsnombres` (
`NOM` varchar(250)
,`total_declars` bigint(21)
,`total_sous_clients` bigint(21)
,`total_session` bigint(21)
);

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
  `adresse` text DEFAULT NULL,
  `ville` varchar(250) DEFAULT NULL,
  `telephone` varchar(250) DEFAULT NULL,
  `login` varchar(250) DEFAULT NULL,
  `mot_de_passe` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `client_lve`
--

INSERT INTO `client_lve` (`CLIENT_ID`, `CLIENT_COD`, `NOM`, `PRENOM`, `CIVILITE_COD`, `CLIENT_TYP`, `IDENTITE_TYP`, `IDENTITE_VAL`, `ID_FISCALE`, `CAPITAL_SOC`, `CREATION_DAT`, `CLIENT_ETA`, `MOTIF_ETA`, `SECTEUR_COD`, `EMPLOYE_ID`, `SAISIE_DAT`, `AGENCE_COD`, `CLIENT_COD2`, `debinterval`, `fininterval`, `intervalag_deb`, `intervalag_fin`, `commentaire`, `mail`, `ICE`, `adresse`, `ville`, `telephone`, `login`, `mot_de_passe`) VALUES
(1, '11129', 'SYNTHEMEDIC', 'Medic', '1', '1', 'de', NULL, '852963741', '40000055', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'E0000', 3040, 3400, 3004, 3020, NULL, 'SYNTHEMEDIC@contact.com', 'SY1515152323', 'BD CHEFCHAOUNI ROUTE 110KM 10,30 SIDI BERNOUSSI', 'Casablanca', '0522334455', '11129', '11129'),
(2, '11178', 'Samsung', '', '', '1', 'de', NULL, '74185296633', '9999999999', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'S0000', 4000, 4200, 4001, 4020, NULL, 'support@samsung.com', 'SS8589965856', 'Casanershore', 'Casablanca', '0522444444', '11178', '11178'),
(3, '552623', 'Canon', 'INC', '', '1', 'de', NULL, '5444755485', '200000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'C0000', 1005, 2000, 1000, 1020, NULL, 'canoninc@gmail.com', '4454755485', '73 bd Molay Ismail', 'Casablanca', '0522666666', '444545', '444545'),
(4, '78999', 'HP', 'Tec', '', '1', 'de', NULL, '7844444458', '300000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'H0000', 5006, 5200, 5000, 5000, NULL, 'hptec@gmail.com', 'hp789523658', '73 bd Med V', 'Casablanca', '0522777777', '78999', '78999'),
(5, '74444', 'Huawei', 'Tec', '', '1', 'de', NULL, '4585859568', '4585859568', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'HU00', 80003, 80200, 80001, 80020, NULL, 'huawei@support.com', '745858585', '73 rue victor hugo', 'Casablanca', '0522242424', '74444', '74444'),
(6, '88888', 'BOSH', 'log', '', '1', 'de', NULL, '4585866666', '78000000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'B002D', 90002, 90200, 90001, 90020, NULL, 'BOSHlog@BOSH.fr', '8585858747', '73 rue des graves', 'Casablanca', '0522266666', '88888', '88888'),
(7, '99999', 'Apple', 'Tech', '', '', 'de', NULL, '666665253362', '51204120000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'A0000', 5001, 5200, 13, 23, NULL, 'apple@support.apple.com', '8585556856', '73 rue Enbu Al arabi', 'Casablanca', '0522568956', '99999', '99999'),
(8, '784596', 'Logi', 'Prod', '', '', 'de', NULL, '5522356455', '400000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'L000L', 5500, 5700, 0, 0, NULL, 'logisupport@loprod.com', '5487544578', '50 rue Al jiahna Bernoussi', 'Casablanca', '0522656356', 'Logigi99', 'Logigi99'),
(9, '963258', 'Oumatech', ' ', '', '', NULL, NULL, '25445441e544', '502541000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'E00', 2500, 3500, 0, 0, NULL, 'oumatech@gmail.com', '4124121452', 'bd omar el khayam', 'Casablanca', '0522412141', '963258', '852369'),
(10, '85658', 'Aksal', NULL, '', '', 'de', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-10-18', NULL, 'E000', 1001, 2000, 1010, 1020, NULL, 'n.bouadib@groupaksal.com', '000035911000015', '1, Angle Boulevard de la Corniche et Boulevard de l’Océan Atlantique, Ain Diab. Casablanca', 'Casablanca', '0522792121', '85658', '85658');

-- --------------------------------------------------------

--
-- Structure de la table `client_lve_session`
--

CREATE TABLE `client_lve_session` (
  `AGENCE_COD` varchar(50) NOT NULL,
  `AGENCE_LIB` varchar(100) NOT NULL,
  `REFERENCIEE` int(11) NOT NULL,
  `LOGIN` varchar(50) NOT NULL,
  `MOT_D_PASS` varchar(50) NOT NULL,
  `IDENTITE_TYP` char(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `client_lve_session`
--

INSERT INTO `client_lve_session` (`AGENCE_COD`, `AGENCE_LIB`, `REFERENCIEE`, `LOGIN`, `MOT_D_PASS`, `IDENTITE_TYP`) VALUES
('BOSH/90001', 'BOSH-Casa', 6, 'BOSH/90001', 'BOSH/90001', 'de'),
('Huawei/80001', 'Huawei-Casa', 5, 'Huawei/80001', '6f05f658c58f3bcb9e63afd4c87d774f3951daa9', 'de'),
('Samsung/4001', 'Sams-Casa', 2, 'Samsung/4001', '012446f77548059562d5b3bf97d244480f1e8131', ''),
('SYNTHEMEDIC/3001', 'Synth-Casa', 1, 'SYNTHEMEDIC/3001', 'SYNTHEMEDIC/3001', 'de'),
('SYNTHEMEDIC/3002', 'Synth-Rabat', 1, 'SYNTHEMEDIC/3002', 'SYNTHEMEDIC/3002', 'de'),
('SYNTHEMEDIC/3003', 'Synth-Marrakech', 1, 'SYNTHEMEDIC/3003', 'SYNTHEMEDIC/3003', 'de'),
('SYNTHEMEDIC/3004', 'Synth-Tanger', 1, 'SYNTHEMEDIC/3004', 'SYNTHEMEDIC/3004', 'de');

-- --------------------------------------------------------

--
-- Structure de la table `declaration_v`
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
  `commentaire` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `declaration_v`
--

INSERT INTO `declaration_v` (`numero`, `date`, `facture_id`, `colis`, `poids`, `palettes`, `paletteA`, `paletteB`, `paletteC`, `paletteAutre`, `Nbre_palettes`, `longueur`, `hauteur`, `largeur`, `coef`, `valeur`, `client1_id`, `client2_id`, `livraison`, `express`, `port`, `courrier_typ`, `courrier_eta`, `date_saisie`, `userid`, `nature`, `Espece`, `Cheque`, `Traite`, `Nbre_BL`, `BL`, `id_adres`, `statut`, `commentaire`) VALUES
('A00005001', '2019-07-23', NULL, 5, '32.00', NULL, 2, 0, 0, 0, 2, '2.00', '5.00', '2.00', '20.00', '120.00', 7, 109, 'D', 'S', 'D', 'M', 'S', '2019-07-23 10:31:59', NULL, 'Fragile', '3500.00', '350.00', '2950.00', 0, '', 167, '', ''),
('B002D90001', '2019-06-14', NULL, 2, '70.00', NULL, 0, 0, 0, 0, 0, '0.00', '0.00', '0.00', NULL, '1500.00', 6, 91, 'G', 'S', 'P', 'M', 'L', '2019-06-14 17:48:59', NULL, 'Normal', '1500.00', '0.00', '650.00', 0, ' BL17;', 132, '', ''),
('C00001001', '2019-06-17', NULL, 4, '30.00', NULL, 0, 0, 0, 0, 0, '0.00', '0.00', '0.00', NULL, '1200.00', 3, 93, 'p', 'S', 'P', '25', 'P', '2019-06-17 08:46:49', NULL, 'Normal', '0.00', '0.00', '0.00', 0, 'BL1;', 134, '', ''),
('C00001002', '2019-06-17', NULL, 5, '50.00', NULL, 0, 0, 0, 0, 0, '0.00', '0.00', '0.00', NULL, '1500.00', 3, 94, 'G', 'S', 'P', 'M', 'S', '2019-06-17 08:52:24', NULL, 'Normal', '0.00', '0.00', '20.00', 0, ' ', 135, '', ''),
('C00001003', '2019-06-17', NULL, 2, '10.00', NULL, 0, 0, 0, 0, 0, '0.00', '0.00', '0.00', NULL, '0.00', 3, 95, 'G', 'S', 'P', 'M', 'S', '2019-06-17 09:02:54', NULL, 'Normal', '500.00', '0.00', '0.00', 0, ' ', 136, '', ''),
('C00001004', '2019-06-17', NULL, 2, '20.00', NULL, 0, 0, 0, 0, 0, '0.00', '0.00', '0.00', NULL, '0.00', 3, 98, 'G', 'S', 'P', 'M', 'A', '2019-06-17 10:51:53', NULL, 'Normal', '0.00', '0.00', '0.00', 0, ' ', 139, '', ''),
('C00001005', '2019-06-17', NULL, 6, '10.00', NULL, 0, 0, 0, 0, 0, '0.00', '0.00', '0.00', NULL, '1700.00', 3, 98, 'G', 'S', 'P', 'M', 'R', '2019-06-17 10:54:28', NULL, 'Normal', '0.00', '0.00', '0.00', 0, ' ', 139, '', ''),
('E00003006', '2019-05-24', NULL, 3, '30.00', NULL, 0, 0, 0, 0, 0, '0.00', '0.00', '0.00', NULL, '950.00', 1, 21, 'G', 'X', 'P', 'M', NULL, '2019-05-24 13:53:26', NULL, 'TrÃ¨s fragile', '950.00', '1500.00', '20.00', 0, 'BL1', 100, '', ''),
('E00003007', '2019-05-24', NULL, 2, '20.00', NULL, 0, 0, 0, 0, 0, '0.00', '0.00', '0.00', NULL, '400.00', 1, 11, 'G', 'X', 'P', 'U', NULL, '2019-05-24 13:55:24', NULL, 'Normal', '200.00', '200.00', '20.00', 0, 'BL2', 82, '', ''),
('E00003008', '2019-05-28', NULL, 4, '150.00', NULL, 0, 0, 0, 0, 0, '0.00', '0.00', '0.00', NULL, '15.00', 1, 11, 'G', 'S', 'P', 'L', NULL, '2019-05-28 10:54:59', NULL, 'Normal', '0.00', '0.00', '0.00', 0, ' ', 76, '', ''),
('E00003009', '2019-05-28', NULL, 3, '40.00', NULL, 0, 0, 0, 0, 0, '0.00', '0.00', '0.00', NULL, '0.00', 1, 21, 'G', 'X', 'P', 'M', 'R', '2019-05-28 12:25:04', NULL, 'Normal', '0.00', '0.00', '0.00', 0, ' ', 73, '', ''),
('E00003010', '2019-05-28', NULL, 3, '40.00', NULL, 0, 0, 0, 0, 0, '0.00', '0.00', '0.00', NULL, '0.00', 1, 21, 'G', 'X', 'P', 'M', 'L', '2019-05-28 14:11:12', NULL, 'Normal', '1500.00', '0.00', '0.00', 0, ' ', 77, '', ''),
('E00003012', '2019-05-29', NULL, 4, '50.00', NULL, 0, 0, 0, 0, 0, '0.00', '0.00', '0.00', NULL, '0.00', 1, 82, 'G', 'S', 'P', 'M', NULL, '2019-05-29 11:23:37', NULL, 'Normal', '0.00', '0.00', '0.00', 0, ' ', 84, '', ''),
('E00003013', '2019-05-30', NULL, 2, '35.00', NULL, 0, 0, 0, 0, 0, '0.00', '0.00', '0.00', NULL, '0.00', 1, 21, 'G', 'S', 'P', 'M', NULL, '2019-05-30 10:39:20', NULL, 'Normal', '0.00', '0.00', '0.00', 0, ' ', 89, '', ''),
('E00003018', '2019-05-30', NULL, 2, '10.00', NULL, 0, 0, 0, 0, 0, '0.00', '0.00', '0.00', NULL, '0.00', 1, 82, 'G', 'S', 'P', 'M', NULL, '2019-05-30 13:46:51', NULL, 'Normal', '0.00', '0.00', '0.00', 0, ' ', 84, '', ''),
('E00003019', '2019-06-14', NULL, 5, '556.00', NULL, 0, 0, 0, 0, 0, '0.00', '0.00', '0.00', NULL, '0.00', 1, 82, 'G', 'S', 'P', 'M', NULL, '2019-06-14 10:46:46', NULL, 'Normal', '0.00', '0.00', '1500.00', 0, ' ', 120, '', ''),
('E00003020', '2019-06-17', NULL, 5, '10.00', NULL, 0, 0, 0, 0, 0, '0.00', '0.00', '0.00', NULL, '0.00', 1, 21, 'G', 'S', 'P', 'M', 'S', '2019-06-17 10:43:57', NULL, 'Normal', '0.00', '0.00', '0.00', 0, ' ', 154, '', ''),
('E00003021', '2019-06-19', NULL, 3, '20.00', NULL, 0, 0, 0, 0, 0, '0.00', '0.00', '0.00', NULL, '0.00', 1, 21, 'G', 'S', 'P', 'M', 'A', '2019-06-19 14:53:15', NULL, 'Normal', '0.00', '0.00', '0.00', 0, ' ', 73, '', ''),
('E00003022', '2019-07-08', NULL, 5, '50.00', NULL, 0, 0, 0, 0, 0, '0.00', '0.00', '0.00', NULL, '100.00', 1, 20, 'D', 'S', 'P', '5', NULL, '2019-07-08 09:57:19', NULL, 'Normal', '300.00', '110.00', '0.00', 0, 'BL2;', 68, '', ''),
('E00003023', '2019-07-15', NULL, 2, '20.00', NULL, 0, 0, 0, 0, 5, '10.00', '10.00', '10.00', '1000.00', '100.00', 1, 81, 'D', 'S', 'P', '5', NULL, '2019-07-15 14:42:22', NULL, 'Fragile', '30.00', '70.00', '0.00', 0, ' ', 70, '', ''),
('E00003024', '2019-07-15', NULL, 10, '10.00', NULL, 0, 2, 0, 0, 0, '10.00', '10.00', '10.00', '1000.00', '100.00', 1, 82, 'D', 'S', 'P', 'M', NULL, '2019-07-15 16:03:21', NULL, 'Normal', '0.00', '0.00', '0.00', 0, ' ', 120, '', ''),
('E00003025', '2019-07-16', NULL, 2, '20.00', NULL, 0, 0, 0, 0, 0, '10.00', '10.00', '10.00', '1000.00', '100.00', 1, 21, 'D', 'S', 'P', 'M', NULL, '2019-07-16 10:43:11', NULL, 'Normal', '0.00', '0.00', '0.00', 0, 'BL1;', 73, '', ''),
('E00003026', '2019-07-17', NULL, 5, '20.00', NULL, 10, 0, 0, 0, 10, '10.00', '3.00', '5.00', '150.00', '100.00', 1, 107, 'D', 'S', 'P', 'M', NULL, '2019-07-17 09:24:06', NULL, 'Normal', '0.00', '0.00', '0.00', 0, ' ', 164, '', ''),
('E00003027', '2019-07-18', NULL, 5, '3.00', NULL, 2, 0, 0, 0, 2, '11.00', '3.00', '2.00', '66.00', '100.00', 1, 81, 'D', 'S', 'P', 'M', 'S', '2019-07-18 10:22:25', NULL, 'Normal', '300.00', '0.00', '0.00', 0, '123;654;897;', 165, '', ''),
('E00003028', '2019-07-19', NULL, 5, '30.00', NULL, 2, 5, 0, 0, 7, '10.00', '5.00', '2.00', '100.00', '100.00', 1, 81, 'D', 'S', 'P', 'M', 'S', '2019-07-19 08:43:44', NULL, 'Normal', '20.00', '300.00', '0.00', 7, '15 | 15020 | 256231 | 256236 | 30020 | 5200 |3526523', 165, '', ''),
('E00003029', '2019-07-19', NULL, 5, '5.00', NULL, 0, 0, 0, 0, 0, '0.00', '0.00', '0.00', '0.00', '100.00', 1, 10, 'D', 'S', 'P', 'M', 'S', '2019-07-19 11:15:37', NULL, 'Normal', '0.00', '0.00', '0.00', 0, '', 58, '', ''),
('E00003030', '2019-07-19', NULL, 6, '6.00', NULL, 0, 0, 0, 0, 0, '0.00', '0.00', '0.00', '0.00', '100.00', 1, 10, 'D', 'S', 'P', 'M', 'S', '2019-07-19 11:24:15', NULL, 'Normal', '0.00', '0.00', '0.00', 0, '', 58, '', ''),
('E00003031', '2019-07-19', NULL, 5, '3.00', NULL, 0, 0, 0, 0, 0, '0.00', '0.00', '0.00', '0.00', '100.00', 1, 11, 'D', 'S', 'P', 'M', 'S', '2019-07-19 15:03:07', NULL, 'Normal', '200.00', '0.00', '0.00', 5, '5 | 23565 | 25258 | 2545545 | 545544 | ', 82, '', ''),
('E00003032', '2019-07-22', NULL, 5, '23.00', NULL, 4, 0, 0, 0, 4, '5.00', '2.00', '6.00', '60.00', '1003.00', 1, 108, 'D', 'S', 'P', 'M', 'S', '2019-07-22 10:43:10', NULL, 'Normal', '320.00', '3200.00', '10.00', 0, '', 166, '', ''),
('E00003033', '2019-07-22', NULL, 5, '5.00', NULL, 5, 0, 0, 0, 5, '2.00', '6.00', '2.00', '24.00', '120.00', 1, 108, 'D', '', 'P', '25', 'S', '2019-07-22 10:44:02', NULL, 'Normal', '232.00', '6565.00', '0.00', 5, '56565 | 565656 | 22525 | 2235 | 466 | ', 166, '', ''),
('E00003034', '2019-07-22', NULL, 4, '4.00', NULL, 0, 2, 0, 0, 0, '2.00', '2.00', '2.00', '8.00', '300.00', 1, 108, 'D', 'S', 'P', 'L', 'S', '2019-07-22 10:46:26', NULL, 'Normal', '0.00', '0.00', '0.00', 2, '15 | 25 | ', 166, '', ''),
('E00003035', '2019-07-23', NULL, 5, '20.50', NULL, 0, 0, 0, 0, 0, '2.00', '2.00', '2.00', '8.00', '4545.44', 1, 108, 'D', 'S', 'P', 'M', 'S', '2019-07-23 15:27:52', NULL, 'Normal', '12.56', '45445.24', '5.00', 0, '', 166, '', ''),
('E00003036', '2019-07-24', NULL, 5, '20.00', NULL, 2, 0, 0, 0, 2, '1.00', '3.00', '2.00', '6.00', '1200.00', 1, 110, 'D', 'S', 'P', 'M', 'S', '2019-07-24 09:00:39', NULL, 'Normal', '1500.00', '500.00', '0.00', 0, '', 168, '', ''),
('E00003037', '2019-07-24', NULL, 5, '5.00', NULL, 0, 0, 0, 0, 0, '1.00', '5.00', '2.00', '10.00', '1200.00', 1, 108, 'D', 'S', 'P', 'M', 'S', '2019-07-24 09:07:12', NULL, 'Normal', '300.00', '0.00', '0.00', 3, '1252 | 23532 | 565885 | ', 166, '', ''),
('E00003038', '2019-07-24', NULL, 2, '23.00', NULL, 0, 0, 0, 0, 0, '2.00', '5.00', '3.00', '30.00', '1500.00', 1, 111, 'D', 'S', 'P', 'M', 'S', '2019-07-24 09:43:37', NULL, 'Normal', '0.00', '0.00', '0.00', 0, '', 169, '', ''),
('E00003039', '2019-07-24', NULL, 5, '20.00', NULL, 0, 0, 0, 0, 0, '3.00', '3.00', '2.00', '18.00', '3000.00', 1, 112, 'D', 'S', 'P', 'M', 'S', '2019-07-24 09:52:58', NULL, 'Normal', '0.00', '0.00', '0.00', 0, '', 170, '', ''),
('E00003040', '2019-08-01', NULL, 1, '0.52', NULL, 0, 0, 0, 0, 0, '0.00', '0.00', '0.00', '0.00', '100.00', 1, 5, 'D', 'S', 'P', 'M', 'S', '2019-08-01 17:00:24', NULL, 'Normal', '0.00', '0.00', '0.00', 0, '', 71, '', ''),
('E0001001', '2019-10-18', NULL, 1, '1.00', NULL, 0, 0, 0, 0, 0, '0.00', '0.00', '0.00', '0.00', '500.00', 10, 113, 'D', 'X', 'D', 'M', 'S', '2019-10-18 16:39:30', NULL, 'Normal', '500.00', '0.00', '0.00', 0, '', 174, '', ''),
('E147', '2019-05-08', NULL, 2, '15.20', NULL, 0, 0, 0, 0, 0, '0.00', '0.00', '0.00', NULL, '20.20', 1, 4, 'D', 'S', 'P', 'M', 'A', NULL, NULL, 'Normal', '1235.00', '12346.00', '1234568.00', 0, 'BL1,BL2;', 55, '', ''),
('E148', '2019-05-08', NULL, 2, '44.00', NULL, 0, 0, 0, 0, 0, '0.00', '0.00', '0.00', NULL, '1780.00', 1, 17, 'D', 'X', 'P', '25', NULL, '2019-05-19 15:44:45', NULL, 'Normal', '1500.00', '1700.00', '15.00', 0, 'BL1;BL2;', 65, '', ''),
('E149', '2019-05-02', NULL, 9, '10.00', NULL, 0, 0, 0, 0, 0, '0.00', '0.00', '0.00', NULL, '3400.00', 1, 5, 'G', 'S', 'P', '25', NULL, '2019-05-13 15:01:21', NULL, 'Fragile', '3000.00', '400.00', '15.00', 0, 'BL1;BL2;', 56, '', ''),
('E150', '2019-05-16', NULL, 5, '8.00', NULL, 0, 0, 0, 0, 0, '0.00', '0.00', '0.00', NULL, '1300.00', 1, 4, 'D', 'S', 'P', 'M', NULL, '2019-05-15 09:54:12', NULL, 'Normal', '1000.00', '300.00', '15.00', 0, 'BL6;', 55, '', ''),
('E171', '2019-05-08', NULL, 5, '10.00', NULL, 0, 0, 0, 0, 0, '0.00', '0.00', '0.00', NULL, '500.00', 1, 19, 'G', 'X', 'D', '25', NULL, '2019-05-20 14:58:06', NULL, 'TrÃ¨s fragile', '500.00', '0.00', '20.00', 0, 'BL9;', 67, '', ''),
('E178', '2019-05-08', NULL, 5, '250.00', NULL, 0, 0, 0, 0, 0, '0.00', '0.00', '0.00', NULL, '50000.00', 1, 22, 'G', 'X', 'P', '5', NULL, '2019-05-23 09:49:02', NULL, 'Normal', '25000.00', '25000.00', '15.00', 0, 'BL2;', 52, '', ''),
('E181', '2019-05-08', NULL, 7, '7000.00', NULL, 0, 0, 0, 0, 0, '0.00', '0.00', '0.00', NULL, '1400000.00', 1, 23, 'D', 'S', 'P', 'M', NULL, '2019-05-23 09:54:15', NULL, 'Normal', '140000.00', '100000.00', '15.00', 0, 'BL1;', 52, '', ''),
('E3004', '2019-05-24', NULL, 4, '15.00', NULL, 0, 0, 0, 0, 0, '0.00', '0.00', '0.00', NULL, '4500.00', 1, 81, 'G', 'X', 'P', 'M', NULL, '2019-05-23 23:20:05', NULL, 'Normal', '500.00', '4000.00', '15.00', 0, 'BL1;', 70, '', ''),
('E3005', '2019-05-24', NULL, 4, '30.00', NULL, 0, 0, 0, 0, 0, '0.00', '0.00', '0.00', NULL, '900.00', 1, 5, 'D', 'X', 'P', 'M', NULL, '2019-05-24 13:24:29', NULL, 'Fragile', '600.00', '300.00', '20.00', 0, 'BL1;', 84, '', ''),
('H00005001', '2019-05-31', NULL, 2, '87.00', NULL, 0, 0, 0, 0, 0, '0.00', '0.00', '0.00', NULL, '1500.00', 4, 82, 'G', 'S', 'P', 'M', NULL, '2019-05-31 11:33:36', NULL, 'Normal', '0.00', '0.00', '0.00', 0, 'BL1;', 120, '', ''),
('H00005002', '2019-05-31', NULL, 3, '20.00', NULL, 0, 0, 0, 0, 0, '0.00', '0.00', '0.00', NULL, '1600.00', 4, 84, 'G', 'S', 'P', 'M', NULL, '2019-05-31 11:49:55', NULL, 'Normal', '0.00', '0.00', '0.00', 0, ' ', 121, '', ''),
('H00005003', '2019-05-31', NULL, 2, '20.00', NULL, 0, 0, 0, 0, 0, '0.00', '0.00', '0.00', NULL, '1600.00', 4, 85, 'G', 'S', 'P', 'M', NULL, '2019-05-31 11:50:49', NULL, 'Normal', '0.00', '0.00', '0.00', 0, ' ', 122, '', ''),
('H00005004', '2019-05-31', NULL, 3, '40.00', NULL, 0, 0, 0, 0, 0, '0.00', '0.00', '0.00', NULL, '500.00', 4, 86, 'G', 'S', 'P', 'M', NULL, '2019-05-31 11:54:51', NULL, 'Normal', '500.00', '0.00', '0.00', 0, ' ', 123, '', ''),
('H00005005', '2019-05-31', NULL, 3, '45.00', NULL, 0, 0, 0, 0, 0, '0.00', '0.00', '0.00', NULL, '0.00', 4, 87, 'G', 'S', 'P', 'M', NULL, '2019-05-31 12:17:02', NULL, 'Normal', '0.00', '0.00', '0.00', 0, 'BL5;', 125, '', ''),
('H00005006', '2019-05-31', NULL, 2, '20.00', NULL, 0, 0, 0, 0, 0, '0.00', '0.00', '0.00', NULL, '0.00', 4, 88, 'G', 'S', 'P', 'M', NULL, '2019-05-31 12:25:08', NULL, 'Normal', '0.00', '0.00', '0.00', 0, ' ', 124, '', ''),
('HU0080001', '2019-06-14', NULL, 5, '550.00', NULL, 0, 0, 0, 0, 0, '0.00', '0.00', '0.00', NULL, '0.00', 5, 89, 'G', 'S', 'P', 'M', NULL, '2019-06-14 11:18:13', NULL, 'Normal', '0.00', '0.00', '0.00', 0, ' ', 128, '', ''),
('HU0080002', '2019-06-14', NULL, 14, '150.00', NULL, 0, 0, 0, 0, 0, '0.00', '0.00', '0.00', NULL, '60020.00', 5, 90, 'p', 'S', 'P', 'M', NULL, '2019-06-14 11:23:06', NULL, 'Normal', '2000.00', '0.00', '15.00', 0, 'bl25', 131, '', ''),
('HU0080003', '2019-06-17', NULL, 20, '50.00', NULL, 0, 0, 0, 0, 0, '0.00', '0.00', '0.00', NULL, '0.00', 5, 90, 'G', 'S', 'P', 'M', 'P', '2019-06-17 10:47:18', NULL, 'Normal', '0.00', '0.00', '0.00', 0, ' ', 131, '', '');

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
  `date_modification` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `panierramasse`
--

INSERT INTO `panierramasse` (`numeroCarnet`, `declaration`, `etat`, `motif_annulation`, `date_modification`) VALUES
(63, 'E00003006', 'annule', 'retard', '2019-08-01 15:14:44'),
(63, 'E00003007', 'annule', 'retard', '2019-08-01 15:14:44'),
(63, 'E00003008', 'annule', 'retard', '2019-08-01 15:14:44'),
(63, 'E00003009', 'annule', 'retard', '2019-08-01 15:14:44'),
(63, 'E00003010', 'annule', 'retard', '2019-08-01 15:14:44'),
(63, 'E00003012', 'annule', 'retard', '2019-08-01 15:14:44'),
(63, 'E00003013', 'annule', 'retard', '2019-08-01 15:14:44'),
(63, 'E00003018', 'annule', 'retard', '2019-08-01 15:14:44'),
(63, 'E00003019', 'annule', 'retard', '2019-08-01 15:14:44'),
(63, 'E00003020', 'annule', 'retard', '2019-08-01 15:14:44'),
(63, 'E00003021', 'annule', 'retard', '2019-08-01 15:14:44'),
(63, 'E00003022', 'annule', 'retard', '2019-08-01 15:14:44'),
(63, 'E00003023', 'annule', 'retard', '2019-08-01 15:14:44'),
(63, 'E00003024', 'annule', 'retard', '2019-08-01 15:14:44'),
(63, 'E00003025', 'annule', 'retard', '2019-08-01 15:14:44'),
(63, 'E00003026', 'annule', 'retard', '2019-08-01 15:14:44'),
(63, 'E00003027', 'annule', 'retard', '2019-08-01 15:14:44'),
(63, 'E00003028', 'annule', 'retard', '2019-08-01 15:14:44'),
(63, 'E00003029', 'annule', 'retard', '2019-08-01 15:14:44'),
(63, 'E00003030', 'annule', 'retard', '2019-08-01 15:14:44'),
(63, 'E00003031', 'annule', 'retard', '2019-08-01 15:14:44'),
(63, 'E00003032', 'annule', 'retard', '2019-08-01 15:14:44'),
(67, 'E00003032', 'annule', '', '2019-08-07 09:51:09'),
(72, 'E00003032', 'annule', '', '2019-08-27 09:14:50'),
(63, 'E00003033', 'annule', 'retard', '2019-08-01 15:14:44'),
(67, 'E00003033', 'annule', '', '2019-08-07 09:51:09'),
(72, 'E00003033', 'annule', '', '2019-08-27 09:14:50'),
(63, 'E00003034', 'annule', 'retard', '2019-08-01 15:14:44'),
(67, 'E00003034', 'annule', '', '2019-08-07 09:51:09'),
(63, 'E00003035', 'annule', 'retard', '2019-08-01 15:14:44'),
(67, 'E00003035', 'annule', '', '2019-08-07 09:51:09'),
(72, 'E00003035', 'annule', '', '2019-08-27 09:14:50'),
(63, 'E00003036', 'annule', 'retard', '2019-08-01 15:14:44'),
(65, 'E00003036', 'annule', '', '2019-08-07 09:36:44'),
(67, 'E00003036', 'annule', '', '2019-08-07 09:51:09'),
(68, 'E00003036', 'annule', '', '2019-08-07 09:54:35'),
(70, 'E00003036', 'annule', '', '2019-08-07 11:10:36'),
(71, 'E00003036', 'annule', '', '2019-08-27 08:43:12'),
(72, 'E00003036', 'annule', '', '2019-08-27 09:14:50'),
(73, 'E00003036', 'annule', 'Retard', '2019-08-27 09:36:24'),
(74, 'E00003036', 'annule', '', '2019-08-27 09:56:24'),
(75, 'E00003036', 'annule', '', '2019-08-27 10:01:44'),
(77, 'E00003036', 'annule', '', '2019-08-27 10:17:53'),
(78, 'E00003036', 'annule', '', '2019-08-27 10:18:30'),
(79, 'E00003036', 'annule', '', '2019-08-27 10:42:26'),
(80, 'E00003036', 'annule', '', '2019-08-27 10:51:53'),
(81, 'E00003036', 'annule', '', '2019-08-27 10:52:58'),
(82, 'E00003036', 'annule', '', '2019-08-27 10:55:45'),
(86, 'E00003036', 'annule', '', '2019-08-27 11:06:40'),
(87, 'E00003036', 'annule', '', '2019-08-27 11:28:52'),
(88, 'E00003036', 'annule', '', '2019-08-27 11:30:46'),
(89, 'E00003036', 'annule', '', '2019-08-27 11:35:27'),
(90, 'E00003036', 'annule', '', '2019-08-27 11:40:46'),
(91, 'E00003036', 'annule', '', '2019-08-27 11:41:17'),
(92, 'E00003036', 'annule', '', '2019-08-27 12:10:42'),
(93, 'E00003036', 'annule', '', '2019-09-02 11:06:51'),
(94, 'E00003036', 'Valide', '', '2019-09-02 11:10:18'),
(63, 'E00003037', 'annule', 'retard', '2019-08-01 15:14:44'),
(65, 'E00003037', 'annule', '', '2019-08-07 09:36:44'),
(67, 'E00003037', 'annule', '', '2019-08-07 09:51:09'),
(68, 'E00003037', 'annule', '', '2019-08-07 09:54:35'),
(71, 'E00003037', 'annule', '', '2019-08-27 08:43:12'),
(72, 'E00003037', 'annule', '', '2019-08-27 09:14:50'),
(74, 'E00003037', 'annule', '', '2019-08-27 09:56:24'),
(82, 'E00003037', 'annule', '', '2019-08-27 10:55:45'),
(92, 'E00003037', 'annule', '', '2019-08-27 12:10:42'),
(63, 'E00003038', 'annule', 'retard', '2019-08-01 15:14:44'),
(65, 'E00003038', 'annule', '', '2019-08-07 09:36:44'),
(67, 'E00003038', 'annule', '', '2019-08-07 09:51:09'),
(71, 'E00003038', 'annule', '', '2019-08-27 08:43:12'),
(72, 'E00003038', 'annule', '', '2019-08-27 09:14:50'),
(74, 'E00003038', 'annule', '', '2019-08-27 09:56:24'),
(92, 'E00003038', 'annule', '', '2019-08-27 12:10:42'),
(63, 'E00003039', 'annule', 'retard', '2019-08-01 15:14:44'),
(65, 'E00003039', 'annule', '', '2019-08-07 09:36:44'),
(67, 'E00003039', 'annule', '', '2019-08-07 09:51:09'),
(72, 'E00003039', 'annule', '', '2019-08-27 09:14:50'),
(64, 'E00003040', 'annule', 'retard', '2019-08-07 09:29:15'),
(65, 'E00003040', 'annule', '', '2019-08-07 09:36:44'),
(66, 'E00003040', 'annule', '', '2019-08-07 09:36:59'),
(67, 'E00003040', 'annule', '', '2019-08-07 09:51:09'),
(68, 'E00003040', 'annule', '', '2019-08-07 09:54:35'),
(69, 'E00003040', 'annule', '', '2019-08-07 09:55:04'),
(70, 'E00003040', 'annule', '', '2019-08-07 11:10:36'),
(71, 'E00003040', 'annule', '', '2019-08-27 08:43:12'),
(72, 'E00003040', 'annule', '', '2019-08-27 09:14:50'),
(73, 'E00003040', 'annule', 'Retard', '2019-08-27 09:36:24'),
(74, 'E00003040', 'annule', '', '2019-08-27 09:56:24'),
(75, 'E00003040', 'annule', '', '2019-08-27 10:01:44'),
(76, 'E00003040', 'annule', '', '2019-08-27 10:16:07'),
(77, 'E00003040', 'annule', '', '2019-08-27 10:17:53'),
(78, 'E00003040', 'annule', '', '2019-08-27 10:18:30'),
(79, 'E00003040', 'annule', '', '2019-08-27 10:42:26'),
(80, 'E00003040', 'annule', '', '2019-08-27 10:51:53'),
(81, 'E00003040', 'annule', '', '2019-08-27 10:52:58'),
(82, 'E00003040', 'annule', '', '2019-08-27 10:55:45'),
(83, 'E00003040', 'annule', '', '2019-08-27 10:58:11'),
(84, 'E00003040', 'annule', '', '2019-08-27 11:00:39'),
(85, 'E00003040', 'annule', '', '2019-08-27 11:04:12'),
(86, 'E00003040', 'annule', '', '2019-08-27 11:06:40'),
(87, 'E00003040', 'annule', '', '2019-08-27 11:28:52'),
(88, 'E00003040', 'annule', '', '2019-08-27 11:30:46'),
(89, 'E00003040', 'annule', '', '2019-08-27 11:35:27'),
(90, 'E00003040', 'annule', '', '2019-08-27 11:40:46'),
(91, 'E00003040', 'annule', '', '2019-08-27 11:41:17'),
(92, 'E00003040', 'annule', '', '2019-08-27 12:10:42'),
(93, 'E00003040', 'annule', '', '2019-09-02 11:06:51'),
(94, 'E00003040', 'Valide', '', '2019-09-02 11:10:18'),
(63, 'E147', 'annule', 'retard', '2019-08-01 15:14:44'),
(63, 'E148', 'annule', 'retard', '2019-08-01 15:14:44'),
(63, 'E149', 'annule', 'retard', '2019-08-01 15:14:44'),
(63, 'E150', 'annule', 'retard', '2019-08-01 15:14:44'),
(63, 'E171', 'annule', 'retard', '2019-08-01 15:14:44'),
(63, 'E178', 'annule', 'retard', '2019-08-01 15:14:44'),
(63, 'E181', 'annule', 'retard', '2019-08-01 15:14:44'),
(63, 'E3004', 'annule', 'retard', '2019-08-01 15:14:44'),
(63, 'E3005', 'annule', 'retard', '2019-08-01 15:14:44');

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

--
-- Déchargement des données de la table `points_relais`
--

INSERT INTO `points_relais` (`id_pr`, `lib_pr`, `id_ville`, `loc_ver`, `loc_hor`) VALUES
(1, 'Taghazout', 300, '3335.22722', '888885.2455'),
(2, 'Adrar', 300, '3335.22222', '888885.2255'),
(3, 'Bernoussi - Tarik', 100, '3340.22222', '3340.22292'),
(4, 'Anassi', 100, '3341.22222', '3341.22292'),
(5, 'Hassan', 600, '3331.22222', '3331.22292'),
(6, 'PR- hay Hassani', 100, '5525.22525', '2555.55252'),
(7, 'Pr Hay Al massira 2', 700, '5585547.22554511', '558458754.255565');

-- --------------------------------------------------------

--
-- Structure de la table `ramasse`
--

CREATE TABLE `ramasse` (
  `numeroCarnet` int(11) NOT NULL,
  `datedesaisie` datetime NOT NULL DEFAULT current_timestamp(),
  `dateramassage` date NOT NULL,
  `user_id` int(11) NOT NULL,
  `code_ramassage` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `ramasse`
--

INSERT INTO `ramasse` (`numeroCarnet`, `datedesaisie`, `dateramassage`, `user_id`, `code_ramassage`) VALUES
(24, '2019-07-09 17:43:22', '2019-07-20', 1, '0'),
(25, '2019-07-09 17:44:09', '2019-07-04', 1, '0'),
(26, '2019-07-09 17:45:44', '2019-07-19', 1, '0'),
(27, '2019-07-09 17:47:45', '2019-07-17', 1, '0'),
(28, '2019-07-09 18:21:51', '2019-07-12', 1, '0'),
(29, '2019-07-09 18:23:44', '2019-07-26', 1, '0'),
(30, '2019-07-10 10:09:23', '2019-07-11', 1, '0'),
(31, '2019-07-10 11:12:37', '2019-07-11', 1, '0'),
(32, '2019-07-10 12:13:58', '2019-07-12', 1, '0'),
(33, '2019-07-10 12:39:52', '2019-07-16', 1, '0'),
(34, '2019-07-11 10:51:06', '2019-07-12', 1, '0'),
(35, '2019-07-11 10:51:50', '1970-01-01', 1, '0'),
(36, '2019-07-11 12:07:31', '2019-07-19', 1, '0'),
(37, '2019-07-11 12:08:42', '2019-07-12', 1, '0'),
(38, '2019-07-11 12:12:25', '2019-07-18', 1, '0'),
(39, '2019-07-11 12:52:21', '2019-07-13', 1, '0'),
(40, '2019-07-11 14:11:10', '2019-07-11', 1, '0'),
(41, '2019-07-11 14:12:23', '2019-07-11', 1, '0'),
(42, '2019-07-11 14:13:36', '2019-07-11', 1, '0'),
(43, '2019-07-11 14:29:53', '2019-07-11', 1, '0'),
(44, '2019-07-11 15:27:22', '2019-07-12', 1, '0'),
(45, '2019-07-11 15:29:18', '2019-07-20', 1, '0'),
(46, '2019-07-11 15:30:57', '2019-07-16', 1, '0'),
(47, '2019-07-11 15:34:04', '2019-07-11', 1, '0'),
(48, '2019-07-11 16:12:18', '2019-07-11', 1, '0'),
(49, '2019-07-12 11:59:05', '2019-07-13', 1, '0'),
(50, '2019-07-12 12:00:28', '2019-07-13', 1, '0'),
(51, '2019-07-12 12:01:03', '2019-07-12', 1, '0'),
(52, '2019-07-12 17:00:00', '2019-07-15', 1, '0'),
(53, '2019-07-15 11:40:16', '2019-07-15', 1, '0'),
(54, '2019-07-16 10:43:42', '2019-07-18', 1, '0'),
(55, '2019-07-16 12:09:49', '2019-07-17', 1, '0'),
(56, '2019-07-17 12:14:52', '2019-07-17', 1, '0'),
(57, '2019-07-17 12:17:07', '2019-07-17', 1, '0'),
(58, '2019-07-19 17:19:46', '2019-07-19', 1, '0'),
(59, '2019-07-19 17:21:30', '2019-07-19', 1, '0'),
(60, '2019-07-19 17:24:15', '2019-07-19', 1, '0'),
(61, '2019-07-22 17:01:08', '2019-07-22', 1, '0'),
(62, '2019-07-22 17:53:17', '2019-07-22', 1, '0'),
(63, '2019-08-01 15:14:21', '2019-08-01', 1, '0'),
(64, '2019-08-07 09:18:55', '2019-08-07', 1, '0'),
(65, '2019-08-07 09:31:14', '2019-08-07', 1, '0'),
(66, '2019-08-07 09:36:53', '2019-08-07', 1, '0'),
(67, '2019-08-07 09:37:34', '2019-08-07', 1, '0'),
(68, '2019-08-07 09:51:59', '2019-08-07', 1, '0'),
(69, '2019-08-07 09:54:53', '2019-08-07', 1, '0'),
(70, '2019-08-07 11:09:44', '2019-08-07', 1, '0'),
(71, '2019-08-26 16:58:29', '2019-08-26', 1, '0'),
(72, '2019-08-27 08:43:27', '2019-08-27', 1, '0'),
(73, '2019-08-27 09:14:59', '2019-08-27', 1, '0'),
(74, '2019-08-27 09:41:20', '2019-08-27', 1, '0'),
(75, '2019-08-27 09:56:36', '2019-08-27', 1, '0'),
(76, '2019-08-27 10:08:52', '2019-08-27', 1, '0'),
(77, '2019-08-27 10:16:15', '2019-08-27', 1, '0'),
(78, '2019-08-27 10:18:02', '2019-08-27', 1, '0'),
(79, '2019-08-27 10:25:27', '2019-08-27', 1, '0'),
(80, '2019-08-27 10:42:32', '2019-08-27', 1, '0'),
(81, '2019-08-27 10:52:00', '2019-08-27', 1, '0'),
(82, '2019-08-27 10:53:06', '2019-08-27', 1, '0'),
(83, '2019-08-27 10:56:53', '2019-08-27', 1, '0'),
(84, '2019-08-27 10:58:15', '2019-08-27', 1, '0'),
(85, '2019-08-27 11:00:44', '2019-08-27', 1, '0'),
(86, '2019-08-27 11:04:18', '2019-08-27', 1, '0'),
(87, '2019-08-27 11:07:02', '2019-08-27', 1, '0'),
(88, '2019-08-27 11:29:00', '2019-08-27', 1, '0'),
(89, '2019-08-27 11:30:58', '2019-08-27', 1, '0'),
(90, '2019-08-27 11:35:32', '2019-08-27', 1, '0'),
(91, '2019-08-27 11:41:02', '2019-08-27', 1, '0'),
(92, '2019-08-27 11:50:54', '2019-08-27', 1, '0'),
(93, '2019-09-02 11:05:42', '2019-09-02', 1, '0'),
(94, '2019-09-02 11:09:58', '2019-09-02', 1, '0');

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

--
-- Déchargement des données de la table `reclamation`
--

INSERT INTO `reclamation` (`id_reclamation`, `date_reclamation`, `idclient`, `num_declar`, `objet_reclamation`, `id_user`, `tpy_reclam`) VALUES
(4, '2019-06-17', 19, 'E171', '8', 1, '2'),
(5, '2019-08-05', 81, 'E00003008', '10', 1, '2'),
(6, '2019-08-05', 81, 'E00003008', '10', 1, '2');

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
  `AGENCE_COD` varchar(4) DEFAULT NULL,
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
(109, '100', 'MOHAMMADIA BIS', '2', 1, 'B'),
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
(127, '120', 'TNINE LAGHYAT', '2', 3, 'C'),
(128, '110', 'OUALIDIA', '1', 3, 'C'),
(129, '120', 'SEBT GZOULA', '1', 2, 'C'),
(150, '100', 'AIN SEBAA', '1', 1, 'B'),
(151, '100', 'Logiprod', '1', 1, 'C'),
(152, '600', 'Ain Atiq', '2', 1, 'C'),
(200, '200', 'TANGER', '1', 1, 'A'),
(210, '210', 'TETOUAN', '1', 1, 'A'),
(211, '220', 'CHEFCHAOUEN', '1', 3, 'C'),
(212, '210', 'FNIDEQ', '1', 1, 'B'),
(213, '220', 'CHAOUEN', '1', 3, 'C'),
(214, '210', 'HAD BENI RZINE', '2', 2, 'C'),
(215, '210', 'BAB BERRED', '1', 5, 'C'),
(216, '220', 'OUAZZANE', '1', 3, 'C'),
(217, '210', 'Ain Derrij', '2', 10, 'C'),
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
(311, '300', 'TATA', '2', 30, 'C'),
(312, '300', 'ANZA', '1', 1, 'C'),
(320, '350', 'OULED BERHIL', '2', 3, 'C'),
(321, '350', 'IGHREM', '2', 5, 'C'),
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
(371, NULL, 'ESSMARA', '2', 30, 'C'),
(372, '350', 'AIT BAHA', '1', 5, 'C'),
(373, '350', 'AIT MILK', '2', 5, 'C'),
(400, '400', 'OUJDA', '1', 1, 'A'),
(401, '400', 'AHFIR', '1', 1, 'C'),
(402, '400', 'BOUARFA', '1', 15, 'C'),
(403, '400', 'FIGUIG', '2', 15, 'C'),
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
(418, '410', 'Ain Zaura', '2', 7, 'C'),
(419, '410', 'AIT MILK', '2', 7, 'C'),
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
(505, '500', 'GUOULMIMA', '2', 7, 'C'),
(506, '500', 'IFRANE', '1', 5, 'B'),
(507, '500', 'IMMOUZER', '1', 3, 'C'),
(508, '800', 'KHENIFRA', '1', 5, 'C'),
(509, '500', 'MIDELT', '1', 7, 'C'),
(510, '500', 'SEFROU', '1', 5, 'B'),
(511, '500', 'TAOUNATE', '1', 15, 'C'),
(512, '500', 'TISSA', '2', 15, 'C'),
(513, '500', 'AOUFOUS', '2', 15, 'C'),
(514, '500', 'MISSOUR', '2', 15, 'C'),
(515, '500', 'KARIAT BA MHAMED', '1', 15, 'C'),
(516, '500', 'RIBAT EL KHEIR', '1', 15, 'C'),
(517, '500', 'OUTAT EL HAJ', '2', 15, 'C'),
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
(621, '600', 'Rabat Centre', '2', 1, 'B'),
(622, '600', 'Rabat océan', '2', 1, 'B'),
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
(828, '800', 'OULED ZMAM', '2', 3, 'C'),
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
-- Structure de la vue `clientsnombres`
--
DROP TABLE IF EXISTS `clientsnombres`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `clientsnombres`  AS  select `cllve`.`NOM` AS `NOM`,(select count(0) from `declaration_v` `de` where `cllve`.`CLIENT_ID` = `de`.`client1_id`) AS `total_declars`,(select count(0) from `client` `cl` where `cllve`.`CLIENT_ID` = `cl`.`CLIENT_ID_client_lve`) AS `total_sous_clients`,(select count(0) from `client_lve_session` `clses` where `cllve`.`CLIENT_ID` = `clses`.`REFERENCIEE`) AS `total_session` from `client_lve` `cllve` ;

-- --------------------------------------------------------

--
-- Structure de la vue `impcarnet`
--
DROP TABLE IF EXISTS `impcarnet`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `impcarnet`  AS  select distinct `vimpression`.`NomEx` AS `NomEx`,`vimpression`.`AdresseEx` AS `AdresseEx`,`vimpression`.`VilleEx` AS `VilleEx`,`vimpression`.`TelEx` AS `TelEx`,`vimpression`.`NomDest` AS `NomDest`,`vimpression`.`TelDest` AS `TelDest`,`vimpression`.`villeDest` AS `villeDest`,`vimpression`.`AdresseDest` AS `AdresseDest`,`vimpression`.`numero` AS `numero`,`vimpression`.`date` AS `date`,`vimpression`.`facture_id` AS `facture_id`,`vimpression`.`colis` AS `colis`,`vimpression`.`poids` AS `poids`,`vimpression`.`palettes` AS `palettes`,`vimpression`.`paletteA` AS `paletteA`,`vimpression`.`paletteB` AS `paletteB`,`vimpression`.`paletteC` AS `paletteC`,`vimpression`.`paletteAutre` AS `paletteAutre`,`vimpression`.`Nbre_palettes` AS `Nbre_palettes`,`vimpression`.`longueur` AS `longueur`,`vimpression`.`hauteur` AS `hauteur`,`vimpression`.`largeur` AS `largeur`,`vimpression`.`coef` AS `coef`,`vimpression`.`valeur` AS `valeur`,`vimpression`.`client1_id` AS `client1_id`,`vimpression`.`client2_id` AS `client2_id`,`vimpression`.`livraison` AS `livraison`,`vimpression`.`express` AS `express`,`vimpression`.`port` AS `port`,`vimpression`.`courrier_typ` AS `courrier_typ`,`vimpression`.`courrier_eta` AS `courrier_eta`,`vimpression`.`date_saisie` AS `date_saisie`,`vimpression`.`userid` AS `userid`,`vimpression`.`nature` AS `nature`,`vimpression`.`Espece` AS `Espece`,`vimpression`.`Cheque` AS `Cheque`,`vimpression`.`Traite` AS `Traite`,`vimpression`.`Nbre_BL` AS `Nbre_BL`,`vimpression`.`BL` AS `BL`,`vimpression`.`id_adres` AS `id_adres`,`vimpression`.`statut` AS `statut`,`vimpression`.`commentaire` AS `commentaire`,`panierramasse`.`numeroCarnet` AS `numeroCarnet`,`panierramasse`.`declaration` AS `declaration`,`panierramasse`.`etat` AS `etat`,`panierramasse`.`date_modification` AS `date_modification` from (`vimpression` join `panierramasse`) where `vimpression`.`numero` = `panierramasse`.`declaration` ;

-- --------------------------------------------------------

--
-- Structure de la vue `vadressess`
--
DROP TABLE IF EXISTS `vadressess`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vadressess`  AS  select `ad`.`id_adresse` AS `id_adresse`,`ad`.`lib_adresse` AS `lib_adresse`,`ad`.`id_client` AS `id_client`,`ad`.`id_user` AS `id_user`,`vl`.`VILLE_LIB` AS `VILLE_LIB`,`cl`.`CLIENT_COD` AS `CLIENT_COD` from ((`adresses` `ad` join `ville` `vl`) join `client` `cl`) where `ad`.`id_ville` = `vl`.`VILLE_COD` and `cl`.`CLIENT_ID` = `ad`.`id_client` ;

-- --------------------------------------------------------

--
-- Structure de la vue `vdeclaration`
--
DROP TABLE IF EXISTS `vdeclaration`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vdeclaration`  AS  select `declaration_v`.`numero` AS `numero`,`declaration_v`.`date` AS `date`,`declaration_v`.`facture_id` AS `facture_id`,`declaration_v`.`colis` AS `colis`,`declaration_v`.`poids` AS `poids`,`declaration_v`.`palettes` AS `palettes`,`declaration_v`.`paletteA` AS `paletteA`,`declaration_v`.`paletteB` AS `paletteB`,`declaration_v`.`paletteC` AS `paletteC`,`declaration_v`.`paletteAutre` AS `paletteAutre`,`declaration_v`.`Nbre_palettes` AS `Nbre_palettes`,`declaration_v`.`longueur` AS `longueur`,`declaration_v`.`hauteur` AS `hauteur`,`declaration_v`.`largeur` AS `largeur`,`declaration_v`.`coef` AS `coef`,`declaration_v`.`valeur` AS `valeur`,`declaration_v`.`client1_id` AS `client1_id`,`declaration_v`.`client2_id` AS `client2_id`,`declaration_v`.`livraison` AS `livraison`,`declaration_v`.`express` AS `express`,`declaration_v`.`port` AS `port`,`declaration_v`.`courrier_typ` AS `courrier_typ`,`declaration_v`.`courrier_eta` AS `courrier_eta`,`declaration_v`.`date_saisie` AS `date_saisie`,`declaration_v`.`userid` AS `userid`,`declaration_v`.`nature` AS `nature`,`declaration_v`.`Espece` AS `Espece`,`declaration_v`.`Cheque` AS `Cheque`,`declaration_v`.`Traite` AS `Traite`,`declaration_v`.`BL` AS `BL`,`declaration_v`.`id_adres` AS `id_adres`,`declaration_v`.`statut` AS `statut`,`declaration_v`.`commentaire` AS `commentaire`,`client`.`CLIENT_ID` AS `CLIENT_ID`,`client`.`NOM` AS `NOM`,`client`.`PRENOM` AS `PRENOM`,`client`.`CLIENT_COD` AS `CLIENT_COD`,`client`.`CLIENT_ID_client_lve` AS `CLIENT_ID_client_lve`,`client`.`telephone` AS `telephone`,`ville`.`VILLE_LIB` AS `ville`,`adresses`.`lib_adresse` AS `Adresse` from (((`declaration_v` join `client`) join `ville`) join `adresses`) where `declaration_v`.`client1_id` = `client`.`CLIENT_ID_client_lve` and `ville`.`VILLE_COD` = `adresses`.`id_ville` and `declaration_v`.`client2_id` = `client`.`CLIENT_ID` and `adresses`.`id_client` in (select `declaration_v`.`client2_id` from (`declaration_v` join `client`) where `declaration_v`.`client2_id` = `client`.`CLIENT_ID`) and `adresses`.`id_adresse` = `declaration_v`.`id_adres` ;

-- --------------------------------------------------------

--
-- Structure de la vue `vimpression`
--
DROP TABLE IF EXISTS `vimpression`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vimpression`  AS  select distinct `client_lve`.`NOM` AS `NomEx`,`client_lve`.`adresse` AS `AdresseEx`,`client_lve`.`ville` AS `VilleEx`,`client_lve`.`telephone` AS `TelEx`,`client`.`NOM` AS `NomDest`,`client`.`telephone` AS `TelDest`,`adresses`.`id_ville` AS `villeDest`,`adresses`.`lib_adresse` AS `AdresseDest`,`declaration_v`.`numero` AS `numero`,`declaration_v`.`date` AS `date`,`declaration_v`.`facture_id` AS `facture_id`,`declaration_v`.`colis` AS `colis`,`declaration_v`.`poids` AS `poids`,`declaration_v`.`palettes` AS `palettes`,`declaration_v`.`paletteA` AS `paletteA`,`declaration_v`.`paletteB` AS `paletteB`,`declaration_v`.`paletteC` AS `paletteC`,`declaration_v`.`paletteAutre` AS `paletteAutre`,`declaration_v`.`Nbre_palettes` AS `Nbre_palettes`,`declaration_v`.`longueur` AS `longueur`,`declaration_v`.`hauteur` AS `hauteur`,`declaration_v`.`largeur` AS `largeur`,`declaration_v`.`coef` AS `coef`,`declaration_v`.`valeur` AS `valeur`,`declaration_v`.`client1_id` AS `client1_id`,`declaration_v`.`client2_id` AS `client2_id`,`declaration_v`.`livraison` AS `livraison`,`declaration_v`.`express` AS `express`,`declaration_v`.`port` AS `port`,`declaration_v`.`courrier_typ` AS `courrier_typ`,`declaration_v`.`courrier_eta` AS `courrier_eta`,`declaration_v`.`date_saisie` AS `date_saisie`,`declaration_v`.`userid` AS `userid`,`declaration_v`.`nature` AS `nature`,`declaration_v`.`Espece` AS `Espece`,`declaration_v`.`Cheque` AS `Cheque`,`declaration_v`.`Traite` AS `Traite`,`declaration_v`.`Nbre_BL` AS `Nbre_BL`,`declaration_v`.`BL` AS `BL`,`declaration_v`.`id_adres` AS `id_adres`,`declaration_v`.`statut` AS `statut`,`declaration_v`.`commentaire` AS `commentaire` from ((((`adresses` join `client`) join `client_lve`) join `ville`) join `declaration_v`) where `declaration_v`.`client1_id` = `client`.`CLIENT_ID_client_lve` and `declaration_v`.`client2_id` = `client`.`CLIENT_ID` and `ville`.`VILLE_COD` = `adresses`.`id_ville` and `declaration_v`.`id_adres` = `adresses`.`id_adresse` and `client`.`CLIENT_ID_client_lve` = `client_lve`.`CLIENT_ID` ;

-- --------------------------------------------------------

--
-- Structure de la vue `vu_declaration`
--
DROP TABLE IF EXISTS `vu_declaration`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vu_declaration`  AS  select `declaration_v`.`numero` AS `numero`,`declaration_v`.`date` AS `date`,`declaration_v`.`facture_id` AS `facture_id`,`declaration_v`.`colis` AS `colis`,`declaration_v`.`poids` AS `poids`,`declaration_v`.`palettes` AS `palettes`,`declaration_v`.`paletteA` AS `paletteA`,`declaration_v`.`paletteB` AS `paletteB`,`declaration_v`.`paletteC` AS `paletteC`,`declaration_v`.`paletteAutre` AS `paletteAutre`,`declaration_v`.`Nbre_palettes` AS `Nbre_palettes`,`declaration_v`.`longueur` AS `longueur`,`declaration_v`.`hauteur` AS `hauteur`,`declaration_v`.`largeur` AS `largeur`,`declaration_v`.`coef` AS `coef`,`declaration_v`.`valeur` AS `valeur`,`declaration_v`.`client1_id` AS `client1_id`,`declaration_v`.`client2_id` AS `client2_id`,`declaration_v`.`livraison` AS `livraison`,`declaration_v`.`express` AS `express`,`declaration_v`.`port` AS `port`,`declaration_v`.`courrier_typ` AS `courrier_typ`,`declaration_v`.`courrier_eta` AS `courrier_eta`,`declaration_v`.`date_saisie` AS `date_saisie`,`declaration_v`.`userid` AS `userid`,`declaration_v`.`nature` AS `nature`,`declaration_v`.`Espece` AS `Espece`,`declaration_v`.`Cheque` AS `Cheque`,`declaration_v`.`Traite` AS `Traite`,`declaration_v`.`BL` AS `BL`,`declaration_v`.`id_adres` AS `id_adres`,`declaration_v`.`statut` AS `statut`,`declaration_v`.`commentaire` AS `commentaire`,`client`.`CLIENT_ID` AS `CLIENT_ID`,`client`.`NOM` AS `NOM`,`client`.`PRENOM` AS `PRENOM`,`client`.`CLIENT_COD` AS `CLIENT_COD`,`client`.`CLIENT_ID_client_lve` AS `CLIENT_ID_client_lve`,`client`.`telephone` AS `telephone`,`adresses`.`lib_adresse` AS `Adresse`,`ville`.`VILLE_LIB` AS `Ville` from (((`declaration_v` join `client`) join `ville`) join `adresses`) where `declaration_v`.`client1_id` = `client`.`CLIENT_ID_client_lve` and `declaration_v`.`client2_id` = `client`.`CLIENT_ID` and `ville`.`VILLE_COD` = `adresses`.`id_ville` and `client`.`CLIENT_ID` = `adresses`.`id_client` and `declaration_v`.`client1_id` = `adresses`.`id_user` and `declaration_v`.`id_adres` = `adresses`.`id_adresse` ;

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
-- Index pour la table `client_lve_session`
--
ALTER TABLE `client_lve_session`
  ADD PRIMARY KEY (`AGENCE_COD`) USING BTREE,
  ADD KEY `fk_ag_ref` (`REFERENCIEE`);

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

--
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
  MODIFY `id_adresse` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=175;

--
-- AUTO_INCREMENT pour la table `client`
--
ALTER TABLE `client`
  MODIFY `CLIENT_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=114;

--
-- AUTO_INCREMENT pour la table `client_lve`
--
ALTER TABLE `client_lve`
  MODIFY `CLIENT_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pour la table `points_relais`
--
ALTER TABLE `points_relais`
  MODIFY `id_pr` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `ramasse`
--
ALTER TABLE `ramasse`
  MODIFY `numeroCarnet` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=95;

--
-- AUTO_INCREMENT pour la table `reclamation`
--
ALTER TABLE `reclamation`
  MODIFY `id_reclamation` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
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
-- Contraintes pour la table `client`
--
ALTER TABLE `client`
  ADD CONSTRAINT `fkclirntlive` FOREIGN KEY (`CLIENT_ID_client_lve`) REFERENCES `client_lve` (`CLIENT_ID`);

--
-- Contraintes pour la table `client_lve_session`
--
ALTER TABLE `client_lve_session`
  ADD CONSTRAINT `fk_ag_ref` FOREIGN KEY (`REFERENCIEE`) REFERENCES `client_lve` (`CLIENT_ID`);

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

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
