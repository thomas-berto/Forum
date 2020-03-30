-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  lun. 30 mars 2020 à 01:19
-- Version du serveur :  10.4.10-MariaDB
-- Version de PHP :  7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `forum`
--

-- --------------------------------------------------------

--
-- Structure de la table `reponses`
--

DROP TABLE IF EXISTS `reponses`;
CREATE TABLE IF NOT EXISTS `reponses` (
  `id` int(6) NOT NULL AUTO_INCREMENT,
  `auteur` varchar(30) NOT NULL,
  `message` text NOT NULL,
  `date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `id_sujets` int(6) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `reponses`
--

INSERT INTO `reponses` (`id`, `auteur`, `message`, `date`, `id_sujets`) VALUES
(1, 'logan', ',,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,', '2020-03-29 04:02:30', 10),
(2, 'logan', 'azertyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyy\r\n', '2020-03-29 04:02:39', 10),
(3, 'logan', 'azertyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyy\r\n', '2020-03-29 04:03:20', 10),
(4, 'logan', 'nnnnnnnnnn', '2020-03-29 04:03:31', 10),
(5, 'PAPE', 'azerfv', '2020-03-29 04:03:51', 10),
(6, 'PAPE', 'azerfv', '2020-03-29 04:06:09', 10),
(7, 'PAPE', 'azerfv', '2020-03-29 04:06:21', 10);

-- --------------------------------------------------------

--
-- Structure de la table `sujets`
--

DROP TABLE IF EXISTS `sujets`;
CREATE TABLE IF NOT EXISTS `sujets` (
  `id_sujets` int(6) NOT NULL AUTO_INCREMENT,
  `auteur` varchar(30) NOT NULL,
  `titre` text NOT NULL,
  `description` text DEFAULT NULL,
  `date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `id_topics` int(6) NOT NULL,
  PRIMARY KEY (`id_sujets`)
) ENGINE=MyISAM AUTO_INCREMENT=40 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `sujets`
--

INSERT INTO `sujets` (`id_sujets`, `auteur`, `titre`, `description`, `date`, `id_topics`) VALUES
(24, 'pape', 'ligue 1', 'vvvvvvvv', '2020-03-30 02:50:30', 3),
(9, 'PAPE', 'LDC', 'discussion consacreer a la plus grande competition europeen', '2020-03-28 19:38:59', 3),
(10, 'PAPE', 'ligue 1', 'sujet dedier a la ligue 1', '2020-03-28 19:47:15', 3),
(20, 'pape', 'Festival de Canne', 'forum dedier au 21em festival', '2020-03-30 02:25:52', 5);

-- --------------------------------------------------------

--
-- Structure de la table `topics`
--

DROP TABLE IF EXISTS `topics`;
CREATE TABLE IF NOT EXISTS `topics` (
  `id_topics` int(6) NOT NULL AUTO_INCREMENT,
  `auteur` varchar(30) NOT NULL,
  `titre` text NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id_topics`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `topics`
--

INSERT INTO `topics` (`id_topics`, `auteur`, `titre`, `date`) VALUES
(3, 'PAPE', 'FOOT', '2020-03-26 16:22:00'),
(5, 'pape', 'cinema', '2020-03-26 22:39:51'),
(6, 'pape', 'Finance', '2020-03-26 22:40:15');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

DROP TABLE IF EXISTS `utilisateurs`;
CREATE TABLE IF NOT EXISTS `utilisateurs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `grade` int(11) NOT NULL DEFAULT 3,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`id`, `login`, `password`, `grade`) VALUES
(8, 'pape', '54cf1edf1143872699c8b24cfc4bf05ead9e0365', 3),
(10, 'thomas', 'e9db499e13ac90573163837d2fb1fc9f85402d6d', 1),
(11, 'ines', '9c7478e0ce3e1d701ffebc2eb29fce4958c23fdd', 2),
(14, 'tommy', '488e399ca964e714552c654dd63d032547705816', 3);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
