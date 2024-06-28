<?php
 

require_once("modelle/manageur.php");
function panier(){
    if(!isset($_SESSION['panier'])){
        $_SESSION['panier'] = array();
    }

    if(isset($_GET['id'])){
        $id = $_GET['id'];

        if (empty(getproduitparid($id))) {
            die("produit inexistant");
        } 

        if(isset($_SESSION['panier'][$id])){
            $_SESSION['panier'][$id]++;
        } else {
            $_SESSION['panier'][$id] = 1;
           // echo "Le produit a bien été mis dans le panier";
            var_dump($_SESSION['panier']);
        }
        header("Location: index.php?action=produit");
        exit();
    }

    // Vérifier si l'utilisateur demande de supprimer un produit du panier
    if (isset($_GET['action']) && $_GET['action'] === 'remove_from_cart' && isset($_GET['id'])) {
        $idProduit = $_GET['id'];

        // Vérifier si le produit existe dans le panier
        if (isset($_SESSION['panier'][$idProduit])) {
            // Si la quantité du produit est supérieure à 1, décrémenter la quantité
            if ($_SESSION['panier'][$idProduit] > 1) {
                $_SESSION['panier'][$idProduit]--;
            } else {
                // Sinon, supprimer complètement le produit du panier
                unset($_SESSION['panier'][$idProduit]);
            }

            // Rediriger l'utilisateur vers la page du panier après la suppression
            header("Location: index.php?action=panier");
            exit();
        }
    }
    
    $ids = array_keys($_SESSION['panier']);

    if(empty($ids)){
      
        header("Location: index.php?action=produit");

    } else {
        // Récupérer tous les produits du panier
        $produits = array();
        foreach($ids as $id){
            $produit = getproduitparid($id);
            $variable[] = $produit[0]; // On ajoute le premier élément du tableau (le produit) dans le tableau $variable
        }

        // Passer les variables à la vue du panier
        render("views/panier.php", $variable);
    }
}