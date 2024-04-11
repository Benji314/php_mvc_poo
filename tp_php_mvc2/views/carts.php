<div class="container text-center d-flex align-items-center justify-content-center pt-5">
    <div>
        <?php if (isset($_SESSION['user'])): ?>
            <h1 class="h1 text-primary">Le panier de <?= $_SESSION['user']['firstname'] ?></h1>
            <table class="table border shadow">
                <thead>
                    <tr>
                        <th scope="col">Produit</th>
                        <th scope="col">Quantité</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if (isset($_SESSION['cart'])) {
                        foreach ($_SESSION['cart'] as $product => $quantity): ?>
                            <tr>
                                <td><?= $product ?></td>
                                <td><?= $quantity ?></td>
                            </tr>
                        <?php endforeach;
                    }
                    var_dump($_SESSION['cart']);
                    ?>
                </tbody>
            </table>
        <?php else: ?>
            <h1 class="h1 text-primary"> Il faut se connecter pour voir le panier</h1>
        <?php endif; ?>
    </div>
</div>