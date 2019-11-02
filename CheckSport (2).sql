-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: mysql
-- Generation Time: Nov 02, 2019 at 12:11 PM
-- Server version: 10.3.13-MariaDB-1:10.3.13+maria~bionic
-- PHP Version: 7.2.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `CheckSport`
--

-- --------------------------------------------------------

--
-- Table structure for table `match`
--

CREATE TABLE `match` (
  `id` int(11) NOT NULL,
  `datage` datetime NOT NULL,
  `nb_present_player` int(11) DEFAULT NULL,
  `postponed` tinyint(1) DEFAULT NULL,
  `cancelage` tinyint(1) DEFAULT NULL,
  `information` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `host_team_id` int(11) NOT NULL,
  `guest_team_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `match`
--

INSERT INTO `match` (`id`, `datage`, `nb_present_player`, `postponed`, `cancelage`, `information`, `host_team_id`, `guest_team_id`) VALUES
(4, '2019-10-31 23:59:00', NULL, 1, 1, 'sf sd qsd qsd', 3, 2),
(5, '2019-10-31 23:59:00', NULL, 1, 1, 'popopoooooooooooooooooooo', 1, 2),
(6, '2019-10-31 23:59:00', NULL, 1, 1, 'aaaaaaaaaaaaaaaaaaaaaaa', 2, 1),
(7, '2019-10-31 23:59:00', NULL, 1, 1, 'TESTTTTTT', 2, 1),
(8, '2019-10-31 23:59:00', NULL, 1, 1, 'uighdfazyuigfazeuigfazeuigfazeuighfaz', 1, 2),
(9, '2019-10-31 23:59:00', NULL, 1, 1, 'auhuazhfdzadazd', 3, 2),
(10, '2019-10-31 23:59:00', NULL, 1, 1, 'dadazdazda', 3, 2),
(11, '2019-10-31 23:59:00', NULL, 1, 1, 'aaaaaaaaa', 3, 2),
(12, '2019-10-31 23:59:00', NULL, 1, 1, 'zzuyazaz', 3, 2);

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `id` int(11) NOT NULL,
  `id_joueur_id` int(11) DEFAULT NULL,
  `id_match_id` int(11) DEFAULT NULL,
  `message` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_message` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migration_versions`
--

CREATE TABLE `migration_versions` (
  `version` varchar(14) COLLATE utf8mb4_unicode_ci NOT NULL,
  `executed_at` datetime NOT NULL COMMENT '(DC2Type:datetime_immutable)'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migration_versions`
--

INSERT INTO `migration_versions` (`version`, `executed_at`) VALUES
('20190919102437', '2019-09-19 10:24:42'),
('20191030183531', '2019-10-30 18:35:38'),
('20191030212033', '2019-10-30 21:20:48');

-- --------------------------------------------------------

--
-- Table structure for table `player`
--

CREATE TABLE `player` (
  `id` int(11) NOT NULL,
  `id_team_id` int(11) DEFAULT NULL,
  `email` varchar(180) COLLATE utf8mb4_unicode_ci NOT NULL,
  `roles` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(120) COLLATE utf8mb4_unicode_ci NOT NULL,
  `first_name` varchar(120) COLLATE utf8mb4_unicode_ci NOT NULL,
  `num_licence` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `num_shirt` int(11) DEFAULT NULL,
  `post` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `profil_img` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `birth_date` datetime NOT NULL,
  `nom_phone` int(11) DEFAULT NULL,
  `size` int(11) DEFAULT NULL,
  `weight` int(11) DEFAULT NULL,
  `is_coach` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `player`
--

INSERT INTO `player` (`id`, `id_team_id`, `email`, `roles`, `password`, `name`, `first_name`, `num_licence`, `num_shirt`, `post`, `profil_img`, `birth_date`, `nom_phone`, `size`, `weight`, `is_coach`) VALUES
(1, NULL, 'azeazeaz@maziel.com', '[]', '$2y$13$vfnYebRvmg2KvKtsZaaK9.3h6lwdzNDuZS118851qHpTWbFCvfCAa', 'azeazea', 'azeazea', NULL, NULL, NULL, NULL, '2019-09-19 10:25:38', NULL, NULL, NULL, NULL),
(2, NULL, 'admin@mail.com', '[]', '$2y$13$7hfwsrYdax1MUgPTQl7Mj.pUzwIW4VJF7QShxbBjGMNgNHI9VGcU6', 'admin', 'admin', NULL, NULL, NULL, NULL, '2019-09-19 10:26:49', NULL, NULL, NULL, NULL),
(5, NULL, 'hewoniqi@mailinator.net', '[]', '$2y$13$Rh1WH8pIubrKlyBzD0s5eOIqG/32UDP.vwsIWQSpOjYqD29FmfW6S', 'Autem', 'Ex', NULL, NULL, NULL, NULL, '2019-09-19 11:29:52', NULL, NULL, NULL, NULL),
(7, NULL, 'root@gmail.com', '[]', '$2y$13$d7ufRshghPOyeFpPIGQOYOHhRXEmFKXs/B4F.DByogtLYxTOSPc7O', 'root', 'root', NULL, NULL, NULL, NULL, '2019-09-19 11:55:07', NULL, NULL, NULL, NULL),
(8, NULL, 'zaru@mailinator.com', '[]', '$2y$13$gJfk6DDZ.fYgydlMTbr0zei2ruyfn2wWdlHCUp2j1vs7zJd6j9xhq', 'A', 'Quae', NULL, NULL, NULL, NULL, '2019-09-20 07:50:00', NULL, NULL, NULL, NULL),
(48, NULL, 'ricytigo@mailinator.net', '[]', '$2y$13$Xx4ACLB5ACyT2bK9Jg4WOuKdU4ksLYFr/BGub2J7dRZZJjRMz1NzG', 'Qui', 'Veniam,', NULL, NULL, NULL, NULL, '2019-09-20 09:53:14', NULL, NULL, NULL, NULL),
(51, NULL, 'wavijabaje@mailinator.net', '[]', '$2y$13$K8bOmMcoCfhglViYimCpkO4QxiyqCc..cul3vlsBkb5qQdLSRKtcG', 'Qui', 'Rerum', NULL, NULL, NULL, NULL, '2019-09-20 09:58:21', NULL, NULL, NULL, NULL),
(55, NULL, 'xuwezy@mailinator.com', '[]', '$2y$13$6829oGgmcq1AYXu2NJ1p0uLUQxRPBTac2KrlOI0UWtDe2MyNLl0OC', 'Tenetur', 'Deleniti', NULL, NULL, NULL, NULL, '2019-09-20 09:59:50', NULL, NULL, NULL, NULL),
(56, NULL, 'fivata@mailinator.net', '[]', '$2y$13$jFFOkTugGg9EGCyhJIv8YOhgt83aVHNZBCXxAehNbd5TZAKpXbgk6', 'Sit', 'Aspernatur', NULL, NULL, NULL, NULL, '2019-09-20 10:00:29', NULL, NULL, NULL, NULL),
(57, NULL, 'tuli@mailinator.net', '[]', '$2y$13$jRzg/fk2pAWFnna.EQLbkefMwUABtFpJmOPH8Zoenni5Z0f7Msdm.', 'Veniam,', 'Sapiente', NULL, NULL, NULL, NULL, '2019-09-20 10:01:21', NULL, NULL, NULL, NULL),
(60, NULL, 'gisixe@mailinator.net', '[]', '$2y$13$scnTOCeJ00YGOF9QIle.i.jsSrqg0WMELCYnyafxI/LGzcBS287hS', 'Eaque', 'Omnis', NULL, NULL, NULL, NULL, '2019-09-20 10:02:49', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `team`
--

CREATE TABLE `team` (
  `id` int(11) NOT NULL,
  `nb_victory` int(11) DEFAULT NULL,
  `nb_defeat` int(11) DEFAULT NULL,
  `team_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `team_logo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `stadium_adress` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `team`
--

INSERT INTO `team` (`id`, `nb_victory`, `nb_defeat`, `team_name`, `team_logo`, `stadium_adress`, `city`) VALUES
(1, 5, 1, 'Blablature', 'bidule.png', '407 ftgrtgvfggtybzbyhvallée de la pologne', 'Polony'),
(2, 28, 12, 'Flushed', 'flush.bmp', 'super addresse du néant', 'Nüll'),
(3, 2, 3, 'ASRoanne', NULL, 'rue du cul', 'Roanne');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `match`
--
ALTER TABLE `match`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_7A5BC5051E90F49F` (`host_team_id`),
  ADD KEY `IDX_7A5BC50569A91CE2` (`guest_team_id`);

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_B6BD307F29D76B4B` (`id_joueur_id`),
  ADD KEY `IDX_B6BD307F7A654043` (`id_match_id`);

--
-- Indexes for table `migration_versions`
--
ALTER TABLE `migration_versions`
  ADD PRIMARY KEY (`version`);

--
-- Indexes for table `player`
--
ALTER TABLE `player`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_98197A65E7927C74` (`email`),
  ADD KEY `IDX_98197A65F7F171DE` (`id_team_id`);

--
-- Indexes for table `team`
--
ALTER TABLE `team`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `match`
--
ALTER TABLE `match`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `player`
--
ALTER TABLE `player`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `team`
--
ALTER TABLE `team`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `match`
--
ALTER TABLE `match`
  ADD CONSTRAINT `FK_7A5BC5051E90F49F` FOREIGN KEY (`host_team_id`) REFERENCES `team` (`id`),
  ADD CONSTRAINT `FK_7A5BC50569A91CE2` FOREIGN KEY (`guest_team_id`) REFERENCES `team` (`id`);

--
-- Constraints for table `message`
--
ALTER TABLE `message`
  ADD CONSTRAINT `FK_B6BD307F29D76B4B` FOREIGN KEY (`id_joueur_id`) REFERENCES `player` (`id`),
  ADD CONSTRAINT `FK_B6BD307F7A654043` FOREIGN KEY (`id_match_id`) REFERENCES `match` (`id`);

--
-- Constraints for table `player`
--
ALTER TABLE `player`
  ADD CONSTRAINT `FK_98197A65F7F171DE` FOREIGN KEY (`id_team_id`) REFERENCES `team` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
