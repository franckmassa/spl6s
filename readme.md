1 - Créer le fichier configuration.php à la racine du site spl6s. 
2 - Copier le code suivant dans le fichier configuration.php.

<?php

// Définition des informations de connexion à la base de données
define('HOST', 'localhost');
define('LOGIN', ' ');
define('PASSWORD', ' ');
define('DBNAME', 'SPL6S');

/**
 * Ajout des fichiers nécessaire au bon fonctionnement du site
 * Ajout de l'include du fichier define permettant d'afficher les messages
 */
include_once 'lang/FR_FR.php';
include_once 'models/database.php';
include_once 'models/users.php';
include_once 'models/societies.php';
include_once 'models/roles.php';
include_once 'models/project.php';


