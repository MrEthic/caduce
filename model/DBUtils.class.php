<?php

class DBUtils {

    public static function all($entityName) {
        $sql = "SELECT * FROM " . $entityName;
        $result = self::execute_query($sql);
        if ($result == false) {
            return null;
        }
        return $result;
    }

    public static function execute_query($sql, $all = true) {
        $db = self::get_connection();
        if ($result = $db -> query($sql)) {
            return $all ? $result -> fetch_all(MYSQLI_ASSOC) : $result;
        }
        else {
            return false;
        }
        $db->close();
    }

    private static function get_connection() {
        // Load les variable d'environement et renvoi une instance de DBConnection
        $db = new mysqli("localhost", "app", "app", "caducee");
        if ($db -> connect_errno) {
            echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
        }
        else {
            return $db;
        }
    }
}


?>