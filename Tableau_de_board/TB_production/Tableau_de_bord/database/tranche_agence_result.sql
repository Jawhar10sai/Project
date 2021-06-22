-- phpMyAdmin SQL Dump
-- version 4.0.9
-- http://www.phpmyadmin.net
--
-- Client: 127.0.0.1
-- Généré le: Ven 08 Mai 2020 à 13:39
-- Version du serveur: 5.5.34
-- Version de PHP: 5.4.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `lvedbmobile`
--

-- --------------------------------------------------------

--
-- Structure de la vue `tdb_performance_tranche_agence`
--

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `tdb_performance_tranche_agence` AS select `utilisateurs`.`agence` AS `agence`,`ville`.`lib_ville` AS `lib_ville`,`cl`.`dateedition` AS `dateedition`,year(`cl`.`dateedition`) AS `aaaa`,month(`cl`.`dateedition`) AS `mm`,dayofmonth(`cl`.`dateedition`) AS `jj`,sum(`expedition`.`colis`) AS `nbrcolis`,count(distinct `expedition`.`destinataire`) AS `nbrpos`,count(`expedition`.`id`) AS `total`,sum((case when (`expedition`.`livraisoncode` <> 1) then 1 else 0 end)) AS `nonlivre`,sum((case when ((`expedition`.`motif` = 58) and (`expedition`.`livraisoncode` <> 1)) then 1 when (`expedition`.`livraisoncode` in (3,0)) then 1 else 0 end)) AS `nonlivrelivreur`,sum((case when ((date_format(`expedition`.`livraisondate`,'%k%i') < 800) and (`expedition`.`motif` <> 58) and (`expedition`.`livraisoncode` in (1,2))) then 1 else 0 end)) AS `CAS0800`,sum((case when ((date_format(`expedition`.`livraisondate`,'%k%i') < 830) and (`expedition`.`motif` <> 58) and (`expedition`.`livraisoncode` in (1,2))) then 1 else 0 end)) AS `CAS0830`,sum((case when ((date_format(`expedition`.`livraisondate`,'%k%i') < 900) and (`expedition`.`motif` <> 58) and (`expedition`.`livraisoncode` in (1,2))) then 1 else 0 end)) AS `CAS0900`,sum((case when ((date_format(`expedition`.`livraisondate`,'%k%i') < 930) and (`expedition`.`motif` <> 58) and (`expedition`.`livraisoncode` in (1,2))) then 1 else 0 end)) AS `CAS0930`,sum((case when ((date_format(`expedition`.`livraisondate`,'%k%i') < 1000) and (`expedition`.`motif` <> 58) and (`expedition`.`livraisoncode` in (1,2))) then 1 else 0 end)) AS `CAS1000`,sum((case when ((date_format(`expedition`.`livraisondate`,'%k%i') < 1030) and (`expedition`.`motif` <> 58) and (`expedition`.`livraisoncode` in (1,2))) then 1 else 0 end)) AS `CAS1030`,sum((case when ((date_format(`expedition`.`livraisondate`,'%k%i') < 1100) and (`expedition`.`motif` <> 58) and (`expedition`.`livraisoncode` in (1,2))) then 1 else 0 end)) AS `CAS1100`,sum((case when ((date_format(`expedition`.`livraisondate`,'%k%i') < 1130) and (`expedition`.`motif` <> 58) and (`expedition`.`livraisoncode` in (1,2))) then 1 else 0 end)) AS `CAS1130`,sum((case when ((date_format(`expedition`.`livraisondate`,'%k%i') < 1200) and (`expedition`.`motif` <> 58) and (`expedition`.`livraisoncode` in (1,2))) then 1 else 0 end)) AS `CAS1200`,sum((case when ((date_format(`expedition`.`livraisondate`,'%k%i') < 1230) and (`expedition`.`motif` <> 58) and (`expedition`.`livraisoncode` in (1,2))) then 1 else 0 end)) AS `CAS1230`,sum((case when ((date_format(`expedition`.`livraisondate`,'%k%i') < 1300) and (`expedition`.`motif` <> 58) and (`expedition`.`livraisoncode` in (1,2))) then 1 else 0 end)) AS `CAS1300`,sum((case when ((date_format(`expedition`.`livraisondate`,'%k%i') < 1330) and (`expedition`.`motif` <> 58) and (`expedition`.`livraisoncode` in (1,2))) then 1 else 0 end)) AS `CAS1330`,sum((case when ((date_format(`expedition`.`livraisondate`,'%k%i') < 1400) and (`expedition`.`motif` <> 58) and (`expedition`.`livraisoncode` in (1,2))) then 1 else 0 end)) AS `CAS1400`,sum((case when ((date_format(`expedition`.`livraisondate`,'%k%i') < 1430) and (`expedition`.`motif` <> 58) and (`expedition`.`livraisoncode` in (1,2))) then 1 else 0 end)) AS `CAS1430`,sum((case when ((date_format(`expedition`.`livraisondate`,'%k%i') < 1500) and (`expedition`.`motif` <> 58) and (`expedition`.`livraisoncode` in (1,2))) then 1 else 0 end)) AS `CAS1500`,sum((case when ((date_format(`expedition`.`livraisondate`,'%k%i') < 1530) and (`expedition`.`motif` <> 58) and (`expedition`.`livraisoncode` in (1,2))) then 1 else 0 end)) AS `CAS1530`,sum((case when ((date_format(`expedition`.`livraisondate`,'%k%i') < 1600) and (`expedition`.`motif` <> 58) and (`expedition`.`livraisoncode` in (1,2))) then 1 else 0 end)) AS `CAS1600`,sum((case when ((date_format(`expedition`.`livraisondate`,'%k%i') < 1630) and (`expedition`.`motif` <> 58) and (`expedition`.`livraisoncode` in (1,2))) then 1 else 0 end)) AS `CAS1630`,sum((case when ((date_format(`expedition`.`livraisondate`,'%k%i') < 1700) and (`expedition`.`motif` <> 58) and (`expedition`.`livraisoncode` in (1,2))) then 1 else 0 end)) AS `CAS1700`,sum((case when ((date_format(`expedition`.`livraisondate`,'%k%i') < 1730) and (`expedition`.`motif` <> 58) and (`expedition`.`livraisoncode` in (1,2))) then 1 else 0 end)) AS `CAS1730`,sum((case when ((date_format(`expedition`.`livraisondate`,'%k%i') < 1800) and (`expedition`.`motif` <> 58) and (`expedition`.`livraisoncode` in (1,2))) then 1 else 0 end)) AS `CAS1800`,sum((case when ((date_format(`expedition`.`livraisondate`,'%k%i') < 1830) and (`expedition`.`motif` <> 58) and (`expedition`.`livraisoncode` in (1,2))) then 1 else 0 end)) AS `CAS1830`,sum((case when ((date_format(`expedition`.`livraisondate`,'%k%i') < 1900) and (`expedition`.`motif` <> 58) and (`expedition`.`livraisoncode` in (1,2))) then 1 else 0 end)) AS `CAS1900`,sum((case when ((date_format(`expedition`.`livraisondate`,'%k%i') < 2000) and (`expedition`.`motif` <> 58) and (`expedition`.`livraisoncode` in (1,2))) then 1 else 0 end)) AS `CAS2000`,sum((case when ((date_format(`expedition`.`livraisondate`,'%k%i') < 2200) and (`expedition`.`motif` <> 58) and (`expedition`.`livraisoncode` in (1,2))) then 1 else 0 end)) AS `CAS2200`,sum((case when ((date_format(`expedition`.`livraisondate`,'%k%i') <= 2359) and (`expedition`.`motif` <> 58) and (`expedition`.`livraisoncode` in (1,2))) then 1 else 0 end)) AS `CAS2300` from (((`expedition` join `cl` on((`cl`.`numerocl` = `expedition`.`numerocl`))) join `utilisateurs` on((`cl`.`matricule` = `utilisateurs`.`matricule`))) join `ville` on((`utilisateurs`.`agence` = `ville`.`code_ville`))) group by `utilisateurs`.`agence`,`ville`.`lib_ville`,`cl`.`dateedition`,year(`cl`.`dateedition`),month(`cl`.`dateedition`),dayofmonth(`cl`.`dateedition`);

--
-- VIEW  `tdb_performance_tranche_agence`
-- Données: Aucune
--


/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
