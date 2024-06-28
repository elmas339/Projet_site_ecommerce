<div class="container px-4 mt-5">
    <div class="row gy-4 gy-md-0">
        <div class="col-12 col-md-6">
            <h1><?= $variable['nom']; ?></h1>
            <p><?= $variable['detaille']; ?></p>
            <?php if ($variable['reduction'] > 0): ?>
                <?php $prixReduit = $variable['prix'] - ($variable['prix'] * ($variable['reduction'] / 100)); ?>
                <p>Prix : <span class="text-decoration-line-through"><?= $variable['prix']; ?> €</span> <span class="text-danger"><?= $prixReduit; ?> € (Réduction de <?= $variable['reduction']; ?> %)</span></p>
            <?php else: ?>
                <p>Prix : <?= $variable['prix']; ?> €</p>
            <?php endif; ?>
            <!-- Autres détails du produit à afficher ici -->
            <a href="index.php?action=produit" class="btn btn-primary mb-3">Retour à la liste des produits</a>
            <a href="index.php?action=panier&id=<?= $variable['id'] ;?>" class="btn btn-primary mb-3">Ajouter au panier</a>
        </div>
        <div class="col-12 col-md-6">
            <h2 class="text-center"><?= $variable['nom']; ?></h2>
            <img src="public/produit/<?= $variable['photo']; ?>" class="img-thumbnail border-0" alt="<?= $variable['nom']; ?> image">
        </div>
    </div>
</div>
