<?php

include_once 'configuration.php';

/*
 * Si idRoles est différent de 5
 * on redirige vers l'index
 */
if ($_SESSION['idRoles'] != 5) {
    header('location: index.php');
    // Si la page est redirigée, exit permet de s'assurer que la suite du code ne soit pas exécuté
    exit;
}
// Déclaration de la variable $regexName pour le nom du projet
$regexName = '/^[0-9a-zA-Zàáâãäåçèéêëìíîïðòóôõöùúûüýÿ\-\ ]+$/';
// Déclaration de la variable $regexText pour la description du projet
$regexText = '/^[0-9a-zA-Zàáâãäåçèéêëìíîïðòóôõöùúûüýÿ\-\ \.\,\?\:\!\']+$/';

// Tableau de erreurs
$formError = array();

// Variable $formSuccess initialisé à vide
$formSuccess = '';

// Si on valide le formulaire
if (isset($_POST['submit'])){ // && !empty($_POST['nameProject']) && !empty($_POST['department']) && !empty($_POST['description'])) {
// On instancie l'objet $project de la classe project
    $project = new project();

    if (!empty($_POST['nameProject'])) {
        if (preg_match($regexName, $_POST['nameProject'])) {
            $nameProject = htmlspecialchars($_POST['nameProject']);
            $project->nameProject = $nameProject;
        } else {
            $formError['nameProject'] = ERROR_NAMEPROJECT;
        }
    } else {
        $formError['nameProject'] = FORM_EMPTY;
    }

    if (!empty($_POST['department'])) {
        if (preg_match($regexText, $_POST['department'])) {
            $department = htmlspecialchars($_POST['department']);
            $project->department = $department;
        } else {
            $formError['department'] = ERROR_NAMEPROJECT;
        }
    } else {
        $formError['department'] = FORM_EMPTY;
    }

    if (!empty($_POST['description'])) {
        $description = htmlspecialchars($_POST['description']);
        $project->description = $description;
    } else {
        $formError['description'] = FORM_EMPTY;
    }

    if (!empty($_POST['champion'])) {
        if (preg_match($regexText, $_POST['champion'])) {
            $champion = htmlspecialchars($_POST['champion']);
            $project->idChampion = $champion;
        } 
    } else {
        $formError['champion'] = FORM_SELECT;
    }

    if (!empty($_POST['controller'])) {
        if (preg_match($regexText, $_POST['controller'])) {
            $controller = htmlspecialchars($_POST['controller']);
            $project->idController = $controller;
        } 
    } else {
        $formError['controller'] = FORM_SELECT;
    }

// On assigne la valeur de idUsers à l'attribut idLeader de l'objet $project
    $project->idLeader = $_SESSION['idUsers'];

// on appelle la méthode proposeProject
    $project->proposeNewProject();

// Si le tableau $formError est vide, on stocke le message d'enregistrement dans la variable $formSuccess
    if (count($formError) == 0) {
        $formSuccess = 'Proposition de projet enregistré!';
        
    }
}
// On instancie l'objet $users
$user = new users();
// On donne la valeur 3 (champion) à l'attribut idRoles de l'objet $user
$user->idRoles = 3;
// On assigne la valeur de idUsers à l'attribut idUsers(id du super utilisateur) de l'objet $user
$user->idUsers = $_SESSION['idUsers'];
$championsList = $user->getListUsersByRole();
// On donne la valeur 4 (conroller) à l'attribut idRoles de l'objet $user
$user->idRoles = 4;
// On appelle la méthode getListUsersByRole et on stocke le résultat dans la variable $controllersList
$controllersList = $user->getListUsersByRole();





