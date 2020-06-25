<?php
// On démarre la session en début de code
session_start();
include 'controllers/accountUserCtrl.php';
// Dans le header on echo le $title
$title = 'Compte';
// On intègre le header avec les liens et CDN qui servent au fonctionnement de bootstrap, feuille de style....
include '_header.php';
?>
<body>
    <div class="container managment mt-5 text-white text-center">
        <div class="row">
            <!-- Logo du site -->
            <div class="col-md-12">
                <img class="mt-3" src="assets/img/logoFondBleu.png" alt="logo site" width="190" id="logo"/> 
            </div>
        </div>
        <h1 class="mt-5">Modification du mot de passe</h1>
        <form action="#" method="POST">        
            <!-- Ancien mot de passe de l'utilisateur -->
            <div class="form-row">
                <div class="col-md-6">
                    <label for="password">Ancien mot de passe:</label>
                    <input class="form-control" type="password" name="password" id="password" placeholder="Entrer un mot de passe" />
                     <!-- Affichage du message 'Veuillez entrer votre mot de passe.' -->
                    <p class="text-warning font-weight-bold"><?= isset($formError['password']) ? $formError['password'] : ''; ?></p>
                </div>
                <!-- Nouveau mot de passe de l'utilisateur -->
                <div class="col-md-6">
                    <label for="passwordConfirm">Nouveau mot de passe:</label>
                    <input class="form-control" type="password" name="newPassword" id="newPassword" placeholder="Confirmer le mot de passe" />
                    <!-- Affichage du message 'Veuillez confirmer votre mot de passe.' -->
                    <p class="text-warning font-weight-bold"><?= isset($formError['newPassword']) ? $formError['newPassword'] : ''; ?></p>
                    <?php if ($message != '') { ?>
                        <p class="text-warning font-weight-bold"><?= $message . '' ?></p>
                    <?php } ?>
                </div>
            </div> 
            <div class="alert alert-info mt-5" role="alert" >
                    Le mot de passe doit contenir : 8 caractères minimum, des majuscules, des minuscules, au moins 1 chiffre, au moins 1 caractère spécial
            </div>        
            <!-- Bouton pour soumettre le formulaire d'enregistrement -->
            <button type="submit" name="submit" >Enregistrer</button>
        </form>
        <!-- Lien qui permet de retourner au menu utilisateur -->
        <div class="mb-3 text-right">
            <a href="_allUsersMenu.php">Retour </a><i class="fas fa-sign-out-alt"></i> 
        </div>
    </div> 
</body>
</html>


