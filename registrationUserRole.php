<?php
// On démarre la session en début de code
session_start();
include 'controllers/registrationUserRoleCtrl.php';
// Dans le header on echo le $title
$title = 'Enregistrement rôle utilisateur';
// On intègre le header avec les liens et CDN qui servent au fonctionnement de bootstrap, feuille de style....
include '_header.php';
?>
<body>
    <!-- On intègre la Navbar et la bannière -->
    <?php include '_navbar.php'; ?>
    <div class="container managment mt-5 text-white">
        <h1 class="text-white text-center mt-3">Enregistrement</h1>
            <!-- Formulaire d'enregistrement de l'utilisateur -->
            <form action="#" method="post">
                <!-- Prénom de l'utilisateur -->
                <div class="form-row">
                    <div class="col-md-6">
                        <label for="firstname">Prénom</label>
                        <!-- Value permet de garder en mémoire la saisie dans le champs-->
                        <input class="form-control" type="text" name="firstname" id="firstname" placeholder="Entrer votre prénom" value="<?= !empty($firstname) ? $firstname : '' ?>"/>
                        <!-- Affichage du message "champ obligatoire" ou "saisie invalide" selon le cas -->
                        <p class="text-warning font-weight-bold"><?= isset($formError['firstname']) ? $formError['firstname'] : ''; ?></p>
                    </div>
                    <!-- Nom de l'utilisateur -->
                    <div class="col-md-6">
                        <label for="lastname">Nom</label>
                        <!-- Value permet de garder en mémoire la saisie dans le champs-->
                        <input class="form-control" type="text" name="lastname" id="lastname" placeholder="Entrer votre nom"  value="<?= !empty($lastname) ? $lastname : '' ?>"/>
                        <!-- Affichage du message "champ obligatoire" ou "saisie invalide" selon le cas -->
                        <p class="text-warning font-weight-bold"><?= isset($formError['lastname']) ? $formError['lastname'] : ''; ?></p>
                    </div>
                </div>
                <!-- Nom de la société -->
                <div class="form-row">
                    <div class="col-md-6">
                        <label for="society">Société</label>
                        <!-- Value permet de garder en mémoire la saisie dans le champs -->
                        <input class="form-control" type="text" name="society" id="society" placeholder="Entrer le nom de la société" value="<?= !empty($society) ? $society : '' ?>"/>
                        <!-- Affichage du message "champ obligatoire" ou "saisie invalide" selon le cas -->
                        <p class="text-warning font-weight-bold"><?= isset($formError['society']) ? $formError['society'] : ''; ?></p>
                    </div>
                    <!-- Numéro de SIRET -->
                    <div class="col-md-6">
                        <label for="siret">SIRET</label>
                        <!-- Value permet de garder en mémoire la saisie dans le champs -->
                        <input class="form-control" type="text" name="siret" id="siret" placeholder="Entrer obligatoirement 14 chiffres"  value="<?= !empty($siret) ? $siret : '' ?>"/>
                        <!-- Affichage du message "champ obligatoire" ou "saisie invalide" selon le cas -->
                        <p class="text-warning font-weight-bold"><?= isset($formError['siret']) ? $formError['siret'] : ''; ?></p>
                    </div>
                </div>
                <!-- Téléphone de l'utilisateur -->
                <div class="form-row">
                    <div class="col-md-6">
                        <label for="phone">Téléphone</label>
                        <!-- Value permet de garder en mémoire la saisie dans le champs-->
                        <input class="form-control" type="tel" name="phone" id="phone" placeholder="Entrer un numéro téléphone"  value="<?= !empty($phone) ? $phone : '' ?>"/>
                        <!-- Affichage du message "champ obligatoire" ou "saisie invalide" selon le cas -->
                        <p class="text-warning font-weight-bold"><?= isset($formError['phone']) ? $formError['phone'] : ''; ?></p>
                    </div>
                    <div class="col-md-6">
                        <!-- Adresse Email de l'utilisateur et login-->
                        <label for="email">Email (login)</label>
                        <!-- Value permet de garder en mémoire la saisie dans le champs-->
                        <input class="form-control" type="email" name="email" id="email" placeholder="Entrer l'Email(login)"  value="<?= !empty($email) ? $email : '' ?>"/>
                        <!-- Affichage du message "champ obligatoire" ou "saisie invalide" selon le cas -->
                        <p class="text-warning font-weight-bold"><?= isset($formError['email']) ? $formError['email'] : ''; ?></p>
                        <!-- Affichage du message 'Ce login est déjà enregistré' si le login (email) exixte déjà dans la BDD, si non on affiche rien -->
                        <p class="text-warning font-weight-bold"><?= isset($formError['emailVerify']) && !isset($formError['email']) ? $formError['emailVerify'] : ''; ?></p>
                    </div>
                </div>
                <!-- On récupère le role du champion, du controlleur financier et du leader dans la liste déroulante -->
                <select class="role" name="role">
                    <option selected disabled>Veuillez selectionner un role</option>
                    <option value="<?= $user->idRoles = 3 ?>">Champion</option>
                    <option value="<?= $user->idRoles = 4 ?>">Controlleur financier</option>
                    <option value="<?= $user->idRoles = 5 ?>">Leader de projet</option>
                </select>
                <!-- Champ pour le Mot de passe de l'utilisateur -->
                <div class="form-row">
                    <div class="col-md-6">
                        <label for="password">Mot de passe:</label>
                        <input class="form-control" type="password" name="password" id="password" placeholder="Entrer un mot de passe" />
                        <!-- Affichage du message 'Veuillez entrer votre mot de passe.' -->
                        <p class="text-warning font-weight-bold"><?= isset($formError['password']) ? $formError['password'] : ''; ?></p>
                    </div>
                    <!-- Champ pour la Confirmation du mot de passe de l'utilisateur -->
                    <div class="col-md-6">
                        <label for="passwordConfirm">Confirmation Mot de passe:</label>
                        <input class="form-control" type="password" name="passwordConfirm" id="passwordConfirm" placeholder="Confirmer le mot de passe" />
                        <!-- Affichage du message 'Veuillez confirmer votre mot de passe.' -->
                        <p class="text-warning font-weight-bold"><?= isset($formError['passwordConfirm']) ? $formError['passwordConfirm'] : ''; ?></p>
                    </div>
                    <div class="alert alert-info mt-5" role="alert" >
                    Le mot de passe doit contenir : 8 caractères minimum, des majuscules, des minuscules, au moins 1 chiffre, au moins 1 caractère spécial
                    </div>
                    <!-- Bouton pour soumettre le formuaire d'enregistrement -->
                    <button class="mr-5 mb-3" type="submit" name="submit" class="mb-3">Enregistrer</button>
                    <!-- On affiche si l'enregistrement de l'utilisateur a réussi -->
                    <?php if ($formSuccess != '') { ?>
                        <p class="text-warning text-center text-uppercase font-weight-bold"><?= $formSuccess . ' !' ?></p>
                    <?php } ?>
                </div>
            </form>
    </div>
    <!-- On intègre la source fichier.js, CDN pour javascript, jQuery qui servent au bon fonctionnement du site -->
    <?php include '_foot.php' ?>
</body>
</html>

