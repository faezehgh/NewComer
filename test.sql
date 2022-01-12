-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mer. 12 jan. 2022 à 10:06
-- Version du serveur : 10.4.21-MariaDB
-- Version de PHP : 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `test`
--

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

CREATE TABLE `categorie` (
  `id_categorie` int(11) NOT NULL,
  `categorie` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `categorie`
--

INSERT INTO `categorie` (`id_categorie`, `categorie`) VALUES
(5, 'General'),
(6, 'Domaine'),
(7, 'Si Non Al Run'),
(8, 'Si Al'),
(9, 'Si Textile'),
(10, 'PROD'),
(11, 'Qualif'),
(12, 'Securite'),
(13, 'Sortie');

-- --------------------------------------------------------

--
-- Structure de la table `check`
--

CREATE TABLE `check` (
  `id_Check` int(11) NOT NULL,
  `CheckAction` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `check`
--

INSERT INTO `check` (`id_Check`, `CheckAction`) VALUES
(1, 'Ok'),
(2, 'A Faire'),
(4, 'Non Applicable');

-- --------------------------------------------------------

--
-- Structure de la table `information`
--

CREATE TABLE `information` (
  `userID` int(11) DEFAULT NULL,
  `id_information` int(11) NOT NULL,
  `DomainCatégorie` varchar(255) NOT NULL,
  `NomAction` varchar(255) NOT NULL,
  `DescriptionAction` varchar(255) DEFAULT NULL,
  `Informations` varchar(255) NOT NULL,
  `CHK_Action` varchar(255) NOT NULL,
  `DateAction` varchar(50) NOT NULL,
  `Ticket` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `information`
--

INSERT INTO `information` (`userID`, `id_information`, `DomainCatégorie`, `NomAction`, `DescriptionAction`, `Informations`, `CHK_Action`, `DateAction`, `Ticket`) VALUES
(11, 198, 'General', '', '', '', '', '2021-06-02', ''),
(0, 215, '', '', '', '', '', '', ''),
(11, 219, '', 'Acces VPN ', '', '', '', '2021-06-18', ''),
(19, 222, '', '', '', '', '', '2021-06-23', ''),
(1, 237, '', '4', '', '', '', '', ''),
(2, 241, '', '2', '', '', '', '2021-07-21', ''),
(1, 242, '', '1', '', '', '', '2021-07-27', '');

-- --------------------------------------------------------

--
-- Structure de la table `nomaction`
--

CREATE TABLE `nomaction` (
  `NomAction_ID` int(11) NOT NULL,
  `nomAction` varchar(255) NOT NULL,
  `DescriptionAction` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `nomaction`
--

INSERT INTO `nomaction` (`NomAction_ID`, `nomAction`, `DescriptionAction`) VALUES
(1, '', ''),
(2, 'création compte Windows', ''),
(3, 'Envoi note d\'arrivée', ''),
(4, 'Mise à jour Organigramme', ''),
(5, 'Mise à jour mailing list externe', ''),
(6, 'Fournir la signature mail', ''),
(7, 'Accès ATHENA', ''),
(8, 'Accès Wallix', ''),
(9, '', ''),
(10, '', ''),
(11, 'Accès au sheet des congés de la DSI', '');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `ID` int(11) NOT NULL,
  `prénom` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `nom` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `domaine` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `hiérarchique` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `Poste` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `dateArrivée` date NOT NULL,
  `dateSortie` date NOT NULL,
  `Matricule` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `forgot_pass_identity` varchar(32) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `status` enum('1','0') COLLATE utf8_unicode_ci NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `categorie`
--
ALTER TABLE `categorie`
  ADD PRIMARY KEY (`id_categorie`);

--
-- Index pour la table `check`
--
ALTER TABLE `check`
  ADD PRIMARY KEY (`id_Check`);

--
-- Index pour la table `information`
--
ALTER TABLE `information`
  ADD PRIMARY KEY (`id_information`);

--
-- Index pour la table `nomaction`
--
ALTER TABLE `nomaction`
  ADD PRIMARY KEY (`NomAction_ID`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `categorie`
--
ALTER TABLE `categorie`
  MODIFY `id_categorie` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT pour la table `check`
--
ALTER TABLE `check`
  MODIFY `id_Check` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `information`
--
ALTER TABLE `information`
  MODIFY `id_information` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=243;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
