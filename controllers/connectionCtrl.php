<?php

include_once 'configuration.php';

$email = '';
$formError = array();
$message = '';

/*
 * Comme on enregistre pas de données dans la BDD, il n'est pas nécessaire d'utiliser FILTER_VAR pour la connexion
 * Si $_POST['email'] existe et n'est pas vide, on protège des injections sql avec htmlspecialchars et on met le résultat dans la variable $email
 * Si non on enregistre un message dans le tableau des ereurs
 */
if (!empty($_POST['email'])) {
    $email = htmlspecialchars($_POST['email']);
} else {
    $formError['email'] = ERROR_MAIL;
}

// Comme on enregistre pas de données dans la BDD, il n'est  pas nécessaire d'utiliser le password_hash pour la connexion
if (!empty($_POST['password'])) {
    $password = $_POST['password'];
} else {
    $formError['password'] = ERROR_PASSWORD;
}
/*
 * S'il n'y a pas d'erreur stockée dans le tableau $formError, on instancie l'objet $user et on récupère la valeur de $email 
 * dans l'attribut email
 */
if (count($formError) == 0) {
    $user = new users();
    $user->email = $email;
    /* Si on a bien trouvé l'utilisateur à partir de la méthode userConnection 
     * On vérifie l'attribut password avec la valeur de la variable $password
     */
    if ($user->userConnection()) {
        if (password_verify($password, $user->password)) {
            //On rempli la session avec les attributs de l'objet issus de l'hydratation
            $_SESSION['firstname'] = $user->firstname;
            $_SESSION['name'] = $user->name;
            $_SESSION['id'] = $user->id;
            $_SESSION['idRoles'] = $user->idRoles;
            $_SESSION['email'] = $user->email;
            $_SESSION['idUsers'] = $user->idUsers;
            $_SESSION['isConnect'] = true;
            // si la connexion est réussi, on redirige vers la vue _allUsersMenu
            header('location: _allUsersMenu.php');
            // Si la page est redirigée, exit permet de s'assurer que la suite du code ne soit pas exécuté
            exit;
        } else {
            //la connexion échoue
            $message = USER_CONNECTION_ERROR;
        }
    }
}
