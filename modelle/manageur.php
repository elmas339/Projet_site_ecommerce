<?php
// Fonction pour établir une connexion à la base de données
function connexion() {
    $user = "root";
    $password = "";
    $dbname = "donne";
    $db = "mysql:host=localhost;dbname=" . $dbname;
    try {
        $cn = new PDO($db, $user, $password);
    } catch (PDOException $pdo) {
        die("Erreur d'ouverture : " . $pdo->getMessage());
    }
    return $cn;
}
// Fonction pour récupérer tous les utilisateurs de la table "utilisateur" dans la base de données
function getutilisateur(){
	$cn = connexion();
	return $rq = $cn->query("select * from utilisateur")->fetchAll();
}

// Fonction pour récupérer tous les produits de la table "produit" dans la base de données
function getproduit(){
	$cn = connexion();
	return $rq = $cn->query("select * from produit")->fetchAll();
}

// Fonction pour insérer un nouvel utilisateur dans la table "utilisateur" de la base de données
function getInsertUtili(array $t)
{
    $cn = connexion();
    $pwHash = password_hash($t["password"], PASSWORD_DEFAULT);
    $rq = $cn->prepare("INSERT INTO utilisateur (email, password, datte) VALUES (?, ?, ?)");
    $table = array($t["email"], $pwHash, $t["datte"]);
    return $rq->execute($table);
}

// Fonction pour ajouter un nouveau produit dans la table "produit" de la base de données
function getAjoutProduit(array $t) {
    $cn = connexion();
    $table = [$t["nom"], $t["prix"], $t["detaille"], $t["reduction"], $t["categorie"], $t["photo"], $t["datte"]];
    // Assurez-vous que vous utilisez "datte" au lieu de "date-creation" ici
    $rq = $cn->prepare("INSERT INTO produit(nom, prix, detaille, reduction, id_categorie, photo, datte) VALUES (?, ?, ?, ?, ?, ?, ?)");
    return $rq->execute($table);
}

// Fonction pour récupérer un produit spécifique par son identifiant (id) dans la table "produit" de la base de données pour le panier
function getproduitparid($id){
	$cn = connexion();
    $rq = $cn->prepare("select * from produit where id= ?");
	$rq->execute([$id]);
	return $rq->fetchAll();
}
// Fonction pour récupérer un produit spécifique par son identifiant (id) dans la table "produit"
function getvoirplusproduit($id) {
    $cn = connexion();
    $rq = $cn->prepare("SELECT * FROM produit WHERE id = ?");
    $rq->execute([$id]);
    return $rq->fetch(PDO::FETCH_ASSOC);
}



// Fonction pour vérifier si un utilisateur existe dans la base de données en vérifiant le mot de passe hashé
function user_exists(array $user)
{
    $cn = connexion();
    $rq = $cn->prepare("SELECT password FROM utilisateur WHERE  email= ?");
    $rq->execute([$user["email"]]);
    $passHash = $rq->fetchColumn();

    // Vérifier si le mot de passe est correct en utilisant password_verify
    return password_verify($user["password"], $passHash);
}
// suppression par id
function getsupprimerproduit($id){
	$cn=connexion();
	$rq=$cn->prepare("delete from produit where id=?");
 return	$rq->execute([$id]);
}


// parite categorie
// return les produit via à leur id_cathegori
function getproduitparid_cate($id){
	$cn = connexion();
    $rq = $cn->prepare("select * from produit where id_categorie= ?");
	$rq->execute([$id]);
	return $rq->fetchAll();
}
//return les cathegorie via à leur id_cathegori
function getcategorieparid($id){
	$cn = connexion();
    $rq = $cn->prepare("select * from categorie where id_categorie= ?");
	$rq->execute([$id]);
	return $rq->fetchAll();
}
// return les cathegorie
function getcategorie(){
	$cn = connexion();
	return $rq = $cn->query("select * from categorie ")->fetchAll();
}
// inscertion de cathegrie
function getAjoutcategorie(array $t) {
    $cn = connexion();
    $table = [$t["categorie"], $t["description"], $t["datte"]];
    // Assurez-vous que vous utilisez "datte" au lieu de "date-creation" ici
    $rq = $cn->prepare("INSERT INTO categorie(nom, detaille, datte) VALUES ( ?, ?, ?)");
    return $rq->execute($table);
}
//suppression categori par id
function getsupprimercategorie($id){
	$cn=connexion();
	$rq=$cn->prepare("delete from categorie where id_categorie=?");
 return	$rq->execute([$id]);
}
function rechercheProduitsEtCategories($recherche) {
    // Inclure le fichier de connexion à la base de données ici
    require_once 'C:\xampp\htdocs\site_icommerce\modelle\manageur.php';

    // Échapper les caractères spéciaux pour éviter les failles SQL
    $recherche = htmlspecialchars($recherche);

    // Requête pour rechercher les produits et les catégories
    $requete = "SELECT id, nom, prix, reduction, detaille, photo, 'produit' AS type FROM produit WHERE nom LIKE :recherche 
    UNION 
    SELECT id_categorie AS id, nom, NULL AS prix, NULL AS reduction, detaille, NULL AS photo, 'categorie' AS type FROM categorie WHERE nom LIKE :recherche";

    // Préparer la requête SQL
    $cn = connexion();
    $stmt = $cn->prepare($requete);

    // Utiliser bindValue pour éviter les injections SQL
    $stmt->bindValue(':recherche', '%' . $recherche . '%');

    // Exécuter la requête SQL
    $resultat = $stmt->execute();

    // Vérifier si la requête a réussi
    if ($resultat) {
        // Récupérer les résultats de la recherche sous forme de tableau associatif
        $resultats = $stmt->fetchAll(PDO::FETCH_ASSOC);

        // Retourner le tableau de résultats
        return $resultats;
    } else {
        // En cas d'erreur lors de l'exécution de la requête, renvoyer une valeur vide
        return array();
    }
}


 




