<?php

/*
 * Si idRoles est différent de 5 (leader projet) 
 * on redirige vers l'index
 */
if ($_SESSION['idRoles'] != 5) {
    header('location: index.php');
    // Si la page est redirigée, exit permet de s'assurer que la suite du code ne soit pas exécuté
    exit;
}
include_once 'configuration.php';
?>



