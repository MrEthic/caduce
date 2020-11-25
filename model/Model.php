<?php

abstract class Model {

    private $host = DBHOST;
    private $db_name = DBNAME;
    private $db_user = DBUSER;
    private $db_password = DBPSWD;

    protected $conn;

    public $table;
    public $id_column;
    public $id;

    public function get_connection() {
        $this->conn = null;

        try{
            $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, $this->db_user, $this->db_password);
            $this->conn->exec("set names utf8");
        }catch(PDOException $exception){
            echo "Erreur de connexion DB : " . $exception->getMessage();
        }
    }

    public function get_one() {
        $sql = "SELECT * FROM " . $this->table . " WHERE " . $this->id_column . "=:id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([":id" => $this->id]);
        $result = $stmt->fetch();
        return $result;
    }

    public function get_all() {
        $sql = "SELECT * FROM " . $this->table;
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll();
        return $result;
    }

}


?>