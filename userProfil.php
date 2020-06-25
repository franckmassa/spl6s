<?php
// On démarre la session en début de code
session_start();
include 'controllers/userProfilCtrl.php';
// Dans le header on echo le $title
$title = 'Profile utilisateur';
// On intègre le header avec les liens et CDN qui servent au fonctionnement de bootstrap, feuille de style....
include '_header.php';
?>
<body>
    <!-- On intègre la Navbar et la bannière -->
    <?php include '_navbar.php'; ?>
    <div class="container managment mt-5">
        <div class="row">
            <H1 class="col-md-12 text-center text-dark mt-3">Mise à jour du profil de l'utilisateur</H1>
        </div>
        <div class="row">
        </div>
        <!-- Champs de formulaire pour les modifications du profil de l'utilisateur -->
        <div  class="offset-2 col-md-8">
            <form action="#" method="POST">
                <div class="form-group">
                    <label for="lastname">Nom</label>
                    <!-- On garde le nom en mémoire dans le champ avec la value -->
                    <input type="text" class="form-control" name="lastname" id="lastname" placeholder="Nom" value="<?= $profilList->lastname ?>"/>
                    <!-- On affiche le message s'il y a un message dans le tableau des errreurs pour le nom -->
                    <?php if (isset($formError['lastname'])) { ?>
                        <p class="text-danger"><?= isset($formError['lastname']) ? $formError['lastname'] : '' ?></p>
                    <?php } ?>
                    <label for="firstname">Prénom</label>
                    <input type="text" class="form-control" name="firstname" id="firstname" placeholder="Prénom" value="<?= $profilList->firstname ?>"/>
                    <?php if (isset($formError['firstname'])) { ?>
                        <p class="text-danger"><?= isset($formError['firstname']) ? $formError['firstname'] : '' ?></p>
                    <?php } ?>

                    <label for="email">Adresse email</label>
                    <input type="text" class="form-control" name="email" id="email" placeholder="Adresse email" value="<?= $profilList->email ?>"/>
                    <?php if (isset($formError['email'])) { ?>
                        <p class="text-danger"><?= isset($formError['email']) ? $formError['email'] : '' ?></p>
                    <?php } ?>
                    <label for="phone">Téléphone</label>
                    <input type="text" class="form-control" name="phone" id="phone" placeholder="Téléphone" value="<?= $profilList->phone ?>"/>
                    <?php if (isset($formError['phone'])) { ?>
                        <p class="text-danger"><?= isset($formError['phone']) ? $formError['phone'] : '' ?></p>
                    <?php } ?>
                    <button class="mt-3" type="submit" name="submit" id="submit" value="">Validation</button>
                </div>
            </form>
            <p class="text-danger"><?= isset($formError['submit']) ? $formError['submit'] : '' ?></p>
            <!-- On affiche si le profil de l'utilisatuer a été modifié -->
            <?php if ($formSuccess != '') { ?>
                <p class="text-warning text-center text-uppercase font-weight-bold"><?= $formSuccess . ' !' ?></p>
            <?php } ?>
        </div>
    </div>
    <!-- On intègre la source fichier.js, CDN pour javascript, jQuery qui servent au bon fonctionnement du site -->
    <?php include '_foot.php'; ?>
</body>
</html>