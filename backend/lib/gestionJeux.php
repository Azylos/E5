<?php 
    // require_once "./database/connexion.php";
    //éditeur
    function ShowEditor() {
        global $connexion;
        $req = "SELECT * FROM editeur";
        $result = $connexion->query($req);
        return $result;
    }

    function AddEditor($nom) {
        global $connexion;
        $req = "INSERT INTO editeur (nom) VALUES ('$nom')";
        $result = $connexion->exec($req);
        return $result;
    }

    function UpdateEditor($id, $nouveauNom) {
        global $connexion;
        $req = "UPDATE editeur SET nom = '$nouveauNom' WHERE id = $id";
        $result = $connexion->exec($req);
        return $result;
    }

    function DeleteEditor($id) {
        global $connexion;
        $req = "DELETE FROM editeur WHERE id = $id";
        $result = $connexion->exec($req);
        return $result;
    }

    //genre

    function ShowGenre() {
        global $connexion;
        $req = "SELECT * FROM genre";
        $result = $connexion->query($req);
        return $result;
    }
    
    function AddGenre($libelle) {
        global $connexion;
        $req = "INSERT INTO genre (libelle) VALUES ('$libelle')";
        $result = $connexion->exec($req);
        return $result;
    }
    
    function UpdateGenre($id, $nouveauLibelle) {
        global $connexion;
        $req = "UPDATE genre SET libelle = '$nouveauLibelle' WHERE id = $id";
        $result = $connexion->exec($req);
        return $result;
    }
    
    function DeleteGenre($id) {
        global $connexion;
        $req = "DELETE FROM genre WHERE id = $id";
        $result = $connexion->exec($req);
        return $result;
    }
    
    // jeux

    function ShowGames() {
        global $connexion;
        $req = "SELECT * FROM jeux";
        $result = $connexion->query($req);
        return $result;
    }
    
    function AddGame($idEditeur, $idGenre, $titre, $description, $dateDeSortie, $image) {
        global $connexion;
        $req = "INSERT INTO jeux (IdEditeur, IdGenre, titre, description, dateDeSortie, image) VALUES ($idEditeur, $idGenre, '$titre', '$description', '$dateDeSortie', '$image')";
        $result = $connexion->exec($req);
        return $result;
    }

    
    function UpdateGame($id, $idEditeur, $idGenre, $titre, $description, $dateDeSortie, $image) {
        global $connexion;
        $req = "UPDATE jeux SET IdEditeur = $idEditeur, IdGenre = $idGenre, titre = '$titre', description = '$description', dateDeSortie = '$dateDeSortie', image = '$image' WHERE id = $id";
        $result = $connexion->exec($req);
        return $result;
    }
    
    function DeleteGame($id) {
        global $connexion;
        $req = "DELETE FROM jeux WHERE id = $id";
        $result = $connexion->exec($req);
        return $result;
    }
    
    //tarif
    function ShowPrices() {
        global $connexion;
        $req = "SELECT * FROM tarif";
        $result = $connexion->query($req);
        return $result;
    }
    
    function AddPrice($id, $dateDebut, $dateFin, $tarif) {
        global $connexion;
        $req = "INSERT INTO tarif (id, dateDebut, dateFin, tarif) VALUES ($id, '$dateDebut', '$dateFin', $tarif)";
        $result = $connexion->exec($req);
        return $result;
    }
    
    function UpdatePrice($id, $dateDebut, $dateFin, $tarif) {
        global $connexion;
        $req = "UPDATE tarif SET dateDebut = '$dateDebut', dateFin = '$dateFin', tarif = $tarif WHERE id = $id";
        $result = $connexion->exec($req);
        return $result;
    }
    
    function DeletePrice($id) {
        global $connexion;
        $req = "DELETE FROM tarif WHERE id = $id";
        $result = $connexion->exec($req);
        return $result;
    }
    