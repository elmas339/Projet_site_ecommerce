<div class="container px-4 mt-5">
    <div class="row justify-content-center">
        <div class="col-12 col-md-8">
            <form method="post" action="" id="formulaire" class="border border-primary rounded p-4">
                <fieldset>
                    <legend class="text-center">Connexion</legend>
                    <div class="mb-3">
                        <label for="nom">Entrez email</label>
                        <p><input type="text" name="email" class="form-control" autofocus /><span class="text-danger"> <?= $erreur["email"] ?? "" ?></span></p>
                    </div>	
                    <div class="mb-3">
                        <label for="prenom">Entez le password</label>
                        <p><input type="password" name="password" class="form-control" /><span class="text-danger"> <?= $erreur["password"] ?? "" ?></span ></p>
                    </div>
                    <div class="mb-3">
                        <input type="submit" class="btn btn-primary mt-3" value="connexion" />
                        <input type="reset" class="btn btn-primary mt-3" value="Annuler" />
                        <a href="index.php?action=ajoututilisateur" class="btn btn-primary mt-3">S'inscrire</a>
                    </div>
                    <div class="mb-3"> 
                        <a href="index.php?action=acceuil">Revenir à l'accueil</a>
                    </div>
                </fieldset>
            </form>
        </div>
    </div>
</div>
