<?php

    require_once("./database/connexion.php");
    function displayGame() {
        global $connexion;
        $req = "SELECT JeuxID, Titre, Image, Genre, Tarif FROM vue_jeux_details";
        $result = $connexion->query($req);
        return $result;
    }

    function AddWishlist($idUtilisateur, $idJeux) {
        global $connexion;
        $req = "INSERT INTO vouloir VALUES ($idUtilisateur, $idJeux, TRUE)";
        $result = $connexion->query($req);
        return $result;
    }

    function InWishlist($idUtilisateur, $idJeux) {
        global $connexion;
        $req = "SELECT COUNT(*) AS count FROM vouloir WHERE IdUtilisateurs = $idUtilisateur AND IdJeux = $idJeux";
        $result = $connexion->query($req);
        
        if ($result && $result->rowCount() > 0) {
            $row = $result->fetch(PDO::FETCH_ASSOC);
            $count = intval($row['count']);
            return $count > 0; // Renvoie vrai si une correspondance est trouvée, sinon faux
        } else {
            return false; // Renvoie faux si une erreur s'est produite ou si aucune correspondance n'a été trouvée
        }
    }

    function DeleteWishlist($IdUtilisateur, $IdJeux) {
        global $connexion;
        $req = "DELETE FROM vouloir WHERE IdUtilisateurs = $IdUtilisateur AND IdJeux = $IdJeux";
        $result = $connexion->exec($req);
        return $result;
    }
    
    

?>