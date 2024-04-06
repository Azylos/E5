<?php 
    require "../database/connexion.php";

    // utilisateur 
    function ShowUsers($IdUtilisateur) {
        global $connexion;
        $req = "SELECT * FROM utilisateurs WHERE id = $IdUtilisateur";
        $result = $connexion->query($req);
        return $result;
    }

    function UpdateUser($id, $pseudo, $login, $mdp) {
        global $connexion;
        $req = "UPDATE utilisateurs SET pseudo = '$pseudo', login = '$login', mdp = '$mdp' WHERE id = $id";
        $result = $connexion->exec($req);
        return $result;
    }

    function UpdateProfileImage() {
        global $connexion;
        
        if(isset($_FILES['file'])) {
            $id = null;
            $oldImagePath = null;
    
            if(isset($_SESSION['admin'])) {
                $id = $_SESSION['admin']['id'];
                $oldImagePath = './img/' . $_SESSION['admin']['imgProfil'];
            } elseif(isset($_SESSION['user'])) {
                $id = $_SESSION['user']['id'];
                $oldImagePath = './img/' . $_SESSION['user']['imgProfil'];
            }
    
            $tmpName = $_FILES['file']['tmp_name'];
            $name = $_FILES['file']['name'];
            $size = $_FILES['file']['size'];
            $error = $_FILES['file']['error'];
    
            // Supprimer l'ancienne image si elle existe
            if(isset($oldImagePath) && file_exists($oldImagePath)) {
                if($oldImagePath != "./img/defaut.png"){
                    unlink($oldImagePath);
                }                
            }
    
            $tabExtension = explode('.', $name);
            $extension = strtolower(end($tabExtension));
            // Tableau des extensions que l'on accepte
            $extensions = ['jpg', 'png'];
            // Taille max que l'on accepte
            $maxSize = 500000; // 500 Ko
    
            if(in_array($extension, $extensions) && $size <= $maxSize && $error == 0) {
                $uniqueName = uniqid('', true);
                // uniqid génère quelque chose comme ca : 5f586bf96dcd38.73540086
                $imgName = $uniqueName.".".$extension;
                // envoyer l’image dans notre dossier
                move_uploaded_file($tmpName, './img/'.$imgName);
                $req = $connexion->prepare('UPDATE utilisateurs SET imgProfil = :name WHERE id = :id');
                $req->bindParam(':name', $imgName, PDO::PARAM_STR);
                $req->bindParam(':id', $id, PDO::PARAM_INT);
                $req->execute();
    
                if(isset($_SESSION['admin'])) {
                    $_SESSION['admin']['imgProfil'] = $imgName;
                } elseif(isset($_SESSION['user'])) {
                    $_SESSION['user']['imgProfil'] = $imgName;
                }
    
                echo "Image enregistrée";
            } else {
                echo "Mauvaise extension ou taille trop grande, Une erreur est survenue";
            }
        }
    }
    
    // wishlist
    function ShowWishlist($IdUtilisateur) {
        global $connexion;
        $req = "SELECT idJeux, wishlist FROM vouloir WHERE IdUtilisateurs = $IdUtilisateur";
        $result = $connexion->query($req);
        return $result;
    }

    
    function displayWishlist($idJeux) {
        global $connexion;
        $req = "SELECT JeuxID, Titre, Image, Genre, Tarif FROM vue_jeux_details WHERE JeuxID = $idJeux";
        $result = $connexion->query($req);
        return $result;
    }
    
    function AddToWishlist($IdUtilisateur, $IdJeux, $wishlist) {
        global $connexion;
        $req = "INSERT INTO vouloir (IdUtilisateurs, IdJeux, wishlist) VALUES ($IdUtilisateur, $IdJeux, $wishlist)";
        $result = $connexion->exec($req);
        return $result;
    }
    
    function DeleteFromWishlist($IdUtilisateur, $IdJeux) {
        global $connexion;
        $req = "DELETE FROM vouloir WHERE IdUtilisateurs = $IdUtilisateur AND IdJeux = $IdJeux";
        $result = $connexion->exec($req);
        return $result;
    }
    