<?php
if (isset($_SESSION["cart"]) and !empty($_SESSION["cart"])) {
    $totalProducts = array_sum($_SESSION["cart"]);
}
?>
<div class="bg-light container-fluid ">
    <nav class="navbar container navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="../controllers/HomepageController.php">Super boutique</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="../controllers/HomepageController.php">Accueil</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../controllers/ProductsController.php">Liste des Produits</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../controllers/CartController.php">Mon Panier<?php
                    if (isset($totalProducts) and !empty($totalProducts)) {
                        echo " (" . $totalProducts . ")";
                    }
                    ?></a>
                </li>
            </ul>
            <ul class="navbar-nav ml-auto">
                <?php if (isset($_SESSION['user'])): ?>
                    <li class="nav-item">
                        <a class="nav-link" href="../controllers/ActionLogoutController.php">Déconnexion</a>
                    </li>
                <?php else: ?>
                    <li class="nav-item">
                        <a class="nav-link" href="../controllers/LoginController.php">Connexion</a>
                    </li>
                <?php endif; ?>
            </ul>
        </div>
    </nav>
</div>