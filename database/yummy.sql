-- phpMyAdmin SQL Dump
-- version 4.7.3
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le :  lun. 11 déc. 2017 à 18:01
-- Version du serveur :  5.6.35
-- Version de PHP :  7.1.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `yummi`
--

-- --------------------------------------------------------

--
-- Structure de la table `articles`
--

CREATE TABLE `articles` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `media_id` int(11) DEFAULT NULL,
  `title` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `summary` text COLLATE utf8_unicode_ci,
  `content` text COLLATE utf8_unicode_ci,
  `hitcount` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `articles`
--

INSERT INTO `articles` (`id`, `user_id`, `media_id`, `title`, `summary`, `content`, `hitcount`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'A Buenos Aires, vous mangerez la meilleure (mais aussi la plus bizarre) des pizzas du monde', 'Il est de coutume de dire que l\'Asado est le plat traditionnel d\'Argentine, mais ce qui est sûr c\'est que le plat préféré des habitants de Buenos Aires est... la pizza ! C\'est en tout cas la déclaration de Daniel Young, l\'auteur de \"Where to Eat Pizza\". Il dit aussi qu\'il n\'y a que très peu de villes où l\'importance et la prédominance de la pizza est aussi importante qu\'à Buenos Aires. Et pour cause, la moitié des Argentins de la ville sont de descendance italienne, il est donc logique que la pizza soit l\'une des affaires les plus importantes de la capitale argentine !', 'C\'est vers les années 1880 que la pizza connaît un grand essor en Argentine. On la vend principalement à la classe ouvrière immigrante italienne avec des aliments peu chers comme la tomate et le fromage (facilement trouvables en Argentine) qu\'on étale sur une pâte. Dans les décennies qui suivirent, la pizza argentine s\'éloigna de plus en plus de ses origines italiennes, notamment au niveau de la dose de fromage... \r\n\r\nAu niveau local, il existe 6 variétés de pizzas, et toutes (sauf une), partagent un point commun : le fromage doit se trouver en abondance sur la pizza. Les argentins ne vous parleront pas de la qualité de la pâte à pizza mais bien de la dose de fromage la recouvrant. Presque chaque menu que vous pourrez trouvez vous proposera une pizza au fromage avec notamment : \r\n\r\n - \"Muza\" : Fromage Queso de barraque à la mozarella ; \r\n - \"Napo\" : Fromage, tomates tranchées, ail, origan séché et olives vertes. \r\n - \"Jamon y morrones au fromage\" : Jambon rapé en tranches, poivron rouge rôti en conserve et fromage. \r\n - \"Provolone\" : fromage bleu, coeurs de palmiers, hâché d\'oeufs durcis, \r\n\r\nLa plus étonnante est certainement celle constitutée de tranches de fromage accompagnées de faina, une crêpe de pois chiches dense et semblable à un morceau de polenta au four, trouvable uniquement en Argentine et dans certaines parties de l\'Uruguay. Il est placé directement sur la pizza et se consomme comme un burger à deux étages. Il existe très peu d\'informations sur cette pizza mais elle proviendrait de la vente de nourriture dans les stades qui devait être consistante et rapidement prête. \r\n\r\nPlus qu\'une chose à faire : faites vos valises et direction ARGENTINA !\r\n', 10, '2017-12-06 23:00:00', '2017-12-06 23:00:00');

-- --------------------------------------------------------

--
-- Structure de la table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `recipe_id` int(11) DEFAULT NULL,
  `content` text COLLATE utf8_unicode_ci,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `comments`
--

INSERT INTO `comments` (`id`, `user_id`, `recipe_id`, `content`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'Miam Miam', '2017-12-06 23:00:00', '2017-12-06 23:00:00'),
(2, 1, 1, 'miam au carré', '2017-12-11 15:20:16', '2017-12-11 15:20:16');

-- --------------------------------------------------------

--
-- Structure de la table `medias`
--

CREATE TABLE `medias` (
  `id` int(11) NOT NULL,
  `title` varchar(120) COLLATE utf8_unicode_ci NOT NULL,
  `path` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `type` varchar(20) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `medias`
--

INSERT INTO `medias` (`id`, `title`, `path`, `type`) VALUES
(1, 'pizza', '/images/pizzas.jpg', 'image/jpeg');

-- --------------------------------------------------------

--
-- Structure de la table `recipes`
--

CREATE TABLE `recipes` (
  `id` int(11) NOT NULL,
  `media_id` int(11) DEFAULT NULL,
  `name` varchar(120) COLLATE utf8_unicode_ci NOT NULL,
  `steps` text COLLATE utf8_unicode_ci,
  `ingredients` text COLLATE utf8_unicode_ci,
  `difficulty` tinyint(4) DEFAULT NULL,
  `preparation_time` time NOT NULL,
  `cooking_time` time NOT NULL,
  `materials` text COLLATE utf8_unicode_ci,
  `astuce` text COLLATE utf8_unicode_ci,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `recipes`
--

INSERT INTO `recipes` (`id`, `media_id`, `name`, `steps`, `ingredients`, `difficulty`, `preparation_time`, `cooking_time`, `materials`, `astuce`, `created_at`, `updated_at`) VALUES
(1, 1, 'Pizza Napolitaine Marguerita', 'La seule et unique Pizza!!\r\nLe pizzaillo ne peut pas se cacher derrière des artifices !!!\r\nSi elle est bonne, c\'est un bon pizzaillo ;)\r\n\r\nOn commence par mélanger la farine, l’eau, le sel et la levure de bière: dans un pétrisseur, versez un litre d’eau, dissolvez 50 g de sel et ajoutez 200 g de farine; puis dissolvez 3 g de levure de bière, mettez en marche le pétrisseur et ajoutez le reste de farine au fur et à mesure jusqu’à la consistance désirée de la pâte. Cette opération doit durer une dizaine de minutes.\r\n\r\nEnsuite, travaillez la pâte pendant 20 minutes à basse vitesse jusqu’à obtenir une masse compacte. La pâte ne doit pas être collante, mais souple et élastique. Pour parvenir à cette consistance optimale, la quantité d’eau que la farine peut absorber est très important.\r\n\r\nAprès cette première phase de préparation de la pâte, on passe au levage. On en distingue deux phases. Dans la première, retirez la pâte du pétrisseur et placez-la sur une table de travail. Laissez-la reposer pendant 2 heures recouverte d’un linge humide, pour éviter que la surface ne durcisse en formant une sorte de croûte causée par l’évaporation de l’humidité.\r\n\r\nAprès les 2 heures, on passe à la formation des petits pains, le formage, qui doit être réalisé à la main. À l’aide d’une spatule, coupez une portion de pâte (entre 180 et 250 g) et façonnez-la en petit pain.\r\n\r\nUne fois les petit pains formés, disposez-les dans un conteneur pour pâte à pizza et laissez-les reposer 4 à 6 heures. Après cette seconde phase de levage, la pâte est prête et doit être utilisée dans les 6 heures.\r\n\r\nA l’aide d’une spatule, prenez un petit pain et placez-le sur une table de travail recouverte d’une fine couche de farine pour éviter que la pâte ne colle. Étaler alors la pâte à l’aide de vos deux mains, du centre vers l’extérieur de celle-ci, en la retournant à plusieurs reprises. Formez ainsi un disque de 0,4 cm d’épaisseur au centre, avec une tolérance de ±10%, et de 1 à 2 cm maximum sur les bords.\r\n\r\nEnsuite, on passe à la phase de garniture. Pour ce faire, versez, à l’aide d’une louche, 60 à 80 g de sauce tomate (tomates pelées ou tomates cerises hachées) au centre du disque. Puis, étalez-la en faisant des mouvements circulaires, comme pour formez une spirale, sur toute la surface centrale de la pizza. Toujours avec un mouvement en spirale, salez. Enfin, recouvrez la tomate de 80 à 100 g demozzarella de bufflonne de Campanie AOC coupée en lanières, déposez quelques feuilles de basilic frais et, avec une burette, versez un filet d’huile d’olive extra vierge, 4 à 5 g environ, avec une tolérance de +20%.\r\n\r\nEnfin, la dernière phase : la cuisson. Une phase très importante et qui s’effectue exclusivement dans des fours à bois qui atteignent une température de cuisson de 485°C. Avec un mouvement de rotation et à l’aide d’un peu de farine, transférez la pizza garnie sur une pelle en bois (ou en aluminium). Puis, d’un mouvement rapide du poignet, pour éviter que la garniture ne coule, faites-la glisser sur la sole du four. Une fois au four, contrôlez la cuisson à l’aide de la pelle, en soulevant le côté de la pizza pour la faire tourner vers le feu. Il est très important de tourner la pizza toujours sur la même zone de la sole pour éviter qu’elle ne brûle.\r\n\r\nLa pizza est prête lorsque toute sa circonférence est cuite de manière uniforme, et ce, après 60 à 90 secondes maximum. À l’aide de la pelle, sortez alors la pizza du four et déposez-la sur une assiette.\r\n\r\n', ' - Farine type 55 – 2 kg\r\n - Levure de bière – 3 g\r\n - Eau – 1 l\r\n - Sel – 50 g\r\n - Sauce de tomates pelées ou tomates \r\n - cerises – 800 g\r\n - Mozzarella de bufflonne de Campanie AOC –  800 g\r\n - Huile d’olive extra vierge\r\n - Basilic frais', 1, '07:00:00', '01:30:00', 'Que du classique (louche, casserole...)', 'Après la cuisson, la pizza doit présenter les caractéristique suivantes :\r\n\r\n - la tomate doit être dense et consistante, et doit avoir perdu son excédent d’eau ;\r\n - la mozzarella doit être fondue ;\r\n - le basilic doit dégager un arôme intense et ne pas avoir un aspect brûlé.\r\n\r\n\r\nMangez la pizza immédiatement, dès qu elle sort du four.', '2017-12-06 23:00:00', '2017-12-06 23:00:00');


-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin` tinyint(4) NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `admin`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@admin.fr', '$2y$10$MCRYDl8kHNT7p7Ew1ES/LecnMBHySApoZmAZPcJN9pbDM043h5a3y', 'BmpIik3M5sbI2Oezf44kxN8L4C1cC08WZDRRWMX9OtpCgIE7Fqv584SXoad2', 1, '2017-12-14 07:21:53', '2017-12-14 07:21:53'),
(2, 'duchmol', 'robert.duchmol@hotmail.com', '$2y$10$Tff1fd9YN/kMfSPXJY3.b.sJWgc0MUtbuuLMNOXOttKoZZhWk5qNW', NULL, 0, '2017-12-14 07:21:56', '2017-12-14 07:21:56');
-- --------------------------------------------------------

--
-- Structure de la table `votes`
--

CREATE TABLE `votes` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `recipe_id` int(11) DEFAULT NULL,
  `value` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `votes`
--

INSERT INTO `votes` (`id`, `user_id`, `recipe_id`, `value`) VALUES
(2, 1, 1, 5);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_BFDD3168A76ED395` (`user_id`),
  ADD KEY `IDX_BFDD3168EA9FDD75` (`media_id`);

--
-- Index pour la table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_5F9E962AA76ED395` (`user_id`),
  ADD KEY `IDX_5F9E962A59D8A214` (`recipe_id`);

--
-- Index pour la table `medias`
--
ALTER TABLE `medias`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `recipes`
--
ALTER TABLE `recipes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_A369E2B5EA9FDD75` (`media_id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Index pour la table `votes`
--
ALTER TABLE `votes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_518B7ACFA76ED395` (`user_id`),
  ADD KEY `IDX_518B7ACF59D8A214` (`recipe_id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `articles`
--
ALTER TABLE `articles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `medias`
--
ALTER TABLE `medias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `recipes`
--
ALTER TABLE `recipes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `votes`
--
ALTER TABLE `votes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
