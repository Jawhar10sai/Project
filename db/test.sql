-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 22, 2021 at 11:19 AM
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
-- Database: `test`
--

-- --------------------------------------------------------

--
-- Table structure for table `distinctdate`
--

CREATE TABLE `distinctdate` (
  `jj` int(11) NOT NULL,
  `mm` int(11) NOT NULL,
  `aaaa` int(11) NOT NULL,
  `dateedition` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `distinctdate`
--

INSERT INTO `distinctdate` (`jj`, `mm`, `aaaa`, `dateedition`) VALUES
(1, 8, 2020, '2020-08-01'),
(2, 8, 2020, '2020-08-02'),
(3, 8, 2020, '2020-08-03'),
(4, 8, 2020, '2020-08-04'),
(5, 8, 2020, '2020-08-05'),
(6, 8, 2020, '2020-08-06'),
(7, 8, 2020, '2020-08-07'),
(8, 8, 2020, '2020-08-08'),
(9, 8, 2020, '2020-08-09'),
(10, 8, 2020, '2020-08-10'),
(11, 8, 2020, '2020-08-11'),
(12, 8, 2020, '2020-08-12'),
(13, 8, 2020, '2020-08-13'),
(14, 8, 2020, '2020-08-14'),
(15, 8, 2020, '2020-08-15'),
(16, 8, 2020, '2020-08-16'),
(17, 8, 2020, '2020-08-17'),
(18, 8, 2020, '2020-08-18'),
(19, 8, 2020, '2020-08-19'),
(20, 8, 2020, '2020-08-20'),
(21, 8, 2020, '2020-08-21'),
(22, 8, 2020, '2020-08-22'),
(23, 8, 2020, '2020-08-23'),
(24, 8, 2020, '2020-08-24'),
(25, 8, 2020, '2020-08-25'),
(26, 8, 2020, '2020-08-26'),
(27, 8, 2020, '2020-08-27'),
(28, 8, 2020, '2020-08-28'),
(29, 8, 2020, '2020-08-29'),
(30, 8, 2020, '2020-08-30'),
(31, 8, 2020, '2020-08-31');

-- --------------------------------------------------------

--
-- Table structure for table `employe`
--

CREATE TABLE `employe` (
  `id` int(11) NOT NULL,
  `nom` varchar(250) NOT NULL,
  `prenom` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employe`
--

INSERT INTO `employe` (`id`, `nom`, `prenom`, `email`) VALUES
(1, 'mytest', '', ''),
(2, 'my\' test 1', 'testPrenom', 'test@mail.com'),
(3, 'my\' test 3', 'testPrenom', 'test@mail.com'),
(4, 'my\' test 4', 'testPrenom5', 'test@mail.com'),
(5, 'my\' test 5', 'testPrenom', 'test@mail.com'),
(6, 'import1', 'test1', 'mail_import@test.com'),
(7, 'import2', 'test2', 'mail_import@test.com'),
(8, 'import3', 'test3', 'mail_import@test.com'),
(9, 'import4', 'test4', 'mail_import@test.com'),
(10, 'import5', 'test5', 'mail_import@test.com'),
(11, 'import6', 'test6', 'mail_import@test.com'),
(12, 'import7', 'test7', 'mail_import@test.com'),
(13, 'import8', 'test8', 'mail_import@test.com');

-- --------------------------------------------------------

--
-- Table structure for table `person`
--

CREATE TABLE `person` (
  `matricule` varchar(25) NOT NULL,
  `nom` varchar(250) NOT NULL,
  `mail` varchar(250) NOT NULL,
  `position` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `person`
--

INSERT INTO `person` (`matricule`, `nom`, `mail`, `position`) VALUES
('DEV1001', 'test 1\'', 'testPrenom', 'test@mail.com'),
('DEV1002', 'test 1', 'testPrenom1', 'test@mail.com1'),
('DEV1003', 'test 2', 'testPrenom1', 'test@mail.com1'),
('DEV1004', 'test 3', 'testPrenom1', 'test@mail.com1'),
('DEV1005', 'testnom1', 'testPrenom1', 'test@mail.com1'),
('DEV1006', 'test 3', 'testPrenom1', NULL),
('test 1\'', 'test 1\'', 'testPrenom', 'test@mail.com');

-- --------------------------------------------------------

--
-- Table structure for table `sample_datas`
--

CREATE TABLE `sample_datas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sample_datas`
--

INSERT INTO `sample_datas` (`id`, `first_name`, `last_name`, `created_at`, `updated_at`) VALUES
(75, 'John’s', 'Smith', '2019-10-12 02:09:09', '2019-10-12 02:09:09'),
(76, 'Peter', 'Parker', '2019-10-12 02:09:09', '2019-10-12 02:09:09'),
(77, 'Larry', 'Degraw', '2019-10-12 02:09:09', '2019-10-12 02:09:09'),
(78, 'Susan', 'Diener', '2019-10-14 05:00:00', '2019-10-14 05:00:00'),
(79, 'William’s', 'Batiste', '2019-10-14 05:00:00', '2019-10-14 05:00:00'),
(80, 'Butler', 'Tucker', '2019-10-14 05:00:00', '2019-10-19 07:54:32'),
(81, 'Eva', 'King', '2019-10-14 05:00:00', '2019-10-14 05:00:00'),
(82, 'Dorothy', 'Hays', '2019-10-14 08:00:00', '2019-10-14 08:00:00'),
(83, 'Nannie', 'Ayers', '2019-10-14 08:00:00', '2019-10-14 08:00:00'),
(84, 'Gerald', 'Brown', '2019-10-14 09:00:00', '2019-10-14 09:00:00'),
(85, 'Judith', 'Smith', '2019-10-14 09:00:00', '2019-10-14 09:00:00'),
(86, 'Delores', 'Schumacher', '2019-10-14 18:00:00', '2019-10-14 18:00:00'),
(87, 'Gloria', 'Romero', '2019-10-14 11:00:00', '2019-10-14 11:00:00'),
(88, 'Paul', 'Pate', '2019-10-14 18:00:00', '2019-10-14 18:00:00'),
(89, 'Ryan', 'Hoang', '2019-10-14 18:00:00', '2019-10-14 18:00:00'),
(90, 'Dixie', 'Smith', '2019-10-17 11:22:21', '2019-10-17 11:22:21'),
(91, 'Jack', 'Smith', '2019-10-18 03:52:30', '2019-10-19 05:09:56'),
(92, 'Ronald', 'Derby', '2019-10-18 04:30:01', '2019-10-18 04:30:01');

-- --------------------------------------------------------

--
-- Table structure for table `table_test`
--

CREATE TABLE `table_test` (
  `id` int(11) NOT NULL,
  `statut` varchar(10) NOT NULL,
  `count` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `table_test`
--

INSERT INTO `table_test` (`id`, `statut`, `count`) VALUES
(1, 'v', 0),
(2, 'v', 2),
(6, 'v', 25);

-- --------------------------------------------------------

--
-- Table structure for table `table_test_two`
--

CREATE TABLE `table_test_two` (
  `id` int(11) NOT NULL,
  `statut` varchar(10) NOT NULL,
  `count` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `table_test_two`
--

INSERT INTO `table_test_two` (`id`, `statut`, `count`) VALUES
(0, 'b', 23),
(1, 'v', 0),
(2, 'v', 2),
(3, 'b', 23);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `employe`
--
ALTER TABLE `employe`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `person`
--
ALTER TABLE `person`
  ADD PRIMARY KEY (`matricule`);

--
-- Indexes for table `sample_datas`
--
ALTER TABLE `sample_datas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `table_test`
--
ALTER TABLE `table_test`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `table_test_two`
--
ALTER TABLE `table_test_two`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `employe`
--
ALTER TABLE `employe`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `sample_datas`
--
ALTER TABLE `sample_datas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=93;

--
-- AUTO_INCREMENT for table `table_test`
--
ALTER TABLE `table_test`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
