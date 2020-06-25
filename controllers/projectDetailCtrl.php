<?php

/*
 * Si idRoles est différent de 5 (leader de projet)
 * on redirige vers l'index
 */

if ($_SESSION['idRoles'] != 5) {
    header('location: index.php');
// Si la page est redirigée, exit permet de s'assurer que la suite du code ne soit pas exécuté
    exit;
}

include_once 'configuration.php';
/**
 * On instancie l'objet profil de la classe project
 * On récupère l'id dans l'attribut id de l'objet $detail
 */
$detail = new project();
$detail->id = $_GET['id'];

// On récupère 
$formSuccess = '';

/**
 * On appelle la méthode getDetailProjectById à la fin du code pour que l'affichage soit instantanée.
 */
// Déclaration de la variable $regexName pour le nom du projet
$regexName = '/^[0-9a-zA-Zàáâãäåçèéêëìíîïðòóôõöùúûüýÿ\-\ \']+$/';
// Déclaration de la variable $regexText pour le department et la description du projet
//$regexText = '/^[0-9a-zA-Zàáâãäåçèéêëìíîïðòóôõöùúûüýÿ\-\ \.\,\?\:\!\']+$/';

//déclaration du tableau d'erreur
$formError = array();

if (isset($_POST['submit'])) {
    $project = NEW project();

    if (!empty($_POST['nameProject'])) {
        if (preg_match($regexName, $_POST['nameProject'])) {
            $project->nameProject = htmlspecialchars($_POST['nameProject']);
        } else {
            $formError['nameProject'] = ERROR_NAMEPROJECT;
            ;
        }
    } else {
        $formError['nameProject'] = FORM_NAMEPROJECT;
    }

    if (!empty($_POST['department'])) {
        if (preg_match($regexName, $_POST['department'])) {
            $project->department = htmlspecialchars($_POST['department']);
        } else {
            $formError['department'] = ERROR_DEPARTMENT;
        }
    } else {
        $formError['department'] = FORM_DEPARTMENT;
    }

    if (!empty($_POST['description'])) {
        $project->description = htmlspecialchars($_POST['description']);
    } else {
        $formError['description'] = FORM_DESCRIPTION;
    }

    if (count($formError) == 0) {
// Récupération de la valeur de l'id dans le paramètre de l'url
        $project->id = $_GET['id'];
        if ($project->updateProjectDetail()) {
            $formSuccess = 'Le profil a été modifié';
        }
        if (!$project->updateProjectDetail()) {
            $formError['submit'] = ERROR_SUBMIT;
        }
    }
}
// On place le select à la fin du code pour que l'affichage soit instantanée
$projectDetail = $detail->getDetailProjectById();



