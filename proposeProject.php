<?php
// On démarre la session en début de code
session_start();
include 'controllers/proposeProjectCtrl.php';
// Dans le header on echo le $title
$title = 'Proposer Projet';
// On intègre le header avec les liens et CDN qui servent au fonctionnement de bootstrap, feuille de style....
include '_header.php';
?>
<body>    
    <!-- On intègre la Navbar et la bannière -->
    <?php include '_navbar.php'; ?>  
    <!-- Container incluant le formulaire pour les propositions de projets -->
    <div class="container">
        <!-- Titre de la page "Proposer un projet -->
        <h1 class="col-md-12  text-center text-dark text-uppercase mt-5 mb-3">Proposer un nouveau projet</h1>
        <!-- formulaire redirigé sur cette page qui va servir de base au projet -->
        <form class="mt-1" action="proposeProject.php" method="post">
            <div class="form-row">
                <div class="col-md-6 mt-3">
                    <!-- Champ pour le nom du projet -->
                    <label for="nameProject">Nom du projet</label>
                    <input class="form-control" type="text" name="nameProject" id="nameProject" placeholder="Entrez le nom du projet" value="<?= !empty($nameProject) ? $nameProject : ''?>"/>
                    <!-- Affichage du message "champ obligatoire" ou "saisie invalide" selon le cas -->
                    <p class="text-warning font-weight-bold"><?= isset($formError['nameProject']) ? $formError['nameProject'] : ''; ?></p>
                </div>
                <div class="col-md-6 mt-3">
                    <!-- Champ pour le service où existe l'opportunité -->
                    <label for="department">Service</label>
                    <input class="form-control" type="text" name="department" id="department" placeholder="Service où l'opportunité existe" value="<?= !empty($department) ? $department : ''?>"/>
                    <!-- Affichage du message "champ obligatoire" ou "saisie invalide" selon le cas -->
                    <p class="text-warning font-weight-bold"><?= isset($formError['department']) ? $formError['department'] : ''; ?></p>
                </div>
            </div>
            <div class="form-row">
                <div class="col-md-12 mt-3">
                    <!-- Champ pour la description du projet -->
                    <label for="description">Description du projet</label>
                    <textarea class="form-control" rows="5" cols="100" name="description" id="description" placeholder="Détaillez le projet ou l'oportunité existe (site, processus, amélioration...)"><?= !empty($description) ? $description : ''?></textarea>
                    <!-- Affichage du message "champ obligatoire" ou "saisie invalide" selon le cas -->
                    <p class="text-warning font-weight-bold"><?= isset($formError['description']) ? $formError['description'] : ''; ?></p>
                </div>
            </div>           
            <div class="form-row">
                <!-- Récupération dans la liste déroulante des noms et prénoms des utilisateurs champions  pour un même super utilisateur -->
                <label for="champion">Champion </label>
                <select class="form-control" name="champion" id="champion">
                    <option selected disabled >Selectionner un champion</option>
                    <?php
                    foreach ($championsList as $usersProjectList) {
                        ?>
                        <option value="<?= $usersProjectList->id ?>">
                            <?= $usersProjectList->lastname ?>
                            <?= $usersProjectList->firstname ?>
                        </option>
                    <?php }
                    ?>    
                </select>
                <p class="text-warning font weight-bold"><?= isset($formError['champion']) ? $formError['champion'] : '' ?></p>
            </div>
            <div class="form-row">
                <!-- Récupération dans la liste déroulante des noms et prénoms des utilisateurs controlleurs financiers  pour un même super utilisateur --> 
                <label for="controller">Contrôleur financier </label>
                <select class="form-control" name="controller" id="controller">
                    <option selected disabled>Selectionner un contrôleur financier</option>
                    <?php
                    foreach ($controllersList as $usersProjectList) {
                        ?>
                        <option value="<?= $usersProjectList->id ?>"> 
                            <?= $usersProjectList->lastname ?>
                            <?= $usersProjectList->firstname ?>
                        </option>
                    <?php }
                    ?>
                </select>
                <p class ="text-warning font weight-bold"><?= isset($formError['controller']) ? $formError['controller'] : '' ?></p>
            </div>
            <!-- Bouton pour l'enregistrement dans la base de données -->
            <button type="submit" name="submit" class="mb-5 mt-3 ">Enregistrer </button>
            <!-- Si l'enregistrement du projet a réussi, on affiche le message -->
            <?php if ($formSuccess != '') { ?>
                <p class="text-warning text-center text-uppercase font-weight-bold"><?= $formSuccess . ' !' ?></p>
            <?php } ?>
        </form> 
        <!-- On intègre la source fichier.js, CDN pour javascript, jQuery qui servent au bon fonctionnement du site -->
        <?php include '_foot.php' ?>
    </div>  
</body>
</html>
