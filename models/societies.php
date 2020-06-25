<?php
class societies {

    public $id = 0;
    public $name = '';
    public $siret = '';
    private $db = '';

// Méthode magic __construct de la classe dataBaseSingleton
    public function __construct() {
        $database = dataBaseSingleton::getInstance();
        $this->db = $database->db;
    }

// Méthode societyRegister pour l'enregistrement des valeurs
    public function societyRegister() {
        // Enregistrement dans la table prs13_societies de la valeur de ses attributs name et siret
        $query = 'INSERT INTO `prs13_societies` (`name`, `siret`) VALUES (:name, :siret)';
        $result = $this->db->prepare($query);
        // bindvalue permet de donner une valeur aux marqueurs nominatifs 
        $result->bindValue(':name', $this->name, PDO::PARAM_STR);
        $result->bindValue(':siret', $this->siret, PDO::PARAM_STR);
        // Execute la requête et retourne le résultat dans la bdd
        return $result->execute();
    } 
}
