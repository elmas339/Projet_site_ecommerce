<div class="container mt-5">
    <h2 class="mb-4 text-center"><span class="text-dark bg-warning-subtle border border-warning-subtle">Résultats de la recherche</span></h2>
    <?php
    // Vérifier si des résultats ont été trouvés
    if (!empty($resultats)) {
        foreach ($resultats as $resultat) {
            if ($resultat['type'] === 'produit') {
                // C'est un résultat de produit
                ?>
                <div class="row gy-4">
                    <div class="col-12 col-sm-6 col-md-4">
                        <div class="card">
                            <img src="public/produit/<?= $resultat['photo'] ?>" class="card-img-top" style="height: 200px; object-fit: cover;" alt="...">
                            <div class="card-body">
                                <h5 class="card-title"><?= $resultat['nom'] ?><span class="link-warning"><br><?= $resultat['prix'] ?>€</span></h5>
                                <p><?= $resultat['detaille'] ?></p>
                                <a href="index.php?action=voirplus&id=<?= $resultat['id'] ;?>" class="btn btn-primary mb-3">Voir plus</a>
                                <a href="index.php?action=panier&id=<?= $resultat['id'] ;?>" class="btn btn-primary mb-3">Ajouter au panier</a>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
            } elseif ($resultat['type'] === 'categorie') {
                // C'est un résultat de catégorie
                ?>
                <div class="row gy-4">
                    <div class="col-12 col-sm-6 col-md-4">
                        <div class="card border border-warning">
                            <div class="card-body">
                                <h5 class="card-title"><?= $resultat['nom'] ?></h5>
                                <p><?= $resultat['detaille'] ?></p>
                                <a href="index.php?action=produit&id_categorie=<?= $resultat['id'] ;?>" class="btn btn-warning mb-3">Voir les produits</a>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
            }
            echo '<hr>'; // Ajouter une ligne de séparation entre les résultats
        }
    } else {
        echo '<p class="text-center">Aucun résultat trouvé.</p>';
    }
    ?>
</div>
