<?php

// On utilise pas extends dataBaseSingleton car on appelle la méthode getInstance
class users {

    public $id;
    public $firstname = '';
    public $lastname = '';
    public $phone = '';
    public $email = '';
    public $password = '';
    public $idRoles = '';
    public $idSocieties = '';
    public $idUsers = 0;
    private $db;
    

// Méthode magic  __construct de la classe dataBaseSingleton
    public function __construct() {
        $database = dataBaseSingleton::getInstance();
        $this->db = $database->db;
    }

    /**
     * Méthode permettant l'enregistrement d'un super-utilisateur
     */
    public function userRegister() {

        /* Enregistrement de la valeur des attributs dans la table prs13_users
         * On met la valeur 2 au marqueur nominatif pour l'attribut idRoles correspondant à l'id super utilisateur
         */
        $query = 'INSERT INTO `prs13_users` (`firstname`, `lastname`, `phone`, `email`, `password`, `idRoles`, `idSocieties`, `idUsers`) '
                . 'VALUES (:firstname, :lastname, :phone, :email, :password, 2, :idSocieties, :idUsers)';
        // On prépare la requête à l'exécution et on retourne un objet $result
        $result = $this->db->prepare($query);
        //  bindvalue Associe les valeurs aux paramètres
        $result->bindValue(':firstname', $this->firstname, PDO::PARAM_STR);
        $result->bindValue(':lastname', $this->lastname, PDO::PARAM_STR);
        $result->bindValue(':phone', $this->phone, PDO::PARAM_STR);
        $result->bindValue(':email', $this->email, PDO::PARAM_STR);
        $result->bindValue(':password', $this->password, PDO::PARAM_STR);
        $result->bindValue(':idSocieties', $this->idSocieties, PDO::PARAM_INT);
        $result->bindValue(':idUsers', $this->idUsers, PDO::PARAM_INT);
// Execute la requête préparée et retourne le résultat dans la bdd
        return $result->execute();
    }

    /**
     * Méthode permettant de vérifier si l'utilisateur existe déjà dans la table prs13_users
     * @return type
     */
    public function checkIfUserExist() {
        $state = false;
        $query = 'SELECT COUNT(`id`) AS `count` FROM `prs13_users` WHERE `email` = :email';
        $result = $this->db->prepare($query);
        $result->bindValue(':email', $this->email, PDO::PARAM_STR);
        if ($result->execute()) {
            $selectResult = $result->fetch(PDO::FETCH_OBJ);
            $state = $selectResult->count;
        }
        return $state;
    }

    /**
     * Méthode permettant de faire la connexion de l'utilisateur
     * L'email sert de login
     * @return boolean
     */
    public function userConnection() {
        // Initialisation de $state
        $state = false;
        /**
         *  On sélectionne les enregistrements des tables prs13_users et prs13_roles lorsque les données de la colonne “idRoles” de la table prs13_users
         *  est égal aux données de la colonne "id" de la table prs13_roles .
         */
        $query = 'SELECT `prs13_users`.`id`, `prs13_users`.`firstname`, `prs13_users`.`lastname`, `prs13_users`.`password`, `prs13_users`.`idRoles`, `prs13_users`.`email`, `prs13_roles`.`name`, `prs13_users`.`idUsers` '
                . 'FROM `prs13_users` '
                . 'INNER JOIN `prs13_roles` on `prs13_users`.`idRoles` = `prs13_roles`.`id` '
                . 'WHERE `email` = :email ';
        // On prépare la requête à l'exécution et on retourne un objet $result
        $result = $this->db->prepare($query);
        //  bindvalue Associe la valeur du marqueur nominatif email au paramètre string
        $result->bindValue(':email', $this->email, PDO::PARAM_STR);
        //On vérifie que la requête s'est bien exécutée
        if ($result->execute()) {
            // On va chercher la ligne et on la retourne à l'objet $selectResult
            $selectResult = $result->fetch(PDO::FETCH_OBJ);
            //On vérifie que l'on a bien trouvé unutilisateur
            if (is_object($selectResult)) {
// On hydrate
                $this->firstname = $selectResult->firstname;
                $this->lastname = $selectResult->lastname;
                $this->name = $selectResult->name;
                $this->password = $selectResult->password;
                $this->email = $selectResult->email;
                $this->id = $selectResult->id;
                $this->idRoles = $selectResult->idRoles;
                $this->idUsers = $selectResult->idUsers;
                $state = true;
            }
        }
        return $state;
    }

    /**
     * Méthode permettant l'enregistrement d'un utilisateur du siteWEb
     * @return boolean
     */
    public function UserSiteWebRegister() {

        /* Enregistrement des attributs dans la table prs13_users
         *
         */
        $query = 'INSERT INTO `prs13_users` (`firstname`, `lastname`, `phone`, `email`, `password`, `idRoles`, `idSocieties`, idUsers) '
                . 'VALUES (:firstname, :lastname, :phone, :email, :password, :idRoles, :idSocieties, :idUsers)';
        $result = $this->db->prepare($query);
        $result->bindValue(':idUsers', $this->idUsers, PDO::PARAM_INT);
        $result->bindValue(':firstname', $this->firstname, PDO::PARAM_STR);
        $result->bindValue(':lastname', $this->lastname, PDO::PARAM_STR);
        $result->bindValue(':phone', $this->phone, PDO::PARAM_STR);
        $result->bindValue(':email', $this->email, PDO::PARAM_STR);
        $result->bindValue(':password', $this->password, PDO::PARAM_STR);
        $result->bindValue(':idRoles', $this->idRoles, PDO::PARAM_INT);
        $result->bindValue(':idSocieties', $this->idSocieties, PDO::PARAM_INT);
// Execute la requête et retourne le résultat dans la bdd
        return $result->execute();
    }

    /**
     * Méthode getUserList pour afficher la liste des utilisateurs
     */
    public function getUserList() {
// On récupère les données dans la variable $PDOResult
        $PDOResult = $this->db->prepare('SELECT `id`, `firstname`, `lastname`, `phone`, `email`, `idRoles`, `idSocieties`, `idUsers`   FROM `prs13_users` '
                . 'WHERE `idUsers` = :id');
        $PDOResult->bindValue(':id', $this->id, PDO::PARAM_INT);
// Si la variable $PDOResult est de type objet, on stocke toutes les données avec fetchall, dans la variable $result
        $PDOResult->execute();
        if (is_object($PDOResult)) {
            $result = $PDOResult->fetchAll(PDO::FETCH_OBJ);
        }
// On retourne les données dans un tableau associatif array();
        return $result;
    }

// Méthode getListUsersProject pour afficher le nom et le prénom des utilisateurs qui font parti du projet
    public function getListUsersByRole() {
        $PDOResult = $this->db->prepare('SELECT `prs13_users`.`id`, `prs13_users`.`idUsers`, `prs13_users`.`firstname`, `prs13_users`.`lastname` '
                . 'FROM `prs13_users` '
                . 'WHERE `idUsers` = :idUsers AND `idRoles` = :idRoles ');
        $PDOResult->bindValue(':idUsers', $this->idUsers, PDO::PARAM_INT);
        $PDOResult->bindValue(':idRoles', $this->idRoles, PDO::PARAM_INT);
        $PDOResult->execute();
        if (is_object($PDOResult)) {
            $result = $PDOResult->fetchAll(PDO::FETCH_OBJ);
        }
        return $result;
    }

    /**
     *  Méthode getProfilById pour récupérer le résultat de la requête pour le profil de l'utilisateur
     * On prépare la requête qui retourne un objet
     */
    public function getProfilById() {
        $PDOResult = $this->db->prepare('SELECT `id`, `firstname`, `lastname`, `phone`, `email`, `idRoles`, `idSocieties` '
                . 'FROM `prs13_users` '
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

    /**  Méthode updateUserProfil pour récupérer le résultat de la requête pour le profil de l'utilisateur
     *   On prépare la requête qui retourne un objet
     */
    public function updateUserProfil() {
// La requête permet de mettre à jour les valeurs des attributs de la table prs13_users suivant l'id
        $query = 'UPDATE `prs13_users` SET `firstname` = :firstname,`lastname` = :lastname, `phone` = :phone, `email`= :email '
                . ' WHERE `id` = :id';
        $modifyUser = $this->db->prepare($query);
        $modifyUser->bindValue(':firstname', $this->firstname, PDO::PARAM_STR);
        $modifyUser->bindValue(':lastname', $this->lastname, PDO::PARAM_STR);
        $modifyUser->bindValue(':phone', $this->phone, PDO::PARAM_STR);
        $modifyUser->bindValue(':email', $this->email, PDO::PARAM_STR);
        $modifyUser->bindValue(':id', $this->id, PDO::PARAM_INT);
        return $modifyUser->execute();
    }

    public function passwordModify() {
// On met à jour la valeur de password suivant l'email
        $query = 'UPDATE `prs13_users` SET `password` = :password '
                . 'WHERE `email` = :email ';
        $result = $this->db->prepare($query);
        $result->bindValue(':password', $this->password, PDO::PARAM_STR);
        $result->bindValue(':email', $this->email, PDO::PARAM_STR);
        return $result->execute();
    }

    /**
     * Méthode removeUser pour supprimer un utilisateur
     * @return string
     */
    public function removeUser() {
        $remove = $this->db->prepare('DELETE FROM `prs13_users`'
                . 'WHERE `id` =  :idRemove ');
        $remove->bindValue(':idRemove', $this->id, PDO::PARAM_INT);
        return $remove->execute();
    }

// Déclaration de la méthode findUserByLastname($search) pour rechercher un utilisateur
    public function findUserByLastname($search) {
// Déclaration du tableau vide $findUserList
        $findUserList = array();
// Préparation de la requete et intégration dans $findUser
        $findUser = $this->db->prepare(
                'SELECT `id`, `lastname`, `firstname`, `phone`, `email`, `idRoles`, `idSocieties`, `idUsers` '
                . 'FROM `prs13_users` '
                . 'WHERE (`lastname` LIKE :search OR `firstname` LIKE :search) AND `idUsers` = :idUsers ORDER BY `lastname` ');
// Récupération de la valeur de $search passée en parametre de la méthode dans la fonction bindValue() pour le filtrage, ajout des modulos
        $findUser->bindValue(':search', '%' . $search . '%', PDO::PARAM_STR);
        $findUser->bindValue(':idUsers', $this->idUsers, PDO::PARAM_INT);
//Si $findUser est éxécuté
        if ($findUser->execute()) {   //Si $findUser est un objet
            if (is_object($findUser)) {   //Récupération du résultat de la requete dans $findUserList
                $findUserList = $findUser->fetchAll(PDO::FETCH_OBJ);
// Sinon
            } else {
//Attribuer FALSE a $findUserList
                $findUserList = FALSE;
            }
// Sinon
        } else {
// Attribuer FALSE a $findUserList
            $findUserList = FALSE;
        }
// Retourner $findUserList
        return $findUserList;
    }

}
