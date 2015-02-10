-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Mer 04 Février 2015 à 16:37
-- Version du serveur :  5.6.17
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
-- Structure de la table `adresse`
--



CREATE TABLE IF NOT EXISTS `adresse` (
  `idadresse` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nomRue` varchar(45) DEFAULT NULL,
  `codePostal` varchar(45) DEFAULT NULL,
  `ville` varchar(45) DEFAULT NULL,
  `nomDestinataire` varchar(45) DEFAULT NULL,
  `prenomDestinataire` varchar(45) DEFAULT NULL,
  `pays` varchar(45) DEFAULT NULL,
  `Utilisateur_idUtilisateur` int(10) unsigned NOT NULL,
  PRIMARY KEY (`idadresse`),
  UNIQUE KEY `idadress_UNIQUE` (`idadresse`),
  KEY `fk_Adresse_Utilisateur_idx` (`Utilisateur_idUtilisateur`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Contenu de la table `adresse`
--

INSERT INTO `adresse` (`idadresse`, `nomRue`, `codePostal`, `ville`, `nomDestinataire`, `prenomDestinataire`, `pays`, `Utilisateur_idUtilisateur`) VALUES
(2, 'rue machin', '31000', 'Toulouse', NULL, NULL, 'France', 2),
(3, 'rue bidule', '31000', 'Toulouse', NULL, NULL, 'France', 3),
(4, 'rue chose', '31000', 'Toulouse', NULL, NULL, 'France', 4),
(5, 'rue chouette', '31000', 'Toulouse', 'hak', 'jean luc', 'France', 12);

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

CREATE TABLE IF NOT EXISTS `categorie` (
  `idCategorie` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nom` varchar(45) NOT NULL,
  `description` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idCategorie`),
  UNIQUE KEY `idCategorie_UNIQUE` (`idCategorie`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Contenu de la table `categorie`
--

INSERT INTO `categorie` (`idCategorie`, `nom`, `description`) VALUES
(1, 'Costumes', NULL),
(2, 'Armes & Armures', NULL),
(3, 'Instruments', NULL),
(4, 'Bijoux', NULL),
(5, 'Mobilier & autres', NULL),
(6, 'Alimentation', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `facture`
--

CREATE TABLE IF NOT EXISTS `facture` (
  `idFacture` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `Facturecol` varchar(45) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `prixHT` float NOT NULL,
  `prixTotal` float NOT NULL,
  `taxe` float NOT NULL,
  `Utilisateur_idUtilisateur` int(10) unsigned NOT NULL,
  PRIMARY KEY (`idFacture`),
  UNIQUE KEY `idFacture_UNIQUE` (`idFacture`),
  KEY `fk_Facture_Utilisateur1_idx` (`Utilisateur_idUtilisateur`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Contenu de la table `facture`
--

INSERT INTO `facture` (`idFacture`, `Facturecol`, `date`, `prixHT`, `prixTotal`, `taxe`, `Utilisateur_idUtilisateur`) VALUES
(1, NULL, '2015-02-04', 20, 25, 19.6, 12),
(2, NULL, '2015-02-05', 22, 27, 19.6, 12);

-- --------------------------------------------------------

--
-- Structure de la table `objet`
--

CREATE TABLE IF NOT EXISTS `objet` (
  `idObjet` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nom` varchar(45) NOT NULL,
  `description` varchar(500) DEFAULT NULL,
  `stock` int(11) NOT NULL,
  `prix` float NOT NULL,
  `promotions` varchar(45) DEFAULT NULL,
  `urlImage` varchar(255) DEFAULT 'mr_ventouze.png',
  `Categorie_idCategorie` int(10) unsigned NOT NULL,
  `SousCategorie_idCategorie` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`idObjet`),
  UNIQUE KEY `idObjet_UNIQUE` (`idObjet`),
  KEY `fk_Objet_Categorie1_idx` (`Categorie_idCategorie`),
  KEY `fk_Objet_SousCategorie1_idx` (`SousCategorie_idCategorie`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=13 ;

--
-- Contenu de la table `objet`
--

INSERT INTO `objet` (`idObjet`, `nom`, `description`, `stock`, `prix`, `promotions`, `urlImage`, `Categorie_idCategorie`, `SousCategorie_idCategorie`) VALUES
(1, 'Jambon', 'Jambon Fleury Michon', 20, 5.79, NULL, 'jambon.jpg', 6, 9),
(13, 'Jambon de pays', 'Un jambon de pays de grande qualié', 20, 6, NULL, 'jambon.jpg', 6, 9),
(14, 'Jambon sec', 'Un jambon séché à l\'ancienne', 20, 8, NULL, 'jambon.jpg', 6, 9),
(2, 'Hydromel', 'Boisson fermentée à base d''eau et de miel. Avec sa corne de dégustation', 12, 12, NULL, 'hydromel.jpg', 6, 11),
(15, 'Hydromel Viking', 'Variété d''hydromel fort. Avec sa corne de dégustation', 12, 14, NULL, 'hydromel.jpg', 6, 11),
(16, 'Hydromel français', 'Un Hydromel fabriqué entièrement en france. Avec sa corne de dégustation', 12, 15, 15, 'hydromel.jpg', 6, 11),
(3, 'Pain de campagne', 'Pain de campagne fait maison', 52, 0.81, NULL, 'pain_campagne.jpg', 6, NULL),
(17, 'Pain aux olives', 'Un pain fait à partir de farine biologique, avec des olives ! Miam', 52, 1.25, NULL, 'pain_campagne.jpg', 6, NULL),
(18, 'Pain aux céréales', 'Pain de campagne à base de blé, seigle, froment...', 52, 1.10, NULL, 'pain_campagne.jpg', 6, NULL),
(19, 'Carottes bio', '1kg de Carottes bio, avec supplément terreau', 70, 1.05, NULL, 'carottes.jpg', 6, 10),
(20, 'Navets bio', '1kg de navets du jardin', 72, 1, 5, 'navet.jpg', 6, 10),
(4, 'Armure complète', 'Le casque inclus', 5, 1500, NULL, 'armure.jpg', 2, 5),
(21, 'Armure de piquier de la renaissance', 'Les armures de cette époque sont caractérisées par un plastron busqué, mais aussi d''imposantes tassettes pour couvrir le haut des cuisses', 3, 1800, 5, 'armure_de_piquier.jpg', 2, 5),
(22, 'Heaume', 'Heaume de facture italienne', 5, 300, NULL, 'bassinet_italien.jpg', 2, 5),
(23, 'Costume de gueux', 'Set complet pour se déguiser en gueux', 20, 20, NULL, '01510-bl09-wolltunika-lodin-rot-1.jpg', 1, 2),
(667, 'Musique du diable', 'pas besoin d''explications', 666, 5, 100, 'bieber.jpg', 2, 6),
(666, 'Livre du diable', 'pas besoin d''explications', 666, 1, NULL, 'twilight.jpg', 2, 6),
(668, 'Tetine de torture', 'Pour calmer bébé', 100, 4, NULL, 'tetine.png', 2, 6),
(5, 'Costume de gueux odorant', 'Le costume de gueux avec l''odeur en plus !', 10, 25, NULL, '01510-bl09-wolltunika-lodin-rot-1.jpg', 1, 2),
(24, 'Epée d''archer', 'Epée à une main relativement courte, peu encombrante pour un archer. Lame en acier', 5, 200, 5, 'epee_d_archer.jpg', 2, 4),
(30, 'Epée classique 2', 'Epée à une main classique, fournie avec son fourreau. Lame en acier', 5, 200, 10, 'epee_fourreau.jpg', 2, 4),
(29, 'Epée classique 3', 'Epée à une main classique, fournie avec son fourreau. Lame en acier', 5, 200, NULL, 'epee_fourreau.jpg', 2, 4),
(28, 'Epée classique', 'Epée à une main classique, fournie avec son fourreau. Lame en acier', 5, 200, 5, 'epee_fourreau.jpg', 2, 4),
(26, 'Epée à deux mains', 'Epée typique de chevalier du XIVeme siecle. Lame acier, 150cm', 5, 350, NULL, 'epee_2_mains.jpg', 2, 4),
(6, 'Robe', 'Robe de princesse de Super Royaume', 2, 99, NULL, 'robe super royaume.png', 1, 1),
(7, 'Harpe', 'Harpe celtique de troubadour fabriquée à l''ancienne', 5, 400, NULL, 'harpe.jpg', 3, NULL),
(27, 'Oud', 'Instrument de musique Egyptien du moyen age', 5, 400, 5, 'oud.jpg', 3, NULL),
(8, 'Anneau', 'Anneau avec des diamants et des rubis', 2, 500, NULL,'bague.jpg', 4, NULL),
(9, 'Table ronde', 'La table ronde de Camelot', 12, 200, NULL, 'table_ronde.jpg', 5, 7),
(10, 'Moitié de Robe', 'Moitié de robe', 1, 50, NULL, 'mittelalter-blusen.jpg', 1, 1),
(11, 'Bustier tepu', 'Parce que je le veux bien', 1, 250, 50, 'lplm1409_ledermieder_antik_1.jpg', 1, 1),
(31, 'Tente Viking', 'Une tente de style Viking', 5, 70, 10, 'tente.jpg', 5, 8),
(32, 'Tente de chevalier', 'Tente de tournoi médievale, pour un chevalier. Disponible en bleu, vert, rouge et or', 5, 200, 5, 'tente2.jpg', 5, 8),
(33, 'Grande tente de chevalier', 'Tente de médievale, pour un riche seigneur. Disponible en bleu, vert, rouge et or', 5, 400, NULL, 'tente3.jpg', 5, 8),
(12, 'Tee shirt Dagobert', 'OMG je le veux', 1, 130, NULL, '22026w.jpg', 1, 1),
(4000, 'Bottines de gueux', 'Bottines sales en cuir de chèvre', 14, 100, 10, 'comp__mg_1421.jpg', 3, 1),
(4001, 'Chaise haute', 'Super chaise', 14, 50, 10, 'bm1901010700-steckstuhl.jpg', 5, 7);


-- --------------------------------------------------------

--
-- Structure de la table `objet_has_facture`
--

CREATE TABLE IF NOT EXISTS `objet_has_facture` (
  `Objet_idObjet` int(10) unsigned NOT NULL,
  `Facture_idFacture` int(10) unsigned NOT NULL,
  `quantite` int(11) NOT NULL DEFAULT '0',
  `commentaire` varchar(45) DEFAULT NULL,
  `note` int(11) DEFAULT NULL,
  `date` date DEFAULT NULL,
  PRIMARY KEY (`Objet_idObjet`,`Facture_idFacture`),
  KEY `fk_Objet_has_Facture_Facture1_idx` (`Facture_idFacture`),
  KEY `fk_Objet_has_Facture_Objet1_idx` (`Objet_idObjet`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `objet_has_facture`
--

INSERT INTO `objet_has_facture` (`Objet_idObjet`, `Facture_idFacture`, `quantite`, `commentaire`, `note`, `date`) VALUES
(2, 2, 1, NULL, NULL, NULL),
(4, 1, 2, 'Bof', 2, '2015-02-04'),
(5, 2, 4, NULL, NULL, NULL),
(7, 1, 1, 'Très bon produit', 5, '2015-02-04'),
(9, 1, 1, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `souscategorie`
--

CREATE TABLE IF NOT EXISTS `souscategorie` (
  `idCategorie` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nom` varchar(45) NOT NULL,
  `SousCategorie_idCategorie` int(10) unsigned NOT NULL,
  PRIMARY KEY (`idCategorie`),
  UNIQUE KEY `idCategorie_UNIQUE` (`idCategorie`),
  KEY `fk_Categorie_SousCategorie1_idx` (`SousCategorie_idCategorie`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=12 ;

--
-- Contenu de la table `souscategorie`
--

INSERT INTO `souscategorie` (`idCategorie`, `nom`, `SousCategorie_idCategorie`) VALUES
(1, 'Costume pour femme', 1),
(2, 'Costume pour homme', 1),
(3, 'Chaussures', 1),
(4, 'Armes', 2),
(5, 'Armures', 2),
(6, 'Instruments de torture', 2),
(7, 'Mobilier', 5),
(8, 'Campement', 5),
(9, 'Viandes', 6),
(10, 'Fruits et légumes bio', 6),
(11, 'Boissons', 6);

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE IF NOT EXISTS `utilisateur` (
  `idUtilisateur` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nomUtilisateur` varchar(45) NOT NULL,
  `motDePasse` varchar(45) NOT NULL,
  `mail` varchar(45) NOT NULL,
  PRIMARY KEY (`idUtilisateur`),
  UNIQUE KEY `idUser_UNIQUE` (`idUtilisateur`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=13 ;

--
-- Contenu de la table `utilisateur`
--

INSERT INTO `utilisateur` (`idUtilisateur`, `nomUtilisateur`, `motDePasse`, `mail`) VALUES
(2, 'alix', 'alix', 'alixdel396@gmail.com'),
(3, 'aymeric', 'aymeric', 'aymeric.davant@gmail.com'),
(4, 'nathan', 'nathan', 'nathan.prior.31@gmail.com'),
(12, 'jeanluc.hak@gmail.com', 'zaza', 'jeanluc.hak@gmail.com');

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `adresse`
--
ALTER TABLE `adresse`
  ADD CONSTRAINT `fk_Adresse_Utilisateur` FOREIGN KEY (`Utilisateur_idUtilisateur`) REFERENCES `utilisateur` (`idUtilisateur`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `facture`
--
ALTER TABLE `facture`
  ADD CONSTRAINT `fk_Facture_Utilisateur1` FOREIGN KEY (`Utilisateur_idUtilisateur`) REFERENCES `utilisateur` (`idUtilisateur`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `objet`
--
ALTER TABLE `objet`
  ADD CONSTRAINT `fk_Objet_Categorie1_idx` FOREIGN KEY (`Categorie_idCategorie`) REFERENCES `categorie` (`idCategorie`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Objet_SousCategorie1` FOREIGN KEY (`SousCategorie_idCategorie`) REFERENCES `souscategorie` (`idCategorie`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `objet_has_facture`
--
ALTER TABLE `objet_has_facture`
  ADD CONSTRAINT `fk_Objet_has_Facture_Facture1` FOREIGN KEY (`Facture_idFacture`) REFERENCES `facture` (`idFacture`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Objet_has_Facture_Objet1` FOREIGN KEY (`Objet_idObjet`) REFERENCES `objet` (`idObjet`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `souscategorie`
--
ALTER TABLE `souscategorie`
  ADD CONSTRAINT `fk_Categorie_SousCategorie1` FOREIGN KEY (`SousCategorie_idCategorie`) REFERENCES `categorie` (`idCategorie`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
