<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-12 col-md-8">
            <div class="border border-primary p-4 rounded">
                <h2 class="text-center mb-4">Formulaire d'Ajout d'Image</h2>
                <form method="post" action="" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="nomInput">Nom</label>
                        <input type="text" name="nom" class="form-control" id="nomInput" placeholder="Entrez le nom">
                        <span class="text-danger"><?= $erreur["nom"] ?? "" ?></span>
                    </div>
                    <div class="form-group">
                        <label for="prixInput">Prix</label>
                        <input type="number" name="prix" class="form-control" id="prixInput" placeholder="Entrez le prix">
                        <span class="text-danger"><?= $erreur["prix"] ?? "" ?></span>
                    </div>
                    <div class="form-group">
                        <label for="reductionInput">reduction(non obligatoire)</label>
                        <input type="number" name="reduction" class="form-control mb-3" id="reductionInput" placeholder="Entrez le reduction">
                    </div>
                    <div class="form-group">
                        <label for="detailleInput">detaille</label>
                        <input type="text" name="detaille" class="form-control mb-3" id="detailleInput" placeholder="Entrez le detaille">
                        <span class="text-danger"><?= $erreur["detaille"] ?? "" ?></span>
                    </div>
                    <div class="form-group">
                        <b>Sélectionnez la catégorie :</b>
                        <span><?= $erreur["categorie"] ?? "" ;?></span> <br>
                        <select name="categorie">
                            <option value="">--------------</option>
                            <?php foreach($variable["categorie"] as $cat): ?>
                                <option value="<?= $cat["id_categorie"] ?>"><?= $cat["nom"] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="imageInput">Image</label>
                        <input type="file" name="photo" class="form-control-file" id="imageInput">
                    </div>
                    
                    <div class="text-center">
                        <input type="submit" class="btn btn-primary" value="Ajouter le produit">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
