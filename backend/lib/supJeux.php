<?php
    // Inclure le fichier de connexion à la base de données et les autres dépendances nécessaires
    require_once ("../../database/connexion.php");
    require_once ("./gestionJeux.php");

    // Vérifier si l'ID du jeu à supprimer est passé dans l'URL
    if(isset($_GET['id']) && !empty($_GET['id'])) {
        // Récupérer l'ID du jeu à supprimer depuis l'URL
        $idJeu = $_GET['id'];

        
        $supJeux = DeleteGame($idJeu);

        // Vérification du résultat de l'insertion du jeu
        if ($supJeux) {
            echo "Le jeu a été supprimé avec succès.";
        }else {
            echo "Une erreur s'est produite lors de la suppression du jeu.";
        }

        // Rediriger vers la page de liste des jeux après la suppression
        header("Location: ../listeJeux.php");
        exit(); // Assurez-vous de terminer le script après la redirection
    } else {
        // Si l'ID du jeu n'est pas passé dans l'URL, afficher un message d'erreur ou rediriger vers une autre page
        // ...
    }
?>
