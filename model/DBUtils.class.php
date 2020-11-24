<?php

class DBUtils {

    public static function all($entityName) {
        $sql = "SELECT * FROM " . $entityName;
        $result = self::execute_query($sql, []);
        if ($result == false) {
            return null;
        }
        return $result;
    }

    public static function execute_query($sql, $params, $all = true) {
        $conn = self::get_connection();
        $stmt = $conn->prepare($sql);
        $stmt->execute($params);
        $result = $stmt->fetchAll();
        return $result;
    }

    private static function get_connection() {
        // Load les variable d'environement et renvoi une instance de DBConnection
        try {
            $conn = new PDO("mysql:host=localhost;dbname=caducee", "app", "app");
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $conn;
        } catch(PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }
}


?>