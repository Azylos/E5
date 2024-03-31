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
    <link rel="stylesheet" href="../assets/css/formLog.css">
    <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css"/>
  </head>

<body class="log">
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
  <?php
    require_once("../vues/navbar.php");
    require_once("lib/cnx.php");
  ?>
  <section>
    <form action="logIn.php" method="post">
      <h1>Login</h1>
      <div class="inputbox">
          <i class="fa-solid fa-user"></i>
          <input type="text" name='identifiant' required>
          <label for="">Identifiant</label>
      </div>
      <div class="inputbox">
          <i class="fa-solid fa-lock"></i>
          <input type="password" name='mdp' required>
          <label for="">Password</label>
      </div>
      <?php if($echec):
        echo $echec;
      endif?>
      <!-- <div class="forget">
        <a href="#">Mot de passe oublier</a>
      </div> -->
      <button>Se connecter</button>
      <!-- <div class="register">
          <p>Vous n'avez pas de compte <br><a href="#">Inscrivez-vous</a></p>
      </div> -->
    </form>
  </section>

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