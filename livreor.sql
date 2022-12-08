-- phpMyAdmin SQL Dump
-- version 5.0.4deb2+deb11u1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le : jeu. 08 déc. 2022 à 12:09
-- Version du serveur :  10.5.15-MariaDB-0+deb11u1
-- Version de PHP : 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `livreor`
--

-- --------------------------------------------------------

--
-- Structure de la table `commentaires`
--

CREATE TABLE `commentaires` (
  `id` int(11) NOT NULL,
  `commentaire` varchar(255) NOT NULL,
  `id_utilisateur` int(11) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `commentaires`
--

INSERT INTO `commentaires` (`id`, `commentaire`, `id_utilisateur`, `date`) VALUES
(13, '<p>Posté le 7 December 2022 par Minatsu</p><br><p>Un super souvenir qui restera gravé à jamais. Une super équipe</p>', 21, '2022-12-07 00:00:00'),
(14, '<p>Posté le 8 December 2022 par Minatsura</p><br><p>Moment incroyable, que de bons souvenir! A refaire!</p>', 21, '2022-12-08 00:00:00'),
(15, '<p>Posté le 8 December 2022 par NewGuy</p><br><p>Ce livre est une super idée! Un moyen de garder les bons souvenirs !</p>', 14, '2022-12-08 00:00:00'),
(18, '<p>Posté le 8 December 2022 par SpirouPetit</p><br><p>Moi aussi j\'ai envie de participer au livre d\'or !</p>', 17, '2022-12-08 00:00:00'),
(20, '<p>Posté le 8 December 2022 par SpirouPetit</p><br><p>Un nouveau test pour voir, s\'il est en haut !</p>', 17, '2022-12-08 00:00:00');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

CREATE TABLE `utilisateurs` (
  `id` int(11) NOT NULL,
  `login` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`id`, `login`, `password`) VALUES
(13, 'Mira', '$2y$10$scyB8oYSJI7d2y1tdi8p/ujKkTcv0ZL6vHpKe/3ujoIIVnNkQ7/NG'),
(14, 'NewGuy', '$2y$10$COt7aPf9aVcY/n5rBTZZJuT0bZ8JkgQCNWd.ClTyfPxkbn8YZ7sxO'),
(15, 'Timothé', '$2y$10$YcCwbBTLs00eqQFxvLtxkuobUj1855QCV/7qScIWsWXCU.SjHkJHe'),
(16, 'Tulipe', '$2y$10$bL/XVWOmf29Ouq0GhYa./OI6FrO1ZxIOk.30jxowUGDkNgTjw5h1a'),
(17, 'SpirouPetit', '$2y$10$oId/jmqidpy7BMyTrtabj.V7oZBoMXqbPv3NY2iZd2BHyrkzpIJA2'),
(18, 'Xavier2', '$2y$10$cVB/B3803xRE82QqdaQEu.ko6jsASq6.WdFt3dEKhmEIHl.Rngpte'),
(19, 'CharlieBravo', '$2y$10$GihEwL7v..0.KknKhKI3hOwTV0kr0cbmynTnaG8sbW7z5jFhfaBwC'),
(20, 'Minatu', '$2y$10$nSnQJvLisBU7X1mCnVt4seJDoc1/H.c8RfLjCSZ9SHK9kRWzv0iRa'),
(21, 'Minatsura', '$2y$10$6EZuCLGzXDyAmjLqiPk83uNLlPGXUUUeM33oFkBaar5qa.EX8fH6y');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `commentaires`
--
ALTER TABLE `commentaires`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `commentaires`
--
ALTER TABLE `commentaires`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
