-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  ven. 06 juil. 2018 à 08:45
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
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `categorie`
--

INSERT INTO `categorie` (`id`, `nom_categorie`) VALUES
(1, 'Vetements et accessoires'),
(2, 'Jeux'),
(4, 'Goodies');

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
  `adresse` varchar(250) NOT NULL,
  `telephone` varchar(20) NOT NULL,
  `email` varchar(250) NOT NULL,
  `admin` enum('yes','no') NOT NULL DEFAULT 'no',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `client`
--

INSERT INTO `client` (`id`, `nom_client`, `mot_de_passe`, `civilite`, `prenom`, `nom`, `adresse`, `telephone`, `email`, `admin`) VALUES
(13, 'GuiGui', '$2y$10$sq2utqjgcy5/vshVZXiy9eOz/Kf2KhiIa/Yuh8FBKmmeHTkkpwqky', '', 'Guillaume', 'Groult', '', '', 'guigui@gmail.com', 'yes'),
(14, 'Florian', '$2y$10$6Kn49DD1ZK6YN4QQOQ7VL.uV9zMxvFZ0kVqdn6Q4JXX.GP3d4GdAa', '', '', '', '', '', 'flo@flo.fr', 'no'),
(15, 'Steven', '$2y$10$bcqv.3iDP89w/ioJ7/4ny.46YtbmjbuChdSAy8VSPQCcibO0ewilu', '', '', '', '', '', 'stev@free.fr', 'no');

-- --------------------------------------------------------

--
-- Structure de la table `commande`
--

DROP TABLE IF EXISTS `commande`;
CREATE TABLE IF NOT EXISTS `commande` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date_commande` date NOT NULL,
  `id_client` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_client_fk` (`id_client`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `commande`
--

INSERT INTO `commande` (`id`, `date_commande`, `id_client`) VALUES
(1, '2018-07-04', 14),
(2, '2018-07-04', 13),
(3, '2018-07-05', 14),
(7, '2018-07-05', 13);

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
  UNIQUE KEY `Panier_AK` (`id_produit`),
  KEY `id_commande_fk` (`id_commande`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `produit`
--

INSERT INTO `produit` (`id`, `libelle`, `marque`, `description`, `id_Categorie`, `stock`, `prix`, `img1`, `img2`, `img3`) VALUES
(2, 'T-shirt Sheeks L', 'Sheeks', '', 1, 30, 19.99, '/sheekstore/e_commerce/img/logo.png', '/sheekstore/e_commerce/img/logo.png', '/sheekstore/e_commerce/img/logo.png'),
(3, 'T-Shirt Sheeks M', 'Sheeks', '', 1, 30, 19.99, '/sheekstore/e_commerce/img/product-img/logo.png', '/sheekstore/e_commerce/img/logo.png', '/sheekstore/e_commerce/img/logo.png'),
(8, 'Overwatch', 'Blizzard', 'Overwatch est un jeu vidÃ©o de tir en vue subjective, en Ã©quipes, en ligne, dÃ©veloppÃ© et publiÃ© par Blizzard Entertainment.', 2, 14, 60, '/sheekstore/e_commerce/img/product-img/overwatch.jpg', '/sheekstore/e_commerce/img/product-img/overwatch2.jpg', '/sheekstore/e_commerce/img/logo.png');

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
  ADD CONSTRAINT `id_commande_fk` FOREIGN KEY (`id_commande`) REFERENCES `commande` (`id`),
  ADD CONSTRAINT `id_produit_fk` FOREIGN KEY (`id_produit`) REFERENCES `produit` (`id`);

--
-- Contraintes pour la table `produit`
--
ALTER TABLE `produit`
  ADD CONSTRAINT `Produit_Categorie_FK` FOREIGN KEY (`id_Categorie`) REFERENCES `categorie` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
