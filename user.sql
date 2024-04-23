-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mar. 23 avr. 2024 à 15:02
-- Version du serveur : 10.4.27-MariaDB
-- Version de PHP : 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `centreb`
--

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `email` varchar(180) NOT NULL,
  `roles` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL COMMENT '(DC2Type:json)' CHECK (json_valid(`roles`)),
  `password` varchar(255) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL COMMENT '(DC2Type:datetime_immutable)',
  `formation` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `email`, `roles`, `password`, `nom`, `prenom`, `created_at`, `formation`) VALUES
(1, 'de@e.e', '[\"ROLE_ADMIN\"]', '$2y$13$p35cxR7fIkqUBGEsbdSPd.FF9V/HGqItf3vvVFWfSxvEcyLcNc0Li', 'e', 'e', '2024-04-23 11:25:17', NULL),
(3, 'a@a.aa', '[\"ROLE_STUDENT\"]', '$2y$13$yMlaq1p9h3R4G2WRKNhtIOMv/6ajwDZdJylsnxCrVbC4G.SYsbfmO', 'a', 'a', '2024-04-23 11:29:35', NULL),
(4, 'a@a.aaa', '[]', '$2y$13$vWz5VLPpGcp8j3bDMXaiWOO.JSo5PukcBdPCBx0TulLJQzZyUqDVu', 'a', 'a', '2024-04-23 11:31:20', NULL),
(5, 'a@a.aaaa', '[\"ROLE_STUDENT\"]', '$2y$13$PbHA7bqbDF5EzD8CWyAbFuGtMhw1iFzamiI/wRY56gLYyOpnUWuaa', 'aaa', 'aaaa', '2024-04-23 14:50:42', NULL);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_IDENTIFIER_EMAIL` (`email`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
