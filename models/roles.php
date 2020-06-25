<?php

// On utilise pas extends dataBaseSingleton car on appelle la méthode getInstance
class roles {

    public $id;
    public $name;

    // Méthode magic __construct de la classe dataBaseSingleton
    public function __construct() {
        $database = dataBaseSingleton::getInstance();
        $this->db = $database->db;
    }
// Méthode showRole permettant d'afficher les rôles des utilisateurs
    public function showRole() {
        $query = 'SELECT `id`, `name` '
                . 'FROM `prs13_roles`';
        $show = $this->db->prepare($query);
        if ($show->execute()) {
            return $show->fetchAll(PDO::FETCH_OBJ);
        }
    }

}
