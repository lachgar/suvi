-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 07, 2018 at 08:26 PM
-- Server version: 10.1.34-MariaDB
-- PHP Version: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `suivi`
--

-- --------------------------------------------------------

--
-- Table structure for table `organisme`
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
-- Dumping data for table `organisme`
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
-- Table structure for table `profil`
--

CREATE TABLE `profil` (
  `id` int(11) NOT NULL,
  `code` varchar(255) NOT NULL,
  `libelle` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `profil`
--

INSERT INTO `profil` (`id`, `code`, `libelle`) VALUES
(3, '', 'directeur'),
(4, '', 'admin'),
(5, '', 'secretaire'),
(6, '', 'chef');

-- --------------------------------------------------------

--
-- Table structure for table `projet`
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
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `email` varchar(255) NOT NULL,
  `tel` varchar(255) NOT NULL,
  `idprofil` int(11) NOT NULL,
  `login` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `nom`, `prenom`, `date`, `email`, `tel`, `idprofil`, `login`, `password`) VALUES
(2, 'salah', 'salah', '2018-10-10', 'admin@gmail.com', '060606', 4, 'admin', 'admin'),
(2, 'salah', 'salah', '2018-10-10', 'admin@gmail.com', '060606', 4, 'admin', 'admin'),
(1, 'salah', 'salah', '2018-10-10', 'directeur@gmail.com', '060606', 3, 'directeur', 'directeur'),
(3, 'salah', 'salah', '2018-10-10', 'secretaire@gmail.com', '060606', 5, 'secretaire', 'secretaire'),
(4, 'salah', 'salah', '2018-10-10', 'chef@gmail.com', '060606', 6, 'chef', 'chef');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `organisme`
--
ALTER TABLE `organisme`
  ADD KEY `id` (`id`);

--
-- Indexes for table `profil`
--
ALTER TABLE `profil`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `projet`
--
ALTER TABLE `projet`
  ADD KEY `id` (`id`),
  ADD KEY `idorganisme` (`idorganisme`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD KEY `idprofil` (`idprofil`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `organisme`
--
ALTER TABLE `organisme`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `profil`
--
ALTER TABLE `profil`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `projet`
--
ALTER TABLE `projet`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `projet`
--
ALTER TABLE `projet`
  ADD CONSTRAINT `projet_ibfk_1` FOREIGN KEY (`idorganisme`) REFERENCES `organisme` (`id`);

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`idprofil`) REFERENCES `profil` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
