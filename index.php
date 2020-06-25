<?php
// On démarre la session en début de code
session_start();
// Dans le header on echo le $title
$title = 'Site SPL6S';
// On intègre le header avec les liens et CDN qui servent au fonctionnement de bootstrap, feuille de style....
include '_header.php';
?>
<body>
    <div class="container-fluid">
        <div class="row banner">
            <!-- Logo du site -->
            <div class="col-md-2">
                <img class="logo" src="assets/img/logoFondBleu.png" alt="logo site" width="190"/>
            </div>
            <!-- Message de bienvenue -->
            <div class="col-md-2">
                <p class="text-center text-uppercase welcome" >Bienvenue</p>
            </div>
            <!-- Nom du site SPL06 -->
            <div class="col-md-4">
                <p class="spls6 text-center text-uppercase spl6s">spl6s</p>
            </div>
            <!-- Dropdown pour l'accés à l'espace personnel -->
            <div class="col-md-4 dropdown text-center">
                <button type="button" class="dropdown btn dropdown-toggle " data-toggle="dropdown">
                    Espace Clients
                </button>
                <!-- dropdown accès à la connexion ou à l'inscription au site -->
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="connection.php">Connexion</a>
                    <a class="dropdown-item" href="registration.php">Enregistrement</a>
                </div>
            </div>
            <!-- Fin du dropdown ci-dessus  -->
        </div>
        <div class="row">
            <div class="col-md-12">
                <!-- Titre principal -->
                <h1 class="text-center text-dark text-uppercase mt-5">
                    système de suivi de projet lean six sigma
                </h1>
                <a href="index.php"></a>
            </div>
        </div>
        <!-- Titre secondaire -->
        <div class="row">
            <div class="col-md-12">
                <h2 class="text-center text-uppercase">
                    site dédié aux entreprises<br/>(amélioration des processus et réduction des coûts)
                </h2>
            </div>
        </div>
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
        <div class="row">
            <!-- Information sur le site -->
            <div class="col-12 mt-5">
                <h2 class="text-center text-uppercase font-weight-bold">
                    spl6s c'est quoi?
                </h2>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <p class="text-center">
                    C'est une plateforme qui permet d'herberger les projets de toutes les entreprises
                    qui utilisent les méthodologies lean six sigma.
                </p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <h2 class="text-center text-uppercase font-weight-bold mt-5">
                    pourquoi ce site?
                </h2>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <p class="text-center mt-2 mb-5">
                    Ce site va permettre aux entreprises de toutes tailles de suivre leurs projets et de les mener à terme.
                </p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 mt-3 mb-5">
                <ul>
                    <li><i class="far fa-hand-point-right mb-3"></i> Proposer des nouveaux projets (Leader de projet).</li>
                    <li><i class="far fa-hand-point-right mb-3"></i> Valider les nouveaux projets (Champion).</li>
                    <li><i class="far fa-hand-point-right mb-3"></i> Établir et enregistrer les chartes des projets (Champion).</li>
                    <li><i class="far fa-hand-point-right mb-3"></i> Valider les différentes phases des projets (Leader de projet).</li>
                    <li><i class="far fa-hand-point-right mb-3"></i> Clôturer les projets (Leader de projet).</li>
                </ul>
            </div>
            <div class="col-md-6 mt-3 mb-5">
                <ul>
                    <li><i class="far fa-hand-point-right mb-3"></i> Enregistrer les rapports de fin de projet (Leader de projet).</li>
                    <li><i class="far fa-hand-point-right mb-3"></i> Enregistrer mensuellement et suivre les mesures clés des projets (contrôleur financier).</li>
                    <li><i class="far fa-hand-point-right mb-3"></i> Enregistrer et suivre les gains mensuellement (contrôleur financier).<li>
                    <li><i class="far fa-hand-point-right mb-3"></i> Permettre d'avoir un historique des rapports afin de s'en inspirer.</li>
                </ul>
            </div>
        </div>
        <!-- Image exemple charte projet -->
        <div class="row">
            <h2 class="col-md-12 text-dark text-center">Exemple du menu utilisateur "leader de projet"</h2>
            <div class="col-md-12 text-center">
                <img class="chartPicture w-75" src="assets/img/exempleMenu.png" alt="image charte projet"/>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 mt-5">
                <h2 class="text-center text-uppercase font-weight-bold">
                    qui peut s'inscrire?
                </h2>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 mb-5">
                <p class="text-center">
                    Les entreprises du secteur privé ou public, que ce soit dans le domaine de la manufacture,
                    l’administratif , les sociétés de services…la liste n’est pas exhaustive.
                </p>
            </div>
        </div>
        <!-- Footer -->
        <footer class="row text-center text-xs-center text-sm-left text-md-left text-white pt-3" style="font-size: 18px">
            <div class="col-md-3">
                <!-- Mes coordonnées -->
                <h3 style="font-size: 18px">Contact :</h3>
                <ul class="list-unstyled quick-links">
                    <li style="font-size: 18px">Franck Massa</li>
                    <li><a href="mailto: massafranck@gmail.com"><i class="far fa-envelope"> massafranck@gmail.com</i></a></li>
                    <li><a href="callto:0601871351"><i class="fas fa-mobile-alt"> 06 01 87 13 51</i></a></li>
                </ul>
            </div>
            <div class="col-md-3">
                <!-- Button trigger modal pour les Conditions générales d'utilisation du site -->
                <button type="button" data-toggle="modal" data-target="#exampleModalLong">
                    Conditions Générales d'utilisation du site
                </button>
            </div>
            <!-- Modal pour l'affichage des conditions générales d'utilisation du site -->
            <div class="modal fade bd-example-modal-lg" id="exampleModalLong" tabindex="-1" role="dialog"  aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <span aria-hidden="true">&times;</span>
                        </div>
                        <div class="modal-body text-dark ">
                            <h1>Conditions générales d'utilisation du site [http://sitewebfranck]</h1>

                            <h2>ARTICLE 1 : Objet</h2>

                            <p> Les présentes « conditions générales d'utilisation » ont pour objet l'encadrement juridique des modalités de mise à disposition des services du site [Nom du site] et leur utilisation par « l'Utilisateur ».

                                Les conditions générales d'utilisation doivent être acceptées par tout Utilisateur souhaitant accéder au site. Elles constituent le contrat entre le site et l'Utilisateur. L’accès au site par l’Utilisateur signifie son acceptation des présentes conditions générales d’utilisation.</p>

                            <h2>Éventuellement :</h2>

                            <p>En cas de non-acceptation des conditions générales d'utilisation stipulées dans le présent contrat, l'Utilisateur se doit de renoncer à l'accès des services proposés par le site.

                                [Nom du site] se réserve le droit de modifier unilatéralement et à tout moment le contenu des présentes conditions générales d'utilisation.</p>

                            <h2>ARTICLE 2 : Mentions légales</h2>

                            <p>L'édition du site [Nom du site] est assurée par la Société [Nom de la société] [SAS / SA / SARL, etc.] au capital de [montant en euros] € dont le siège social est situé au [adresse du siège social].

                                [Le Directeur / La Directrice] de la publication est [Madame / Monsieur] [Nom & Prénom].

                                Éventuellement :

                                [Nom de la société] est une société du groupe [Nom de la société] [SAS / SA / SARL, etc.] au capital de [montant en euros] € dont le siège social est situé au [adresse du siège social].

                                L'hébergeur du site [Nom du site] est la Société [Nom de la société] [SAS / SA / SARL, etc.] au capital de [montant en euros] € dont le siège social est situé au [adresse du siège social].</p>

                            <h2>ARTICLE 3 : Définitions</h2>

                            <p>La présente clause a pour objet de définir les différents termes essentiels du contrat :

                                Utilisateur : ce terme désigne toute personne qui utilise le site ou l'un des services proposés par le site.

                                Contenu utilisateur : ce sont les données transmises par l'Utilisateur au sein du site.

                                Membre : l'Utilisateur devient membre lorsqu'il est identifié sur le site.

                                Identifiant et mot de passe : c'est l'ensemble des informations nécessaires à l'identification d'un Utilisateur sur le site. L'identifiant et le mot de passe permettent à l'Utilisateur d'accéder à des services réservés aux membres du site. Le mot de passe est confidentiel.</p>

                            <h2>ARTICLE 4 : accès aux services</h2>

                            <p>Le site permet à l'Utilisateur un accès gratuit aux services suivants :

                                [articles d’information] ;

                                [annonces classées] ;

                                [mise en relation de personnes] ;

                                [publication de commentaires / d’œuvres personnelles] ;

                                […].

                                Le site est accessible gratuitement en tout lieu à tout Utilisateur ayant un accès à Internet. Tous les frais supportés par l'Utilisateur pour accéder au service (matériel informatique, logiciels, connexion Internet, etc.) sont à sa charge.

                                Selon le cas :

                                L’Utilisateur non membre n'a pas accès aux services réservés aux membres. Pour cela, il doit s'identifier à l'aide de son identifiant et de son mot de passe.

                                Le site met en œuvre tous les moyens mis à sa disposition pour assurer un accès de qualité à ses services. L'obligation étant de moyens, le site ne s'engage pas à atteindre ce résultat.

                                Tout événement dû à un cas de force majeure ayant pour conséquence un dysfonctionnement du réseau ou du serveur n'engage pas la responsabilité de [Nom du site].

                                L'accès aux services du site peut à tout moment faire l'objet d'une interruption, d'une suspension, d'une modification sans préavis pour une maintenance ou pour tout autre cas. L'Utilisateur s'oblige à ne réclamer aucune indemnisation suite à l'interruption, à la suspension ou à la modification du présent contrat.

                                L'Utilisateur a la possibilité de contacter le site par messagerie électronique à l’adresse [contact@nomdusite.com].</p>

                            <h2>ARTICLE 5 : Propriété intellectuelle</h2>

                            <p>Les marques, logos, signes et tout autre contenu du site font l'objet d'une protection par le Code de la propriété intellectuelle et plus particulièrement par le droit d'auteur.

                                L'Utilisateur sollicite l'autorisation préalable du site pour toute reproduction, publication, copie des différents contenus.

                                L'Utilisateur s'engage à une utilisation des contenus du site dans un cadre strictement privé. Une utilisation des contenus à des fins commerciales est strictement interdite.

                                Tout contenu mis en ligne par l'Utilisateur est de sa seule responsabilité. L'Utilisateur s'engage à ne pas mettre en ligne de contenus pouvant porter atteinte aux intérêts de tierces personnes. Tout recours en justice engagé par un tiers lésé contre le site sera pris en charge par l'Utilisateur.

                                Le contenu de l'Utilisateur peut être à tout moment et pour n'importe quelle raison supprimé ou modifié par le site. L'Utilisateur ne reçoit aucune justification et notification préalablement à la suppression ou à la modification du contenu Utilisateur.</p>

                            <h2>ARTICLE 6 : Données personnelles</h2>

                            <p>Les informations demandées à l’inscription au site sont nécessaires et obligatoires pour la création du compte de l'Utilisateur. En particulier, l'adresse électronique pourra être utilisée par le site pour l'administration, la gestion et l'animation du service.

                                Le site assure à l'Utilisateur une collecte et un traitement d'informations personnelles dans le respect de la vie privée conformément à la loi n°78-17 du 6 janvier 1978 relative à l'informatique, aux fichiers et aux libertés. Le site est déclaré à la CNIL sous le numéro [numéro].

                                En vertu des articles 39 et 40 de la loi en date du 6 janvier 1978, l'Utilisateur dispose d'un droit d'accès, de rectification, de suppression et d'opposition de ses données personnelles. L'Utilisateur exerce ce droit via :

                                son espace personnel ;

                                un formulaire de contact ;

                                par mail à [adresse mail] ;

                                par voie postale au [adresse].</p>

                            <h2>ARTICLE 7 : Responsabilité et force majeure</h2>

                            <p>Les sources des informations diffusées sur le site sont réputées fiables. Toutefois, le site se réserve la faculté d'une non-garantie de la fiabilité des sources. Les informations données sur le site le sont à titre purement informatif. Ainsi, l'Utilisateur assume seul l'entière responsabilité de l'utilisation des informations et contenus du présent site.

                                L'Utilisateur s'assure de garder son mot de passe secret. Toute divulgation du mot de passe, quelle que soit sa forme, est interdite.

                                L'Utilisateur assume les risques liés à l'utilisation de son identifiant et mot de passe. Le site décline toute responsabilité.

                                Tout usage du service par l'Utilisateur ayant directement ou indirectement pour conséquence des dommages doit faire l'objet d'une indemnisation au profit du site.

                                Une garantie optimale de la sécurité et de la confidentialité des données transmises n'est pas assurée par le site. Toutefois, le site s'engage à mettre en œuvre tous les moyens nécessaires afin de garantir au mieux la sécurité et la confidentialité des données.

                                La responsabilité du site ne peut être engagée en cas de force majeure ou du fait imprévisible et insurmontable d'un tiers.</p>

                            <h2>ARTICLE 8 : Liens hypertextes</h2>

                            <p>De nombreux liens hypertextes sortants sont présents sur le site, cependant les pages web où mènent ces liens n'engagent en rien la responsabilité de [Nom du site] qui n'a pas le contrôle de ces liens.

                                L'Utilisateur s'interdit donc à engager la responsabilité du site concernant le contenu et les ressources relatives à ces liens hypertextes sortants.</p>

                            <h2>ARTICLE 9 : Évolution du contrat</h2>

                            <p>Le site se réserve à tout moment le droit de modifier les clauses stipulées dans le présent contrat.</p>

                            <h2>ARTICLE 10 : Durée</h2>

                            <p>La durée du présent contrat est indéterminée. Le contrat produit ses effets à l'égard de l'Utilisateur à compter de l'utilisation du service.</p>

                            <h2>ARTICLE 11 : Droit applicable et juridiction compétente</h2>

                            <p>La législation française s'applique au présent contrat. En cas d'absence de résolution amiable d'un litige né entre les parties, seuls les tribunaux [du ressort de la Cour d'appel de / de la ville de] [Ville] sont compétents.

                                Éventuellement</p>

                            <h2>ARTICLE 12 : Publication par l’Utilisateur</h2>

                            <p>Le site permet aux membres de publier [des commentaires / des œuvres personnelles].

                                Dans ses publications, le membre s’engage à respecter les règles de la Netiquette et les règles de droit en vigueur.

                                Le site exerce une modération [a priori / a posteriori] sur les publications et se réserve le droit de refuser leur mise en ligne, sans avoir à s’en justifier auprès du membre.

                                Le membre reste titulaire de l’intégralité de ses droits de propriété intellectuelle. Mais en publiant une publication sur le site, il cède à la société éditrice le droit non exclusif et gratuit de représenter, reproduire, adapter, modifier, diffuser et distribuer sa publication, directement ou par un tiers autorisé, dans le monde entier, sur tout support (numérique ou physique), pour la durée de la propriété intellectuelle. Le Membre cède notamment le droit d'utiliser sa publication sur internet et sur les réseaux de téléphonie mobile.

                                La société éditrice s'engage à faire figurer le nom du membre à proximité de chaque utilisation de sa publication.</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermeture</button>
                        </div>
                    </div>
                </div>
        </footer>
        <div class="col-md-12 text-center">
            <!-- Copyright -->
            <p>
                <i class="far fa-copyright"></i> Franck Massa 2020.
            </p>
        </div>
    </div>
    <!-- On intègre la source fichier.js, CDN pour javascript, jQuery qui servent au bon fonctionnement du site -->
    <?php include '_foot.php'; ?>
</body>

</html>
