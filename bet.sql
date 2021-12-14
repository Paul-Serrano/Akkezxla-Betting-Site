-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : sam. 11 déc. 2021 à 19:10
-- Version du serveur : 10.4.22-MariaDB
-- Version de PHP : 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `bet`
--

-- --------------------------------------------------------

--
-- Structure de la table `bet`
--

CREATE TABLE `bet` (
  `id` int(11) NOT NULL,
  `gameday` varchar(25) NOT NULL,
  `surname` varchar(50) NOT NULL,
  `match1` varchar(5) NOT NULL,
  `match2` varchar(5) NOT NULL,
  `match3` varchar(5) NOT NULL,
  `match4` varchar(5) NOT NULL,
  `match5` varchar(5) NOT NULL,
  `match6` varchar(5) NOT NULL,
  `match7` varchar(5) NOT NULL,
  `match8` varchar(5) NOT NULL,
  `match9` varchar(5) NOT NULL,
  `match10` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `bet`
--

INSERT INTO `bet` (`id`, `gameday`, `surname`, `match1`, `match2`, `match3`, `match4`, `match5`, `match6`, `match7`, `match8`, `match9`, `match10`) VALUES
(8, '18', 'Paul', '1', 'N', '2', 'N', '2', '2', 'N', '2', 'N', '1'),
(9, '18', 'Dorian', '1', 'N', '2', 'N', '2', 'N', 'N', '2', 'N', '1'),
(10, '19', 'Paul', 'N', 'N', '2', '2', '2', '2', '2', '2', '2', '2'),
(11, '19', 'Dorian', '1', 'N', 'N', 'N', 'N', '1', '1', '1', '1', '1'),
(12, '19', 'Gauthier', 'N', '2', 'N', '2', 'N', 'N', 'N', 'N', 'N', 'N'),
(13, '20', 'Gauthier', '2', '2', 'N', '2', 'N', '1', 'N', '2', 'N', '1'),
(14, '20', 'Hugo', '1', 'N', '2', 'N', '1', '2', 'N', '2', 'N', '1'),
(15, '21', 'Paul', '1', 'N', '2', 'N', '2', '2', 'N', '2', 'N', '1');

-- --------------------------------------------------------

--
-- Structure de la table `score`
--

CREATE TABLE `score` (
  `id` int(11) NOT NULL,
  `gameday` int(5) NOT NULL,
  `surname` varchar(50) NOT NULL,
  `points` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `score`
--

INSERT INTO `score` (`id`, `gameday`, `surname`, `points`) VALUES
(276, 18, 'Paul', 4),
(277, 18, 'Dorian', 5);

-- --------------------------------------------------------

--
-- Structure de la table `totalscore`
--

CREATE TABLE `totalscore` (
  `id` int(11) NOT NULL,
  `surname` varchar(25) NOT NULL,
  `totalScore` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(25) NOT NULL,
  `mail` varchar(50) NOT NULL,
  `name` varchar(25) NOT NULL,
  `surname` varchar(25) NOT NULL,
  `team` varchar(25) NOT NULL,
  `password` varchar(512) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `username`, `mail`, `name`, `surname`, `team`, `password`) VALUES
(24, 'Paulux', 'paul.serrano08374@gmail.com', 'Serrano', 'Paul', 'Liverpool FC', '$2y$10$GzxzbG2JiVXZrd.1HlVOqOPZBbGNTl9M4H1V9Q92QdH.osW4Uca86'),
(26, 'Dodu', 'dodo', 'Lorteigt', 'Dorian', 'Olympique de Marseille', '$2y$10$hmEmMGLN98f7gtF9LQObE.bFbXQaIHmkWrQaglLSWwRIyPK6Z/S2O'),
(27, 'Gouverneur', 'gogo', 'Julien', 'Gauthier', 'Paris SG', '$2y$10$jwThV/k099gWUa0NO25Q8.5.c86PpJup8Vls7dQgraTZQryB5pzbO'),
(28, 'Pas très Courtois', 'hugo', 'Lecourtois', 'Hugo', 'West Ham', '$2y$10$sjfDRfEv7k7WOtQlGcSz4OS7OiWtMAPAh9A/MMBGp0w.6lOJvyWjm'),
(29, 'Yoyo', 'yoyo', 'Civel', 'Yoann', 'Olympique de Marseille', '$2y$10$32bCNjo1TlnHWV79V9PiceMyHMvvVbonWCJnZJu1otSsg1Vxk7mqa'),
(30, 'Alex', 'alex', 'Lafforgue', 'Alexandre', 'Arsenal', '$2y$10$zYFJLwxKtvyVuQgqRdhs6e6hWbTAvtSpiuN6ukkRpp60jALiKVvtW');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `bet`
--
ALTER TABLE `bet`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `score`
--
ALTER TABLE `score`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `totalscore`
--
ALTER TABLE `totalscore`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `bet`
--
ALTER TABLE `bet`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT pour la table `score`
--
ALTER TABLE `score`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=278;

--
-- AUTO_INCREMENT pour la table `totalscore`
--
ALTER TABLE `totalscore`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=155;

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
