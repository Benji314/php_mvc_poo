<div class="d-flex align-items-center justify-content-center vh-100 p-5">
    <div class="container shadow p-5">
        <div class="d-flex align-items-center justify-content-between">
            <h1 class="h1 text-center text-primary">Inscription</h1>
            <a href="javascript:history.back()" class="btn btn-primary">Retour</a>
        </div>

        <form action="./ActionRegisterController.php" method="POST" enctype="multipart/form-data">
            <br>
            <div class="row p-1">
                <div class="form-group col-md-4">
                    <label for="firstname">Prénom</label>
                    <input type="text" class="form-control" id="firstname" name="firstname" placeholder="Prénom">
                </div>
                <div class="form-group col-md-4">
                    <label for="lastname">Nom</label>
                    <input type="text" class="form-control" id="lastname" name="lastname" placeholder="Nom">
                </div>
                <div class="form-group col-md-4">
                    <label for="phone">Téléphone</label>
                    <input type="tel" class="form-control" id="phone" name="phone" placeholder="06 99 99 99 99">
                </div>
            </div>
            <br>
            <div class="row p-1">
                <div class="form-group col-md-6">
                    <label for="birthday">Date de naissance</label>
                    <input type="date" class="form-control" id="birthday" name="birthday"
                        placeholder="Date de naissance">
                </div>
                <div class="form-group col-md-6">
                    <label for="gender">Genre</label>
                    <select class="form-select" id="gender" name="gender">
                        <option value="male">Homme</option>
                        <option value="female">Femme</option>
                    </select>
                </div>
            </div>
            <br>
            <div class="row p-1">
                <div class="form-group col-md-2">
                    <label for="roadNumber">N° de rue</label>
                    <input type="number" class="form-control" id="roadNumber" name="roadNumber" placeholder="44">
                </div>
                <div class="form-group col-md-4">
                    <label for="address">Adresse</label>
                    <input type="text" class="form-control" id="address" name="address" placeholder="rue des champs">
                </div>
                <div class="form-group col-md-4">
                    <label for="zipcode">Code postal</label>
                    <input type="number" class="form-control" id="zipcode" name="zipcode" placeholder="31000">
                </div>
                <div class="form-group col-md-2">
                    <label for="city">Ville</label>
                    <input type="text" class="form-control" id="city" name="city" placeholder="Toulouse">
                </div>
            </div>
            <br>
            <div class="row p-1">
                <div class="form-group col-md-12">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" id="email" name="email">
                </div>
            </div>
            
            <div class="row p-1">
                <div class="form-group col-md-6">
                    <label for="password">Mot de passe</label>
                    <input type="password" class="form-control" id="password" name="password">
                </div>
                <div class="form-group col-md-6">
                    <label for="rePassword">Confirmation de mot de passe</label>
                    <input type="password" class="form-control" id="rePassword" name="rePassword">
                </div>
            </div>

            <div class="form-group d-flex align-items-center justify-content-center  ">
                <button type="submit" class="btn btn-primary m-auto">S'inscrire</button>
            </div>
        </form>
    </div>
</div>