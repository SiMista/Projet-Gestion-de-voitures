-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : dim. 07 nov. 2021 à 01:18
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
  `etatReglement` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `facture`
--

INSERT INTO `facture` (`idFacture`, `idClient`, `idVoiture`, `dateD`, `dateF`, `valeur`, `etatReglement`) VALUES
(1, 2, 1, '2021-09-01', '2021-09-30', 230.99, 0),
(2, 2, 2, '2021-10-01', '2021-10-31', 199.5, 1);

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
(1, 'Simeon', 'SiMista', 'Jojo', 'sisilamif@gmail.com', 'Sixt', 'sixt@gmail.com'),
(2, 'Jules', 'Julio', 'Laylow', 'julio@hotmail.fr', 'Hertz', 'Hertz@hotmail.fr'),
(3, 'Leo', 'Leolio', 'BigDrip', 'leocha@gmail.com', 'RentalCars', 'rental@gmail.com'),
(10, 'Berger', 'b', 'b', 'b', '', ''),
(11, 'khki', 'kikhk', 'kihki', 'hikihkh', '', ''),
(12, 'dfggdr', 'gdrgrgd', 'grdg', 'grdg', '', ''),
(13, 'dzqdzq', 'dzqdqzdzq', 'zqdqzd', 'pon@qdzq', '', '');

-- --------------------------------------------------------

--
-- Structure de la table `voiture`
--

CREATE TABLE `voiture` (
  `idVoiture` int(11) NOT NULL,
  `type` varchar(40) NOT NULL,
  `nb` int(10) NOT NULL,
  `caract` varchar(300) NOT NULL,
  `photo` varchar(40) NOT NULL,
  `etatLocation` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `voiture`
--

INSERT INTO `voiture` (`idVoiture`, `type`, `nb`, `caract`, `photo`, `etatLocation`) VALUES
(1, 'Opel Zafira', 5, '{\"categorie\" : \"SUV\", \"moteur\" :\"diesel\", \"vitesse\":\"manuelle\", \"nbPlaces\" :\"7\"}', 'zafira.png', 'disponible'),
(2, 'Renault Espace', 20, '{\"categorie\" : \"SUV\", \"moteur\" :\"essence\", \"vitesse\":\"automatique\", \"nbPlaces\" :\"5\"}', 'espace.png', 'en_revision'),
(3, 'Tesla Model S', 15, '{\"categorie\" : \"polyvalent\", \"moteur\" :\"electrique\", \"vitesse\":\"automatique\", \"nbPlaces\" :\"5\"}', 'teslaS.png', 'disponible');

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
  MODIFY `idFacture` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  MODIFY `idClient` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT pour la table `voiture`
--
ALTER TABLE `voiture`
  MODIFY `idVoiture` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
