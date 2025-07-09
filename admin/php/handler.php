<?php
date_default_timezone_set("Asia/Yangon");

class database {
    private $database;
    private $stm;

    public function __construct() {
        try {
            /*$this->database = new PDO("mysql: host=localhost; port=3601; dbname=Panhuk; 
            charset=UTF8", "denlp", "LinkCorp");*/
            $this->database = new PDO("mysql: host=localhost; port=3601; dbname=Hotel; 
            charset=UTF8", "root", "");
            $this->database->setAttribute(PDO:: ATTR_ERRMODE, PDO:: ERRMODE_EXCEPTION);
            $this->database->setAttribute(PDO:: ATTR_DEFAULT_FETCH_MODE, PDO:: FETCH_OBJ);
        }
        catch (PDOException $e) {
            throw new Exception($e->getMessage());
        }
    }

    public function Prepare($query) {
        $this->stm = $this->database->prepare($query);
    }

    public function Bind($params, $value) {
        $this->stm->bindParam($params, $value);
    }

    public function Execute() {
        return $this->stm->execute();
    }

    public function Resultset() {
        $this->execute();
        return $this->stm->fetchAll(PDO::FETCH_OBJ);
    }

    public function Resultset_array() {
        $this->execute();
        return $this->stm->fetchAll(PDO::FETCH_ASSOC);
    }

    public function Rowcount() {
        $this->execute();
        return $this->stm->rowCount();
    }
}

//comment the two lines for production
error_reporting(E_ALL);
ini_set('display_errors', 1);
?>

