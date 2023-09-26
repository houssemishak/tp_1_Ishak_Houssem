-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mar. 26 sep. 2023 à 20:08
-- Version du serveur : 10.4.27-MariaDB
-- Version de PHP : 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `tp_1`
--

-- --------------------------------------------------------

--
-- Structure de la table `réfrigérateur`
--

CREATE TABLE `réfrigérateur` (
  `id` int(11) NOT NULL,
  `marque` varchar(50) DEFAULT NULL,
  `couleur` varchar(30) DEFAULT NULL,
  `prix` int(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `réfrigérateur`
--

INSERT INTO `réfrigérateur` (`id`, `marque`, `couleur`, `prix`) VALUES
(1, 'Toshiba', 'bleu', 200),
(2, 'beko', 'noir', 300),
(5, 'LG', 'jaune', 150);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `réfrigérateur`
--
ALTER TABLE `réfrigérateur`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `réfrigérateur`
--
ALTER TABLE `réfrigérateur`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
