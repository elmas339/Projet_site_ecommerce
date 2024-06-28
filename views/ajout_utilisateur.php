<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-12 col-md-8">
            <form method="post" class="border border-success rounded p-4" action="" id="formulaire">
                <fieldset>
                    <legend class=" ps-5 text-center">Ajout d'utilisateur</legend>
                    <div class="mb-3 ps-5">
                        <label for="nom">Entrez email</label>
                        <input type="text" name="email" class="form-control" autofocus />
                        <span class="text-danger"><?= $erreur["email"] ?? "" ?></span>
                    </div>
                    <div class="mb-3 ps-5">
                        <label for="prenom">Entez le password</label>
                        <input type="password" name="password" class="form-control" />
                        <span class="text-danger"><?= $erreur["password"] ?? "" ?></span>
                    </div>
                    <div class="mb-3 ps-5">
                        <input type="submit" class="btn btn-primary" value="Ajout d'utilisateur" />
                        <input type="reset" class="btn btn-primary" value="Annuler" />
                    </div>
                    <div class="mb-3 ps-5">
                        <a href="index.php?action=acceuil">Revenir à l'accueil</a>
                    </div>
                </fieldset>
            </form>
        </div>
    </div>
</div>
 