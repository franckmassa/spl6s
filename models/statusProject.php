<?php

class statusProject {
    public $id = 0;
    public $date = '';
    private $db;

// Méthode magic  __construct de la classe dataBaseSingleton
public function __construct() {
    $database = dataBaseSingleton::getInstance();
    $this->db = $database->db;
}

public function validateNewProject(){
    $query = 'INSERT INTO `prs13_statusProject` (`date`, `idProjectLeanSigma`, `idStatusProjectName`) '
    . 'values (:date, :idProjectLeanSigma, 2) ';
$result = $this->db->prepare($query);
$result->binvalue(':date', $this->date, PDO::PARAM_STR);
$result->bindvalue(':idProjectLeanSigma', $this->idProjectLeanSigma, PDO::PARAM_INT);
return $result->execute();
}


}