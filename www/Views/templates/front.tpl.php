<?php

use App\Models\Themes;

?>
<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="UTF-8">
    <title><?= $title ?></title>
	<meta name="description" content="description de la page de front">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <script src="../../src/js/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
    <script src="../../public/js/navbarFront.js"></script>

    <script src="https://polyfill.io/v3/polyfill.min.js?version=3.52.1&features=fetch"></script>
    <script src="https://js.stripe.com/v3/"></script>

    <link rel="stylesheet" href="<?= $file_stylesheet??"" ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.23/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="../../dist/main.css">

    <?php
    $theme = new Themes();
    $getTheme = $theme->select("file")->where("status = 1")->get();

    if (file_exists("./dist/".$getTheme[0]['file'])){
        echo "<link rel='stylesheet' href='../../dist/".$getTheme[0]['file']."'>";
    }else{
        throw new \App\Core\MyException("Fichier manquant",404);
    }
    ?>


</head>
<body>


    <header>
        <span id="hamburger">
                <i class="fas fa-bars"></i>
        </span>
        <nav id="main-nav">
            <div>
                <ul>
                    <li><img src="../../images/logo/logo.png" alt="Logo" width="50"></li>
                    <?= \App\Core\NavbarBuilder::navbar() ?>
                </ul>
                <ul class="align">
                    <?php if (isset($_SESSION['user'])): ?>
                        <li class="dropdownMenuFront"><a>Compte &nbsp<i class="fas fa-user"></i></a>
                        <ul class="submenu">
                            <li><a href="/mon-profil">Votre profil</a>
                            <li><a href="/mes-commandes">Vos commandes</a>
                            <li><a href="/deconnexion">Déconnexion</a>
                        </ul>
                    <?php else: ?>
                        <li class="dropdownMenuFront"><a>Compte &nbsp<i class="fas fa-user"></i></a>
                        <ul class="submenu">
                            <li><a href="/connexion">Connexion</a>
                            <li><a href="/inscription">Inscription</a>
                        </ul>
                    <?php endif;?>
                    <li><a href="/panier">Panier &nbsp<i class="fa fa-shopping-cart"> </i></a></li>

                </ul>
            </div>
        </nav>
    </header>


    <main>



	<!-- afficher la vue -->
	<?php include $this->view ?>

    </main>



</body>

</html>