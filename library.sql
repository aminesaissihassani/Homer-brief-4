-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mer. 17 mars 2021 à 10:27
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
-- Déchargement des données de la table `author`
--

INSERT INTO `author` (`ID`, `A_name`, `D_brith`, `img`) VALUES
(2, 'amal mtahri', '2021-03-19', 'images/PICINS.jpg'),
(5, 'amine saissi hassani', '2021-03-16', 'images/pexels-brett-jordan-842528.jpg'),
(6, 'ayoub zoubiri', '2021-03-30', 'images/pexels-sourav-mishra-2317519.jpg'),
(8, 'soumia ', '2021-03-29', 'images/pexels-nordic-overdrive-627717.jpg');

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
-- Déchargement des données de la table `book`
--

INSERT INTO `book` (`ID`, `b_name`, `price`, `prod_date`, `img`) VALUES
(1, 'antigone', 100, '2021-03-17', '1'),
(2, 'antigone', 100, '2021-03-17', '1'),
(4, 'antigone', 106, '2021-04-17', '1'),
(5, 'antigone', 109, '2021-04-17', '1'),
(6, 'antigone', 109, '2021-04-17', '1'),
(7, 'mmm', 109, '2021-04-17', '1'),
(8, 'mmm', 109, '2021-04-17', '1'),
(9, 'jjj', 106, '2021-03-25', '1'),
(10, 'eyeyey', 0, '2021-03-25', ''),
(11, 'antigone', 109, '2021-03-26', ''),
(12, '', 0, '0000-00-00', ''),
(13, 'jxjx', 12, '2021-03-17', ''),
(14, 'antigone', 109, '2021-04-02', ''),
(15, 'antigone', 109, '2021-03-25', ''),
(16, 'eyeyey', 106, '2021-03-24', ''),
(17, 'ggg', 106, '2021-03-31', ''),
(18, 'ggg', 0, '2021-03-19', ''),
(19, 'ggg', 109, '2021-03-24', 'C:xampp	mpphpDCF.tmp'),
(20, 'ggg', 106, '2021-03-23', 'Icon awesome-twitter.png'),
(21, 'ggg', 109, '2021-03-23', 'Rectangle 9.png'),
(22, 'antigone', 106, '2021-03-15', 'Rectangle 9.png'),
(23, 'mmm', 100, '2021-03-29', 'Icon awesome-instagram.png'),
(24, 'mmm', 109, '2021-03-25', 'Rectangle 9.png'),
(25, 'ggg', 106, '2021-03-16', 'pexels-sourav-mishra-2317519.jpg'),
(26, 'mmm', 100, '2021-03-30', 'Web 1920 – 5.png'),
(27, 'mmm', 106, '2021-03-16', '0'),
(28, 'ggg', 100, '2021-03-23', 'images/pexels-asad-photo-maldives-169192.jpg'),
(29, 'eyeyey', 100, '2021-03-18', 'imagesvictor-freitas-WvDYdXDzkhs-unsplash.jpg'),
(30, 'ggg', 55, '2021-03-31', 'images/jonathan-borba-zfPOelmDc-M-unsplash.jpg'),
(31, 'eyeyey', 109, '2021-03-23', 'images/logan-weaver-LzT-WMv1xrI-unsplash.jpg'),
(32, 'ggg', 2626, '2021-03-15', 'images/images.png'),
(33, 'mmm', 106, '2021-03-24', 'images/20210307_125624.jpg'),
(34, 'ggg', 100, '2021-03-23', 'images/MAROC.jpg'),
(35, 'antigone', 109, '2021-03-29', 'images/PICINS.jpg'),
(36, 'ggg', 100, '2021-03-16', 'images/20210307_125624.jpg'),
(37, 'mmm', 106, '2021-03-24', 'images/20210307_125624.jpg'),
(38, 'mmm', 106, '2021-03-16', 'images/MAROC.jpg'),
(39, 'antigone', 109, '2021-03-23', 'images/PICINS.jpg'),
(40, 'mmm', 100, '2021-03-22', 'images/20210307_125624.jpg'),
(41, 'mmm', 100, '2021-03-22', 'images/20210307_125624.jpg'),
(42, 'antigone', 100, '2021-03-23', 'images/MAROC.jpg'),
(43, '', 0, '0000-00-00', 'images/'),
(44, 'ggg', 106, '2021-03-16', 'images/PICINS.jpg'),
(45, 'antigone', 106, '2021-03-29', 'images/PICINS.jpg'),
(46, 'antigone', 10, '2021-03-22', 'images/PICINS.jpg'),
(47, 'antigone', 106, '2021-03-30', 'images/INSTAPIC.jpg'),
(48, 'njj', 123, '2021-03-23', 'images/MAROC.jpg'),
(49, 'jdjdjdj', 2822, '2021-03-17', 'images/MAROC.jpg'),
(50, 'kssk', 3737, '2021-03-23', 'images/MARC.jpg'),
(51, 'jdhdd', 26, '2021-03-30', 'images/MAROC.jpg'),
(52, 'dudududu', 2626, '2021-03-17', 'images/INSTAPIC.jpg'),
(53, 'DKKDK', 2626, '2021-03-25', 'images/MAROC.jpg'),
(54, 'DKKDK', 2626, '2021-03-25', 'images/MAROC.jpg'),
(55, 'KSSK', 1515, '2021-03-17', 'images/PICINS.jpg'),
(56, 'KKKK', 0, '2021-03-01', 'images/MARC.jpg'),
(58, 'ggg', 282, '2021-03-23', 'images/PICINS.jpg'),
(61, 'sjsjj', 1727, '2021-03-23', 'images/PICINS.jpg'),
(63, 'hi', 106, '2021-03-16', 'images/lg.png'),
(64, 'ktab', 1, '2021-03-16', 'images/mt.jpg'),
(65, 'sjsjsjj', 345, '2021-03-16', 'images/jonathan-borba-zfPOelmDc-M-unsplash.jpg'),
(66, 'ggg', 2828, '2021-03-24', 'images/char.png'),
(67, 'amal', 262626, '2021-03-15', 'images/pexels-thgusstavo-santana-2607554.jpg'),
(69, 'JDJDJ', 22662, '2021-03-15', 'images/victor-freitas-hOuJYX2K5DA-unsplash.jpg'),
(70, 'YYY', 233, '2021-03-23', 'images/pexels-thgusstavo-santana-2607554.jpg'),
(71, 'JSJSJ', 62626, '2021-03-23', 'images/pexels-secret-garden-931176 (1).jpg'),
(72, 'JSJSJ', 62626, '2021-03-23', 'images/pexels-secret-garden-931176 (1).jpg'),
(73, 'UUU', 6363, '2021-03-15', 'images/pexels-sourav-mishra-2317519.jpg'),
(74, 'OTHMANE', 267, '2021-03-16', 'images/lg-removebg-preview.png'),
(75, 'OTHMANE', 223, '2222-02-22', 'images/pic1.png'),
(76, 'udufu', 3737, '2021-03-22', 'images/pexels-sourav-mishra-3068658.jpg'),
(77, 'SOUMIA', 177, '2021-03-04', 'images/pexels-negative-space-97079.jpg'),
(78, 'DJDJ', 7337, '2021-03-16', 'images/pexels-pixabay-104842.jpg'),
(79, 'SJSJ', 2727, '2021-03-09', 'images/pexels-pragyan-bezbaruah-1715193.jpg'),
(81, 'DDU', 3646, '2021-03-16', 'images/pexels-negative-space-97075.jpg'),
(83, 'mmm', 0, '2021-03-09', 'images/pexels-negative-space-97075.jpg'),
(85, 'updated', 2626, '2021-03-10', 'images/images.png');

-- --------------------------------------------------------

--
-- Structure de la table `bookauthor`
--

CREATE TABLE `bookauthor` (
  `Id_book` int(11) NOT NULL,
  `Id_author` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `bookauthor`
--

INSERT INTO `bookauthor` (`Id_book`, `Id_author`) VALUES
(58, 2),
(63, 2),
(64, 6),
(65, 2),
(66, 2),
(67, 2),
(78, 2),
(85, 2);

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
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `book`
--
ALTER TABLE `book`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=87;

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
