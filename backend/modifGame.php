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
      $idJeu = $_GET['id'];
      

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

      $titre = [];
      $queryTitre = "SELECT titre FROM jeux WHERE id = $idJeu";
      $resultTitre = $connexion->query($queryTitre);
      if ($resultTitre) {
          while ($row = $resultTitre->fetch(PDO::FETCH_ASSOC)) {
              $titre[] = $row['titre'];
          }
      }
  ?>
  <section id = "GestM">
        
        <div class="formM1">
            <form  method="POST" name="formAjoutJeux" action="./lib/ModifJeux.php">
                <fieldset style="min-height:100px;">
                    <div class="formClub">
                        <!-- <label class="titre_1" for="">Formulaire d'ajout d'un membres</label><br> -->
                        <legend><b> Formulaire modification du Jeux :</b> </legend> <br>

                        <h3><b> <?php foreach ($titre as $titreJeu) {echo $titreJeu;} ?> </b></h3>
    
                        <input type="hidden" name="idJeu" value="<?php echo htmlspecialchars($_GET['id']); ?>">

                        <br><p>Titre du jeux : <br><input type = "text" name = "titre"  maxlength="50" placeholder="ex: COD" required ></p><br>
                        <!-- <p>Photos du jeux : <br></p>
                        <div class="AjoutFichier">
                          <form action="profil.php" method="POST" enctype="multipart/form-data">
                              <label for="file">Fichier</label>
                              <input type="file" name="file">
                              <button type="submit">Enregistrer</button>
                          </form>
                        </div> -->
    
                        <!-- <p>Photos du jeux : <br><input type = "text" name = "photosNews" maxlength="50" placeholder="ex: photo.png" ></p><br> -->
    
                        <p>Descriptions du jeux : <br><input type = "text" name = "description" maxlength="300"  required></p><br>
                        
                        <p>Éditeur : <br>
                        <select name="idEditeur" required>
                            <option value="">Sélectionnez un éditeur</option>
                            <?php foreach ($editeurs as $editeur): ?>
                                <option value="<?= htmlspecialchars($editeur['id']); ?>"><?= htmlspecialchars($editeur['nom']); ?></option>
                            <?php endforeach; ?>
                        </select></p><br>
                        
                        <p>Genre : <br>
                        <select name="idGenre" required>
                            <option value="">Sélectionnez un genre</option>
                            <?php foreach ($genres as $genre): ?>
                                <option value="<?= htmlspecialchars($genre['id']); ?>"><?= htmlspecialchars($genre['libelle']); ?></option>
                            <?php endforeach; ?>
                        </select></p><br>
    
                        <p>Date de sortie : <br><input type = "date" name = "dateDeSortie" required></p><br>
                        <p>Tarif : <br><input type="number" step="0.01" name="tarifJeux" placeholder="ex: 49.99" required>€</p><br>

    
                        <button type = "submit" class="button-A" role="button"><span class="text">Modifier ce Jeux !</span><span>Modifier !</span></button>
                        <!-- <input class="button" type="submit"  name="Connecter" value="Ajouter un membre !" > -->
                    </div>
                </fieldset>
            </form>
        </div> 

    </section>


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