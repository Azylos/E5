<?php require_once "lib/vérifSession.php" ?>
<!DOCTYPE html>
<html lang="fr">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <title>Rungame - Jeux vidéos</title>

    <!-- Bootstrap core CSS -->
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">


    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="../assets/css/fontawesome.css">
    <link rel="stylesheet" href="../assets/css/templatemo-lugx-gaming.css">
    <link rel="stylesheet" href="../assets/css/owl.css">
    <link rel="stylesheet" href="../assets/css/animate.css">
    <link rel="stylesheet" href="styles/styles.css">
    <link rel="stylesheet"href="https://unpkg.com/swiper@7/swiper-bundle.min.css"/>
<!--

TemplateMo 589 lugx gaming

https://templatemo.com/tm-589-lugx-gaming

-->
  </head>

<body>

  <!-- ***** Preloader Start ***** -->
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
  <!-- ***** Preloader End ***** -->

  <!-- ***** Header Area Start ***** -->
  <?php
    require_once("vues/navbar.php");
  ?>
  <!-- ***** Header Area End ***** -->

  <section id = "GestM">
        
        <div class="formM1">
            <form  method="POST" name="formAjoutNews" action="ajoutNews.php">
                <fieldset style="min-height:100px;">
                    <div class="formClub">
                        <!-- <label class="titre_1" for="">Formulaire d'ajout d'un membres</label><br> -->
                        <legend><b> Formulaire d'ajout d'une actualitée </b> </legend> <br>
    
                        <!-- <input type = "hidden" name = "idNews"  placeholder="id" required></p> -->
    
                        <p>Photos de l'actualitée : <br><input type = "text" name = "photosNews" maxlength="50" placeholder="ex: photo.png" ></p><br>
    
                        <p>Descriptions de l'actualitée : <br><input type = "text" name = "descriptionsNews" maxlength="300"  required></p><br>
    
                        <p>L'auteur : <br><input type = "text" name = "auteurNews"  maxlength="50" placeholder="ex: Florida BARRIA" required ></p><br>
    
                        <p>Date de l'actualitée : <br><input type = "date" name = "dateNews" required></p><br>
    
                        <button type = "submit" class="button-A" role="button"><span class="text">Ajout d'une actualitée !</span><span>Ajouter!</span></button>
                        <!-- <input class="button" type="submit"  name="Connecter" value="Ajouter un membre !" > -->
                    </div>
                </fieldset>
            </form>
        </div> 

    </section>

  <?php
    require_once("../vues/footer.php")
  ?>

  <!-- Scripts -->
  <!-- Bootstrap core JavaScript -->
  <script src="../vendor/jquery/jquery.min.js"></script>
  <script src="../vendor/bootstrap/js/bootstrap.min.js"></script>
  <script src="../assets/js/isotope.min.js"></script>
  <script src="../assets/js/owl-carousel.js"></script>
  <script src="../assets/js/counter.js"></script>
  <script src="../assets/js/custom.js"></script>

  </body>
</html>