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
include_once 'configuration.php';
/**
 * On instancie l'objet profil de la classe users
 * On récupère l'id dans l'attribut id de l'objet $profil
 */
$profil = new users();
$profil->id = $_GET['id'];

// On récupère 
$formSuccess = '';

/**
 * On appelle la méthode getProfilById à la fin du code pour que l'affichage soit instantanée.
 */
//déclaration de la regex pour les noms
$regexName = '/^[A-Za-zàèìòùÀÈÌÒÙáéíóúýÁÉÍÓÚÝâêîôûÂÊÎÔÛãñõÃÑÕäëïöüÿÄËÏÖÜŸçÇßØøÅåÆæœ° \'\-]+$/';
//regex pour le numéro de téléphone (commençant obligatoirement par un 0 et contenant 10 chiffres)
// attention regex phone number
$regexPhoneNumber = '/^0[1-678][0-9]{8}/';
//regex pour l'adresse mail (autorisation chiffres lettres, obligation de l'@ et .)
$regexMail = '/[-0-9a-zA-Z.+_]+@[-0-9a-zA-Z.+_]+.[a-zA-Z]{2,4}/';

//déclaration du tableau d'erreur
$formError = array();

if (isset($_POST['submit'])) {
    $user = NEW users();

    if (!empty($_POST['lastname'])) {
        if (preg_match($regexName, $_POST['lastname'])) {
            $user->lastname = htmlspecialchars($_POST['lastname']);
        } else {
            $formError['lastname'] = ERROR_LASTNAME;
        }
    } else {
        $formError['lastname'] = FORM_LASTNAME;
    }

    if (!empty($_POST['firstname'])) {
        if (preg_match($regexName, $_POST['firstname'])) {
            $user->firstname = htmlspecialchars($_POST['firstname']);
        } else {
            $formError['firstname'] = ERROR_FIRSTNAME;
        }
    } else {
        $formError['firstname'] = FORM_FIRSTNAME;
    }

    if (!empty($_POST['phone'])) {
        if (preg_match($regexPhoneNumber, $_POST['phone'])) {
            $user->phone = htmlspecialchars($_POST['phone']);
        } else {
            $formError['phone'] = ERROR_PHONE;
        }
    } else {
        $formError['phone'] = FORM_PHONE;
    }

    if (!empty($_POST['email'])) {
        if (preg_match($regexMail, $_POST['email'])) {
            $user->email = htmlspecialchars($_POST['email']);
        } else {
            $formError['email'] = ERROR_MAIL;
        }
    } else {
        $formError['email'] = FORM_EMAIL;
    }

    if (count($formError) == 0) {
        // Récupération de la valeur de l'id dans le paramètre de l'url
        $user->id = $_GET['id'];
        if ($user->updateUserProfil()) {
            $formSuccess = 'Le profil a été modifié';
        }
        if (!$user->updateUserProfil()) {
            $formError['submit'] = ERROR_SUBMIT;
        }
    }
}
// On place le select à la fin du code pour que l'affichage soit instantanée
$profilList = $profil->getProfilById();



