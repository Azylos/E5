<?php 
    require_once "lib/vérifSession.php";
    require_once("lib/gestionProfil.php");

    if(isset($_SESSION['admin'])) {
        $id = $_SESSION['admin']['id'];
    } elseif(isset($_SESSION['user'])) {
        $id = $_SESSION['user']['id'];
    }

    // Vérifier si le formulaire a été soumis et appeler la fonction UpdateProfileImage si nécessaire
    if($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_POST["updateProfileImage"])) {
            UpdateProfileImage();
        }
    }

    if(isset($_POST['jeuId'])) {
        $jeuId = $_POST['jeuId'];
        DeleteFromWishlist($id, $jeuId);
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
    <div>
        <form action="profil.php" method="POST" enctype="multipart/form-data">
            <label for="file">Fichier</label>
            <input type="file" name="file">
            <button type="submit" name="updateProfileImage">Enregistrer</button>
        </form>
    </div>
    <div class="section trending">
        <div class="container">
            <div class="row trending-box">
                <?php
                    $wishlist = ShowWishlist($id);
                    foreach ($wishlist as $game) {
                        if($game['wishlist'] == true){
                            $displayWishlists = displayWishlist($game['idJeux']);
                            while ($row = $displayWishlists->fetch(PDO::FETCH_ASSOC)) {
                                echo '<div class="col-lg-3 col-md-6 align-self-center mb-30 trending-items col-md-6 adv">';
                                echo '<div class="item">';
                                echo '<div class="thumb">';
                                echo '<a href="../product-details.php?id=' . $row['JeuxID'] . '"><img src="../assets/images/' . $row['Image'] . '" alt=""></a>';
                                echo '<span class="price"><em></em>' . $row['Tarif'] . '€</span>';
                                echo '</div>';
                                echo '<div class="down-content">';
                                echo '<span class="category">' . $row['Genre'] . '</span>';
                                echo '<h4>' . $row['Titre'] . '</h4>';
                                echo '<a href="#" class="remove-wishlist" data-jeuxid="' . $row['JeuxID'] . '"><i class="fa-solid fa-xmark"></i></a>';
                                echo '</div>';
                                echo '</div>';
                                echo '</div>';
                            }
                        }
                    }
                    ?>
            </div>
        </div>
    </div>
    <?php
        require_once("../vues/footer.php");
    ?>
    
    <script src="../vendor/jquery/jquery.min.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="../assets/js/isotope.min.js"></script>
    <script src="../assets/js/owl-carousel.js"></script>
    <script src="../assets/js/counter.js"></script>
    <script src="../assets/js/custom.js"></script>
    <script>
        // $ signifie utilisation de jQuery
        $(document).ready(function() {
            $(".remove-wishlist").click(function(event) {
                event.preventDefault();     // Empêche le comportement par défaut du lien
                var jeuId = $(this).data("jeuxid");   // Récupère l'identifiant du jeu à partir de l'attribut data-jeuxid de l'élément cliqué

                // Effectue une requête AJAX vers profil.php avec l'identifiant du jeu en tant que données POST
                $.ajax({
                    type: "POST",
                    url: "profil.php",
                    data: { jeuId: jeuId }, // Données à envoyer avec la requête
                    success: function(response) { 
                        // Charge le contenu du bloc .section.trending et le remplace dans le bloc .section.trending actuel
                        $(".section.trending").load("profil.php .section.trending");
                    },
                });
            });
        });
    </script>


  </body>