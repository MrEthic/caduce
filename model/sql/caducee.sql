-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : lun. 23 nov. 2020 à 21:15
-- Version du serveur :  10.4.14-MariaDB
-- Version de PHP : 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `caducee`
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
  `id_boitier` int(11) NOT NULL,
  `id_type` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
  `question` varchar(255) NOT NULL,
  `answer` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
  `NSS` varchar(255) NOT NULL,
  `Nom` varchar(255) NOT NULL,
  `Prénom` varchar(255) NOT NULL,
  `Mail` varchar(255) NOT NULL,
  `hash_password` varchar(255) NOT NULL,
  `Tel` varchar(255) NOT NULL,
  `id_adresse` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `id_hospital` int(11) NOT NULL,
  `is_suspended` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
  ADD KEY `Conversation_fk0` (`id_user`);

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
  ADD KEY `Test_fk0` (`id_user`);

--
-- Index pour la table `ticket`
--
ALTER TABLE `ticket`
  ADD PRIMARY KEY (`id_ticket`),
  ADD KEY `Ticket_fk0` (`id_hospital`);

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
  ADD PRIMARY KEY (`NSS`),
  ADD KEY `User_fk0` (`id_adresse`),
  ADD KEY `User_fk1` (`role_id`),
  ADD KEY `User_fk2` (`id_hospital`);

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
  MODIFY `id_adresse` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `boitier`
--
ALTER TABLE `boitier`
  MODIFY `id_boitier` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `capteur`
--
ALTER TABLE `capteur`
  MODIFY `id_capteur` int(11) NOT NULL AUTO_INCREMENT;

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
  MODIFY `id_question` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `hospital`
--
ALTER TABLE `hospital`
  MODIFY `id_hospital` int(11) NOT NULL AUTO_INCREMENT;

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
-- AUTO_INCREMENT pour la table `ticket`
--
ALTER TABLE `ticket`
  MODIFY `id_ticket` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `ticket_message`
--
ALTER TABLE `ticket_message`
  MODIFY `id_message` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `type_capteur`
--
ALTER TABLE `type_capteur`
  MODIFY `id_type` int(11) NOT NULL AUTO_INCREMENT;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `acces`
--
ALTER TABLE `acces`
  ADD CONSTRAINT `Acces_fk0` FOREIGN KEY (`role_id`) REFERENCES `role` (`id_role`),
  ADD CONSTRAINT `Acces_fk1` FOREIGN KEY (`page_id`) REFERENCES `page` (`page_id`);

--
-- Contraintes pour la table `capteur`
--
ALTER TABLE `capteur`
  ADD CONSTRAINT `Capteur_fk0` FOREIGN KEY (`id_boitier`) REFERENCES `boitier` (`id_boitier`),
  ADD CONSTRAINT `Capteur_fk1` FOREIGN KEY (`id_type`) REFERENCES `type_capteur` (`id_type`);

--
-- Contraintes pour la table `conversation`
--
ALTER TABLE `conversation`
  ADD CONSTRAINT `Conversation_fk0` FOREIGN KEY (`id_user`) REFERENCES `user` (`NSS`);

--
-- Contraintes pour la table `conv_message`
--
ALTER TABLE `conv_message`
  ADD CONSTRAINT `Conv_Message_fk0` FOREIGN KEY (`id_conversation`) REFERENCES `conversation` (`id_conv`);

--
-- Contraintes pour la table `hospital`
--
ALTER TABLE `hospital`
  ADD CONSTRAINT `Hospital_fk0` FOREIGN KEY (`id_adresse`) REFERENCES `adresse` (`id_adresse`),
  ADD CONSTRAINT `Hospital_fk1` FOREIGN KEY (`id_boitier`) REFERENCES `boitier` (`id_boitier`);

--
-- Contraintes pour la table `resultat`
--
ALTER TABLE `resultat`
  ADD CONSTRAINT `Resultat_fk0` FOREIGN KEY (`id_test`) REFERENCES `test` (`id_test`),
  ADD CONSTRAINT `Resultat_fk1` FOREIGN KEY (`id_capteur`) REFERENCES `capteur` (`id_capteur`);

--
-- Contraintes pour la table `test`
--
ALTER TABLE `test`
  ADD CONSTRAINT `Test_fk0` FOREIGN KEY (`id_user`) REFERENCES `user` (`NSS`);

--
-- Contraintes pour la table `ticket`
--
ALTER TABLE `ticket`
  ADD CONSTRAINT `Ticket_fk0` FOREIGN KEY (`id_hospital`) REFERENCES `hospital` (`id_hospital`);

--
-- Contraintes pour la table `ticket_message`
--
ALTER TABLE `ticket_message`
  ADD CONSTRAINT `Ticket_Message_fk0` FOREIGN KEY (`id_ticket`) REFERENCES `ticket` (`id_ticket`);

--
-- Contraintes pour la table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `User_fk0` FOREIGN KEY (`id_adresse`) REFERENCES `adresse` (`id_adresse`),
  ADD CONSTRAINT `User_fk1` FOREIGN KEY (`role_id`) REFERENCES `role` (`id_role`),
  ADD CONSTRAINT `User_fk2` FOREIGN KEY (`id_hospital`) REFERENCES `hospital` (`id_hospital`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
