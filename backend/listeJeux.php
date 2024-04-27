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
  require_once("lib/gestionJeux.php");
  $jeux = ShowGames();

  if ($jeux && $jeux->rowCount() > 0) { ?>
    <section id='GestM'>
      <div class='container'>
        <h2>Liste des Jeux</h2>
        <div class='table-responsive'>
          <table class='table table-bordered'>
            <thead>
              <tr>
                <th>Titre</th>
                <th>Description</th>
                <th>Date de Sortie</th>
                <th>Image</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody>
              <?php while ($row = $jeux->fetch(PDO::FETCH_ASSOC)) { ?>
                  <tr>
                    <td><?=$row['titre']?></td>
                    <td><?=$row['description']?></td>
                    <td><?=$row['dateDeSortie']?></td>
                    <td><?=$row['image']?></td>
                    <td>
                      <a href='./modifGame.php?id=<?=$row['id']?>' class='btn btn-primary btn-sm'>Modifier</a>
                      <a href="#" onclick="confirmDelete(<?=$row['id']?>, '<?=addslashes($row['titre'])?>');" class='btn btn-danger btn-sm'>Supprimer</a>   <!-- addslashes permet d'échapper guillemets simples -->
                    </td>
                  </tr>
              <?php }?>
            </tbody>
          </table>
        </div>
      </div>
    </section>
  <?php } else { ?>
      <p>Aucun jeu trouvé.</p>
  <?php }

  require_once("../vues/footer.php");
  ?>


  <!-- Bootstrap core JavaScript -->
  <script src="../vendor/jquery/jquery.min.js"></script>
  <script src="../vendor/bootstrap/js/bootstrap.min.js"></script>
  <script src="../assets/js/isotope.min.js"></script>
  <script src="../assets/js/owl-carousel.js"></script>
  <script src="../assets/js/counter.js"></script>
  <script src="../assets/js/custom.js"></script>
  <script>
    function confirmDelete(id, titre) {
        if (confirm(`Êtes-vous sûr de vouloir supprimer le jeu : ${titre} ?`)) {
            // Si l'utilisateur confirme, redirige vers le script PHP pour supprimer le jeu
            window.location.href = "./lib/supJeux.php?id=" + id;
        }
    }
  </script>

  </body>
</html>