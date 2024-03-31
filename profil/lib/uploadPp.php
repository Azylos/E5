<?php
    require '../database/connexion.php';

    if(isset($_FILES['file'])){
            if(isset($_SESSION['admin'])){
                $id = $_SESSION['admin']['id'];
                $oldImagePath = './img/' . $_SESSION['admin']['imgProfil'];
            } 
            if(isset($_SESSION['user'])){
                $id = $_SESSION['user']['id'];
                $oldImagePath = './img/' . $_SESSION['user']['imgProfil'];
            }

        $tmpName = $_FILES['file']['tmp_name'];
        $name = $_FILES['file']['name'];
        $size = $_FILES['file']['size'];
        $error = $_FILES['file']['error'];

        // Supprimer l'ancienne image si elle existe
        if(isset($oldImagePath)){
            if(file_exists($oldImagePath)) {
                unlink($oldImagePath);
            }
        }

        $tabExtension = explode('.', $name);
        $extension = strtolower(end($tabExtension));
        //Tableau des extensions que l'on accepte
        $extensions = ['jpg', 'png'];
        //Taille max que l'on accepte
        $maxSize = 500000; //500 Ko

        if(in_array($extension, $extensions) && $size <= $maxSize && $error == 0){
            $uniqueName = uniqid('', true);
            //uniqid génère quelque chose comme ca : 5f586bf96dcd38.73540086
            $imgName = $uniqueName.".".$extension;
            //envoyer l’image dans notre dossier
            move_uploaded_file($tmpName, './img/'.$imgName);
            $req = $connexion->prepare('UPDATE utilisateurs SET imgProfil = :name WHERE id = :id');
            $req->bindParam(':name', $imgName, PDO::PARAM_STR);
            $req->bindParam(':id', $id, PDO::PARAM_INT);
            $req->execute();

                if(isset($_SESSION['admin'])){
                    $_SESSION['admin']['imgProfil'] = $imgName;
                } 
                if(isset($_SESSION['user'])){
                    $_SESSION['user']['imgProfil'] = $imgName;
                }

            echo "Image enregistrée";
        } else{
            echo "Mauvaise extension ou taille trop grande, Une erreur est survenue";
        }
    }