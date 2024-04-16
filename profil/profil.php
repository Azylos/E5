<?php 
    require_once "lib/vérifSession.php";
    require_once("lib/gestionProfil.php");

    // Vérifier si le formulaire a été soumis et appeler la fonction UpdateProfileImage si nécessaire
    if($_SERVER["REQUEST_METHOD"] == "POST") {
        UpdateProfileImage();
    }
?>
<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap">
    <title>Rungame - Connexion</title>
    <link rel="stylesheet" href="../vendor/bootstrap/css/bootstrap.min.css" >
    <link rel="stylesheet" href="../assets/css/fontawesome.css">
    <link rel="stylesheet" href="../assets/css/templatemo-lugx-gaming.css">
    <link rel="stylesheet" href="../assets/css/owl.css">
    <link rel="stylesheet" href="../assets/css/animate.css">
    <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css"/>
  </head>
  <body>
    <!-- <div id="js-preloader" class="js-preloader">
        <div class="preloader-inner">
        <span class="dot"></span>
        <div class="dots">
            <span></span>
            <span></span>
            <span></span>
        </div>
        </div>
    </div> -->
    <?php require_once("../vues/navbar.php");?>
    <br>
    <br>
    <br>
    <br>
    <br>
    <div class="AjoutFichier">
        <form action="profil.php" method="POST" enctype="multipart/form-data">
            <label for="file">Fichier</label>
            <input type="file" name="file">
            <button type="submit">Enregistrer</button>
        </form>
    </div>

    <?php
        require_once("../vues/footer.php")
    ?>
    
    <script src="../vendor/jquery/jquery.min.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="../assets/js/isotope.min.js"></script>
    <script src="../assets/js/owl-carousel.js"></script>
    <script src="../assets/js/counter.js"></script>
    <script src="../assets/js/custom.js"></script>

  </body>