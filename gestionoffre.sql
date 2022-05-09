-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : lun. 09 mai 2022 à 05:13
-- Version du serveur : 10.4.22-MariaDB
-- Version de PHP : 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `gestionoffre`
--
CREATE DATABASE IF NOT EXISTS `gestionoffre` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `gestionoffre`;

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

CREATE TABLE `categorie` (
  `idCategorie` int(11) NOT NULL,
  `nomCategorie` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `categorie`
--

INSERT INTO `categorie` (`idCategorie`, `nomCategorie`) VALUES
(22, 'hand care'),
(21, 'lipstick'),
(17, 'perfum');

-- --------------------------------------------------------

--
-- Structure de la table `clients`
--

CREATE TABLE `clients` (
  `id` int(11) NOT NULL,
  `cardholder` varchar(100) NOT NULL,
  `mm` int(11) NOT NULL,
  `yy` int(11) NOT NULL,
  `cardnumber` int(11) NOT NULL,
  `cvc` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `clients`
--

INSERT INTO `clients` (`id`, `cardholder`, `mm`, `yy`, `cardnumber`, `cvc`) VALUES
(18, '1111', 12, 2022, 2147483647, 123),
(19, 'ggggggg', 12, 26, 12, 123);

-- --------------------------------------------------------

--
-- Structure de la table `commande`
--

CREATE TABLE `commande` (
  `id` int(11) NOT NULL,
  `itemName` varchar(100) NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `commande`
--

INSERT INTO `commande` (`id`, `itemName`, `price`) VALUES
(181, 'aaaa', 120),
(187, '11111', 50),
(189, 'aaaa', 120);

-- --------------------------------------------------------

--
-- Structure de la table `datacoupon`
--

CREATE TABLE `datacoupon` (
  `id` int(11) NOT NULL,
  `codeCoupon` varchar(100) NOT NULL,
  `priceDiscount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `datacoupon`
--

INSERT INTO `datacoupon` (`id`, `codeCoupon`, `priceDiscount`) VALUES
(4, 'F5777', 8),
(7, 'FG14', 10),
(9, 'FG', 33),
(10, 'xl250', 15),
(11, 'bk', 400);

-- --------------------------------------------------------

--
-- Structure de la table `dataoffre`
--

CREATE TABLE `dataoffre` (
  `id` int(11) NOT NULL,
  `itemName` varchar(100) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `idCoupon` int(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `dataoffre`
--

INSERT INTO `dataoffre` (`id`, `itemName`, `price`, `idCoupon`) VALUES
(28, '11111', 50, 4),
(29, 'aaaa', 120, NULL),
(31, 'xd', 22, NULL),
(32, 'ac', 100, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `produit`
--

CREATE TABLE `produit` (
  `id` int(11) NOT NULL,
  `libelle` varchar(50) NOT NULL,
  `nb_calories` float NOT NULL,
  `prix` float NOT NULL,
  `description` varchar(500) NOT NULL,
  `categorie` int(11) NOT NULL,
  `fournisseur` int(11) NOT NULL,
  `img` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `produit`
--

INSERT INTO `produit` (`id`, `libelle`, `nb_calories`, `prix`, `description`, `categorie`, `fournisseur`, `img`) VALUES
(8, 'gucci', 45, 599, 'AZ', 1, 0, 'téléchargé.jpg'),
(9, 'test', 45, 599, '1', 1, 0, 'gucci lipstick.jpg'),
(12, 'test', 45, 599, 'TEST', 1, 0, 'OLAY.jpg'),
(13, 'thgg', 43, 50, 'tesst', 1, 0, 'lipstick chanel.jpg'),
(14, 'gucci', 50, 12, 'CFG', 1, 0, 'gucci lipstick.jpg'),
(20, 'jvbfzj', 33, 54, 'igvd', 1, 0, 'button_login.png');

-- --------------------------------------------------------

--
-- Structure de la table `quiz`
--

CREATE TABLE `quiz` (
  `id_quiz` int(11) NOT NULL,
  `nom_categorie` varchar(100) NOT NULL,
  `photo_quiz` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `quiz`
--

INSERT INTO `quiz` (`id_quiz`, `nom_categorie`, `photo_quiz`) VALUES
(1, 'Reseaux', 'assets/reseaux.png'),
(2, 'Mathematiques', 'assets/maths.jpg'),
(4, 'Culture', 'assets/culture.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `reclamation`
--

CREATE TABLE `reclamation` (
  `id_recl` int(11) NOT NULL,
  `username_recl` varchar(100) NOT NULL,
  `user_review_recl` varchar(100) NOT NULL,
  `date_recl` int(11) NOT NULL,
  `feedback_recl` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `reclamation`
--

INSERT INTO `reclamation` (`id_recl`, `username_recl`, `user_review_recl`, `date_recl`, `feedback_recl`) VALUES
(11, 'khalil', 'aaaa', 1650403969, 2),
(14, 'farah', 'cyrine', 1650408844, 3),
(15, 'borhene', 'serviceeee top ', 1650409186, 5),
(19, 'souha', 'hihihihi', 1650458043, 2),
(20, 'slim', 'hhihihihih', 1650458059, 2),
(21, '147', 'aaaaa', 1650801777, 5),
(22, 'saaf', 'aaa', 1650844373, 2),
(23, 'hey', 'aaaaaa', 1650845756, 5);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `categorie`
--
ALTER TABLE `categorie`
  ADD PRIMARY KEY (`idCategorie`),
  ADD UNIQUE KEY `nomCategorie` (`nomCategorie`);

--
-- Index pour la table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `commande`
--
ALTER TABLE `commande`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `datacoupon`
--
ALTER TABLE `datacoupon`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `dataoffre`
--
ALTER TABLE `dataoffre`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_coupon` (`idCoupon`) USING BTREE;

--
-- Index pour la table `produit`
--
ALTER TABLE `produit`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fournisseur` (`fournisseur`),
  ADD KEY `categorie` (`categorie`);

--
-- Index pour la table `quiz`
--
ALTER TABLE `quiz`
  ADD PRIMARY KEY (`id_quiz`),
  ADD UNIQUE KEY `categorie` (`nom_categorie`);

--
-- Index pour la table `reclamation`
--
ALTER TABLE `reclamation`
  ADD PRIMARY KEY (`id_recl`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `categorie`
--
ALTER TABLE `categorie`
  MODIFY `idCategorie` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT pour la table `clients`
--
ALTER TABLE `clients`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT pour la table `commande`
--
ALTER TABLE `commande`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=190;

--
-- AUTO_INCREMENT pour la table `datacoupon`
--
ALTER TABLE `datacoupon`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT pour la table `dataoffre`
--
ALTER TABLE `dataoffre`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT pour la table `produit`
--
ALTER TABLE `produit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT pour la table `quiz`
--
ALTER TABLE `quiz`
  MODIFY `id_quiz` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `reclamation`
--
ALTER TABLE `reclamation`
  MODIFY `id_recl` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `dataoffre`
--
ALTER TABLE `dataoffre`
  ADD CONSTRAINT `FK_COUPON` FOREIGN KEY (`idCoupon`) REFERENCES `datacoupon` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
