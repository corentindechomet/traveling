-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Sam 29 Octobre 2016 à 00:13
-- Version du serveur :  10.1.13-MariaDB
-- Version de PHP :  5.6.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `traveling_bdd`
--

-- --------------------------------------------------------

--
-- Structure de la table `lieu`
--

CREATE TABLE `lieu` (
  `idLieu` int(11) NOT NULL,
  `nomLieu` varchar(255) NOT NULL,
  `adresse` varchar(255) NOT NULL,
  `ville` varchar(50) NOT NULL,
  `categorie` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `latitude` int(11) NOT NULL,
  `longitude` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `oeuvres`
--

CREATE TABLE `oeuvres` (
  `idOeuvre` int(5) NOT NULL,
  `titreOeuvre` varchar(255) NOT NULL,
  `type` tinyint(1) NOT NULL,
  `genre` varchar(50) NOT NULL,
  `realisateur` varchar(50) NOT NULL,
  `acteurs` varchar(255) NOT NULL,
  `paysProd` varchar(50) NOT NULL,
  `anneeProd` year(4) NOT NULL,
  `description` text NOT NULL,
  `urlimg` varchar(255) NOT NULL,
  `urlvideo` varchar(255) NOT NULL,
  `lieu` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `oeuvres`
--

INSERT INTO `oeuvres` (`idOeuvre`, `titreOeuvre`, `type`, `genre`, `realisateur`, `acteurs`, `paysProd`, `anneeProd`, `description`, `urlimg`, `urlvideo`, `lieu`) VALUES
(1, 'Breaking Bad', 1, 'Drame', 'Vince Gilligan', 'Bryan Cransto, Aaron Paul, Anna Gunn', 'Amérique', 2008, 'Breaking Bad ou Breaking Bad : Le Chimiste au Québec est une série télévisée américaine en 62 épisodes de 47 minutes, créée par Vince Gilligan, diffusée simultanément du 20 janvier 2008 au 29 septembre 2013 sur AMC.', 'http://traveling.corentindechomet.fr/imgs/breakingbad.jpg', 'imgs/breakingbad.mp4', 'New Mexico'),
(2, 'Memories of Murder', 0, 'Polar', 'Bong Joon-Ho', 'Song Kang-ho, Kim Sang-Kyung, Kim Roe-Ha', 'Corée du Sud', 2003, 'Un tueur en série assassine 10 femmes sans laisser le moindre indice. Dès le début de l''enquête, la police locale est dépassée par les événements.', 'http://traveling.corentindechomet.fr/imgs/breakingbad.jpg', 'imgs/memoriesofmurder.mp4', 'corée du sud'),
(3, 'True Detective', 1, 'Policière', 'Nic Pizzolatto', 'Matthew McConaughey, Woody Harrelson', 'Amérique', 2014, 'A chaque saison, son histoire. True Detective nous embarque dans des récits policiers mêlant mysticisme, réflexions philosophiques et personnages torturés.', 'http://traveling.corentindechomet.fr/imgs/breakingbad.jpg', 'imgs/truedetective.mp4', 'Louisianne'),
(4, 'Fargo', 0, 'Policier', 'Ethan Coen et Joel Coen	', 'Frances McDormand, William H. Macy, Steve Buscemi', 'Amérique', 1996, 'Ecrasé par ses dettes, Jerry tente d''escroquer son beau-père en kidnappant sa femme. Pourtant, les choses ne se déroulent pas comme prévu...', 'http://traveling.corentindechomet.fr/imgs/breakingbad.jpg', 'imgs/fargo.mp4', 'North Dakota'),
(5, 'Taxi Driver', 0, 'Policier', 'Martin Scorcese', 'Robert De Niro, Jodie Foster, Harvey Keitel', 'Amérique', 1976, 'Travis Bickle, pour échapper à l''ennui et à la solitude, devient chauffeur de taxi nocturne. Confronté à la violence des nuits new-yorkaise, il dévient fou et veut se faire justicier.', 'http://traveling.corentindechomet.fr/imgs/breakingbad.jpg', 'imgs/taxidriver.mp4', 'New york'),
(6, 'Stalker', 0, 'Fantastique	', 'Andreï Tarkovski', 'Alexandre Kaidanovski, Alissa Feindikh, Anatoli Solonitsyne', 'Russie', 1979, 'Un guide ou "stalker" conduit 2 hommes, l''un professeur et l''autre écrivain à travers une zone connue comme La Chambre afin d''exaucer tous leurs vœux.', 'http://traveling.corentindechomet.fr/imgs/breakingbad.jpg', 'imgs/stalker.mp4', 'Estonie'),
(7, 'The King of Kong', 2, 'E-sport	', 'Seth Gordon', 'Steve Wiebe, Billy Mitchell, Walter Day', 'Amérique', 2007, 'Un professeur de sciences d''école primaire et un nabab de la sauce se disputent le record mondial du Guiness Book à Donkey Kong, le classique du jeu vidéo en arcade. Steve Wiebe et Billy Mitchell, sous la férule de l''autorité en la matière, Twin Galaxies, se livrent un duel au high-score pour savoir qui pourra être sacré le King of Kong. Au cours de ce périple, les deux hommes ont appris des leçons valables au sujet de ce que signifie être un père, un mari, ou un véritable champion. Vous n''avez pas forcément besoin de gagner pour être un gagnant.', 'http://traveling.corentindechomet.fr/imgs/breakingbad.jpg', 'imgs/kingofkong.mp4', 'usa'),
(8, 'OSS 117 : Rio ne répond plus', 0, 'Comédie', 'Michel Hazanavicius', 'Jean Dujardin, Louise Monot, Rüdiger Vogler', 'France', 2009, 'OSS 117 est de retour, cette fois-ci à la poursuite d''un maître chanteur nazi. Notre agent fait équipe avec la plus séduisante lieutenante du Mossad.', 'http://traveling.corentindechomet.fr/imgs/breakingbad.jpg', 'imgs/oss117rionerepondplus.mp4', 'Rio de Janeiro'),
(9, 'Into the Wild', 0, 'Road Trip', 'Sean Penn', 'Emile Hirsch, Marcia Gay Harden, William Hurt', 'France', 2007, 'Christopher a 22 ans et une soif d''absolu et de liberté sans limites. Il plaque tout du jour au lendemain pour partir à l''aventure.', 'http://traveling.corentindechomet.fr/imgs/breakingbad.jpg', 'imgs/intothewild.mp4', 'Usa');

-- --------------------------------------------------------

--
-- Structure de la table `scene`
--

CREATE TABLE `scene` (
  `nomScene` varchar(255) NOT NULL,
  `Lat` varchar(255) NOT NULL,
  `Lng` varchar(255) NOT NULL,
  `description` text CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `urlImgScene` varchar(255) NOT NULL,
  `idOeuvre` int(11) NOT NULL,
  `idLieu` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `scene`
--

INSERT INTO `scene` (`nomScene`, `Lat`, `Lng`, `description`, `urlImgScene`, `idOeuvre`, `idLieu`) VALUES
('Car Wash', '35.1082845', '-106.5377531', 'Le fameux Car Wash, ou Walter White travaille au tout début de la série.', 'http://traveling.corentindechomet.fr/imgs/carwash.png', 1, 0),
('La maison de Walter et Skyler White', '35.1261057', '-106.5387445', 'La maison de Walter et Skyler White ne paie pas de mine : toutes les maisons de ce quartier résidentiel se ressemblent. La maison est habitée, mieux vaut ne pas trainer. On peut voir la maison au 3828 Piermont Dr NE.', 'http://traveling.corentindechomet.fr/imgs/walthouse.jpg', 1, 0),
('Los Pollos Hermanos', '35.0146338', '-106.6885397', 'Los Pollos Hermanos existent… c’est une chaîne de fast food, depuis 15 ans, qui fait du tex mex, mais qui s’appelle en fait Twisters. Rendez-vous au 4257 Isleta Blv SW pour voir l’original !', 'http://traveling.corentindechomet.fr/imgs/LosPollosHermanos.jpg', 1, 0);

--
-- Index pour les tables exportées
--

--
-- Index pour la table `lieu`
--
ALTER TABLE `lieu`
  ADD PRIMARY KEY (`idLieu`);

--
-- Index pour la table `oeuvres`
--
ALTER TABLE `oeuvres`
  ADD PRIMARY KEY (`idOeuvre`),
  ADD UNIQUE KEY `idFilm` (`idOeuvre`);

--
-- Index pour la table `scene`
--
ALTER TABLE `scene`
  ADD PRIMARY KEY (`nomScene`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `lieu`
--
ALTER TABLE `lieu`
  MODIFY `idLieu` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `oeuvres`
--
ALTER TABLE `oeuvres`
  MODIFY `idOeuvre` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
