DROP DATABASE IF EXISTS stuliday;
CREATE DATABASE stuliday CHARACTER SET utf8;
USE stuliday;

CREATE TABLE `location` (
  `location_id` int(11) NOT NULL,
  `type` varchar(255) NOT NULL,
  `capacity` int(11) NOT NULL,
  `location_adress` varchar(255) DEFAULT NULL,
  `country` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `price` float NOT NULL,
  `image` varchar(512) DEFAULT NULL,
  `date_start` date NOT NULL,
  `date_end` date NOT NULL,
  `auth-id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `location`
--

INSERT INTO `location` (`location_id`, `type`, `capacity`, `location_adress`, `country`, `description`, `price`, `image`, `date_start`, `date_end`, `auth-id`) VALUES
(3, 'studio', 2, NULL, 'France', NULL, 400, 'uploads/619667bfaa3b2/studio.jpg', '0000-00-00', '0000-00-00', 1),
(4, 'Cabane', 2, 'au bord de l\'eau', 'Bora bora', 'Charmante petite cabane typique, au bord du lagon, les pieds dans l\'eau, située dans l\'archipel de Bora-Bora', 900, 'uploads/61966de4563fd/bora-bora.jpg', '0000-00-00', '0000-00-00', 1),
(5, 't2', 3, 'chinatown', 'USA', 'Appartement au cœur du quartier vivant de chinatown, où exotisme et dépaysement riment avec plaisirs culinaires.', 800, 'uploads/619789321f73b/chinatown.jpg', '0000-00-00', '0000-00-00', 2),
(6, 'chalet', 3, 'Dans les pyrénées', 'France', 'Joli chalet en plein cœur des Pyrénées, typique, où il fait bon respirer l\'air pur de la montagne', 600, 'uploads/619789c756de5/montagne2.jpg', '0000-00-00', '0000-00-00', 2),
(7, 'studio', 2, NULL, 'Suisse', NULL, 720, 'uploads/61978d3e8fe98/montagne1.jpg', '0000-00-00', '0000-00-00', 2);

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `lastname` varchar(25) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `adress` varchar(255) NOT NULL,
  `email` varchar(200) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(512) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `lastname`, `firstname`, `adress`, `email`, `username`, `password`) VALUES
(1, 'roman', 'christophe', 'au bout du monde 40000 dans les landes', 'kikizebasque@gmail.com', 'kikizebasque', '$2y$10$V0aNG7w9pIK9KayVPpmvW.egbE1SfDTqPSRwzBa7.zEGFH7GQtUiC'),
(2, 'aa', 'bbc', 'Pas vraiment là', 'aa@aa.fr', 'zz', '$2y$10$1RxEXTJPDS0iRJEosLaLJO8Dk8SC9q3oaVv.6F0TeueFtgWyUUjFu');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `location`
--
ALTER TABLE `location`
  ADD PRIMARY KEY (`location_id`),
  ADD KEY `auth-id` (`auth-id`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `location`
--
ALTER TABLE `location`
  MODIFY `location_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `location`
--
ALTER TABLE `location`
  ADD CONSTRAINT `location_ibfk_1` FOREIGN KEY (`auth-id`) REFERENCES `user` (`id`);
COMMIT;


