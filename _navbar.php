<!-- Navbar et bannière --> 
<div class="container-fluid">     
    <div class="row banner">
        <!-- Logo du site -->
        <div class="col-md-2">
            <img class="logo" src="assets/img/logoFondBleu.png" alt="logo site" width="190" />
        </div>
        <!-- Message de bienvenue -->
        <div class=" col-md-2 text-center">
            <p class="welcome">Bienvenue 
                <?php
                // Si un utilisateur est connecté, on affiche son prénom.
                if (isset($_SESSION['isConnect'])) {
                    echo $_SESSION['firstname'] . ' !';
                }
                ?>
            </p>
        </div>
        
        <!-- Titre principal SPL06-->
        <div class="col-md-4">
            <p class="spl6s text-center text-uppercase">spl6s</p>
        </div>
        <div class="btnPassword col-md-4">
            <a href="accountUser.php"><button type="submit" name="submit"> Editer le mot de passe</button></a>
        </div>
    </div>
</div>
<!-- On vérifie si la session est ouverte -->
<?php if (isset($_SESSION['isConnect'])) { ?>   
    <nav class="navbar navbar-expand-md">
        <ul class="navbar-nav">
            <li class="col-md-3 nav-item">
                <!-- On affiche le nom du rôle dans la navbar -->
                <p class="nav-link text-uppercase font-weight-bold mr-5"><?php echo $_SESSION['name']; ?></p>
            </li>
            <!-- Si la session est ouverte avec le role 5 (leader de projet), on autorise les vues suivantes --> 
            <?php if ($_SESSION['idRoles'] == 5) { ?>  

                <li class="col-md-2 nav-item">
                    <a class="nav-link mr-5" href="proposeProject.php">Proposer</a>
                </li>
                <li class="col-md-3 nav-item">
                    <a class="nav-link mr-5" href="validatePhases.php">Valider les phases</a>
                </li>
                <li class="col-md-3 nav-item">
                    <a class="nav-link mr-5" href=projectList.php>Liste des projets</a>
                </li>
                <!-- Si la session est ouverte avec le role 4 (contrôleur financier), on autorise les vues suivantes --> 
            <?php } else if ($_SESSION['idRoles'] == 4) { ?>

                <li class="col-md-6 nav-item">
                    <a class="nav-link mr-5" href="followedAfterProject.php">Mesures clés et gains</a>
                </li>
                <!-- Si la session est ouverte avec le role 3 (champion), on autorise les vues suivantes --> 
            <?php } else if ($_SESSION['idRoles'] == 3) { ?>
                <li class="col-md-4 nav-item">
                    <a class="nav-link mr-5" href="validateProject.php">Valider le projet</a>
                </li>
                <li class="col-md-4 nav-item">
                    <a class="nav-link mr-5" href="etablishCharter.php">Etablir la charte</a>
                </li>
                <!-- Si la session est ouverte avec le role 2 (super utilisateur), on autorise les vues suivantes --> 
            <?php } else if ($_SESSION['idRoles'] == 2) { ?>   
                <li class="col-md-5 nav-item">
                    <a class="nav-link mr-5" href="registrationUserRole.php">Enregistrer un utilisateur</a>
                </li>
                <li class="col-md-4 nav-item">
                    <a class="nav-link mr-5" href="userList.php">Liste des utilisateurs </a>
                </li>
            <?php } ?>
            <!-- Lien pour la Déconnexion -->
            <li class="col-md-2 nav-item">               
                <a class="nav-link ml-2" href="disconnect.php?disconnected=1">Déconnexion <i class="fas fa-sign-out-alt"></i></a> 
            </li>
        </ul>       
    </nav>
<?php }
?>
