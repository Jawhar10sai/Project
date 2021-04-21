-- phpMyAdmin SQL Dump
-- version 4.9.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : lun. 20 juil. 2020 à 11:04
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
-- Base de données : `test`
--

-- --------------------------------------------------------

--
-- Structure de la table `table_test`
--

CREATE TABLE `table_test_two` (
  `id` int(11) NOT NULL,
  `statut` varchar(10) NOT NULL,
  `count` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `table_test`
--

INSERT INTO `table_test_two` (`id`, `statut`, `count`) VALUES
(1, 'v', 0),
(2, 'v', 2);

--
-- Déclencheurs `table_test`
--
DELIMITER $$
CREATE TRIGGER `before_test_insert` AFTER INSERT ON `table_test_two` FOR EACH ROW BEGIN
    DECLARE rowcount INT;

    SELECT COUNT(*)
    INTO rowcount
    FROM table_test_two
    WHERE statut='v';

    IF rowcount > 0 THEN
        UPDATE table_test_two
        SET count = 1/rowcount;
    ELSE
        INSERT INTO table_test_two(statut,count)
        VALUES(new.statut,1);
    END IF;

END
$$
DELIMITER ;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `table_test`
--
ALTER TABLE `table_test_two`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `table_test`
--
ALTER TABLE `table_test_two`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
