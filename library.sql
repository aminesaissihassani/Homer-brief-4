-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : Dim 28 mars 2021 à 15:08
-- Version du serveur :  10.4.17-MariaDB
-- Version de PHP : 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `library`
--

-- --------------------------------------------------------

--
-- Structure de la table `author`
--

CREATE TABLE `author` (
  `ID` int(11) NOT NULL,
  `A_name` varchar(100) NOT NULL,
  `D_brith` date NOT NULL,
  `img` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- RELATIONS POUR LA TABLE `author`:
--

--
-- Déchargement des données de la table `author`
--

INSERT INTO `author` (`ID`, `A_name`, `D_brith`, `img`) VALUES
(15, 'Yuval Noah Harari', '1976-02-24', 'images/Yuval_Noah_Harari.jpg'),
(16, 'Jojo Moyes', '1969-01-01', 'images/Jojo_Moyes.jpg'),
(17, 'Jean Sasson', '1947-07-04', 'images/Jean_Sasson.jpg'),
(18, 'Jenny Downham', '1964-01-01', 'images/JENNUDOWNHAM.jpg'),
(19, ' John Grisham', '1955-02-08', 'images/johnghiham.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `book`
--

CREATE TABLE `book` (
  `ID` int(11) NOT NULL,
  `b_name` varchar(100) NOT NULL,
  `price` float NOT NULL,
  `prod_date` date NOT NULL,
  `img` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- RELATIONS POUR LA TABLE `book`:
--

--
-- Déchargement des données de la table `book`
--

INSERT INTO `book` (`ID`, `b_name`, `price`, `prod_date`, `img`) VALUES
(124, '21 Lessons For The 21st Century', 134, '2018-08-23', 'images/117305140621lessonss.jpg'),
(125, 'After You', 134, '2015-12-29', 'images/799125044AFTERU.jpg'),
(126, 'Desert Royal', 100, '1999-01-01', 'images/DESERTROYAL.jpg'),
(127, 'Before I Die', 106, '0000-00-00', 'images/BeforeIDie.jpg'),
(128, 'The Broker', 140, '2005-01-11', 'images/514681578broker.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `bookauthor`
--

CREATE TABLE `bookauthor` (
  `Id_book` int(11) NOT NULL,
  `Id_author` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- RELATIONS POUR LA TABLE `bookauthor`:
--   `Id_book`
--       `book` -> `ID`
--   `Id_author`
--       `author` -> `ID`
--

--
-- Déchargement des données de la table `bookauthor`
--

INSERT INTO `bookauthor` (`Id_book`, `Id_author`) VALUES
(124, 15),
(125, 16),
(126, 17),
(127, 18),
(128, 19);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `author`
--
ALTER TABLE `author`
  ADD PRIMARY KEY (`ID`);

--
-- Index pour la table `book`
--
ALTER TABLE `book`
  ADD PRIMARY KEY (`ID`);

--
-- Index pour la table `bookauthor`
--
ALTER TABLE `bookauthor`
  ADD PRIMARY KEY (`Id_book`,`Id_author`),
  ADD KEY `Id_author` (`Id_author`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `author`
--
ALTER TABLE `author`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT pour la table `book`
--
ALTER TABLE `book`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=129;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `bookauthor`
--
ALTER TABLE `bookauthor`
  ADD CONSTRAINT `bookauthor_ibfk_1` FOREIGN KEY (`Id_book`) REFERENCES `book` (`ID`),
  ADD CONSTRAINT `bookauthor_ibfk_2` FOREIGN KEY (`Id_author`) REFERENCES `author` (`ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
