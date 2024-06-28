<!-- Utilisation de Bootstrap pour afficher le lien du panier -->
<div class="container mt-4 text-end">
    <a href="index.php?action=panier" class="btn btn-primary link">
        <i class="bi bi-cart-fill me-2"></i> Panier 
        <?php if (isset($_SESSION['panier'])): ?>
            <span class="badge bg-secondary"><?= array_sum($_SESSION['panier']) ?></span>
        <?php else: ?>
            <span class="badge bg-secondary">0</span>
        <?php endif; ?>
    </a>
</div>


<div class="container mt-5">
    <h2 class="mb-4  text-center"><span class="text-dark bg-warning-subtle border border-warning-subtle">Nos produits phares</span></h2>
    <div class="row gy-4">
        <?php foreach ($variable as $index => $pro) { ?>
            <div class="col-12 col-sm-6 col-md-4">
                <div class="card">
                    <img src="public/produit/<?= $pro['photo'] ?>" class="card-img-top" style="height: 200px; object-fit: cover;" alt="...">
                    <div class="card-body">
                    <h5 class="card-title"><?= $pro['nom'] ?><span class="link-warning"><br><?= $pro['prix'] ?>€</span></h5>
                    <a href="index.php?action=voirplus&id=<?= $pro['id'] ;?>" class="btn btn-primary mb-3">Voir plus</a>
                    <a href="index.php?action=panier&id=<?= $pro['id'] ;?>" class="btn btn-primary mb-3">Ajouter au panier</a>
                    <?php if(isset($_SESSION['email']) && $_SESSION['email'] == "elmas@gmail.com"){ ?>
                        <a href="index.php?action=supprimerproduit&id=<?= $pro['id'] ;?>" class="btn btn-primary mb-3">Supprimer</a>
                    <?php } ?>
                </div>

                </div>
            </div>
        <?php } ?>
    </div>
</div>