<?php
    if(isset($_SESSION['admin'])){
        $img = $_SESSION['admin']['imgProfil'];
    }
?>

<header class="header-area header-sticky">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <nav class="main-nav">
                    <a href="../index.php" class="logo">
                        <img src="../assets/images/logo.png" alt="" style="width: 158px;">
                    </a>
                    <ul class="nav">
                        <li><a href="../index.php" class="active">Voir la Boutique</a></li>
                            <div class="user">
                                    <div class="avatar">
                                        <img src="<?= '../profil/img/'.$img?>">
                                    </div>
                                    <div class="dropdown-content">
                                        <a href="../profil/profil.php">Profil</a>
                                        <a href="../profil/lib/logout.php">Déconnexion</a>
                                    </div>
                            </div>
                    </ul>   
                    <a class='menu-trigger'>
                        <span>Menu</span>
                    </a>
                </nav>
            </div>
        </div>
    </div>
</header>