<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-12 col-md-8">
            <form method="post" class="border border-success rounded p-4" action="" id="formulaire">
                <fieldset>
                    <legend class=" ps-5 text-center">Ajout de cathegorie</legend>
                    <div class="mb-3 ps-5">
                        <label for="nom">Entrez le nom du cathegorie</label>
                        <input type="text" name="categorie" class="form-control" autofocus />
                        <span class="text-danger"><?= $erreur["categorie"] ?? "" ?></span>
                    </div>
                    <div class="mb-3 ps-5">
                        <label for="prenom">Entez la description</label>
                        <input type="text" name="description" class="form-control" />
                        <span class="text-danger"><?= $erreur["description"] ?? "" ?></span>
                    </div>
                    <div class="mb-3 ps-5">
                        <input type="submit" class="btn btn-primary" value="Ajout de cathegorie" />
                        <input type="reset" class="btn btn-primary" value="Annuler" />
                    </div>
                    <div class="mb-3  ps-5">
                        <a href="index.php?action=acceuil">Revenir à l'accueil</a>
                    </div>
                    <div class="mb-3 ps-5">
                        <a href="index.php?action=ajoutproduit">Ajouter de produit</a>
                    </div>
                </fieldset>
            </form>
        </div>
    </div>
</div>