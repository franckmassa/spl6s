<?php
session_start();
$title = 'Menu';
include '_header.php';
?>
<?php include '_navbar.php'; ?>
<!-- Carousel -->
<div id="demo" class="carousel slide" data-ride="carousel">
    <!-- Indicateurs de démarrage du carousel -->
    <ul class="carousel-indicators">
        <li data-target="#demo" data-slide-to="0" class="active"></li>
        <li data-target="#demo" data-slide-to="1"></li>
        <li data-target="#demo" data-slide-to="2"></li>
    </ul>
    <!-- Images Carousel -->
    <div class="carousel-inner text-center mt-5">
        <div class="carousel-item active">
            <img class="lazy w-50" src="assets/img/dmaic_640.jpg" width="1300" height="450" alt="Methode DMAIC" />
            <div class="carousel-caption">
                <p class="font-weight-bold text-dark">La méthode!</p>
            </div>   
        </div>
        <div class="carousel-item">
            <img class="lazy w-75" src="assets/img/achievement_640.jpg" width="1300" height="450" alt="Equipe" />
            <div class="carousel-caption">
                <p class="font-weight-bold">L'équipe!</p>
            </div>   
        </div>
        <div class="carousel-item">
            <img class="lazy w-50" src="assets/img/goal_640.png" width="1300" height="450" alt="Succés" />
            <div class="carousel-caption">
                <p class="font-weight-bold text-dark">C'est le succés garanti!</p>
            </div>   
        </div>
    </div>
    <!-- Poignée du carousel pour aller vers la gauche ou la droite -->
    <a class="carousel-control-prev" href="#demo" data-slide="prev">
        <span class="carousel-control-prev-icon"></span>
    </a>
    <a class="carousel-control-next" href="#demo" data-slide="next">
        <span class="carousel-control-next-icon"></span>
    </a>
</div>
<!-- Fin du carousel ci-dessus  -->
<!-- On intègre la source fichier.js, CDN pour javascript, jQuery qui servent au bon fonctionnement du site -->
<?php include '_foot.php'; ?>
