<?php
require_once(DIR . "/model/Model.php");
class user extends Model {

    public function __construct() {
        $this->table = "user";
        $this->id_column = "NSS";
        $this->get_connection();
    }

    public function get_one() {
        $sql = "SELECT user.*, CONCAT(adresse.zip, ', ', adresse.city) as 'Adresse' FROM user JOIN adresse ON adresse.id_adresse=user.id_adresse WHERE user.NSS=:id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([":id" => $this->id]);
        $result = $stmt->fetch();
        return $result;
    }

    public function global_filter($filter) {
        $sql = "SELECT * FROM user WHERE CONCAT(NSS, ' ', Nom, ' ', Prénom, ' ', Mail, ' ', Tel) REGEXP :filter";
        $stmt = $this->conn-> prepare($sql);
        $stmt->execute([":filter" => $filter]);
        $result = $stmt->fetchAll();
        return $result;
    }

    public function complexe_filter($filters, $filter_mode) {
        $sql = "SELECT * FROM user WHERE";
        foreach($filters as $key => $value) {
            if($key == "dateA" or $key == "dateB" or $value=="") {continue;}
            $sql .= sprintf(" %s REGEXP :%s %s", $key, $key, $filter_mode);
        }
        if($filter_mode == "OR") {
            $sql = substr($sql, 0, -2);
        }
        else {
            $sql = substr($sql, 0, -3);
        }
        if (isset($filters["dateA"]) and isset($filters["dateB"])){
            $sql .= $filter_mode . " Création_Date BETWEEN :dateA AND :dateB";
        }
        $stmt = $this->conn-> prepare($sql);
        $stmt->execute($filters);
        $result = $stmt->fetchAll();
        return $result;
    }

}


?>