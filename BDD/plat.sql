-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mer. 24 avr. 2024 à 10:46
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
-- Structure de la table `plat`
--

CREATE TABLE `plat` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `composition` varchar(400) NOT NULL,
  `type` varchar(255) NOT NULL,
  `regime` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `plat`
--

INSERT INTO `plat` (`id`, `nom`, `composition`, `type`, `regime`) VALUES
(1, 'Samoussas aux légumes', 'Carottes, Courgettes, oeufs, Blé, Huile de tournesol', 'Entree', 'Végétarien'),
(2, 'Carottes rapées', 'Carottes, vinaigrette au sésame', 'Entree', 'Végétarien'),
(3, 'Quiche lorraine', 'Blé, Œufs, Lait, Poulet, Crème fraiche', 'Entree', 'Viande'),
(4, 'Poulet roti avec purée', 'Poulet, Pommes de terre, Lait, Beurre', 'Plat', 'Viande'),
(5, 'Saumon avec riz et sauce au citron', 'Saumon, riz, Beurre, Œufs, Citron', 'Plat', 'Poisson'),
(6, 'Steak de lentilles corail avec frites de patates douce', 'lentilles corail, pois chiche, patate douce', 'Plat', 'Végétarien'),
(7, 'Ile flottante', 'Œufs, lait, Sucre', 'Dessert', 'Autre'),
(8, 'Compote de pomme', 'Pommes, Sucre', 'Dessert', 'Autre'),
(9, 'Tarte au chocolat', 'Chocolat, Œufs, Blé, Lait', 'Dessert', 'Autre');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `plat`
--
ALTER TABLE `plat`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `plat`
--
ALTER TABLE `plat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
