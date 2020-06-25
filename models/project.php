<?php

// On utilise pas extends dataBaseSingleton car on appelle la méthode getInstance
class project {

    public $id = 0;
    public $nameProject = '';
    public $department = '';
    public $description = '';
    public $idLeader = '';
    public $idChampion = '';
    public $idController = '';
    public $search = '';
    
    private $db;

// Méthode magic  __construct de la classe dataBaseSingleton
    public function __construct() {
        $database = dataBaseSingleton::getInstance();
        $this->db = $database->db;
    }

    /**
     * Méthode permettant de remplir la proposition d'un nouveau projet par le leader
     * @return boolean
     */
    public function proposeNewProject() {

        /*
         * Enregistrement de la valeur des attributs dans la table prs13_projectLeanSigma
         */
        $query = 'INSERT INTO `prs13_projectLeanSigma` (`nameProject`, `department`, `description`, `idLeader`, `idChampion`, `idController`) '
                . 'VALUES (:nameProject, :department, :description, :idLeader, :idChampion, :idController) ';
        $result = $this->db->prepare($query);
        $result->bindValue(':nameProject', $this->nameProject, PDO::PARAM_STR);
        $result->bindValue(':department', $this->department, PDO::PARAM_STR);
        $result->bindValue(':description', $this->description, PDO::PARAM_STR);
        $result->bindValue(':idLeader', $this->idLeader, PDO::PARAM_STR);
        $result->bindValue(':idChampion', $this->idChampion, PDO::PARAM_STR);
        $result->bindValue(':idController', $this->idController, PDO::PARAM_STR);
        // Execute la requête et retourne le résultat dans la bdd
        return $result->execute();
    }
    /** 
     * Méthode getProjectList pour afficher la liste des projets
     */
    public function getProjectList() {
        /**
         * On récupère les données dans la variable $PDOResult
         */
        $query = 'SELECT `id`, `nameProject`, `department`, `description` FROM `prs13_projectLeanSigma` '
                . 'WHERE `idLeader`= :idLeader ';
        $PDOResult = $this->db->prepare($query);
        $PDOResult->bindValue(':idLeader', $this->idLeader, PDO::PARAM_INT);
// Si la variable $PDOResult est de type objet, on stocke toutes les données avec fetchall, dans la variable $result
        $PDOResult->execute();
        if (is_object($PDOResult)) {
            $result = $PDOResult->fetchALL(PDO::FETCH_OBJ);
        }
// On retourne les données dans un tableau associatif array();
        return $result;
    }
/**
 * Cette méthode récupère la liste des noms des projets pour le rôle de champion 
 */
    public function getListNameProject($idChampion){
        $query = 'SELECT `id`,`nameProject` '
        . 'FROM `prs13_projectLeanSigma` '
        . 'WHERE `idChampion` = :idChampion';
        $PDOResult = $this->db->prepare($query);
        $PDOResult->bindValue(':idChampion', $idChampion, PDO::PARAM_INT);
        $PDOResult->execute();
        if (is_object($PDOResult)){
            $result = $PDOResult->fetchAll(PDO::FETCH_OBJ);
        }
        return $result;
    }

    /**
     * cette méthode permet d'afficher le "detail" du projet selectionnné dans la liste 
     * déroulante de la page "validateProject"
     */

    public function getDetailProject($id){
        $query = 'SELECT distinct `department`, `description`, `firstname`, `lastname` '
        . 'FROM `prs13_projectLeanSigma` '
        . 'INNER JOIN `prs13_users` ON `prs13_users`.`id` = `prs13_projectLeanSigma`.`idChampion` '
        . 'WHERE `prs13_projectLeanSigma`.`id` = :id';
        $PDOResult = $this->db->prepare($query);
        $PDOResult->bindValue(':id', $id, PDO::PARAM_INT);
        $PDOResult->execute();
        if (is_object($PDOResult)){
            $result = $PDOResult->fetch(PDO::FETCH_ASSOC); // On récupère sous forme de tableau associatif
        }
        return $result; 
    }


    /**
     *  Méthode getDetailProjectById pour récupérer le résultat de la requête pour le detail du projet
     * On prépare la requête qui retourne un objet
     */
    public function getDetailProjectById() {
        $PDOResult = $this->db->prepare('SELECT `id`, `nameProject`, `department`, `description` '
                . 'FROM `prs13_projectLeanSigma` '
                . 'WHERE `id` = :id'); // :id marqueur nominatif car id est une inconnue
// bindvalue Associe une valeur à un paramètre (marqueur nominatif), this se réfère à tous les attributs de la classe
        $PDOResult->bindvalue(':id', $this->id, PDO::PARAM_INT);
        /** On execute la requête
         */
        $PDOResult->execute();
        if (is_object($PDOResult)) {
            /**
             * On utilise fetch pour la récupération d'une seule valeur
             */
            $result = $PDOResult->fetch(PDO::FETCH_OBJ);
        }
        return $result;
    }

    /**  Méthode updateProjectDetail pour récupérer le résultat de la requête pour le detail du projet
     *   On prépare la requête qui retourne un objet
     */
    public function updateProjectDetail() {
        // La requête permet de mettre à jour les valeurs des attributs de la table prs13_projectLeanSigma suivant l'id
        $query = 'UPDATE `prs13_projectLeanSigma` SET `nameProject` = :nameProject,`department` = :department, `description` = :description '
                . ' WHERE `id` = :id';
        $modifyUser = $this->db->prepare($query);
        $modifyUser->bindValue(':nameProject', $this->nameProject, PDO::PARAM_STR);
        $modifyUser->bindValue(':department', $this->department, PDO::PARAM_STR);
        $modifyUser->bindValue(':description', $this->description, PDO::PARAM_STR);
        $modifyUser->bindValue(':id', $this->id, PDO::PARAM_INT);
        return $modifyUser->execute();
    }

    /**
     * Méthode removeProjet pour supprimer un projet
     * @return string
     */
    public function removeProject() {
        $remove = $this->db->prepare('DELETE FROM `prs13_projectLeanSigma`'
                . 'WHERE `id` =  :idRemove ');
        $remove->bindValue(':idRemove', $this->id, PDO::PARAM_INT);
        return $remove->execute();
    }

    // Déclaration de la méthode findProjectByNameProject($search) pour rechercher un projet
    public function findProjectByNameProject($search) {
    // Déclaration du tableau vide $findProjectList
        $findProjectList = array();

        // Préparation de la requete et intégration dans $findProject
        $findProject = $this->db->prepare(
            'SELECT `prs13_projectLeanSigma`.`id`, `nameProject` ' 
                . 'FROM `prs13_projectLeanSigma` '
                . 'INNER JOIN `prs13_users` ON `prs13_projectLeanSigma`.`idLeader` = `prs13_users`.`id` '
                . 'WHERE `idLeader` = :idLeader '
                . 'AND `nameProject` LIKE :search');
        // Récupération de la valeur de $search passée en parametre de la méthode dans la fonction bindValue() pour le filtrage, ajout des modulos
        $findProject->bindValue(':search', '%' . $search . '%', PDO::PARAM_STR);
        $findProject->bindValue(':idLeader', $this->idLeader, PDO::PARAM_INT);
        //Si $findProject est éxécuté
        if ($findProject->execute()) {   //Si $findProject est un objet
            if (is_object($findProject)) {   //Récupération du résultat de la requête dans $findProjectList
                $findProjectList = $findProject->fetchAll(PDO::FETCH_OBJ);
                // Sinon
            } else {
                //Attribuer FALSE a $findProjectList si $findProject n'est pas un objet
                $findProjectList = FALSE;
            }
            // Sinon
        } else {
            // Attribuer FALSE à $findProjectList si le projet n'est pas exécuté
            $findProjectList = FALSE;
        }
        // Retourner $findProjectList
        return $findProjectList;  
    }
}


