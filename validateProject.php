<?php
// On démarre la session en début de code
session_start();
include 'controllers/validateProjectCtrl.php';
// Dans le header on echo le $title
$title = 'Valider Projet';
// On intègre le header avec les liens et CDN qui servent au fonctionnement de bootstrap, feuille de style....
include '_header.php';
?>
<body>
    <!-- On intègre la Navbar et la bannière -->
    <?php include '_navbar.php'; ?>  
    <div class="container">
        <!-- Titre principal et sous titre -->
        <h1 class="col-md-12 text-center text-dark text-uppercase mt-5 mb-3">Valider un projet</h1>  
        <h2>Projet</h2>
        <!-- Formulaire pour la validation des projets -->   
        <form action="#" method="POST">
            <div class="form-group">
                <label for="selecProject">Selectionner une proposition de projet</label>
                <!-- Selection du projet à valider -->
                <select class="form-control sel"  id="selecProject">
                    <option   id="proposeProject" name="proposeProject" selected disabled>Choisir un projet</option>

                    <!-- Récuprération de la liste des projets dans la liste déroulante de la vue "validateproject" -->
                    <?php
                    foreach($listProjectObject2 as $listName){ ?>
                        <option value="<?= $listName->id ?>"><?= $listName->nameProject ?></option>
                    <?php } ?>
                </select>
            </div>
            
            <div class="form-group">
                <!-- Affichage du service ou l'oportunité existe -->
                <label for="department">Service où l'oportunité existe</label>
                <p class="form-control" id="department"></p>                          
            </div>
            <!-- Champ pour la description du projet à valider -->
            <div class="form-group">
                <label for="description">Description du projet:</label>
                <p class="form-control scrollerDescription" id="description" name="description" rows="6"></p>
            </div>
            <!-- Formulaire de validation pour le décideur nommé Champion -->
            <div class="form-group">
                <label for="champion">Champion:</label>
                <p class="form-control" id="champion" name="champion" ></p>
            </di>
            <!-- Calendrier pour enregistrer la date de validation du projet -->
            <label for="date">Choisir la date de validation du projet:</label>
            <input type="date" class="form-control" id="date" name="date" value="<?= !empty($date) ? $date : ""  ?>"/>
            <!-- bouton pour enregistrer le projet dans la base de données -->
            <label for="validationProject">Valider la proposition de projet</label>
            <button class="mt-3 mb-3" id="validationProject" type="submit" value="submit">Valider</button>
        </form>

        <div id="test"></div>
        
    <!-- On intègre la source fichier.js, CDN pour javascript, jQuery qui servent au bon fonctionnement du site -->
    <?php include '_foot.php' ?>
</body>
</html>
