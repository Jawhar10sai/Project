-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 26, 2021 at 06:34 PM
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
-- Database: `lve_gpda`
--

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
  `date-sortie` datetime DEFAULT NULL,
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
  ADD PRIMARY KEY (`id_livreur`);

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
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
