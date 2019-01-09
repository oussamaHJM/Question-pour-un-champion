-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Client :  127.0.0.1
-- Généré le :  Dim 16 Septembre 2018 à 23:48
-- Version du serveur :  10.1.21-MariaDB
-- Version de PHP :  5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `test`
--

-- --------------------------------------------------------

--
-- Structure de la table `questionphoto`
--

CREATE TABLE `questionphoto` (
  `ID_QUESTION` int(11) NOT NULL,
  `QUESTION` varchar(250) NOT NULL,
  `REPONSE_ERRONE1` varchar(250) NOT NULL,
  `REPONSE_ERRONE2` varchar(250) NOT NULL,
  `REPONSE_ERRONE3` varchar(250) NOT NULL,
  `REPONSE_VR` varchar(250) NOT NULL,
  `ETAT` varchar(250) NOT NULL,
  `LABEL` varchar(250) NOT NULL,
  `IMAGE` varchar(1024) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `questionphoto`
--

INSERT INTO `questionphoto` (`ID_QUESTION`, `QUESTION`, `REPONSE_ERRONE1`, `REPONSE_ERRONE2`, `REPONSE_ERRONE3`, `REPONSE_VR`, `ETAT`, `LABEL`, `IMAGE`) VALUES
(1, 'p', 'p', 'p', 'p', 'p', '', '', 'IMG-20180323-WA0011.jpg'),
(2, 'eprigje', 'oijgorfg', 'oijeoi', 'ije', 'ejotijg', '', '', 'IMG-20180323-WA0002.jpg'),
(3, 'eprigje', 'oijgorfg', 'oijeoi', 'ije', 'ejotijg', '', '', 'IMG-20180323-WA0002.jpg'),
(4, 'j', 'j', 'j', 'j', 'j', '', '', 'hacked1.png'),
(5, 'j', 'j', 'j', 'j', 'j', '', '', 'hacked1.png'),
(6, 'zoknfejo', 'knezljfn', 'npkn', 'pknpmk', 'pmknp', '', '', '');

-- --------------------------------------------------------

--
-- Structure de la table `questions`
--

CREATE TABLE `questions` (
  `ID_QUESTION` int(11) NOT NULL,
  `QUESTION` varchar(1024) DEFAULT NULL,
  `REPONSE_ERRONE1` varchar(500) DEFAULT NULL,
  `REPONSE_ERRONE2` varchar(500) DEFAULT NULL,
  `REPONSE_ERRONE3` varchar(500) DEFAULT NULL,
  `REPONSE_VR` varchar(500) DEFAULT NULL,
  `Etat` varchar(2050) NOT NULL,
  `LABEL` varchar(100) NOT NULL,
  `IMAGE` varchar(1024) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `questions`
--

INSERT INTO `questions` (`ID_QUESTION`, `QUESTION`, `REPONSE_ERRONE1`, `REPONSE_ERRONE2`, `REPONSE_ERRONE3`, `REPONSE_VR`, `Etat`, `LABEL`, `IMAGE`) VALUES
(1, 'Quelles sont les languages de programmation utilisé pour réalisé cet competition ?', 'C#', 'java', 'Ruby', 'PHP', 'false', 'current', '1.jpg'),
(2, 'Quelle est le système d’exploitation le plus utilisé au monde ?', 'Windows', 'Linux', 'Android', 'Windows', 'false', '', '2.mp3'),
(3, 'Les fables de La Fontaine ont été écrites :', 'À côté d\'une fontaine', 'Au XXIe siècle', 'Au XVIIe siècle', 'Au XXIe siècle', 'false', '', ''),
(4, 'Qui a développé la théorie de la relativité?', 'Albert Einstein', 'Isaac Newton', 'James Clerk Maxwell', 'Albert Einstein', 'false', '', ''),
(5, 'Quell est le nom de notre établissemet?', 'ISGA', 'IGA', 'IGHA', 'ISGA', 'false', '', '');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `USER_ID` int(11) NOT NULL,
  `USER_NAME` varchar(250) NOT NULL,
  `USER_LOGIN` varchar(250) NOT NULL,
  `USER_PASSWORD` varchar(250) NOT NULL,
  `USER_EMAIL` varchar(250) NOT NULL,
  `USER_TYPE` varchar(250) NOT NULL,
  `USER_SCORE` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `users`
--

INSERT INTO `users` (`USER_ID`, `USER_NAME`, `USER_LOGIN`, `USER_PASSWORD`, `USER_EMAIL`, `USER_TYPE`, `USER_SCORE`) VALUES
(1, 'Oussama EL-HAJJAM', 'oussama123', '202cb962ac59075b964b07152d234b70', 'oussama1997@gmai.com', 'Admin', '14'),
(2, 'Mohamed LALMI', 'mohamed123', '202cb962ac59075b964b07152d234b70', 'mohamed@gmail.com', 'Admin', '1'),
(7, 'Lycée ALAMAL', 'animateur1', '202cb962ac59075b964b07152d234b70', 'ojbo@dhth.th', 'Utilisateur', '3'),
(8, 'oussama1', 'oussama123', '202cb962ac59075b964b07152d234b70', 'ojbo@dhth.th', 'Admin', '0'),
(11, 'Amine', 'Amine123', 'c20ad4d76fe97759aa27a0c99bff6710', 'ojbo@dhth.th', 'Animateur', '0');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `questionphoto`
--
ALTER TABLE `questionphoto`
  ADD PRIMARY KEY (`ID_QUESTION`);

--
-- Index pour la table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`ID_QUESTION`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`USER_ID`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `questionphoto`
--
ALTER TABLE `questionphoto`
  MODIFY `ID_QUESTION` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT pour la table `questions`
--
ALTER TABLE `questions`
  MODIFY `ID_QUESTION` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `USER_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
