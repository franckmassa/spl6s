<?php
// On démarre la session en début de code
session_start();
include 'controllers/followedAfterProjectCtrl.php';
// Dans le header on echo le $title
$title = 'Suivre Mesures';
// On intègre le header avec les liens et CDN qui servent au fonctionnement de bootstrap, feuille de style....
include '_header.php';
?>
<body>
    <!-- On intègre la Navbar et la bannière -->
    <?php include '_navbar.php'; ?>
    <h1 class="col-md-12 text-center text-dark text-uppercase mt-5 mb-3">Suivre les mesures cles et les gains post projet pendant 6 mois</h1>
    <div class="container">
        <h2 class="mb-3">Projet</h2>
        <!--  -->   
        <form action="#" method="POST">
            <div class="form-group">
                <label for="closureProject">Selectionner un projet clos</label>
                <!-- Selection du projet clos -->
                <select class="form-control" id="closureProject">
                    <option id="closureProject" name="closureProject" selected disabled>Choisir un projet</option>
                </select>
            </div>                   
            <!-- Affichage du service ou l'oportunité existe -->
            <label for="description">Service où l'oportunité existe</label>
            <input type="text" class="form-control" placeholder="Service concerné" id="description" />                                           
            <!-- Champs pour la description du projet valide -->
            <div class="form-group">
                <label for="Description">Description du projet:</label>
                <textarea class="form-control" id="Description" name="Description" rows="6"></textarea>
            </div>                 
            <!--- Tableau des mesures clés à renseigner -->
            <h2 class="text-center mt-5 mb-3">Mesures clés mensuelles à renseigner par le Contrôleur financier</h2>
            <table class="form-group text-center">
                <thead>
                    <tr class="month">
                        <th>Mesures</th>  
                        <th>Mois 1</th>
                        <th>Mois 2</th> 
                        <th>Mois 3</th> 
                        <th>Mois 4</th> 
                        <th>Mois 5</th> 
                        <th>Mois 6</th>
                        <th>Unité</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <!-- Champ à remplir pour la première mesure clé -->
                        <td><input class="form-control" type="text" name="designation1" placeholder="Désignation1"/></td>
                        <td><input class="form-control" type="text" name="measureKey1" placeholder="0"/></td>
                        <td><input class="form-control" type="text" name="measureKey2" placeholder="0"/></td>
                        <td><input class="form-control" type="text" name="measureKey3" placeholder="0"/></td>
                        <td><input class="form-control" type="text" name="measureKey4" placeholder="0"/></td>
                        <td><input class="form-control" type="text" name="measureKey5" placeholder="0"/></td>
                        <td><input class="form-control" type="text" name="measureKey6" placeholder="0"/></td> 
                        <td><input class="form-control" type="text" name="unit1" placeholder="Ex : Nb"/></td>              
                    </tr>
                    <tr>
                        <!-- Champ à remplir pour la deuxième mesure clé -->
                        <td><input class="form-control" type="text" name="designation2" placeholder="Désignation2"/></td>
                        <td><input class="form-control" type="text" name="followMonth1" placeholder="0"/></td>
                        <td><input class="form-control" type="text" name="followMonth2" placeholder="0"></td>
                        <td><input class="form-control" type="text" name="followMonth3" placeholder="0"/></td>
                        <td><input class="form-control" type="text" name="followMonth4" placeholder="0"/></td>
                        <td><input class="form-control" type="text" name="followMonth5" placeholder="0"/></td>
                        <td><input class="form-control" type="text" name="followMonth6" placeholder="0"/></td>                 
                        <td><input class="form-control" type="text" name="unit2" placeholder="..."/></td> 
                    </tr>
                    <tr>
                        <!-- Champ à remplir pour la troisème mesure clé -->
                        <td><input class="form-control" type="text" name="designation3" placeholder="Désignation3"/></td>
                        <td><input class="form-control" type="text" name="followMonth1" placeholder="0"/></td>
                        <td><input class="form-control" type="text" name="followMonth2" placeholder="0"/></td>
                        <td><input class="form-control" type="text" name="followMonth3" placeholder="0"/></td>
                        <td><input class="form-control" type="text" name="followMonth4" placeholder="0"/></td>
                        <td><input class="form-control" type="text" name="followMonth5" placeholder="0"/></td>
                        <td><input class="form-control" type="text" name="followMonth6" placeholder="0"/></td>                 
                        <td><input class="form-control" type="text" name="unit3" placeholder="..."/></td> 
                    </tr>
                    <tr>
                        <!-- Champ à remplir pour la quatrième  mesure clé -->
                        <td><input class="form-control" type="text" name="designation4" placeholder="Désignation4"/></td>
                        <td><input class="form-control" type="text" name="followMonth1" placeholder="0"/></td>
                        <td><input class="form-control" type="text" name="followMonth2" placeholder="0"/></td>
                        <td><input class="form-control" type="text" name="followMonth3" placeholder="0"/></td>
                        <td><input class="form-control" type="text" name="followMonth4" placeholder="0"/></td>
                        <td><input class="form-control" type="text" name="followMonth5" placeholder="0"/></td>
                        <td><input class="form-control" type="text" name="followMonth6" placeholder="0"/></td>                
                        <td><input class="form-control" type="text" name="unit4" placeholder="..."/></td> 
                    </tr>
                </tbody>
            </table>
            <!-- Bouton d'enregistrement des mesures clés -->
            <button type="submit" name="submit" class="mb-5 mt-3 ">Enregistrer </button>
        </form>
        <form action="" method="POST">
            <!--- Tableau des économies à renseigner par le contrôleur financier -->
            <h2 class="text-center mt-5 mb-3">Economies mensuelles réalisées à renseigner par le Contrôleur financier(€)</h2>
            <table class="form-group text-center">
                <thead>
                    <tr class="month">
                        <th>Mois 1</th>
                        <th>Mois 2</th> 
                        <th>Mois 3</th> 
                        <th>Mois 4</th> 
                        <th>Mois 5</th> 
                        <th>Mois 6</th>
                        <th>Cible annuelle</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <!-- Champ à remplir avec les économies réalisées mensuellement -->
                        <td><input class="form-control" type="text" name="followSaving1" placeholder="0"/></td>
                        <td><input class="form-control" type="text" name="followSaving2" placeholder="0"/></td>
                        <td><input class="form-control" type="text" name="followSaving3" placeholder="0"/></td>
                        <td><input class="form-control" type="text" name="followSaving4" placeholder="0"/></td>
                        <td><input class="form-control" type="text" name="followSaving5" placeholder="0"/></td>
                        <td><input class="form-control" type="text" name="followSaving6" placeholder="0"/></td> 
                        <td><input class="form-control" type="text" name="goal" placeholder="Ex : 50000" /></td>              
                    </tr>
                </tbody>
            </table>
            <!-- Bouton d'enregistrement des économies réalisées mensuellement -->
            <button type="submit" name="submit" class="mb-5 mt-3 ">Enregistrer </button>
        </form>
    </div>
    <!-- On intègre la source fichier.js, CDN pour javascript, jQuery qui servent au bon fonctionnement du site -->
    <?php include '_foot.php' ?>
</body>
</html>
