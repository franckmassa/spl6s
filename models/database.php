<?php
// On crée un modèle databaseSingleton parent
class dataBaseSingleton {

    public $db;
    private $host = '';
    private $login = '';
    private $password = '';
    private $dbname = '';
    private static $_instance;

// On crée la méthode magique construct
    protected function __construct() {
        $this->host = HOST;
        $this->login = LOGIN;
        $this->password = PASSWORD;
        $this->dbname = DBNAME;

        try {
            // On initialise la base de données
            $this->db = new PDO('mysql:host=' . $this->host . ';dbname=' . $this->dbname . ';charset=utf8', $this->login, $this->password);
        } catch (Exception $e) {
            $msg = 'Erreur PDO dans ' . $e->getFile() . ' ligne ' . $e->getLine() . ' : ' . $e->getMessage();
            die($msg);
        }
    }

// Méthode getInstance
    public static function getInstance() {
        if (is_null(self::$_instance)) {
            self::$_instance = new self();
        }
        return self::$_instance;
    }
}
