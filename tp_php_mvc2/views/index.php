<div class="pt-5">
    <div>
        <?php if(isset($_SESSION['user'])): ?>
            <h1 class="h1 text-primary">Bienvenu(e) à toi <?= $_SESSION['user']['firstname'] ?></h1>
        <?php else: ?>
            <h1 class="h1 text-primary">Bienvenu(e)</h1>
        <?php endif; ?>
    </div>
</div>