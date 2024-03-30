/* -------------------------------------------------------------------------------
                                        Création table
  -------------------------------------------------------------------------------------*/
CREATE TABLE IF NOT EXISTS genre
(
    id INTEGER NOT NULL,
    libelle CHAR(32) NULL,
    CONSTRAINT pk_genre PRIMARY KEY (id)
) COMMENT '';

CREATE TABLE IF NOT EXISTS editeur
(
    id INTEGER NOT NULL,
    nom CHAR(32) NULL,
    CONSTRAINT pk_editeur PRIMARY KEY (id)
) COMMENT '';

CREATE TABLE IF NOT EXISTS utilisateurs
(
    id INTEGER NOT NULL,
    pseudo CHAR(32) NULL,
    login CHAR(32) NULL,
    mdp CHAR(32) NULL,
    estAdmin BOOL NULL,
    CONSTRAINT pk_utilisateurs PRIMARY KEY (id)
) COMMENT '';

CREATE TABLE IF NOT EXISTS jeux
(
    id INTEGER NOT NULL,
    id_editeur INTEGER NOT NULL,
    id_genre INTEGER NOT NULL,
    titre CHAR(255) NULL,
    description CHAR(255) NULL,
    date_de_sortie CHAR(32) NULL,
    CONSTRAINT pk_jeux PRIMARY KEY (id),
    CONSTRAINT fk_jeux_editeur FOREIGN KEY (id_editeur) REFERENCES editeur (id),
    CONSTRAINT fk_jeux_genre FOREIGN KEY (id_genre) REFERENCES genre (id)
) COMMENT '';

CREATE INDEX i_fk_jeux_editeur
ON jeux (id_editeur ASC);

CREATE INDEX i_fk_jeux_genre
ON jeux (id_genre ASC);

CREATE TABLE IF NOT EXISTS tarif
(
    id INTEGER NOT NULL,
    date_debut DATE NOT NULL,
    date_fin DATE NULL,
    tarif DECIMAL(10,2) NULL,
    CONSTRAINT pk_tarif PRIMARY KEY (id, date_debut)
) COMMENT '';

CREATE TABLE IF NOT EXISTS vouloir
(
    id_utilisateurs INTEGER NOT NULL,
    id_jeux INTEGER NOT NULL,
    wishlist BOOL NULL,
    CONSTRAINT pk_vouloir PRIMARY KEY (id_utilisateurs, id_jeux),
    CONSTRAINT fk_vouloir_utilisateurs FOREIGN KEY (id_utilisateurs) REFERENCES utilisateurs (id),
    CONSTRAINT fk_vouloir_jeux FOREIGN KEY (id_jeux) REFERENCES jeux (id)
) COMMENT '';

CREATE INDEX i_fk_vouloir_utilisateurs
ON vouloir (id_utilisateurs ASC);

CREATE INDEX i_fk_vouloir_jeux
ON vouloir (id_jeux ASC);

/* -------------------------------------------------------------------------------
                                        Jeu d'essaie
  -------------------------------------------------------------------------------------*/
INSERT INTO Genre (id, libelle)
VALUES
    (1, 'Action'),
    (2, 'Aventure'),
    (3, 'Stratégie'),
    (4, 'RPG'),
    (5, 'Sport');

INSERT INTO Editeur (id, nom)
VALUES
    (1, 'Ubisoft'),
    (2, 'Electronic Arts'),
    (3, 'Activision'),
    (4, 'Square Enix'),
    (5, 'Nintendo');

INSERT INTO Jeux (id, id_editeur, id_genre, titre, description, date_de_sortie)
VALUES
    (1, 1, 1, "Assassin's Creed Valhalla", "Explorez l'âge des Vikings dans ce jeu d'action-aventure.", '2020-11-10'),
    (2, 2, 4, 'Mass Effect: Legendary Edition', 'Revivez l\'épopée spatiale de Shepard dans cette collection remasterisée.', '2021-05-14'),
    (3, 3, 3, 'Call of Duty: Modern Warfare', 'Plongez dans l\'intensité des combats modernes dans ce jeu de tir.', '2019-10-25'),
    (4, 4, 4, 'Final Fantasy VII Remake', 'Redécouvrez le chef-d\'œuvre RPG de Square Enix avec des graphismes époustouflants.', '2020-04-10'),
    (5, 5, 2, 'The Legend of Zelda: Breath of the Wild', 'Explorez le vaste royaume d\'Hyrule dans cette aventure épique.', '2017-03-03'),
    (6, 1, 1, 'Far Cry 6', 'Affrontez un dictateur impitoyable dans un pays insulaire tropical.', '2021-10-07'),
    (7, 2, 4, 'Dragon Age: Inquisition', 'Partez en quête d\'aventures dans ce RPG fantastique de BioWare.', '2014-11-18'),
    (8, 3, 1, 'Call of Duty: Warzone', 'Plongez dans des combats battle royale intenses avec des centaines de joueurs.', '2020-03-10'),
    (9, 4, 2, 'Kingdom Hearts III', 'Rejoignez Sora et ses amis dans cette aventure magique qui mélange Disney et Final Fantasy.', '2019-01-29'),
    (10, 5, 5, 'Mario Kart 8 Deluxe', 'Affrontez vos amis dans des courses endiablées avec vos personnages Nintendo préférés.', '2017-04-28');

INSERT INTO Utilisateurs (id, pseudo, login, mdp, estAdmin)
VALUES
(1, 'admin', 'admin123', 'password', true),
(2, 'user1', 'user1', 'password', false);

INSERT INTO Tarif (id, date_debut, date_fin, tarif)
VALUES
(1, '2020-11-10', NULL, 59.99),
(2, '2021-05-14', NULL, 49.99),
(3, '2019-10-25', NULL, 39.99),
(4, '2020-04-10', NULL, 54.99),
(5, '2017-03-03', NULL, 49.99),
(6, '2021-10-07', NULL, 69.99),
(7, '2014-11-18', NULL, 29.99),
(8, '2020-03-10', NULL, 0), -- Gratuit
(9, '2019-01-29', NULL, 44.99),
(10, '2017-04-28', NULL, 59.99);