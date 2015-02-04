-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Mer 04 Février 2015 à 10:07
-- Version du serveur :  5.6.21-log
-- Version de PHP :  5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `bd_echoppe`
--

-- --------------------------------------------------------

--
-- Structure de la table `objet`
--

CREATE TABLE IF NOT EXISTS `objet` (
  `idObjet` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nom` varchar(45) NOT NULL,
  `description` varchar(45) DEFAULT NULL,
  `stock` int(11) NOT NULL,
  `prix` float NOT NULL,
  `promotions` varchar(45) DEFAULT NULL,
  `urlImage` varchar(255) DEFAULT NULL,
  `SousCategorie_idCategorie` int(10) unsigned NOT NULL,
  PRIMARY KEY (`idObjet`),
  UNIQUE KEY `idObjet_UNIQUE` (`idObjet`),
  KEY `fk_Objet_SousCategorie1_idx` (`SousCategorie_idCategorie`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

--
-- Contenu de la table `objet`
--

INSERT INTO `objet` (`idObjet`, `nom`, `description`, `stock`, `prix`, `promotions`, `urlImage`, `SousCategorie_idCategorie`) VALUES
(1, 'Jambon', 'Jambon Fleury Michon', 20, 3.81, NULL, NULL, 6),
(2, 'Hydromel', 'Boisson fermentée à base d''eau et de miel', 12, 12, NULL, NULL, 6),
(3, 'Pain', 'Pain de campagne fais maison', 52, 0.81, NULL, NULL, 6),
(4, 'Armure complète', 'Le casque inclus', 5, 60, NULL, NULL, 2),
(5, 'Costume de gueux', 'Set complet pour se déguiser en gueux', 5, 20, NULL, NULL, 1),
(6, 'Robe', 'Robe de princesse de Super Royaume', 2, 99, NULL, NULL, 1),
(7, 'Harpe', 'Harpe de troubadour', 5, 400, NULL, NULL, 3),
(8, 'Anneau', 'Anneau avec des diamants et des rubis', 2, 500, NULL, NULL, 4),
(9, 'Table ronde', 'La table ronde de Camelot', 12, 200, NULL, NULL, 5);

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `objet`
--
ALTER TABLE `objet`
  ADD CONSTRAINT `fk_Objet_SousCategorie1` FOREIGN KEY (`SousCategorie_idCategorie`) REFERENCES `categorie` (`idCategorie`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
