<?php

if ($_SESSION['idRoles'] != 5) {
    header('location: index.php');
    // Si la page est redirigée, exit permet de s'assurer que la suite du code ne soit pas exécuté
    exit;
}
/*
 * On include le fichier configuration qui stocke les fichiers nécessaires au bon fonctionnement 
 * du site (include define, include models)
 */
include_once 'configuration.php';

// On instancie l'objet $removeUser de la classe project
$removeProject = NEW project();
/* Si submit existe, si idRemove existe
 * on récupère $_GET['idRemove'] dans l'attribut id de l'objet $removeProject
 * on renvoie le résultat de la méthode removeProject dans la variable $removeProjectRow
 */
if (isset($_POST['submit'])) {
    if (isset($_GET['idRemove'])) {
        $removeProject->id = $_GET['idRemove'];
        $removeProjectRow = $removeProject->removeProject();
    }
}
// On instancie l'objet $listProjectObject de la classe project
$listProjectObject = new project();
//// On attribut la valeur $_SESSION['id'] à l'idLeader de l'objet $listProjectObject
$listProjectObject->idLeader = $_SESSION['idUsers'];
//Si $_POST['departmentAsked'] n'est pas vide
if (!empty($_POST['departmentAsked'])) {   //Déclaration de la variable $search qui est égale a $_POST['departmentAsked']
    $search = htmlspecialchars($_POST['departmentAsked']);
    //strip_tags — Supprime les balises HTML et PHP d'une chaîne
    $search = strip_tags($search);
    //trim — Supprime les espaces (ou d'autres caractères) en début et fin de chaîne
    $search = trim($search);
    // Déclaration de la variable $regexName pour le nom du projet
    $regexName = '/^[0-9a-zA-Z\-çéèôüïë ]+$/';
    if (preg_match($regexName, $search)) {
        //Association de la valeur de la variable $search a l'attribut $nameProject de l'instance $listProjectObject
        $listProjectObject->nameProject = $search;
        //Éxécution de la méthode findProjectByName() de l'instance $listProjectObject et intégration dans 
        $listProject = $listProjectObject->findProjectByNameProject($search);
    } else {
        $error = 'Recherche invalide';
    }
// Si non on attribut la valeur de $_SESSION['id'] à l'id de l'objet $listProjectObject
} else {

//Éxécution de la méthode getProjectList() de l'instance $listProjectObject et intégration dans $listProject
    $listProject = $listProjectObject->getProjectList();
}
