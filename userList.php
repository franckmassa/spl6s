<?php
// On démarre la session en début de code
session_start();
include 'controllers/userListCtrl.php';
// Dans le header on echo le $title
$title = 'Liste des utilsateurs';
// On intègre le header avec les liens et CDN qui servent au fonctionnement de bootstrap, feuille de style....
include '_header.php';
?>
<body>
    <!-- On intègre la Navbar et la bannière -->
    <?php include '_navbar.php'; ?>
    <div class="container">
        <div class="row mt-5">
            <h1 class="col-md-12 text-center">Rôle des utilisateurs</h1>
        </div>
        <div class="row">   
                <p class="col-md-12 text-center">3 = Champion | 4 = Contrôleur financier  | 5 = Leader de projet</p>      
            </p>
        </div>
    </div>
    <div class="container managment mt-5 text-white">
        <div class="row">
            <H1 class="col-md-12 text-center text-white mt-3">Liste des utilisateurs</H1>
        </div>
        <div class="row justify-content-center">

            <!-- Zone de recherche de l'utilisateur -->
            <form action="#" method="POST">
                <div class="form-group">
                    <!--<label for="nameAsked">Rechercher un utilisateur : </label>-->
                    <input type="text" id="nameAsked" name="nameAsked" value="" />
                    <?php
                    if (isset($error)) {
                        ?>
                        <p class="text-warning text-uppercase font-weight-bold"><?= $error ?></p>
                    <?php }
                    ?>
                    <button type="submit">Rechercher</button>
                </div>
            </form>
        </div>
        <!-- Si $error existe, on affiche le message d'erreur 'Recherche invalide'
        <?php
        if (isset($error)) {
            
        } else {
            ?>     
            <!-- Tableau afficher pour la liste des utilisateurs avec possibilité de supprimer 
                 l'utilisateur et vers le profil -->
            <div class="row">
                <table class="col-md-12 mb-3">
                    <thead class="text-center bg-info">
                        <tr>
                            <th>Rôle</th>
                            <th>Prénom</th>
                            <th>Nom</th>
                            <th>Profil</th>
                            <th>Supprimer un utilisateur</th>
                        </tr>
                    </thead>
                    <tbody class="text-center">
                        <?php
                        //Foreach pour récupérer la liste des utilisateurs 
                        foreach ($listUsers as $usersListDetail) {
                            ?>
                            <tr>
                                <td><?= $usersListDetail->idRoles ?></td>
                                <td><?= $usersListDetail->firstname ?></td>
                                <td><?= $usersListDetail->lastname ?></td>
                                <!-- On ajoute un lien qui redirige vers la page userProfil.php
                                     On rajoute le paramètre id dans l'url et on echo la valeur nominative de l'id 
                                après ? le mot id doit être  dans le get du controleur userProfilCtl.php -->
                                <td><a href="userProfil.php?id=<?= $usersListDetail->id ?>">Profil</a></td>                               
                                <td>
                                    <!-- Button trigger modal -->
                                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modal<?= $usersListDetail->id ?>">
                                        X
                                    </button>
                                </td>
                            </tr>
                             <!-- Modal pour le choix de supprimer un utilisateur ou annuler une suppression d'un utilisateur -->
        <div class="modal fade" id="modal<?= $usersListDetail->id ?>">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Bonjour!</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        Êtes-vous sûr de vouloir supprimer cet utilisateur?
                    </div>
                    <div class="modal-footer">
                        <form method="POST" action="?idRemove=<?= $usersListDetail->id ?>">
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