-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  mar. 07 avr. 2020 à 14:42
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
-- Structure de la table `likes`
--

DROP TABLE IF EXISTS `likes`;
CREATE TABLE IF NOT EXISTS `likes` (
  `id_like` int(11) NOT NULL AUTO_INCREMENT,
  `aime` int(11) NOT NULL,
  `id_reponse` int(11) NOT NULL,
  `id_utilisateur` int(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id_like`)
) ENGINE=MyISAM AUTO_INCREMENT=200 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `likes`
--

INSERT INTO `likes` (`id_like`, `aime`, `id_reponse`, `id_utilisateur`) VALUES
(193, 1, 63, 1),
(186, 2, 62, 2),
(182, 1, 61, 2),
(198, 1, 63, 2);

-- --------------------------------------------------------

--
-- Structure de la table `reponses`
--

DROP TABLE IF EXISTS `reponses`;
CREATE TABLE IF NOT EXISTS `reponses` (
  `id_reponse` int(6) NOT NULL AUTO_INCREMENT,
  `auteur` varchar(30) NOT NULL,
  `message` text NOT NULL,
  `date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `id_sujets` int(6) NOT NULL,
  PRIMARY KEY (`id_reponse`)
) ENGINE=MyISAM AUTO_INCREMENT=116 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `reponses`
--

INSERT INTO `reponses` (`id_reponse`, `auteur`, `message`, `date`, `id_sujets`) VALUES
(63, 'diouf', 'aller l om', '2020-04-03 21:42:16', 46),
(115, 'ines', 'bonjour en tant que crÃ©atrice et spÃ©cialiste de ce sujet, je rÃ©pondrai Ã  toutes vos questions.', '2020-04-07 15:15:53', 57),
(114, 'ines', 'bonjour,je compte sur vous pour de la politesse et de la bienveillance', '2020-04-07 13:43:10', 46);

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
  `date` date NOT NULL DEFAULT '0000-00-00',
  `id_topics` int(6) NOT NULL,
  PRIMARY KEY (`id_sujets`)
) ENGINE=MyISAM AUTO_INCREMENT=69 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `sujets`
--

INSERT INTO `sujets` (`id_sujets`, `auteur`, `titre`, `description`, `date`, `id_topics`) VALUES
(57, 'ines', 'crypto monnaies ', 'Bitcoins, Ethereum... : Pour parler sur les crypto monnaies Bitcoins', '2020-04-07', 6),
(47, 'ines', 'Serie A', 'Reagissez en direct lorsque les matches de la Serie A, de Coupe d\'Europe et de la Nazionale se deroulent !', '2020-03-30', 3),
(46, 'pape', 'om', 'L\'actu de l\'OM faite par ses supporters pour ses supporters. L\'Olympique de Marseille au quotidien avec le mercato, les transferts et les infos foot.', '2020-03-07', 3);

-- --------------------------------------------------------

--
-- Structure de la table `topics`
--

DROP TABLE IF EXISTS `topics`;
CREATE TABLE IF NOT EXISTS `topics` (
  `id_topics` int(6) NOT NULL AUTO_INCREMENT,
  `auteur` varchar(30) NOT NULL,
  `titre` text NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id_topics`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `topics`
--

INSERT INTO `topics` (`id_topics`, `auteur`, `titre`, `date`) VALUES
(3, 'thomas', 'FOOT', '2020-03-26'),
(5, 'thomas', 'Cinema', '2020-03-26'),
(6, 'ines', 'Finance', '2020-03-26');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

DROP TABLE IF EXISTS `utilisateurs`;
CREATE TABLE IF NOT EXISTS `utilisateurs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `sexe` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `localisation` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp(),
  `grade` int(11) NOT NULL DEFAULT 3,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=29 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`id`, `login`, `password`, `nom`, `prenom`, `sexe`, `email`, `localisation`, `description`, `date`, `grade`) VALUES
(8, 'pape', '54cf1edf1143872699c8b24cfc4bf05ead9e0365', 'amar', 'pape', 'homme', 'pape@gmail.com', 'paris', 'lyonnais endurcit', '2020-04-01', 3),
(1, 'thomas', 'e9db499e13ac90573163837d2fb1fc9f85402d6d', 'thomas', 'berto', 'Homme', 'thomasberto21@gmail.com', '13014', 'admin', '2020-04-02', 1),
(20, 'toto', '8aed1322e5450badb078e1fb60a817a1df25a2ca', 'rina', 'toto', 'Homme', 'thomasberto21@gmail.com', 'miami', 'supporter de lom ', '2020-04-01', 3),
(21, 'leo', '8aed1322e5450badb078e1fb60a817a1df25a2ca', 'messi', 'leo', 'Homme', 'leo.messi@hotmail.com', 'miami', 'supporter de lom ', '2020-04-02', 3),
(22, 'a', '8aed1322e5450badb078e1fb60a817a1df25a2ca', 'a', 'b', 'Homme', '', 'miami', 'supporter de lom ', '2020-04-02', 3),
(26, 'melo', '3e267facec158a22a232125c74f1f09bceb68aac', 'melo', 'fe', 'Femme', 'melo@gmail.com', 'joho', 'pokemon de type mental possede de forte aptitude en combat rapprocher et a distance', '2020-04-02', 3),
(2, 'ines', '9c7478e0ce3e1d701ffebc2eb29fce4958c23fdd', 'ines ', 'aliahmed', 'Femme', 'ines@gmail.com', 'dubai', 'modératrice', '2020-04-05', 2),
(28, 'moe', 'df43ad44d44e898f8f4e6ed91e6952bfce573e12', 'moe', 'sizlac', 'Homme', '', '', '', '2020-04-07', 3);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
