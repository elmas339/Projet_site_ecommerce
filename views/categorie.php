<div class="container mt-4">
    <h2 class="fs-5">Liste des Catégories</h2>
    <?php if (empty($variable)): ?>
        <p>Aucune catégorie trouvée.</p>
    <?php else: ?>
        <div class="table-responsive">
            <table class="table table-bordered mt-3">
                <thead>
                    <tr>
                        <th class="text-sm-start text-md-start text-lg-start">Nom du Catégorie</th>
                        <th class="text-sm-start text-md-start text-lg-start">Détails : Date</th>
                        <?php if(isset($_SESSION['email'])){ ?>
                                 <?php if($_SESSION['email'] == "elmas@gmail.com") {?>
                        <th class="text-sm-start text-md-start text-lg-start">Action</th>
                        <?php } ?>
                            <?php } ?>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($variable as $categorie): ?>
                        <tr>
                            <td class="text-sm-start text-md-start text-lg-start">
                                <a class="link-offset-2 link-offset-3-hover link-underline link-underline-opacity-0 link-underline-opacity-75-hover" href="index.php?action=produit&id_categorie=<?= $categorie['id_categorie']; ?>">
                                    <?= $categorie["nom"]; ?>
                                </a>
                            </td>
                            <td class="text-sm-start text-md-start text-lg-start"><?= $categorie["detaille"]; ?> <br>créer le  <?= $categorie["datte"]; ?></td>
                            <?php if(isset($_SESSION['email'])){ ?>
                                 <?php if($_SESSION['email'] == "elmas@gmail.com") {?>
                            <td class="text-sm-start text-md-start text-lg-start">
                                <form action="index.php?action=supprimercategorie&id_categorie=<?= $categorie['id_categorie']; ?>" method="post">
                                    <button type="submit" class="btn btn-danger btn-sm">Supprimer</button>
                                </form>
                            </td>
                            <?php } ?>
                            <?php } ?>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <?php if(isset($_SESSION['email'])){ ?>
            <?php if($_SESSION['email'] == "elmas@gmail.com") {?>
            <a class=" btn btn-primary mb-3" href="index.php?action=ajoutcathegorie" >Ajout de cathegorie</a>
            <?php } ?>
        <?php } ?>
        </div>
    <?php endif; ?>
</div>

 