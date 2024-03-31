<?php
    if(isset($_SESSION['admin'])){
        $img = $_SESSION['admin']['imgProfil'];
    } 
    if(isset($_SESSION['user'])){
        $img = $_SESSION['user']['imgProfil'];
    }
    if(empty($img)){
        $img = "defaut.png";
    }
    // Récupérer l'URI de la page actuelle
    $currentURI = $_SERVER['REQUEST_URI'];

    // Vérifier si l'URI contient le nom du dossier "profil"
    $isInProfile = strpos($currentURI, '/profil/') !== false;
    $isLogInPage = strpos($currentURI, '/logIn.php') !== false;
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
                        <li><a href="<?php echo ($isInProfile) ? '../index.php' : 'index.php'; ?>" class="active">Notre Boutique</a></li>
                        <?php if(!$isLogInPage) {
                            if(isset($_SESSION["admin"]) || isset($_SESSION["user"])){ ?>
                                <div class="user">
                                    <div class="avatar">
                                        <img src="<?php echo ($isInProfile) ? 'img/'.$img : './profil/img/'.$img; ?>">
                                    </div>
                                    <div class="dropdown-content">
                                        <a href="<?php echo ($isInProfile) ? 'profil.php' : './profil/profil.php'; ?>">Profil</a>
                                        <a href="<?php echo ($isInProfile) ? 'lib/logout.php' : './profil/lib/logout.php'; ?>">Déconnexion</a>
                                    </div>
                                </div>
                            <?php
                            } else {
                                echo '<li><a href="profil/logIn.php"><i class="fa-regular fa-circle-user"></i></a></li>';
                            }
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
