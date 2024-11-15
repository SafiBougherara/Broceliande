-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : ven. 15 nov. 2024 à 23:54
-- Version du serveur : 10.4.32-MariaDB
-- Version de PHP : 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `broceliande`
--

-- --------------------------------------------------------

--
-- Structure de la table `articles`
--

CREATE TABLE `articles` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `adress` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `category` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `surface` varchar(255) NOT NULL,
  `pieces` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `articles`
--

INSERT INTO `articles` (`id`, `title`, `adress`, `content`, `category`, `price`, `surface`, `pieces`, `user_id`) VALUES
(1, 'Villa exceptionnelle', '246 Boulevard de la Cascade, Rivière-Fleurie', '  Cottage romantique niché au cœur d&#039;une vallée verdoyante, où le murmure de la rivière accompagne chaque instant de tranquillité. Cette propriété enchanteresse offre un intérieur cosy, avec ses poutres apparentes et sa cheminée en pierre. Son jardin fleuri et ses sentiers ombragés en font un véritable coin de paradis', 'vente', '378 100', '250', '6', 1),
(2, 'maison centre ville', '789 Chemin des Roses, Montagne-Étoilée', '  Charmante maison de ville avec un jardin pittoresque, idéale pour les familles en quête de tranquillité. Cette demeure offre trois chambres spacieuses, une cuisine lumineuse et un salon accueillant. Proche des écoles et des commerces, elle incarne le parfait équilibre entre confort et praticité', 'vente', '785 785', '140', '7', 1),
(8, 'maison de campagne ', '777 Rue de la Cascade, Vallée-Verdoyante', ' Une oasis de tranquillité au cœur de la nature luxuriante, cette maison de campagne vous séduira par son charme rustique et ses vues panoramiques sur la vallée. Dotée de vastes espaces de vie baignés de lumière naturelle, d&#039;une cuisine moderne et de chambres confortables, cette résidence offre le parfait équilibre entre élégance et convivialité. Son jardin paysager, agrémenté d&#039;une cascade naturelle, invite à la détente et à la contemplation', 'location', '800', '230', '4', 2),
(9, 'villa d&#039;exception ', '555 Avenue du Lagon, Baie-Sereine', 'Une villa d&#039;exception au bord de l&#039;eau, offrant une vue imprenable sur le lagon turquoise et les couchers de soleil spectaculaires. Avec ses espaces de vie raffinés, sa cuisine gastronomique et ses suites luxueuses, cette propriété incarne le summum du confort et du raffinement. Son jardin tropical luxuriant, agrémenté d&#039;une piscine à débordement, offre un cadre idyllique pour des moments de détente et de divertissement en plein air', 'location', '900', '90', '3', 2);

-- --------------------------------------------------------

--
-- Structure de la table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `mail` varchar(255) NOT NULL,
  `comment` text NOT NULL,
  `user_id` int(11) NOT NULL,
  `article_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `comments`
--

INSERT INTO `comments` (`id`, `firstname`, `lastname`, `mail`, `comment`, `user_id`, `article_id`) VALUES
(2, 'Thomas', 'Duboi', 'tomaduboi@gerbe.com', 'Bonjour, je parcours actuellement votre site immobilier et je suis impressionné par la qualité et la diversité des propriétés que vous proposez. Je suis à la recherche d&#039;une maison avec un jardin pour ma famille et moi-même. Pouvez-vous m&#039;en dire plus sur les options disponibles dans ma gamme de prix ? Merci ', 0, 8),
(3, 'Charles', 'Eston', 'onrigolebien@jaimal.com', 'Bonjour, je suis un investisseur immobilier à la recherche de biens à mettre en location. Je suis particulièrement intéressé par des appartements ou des maisons situés dans des quartiers attractifs. Pourriez-vous me fournir des détails sur les propriétés disponibles ainsi que des informations sur les rendements locatifs potentiels ? Merci d&#039;avance', 0, 1),
(4, 'theodore', 'Classicodelmadrido', 'classicodelmadrido@totology.com', 'Bonjour, je suis intéressé par l&#039;achat d&#039;un terrain pour construire ma future maison. Je recherche un terrain bien situé, de préférence dans un quartier en développement. Pourriez-vous m&#039;envoyer des informations sur les terrains disponibles ainsi que sur les réglementations locales en matière de construction ? Je vous remercie', 0, 2),
(5, 'Benito', 'Mussolini', 'artoung@google.com', 'Pouvez-vous m&#039;en dire plus sur les options disponibles dans ma gamme de prix ? Merci ', 0, 8);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `mail` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `mail`, `pass`, `firstname`, `lastname`, `role`) VALUES
(1, 'ivain@broceliande.com', '$2y$10$q3tS2D5GZ4DEQghvTbIL5.ZXcDDZrbF4Lr7NyaSEm9dkZdV3QtnZu', 'Ivain', 'Knight', 'vendeur'),
(2, 'gauvain@broceliande.com', '$2y$10$i9f94bxhJbexnyU77EYV2eS04B9V4a7P3Jo6uJl9t3Z/XwrajOf4e', 'Gauvain', 'Knight', 'loueur'),
(3, 'test@test.com', '$2y$10$oKeXKWt1eex7LXoB1ZhPyOVQ.1dEEN49qUV1MpRW.4zNFD0l.S6K6', 'John', 'Doe', 'user'),
(4, 'markassin@test.fr', '$2y$10$aT3f.vPV9PX9MB2tBxfCCuLuKREhayk1AVhA3A1N3NVT.A4yHMOoW', 'Mark', 'Assin', 'user');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `mail` (`mail`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `articles`
--
ALTER TABLE `articles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pour la table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
