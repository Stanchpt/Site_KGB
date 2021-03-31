-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : jeu. 01 avr. 2021 à 00:08
-- Version du serveur :  10.4.17-MariaDB
-- Version de PHP : 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `bdd_site_kgb`
--

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

CREATE TABLE `admin` (
  `idadmin` char(6) NOT NULL,
  `nom` varchar(255) DEFAULT NULL,
  `prenom` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `mdp` varchar(255) DEFAULT NULL,
  `datecreation` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `admin`
--

INSERT INTO `admin` (`idadmin`, `nom`, `prenom`, `email`, `mdp`, `datecreation`) VALUES
('ad1', 'Abakohev', 'Dimitri', 'Dimitri.Abakohev@gmail.com', 'admin1', '2021-03-27'),
('ad2', 'Aksionov', 'Denis', 'Denis.Aksionov@gmail.com', 'admin2', '2021-03-27'),
('ad3', NULL, NULL, 'admin@admin.com', 'admin', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `agents`
--

CREATE TABLE `agents` (
  `id` char(6) NOT NULL,
  `nom` varchar(255) DEFAULT NULL,
  `prenom` varchar(255) DEFAULT NULL,
  `datenaissance` date DEFAULT NULL,
  `login` varchar(255) DEFAULT NULL,
  `mdp` varchar(255) DEFAULT NULL,
  `nationalite` varchar(255) DEFAULT NULL,
  `specialite` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `agents`
--

INSERT INTO `agents` (`id`, `nom`, `prenom`, `datenaissance`, `login`, `mdp`, `nationalite`, `specialite`) VALUES
('ag1', 'Koslov', 'Vladimir', '1987-06-15', 'Cutter', 'agent1', 'Russie', 'Assassinat, Torture'),
('ag2', NULL, NULL, NULL, 'agent', 'agent1', NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `cibles`
--

CREATE TABLE `cibles` (
  `idcible` int(11) NOT NULL,
  `nom` varchar(255) DEFAULT NULL,
  `prenom` varchar(255) DEFAULT NULL,
  `datenaissance` date DEFAULT NULL,
  `nom2code` varchar(255) DEFAULT NULL,
  `nationalite` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `contacts`
--

CREATE TABLE `contacts` (
  `idcontact` int(11) NOT NULL,
  `nom` varchar(255) DEFAULT NULL,
  `prenom` varchar(255) DEFAULT NULL,
  `datenaissance` date DEFAULT NULL,
  `nomcode` varchar(255) DEFAULT NULL,
  `nationalite` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `etat`
--

CREATE TABLE `etat` (
  `id` char(2) NOT NULL,
  `libelle` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `etat`
--

INSERT INTO `etat` (`id`, `libelle`) VALUES
('CH', 'Echec'),
('EC', 'En cours'),
('EP', 'En preparation'),
('TR', 'Terminé');

-- --------------------------------------------------------

--
-- Structure de la table `missions`
--

CREATE TABLE `missions` (
  `idmission` char(6) NOT NULL,
  `titre` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `nom2code` varchar(255) DEFAULT NULL,
  `pays` varchar(255) DEFAULT NULL,
  `nbagents` int(5) DEFAULT NULL,
  `nbcontact` int(5) DEFAULT NULL,
  `nbcible` int(5) DEFAULT NULL,
  `typemission` varchar(255) DEFAULT NULL,
  `statutmission` varchar(255) DEFAULT NULL,
  `nbplanque` int(5) DEFAULT NULL,
  `specialiterequise` varchar(255) DEFAULT NULL,
  `datedeb` date DEFAULT NULL,
  `datefin` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `missions`
--

INSERT INTO `missions` (`idmission`, `titre`, `description`, `nom2code`, `pays`, `nbagents`, `nbcontact`, `nbcible`, `typemission`, `statutmission`, `nbplanque`, `specialiterequise`, `datedeb`, `datefin`) VALUES
('m1', 'Assassinat d\'un particulier ', 'Un haut dirigeant demande de faire taire une personne qui peut lui poser problème. ', 'Griffe', 'Italie', 1, 3, 1, 'Assassinat ', 'EP', 1, 'Assassinat, infiltration, Surveillance', NULL, NULL),
('m2', 'L\'assassinat de la poupée', 'Une action rapide et précis, elle est trouvable en ville et elle est très facilement approchable car très sociable.\r\nElle habite à Moscow. On te demande une approche simple et efficace, et surtout un travail rapide.', 'Harpie', 'Russie', 1, 1, 1, 'Assassinat', 'EP', 1, 'Assasinat, surveillance', NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `pays`
--

CREATE TABLE `pays` (
  `id` int(11) NOT NULL,
  `nom` varchar(200) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `pays`
--

INSERT INTO `pays` (`id`, `nom`) VALUES
(1, 'Afghanistan'),
(2, 'Afrique du Sud'),
(3, 'Albanie'),
(4, 'Algérie'),
(5, 'Allemagne'),
(6, 'Andorre'),
(7, 'Angola'),
(8, 'Anguilla'),
(9, 'Antarctique'),
(10, 'Antigua-et-Barbuda'),
(11, 'Antilles néerlandaises'),
(12, 'Arabie saoudite'),
(13, 'Argentine'),
(14, 'Arménie'),
(15, 'Aruba'),
(16, 'Australie'),
(17, 'Autriche'),
(18, 'Azerbaïdjan'),
(19, 'Bénin'),
(20, 'Bahamas'),
(21, 'Bahreïn'),
(22, 'Bangladesh'),
(23, 'Barbade'),
(24, 'Belau'),
(25, 'Belgique'),
(26, 'Belize'),
(27, 'Bermudes'),
(28, 'Bhoutan'),
(29, 'Biélorussie'),
(30, 'Birmanie'),
(31, 'Bolivie'),
(32, 'Bosnie-Herzégovine'),
(33, 'Botswana'),
(34, 'Brésil'),
(35, 'Brunei'),
(36, 'Bulgarie'),
(37, 'Burkina Faso'),
(38, 'Burundi'),
(39, 'Côte d\'Ivoire'),
(40, 'Cambodge'),
(41, 'Cameroun'),
(42, 'Canada'),
(43, 'Cap-Vert'),
(44, 'Chili'),
(45, 'Chine'),
(46, 'Chypre'),
(47, 'Colombie'),
(48, 'Comores'),
(49, 'Congo'),
(50, 'Corée du Nord'),
(51, 'Corée du Sud'),
(52, 'Costa Rica'),
(53, 'Croatie'),
(54, 'Cuba'),
(55, 'Danemark'),
(56, 'Djibouti'),
(57, 'Dominique'),
(58, 'Égypte'),
(59, 'Émirats arabes unis'),
(60, 'Équateur'),
(61, 'Érythrée'),
(62, 'Espagne'),
(63, 'Estonie'),
(64, 'États-Unis'),
(65, 'Éthiopie'),
(66, 'Finlande'),
(67, 'France'),
(68, 'Géorgie'),
(69, 'Gabon'),
(70, 'Gambie'),
(71, 'Ghana'),
(72, 'Gibraltar'),
(73, 'Grèce'),
(74, 'Grenade'),
(75, 'Groenland'),
(76, 'Guadeloupe'),
(77, 'Guam'),
(78, 'Guatemala'),
(79, 'Guinée'),
(80, 'Guinée équatoriale'),
(81, 'Guinée-Bissao'),
(82, 'Guyana'),
(83, 'Guyane française'),
(84, 'Haïti'),
(85, 'Honduras'),
(86, 'Hong Kong'),
(87, 'Hongrie'),
(88, 'Ile Bouvet'),
(89, 'Ile Christmas'),
(90, 'Ile Norfolk'),
(91, 'Iles Cayman'),
(92, 'Iles Cook'),
(93, 'Iles Féroé'),
(94, 'Iles Falkland'),
(95, 'Iles Fidji'),
(96, 'Iles Géorgie du Sud et Sandwich du Sud'),
(97, 'Iles Heard et McDonald'),
(98, 'Iles Marshall'),
(99, 'Iles Pitcairn'),
(100, 'Iles Salomon'),
(101, 'Iles Svalbard et Jan Mayen'),
(102, 'Iles Turks-et-Caicos'),
(103, 'Iles Vierges américaines'),
(104, 'Iles Vierges britanniques'),
(105, 'Iles des Cocos (Keeling)'),
(106, 'Iles mineures éloignées des États-Unis'),
(107, 'Inde'),
(108, 'Indonésie'),
(109, 'Iran'),
(110, 'Iraq'),
(111, 'Irlande'),
(112, 'Islande'),
(113, 'Israël'),
(114, 'Italie'),
(115, 'Jamaïque'),
(116, 'Japon'),
(117, 'Jordanie'),
(118, 'Kazakhstan'),
(119, 'Kenya'),
(120, 'Kirghizistan'),
(121, 'Kiribati'),
(122, 'Koweït'),
(123, 'Laos'),
(124, 'Lesotho'),
(125, 'Lettonie'),
(126, 'Liban'),
(127, 'Liberia'),
(128, 'Libye'),
(129, 'Liechtenstein'),
(130, 'Lituanie'),
(131, 'Luxembourg'),
(132, 'Macao'),
(133, 'Madagascar'),
(134, 'Malaisie'),
(135, 'Malawi'),
(136, 'Maldives'),
(137, 'Mali'),
(138, 'Malte'),
(139, 'Mariannes du Nord'),
(140, 'Maroc'),
(141, 'Martinique'),
(142, 'Maurice'),
(143, 'Mauritanie'),
(144, 'Mayotte'),
(145, 'Mexique'),
(146, 'Micronésie'),
(147, 'Moldavie'),
(148, 'Monaco'),
(149, 'Mongolie'),
(150, 'Montserrat'),
(151, 'Mozambique'),
(152, 'Népal'),
(153, 'Namibie'),
(154, 'Nauru'),
(155, 'Nicaragua'),
(156, 'Niger'),
(157, 'Nigeria'),
(158, 'Nioué'),
(159, 'Norvège'),
(160, 'Nouvelle-Calédonie'),
(161, 'Nouvelle-Zélande'),
(162, 'Oman'),
(163, 'Ouganda'),
(164, 'Ouzbékistan'),
(165, 'Pérou'),
(166, 'Pakistan'),
(167, 'Panama'),
(168, 'Papouasie-Nouvelle-Guinée'),
(169, 'Paraguay'),
(170, 'Pays-Bas'),
(171, 'Philippines'),
(172, 'Pologne'),
(173, 'Polynésie française'),
(174, 'Porto Rico'),
(175, 'Portugal'),
(176, 'Qatar'),
(177, 'République centrafricaine'),
(178, 'République démocratique du Congo'),
(179, 'République dominicaine'),
(180, 'République tchèque'),
(181, 'Réunion'),
(182, 'Roumanie'),
(183, 'Royaume-Uni'),
(184, 'Russie'),
(185, 'Rwanda'),
(186, 'Sénégal'),
(187, 'Sahara occidental'),
(188, 'Saint-Christophe-et-Niévès'),
(189, 'Saint-Marin'),
(190, 'Saint-Pierre-et-Miquelon'),
(191, 'Saint-Siège '),
(192, 'Saint-Vincent-et-les-Grenadines'),
(193, 'Sainte-Hélène'),
(194, 'Sainte-Lucie'),
(195, 'Salvador'),
(196, 'Samoa'),
(197, 'Samoa américaines'),
(198, 'Sao Tomé-et-Principe'),
(199, 'Seychelles'),
(200, 'Sierra Leone'),
(201, 'Singapour'),
(202, 'Slovénie'),
(203, 'Slovaquie'),
(204, 'Somalie'),
(205, 'Soudan'),
(206, 'Sri Lanka'),
(207, 'Suède'),
(208, 'Suisse'),
(209, 'Suriname'),
(210, 'Swaziland'),
(211, 'Syrie'),
(212, 'Taïwan'),
(213, 'Tadjikistan'),
(214, 'Tanzanie'),
(215, 'Tchad'),
(216, 'Terres australes françaises'),
(217, 'Territoire britannique de l\'Océan Indien'),
(218, 'Thaïlande'),
(219, 'Timor Oriental'),
(220, 'Togo'),
(221, 'Tokélaou'),
(222, 'Tonga'),
(223, 'Trinité-et-Tobago'),
(224, 'Tunisie'),
(225, 'Turkménistan'),
(226, 'Turquie'),
(227, 'Tuvalu'),
(228, 'Ukraine'),
(229, 'Uruguay'),
(230, 'Vanuatu'),
(231, 'Venezuela'),
(232, 'Viet Nam'),
(233, 'Wallis-et-Futuna'),
(234, 'Yémen'),
(235, 'Yougoslavie'),
(236, 'Zambie'),
(237, 'Zimbabwe'),
(238, 'ex-République yougoslave de Macédoine');

-- --------------------------------------------------------

--
-- Structure de la table `planques`
--

CREATE TABLE `planques` (
  `idplanque` int(11) NOT NULL,
  `code` varchar(255) DEFAULT NULL,
  `adresse` varchar(255) DEFAULT NULL,
  `pays` varchar(255) DEFAULT NULL,
  `typeplanque` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `planques`
--

INSERT INTO `planques` (`idplanque`, `code`, `adresse`, `pays`, `typeplanque`) VALUES
(1, '0007693', '37 rue de la grande place', 'France', NULL),
(2, '009963', '34 chester road', 'Angletterre', NULL),
(3, '158963', '23, Llynka Street', 'Russie', NULL),
(4, '156893', 'Jingumae 1-Choume', 'Japon', NULL),
(5, '854726', '41 avenue Leon Jouhaux', 'Italie', NULL);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`idadmin`);

--
-- Index pour la table `agents`
--
ALTER TABLE `agents`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `cibles`
--
ALTER TABLE `cibles`
  ADD PRIMARY KEY (`idcible`);

--
-- Index pour la table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`idcontact`);

--
-- Index pour la table `etat`
--
ALTER TABLE `etat`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `missions`
--
ALTER TABLE `missions`
  ADD PRIMARY KEY (`idmission`),
  ADD KEY `statutmission` (`statutmission`);

--
-- Index pour la table `pays`
--
ALTER TABLE `pays`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `planques`
--
ALTER TABLE `planques`
  ADD PRIMARY KEY (`idplanque`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `cibles`
--
ALTER TABLE `cibles`
  MODIFY `idcible` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `idcontact` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `pays`
--
ALTER TABLE `pays`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=239;

--
-- AUTO_INCREMENT pour la table `planques`
--
ALTER TABLE `planques`
  MODIFY `idplanque` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `missions`
--
ALTER TABLE `missions`
  ADD CONSTRAINT `missions_ibfk_1` FOREIGN KEY (`statutmission`) REFERENCES `etat` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
