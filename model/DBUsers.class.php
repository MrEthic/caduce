<?php
require_once(DIR . "/model/DBEntity.class.php");
require_once(DIR . "/model/DBUtils.class.php");

class Users extends DBEntity{

    public static function all($entityName = "user") {
        return parent::all($entityName);
    }

    public static function with_filter($str) {
        $sql = sprintf("SELECT * FROM user WHERE CONCAT(NSS, ' ', Nom, ' ', Prénom, ' ', Mail, ' ', Tel) REGEXP '%s'", $str);
        return parent::from_sql($sql);
    }


}




?>