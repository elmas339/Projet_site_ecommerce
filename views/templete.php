<html lang="fr" >
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mon site de produits cosmétiques</title> 
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="public/stil.css" rel="stylesheet">
</head>
<body>
<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container">
    <a class="navbar-brand" href="index.php?action=acceuil"><img src="public/produit/Nour.png"  alt="logo" style="height: 80px;">
    </a>
    <button class="navbar-toggler " type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon "><i class="bi bi-justify"></i></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="index.php?action=acceuil">Acceuil</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="index.php?action=produit">Voir le produit</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="index.php?action=categorie">Liste des Catégories</a>
        </li>
        <?php if(isset($_SESSION['email'])){ ?>
            <?php if($_SESSION['email'] == "elmas@gmail.com") {?>
        <li class="nav-item">
          <a class="nav-link" href="index.php?action=ajoutproduit">Ajout de Produit</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="index.php?action=ajoutcathegorie">Ajout de cathegorie</a>
        </li>
        <?php } ?>
        <?php } ?>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
          Compte
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="index.php?action=connexionAction">Connexion</a></li>
            <li><a class="dropdown-item" href="index.php?action=ajoututilisateur"> S'inscrir</a></li>
            <li><hr class="dropdown-divider"></li>
            <li>
              <div class="col ms-2"><?php if(isset($_SESSION['email'])){ ?>
            <?php if($_SESSION['email'] == "elmas@gmail.com") {?>
                <b> ADMINISTRATEUR   </b> <a href="index.php?action=deconnexion">Deconnexion</a>
            <?php } else { ?>
                <b class="ms-3"><?= $_SESSION['email'] ;?></b><br> <a href="index.php?action=deconnexion" class="ms-3">Deconnexion</a>
            <?php } ?>
        <?php } else { ?>
            <b>NON Connecté</b>
        <?php } ?>
            </li>
          </ul>
        </li>

      </ul>
      <form method="post" class="d-flex" role="search" action="index.php?action=recherche">
    <input type="text" class="form-control me-2" name="recherche" placeholder="Search" aria-label="Search">
    <button class="btn btn-outline-success" type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
      </form>


    </div>
  </div>
</nav>
    
    <?= $view ?>
    


   <!-- Footer -->
   <footer class="footer bg-secondary  bg-opacity-10 text-dark">
  <div class="container">
    <div class="row">
      <div class="col-md-6">
        <h5>Contactez-nous</h5>
        <p>Adresse : mama chafa</p>
        <p>Ville, mitsoudje</p>
        <p>Email : abdoulhamidmohamedelmamoune@gmail.com</p>
      </div>
      <div class="col-md-6">
        <h5>Liens</h5>
        <ul class="list-unstyled">
          <li><a  href="index.php?action=acceuil">Accueil</a></li>
          <li><a href="index.php?action=apropos">À propos de nous</a></li>
          <li><a href="index.php?action=produit">Services</a></li>
          <li><a href="#">Contact</a></li>
        </ul>
      </div>
    </div>
    <hr>
    <div class="row">
      <div class="col-md-12">
        <p class="text-muted">© 2023 Nourbeauty. Tous droits réservés.</p>
      </div>
    </div>
    <!-- Nouvelle colonne pour les réseaux sociaux -->
    <div class="row">
      <div class="col-md-12">
        <ul class="list-inline social-icons">
        <li class="list-inline-item" ><a href=https://www.facebook.com/groups/548319579787950/?ref=share&mibextid=NSMWBT target="_blank"><i class="fa-brands fa-facebook"></i></a></li>
        <li class="list-inline-item"><a href=https://instagram.com/_nourbeauty_?igshid=MzRlODBiNWFlZA==  target="_blank"><i class="fa-brands fa-instagram"></i></a></li>
        <li class="list-inline-item"><a href=https://www.tiktok.com/@nourbeauty914?_t=8eHaAg40STF&_r=1 target="_blank"><i class="fa-brands fa-tiktok"></i></a></li>

          <!-- Ajoutez d'autres icônes de réseaux sociaux selon vos besoins -->
        </ul>
      </div>
    </div>
  </div>
</footer>



<!-- Inclure le script de Bootstrap à la fin du body -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>
</html>