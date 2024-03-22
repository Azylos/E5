CREATE TABLE IF NOT EXISTS JEUX
 (
   ID INTEGER NOT NULL,
   ID_Editeur INTEGER NOT NULL,
   ID_Genre INTEGER NOT NULL,
   TITRE CHAR(32) NULL,
   DESCRIPTION CHAR(32) NULL,
   DATEDESORTI CHAR(32) NULL,
   PRIMARY KEY (ID)
 ) COMMENT '';

CREATE INDEX I_FK_JEUX_EDITEUR
 ON JEUX (ID_Editeur ASC);

CREATE INDEX I_FK_JEUX_GENRE
 ON JEUX (ID_Genre ASC);

CREATE TABLE IF NOT EXISTS TARIF
 (
   ID INTEGER NOT NULL,
   DATEDEBUT DATE NOT NULL,
   DATEFIN DATE NULL,
   TARIF DECIMAL(10,2) NULL,
   PRIMARY KEY (ID, DATEDEBUT)
 ) COMMENT '';



CREATE TABLE IF NOT EXISTS GENRE
 (
   ID INTEGER NOT NULL,
   LIBELLE CHAR(32) NULL,
   PRIMARY KEY (ID)
 ) COMMENT '';

CREATE TABLE IF NOT EXISTS EDITEUR
 (
   ID INTEGER NOT NULL,
   NOM CHAR(32) NULL,
   PRIMARY KEY (ID)
 ) COMMENT '';

CREATE TABLE IF NOT EXISTS UTILISATEURS
 (
   ID INTEGER NOT NULL,
   PSEUDO CHAR(32) NULL,
   LOGIN CHAR(32) NULL,
   MDP CHAR(32) NULL,
   ESTADMIN BOOL NULL,
   PRIMARY KEY (ID)
 ) COMMENT '';

CREATE TABLE IF NOT EXISTS VOULOIR
 (
   ID_Utilisateurs INTEGER NOT NULL,
   ID_Jeux INTEGER NOT NULL,
   WISHLIST BOOL NULL,
   PRIMARY KEY (ID_Utilisateurs, ID_Jeux)
 ) COMMENT '';

CREATE INDEX I_FK_VOULOIR_UTILISATEURS
 ON VOULOIR (ID_Utilisateurs ASC);

CREATE INDEX I_FK_VOULOIR_JEUX
 ON VOULOIR (ID_Jeux ASC);

ALTER TABLE JEUX
 ADD FOREIGN KEY FK_JEUX_EDITEUR (ID_Editeur)
     REFERENCES EDITEUR (ID);

ALTER TABLE JEUX
 ADD FOREIGN KEY FK_JEUX_GENRE (ID_Genre)
     REFERENCES GENRE (ID);


ALTER TABLE VOULOIR
 ADD FOREIGN KEY FK_VOULOIR_UTILISATEURS (ID_Utilisateurs)
     REFERENCES UTILISATEURS (ID);

ALTER TABLE VOULOIR
 ADD FOREIGN KEY FK_VOULOIR_JEUX (ID_Jeux)
     REFERENCES JEUX (ID);


INSERT INTO GENRE (ID, LIBELLE)
VALUES
    (1, "Action"),
    (2, "Aventure"),
    (3, "Stratégie"),
    (4, "RPG"),
    (5, "Sport");


INSERT INTO EDITEUR (ID, NOM)
VALUES
    (1, "Ubisoft"),
    (2, "Electronic Arts"),
    (3, "Activision"),
    (4, "Square Enix"),
    (5, "Nintendo");


INSERT INTO JEUX (ID, ID_Editeur, ID_Genre, TITRE, DESCRIPTION, DATEDESORTI)
VALUES
    (1, 1, 1, "Assassin's Creed Valhalla", "Explorez l'âge des Vikings dans ce jeu d'action-aventure.", "2020-11-10"),
    (2, 2, 4, "Mass Effect: Legendary Edition", "Revivez l'épopée spatiale de Shepard dans cette collection remasterisée.", "2021-05-14"),
    (3, 3, 3, "Call of Duty: Modern Warfare", "Plongez dans l'intensité des combats modernes dans ce jeu de tir.", "2019-10-25"),
    (4, 4, 4, "Final Fantasy VII Remake", "Redécouvrez le chef-d'œuvre RPG de Square Enix avec des graphismes époustouflants.", "2020-04-10"),
    (5, 5, 2, "The Legend of Zelda: Breath of the Wild", "Explorez le vaste royaume d'Hyrule dans cette aventure épique.", "2017-03-03"),
    (6, 1, 1, "Far Cry 6", "Affrontez un dictateur impitoyable dans un pays insulaire tropical.", "2021-10-07"),
    (7, 2, 4, "Dragon Age: Inquisition", "Partez en quête d'aventures dans ce RPG fantastique de BioWare.", "2014-11-18"),
    (8, 3, 1, "Call of Duty: Warzone", "Plongez dans des combats battle royale intenses avec des centaines de joueurs.", "2020-03-10"),
    (9, 4, 2, "Kingdom Hearts III", "Rejoignez Sora et ses amis dans cette aventure magique qui mélange Disney et Final Fantasy.", "2019-01-29"),
    (10, 5, 5, "Mario Kart 8 Deluxe", "Affrontez vos amis dans des courses endiablées avec vos personnages Nintendo préférés.", "2017-04-28");
 

 INSERT INTO UTILISATEURS (ID, PSEUDO, LOGIN, MDP, ESTADMIN) VALUES
(1, "admin", "admin123", "password", true),
(2, "user1", "user1", "password", false);

INSERT INTO TARIF (ID, DATEDEBUT, DATEFIN, TARIF) VALUES
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

