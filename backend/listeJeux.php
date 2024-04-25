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
    <?php
      // Connexion à la base de données
      require_once("../database/connexion.php");

      

      // Récupérer les éditeurs
      $editeurs = [];
      $queryEditeur = "SELECT id, nom FROM editeur ORDER BY nom ASC";
      $resultEditeur = $connexion->query($queryEditeur);
      if ($resultEditeur) {
          while ($row = $resultEditeur->fetch()) {
              $editeurs[] = $row;
          }
      }

      // Récupérer les genres
      $genres = [];
      $queryGenre = "SELECT id, libelle FROM genre ORDER BY libelle ASC";
      $resultGenre = $connexion->query($queryGenre);
      if ($resultGenre) {
          while ($row = $resultGenre->fetch()) {
              $genres[] = $row;
          }
      }
  ?>
     <?php
        require_once("vues/navbar.php");

        // Récupérer les jeux depuis la base de données
        $query = "SELECT * FROM jeux";
        $result = $connexion->query($query);

        if ($result && $result->rowCount() > 0) {
            echo "<section id='GestM'>";
            echo "<div class='container'>";
            echo "<h2>Liste des Jeux</h2>";
            echo "<div class='table-responsive'>";
            echo "<table class='table table-bordered'>";
            echo "<thead>";
            echo "<tr>";
            echo "<th>ID</th>";
            echo "<th>Titre</th>";
            echo "<th>Description</th>";
            echo "<th>Date de Sortie</th>";
            echo "<th>Image</th>";
            echo "<th>Actions</th>";
            echo "</tr>";
            echo "</thead>";
            echo "<tbody>";
            while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                echo "<tr>";
                echo "<td>{$row['id']}</td>";
                echo "<td>{$row['titre']}</td>";
                echo "<td>{$row['description']}</td>";
                echo "<td>{$row['dateDeSortie']}</td>";
                echo "<td>{$row['image']}</td>";
                echo "<td>";
                echo "<a href='./modifGame.php?id={$row['id']}' class='btn btn-primary btn-sm'>Modifier</a>";
                echo "<a href='./lib/supJeux.php?id={$row['id']}' class='btn btn-danger btn-sm'>Supprimer</a>";
                echo "</td>";
                echo "</tr>";
            }
            echo "</tbody>";
            echo "</table>";
            echo "</div>";
            echo "</div>";
            echo "</section>";
        } else {
            echo "<p>Aucun jeu trouvé.</p>";
        }
    ?>


  <?php
    require_once("../vues/footer.php")
  ?>


  <!-- Bootstrap core JavaScript -->
  <script src="../vendor/jquery/jquery.min.js"></script>
  <script src="../vendor/bootstrap/js/bootstrap.min.js"></script>
  <script src="../assets/js/isotope.min.js"></script>
  <script src="../assets/js/owl-carousel.js"></script>
  <script src="../assets/js/counter.js"></script>
  <script src="../assets/js/custom.js"></script>

  </body>
</html>