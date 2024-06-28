<?php
 
require_once("modelle/manageur.php");
function categorie(){
    $variable = getcategorie();
    render("views/categorie.php", $variable);
}

function ajoutcathegorie() {
    $categorie = ["categorie" => "", "description" => ""];
    $erreur = [];
    $ajout = []; // Initialiser la variable pour éviter les erreurs d'affichage

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $categorie = $_POST;
        // Les valeurs saisies doivent être non vides
        if (empty($categorie["categorie"])) $erreur["categorie"] = "Le nom est vide !";
        if (empty($categorie["description"])) $erreur["description"] = "La description est vide !";
        
        if (empty($erreur)) {
            $datte = date('Y-m-d');
            $categorie["datte"] = $datte;
            
            // Insérer la catégorie dans la base de données et capturer le résultat
            // $insertion_reussie = getAjoutcategorie($categorie);
            if (getAjoutcategorie($categorie)) {
                // Redirection vers la page de la liste des catégories
                $_SESSION["reusi"]  = " Ajout réussi !";
                header("location: index.php?action=categorie");
                // exit();
            } else {
                // Afficher un message d'erreur si l'insertion a échoué
                echo "Erreur lors de l'ajout de la catégorie dans la base de données.";
            }
        }
    }
    $variables = ["ajout" => $ajout, "erreur" => $erreur];
    $view = "views/ajout_categorie.php";
    render($view, $variables);
}
 
// Fonction de suppression de catégorie
function supprimercategorie() {
    if (isset($_GET["id_categorie"])) {
        $id = $_GET["id_categorie"];
        // Vérifier si la catégorie existe avant de la supprimer
        $categorie_existe = getcategorieparid($id);
        
        if (!$categorie_existe) {
            // La catégorie n'existe pas, rediriger vers la page de liste des catégories
            header("Location: index.php?action=categorie");
            exit();
        }
        
        // Utiliser le gestionnaire "getsupprimercategorie" pour supprimer la catégorie de la base de données
        $suppression_reussie = getsupprimercategorie($id);
        
        if ($suppression_reussie) {
            // Récupérer tous les produits associés à cette catégorie
            $produits = getproduitparid_cate($id);
            
            // Supprimer tous les produits associés à cette catégorie
            foreach ($produits as $produit) {
                $id_produit = $produit['id'];
                getsupprimerproduit($id_produit);
            }
            
            // Redirection vers la page de liste des catégories après la suppression réussie
            header("Location: index.php?action=categorie");
            exit();
        } else {
            // Afficher un message d'erreur si la suppression de la catégorie a échoué
            echo "Erreur lors de la suppression de la catégorie.";
        }
    } else {
        // Si l'id de la catégorie n'est pas spécifié dans l'URL, rediriger vers la page de liste des catégories
        header("Location: index.php?action=categorie");
        exit();
    }
}




