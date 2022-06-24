-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : jeu. 23 juin 2022 à 13:13
-- Version du serveur : 8.0.27
-- Version de PHP : 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `gbafpdo`
--

-- --------------------------------------------------------

--
-- Structure de la table `account`
--

DROP TABLE IF EXISTS `account`;
CREATE TABLE IF NOT EXISTS `account` (
  `id_user` int NOT NULL AUTO_INCREMENT,
  `username` text NOT NULL,
  `password` text NOT NULL,
  `nom` text NOT NULL,
  `prenom` text NOT NULL,
  `question` text NOT NULL,
  `reponse` text NOT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `account`
--

INSERT INTO `account` (`id_user`, `username`, `password`, `nom`, `prenom`, `question`, `reponse`) VALUES
(12, 'agavras3', '123', 'FALEZ', 'Sophie', 'Quel est le deuxième prénom de l’aîné(e) de votre fratrie ?', 'valery'),
(10, 'agavras', '123', 'FALEZ', 'Mathieu', 'Dans quelle ville êtes-vous né(e) ?', 'Lesquin'),
(11, 'agavras2', '123', 'FALEZ', 'Jean', 'Dans quelle ville êtes-vous né(e) ?', 'Salies-de-Béarn'),
(13, 'agavras4', '123', 'FALEZ', 'aaa', 'Quel est le deuxième prénom de l’aîné(e) de votre fratrie ?', 'valery'),
(14, 'agavras5', '123', 'FALEZ', 'jean', 'Quel est le deuxième prénom de l’aîné(e) de votre fratrie ?', 'valery');

-- --------------------------------------------------------

--
-- Structure de la table `acteur`
--

DROP TABLE IF EXISTS `acteur`;
CREATE TABLE IF NOT EXISTS `acteur` (
  `id_acteur` int NOT NULL AUTO_INCREMENT,
  `acteur` text NOT NULL,
  `description` text NOT NULL,
  `logo` text NOT NULL,
  PRIMARY KEY (`id_acteur`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `acteur`
--

INSERT INTO `acteur` (`id_acteur`, `acteur`, `description`, `logo`) VALUES
(1, 'Formation&co', 'Formation&co est une association française présente sur tout le territoire.\r\nNous proposons à des personnes issues de tout milieu de devenir entrepreneur grâce à un crédit et un accompagnement professionnel et personnalisé.\r\nNotre proposition : \r\n- un financement jusqu’à 30 000€ ;\r\n- un suivi personnalisé et gratuit ;\r\n- une lutte acharnée contre les freins sociétaux et les stéréotypes.\r\n\r\nLe financement est possible, peu importe le métier : coiffeur, banquier, éleveur de chèvres… . Nous collaborons avec des personnes talentueuses et motivées.\r\nVous n’avez pas de diplômes ? Ce n’est pas un problème pour nous ! Nos financements s’adressent à tous.', 'formation_co.webp'),
(2, 'Protectpeople', 'Protectpeople finance la solidarité nationale.\r\nNous appliquons le principe édifié par la Sécurité sociale française en 1945 : permettre à chacun de bénéficier d’une protection sociale.\r\n\r\nChez Protectpeople, chacun cotise selon ses moyens et reçoit selon ses besoins.\r\nProectecpeople est ouvert à tous, sans considération d’âge ou d’état de santé.\r\nNous garantissons un accès aux soins et une retraite.\r\nChaque année, nous collectons et répartissons 300 milliards d’euros.\r\nNotre mission est double :\r\nsociale : nous garantissons la fiabilité des données sociales ;\r\néconomique : nous apportons une contribution aux activités économiques.', 'protectpeople.webp'),
(3, 'Dsa France', 'Dsa France accélère la croissance du territoire et s’engage avec les collectivités territoriales.\r\nNous accompagnons les entreprises dans les étapes clés de leur évolution.\r\nNotre philosophie : s’adapter à chaque entreprise.\r\nNous les accompagnons pour voir plus grand et plus loin et proposons des solutions de financement adaptées à chaque étape de la vie des entreprises.', 'Dsa_france.webp'),
(4, 'CDE', 'La CDE (Chambre Des Entrepreneurs) accompagne les entreprises dans leurs démarches de formation. \r\nSon président est élu pour 3 ans par ses pairs, chefs d’entreprises et présidents des CDE.', 'CDE.webp');

-- --------------------------------------------------------

--
-- Structure de la table `post`
--

DROP TABLE IF EXISTS `post`;
CREATE TABLE IF NOT EXISTS `post` (
  `date_add` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `id_acteur` int NOT NULL,
  `id_post` int NOT NULL AUTO_INCREMENT,
  `id_user` int NOT NULL,
  `post` text NOT NULL,
  PRIMARY KEY (`id_post`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `post`
--

INSERT INTO `post` (`date_add`, `id_acteur`, `id_post`, `id_user`, `post`) VALUES
('2022-06-23 11:46:33', 1, 1, 10, 'Est-ce que ca marche ?'),
('2022-06-23 12:07:35', 1, 2, 11, 'C\'est parti pour..!'),
('2022-06-23 12:43:04', 1, 3, 12, 'J\'ajoute ce commentaire depuis la page enterMessage.'),
('2022-06-23 12:58:09', 1, 5, 13, 'encore un test'),
('2022-06-23 13:12:33', 1, 10, 10, 'salut ca va ?');

-- --------------------------------------------------------

--
-- Structure de la table `vote`
--

DROP TABLE IF EXISTS `vote`;
CREATE TABLE IF NOT EXISTS `vote` (
  `id_acteur` int NOT NULL,
  `id_user` int NOT NULL,
  `vote` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `vote`
--

INSERT INTO `vote` (`id_acteur`, `id_user`, `vote`) VALUES
(1, 10, 'like'),
(1, 11, 'dislike'),
(1, 12, 'like'),
(1, 13, 'like'),
(1, 14, 'dislike');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
