-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  ven. 05 oct. 2018 à 10:45
-- Version du serveur :  10.1.35-MariaDB
-- Version de PHP :  7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `suivi`
--

-- --------------------------------------------------------

--
-- Structure de la table `organisme`
--

CREATE TABLE `organisme` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `tel` varchar(100) NOT NULL,
  `fax` varchar(100) NOT NULL,
  `mail` varchar(100) NOT NULL,
  `site` varchar(100) NOT NULL,
  `contact` varchar(100) NOT NULL,
  `adresse` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `organisme`
--

INSERT INTO `organisme` (`id`, `nom`, `tel`, `fax`, `mail`, `site`, `contact`, `adresse`) VALUES
(1, 'org1', '06782732', '0587292', 'bana@gmail.com', 'www.ofppt.com', 'con1', 'Casa'),
(3, 'org1', '06782732', '0587292', 'bana@gmail.com', 'www.ofppt.com', 'con1', 'Casa'),
(4, 'org1', '06782732', '0587292', 'bana@gmail.com', 'www.ofppt.com', 'con1', 'Casa'),
(5, 'org1', '06782732', '0587292', 'bana@gmail.com', 'www.ofppt.com', 'con1', 'Casa'),
(6, 'org1', '06782732', '0587292', 'bana@gmail.com', 'www.ofppt.com', 'con1', 'Casa'),
(7, 'org1', '06782732', '0587292', 'bana@gmail.com', 'www.ofppt.com', 'con1', 'Casa'),
(8, 'org1', '06782732', '0587292', 'bana@gmail.com', 'www.ofppt.com', 'con1', 'Casa'),
(9, 'org1', '06782732', '0587292', 'bana@gmail.com', 'www.ofppt.com', 'con1', 'Casa'),
(10, 'org1', '06782732', '0587292', 'bana@gmail.com', 'www.ofppt.com', 'con1', 'Casa'),
(11, 'org1', '06782732', '0587292', 'bana@gmail.com', 'www.ofppt.com', 'con1', 'Casa'),
(12, 'aa', 'aa', 'aa', 'aa', 'aa', 'aa', 'aa'),
(13, 'aa', 'aa', 'aa', 'aa', 'aa', 'aa', 'aa'),
(14, 'aa', 'aa', 'aa', 'aa', 'aa', 'aa', 'aa'),
(15, '', '', '', '', '', '', ''),
(16, 'ss', 'ss', 'ss', 'ss', 'ss', 'ss', 'ss'),
(1, 'org1', '06782732', '0587292', 'bana@gmail.com', 'www.ofppt.com', 'con1', 'Casa');

-- --------------------------------------------------------

--
-- Structure de la table `profil`
--

CREATE TABLE `profil` (
  `id` int(11) NOT NULL,
  `code` varchar(255) NOT NULL,
  `libelle` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `projet`
--

CREATE TABLE `projet` (
  `id` int(11) NOT NULL,
  `intitule` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `datedebut` date NOT NULL,
  `datefin` date NOT NULL,
  `etat` varchar(255) NOT NULL,
  `montant` double NOT NULL,
  `idorganisme` int(11) NOT NULL,
  `chef` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `email` varchar(255) NOT NULL,
  `tel` varchar(255) NOT NULL,
  `idprofil` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `organisme`
--
ALTER TABLE `organisme`
  ADD KEY `id` (`id`);

--
-- Index pour la table `profil`
--
ALTER TABLE `profil`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `projet`
--
ALTER TABLE `projet`
  ADD KEY `id` (`id`),
  ADD KEY `idorganisme` (`idorganisme`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD KEY `idprofil` (`idprofil`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `organisme`
--
ALTER TABLE `organisme`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT pour la table `profil`
--
ALTER TABLE `profil`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `projet`
--
ALTER TABLE `projet`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `projet`
--
ALTER TABLE `projet`
  ADD CONSTRAINT `projet_ibfk_1` FOREIGN KEY (`idorganisme`) REFERENCES `organisme` (`id`);

--
-- Contraintes pour la table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`idprofil`) REFERENCES `profil` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
