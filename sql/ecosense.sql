-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : jeu. 20 jan. 2022 à 17:30
-- Version du serveur :  5.7.31
-- Version de PHP : 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `ecosense`
--

-- --------------------------------------------------------

--
-- Structure de la table `capteur`
--

DROP TABLE IF EXISTS `capteur`;
CREATE TABLE IF NOT EXISTS `capteur` (
  `id_capteur` int(255) NOT NULL,
  `type_capteur` varchar(255) NOT NULL,
  PRIMARY KEY (`id_capteur`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `frequence_cardiaque`
--

DROP TABLE IF EXISTS `frequence_cardiaque`;
CREATE TABLE IF NOT EXISTS `frequence_cardiaque` (
  `id_frequence` int(255) NOT NULL,
  `id_user` int(255) NOT NULL,
  `valeur_frequence` float NOT NULL,
  `heure_recue_freq` timestamp NOT NULL,
  PRIMARY KEY (`id_frequence`),
  KEY `U_constraint` (`id_user`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `mesures`
--

DROP TABLE IF EXISTS `mesures`;
CREATE TABLE IF NOT EXISTS `mesures` (
  `id_mesure` int(255) NOT NULL,
  `id_capteur` int(255) NOT NULL,
  `id_frequence` int(255) NOT NULL,
  `valeur_recue_salle` float NOT NULL,
  `heure_recepetion_salle` timestamp NOT NULL,
  PRIMARY KEY (`id_mesure`),
  KEY `C_constraint` (`id_capteur`),
  KEY `F_constraint` (`id_frequence`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `roles`
--

DROP TABLE IF EXISTS `roles`;
CREATE TABLE IF NOT EXISTS `roles` (
  `id_role` int(255) NOT NULL,
  `role_name` varchar(255) NOT NULL,
  PRIMARY KEY (`id_role`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `room`
--

DROP TABLE IF EXISTS `room`;
CREATE TABLE IF NOT EXISTS `room` (
  `id_room` int(255) NOT NULL AUTO_INCREMENT,
  `room_name` varchar(255) NOT NULL,
  PRIMARY KEY (`id_room`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

DROP TABLE IF EXISTS `utilisateur`;
CREATE TABLE IF NOT EXISTS `utilisateur` (
  `id_user` int(255) NOT NULL AUTO_INCREMENT,
  `id_role` int(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_last_name` varchar(255) NOT NULL,
  `user_first_name` varchar(255) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_user`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`id_user`, `id_role`, `user_email`, `user_last_name`, `user_first_name`, `user_password`, `date`) VALUES
(5, 1, 'francoishascoat@gmail.com', 'HASCOAT', 'François', '$2y$12$CChWmY5Y4t80enRgimL4heAwNnRc6GXut97tLOp6GoJkAY7/MhqYC', '2022-01-17 13:59:31'),
(2, 1, 'asas', 'jerome', 'oas', '$2y$12$6GZbm0tgFtijOAGQnZdkX.nKCONQIHvwRcRbPTtyTJB7gaT4j87ky', '2022-01-12 10:36:33'),
(3, 1, 'marc@gmail.com', 'jean', 'marc', '$2y$12$PtyQws88w/IiZnzC2MRMDeKe3EU4UnLWX/vYMkYo8FZoXSoXCP.Z.', '2022-01-14 15:24:50'),
(6, 1, 'julien.godfroy27@gmail.com', 'Godfroy', 'Julien', '$2y$12$RIUp/CaUzXTMOY5GdRgvD.ByfhDqlDGhqH/3nOGOm/f8WHcW9rUEi', '2022-01-20 16:28:38'),
(7, 1, 'slkjd@gmail.com', 'qskld', 'qslkdjqs', '$2y$12$uDHK9lNpTPfYIUBIdNpZ5OnRBIhkL0hOjQSaES4j8iW5hPNomEztK', '2022-01-20 17:03:51'),
(8, 1, 'sdlkfj@gmail.Com', 'kldqslkdj', 'sfldkfjd', '$2y$12$5PEpU/cVosUOURAJr5OHrePZBXWekTnKIK8kpwyaAilQBP9.LA22q', '2022-01-20 17:25:15');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
