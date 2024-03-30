<?php
    session_start();	
    session_unset();
    $echec = null;
    
    if(isset($_POST['identifiant']) && isset($_POST['mdp'])){

        $id = $_POST['identifiant'];
        $mdp = $_POST['mdp'];

        require_once "../database/connexion.php";

        $VérifLog = "SELECT * FROM utilisateurs 
                     WHERE login = :identifiant AND  mdp = :mdp; ";
        
        $result = $connexion->prepare($VérifLog);
        $result->bindParam(':identifiant', $id, PDO::PARAM_STR);
        $result->bindParam(':mdp', $mdp, PDO::PARAM_STR);
        $result->execute();

        $userConnect = $result->fetch();

        if (!$userConnect) {
            $echec = "<p class='Echec'>identifiant ou mot de passe incorrects</p>";
        } else {
            if ($userConnect['estAdmin'] == 1) {
                $_SESSION['admin'] = [
                    'pseudo' => $userConnect['pseudo'],
                ];
            } else {
                $_SESSION['user'] = [
                    'pseudo' => $userConnect['pseudo'],
                ];
            }

            if(isset($_SESSION["admin"])) {
                header("Location: ../backend/index.php");
            } else {
                header("Location: ../index.php");
            }
        }
    } 