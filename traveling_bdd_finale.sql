-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Dim 18 Décembre 2016 à 18:47
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
  `latitude` varchar(15) NOT NULL,
  `longitude` varchar(15) NOT NULL,
  `urlvideo` varchar(255) NOT NULL,
  `videoFrame` varchar(255) NOT NULL,
  `urlImgLieu` varchar(255) NOT NULL,
  `pays` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `lieu`
--

INSERT INTO `lieu` (`idLieu`, `nomLieu`, `adresse`, `ville`, `categorie`, `description`, `latitude`, `longitude`, `urlvideo`, `videoFrame`, `urlImgLieu`, `pays`, `type`) VALUES
(1, 'paris', '', 'paris', 'ville , amoureux', '', '48.8534100', '2.3488000', 'imgs/paris.mp4', 'http://traveling.corentindechomet.fr/imgs/imgsResponsive/lieux/paris_frame.jpg', 'imgs/paris.jpeg', 'france', 'ville'),
(2, 'londres', '', 'londres', 'ville , amoureux', '', '51.5085300', '-0.1257400', 'imgs/londres.mp4', 'http://traveling.corentindechomet.fr/imgs/imgsResponsive/lieux/londres_frame.jpg', 'imgs/londres.jpg', 'Angleterre', 'ville'),
(3, 'los angeles', '', 'los angeles', 'ville', '', '34.0522300', '-118.2436800', 'imgs/losangeles.mp4', 'http://traveling.corentindechomet.fr/imgs/imgsResponsive/lieux/losangeles.jpg', 'imgs/losangeles.jpg', 'usa', 'ville'),
(4, 'new york', '', 'new york', 'ville , amoureux', '', '40.7142700', '-74.0059700', 'imgs/newyork.mp4', 'http://traveling.corentindechomet.fr/imgs/imgsResponsive/lieux/newyork_frame.jpg', 'imgs/newyork.jpg', 'usa', 'ville'),
(5, 'tokyo', '', 'tokyo', 'ville', '', '35.6895000', '139.6917100', 'imgs/tokyo.mp4', 'http://traveling.corentindechomet.fr/imgs/imgsResponsive/lieux/tokyo_frame.jpg', 'imgs/tokyo.jpg', 'japon', 'ville'),
(6, 'californie', '', '', 'nature', '', '0', '0', 'imgs/californie.mp4', 'http://traveling.corentindechomet.fr/imgs/imgsResponsive/lieux/californie_frame.jpg', 'imgs/californie.jpg', 'usa', 'nature'),
(7, 'New Mexico', '', '', 'nature', '', '0', '0', 'imgs/texas.mp4', 'http://traveling.corentindechomet.fr/imgs/imgsResponsive/lieux/texas_frame.jpg', 'imgs/newmexico.jpg', 'usa', 'nature'),
(8, 'alpes', '', '', 'nature', '', '0', '0', 'imgs/alpes.mp4', 'http://traveling.corentindechomet.fr/imgs/imgsResponsive/lieux/alpes_frame.jpg', 'imgs/alpes.jpg', 'Europe', 'nature'),
(9, 'west coast', '', '', 'nature', '', '0', '0', 'imgs/westcoast.mp4', 'http://traveling.corentindechomet.fr/imgs/imgsResponsive/lieux/westcoast_frame.jpg', 'imgs/westcoast.jpg', 'usa', 'nature'),
(10, 'Venise', '', 'venise', 'ville , amoureux', '', '45.4371300', '12.3326500', 'imgs/venise.mp4', 'http://traveling.corentindechomet.fr/imgs/imgsResponsive/lieux/venise_frame.jpg', 'imgs/venise.jpg', 'italie', 'ville');

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
  `videoFrame` varchar(255) NOT NULL,
  `lieu` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `oeuvres`
--

INSERT INTO `oeuvres` (`idOeuvre`, `titreOeuvre`, `type`, `genre`, `realisateur`, `acteurs`, `paysProd`, `anneeProd`, `description`, `urlimg`, `urlvideo`, `videoFrame`, `lieu`) VALUES
(1, 'Breaking Bad', 1, 'Drame', 'Vince Gilligan', 'Bryan Cransto, Aaron Paul, Anna Gunn', 'Amérique', 2008, 'Breaking Bad ou Breaking Bad : Le Chimiste au Québec est une série télévisée américaine en 62 épisodes de 47 minutes, créée par Vince Gilligan, diffusée simultanément du 20 janvier 2008 au 29 septembre 2013 sur AMC.', 'http://traveling.corentindechomet.fr/imgs/breakingbad.jpg', 'imgs/breakingbad.mp4', 'http://traveling.corentindechomet.fr/imgs/imgsResponsive/oeuvres/breakingbad_frame.jpg', 'New Mexico'),
(2, 'Memories of Murder', 0, 'Polar', 'Bong Joon-Ho', 'Song Kang-ho, Kim Sang-Kyung, Kim Roe-Ha', 'Corée du Sud', 2003, 'Un tueur en série assassine 10 femmes sans laisser le moindre indice. Dès le début de l''enquête, la police locale est dépassée par les événements.', 'http://traveling.corentindechomet.fr/imgs/memoriesofmurder.jpg', 'imgs/memoriesofmurder.mp4', 'http://traveling.corentindechomet.fr/imgs/imgsResponsive/oeuvres/memoriesofmurder_frame.jpg', 'corée du sud'),
(3, 'True Detective', 1, 'Policière', 'Nic Pizzolatto', 'Matthew McConaughey, Woody Harrelson', 'Amérique', 2014, 'A chaque saison, son histoire. True Detective nous embarque dans des récits policiers mêlant mysticisme, réflexions philosophiques et personnages torturés.', 'http://traveling.corentindechomet.fr/imgs/truedetective.jpg', 'imgs/truedetective.mp4', 'http://traveling.corentindechomet.fr/imgs/imgsResponsive/oeuvres/truedetective_frame.jpg', 'Louisianne'),
(4, 'Fargo', 0, 'Policier', 'Ethan Coen et Joel Coen	', 'Frances McDormand, William H. Macy, Steve Buscemi', 'Amérique', 1996, 'Ecrasé par ses dettes, Jerry tente d''escroquer son beau-père en kidnappant sa femme. Pourtant, les choses ne se déroulent pas comme prévu...', 'http://traveling.corentindechomet.fr/imgs/fargo.jpg', 'imgs/fargo.mp4', 'http://traveling.corentindechomet.fr/imgs/imgsResponsive/oeuvres/fargo_frame.jpg', 'North Dakota'),
(5, 'Taxi Driver', 0, 'Policier', 'Martin Scorcese', 'Robert De Niro, Jodie Foster, Harvey Keitel', 'Amérique', 1976, 'Travis Bickle, pour échapper à l''ennui et à la solitude, devient chauffeur de taxi nocturne. Confronté à la violence des nuits new-yorkaise, il dévient fou et veut se faire justicier.', 'http://traveling.corentindechomet.fr/imgs/taxidriver.jpg', 'imgs/taxidriver.mp4', 'http://traveling.corentindechomet.fr/imgs/imgsResponsive/oeuvres/taxidriver_frame.jpg', 'New york'),
(6, 'Stalker', 0, 'Fantastique	', 'Andreï Tarkovski', 'Alexandre Kaidanovski, Alissa Feindikh, Anatoli Solonitsyne', 'Russie', 1979, 'Un guide ou "stalker" conduit 2 hommes, l''un professeur et l''autre écrivain à travers une zone connue comme La Chambre afin d''exaucer tous leurs vœux.', 'http://traveling.corentindechomet.fr/imgs/stalker.jpg', 'imgs/stalker.mp4', 'http://traveling.corentindechomet.fr/imgs/imgsResponsive/oeuvres/stalker_frame.jpg', 'Estonie'),
(7, 'The King of Kong', 2, 'E-sport	', 'Seth Gordon', 'Steve Wiebe, Billy Mitchell, Walter Day', 'Amérique', 2007, 'Un professeur de sciences d''école primaire et un nabab de la sauce se disputent le record mondial du Guiness Book à Donkey Kong, le classique du jeu vidéo en arcade. Steve Wiebe et Billy Mitchell, sous la férule de l''autorité en la matière, Twin Galaxies, se livrent un duel au high-score pour savoir qui pourra être sacré le King of Kong. Au cours de ce périple, les deux hommes ont appris des leçons valables au sujet de ce que signifie être un père, un mari, ou un véritable champion. Vous n''avez pas forcément besoin de gagner pour être un gagnant.', 'http://traveling.corentindechomet.fr/imgs/thekingofkong.jpg', 'imgs/kingofkong.mp4', 'http://traveling.corentindechomet.fr/imgs/imgsResponsive/oeuvres/kingofkong_frame.jpg', 'usa'),
(8, 'OSS 117 : Rio ne répond plus', 0, 'Comédie', 'Michel Hazanavicius', 'Jean Dujardin, Louise Monot, Rüdiger Vogler', 'France', 2009, 'OSS 117 est de retour, cette fois-ci à la poursuite d''un maître chanteur nazi. Notre agent fait équipe avec la plus séduisante lieutenante du Mossad.', 'http://traveling.corentindechomet.fr/imgs/oss117rio.jpg', 'imgs/oss117rionerepondplus.mp4', 'http://traveling.corentindechomet.fr/imgs/imgsResponsive/oeuvres/oss117rionerepondplus_frame.jpg', 'Rio de Janeiro'),
(9, 'Into the Wild', 0, 'Road Trip', 'Sean Penn', 'Emile Hirsch, Marcia Gay Harden, William Hurt', 'France', 2007, 'Christopher a 22 ans et une soif d''absolu et de liberté sans limites. Il plaque tout du jour au lendemain pour partir à l''aventure.', 'http://traveling.corentindechomet.fr/imgs/intothewild.jpg', 'imgs/intothewild.mp4', 'http://traveling.corentindechomet.fr/imgs/imgsResponsive/oeuvres/intothewild_frame.jpg', 'Usa'),
(10, 'Le fabuleux destin d''Amélie Poulain', 0, 'Comédie', 'Jean-Pierre Jeunet', 'Audrey Tautou, Mathieu Kassovitz, Rufus, Isabelle Nanty', 'France', 2001, 'Amélie, une jeune serveuse dans un bar de Montmartre, passe son temps à observer les gens et à laisser son imagination divaguer. Elle s''est fixé un but : faire le bien de ceux qui l''entourent. Elle invente alors des stratagèmes pour intervenir incognito dans leur existence.', 'http://traveling.corentindechomet.fr/imgs/ameliePoulain.jpg', 'imgs/ameliepoulain.mp4', 'http://traveling.corentindechomet.fr/imgs/imgsResponsive/oeuvres/destinameliePoulain.jpg', 'France'),
(11, 'Minuit à Paris', 0, 'Comédie', 'Woody Allen', ' Owen Wilson, Rachel McAdams, Michael Sheen, Marion Cotillard', 'USA', 2011, 'Un jeune couple d’américains dont le mariage est prévu à l’automne se rend pour quelques jours à Paris. La magie de la capitale ne tarde pas à opérer, tout particulièrement sur le jeune homme amoureux de la Ville-lumière et qui aspire à une autre vie que la sienne.', 'http://traveling.corentindechomet.fr/imgs/minuitAParis.jpg', 'imgs/minuitparis.mp4', 'http://traveling.corentindechomet.fr/imgs/imgsResponsive/oeuvres/minuitParis.jpg', 'Paris');

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
('Braquage à l''italienne - Place St Marc', '45.4341668', '12.336283', 'Place où se retrouvent les braqueurs pour la première fois.', 'imgs/venice_italianjob.jpg', 0, 10),
('Breaking Bad - Car Wash', '35.1082845', '-106.5377531', 'Le fameux Car Wash de Breaking Bad. Après que Walter y ai travaillé un peu pour arrondir ses fin de mois, lui et Skyler en font l''acquisition. Ils y travaillent pour blanchir leur argent.\nEt bien vous pourrez réellement le voir, puisqu''il s''agit d''un vrai Car Wash au nom de "Octopus CarWash".\n9516 Snowheights Cir NE   (Menaul & Eubank)\nAlbuquerque ,  NM   87112  ', 'http://traveling.corentindechomet.fr/imgs/carwash.jpg', 1, 7),
('Breaking Bad - La maison de Walter et Skyler White', '35.1261057', '-106.5387445', 'La fameuse maison de Walter et Skyler White. Elle ne paie pas de mine car toutes les maisons de ce quartier résidentiel se ressemblent. Mais la maison est habitée, donc pour le respect des gens, mieux vaut ne pas rester devant a observer. On se rappellera de certaines scènes connu qui se sont déroulé à cette endroit, même si elles sont innombrables. \nOn peut voir la maison au 3828 Piermont Dr NE.', 'http://traveling.corentindechomet.fr/imgs/walthouse.jpg', 1, 7),
('Breaking Bad - Los Pollos Hermanos', '35.0146338', '-106.6885397', 'Los Pollos Hermanos existent vraiment !C’est une chaîne de fast food qui depuis 15 ans fait du tex mex. Sauf que la chaîne ne s''appelle pas Los Pollos Hermanos, mais en fait Twisters. Vous pourrez venir déguster de délicieuse Taco et Burrito tout en vous sentant plongé dans la série !\nRendez-vous au 4257 Isleta Blv SW pour voir l’original !', 'http://traveling.corentindechomet.fr/imgs/LosPollosHermanos.jpg', 1, 7),
('Collateral - Jazz Club', '34.0047014', '-118.3328788', 'Jazz club où le tueur conclut son deuxième contrat', 'imgs/collateral_jazz.jpg', 0, 3),
('Fargo - Blue Ox Motel', '44.8831052', '-93.0283749', 'La fameuse station service dans lequel les deux voyous s''arrêtent pour aller voir deux prostituées.', 'imgs/fargo_blueoxmotel.jpg', 4, 0),
('Fargo - King of Clubs', '44.9941078', '-93.2516092', 'Bar que l''on peut voir lors de la scène d''introduction du film où l''on peut voir Jerry conclure le deal avec les deux gangsters. Ce bâtiment a malheureusement n''existe plus. Il a été remplacé par un hôpital', 'imgs/fargo_kingofclubs.jpg', 4, 0),
('Fargo - Lakeside Club', '45.049348', '-92.9702564', 'Club dans lequel l''officier qui enquête sur l''enlèvement interroge les deux prostituées', 'imgs/fargo_lakeside.jpg', 4, 0),
('Into the wild - Magic Bus', '63.8730762', '-149.8026593', 'Le bus dans le McCandless termine son voyage.', 'imgs/intothewild_bus.jpg', 9, 0),
('Into the wild - Salvation Mountain', '33.244815', '-115.4852477', 'La montagne haute en couleur que découvre Christophe McCandless dans le film.', 'imgs/intothewild_salvation.jpg', 9, 6),
('Le fabuleux destin d''Amélie Poulain - Métro Abesses', '48.884403', '2.338570', 'Scène inratable d''Amélie Poulain, dans laquelle elle fait la rencontre d''un aveugle.', 'imgs/abbesses.jpg', 10, 1),
('Les Bronzés font du Ski - Station Val d''Isère', '45.4492613,', '6.9693899', 'La station de ski dans lequel se déroule une partie du film.', 'imgs/alpes_bronze.jpg', 0, 8),
('Les délices de Tokyo - La pâtisserie', '35.7495043,139', '139.4660563', 'La pâtisserie principale du film.', 'imgs/tokyodelice_patisserie.jpg', 0, 5),
('Memories of Murder - Scène de Crime', '37.1931843', '126.8575486', 'Lieu marquant du film qui donne l''occasion de découvrir la campagne qui entoure Séoul.', 'imgs/scenecrimememoriesofmurder.jpg', 2, 0),
('Minuit à Paris - Les berges de Seine', '48.863210', '2.309862', 'Dans l''un des quartiers les plus historiques de Paris, Gil et Adriana errent le long de la Seine. L''athmosphère nocturne de cet endroit rend la scène encore plus romantique et le spectateur n''en devient que plus amoureux de Paris.', 'imgs/bergesDeSeine.jpg', 11, 1),
('Point Break - Neptune''s Net', '34.053208', '-118.9646287', 'Café dans lequel Johnny approche Tyler qui travaille dans ce restaurant.', 'imgs/westcoast_neptune.jpg', 0, 9),
('Sherlock - 221B Baker Street', '51.5262303', '-0.1390964', 'L''appartement où vit Sherlock dans la série.', 'imgs/sherlock_bakerst.jpg', 0, 2),
('Stalker - La zone', '59.4176739', '25.1296256', 'La zone se situe dans la campagne de Tallin au bord de la rivière Jägala.', 'imgs/stalker_zone.jpg', 6, 0),
('Stalker - Le portail vers la zone', '59.4338086', '24.8374721', 'Le film a été tourné dans aux alentours de Tallinn en Estonie. Le portail vers la zone se trouve dans la ville même.', 'imgs/stalker_zonegate.jpg', 6, 0),
('Taxi Driver - La tuerie dans l''hôtel', '40.7319774', '-73.9889239', 'Appartement dans lequel se déroule la scène finale où Travis décide de sauver les prostituées en attaquant lourdement armé le bordel.', 'imgs/taxidriver_tuerie.jpg', 5, 4),
('Taxi Driver - Tentative d’assassinat du Sénateur', '40.7680441', '-73.9845609', 'Travis est à bout et décide de tirer sur le sénateur candidat qui fait son discours non loin de Central Park.', 'imgs/taxidriver_columbuscircle.jpg', 5, 0),
('Tentative de record du monde sur Donkey Kong de Steve Wiebe ', '43.6134692', '-71.4787278', 'C''est dans cette salle d''arcade que Steve Wiebe tente de battre officiellement le record du monde officiel sur Donkey Kong détenu par Billy Mitchel', 'imgs/kingofkong_funspot.jpg', 7, 0),
('True Detective - Arbre du meurtre', '29.9714000', ' -90.7693650', 'Sans doute la scène la plus connue de True Detective. C''est ici qu''on retrouve le corps de Dora Lange accompagné de bois de cerf et de tatouages sataniques.', 'http://traveling.corentindechomet.fr/imgs/trueDetectiveTree.jpg', 3, 0),
('True Detective - Bar Fox & Hound', '29.9593787', '-90.1864963', 'Si vous voulez boire un coup, vous pouvez vous arrêter au Fox & Hound. C''est le lieu où se sont rencontré Marty et Beth.', 'http://traveling.corentindechomet.fr/imgs/trueDetectiveFoxAndHound.jpeg', 3, 0),
('True Detective - École Tuttle', '29.975611', '-90.252989', 'Lors de cette scène, Rust interroge un un jardinier en plein travail. Il est loin de se douter du lien entre cette individu et son enquête. Cette école est aujourd''hui a l''abandon.', 'http://traveling.corentindechomet.fr/imgs/trueDetectiveSchool.jpg', 3, 0),
('Twin Galaxies', '41.0162699', '-92.4120887', 'Capitale du jeu vidéo, c''est ici que siège le Twin Galaxies chargé d''homologuer les records du monde des jeux d''arcade.', 'imgs/kingofkong_twin.jpg', 7, 0),
('Vue sur Rio de Janeiro', '-22.945684', '-43.5110847', 'Lorsque Flantier arrive à Rio il profite d''une vue imprenable sur la ville.', 'imgs/oss117_vuerio.jpg', 8, 0);

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
  MODIFY `idLieu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT pour la table `oeuvres`
--
ALTER TABLE `oeuvres`
  MODIFY `idOeuvre` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
