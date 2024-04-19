<?php
    // Définition de la fonction choisirImageAleatoire
    function choisirImageAleatoire($listeImages) {
        // Obtenir un index aléatoire dans la plage de la liste d'images
        $indexAleatoire = array_rand($listeImages);

        // Récupérer l'image correspondant à l'index aléatoire
        $imageAleatoire = $listeImages[$indexAleatoire];

        // Retourner l'image choisie aléatoirement
        return $imageAleatoire;
    }
    require_once ("../../database/connexion.php");
    require_once ("./gestionJeux.php");

    // Vérifiez si le formulaire a été soumis
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Récupérez les données soumises par le formulaire
        $titre = $_POST["titre"];
        $description = $_POST["description"];
        $idEditeur = $_POST["idEditeur"];
        $idGenre = $_POST["idGenre"];
        $dateDeSortie = $_POST["dateDeSortie"];

        // Liste des images disponibles
        $listeImages = array(
            "trending-01.jpg",
            "trending-02.jpg",
            "trending-03.jpg"
        );

        // Sélectionner une image aléatoire
        $image = choisirImageAleatoire($listeImages);

        // Appel de la fonction AddGame pour insérer les données
        $result = AddGame($idEditeur, $idGenre, $titre, $description, $dateDeSortie, $image);

        // Vérification du résultat de l'insertion
        if ($result) {
            echo "Le jeu a été ajouté avec succès.";
        } else {
            echo "Une erreur s'est produite lors de l'ajout du jeu.";
        }
    }

    

    header("Location: ../newGame.php");

?>
