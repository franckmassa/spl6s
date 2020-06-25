<?php

/*
 * Si idRoles est différent de 2 (super utilisateur)
 * on redirige vers l'index
 */
if ($_SESSION['idRoles'] != 2) {
    header('location: index.php');
    // Si la page est redirigée, exit permet de s'assurer que la suite du code ne soit pas exécuté
    exit;
}
/*
 * On include le fichier configuration qui stocke les fichiers nécessaires au bon fonctionnement 
 * du site (include define, include modèles)
 */
include_once 'configuration.php';
// On instancie l'objet $removeUser de la classe users
$removeUser = NEW users();
/* Si submit existe, si idRemove existe
 * on récupère $_GET['idRemove'] dans l'attribut id de l'objet $removeUser
 * on renvoie le résultat de la méthode removeUser dans la variable $removeUserRow
 */
if (isset($_POST['submit'])) {
    if (isset($_GET['idRemove'])) {
        $removeUser->id = $_GET['idRemove'];
        $removeUserRow = $removeUser->removeUser();
    }
}
// On instancie l'objet $listUserObject de la classe users
$listUserObject = new users();
// On attribut la valeur $_SESSION['id'] à l'idUsers de l'objet $listUserObject
$listUserObject->idUsers = $_SESSION['id'];
//Si $_POST['nameAsked'] n'est pas vide
if (!empty($_POST['nameAsked'])) {   //Déclaration de la variable $search qui est égale a $_POST['nameAsked']
    $search = htmlspecialchars($_POST['nameAsked']);
    //strip_tags — Supprime les balises HTML et PHP d'une chaîne
    $search = strip_tags($search);
    //trim — Supprime les espaces (ou d'autres caractères) en début et fin de chaîne
    $search = trim($search);
    $lastnameRegex = '/^[a-z _\'\-àâäéèêëîïôöûüùçæ]*$/i';
    if (preg_match($lastnameRegex, $search)) {
        //Association de la valeur de la variable $search a l'attribut $lastname de l'instance $listUserObject
        $listUserObject->lastname = $search;
        //Éxécution de la méthode findUserByLastname() de l'instance $listUserObject et intégration dans 
        $listUsers = $listUserObject->findUserByLastname($search);
    } else {
        $error = 'Recherche invalide';
    }
// Si non on attribut la valeur de $_SESSION['id'] à l'id de l'objet $listUserObject
} else {
    $listUserObject->id = $_SESSION['id'];
//Éxécution de la méthode getListUser() de l'instance $listUserObject et intégration dans $listUsers
    $listUsers = $listUserObject->getUserList();
}

