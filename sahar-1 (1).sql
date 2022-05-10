-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : ven. 22 avr. 2022 à 16:47
-- Version du serveur : 10.4.22-MariaDB
-- Version de PHP : 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `sahar`
--

-- --------------------------------------------------------

--
-- Structure de la table `client`
--

CREATE TABLE `client` (
  `id` int(11) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `numtel` int(11) NOT NULL,
  `adresse` varchar(50) NOT NULL,
  `mdp` varchar(50) NOT NULL,
  `token` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `client`
--

INSERT INTO `client` (`id`, `nom`, `email`, `numtel`, `adresse`, `mdp`, `token`) VALUES
(13, 'client', 'client.c@gmaillcom', 29571686, 'Menzah', '123456789', 'ON');

-- --------------------------------------------------------

--
-- Structure de la table `commande`
--

CREATE TABLE `commande` (
  `id` int(11) NOT NULL,
  `date_cmd` date NOT NULL,
  `id_panier` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `commande`
--

INSERT INTO `commande` (`id`, `date_cmd`, `id_panier`) VALUES
(56, '2022-04-21', 1),
(57, '2022-04-21', 1),
(58, '2022-04-21', 1),
(59, '2022-04-21', 70),
(60, '2022-04-21', 71),
(61, '2022-04-21', 72),
(62, '2022-04-21', 73);

-- --------------------------------------------------------

--
-- Structure de la table `panier`
--

CREATE TABLE `panier` (
  `id` int(11) NOT NULL,
  `idClient` int(11) NOT NULL,
  `confirme` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `panier`
--

INSERT INTO `panier` (`id`, `idClient`, `confirme`) VALUES
(1, 13, 'true'),
(70, 13, 'true'),
(71, 13, 'true'),
(72, 13, 'true'),
(73, 13, 'true'),
(74, 13, 'false');

-- --------------------------------------------------------

--
-- Structure de la table `produit`
--

CREATE TABLE `produit` (
  `ref` int(11) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `type` varchar(50) NOT NULL,
  `prix` float NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `produit`
--

INSERT INTO `produit` (`ref`, `nom`, `type`, `prix`, `image`) VALUES
(2, 'BODY LOTION', 'Skin Care', 40, 'BODY-LOTION1-150x150.jpg'),
(3, 'Green Aple Champoo', 'Hair Caire', 50, 'GREEN-APPLE-SHAMPOO-150x150.jpg'),
(4, 'Shower Gel', 'Hair Care', 70, 'SHOWER-GEL-150x150.jpg'),
(6, 'Skin Toner', 'Skin Care', 45, 'SKIN-TONER-150x150.jpg'),
(7, 'Sun Care', 'Skin Care', 65, 'SUN-CARE-150x150.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `produit_panier`
--

CREATE TABLE `produit_panier` (
  `id_panier` int(11) NOT NULL,
  `id_produit` int(11) NOT NULL,
  `quatite` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `produit_panier`
--

INSERT INTO `produit_panier` (`id_panier`, `id_produit`, `quatite`) VALUES
(1, 2, 3),
(1, 7, 4),
(70, 2, 1),
(70, 4, 3),
(71, 2, 3),
(71, 4, 3),
(72, 7, 7),
(73, 3, 6),
(73, 7, 2),
(74, 2, 4),
(74, 4, 5),
(74, 6, 6);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `commande`
--
ALTER TABLE `commande`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_panier_commande` (`id_panier`);

--
-- Index pour la table `panier`
--
ALTER TABLE `panier`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `produit`
--
ALTER TABLE `produit`
  ADD PRIMARY KEY (`ref`);

--
-- Index pour la table `produit_panier`
--
ALTER TABLE `produit_panier`
  ADD PRIMARY KEY (`id_panier`,`id_produit`),
  ADD KEY `fk_produit_produit_panier` (`id_produit`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `client`
--
ALTER TABLE `client`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT pour la table `commande`
--
ALTER TABLE `commande`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT pour la table `panier`
--
ALTER TABLE `panier`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;

--
-- AUTO_INCREMENT pour la table `produit`
--
ALTER TABLE `produit`
  MODIFY `ref` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `commande`
--
ALTER TABLE `commande`
  ADD CONSTRAINT `fk_panier_commande` FOREIGN KEY (`id_panier`) REFERENCES `panier` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `produit_panier`
--
ALTER TABLE `produit_panier`
  ADD CONSTRAINT `fk_panier_produit_panier` FOREIGN KEY (`id_panier`) REFERENCES `panier` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_produit_produit_panier` FOREIGN KEY (`id_produit`) REFERENCES `produit` (`ref`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
