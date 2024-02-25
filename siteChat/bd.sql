-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : jeu. 22 fév. 2024 à 06:48
-- Version du serveur : 8.2.0
-- Version de PHP : 8.2.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `wordpressmatomo`
--

-- --------------------------------------------------------

--
-- Structure de la table `usersiteanalyse`
--

DROP TABLE IF EXISTS `usersiteanalyse`;
CREATE TABLE IF NOT EXISTS `usersiteanalyse` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(20) DEFAULT NULL,
  `prenom` varchar(20) DEFAULT NULL,
  `username` varchar(255) NOT NULL,
  `password_hash` varchar(255) NOT NULL,
  `acces_tableaubord` tinyint(1) NOT NULL DEFAULT '0',
  `acces_visiteurs` tinyint(1) NOT NULL DEFAULT '0',
  `acces_comportement` tinyint(1) NOT NULL DEFAULT '0',
  `recapitulatif` tinyint(1) DEFAULT '0',
  `journalDesVisites` tinyint(1) DEFAULT '0',
  `enTempsReel` tinyint(1) DEFAULT '0',
  `geolocalisation` tinyint(1) DEFAULT '0',
  `provenances` tinyint(1) DEFAULT '0',
  `peripherique` tinyint(1) DEFAULT '0',
  `logiciel` tinyint(1) DEFAULT '0',
  `horaires` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=34 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `usersiteanalyse`
--

INSERT INTO `usersiteanalyse` (`id`, `nom`, `prenom`, `username`, `password_hash`, `acces_tableaubord`, `acces_visiteurs`, `acces_comportement`, `recapitulatif`, `journalDesVisites`, `enTempsReel`, `geolocalisation`, `provenances`, `peripherique`, `logiciel`, `horaires`) VALUES
(1, 'Abdou', 'Radja', 'radja', 'e4868585234052bd6c5fd54bb86cf933026b47fb0399015e58c931d98fd2c11a', 1, 1, 1, 1, 1, 1, 0, 0, 0, 0, 0),
(32, 'Martin', 'Alex', 'Alex', 'd8b28eacd1ef7320f8a3606ed11a7573a1ade3952ea7c8ac012ba10a7c3b01b3', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(33, 'Martin', 'Thomas', 'Thomas', '5dfcf9ef1fb1ecbce32fefe37ae99aff68832a7e2ac74f52daa5a1bcd8038118', 1, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
-- Structure de la table `api_permissions`
--

DROP TABLE IF EXISTS `api_permissions`;
CREATE TABLE IF NOT EXISTS `api_permissions` (
  `id` int NOT NULL AUTO_INCREMENT,
  `idUser` int NOT NULL,
  `libelle` varchar(255) DEFAULT NULL,
  `api_endpoint` varchar(255) NOT NULL,
  `allowed` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `fk_user` (`idUser`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `api_permissions`
--

INSERT INTO `api_permissions` (`id`, `idUser`, `libelle`, `api_endpoint`, `allowed`) VALUES
(1, 1, 'Pays', 'http://127.0.0.1/wordpressMatomo/wp-admin/wp-json/matomo/v1/api/processed_report?period=yesterday&date=day&filter_limit=10&apiModule=Actions&apiAction=country', 1),
(2, 2, 'General', 'http://127.0.0.1/wordpressMatomo/wp-admin/wp-json/matomo/v1/api/processed_report?period=yesterday&date=day&filter_limit=10&apiModule=Actions&apiAction=getPageUrls', 0);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;