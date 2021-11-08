-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : lun. 08 nov. 2021 à 01:47
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
-- Base de données : `bd_voitures`
--

-- --------------------------------------------------------

--
-- Structure de la table `facture`
--

CREATE TABLE `facture` (
  `idFacture` int(11) NOT NULL,
  `idClient` int(11) NOT NULL,
  `idVoiture` int(11) NOT NULL,
  `dateD` date NOT NULL,
  `dateF` date DEFAULT NULL,
  `valeur` double NOT NULL,
  `etatReglement` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `facture`
--

INSERT INTO `facture` (`idFacture`, `idClient`, `idVoiture`, `dateD`, `dateF`, `valeur`, `etatReglement`) VALUES
(1, 2, 4, '2021-11-10', '2021-11-13', 70.5, 0),
(2, 2, 3, '2021-11-21', '2021-11-27', 179.4, 0),
(3, 3, 6, '2021-12-08', '2021-12-22', 221.06, 0),
(4, 3, 4, '2021-11-16', '2021-11-25', 211.5, 0),
(5, 2, 1, '2021-11-28', '2021-11-30', 90, 0);

-- --------------------------------------------------------

--
-- Structure de la table `loueur`
--

CREATE TABLE `loueur` (
  `idClient` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `loueur`
--

INSERT INTO `loueur` (`idClient`) VALUES
(1);

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `idClient` int(10) NOT NULL,
  `nom` varchar(40) NOT NULL,
  `pseudo` varchar(40) NOT NULL,
  `mdp` varchar(40) NOT NULL,
  `email` varchar(40) NOT NULL,
  `nomE` varchar(40) NOT NULL,
  `adresseE` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`idClient`, `nom`, `pseudo`, `mdp`, `email`, `nomE`, `adresseE`) VALUES
(1, 'Simeon', 'SiMista', '554baf7abd58c8789233fcc0e781f0a9cb20a0a5', 'sisilmf@gmail.com', 'Sixt', 'sixt@gmail.com'),
(2, 'Jules', 'Julio', 'a4e430be40289d926503146438f42ff5f1396161', 'julio@hotmail.fr', 'Hertz', 'Hertz@hotmail.fr'),
(3, 'Leo', 'Leolio', '0aa95006acc9817fd7f1ef5b9dfded266515e7da', 'leocha@gmail.com', 'RentalCars', 'rental@gmail.com');

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
  `etatLocation` varchar(40) NOT NULL DEFAULT 'disponible'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `voiture`
--

INSERT INTO `voiture` (`idVoiture`, `typeV`, `prix`, `nb`, `caract`, `photo`, `etatLocation`) VALUES
(1, 'Opel Zafira', 45, 7, '{\"categorie\" : \"SUV\", \"moteur\" :\"diesel\", \"vitesse\":\"manuelle\", \"nbPlaces\" :\"7\"}', 'zafira.png', 'disponible'),
(2, 'Renault Espace', 37.6, 19, '{\"categorie\" : \"SUV\", \"moteur\" :\"essence\", \"vitesse\":\"automatique\", \"nbPlaces\" :\"5\"}', 'espace.png', 'en_revision'),
(3, 'Tesla Model S', 29.9, 10, '{\"categorie\" : \"polyvalent\", \"moteur\" :\"electrique\", \"vitesse\":\"automatique\", \"nbPlaces\" :\"5\"}', 'teslaS.png', 'disponible'),
(4, 'Peugeot 208', 23.5, 5, '{\"categorie\" : \"citadine\", \"moteur\" :\"diesel\", \"vitesse\":\"manuelle\", \"nbPlaces\" :\"5\"}', 'peugeot208.png', 'disponible'),
(5, 'Toyota Yaris', 20.5, 12, '{\"categorie\" : \"citadine\", \"moteur\" :\"essence\", \"vitesse\":\"automatique\", \"nbPlaces\" :\"5\"}', 'toyotaYaris.png', 'en_revision'),
(6, 'Fiat 500', 15.79, 10, '{\"categorie\" : \"citadine\", \"moteur\" :\"diesel\", \"vitesse\":\"manuelle\", \"nbPlaces\" :\"5\"}', 'fiat500.png', 'disponible');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `facture`
--
ALTER TABLE `facture`
  ADD PRIMARY KEY (`idFacture`),
  ADD KEY `idClient` (`idClient`),
  ADD KEY `idVoiture` (`idVoiture`);

--
-- Index pour la table `loueur`
--
ALTER TABLE `loueur`
  ADD PRIMARY KEY (`idClient`),
  ADD KEY `idClient` (`idClient`);

--
-- Index pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`idClient`);

--
-- Index pour la table `voiture`
--
ALTER TABLE `voiture`
  ADD PRIMARY KEY (`idVoiture`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `facture`
--
ALTER TABLE `facture`
  MODIFY `idFacture` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  MODIFY `idClient` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `voiture`
--
ALTER TABLE `voiture`
  MODIFY `idVoiture` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;