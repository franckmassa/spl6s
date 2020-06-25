$(function () {
    // console.log($('#selecProject'))
    // La fonction "change()"" permet d'effectuer l'action au changement de projet de la liste déroulante"
    $('#selecProject').change(function () {
        //Mon appel AJAX
        //$.post prend en paramètre la page PHP qui va effectuer le traitement, la variable que l'on communique au PHP, et la fonction de traitement avec la réponse de PHP.
        $.post('http://localhost/spl6s_en_cours_de_modif/controllers/validateProjectCtrl.php', {projectSelect: $(this).val()}, function (data) {
            console.log(data);
            //Dans data se trouve ce que le PHP (controlleur) a envoyé via son echo
            if(data){
                // la fonction JSON.parse permet de convertir le fichier JSON en JavaScript
                var dep = JSON.parse(data);
              
             //Le .html permet d'écrire du contenu HTML dans un élément. Ici dans la div qui a l'id #department 
             $("#department").html(dep.department);
             $("#description").html(dep.description);
             $("#champion").html(dep.firstname + " " + dep.lastname);  
            }
        });
    });
});
