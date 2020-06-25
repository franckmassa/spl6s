<?php
// On démarre la session en début de code
session_start();
include 'controllers/projectListCtrl.php';
// Dans le header on echo le $title
$title = 'Liste des projets';
// On intègre le header avec les liens et CDN qui servent au fonctionnement de bootstrap, feuille de style....
include '_header.php';
?>
<body>
    <!-- On intègre la Navbar et la bannière -->
    <?php include '_navbar.php'; ?>
    <div class="container managment mt-5 text-white">
        <div class="row">
            <H1 class="col-md-12 text-center text-white mt-3">Liste des projets</H1>
        </div>
        <div class="row justify-content-center mb-3">
            <!-- Zone de recherche du projet -->
            <form action="#" method="POST">
                <div class="form-group">
                    <!--<label for="departmentAsked">Recherche d'un projet : </label>-->
                    <input type="text" id="departmentAsked" name="departmentAsked" value="" />
                    <button type="submit">Rechercher</button>
                    <!-- Si $error existe, on affiche le message d'erreur 'Recherche invalide' -->
                    <?php
                    if (isset($error)) {
                        ?>
                        <p class="text-warning text-uppercase font-weight-bold"><?= $error ?></p>
                    <?php }
                    ?>                   
                </div>
            </form>
        </div>
        <?php
        if (isset($error)) {            
        } else {
            ?>         
            <!-- Si il existe une erreur lors de la recherche, on affiche de nouveau la liste des projets avec possibilité de supprimer le projet. -->
            <div class="row">
                <table class="col-md-12">
                    <thead class="text-center bg-info">
                        <tr>
                            <th>Identifiant</th>
                            <th>Nom du projet</th>
                            <th>Détail</th>
                            <th>Supprimer un projet</th>
                        </tr>
                    </thead>
                    <tbody class="text-center">
                        <?php
                        //Foreach pour récupérer la liste des projets 
                        foreach ($listProject as $listProjectDetail) {
                            ?>
                            <tr>
                                <td><?= $listProjectDetail->id ?></td>
                                <td><?= $listProjectDetail->nameProject ?></td>
                                <!-- On ajoute un lien qui redirige vers la page projectDetail.php
                                     On rajoute le paramètre id dans l'url et on echo la valeur nominative de l'id 
                                après ? le mot id doit être  dans le get du controleur projectDetailCtrl.php -->
                                <td><a href="projectDetail.php?id=<?= $listProjectDetail->id ?>">Detail</a></td> 
                                <td>
                                    <!-- Button trigger modal -->
                                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modal<?= $listProjectDetail->id ?>">
                                        X
                                    </button>
                                </td>
                            </tr>
                            <!-- Modal pour le choix de supprimer un utilisateur ou annuler une suppression d'un utilisateur -->
        <div class="modal fade text-dark" id="modal<?= $listProjectDetail->id ?>">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Bonjour!</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        Êtes-vous sûr de vouloir supprimer ce projet?
                    </div>
                    <div class="modal-footer">
                        <form method="POST" action="?idRemove=<?= $listProjectDetail->id ?>">
                            <input type="submit" value="Supprimer" name="submit" class="btn btn-danger" />
                        </form>
                        <input type="submit" value="Annuler" data-dismiss="modal" />
                    </div>
                </div>
            </div>
        </div>
                        <?php } ?>
                    </tbody>
                </table>
            <?php } ?>
        </div>
        
    </div>
    <!-- On intègre la source fichier.js, CDN pour javascript, jQuery qui servent au bon fonctionnement du site -->
    <?php include '_foot.php'; ?>
</body>
</html>
