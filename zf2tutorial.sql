-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le: Mar 03 Décembre 2013 à 10:21
-- Version du serveur: 5.6.12-log
-- Version de PHP: 5.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `zf2tutorial`
--
CREATE DATABASE IF NOT EXISTS `zf2tutorial` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `zf2tutorial`;

-- --------------------------------------------------------

--
-- Structure de la table `bdd`
--

CREATE TABLE IF NOT EXISTS `bdd` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(100) NOT NULL,
  `prenom` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Contenu de la table `bdd`
--

INSERT INTO `bdd` (`id`, `nom`, `prenom`) VALUES
(1, 'Jebali', 'Souhail'),
(3, 'Jebali', 'Rayan'),
(4, 'Ghanfri', 'Naoufel'),
(5, 'Toto', 'Titi');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
