<?php

/*
 * Si idRoles est différent de 4 (controleur financier) 
 * on redirige vers l'index
 */
if ($_SESSION['idRoles'] != 4) {
    header('location: index.php');
    // Si la page est redirigée, exit permet de s'assurer que la suite du code ne soit pas exécuté
    exit;
}
include_once 'configuration.php';
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

