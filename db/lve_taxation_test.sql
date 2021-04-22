-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 22, 2021 at 11:15 AM
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
-- Database: `lve_taxation_test`
--

-- --------------------------------------------------------

--
-- Table structure for table `adresses`
--

CREATE TABLE `adresses` (
  `id_adresse` bigint(20) UNSIGNED NOT NULL,
  `lib_adresse` varchar(255) NOT NULL,
  `id_client` bigint(20) NOT NULL,
  `id_user` bigint(20) NOT NULL,
  `id_ville` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `agences`
--

CREATE TABLE `agences` (
  `AGENCE_COD` varchar(255) NOT NULL,
  `AGENCE_LIB` varchar(255) NOT NULL,
  `AGENCE_ADRESSE` varchar(255) NOT NULL,
  `AGENCE_TEL` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `CLIENT_ID` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `NOM` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `PRENOM` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `CIVILITE_COD` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `CLIENT_TYP` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `IDENTITE_TYP` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'de',
  `IDENTITE_VAL` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ID_FISCALE` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `CAPITAL_SOC` decimal(50,0) DEFAULT NULL,
  `CLIENT_ETA` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `MOTIF_ETA` int(11) DEFAULT NULL,
  `SECTEUR_COD` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `EMPLOYE_ID` int(11) DEFAULT NULL,
  `AGENCE_COD` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `CLIENT_COD` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `commentaire` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mail` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ICE` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `CLIENT_ID_client_lve` int(11) NOT NULL,
  `telephone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `client_lves`
--

CREATE TABLE `client_lves` (
  `CLIENT_ID` bigint(20) UNSIGNED NOT NULL,
  `CLIENT_COD` varchar(255) NOT NULL,
  `NOM` varchar(255) NOT NULL,
  `PRENOM` varchar(255) DEFAULT NULL,
  `CIVILITE_COD` varchar(255) DEFAULT NULL,
  `CLIENT_TYP` varchar(255) DEFAULT NULL,
  `IDENTITE_TYP` varchar(255) NOT NULL DEFAULT 'de',
  `IDENTITE_VAL` varchar(255) DEFAULT NULL,
  `ID_FISCALE` varchar(255) DEFAULT NULL,
  `CAPITAL_SOC` decimal(50,0) DEFAULT NULL,
  `CLIENT_ETA` varchar(255) DEFAULT NULL,
  `MOTIF_ETA` int(11) DEFAULT NULL,
  `SECTEUR_COD` varchar(255) DEFAULT NULL,
  `EMPLOYE_ID` int(11) DEFAULT NULL,
  `AGENCE_COD` varchar(255) DEFAULT NULL,
  `CLIENT_COD2` varchar(255) NOT NULL,
  `debinterval` int(11) NOT NULL DEFAULT 0,
  `fininterval` int(11) NOT NULL DEFAULT 0,
  `intervalag_deb` int(11) NOT NULL DEFAULT 0,
  `intervalag_fin` int(11) NOT NULL DEFAULT 0,
  `commentaire` varchar(255) DEFAULT NULL,
  `mail` varchar(255) NOT NULL,
  `ICE` varchar(255) DEFAULT NULL,
  `adresse` varchar(255) NOT NULL,
  `ville` varchar(255) NOT NULL,
  `telephone` varchar(255) NOT NULL,
  `login` varchar(255) NOT NULL,
  `mot_de_passe` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `declarations`
--

CREATE TABLE `declarations` (
  `numero` varchar(255) NOT NULL,
  `facture_id` varchar(255) DEFAULT NULL,
  `colis` int(11) NOT NULL,
  `poids` decimal(8,2) NOT NULL,
  `palettes` int(11) DEFAULT NULL,
  `paletteA` int(11) DEFAULT NULL,
  `paletteB` int(11) DEFAULT NULL,
  `paletteC` int(11) DEFAULT NULL,
  `paletteAutre` int(11) DEFAULT NULL,
  `Nbre_palettes` int(11) DEFAULT NULL,
  `longueur` decimal(8,2) DEFAULT NULL,
  `hauteur` decimal(8,2) DEFAULT NULL,
  `largeur` decimal(8,2) DEFAULT NULL,
  `coef` decimal(8,2) DEFAULT NULL,
  `valeur` decimal(24,2) NOT NULL,
  `client1_id` int(11) NOT NULL,
  `client2_id` int(11) NOT NULL,
  `livraison` char(5) DEFAULT NULL,
  `express` char(5) NOT NULL,
  `port` char(5) NOT NULL,
  `courrier_typ` char(5) NOT NULL,
  `courrier_eta` char(5) NOT NULL,
  `userid` int(11) NOT NULL,
  `nature` varchar(255) DEFAULT NULL,
  `Espece` decimal(16,2) DEFAULT NULL,
  `Cheque` decimal(16,2) DEFAULT NULL,
  `Traite` decimal(16,2) DEFAULT NULL,
  `Nbre_BL` int(11) DEFAULT NULL,
  `BL` varchar(255) DEFAULT NULL,
  `id_adres` int(11) NOT NULL,
  `statut` varchar(255) DEFAULT NULL,
  `commentaire` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_11_27_142330_create_clients_table', 1),
(5, '2019_11_27_142617_create_declarations_table', 1),
(6, '2019_11_27_142647_create_agences_table', 1),
(7, '2019_11_27_142700_create_villes_table', 1),
(8, '2019_11_27_142714_create_sessions_table', 1),
(9, '2019_11_27_142812_create_adresses_table', 1),
(10, '2019_11_27_142838_create_points_relais_table', 1),
(11, '2019_11_28_113248_create_client_lves_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `points_relais`
--

CREATE TABLE `points_relais` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `AGENCE_COD` varchar(255) NOT NULL,
  `AGENCE_LIB` varchar(255) NOT NULL,
  `REFERENCIEE` bigint(20) NOT NULL,
  `LOGIN` varchar(255) NOT NULL,
  `MOT_D_PASS` varchar(255) NOT NULL,
  `IDENTITE_TYP` varchar(255) NOT NULL DEFAULT 'de',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `codeuser` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `villes`
--

CREATE TABLE `villes` (
  `VILLE_COD` bigint(20) NOT NULL,
  `AGENCE_COD` varchar(255) NOT NULL,
  `VILLE_LIB` varchar(255) NOT NULL,
  `VILLE_TYP` varchar(255) DEFAULT NULL,
  `DELAI` smallint(6) DEFAULT NULL,
  `ZONE_COD` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `villes`
--

INSERT INTO `villes` (`VILLE_COD`, `AGENCE_COD`, `VILLE_LIB`, `VILLE_TYP`, `DELAI`, `ZONE_COD`, `created_at`, `updated_at`) VALUES
(100, '100', 'Casablanca', '1', 1, 'A', '2021-04-19 15:34:42', NULL),
(800, '800', 'Beni Méllal', '1', 2, 'A', '2021-04-19 15:34:42', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `adresses`
--
ALTER TABLE `adresses`
  ADD PRIMARY KEY (`id_adresse`);

--
-- Indexes for table `client_lves`
--
ALTER TABLE `client_lves`
  ADD PRIMARY KEY (`CLIENT_ID`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `points_relais`
--
ALTER TABLE `points_relais`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `adresses`
--
ALTER TABLE `adresses`
  MODIFY `id_adresse` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `client_lves`
--
ALTER TABLE `client_lves`
  MODIFY `CLIENT_ID` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `points_relais`
--
ALTER TABLE `points_relais`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
