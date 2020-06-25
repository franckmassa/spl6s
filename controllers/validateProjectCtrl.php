<?php

/**
 * Cette ligne de code sert à afficher les erreurs PHP si l'on a pas modifier le fichier php.ini 
 * ini_set('display_errors', 1);
 * ini_set('display_startup_errors', 1);
 * error_reporting(E_ALL);
 */


//  la super global __DIR__ récupère le chemin du fichier d'où l'on se trouve (ex: validateProjectCtrl.php)
include __DIR__.'/../configuration.php';
//var_dump(__DIR__);

$formError = array();


// AJAX
if(isset($_POST['projectSelect'])){
    // Si le "projectSelect" existe on instancie un objet "$detail"
    $detail = new project();
    $detailProject = $detail->getDetailProject($_POST['projectSelect']);
    // var_dump($detailProject);
    echo json_encode($detailProject);
    
} else {
   
$prj= new project();
$listProjectObject2 = $prj->getListNameProject($_SESSION['id']);
}
// -- FIN AJAX -- 

// Test pour la validation de la date du projet
if (isset($_POST['submit'])){

$validDateProj = new statusProject();

    if(isset($_POST['date'])){
        $date = htmlspecialchars($_POST['date']);
        $validDateProj->date = $date;
    } else {
        $formError['date'] = FORM_DATE;
    }

    if (isset($_POST['projectSelect'])){
        $projectSelect = htmlspecialchars($_POST['projectSelect']);
        $detail->projectSelect = $projectSelect;

    } else {
        $formError['projectSelect'] = FORM_SELECT_PROJECT;
    }
}

// if ($formError == 0){
//     $database = dataBaseSingleton::getInstance();
//     $database->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

//     try{
//         $database->db->beginTransaction();
//         if ($detail->getDetailProject($_POST['projectSelect'])){

//         }


//     } catch {

//     }
// }


