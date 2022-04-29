-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 29, 2022 at 11:40 AM
-- Server version: 8.0.28-0ubuntu0.20.04.3
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `etMediaBdd`
--

-- --------------------------------------------------------

--
-- Table structure for table `affichage`
--

CREATE TABLE `affichage` (
  `idAffichage` int UNSIGNED NOT NULL,
  `affichage` varchar(20) NOT NULL,
  `visibilite` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `affichage`
--

INSERT INTO `affichage` (`idAffichage`, `affichage`, `visibilite`) VALUES
(2, 'titre', 1);

-- --------------------------------------------------------

--
-- Table structure for table `article`
--

CREATE TABLE `article` (
  `idArticle` int UNSIGNED NOT NULL,
  `titre` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `genre` varchar(255) DEFAULT NULL,
  `auteur` varchar(255) DEFAULT NULL,
  `editeur` varchar(255) DEFAULT NULL,
  `etat` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT 'Disponible',
  `file` text NOT NULL,
  `idCategorie` int UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `article`
--

INSERT INTO `article` (`idArticle`, `titre`, `description`, `genre`, `auteur`, `editeur`, `etat`, `file`, `idCategorie`) VALUES
(1, 'Le Seigneur des anneaux : La Communauté de l\'anneau', 'Dans les vertes prairies du Comté, les Hobbits, ou Demi-hommes, vivaient en paix... Jusqu\'au jour fatal où l\'un d\'entre eux, au cours de ses voyages, entra en possession de l\'Anneau Unique aux immenses pouvoirs. Pour le reconquérir, Sauron, le seigneur Sombre, va déchaîner toutes les forces du Mal. Frodo, le Porteur de l\'Anneau, Gandalf, le magicien, et leurs intrépides compagnons réussiront-ils à écarter la menace qui pèse sur la Terre du Milieu ?', 'Fantasy', 'Tolkien', 'Christian Bourgois', 'Disponible', 'uploads/Le-Seigneur-des-Anneaux.jpg', 1),
(2, 'Le Seigneur des anneaux : Les Deux Tours', 'Dispersée dans les terres de l\'Ouest, la Communauté de l\'Anneau affronte les périls de la guerre, tandis que Frodo, accompagné du fidèle Sam, poursuit une quête presque désespérée : détruire l\'Anneau Unique en le jetant dans les crevasses de l\'Orodruin, le Mont Destin. Mais aux frontières du Pays de Mordor, une mystérieuse créature les épie... pour les perdre ou pour les sauver ?', 'Fantasy', 'Tolkien', 'Christian Bourgois', 'Disponible', 'uploads/Le-Seigneur-des-Anneaux-2.jpg', 1),
(3, 'Le Seigneur des anneaux : Le Retour du roi', 'Le royaume de Gondor s\'arme contre Sauron, le Seigneur Sombre, qui veut asservir tous les peuples libres, Hommes et Elfes, Nains et Hobbits. Mais la vaillance des soldats de Minas Tirith ne peut rien désormais contre la puissance maléfique de Mordor. Un fragile espoir, toutefois, demeure : Frodo, le Porteur de l\'Anneau, s\'approche jour après jour de la montagne où brûle le feu du destin, seul capable de détruire l\'Anneau Unique et de provoquer la chute de Sauron...', 'Fantasy', 'Tolkien', 'Christian Bourgois', 'Disponible', 'uploads/Le-Seigneur-des-Anneaux-3.jpg', 1),
(4, 'Les Robots', 'Il était un temps où les robots n\'étaient qu\'automates idiots ou machines se retournant contre leur créateur. Mais Asimov est arrivé, et tout a changé. La vie est belle aujourd\'hui pour les robots, ils sont ouvriers, nourrices, explorateurs spatiaux, politiciens, enquêteurs, prophètes même. La liberté à fond les boulons. Presque. Car il y a les Trois Lois de la Robotique, qui pourraient se résumer à : les robots aident les hommes sans jamais les mettre en péril, et s\'aident aussi tant que cela ne contrevient pas à l\'énoncé précédent. Le Cycle des Robots est un ensemble de nouvelles et de romans où hommes et robots s\'évertuent à faire appliquer ces lois, à les contourner, à les prendre en défaut. Et la palette imaginative de l\'auteur ne connaît jamais de baisse de tension ! Suivez donc les cas de conscience du cerveau positronique, les leçons de la logique robotique et les souvenirs de Susan Calvin, la première robopsychologue.', 'Science Fiction', 'Isaac Asimov', 'OPTA', 'Disponible', 'uploads/Les-robots.jpg', 1),
(5, 'Un défilé de robots', 'Comment risque de réagir un robot programmé pour un environnement lunaire dès lors qu\'il se retrouve égaré sur Terre ? Un robot peut-il mentir à un procès pour préserver les intérêts de son utilisateur ? Le docteur Susan Calvin, robopsychologue, dialogue avec les androïdes pour faire la lumière sur ces étranges affaires. Et découvre davantage de défauts de programmation chez l\'homme que chez ses fidèles créations... Les robots ont imposé Isaac Asimov comme l\'un des piliers de l\'Âge d\'or de la SF, dès les années 1940. Il est l\'instigateur des fameuses et révolutionnaires trois Lois de la robotique, qui brisent le mythe du robot envahisseur ou aliéné pour en faire un être enclin au doute et à la contradiction.', 'Science Fiction', 'Isaac Asimov', 'OPTA', 'Disponible', 'uploads/Un-defile-de-robots.jpg', 1),
(6, 'Face aux feux du soleil', 'C\'est désormais sur la lointaine planète Solaria qu\'Elijah Baley et R. Daneel Olivaw vont exercer leurs talents d\'enquêteurs. Sur ce monde, les hommes n\'acceptent plus de se rencontrer physiquement mais se \"visionnent\" par le truchement de projections télévisées. Or, un meurtre a été commis, un meurtre apparemment impossible puisque aucun Solarien n\'aurait assez de courage pour s\'approcher d\'un de ses compatriotes. Qui plus est, tout semble indiquer qu\'un robot est impliqué. Absurde ! Les Lois de la robotique interdisent à ces êtres artificiels de causer le moindre tort aux hommes... Les robots ont imposé Isaac Asimov comme l\'un des piliers de l\'Âge d\'or de la SF, dès les années 1940. Il est l\'instigateur des fameuses et révolutionnaires trois Lois de la robotique, qui brisent le mythe du robot envahisseur ou aliéné pour en faire un être enclin au doute et à la contradiction.', 'Science Fiction', 'Isaac Asimov', 'Satellite', 'Disponible', 'uploads/Face-aux-feux-du-soleil.jpg', 1),
(7, 'Les Robots de l\'aube', 'Quand Elijah Baley arrive sur Aurora, il pressent qu\'il va au-devant de sa plus périlleuse mission. Il s\'agit en effet pour lui de découvrir qui, pour la première fois dans la galaxie, s\'est rendu coupable du meurtre de Jander Panell, le robot positronique le plus sophistiqué jamais créé, une créature atteignant un degré d\'\"humanité\" très supérieur à tout ce que le Dr Susan Calvin aurait pu imaginer. Or le seul être qui possédait les compétences nécessaires pour commettre un tel crime n\'est autre que son propre concepteur, le Dr Fastolfe ! Heureusement, Baley sera à nouveau assisté sur cette affaire de Daneel Olivaw, désormais l\'unique robot humaniforme encore en activité...', 'Science Fiction', 'Isaac Asimov', 'Jai lu', 'Disponible', 'uploads/Les-robots-de-l-aube.jpg', 1),
(8, 'Les Robots et l\'Empire', 'Plusieurs décennies se sont écoulées depuis les événements narrés dans \"les robots de l\'aube\". Le docteur Amadiro voue une haine inextinguible à Glardia Gremionis pour avoir fait échouer ses plans de domination de la galaxie. Avec l\'aide de Mandamus, un jeune et brillant scientifique, il ourdit à nouveau un plan d\'éradication de l\'humanité. Pour le contrer, Gladia est toujours assistée de Daneel, le robot humaniforme, et de Giskard, l\'androïde télépathe, aux aptitudes nombreuses mais limitées par les restrictions qu\'imposent les lois de la robotique. Et leurs choix seront d\'autant plus ardus qu\'une nouvelle loi, la loi zéro, va faire son apparition...', 'Science Fiction', 'Isaac Asimov', 'Jai lu', 'Disponible', 'uploads/Les-robots-et-l-empire.jpg', 1),
(9, 'L\'Art de la guerre', 'Il y a vingt-cinq siècles, dans la Chine des \"Royaumes Combattants\", était rédigé le premier traité sur \"l\'art de la guerre\". Pour atteindre la victoire, le stratège habile s\'appuie sur sa puissance, mais plus encore le moral des hommes, les circonstances qui l\'entourent et l\'information dont il dispose. La guerre doit être remportée avant même d\'avoir engagé le combat. Sun Tzu ne décrit pas les batailles grandioses et le fracas des épées, pas plus qu\'il n\'énumère des techniques vouées à l\'obsolescence : L\'Art de la guerre est un précieux traité de stratégie, un grand classique de la pensée politique, et une leçon de sagesse à l\'usage des meneurs d\'hommes. Autant que de courage, la victoire est affaire d\'intelligence. Le texte de cette édition est établi et présenté par Samuel Griffith. Publiée en 1963 à l\'université d\'Oxford, cette version est celle qui a fait découvrir Sun Tzu à l\'Occident et qui, par la richesse de son appareil critique (annotations, commentaires traditionnels, compléments historiques) demeure aujourd\'hui encore la plus diffusée et la plus lue dans le monde entier.', 'Traité', 'Sun Tzu', 'Flammarion', 'Disponible', 'uploads/L-Art-de-la-guerre.jpg', 1),
(10, 'Renaissance', 'Sortie: 2020', 'Majestic', 'Apashe', 'Kannibalen Records', 'Indisponible', 'uploads/renaissance.jpg', 2),
(11, 'RARITIES', 'Sortie: 2019', 'Electronic', 'Lorn', 'Ninja Tune', 'Disponible', 'uploads/rarities.jpg', 2),
(12, 'The Golden Age', 'Sortie: 2013', 'rock alternatif', 'Woodkid', 'Green United Music', 'Disponible', 'uploads/The-Golden-Age.jpg', 2),
(15, 'Neuromancien', '\"Le ciel au-dessus du port avait la couleur d\'une télévision allumée sur la chaîne défunte\".', 'Cyberpunk', 'William Gibson', ' Au diable vauvert', 'Disponible', 'uploads/Neuromancien.jpg', 1),
(16, 'Les Cavernes d\'acier', 'L\'assassinat du docteur Sarton jette le trouble. Qui aurait intérêt à faire disparaître celui-là même qui milite pour le rapprochement entre Terriens et Spaciens ? Les Médiévalistes, qui ne voient pas d\'un bon oeil la prolifération des robots ? Les Spaciens eux-mêmes, prêts à tout pour conserver leurs privilèges ? Le problème du détective Baley n\'est pas seulement de retrouver un meurtrier ; il doit y parvenir avant son collègue robot R. Daneel Olivaw, un de ces androïdes ultra-perfectionnés qui n\'attendent peut-être que ce genre d\'occasion pour prendre la place des hommes. Les robots ont imposé Isaac Asimov comme l\'un des piliers de l\'Âge d\'or de la SF, dès les années 1940. Il est l\'instigateur des fameuses et révolutionnaires trois Lois de la robotique, qui brisent le mythe du robot envahisseur ou aliéné pour en faire un être enclin au doute et à la contradiction.', 'Science-fiction', 'Isaac Asimov', 'Jai Lu', 'Disponible', 'uploads/Les-cavernes-d-acier.jpg', 1),
(20, 'Dune - Tome 1', 'Le chef-d\'oeuvre absolu de la science-fiction.\r\nÉdition du cinquantenaire.\r\nTraduction revue et corrigée.Il n\'y a pas, dans tout l\'Empire, de planète plus inhospitalière que Dune.\r\nPartout du sable, à perte de vue.\r\nUne seule richesse : l\'épice de longue vie, née du désert et que l\'univers tout entier convoite.\r\n\r\nPréfaces de Denis Villeneuve et Pierre Bordage.\r\nPostface de Gérard Klein.\r\nTraduit de l\'anglais (États-Unis) par Michel Demuth.', 'Science Fiction', ' Frank Herbert', ' Robert Laffont', 'Indisponible', 'uploads/Dune-Edition-collector-traduction-revue-et-corrigee.jpg', 1),
(21, 'Dune', 'L’histoire de Paul Atreides, jeune homme aussi doué que brillant, voué à connaître un destin hors du commun qui le dépasse totalement. Car s’il veut préserver l’avenir de sa famille et de son peuple, il devra se rendre sur la planète la plus dangereuse de l’univers - la seule à même de fournir la ressource la plus précieuse au monde, capable de décupler la puissance de l’humanité. Tandis que des forces maléfiques se disputent le contrôle de cette planète, seuls ceux qui parviennent à dominer leur peur pourront survivre…', 'Science Fiction', ' Denis Villeneuve', 'Warner Home Video', 'Disponible', 'uploads/Dune-Blu-ray.jpg', 3),
(22, 'Star Wars Episode I : La menace fantôme', 'Bloqués sur la planète Tatooine après avoir secouru la Reine Amidala (Natalie Portman), l’apprenti Jedi Obi-Wan Kenobi (Ewan McGregor) et son maître Qui-Gon Jinn (Liam Neeson) rencontrent un jeune esclave : Anakin Skywalker. Grace à la Force, le jeune garçon recouvre sa liberté et quitte sa planète pour devenir un Jedi. De retour sur Naboo, Anakin et la Reine doivent faire face à une invasion, pendant que les deux Jedi affrontent le terrible Dark Maul. Ils se rendent rapidement compte que cette invasion n’est que la première étape d’un plan mené par les Sith, serviteurs du côté obscure de la Force…', 'Science Fiction', 'George Lucas', 'Lucasfilm Ltd.', 'Disponible', 'uploads/Star-Wars-Episode-I-La-menace-fantome-Steelbook-Exclusivite-Fnac-Blu-ray-4K-Ultra-HD.jpg', 3),
(23, 'Star Wars Episode II : L\'Attaque des clones', 'Dix ans se sont écoulés depuis l’invasion de Naboo. Anakin Skywalker (Hayden Christensen) est aujourd’hui l’apprenti du Chevalier Jedi Obi-Wan Kenobi (Ewan McGregor). Une tentative d’assassinat est commise sur l’ancienne Reine de Naboo, la sénatrice Padmé Amidala (Natalie Portman), et la galaxie est au bord de la guerre civile. Anakin, désigné pour protéger la sénatrice, tombe amoureux de Padmé et commence à découvrir son propre côté obscur… Anakin, Padmé et Obi-Wan Kenobi sont entrainés dans ce qui deviendra la guerre des clones…', 'Science Fiction', ' George Lucas', 'Lucasfilm Ltd.', 'Disponible', 'uploads/Star-Wars-Episode-II-L-Attaque-des-clones-Steelbook-Exclusivite-Fnac-Blu-ray-4K-Ultra-HD.jpg', 3),
(24, 'Star Wars Episode III : La revanche des Sith', 'Des années après la guerre des clones, la République s’effondre, laissant place à l’Empire. Confirmant les plus grandes craintes du Jedi Mace Windu (Samuel L. Jackson), Anakin Skywalker (Hayden Christensen) est séduit par le côté obscur de la Force, et devient Dark Vador le nouvel apprenti de l’Empereur. Les Jedi sont anéantis, Obi-Wan Kenobi (Ewan McGregor) et le Maître Jedi Yoda sont contraints de se cacher. Les propres enfants d’Anakin, un garçon et une fille, sont le seul espoir pour la galaxie…', 'Science Fiction', 'George Lucas', 'Lucasfilm Ltd.', 'Disponible', 'uploads/Star-Wars-Episode-III-La-revanche-des-Sith-Steelbook-Exclusivite-Fnac-Blu-ray-4K-Ultra-HD.jpg', 3),
(25, 'Warcraft Le commencement', 'Le pacifique royaume d\'Azeroth est au bord de la guerre alors que sa civilisation doit faire face à une redoutable race d\'envahisseurs: des guerriers Orcs fuyant leur monde moribond pour en coloniser un autre. Alors qu\'un portail s\'ouvre pour connecter les deux mondes, une armée fait face à la destruction et l\'autre à l\'extinction. De côtés opposés, deux héros vont s\'affronter et décider du sort de leur famille, de leur peuple et de leur patrie.', 'Fantasy', ' Duncan Jones', 'Blizzard Entertainment', 'Disponible', 'uploads/Warcraft-Le-commencement-Blu-ray-4K-Ultra-HD.jpg', 3),
(26, 'a Ligne verte', 'Paul Edgecomb, pensionnaire centenaire d\'une maison de retraite, est hanté par ses souvenirs. Gardien-chef du pénitencier de Cold Mountain en 1935, il était chargé de veiller au bon déroulement des exécutions capitales en s’efforçant d\'adoucir les derniers moments des condamnés. Parmi eux se trouvait un colosse du nom de John Coffey, accusé du viol et du meurtre de deux fillettes. Intrigué par cet homme candide et timide aux dons magiques, Edgecomb va tisser avec lui des liens très forts.', 'Fantastique', 'Frank Darabont', 'Castle Rock Entertainment', 'Disponible', 'uploads/19254683.jpg-c_310_420_x-f_jpg-q_x-xxyxx.jpg', 3),
(27, 'Le Parrain', 'En 1945, à New York, les Corleone sont une des cinq familles de la mafia. Don Vito Corleone, \"parrain\" de cette famille, marie sa fille à un bookmaker. Sollozzo, \" parrain \" de la famille Tattaglia, propose à Don Vito une association dans le trafic de drogue, mais celui-ci refuse. Sonny, un de ses fils, y est quant à lui favorable.\r\nAfin de traiter avec Sonny, Sollozzo tente de faire tuer Don Vito, mais celui-ci en réchappe. Michael, le frère cadet de Sonny, recherche alors les commanditaires de l\'attentat et tue Sollozzo et le chef de la police, en représailles.\r\nMichael part alors en Sicile, où il épouse Apollonia, mais celle-ci est assassinée à sa place. De retour à New York, Michael épouse Kay Adams et se prépare à devenir le successeur de son père...', 'Gangsters', 'Francis Ford Coppola', 'Paramount Pictures', 'Disponible', 'uploads/Le-Parrain-Blu-ray.jpg', 3),
(28, 'Le Roi lion', 'Sur les Hautes terres d’Afrique règne un lion tout-puissant, le roi Mufasa, que tous les hôtes de la jungle respectent et admirent pour sa sagesse et sa générosité. Son jeune fils Simba sait qu’un jour il lui succèdera, conformément aux lois universelles du cycle de la vie, mais il est loin de deviner les épreuves et les sacrifices que lui imposera l’exercice du pouvoir. Espiègle, naïf et turbulent, le lionceau passe le plus clair de son temps à jouer avec sa petite copine Nala et à taquiner Zazu, son digne précepteur. Son futur royaume lui apparaît en songe comme un lieu enchanté où il fera bon vivre, s’amuser et donner des ordres. Cependant, l’univers de Simba n’est pas aussi sûr qu’il le croie. Scar, le frère de Mufasa, aspire en effet depuis toujours au trône. Maladivement jaloux de son aîné, il intrigue pour l’éliminer en même temps que son successeur. Misant sur la curiosité enfantine et le tempérament aventureux de Simba, il révèle à celui-ci l’existence d’un mystérieux et dangereux cimetière d’éléphants. Simba, oubliant les avertissements répétés de son père, s’y rend aussitôt en secret avec Nala et se fait attaquer par 3 hyènes féroces. Par chance, Mufasa arrive à temps pour sauver l’imprudent lionceau et sa petite compagne. Mais Scar ne renonce pas à ses sinistres projets. Aidé des 3 hyènes, il attire Simba dans un ravin et lance à sa poursuite un troupeau de gnous. N’écoutant que son courage, Mufasa sauve à nouveau son fils et tente de se mettre à l’abri en gravissant la falaise. Repoussé par son frère félon, il périt sous les sabots des gnous affolés. Scar blâme alors l’innocent Simba pour la mort du Roi et le persuade de quitter pour toujours les Hautes terres. Simba se retrouve pour la première fois seul et démuni face à un monde hostile. C’est alors que le destin place sur sa route un curieux tandem d’amis...', 'Animation', 'Roger Allers', 'Walt Disney Pictures', 'Disponible', 'uploads/19858447.jpg-c_310_420_x-f_jpg-q_x-xxyxx.jpg', 3),
(29, 'The Dark Knight, Le Chevalier Noir', 'Dans ce nouveau volet, Batman augmente les mises dans sa guerre contre le crime. Avec l\'appui du lieutenant de police Jim Gordon et du procureur de Gotham, Harvey Dent, Batman vise à éradiquer le crime organisé qui pullule dans la ville. Leur association est très efficace mais elle sera bientôt bouleversée par le chaos déclenché par un criminel extraordinaire que les citoyens de Gotham connaissent sous le nom de Joker.', 'Super-héros', 'Christopher Nolan', 'Legendary Pictures', 'Disponible', 'uploads/18949761.jpg-c_310_420_x-f_jpg-q_x-xxyxx.jpg', 3),
(30, 'Pulp Fiction', 'L\'odyssée sanglante et burlesque de petits malfrats dans la jungle de Hollywood à travers trois histoires qui s\'entremêlent.', 'Gangsters', 'Quentin Tarantino', 'Miramax', 'Disponible', 'uploads/18846059.jpg-c_310_420_x-f_jpg-q_x-xxyxx.jpg', 3),
(31, 'Gladiator', 'Le général romain Maximus est le plus fidèle soutien de l\'empereur Marc Aurèle, qu\'il a conduit de victoire en victoire avec une bravoure et un dévouement exemplaires. Jaloux du prestige de Maximus, et plus encore de l\'amour que lui voue l\'empereur, le fils de MarcAurèle, Commode, s\'arroge brutalement le pouvoir, puis ordonne l\'arrestation du général et son exécution. Maximus échappe à ses assassins mais ne peut empêcher le massacre de sa famille. Capturé par un marchand d\'esclaves, il devient gladiateur et prépare sa vengeance.', 'Drame', 'Ridley Scott', 'Dreamworks Pictures', 'Disponible', 'uploads/19254510.jpg-c_310_420_x-f_jpg-q_x-xxyxx.jpg', 3),
(32, 'Fight Club', 'Le narrateur, sans identité précise, vit seul, travaille seul, dort seul, mange seul ses plateaux-repas pour une personne comme beaucoup d\'autres personnes seules qui connaissent la misère humaine, morale et sexuelle. C\'est pourquoi il va devenir membre du Fight club, un lieu clandestin ou il va pouvoir retrouver sa virilité, l\'échange et la communication. Ce club est dirigé par Tyler Durden, une sorte d\'anarchiste entre gourou et philosophe qui prêche l\'amour de son prochain.', 'Satire sociale', 'David Fincher', 'Fox 2000 Pictures', 'Disponible', 'uploads/0688770.jpg-c_310_420_x-f_jpg-q_x-xxyxx.jpg', 3),
(33, 'Il faut sauver le soldat Ryan', 'Alors que les forces alliées débarquent à Omaha Beach, Miller doit conduire son escouade derrière les lignes ennemies pour une mission particulièrement dangereuse : trouver et ramener sain et sauf le simple soldat James Ryan, dont les trois frères sont morts au combat en l\'espace de trois jours. Pendant que l\'escouade progresse en territoire ennemi, les hommes de Miller se posent des questions. Faut-il risquer la vie de huit hommes pour en sauver un seul ?', 'Guerre', 'Steven Spielberg', 'Paramount Pictures', 'Disponible', 'uploads/042253_af.jpg-c_310_420_x-f_jpg-q_x-xxyxx.jpg', 3),
(34, 'Matrix', 'Programmeur anonyme dans un service administratif le jour, Thomas Anderson devient Neo la nuit venue. Sous ce pseudonyme, il est l\'un des pirates les plus recherchés du cyber-espace. A cheval entre deux mondes, Neo est assailli par d\'étranges songes et des messages cryptés provenant d\'un certain Morpheus. Celui-ci l\'exhorte à aller au-delà des apparences et à trouver la réponse à la question qui hante constamment ses pensées : qu\'est-ce que la Matrice ? Nul ne le sait, et aucun homme n\'est encore parvenu à en percer les defenses. Mais Morpheus est persuadé que Neo est l\'Elu, le libérateur mythique de l\'humanité annoncé selon la prophétie. Ensemble, ils se lancent dans une lutte sans retour contre la Matrice et ses terribles agents...', 'Science Fiction', 'Les Wachowski', 'Warner Bros.', 'Disponible', 'uploads/043449_af.jpg-c_310_420_x-f_jpg-q_x-xxyxx.jpg', 3),
(35, 'Là-haut', 'Des studios Disney-Pixar arrive la comédie d\'aventure «Up», qui suit un vendeur de ballons de 78 ans, Carl Fredricksen, au moment où il réalise enfin le rêve de sa vie. Son désir de vivre une grande aventure le pousse à attacher des milliers de ballons à sa maison pour s\'envoler vers les régions sauvages de l\'Amérique du Sud. Mais il s\'aperçoit trop tard de la présence d\'un colis ayant la forme de son pire cauchemar : Russell, un jeune explorateur de 8 ans un peu trop optimiste, l\'accompagnera dans son voyage.', 'Animation', 'Pete Docter', 'Pixar Animation Studios', 'Disponible', 'uploads/M02014633800-large.jpg', 3),
(36, 'God of War', 'Dans ce nouvel épisode de God Of War, le héros évoluera dans un monde aux inspirations nordiques, très forestier et montagneux. Dans ce beat-them-all, un enfant accompagnera le héros principal, pouvant apprendre des actions du joueur, et même gagner de l\'expérience.', 'Beat\'em All', 'Cory Barlog', 'Sony Computer Entertainment', 'Disponible', 'uploads/1642003637-1975-jaquette-avant.jpg', 4),
(37, 'The Legend of Zelda : Breath of the Wild', 'The Legend of Zelda : Breath of the Wild est un jeu d\'action/aventure. Link se réveille d\'un sommeil de 100 ans dans un royaume d\'Hyrule dévasté. Il lui faudra percer les mystères du passé et vaincre Ganon, le fléau. L\'aventure prend place dans un gigantesque monde ouvert et accorde ainsi une part importante à l\'exploration. Le titre a été pensé pour que le joueur puisse aller où il veut dès le début, s\'éloignant de la linéarité habituelle de la série.', 'Aventure', 'Hidemaro Fujibayashi', 'Nintendo', 'Disponible', 'uploads/1494322310-8900-jaquette-avant.jpg', 4),
(38, 'Forza Horizon 5', 'Forza Horizon 5 est un jeu de course en monde ouvert développé par Playground Games. Il prend place dans les villes et magnifiques décors du Mexique. Le jeu propose aussi bien des courses solo que des épreuves compétitives et collaboratives en ligne.', 'Course', 'Mike Brown', 'Xbox Game Studios', 'Disponible', 'uploads/1631865000-7055-jaquette-avant.jpg', 4),
(39, 'Death Stranding', 'Death Stranding est un jeu d\'action dans lequel la mort fait partie intégrante du gameplay. La mort est un des thèmes principaux, et les développeurs ont fait en sorte que les joueurs ne la voient pas comme une fin. L\'histoire s\'annonce sombre dans cet univers futuriste et fantastique.', 'Action', 'Hideo Kojima', 'Sony Interactive Entertainment', 'Disponible', 'uploads/1572942936-6926-jaquette-avant.jpg', 4),
(40, 'Red Dead Redemption II', 'Suite du précédent volet multi récompensé, Red Dead Redemption II nous permet de nous replonger sur PS4 dans une ambiance western synonyme de vastes espaces sauvages et de villes malfamées. L\'histoire se déroule en 1899, avant le premier Red Dead Redemption, au moment où Arthur Morgan doit fuir avec sa bande à la suite d\'un braquage raté.', 'Action', 'Alastair Dukes', 'Rockstar Games', 'Disponible', 'uploads/1556615011-2208-jaquette-avant.jpg', 4),
(41, 'Grand Theft Auto V', 'Jeu d\'action-aventure en monde ouvert, Grand Theft Auto (GTA) V vous place dans la peau de trois personnages inédits : Michael, Trevor et Franklin. Ces derniers ont élu domicile à Los Santos, ville de la région de San Andreas.', 'Action', 'Leslie Benzies', 'Rockstar Games', 'Disponible', 'uploads/1631287693-8700-jaquette-avant.jpg', 4),
(42, 'The Witcher 3 : Wild Hunt', 'The Witcher 3 : Wild Hunt est un Action-RPG se déroulant dans un monde ouvert. Troisième épisode de la série du même nom, inspirée des livres du polonais Andrzej Sapkowski, cet opus relate la fin de l\'histoire de Geralt de Riv.', 'Fantasy', 'Konrad Tomaszkiewicz', 'CD Projekt RED', 'Indisponible', 'uploads/1422469608-7141-jaquette-avant.jpg', 4),
(43, 'Fahrenheit 45', '451 degrés Fahrenheit représentent la température à laquelle un livre s\'enflamme et se consume.Dans cette société future où la lecture, source de questionnement et de réflexion, est considérée comme un acte antisocial, un corps spécial de pompiers est chargé de brûler tous les livres, dont la détention est interdite pour le bien collectif.Montag, le pompier pyromane, se met pourtant à rêver d\'un monde différent, qui ne bannirait pas la littérature et l\'imaginaire au profit d\'un bonheur immédiatement consommable. Il devient dès lors un dangereux criminel, impitoyablement poursuivi par une société qui désavoue son passé.', 'Science Fiction', ' Ray Bradbury', 'Gallimard', 'Disponible', 'uploads/Fahrenheit-451.jpg', 1),
(44, 'La Peste', '- Naturellement, vous savez ce que c\'est, Rieux ? - J\'attends le résultat des analyses. - Moi, je le sais. Et je n\'ai pas besoin d\'analyses. J\'ai fait une partie de ma carrière en Chine, et j\'ai vu quelques cas à Paris, il y a une vingtaine d\'années. Seulement, on n\'a pas osé leur donner un nom, sur le moment... Et puis, comme disait un confrère : \"C\'est impossible, tout le monde sait qu\'elle a disparu de l\'Occident.\" Oui, tout le monde le savait, sauf les morts. Allons, Rieux, vous savez aussi bien que moi ce que c\'est... - Oui, Castel, dit-il, c\'est à peine croyable. Mais il semble bien que ce soit la peste.', 'Récit', 'Albert Camus', 'Gallimard', 'Disponible', 'uploads/La-Peste.jpg', 1),
(45, 'La Guerre et la Paix', 'Au début du XIX? siècle, Pierre Bézoukhov, fils illégitime héritier d\'une grande fortune, et son ami André Bolkonsky, officier tourmenté, évoluent dans une haute société russe francophile et mondaine qui ne tardera pas à être rattrapée par les tourments de la guerre qui s\'annonce. Le parcours spirituel et politique de Pierre, comme le trajet militaire d\'André, est inséparable du destin contrarié de la Russie : Saint-Pétersbourg et Moscou, la campagne et la ville, la Sibérie et l\'Europe... La Russie est bicéphale, tragiquement clivée par le désir patiné de haine qui l\'attache au reste de l\'occident. La France et Napoléon sont l\'incarnation de cet idéal policé et calculateur : un ennemi mortel que les personnages admireront avant de le combattre. Au coeur des guerres napoléoniennes qui ravagèrent le vieux continent, Tolstoï tourne les pages d\'un roman immortel : l\'âme russe.', 'Roman historique', 'Léon Tolstoï', ' Gallimard', 'Disponible', 'uploads/La-Guerre-et-la-Paix.jpg', 1),
(46, 'The Dark Side of the Moon', 'Sortie: 1973', 'Rock progressif', 'Pink Floyd', 'Harvest', 'Disponible', 'uploads/The_Dark_Side_of_the_Moon_Cover.svg.png', 2),
(47, 'Random Access Memories', '17 mai 2013', 'Space rock', 'Daft Punk', 'Daft Life Ltd', 'Disponible', 'uploads/61Uxg-SWExL._SL1500_.jpg', 2);

-- --------------------------------------------------------

--
-- Table structure for table `categorie`
--

CREATE TABLE `categorie` (
  `idCategorie` int UNSIGNED NOT NULL,
  `categorie` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `categorie`
--

INSERT INTO `categorie` (`idCategorie`, `categorie`) VALUES
(1, 'Livre'),
(2, 'CD'),
(3, 'Film'),
(4, 'Jeux-Video');

-- --------------------------------------------------------

--
-- Table structure for table `pret`
--

CREATE TABLE `pret` (
  `idPret` int UNSIGNED NOT NULL,
  `datePret` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `dateRetour` timestamp NULL DEFAULT NULL,
  `idUser` int UNSIGNED NOT NULL,
  `idArticle` int UNSIGNED NOT NULL,
  `rendu` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `pret`
--

INSERT INTO `pret` (`idPret`, `datePret`, `dateRetour`, `idUser`, `idArticle`, `rendu`) VALUES
(12, '2022-04-28 19:35:30', '2022-04-28 19:35:30', 2, 15, '2022-04-29 09:34:42'),
(13, '2022-04-29 09:27:53', '2022-05-06 09:27:53', 2, 45, '2022-04-29 09:30:08'),
(14, '2022-04-29 09:28:07', '2022-05-06 09:28:07', 2, 20, NULL),
(15, '2022-04-29 09:28:19', '2022-05-06 09:28:19', 2, 12, '2022-04-29 09:30:15'),
(16, '2022-04-29 09:28:29', '2022-04-29 09:28:29', 2, 9, '2022-04-29 09:34:40'),
(17, '2022-04-29 09:29:29', '2022-05-06 09:29:29', 5, 47, '2022-04-29 09:30:12'),
(18, '2022-04-29 09:29:34', '2022-05-06 09:29:34', 5, 42, NULL),
(19, '2022-04-29 09:29:40', '2022-05-06 09:29:40', 5, 29, '2022-04-29 09:30:11'),
(20, '2022-04-29 09:29:45', '2022-05-06 09:29:45', 5, 21, '2022-04-29 09:30:10'),
(21, '2022-04-29 09:29:50', '2022-04-29 09:29:50', 5, 10, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `idUser` int UNSIGNED NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `mdp` varchar(255) DEFAULT NULL,
  `type` varchar(255) NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`idUser`, `email`, `mdp`, `type`) VALUES
(1, 'admin@gmail.com', '$2y$12$s4ghsDIoskUbKN3YdeAQ2eSxZRNw7Uy7eRXsYgF.eYqrG/4waFFWu', 'admin'),
(2, 'user@gmail.com', '$2y$12$a3beDgt566kNzJFyyypdEuoHZhw0qoSaDJdE/5fthCEIJXIxogpy6', 'user'),
(5, 'user2@gmail.com', '$2y$12$j5gP4Ul.syJfl59.pjCYF.FgUrfEBfUOUBODqQg6em7eQ4mRT/VfO', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `affichage`
--
ALTER TABLE `affichage`
  ADD PRIMARY KEY (`idAffichage`);

--
-- Indexes for table `article`
--
ALTER TABLE `article`
  ADD PRIMARY KEY (`idArticle`),
  ADD KEY `fk_article_categorie1_idx` (`idCategorie`);

--
-- Indexes for table `categorie`
--
ALTER TABLE `categorie`
  ADD PRIMARY KEY (`idCategorie`);

--
-- Indexes for table `pret`
--
ALTER TABLE `pret`
  ADD PRIMARY KEY (`idPret`),
  ADD KEY `fk_pret_User_idx` (`idUser`),
  ADD KEY `fk_pret_article1_idx` (`idArticle`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`idUser`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `affichage`
--
ALTER TABLE `affichage`
  MODIFY `idAffichage` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `article`
--
ALTER TABLE `article`
  MODIFY `idArticle` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `categorie`
--
ALTER TABLE `categorie`
  MODIFY `idCategorie` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `pret`
--
ALTER TABLE `pret`
  MODIFY `idPret` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `idUser` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `article`
--
ALTER TABLE `article`
  ADD CONSTRAINT `fk_article_categorie1` FOREIGN KEY (`idCategorie`) REFERENCES `categorie` (`idCategorie`);

--
-- Constraints for table `pret`
--
ALTER TABLE `pret`
  ADD CONSTRAINT `fk_pret_article1` FOREIGN KEY (`idArticle`) REFERENCES `article` (`idArticle`),
  ADD CONSTRAINT `fk_pret_User` FOREIGN KEY (`idUser`) REFERENCES `user` (`idUser`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
