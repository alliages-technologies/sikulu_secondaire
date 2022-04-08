-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : ven. 08 avr. 2022 à 15:03
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
-- Base de données : `saasecole_db`
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
-- Déchargement des données de la table `classes`
--

INSERT INTO `classes` (`id`, `name`, `code`, `serie_id`, `examen`, `montant_inscri`, `montant_frais`, `created_at`, `updated_at`) VALUES
(1, 'Seconde', 'SCD#A', 1, 0, 10000, 0, '2022-04-08 10:27:38', '2022-04-08 10:27:38'),
(2, 'Seconde', 'SCD#C', 2, 0, 10000, 0, '2022-04-08 10:28:58', '2022-04-08 10:28:58');

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
(2, 'Mavoungou', 'Otran', '2000-02-01', 'Pointe-Noire', 'Tié-Tié', 'Mavoungou Jean', '044567328', 'Malalou Téthé', '055678431', 'Mavoungou Jean', '044567328', 'images/membres/08042022123815.png', '2022-04-08 10:38:15', '2022-04-08 10:38:15');

-- --------------------------------------------------------

--
-- Structure de la table `emploie_temps`
--

CREATE TABLE `emploie_temps` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `cour_id` bigint(20) NOT NULL,
  `tranche_id` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
  `anneeacad_id` bigint(20) NOT NULL,
  `moi_id` bigint(20) NOT NULL,
  `semaine_id` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `inscriptions`
--

INSERT INTO `inscriptions` (`id`, `eleve_id`, `user_id`, `classe_id`, `montant_inscri`, `montant_frais`, `anneeacad_id`, `moi_id`, `semaine_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, 10000, 0, 1, 4, 5, '2022-04-08 10:33:16', '2022-04-08 10:33:16'),
(2, 2, 1, 2, 10000, 0, 1, 4, 5, '2022-04-08 10:38:15', '2022-04-08 10:38:15');

-- --------------------------------------------------------

--
-- Structure de la table `matieres`
--

CREATE TABLE `matieres` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abv` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `matieres`
--

INSERT INTO `matieres` (`id`, `name`, `abv`, `created_at`, `updated_at`) VALUES
(1, 'Mathématiques', 'Math', '2022-04-08 10:46:46', '2022-04-08 10:46:46'),
(2, 'Français', 'Fr', '2022-04-08 10:47:12', '2022-04-08 10:47:12'),
(3, 'Histoire-Géographie', 'H-G', '2022-04-08 10:47:44', '2022-04-08 10:47:44'),
(4, 'Sience de la Vie et de Terre', 'S.V.T', '2022-04-08 10:48:32', '2022-04-08 10:48:32'),
(5, 'Physique-Chimie', 'P-C', '2022-04-08 10:49:04', '2022-04-08 10:49:04');

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
(17, '2021_04_28_091350_create_diplomes_table', 1);

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
  `nom` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prenom` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `adresse` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telephone` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `diplome_id` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `profs`
--

INSERT INTO `profs` (`id`, `nom`, `prenom`, `adresse`, `telephone`, `diplome_id`, `created_at`, `updated_at`) VALUES
(1, 'Kaya Madiata', 'Godefroid', 'Mongokamba', '066544567', 1, '2022-04-08 11:02:47', '2022-04-08 11:02:47');

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
(1, 'Admin', NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `series`
--

CREATE TABLE `series` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `series`
--

INSERT INTO `series` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'A', '2022-04-08 10:24:52', '2022-04-08 10:24:52'),
(2, 'C', '2022-04-08 10:24:58', '2022-04-08 10:24:58'),
(3, 'D', '2022-04-08 10:25:04', '2022-04-08 10:25:04');

-- --------------------------------------------------------

--
-- Structure de la table `tranche_horaires`
--

CREATE TABLE `tranche_horaires` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `heure_debut` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `heure_fin` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ordre` bigint(20) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `tranche_horaires`
--

INSERT INTO `tranche_horaires` (`id`, `heure_debut`, `heure_fin`, `ordre`, `created_at`, `updated_at`) VALUES
(1, '7H-00', '9H-00', 0, '2022-04-08 10:57:50', '2022-04-08 10:57:50'),
(2, '9H-00', '11H-00', 0, '2022-04-08 10:59:02', '2022-04-08 10:59:02');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `role_id` bigint(20) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `role_id`) VALUES
(1, 'Blandin-Ux', 'nsondecaleb@gmail.com', NULL, '$2y$10$Ye0/.z.YuHPjlbLJqzy0m.7lHL/XXsHz/MS2HmHHAKpxdzpdLzS.O', NULL, '2022-04-08 10:15:58', '2022-04-08 10:15:58', 1);

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
-- Index pour la table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `series`
--
ALTER TABLE `series`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `tranche_horaires`
--
ALTER TABLE `tranche_horaires`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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
-- AUTO_INCREMENT pour la table `eleves`
--
ALTER TABLE `eleves`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `emploie_temps`
--
ALTER TABLE `emploie_temps`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `inscriptions`
--
ALTER TABLE `inscriptions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `matieres`
--
ALTER TABLE `matieres`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT pour la table `mois`
--
ALTER TABLE `mois`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT pour la table `profs`
--
ALTER TABLE `profs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `series`
--
ALTER TABLE `series`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `tranche_horaires`
--
ALTER TABLE `tranche_horaires`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
