<?php
    require_once '../database/connexion.php';

    if(isset($_FILES['file'])){

        $tmpName = $_FILES['file']['tmp_name'];
        $name = $_FILES['file']['name'];
        $size = $_FILES['file']['size'];
        $error = $_FILES['file']['error'];

        $tabExtension = explode('.', $name);
        $extension = strtolower(end($tabExtension));
        //Tableau des extensions que l'on accepte
        $extensions = ['jpg', 'png'];
        //Taille max que l'on accepte
        $maxSize = 400000; //400 Ko

        if(in_array($extension, $extensions) && $size <= $maxSize && $error == 0){
            $uniqueName = uniqid('', true);
            //uniqid génère quelque chose comme ca : 5f586bf96dcd38.73540086
            $file = $uniqueName.".".$extension;
            //$file = 5f586bf96dcd38.73540086.jpg
            //envoyer l’image dans notre dossier
            move_uploaded_file($tmpName, './upload/'.$file);
            $req = $db->prepare('INSERT INTO file (name) VALUES (?)');
            $req->execute([$file]);
            echo "Image enregistrée";
        } else{
            echo "Mauvaise extension ou taille trop grande, Une erreur est survenue";
        }
    }
