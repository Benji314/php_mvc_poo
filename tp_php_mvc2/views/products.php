<div class="pt-5">
    <div>
        <?php if (isset($_SESSION['user'])): ?>
            <h1 class="h1 text-primary">Bienvenu(e) à toi <?= $_SESSION['user']['firstname'] ?></h1>
            <div class="row">
                <?php
                if (isset($products)) {
                    foreach ($products as $product): ?>
                        <div class="col-md-4">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title"><?= $product['name'] ?></h5>
                                    <p class="card-text"><?= $product['description'] ?></p>

                                    <form action="ActionAddProductToCartController.php" method="POST">
                                        <input id="flag" name="product" type="number" hidden value="<?= $product['id'] ?>">
                                        <button class="btn btn-primary btn-add-to-cart">Ajouter au Panier</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    <?php endforeach;
                }
                ?>
            <?php else: ?>
                <h1 class="h1 text-primary"> Il faut se connecter pour voir les produits</h1>
            <?php endif; ?>
        </div>
    </div>
</div>