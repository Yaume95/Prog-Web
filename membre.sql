-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Client :  127.0.0.1
-- Généré le :  Sam 08 Octobre 2016 à 16:39
-- Version du serveur :  5.7.14
-- Version de PHP :  5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

-- Base de données :  `projet_web`
--

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
  `date_naissance` date DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `membre`
--

INSERT INTO `membre` (`pseudo`, `nom`, `prenom`, `mdp`, `email`, `date_naissance`) VALUES
('Yaume', 'Boyer', 'Guillaume', '8cb2237d0679ca88db6464eac60da96345513964', 'yaume@gmail.com', '1995-08-14'),
('HarumiXXX', 'Hedhili', 'Abdelsalem', '8cb2237d0679ca88db6464eac60da96345513964', 'abdel@gmail.com', '1995-11-22'),
('Exaltion', 'Dieu', 'Arnaud', '8cb2237d0679ca88db6464eac60da96345513964', 'dieu@vosrequetes.com', '1985-05-14'),
('Riles', 'Abdellah', 'Ghiles', '8cb2237d0679ca88db6464eac60da96345513964', 'ghiles@gmail.com', '1995-04-12'),
('Folow', 'Galante', 'David', '8cb2237d0679ca88db6464eac60da96345513964', 'folow@gmail.com', '1995-05-04');

--
-- Index pour les tables exportées
--

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

