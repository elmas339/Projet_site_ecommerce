<?php
 

require_once("modelle/manageur.php");
function acceuil(){

	render("views/acceuil.php",[]);
} 
// a propos de nous 
function apropos(){

	render("views/apropos.php",[]);
}
 
// Contrôleur pour afficher les produits en fonction de l'identifiant de catégorie
function produit() {
    if (isset($_GET["id_categorie"])) {
        $id = $_GET["id_categorie"];
        $variable = getproduitparid_cate($id);
    } else {
        $variable = getproduit();
    }
    render("views/produit.php", $variable);
}
function voirplus(){
    if (isset($_GET["id"])) {  
        $id = $_GET["id"];
        $variable = getvoirplusproduit($id);
        render("views/detaille.php",$variable);
    }

}

function deconnexion(){
	session_destroy();
	header("Location: index.php?action=acceuil");
}
function connexionAction() {
    $utilisateur = ["email" => "", "password" => ""];
     $erreur = [];

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $utilisateur = $_POST;

        // Valider le format de l'email
        if (empty($utilisateur["email"])) {
            $erreur["email"] = "L'email est vide !";
        } elseif (!filter_var($utilisateur["email"], FILTER_VALIDATE_EMAIL)) {
            $erreur["email"] = "L'email n'est pas valide !";
        }

        // Valider le mot de passe
        if (empty($utilisateur["password"])) {
            $erreur["password"] = "Le mot de passe est vide !";
        }
        
        // S'il n'y a pas d'erreurs, enregistrer l'email dans la session et rediriger vers la page index
        // S'il n'y a pas d'erreurs, enregistrer l'email dans la session et rediriger vers la page index
        if (empty($erreur)) {
            if (!user_exists($utilisateur)){
                // Utilisateur non trouvé ou mot de passe incorrect
                $erreur["email"] = "Email ou mot de passe incorrect !";
            } else {
                $_SESSION["email"] = $utilisateur["email"];
                header("Location: index.php?action=acceuil");
                exit();
            }
        }

    }

    $variables = ["erreur" => $erreur ?? '' ];
    render("views/compte.php", $variables);
}

function ajoututilisateur(){
	$utilisateur = ["email"=>"","password"=>""];
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $utilisateur = $_POST;
        // Les valeurs saisies doivent être non vides
        if (empty($utilisateur["email"])) $erreur["email"] = "Le email est vide !";
        if (empty($utilisateur["password"])) $erreur["password"] = "Le mot de passe est vide !";
        if (!isset($erreur)) {
            $datte = date('Y-m-d');
            $utilisateur["datte"] = $datte;
            if(getInsertUtili($utilisateur)){
				header("Location: index.php?action=connexionAction");
			}
            
            exit(); // Ajout de l'instruction exit() après la redirection
        }
    }

    $variables = ["erreur" => $erreur ?? ''];
    $view = "views/ajout_utilisateur.php";
    render($view, $variables);
}
function ajoutproduit() {
    $produit = ["nom" => "", "prix" => "", "categorie" => ""];
    $erreur = [];

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $produit = $_POST;
        // Les valeurs saisies doivent être non vides
        if (empty($produit["nom"])) $erreur["nom"] = "Le nom est vide !";
        if (empty($produit["prix"])) $erreur["prix"] = "Le prix est vide !";

        // Vérifier si la catégorie a été sélectionnée
        if (!isset($produit["categorie"])) $erreur["categorie"] = "La catégorie n'a pas été sélectionnée !";

        if (empty($_FILES["photo"]["name"])) $erreur["photo"] = "La photo est vide !";

        if (empty($erreur)) {
            $datte = date('Y-m-d');
            $produit["datte"] = $datte;
            $photo = $_FILES['photo']['name'];  
            $produit["photo"] = $photo;
            
            // Assurez-vous que le dossier de destination existe et a les bonnes permissions
            $upload = "C:\\xampp\\htdocs\\site_icommerce\\public\\produit\\" . $photo;
            move_uploaded_file($_FILES['photo']['tmp_name'], $upload);
             // Insérer le produit dans la base de données et capturer le résultat
            $insertion_reussie = getAjoutProduit($produit);

            if ($insertion_reussie) {
                // Redirection vers la page de la liste des produits
                header("Location: index.php?action=produit");
                exit();
            } else {
                // Afficher un message d'erreur si l'insertion a échoué
                echo "Erreur lors de l'ajout du produit dans la base de données.";
            }
        }
    }

    // Récupérer les catégories depuis la base de données
    $categories = getcategorie();
    
    $variable = ["categorie" => $categories, "erreur" => $erreur];

    $view = "views/ajout_produit.php";
    render($view, $variable);
}
// suupression d un produit
function supprimerproduit(){
    $id = $_GET["id"];
    getsupprimerproduit($id);
    header("Location: index.php?action=produit");
}
// Contrôleur pour traiter la recherche
function recherche() {
    // Vérifier si le formulaire de recherche a été soumis
    if (isset($_POST['recherche'])) {
        // Récupérer la recherche depuis le formulaire
        $recherche = $_POST['recherche'];

        // Effectuer la recherche en utilisant la fonction rechercheProduitsEtCategories()
        $resultats = rechercheProduitsEtCategories($recherche);

        // Afficher la vue avec les résultats de la recherche
        render('views/recherche.php', array('resultats' => $resultats));
    }
}




function render($view,array $variable=[]){
	if(file_exists($view)){
		extract($variable);
		ob_start();
		require($view);
		$view=ob_get_clean();
		require("views/templete.php");
	}else throw new Exception("fichier inexistant");
	
}


?>