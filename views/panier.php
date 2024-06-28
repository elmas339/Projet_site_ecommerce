<div class="container">
    <h2 class="mt-4 fs-5">Votre Panier</h2>
    <?php if (empty($variable)): ?>
        <p>Votre panier est vide.</p>
    <?php else: ?>
        <div class="table-responsive">
            <table class="table table-bordered mt-3">
                <thead>
                    <tr>
                        <th class="text-start ">Nom du Produit</th>
                        <th class="text-start">Image</th>
                        <th class="text-start">Prix</th>
                        <th class="text-start">Quantité</th>
                        <th class="text-start">Total</th>
                        <th class="text-start">Actions</th> <!-- Nouvelle colonne pour les boutons de suppression -->
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $totalPanier = 0;
                    foreach ($variable as $produit):
                        $idProduit = $produit['id'];
                        $nomProduit = $produit['nom'];
                        $prixProduit = $produit['prix'];
                        $image = $produit['photo'];
                        $quantite = $_SESSION['panier'][$idProduit];

                        // Vérifier s'il y a une réduction pour ce produit
                        if (isset($produit['reduction']) && $produit['reduction'] > 0) {
                            $prixReduit = $prixProduit - ($prixProduit * ($produit['reduction'] / 100));
                            $totalProduit = $prixReduit * $quantite;
                        } else {
                            $totalProduit = $prixProduit * $quantite;
                        }

                        $totalPanier += $totalProduit;
                    ?>
                        <tr>
                            <td class="text-start"><?= $nomProduit; ?></td>
                            <td class="text-start"><img src="public/produit/<?= $image ?>" class="img-thumbnail" style="max-height: 100px;" alt="..."></td>
                            <td class="text-start">
                                <?php if (isset($prixReduit) && $prixReduit < $prixProduit): ?>
                                    <span class="text-decoration-line-through"><?= $prixProduit; ?> €</span> <br>
                                    <span class="text-danger"><?= $prixReduit; ?> € (Réduction de <?= $produit['reduction']; ?> %)</span>
                                <?php else: ?>
                                    <?= $prixProduit; ?> €
                                <?php endif; ?>
                            </td>
                            <td class="text-start"><?= $quantite; ?></td>
                            <td class="text-start"><?= $totalProduit; ?> €</td>
                            <td class="text-start">
                                <form action="index.php?action=remove_from_cart&id=<?= $idProduit ?>" method="post">
                                    <button type="submit" class="btn btn-danger btn-sm">Supprimer</button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                    <tr>
                        <td colspan="5" class="text-start">Total</td>
                        <td class="text-start"><?= $totalPanier; ?> €</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <!-- Bouton pour valider le panier -->
        <a href="index.php?action=produit" class="btn btn-primary mb-3">Retour à la liste des produits</a>
        <form action="index.php?action=validation_panier" method="post" class="text-center mt-4">
            <button type="submit" class="btn btn-primary">Valider le panier</button>
        </form>
    <?php endif; ?>
</div>
