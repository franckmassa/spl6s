<?php
// On démarre la session en début de code
session_start();
include 'controllers/validatePhasesCtrl.php';
// Dans le header on echo le $title
$title = 'Valider Phases';
// On intègre le header avec les liens et CDN qui servent au fonctionnement de bootstrap, feuille de style....
include '_header.php';
?>
<body>
    <!-- On intègre la Navbar et la bannière -->
    <?php include '_navbar.php'; ?>
    <div class="container">
        <!-- Titre principal et sous titre -->
        <h1 class="col-md-12 text-center text-dark text-uppercase mt-5 mb-3">valider les  phases de projet</h1>  
        <h2>Projet</h2>
        <!--  -->   
        <form action="#" method="POST">
            <div class="form-group">
                <label for="validProject">Selectionner un projet valide</label>
                <!-- Selection du projet valide -->
                <select class="form-control" id="validProject">
                    <option id="validProject" name="validProject" selected disabled>Choisir un projet</option>
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
            <!-- Formulaire de validation des phases de projet par le Leader du projet -->
            <div class="planning">
                <h2 class=" mt-5 mb-3 text-uppercase">Phases du projet</h2>
                <div class="form-group ">
                    <div>
                        <!-- Validation de la phase "définition" du projet, par le décideur -->
                        <input type="checkbox" name="definition"/>                          
                        <label for="validationDateDefinition"> 1. "Définition", cocher la case et sélectionner une date pour valider la phase.</label>
                        <input class="form-control mb-5" type="date" name="validationDateDefinition" id="validationDateDefinition" />       
                    </div>
                    <div>
                        <!-- Validation de la phase des mesures qui ont servi pour l'analyse, par le décideur -->
                        <input type="checkbox" name="mesure"/>  
                        <label for="validationDateMeasures"> 2. "Mesure", cocher la case et sélectionner une date pour valider la phase.</label>
                        <input class="form-control mb-5" type="date" name="validationDateMeasures" id="validationDateMeasures" />
                    </div>
                    <div>
                        <!-- Validation de la phase de l'analyse des mesures, par le décideur -->
                        <input type="checkbox" name="analisys"/>
                        <label for="validationDateAnalisys"> 3. "Analyse", cocher la case et sélectionner une date pour valider la phase.</label>
                        <input class="form-control mb-5" type="date" name="validationDateAnalisys" id="validationDateAnalisys" />                            
                    </div>
                    <div>
                        <!-- Validation de la phase des améliorations du processus, par le décideur -->
                        <input type="checkbox" name="improvment"/>
                        <label for="validationDateImprovment"> 4. "Amélioration", cocher la case et sélectionner une date pour valider la phase.</label>
                        <input class="form-control mb-5" type="date" name="validationDateImprovment" id="validationDateImprovment" />                          
                    </div>
                    <div>
                        <!-- Validation de la phase contrôle du projet, par le décideur -->
                        <input type="checkbox" name="control"/>
                        <label for="validationDateControl"> 5. "Contrôle", cocher la case et sélectionner une date pour valider la phase.</label>
                        <input class="form-control mb-5" type="date" name="validationDateControl" id="validationDateControl" />                            
                    </div>
                    <div>
                        <!-- Validation de la phase validation de fin de projet -->
                        <input type="checkbox" name="closureProject"/> 
                        <label for="validationDateClosure"> 6. "Clôture", cocher la case et sélectionner une date pour valider la phase.</label>
                        <input class="form-control mb-5" type="date" name="validationDateClosure" id="validationDateClosure" />     
                    </div>
                </div>
                <div>
                    <!-- bouton pour enregistrer la validation des phases du projet -->
                    <button class="mb-3" type="submit" value="submit">Enregistrer</button>
                </div>
            </div>
            <!-- On intègre la source fichier.js, CDN pour javascript, jQuery qui servent au bon fonctionnement du site -->
            <?php include '_foot.php' ?>
        </form>
    </div>
</body>
</html>

