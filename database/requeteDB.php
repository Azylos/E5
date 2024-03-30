<?php

    require_once("./database/connexion.php");
        // Requête SQL pour récupérer les jeux avec les détails sur l'éditeur, le genre et le prix
    $sql = "SELECT jeux.id, jeux.titre, jeux.description, jeux.dateDeSortie, jeux.image, editeur.nom AS editeur_nom, genre.libelle AS genre_libelle, tarif.TARIF AS prix
            FROM jeux
            INNER JOIN editeur ON jeux.IdEditeur = editeur.id
            INNER JOIN genre ON jeux.IdGenre = genre.id
            INNER JOIN tarif ON jeux.id = tarif.id";

    $result = $connexion->query($sql);

    
    

?>