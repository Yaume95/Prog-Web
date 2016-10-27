-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Client :  127.0.0.1
-- Généré le :  Jeu 27 Octobre 2016 à 16:44
-- Version du serveur :  5.7.14
-- Version de PHP :  5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `projet_web`
--

-- --------------------------------------------------------

--
-- Structure de la table `commentaire`
--

CREATE TABLE `commentaire` (
  `ID_C` int(11) NOT NULL,
  `ID_R` int(11) NOT NULL,
  `Pseudo` varchar(50) NOT NULL,
  `Date` date NOT NULL,
  `Contenu` varchar(200) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `commentaire`
--

INSERT INTO `commentaire` (`ID_C`, `ID_R`, `Pseudo`, `Date`, `Contenu`) VALUES
(4, 0, 'ProfWeb', '2016-10-27', 'Bof'),
(20, 3, 'Yaume', '2016-10-26', 'J\'aime bieeeen!\r\n'),
(21, 1, 'Exaltion', '2016-10-27', 'test'),
(7, 2, 'Nikkudan', '2016-10-20', 'TROP BON ! '),
(8, 3, 'Nikkudan', '2016-10-19', 'HHMMMM!'),
(9, 0, 'Nikkudan', '2016-10-05', 'Putain je kiffe trop ! J\'y retournerai avec tous mes amis (donc tout seul) !'),
(10, 4, 'Nikkudan', '2016-10-13', 'EXQUIS *renifle fort*'),
(11, 1, 'Nikkudan', '2050-10-29', 'Tellement bon que j\'ai fait un saut dans le futur pour y manger,  bolala hmm *grogne*');

-- --------------------------------------------------------

--
-- Structure de la table `favoris`
--

CREATE TABLE `favoris` (
  `ID_R` int(11) NOT NULL,
  `pseudo` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `favoris`
--

INSERT INTO `favoris` (`ID_R`, `pseudo`) VALUES
(0, 'Yaume'),
(1, 'Exaltion'),
(14, 'ProfWeb');

-- --------------------------------------------------------

--
-- Structure de la table `membre`
--

CREATE TABLE `membre` (
  `pseudo` varchar(16) NOT NULL,
  `nom` varchar(16) NOT NULL,
  `prenom` varchar(16) NOT NULL,
  `mdp` varchar(40) NOT NULL,
  `email` varchar(40) NOT NULL,
  `date_naissance` date DEFAULT NULL,
  `ImageU` varchar(50) NOT NULL DEFAULT './CSS/Images/Utilisateurs/image_defaut.jpg',
  `collaborateur` int(11) NOT NULL DEFAULT '0',
  `banni` int(11) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `membre`
--

INSERT INTO `membre` (`pseudo`, `nom`, `prenom`, `mdp`, `email`, `date_naissance`, `ImageU`, `collaborateur`, `banni`) VALUES
('Yaume', 'Boyer', 'Guillaume', '8cb2237d0679ca88db6464eac60da96345513964', 'yaume95@gmail.com', '1995-08-14', './CSS/Images/Utilisateurs/Yaume.png', 1, 0),
('Exaltion', 'Dieu', 'Arnaud', '8cb2237d0679ca88db6464eac60da96345513964', 'dieu@vosrequetes.com', '1985-05-14', './CSS/Images/Utilisateurs/image_defaut.jpg', 0, 0),
('Riles', 'Abdellah', 'Ghiles', '8cb2237d0679ca88db6464eac60da96345513964', 'ghiles@gmail.com', '1995-04-12', './CSS/Images/Utilisateurs/image_defaut.jpg', 1, 0),
('Folow', 'Galante', 'David', '8cb2237d0679ca88db6464eac60da96345513964', 'folow@gmail.com', '1995-05-04', './CSS/Images/Utilisateurs/image_defaut.jpg', 0, 0),
('Alex95', 'Hyppolyte', 'Alexandre', '8cb2237d0679ca88db6464eac60da96345513964', 'alex@gmail.com', '1995-04-26', './CSS/Images/Utilisateurs/image_defaut.jpg', 0, 0),
('ProfWeb', 'Gilly', 'Marvin', '9048ead9080d9b27d6b2b6ed363cbf8cce795f7f', 'gilly@gmail.com', '1990-01-01', './CSS/Images/Utilisateurs/image_defaut.jpg', 1, 0),
('Nikkudan', 'Queinec', 'Florian', '8cb2237d0679ca88db6464eac60da96345513964', 'monster@gmail.com', '1995-01-14', './CSS/Images/Utilisateurs/Nikkudan.png', 0, 0),
('DJOKOvic', 'Djoko', 'Alex', '8cb2237d0679ca88db6464eac60da96345513964', 'djoko@gmail.com', '1995-04-26', './CSS/Images/Utilisateurs/image_defaut.jpg', 0, 0),
('HarumiXXX', 'Hedhili', 'Abdelsalem', '8cb2237d0679ca88db6464eac60da96345513964', 'rumi@gmail.com', '1995-12-15', './CSS/Images/Utilisateurs/HarumiXXX.png', 0, 0);

-- --------------------------------------------------------

--
-- Structure de la table `notes`
--

CREATE TABLE `notes` (
  `ID_R` int(11) NOT NULL,
  `Pseudo` varchar(16) NOT NULL,
  `Note` int(2) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `notes`
--

INSERT INTO `notes` (`ID_R`, `Pseudo`, `Note`) VALUES
(0, 'Yaume', 5),
(1, 'Yaume', 6),
(3, 'Yaume', 9),
(4, 'Yaume', 8),
(13, 'Yaume', 1),
(1, 'Exaltion', 5);

-- --------------------------------------------------------

--
-- Structure de la table `restaurant`
--

CREATE TABLE `restaurant` (
  `ID_R` int(11) NOT NULL,
  `NomR` varchar(60) NOT NULL,
  `Adresse` varchar(50) NOT NULL,
  `Ville` varchar(50) NOT NULL,
  `CP` int(5) NOT NULL,
  `Specialite` varchar(20) NOT NULL,
  `Tel` varchar(10) NOT NULL,
  `Capacite` int(11) NOT NULL,
  `Description` text NOT NULL,
  `Image` varchar(100) DEFAULT './CSS/Images/Restaurant/default.jpg'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `restaurant`
--

INSERT INTO `restaurant` (`ID_R`, `NomR`, `Adresse`, `Ville`, `CP`, `Specialite`, `Tel`, `Capacite`, `Description`, `Image`) VALUES
(0, 'Macdonald', '10 rue de la banane', 'Goussainville', 95190, 'Francaise', '0631546548', 200, 'Un macdonald banal', './CSS/Images/Restaurant/Macdonald.png'),
(1, 'Quick', '11 avenue leclerc', 'Goussainville', 95190, 'Francaise', '0631546548', 200, 'Un quick banal', './CSS/Images/Restaurant/Quick.jpg'),
(2, 'Odin\'s', '12 rue du général', 'Goussainville', 95190, 'Italienne', '0631546548', 200, 'Un odin\'s avec une description un peu plus longue que les autres pour voir si ca pose des probleme à l\'affichage mais vu que l\'on code correctement on devrait pas avoir de probleme, du moins j\'espere', './CSS/Images/Restaurant/default.jpg'),
(3, 'Andalouze', '13 rue du square', 'Goussainville', 95190, 'Italienne', '0631546548', 200, 'Un andalouze banal', './CSS/Images/Restaurant/default.jpg'),
(4, 'KFC', '14 boulevard roger salangro', 'Goussainville', 95190, 'Francaise', '0631546548', 200, 'Un kfc banal', './CSS/Images/Restaurant/KFC.png'),
(5, 'Mistral', '103 rue de la marche', 'Goussainville', 95190, 'Espagnol', '0631546548', 200, 'Un mistral banal', './CSS/Images/Restaurant/Mistral.jpg'),
(6, 'Mistral club', '10 rue du marché', 'Goussainville', 95190, 'Aucune', '0631546548', 200, 'Un macdonald banal', './CSS/Images/Restaurant/Mistral Club.jpg'),
(7, 'O\'tacos', '22 rue de la bastille', 'Goussainville', 95190, 'Aucune', '0631546548', 200, 'Un macdonald banal', './CSS/Images/Restaurant/Otacos.jpg'),
(8, 'Les fondus de la raclette', '10 rue george pittard', 'Goussainville', 95190, 'Aucune', '0631546548', 200, 'Un macdonald banal', './CSS/Images/Restaurant/Les fondus de la raclette.jpg'),
(9, 'L\'entrée des artistes', '1 rue robert peltier', 'Goussainville', 95190, 'Espagnol', '0631546548', 200, 'Un macdonald banal', './CSS/Images/Restaurant/L entree des artistes.jpg'),
(10, 'Ugarit', '3 rue de la paix', 'Goussainville', 95190, 'Aucune', '0631546548', 200, 'Un macdonald banal', './CSS/Images/Restaurant/default.jpg'),
(11, 'Liberic', '6 rue de la guerre', 'Goussainville', 95190, 'Francaise', '0631546548', 200, 'Un macdonald banal', './CSS/Images/Restaurant/Liberic.jpg'),
(12, 'Gallerie', '19 rue de la pepinierre', 'Goussainville', 95190, 'Italienne', '0631546548', 200, 'Un macdonald banal', './CSS/Images/Restaurant/default.jpg'),
(13, 'Pizza time', '7 rue jolio curry', 'Goussainville', 95190, 'Allemenade', '0631546548', 200, 'Un macdonald banal', './CSS/Images/Restaurant/Pizza time.jpg'),
(14, 'Nostra Pizza', '15 rue des marroniers', 'Goussainville', 95190, 'Francaise', '0631546548', 200, 'Un macdonald banal', './CSS/Images/Restaurant/Nostra Pizza.jpg'),
(15, 'Pizza Nostra', '10 rue Antoine delard', 'Goussainville', 95190, 'Espagnol', '0631546548', 200, 'Un macdonald banal', './CSS/Images/Restaurant/Pizza Nostra.jpg'),
(16, 'Miam', '1054 rue Claude bernard', 'Goussainville', 95190, 'Italienne', '0631546548', 200, 'Un macdonald banal', './CSS/Images/Restaurant/Miam.jpg'),
(17, 'Bagel', '10 rue de la bas', 'Goussainville', 95190, 'Francaise', '0631546548', 200, 'Un macdonald banal', './CSS/Images/Restaurant/default.jpg'),
(18, 'Côté pizza', '10 rue vaillant', 'Goussainville', 95190, 'Aucune', '0631546548', 200, 'Un macdonald banal', './CSS/Images/Restaurant/default.jpg'),
(19, 'Marche ou crepe', '10 avenue bouffon', 'Goussainville', 95190, 'Aucune', '0631546548', 200, 'Un macdonald banal', './CSS/Images/Restaurant/default.jpg'),
(20, 'Chez riz', '10 rue montmorency', 'Goussainville', 95190, 'Aucune', '0631546548', 200, 'Un macdonald banal', './CSS/Images/Restaurant/Chez riz.jpg'),
(24, 'La Pomme', '1 rue de la mare aux cannards', 'Ermont', 95120, 'Turquie', '0616544898', 50, 'La Pomme est un grec avec des plats diverses et variÃ©s, du choix et du goÃ»t pour tous !\r\n ', './CSS/Images/Restaurant/default.jpg'),
(75, 'Chez les copains', '1 rue des gens bons', 'Villetaneuse', 93430, 'France', '0612545454', 1, 'C\'est mon restaurant Ã  moi, Ã  moi et mes amis !\r\n', './CSS/Images/Restaurant/Chez les copains.jpg');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `commentaire`
--
ALTER TABLE `commentaire`
  ADD PRIMARY KEY (`ID_C`);

--
-- Index pour la table `favoris`
--
ALTER TABLE `favoris`
  ADD PRIMARY KEY (`ID_R`,`pseudo`);

--
-- Index pour la table `membre`
--
ALTER TABLE `membre`
  ADD PRIMARY KEY (`pseudo`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `email_2` (`email`);
ALTER TABLE `membre` ADD FULLTEXT KEY `nom` (`nom`);
ALTER TABLE `membre` ADD FULLTEXT KEY `prenom` (`prenom`);
ALTER TABLE `membre` ADD FULLTEXT KEY `nom_2` (`nom`);
ALTER TABLE `membre` ADD FULLTEXT KEY `prenom_2` (`prenom`);

--
-- Index pour la table `notes`
--
ALTER TABLE `notes`
  ADD PRIMARY KEY (`ID_R`,`Pseudo`);

--
-- Index pour la table `restaurant`
--
ALTER TABLE `restaurant`
  ADD PRIMARY KEY (`ID_R`),
  ADD KEY `ID_R2` (`ID_R`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `commentaire`
--
ALTER TABLE `commentaire`
  MODIFY `ID_C` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT pour la table `restaurant`
--
ALTER TABLE `restaurant`
  MODIFY `ID_R` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
