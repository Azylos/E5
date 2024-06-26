<?php 
  session_start(); 
  require_once("./database/requeteDB.php");

  if(isset($_SESSION['admin'])) {
      $id = $_SESSION['admin']['id'];
  } elseif(isset($_SESSION['user'])) {
      $id = $_SESSION['user']['id'];
  }
?>
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

<?php
  // Vérifier si l'identifiant du jeu est passé dans l'URL
if(isset($_GET['id'])) {
    $jeu_id = $_GET['id'];

    if(isset($_POST['deleteWishlist'])) {
      DeleteWishlist($id,$jeu_id);
    }

    if(isset($_POST['addWishlist'])) {
      AddWishlist($id,$jeu_id);
    }

    if(isset($id)){
      $InWishlist = InWishlist($id,$jeu_id);
    }

    // Requête SQL pour récupérer les détails du jeu depuis la vue vue_jeux_details
    $sql2 = "SELECT * FROM vue_jeux_details WHERE JeuxID = $jeu_id";
    $result = $connexion->query($sql2);

    if ($result->rowCount() > 0) {
        // Afficher les détails du jeu
        $row = $result->fetch(PDO::FETCH_ASSOC);
        $titre = $row['Titre'];
        $description = $row['Description'];
        $date_de_sortie = $row['DateDeSortie'];
        $image = $row['Image'];
        $genre = $row['Genre'];
        $editeur = $row['Editeur'];
        $tarif = $row['Tarif'];
        $date_debut_tarif = $row['dateDebutTarif'];
        $date_fin_tarif = $row['dateFinTarif'];
        ?>
        <div class="page-heading header-text">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <h3><?=$titre?></h3>
                        <span class="breadcrumb"><a href="./">Home</a>  >  <a href="#">Shop</a>  > <?=$titre?></span>
                    </div>
                </div>
            </div>
        </div>

        <div class="single-product section">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="left-image">
                            <img src="assets/images/<?=$image?>" alt="<?=$titre?>">
                        </div>
                    </div>
                    <div class="col-lg-6 align-self-center">
                        <h4><?=$titre?></h4>
                        <span class="price"><em></em><?=$tarif?>€</span>
                        <br>

                        <form action="#" method="post" id="wishlistForm">
                            <?php 
                            if(isset($id)) {
                                if($InWishlist): ?>
                                    <button type="button" onclick="RemoveFromWishlist(<?=$jeu_id?>)">
                                        <i class="fa-solid fa-heart"></i>
                                    </button>
                                <?php else: ?>
                                    <button type="button" onclick="addToWishlist(<?=$jeu_id?>)">
                                        <i class="fa fa-shopping-bag"></i>
                                    </button>
                                <?php 
                                endif; 
                            } else { ?>
                              <a href="profil/logIn.php">
                                <button type="button">
                                    <i class="fa fa-shopping-bag"></i>
                                </button>
                              </a>
                            <?php } ?>
                        </form>
                        <ul>
                            <li><span>Genre:</span> <a href="#"><?=$genre?></a></li>
                            <li><span>Editeur:</span> <a href="#"><?=$editeur?></a></li>
                            <li><span>Date de sortie:</span> <?=$date_de_sortie?></li>
                            <!-- Ajoutez dautres détails selon vos besoins -->
                        </ul>
                    </div>

                    <div class="col-lg-12">
                        <div class="sep"></div>
                    </div>
                </div>
            </div>
        </div>
        <?php
    } else {
        echo "Aucun jeu trouvé avec cet identifiant.";
    }
} else {
    echo "Identifiant du jeu non spécifié.";
}

$connexion = null;
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
  <script>
    function addToWishlist(idJeux) {
      // Création d'une nouvelle instance de XMLHttpRequest
      var xhr = new XMLHttpRequest();
      // Ouverture de la requête POST vers product-details.php avec l'identifiant du jeu dans l'URL
      xhr.open('POST', 'product-details.php?id=' + idJeux, true);
      // Définition de l'en-tête de la requête pour spécifier le type de contenu
      xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
      // Envoi de la requête avec les données à traiter côté serveur
      xhr.send('idJeux=' + idJeux + '&addWishlist=true');
      updateWishlistButton(true, idJeux); // Mettre à jour le bouton après l'ajout
    }

    function RemoveFromWishlist(idJeux) {
      var xhr = new XMLHttpRequest();
      xhr.open('POST', 'product-details.php?id=' + idJeux, true);
      xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
      xhr.send('idJeux=' + idJeux + '&deleteWishlist=true');
      updateWishlistButton(false, idJeux); // Mettre à jour le bouton après la suppression
    }

    function updateWishlistButton(inWishlist, idJeux) {
      var form = document.getElementById('wishlistForm');
      form.innerHTML = inWishlist ?
          '<button type="button" onclick="RemoveFromWishlist(' + idJeux + ')">' +
          '<i class="fa-solid fa-heart"></i></button>' :
          '<button type="button" onclick="addToWishlist(' + idJeux + ')">' +
          '<i class="fa fa-shopping-bag"></i></button>';
    }

  </script>
  </body>
</html>