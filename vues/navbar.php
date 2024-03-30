<?php
// Récupérer l'URI de la page actuelle
$currentURI = $_SERVER['REQUEST_URI'];

// Vérifier si l'URI contient le nom du dossier "profil"
$isInProfile = strpos($currentURI, '/profil/') !== false;
?>

<header class="header-area header-sticky <?php if($isInProfile){echo 'background-header';}?>">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <nav class="main-nav">
                    <a href="<?php echo ($isInProfile) ? '../index.php' : 'index.php'; ?>" class="logo">
                        <img src="<?php echo ($isInProfile) ? '../assets/images/logo.png' : 'assets/images/logo.png'; ?>" alt="" style="width: 158px;">
                    </a>
                    <ul class="nav">
                        <!-- <li><a href="index.php" class="active">Accueil</a></li> -->
                        <li><a href="<?php echo ($isInProfile) ? '../index.php' : 'index.php'; ?>" class="active">Notre Boutique</a></li>
                        <?php if(!$isInProfile) {
                            echo '<li><a href="profil/logIn.php"><i class="fa-regular fa-circle-user"></i></a></li>';
                            }
                        ?>
                    </ul>   
                    <a class='menu-trigger'>
                        <span>Menu</span>
                    </a>
                </nav>
            </div>
        </div>
    </div>
</header>
