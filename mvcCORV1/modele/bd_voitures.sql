-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : dim. 07 nov. 2021 à 19:55
-- Version du serveur : 10.4.21-MariaDB
-- Version de PHP : 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `bd_voitures`
--

-- --------------------------------------------------------

--
-- Structure de la table `voiture`
--

CREATE TABLE `voiture` (
  `idVoiture` int(11) NOT NULL,
  `typeV` varchar(40) NOT NULL,
  `prix` double NOT NULL,
  `nb` int(10) NOT NULL,
  `caract` varchar(300) NOT NULL,
  `photo` varchar(40) NOT NULL,
  `etatLocation` varchar(40) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `voiture`
--

INSERT INTO `voiture` (`idVoiture`, `typeV`, `prix`, `nb`, `caract`, `photo`, `etatLocation`) VALUES
(1, 'Opel Zafira', 45, 63, '{\"categorie\" : \"SUV\", \"moteur\" :\"diesel\", \"vitesse\":\"manuelle\", \"nbPlaces\" :\"7\"}', 'zafira.png', 'disponible'),
(2, 'Renault Espace', 37.6, 19, '{\"categorie\" : \"SUV\", \"moteur\" :\"essence\", \"vitesse\":\"automatique\", \"nbPlaces\" :\"5\"}', 'espace.png', 'disponible'),
(3, 'Tesla Model S', 29.9, 10, '{\"categorie\" : \"polyvalent\", \"moteur\" :\"electrique\", \"vitesse\":\"automatique\", \"nbPlaces\" :\"5\"}', 'teslaS.png', 'disponible');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `voiture`
--
ALTER TABLE `voiture`
  ADD PRIMARY KEY (`idVoiture`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `voiture`
--
ALTER TABLE `voiture`
  MODIFY `idVoiture` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
