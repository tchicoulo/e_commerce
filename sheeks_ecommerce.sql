-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  ven. 13 juil. 2018 à 09:39
-- Version du serveur :  5.7.19
-- Version de PHP :  5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `sheeks_ecommerce`
--

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

DROP TABLE IF EXISTS `categorie`;
CREATE TABLE IF NOT EXISTS `categorie` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom_categorie` varchar(250) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `categorie`
--

INSERT INTO `categorie` (`id`, `nom_categorie`) VALUES
(1, 'Vetements'),
(2, 'Jeux'),
(4, 'Goodies'),
(7, 'Accessoires de Jeux');

-- --------------------------------------------------------

--
-- Structure de la table `client`
--

DROP TABLE IF EXISTS `client`;
CREATE TABLE IF NOT EXISTS `client` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom_client` varchar(50) NOT NULL,
  `mot_de_passe` varchar(250) NOT NULL,
  `civilite` varchar(10) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `pays` varchar(100) DEFAULT NULL,
  `adresse` varchar(250) NOT NULL,
  `code_postal` int(11) DEFAULT NULL,
  `ville` varchar(255) DEFAULT NULL,
  `telephone` varchar(20) NOT NULL,
  `email` varchar(250) NOT NULL,
  `admin` enum('yes','no') NOT NULL DEFAULT 'no',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `client`
--

INSERT INTO `client` (`id`, `nom_client`, `mot_de_passe`, `civilite`, `prenom`, `nom`, `pays`, `adresse`, `code_postal`, `ville`, `telephone`, `email`, `admin`) VALUES
(13, 'GuiGui', '$2y$10$sq2utqjgcy5/vshVZXiy9eOz/Kf2KhiIa/Yuh8FBKmmeHTkkpwqky', '', 'Guillaume', 'Groult', '', 'bbbbbbb', 0, '', '111111', 'guigui@gmail.com', 'yes'),
(14, 'Florian', '$2y$10$6Kn49DD1ZK6YN4QQOQ7VL.uV9zMxvFZ0kVqdn6Q4JXX.GP3d4GdAa', '', '', '', '', '', 0, '', '', 'flo@flo.fr', 'no'),
(15, 'Steven', '$2y$10$bcqv.3iDP89w/ioJ7/4ny.46YtbmjbuChdSAy8VSPQCcibO0ewilu', '', '', '', '', '', 0, '', '', 'stev@free.fr', 'no');

-- --------------------------------------------------------

--
-- Structure de la table `commande`
--

DROP TABLE IF EXISTS `commande`;
CREATE TABLE IF NOT EXISTS `commande` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date_commande` datetime NOT NULL,
  `id_client` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_client_fk` (`id_client`)
) ENGINE=InnoDB AUTO_INCREMENT=53 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `commande`
--

INSERT INTO `commande` (`id`, `date_commande`, `id_client`) VALUES
(48, '2018-07-13 02:34:37', 13),
(49, '2018-07-13 10:32:47', 13),
(51, '2018-07-13 11:16:16', 13),
(52, '2018-07-13 11:25:34', 13);

-- --------------------------------------------------------

--
-- Structure de la table `panier`
--

DROP TABLE IF EXISTS `panier`;
CREATE TABLE IF NOT EXISTS `panier` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_commande` int(11) NOT NULL,
  `id_produit` int(11) NOT NULL,
  `quantite` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_commande_fk` (`id_commande`),
  KEY `id_produit_fk` (`id_produit`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `panier`
--

INSERT INTO `panier` (`id`, `id_commande`, `id_produit`, `quantite`) VALUES
(25, 48, 2, 3),
(26, 49, 2, 2),
(27, 49, 3, 3),
(28, 49, 8, 1),
(29, 51, 2, 1),
(30, 52, 2, 4);

-- --------------------------------------------------------

--
-- Structure de la table `produit`
--

DROP TABLE IF EXISTS `produit`;
CREATE TABLE IF NOT EXISTS `produit` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `libelle` varchar(250) NOT NULL,
  `marque` varchar(250) NOT NULL,
  `description` longtext,
  `id_Categorie` int(11) NOT NULL,
  `stock` int(11) NOT NULL DEFAULT '0',
  `prix` float NOT NULL,
  `img1` varchar(255) NOT NULL DEFAULT 'img/logo.png',
  `img2` varchar(255) NOT NULL DEFAULT 'img/logo.png',
  `img3` varchar(255) NOT NULL DEFAULT 'img/logo.png',
  PRIMARY KEY (`id`),
  KEY `Produit_Categorie_FK` (`id_Categorie`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `produit`
--

INSERT INTO `produit` (`id`, `libelle`, `marque`, `description`, `id_Categorie`, `stock`, `prix`, `img1`, `img2`, `img3`) VALUES
(2, 'T-shirt Sheeks L', 'Sheeks', '', 1, 30, 19.99, '/sheekstore/e_commerce/img/logo.png', '/sheekstore/e_commerce/img/logo.png', '/sheekstore/e_commerce/img/logo.png'),
(3, 'T-Shirt Sheeks M', 'Sheeks', '', 1, 30, 19.99, '/sheekstore/e_commerce/img/logo.png', '/sheekstore/e_commerce/img/logo.png', '/sheekstore/e_commerce/img/logo.png'),
(8, 'Overwatch', 'Blizzard', 'Overwatch est un jeu vidÃ©o de tir en vue subjective, en Ã©quipes, en ligne, dÃ©veloppÃ© et publiÃ© par Blizzard Entertainment.', 2, 14, 60, '/sheekstore/e_commerce/img/noimg.png', '/sheekstore/e_commerce/img/noimg.png', '/sheekstore/e_commerce/img/noimg.png');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `commande`
--
ALTER TABLE `commande`
  ADD CONSTRAINT `id_client_fk` FOREIGN KEY (`id_client`) REFERENCES `client` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `panier`
--
ALTER TABLE `panier`
  ADD CONSTRAINT `id_commande_fk` FOREIGN KEY (`id_commande`) REFERENCES `commande` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `id_produit_fk` FOREIGN KEY (`id_produit`) REFERENCES `produit` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `produit`
--
ALTER TABLE `produit`
  ADD CONSTRAINT `Produit_Categorie_FK` FOREIGN KEY (`id_Categorie`) REFERENCES `categorie` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
