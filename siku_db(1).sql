-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : ven. 27 mai 2022 à 13:32
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
-- Base de données : `siku_db`
--

-- --------------------------------------------------------

--
-- Structure de la table `annee_acads`
--

DROP TABLE IF EXISTS `annee_acads`;
CREATE TABLE IF NOT EXISTS `annee_acads` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `annee1` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `annee2` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dtrentree` date NOT NULL,
  `actif` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `annee_acads`
--

INSERT INTO `annee_acads` (`id`, `annee1`, `annee2`, `dtrentree`, `actif`, `created_at`, `updated_at`) VALUES
(1, '2022', '2023', '2022-10-04', 1, '2022-04-08 10:24:37', '2022-04-08 10:24:37');

-- --------------------------------------------------------

--
-- Structure de la table `categories_depenses`
--

DROP TABLE IF EXISTS `categories_depenses`;
CREATE TABLE IF NOT EXISTS `categories_depenses` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  `ecole_id` int(11) NOT NULL DEFAULT '0',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `categories_depenses`
--

INSERT INTO `categories_depenses` (`id`, `name`, `ecole_id`, `created_at`, `updated_at`) VALUES
(1, 'Loyer', 1, '2022-05-16 12:56:53', '2022-05-16 12:56:53'),
(2, 'Eau', 1, '2022-05-16 15:05:15', '2022-05-16 15:05:15'),
(3, 'Electricité', 1, '2022-05-16 15:06:34', '2022-05-16 15:06:34'),
(4, 'Salaire Prof', 1, '2022-05-16 17:11:12', '2022-05-16 17:11:12');

-- --------------------------------------------------------

--
-- Structure de la table `categories_entrees`
--

DROP TABLE IF EXISTS `categories_entrees`;
CREATE TABLE IF NOT EXISTS `categories_entrees` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  `ecole_id` int(11) NOT NULL DEFAULT '0',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `categories_entrees`
--

INSERT INTO `categories_entrees` (`id`, `name`, `ecole_id`, `created_at`, `updated_at`) VALUES
(1, 'Formation QHSE', 1, '2022-05-18 13:12:55', '2022-05-18 13:12:55'),
(2, 'Formation Graphisme', 1, '2022-05-18 13:18:09', '2022-05-18 13:18:09'),
(3, 'Formation en HTML5 & CSS3', 1, '2022-05-18 13:24:13', '2022-05-18 13:24:13'),
(4, 'Organisation', 1, '2022-05-18 14:04:50', '2022-05-18 14:04:50'),
(5, 'Don', 1, '2022-05-26 09:40:59', '2022-05-26 09:40:59');

-- --------------------------------------------------------

--
-- Structure de la table `classes`
--

DROP TABLE IF EXISTS `classes`;
CREATE TABLE IF NOT EXISTS `classes` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `serie_id` bigint(20) NOT NULL,
  `niveau_id` bigint(20) NOT NULL,
  `enseignement_id` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `classes`
--

INSERT INTO `classes` (`id`, `serie_id`, `niveau_id`, `enseignement_id`, `created_at`, `updated_at`) VALUES
(1, 4, 5, 2, '2022-05-01 12:30:12', '2022-05-01 12:30:12'),
(2, 1, 5, 1, '2022-05-01 12:30:26', '2022-05-01 12:30:26'),
(3, 6, 1, 1, '2022-05-01 13:04:07', '2022-05-01 13:04:07'),
(4, 7, 1, 2, '2022-05-01 13:04:27', '2022-05-01 13:04:27');

-- --------------------------------------------------------

--
-- Structure de la table `cours`
--

DROP TABLE IF EXISTS `cours`;
CREATE TABLE IF NOT EXISTS `cours` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `classe_id` bigint(20) NOT NULL,
  `matiere_id` bigint(20) NOT NULL,
  `coefficient` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `cours`
--

INSERT INTO `cours` (`id`, `classe_id`, `matiere_id`, `coefficient`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 2, '2022-04-08 10:51:59', '2022-04-08 10:51:59'),
(2, 2, 1, 4, '2022-04-08 10:55:04', '2022-04-08 10:55:04');

-- --------------------------------------------------------

--
-- Structure de la table `depenses`
--

DROP TABLE IF EXISTS `depenses`;
CREATE TABLE IF NOT EXISTS `depenses` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) DEFAULT NULL,
  `ecole_id` int(11) NOT NULL DEFAULT '0',
  `categorie_id` int(11) NOT NULL DEFAULT '0',
  `token` varchar(200) DEFAULT NULL,
  `montant` double NOT NULL DEFAULT '0',
  `user_id` int(11) NOT NULL DEFAULT '0',
  `mois` int(11) DEFAULT '0',
  `annee` int(11) NOT NULL DEFAULT '0',
  `semaine` int(11) NOT NULL DEFAULT '0',
  `description` text,
  `active` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `depenses`
--

INSERT INTO `depenses` (`id`, `name`, `ecole_id`, `categorie_id`, `token`, `montant`, `user_id`, `mois`, `annee`, `semaine`, `description`, `active`, `created_at`, `updated_at`) VALUES
(1, 'Depense 1', 1, 1, 'token20220516050252', 250000, 6, 5, 2022, 20, 'Loyer du moi de mai', 1, '2022-05-16 17:02:52', '2022-05-16 17:02:52'),
(2, 'Depense 2', 1, 2, 'token20220516050341', 12500, 6, 5, 2022, 20, 'Facture d\'eau pour le mois de Juillet', 1, '2022-05-16 17:03:41', '2022-05-16 17:03:41'),
(3, 'Salaire Mai', 1, 4, 'token220516051223', 1350000, 6, 5, 2022, 20, 'Salaire des profs du moi de mai', 1, '2022-05-16 17:12:23', '2022-05-16 17:12:23'),
(4, 'azerty', 1, 1, 'A220518013821x', 50000, 6, 5, 2022, 20, 'azerty', 1, '2022-05-18 13:38:21', '2022-05-18 13:38:21'),
(5, 'Formation', 1, 3, 'A220518014123x', 150000, 6, 5, 2022, 20, 'azerty', 1, '2022-05-18 13:41:23', '2022-05-18 13:41:23');

-- --------------------------------------------------------

--
-- Structure de la table `diplomes`
--

DROP TABLE IF EXISTS `diplomes`;
CREATE TABLE IF NOT EXISTS `diplomes` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `diplomes`
--

INSERT INTO `diplomes` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Licence', '2022-04-08 11:01:15', '2022-04-08 11:01:15'),
(2, 'BAC', '2022-04-08 11:01:25', '2022-04-08 11:01:25'),
(3, 'BEPC', '2022-04-08 11:01:36', '2022-04-08 11:01:36'),
(4, 'CEPE', '2022-04-08 11:01:46', '2022-04-08 11:01:46');

-- --------------------------------------------------------

--
-- Structure de la table `ecolages`
--

DROP TABLE IF EXISTS `ecolages`;
CREATE TABLE IF NOT EXISTS `ecolages` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `inscription_id` bigint(20) NOT NULL,
  `moi_id` bigint(20) NOT NULL,
  `montant` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `ecolages`
--

INSERT INTO `ecolages` (`id`, `inscription_id`, `moi_id`, `montant`, `created_at`, `updated_at`) VALUES
(1, 11, 1, 55000, '2022-05-26 10:20:46', '2022-05-26 10:20:46'),
(2, 11, 2, 55000, '2022-05-26 10:23:13', '2022-05-26 10:23:13'),
(3, 11, 3, 55000, '2022-05-26 10:23:53', '2022-05-26 10:23:53'),
(4, 3, 1, 25000, '2022-05-26 10:29:28', '2022-05-26 10:29:28'),
(5, 5, 1, 25000, '2022-05-26 15:19:24', '2022-05-26 15:19:24'),
(6, 4, 1, 36000, '2022-05-26 20:12:23', '2022-05-26 20:12:23'),
(7, 7, 1, 15000, '2022-05-26 20:40:42', '2022-05-26 20:40:42');

-- --------------------------------------------------------

--
-- Structure de la table `ecoles`
--

DROP TABLE IF EXISTS `ecoles`;
CREATE TABLE IF NOT EXISTS `ecoles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `phone` varchar(30) DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `token` varchar(100) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `image_uri` varchar(100) DEFAULT NULL,
  `is_private` tinyint(1) DEFAULT '1',
  `pay_id` int(11) NOT NULL DEFAULT '1',
  `enseignement_id` int(11) NOT NULL DEFAULT '1',
  `coordonnees` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `ecoles`
--

INSERT INTO `ecoles` (`id`, `name`, `address`, `email`, `phone`, `active`, `token`, `created_at`, `updated_at`, `image_uri`, `is_private`, `pay_id`, `enseignement_id`, `coordonnees`) VALUES
(1, 'Louis Alexon KABA III', 'Nkouikou', 'kaba@mail.com', '052053989', 1, 'sdfqghhdfhfh', '2022-05-02 14:25:41', '2022-05-02 14:25:41', 'images-ecoles/T7f053vWjBGeaCFVHIiwZ7hwGzl8zx6qNGzgm4wK.jpg', 1, 1, 2, 'Coordonnées'),
(2, 'Lycée KABA', 'Siafoumou', 'lyceekaba@gmail.com', '065036045', 1, 'sdqgfdhtr', '2022-05-02 14:36:53', '2022-05-02 14:36:53', 'images-ecoles/CHgwY8NNirFWRNndxxHZQozsGw2oGFKCRWOi3Dcz.png', 1, 1, 1, 'Coordonnées');

-- --------------------------------------------------------

--
-- Structure de la table `eleves`
--

DROP TABLE IF EXISTS `eleves`;
CREATE TABLE IF NOT EXISTS `eleves` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nom` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `prenom` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_naiss` date DEFAULT NULL,
  `lieu_naiss` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `adresse` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nom_pere` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tel_pere` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nom_mere` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tel_mere` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nom_tuteur` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tel_tuteur` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image_uri` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'aucune image',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `eleves`
--

INSERT INTO `eleves` (`id`, `nom`, `prenom`, `date_naiss`, `lieu_naiss`, `adresse`, `nom_pere`, `tel_pere`, `nom_mere`, `tel_mere`, `nom_tuteur`, `tel_tuteur`, `image_uri`, `created_at`, `updated_at`) VALUES
(1, 'Bounlanger', 'François', '2001-02-12', 'Pointe-Noire', 'Mawata', 'Bounlanger Bertrant', '066543214', 'Martinez Pauline', '066879344', 'Bounlanger Bertrant', '066543214', 'images/membres/08042022123316.jpg', '2022-04-08 10:33:16', '2022-04-08 10:33:16'),
(2, 'Mavoungou', 'Otran', '2000-02-01', 'Pointe-Noire', 'Tié-Tié', 'Mavoungou Jean', '044567328', 'Malalou Téthé', '055678431', 'Mavoungou Jean', '044567328', 'images/membres/08042022123815.png', '2022-04-08 10:38:15', '2022-04-08 10:38:15'),
(4, 'Malanda', 'Evans Marvel', '1989-04-30', 'Pointe-Noire', 'Mbota', 'Malanda Patrick', '066237876', 'Ilimbou Sacrée', '066543212', 'Malanda Patrick', '066237876', 'images/membres/10052022081603.jpg', '2022-05-10 18:16:03', '2022-05-10 18:16:03'),
(5, 'Malanda', 'Daniel', '2000-03-19', 'Pointe-Noire', 'Mbota', 'Malanda Patrick', '066789876', 'Kibinda Anne', '066874321', 'Malanda Patrick', '066237876', 'images/membres/11052022125104.png', '2022-05-11 10:51:04', '2022-05-11 10:51:04'),
(6, 'Malanda', 'Marcelle', '2004-02-02', 'Pointe-Noire', 'Mbota', 'Malanda Patrick', '066237876', 'Kibinda Anne', '066765411', 'Malanda Patrick', '066237876', 'images/membres/11052022125925.jpg', '2022-05-11 10:59:25', '2022-05-11 10:59:25'),
(7, 'Malanda', 'Sylao', '2003-02-03', 'Pointe-Noire', 'Mbota', 'Malanda Patrick', '066237876', 'Kibinda Anne', '055567654', 'Malanda Patrick', '066237876', 'images/membres/11052022010626.jpg', '2022-05-11 11:06:26', '2022-05-11 11:06:26'),
(8, 'Dibouiloui', 'Narcis François', '2006-03-12', 'Brazzaville', 'Siafoumou', 'Dibouiloui Landry', '066458897', 'Makosso Valette', '044567876', 'Dibouiloui Landry', '066458897', 'images/membres/11052022011210.png', '2022-05-11 11:12:10', '2022-05-11 11:12:10'),
(9, 'Dibouiloui', 'Jule André', '2007-05-20', 'Pointe-Noire', 'Mawata', 'Dibouiloui Landry', '066458897', 'Makosso Valette', '0765678765', 'Dibouiloui Landry', '066458897', 'images/membres/11052022011627.jpg', '2022-05-11 11:16:27', '2022-05-11 11:16:27'),
(10, 'Dibouiloui', 'Marco', '2008-04-29', 'Pointe-Noire', 'Mawata', 'Dibouiloui Landry', '066458897', 'Makosso Valette', '0765678765', 'Dibouiloui Landry', '066458897', 'images/membres/11052022012451.jpg', '2022-05-11 11:24:51', '2022-05-11 11:24:51'),
(11, 'Malanda', 'Tony', '2008-12-12', 'Brazzaville', 'Mbota', 'Malanda Patrick', '066237876', 'Kibinda Ane', '044445654', 'Malanda Patrick', '066237876', 'images/membres/11052022012947.png', '2022-05-11 11:29:47', '2022-05-11 11:29:47'),
(12, 'KABA', 'Galouo', '2000-12-04', 'Brazzaville', 'Nkouikou', 'KABA KABA', '064485524', 'KABA DIELLE', '064485524', 'KABA DIELLE', '060110101', 'images/membres/12052022030704.png', '2022-05-12 14:07:04', '2022-05-12 14:07:04');

-- --------------------------------------------------------

--
-- Structure de la table `emploie_temps`
--

DROP TABLE IF EXISTS `emploie_temps`;
CREATE TABLE IF NOT EXISTS `emploie_temps` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `cour_id` bigint(20) NOT NULL,
  `tranche_id` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `emploie_temps`
--

INSERT INTO `emploie_temps` (`id`, `cour_id`, `tranche_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '2022-04-08 11:00:35', '2022-04-08 11:00:35'),
(2, 2, 2, '2022-04-08 11:00:49', '2022-04-08 11:00:49');

-- --------------------------------------------------------

--
-- Structure de la table `entrees`
--

DROP TABLE IF EXISTS `entrees`;
CREATE TABLE IF NOT EXISTS `entrees` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) DEFAULT NULL,
  `ecole_id` int(11) NOT NULL DEFAULT '0',
  `categorie_id` int(11) NOT NULL DEFAULT '0',
  `token` varchar(200) DEFAULT NULL,
  `montant` double NOT NULL DEFAULT '0',
  `user_id` int(11) NOT NULL DEFAULT '0',
  `mois` int(11) DEFAULT '0',
  `annee` int(11) NOT NULL DEFAULT '0',
  `semaine` int(11) NOT NULL DEFAULT '0',
  `description` text,
  `active` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `entrees`
--

INSERT INTO `entrees` (`id`, `name`, `ecole_id`, `categorie_id`, `token`, `montant`, `user_id`, `mois`, `annee`, `semaine`, `description`, `active`, `created_at`, `updated_at`) VALUES
(1, 'Formation', 1, 3, 'A220518014357x', 150000, 6, 5, 2022, 20, 'Description', 1, '2022-05-18 13:43:57', '2022-05-18 13:43:57'),
(2, 'Formation Professionnelle', 1, 2, 'A220518015934x', 250000, 6, 5, 2022, 20, 'azerty azerty azerty azerty', 1, '2022-05-18 13:59:34', '2022-05-18 13:59:34'),
(3, 'Don', 1, 5, 'A220526094212x', 250000, 6, 5, 2022, 21, 'Don de l\'honorable KABA III GALOUO Louis Alexon', 1, '2022-05-26 09:42:12', '2022-05-26 09:42:12'),
(4, 'Formation', 1, 1, 'A220526094658220526094658x', 150000, 6, 5, 2022, 21, 'Fonds pour financer la formation en QHSE', 1, '2022-05-26 09:46:58', '2022-05-26 09:46:58');

-- --------------------------------------------------------

--
-- Structure de la table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `inscriptions`
--

DROP TABLE IF EXISTS `inscriptions`;
CREATE TABLE IF NOT EXISTS `inscriptions` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `eleve_id` bigint(20) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `classe_id` bigint(20) NOT NULL,
  `montant_inscri` double NOT NULL DEFAULT '0',
  `montant_frais` double NOT NULL DEFAULT '0',
  `annee_id` int(11) NOT NULL DEFAULT '0',
  `salle_id` int(11) NOT NULL DEFAULT '0',
  `parent_id` int(11) NOT NULL DEFAULT '0',
  `programme_ecole_id` int(11) NOT NULL DEFAULT '0',
  `token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `moi_id` bigint(20) NOT NULL,
  `semaine_id` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `inscriptions`
--

INSERT INTO `inscriptions` (`id`, `eleve_id`, `user_id`, `classe_id`, `montant_inscri`, `montant_frais`, `annee_id`, `salle_id`, `parent_id`, `programme_ecole_id`, `token`, `moi_id`, `semaine_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, 10000, 0, 1, 0, 0, 0, NULL, 4, 5, '2022-04-08 10:33:16', '2022-04-08 10:33:16'),
(2, 2, 1, 2, 10000, 0, 1, 0, 0, 0, NULL, 4, 5, '2022-04-08 10:38:15', '2022-04-08 10:38:15'),
(3, 4, 6, 1, 10000, 0, 1, 2, 0, 0, 'Token2022051020220510080503', 5, 2, '2022-05-10 18:16:03', '2022-05-10 18:16:03'),
(4, 5, 6, 2, 10000, 0, 1, 1, 0, 0, 'Token2022051120220511120504', 5, 3, '2022-05-11 10:51:04', '2022-05-11 10:51:04'),
(5, 6, 6, 3, 10000, 0, 1, 3, 0, 0, 'Token2022051120220511120525', 5, 3, '2022-05-11 10:59:25', '2022-05-11 10:59:25'),
(6, 7, 7, 3, 10000, 0, 1, 4, 0, 0, 'Token2022051120220511010526', 5, 3, '2022-05-11 11:06:26', '2022-05-11 11:06:26'),
(7, 8, 7, 3, 10000, 0, 1, 5, 0, 0, 'Token2022051120220511010511', 5, 3, '2022-05-11 11:12:11', '2022-05-11 11:12:11'),
(8, 9, 7, 3, 10000, 0, 1, 5, 0, 0, 'Token2022051120220511010527', 5, 3, '2022-05-11 11:16:27', '2022-05-11 11:16:27'),
(9, 10, 7, 3, 10000, 0, 1, 4, 0, 0, 'Token2022051120220511010551', 5, 3, '2022-05-11 11:24:51', '2022-05-11 11:24:51'),
(10, 11, 6, 1, 10000, 0, 1, 2, 0, 0, 'Token2022051120220511010547', 5, 3, '2022-05-11 11:29:47', '2022-05-11 11:29:47'),
(11, 12, 6, 2, 25000, 10000, 1, 1, 0, 0, 'Token2022051220220512030504', 5, 4, '2022-05-12 14:07:04', '2022-05-12 14:07:04');

-- --------------------------------------------------------

--
-- Structure de la table `matieres`
--

DROP TABLE IF EXISTS `matieres`;
CREATE TABLE IF NOT EXISTS `matieres` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abv` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `matieres`
--

INSERT INTO `matieres` (`id`, `name`, `abv`, `created_at`, `updated_at`) VALUES
(1, 'Mathématiques', 'MATH', '2022-05-01 12:31:43', '2022-05-01 12:31:43'),
(2, 'Physique Chimie', 'P.C', '2022-05-01 12:32:04', '2022-05-01 12:32:04'),
(3, 'Philosophie', 'FIE', '2022-05-01 12:32:29', '2022-05-01 12:32:29'),
(4, 'Anglais', 'ANG', '2022-05-01 12:32:43', '2022-05-01 12:32:43'),
(5, 'Français', 'FRA', '2022-05-01 12:32:56', '2022-05-01 12:32:56'),
(6, 'Histoire Géographie', 'H.G', '2022-05-01 12:33:15', '2022-05-01 12:33:15'),
(7, 'Education Physique et Sportive', 'E.P.S', '2022-05-01 12:33:47', '2022-05-01 12:33:47'),
(8, 'Sciences de la vie et de la terre', 'S.V.T', '2022-05-01 12:34:10', '2022-05-01 12:34:10'),
(9, 'Automatisme', 'AUTO', '2022-05-01 16:35:15', '2022-05-01 16:35:15'),
(10, 'Informatique', 'INF', '2022-05-01 16:35:32', '2022-05-01 16:35:32'),
(11, 'Mathématiques Informatique', 'MATH INFO', '2022-05-01 16:35:58', '2022-05-01 16:35:58');

-- --------------------------------------------------------

--
-- Structure de la table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2021_04_05_123140_create_eleves_table', 1),
(5, '2021_04_05_123211_create_classes_table', 1),
(6, '2021_04_05_123404_create_inscriptions_table', 1),
(7, '2021_04_05_123421_create_roles_table', 1),
(8, '2021_04_05_123437_create_series_table', 1),
(9, '2021_04_05_123455_create_ecolages_table', 1),
(10, '2021_04_05_123543_create_mois_table', 1),
(11, '2021_04_16_135617_create_cours_table', 1),
(12, '2021_04_16_135651_create_matieres_table', 1),
(13, '2021_04_16_135826_create_tranche_horaires_table', 1),
(14, '2021_04_19_095649_create_annee_acads_table', 1),
(15, '2021_04_26_182741_create_emploie_temps_table', 1),
(16, '2021_04_28_091330_create_profs_table', 1),
(17, '2021_04_28_091350_create_diplomes_table', 1),
(18, '2022_05_01_141551_create_matieres_table', 2),
(19, '2022_05_01_142311_create_classes_table', 3),
(20, '2022_04_28_091330_create_profs_table', 4);

-- --------------------------------------------------------

--
-- Structure de la table `mois`
--

DROP TABLE IF EXISTS `mois`;
CREATE TABLE IF NOT EXISTS `mois` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `visible` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `mois`
--

INSERT INTO `mois` (`id`, `name`, `visible`, `created_at`, `updated_at`) VALUES
(1, 'Janvier', 1, '2022-04-08 10:29:31', '2022-04-08 10:29:31'),
(2, 'Février', 1, '2022-04-08 10:29:40', '2022-04-08 10:29:40'),
(3, 'Mars', 1, '2022-04-08 10:43:33', '2022-04-08 10:43:33'),
(4, 'Avril', 1, '2022-04-08 10:44:37', '2022-04-08 10:44:37'),
(5, 'Mai', 1, '2022-04-08 10:44:48', '2022-04-08 10:44:48'),
(6, 'Juin', 1, '2022-04-08 10:44:55', '2022-04-08 10:44:55'),
(7, 'Juillet', 1, '2022-04-08 10:45:01', '2022-04-08 10:45:01'),
(8, 'Aôut', 1, '2022-04-08 10:45:10', '2022-04-08 10:45:10'),
(9, 'Septembre', 1, '2022-04-08 10:45:19', '2022-04-08 10:45:19'),
(10, 'Octobre', 1, '2022-04-08 10:45:30', '2022-04-08 10:45:30'),
(11, 'Novembre', 1, '2022-04-08 10:45:42', '2022-04-08 10:45:42'),
(12, 'Décembre', 1, '2022-04-08 10:46:02', '2022-04-08 10:46:02');

-- --------------------------------------------------------

--
-- Structure de la table `niveaux`
--

DROP TABLE IF EXISTS `niveaux`;
CREATE TABLE IF NOT EXISTS `niveaux` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(10) NOT NULL,
  `abb` varchar(5) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `niveaux`
--

INSERT INTO `niveaux` (`id`, `name`, `abb`) VALUES
(1, 'SIXIEME', '6e'),
(2, 'CINQUIEME', '5e'),
(3, 'QUATRIEME', '4e'),
(4, 'TROISIEME', '3e'),
(5, 'SECONDE', '2nde'),
(6, 'PREMIERE', '1ere'),
(7, 'TERMINALE', 'Tle');

-- --------------------------------------------------------

--
-- Structure de la table `notes`
--

DROP TABLE IF EXISTS `notes`;
CREATE TABLE IF NOT EXISTS `notes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `inscription_id` int(11) NOT NULL DEFAULT '0',
  `valeur` double NOT NULL DEFAULT '0',
  `ligne_ecole_programme_id` int(11) NOT NULL DEFAULT '0',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `token` varchar(100) DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `created_by` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `parent_ecole`
--

DROP TABLE IF EXISTS `parent_ecole`;
CREATE TABLE IF NOT EXISTS `parent_ecole` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `parent_id` bigint(20) NOT NULL,
  `ecole_id` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `parent_ecole`
--

INSERT INTO `parent_ecole` (`id`, `parent_id`, `ecole_id`, `created_at`, `updated_at`) VALUES
(1, 22, 1, '2022-05-10 18:16:03', '2022-05-10 18:16:03'),
(3, 23, 2, '2022-05-11 11:06:26', '2022-05-11 11:16:27'),
(4, 23, 2, '2022-05-11 11:12:10', '2022-05-11 11:12:10'),
(5, 24, 1, '2022-05-12 14:07:04', '2022-05-12 14:07:04');

-- --------------------------------------------------------

--
-- Structure de la table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `profs`
--

DROP TABLE IF EXISTS `profs`;
CREATE TABLE IF NOT EXISTS `profs` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) NOT NULL DEFAULT '0',
  `nom` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `prenom` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_naiss` date DEFAULT NULL,
  `lieu_naiss` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `adresse` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `telephone` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `diplome_id` bigint(20) NOT NULL DEFAULT '0',
  `image` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `profs`
--

INSERT INTO `profs` (`id`, `user_id`, `nom`, `prenom`, `date_naiss`, `lieu_naiss`, `adresse`, `telephone`, `diplome_id`, `image`, `token`, `created_at`, `updated_at`) VALUES
(1, 32, 'KABA DIELLE', 'Louisell', NULL, NULL, 'Mawata', '064485524', 2, NULL, 'fdcvujyhjhnik', '2022-05-19 11:45:04', '2022-05-19 16:36:48'),
(2, 33, 'KABA GALOUO', 'Louis Alexon', NULL, NULL, 'Los Angeles', '064792878', 1, NULL, 'dhdhgdhgd', '2022-05-19 19:57:52', '2022-05-19 19:57:52'),
(3, 34, 'TATY', 'Lambert', NULL, NULL, 'Tié-Tié', '0606060606', 1, NULL, 'hugwyxhjyug', '2022-05-19 20:00:18', '2022-05-19 20:00:18'),
(4, 35, 'ESSOMBA', 'Clément', NULL, NULL, 'Raffinerie', '0101010101', 1, NULL, 'uytrtestyyjujh', '2022-05-19 20:01:27', '2022-05-19 20:01:27'),
(5, 36, 'KABA DIELLE', 'Louisell', NULL, NULL, 'Nkouikou', '06060606', 1, NULL, 'jdsxcyuuh', '2022-05-25 10:28:50', '2022-05-25 10:28:50'),
(6, 37, 'MBENZA', 'Guy', NULL, NULL, '2 Rue buenoaires', '04040404', 1, NULL, 'ûiytufkuukjyg', '2022-05-25 10:41:57', '2022-05-25 10:41:57'),
(7, 38, 'LOUSSOUKOU', 'Amour', '1992-05-01', 'Brazzaville', '125 Av de la révolution gd marché', '0404040404', 1, NULL, 'iuyfdcvh', '2022-05-25 10:46:21', '2022-05-25 10:46:21'),
(8, 39, 'BIDIMBOU', 'Kader', '1995-04-01', 'Dolisie', '2458 Av des princes plateaux, brazzaville', '069505050', 1, NULL, 'dhgshgsdfs', '2022-05-27 11:59:40', '2022-05-27 11:59:40'),
(9, 40, 'CALLEJON', 'José Maria', '1992-04-25', 'Buenosaires', '1120 12th street new york', '066606060', 1, NULL, 'A22052701292221x21222901270522', '2022-05-27 12:29:22', '2022-05-27 12:29:22');

-- --------------------------------------------------------

--
-- Structure de la table `prof_ecole`
--

DROP TABLE IF EXISTS `prof_ecole`;
CREATE TABLE IF NOT EXISTS `prof_ecole` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `prof_id` bigint(20) NOT NULL DEFAULT '0',
  `ecole_id` bigint(20) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `prof_ecole`
--

INSERT INTO `prof_ecole` (`id`, `prof_id`, `ecole_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '2022-05-19 11:45:04', '2022-05-19 11:45:04'),
(3, 1, 2, '2022-05-19 16:16:48', '2022-05-19 16:16:48'),
(4, 2, 2, '2022-05-19 19:57:52', '2022-05-19 19:57:52'),
(5, 3, 2, '2022-05-19 20:00:18', '2022-05-19 20:00:18'),
(6, 4, 2, '2022-05-19 20:01:27', '2022-05-19 20:01:27'),
(7, 2, 1, '2022-05-22 21:39:49', '2022-05-22 21:39:49'),
(8, 5, 1, '2022-05-25 10:28:50', '2022-05-25 10:28:50'),
(9, 6, 1, '2022-05-25 10:41:57', '2022-05-25 10:41:57'),
(10, 7, 1, '2022-05-25 10:46:21', '2022-05-25 10:46:21'),
(11, 8, 1, '2022-05-27 11:59:42', '2022-05-27 11:59:42'),
(12, 9, 1, '2022-05-27 12:29:24', '2022-05-27 12:29:24');

-- --------------------------------------------------------

--
-- Structure de la table `programmes_ecoles`
--

DROP TABLE IF EXISTS `programmes_ecoles`;
CREATE TABLE IF NOT EXISTS `programmes_ecoles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `annee_id` int(11) NOT NULL DEFAULT '0',
  `programme_national_id` int(11) NOT NULL DEFAULT '0',
  `salle_id` int(11) NOT NULL DEFAULT '0',
  `ecole_id` int(11) NOT NULL DEFAULT '0',
  `token` varchar(100) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `programmes_ecoles`
--

INSERT INTO `programmes_ecoles` (`id`, `annee_id`, `programme_national_id`, `salle_id`, `ecole_id`, `token`, `created_at`, `updated_at`, `active`) VALUES
(1, 1, 2, 1, 1, 'Token2022050920220509020551', '2022-05-09 14:11:51', '2022-05-09 14:11:51', 1),
(2, 1, 1, 2, 1, 'Token2022050920220509020511', '2022-05-09 14:16:11', '2022-05-09 14:16:11', 1),
(3, 1, 3, 3, 1, 'Token2022050920220509020517', '2022-05-09 14:53:17', '2022-05-09 14:53:17', 1),
(4, 1, 3, 4, 2, 'Token2022051120220511010501', '2022-05-11 13:04:01', '2022-05-11 13:04:01', 1),
(5, 1, 3, 5, 2, 'Token2022051120220511010534', '2022-05-11 13:04:34', '2022-05-11 13:04:34', 1);

-- --------------------------------------------------------

--
-- Structure de la table `programmes_ecoles_lignes`
--

DROP TABLE IF EXISTS `programmes_ecoles_lignes`;
CREATE TABLE IF NOT EXISTS `programmes_ecoles_lignes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `programme_ecole_id` int(11) NOT NULL DEFAULT '0',
  `programme_national_ligne_id` int(11) NOT NULL DEFAULT '0',
  `enseignant_id` int(11) NOT NULL DEFAULT '0',
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `token` varchar(100) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `matiere_id` int(11) NOT NULL DEFAULT '0' COMMENT 'Pour les ecoles qui ont créé des matieres propres a elles ',
  `coefficient` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `programmes_ecoles_lignes`
--

INSERT INTO `programmes_ecoles_lignes` (`id`, `programme_ecole_id`, `programme_national_ligne_id`, `enseignant_id`, `active`, `token`, `created_at`, `updated_at`, `matiere_id`, `coefficient`) VALUES
(1, 1, 2, 2, 1, 'Token2022050920220509020551', '2022-05-09 14:11:51', '2022-05-19 08:23:36', 2, 2),
(2, 1, 2, 2, 1, 'Token2022050920220509020551', '2022-05-09 14:11:51', '2022-05-09 15:24:29', 3, 3),
(3, 1, 2, 3, 1, 'Token2022050920220509020551', '2022-05-09 14:11:51', '2022-05-09 15:24:37', 1, 2),
(4, 1, 2, 5, 1, 'Token2022050920220509020551', '2022-05-09 14:11:51', '2022-05-09 15:24:54', 5, 3),
(5, 1, 2, 1, 1, 'Token2022050920220509020551', '2022-05-09 14:11:51', '2022-05-09 15:25:04', 7, 2),
(6, 1, 2, 1, 1, 'Token2022050920220509020551', '2022-05-09 14:11:51', '2022-05-09 15:34:06', 8, 2),
(7, 1, 2, 2, 1, 'Token2022050920220509020551', '2022-05-09 14:11:51', '2022-05-09 15:34:21', 6, 2),
(8, 1, 2, 3, 1, 'Token2022050920220509020552', '2022-05-09 14:11:52', '2022-05-09 15:34:31', 4, 3),
(9, 2, 1, 1, 1, 'Token2022050920220509020512', '2022-05-09 14:16:12', '2022-05-09 14:17:02', 2, 4),
(10, 2, 1, 0, 1, 'Token2022050920220509020512', '2022-05-09 14:16:12', '2022-05-09 14:16:12', 1, 2),
(11, 2, 1, 0, 1, 'Token2022050920220509020512', '2022-05-09 14:16:12', '2022-05-09 14:16:12', 3, 4),
(12, 3, 3, 3, 1, 'Token2022050920220509020517', '2022-05-09 14:53:17', '2022-05-09 14:53:38', 1, 2),
(13, 3, 3, 1, 1, 'Token2022050920220509020517', '2022-05-09 14:53:17', '2022-05-09 14:54:40', 2, 2),
(14, 3, 3, 2, 1, 'Token2022050920220509020517', '2022-05-09 14:53:17', '2022-05-09 15:19:27', 4, 2),
(15, 3, 3, 3, 1, 'Token2022050920220509020518', '2022-05-09 14:53:18', '2022-05-09 15:21:37', 5, 2),
(16, 3, 3, 2, 1, 'Token2022050920220509020518', '2022-05-09 14:53:18', '2022-05-09 15:25:51', 6, 2),
(17, 3, 3, 1, 1, 'Token2022050920220509020518', '2022-05-09 14:53:18', '2022-05-09 15:25:59', 7, 2),
(18, 3, 3, 0, 1, 'Token2022050920220509020518', '2022-05-09 14:53:18', '2022-05-09 14:53:18', 8, 2),
(19, 4, 3, 0, 1, 'Token2022051120220511010502', '2022-05-11 13:04:02', '2022-05-11 13:04:02', 1, 2),
(20, 4, 3, 0, 1, 'Token2022051120220511010502', '2022-05-11 13:04:02', '2022-05-11 13:04:02', 2, 2),
(21, 4, 3, 0, 1, 'Token2022051120220511010502', '2022-05-11 13:04:02', '2022-05-11 13:04:02', 4, 2),
(22, 4, 3, 0, 1, 'Token2022051120220511010502', '2022-05-11 13:04:02', '2022-05-11 13:04:02', 5, 2),
(23, 4, 3, 0, 1, 'Token2022051120220511010502', '2022-05-11 13:04:02', '2022-05-11 13:04:02', 6, 2),
(24, 4, 3, 0, 1, 'Token2022051120220511010502', '2022-05-11 13:04:02', '2022-05-11 13:04:02', 7, 2),
(25, 4, 3, 0, 1, 'Token2022051120220511010502', '2022-05-11 13:04:02', '2022-05-11 13:04:02', 8, 2),
(26, 5, 3, 0, 1, 'Token2022051120220511010534', '2022-05-11 13:04:34', '2022-05-11 13:04:34', 1, 2),
(27, 5, 3, 0, 1, 'Token2022051120220511010534', '2022-05-11 13:04:34', '2022-05-11 13:04:34', 2, 2),
(28, 5, 3, 0, 1, 'Token2022051120220511010534', '2022-05-11 13:04:34', '2022-05-11 13:04:34', 4, 2),
(29, 5, 3, 0, 1, 'Token2022051120220511010534', '2022-05-11 13:04:34', '2022-05-11 13:04:34', 5, 2),
(30, 5, 3, 0, 1, 'Token2022051120220511010534', '2022-05-11 13:04:34', '2022-05-11 13:04:34', 6, 2),
(31, 5, 3, 0, 1, 'Token2022051120220511010534', '2022-05-11 13:04:34', '2022-05-11 13:04:34', 7, 2),
(32, 5, 3, 0, 1, 'Token2022051120220511010534', '2022-05-11 13:04:34', '2022-05-11 13:04:34', 8, 2);

-- --------------------------------------------------------

--
-- Structure de la table `programmes_national`
--

DROP TABLE IF EXISTS `programmes_national`;
CREATE TABLE IF NOT EXISTS `programmes_national` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `classe_id` int(11) NOT NULL DEFAULT '0',
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `enseignement_id` int(11) NOT NULL DEFAULT '0',
  `annee_id` int(11) NOT NULL DEFAULT '0',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `programmes_national`
--

INSERT INTO `programmes_national` (`id`, `classe_id`, `active`, `enseignement_id`, `annee_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, 2022, '2022-04-28 21:56:09', '2022-04-28 21:56:09'),
(2, 2, 1, 1, 2022, '2022-05-01 13:39:54', '2022-05-01 13:39:54'),
(3, 3, 1, 1, 2022, '2022-05-01 14:19:27', '2022-05-01 14:19:27');

-- --------------------------------------------------------

--
-- Structure de la table `programmes_national_lignes`
--

DROP TABLE IF EXISTS `programmes_national_lignes`;
CREATE TABLE IF NOT EXISTS `programmes_national_lignes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `matiere_id` int(11) NOT NULL DEFAULT '0',
  `national_programme_id` int(11) NOT NULL DEFAULT '0',
  `coefficient` int(11) NOT NULL DEFAULT '0',
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `programmes_national_lignes`
--

INSERT INTO `programmes_national_lignes` (`id`, `matiere_id`, `national_programme_id`, `coefficient`, `active`, `created_at`, `updated_at`) VALUES
(1, 2, 1, 4, 1, '2022-04-28 21:56:10', '2022-04-28 21:56:10'),
(2, 1, 1, 2, 1, '2022-04-28 21:56:10', '2022-04-28 21:56:10'),
(3, 3, 1, 4, 1, '2022-04-28 21:56:10', '2022-04-28 21:56:10'),
(4, 2, 2, 2, 1, '2022-05-01 13:39:54', '2022-05-01 13:39:54'),
(5, 3, 2, 3, 1, '2022-05-01 13:39:54', '2022-05-01 13:39:54'),
(6, 1, 2, 2, 1, '2022-05-01 13:39:54', '2022-05-01 13:39:54'),
(7, 5, 2, 3, 1, '2022-05-01 13:39:54', '2022-05-01 13:39:54'),
(8, 7, 2, 2, 1, '2022-05-01 13:39:54', '2022-05-01 13:39:54'),
(9, 8, 2, 2, 1, '2022-05-01 13:39:54', '2022-05-01 13:39:54'),
(10, 6, 2, 2, 1, '2022-05-01 13:39:54', '2022-05-01 13:39:54'),
(11, 4, 2, 3, 1, '2022-05-01 13:39:54', '2022-05-01 13:39:54'),
(12, 1, 3, 2, 1, '2022-05-01 14:19:27', '2022-05-01 14:19:27'),
(13, 2, 3, 2, 1, '2022-05-01 14:19:27', '2022-05-01 14:19:27'),
(14, 4, 3, 2, 1, '2022-05-01 14:19:27', '2022-05-01 14:19:27'),
(15, 5, 3, 2, 1, '2022-05-01 14:19:27', '2022-05-01 14:19:27'),
(16, 6, 3, 2, 1, '2022-05-01 14:19:27', '2022-05-01 14:19:27'),
(17, 7, 3, 2, 1, '2022-05-01 14:19:27', '2022-05-01 14:19:27'),
(18, 8, 3, 2, 1, '2022-05-01 14:19:27', '2022-05-01 14:19:27');

-- --------------------------------------------------------

--
-- Structure de la table `roles`
--

DROP TABLE IF EXISTS `roles`;
CREATE TABLE IF NOT EXISTS `roles` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `roles`
--

INSERT INTO `roles` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'SUPER ADMIN', NULL, NULL),
(2, 'ADMIN ECOLE', NULL, NULL),
(3, 'PROMOTEUR ECOLE', NULL, NULL),
(4, 'COMPTABLE ECOLE', NULL, NULL),
(5, 'OPERATEUR ECOLE', NULL, NULL),
(6, 'ENSEIGNANT', NULL, NULL),
(7, 'PARENT', NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `salles`
--

DROP TABLE IF EXISTS `salles`;
CREATE TABLE IF NOT EXISTS `salles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  `abb` varchar(10) DEFAULT NULL,
  `ecole_id` int(11) NOT NULL DEFAULT '0',
  `site_id` int(11) NOT NULL DEFAULT '0',
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `token` varchar(100) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `image_uri` varchar(100) DEFAULT NULL,
  `nombre_places` int(11) NOT NULL DEFAULT '0',
  `classe_id` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `salles`
--

INSERT INTO `salles` (`id`, `name`, `abb`, `ecole_id`, `site_id`, `active`, `token`, `created_at`, `updated_at`, `image_uri`, `nombre_places`, `classe_id`) VALUES
(1, 'Salle 1', 'S1', 1, 0, 1, 'Token2022050920220509020551', '2022-05-09 14:11:51', '2022-05-09 14:11:51', NULL, 100, 2),
(2, 'Salle 2', 'S2', 1, 0, 1, 'Token2022050920220509020511', '2022-05-09 14:16:11', '2022-05-09 14:16:11', NULL, 100, 1),
(3, 'Salle 3', 'S3', 1, 0, 1, 'Token2022050920220509020517', '2022-05-09 14:53:17', '2022-05-09 14:53:17', NULL, 120, 3),
(4, 'Salle 1', 'S1', 2, 0, 1, 'Token2022051120220511010501', '2022-05-11 13:04:01', '2022-05-11 13:04:01', NULL, 130, 3),
(5, 'Salle 2', 'S2', 2, 0, 1, 'Token2022051120220511010534', '2022-05-11 13:04:34', '2022-05-11 13:04:34', NULL, 130, 3),
(6, 'Salle 4', 'S4', 1, 0, 1, 'Token2022052620220526100549', '2022-05-26 10:02:49', '2022-05-26 10:02:49', NULL, 25, 4);

-- --------------------------------------------------------

--
-- Structure de la table `series`
--

DROP TABLE IF EXISTS `series`;
CREATE TABLE IF NOT EXISTS `series` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abb` varchar(5) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `enseignement_id` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `series`
--

INSERT INTO `series` (`id`, `name`, `abb`, `enseignement_id`, `created_at`, `updated_at`) VALUES
(1, 'A', NULL, 1, '2022-04-08 10:24:52', '2022-04-08 10:24:52'),
(2, 'C', NULL, 1, '2022-04-08 10:24:58', '2022-04-08 10:24:58'),
(3, 'D', NULL, 1, '2022-04-08 10:25:04', '2022-04-08 10:25:04'),
(4, 'F3', NULL, 2, '2022-04-30 22:13:58', '2022-04-30 22:13:58'),
(5, 'E', NULL, 2, '2022-05-01 12:47:03', '2022-05-01 12:47:03'),
(6, 'GENERALISTE', NULL, 1, '2022-05-01 13:02:37', '2022-05-01 13:02:37'),
(7, 'TECHNICIENNE', NULL, 2, '2022-05-01 13:03:07', '2022-05-01 13:03:07');

-- --------------------------------------------------------

--
-- Structure de la table `sites`
--

DROP TABLE IF EXISTS `sites`;
CREATE TABLE IF NOT EXISTS `sites` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  `ecole_id` int(11) NOT NULL DEFAULT '0',
  `address` varchar(100) DEFAULT NULL,
  `phone` varchar(30) DEFAULT NULL,
  `token` varchar(100) NOT NULL,
  `enseignement_id` int(11) NOT NULL DEFAULT '0',
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `image_uri` varchar(100) DEFAULT NULL,
  `coordonees` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `tranche_horaires`
--

DROP TABLE IF EXISTS `tranche_horaires`;
CREATE TABLE IF NOT EXISTS `tranche_horaires` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `heure_debut` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `heure_fin` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ordre` bigint(20) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `tranche_horaires`
--

INSERT INTO `tranche_horaires` (`id`, `heure_debut`, `heure_fin`, `ordre`, `created_at`, `updated_at`) VALUES
(1, '7H-00', '9H-00', 0, '2022-04-08 10:57:50', '2022-04-08 10:57:50'),
(2, '9H-00', '11H-00', 0, '2022-04-08 10:59:02', '2022-04-08 10:59:02');

-- --------------------------------------------------------

--
-- Structure de la table `trimestres`
--

DROP TABLE IF EXISTS `trimestres`;
CREATE TABLE IF NOT EXISTS `trimestres` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `abb` varchar(6) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `trimestres`
--

INSERT INTO `trimestres` (`id`, `name`, `abb`) VALUES
(1, 'PREMIER TRIMESTRE', '1e T'),
(2, 'DEUXIEME TRIMESTRE', '2e T'),
(3, 'TROISIEME TRIMESTRE', '3e T');

-- --------------------------------------------------------

--
-- Structure de la table `types_enseignements`
--

DROP TABLE IF EXISTS `types_enseignements`;
CREATE TABLE IF NOT EXISTS `types_enseignements` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `types_enseignements`
--

INSERT INTO `types_enseignements` (`id`, `name`) VALUES
(1, 'GENERAL'),
(2, 'TECHNIQUE');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `role_id` bigint(20) NOT NULL DEFAULT '0',
  `ecole_id` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `name`, `phone`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `role_id`, `ecole_id`) VALUES
(1, 'Blandin-Ux', NULL, 'nsondecaleb@gmail.com', NULL, '$2y$10$Ye0/.z.YuHPjlbLJqzy0m.7lHL/XXsHz/MS2HmHHAKpxdzpdLzS.O', NULL, '2022-04-08 10:15:58', '2022-04-08 10:15:58', 1, 0),
(6, 'KABA ISRA', NULL, 'isra@mail.com', NULL, '$2y$10$7BA8nbQS15nWlqLzi735LO2QAP0.grkixeLZSvww9Oa/JAXwMk9ue', NULL, '2022-05-02 13:25:42', '2022-05-02 13:25:42', 2, 1),
(7, 'ELIKIA', NULL, 'elikia@mail.com', NULL, '$2y$10$3e9yYKT1rtHxDdHqUCwW.un48lY6ocxg7CJ9tO14thOzIc.Xnv9oO', NULL, '2022-05-02 13:36:53', '2022-05-02 13:36:53', 2, 2),
(32, 'KABA DIELLE Louisell', '064485524', 'kdielle@mail.com', NULL, '$2y$10$KJcdgHVKOF6.kGZA4VG/He1QF05aKGMs1rVLu.Up4nzVUAyveW3Ce', NULL, '2022-05-19 11:45:03', '2022-05-19 11:45:03', 6, 0),
(33, 'KABA GALOUO Louis Alexon', '064792878', 'lagkaba@gmail.com', NULL, '$2y$10$Q/sw5l8Rq0cHkYBmmna9COwqxUfKiVdUh3..Tg8bTl9AC3IwTlgqS', NULL, '2022-05-19 19:57:52', '2022-05-19 19:57:52', 6, 0),
(34, 'TATY Lambert', '0606060606', 'taty@gmail.com', NULL, '$2y$10$wJzZs6c75xjhjUjda3ACE.QwaTf0geqNUDx7xJ5FjT52PzogilYPi', NULL, '2022-05-19 20:00:18', '2022-05-19 20:00:18', 6, 0),
(35, 'ESSOMBA Clément', '0101010101', 'clement@mail.com', NULL, '$2y$10$jR/40PcMreqRPrG2LYs7devmDfOt.DDkhtTseOi5GRbAA4FQU6Bne', NULL, '2022-05-19 20:01:27', '2022-05-19 20:01:27', 6, 0),
(36, 'KABA DIELLE Louisell', '06060606', 'kdielle2@mail.com', NULL, '$2y$10$lR2A6w.Brm.N3lS2Bu4FgeCoWgSBf04ugkb5G.YLVl.7MBTwSHIDa', NULL, '2022-05-25 10:28:49', '2022-05-25 10:28:49', 6, 0),
(37, 'MBENZA Guy', '04040404', 'guymbanza@mail.com', NULL, '$2y$10$AxRDhwyp/Oqu8tvocZ1yletLwYwCdb7/ZlgVaO/cx7v5ue6ECar2S', NULL, '2022-05-25 10:41:57', '2022-05-25 10:41:57', 6, 0),
(38, 'LOUSSOUKOU Amour', '0404040404', 'lamour@mail.com', NULL, '$2y$10$hTBAylQ2r5bjCKt5TdngXuCKX5hghdTwdiuGKdVaG4SruBqfuokRy', NULL, '2022-05-25 10:46:21', '2022-05-25 10:46:21', 6, 0),
(39, 'BIDIMBOU Kader', '069505050', 'kaderb@mail.com', NULL, '$2y$10$HLCMyGoX0Df.qEKVIYJmUOi53w0CDKOaGbURcdX5TvSxgREvUC6lC', NULL, '2022-05-27 11:59:35', '2022-05-27 11:59:35', 6, 0),
(40, 'CALLEJON José Maria', '066606060', 'josemaria@mail.com', NULL, '$2y$10$zdfX7gBSWCHiyJf0BCQZwu14oBHZmYw/fb.ywQOejHFUTFOySKTF.', NULL, '2022-05-27 12:29:21', '2022-05-27 12:29:21', 6, 0);

-- --------------------------------------------------------

--
-- Structure de la table `__classes`
--

DROP TABLE IF EXISTS `__classes`;
CREATE TABLE IF NOT EXISTS `__classes` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `serie_id` bigint(20) NOT NULL,
  `examen` tinyint(1) NOT NULL DEFAULT '0',
  `montant_inscri` double NOT NULL,
  `montant_frais` double NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `__classes`
--

INSERT INTO `__classes` (`id`, `name`, `code`, `serie_id`, `examen`, `montant_inscri`, `montant_frais`, `created_at`, `updated_at`) VALUES
(1, 'Seconde', 'SCD#A', 1, 0, 10000, 0, '2022-04-08 10:27:38', '2022-04-08 10:27:38'),
(2, 'Seconde', 'SCD#C', 2, 0, 10000, 0, '2022-04-08 10:28:58', '2022-04-08 10:28:58');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
