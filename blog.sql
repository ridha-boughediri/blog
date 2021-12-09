-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le : mer. 08 déc. 2021 à 10:37
-- Version du serveur : 5.7.24
-- Version de PHP : 8.0.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `blog`
--

-- --------------------------------------------------------

--
-- Structure de la table `articles`
--

CREATE TABLE `articles` (
  `id` int(11) NOT NULL,
  `imgcard` varchar(255) NOT NULL,
  `title` text NOT NULL,
  `article` text NOT NULL,
  `id_utilisateur` int(11) NOT NULL,
  `id_categorie` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `articles`
--

INSERT INTO `articles` (`id`, `imgcard`, `title`, `article`, `id_utilisateur`, `id_categorie`, `date`) VALUES
(1, 'lpdlt.jpg', 'La Pointe de la Tournette', 'La Tournette est le plus haut sommet qui domine le lac d’Annecy. On y accède par une randonnée peu technique mais sportive depuis le col de la Forclaz ou depuis chalet de l’Aulp (si votre voiture passe, on peut se garer au chalet de l’Aulp). Comptez 1200 mètres de dénivelé pour accéder aux 2351 mètres d’altitude du sommet. Là-haut, la vue est dégagée sur le lac et sur les Alpes. On distingue clairement à l’est, le massif du Mont Blanc et au sud-est la Vanoise, puis les Ecrins. On y croise souvent quelques bouquetins également.', 1, 1, '2021-12-08 10:35:04'),
(2, 'lddc.jpg', 'La Dent du Chat', 'Elle surplombe le lac du Bourget en y projetant son ombre l’après-midi tel un cadran solaire. La dent du Chat est un sommet à l’ascension plutôt monotone mais au final un peu aérien (c’est une dent, tout de même). On y accède par plusieurs points : le col du chat (par le couloir nord – peu recommandé), le signal du mont du Chat (plus haut que le point d’arrivée), par le Bourget du Lac ou la route du signal ou par l’avant-pays. Si vous êtes sportif, laissez votre voiture au Bourget, la randonnée jusqu’au sommet est balisé depuis le centre-ville. Vous partirez pour environ 1000 mètres de dénivelés réguliers, à la fraîche, en forêt ! Là-haut, la vue est grandiose avec d’un côté les Alpes et le Jura, et de l’autre l’avant-pays savoyard.', 1, 1, '2021-12-08 10:33:57'),
(3, 'laca.jpg', 'Le Lac Achard', 'Cet incontournable Isérois où parfois on frôle le « surtourisme » est un très beau lac de la chaîne de Belledone, particulièrement accessible depuis Chamrousse. De fait, c’est un des sites naturels d’exception les plus accessibles à proximité de Grenoble. Quoi qu’il en soit, c’est un très bel endroit situé dans un massif à l’identité marquée. Après le lac Achard, vous pouvez continuer plus en altitude en direction du lac des lacs Robert. Ou même… envisager la grande traversée de Belledone !', 1, 1, '2021-12-08 10:33:33'),
(4, 'tdlhu.jpg', 'Tour De La Haute-Ubaye', 'Entre Queyras et Mercantour, aux portes de l\'Italie, la haute vallée de l\'Ubaye est l\'une des dernières vallées sauvages des Alpes, autrefois lieu de passage incontournable entre la France et l\'Italie. Sur ce tour du massif du Chambeyron et jusqu\'aux sources de l\'Ubaye, vous admirez une faune et une flore abondantes, des hameaux isolés et quelques « fortifications du vertige ». Autre atout de ce massif minéral : les multiples lacs glaciaires qui viennent ponctuer votre itinéraire.', 1, 2, '2021-12-08 10:28:45'),
(5, 'vda.jpg', 'Val d\'Allos', 'C\'est une Retrouvance du côté des sources du Verdon, au coeur du Parc National du Mercantour. Des randonnées dans un univers magique : paysages sculptés par les glaciers, ponctués de lacs d\'altitude, de torrents, de cascades et de gorges vertigineuses. Ce pays est marqué par l\'empreinte des activités traditionnelles dont certaines perdurent de nos jours ; grands espaces soulignés par les voies de passages ancestrales reliant par les hauteurs les vallées du Var, du Verdon et de l\'Ubaye.', 1, 2, '2021-12-08 10:26:43'),
(6, 'lmdm.jpg', 'Les Merveilles Du Mercantour', 'Depuis Castérino, profitez d\'un accès privilégié au Parc national du Mercantour et à la Vallée des Merveilles à l\'occasion d\'un séjour randonnée haut de gamme, tant au niveau des itinéraires qu\'au niveau de l\'hôtel. Laissez-vous émerveiller par les légendes et les histoires en pleine nature, à la découverte des différents sites de la vallée des Merveilles. Si les bouquetins restent plus discrets, les chamois et les marmottes sont, eux, nombreux sur votre chemin. L\'hébergement en hôtel *** sait également charmer les randonneurs : tout en boiserie, il présente un style montagnard et une chaude atmosphère.', 1, 2, '2021-12-08 10:11:56'),
(7, 'llda.jpg', 'Les lacs d’Ayous', 'Les lacs d’Ayous figurent parmi les paysages les plus beaux et les plus intrigants de la région. Ils baignent la vallée d’Ossau, dans le Béarn, à 2 000 mètres d’altitude. Cette randonnée dans le Parc national des Pyrénées permet de les découvrir tout en profitant de points de vue majestueux sur la vallée. Certains passages sont assez raides, mais il est possible d’éviter les sections les plus difficiles.', 1, 4, '2021-12-08 10:05:34'),
(8, 'cdlm.jpg', 'Le chemin de la Mâture', 'Creusé dans une falaise par des bagnards au XVIIe siècle, le chemin de la Mâture est une des plus célèbres randonnées dans le Parc national des Pyrénées. Il forme une gouttière de quatre mètres de large sur quatre mètres de haut, qui surplombe les gorges d’Enfer de 200 mètres !', 1, 4, '2021-12-08 10:04:39'),
(9, 'ccdp.jpg', 'Le chemin des cascades', 'Voici une magnifique randonnée dans le Parc national des Pyrénées, qui permet de découvrir les cascades du Val de Jéret. Les sentiers empruntés sont sauvages et bucoliques. En plus d’être faciles à parcourir, ils sont ombragés sur la majorité du parcours. Une belle découverte des Pyrénées, tout en douceur.', 1, 4, '2021-12-08 10:03:51'),
(10, 'cdln.jpg', 'Le crêt de la Neige', 'Envie de prendre de la hauteur ? Alors rendez-vous au crêt de la Neige ! Avec ses 1 720 mètres d’altitude, c’est le point culminant du Jura. Le sentier offre de jolis points de vue, dans un cadre intimiste et sauvage. En revanche, la traversée demande une bonne condition physique !', 1, 5, '2021-12-08 09:55:54'),
(11, 'ldr.jpg', 'La forêt du Risoux', 'La forêt du Risoux est célèbre pour avoir été un haut-lieu de la Résistance lors de la Seconde Guerre mondiale. La Française Victoria Cordier aida de nombreux juifs à la traverser afin de rejoindre les refuges suisses. Ce pan de l’Histoire est aujourd’hui révolu.', 1, 5, '2021-12-08 09:55:01'),
(12, 'cda.jpg', 'Le circuit de la source de l’Ain', 'Découvrez les trésors de la haute vallée de l’Ain : paysage minéral et végétal, cascades, moulins en ruines… Cette jolie randonnée propose une grande variété. La rivière et ses couleurs magnétiques vous suivront tout le trajet.', 1, 5, '2021-12-08 09:54:06'),
(13, 'mdf.jpg', 'Cirque de Navacelles et Moulins de la Foux', 'Un circuit assez classique qui permet d\'admirer le Cirque de Navacelles et de randonner dans les Gorges de la Vis. Les restes des Moulins de la Foux sont le but ultime de la randonnée, avec de belles explications sur ces moulins hydrauliques ainsi que sur la partie souterraine de la Vis, pas encore totalement explorée.', 1, 6, '2021-12-08 09:59:23'),
(14, 'adc.jpg', 'Les 4000 marches et retour par Aire de Côte', 'Au départ de Valleraugue, le fameux sentier des 4000 marches qui monte à l\'observatoire du Mont-Aigoual.\nAfin de faire une boucle, on suit le GR®6 pour une longue descente en forêt vers Aire de Côte, avant de finir par la traversée de la châtaigneraie au-dessus du hameau de Berthezène.', 1, 6, '2021-12-08 09:58:14'),
(15, 'pst.jpg', 'Pic Cassini Sources du Tarn', 'Du Mas de la Barque vers le Pic Cassini, en passant par le Col de l\'Aigle et les crêtes, jusqu\'aux sources du Tarn. Une vue sublime sur le Mont Lozère et la vallée. Descente le long du Tarn avec ses magnifiques gours et retour au Mas de la Barque par le chemin de Bellecoste.', 1, 6, '2021-12-08 09:57:15'),
(16, 'mga.jpg', 'Le Monte Gozzi', 'Imposant mont de roche rouge, le Monte Gozzi est visible depuis toute la vallée d’Ajaccio. Et inversement ! En effet, quand vous effectuez cette randonnée de niveau moyen depuis Appietto jusqu’au sommet, vous vous dirigez vers l’un des plus beaux points de vue de l’île. Au départ de la chapelle San Chirgu, suivez le sentier jusqu’au sommet. Vous aurez un petit passage à escalader, mais la difficulté se situe surtout au début (dénivelé franc).', 1, 8, '2021-12-08 09:41:42'),
(17, 'adb.jpg', 'Le Tour des Aiguilles de Bavella', 'Les Aiguilles de Bavella sont emblématiques de la Corse. En effet, elles se caractérisent par une suite de pics en dents de scie, des pitons rocheux et de très nombreux pins courbés. L’endroit peut se découvrir via la randonnée car un sentier permet d’en faire le tour. Le départ de la randonnée depuis le Col de Bavella vous fait emprunter une partie du GR20. La montée au Bocca di u Pargulu vous offrira une vue imprenable sur la côte Corse. Sachez que la randonnée peut être effectuée dans les deux sens.', 1, 8, '2021-12-08 09:41:37'),
(18, 'ldn.jpg', 'Les pozzines du Lac de Nino', 'La pozzine est une formation géologique assez étonnante des lacs de montagnes. Les pozzines les plus connues sont celles liées au Lac de Nino, situé dans le massif du Rotondo. En réalité, il s’agit d’une large plaine, parsemée de trous d’eau, les pozzi, et composée de pelouses vertes très épaisses et spongieuses. Ce sont les nombreux ruisseaux qui traversent la plaine qui nourrissent les trous d’eau jusqu’au Lac de Nino. Parmi les randonnées en Corse, celle-ci permet de découvrir ce paysage à couper le souffle, conservé au cœur de la montagne corse.', 1, 8, '2021-12-08 09:41:33'),
(19, 'tdh.jpg', 'Les tranchées de Hartmannswillerkopf', 'Tout près de Wattwiller, dans le Haut-Rhin, cette randonnée dans les Vosges constitue une sortie culturelle de premier plan. Le Hartmannswillerkopf (le Viel Armand dans la langue de Molière) fut un haut lieu de la Première Guerre Mondiale.', 1, 7, '2021-12-08 09:41:22'),
(21, 'cdh.jpg', 'La cascade du Hohwald et la chaume des Veaux', 'Cette jolie boucle entre forêt et pâturages vous conduira jusqu’à une cascade impressionnante. Le balisage du sentier est particulièrement soigné : suivez-le jusqu’à la cascade du Hohwald où vous pourrez pique-niquer en toute quiétude.', 1, 7, '2021-12-08 09:41:25'),
(22, 'cdn.jpg', 'La cascade et le château du Nideck', 'Generation Voyage souhaitait vous présenter une randonnée dans les Vosges très typée médiévale. Commencez par vous garer à la cascade du Nideck, nichée au pied d’une falaise majestueuse. Levez la tête : le château du Nideck se trouve au dessus ! Pour l’atteindre, empruntez un sentier bien aménagé (escaliers et mains courantes sécurisent votre progression).', 1, 7, '2021-12-08 09:41:29');

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `nom` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `categories`
--

INSERT INTO `categories` (`id`, `nom`) VALUES
(1, 'Alpes du Nord'),
(2, 'Alpes du Sud'),
(4, 'Pyrénées'),
(5, 'Jura'),
(6, 'Massif Central'),
(7, 'Vosges'),
(8, 'Corse');

-- --------------------------------------------------------

--
-- Structure de la table `commentaires`
--

CREATE TABLE `commentaires` (
  `id` int(11) NOT NULL,
  `commentaire` varchar(1024) NOT NULL,
  `id_article` int(11) NOT NULL,
  `id_utilisateur` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `droits`
--

CREATE TABLE `droits` (
  `id` int(11) NOT NULL,
  `nom` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `droits`
--

INSERT INTO `droits` (`id`, `nom`) VALUES
(1, 'utilisateur'),
(42, 'modérateur'),
(1337, 'administrateur');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

CREATE TABLE `utilisateurs` (
  `id` int(11) NOT NULL,
  `login` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `id_droits` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`id`, `login`, `password`, `email`, `id_droits`) VALUES
(1, 'leodracke', '9cf95dacd226dcf43da376cdb6cbba7035218921', 'leodracke@gmail.com', 1337),
(2, 'Samir-Gonzalez', 'c045c9838ba93fe23b0842c44195bfbd7298d35d', 's@s.s', 1337),
(3, 'ri', '268013331b64ca4d55371ebd0f7340aae217ae65', 'ri@ra', 1);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `commentaires`
--
ALTER TABLE `commentaires`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `droits`
--
ALTER TABLE `droits`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `articles`
--
ALTER TABLE `articles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT pour la table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `commentaires`
--
ALTER TABLE `commentaires`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `droits`
--
ALTER TABLE `droits`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1338;

--
-- AUTO_INCREMENT pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
