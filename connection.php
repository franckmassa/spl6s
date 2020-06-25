<?php
// On démarre la session en début de code
session_start();
include 'controllers/connectionCtrl.php';
// Dans le header on echo le $title
$title = 'Connexion';
// On intègre le header avec les liens et CDN qui servent au fonctionnement de bootstrap, feuille de style....
include '_header.php';
?>
<body>
    <div class="container managment mt-5 text-white">
        <div class="row">
            <!-- Logo du site -->
            <div class="col-md-12">
                <!-- Ajout d'un bouton home qui redirige vers l'accueil -->
                <a href="index.php"><img class="mt-3" src="assets/img/logoFondBleu.png" alt="logo site" width="190" id="logo" /><i class="fas fa-home"></i></a> 
            </div>
        </div>
        <!-- Formulaire de connexion -->
        <h1 class="mt-3 text-center">Connexion</h1>
        <form action="#" method="post">
            <div class="form-row">
                <div class="col-md-6">
                    <!--  Champs pour l'adresse Email de l'utilisateur -->
                    <label for="email">Veuillez entrer votre email</label>
                    <input class="form-control" type="email" name="email" id="email" placeholder="Identifiant" value="<?= !empty($email) ? $email : '' ?>"/>
                </div>
                <div class="col-md-6">
                    <!-- Champs pour le mot de passe de l'utilisateur --> 
                    <label for="password"><?= FORM_PASSWORD ?></label>
                    <input class="form-control" type="password" name="password" id="password" placeholder="Mot de passe" value="<?= !empty($password) ? $password : '' ?>" />
                </div>
            </div>
            <button class="mb-3 mt-3" type="submit" name="emailSubmit" id="emailSubmit" ><?= FORM_LOGIN_SUBMIT ?></button>
        </form>
        <!-- On affiche le message pour la connnexion si elle a échoué, si non on redirige vers la page utilisateur (voir header location dans connectionCtrl) -->
        <?php if ($message != '') { ?>
            <p class="text-warning text-center text-uppercase font-weight-bold"><?= $message . ' !' ?></p>
        <?php } ?>
    </div>
</body>
</html>


