/*
*Source
*/
ALTER ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `tdb_performance_tranche_agence` AS select `utilisateurs`.`agence` AS `agence`,
`ville`.`lib_ville` AS `lib_ville`,
`cl`.`dateedition` AS `dateedition`,
year(`cl`.`dateedition`) AS `aaaa`,
month(`cl`.`dateedition`) AS `mm`,
dayofmonth(`cl`.`dateedition`) AS `jj`,
sum(`expedition`.`colis`) AS `nbrcolis`,
count(distinct `expedition`.`destinataire`) AS `nbrpos`,
count(`expedition`.`id`) AS `total`,
sum((case when (`expedition`.`livraisoncode` <> 1) then 1 else 0 end)) AS `nonlivre`,
sum((case when ((`expedition`.`motif` = 58) and (`expedition`.`livraisoncode` <> 1)) then 1 when (`expedition`.`livraisoncode` in (3,0)) then 1 else 0 end)) AS `nonlivrelivreur`,
sum((case when ((date_format(`expedition`.`livraisondate`,'%k%i') < 800) and (`expedition`.`motif` <> 58) and (`expedition`.`livraisoncode` in (1,2))) then 1 else 0 end)) AS `CAS0800`,
sum((case when ((date_format(`expedition`.`livraisondate`,'%k%i') < 830) and (`expedition`.`motif` <> 58) and (`expedition`.`livraisoncode` in (1,2))) then 1 else 0 end)) AS `CAS0830`,
sum((case when ((date_format(`expedition`.`livraisondate`,'%k%i') < 900) and (`expedition`.`motif` <> 58) and (`expedition`.`livraisoncode` in (1,2))) then 1 else 0 end)) AS `CAS0900`,
sum((case when ((date_format(`expedition`.`livraisondate`,'%k%i') < 930) and (`expedition`.`motif` <> 58) and (`expedition`.`livraisoncode` in (1,2))) then 1 else 0 end)) AS `CAS0930`,
sum((case when ((date_format(`expedition`.`livraisondate`,'%k%i') < 1000) and (`expedition`.`motif` <> 58) and (`expedition`.`livraisoncode` in (1,2))) then 1 else 0 end)) AS `CAS1000`,
sum((case when ((date_format(`expedition`.`livraisondate`,'%k%i') < 1030) and (`expedition`.`motif` <> 58) and (`expedition`.`livraisoncode` in (1,2))) then 1 else 0 end)) AS `CAS1030`,
sum((case when ((date_format(`expedition`.`livraisondate`,'%k%i') < 1100) and (`expedition`.`motif` <> 58) and (`expedition`.`livraisoncode` in (1,2))) then 1 else 0 end)) AS `CAS1100`,
sum((case when ((date_format(`expedition`.`livraisondate`,'%k%i') < 1130) and (`expedition`.`motif` <> 58) and (`expedition`.`livraisoncode` in (1,2))) then 1 else 0 end)) AS `CAS1130`,
sum((case when ((date_format(`expedition`.`livraisondate`,'%k%i') < 1200) and (`expedition`.`motif` <> 58) and (`expedition`.`livraisoncode` in (1,2))) then 1 else 0 end)) AS `CAS1200`,
sum((case when ((date_format(`expedition`.`livraisondate`,'%k%i') < 1230) and (`expedition`.`motif` <> 58) and (`expedition`.`livraisoncode` in (1,2))) then 1 else 0 end)) AS `CAS1230`,
sum((case when ((date_format(`expedition`.`livraisondate`,'%k%i') < 1300) and (`expedition`.`motif` <> 58) and (`expedition`.`livraisoncode` in (1,2))) then 1 else 0 end)) AS `CAS1300`,
sum((case when ((date_format(`expedition`.`livraisondate`,'%k%i') < 1330) and (`expedition`.`motif` <> 58) and (`expedition`.`livraisoncode` in (1,2))) then 1 else 0 end)) AS `CAS1330`,
sum((case when ((date_format(`expedition`.`livraisondate`,'%k%i') < 1400) and (`expedition`.`motif` <> 58) and (`expedition`.`livraisoncode` in (1,2))) then 1 else 0 end)) AS `CAS1400`,
sum((case when ((date_format(`expedition`.`livraisondate`,'%k%i') < 1430) and (`expedition`.`motif` <> 58) and (`expedition`.`livraisoncode` in (1,2))) then 1 else 0 end)) AS `CAS1430`,
sum((case when ((date_format(`expedition`.`livraisondate`,'%k%i') < 1500) and (`expedition`.`motif` <> 58) and (`expedition`.`livraisoncode` in (1,2))) then 1 else 0 end)) AS `CAS1500`,
sum((case when ((date_format(`expedition`.`livraisondate`,'%k%i') < 1530) and (`expedition`.`motif` <> 58) and (`expedition`.`livraisoncode` in (1,2))) then 1 else 0 end)) AS `CAS1530`,
sum((case when ((date_format(`expedition`.`livraisondate`,'%k%i') < 1600) and (`expedition`.`motif` <> 58) and (`expedition`.`livraisoncode` in (1,2))) then 1 else 0 end)) AS `CAS1600`,
sum((case when ((date_format(`expedition`.`livraisondate`,'%k%i') < 1630) and (`expedition`.`motif` <> 58) and (`expedition`.`livraisoncode` in (1,2))) then 1 else 0 end)) AS `CAS1630`,
sum((case when ((date_format(`expedition`.`livraisondate`,'%k%i') < 1700) and (`expedition`.`motif` <> 58) and (`expedition`.`livraisoncode` in (1,2))) then 1 else 0 end)) AS `CAS1700`,
sum((case when ((date_format(`expedition`.`livraisondate`,'%k%i') < 1730) and (`expedition`.`motif` <> 58) and (`expedition`.`livraisoncode` in (1,2))) then 1 else 0 end)) AS `CAS1730`,
sum((case when ((date_format(`expedition`.`livraisondate`,'%k%i') < 1800) and (`expedition`.`motif` <> 58) and (`expedition`.`livraisoncode` in (1,2))) then 1 else 0 end)) AS `CAS1800`,
sum((case when ((date_format(`expedition`.`livraisondate`,'%k%i') < 1830) and (`expedition`.`motif` <> 58) and (`expedition`.`livraisoncode` in (1,2))) then 1 else 0 end)) AS `CAS1830`,
sum((case when ((date_format(`expedition`.`livraisondate`,'%k%i') < 1900) and (`expedition`.`motif` <> 58) and (`expedition`.`livraisoncode` in (1,2))) then 1 else 0 end)) AS `CAS1900`,
sum((case when ((date_format(`expedition`.`livraisondate`,'%k%i') < 2000) and (`expedition`.`motif` <> 58) and (`expedition`.`livraisoncode` in (1,2))) then 1 else 0 end)) AS `CAS2000`,
sum((case when ((date_format(`expedition`.`livraisondate`,'%k%i') < 2200) and (`expedition`.`motif` <> 58) and (`expedition`.`livraisoncode` in (1,2))) then 1 else 0 end)) AS `CAS2200`,
sum((case when ((date_format(`expedition`.`livraisondate`,'%k%i') <= 2359) and (`expedition`.`motif` <> 58) and (`expedition`.`livraisoncode` in (1,2))) then 1 else 0 end)) AS `CAS2300`
from (((`expedition` join `cl` on((`cl`.`numerocl` = `expedition`.`numerocl`))) join `utilisateurs` on((`cl`.`matricule` = `utilisateurs`.`matricule`))) join `ville` on((`utilisateurs`.`agence` = `ville`.`code_ville`))) group by `utilisateurs`.`agence`,`ville`.`lib_ville`,`cl`.`dateedition`,year(`cl`.`dateedition`),month(`cl`.`dateedition`),dayofmonth(`cl`.`dateedition`)
/*
*creation
*/-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  lun. 04 mai 2020 à 16:28
-- Version du serveur :  10.4.8-MariaDB
-- Version de PHP :  7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `tableau_de_bord`
--

-- --------------------------------------------------------

--
-- Structure de la table `tbl_performance_liv`
--

CREATE TABLE `tdb_performance_tranche_agence` (
  `agence`  int(11)  NULL,
   `lib_ville` varchar(50)  NULL,
   `dateedition` date NULL,
   `aaaa` int(4)  NULL,
   `mm` int(2)  NULL,
  `jj` int(2)  NULL,
  `nbrcolis` decimal(10,0)  NULL,
  `nbrpos` bigint(20)  NULL,
  `total` bigint(20)  NULL,
  `nonlivre` decimal(10,0)  NULL,
  `nonlivrelivreur` decimal(10,0)  NULL,
  `CAS0800` decimal(10,0)  NULL,
  `CAS0830` decimal(10,0)  NULL,
  `CAS0900` decimal(10,0)  NULL,
  `CAS0930` decimal(10,0)  NULL,
  `CAS1000` decimal(10,0)  NULL,
  `CAS1030` decimal(10,0)  NULL,
  `CAS1100` decimal(10,0)  NULL,
  `CAS1130` decimal(10,0)  NULL,
  `CAS1200` decimal(10,0)  NULL,
  `CAS1230` decimal(10,0)  NULL,
  `CAS1300` decimal(10,0)  NULL,
  `CAS1330` decimal(10,0)  NULL,
  `CAS1400` decimal(10,0)  NULL,
  `CAS1430` decimal(10,0)  NULL,
  `CAS1500` decimal(10,0)  NULL,
  `CAS1530` decimal(10,0)  NULL,
  `CAS1600` decimal(10,0)  NULL,
  `CAS1630` decimal(10,0)  NULL,
  `CAS1700` decimal(10,0)  NULL,
  `CAS1730` decimal(10,0)  NULL,
  `CAS1800` decimal(10,0)  NULL,
  `CAS1830` decimal(10,0)  NULL,
  `CAS1900` decimal(10,0)  NULL,
  `CAS2000` decimal(10,0)  NULL,
  `CAS2200` decimal(10,0)  NULL,
  `CAS2300` decimal(10,0)  NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

/*--------------------------------------------------------------------------------------------------------------------------------------------------*/
