-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mer. 24 avr. 2024 à 10:47
-- Version du serveur : 10.4.32-MariaDB
-- Version de PHP : 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `workshop_centre_b`
--

-- --------------------------------------------------------

--
-- Structure de la table `menu`
--

CREATE TABLE `menu` (
  `id` int(11) NOT NULL,
  `date` date NOT NULL COMMENT '(DC2Type:date_immutable)',
  `service` varchar(255) NOT NULL,
  `option_plat` varchar(255) NOT NULL,
  `entree_id` int(11) NOT NULL,
  `plat_un_id` int(11) NOT NULL,
  `plat_deux_id` int(11) NOT NULL,
  `plat_trois_id` int(11) DEFAULT NULL,
  `dessert_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `menu`
--

INSERT INTO `menu` (`id`, `date`, `service`, `option_plat`, `entree_id`, `plat_un_id`, `plat_deux_id`, `plat_trois_id`, `dessert_id`) VALUES
(1, '2024-04-29', 'Midi', 'lorem', 1, 4, 5, 6, 7);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_7D053A93AF7BD910` (`entree_id`),
  ADD KEY `IDX_7D053A9325E182CC` (`plat_un_id`),
  ADD KEY `IDX_7D053A933B445268` (`plat_deux_id`),
  ADD KEY `IDX_7D053A93852C1CB9` (`plat_trois_id`),
  ADD KEY `IDX_7D053A93745B52FD` (`dessert_id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `menu`
--
ALTER TABLE `menu`
  ADD CONSTRAINT `FK_7D053A9325E182CC` FOREIGN KEY (`plat_un_id`) REFERENCES `plat` (`id`),
  ADD CONSTRAINT `FK_7D053A933B445268` FOREIGN KEY (`plat_deux_id`) REFERENCES `plat` (`id`),
  ADD CONSTRAINT `FK_7D053A93745B52FD` FOREIGN KEY (`dessert_id`) REFERENCES `plat` (`id`),
  ADD CONSTRAINT `FK_7D053A93852C1CB9` FOREIGN KEY (`plat_trois_id`) REFERENCES `plat` (`id`),
  ADD CONSTRAINT `FK_7D053A93AF7BD910` FOREIGN KEY (`entree_id`) REFERENCES `plat` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
