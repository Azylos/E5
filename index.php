<?php session_start(); ?>
<!DOCTYPE html>
<html lang="fr">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <title>Rungame - Jeux vidéos</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">


    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="assets/css/fontawesome.css">
    <link rel="stylesheet" href="assets/css/templatemo-lugx-gaming.css">
    <link rel="stylesheet" href="assets/css/owl.css">
    <link rel="stylesheet" href="assets/css/animate.css">
    <link rel="stylesheet"href="https://unpkg.com/swiper@7/swiper-bundle.min.css"/>
<!--

TemplateMo 589 lugx gaming

https://templatemo.com/tm-589-lugx-gaming

-->
  </head>

<body>

  <!-- ***** Preloader Start ***** -->
  <div id="js-preloader" class="js-preloader">
    <div class="preloader-inner">
      <span class="dot"></span>
      <div class="dots">
        <span></span>
        <span></span>
        <span></span>
      </div>
    </div>
  </div>
  <!-- ***** Preloader End ***** -->

  <!-- ***** Header Area Start ***** -->
  <?php
    require_once("./vues/navbar.php");
  ?>
  <!-- ***** Header Area End ***** -->

  <!-- <div class="page-heading header-text">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <h3>Our Shop</h3>
          <span class="breadcrumb"><a href="#">Home</a> > Our Shop</span>
        </div>
      </div>
    </div>
  </div> -->

  <div class="main-banner">
      <div class="container">
      <div class="row">
          <div class="col-lg-6 align-self-center">
          <div class="caption header-text">
              <h6>Bienvenue chez RUNGAME</h6>
              <h2>MEILLEUR SITE DE JEU VIDEO !</h2>
              <p>à mettre quelque chose</p>
              <div class="search-input">

              </div>
          </div>
          </div>
          <div class="col-lg-4 offset-lg-2">
          <div class="right-image">
              <img src="assets/images/banner-image.jpg" alt="">
              <span class="price">22€</span>
              <!-- <span class="offer">-40%</span> -->
          </div>
          </div>
      </div>
      </div>
  </div>

  <div class="section trending">
    <div class="container">
      <ul class="trending-filter">
        <li>
          <a class="is_active" href="#!" data-filter="*">Tout Les Jeux</a>
          <!-- <a class="is_active" href="#!" data-filter="*">Romance</a> -->
        </li>
        <!-- <li>
          <a href="#!" data-filter=".adv">Adventure</a>
        </li>
        <li>
          <a href="#!" data-filter=".str">Strategy</a>
        </li>
        <li>
          <a href="#!" data-filter=".rac">Racing</a>
        </li> -->
      </ul>
      <div class="row trending-box">
      <?php
        require_once("./database/requeteDB.php");
        if ($result->rowCount() >  0) {
            // Afficher les jeux avec les détails de l'éditeur, du genre et du prix
            while($row = $result->fetch(PDO::FETCH_ASSOC)) {
              echo '<div class="col-lg-3 col-md-6 align-self-center mb-30 trending-items col-md-6 adv">';
              echo '<div class="item">';
              echo '<div class="thumb">';
              echo '<a href="product-details.php?id='.$row['id'].'"><img src="assets/images/'.$row['image'].'" alt=""></a>';
              echo '<span class="price"><em></em>'.$row['prix'].'€</span>';
              echo '</div>';
              echo '<div class="down-content">';
              echo '<span class="category">'.$row['genre_libelle'].'</span>';
              echo '<h4>'.$row['titre'].'</h4>';
              // echo '<p><strong>Editeur:</strong> ' . $row["editeur_nom"] . '</p>';
              // echo '<p><strong>Description:</strong> ' . $row["DESCRIPTION"] . '</p>';
              echo '<a href="product-details.php"><i class="fa fa-shopping-bag"></i></a>';
              echo '</div>';
              echo '</div>';
              echo '</div>';
          }
          } else {
              echo "0 résultats";
          }
          $connexion = null;
      ?>
      </div>
      </div>

    </div>
  </div>

  <?php
    require_once("./vues/scrollup.php");
  ?>
  <?php
    require_once("./vues/footer.php");
  ?>

  <!-- Scripts -->
  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
  <script src="assets/js/isotope.min.js"></script>
  <script src="assets/js/owl-carousel.js"></script>
  <script src="assets/js/counter.js"></script>
  <script src="assets/js/custom.js"></script>
      
  </body>
</html>