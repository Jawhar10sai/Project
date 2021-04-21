-- phpMyAdmin SQL Dump
-- version 4.9.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : lun. 20 juil. 2020 à 16:45
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
-- Base de données : `taxation_test`
--

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
  `ZONE_COD` char(4) DEFAULT NULL,
  `modifie_le` datetime DEFAULT NULL,
  `supprime_le` datetime DEFAULT NULL,
  `commit_par` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `ville`
--

INSERT INTO `villes` (`VILLE_COD`, `AGENCE_COD`, `VILLE_LIB`, `VILLE_TYP`, `DELAI`, `ZONE_COD`) VALUES
(100, 100, 'CASABLANCA', '1', 1, 'A'),
(101, 100, 'BOUSKOURA', '1', 1, 'B'),
(102, 100, 'MOHAMMEDIA', '1', 1, 'A'),
(103, 100, 'AIN HARROUDA', '1', 1, 'B'),
(104, 100, 'HAD SOUALEM', '1', 1, 'B'),
(105, 100, 'NOUASSER', '1', 1, 'B'),
(106, 100, 'Lissasfa IAM', '1', 1, 'B'),
(107, 600, 'BOUZNIKA', '1', 1, 'B'),
(109, 100, 'MOHAMMADIA BIS', '2', 1, 'B'),
(110, 110, 'EL JADIDA', '1', 1, 'A'),
(111, 110, 'AZEMMOUR', '1', 1, 'B'),
(112, 110, 'BIR JDID', '1', 1, 'B'),
(120, 120, 'SAFI', '1', 1, 'A'),
(121, 110, 'SIDI BENNOUR', '1', 10, 'C'),
(122, 120, 'SIDI SMAIL', '1', 2, 'C'),
(123, 110, 'KHEMISS ZEMAMRA', '1', 2, 'C'),
(124, 120, 'YOUSSOUFIA', '1', 3, 'C'),
(125, 120, 'JEMAA SHAIM', '1', 2, 'C'),
(126, 120, 'CHEMAIA', '1', 2, 'C'),
(127, 120, 'TNINE LAGHYAT', '2', 3, 'C'),
(128, 110, 'OUALIDIA', '1', 3, 'C'),
(129, 120, 'SEBT GZOULA', '1', 2, 'C'),
(150, 100, 'AIN SEBAA', '1', 1, 'B'),
(151, 100, 'Logiprod', '1', 1, 'C'),
(152, 600, 'Ain Atiq', '2', 1, 'C'),
(200, 200, 'TANGER', '1', 1, 'A'),
(210, 210, 'TETOUAN', '1', 1, 'A'),
(211, 220, 'CHEFCHAOUEN', '1', 3, 'C'),
(212, 210, 'FNIDEQ', '1', 1, 'B'),
(213, 220, 'CHAOUEN', '1', 3, 'C'),
(214, 210, 'HAD BENI RZINE', '2', 2, 'C'),
(215, 210, 'BAB BERRED', '1', 5, 'C'),
(216, 220, 'OUAZZANE', '1', 3, 'C'),
(217, 210, 'Ain Derrij', '2', 10, 'C'),
(218, 210, 'MARTIL', '1', 1, 'B'),
(219, 210, 'MEDIAQ', '1', 1, 'B'),
(220, 220, 'LARACHE', '1', 3, 'A'),
(221, 220, 'LAOUAMRA', '1', 5, 'B'),
(222, 220, 'ASILAH', '1', 15, 'B'),
(223, 220, 'KSAR EL KEBIR', '1', 5, 'B'),
(224, 200, 'DEPOT TANGER', '1', 1, 'C'),
(230, 200, 'TANGER MED', '1', 1, 'C'),
(300, 300, 'AGADIR', '1', 1, 'A'),
(301, 300, 'AOURIR', '1', 3, 'C'),
(302, 300, 'BOUIZAKARNE', '1', 7, 'C'),
(303,NULL 'BOUJDOUR', '1', 30, 'C'),
(304,NULL 'DAKHLA', '1', 30, 'C'),
(305, 350, 'GUELMIM', '1', 15, 'C'),
(306, 300, 'IMINTANOUTE', '1', 3, 'C'),
(307, 300, 'BEN SERGAO', '1', 3, 'B'),
(308, 300, 'SMARA', '1', 30, 'C'),
(309, 350, 'TANTAN', '1', 15, 'C'),
(310,NULL 'TARFAYA', '1', 15, 'C'),
(311, 300, 'TATA', '2', 30, 'C'),
(312, 300, 'ANZA', '1', 1, 'C'),
(320, 350, 'OULED BERHIL', '2', 3, 'C'),
(321, 350, 'IGHREM', '2', 5, 'C'),
(322, 350, 'MASSA', '1', 5, 'C'),
(323, 350, 'KHEMIS AIT AMIRA', '1', 5, 'C'),
(324, 350, 'KLEAA', '1', 5, 'C'),
(325, 350, 'AZROU SUD', '1', 5, 'C'),
(326, 350, 'TIKIOUINE', '1', 1, 'B'),
(327, 350, 'SMIMOU', '1', 5, 'C'),
(328, 350, 'TAMANAR', '1', 5, 'C'),
(329, 350, 'TIZNIT', '1', 3, 'C'),
(350, 350, 'AIT MELLOUL', '1', 1, 'A'),
(351, 350, 'INZEGANE', '1', 1, 'A'),
(352, 350, 'OULED TEIMA', '1', 2, 'B'),
(353, 350, 'TAROUDANTE', '1', 2, 'B'),
(354, 350, 'SIDI IFNI', '1', 15, 'C'),
(355, 350, 'TALIOUINE', '1', 5, 'C'),
(356, 350, 'DCHEIRA', '1', 3, 'B'),
(357, 350, 'BIOUGRA', '1', 3, 'B'),
(370, 350, 'LAAYOUNE', '1', 15, 'A'),
(371,NULL 'ESSMARA', '2', 30, 'C'),
(372, 350, 'AIT BAHA', '1', 5, 'C'),
(373, 350, 'AIT MILK', '2', 5, 'C'),
(400, 400, 'OUJDA', '1', 1, 'A'),
(401, 400, 'AHFIR', '1', 1, 'C'),
(402, 400, 'BOUARFA', '1', 15, 'C'),
(403, 400, 'FIGUIG', '2', 15, 'C'),
(404, 400, 'JERADA', '1', 15, 'C'),
(405, 400, 'LAYOUN', '1', 3, 'C'),
(406, 430, 'TAOURIRT', '1', 5, 'C'),
(407, 400, 'SAIDIA', '1', 2, 'B'),
(408, 400, 'EL AIOUN', '1', 3, 'C'),
(410, 410, 'NADOR', '1', 1, 'A'),
(411, 410, 'ZAIO', '1', 2, 'B'),
(412, 410, 'DRIOUCH', '1', 2, 'C'),
(413, 410, 'BENI NSAR', '1', 2, 'C'),
(414, 410, 'EL HOCEIMA', '1', 7, 'C'),
(415, 410, 'IMZOUREN', '1', 7, 'C'),
(416, 410, 'MONT AROUI', '1', 5, 'C'),
(417, 410, 'BENI HDIFA', '1', 7, 'C'),
(418, 410, 'Ain Zaura', '2', 7, 'C'),
(419, 410, 'AIT MILK', '2', 7, 'C'),
(420, 400, 'BERKANE', '1', 1, 'B'),
(421, 410, 'MIDAR', '1', 7, 'C'),
(422, 410, 'ZGHENGHEN', '1', 7, 'C'),
(423, 410, 'SELOUANE', '1', 7, 'C'),
(424, 410, 'BEN TAYEB', '1', 7, 'C'),
(425, 410, 'KARIAT AREKMAN', '1', 5, 'C'),
(430, 430, 'TAZA', '1', 1, 'A'),
(431, 430, 'GUERCIF', '1', 1, 'B'),
(432, 430, 'OUED AMLIL', '1', 1, 'C'),
(433, 430, 'TAHLA', '1', 3, 'C'),
(434, 430, 'KETAMA', '1', 7, 'C'),
(435, 430, 'BENI BOUAYACH', '1', 7, 'C'),
(436, 410, 'TARGUIST', '1', 5, 'C'),
(437, 430, 'GHAFSAI', '1', 1, 'C'),
(500, 500, 'FES', '1', 1, 'A'),
(501, 500, 'AIN TAOUJTATE', '1', 2, 'C'),
(502, 500, 'ARFOUD', '1', 7, 'C'),
(503, 500, 'BOULMANE', '1', 5, 'C'),
(504, 500, 'ERRACHIDIA', '1', 7, 'C'),
(505, 500, 'GUOULMIMA', '2', 7, 'C'),
(506, 500, 'IFRANE', '1', 5, 'B'),
(507, 500, 'IMMOUZER', '1', 3, 'C'),
(508, 800, 'KHENIFRA', '1', 5, 'C'),
(509, 500, 'MIDELT', '1', 7, 'C'),
(510, 500, 'SEFROU', '1', 5, 'B'),
(511, 500, 'TAOUNATE', '1', 15, 'C'),
(512, 500, 'TISSA', '2', 15, 'C'),
(513, 500, 'AOUFOUS', '2', 15, 'C'),
(514, 500, 'MISSOUR', '2', 15, 'C'),
(515, 500, 'KARIAT BA MHAMED', '1', 15, 'C'),
(516, 500, 'RIBAT EL KHEIR', '1', 15, 'C'),
(517, 500, 'OUTAT EL HAJ', '2', 15, 'C'),
(550, 550, 'MEKNES', '1', 1, 'A'),
(551, 500, 'AZROU', '1', 5, 'C'),
(552, 550, 'KHEMISSET', '1', 3, 'B'),
(553, 500, 'LABHALIL', '1', 3, 'C'),
(554, 500, 'ITZER', '1', 15, 'C'),
(555, 500, 'BOUMIA', '1', 15, 'C'),
(556, 550, 'MRIRT', '1', 7, 'C'),
(557, 550, 'BOUFEKRANE', '1', 3, 'C'),
(558, 550, 'OUISLANE', '1', 2, 'C'),
(559, 550, 'ROMMANI', '1', 5, 'C'),
(560, 550, 'OULMES', '1', 5, 'C'),
(561, 550, 'ZAIDA', '1', 5, 'C'),
(562, 550, 'Station Shell OumRrbii', '1', 3, 'C'),
(600, 600, 'RABAT', '1', 1, 'A'),
(601, 600, 'SALE', '1', 1, 'A'),
(602, 600, 'SIDI ALLAL BAHRAOUI', '1', 2, 'C'),
(603, 650, 'SIDI KACEM', '1', 3, 'C'),
(604, 650, 'SIDI SLIMANE', '1', 3, 'B'),
(605, 650, 'SIDI YAHIA GHARB', '1', 3, 'B'),
(606, 220, 'SOUK LARBAA', '1', 3, 'B'),
(607, 600, 'TEMARA', '1', 1, 'A'),
(608, 550, 'TIFELT', '1', 3, 'B'),
(609, 600, 'SKHIRAT', '1', 1, 'B'),
(610, 100, 'BEN SLIMANE', '1', 2, 'C'),
(611, 650, 'BELKSIRI', '1', 3, 'C'),
(612, 650, 'LALLA MAYMOUNA', '1', 3, 'C'),
(614, 650, 'SIDI YAHYA ZAER', '1', 3, 'C'),
(615, 650, 'ARBAOUA', '1', 3, 'C'),
(616, 650, 'HAD KOURT', '1', 3, 'C'),
(617, 650, 'MECHRAA BEL KSIRI', '1', 3, 'C'),
(618, 650, 'SOUK TLET GHARB', '1', 3, 'C'),
(619, 600, 'AIN ATIQ', '1', 1, 'B'),
(620, 650, 'JORF EL MELHA', '1', 3, 'C'),
(621, 600, 'Rabat Centre', '2', 1, 'B'),
(622, 600, 'Rabat océan', '2', 1, 'B'),
(650, 650, 'KENITRA', '1', 1, 'A'),
(651, 650, 'DAR EL GUEDDARI', '1', 3, 'C'),
(652, 650, 'El Mudzine', '1', 3, 'C'),
(653, 650, 'KSIBIA', '1', 3, 'C'),
(660,NULL 'AL GHARB', '1', 3, 'C'),
(700, 700, 'MARRAKECH', '1', 1, 'A'),
(701, 700, 'BEN GUERIR', '1', 3, 'C'),
(702, 700, 'KELAAT SRAGHNA', '1', 5, 'C'),
(703, 700, 'CHICHAOUA', '1', 5, 'C'),
(704, 120, 'ESSAOUIRA', '1', 7, 'C'),
(705, 700, 'OUARZAZATE', '1', 7, 'C'),
(706, 700, 'TINGHIR', '1', 7, 'C'),
(707, 700, 'KELAAT MEGOUNA', '1', 7, 'C'),
(708, 700, 'ZAGOURA', '1', 15, 'C'),
(709, 700, 'AGDZ', '1', 10, 'C'),
(710, 700, 'AIT OURIR', '1', 7, 'C'),
(711, 700, 'ATTAOUIA', '1', 5, 'C'),
(712, 700, 'BOUMALNE DADES', '1', 7, 'C'),
(713, 700, 'RISSANI', '1', 15, 'C'),
(715, 700, 'TINJDAD', '1', 15, 'C'),
(716, 700, 'OURIKA', '1', 5, 'C'),
(717, 500, 'RICH', '1', 15, 'C'),
(718, 700, 'DEMNATE', '1', 7, 'C'),
(719, 700, 'AMZMIZ', '1', 7, 'C'),
(800, 800, 'BENI MELLAL', '1', 1, 'A'),
(801, 100, 'BEJAAD', '1', 3, 'C'),
(802, 100, 'BEN HMAD', '1', 2, 'B'),
(803, 100, 'BERRECHID', '1', 1, 'A'),
(804, 100, 'FKIH BEN SALEH', '1', 2, 'B'),
(805, 800, 'KASBAT TADLA', '1', 2, 'B'),
(806, 100, 'KHOURIBGA', '1', 1, 'B'),
(807, 800, 'OUED ZEM', '1', 2, 'B'),
(808, 100, 'SETTAT', '1', 1, 'A'),
(809, 800, 'SOUK SEBT', '1', 2, 'B'),
(810, 800, 'AZILAL', '1', 5, 'C'),
(811, 100, 'EL GARA', '1', 2, 'C'),
(812, 550, 'EL HAJEB', '1', 3, 'C'),
(813, 800, 'TAMELLALTE', '1', 5, 'C'),
(814, 800, 'OULED AYAD', '1', 5, 'C'),
(815,NULL 'KHMISS OULAD AYAD', '1', 5, 'C'),
(816,NULL 'BOUJNIBA', '1', 3, 'C'),
(817, 800, 'DEPOT BENI MELLAL', '1', 1, 'B'),
(818,NULL 'SEBT NEMMA', '1', 3, 'C'),
(819,NULL 'AFOURAR', '1', 3, 'C'),
(820,NULL 'ZAOUIYAT CHEIKH', '1', 5, 'C'),
(822,NULL 'OULED ZIDOUH', '1', 5, 'C'),
(823,NULL 'OULED LAMRAH', '1', 5, 'C'),
(824, 800, 'OULAD ZMAM', '1', 5, 'C'),
(825,NULL 'OULAD MBAREK', '1', 5, 'C'),
(826,NULL 'KSSIBA', '1', 5, 'C'),
(827,NULL 'OUAOUIZERTH', '1', 5, 'C'),
(828, 800, 'OULED ZMAM', '2', 3, 'C'),
(829,NULL 'TIGHSSALINE', '1', 5, 'C'),
(830,NULL 'AIT ISHAQ', '1', 5, 'C'),
(831, 100, 'LAKHYAYTA', '1', 1, 'C'),
(832, 800, 'TLAT OULAD', '1', 2, 'C'),
(833,NULL 'GUISSER', '1', 3, 'C'),
(834, 100, 'TIT MELLIL', '1', 1, 'C'),
(905, 100, 'DERB GHALEF', '1', 5, 'C'),
(906,NULL 'Tafilalt', '1', 1, 'A'),
(907,NULL 'Tafraout', '1', 1, 'C');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `ville`
--
ALTER TABLE `ville`
  ADD PRIMARY KEY (`VILLE_COD`),
  ADD KEY `fk_agences` (`AGENCE_COD`);

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `ville`
--
ALTER TABLE `ville`
  ADD CONSTRAINT `fk_agences` FOREIGN KEY (`AGENCE_COD`) REFERENCES `agence` (`AGENCE_COD`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
