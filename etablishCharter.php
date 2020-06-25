<?php
// On démarre la session en début de code
session_start();
include 'controllers/etablishCharterCtrl.php';
// Dans le header on echo le $title
$title = 'Etablir Charte';
// On intègre le header avec les liens et CDN qui servent au fonctionnement de bootstrap, feuille de style....
include '_header.php';
?>
<body>
    <!-- On intègre la Navbar et la bannière -->
    <?php include '_navbar.php'; ?>
    <div class="container">
        <h1 class="col-md-12 text-center text-dark text-uppercase mt-5 mb-3">Etablir une nouvelle charte de projet</h1>
        <!-- Formulaire pour récupérer les informations des projets en sélectionnant un projet 
        dans la liste déroulante et afficher le descriptif-->
        <h2 class="text-uppercase mt-5 mb-3">Projet</h2>
        <form action="" method="POST">
            <div class="form-group">
                <label for="proposeProject">Choisir un projet valide</label>
                <!-- selection du projet -->
                <select class="form-control">                 
                    <option id="proposeProject"  name="proposeProject" selected disabled>Choisir un projet</option>
                </select>
            </div>
            <div class="form-group">
                <!-- Affichage du service ou l'oportunité existe -->
                <label for="description">Service où l'oportunité existe</label>
                <input type="text" class="form-control" placeholder="Service concerné" id="description" />                          
            </div>
            <div class="form-group">
                <!-- Affichage du descriptif du projet automatiquement -->
                <label for="Description">Description du projet:</label>
                <textarea class="form-control" id="Description" name="Description" rows="6"></textarea>
            </div>
            <!-- Principaux acteurs du pojet -->
            <div class="form-row">
                <div class="col">
                    <!-- Identification du décideur -->
                    <label for="champion">Champion</label>
                    <input type="text" class="form-control" placeholder="Nom" id="champion" />
                </div>
                <div class="col">
                    <!-- Identification du contôleur financier -->
                    <label for="financialController">Contrôleur financier</label>
                    <input type="text" class="form-control" placeholder="Nom" id="financialController" /> 
                </div>
            </div>
            <div class="form-row">
                <div class="col mt-3">
                    <!-- Identification du responsable du processus du projet-->
                    <label for="processOwner">Responsable du processus</label>
                    <input type="text" class="form-control" placeholder="Nom" id="processOwner" />
                </div>
            </div>
            <div class="form-row">
                <div class="col mt-3 font-weight-bold">
                    <!-- Identification du Leader du projet-->
                    <label for="leaderProject">Leader du projet</label>
                    <input type="text" class="form-control" placeholder="Nom" id="leaderProject" />
                </div>
                <div class="col mt-3 font-weight-bold">
                    <!-- Selection du niveau de belt -->
                    <label for="levelBelt">Niveau de Belt</label>
                    <select class="select form-control selected disabled">
                        <option selected disabled>Choisir un niveau</option>
                        <option>Master Black Belt</option>
                        <option>Black Belt</option>
                        <option>Green Belt</option>
                    </select>
                </div>
            </div>
            <div class="form-row">
                <div class="col mt-3">
                    <!-- Date de l'enregistrement de la charte du projet -->
                    <label for="charterDateProject">Date d'enregistrement de la charte du projet :</label>
                    <input type="date" class="form-control" name="charterDateProject" id="charterDateProject" />
                </div>
            </div>

        </form>       
        <!-- Charte du projet -->
        <h2 class="col-md-12 mt-5 text-uppercase">Charte du projet</h2>     
        <!-- Boutons qui servent à naviguer entre les fenêtres "Equipe, Objectifs, Résultats attendus, Planning du projet" -->
        <div class="col-md-12">
            <button type="button" id="clickTeam">Equipe</button>
            <button type="button" id="clickGoal">Objectif</button>
            <button type="button" id="clickFinanceResult">Résultat attendu</button>
            <button type="button" id="clickSchedule">Planning du projet</button>
        </div>
        <form>
            <!-- Fenêtre "équipe" de la charte du projet -->
            <div class="teamWindow">
                <h2 class="text-center text-uppercase">Equipe</h2>
                <div class="row">
                    <div class="form-group col-md-12 mt-3">
                        <!-- Champ pour le processus concerné -->
                        <label for="process">Processus concerné</label>
                        <textarea class="form-control" name="process" id="process" placeholder="Description du processus" ></textarea>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-12 mt-3">
                        <!-- Champ pour les membres de l'équipe -->
                        <label for="teamMembers">Membres de l'équipe</label>
                        <textarea class="form-control" name="teamMembers" id="teamMembers" placeholder="Notez les noms de tous les membres de l'équipe" ></textarea>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-12 mt-3">
                        <!-- Champ pour les ressources nécessaires -->
                        <label for="resources">Ressources nécessaires</label>
                        <textarea class="form-control" name="resources" id="resources" placeholder="Notez si besoin les ressources nécessaires" ></textarea>
                    </div>
                </div>
            </div>
        </form>
        <!-- Fenêtre "objectif" de la charte du projet -->
        <div class="goalWindow">
            <h2 class="text-center text-uppercase">Objectif</h2>
            <form action=" " method="POST">
                <!--- Tableau des mesures clés à renseigner -->
                <h2 class="text-center mt-5 mb-3">Mesures clés</h2>
                <table class="form-group text-center">
                    <tr>
                        <td>Mesures clés</td>
                        <td>Base</td>
                        <td>Cible</td>
                        <td>Ideal</td>
                        <td>Unité</td>    
                    </tr>
                    <tr>
                        <!-- Champ à remplir pour la première mesure clé -->
                        <td><input class="form-control" type="text" name="designation1" placeholder="Ex: Nombre de documents"/></td>
                        <td><input class="form-control" type="text" name="base1" placeholder="1000"/></td>
                        <td><input class="form-control" type="text" name="goal1" placeholder="500"/></td>
                        <td><input class="form-control" type="text" name="ideal1" placeholder="0"/></td>
                        <td><input class="form-control" type="text" name="unit1" placeholder="Nb"/></td>               
                    </tr>
                    <tr>
                        <!-- Champ à remplir pour la deuxième mesure clé -->
                        <td><input class="form-control" type="text" name="designation2" placeholder="designation2"/></td>
                        <td><input class="form-control" type="text" name="base2" placeholder="base2"></td>
                        <td><input class="form-control" type="text" name="goal2" placeholder="goal2"/></td>
                        <td><input class="form-control" type="text" name="ideal2" placeholder="ideal2"/></td>
                        <td><input class="form-control" type="text" name="unit2" placeholder="unit2"/></td>
                    </tr>
                    <tr>
                        <!-- Champ à remplir pour la troisème mesure clé -->
                        <td><input class="form-control" type="text" name="designation3" placeholder="designation3"/></td>
                        <td><input class="form-control" type="text" name="base3" placeholder="base3"/></td>
                        <td><input class="form-control" type="text" name="goal3" placeholder="goal3"/></td>
                        <td><input class="form-control" type="text" name="ideal3" placeholder="ideal3"/></td>
                        <td><input class="form-control" type="text" name="unit3" placeholder="unit3"/></td>
                    </tr>
                    <tr>
                        <!-- Champ à remplir pour la quatrième  mesure clé -->
                        <td><input class="form-control" type="text" name="designation4" placeholder="designation4"/></td>
                        <td><input class="form-control" type="text" name="base4" placeholder="base4"/></td>
                        <td><input class="form-control" type="text" name="goal4" placeholder="goal4"/></td>
                        <td><input class="form-control" type="text" name="ideal4" placeholder="ideal4"/></td>
                        <td><input class="form-control" type="text" name="unit4" placeholder="unit4"/></td>
                    </tr>
                </table>
            </form>
        </div>
        <form action="" method="POST">
            <!-- Fenêtre "résultats financiers attendus" de la charte du projet -->
            <div class="financeResultWindow">
                <h2 class="text-center mt-2 mb-3 text-uppercase">Résultat financier attendu</h2>
                <table class="form-group text-center col-md-12">
                    <tr>
                        <td>Réduction des coûts</td>
                        <td>Contrôleur financier</td>
                        <!-- Champ pour l'estimation des économies annuelles  attendues-->
                        <td><input class="form-control" type="text" name="expectedAnnualSaving" placeholder="Economie prévue"/></td>
                        <td>k€</td>          
                    </tr>
                </table>
            </div>
        </form>
        <form action=" " method="POST">
            <!-- Fenêtre "planning" de la charte du projet -->
            <div class="scheduleWindow">
                <h2 class="text-center mt-2 mb-3 text-uppercase">Planning des phases du projet</h2>
                <div class="form-group text-center">
                    <div>
                        <!-- Calendrier pour la date butoire de la définition du projet -->
                        <label for="phaseDateDefinition">Définition</label>
                        <input class="form-control" type="date" name="phaseDateDefinition" id="phaseDateDefinition" />
                    </div>
                    <div>
                        <!-- Calendrier pour la date butoire des mesures qui vont servir pour l'analyse -->
                        <label for="phaseDateMeasures">Mesures</label>
                        <input class="form-control" type="date" name="phaseDateMeasures" id="phaseDateMeasures" />
                    </div>
                    <div>
                        <!-- Calendrier pour la date butoire de l'analyse des mesures effectuées précedemment -->
                        <label for="phaseDateAnalisys">Analyse</label>
                        <input class="form-control" type="date" name="phaseDateAnalisys" id="phaseDateAnalisys" />
                    </div>
                    <div>
                        <!-- Calendrier pour la date butoire des améliorations du processus -->
                        <label for="phaseDateImprovment">Amélioration</label>
                        <input class="form-control" type="date" name="phaseDateImprovment" id="phaseDateImprovment" />
                    </div>
                    <div>
                        <!-- Calendrier pour la date butoire de la phase contrôle du projet -->
                        <label for="phaseDateControl">Contrôle</label>
                        <input class="form-control" type="date" name="phaseDateControl" id="phaseDateControl" />
                    </div>
                    <div>
                        <!-- Calendrier pour la date butoire de la clôture du projet -->
                        <label for="phaseDateClosure">Clôture</label>
                        <input class="form-control" type="date" name="phaseDateClosure" id="phaseDateClosure" />
                    </div>
                </div>
                <!-- Bouton d'enregistrement des dates butoires du projet -->
                <button class="mt-3 mb-3" type="submit" value="submit">Enregistrer</button>
            </div>
        </form>
    </div>
    <!-- On intègre la source fichier.js, CDN pour javascript, jQuery qui servent au bon fonctionnement du site -->
    <?php include '_foot.php' ?>
</body>
</html>
