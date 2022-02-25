-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : ven. 25 fév. 2022 à 03:19
-- Version du serveur :  5.7.31
-- Version de PHP : 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `adminfichier`
--

-- --------------------------------------------------------

--
-- Structure de la table `fichier`
--

DROP TABLE IF EXISTS `fichier`;
CREATE TABLE IF NOT EXISTS `fichier` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) NOT NULL,
  `chemin` varchar(100) NOT NULL,
  `taille` double NOT NULL,
  `type` varchar(100) NOT NULL,
  `date` date DEFAULT NULL,
  `idutil` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_idUtilisateur` (`idutil`)
) ENGINE=MyISAM AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `fichier`
--

INSERT INTO `fichier` (`id`, `nom`, `chemin`, `taille`, `type`, `date`, `idutil`) VALUES
(13, 'haou.mp3', 'fichiers/Bouteselle_Tom_2/haou.mp3', 1879004, 'audio/mpeg', NULL, 2);

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

DROP TABLE IF EXISTS `utilisateur`;
CREATE TABLE IF NOT EXISTS `utilisateur` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) NOT NULL,
  `mail` varchar(60) NOT NULL,
  `mdp` varchar(150) NOT NULL,
  `autoriser` tinyint(1) NOT NULL,
  `admin` tinyint(1) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `droit_ajouter` tinyint(1) DEFAULT NULL,
  `droit_supprimer` tinyint(1) DEFAULT NULL,
  `token` varchar(255) DEFAULT NULL,
  `adresse_ip` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`id`, `nom`, `mail`, `mdp`, `autoriser`, `admin`, `prenom`, `droit_ajouter`, `droit_supprimer`, `token`, `adresse_ip`) VALUES
(2, 'Bouteselle', 'tomy.bouteselle@gmail.com', 'ab4f63f9ac65152575886860dde480a1', 1, 1, 'Tom', 1, 1, NULL, '::1'),
(3, 'Faussette', 'bla@bla.com', 'ab4f63f9ac65152575886860dde480a1', 0, 0, 'Jean', 0, 0, NULL, '::1'),
(4, 'Faussette', 'bla@bla.com', 'ab4f63f9ac65152575886860dde480a1', 0, 0, 'Jean', 0, 0, NULL, '::1');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
