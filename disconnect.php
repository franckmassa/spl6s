<?php
session_start();
// Si on est déconnecté, 
if (isset($_GET ['disconnected'])) {
    // On détruit toutes les variables de la session courante.
    session_unset();
// On détruit toutes les données associées à la session courante. 
    session_destroy();
// On Redirige la page vers l'index (page d'accueil)
    header('location:index.php');
    exit();
}

