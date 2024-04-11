<?php ob_start(); ?>
<!doctype html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
        integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy"
        crossorigin="anonymous"></script>
    <title><?php echo isset($title) ? $title : "Super boutique"; ?></title>
</head>

<body>
    <?php
    require ("../views/partials/navbar.php");
    if (!empty($_SESSION['register'])) {
        echo '<p class="alert alert-success" > Merci pour votre inscription vous pouvez vous connecter !</p>';
        $_SESSION['register'] = array();
    }
    if (!empty($_SESSION['login']) and $_SESSION['login'] === "success") {
        echo '<p class="alert alert-success" > Tu es connecté !</p>';
        $_SESSION['login'] = array();
    }
    if (!empty($_SESSION['login']) and $_SESSION['login'] === "error") {
        echo '<p class="alert alert-success" >Email ou mot de passe incorrect</p>';
        $_SESSION['login'] = array();
    }
    ?>

    <div class="container text-center pt-5">
        <?= $body ?>
    </div>


</body>

</html>