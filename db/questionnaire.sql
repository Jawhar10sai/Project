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
-- Database: `questionnaire`
--

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
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
