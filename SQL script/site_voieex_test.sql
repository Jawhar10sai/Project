-- phpMyAdmin SQL Dump
-- version 4.9.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mar. 17 mars 2020 à 18:27
-- Version du serveur :  10.4.8-MariaDB
-- Version de PHP : 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `site_voieex_test`
--

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
('600', 'Rabat', '77 rue london, l\'océan', '0537262597'),
('650', 'Kenitra', '10 rue ibnou al banna, ville nouvelle', '0537379821'),
('700', 'Marrakech', '514 quartier industriel sidi ghanem', '0524336174'),
('800', 'Beni Mellal', '8JPR+MJ Béni Mellal', '0523483928');

-- --------------------------------------------------------

--
-- Structure de la table `images`
--

CREATE TABLE `images` (
  `id_image` int(11) NOT NULL,
  `file_name` varchar(250) NOT NULL,
  `uploaded_on` datetime NOT NULL
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

-- --------------------------------------------------------

--
-- Structure de la table `offres_d_emploi`
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
-- Déchargement des données de la table `offres_d_emploi`
--

INSERT INTO `offres_d_emploi` (`id_offre`, `titre_offre`, `presentation`, `presentation_mission`, `missions`, `profil`, `disponibilite`) VALUES
(1, 'Résponsable qualité', 'Créé en 1997, la Voie Express est aujourd’hui leader sur le marché marocain. Nous nous positionnons sur le marché de Transport, Messagerie et également la Logistique. Grâce à l’engagement de la Direction Générale, à l’implication de nos collaborateurs et à l’inscription dans une démarche qualité basée sur l’amélioration continue et la satisfaction Client, nous sommes certifiés ISO 9001 version 2008. Pour accompagner notre croissance, nous recherchons un Responsable Management Qualité (RMQ)', 'Rattaché à la Direction Générale, et en tant qu’un \'interlocuteur privilégié dans le domaine de la qualité, vos principales missions seront les suivantes: Manager, assurer et optimiser le fonctionnement de son service dans le cadre des règles internes et conformément au manuel qualité.', '    Développer la culture qualité |     Assurer et entretenir le système de management de qualité |     Assurer la gestion et le reporting autour du SMQ |     Assurer le suivi et le développement du système documentaire |     Assurer le suivi, l\'amélioration continue autour de l\'ensemble des processus de management de la qualité en assistant les opérationnels dans la rédaction et l\'évolution de leur processus |     Sensibiliser et veiller à l\'application des procédures |     Assurer le suivi et la mesure de l\'efficacité des actions correctives et préventives sur les processus |     Participer aux audits systèmes (internes et externes) et au pilotage des plans d\'actions correspondants. |     Assurer le traitement des réclamations clients et des non-conformités. |     Participer à la revue de Direction et rédiger le compte rendu.', 'De formation Bac + 5 en management de la qualité. Vous justifiez une expérience de 5 ans minimum dans un poste similaire et idéalement dans un environnement certifié ISO. Esprit de synthèse et d\'analyse, autonomie, perspicacité, rigueur, ténacité, pédagogie, capacité d\'animation et leadership, capacité d\'encadrement, capacité à convaincre, clarté d\'expression orale et écrite avec de réelles aptitudes à véhiculer l\'esprit qualité Maîtrise de l\'anglais est un atout souhaitable', 'Disponible immédiatement');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `agence`
--
ALTER TABLE `agence`
  ADD PRIMARY KEY (`AGENCE_COD`);

--
-- Index pour la table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id_image`);

--
-- Index pour la table `img_ref`
--
ALTER TABLE `img_ref`
  ADD PRIMARY KEY (`code_ref`);

--
-- Index pour la table `offres_d_emploi`
--
ALTER TABLE `offres_d_emploi`
  ADD PRIMARY KEY (`id_offre`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `images`
--
ALTER TABLE `images`
  MODIFY `id_image` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT pour la table `img_ref`
--
ALTER TABLE `img_ref`
  MODIFY `code_ref` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT pour la table `offres_d_emploi`
--
ALTER TABLE `offres_d_emploi`
  MODIFY `id_offre` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
