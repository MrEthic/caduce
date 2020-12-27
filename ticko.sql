-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  Dim 27 déc. 2020 à 21:54
-- Version du serveur :  10.4.11-MariaDB
-- Version de PHP :  7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `ticko`
--

-- --------------------------------------------------------

--
-- Structure de la table `acces`
--

CREATE TABLE `acces` (
  `acces_id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `page_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `adresse`
--

CREATE TABLE `adresse` (
  `id_adresse` int(11) NOT NULL,
  `line_a` varchar(255) NOT NULL,
  `line_b` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `zip` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `adresse`
--

INSERT INTO `adresse` (`id_adresse`, `line_a`, `line_b`, `city`, `zip`, `country`) VALUES
(1, 'ok', 'ok', 'Goussainville', '95280', 'France');

-- --------------------------------------------------------

--
-- Structure de la table `boitier`
--

CREATE TABLE `boitier` (
  `id_boitier` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `capteur`
--

CREATE TABLE `capteur` (
  `id_capteur` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `tension` float NOT NULL,
  `température` float NOT NULL,
  `humidite` float NOT NULL,
  `id_boitier` int(11) NOT NULL,
  `id_type` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `capteur`
--

INSERT INTO `capteur` (`id_capteur`, `name`, `tension`, `température`, `humidite`, `id_boitier`, `id_type`) VALUES
(1, '', 1, 2, 3, 0, 0),
(2, '', 2, 3, 3, 0, 0),
(3, '', 1, 2, 3, 0, 0),
(4, '', 4, 5, 6, 0, 0),
(5, '', 3, 5, 5, 0, 0),
(6, '', 6, 7, 2, 0, 0),
(7, '', 2, 4, 2, 0, 0),
(8, '', 0, 3, 7, 0, 0);

-- --------------------------------------------------------

--
-- Structure de la table `conversation`
--

CREATE TABLE `conversation` (
  `id_conv` int(11) NOT NULL,
  `id_user` varchar(255) NOT NULL,
  `open_datetime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `conv_message`
--

CREATE TABLE `conv_message` (
  `id_message` int(11) NOT NULL,
  `id_conversation` int(11) NOT NULL,
  `content` varchar(255) NOT NULL,
  `is_answer` tinyint(1) NOT NULL,
  `sent_datetime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `faq_questions`
--

CREATE TABLE `faq_questions` (
  `id_question` int(11) NOT NULL,
  `question` text CHARACTER SET latin1 NOT NULL,
  `answer` text CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `faq_questions`
--

INSERT INTO `faq_questions` (`id_question`, `question`, `answer`) VALUES
(29, 'Comment obtenir mes résultats de mesure ?', ' Nous vous inviter à vous connecter puis dans la rubrique <a href=\"connexion.html\"> mon compte</a>, vous aurez accès à \"Mes résultats'),
(30, 'Quels sont les délais d\'attente pour obtenir mes résultats de mesure ?', 'Les résultats sont disponibles après avoir relevé les mesures. En cas de problème, veuillez contacter l\'administrateur à l\'adresse suivante :  <u> 4DGTadmin@gmail.com </u>'),
(31, 'Par quels moyens pouvez-vous déduire les mesures  ?', 'Les mesures prises font appel à des formules scientifiques. Par conséquent, l\'aléatoire est exclu sauf à défaut du matériel utilisé.'),
(32, 'Je n\'arrive plus à me connecter, est-ce normal ? ', ' Nous vous invitons à cliquer sur \"mot de passe oublié\" lors de la connexion. Si le problème persiste, veuillez contacter l\'administrateur à l\'adresse suivante :  <u> 4DGTadmin@gmail.com </u>pour obtenir un nouveau identifiant	    pour obtenir un nouveau identifiant '),
(33, 'Mes informations enregistrées seront utilisées à des fins personnelles ?', 'En vigueur du règlement n°2016/679 dit règlement général sur la protection des données (RGPD), vos informations recueillies auprès de 4DGT.com sont uniquement utilisées pour réaliser des statistiques\r\n		   . Pour plus d\'informations, veuillez consulter les conditions générales d\'utilisation et les mentions légales (voir ci-dessous de la FAQ)'),
(34, 'Quelles sont les conditions nécessaires pour qu on puisse prendre mes mesures ? ', 'dadd');

-- --------------------------------------------------------

--
-- Structure de la table `hospital`
--

CREATE TABLE `hospital` (
  `id_hospital` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `id_adresse` int(11) NOT NULL,
  `id_boitier` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `hospital`
--

INSERT INTO `hospital` (`id_hospital`, `name`, `id_adresse`, `id_boitier`) VALUES
(1, 'Paris Nord', 1, 1);

-- --------------------------------------------------------

--
-- Structure de la table `page`
--

CREATE TABLE `page` (
  `page_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `resultat`
--

CREATE TABLE `resultat` (
  `id_resultat` int(11) NOT NULL,
  `id_test` int(11) NOT NULL,
  `id_capteur` int(11) NOT NULL,
  `valeur` varchar(255) NOT NULL,
  `mesure_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `role`
--

CREATE TABLE `role` (
  `id_role` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `test`
--

CREATE TABLE `test` (
  `id_test` int(11) NOT NULL,
  `start_datetime` datetime NOT NULL,
  `id_user` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `ticket`
--

CREATE TABLE `ticket` (
  `id_ticket` int(11) NOT NULL,
  `id_hospital` int(11) NOT NULL,
  `objet` varchar(255) NOT NULL,
  `is_live` tinyint(1) NOT NULL,
  `open_datetime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `tickets`
--

CREATE TABLE `tickets` (
  `idticket` int(11) NOT NULL,
  `date_open` date NOT NULL,
  `numticket` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `nss` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `sujet` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `message` text COLLATE utf8_unicode_ci NOT NULL,
  `priorite` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `etat` varchar(15) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `tickets`
--

INSERT INTO `tickets` (`idticket`, `date_open`, `numticket`, `nss`, `sujet`, `message`, `priorite`, `etat`) VALUES
(364, '2020-11-26', '20201126200653', 'Admin', '[REPLY][REPLY]', 'vvvvvvvvvvvvvv', 'important', 'inachevÃ©'),
(375, '2020-11-26', '20201126201823', 'Admin', 'sd[REPLY]', 'rÃ©solu', 'Urgent', 'achevÃ©'),
(376, '2020-11-26', '20201126201903', '541233', 'connexion 2', 'bnbnnb', 'important', 'En cours'),
(378, '2020-11-26', '20201126201917', 'Admin', 'nnnnn[REPLY]', 'bnbnnbnb', 'Urgent', 'achevÃ©'),
(379, '2020-11-26', '20201126202018', '541233', 'connexion 2', 'qssqqsqs', 'important', 'En cours'),
(380, '2020-11-26', '20201126202025', '541233', 'qqqq', 'qqqqqqqqqqqqqqq', 'important', 'En cours'),
(381, '2020-11-26', '20201126202157', 'Admin', 'connexion 2[REPLY]', 'd accord vous voyez ceci ', 'Urgent', 'achevÃ©'),
(382, '2020-11-26', '20201126202240', '123456', 'au secours !', 'aidez moi lol!! --', 'non important', 'En cours'),
(383, '2020-11-26', '20201126202250', 'Admin', 'au secours ![REPLY]', 'pas de souci ----', 'Urgent', 'achevÃ©'),
(386, '2020-11-26', '20201126202448', 'Admin', 'connexion 2[REPLY]', 'ok voilÃ  la clÃ©', 'Urgent', 'achevÃ©'),
(388, '2020-11-26', '20201126202931', 'Admin', 'fff[REPLY]', 'voila sacdffd', 'Urgent', 'achevÃ©');

-- --------------------------------------------------------

--
-- Structure de la table `ticket_message`
--

CREATE TABLE `ticket_message` (
  `id_message` int(11) NOT NULL,
  `id_ticket` int(11) NOT NULL,
  `content` varchar(255) NOT NULL,
  `is_answer` tinyint(1) NOT NULL,
  `sent_datetime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `type_capteur`
--

CREATE TABLE `type_capteur` (
  `id_type` int(11) NOT NULL,
  `type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `NSS` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `Nom` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `Prénom` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `Mail` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `Tel` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `id_adresse` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `id_hospital` int(11) NOT NULL,
  `is_suspended` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id_user`, `NSS`, `Nom`, `Prénom`, `Mail`, `password`, `Tel`, `id_adresse`, `role_id`, `id_hospital`, `is_suspended`) VALUES
(1, '123456789999999', 'la', 'Alexandre', 'bajonbajon@hotmail.fr', '$2y$10$fTnoMFERFo.5RjFZDUttDe7x1M14Gm55TgnPKkeO12XTHugtRtfZK', '0783180600', 1, 1, 1, 0),
(2, '123456789123456', 'da', 'mana', 'dsfsdfdfs@gmail.com', '$2y$10$Mgw0ZE.QBfII6fTCsipzLOOikxtbB0ngtt4QBoXHQ4dIZFxdpgOua', '0783180600', 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `NSS` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Nom` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Prénom` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `tel` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `mail` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `NSS`, `Nom`, `Prénom`, `tel`, `mail`) VALUES
(1, '12345678', 'dsdsd', 'sdds', '0122244', 'dodan@gmail.com');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `acces`
--
ALTER TABLE `acces`
  ADD PRIMARY KEY (`acces_id`),
  ADD KEY `Acces_fk0` (`role_id`),
  ADD KEY `Acces_fk1` (`page_id`);

--
-- Index pour la table `adresse`
--
ALTER TABLE `adresse`
  ADD PRIMARY KEY (`id_adresse`);

--
-- Index pour la table `boitier`
--
ALTER TABLE `boitier`
  ADD PRIMARY KEY (`id_boitier`);

--
-- Index pour la table `capteur`
--
ALTER TABLE `capteur`
  ADD PRIMARY KEY (`id_capteur`),
  ADD KEY `Capteur_fk0` (`id_boitier`),
  ADD KEY `Capteur_fk1` (`id_type`);

--
-- Index pour la table `conversation`
--
ALTER TABLE `conversation`
  ADD PRIMARY KEY (`id_conv`),
  ADD KEY `Conversation_fk0` (`id_user`(191));

--
-- Index pour la table `conv_message`
--
ALTER TABLE `conv_message`
  ADD PRIMARY KEY (`id_message`),
  ADD KEY `Conv_Message_fk0` (`id_conversation`);

--
-- Index pour la table `faq_questions`
--
ALTER TABLE `faq_questions`
  ADD PRIMARY KEY (`id_question`);

--
-- Index pour la table `hospital`
--
ALTER TABLE `hospital`
  ADD PRIMARY KEY (`id_hospital`),
  ADD KEY `Hospital_fk0` (`id_adresse`),
  ADD KEY `Hospital_fk1` (`id_boitier`);

--
-- Index pour la table `page`
--
ALTER TABLE `page`
  ADD PRIMARY KEY (`page_id`);

--
-- Index pour la table `resultat`
--
ALTER TABLE `resultat`
  ADD PRIMARY KEY (`id_resultat`),
  ADD KEY `Resultat_fk0` (`id_test`),
  ADD KEY `Resultat_fk1` (`id_capteur`);

--
-- Index pour la table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id_role`);

--
-- Index pour la table `test`
--
ALTER TABLE `test`
  ADD PRIMARY KEY (`id_test`),
  ADD KEY `Test_fk0` (`id_user`(191));

--
-- Index pour la table `ticket`
--
ALTER TABLE `ticket`
  ADD PRIMARY KEY (`id_ticket`),
  ADD KEY `Ticket_fk0` (`id_hospital`);

--
-- Index pour la table `tickets`
--
ALTER TABLE `tickets`
  ADD PRIMARY KEY (`idticket`);

--
-- Index pour la table `ticket_message`
--
ALTER TABLE `ticket_message`
  ADD PRIMARY KEY (`id_message`),
  ADD KEY `Ticket_Message_fk0` (`id_ticket`);

--
-- Index pour la table `type_capteur`
--
ALTER TABLE `type_capteur`
  ADD PRIMARY KEY (`id_type`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `acces`
--
ALTER TABLE `acces`
  MODIFY `acces_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `adresse`
--
ALTER TABLE `adresse`
  MODIFY `id_adresse` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `boitier`
--
ALTER TABLE `boitier`
  MODIFY `id_boitier` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `capteur`
--
ALTER TABLE `capteur`
  MODIFY `id_capteur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `conversation`
--
ALTER TABLE `conversation`
  MODIFY `id_conv` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `conv_message`
--
ALTER TABLE `conv_message`
  MODIFY `id_message` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `faq_questions`
--
ALTER TABLE `faq_questions`
  MODIFY `id_question` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT pour la table `hospital`
--
ALTER TABLE `hospital`
  MODIFY `id_hospital` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `page`
--
ALTER TABLE `page`
  MODIFY `page_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `resultat`
--
ALTER TABLE `resultat`
  MODIFY `id_resultat` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `role`
--
ALTER TABLE `role`
  MODIFY `id_role` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `test`
--
ALTER TABLE `test`
  MODIFY `id_test` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `tickets`
--
ALTER TABLE `tickets`
  MODIFY `idticket` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=389;

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
