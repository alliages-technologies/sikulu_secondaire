-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : ven. 27 mai 2022 à 14:41
-- Version du serveur :  10.4.13-MariaDB
-- Version de PHP : 7.4.8

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

CREATE TABLE `annee_acads` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `annee1` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `annee2` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dtrentree` date NOT NULL,
  `actif` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `annee_acads`
--

INSERT INTO `annee_acads` (`id`, `annee1`, `annee2`, `dtrentree`, `actif`, `created_at`, `updated_at`) VALUES
(1, '2022', '2023', '2022-10-04', 1, '2022-04-08 10:24:37', '2022-04-08 10:24:37');

-- --------------------------------------------------------

--
-- Structure de la table `classes`
--

CREATE TABLE `classes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `serie_id` bigint(20) NOT NULL,
  `niveau_id` bigint(20) NOT NULL,
  `enseignement_id` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `classes`
--

INSERT INTO `classes` (`id`, `serie_id`, `niveau_id`, `enseignement_id`, `created_at`, `updated_at`) VALUES
(1, 4, 5, 2, '2022-05-01 12:30:12', '2022-05-01 12:30:12'),
(2, 1, 5, 1, '2022-05-01 12:30:26', '2022-05-01 12:30:26'),
(3, 6, 1, 1, '2022-05-01 13:04:07', '2022-05-01 13:04:07'),
(4, 7, 1, 2, '2022-05-01 13:04:27', '2022-05-01 13:04:27'),
(5, 1, 6, 1, '2022-05-11 18:23:46', '2022-05-11 18:23:46');

-- --------------------------------------------------------

--
-- Structure de la table `cours`
--

CREATE TABLE `cours` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `classe_id` bigint(20) NOT NULL,
  `matiere_id` bigint(20) NOT NULL,
  `coefficient` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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

CREATE TABLE `diplomes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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

CREATE TABLE `ecolages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `inscription_id` bigint(20) NOT NULL,
  `moi_id` bigint(20) NOT NULL,
  `montant` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `ecoles`
--

CREATE TABLE `ecoles` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `phone` varchar(30) DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT 1,
  `token` varchar(100) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `image_uri` varchar(100) DEFAULT NULL,
  `is_private` tinyint(1) DEFAULT 1,
  `pay_id` int(11) NOT NULL DEFAULT 1,
  `enseignement_id` int(11) NOT NULL DEFAULT 1,
  `coordonnees` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `ecoles`
--

INSERT INTO `ecoles` (`id`, `name`, `address`, `email`, `phone`, `active`, `token`, `created_at`, `updated_at`, `image_uri`, `is_private`, `pay_id`, `enseignement_id`, `coordonnees`) VALUES
(1, 'Louis Alexon KABA III', 'Nkouikou', 'kaba@mail.com', '052053989', 1, 'T7f053vWjBGeaCFVHIiwZ7hwGzl8zx6qNGzgm4wKAZEZA', '2022-05-02 14:25:41', '2022-05-02 14:25:41', 'images-ecoles/T7f053vWjBGeaCFVHIiwZ7hwGzl8zx6qNGzgm4wK.jpg', 1, 1, 2, 'Coordonnées'),
(2, 'Lycée KABA', 'Siafoumou', 'lyceekaba@gmail.com', '065036045', 1, '1ZDS053vWjBGeaCFVHIiwZ7hwGzl8zx6qNGzgm4wK', '2022-05-02 14:36:53', '2022-05-02 14:36:53', 'images-ecoles/CHgwY8NNirFWRNndxxHZQozsGw2oGFKCRWOi3Dcz.png', 1, 1, 1, 'Coordonnées'),
(3, 'Lycée Victor Augagneur (L.V.A)', 'Base Industrielle', 'lva@gmail.com', '066778866', 1, 'TokeNecOlE2022051820220518100553', '2022-05-18 10:55:54', '2022-05-18 10:55:54', 'images-ecoles/anGdiTP82Lwv9FLT7KcvTjvEfppeAuUMjgwJ3HwS.jpg', 1, 1, 1, 'LVA120');

-- --------------------------------------------------------

--
-- Structure de la table `eleves`
--

CREATE TABLE `eleves` (
  `id` bigint(20) UNSIGNED NOT NULL,
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
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `eleves`
--

INSERT INTO `eleves` (`id`, `nom`, `prenom`, `date_naiss`, `lieu_naiss`, `adresse`, `nom_pere`, `tel_pere`, `nom_mere`, `tel_mere`, `nom_tuteur`, `tel_tuteur`, `image_uri`, `created_at`, `updated_at`) VALUES
(1, 'Bounlanger', 'François', '2001-02-12', 'Pointe-Noire', 'Mawata', 'Bounlanger Bertrant', '066543214', 'Martinez Pauline', '066879344', 'Bounlanger Bertrant', '066543214', 'images/membres/08042022123316.jpg', '2022-04-08 10:33:16', '2022-04-08 10:33:16'),
(2, 'Mavoungou', 'Otran', '2000-02-01', 'Pointe-Noire', 'Tié-Tié', 'Mavoungou Jean', '044567328', 'Malalou Téthé', '055678431', 'Mavoungou Jean', '044567328', 'images/membres/08042022123815.png', '2022-04-08 10:38:15', '2022-04-08 10:38:15'),
(4, 'Malanda', 'Evans Marvel', '1989-04-30', 'Pointe-Noire', 'Mbota', 'Malanda Patrick', '066237876', 'Ilimbou Sacrée', '066543212', 'Malanda Patrick', '066237876', 'images/membres/10052022081603.jpg', '2022-05-10 18:16:03', '2022-05-10 18:16:03'),
(5, 'Malanda', 'Daniel', '1999-03-19', 'Pointe-Noire', 'Mbota', 'Malanda Patrick', '066789876', 'Kibinda Anne', '066874321', 'Malanda Patrick', '066237876', 'images/membres/11052022125104.png', '2022-05-11 10:51:04', '2022-05-11 10:51:04'),
(6, 'Malanda', 'Marcelle', '2004-02-02', 'Pointe-Noire', 'Mbota', 'Malanda Patrick', '066237876', 'Kibinda Anne', '066765411', 'Malanda Patrick', '066237876', 'images/membres/11052022125925.jpg', '2022-05-11 10:59:25', '2022-05-11 10:59:25'),
(7, 'Malanda', 'Sylao', '2003-02-03', 'Pointe-Noire', 'Mbota', 'Malanda Patrick', '066237876', 'Kibinda Anne', '055567654', 'Malanda Patrick', '066237876', 'images/membres/11052022010626.jpg', '2022-05-11 11:06:26', '2022-05-11 11:06:26'),
(8, 'Dibouiloui', 'Narcis François', '2006-03-12', 'Brazzaville', 'Siafoumou', 'Dibouiloui Landry', '066458897', 'Makosso Valette', '044567876', 'Dibouiloui Landry', '066458897', 'images/membres/11052022011210.png', '2022-05-11 11:12:10', '2022-05-11 11:12:10'),
(9, 'Dibouiloui', 'Jule André', '2007-05-20', 'Pointe-Noire', 'Mawata', 'Dibouiloui Landry', '066458897', 'Makosso Valette', '0765678765', 'Dibouiloui Landry', '066458897', 'images/membres/11052022011627.jpg', '2022-05-11 11:16:27', '2022-05-11 11:16:27'),
(10, 'Dibouiloui', 'Marco', '2008-04-29', 'Pointe-Noire', 'Mawata', 'Dibouiloui Landry', '066458897', 'Makosso Valette', '0765678765', 'Dibouiloui Landry', '066458897', 'images/membres/11052022012451.jpg', '2022-05-11 11:24:51', '2022-05-11 11:24:51'),
(11, 'Malanda', 'Tony', '2008-12-12', 'Brazzaville', 'Mbota', 'Malanda Patrick', '066237876', 'Kibinda Ane', '044445654', 'Malanda Patrick', '066237876', 'images/membres/11052022012947.png', '2022-05-11 11:29:47', '2022-05-11 11:29:47'),
(12, 'Dibouiloui', 'Veinard', '2009-03-01', 'Pointe Noire', 'Mawata', 'Dibouiloui Landry', '066458897', 'Makosso Valette', '066787766', 'Dibouiloui Landry', '066458897', 'images/membres/11052022013923.png', '2022-05-11 11:39:23', '2022-05-11 11:39:23');

-- --------------------------------------------------------

--
-- Structure de la table `emploie_temps`
--

CREATE TABLE `emploie_temps` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `salle_id` int(20) NOT NULL DEFAULT 0,
  `token` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `emploie_temps`
--

INSERT INTO `emploie_temps` (`id`, `name`, `salle_id`, `token`, `created_at`, `updated_at`) VALUES
(1, 'EMP-TEMP20220516150549424942', 1, 'Token2022051020220510080503oiuydtjrr', '2022-05-16 13:49:42', '2022-05-16 13:49:42');

-- --------------------------------------------------------

--
-- Structure de la table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `inscriptions`
--

CREATE TABLE `inscriptions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `eleve_id` bigint(20) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `classe_id` bigint(20) NOT NULL,
  `montant_inscri` double NOT NULL DEFAULT 0,
  `montant_frais` double NOT NULL DEFAULT 0,
  `annee_id` int(11) NOT NULL DEFAULT 0,
  `salle_id` int(11) NOT NULL DEFAULT 0,
  `parent_id` int(11) NOT NULL DEFAULT 0,
  `programme_ecole_id` int(11) NOT NULL DEFAULT 0,
  `token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `moi_id` bigint(20) NOT NULL,
  `semaine_id` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(11, 12, 6, 2, 10000, 0, 1, 1, 0, 0, 'Token2022051120220511010523', 5, 3, '2022-05-11 11:39:23', '2022-05-11 11:39:23'),
(12, 5, 6, 5, 10000, 0, 1, 6, 4, 0, 'Token2022051320220513080557', 5, 5, '2022-05-13 06:34:57', '2022-05-13 06:34:57');

-- --------------------------------------------------------

--
-- Structure de la table `ligne_emploi_temps`
--

CREATE TABLE `ligne_emploi_temps` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ligne_programme_ecole_id` int(11) NOT NULL DEFAULT 0,
  `tranche_id` int(11) NOT NULL DEFAULT 0,
  `emploi_id` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `ligne_emploi_temps`
--

INSERT INTO `ligne_emploi_temps` (`id`, `ligne_programme_ecole_id`, `tranche_id`, `emploi_id`, `created_at`, `updated_at`) VALUES
(1, 1, 3, 1, '2022-05-16 13:49:42', '2022-05-16 13:49:42'),
(2, 1, 4, 1, '2022-05-16 13:49:42', '2022-05-16 13:49:42'),
(3, 4, 5, 1, '2022-05-16 13:49:42', '2022-05-16 13:49:42'),
(4, 4, 6, 1, '2022-05-16 13:49:42', '2022-05-16 13:49:42'),
(5, 2, 7, 1, '2022-05-16 13:49:42', '2022-05-16 13:49:42');

-- --------------------------------------------------------

--
-- Structure de la table `ligne_releve_notes`
--

CREATE TABLE `ligne_releve_notes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `releve_id` int(11) NOT NULL DEFAULT 0,
  `programme_ligne_ecole_id` int(11) NOT NULL DEFAULT 0,
  `note_id` int(11) NOT NULL DEFAULT 0,
  `valeur` double(8,2) NOT NULL DEFAULT 0.00,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `matieres`
--

CREATE TABLE `matieres` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abv` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ecole_id` int(11) NOT NULL DEFAULT 0,
  `active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `matieres`
--

INSERT INTO `matieres` (`id`, `name`, `abv`, `ecole_id`, `active`, `created_at`, `updated_at`) VALUES
(1, 'Mathématiques', 'MATH', 0, 1, '2022-05-01 12:31:43', '2022-05-23 09:40:32'),
(2, 'Physique Chimie', 'P.C', 0, 1, '2022-05-01 12:32:04', '2022-05-23 09:09:34'),
(3, 'Philosophie', 'FIE', 0, 1, '2022-05-01 12:32:29', '2022-05-01 12:32:29'),
(4, 'Anglais', 'ANG', 0, 1, '2022-05-01 12:32:43', '2022-05-01 12:32:43'),
(5, 'Français', 'FRA', 0, 1, '2022-05-01 12:32:56', '2022-05-01 12:32:56'),
(6, 'Histoire Géographie', 'H.G', 0, 1, '2022-05-01 12:33:15', '2022-05-01 12:33:15'),
(7, 'Education Physique et Sportive', 'E.P.S', 0, 1, '2022-05-01 12:33:47', '2022-05-01 12:33:47'),
(8, 'Sciences de la vie et de la terre', 'S.V.T', 0, 1, '2022-05-01 12:34:10', '2022-05-01 12:34:10'),
(9, 'Automatisme', 'AUTO', 0, 1, '2022-05-01 16:35:15', '2022-05-01 16:35:15'),
(10, 'Informatique', 'INF', 0, 1, '2022-05-01 16:35:32', '2022-05-01 16:35:32'),
(11, 'Mathématiques Informatique', 'MATH INFO', 0, 1, '2022-05-01 16:35:58', '2022-05-01 16:35:58'),
(12, 'Chinois', 'CHI', 0, 1, '2022-05-23 09:19:10', '2022-05-23 09:19:10'),
(13, 'Espagnole', 'ESP', 1, 1, '2022-05-23 09:22:28', '2022-05-23 09:22:28'),
(14, 'Italien', 'ITA', 1, 1, '2022-05-23 09:28:18', '2022-05-23 09:28:18');

-- --------------------------------------------------------

--
-- Structure de la table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(20, '2022_04_28_091330_create_profs_table', 4),
(21, '2022_05_10_134931_create_parent_ecoles_table', 5),
(22, '2022_05_16_100809_create_ligne_emploi_temps_table', 5),
(23, '2022_05_18_092216_create_trimestre_ecoles_table', 6),
(24, '2022_05_20_113622_create_releve_notes_table', 7),
(25, '2022_05_20_114108_create_ligne_releve_notes_table', 7);

-- --------------------------------------------------------

--
-- Structure de la table `mois`
--

CREATE TABLE `mois` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `visible` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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

CREATE TABLE `niveaux` (
  `id` int(11) NOT NULL,
  `name` varchar(10) NOT NULL,
  `abb` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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

CREATE TABLE `notes` (
  `id` int(11) NOT NULL,
  `inscription_id` int(11) NOT NULL DEFAULT 0,
  `valeur` double NOT NULL DEFAULT 0,
  `ligne_ecole_programme_id` int(11) NOT NULL DEFAULT 0,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `token` varchar(100) DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT 1,
  `created_by` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `parent_ecole`
--

CREATE TABLE `parent_ecole` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `parent_id` bigint(20) NOT NULL,
  `ecole_id` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `parent_ecole`
--

INSERT INTO `parent_ecole` (`id`, `parent_id`, `ecole_id`, `created_at`, `updated_at`) VALUES
(1, 22, 1, '2022-05-10 18:16:03', '2022-05-11 11:39:23'),
(3, 23, 2, '2022-05-11 11:06:26', '2022-05-11 11:16:27');

-- --------------------------------------------------------

--
-- Structure de la table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `profs`
--

CREATE TABLE `profs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) NOT NULL DEFAULT 0,
  `nom` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `prenom` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `adresse` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `telephone` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `diplome_id` bigint(20) NOT NULL DEFAULT 0,
  `token` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `profs`
--

INSERT INTO `profs` (`id`, `user_id`, `nom`, `prenom`, `adresse`, `telephone`, `diplome_id`, `token`, `created_at`, `updated_at`) VALUES
(1, 14, 'Makosso', 'Camile', 'Mawata', '066335665', 3, NULL, '2022-05-09 12:51:13', '2022-05-09 12:51:13'),
(2, 16, 'Tietiouvha', 'Gédeon', 'Mbota', '069874521', 2, NULL, '2022-05-09 12:53:55', '2022-05-09 12:53:55'),
(3, 18, 'Tatu', 'Joêl', 'Matadi', '068752213', 1, NULL, '2022-05-09 12:57:16', '2022-05-09 12:57:16'),
(4, 19, 'Taty', 'Lamberd', 'Tié-Tié', '066332145', 1, NULL, '2022-05-09 12:59:34', '2022-05-09 12:59:34'),
(5, 20, 'Massala', 'Landry', 'Rex', '068887963', 2, NULL, '2022-05-09 13:02:20', '2022-05-09 13:02:20');

-- --------------------------------------------------------

--
-- Structure de la table `prof_ecole`
--

CREATE TABLE `prof_ecole` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `prof_id` bigint(20) NOT NULL DEFAULT 0,
  `ecole_id` bigint(20) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `prof_ecole`
--

INSERT INTO `prof_ecole` (`id`, `prof_id`, `ecole_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '2022-05-09 12:51:13', '2022-05-09 12:51:13'),
(2, 2, 1, '2022-05-09 12:53:55', '2022-05-09 12:53:55'),
(3, 3, 1, '2022-05-09 12:57:16', '2022-05-09 12:57:16'),
(4, 4, 2, '2022-05-09 12:59:34', '2022-05-09 13:26:14'),
(5, 5, 1, '2022-05-09 13:02:20', '2022-05-09 13:02:20');

-- --------------------------------------------------------

--
-- Structure de la table `programmes_ecoles`
--

CREATE TABLE `programmes_ecoles` (
  `id` int(11) NOT NULL,
  `annee_id` int(11) NOT NULL DEFAULT 0,
  `programme_national_id` int(11) NOT NULL DEFAULT 0,
  `salle_id` int(11) NOT NULL DEFAULT 0,
  `ecole_id` int(11) NOT NULL DEFAULT 0,
  `token` varchar(100) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `programmes_ecoles`
--

INSERT INTO `programmes_ecoles` (`id`, `annee_id`, `programme_national_id`, `salle_id`, `ecole_id`, `token`, `created_at`, `updated_at`, `active`) VALUES
(1, 1, 2, 1, 1, 'Token2022050920220509020551', '2022-05-09 14:11:51', '2022-05-09 14:11:51', 1),
(2, 1, 1, 2, 1, 'Token2022050920220509020511', '2022-05-09 14:16:11', '2022-05-09 14:16:11', 1),
(3, 1, 3, 3, 1, 'Token2022050920220509020517', '2022-05-09 14:53:17', '2022-05-09 14:53:17', 1),
(4, 1, 3, 4, 2, 'Token2022051120220511010501', '2022-05-11 13:04:01', '2022-05-11 13:04:01', 1),
(5, 1, 3, 5, 2, 'Token2022051120220511010534', '2022-05-11 13:04:34', '2022-05-11 13:04:34', 1),
(6, 1, 4, 6, 1, 'Token2022051120220511080540', '2022-05-11 20:28:40', '2022-05-11 20:28:40', 1),
(7, 1, 4, 7, 1, 'Token2022051920220519070527', '2022-05-19 19:55:27', '2022-05-19 19:55:27', 1);

-- --------------------------------------------------------

--
-- Structure de la table `programmes_ecoles_lignes`
--

CREATE TABLE `programmes_ecoles_lignes` (
  `id` int(11) NOT NULL,
  `programme_ecole_id` int(11) NOT NULL DEFAULT 0,
  `programme_national_ligne_id` int(11) NOT NULL DEFAULT 0,
  `enseignant_id` int(11) NOT NULL DEFAULT 0,
  `active` tinyint(1) NOT NULL DEFAULT 1,
  `token` varchar(100) DEFAULT NULL,
  `annee_id` int(11) NOT NULL DEFAULT 0,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `matiere_id` int(11) NOT NULL DEFAULT 0 COMMENT 'Pour les ecoles qui ont créé des matieres propres a elles ',
  `coefficient` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `programmes_ecoles_lignes`
--

INSERT INTO `programmes_ecoles_lignes` (`id`, `programme_ecole_id`, `programme_national_ligne_id`, `enseignant_id`, `active`, `token`, `annee_id`, `created_at`, `updated_at`, `matiere_id`, `coefficient`) VALUES
(1, 1, 2, 5, 1, 'Token2022050920220509020551', 1, '2022-05-09 14:11:51', '2022-05-16 09:16:58', 2, 2),
(2, 1, 2, 2, 1, 'Token2022050920220509020551', 1, '2022-05-09 14:11:51', '2022-05-09 15:24:29', 3, 3),
(3, 1, 2, 3, 1, 'Token2022050920220509020551', 1, '2022-05-09 14:11:51', '2022-05-09 15:24:37', 1, 2),
(4, 1, 2, 5, 1, 'Token2022050920220509020551', 1, '2022-05-09 14:11:51', '2022-05-09 15:24:54', 5, 3),
(5, 1, 2, 1, 1, 'Token2022050920220509020551', 1, '2022-05-09 14:11:51', '2022-05-09 15:25:04', 7, 2),
(6, 1, 2, 5, 1, 'Token2022050920220509020551', 1, '2022-05-09 14:11:51', '2022-05-16 09:16:59', 8, 2),
(7, 1, 2, 2, 1, 'Token2022050920220509020551', 1, '2022-05-09 14:11:51', '2022-05-09 15:34:21', 6, 2),
(8, 1, 2, 3, 1, 'Token2022050920220509020552', 1, '2022-05-09 14:11:52', '2022-05-09 15:34:31', 4, 3),
(9, 2, 1, 1, 1, 'Token2022050920220509020512', 1, '2022-05-09 14:16:12', '2022-05-09 14:17:02', 2, 4),
(10, 2, 1, 0, 1, 'Token2022050920220509020512', 1, '2022-05-09 14:16:12', '2022-05-09 14:16:12', 1, 2),
(11, 2, 1, 0, 1, 'Token2022050920220509020512', 1, '2022-05-09 14:16:12', '2022-05-09 14:16:12', 3, 4),
(12, 3, 3, 3, 1, 'Token2022050920220509020517', 1, '2022-05-09 14:53:17', '2022-05-09 14:53:38', 1, 2),
(13, 3, 3, 1, 1, 'Token2022050920220509020517', 1, '2022-05-09 14:53:17', '2022-05-09 14:54:40', 2, 2),
(14, 3, 3, 2, 1, 'Token2022050920220509020517', 1, '2022-05-09 14:53:17', '2022-05-09 15:19:27', 4, 2),
(15, 3, 3, 3, 1, 'Token2022050920220509020518', 1, '2022-05-09 14:53:18', '2022-05-09 15:21:37', 5, 2),
(16, 3, 3, 2, 1, 'Token2022050920220509020518', 1, '2022-05-09 14:53:18', '2022-05-09 15:25:51', 6, 2),
(17, 3, 3, 1, 1, 'Token2022050920220509020518', 1, '2022-05-09 14:53:18', '2022-05-09 15:25:59', 7, 2),
(18, 3, 3, 0, 1, 'Token2022050920220509020518', 1, '2022-05-09 14:53:18', '2022-05-09 14:53:18', 8, 2),
(19, 4, 3, 0, 1, 'Token2022051120220511010502', 1, '2022-05-11 13:04:02', '2022-05-11 13:04:02', 1, 2),
(20, 4, 3, 0, 1, 'Token2022051120220511010502', 1, '2022-05-11 13:04:02', '2022-05-11 13:04:02', 2, 2),
(21, 4, 3, 0, 1, 'Token2022051120220511010502', 1, '2022-05-11 13:04:02', '2022-05-11 13:04:02', 4, 2),
(22, 4, 3, 0, 1, 'Token2022051120220511010502', 1, '2022-05-11 13:04:02', '2022-05-11 13:04:02', 5, 2),
(23, 4, 3, 0, 1, 'Token2022051120220511010502', 1, '2022-05-11 13:04:02', '2022-05-11 13:04:02', 6, 2),
(24, 4, 3, 0, 1, 'Token2022051120220511010502', 1, '2022-05-11 13:04:02', '2022-05-11 13:04:02', 7, 2),
(25, 4, 3, 0, 1, 'Token2022051120220511010502', 1, '2022-05-11 13:04:02', '2022-05-11 13:04:02', 8, 2),
(26, 5, 3, 0, 1, 'Token2022051120220511010534', 1, '2022-05-11 13:04:34', '2022-05-11 13:04:34', 1, 2),
(27, 5, 3, 0, 1, 'Token2022051120220511010534', 1, '2022-05-11 13:04:34', '2022-05-11 13:04:34', 2, 2),
(28, 5, 3, 0, 1, 'Token2022051120220511010534', 1, '2022-05-11 13:04:34', '2022-05-11 13:04:34', 4, 2),
(29, 5, 3, 0, 1, 'Token2022051120220511010534', 1, '2022-05-11 13:04:34', '2022-05-11 13:04:34', 5, 2),
(30, 5, 3, 0, 1, 'Token2022051120220511010534', 1, '2022-05-11 13:04:34', '2022-05-11 13:04:34', 6, 2),
(31, 5, 3, 0, 1, 'Token2022051120220511010534', 1, '2022-05-11 13:04:34', '2022-05-11 13:04:34', 7, 2),
(32, 5, 3, 0, 1, 'Token2022051120220511010534', 1, '2022-05-11 13:04:34', '2022-05-11 13:04:34', 8, 2),
(33, 6, 4, 0, 1, 'Token2022051120220511080540', 1, '2022-05-11 20:28:40', '2022-05-11 20:28:40', 1, 2),
(34, 6, 4, 0, 1, 'Token2022051120220511080540', 1, '2022-05-11 20:28:40', '2022-05-11 20:28:40', 3, 4),
(35, 6, 4, 0, 1, 'Token2022051120220511080540', 1, '2022-05-11 20:28:40', '2022-05-11 20:28:40', 4, 4),
(36, 6, 4, 0, 1, 'Token2022051120220511080540', 1, '2022-05-11 20:28:40', '2022-05-11 20:28:40', 5, 4),
(37, 6, 4, 0, 1, 'Token2022051120220511080540', 1, '2022-05-11 20:28:40', '2022-05-11 20:28:40', 6, 4),
(38, 6, 4, 0, 1, 'Token2022051120220511080540', 1, '2022-05-11 20:28:40', '2022-05-11 20:28:40', 7, 2),
(39, 7, 4, 0, 1, 'Token2022051920220519070528', 1, '2022-05-19 19:55:28', '2022-05-19 19:55:28', 1, 2),
(40, 7, 4, 0, 1, 'Token2022051920220519070528', 1, '2022-05-19 19:55:28', '2022-05-19 19:55:28', 3, 4),
(41, 7, 4, 0, 1, 'Token2022051920220519070528', 1, '2022-05-19 19:55:28', '2022-05-19 19:55:28', 4, 4),
(42, 7, 4, 0, 1, 'Token2022051920220519070528', 1, '2022-05-19 19:55:28', '2022-05-19 19:55:28', 5, 4),
(43, 7, 4, 0, 1, 'Token2022051920220519070528', 1, '2022-05-19 19:55:28', '2022-05-19 19:55:28', 6, 4),
(44, 7, 4, 0, 1, 'Token2022051920220519070528', 1, '2022-05-19 19:55:28', '2022-05-19 19:55:28', 7, 2);

-- --------------------------------------------------------

--
-- Structure de la table `programmes_national`
--

CREATE TABLE `programmes_national` (
  `id` int(11) NOT NULL,
  `classe_id` int(11) NOT NULL DEFAULT 0,
  `active` tinyint(1) NOT NULL DEFAULT 1,
  `enseignement_id` int(11) NOT NULL DEFAULT 0,
  `annee_id` int(11) NOT NULL DEFAULT 0,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `programmes_national`
--

INSERT INTO `programmes_national` (`id`, `classe_id`, `active`, `enseignement_id`, `annee_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, 2022, '2022-04-28 21:56:09', '2022-04-28 21:56:09'),
(2, 2, 1, 1, 2022, '2022-05-01 13:39:54', '2022-05-01 13:39:54'),
(3, 3, 1, 1, 2022, '2022-05-01 14:19:27', '2022-05-01 14:19:27'),
(4, 5, 1, 1, 2022, '2022-05-11 20:25:55', '2022-05-11 20:25:55');

-- --------------------------------------------------------

--
-- Structure de la table `programmes_national_lignes`
--

CREATE TABLE `programmes_national_lignes` (
  `id` int(11) NOT NULL,
  `matiere_id` int(11) NOT NULL DEFAULT 0,
  `national_programme_id` int(11) NOT NULL DEFAULT 0,
  `coefficient` int(11) NOT NULL DEFAULT 0,
  `active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
(18, 8, 3, 2, 1, '2022-05-01 14:19:27', '2022-05-01 14:19:27'),
(19, 1, 4, 2, 1, '2022-05-11 20:25:57', '2022-05-11 20:25:57'),
(20, 3, 4, 4, 1, '2022-05-11 20:25:57', '2022-05-11 20:25:57'),
(21, 4, 4, 4, 1, '2022-05-11 20:25:57', '2022-05-11 20:25:57'),
(22, 5, 4, 4, 1, '2022-05-11 20:25:57', '2022-05-11 20:25:57'),
(23, 6, 4, 4, 1, '2022-05-11 20:25:57', '2022-05-11 20:25:57'),
(24, 7, 4, 2, 1, '2022-05-11 20:25:57', '2022-05-11 20:25:57');

-- --------------------------------------------------------

--
-- Structure de la table `releve_notes`
--

CREATE TABLE `releve_notes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `inscription_id` int(11) NOT NULL DEFAULT 0,
  `trimestre_id` int(11) NOT NULL DEFAULT 0,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `moi_id` int(11) NOT NULL DEFAULT 0,
  `semaine_id` int(11) NOT NULL DEFAULT 0,
  `annee_id` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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

CREATE TABLE `salles` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `abb` varchar(10) DEFAULT NULL,
  `ecole_id` int(11) NOT NULL DEFAULT 0,
  `site_id` int(11) NOT NULL DEFAULT 0,
  `active` tinyint(1) NOT NULL DEFAULT 1,
  `token` varchar(100) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `image_uri` varchar(100) DEFAULT NULL,
  `nombre_places` int(11) NOT NULL DEFAULT 0,
  `classe_id` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `salles`
--

INSERT INTO `salles` (`id`, `name`, `abb`, `ecole_id`, `site_id`, `active`, `token`, `created_at`, `updated_at`, `image_uri`, `nombre_places`, `classe_id`) VALUES
(1, 'Salle 1', 'S1', 1, 0, 1, 'Token2022050920220509020551', '2022-05-09 14:11:51', '2022-05-09 14:11:51', NULL, 100, 2),
(2, 'Salle 2', 'S2', 1, 0, 1, 'Token2022050920220509020511', '2022-05-09 14:16:11', '2022-05-09 14:16:11', NULL, 100, 1),
(3, 'Salle 3', 'S3', 1, 0, 1, 'Token2022050920220509020517', '2022-05-09 14:53:17', '2022-05-09 14:53:17', NULL, 120, 3),
(4, 'Salle 1', 'S1', 2, 0, 1, 'Token2022051120220511010501', '2022-05-11 13:04:01', '2022-05-11 13:04:01', NULL, 130, 3),
(5, 'Salle 2', 'S2', 2, 0, 1, 'Token2022051120220511010534', '2022-05-11 13:04:34', '2022-05-11 13:04:34', NULL, 130, 3),
(6, 'Salle 4', 'S4', 1, 0, 1, 'Token2022051120220511080540', '2022-05-11 20:28:40', '2022-05-11 20:28:40', NULL, 90, 5),
(7, 'Salle 5', 'S5', 1, 0, 1, 'Token2022051920220519070527', '2022-05-19 19:55:27', '2022-05-19 19:55:27', NULL, 120, 5);

-- --------------------------------------------------------

--
-- Structure de la table `series`
--

CREATE TABLE `series` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abb` varchar(5) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `enseignement_id` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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

CREATE TABLE `sites` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `ecole_id` int(11) NOT NULL DEFAULT 0,
  `address` varchar(100) DEFAULT NULL,
  `phone` varchar(30) DEFAULT NULL,
  `token` varchar(100) NOT NULL,
  `enseignement_id` int(11) NOT NULL DEFAULT 0,
  `active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `image_uri` varchar(100) DEFAULT NULL,
  `coordonees` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `tranche_horaires`
--

CREATE TABLE `tranche_horaires` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `heure_debut` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `heure_fin` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ordre` bigint(20) NOT NULL DEFAULT 0,
  `ecole_id` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `tranche_horaires`
--

INSERT INTO `tranche_horaires` (`id`, `heure_debut`, `heure_fin`, `ordre`, `ecole_id`, `created_at`, `updated_at`) VALUES
(1, '7H-00', '9H-00', 0, 0, '2022-04-08 10:57:50', '2022-04-08 10:57:50'),
(2, '9H-00', '11H-00', 0, 0, '2022-04-08 10:59:02', '2022-04-08 10:59:02'),
(3, '7H30', '8H30', 0, 1, '2022-05-16 08:19:43', '2022-05-16 08:19:43'),
(4, '8H30', '9H30', 0, 1, '2022-05-16 08:20:05', '2022-05-16 08:20:05'),
(5, '9H30', '10H30', 0, 1, '2022-05-16 08:20:28', '2022-05-16 08:20:28'),
(6, '10H30', '11H30', 0, 1, '2022-05-16 08:20:44', '2022-05-16 08:20:44'),
(7, '11H30', '12H30', 0, 1, '2022-05-16 08:21:24', '2022-05-16 08:21:24');

-- --------------------------------------------------------

--
-- Structure de la table `trimestres`
--

CREATE TABLE `trimestres` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `abb` varchar(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `trimestres`
--

INSERT INTO `trimestres` (`id`, `name`, `abb`) VALUES
(1, 'PREMIER TRIMESTRE', '1e T'),
(2, 'DEUXIEME TRIMESTRE', '2e T'),
(3, 'TROISIEME TRIMESTRE', '3e T');

-- --------------------------------------------------------

--
-- Structure de la table `trimestre_ecoles`
--

CREATE TABLE `trimestre_ecoles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `trimestre_id` int(11) NOT NULL DEFAULT 0,
  `ecole_id` int(11) NOT NULL DEFAULT 0,
  `active` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `trimestre_ecoles`
--

INSERT INTO `trimestre_ecoles` (`id`, `trimestre_id`, `ecole_id`, `active`, `created_at`, `updated_at`) VALUES
(1, 1, 3, 0, '2022-05-18 08:55:55', '2022-05-18 08:55:55'),
(2, 2, 3, 0, '2022-05-18 08:55:55', '2022-05-18 08:55:55'),
(3, 3, 3, 0, '2022-05-18 08:55:55', '2022-05-18 08:55:55'),
(4, 1, 1, 0, '2022-05-18 08:55:55', '2022-05-23 08:20:12'),
(5, 2, 1, 0, '2022-05-18 08:55:55', '2022-05-18 12:48:56'),
(6, 3, 1, 0, '2022-05-18 08:55:55', '2022-05-18 12:58:47');

-- --------------------------------------------------------

--
-- Structure de la table `types_enseignements`
--

CREATE TABLE `types_enseignements` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `role_id` bigint(20) NOT NULL DEFAULT 0,
  `ecole_id` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `name`, `phone`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `role_id`, `ecole_id`) VALUES
(1, 'Blandin-Ux', NULL, 'nsondecaleb@gmail.com', NULL, '$2y$10$Ye0/.z.YuHPjlbLJqzy0m.7lHL/XXsHz/MS2HmHHAKpxdzpdLzS.O', NULL, '2022-04-08 10:15:58', '2022-04-08 10:15:58', 1, 0),
(6, 'KABA ISRA', NULL, 'isra@mail.com', NULL, '$2y$10$7BA8nbQS15nWlqLzi735LO2QAP0.grkixeLZSvww9Oa/JAXwMk9ue', NULL, '2022-05-02 13:25:42', '2022-05-02 13:25:42', 2, 1),
(7, 'ELIKIA', NULL, 'elikia@mail.com', NULL, '$2y$10$3e9yYKT1rtHxDdHqUCwW.un48lY6ocxg7CJ9tO14thOzIc.Xnv9oO', NULL, '2022-05-02 13:36:53', '2022-05-02 13:36:53', 2, 2),
(14, 'Makosso Camile', '066335665', 'makosso@gmail.com', NULL, '$2y$10$nz80qggLRryb6wmSj3Gcve6DyTWpaAK0bSyRgF9sDb8xt.FoT5oCm', NULL, '2022-05-09 12:51:13', '2022-05-09 12:51:13', 6, 1),
(16, 'Tietiouvha Gédeon', '069874521', 'gede@gmail.com', NULL, '$2y$10$W.t0vhs0UnjfYU50o/a5l.TYwuQ4zt2E2nzTri2kaeo8W0ANm6AGi', NULL, '2022-05-09 12:53:55', '2022-05-09 12:53:55', 6, 1),
(18, 'Tatu Joêl', '068752213', 'tatu@gmail.com', NULL, '$2y$10$CvdKCl3kk564..UAOiwRY.x2prMhM2wIi5491SfAqiUKiljVTzHz2', NULL, '2022-05-09 12:57:15', '2022-05-09 12:57:15', 6, 1),
(19, 'Taty Lamberd', '066332145', 'taty@gmail.com', NULL, '$2y$10$BGxrJSlvpa4NlcpFNLVQ3O3Sd3tqPfsmLU6ODIfsX0iRQdg1gs7Ga', NULL, '2022-05-09 12:59:34', '2022-05-09 12:59:34', 6, 1),
(20, 'Massala Landry', '068887963', 'test@gmail.com', NULL, '$2y$10$K0P2lM0u7Il0SxducFNPyeugm3nNu6TlkivZewPnb4bJR5J7blaqu', NULL, '2022-05-09 13:02:20', '2022-05-09 13:02:20', 6, 1),
(22, 'Malanda Patrick', '066237876', 'malanda@gmail.com', NULL, '$2y$10$ldPJ12pdrIpPvhzLIwtdFeqgF1Wme0NJmcE.V/wdqtIgE/tR9SCMW', NULL, '2022-05-10 18:16:03', '2022-05-10 18:16:03', 7, 1),
(23, 'Dibouiloui Landry', '066458897', 'dibland@gmail.com', NULL, '$2y$10$rnP5KnqgvUe4C1LAjk6YreoGr/5/s7I0Tt71ZDGJKJdaiw10gPmAO', NULL, '2022-05-11 11:12:10', '2022-05-11 11:12:10', 7, 2),
(24, 'Duc Mabanza', NULL, 'duc@gmail.com', NULL, '$2y$10$Xiz4yekNtFldpQXeaRGzu.4fTP83NQOV2FvwFtXQqsKjUv52oc6Vu', NULL, '2022-05-18 08:55:55', '2022-05-18 08:55:55', 2, 3),
(25, 'Maboko Justice', '064332212', 'just@gmail.com', NULL, '$2y$10$PjtBtIUsP8b0pXlZIVdpK.rg5vN/wi7iVvDB6rB4V2Pktcg00c9E6', NULL, '2022-05-27 09:52:13', '2022-05-27 09:52:13', 6, 0),
(30, 'Maboko Bienvenue', '066342212', 'bienvenue@gmail.com', NULL, '$2y$10$hQWxOQGcojOsCTkAGgD.f.aA0tMnc9XJvH6NnUPeHTvb70aW9N/5C', NULL, '2022-05-27 09:56:55', '2022-05-27 09:56:55', 6, 0);

-- --------------------------------------------------------

--
-- Structure de la table `__classes`
--

CREATE TABLE `__classes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `serie_id` bigint(20) NOT NULL,
  `examen` tinyint(1) NOT NULL DEFAULT 0,
  `montant_inscri` double NOT NULL,
  `montant_frais` double NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `__classes`
--

INSERT INTO `__classes` (`id`, `name`, `code`, `serie_id`, `examen`, `montant_inscri`, `montant_frais`, `created_at`, `updated_at`) VALUES
(1, 'Seconde', 'SCD#A', 1, 0, 10000, 0, '2022-04-08 10:27:38', '2022-04-08 10:27:38'),
(2, 'Seconde', 'SCD#C', 2, 0, 10000, 0, '2022-04-08 10:28:58', '2022-04-08 10:28:58');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `annee_acads`
--
ALTER TABLE `annee_acads`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `classes`
--
ALTER TABLE `classes`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `cours`
--
ALTER TABLE `cours`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `diplomes`
--
ALTER TABLE `diplomes`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `ecolages`
--
ALTER TABLE `ecolages`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `ecoles`
--
ALTER TABLE `ecoles`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `eleves`
--
ALTER TABLE `eleves`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `emploie_temps`
--
ALTER TABLE `emploie_temps`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `inscriptions`
--
ALTER TABLE `inscriptions`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `ligne_emploi_temps`
--
ALTER TABLE `ligne_emploi_temps`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `ligne_releve_notes`
--
ALTER TABLE `ligne_releve_notes`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `matieres`
--
ALTER TABLE `matieres`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `mois`
--
ALTER TABLE `mois`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `niveaux`
--
ALTER TABLE `niveaux`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `notes`
--
ALTER TABLE `notes`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `parent_ecole`
--
ALTER TABLE `parent_ecole`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Index pour la table `profs`
--
ALTER TABLE `profs`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `prof_ecole`
--
ALTER TABLE `prof_ecole`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `programmes_ecoles`
--
ALTER TABLE `programmes_ecoles`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `programmes_ecoles_lignes`
--
ALTER TABLE `programmes_ecoles_lignes`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `programmes_national`
--
ALTER TABLE `programmes_national`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `programmes_national_lignes`
--
ALTER TABLE `programmes_national_lignes`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `releve_notes`
--
ALTER TABLE `releve_notes`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `salles`
--
ALTER TABLE `salles`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `series`
--
ALTER TABLE `series`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `sites`
--
ALTER TABLE `sites`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `tranche_horaires`
--
ALTER TABLE `tranche_horaires`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `trimestres`
--
ALTER TABLE `trimestres`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `trimestre_ecoles`
--
ALTER TABLE `trimestre_ecoles`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `types_enseignements`
--
ALTER TABLE `types_enseignements`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Index pour la table `__classes`
--
ALTER TABLE `__classes`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `annee_acads`
--
ALTER TABLE `annee_acads`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `classes`
--
ALTER TABLE `classes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `cours`
--
ALTER TABLE `cours`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `diplomes`
--
ALTER TABLE `diplomes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `ecolages`
--
ALTER TABLE `ecolages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `ecoles`
--
ALTER TABLE `ecoles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `eleves`
--
ALTER TABLE `eleves`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT pour la table `emploie_temps`
--
ALTER TABLE `emploie_temps`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `inscriptions`
--
ALTER TABLE `inscriptions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT pour la table `ligne_emploi_temps`
--
ALTER TABLE `ligne_emploi_temps`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `ligne_releve_notes`
--
ALTER TABLE `ligne_releve_notes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `matieres`
--
ALTER TABLE `matieres`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT pour la table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT pour la table `mois`
--
ALTER TABLE `mois`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT pour la table `niveaux`
--
ALTER TABLE `niveaux`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `notes`
--
ALTER TABLE `notes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `parent_ecole`
--
ALTER TABLE `parent_ecole`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `profs`
--
ALTER TABLE `profs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `prof_ecole`
--
ALTER TABLE `prof_ecole`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `programmes_ecoles`
--
ALTER TABLE `programmes_ecoles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `programmes_ecoles_lignes`
--
ALTER TABLE `programmes_ecoles_lignes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT pour la table `programmes_national`
--
ALTER TABLE `programmes_national`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `programmes_national_lignes`
--
ALTER TABLE `programmes_national_lignes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT pour la table `releve_notes`
--
ALTER TABLE `releve_notes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `salles`
--
ALTER TABLE `salles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `series`
--
ALTER TABLE `series`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `sites`
--
ALTER TABLE `sites`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `tranche_horaires`
--
ALTER TABLE `tranche_horaires`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `trimestres`
--
ALTER TABLE `trimestres`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `trimestre_ecoles`
--
ALTER TABLE `trimestre_ecoles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `types_enseignements`
--
ALTER TABLE `types_enseignements`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT pour la table `__classes`
--
ALTER TABLE `__classes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
