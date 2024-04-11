<div class="d-flex align-items-center justify-content-center vh-100 p-5">
    <div class="container shadow p-5">

        <div class="d-flex align-items-center justify-content-between">
            <h1 class="h1 text-center text-primary">Connexion</h1>
            <a href="javascript:history.back()" class="btn btn-primary">Retour</a>
        </div>

        <form action="./ActionLoginController.php" method="POST">
            <br>
            <div class="row p-1">
                <div class="form-group col-md-12">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" id="email" name="email">
                </div>
            </div>
            <div class="row p-1">
                <div class="form-group col-md-12">
                    <label for="password">Mot de passe</label>
                    <input type="password" class="form-control" id="password" name="password">
                </div>
            </div>

            <div class="form-group ">
                <div class="d-flex py-3 align-items-center justify-content-center ">
                    <button type="submit" class="btn btn-primary m-auto">Se connecter</button>

                </div>
                <a class="d-block text-primary text-center" href="./RegisterController.php">Pas de compte ? S'inscrire</a>
            </div>
        </form>
    </div>
</div>