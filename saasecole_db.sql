-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : lun. 02 mai 2022 à 13:44
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
-- Base de données : `saasecole_db`
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(2, 'Louis', 'Nkouikou', 'lagkaba@gmail.com', '052053989', 1, NULL, '2022-05-02 13:43:08', '2022-05-02 13:43:08', 'images-ecoles/oNBej4EnTi8ytPzHGfpTwmIZppNeylvvXNZGpCSB.png', 1, 1, 2, 'Coordonnées');

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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `eleves`
--

INSERT INTO `eleves` (`id`, `nom`, `prenom`, `date_naiss`, `lieu_naiss`, `adresse`, `nom_pere`, `tel_pere`, `nom_mere`, `tel_mere`, `nom_tuteur`, `tel_tuteur`, `image_uri`, `created_at`, `updated_at`) VALUES
(1, 'Bounlanger', 'François', '2001-02-12', 'Pointe-Noire', 'Mawata', 'Bounlanger Bertrant', '066543214', 'Martinez Pauline', '066879344', 'Bounlanger Bertrant', '066543214', 'images/membres/08042022123316.jpg', '2022-04-08 10:33:16', '2022-04-08 10:33:16'),
(2, 'Mavoungou', 'Otran', '2000-02-01', 'Pointe-Noire', 'Tié-Tié', 'Mavoungou Jean', '044567328', 'Malalou Téthé', '055678431', 'Mavoungou Jean', '044567328', 'images/membres/08042022123815.png', '2022-04-08 10:38:15', '2022-04-08 10:38:15');

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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `inscriptions`
--

INSERT INTO `inscriptions` (`id`, `eleve_id`, `user_id`, `classe_id`, `montant_inscri`, `montant_frais`, `annee_id`, `salle_id`, `parent_id`, `programme_ecole_id`, `token`, `moi_id`, `semaine_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, 10000, 0, 1, 0, 0, 0, NULL, 4, 5, '2022-04-08 10:33:16', '2022-04-08 10:33:16'),
(2, 2, 1, 2, 10000, 0, 1, 0, 0, 0, NULL, 4, 5, '2022-04-08 10:38:15', '2022-04-08 10:38:15');

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
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(19, '2022_05_01_142311_create_classes_table', 3);

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
  `nom` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prenom` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `adresse` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telephone` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `diplome_id` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `profs`
--

INSERT INTO `profs` (`id`, `nom`, `prenom`, `adresse`, `telephone`, `diplome_id`, `created_at`, `updated_at`) VALUES
(1, 'Kaya Madiata', 'Godefroid', 'Mongokamba', '066544567', 1, '2022-04-08 11:02:47', '2022-04-08 11:02:47');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `role_id`, `ecole_id`) VALUES
(1, 'Blandin-Ux', 'nsondecaleb@gmail.com', NULL, '$2y$10$Ye0/.z.YuHPjlbLJqzy0m.7lHL/XXsHz/MS2HmHHAKpxdzpdLzS.O', NULL, '2022-04-08 10:15:58', '2022-04-08 10:15:58', 1, 0),
(5, 'Louis', 'lagkaba@gmail.com', NULL, '$2y$10$kl66dJguWYhpf6RqClloLO5W1oj2726OjaLV0dLAuSLN5VN4Ehyxa', NULL, '2022-05-02 12:43:08', '2022-05-02 12:43:08', 2, 2);

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
