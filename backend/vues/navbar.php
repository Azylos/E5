<?php
    if(isset($_SESSION['admin'])){
        $img = $_SESSION['admin']['imgProfil'];
    }

    $currentURI = $_SERVER['REQUEST_URI'];
    $isNotBO = strpos($currentURI, 'backend/index.php') == false;
?>

<header class="header-area header-sticky <?php if($isNotBO){echo 'background-header';}?>">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <nav class="main-nav">
                    <a href="../index.php" class="logo">
                        <img src="../assets/images/logo.png" alt="" style="width: 158px;">
                    </a>
                    <ul class="nav">
                        <li><a href="../index.php" class="active">Voir la Boutique</a></li>
                        <li><a href="index.php" class="active">Accueil BackOffice</a></li>
                        <li><a href="newGame.php" class="active">Ajouter un jeu</a></li>
                        <li><a href="listeJeux.php" class="active">Liste des Jeux</a></li>
                            <div class="user">
                                    <div class="avatar">
                                        <img src="<?= '../profil/img/'.$img?>">
                                    </div>
                                    <div class="dropdown-content">
                                        <a href="../profil/profil.php">Profil</a>
                                        <a href="../profil/lib/logout.php">Déconnexion</a>
                                    </div>
                            </div>
                        <li class="deco"><a href="../profil/lib/logout.php">Déconnexion</a></li>
                    </ul>   
                    <a class='menu-trigger'>
                        <span>Menu</span>
                    </a>
                </nav>
            </div>
        </div>
    </div>
</header>
