<?php
// On démarre la session en début de code
session_start();
include 'controllers/projectDetailCtrl.php';
// Dans le header on echo le $title
$title = 'Détail du projet';
// On intègre le header avec les liens et CDN qui servent au fonctionnement de bootstrap, feuille de style....
include '_header.php';
?>
<body>
    <!-- On intègre la Navbar et la bannière -->
    <?php include '_navbar.php'; ?>
    <div class="container managment mt-5 text-white">
        <div class="row">
            <H1 class="col-md-12 text-center mt-3">Mise à jour du projet</H1>
        </div>
        <div class="row">
        </div>
        <!-- Champs de formulaire pour les modifications de la mise à jour du projet -->
        <div  class="offset-2 col-md-8">
            <form action="#" method="POST">
                <div class="form-group">
                    <label for="nameProject">Nom du projet</label>
                    <!-- On garde le nom en mémoire dans le champ -->
                    <input type="text" class="form-control" name="nameProject" id="nameProject" placeholder="Nom de projet" value="<?= $projectDetail->nameProject ?>"/>
                    <!-- On affiche le message s'il y a un message dans le tableau des errreurs pour le nom -->
                    <?php if (isset($formError['nameProject'])) { ?>
                        <p class="text-danger"><?= isset($formError['nameProject']) ? $formError['nameProject'] : '' ?></p>
                    <?php } ?>
                    <label for="department">Service</label>
                    <input type="text" class="form-control" name="department" id="department" placeholder="Nom du service ou l'opportunité existe" value="<?= $projectDetail->department ?>"/>
                    <?php if (isset($formError['department'])) { ?>
                        <p class="text-danger"><?= isset($formError['department']) ? $formError['department'] : '' ?></p>
                    <?php } ?>

                    <label for="description">Description</label>
                    <!-- Pour garder la valeur dans le textarea, ne pas mettrre value mais mettre l'echo entre les balises -->
                     <textarea class="form-control" name="description" id="description" placeholder="Description du projet détaillé" ><?= $projectDetail->description ?></textarea>
                    <?php if (isset($formError['description'])) { ?>
                             <p class="text-danger"><?= isset($formError['description']) ? $formError['description'] : '' ?></p>
                    <?php } ?>
                     <button class="mt-3" type="submit" name="submit" id="submit" value="">Validation</button>
                 </div> 
             </form>
             <p class="text-danger"><?= isset($formError['submit']) ? $formError['submit'] : '' ?></p>
                    <!-- On affiche le texte si le détail du projet a été modifié -->
                    <?php if ($formSuccess != '') { ?>
                        <p class="text-warning text-center text-uppercase font-weight-bold"><?= $formSuccess . ' !' ?></p>
                    <?php } ?>
                </div>
        </div>
        <!-- On intègre la source fichier.js, CDN pour javascript, jQuery qui servent au bon fonctionnement du site -->
        <?php include '_foot.php'; ?>
</body>
</html>