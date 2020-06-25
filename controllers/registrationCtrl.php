<?php

include_once 'configuration.php';

// Déclaration de la variable $regexName pour les noms et les prénoms
$regexName = '/^[a-zA-Z\-çéèôüïë ]+$/';
// Déclaration de la variable $regexSociety pour les noms des sociétés
$regexSociety = '/^[a-zA-Z\.&-éèêëïîôöâäç ][^<>@&"()!_$*€£`+=\/;?#]+$/';
// Déclaration de la variable $regexSiret pour les Numéros de siret
$regexSiret = '/^[0-9]{14}$/';
// Déclaration de la variable $regexPhoneNumber pour les numéros de téléphones
$regexPhoneNumber = '/^0[1-9]([-. ]?[0-9]{2}){4}$/';
// Déclaration de la variable $regexPassword 
// (minimum: 1 chiffre, 1 minuscule, 1 majuscule, 1 caractère spécial, 8 caractères)
$regexPassword = '/^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*\W).{8,}$/';


// Déclaration d'un tableau d'erreurs "$formError" pour enregistrer les messages d'erreurs
$formError = array();

// Déclaration de la variable pour afficher que l'enregistrememnt a été fait
$formSuccess = '';


if (isset($_POST['submit'])) {
    // On instancie l'objet $user
    $user = new users();
    // On instancie l'objet $societ
    $societ = new societies();

// On vérifie si "firstname" n'est pas vide et existe
    if (!empty($_POST['firstname'])) {
// Test de regex
        if (preg_match($regexName, $_POST['firstname'])) {
            /* On déclare la variable $firstname avec le htmlspecialchars qui change 
             * l'interprétation des balises <script> si un code est écrit dans le champ */
            $firstname = htmlspecialchars($_POST['firstname']);
            /* On appelle la valeur de l'attribut lastname de l'objet $user instance de la classe users 
             * et on stocke cette valeur dans $firstname pour garder en mémoire la saisie dans le champ du formulaire */
            $user->firstname = $firstname;

            /* Autre solution: 
             * $user->firstname = htmlspecialchars($_POST['firstname']);, ne permet pas de garder en mémoire 
             * la saisie dans le champ du formulaire  */
        } else {
// Si le champ est mal rempli, on stocke le rapport d'erreur dans le tableau $formError
            $formError['firstname'] = ERROR_FIRSTNAME;
        }
    } else {
// Si le champ est vide, on stocke le rapport d'erreur dans le tableau $formError
        $formError['firstname'] = FORM_EMPTY;
    }

// On vérifie si "lastname" n'est pas vide et existe
    if (!empty($_POST['lastname'])) {
// Test de regex
        if (preg_match($regexName, $_POST['lastname'])) {
            /* On déclare la variable $lastname avec le htmlspecialchars qui change 
             * l'interprétation des balises <script> si un code est écrit dans le champ */
            $lastname = htmlspecialchars($_POST['lastname']);
            $user->lastname = $lastname;
        } else {
// Si le champ est mal rempli, on stocke le rapport d'erreur dans le tableau $formError
            $formError['lastname'] = ERROR_LASTNAME;
        }
    } else {
// Si le champ est vide, on stocke le rapport d'erreur dans le tableau $formError
        $formError['lastname'] = FORM_EMPTY;
    }


// On vérifie si "phone" n'est pas vide et existe
    if (!empty($_POST['phone'])) {
// Test de regex
        if (preg_match($regexPhoneNumber, $_POST['phone'])) {
            $phone = htmlspecialchars($_POST['phone']);
            $user->phone = $phone;
        } else {
            $formError['phone'] = ERROR_PHONE;
        }
    } else {
        $formError['phone'] = FORM_EMPTY;
    }


// On vérifie Si "email" n'est pas vide et existe
    if (!empty($_POST['email'])) {
// Le filtre permet de verifier l'email
        if (FILTER_VAR($_POST['email'], FILTER_VALIDATE_EMAIL)) {
            $email = htmlspecialchars($_POST['email']);
            $user->email = $email;
        } else {
            $formError['email'] = ERROR_MAIL;
        }
    } else {
        $formError['email'] = FORM_EMPTY;
    }

// Test Regex
if(!empty($_POST['password'])){
    if(preg_match($regexPassword, $_POST['password'])){
        $password = $_POST['password'];
    }
     else{
        $formError['password'] = ERROR_PASSWORD;
    } 
}

// On vérifie Si "password" n'est pas vide et existe et s'il est confirmé 
    if (!empty($_POST['password']) && !empty($_POST['passwordConfirm']) && $_POST['password'] == $_POST['passwordConfirm']) {    
                $user->password = password_hash($_POST['password'], PASSWORD_DEFAULT);       
    } else {
        $formError['password'] = FORM_PASSWORD;
        $formError['passwordConfirm'] = FORM_CONFIRMPASSWORD;
    }

// On vérifie si "society" existe et n'est pas vide
    if (!empty($_POST['society'])) {
// Test de regex
        if (preg_match($regexSociety, $_POST['society'])) {
            /* On déclare la variable $name avec le htmlspecialchars qui change 
             * l'interprétation des balises <script> si un code est écrit dans le champ */
            $society = htmlspecialchars($_POST['society']);
            $societ->name = $society;
        } else {
// Si le champ est mal rempli, on stocke le rapport d'erreur dans le tableau $formError
            $formError['society'] = ERROR_SOCIETY;
        }
    } else {
// Si le champ est vide, on stocke le rapport d'erreur dans le tableau $formError
        $formError['society'] = FORM_EMPTY;
    }

// On vérifie si "siret" existe
    if (!empty($_POST['siret'])) {
// Test de regex
        if (preg_match($regexSiret, $_POST['siret'])) {
            $siret = htmlspecialchars($_POST['siret']);
            $societ->siret = $siret;
        } else {
            $formError['siret'] = ERROR_SIRET;
        }
    } else {
        $formError['siret'] = FORM_EMPTY;
    }

// On stocke le résultat de la méthode checkIfUserExist qui permet de vérifier si le login (email) de l'utilsateur existe   
    $resultCount = $user->checkIfUserExist();

    /** On vérifie s'il n'y a pas d'erreurs dans le tableau des erreurs $formError
     *  et on vérifie que le résultat de la méthode checkIfUserExist stocké dans $resultCount est égal à 0 (le login n'existe pas)
     */
    if (count($formError) == 0 && $resultCount == 0) {
        // On appelle la méthode getInstance de la classe dataBaseSingleton
        // J'ai fais un singletone pour pouvoir limiter les appels à la base de données et rester sur la même instance
        $user->idUsers = NULL;

        $database = dataBaseSingleton::getInstance();
        // On active les erreurs en mode exeption pour que le catch puisse attraper les errreurs
        $database->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        try {
            // On démarre la transaction pour simuler la requête
            $database->db->beginTransaction();
            // si on appelle la méthode societyRegister de l'objet $societ instance de la classe societies pour enregistrer les valeurs des attributs 
            if ($societ->societyRegister()) {
                // On récupère le dernier id inséré dans la database et on l'enregistre dans l'attribut idSocieties de l'objet $user instance de la classe users
                $user->idSocieties = $database->db->lastInsertId();
                // on appelle la méthode userRegister de l'objet $user pour enregistrer la valeur des attributs dans la classe users
                $user->userRegister();

                // On met le message de confirmation d'enregistrement dans la variable $formSuccess
                $formSuccess = 'La société et l\'utilisateur ont bien été enregistrés';
            }
            // commit valide la transaction en cours, rendant les modifications permanantes
            $database->db->commit();
        } catch (Exception $ex) {
            // Rollback annule la transaction en cours et annule sa modification
            $database->db->rollback();
        }
        // Redirection de la page formulaire d'enregistrement vers le formulaire de connexion        
        header('location: connection.php');
        // Si la page est redirigée, exit permet de s'assurer que la suite du code ne soit pas exécuté
        exit;
        // Si le login (email) existe déja dans la table prs13_users, on affiche le message d'errreur stocké dans $formError
     } else {
        $formError['emailVerify'] = 'Utilisateur non enregistré';
    }
}
