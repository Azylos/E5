<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <title>Lugx Gaming - Product Detail</title>

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
          <h3>Modern Warfare® II</h3>
          <span class="breadcrumb"><a href="#">Home</a>  >  <a href="#">Shop</a>  >  Assasin Creed</span>
        </div>
      </div>
    </div>
  </div>

  <div class="single-product section">
    <div class="container">
      <div class="row">
        <div class="col-lg-6">
          <div class="left-image">
            <img src="assets/images/single-game.jpg" alt="">
          </div>
        </div>
        <div class="col-lg-6 align-self-center">
          <h4>Call of Duty®: Modern Warfare® II</h4>
          <span class="price"><em>$28</em> $22</span>
          <br>
          <form id="qty" action="#">
  
            <button type="submit"><i class="fa fa-shopping-bag"></i> Wishlist</button>
          </form>
          <ul>
            <li><span>Genre:</span> <a href="#">Action</a>, <a href="#">Team</a>, <a href="#">Single</a></li>
            <li><span>Editeur:</span> <a href="#">test</a></li>
          </ul>
        </div>
  
        <div class="col-lg-12">
          <div class="sep"></div>
        </div>
      </div>
    </div>
  </div> -->
<?php
require_once("./database/connexion.php");
  // Vérifier si l'identifiant du jeu est passé dans l'URL
if(isset($_GET['id'])) {
    $jeu_id = $_GET['id'];
    
    // Requête SQL pour récupérer les détails du jeu depuis la vue vue_jeux_details
    $sql2 = "SELECT * FROM vue_jeux_details WHERE JeuxID = $jeu_id";
    $result = $conn->query($sql2);

    if ($result->num_rows > 0) {
        // Afficher les détails du jeu
        $row = $result->fetch_assoc();
        $titre = $row['Titre'];
        $description = $row['Description'];
        $date_de_sortie = $row['DateDeSortie'];
        $image = $row['Image'];
        $genre = $row['Genre'];
        $editeur = $row['Editeur'];
        $tarif = $row['Tarif'];
        $date_debut_tarif = $row['dateDebutTarif'];
        $date_fin_tarif = $row['dateFinTarif'];
        // Structure HTML pour la page de détails du produit
        echo '<div class="page-heading header-text">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <h3>'.$titre.'</h3>
                            <span class="breadcrumb"><a href="./">Home</a>  >  <a href="#">Shop</a>  >  '.$titre.'</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="single-product section">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="left-image">
                                <img src="assets/images/'.$image.'" alt="'.$titre.'">
                            </div>
                        </div>
                        <div class="col-lg-6 align-self-center">
                            <h4>'.$titre.'</h4>
                            <span class="price"><em></em>'.$tarif.'€</span>
                            <br>
                            <form id="qty" action="#">
                                <button type="submit"><i class="fa fa-shopping-bag"></i> Wishlist</button>
                            </form>
                            <ul>
                                <li><span>Genre:</span> <a href="#">'.$genre.'</a></li>
                                <li><span>Editeur:</span> <a href="#">'.$editeur.'</a></li>
                                <li><span>Date de sortie:</span> '.$date_de_sortie.'</li>
                                <!-- Ajoutez dautres détails selon vos besoins -->
                            </ul>
                        </div>

                        <div class="col-lg-12">
                            <div class="sep"></div>
                        </div>
                    </div>
                </div>
            </div>';
    } else {
        echo "Aucun jeu trouvé avec cet identifiant.";
    }
} else {
    echo "Identifiant du jeu non spécifié.";
}

$conn->close();
?>

  <div class="more-info">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="tabs-content">
            <div class="row">
              <div class="nav-wrapper ">
                <ul class="nav nav-tabs" role="tablist">
                  <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="description-tab" data-bs-toggle="tab" data-bs-target="#description" type="button" role="tab" aria-controls="description" aria-selected="true">Description</button>
                  </li>

                </ul>
              </div>              
              <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="description" role="tabpanel" aria-labelledby="description-tab">
                  <?php
                    echo "<p>".$description."</p>"
                  ?>
                  <!-- <p>You can search for more templates on Google Search using keywords such as "templatemo digital marketing", "templatemo one-page", "templatemo gallery", etc. Please tell your friends about our website. If you need a variety of HTML templates, you may visit Tooplate and Too CSS websites.</p>
                  <br>
                  <p>Coloring book air plant shabby chic, crucifix normcore raclette cred swag artisan activated charcoal. PBR&B fanny pack pok pok gentrify truffaut kitsch helvetica jean shorts edison bulb poutine next level humblebrag la croix adaptogen. Hashtag poke literally locavore, beard marfa kogi bruh artisan succulents seitan tonx waistcoat chambray taxidermy. Same cred meggings 3 wolf moon lomo irony cray hell of bitters asymmetrical gluten-free art party raw denim chillwave tousled try-hard succulents street art.</p> -->
                </div>

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="section categories related-games">
    <div class="container">
      <div class="row">
        <div class="col-lg-6">
          <div class="section-heading">
            <h6>Action</h6>
            <h2>Related Games</h2>
          </div>
        </div>
        <div class="col-lg-6">
          <div class="main-button">
            <a href="shop.php">View All</a>
          </div>
        </div>
        <div class="col-lg col-sm-6 col-xs-12">
          <div class="item">
            <h4>Action</h4>
            <div class="thumb">
              <a href="product-details.php"><img src="assets/images/categories-01.jpg" alt=""></a>
            </div>
          </div>
        </div>
        <div class="col-lg col-sm-6 col-xs-12">
          <div class="item">
            <h4>Action</h4>
            <div class="thumb">
              <a href="product-details.php"><img src="assets/images/categories-05.jpg" alt=""></a>
            </div>
          </div>
        </div>
        <div class="col-lg col-sm-6 col-xs-12">
          <div class="item">
            <h4>Action</h4>
            <div class="thumb">
              <a href="product-details.php"><img src="assets/images/categories-03.jpg" alt=""></a>
            </div>
          </div>
        </div>
        <div class="col-lg col-sm-6 col-xs-12">
          <div class="item">
            <h4>Action</h4>
            <div class="thumb">
              <a href="product-details.php"><img src="assets/images/categories-04.jpg" alt=""></a>
            </div>
          </div>
        </div>
        <div class="col-lg col-sm-6 col-xs-12">
          <div class="item">
            <h4>Action</h4>
            <div class="thumb">
              <a href="product-details.php"><img src="assets/images/categories-05.jpg" alt=""></a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <?php
    require_once("./vues/footer.php")
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