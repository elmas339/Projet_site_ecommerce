<?php 
try {
    session_start();
    require("controlleur/controlleur.php");
    require("controlleur/paniercontrolleur.php");
    require("controlleur/cathegoriecontrolleur.php");
    $action = isset($_GET['action']) ? $_GET['action'] : "acceuil";

    if (is_callable($action)) {
        $action();
    } elseif ($action === "rechercheController") {
        rechercheController();
    } elseif ($action === "remove_from_cart" && isset($_GET['id'])) {
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
        } else {
            throw new Exception("Produit non trouvé dans le panier");
        }
    } else {
        throw new Exception("Action non prise en charge");
    }
} catch (Exception $e) {
    echo "erreur:" . $e->getMessage();
}



?>