<?php
    // Connexion à la base de données
    $servername = "localhost";
    $username = "Rungame_Ad";
    $password = "12-Soleil&";
    $dbname = "e5_rungame";

    $conn = new mysqli($servername, $username, $password, $dbname);

    // Vérification de la connexion
    if ($conn->connect_error) {
        die("Échec de la connexion: " . $conn->connect_error);
    }

    // Définition de l'encodage des caractères à UTF-8
    $conn->set_charset("utf8mb4");


?>