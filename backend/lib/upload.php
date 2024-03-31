<?php
    require './bdd.php';

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
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1'>

</head>
<body>
    <form action="upload.php" method="POST" enctype="multipart/form-data">
        <label for="file">Fichier</label>
        <input type="file" name="file">
        <button type="submit">Enregistrer</button>
    </form>
    <h2>Mes images</h2>
    <?php 
        $req = $db->query('SELECT name FROM file');
        while($data = $req->fetch()){
            // var_dump($data);
            echo "<img src='./upload/".$data['name']."' width='300px' ><br>";
        }
    ?>
</body>
</html>