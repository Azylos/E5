/* -------------------------------------------------------------------------------
                                        Création table
  -------------------------------------------------------------------------------------*/
DROP TABLE IF EXISTS `editeur`;

CREATE TABLE `editeur` (
  `id` int NOT NULL,
  `nom` char(32) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

DROP TABLE IF EXISTS `genre`;

CREATE TABLE `genre` (
  `id` int NOT NULL,
  `libelle` char(32) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

DROP TABLE IF EXISTS `jeux`;

CREATE TABLE `jeux` (
  `id` int NOT NULL,
  `IdEditeur` int NOT NULL,
  `IdGenre` int NOT NULL,
  `titre` char(32) DEFAULT NULL,
  `description` char(255) DEFAULT NULL,
  `dateDeSortie` date DEFAULT NULL,
  `image` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_JeuxEditeur` (`IdEditeur`),
  KEY `FK_JeuxGenre` (`IdGenre`),
  CONSTRAINT `FK_JeuxEditeur` FOREIGN KEY (`IdEditeur`) REFERENCES `editeur` (`id`),
  CONSTRAINT `FK_JeuxGenre` FOREIGN KEY (`IdGenre`) REFERENCES `genre` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

DROP TABLE IF EXISTS `tarif`;

CREATE TABLE `tarif` (
  `id` int NOT NULL,
  `dateDebut` date NOT NULL,
  `dateFin` date DEFAULT NULL,
  `tarif` decimal(10,2) DEFAULT NULL,
  PRIMARY KEY (`id`,`dateDebut`),
  CONSTRAINT `FK_tarifJeux` FOREIGN KEY (`id`) REFERENCES `jeux` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

DROP TABLE IF EXISTS `utilisateurs`;

CREATE TABLE `utilisateurs` (
  `id` int NOT NULL,
  `pseudo` char(32) DEFAULT NULL,
  `login` char(32) DEFAULT NULL,
  `mdp` char(32) DEFAULT NULL,
  `estAdmin` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

DROP TABLE IF EXISTS `vouloir`;

CREATE TABLE `vouloir` (
  `IdUtilisateurs` int NOT NULL,
  `IdJeux` int NOT NULL,
  `wishlist` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`IdUtilisateurs`,`IdJeux`),
  KEY `FK_VouloirJeux` (`IdJeux`),
  CONSTRAINT `FK_VouloirJeux` FOREIGN KEY (`IdJeux`) REFERENCES `jeux` (`id`),
  CONSTRAINT `FK_VouloirUtilisateurs` FOREIGN KEY (`IdUtilisateurs`) REFERENCES `utilisateurs` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/* -------------------------------------------------------------------------------
                                        création d'une vue "jeux détail"
  -------------------------------------------------------------------------------------*/

  CREATE VIEW vue_jeux_details AS
    SELECT j.id AS JeuxID, j.titre AS Titre, j.description AS Description, j.dateDeSortie AS DateDeSortie, j.image AS Image,
       g.id AS GenreID, g.libelle AS Genre,
       e.id AS EditeurID, e.nom AS Editeur,
       t.id AS TarifID, t.tarif AS Tarif,t.dateDebut AS dateDebutTarif,t.dateFin AS dateFinTarif
    FROM jeux j
    JOIN genre g ON j.IdGenre = g.id
    JOIN editeur e ON j.IdEditeur = e.id
    JOIN tarif t ON j.id = t.id;

/* -------------------------------------------------------------------------------
                                        Jeu d'essaie
  -------------------------------------------------------------------------------------*/
INSERT INTO `editeur` 
VALUES (1,'Ubisoft'),
  (2,'Electronic Arts'),
  (3,'Activision'),
  (4,'Square Enix'),
  (5,'Nintendo');

INSERT INTO `genre` 
VALUES (1,'Action'),
  (2,'Aventure'),
  (3,'Stratégie'),
  (4,'RPG'),
  (5,'Sport');

INSERT INTO `jeux` 
VALUES (1,1,1,'Assassin\'s Creed Valhalla','Explorez l\'âge des Vikings dans','2020-11-10','trending-01.jpg'),
  (2,2,4,'Mass Effect: Legendary Edition','Revivez l\'épopée spatiale de She','2021-05-14','trending-02.jpg'),
  (3,3,3,'Call of Duty: Modern Warfare','Plongez dans l\'intensité des com','2019-10-25','trending-03.jpg'),
  (4,4,4,'Final Fantasy VII Remake','Redécouvrez le chef-d\'œuvre RPG','2020-04-10','trending-02.jpg'),
  (5,5,2,'The Legend of Zelda: Breath of t','Explorez le vaste royaume d\'Hyru','2017-03-03','trending-01.jpg'),
  (6,1,1,'Far Cry 6','Affrontez un dictateur impitoyab','2021-10-07','trending-03.jpg'),
  (7,2,4,'Dragon Age: Inquisition','Partez en quête d\'aventures dans','2014-11-18','trending-02.jpg'),
  (8,3,1,'Call of Duty: Warzone','Plongez dans des combats battle','2020-03-10','trending-01.jpg'),
  (9,4,2,'Kingdom Hearts III','Rejoignez Sora et ses amis dans','2019-01-29','trending-03.jpg'),
  (10,5,5,'Mario Kart 8 Deluxe','Affrontez vos amis dans des cour','2017-04-28','trending-02.jpg');

INSERT INTO `tarif` 
VALUES (1,'2020-11-10',NULL,59.99),
  (2,'2021-05-14',NULL,49.99),
  (3,'2019-10-25',NULL,39.99),
  (4,'2020-04-10',NULL,54.99),
  (5,'2017-03-03',NULL,49.99),
  (6,'2021-10-07',NULL,69.99),
  (7,'2014-11-18',NULL,29.99),
  (8,'2020-03-10',NULL,0.00),
  (9,'2019-01-29',NULL,44.99),
  (10,'2017-04-28',NULL,59.99);

INSERT INTO `utilisateurs` 
VALUES (1,'admin','admin123','password',1),
  (2,'user1','user1','password',0);

  /* -------------------------------------------------------------------------------
                                        Utilisateur
  -------------------------------------------------------------------------------------*/

create user 'Rungame_Ad'@'%' identified by '12-Soleil&';
grant select, update, insert, delete on e5_rungame.* to 'Rungame_Ad'@'%'; 