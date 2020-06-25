// Réglage de la vitesse du carousel
$('.carousel').carousel({ interval: 2400 });

/*Déclaration des fonctions qui permettent d'affficher ou de masquer les formulaires "Equipe, 
 * Objectifs, Résultats attendus, Planning du projet", de la page "Etablir charte" */

// Affichage uniquement du contenu du formulaire "Equipe" lors de l'ouverture de la page "Etablir charte"
$(function () {
    $('.goalWindow, .financeResultWindow, .scheduleWindow').hide();
    $('.teamWindow').show();
});
// Un clic sur le bouton 'Equipe' masque le contenu des autres formulaires
$('#clickTeam').click(function () {
    $('.goalWindow, .financeResultWindow, .scheduleWindow').hide();
    $('.teamWindow').show();
});
// Un clic sur le bouton 'Objectif' masque le contenu des autres formulaires
$('#clickGoal').click(function () {
    $('.financeResultWindow, .teamWindow, .scheduleWindow').hide();
    $('.goalWindow').show();
});
// Un clic sur le bouton 'Résultats attendus' masque le contenu des autres formulaires
$('#clickFinanceResult').click(function () {
    $('.goalWindow,.teamWindow, .scheduleWindow').hide();
    $('.financeResultWindow').show();
});
// Un clic sur le bouton 'Planning du projet' masque le contenu des autres formulaires
$('#clickSchedule').click(function () {
    $('.goalWindow,.teamWindow,.financeResultWindow').hide();
    $('.scheduleWindow').show();
});
