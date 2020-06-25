<?php

include_once 'configuration.php';

// Déclaration de la variable $regexPassword 
// (minimum: 1 chiffre, 1 minuscule, 1 majuscule, 1 caractère spécial, 8 caractères)
$regexPassword = '/^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*\W).{8,}$/';
// Déclaration d'un tableau d'erreurs "$formError" pour enregistrer les messages d'erreurs
$formError = array();
$message = '';

//Si on valide le formulaire alors on instancie l'objet $user
if (isset($_POST['submit'])) {
    $user = new users;
    // On donne la valeur de l'email saisi à l'attribut email
    $user->email = $_SESSION['email'];
    // On appelle la methode userConnection et on stocke le résultat dans la variable $userConnection
    $userConnection = $user->userConnection();
// On vérifie Si "password" existe 
    if (isset($_POST['password'])) {
        // On stocke la valeur du password saisi dans la variable $password
        $password = $_POST['password'];
        // Si le password n'est pas vérifié, on stocke un message d'erreur dans le tableau $formError
        if (!password_verify($password, $user->password)) {
            $formError['newPassword'] = 'Nouveau mot de passe non enregistré !';
        } else {
            // si non on enregistre le nouveau password et on affiche le message
            $message = 'Mot de passe enregistré !';
        }
    }

// Test Regex
if(!empty($_POST['newPassword'])){
    if(preg_match($regexPassword, $_POST['password']) && preg_match($regexPassword, $_POST['newPassword'])){
        $password = $_POST['newPassword'];
    }
     else{
        $formError['password'] = ERROR_PASSWORD;
    } 
} 
//else{
    //$formError['password'] = 'Champ vides';
//}
    // On vérifie Si "newPassword" existe 
    if (isset($_POST['newPassword'])) {
        // On protège le newpassword et on donne la valeur du newpassword à l'attribut password
        $user->password = password_hash($_POST['newPassword'], PASSWORD_DEFAULT);
        // On vérifie si l'attribut password existe
        if (empty($user->password)) {
            // Si le champ est vide, on stocke le message d'erreur dans le tableau $formError
            $formError['newPassword'] = 'Entrer votre mot de passe.';
        }
    }
    /*
     * S'il n'y a pa d'errreur on donne la valeur de l'email saisi à l'attribut email 
     * et on appelle la méthode passwordModify
     */
    if (count($formError) == 0) {
        $user->email = $_SESSION['email'];
        $user->passwordModify();
    }
}
