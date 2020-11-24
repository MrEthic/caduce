<?php
require_once(DIR . "/model/DBEntity.class.php");

class Users extends DBEntity{

    public static function all($entityName = "user") {
        return parent::all($entityName);
    }

    public static function with_filter($str) {
        $sql = "SELECT * FROM user WHERE CONCAT(NSS, ' ', Nom, ' ', Prénom, ' ', Mail, ' ', Tel) REGEXP :filter";
        return parent::from_sql($sql, ["filter" => $str]);
    }

    public static function with_complexe_filter($filters, $filter_mode) {
        $sql = "SELECT * FROM user WHERE";
        foreach($filters as $key => $value) {
            if($key == "dateA" or $key == "dateB") {continue;}
            $sql .= sprintf(" %s REGEXP :%s %s", $key, $key, $filter_mode);
        }
        if($filter_mode == "OR") {
            $sql = substr($sql, 0, -2);
        }
        else {
            $sql = substr($sql, 0, -3);
        }

        $sql .= $filter_mode . " Création_Date BETWEEN :dateA AND :dateB";
        
        return parent::from_sql($sql, $filters);
    }


}




?>